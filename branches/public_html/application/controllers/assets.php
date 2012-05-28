<?php

class Assets extends MY_Controller
{	
	public function __construct() {
		parent::__construct();
		$this->load->library('user_agent');
		/*if ($this->agent->is_referral()) {
		    $this->data['current_url'] = $this->agent->referrer();
		}else{
			$this->data['current_url'] = current_url();
		}*/
	}
	public function base() {				
		$this->output->set_header('Content-Type: application/x-javascript');
		$this->data['jquery'] = $this->load->file('assets/_base/jquery.js', true);		
		return $this->load->view('assets/jquery.extend.js', $this->data);					
	}

	public function js() {	
		$this->output->set_header('Content-Type: application/x-javascript');
		$ext = '.js';	
		$files = func_get_args();
		$source = '';
		foreach ($files as $file) {
			if (strpos($file, $ext) === false) $file .= $ext;
			$source .= $this->load->file("assets/$file", null, true);
		}
	}
	
	public function fckeditor() {
		require_once FCPATH . 'assets/fckeditor/editor/filemanager/connectors/ci/connector.php';
	}
}