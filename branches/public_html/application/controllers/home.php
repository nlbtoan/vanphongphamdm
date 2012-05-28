<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Base
{
	public function __construct() {
		
		parent::__construct();
		
		$this->load->helper('form');

		$this->load->library('pagination');
		
		$this->lang->load('front_end/home');
		$this->lang->load('tour');
        $this->lang->load('front_end/layout');
		
		$this->load->model('tour_model');
		$this->load->model('page_model');
		$this->load->model('news_model');

	}

	public function index() {
		
		$this->show();
		
	}
	
	public function show()
	{	
		$data = array();
		
		$limit = 3;
		$offset = 0;
		//Get Page Gioi Thieu
		$page = $this->page_model->get_by_id(1);
		$data['content'] = $page['content'];
		$list_page_welcome = $this->load->view( 'page/about_us', $data, true);
		$data['list_page_welcome'] = $list_page_welcome;
		
		$data['data'] = $this->tour_model->get_tour_hot($count_hot, $limit, $offset);
		$list_tour_hot = $this->load->view( 'home/list_tour', $data, true);
		
		$data['data'] = $this->tour_model->get_data_cat(8, $count_package, $limit, $offset);
		$list_tour_package = $this->load->view( 'home/list_tour', $data, true);
		
		$data['data'] = $this->tour_model->get_data_cat( 9, $count_daily, $limit, $offset);
		$list_tour_daily = $this->load->view( 'home/list_tour', $data, true);
		
		
		$data['list_tour_hot'] = $list_tour_hot;
		$data['list_tour_package'] = $list_tour_package;
		$data['list_tour_daily'] = $list_tour_daily;
		
		$data['tabs'] = lang('tabs');
		$data['news'] = $this->news_model->get_news_all($count_news, 4, 0 );
		
		$data['title'] = lang('tour');
		$view = $this->load->view($this->router->class.'/default', $data, true);
		
		$master_data['content'] = $view;
		$master_data['title'] = $this->setting->item('namesite');
		
		$this->theme->output($master_data);
	}
}