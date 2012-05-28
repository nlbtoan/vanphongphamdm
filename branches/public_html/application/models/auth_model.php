<?php
class Auth_model extends Model
{
	/**
	 * Holds an array of tables used
	 *
	 * @var string
	 **/
	public $tables = array();

	/**
	 * activation code
	 *
	 * @var string
	 **/
	public $activation_code;

	/**
	 * forgotten password key
	 *
	 * @var string
	 **/
	public $forgotten_password_code;

	/**
	 * new password
	 *
	 * @var string
	 **/
	public $new_password;

	/**
	 * Identity
	 *
	 * @var string
	 **/
	public $identity;

	public function __construct() {
		parent::__construct();

		$this->load->config('auth', TRUE);

		$this->load->helper('cookie');
		$this->load->helper('date');

		$this->load->library('session');

		$this->tables  = $this->config->item('tables', 'auth');
		$this->columns = $this->config->item('columns', 'auth');

		$this->search_columns = $this->config->item('search_columns', 'auth');
		
		$this->identity_column = $this->config->item('identity', 'auth');
		$this->store_salt      = $this->config->item('store_salt', 'auth');
		$this->salt_length     = $this->config->item('salt_length', 'auth');
		$this->meta_join       = $this->config->item('join', 'auth');
		
	}

	/**
	 * login
	 *
	 * @return bool
	 * @author Mathew
	 **/
	public function login($identity, $password, $remember=FALSE)
	{
		if (empty($identity) || empty($password) || !$this->identity_check($identity))
		{
			return FALSE;
		}

		$this->db->select($this->identity_column.', id, password, group_id')
		->where($this->identity_column, $identity);

		if (isset($this->auth->_extra_where))
		{
			$this->db->where($this->auth->_extra_where);
		}

		$query = $this->db->where('active', 1)
		->limit(1)
		->get($this->tables['users']);

		$result = $query->row();

		if ($query->num_rows() == 1)
		{
			$password = $this->hash_password_db($identity, $password);

			if ($result->password === $password)
			{
				$this->update_last_login($result->id);

				$this->session->set_userdata($this->identity_column,  $result->{$this->identity_column});
				$this->session->set_userdata('id',  $result->id); //kept for backwards compatibility
				$this->session->set_userdata('user_id',  $result->id); //everyone likes to overwrite id so we'll use user_id
				$this->session->set_userdata('group_id',  $result->group_id);
				
				$group_row = $this->db->select('name')->where('id', $result->group_id)->get($this->tables['groups'])->row();

				$this->session->set_userdata('group',  $group_row->name);

				if ($remember && $this->config->item('remember_users', 'ion_auth'))
				{
					$this->remember_user($result->id);
				}

				return TRUE;
			}
		}

		return FALSE;
	}

	/**
	 * Identity check
	 *
	 * @return bool
	 **/
	protected function identity_check($identity = '')
	{
		if (empty($identity))
		{
			return FALSE;
		}

		return $this->db
		->where($this->identity_column, $identity)
		->count_all_results($this->tables['users']) > 0;
	}

	/**
	 * This function takes a password and validates it
	 * against an entry in the users table.
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function hash_password_db($identity, $password)
	{
		if (empty($identity) || empty($password))
		{
			return FALSE;
		}

		$query = $this->db->select('password')
		->select('salt')
		->where($this->identity_column, $identity)
		->where($this->auth->_extra_where)
		->limit(1)
		->get($this->tables['users']);

		$result = $query->row();

		if ($query->num_rows() !== 1)
		{
			return FALSE;
		}

		if ($this->store_salt)
		{
			return sha1($password . $result->salt);
		}
		else
		{
			$salt = substr($result->password, 0, $this->salt_length);

			return $salt . substr(sha1($salt . $password), 0, -$this->salt_length);
		}
	}

	/**
	 * Hashes the password to be stored in the database.
	 *
	 * @return void	 
	 **/
	public function hash_password($password, $salt=false)
	{
	    if (empty($password))
	    {
	    	return FALSE;
	    }

	    if ($this->store_salt && $salt)
		{
			return  sha1($password . $salt);
		}
		else
		{
	    	$salt = $this->salt();
	    	return  $salt . substr(sha1($salt . $password), 0, -$this->salt_length);
		}
	}

	/**
	 * Generates a random salt value.
	 *
	 * @return void	
	 **/
	public function salt()
	{
		return substr(md5(uniqid(rand(), true)), 0, $this->salt_length);
	}
	
	/**
	 * update_last_login
	 *
	 * @return bool	 
	 **/
	public function update_last_login($id)
	{
		$this->load->helper('date');

		if (isset($this->auth->_extra_where))
		{
			$this->db->where($this->auth->_extra_where);
		}

		$this->db->update($this->tables['users'], array('last_login' => now()), array('id' => $id));

		return $this->db->affected_rows() == 1;
	}
	
