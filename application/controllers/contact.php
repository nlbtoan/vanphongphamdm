<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Base
{
	public function __construct() {
		
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->library('Lib_Consult');
		$this->lang->load('front_end/layout');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		
	}

	public function index() { 
		$this->show();
		
	}
	
	public function show(){	
		$data = array();
		
		$lang = $this->setting->lang('abbr');
		$data['title'] = lang('contact');
		$view = $this->load->view($this->router->class.'/default_'.$lang, $data, true);
		
		$master_data['content'] = $view;
		$master_data['title'] = $this->setting->item('namesite');
		
		$this->theme->output($master_data);
		
	}
	
	public function send_message(){
		
		$this->form_validation->set_rules('fullname', lang('fullname'), 'required|max_length[50]');
		$this->form_validation->set_rules('email', lang('email'), 'required|max_length[50]|valid_email');
		$this->form_validation->set_rules('title', lang('title'), 'required|max_length[50]');
		$this->form_validation->set_rules('content', lang('content'), 'required');

		if ( $this->form_validation->run() == true ){
			
				
			$user_data['date'] = time()-3600;
			$user_data['fullname'] = $this->input->post('fullname');
			$user_data['email'] = $this->input->post('email');
			$user_data['title'] = $this->input->post('title');
			$user_data['content'] = $this->input->post('content');
			
			//Insert
			if($this->lib_consult->create_feedback( $user_data ))
			{
				$data['success'] = '<p>'.lang('send_successfully').'</p>';
			}
			else
			{
				$data['error'] = '<p>'.lang('send_unsuccessfully').'</p>';
			}

			//add 1 message
		} else {
			//$data['error'] = $this->auth->errors();
			$data['validation'] = array(
										form_error('fullname'),
										form_error('email'),
										form_error('title'),
										form_error('content')
										);
		}
		
		if ($this->input->server('HTTP_X_REQUESTED_WITH') && ($this->input->server('HTTP_X_REQUESTED_WITH') == 'XMLHttpRequest')) {
			echo json_encode($data);
			exit;
		}
		
		return $data;
		
	}
	
}