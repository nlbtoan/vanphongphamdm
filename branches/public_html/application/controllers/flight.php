<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Flight extends MY_Base
{
	public function __construct() {
		
		parent::__construct();
		
		$this->load->helper('form');
		
		$this->lang->load('front_end/flight');
 		$this->lang->load('front_end/layout');
 		 
		$this->load->library('pagination');
		$this->load->library('Lib_Flight');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	}

	public function index() { 
		$this->show();
	}
	
	public function show()
	{	
		$data['title'] = lang('title');
		$flight = $this->flight_model->get_flight_all();
		foreach( $flight as $item )
		{
			if($item['active'] == 1)
			{
				$row = $item;
				$row['flight_to'] = $this->flight_model->get_flight_info_to($item['id']);
				$row['flight_from'] = $this->flight_model->get_flight_info_from($item['id']);
				$data['flight'][] = $row;
			}
		}

		$view = $this->load->view($this->router->class.'/default', $data, true);
		
		$master_data['content'] = $view;
		$master_data['title'] = $this->setting->item('namesite');
		
		$this->theme->output($master_data);
		
	}
	
	public function book(){	
		
		$data['title'] = lang('book_flight');
		$view = $this->load->view($this->router->class.'/book', $data, true);
		
		$master_data['content'] = $view;
		$master_data['title'] = $this->setting->item('namesite');
		
		$this->load->view('travel_not_right', $master_data);

		
	}
	
	public function send_info(){
		
		$this->form_validation->set_rules('fullname', lang('fullname'), 'required');
		$this->form_validation->set_rules('phone', lang('phone'), 'required');
		$this->form_validation->set_rules('email', lang('email'), 'required|valid_email');
		$this->form_validation->set_rules('total_person', lang('total_person'), 'required|is_natural_no_zero');
		$this->form_validation->set_rules('date_start', lang('date_start'), 'required');
		$this->form_validation->set_rules('departure', lang('departure'), 'required');
		$this->form_validation->set_rules('arrival', lang('arrival'), 'required');
		

		if ( $this->form_validation->run() == true ){
			
			$object['fullname'] = $this->input->post('fullname');
			$object['total_person'] = $this->input->post('total_person');		
			$object['adult'] = $this->input->post('adult');
			$object['child'] = $this->input->post('child');
			$object['baby'] = $this->input->post('baby');			
			$object['address'] = $this->input->post('address');
			$object['phone'] = $this->input->post('phone');
			$object['email'] = $this->input->post('email');
			$object['nation'] = $this->input->post('nation');
			$object['tax_code'] = $this->input->post('tax_code');
			$object['company'] = $this->input->post('company');
			$object['date_start'] = strtotime($this->input->post('date_start'));
			$object['departure'] = $this->input->post('departure');
			$object['arrival'] = $this->input->post('arrival');
			$object['other_requirement'] = $this->input->post('other_requirement');
			$object['type_ticket'] = $this->input->post('type_ticket');
			$object['payment_method'] = $this->input->post('payment_method');
			
			$object['list_name'] = $this->input->post('txt_name');
			$object['list_birthday'] = $this->input->post('txt_birthday');
			$object['list_address'] = $this->input->post('txt_address');
			$object['list_sex'] = $this->input->post('sl_sex');
			$object['list_age'] = $this->input->post('sl_age');
			
			//Insert
			if($this->lib_flight->create_book( $object ))
			{
				$data['success'] = '<p>'.lang('book_successfully').'</p>';
			}
			else
			{
				$data['error'] = '<p>'.lang('book_unsuccessfully').'</p>';
			}
			
		} else {
			//$data['error'] = $this->auth->errors();
			$data['validation'] = array(
										array( 'fullname',form_error('fullname') ),
										array( 'phone' , form_error('phone') ),
										array( 'email' , form_error('email') ),
										array( 'total_person' , form_error('total_person') ),
										array( 'date_start' , form_error('date_start') ),
										array( 'departure' , form_error('departure') ),
										array( 'arrival' , form_error('arrival') )
										);
		}
		
		if ($this->input->server('HTTP_X_REQUESTED_WITH') && ($this->input->server('HTTP_X_REQUESTED_WITH') == 'XMLHttpRequest')) {
			echo json_encode($data);
			exit;
		}
		
		return $data;
		
	}
	
}