	/**
	 * profile
	 *
	 * @return void	 
	 **/
	public function profile($identity = '', $is_code = false)
	{
		if (empty($identity)) {
			return FALSE;
		}

		$this->db->select(array(
			$this->tables['users'].'.*',
			$this->tables['groups'].'.name AS `group`',
			$this->tables['groups'].'.description AS group_description'
		));

		if (!empty($this->columns))
		{
			foreach ($this->columns as $field)
			{
				$this->db->select($this->tables['meta'] .'.' . $field);
			}
		}

		$this->db->join($this->tables['meta'], $this->tables['users'].'.id = '.$this->tables['meta'].'.'.$this->meta_join, 'left');
		$this->db->join($this->tables['groups'], $this->tables['users'].'.group_id = '.$this->tables['groups'].'.id', 'left');

		if ($is_code)
		{
			$this->db->where($this->tables['users'].'.forgotten_password_code', $identity);
		}
		else
		{
			$this->db->where($this->tables['users'].'.'.$this->identity_column, $identity);
		}

		$this->db->where($this->auth->_extra_where);

		$this->db->limit(1);
		
		$i = $this->db->get($this->tables['users']);

		return ($i->num_rows > 0) ? $i->row() : FALSE;
	}

	/**
	 * update_user
	 *
	 * @return bool	
	 **/
	public function update_user($id, $data)
	{
		$user = $this->get_user($id)->row();

		$this->db->trans_begin();

		if (!empty($this->columns))
		{
			// 'user_id' = $id
			$this->db->where($this->meta_join, $id);

			foreach ($this->columns as $field)
			{
				if (is_array($data) && isset($data[$field]))
				{
		    			$this->db->set($field, $data[$field]);
		    			unset($data[$field]);
				}
			}

			$this->db->update($this->tables['meta']);
		}

		if (array_key_exists('username', $data) || array_key_exists('password', $data) || array_key_exists('email', $data))
		{
			if (array_key_exists('password', $data))
			{
				$data['password'] = $this->hash_password($data['password'], $user->salt);
			}

			$this->db->where($this->auth->_extra_where);

			$this->db->update($this->tables['users'], $data, array('id' => $id));
		}

		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    return FALSE;
		}

