<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotel extends MY_Base
{
	public function __construct() {
		
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->library('Lib_Hotel');
 		$this->lang->load('front_end/layout');
 		$this->lang->load('front_end/hotel'); 
		$this->load->library('pagination');

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');

		
	}

	public function index() { 
		$this->show();
		
	}
	
	public function show(){	
		
		$limit = 5;
		$offset = intval($this->uri->segment(3, 0));

		//data cho page
		$data['data'] = $this->hotel_model->get_data_count_front($count, $limit, $offset);
		
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
		
		$data['title'] = lang('hotel');
		$view = $this->load->view($this->router->class.'/default', $data, true);
		
		$master_data['content'] = $view;
		$master_data['title'] = $this->setting->item('namesite');
		
		$this->theme->output($master_data);
		
	}
	
	public function detail( $id = false){

		if( $id ){
			
			$info = $this->hotel_model->get_data_info($id);
			
			if ( !empty($info) ){
				//var_dump($info);die();
				$data['room'] = $this->hotel_model->get_room_by_hotel_id($info[0]['id']);
				$data['hotel'] = $this->hotel_model->get_data('id, image, name');
				
				$data['data'] = $info[0];
				
				$data['title'] = $info[0]['name'];
				$view = $this->load->view($this->router->class.'/detail', $data, true);
				
				$master_data['content'] = $view;
				$master_data['title'] = $this->setting->item('namesite');
		
		$this->theme->output($master_data);
				
			} else{
				redirect($this->router->class);
			}
			
		} else {
			redirect($this->router->class);
		}	
		
	}
	
	public function book($id = false){	
		
		$data['list_data'] = $this->hotel_model->get_hotel('id, level, name');
		$data['html_hotel_info'] = "";
		$data['data_info']['name'] = "";
		if ( $id ){
			$data['data_info'] = $this->hotel_model->get_hotel_info($id, 'id, level, image, web, name, address, short_introduce, full_introduce');
			$data['html_hotel_info'] = !empty($data['data_info']) ? $this->load->view($this->router->class.'/panel_hotel', $data, true) : "";
		}
		
		$data['data_info']['id'] = $id;
		
		if ($this->input->server('HTTP_X_REQUESTED_WITH') && ($this->input->server('HTTP_X_REQUESTED_WITH') == 'XMLHttpRequest')) {
			$j_data['html'] = $data['html_hotel_info'];
			$j_data['name'] = $data['data_info']['name'];
			$j_data['id'] = $id;
			echo json_encode($j_data);
			exit;	
		}
		
		$data['title'] = lang('book_hotel');
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
		$this->form_validation->set_rules('check_in', lang('check_in'), 'required');
		$this->form_validation->set_rules('check_out', lang('check_out'), 'required');
		

		if ( $this->form_validation->run() == true ){
			
			$object['fullname'] = $this->input->post('fullname');
			$object['total_person'] = $this->input->post('total_person');		
			$object['adult'] = $this->input->post('adult');
			$object['child'] = $this->input->post('child');
			$object['baby'] = $this->input->post('baby');			
			$object['address'] = $this->input->post('address');
			$object['phone'] = $this->input->post('phone');
			$object['email'] = $this->input->post('email');
			$object['tax_code'] = $this->input->post('tax_code');
			$object['company'] = $this->input->post('company');
			$object['check_in'] = strtotime($this->input->post('check_out'));
			$object['check_out'] = strtotime($this->input->post('check_in'));
			$object['other_requirement'] = $this->input->post('other_requirement');
			$object['payment_method'] = $this->input->post('payment_method');
			$object['hotel_id'] = $this->input->post('hotel_id');
			
			$object['single_room'] = $this->input->post('single_room');
			$object['double_room'] = $this->input->post('double_room');
			$object['family_room'] = $this->input->post('family_room');
			
			//Insert
			if($this->lib_hotel->create_book( $object ))
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
										array( 'check_in' , form_error('check_in') ),
										array( 'check_out' , form_error('check_out') )
										);
		}
		
		if ($this->input->server('HTTP_X_REQUESTED_WITH') && ($this->input->server('HTTP_X_REQUESTED_WITH') == 'XMLHttpRequest')) {
			echo json_encode($data);
			exit;
		}
		
		return $data;
		
	}

}