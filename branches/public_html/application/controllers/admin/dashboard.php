<?php

class Dashboard extends MY_Admin 
{
	public function __construct()
	{
		parent::__construct();
		
		##--LOAD LIBRARY--##
		$this->load->library('setting');
		$this->load->model('dashboard_model');
	}
	
	public function index() 
	{	
		$obj['tour_seft']['title'] 	= 'Tour Tự thiết kế';
		$obj['tour']['title'] 		= 'Tour';
		$obj['hotel']['title'] 		= 'Khách sạn';
		$obj['flight']['title'] 	= 'Vé máy bay';
		$obj['vehicle']['title'] 	= 'Vé tàu';
		
		$obj['tour_seft']['read'] 	= $this->dashboard_model->get_statistic_read_tour_book_seft();
		$obj['tour']['read'] 		= $this->dashboard_model->get_statistic_read_tour_book();
		$obj['hotel']['read']		= $this->dashboard_model->get_statistic_read_hotel_book();
		$obj['flight']['read'] 		= $this->dashboard_model->get_statistic_read_flight_book();
		$obj['vehicle']['read'] 	= $this->dashboard_model->get_statistic_read_vehicle_book();
		
		$obj['tour_seft']['check'] 	= $this->dashboard_model->get_statistic_check_tour_book_seft();
		$obj['tour']['check'] 		= $this->dashboard_model->get_statistic_check_tour_book();
		$obj['hotel']['check']		= $this->dashboard_model->get_statistic_check_hotel_book();
		$obj['flight']['check'] 	= $this->dashboard_model->get_statistic_check_flight_book();
		$obj['vehicle']['check'] 	= $this->dashboard_model->get_statistic_check_vehicle_book();
		
		$data['data'] = $obj;
		$data['namesite'] = $this->setting->item('namesite');
		$data['logo'] = site_url($this->setting->item('logo'));
		$this->load->view('dashboard', $data);
	}
}