		$this->db->trans_commit();
		return TRUE;
	}

	/**
	 * get_user
	 *
	 * @return object
	 * @author Phil Sturgeon
	 **/
	public function get_user($id = false)
	{
		//if no id was passed use the current users id
		if (empty($id)) {
			$id = $this->session->userdata('user_id');
		}

		$this->db->where($this->tables['users'].'.id', $id);
		$this->db->limit(1);

		return $this->get_users();
	}

	/**
	 * change password
	 *
	 * @return bool	
	 **/
	public function change_password($identity, $old, $new)
	{
	    $query = $this->db->select('password, salt')
						  ->where($this->identity_column, $identity)
						  ->where($this->auth->_extra_where)
						  ->limit(1)
						  ->get($this->tables['users']);

	    $result = $query->row();

	    $db_password = $result->password;
	    $old	 = $this->hash_password_db($identity, $old);
	    $new	 = $this->hash_password($new, $result->salt);

	    if ($db_password === $old)
	    {
	    	//store the new password and reset the remember code so all remembered instances have to re-login
		$data = array('password' => $new,
					  'remember_code' => '',
					 );

		$this->db->where($this->auth->_extra_where);
		$this->db->update($this->tables['users'], $data, array($this->identity_column => $identity));

		return $this->db->affected_rows() == 1;
	    }

	    return FALSE;
	}

	/**
	 * get_groups
	 *
	 * @return object	 
	 **/
	public function get_groups() {
    	return $this->db->get($this->tables['groups'])->result_array();
  	}
  	
	/**
	 * get_users
	 *
	 * @return object Users
	 **/
	public function get_users(&$count=0, $group = false, $limit = false, $offset = false, $terms = false) {
		$this->db->start_cache();
		
		$this->db->select(array(
			$this->tables['users'].'.*',
			$this->tables['groups'].'.name AS `group`',
			$this->tables['groups'].'.description AS group_description'
		));

		if (!empty($this->columns))
		{
			foreach ($this->columns as $field)
			{
				$this->db->select($this->tables['meta'].'.'. $field);
			}
		}		
		
		$this->db->join($this->tables['meta'], $this->tables['users'].'.id = '.$this->tables['meta'].'.'.$this->meta_join, 'left');
		$this->db->join($this->tables['groups'], $this->tables['users'].'.group_id = '.$this->tables['groups'].'.id', 'left');
		 
		if (is_string($group))
		{			
			$this->db->where($this->tables['groups'].'.name', $group);
		}
		else if (is_array($group))
		{
			$this->db->where_in($this->tables['groups'].'.name', $group);
		}
		
		if (is_array($terms)) {
			$where_term = '';
			foreach ($terms as $term) {
				if ($where_term =='') $where_term .= ' (`username` LIKE "%'.$term.'%"';
				else $where_term .= ' OR `username` LIKE "%'.$term.'%"';
				$where_term .= ' OR `email` LIKE "%'.$term.'%"';				
				
				foreach ($this->search_columns as $field) {
					$where_term .= ' OR `'.$this->tables['meta'].'`.`'.$field.'` LIKE "%'.$term.'%"';					
				}
				
			}	
			$where_term .= ')';			
			$this->db->where($where_term, NULL, false);
		}
		
		if (isset($this->auth->_extra_where))
		{
			$this->db->where($this->auth->_extra_where);
		}
		
		$this->db->stop_cache();
		//echo $this->db->count_all_results();
		if (func_num_args() > 0) {
			$count = $this->db->count_all_results($this->tables['users']);
		}
		
		if ($limit != false) {
			if ($offset == false) $this->db->limit($limit);
			else $this->db->limit($limit, $offset);			
		}
		
		$ret = $this->db->get($this->tables['users']);
		
		$this->db->flush_cache();
		
		return $ret;				
		
	}	
	
	/**
	 * register
	 *
	 * @return bool	 
	 **/
	public function register($username, $password, $email, $additional_data = false, $group_name = false)
	{		
		// dam bao khong trung username
		if ($this->identity_column == 'username' && $this->username_check($username))
		{
			$this->auth->set_error('account_creation_duplicate_username');
			return FALSE;
		}
		// dam bao khong turng email
		if ($this->email_check($email))
		{
			$this->auth->set_error('account_creation_duplicate_email');
			return FALSE;
		}
		
		// Group ID : khong coi gorup nao thi chon group mac dinh
		if(!$group_name)
		{
			$group_name = $this->config->item('default_group', 'auth');
		}

		$group_id = $this->db->select('id')
			->where('name', $group_name)
			->get($this->tables['groups'])
			->row()->id;

		// IP Address
		$ip_address = $this->input->ip_address();
		$salt = $this->store_salt ? $this->salt() : FALSE;
		$password = $this->hash_password($password, $salt);

		// Users table.
		$data = array(
			'username'   => $username,
			'password'   => $password,
			'email'      => $email,
			'group_id'   => $group_id,
			'ip_address' => $ip_address,
			'created_on' => now(),
			'last_login' => now(),
			'active'     => 1
		);

		if ($this->store_salt)
		{
			$data['salt'] = $salt;
		}

		if($this->auth->_extra_set)
		{
			$this->db->set($this->auth->_extra_set);
		}

		$this->db->insert($this->tables['users'], $data);

		// Meta table.
		$id = $this->db->insert_id();

		$data = array($this->meta_join => $id);

		if (!empty($this->columns))
		{
			foreach ($this->columns as $input)
			{
				if (is_array($additional_data) && isset($additional_data[$input]))
				{
					$data[$input] = $additional_data[$input];
				}
				else
				{
					$data[$input] = $this->input->post($input);
				}
			}
		}

		$this->db->insert($this->tables['meta'], $data);

		return $this->db->affected_rows() > 0 ? $id : false;
	}
	
	/**
	 * Checks username
	 *
	 * @return bool	
	 **/
	public function username_check($username = '')
	{
	    if (empty($username))
	    {
			return FALSE;
	    }

	    return $this->db->where('username', $username)
	    	->where($this->auth->_extra_where)
			->count_all_results($this->tables['users']) > 0;
	}
	
	/**
	 * Checks email
	 *
	 * @return bool	
	 **/
	public function email_check($email = '')
	{
	    if (empty($email))
	    {
			return FALSE;
	    }

	    return $this->db->where('email', $email)
	    	->where($this->auth->_extra_where)
			->count_all_results($this->tables['users']) > 0;
	}
	
	/**
	 * Deactivate
	 *
	 * @return void
	 **/
	public function deactivate($id = 0) {
	    if (empty($id)) {
			return FALSE;
	    }

		$activation_code       = sha1(md5(microtime()));
		$this->activation_code = $activation_code;

		$data = array(
			'activation_code' => $activation_code,
			'active'	  => 0
		);

		$this->db->where($this->auth->_extra_where);
		$this->db->update($this->tables['users'], $data, array('id' => $id));

		return $this->db->affected_rows() == 1;
	}
	/**
	 * activate
	 *
	 * @return void	
	 **/
	public function activate($id, $code = false) {
	    if ($code != false) {
		    $query = $this->db->select($this->identity_column)
			->where('activation_code', $code)
			->limit(1)
			->get($this->tables['users']);

			$result = $query->row();

			if ($query->num_rows() !== 1) {
				return FALSE;
			}

			$identity = $result->{$this->identity_column};

			$data = array(
				'activation_code' => '',
				'active'	  => 1
			);

			$this->db->where($this->auth->_extra_where);
			$this->db->update($this->tables['users'], $data, array($this->identity_column => $identity));
	    } else {
			if (!$this->auth->is_admin()) {
				return false;
			}

			$data = array(
				'activation_code' => '',
				'active' => 1
			);

			$this->db->where($this->auth->_extra_where);
			$this->db->update($this->tables['users'], $data, array('id' => $id));
	    }

		return $this->db->affected_rows() == 1;
	}
	
	/**
	 * delete_user
	 *
	 * @return bool
	 **/
	public function delete_user($id) {
		$this->db->trans_begin();

		$this->db->delete($this->tables['meta'], array($this->meta_join => $id));
		$this->db->delete($this->tables['users'], array('id' => $id));

		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    return FALSE;
		}

		$this->db->trans_commit();
		return TRUE;
	}
		
}