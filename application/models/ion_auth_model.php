<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Model
*
* Author:  Ben Edmunds
* 		   ben.edmunds@gmail.com
*	  	   @benedmunds
*
* Added Awesomeness: Phil Sturgeon
*
* Location: http://github.com/benedmunds/CodeIgniter-Ion-Auth
*
* Created:  10.01.2009
*
* Description:  Modified auth system based on redux_auth with extensive customization.  This is basically what Redux Auth 2 should be.  Original redux license is below.
* Original Author name has been kept but that does not mean that the method has not been modified.
*
* Requirements: PHP5 or above
*
*/

//  CI 2.0 Compatibility
if(!class_exists('CI_Model')) { class CI_Model extends Model {} }


class Ion_auth_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->config('ion_auth', TRUE);
		$this->load->helper('cookie');
		$this->load->helper('date');
		$this->load->library('session');
		$this->tables  = $this->config->item('tables', 'ion_auth');
		$this->columns = $this->config->item('columns', 'ion_auth');

		$this->identity_column = $this->config->item('identity', 'ion_auth');
	    $this->store_salt      = $this->config->item('store_salt', 'ion_auth');
	    $this->salt_length     = $this->config->item('salt_length', 'ion_auth');
	    $this->meta_join       = $this->config->item('join', 'ion_auth');
	}

	/**
	 * Misc functions
	 *
	 * Hash password : Hashes the password to be stored in the database.
     * Hash password db : This function takes a password and validates it
     * against an entry in the users table.
     * Salt : Generates a random salt value.
	 *
	 * @author Mathew
	 */

	

	

	

	/**
	 * Activation functions
	 *
     * Activate : Validates and removes activation code.
     * Deactivae : Updates a users row with an activation code.
	 *
	 * @author Mathew
	 */

	


	

	

	

	

	

	/**
	 * Insert a forgotten password key.
	 *
	 * @return bool
	 * @author Mathew
	 **/
	public function forgotten_password($email = '')
	{
	    if (empty($email))
	    {
			return FALSE;
	    }

		$key = $this->hash_password(microtime().$email);

		$this->forgotten_password_code = $key;

		$this->db->where($this->ion_auth->_extra_where);

		$this->db->update($this->tables['users'], array('forgotten_password_code' => $key), array('email' => $email));

		return $this->db->affected_rows() == 1;
	}

	/**
	 * Forgotten Password Complete
	 *
	 * @return string
	 * @author Mathew
	 **/
	public function forgotten_password_complete($code, $salt=FALSE)
	{
		if (empty($code))
		{
			return FALSE;
		}

		$this->db->where('forgotten_password_code', $code);

		if ($this->db->count_all_results($this->tables['users']) > 0)
		{
			$password = $this->salt();

			$data = array(
				'password'		=> $this->hash_password($password, $salt),
				'forgotten_password_code' => '0',
				'active'		  => 1
			);

			$this->db->update($this->tables['users'], $data, array('forgotten_password_code' => $code));

			return $password;
		}

		return FALSE;
	}

	

	/**
	 * Basic functionality
	 *
	 * Register
	 * Login
	 *
	 * @author Mathew
	 */

	/**
	 * register
	 *
	 * @return bool
	 * @author Mathew
	 **/
	public function register($username, $password, $email, $additional_data = false, $group_name = false)
	{
		if ($this->identity_column == 'email' && $this->email_check($email))
		{
			$this->ion_auth->set_error('account_creation_duplicate_email');
			return FALSE;
		}
		elseif ($this->identity_column == 'username' && $this->username_check($username))
		{
			$this->ion_auth->set_error('account_creation_duplicate_username');
			return FALSE;
		}

		// If username is taken, use username1 or username2, etc.
		if ($this->identity_column != 'username')
		{
			for($i = 0; $this->username_check($username); $i++)
			{
				if($i > 0)
				{
					$username .= $i;
				}
			}
		}
		// Group ID
		if(!$group_name)
		{
			$group_name = $this->config->item('default_group', 'ion_auth');
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

		if($this->ion_auth->_extra_set)
		{
			$this->db->set($this->ion_auth->_extra_set);
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
	 * get_active_users
	 *
	 * @return object
	 * @author Ben Edmunds
	 **/
	public function get_active_users($group_name = false)
	{
	    $this->db->where($this->tables['users'].'.active', 1);

		return $this->get_users($group_name);
	}

	/**
	 * get_inactive_users
	 *
	 * @return object
	 * @author Ben Edmunds
	 **/
	public function get_inactive_users($group_name = false)
	{
	    $this->db->where($this->tables['users'].'.active', 0);

		return $this->get_users($group_name);
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
		if (empty($id))
		{
			$id = $this->session->userdata('user_id');
		}

		$this->db->where($this->tables['users'].'.id', $id);
		$this->db->limit(1);

		return $this->get_users();
	}

	/**
	 * get_user_by_email
	 *
	 * @return object
	 * @author Ben Edmunds
	 **/
	public function get_user_by_email($email)
	{
		$this->db->where($this->tables['users'].'.email', $email);
		$this->db->limit(1);

		return $this->get_users();
	}

	/**
	 * get_newest_users
	 *
	 * @return object
	 * @author Ben Edmunds
	 **/
	public function get_newest_users($limit = 10)
  	{
    	$this->db->order_by($this->tables['users'].'.created_on', 'desc');
    	$this->db->limit($limit);

    	return $this->get_users();
  	}

	/**
	 * get_users_group
	 *
	 * @return object
	 * @author Ben Edmunds
	 **/
	public function get_users_group($id=false)
	{
		//if no id was passed use the current users id
		$id || $id = $this->session->userdata('user_id');

		$user = $this->db
			->select('group_id')
			->where('id', $id)
			->get($this->tables['users'])
			->row();

		return $this->db
			->select('name, description')
			->where('id', $user->group_id)
			->get($this->tables['groups'])
			->row();
	}

	/**
	 * get_groups
	 *
	 * @return object
	 * @author Phil Sturgeon
	 **/
	public function get_groups() {
    	return $this->db->get($this->tables['groups'])->result_array();
  	}

	/**
	 * get_group
	 *
	 * @return object
	 * @author Ben Edmunds
	 **/
	public function get_group($id)
  	{
    	$this->db->where('id', $id);
    	
  		return $this->db
					->get($this->tables['groups'])
					->row();
  	}

	/**
	 * get_group_by_name
	 *
	 * @return object
	 * @author Ben Edmunds
	 **/
	public function get_group_by_name($name)
  	{
    	$this->db->where('name', $name);
    	
  		return $this->db
					->get($this->tables['groups'])
					->row();
  	}

	


	/**
	 * delete_user
	 *
	 * @return bool
	 * @author Phil Sturgeon
	 **/
	public function delete_user($id)
	{
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

	/**
	 * set_lang
	 *
	 * @return bool
	 * @author Ben Edmunds
	 **/
	public function set_lang($lang = 'en')
	{
		set_cookie(array(
			'name'   => 'lang_code',
			'value'  => $lang,
			'expire' => $this->config->item('user_expire', 'ion_auth') + time()
		));

		return TRUE;
	}

	/**
	 * login_remembed_user
	 *
	 * @return bool
	 * @author Ben Edmunds
	 **/
	public function login_remembered_user()
	{
		//check for valid data
		if (!get_cookie('identity') || !get_cookie('remember_code') || !$this->identity_check(get_cookie('identity')))
		{
			return FALSE;
		}

		//get the user
        if (isset($this->ion_auth->_extra_where))
		{
			$this->db->where($this->ion_auth->_extra_where);
		}
		$query = $this->db->select($this->identity_column.', id, group_id')
					->where($this->identity_column, get_cookie('identity'))
					->where('remember_code', get_cookie('remember_code'))
					->limit(1)
					->get($this->tables['users']);

		//if the user was found, sign them in
		if ($query->num_rows() == 1)
		{
			$user = $query->row();

			$this->update_last_login($user->id);

			$this->session->set_userdata($this->identity_column,  $user->{$this->identity_column});
			$this->session->set_userdata('id',  $user->id); //kept for backwards compatibility
			$this->session->set_userdata('user_id',  $user->id); //everyone likes to overwrite id so we'll use user_id
			$this->session->set_userdata('group_id',  $user->group_id);

			$group_row = $this->db->select('name')->where('id', $user->group_id)->get($this->tables['groups'])->row();

			$this->session->set_userdata('group',  $group_row->name);

			//extend the users cookies if the option is enabled
			if ($this->config->item('user_extend_on_login', 'ion_auth'))
			{
				$this->remember_user($user->id);
			}

			return TRUE;
		}

		return FALSE;
	}

	/**
	 * remember_user
	 *
	 * @return bool
	 * @author Ben Edmunds
	 **/
	private function remember_user($id)
	{
		if (!$id)
		{
			return FALSE;
		}

		$user = $this->get_user($id)->row();

		$salt = sha1($user->password);

		$this->db->update($this->tables['users'], array('remember_code' => $salt), array('id' => $id));

		if ($this->db->affected_rows() > -1)
		{
			set_cookie(array(
				'name'   => 'identity',
				'value'  => $user->{$this->identity_column},
				'expire' => $this->config->item('user_expire', 'ion_auth'),
			));

			set_cookie(array(
				'name'   => 'remember_code',
				'value'  => $salt,
				'expire' => $this->config->item('user_expire', 'ion_auth'),
			));

			return TRUE;
		}

		return FALSE;
	}
}
