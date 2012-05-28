<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Admin
{
	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->form_validation->set_error_delimiters('<li>', '</li>');
	}

	
	//redirect if needed, otherwise display the user list
	public function index() {
		$this->manage();
	}

	//log the user in
	public function login() {
		// logined ?
		if ($this->auth->logged_in()) {
			// redirect ve trang chinh
			redirect('admin', 'refresh');
		}
			
		// lan dau dang nhap
		$this->data['continue'] = $this->session->flashdata('continue');
		if ($this->data['continue'] === false) {
			$this->data['continue'] = $this->input->post('continue', true);
		}

		//validate form input
		$this->form_validation->set_rules('username', 'lang:username', 'required');
		$this->form_validation->set_rules('password', 'lang:password', 'required');
		
		if ($this->form_validation->run() == true) { //check to see if the user is logging in
			if ( $this->auth->login( $this->input->post('username'), $this->input->post('password'), false ) ) { //if the login is successful
				// redirect lai trang da vao truong khi dang nhap
				
				if ($this->data['continue'] != false) {
					redirect($this->data['continue'], 'refresh');
				}
				// khong xac dinh thi redirect ve lai trang chinh
				redirect('admin', 'refresh');
			} else { //if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('message', $this->auth->errors());

				redirect('admin/auth/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		} else {  //the user is not logging in so display the login page
			// giu lai bien refere neu khong no bien mat
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->load->view('auth/login', $this->data);
		}
	}


	//log the user out
	public function logout() {
		//log the user out
		$this->auth->logout();

		$this->session->set_flashdata('message', $this->auth->messages());

		//redirect them back to the page they came from

		redirect('admin/auth/login', 'refresh');
	}

	public function profile($id = false) {		
		if ($id != false) $this->data['user'] = $this->auth->get_user($id); 
		else $this->data['user'] = $this->user;
					
		$this->form_validation->set_rules('first_name', 'lang:first_name', 'required|xss_clean');
			
		if ($this->form_validation->run() == false) { //display the form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'), 'error');
		} else {
			if ($id == $this->input->post('user_id')) {						
				$data = array(
		        	'first_name' => $this->input->post('first_name'),
		        	'last_name' => $this->input->post('last_name'),
		        	'company' => $this->input->post('company'),
		        	'phone' => $this->input->post('phone')
				);
	
				$change = $this->auth->update_user($id, $data);
	
				if ($change) {
					$this->data['message'] = message($this->auth->messages());
				} else {
					$this->data['message'] = message($this->auth->errors(), 'error');
				}
			}
		}
		$this->output('auth/profile');
	}


	public function change_password($id = false) {
		if ($id != false) $this->data['user'] = $this->auth->get_user($id); 
		else $this->data['user'] = $this->user;
			
		$this->form_validation->set_rules('old', 'lang:old_password', 'required');
		$this->form_validation->set_rules('new', 'lang:new_password', 'required|min_length['.$this->config->item('min_password_length', 'auth').']|max_length['.$this->config->item('max_password_length', 'auth').']|matches[new_confirm]');
			
		// phai dung lang('new_password_confirm') thay vi 'lang:new_password' vi matches khong hop tro lang:
		$this->form_validation->set_rules('new_confirm', lang('new_password_confirm'), 'required');
								
		if ($this->form_validation->run() == false) { //display the form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'), 'error');
		} else {			
			if ($id == $this->input->post('user_id')) {
				$field = $this->config->item('identity', 'auth');
				$identity = $this->data['user']->$field;
				$change = $this->auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));
	
				if ($change) { //if the password was successfully changed
					
					// Neu la user hien tai thi logout
					if ( $identity == $this->session->userdata($this->config->item('identity', 'auth')) ) {
						$this->session->set_flashdata('message', $this->auth->messages());
						$this->logout();
					} else {
						$this->data['message'] = message($this->auth->messages());	
					}
					
				} else {
					$this->data['message'] = message($this->auth->errors(), 'error');
				}
			}
		}
		$this->output('auth/profile');
	}


	public function manage($group = 'all'/*, $term = 'all', $alpha = 'all', $page = 'all'*/) {
		$filter = $this->uri->uri_to_assoc(5, array('term', 'alpha'));

		$this->data['groups'] = $this->auth->get_groups();
		$this->data['current_group'] = $group;

		$limit = $this->config->item('per_page', 'admin');
		$offset = intval($this->uri->segment(7));

		if ($group == 'all') $group = false;

		$terms = false;
		$alpha = 'all';
		$term = '';

		foreach ($filter as $type => $input) {
			if ($input == false) break;

			if ($type == 'term') {
				$input = explode('+', trim($input));

				$terms = array();
				foreach ($input as $val) {
					$val = str_replace('  ', ' ', trim($val));
					if (!empty($val)) {
						// Xoa cac khoang trang du thua
						$terms[] = $val;
						$term .= ' ' . $val;
					}
				}
				$term = trim($term);
				$terms[] = $term;
			}else if ($type == 'alpha' && $input != 'all') {
				$this->auth->extra_where('username LIKE "'.$input.'%"');
			}
			break;
		}

		$this->data['users'] = $this->auth->get_users($count, $group, $limit, $offset, $terms)->result_array();

		$this->data['count'] = $count;
		$this->data['term'] = $term;
		$this->data['current_alpha'] = $alpha;
		// Dung truong hop active / disactive
		$this->data['current_page'] = $offset;

		$this->output('auth/manage');
	}


	function create_user()
	{
		$this->data['title'] = "Create User";

		if (!$this->auth->logged_in() || !$this->auth->is_admin()) {
			redirect('auth', 'refresh');
		}

		//validate form input
		$this->form_validation->set_rules('username', 'Last Name', 'required|xss_clean');
		$this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('phone1', 'First Part of Phone', 'required|xss_clean|min_length[3]|max_length[3]');
		$this->form_validation->set_rules('phone2', 'Second Part of Phone', 'required|xss_clean|min_length[3]|max_length[3]');
		$this->form_validation->set_rules('phone3', 'Third Part of Phone', 'required|xss_clean|min_length[4]|max_length[4]');
		$this->form_validation->set_rules('company', 'Company Name', 'required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length['.$this->config->item('min_password_length', 'auth').']|max_length['.$this->config->item('max_password_length', 'auth').']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');

		if ($this->form_validation->run() == true) {
			$username  = $this->input->post('username');
			$email     = $this->input->post('email');
			$password  = $this->input->post('password');

			$additional_data = array('first_name' => $this->input->post('first_name'),
             				        'last_name'  => $this->input->post('last_name'),
        					'company'    => $this->input->post('company'),
        					'phone'      => $this->input->post('phone1') .'-'. $this->input->post('phone2') .'-'. $this->input->post('phone3'),
			);
		}
		if ($this->form_validation->run() == true && $this->auth->register($username,$password,$email,$additional_data)) { //check to see if we are creating the user
			//redirect them back to the admin page
			$this->session->set_flashdata('message', "User Created");
			redirect("admin/auth/create_user", 'refresh');
		}
		else { //display the create user form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? ($this->auth->errors() ? $this->auth->errors() : validation_errors()) : $this->session->flashdata('message');
			$this->data['username']          = array('name'   => 'username',
		                                              'id'      => 'username',
		                                              'type'    => 'text',
		                                              'value'   => $this->form_validation->set_value('username'));

			$this->data['first_name']          = array('name'   => 'first_name',
		                                              'id'      => 'first_name',
		                                              'type'    => 'text',
		                                              'value'   => $this->form_validation->set_value('first_name'),
			);
			$this->data['last_name']           = array('name'   => 'last_name',
		                                              'id'      => 'last_name',
		                                              'type'    => 'text',
		                                              'value'   => $this->form_validation->set_value('last_name'),
			);
			$this->data['email']              = array('name'    => 'email',
		                                              'id'      => 'email',
		                                              'type'    => 'text',
		                                              'value'   => $this->form_validation->set_value('email'),
			);
			$this->data['company']            = array('name'    => 'company',
		                                              'id'      => 'company',
		                                              'type'    => 'text',
		                                              'value'   => $this->form_validation->set_value('company'),
			);
			$this->data['phone1']             = array('name'    => 'phone1',
		                                              'id'      => 'phone1',
		                                              'type'    => 'text',
		                                              'value'   => $this->form_validation->set_value('phone1'),
			);
			$this->data['phone2']             = array('name'    => 'phone2',
		                                              'id'      => 'phone2',
		                                              'type'    => 'text',
		                                              'value'   => $this->form_validation->set_value('phone2'),
			);
			$this->data['phone3']             = array('name'    => 'phone3',
		                                              'id'      => 'phone3',
		                                              'type'    => 'text',
		                                              'value'   => $this->form_validation->set_value('phone3'),
			);
			$this->data['password']           = array('name'    => 'password',
		                                              'id'      => 'password',
		                                              'type'    => 'password',
		                                              'value'   => $this->form_validation->set_value('password'),
			);
			$this->data['password_confirm']   = array('name'    => 'password_confirm',
                                                      'id'      => 'password_confirm',
                                                      'type'    => 'password',
                                                      'value'   => $this->form_validation->set_value('password_confirm'),
			);
			$this->load->view('auth/create_user', $this->data);
		}
	}


	//activate the user
	function activate($id, $code=false) {
		$id = intval($id);

		$this->form_validation->set_rules('confirm', 'confirmation', 'required');
		$this->form_validation->set_rules('id', 'user ID', 'required|is_natural');

		if ( $this->form_validation->run() == TRUE ) {
			if ( $this->input->post('confirm') == 'yes'
			&& $this->input->post('id') == $id ) {
				
				$activation = $this->auth->activate($id, $code);

				if ($activation) {
					$this->data['status'] = true;
					$this->data['message'] = message($this->auth->messages());
				} else {
					$this->data['status'] = false;
					$this->data['message'] = message($this->auth->errors(), 'error');
				}
				$this->output();
			}
		}
	}

	//deactivate the user
	function deactivate($id = NULL) {
		// no funny business, force to integer
		$id = intval($id);

		$this->form_validation->set_rules('confirm', 'confirmation', 'required');
		$this->form_validation->set_rules('id', 'user ID', 'required|is_natural');

		if ( $this->form_validation->run() == TRUE ) {
			if ( $this->input->post('confirm') == 'yes'
			&& $this->input->post('id') == $id ) {				
				if ($this->auth->deactivate($id)) {
					$this->data['status'] = true;
					$this->data['message'] = message($this->auth->messages());
				}else{
					$this->data['status'] = false;
					$this->data['message'] = message($this->auth->errors(), 'error');
				}
				$this->output();
			}
		}
	}

	public function delete_user($id) {
		$id = intval($id);

		$this->form_validation->set_rules('confirm', 'confirmation', 'required');
		$this->form_validation->set_rules('id', 'user ID', 'required|is_natural');
		
		if ( $this->form_validation->run() == TRUE ) {
			if ( $this->input->post('confirm') == 'yes'
			&& $this->input->post('id') == $id ) {
				// Xoa user
				$delete = $this->menu->delete_menu($id);
				if ($delete) {
					$this->data['status'] = true;
					$this->data['message'] = message($this->auth->messages());
				} else {
					$this->data['status'] = false;
					$this->data['message'] = message($this->auth->errors(), 'error');
				}
				$this->output();
			}
		}
	}

	private function _get_csrf_nonce() {
		$this->load->helper('string');
		$key	= random_string('alnum', 8);
		$value	= random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array('name'=>$key,
					'value'=> $value);
	}

	private function _valid_csrf_nonce() {
		if ( $this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
		$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue')) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

