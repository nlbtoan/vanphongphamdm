<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slides extends MY_Base
{
	public function __construct() 
	{	
		parent::__construct();
		$this->load->model('advert_model');
		$this->load->helper('image_helper');
	}
	
	public function index()
	{
		header('Content-Type: application/xml');
		echo '<?xml version="1.0" encoding="UTF-8" ?>';
		$data['data'] = $this->advert_model->get_adv('slides', 5);
		echo $this->load->view('slides/default', $data, true);
		exit;
	}
}