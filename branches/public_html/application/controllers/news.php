<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends MY_Base
{
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('news_model');
		
		$this->load->helper('form');
		$this->lang->load('front_end/news');
 		$this->lang->load('front_end/layout'); 
		$this->load->library('pagination');

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	}
	
	public function index()
	{
		$this->show();
	}
	
	public function show(){	
		
		$limit = $this->setting->item('per_page');
		$offset = intval($this->uri->segment(3));

		//data cho page
		$data['data'] = $this->news_model->get_news_all($count, $limit, $offset);
		
		//config paging
		$config['base_url'] = site_url($this->router->class.'/show');
		$config['total_rows'] = $count;
		$config['per_page'] = $limit;
		$config['num_links'] = 10;
		$config['uri_segment'] = 3;
		$config['first_link'] = lang('first_link');
		$config['last_link'] = lang('last_link');
		
		//Khoi tao paging
		$this->pagination->initialize($config);
		
		$data['title'] = lang('title');
		$view = $this->load->view($this->router->class.'/default', $data, true);
		
		$master_data['content'] = $view;
		$master_data['title'] = $this->setting->item('namesite');
		
		$this->theme->output($master_data);
		
	}
	
	public function detail( $id = false)
	{
		if( $id )
		{	
			$info = $this->news_model->get_news($id);
			
			if ( !empty($info) )
			{
				$data['data'] = $info;
				
				$view = $this->load->view($this->router->class.'/detail', $data, true);
				
				$master_data['content'] = $view;
				$master_data['title'] = $this->setting->item('namesite');
		
				$this->theme->output($master_data);
			} 
			else
			{
				redirect($this->router->class);
			}
		} 
		else 
		{
			redirect($this->router->class);
		}	
	}
	
	public function topstory()
	{
		header('Content-Type: application/xml');
		echo '<?xml version="1.0" encoding="UTF-8" ?>';
		echo $this->load->view('news/topstory', null, true);
		exit;
	}
}
