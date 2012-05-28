<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consult extends MY_Base
{
	public function __construct() {
		
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->library('Lib_Consult');
		 $this->lang->load('front_end/layout'); 
		//$this->load->library('form_validation');
		//$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		
	}

	public function index() { 
		$this->show();
		
	}
	
	public function show(){	
		$data = array();
		$data['data'] = $this->consult_model->get_faq();
		
		$lang = $this->setting->lang('abbr');
		$data['title'] = lang('faq');
		$view = $this->load->view($this->router->class.'/default', $data, true);
		
		$master_data['content'] = $view;
		$master_data['title'] = $this->setting->item('namesite');
		
		$this->theme->output($master_data);
		
	}

}