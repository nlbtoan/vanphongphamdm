<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tour extends MY_Base
{
	public function __construct() {
		
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->library('Lib_Tour');
        $this->lang->load('front_end/layout');
		$this->load->library('pagination');

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		
	}

	public function index() { 
		$this->show();
		
	}
	
	public function show($cat_id = FALSE)
	{		
		$limit = 6;
		$offset = intval($this->uri->segment(4));

		//data cho page
		$data['data'] = $this->tour_model->get_data_cat($cat_id, $count, $limit, $offset);
		
		$category_name = $this->tour_model->get_cat_data_info($cat_id);
		$data['category_name'] = $category_name['name'];
		
		//config paging
		$config['base_url'] = site_url($this->router->class.'/show/'.$cat_id);
		$config['total_rows'] = $count;
		$config['per_page'] = $limit;
		$config['num_links'] = 10;
		$config['uri_segment'] = 4;
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
	
	public function detail( $id = false){
			
		if( $id ){
			
			$info = $this->tour_model->get_data_info_with_lang($id);
			
			if ( !empty($info) ){
				
				$data['data'] = $info;
				
				$data['title'] = $info['title'];
				$view = $this->load->view($this->router->class.'/detail', $data, true);
				
				if ( $info['list_images'] != '0') {
					$master_data['list_images'] = explode(',', $info['list_images']);
				}
				
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
	
	public function book( $id = false){

		if( $id ){
			
			$info = $this->tour_model->get_data_info_with_lang($id);
			//echo('<pre>');var_dump($info);die();
			if ( !empty($info) ){
				
				$data['data'] = $info;
				
				$data['title'] = $info['title'];
				
				$v = $info['name_type'] == "outbound" ? "_outbound" : "";
				
				$view = $this->load->view($this->router->class.'/book'.$v, $data, true);
				
				$master_data['content'] = $view;
				$master_data['title'] = $this->setting->item('namesite');
				
				$this->load->view('travel_not_right', $master_data);
				
			} else{
				redirect($this->router->class);
			}
			
		} else {
			redirect($this->router->class);
		}	
		
	}
	
	public function send_info(){
		
		$this->form_validation->set_rules('fullname', lang('fullname'), 'required');
		$this->form_validation->set_rules('phone', lang('phone'), 'required');
		$this->form_validation->set_rules('email', lang('email'), 'required|valid_email');
		$this->form_validation->set_rules('total_person', lang('total_person'), 'required|is_natural_no_zero');
		$this->form_validation->set_rules('date_start', lang('date_start'), 'required');
		

		if ( $this->form_validation->run() == true ){
			
			$object['tour_id'] = $this->input->post('tour');
			$object['fullname'] = $this->input->post('fullname');
			$object['total_person'] = $this->input->post('total_person');
			$object['address'] = $this->input->post('address');
			$object['phone'] = $this->input->post('phone');
			$object['email'] = $this->input->post('email');
			$object['nation'] = $this->input->post('nation');
			$object['tax_code'] = $this->input->post('tax_code');
			$object['company'] = $this->input->post('company');
			$object['date_start'] = strtotime($this->input->post('date_start'));
			$object['adult'] = $this->input->post('adult');
			$object['child'] = $this->input->post('child');
			$object['baby'] = $this->input->post('baby');
			$object['other_requirement'] = $this->input->post('other_requirement');
			$object['payment_method'] = $this->input->post('payment_method');
			
			$object['list_name'] = $this->input->post('txt_name');
			$object['list_birthday'] = $this->input->post('txt_birthday');
			$object['list_sex'] = $this->input->post('sl_sex');
			$object['list_age'] = $this->input->post('sl_age');
			$object['list_single_room'] = $this->input->post('sl_single_room');
			
			$object['list_address'] = $this->input->post('txt_address');
			$object['list_customer_based'] = $this->input->post('sl_customer_based');
			
			$object['list_date_issue'] = $this->input->post('txt_date_issue');
			$object['list_date_expiry'] = $this->input->post('txt_date_expiry');
			$object['list_passport'] = $this->input->post('txt_passport');

			//Insert
			if($this->lib_tour->create_book( $object ))
			{
				$data['success'] = '<p>'.lang('book_successfully').'</p>';
				//send email
				$this->load->library('email');
				$subject = "[Tour Booking] " . date('h:i:s - d/m/Y', time()-3600);
				$content = "Thông tin liên lạc người đại diện:<br/><br/>";
				$content .= "<b>Họ tên</b>: ".$object['fullname']."<br/>";
				$content .= "<b>Điện thoại</b>: ".$object['phone']."<br/>";
				$content .= "<b>Email</b>: ".$object['email']."<br/>";
				$this->email->notify_mail($subject, $content);
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
										array( 'date_start' , form_error('date_start') )
										);
		}
		
		if ($this->input->server('HTTP_X_REQUESTED_WITH') && ($this->input->server('HTTP_X_REQUESTED_WITH') == 'XMLHttpRequest')) {
			echo json_encode($data);
			exit;
		}
		
		return $data;
		
	}
	
	public function book_seft(){
		
		$data['title'] = lang('book');
		$data['cb_region'] = $this->lib_tour->region_combobox();
		$view = $this->load->view($this->router->class.'/book_seft', $data, true);
				
		$master_data['content'] = $view;
		$master_data['title'] = $this->setting->item('namesite');
		
		$this->load->view('travel_not_right', $master_data);
		
	}
	
	public function send_seft(){
		
		$this->form_validation->set_rules('fullname', lang('fullname'), 'required');
		$this->form_validation->set_rules('phone', lang('phone'), 'required');
		$this->form_validation->set_rules('email', lang('email'), 'required|valid_email');
		$this->form_validation->set_rules('total_person', lang('total_person'), 'required|is_natural_no_zero');
		$this->form_validation->set_rules('date_start', lang('date_start'), 'required');
		$this->form_validation->set_rules('date_end', lang('date_end'), 'required');
		

		if ( $this->form_validation->run() == true ){
		
			$object['fullname'] = $this->input->post('fullname');
			$object['phone'] = $this->input->post('phone');
			$object['email'] = $this->input->post('email');
			
			$object['address'] = $this->input->post('address');
			$object['company'] = $this->input->post('company');
			$object['tax_code'] = $this->input->post('tax_code');
			
			$object['date_start'] = strtotime($this->input->post('date_start'));
			$object['date_end'] = strtotime($this->input->post('date_end'));
			$object['place_visit'] = implode(",", $this->input->post('place_visit'));
			$object['place_other'] = $this->input->post('place_other');
			
			$object['total_person'] = $this->input->post('total_person');
			$object['adult'] = $this->input->post('adult');
			$object['child'] = $this->input->post('child');
			$object['baby'] = $this->input->post('baby');
			
			$object['single_room'] = $this->input->post('single_room');
			$object['double_room'] = $this->input->post('double_room');
			$object['family_room'] = $this->input->post('family_room');
			$object['transport'] = $this->input->post('transport');
			$object['other_requirement'] = $this->input->post('other_requirement');
			$object['payment_method'] = $this->input->post('payment_method');
			
			$object['list_name'] = $this->input->post('txt_name');
			$object['list_birthday'] = $this->input->post('txt_birthday');
			$object['list_sex'] = $this->input->post('sl_sex');
			$object['list_age'] = $this->input->post('sl_age');
			$object['list_single_room'] = $this->input->post('sl_single_room');
			
			$object['list_address'] = $this->input->post('txt_address');
			$object['list_customer_based'] = $this->input->post('sl_customer_based');
			
			$object['list_date_issue'] = $this->input->post('txt_date_issue');
			$object['list_date_expiry'] = $this->input->post('txt_date_expiry');
			$object['list_passport'] = $this->input->post('txt_passport');

			//Insert
			if($this->lib_tour->create_book_seft( $object ))
			{
				$data['success'] = '<p>'.lang('book_successfully').'</p>';
				//send email
				$this->load->library('email');
				$subject = "[Tour Booking] " . date('h:i:s - d/m/Y', time()-3600);
				$content = "Tour tự thiết kế - Thông tin liên lạc người đại diện:<br/><br/>";
				$content .= "<b>Họ tên</b>: ".$object['fullname']."<br/>";
				$content .= "<b>Điện thoại</b>: ".$object['phone']."<br/>";
				$content .= "<b>Email</b>: ".$object['email']."<br/>";
				$this->email->notify_mail($subject, $content);
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
										array( 'date_end' , form_error('date_end') )
										);
		}
		
		if ($this->input->server('HTTP_X_REQUESTED_WITH') && ($this->input->server('HTTP_X_REQUESTED_WITH') == 'XMLHttpRequest')) {
			echo json_encode($data);
			exit;
		}
		
		return $data;
		
	}
	
	public function send_mail(){
		
		$this->form_validation->set_rules('sm_name', lang('name'), 'required|xss_clean');
		$this->form_validation->set_rules('sm_email_from', lang('email_from'), 'required|valid_email|xss_clean');
		$this->form_validation->set_rules('sm_email_to', lang('email_to'), 'required|valid_emails|xss_clean');
		$this->form_validation->set_rules('sm_email_cc', lang('email_cc'), 'valid_emails|xss_clean');
		$this->form_validation->set_rules('sm_email_subject', lang('email_subject'), 'required|xss_clean');
		$this->form_validation->set_rules('sm_email_content', lang('email_content'), 'required|xss_clean');
		
		if ( $this->form_validation->run() == true ){
		
			
			$email_to = $this->input->post('sm_email_to');
			$email_cc = $this->input->post('sm_email_cc');
			$email_subject = $this->input->post('sm_email_subject');
			
			$data_email['email_from'] = $this->input->post('sm_email_from');
			$data_email['email_name'] = $this->input->post('sm_name');
			$data_email['email_content'] = $this->input->post('sm_email_content');
			$data_email['title'] = $this->input->post('hd_title');
			$data_email['link'] = $this->input->post('hd_link');
			
			$this->load->library('email');
			
			$content = $this->load->view('tour/panel_sendemail', $data_email, true);
			
			if ( ! $this->email->send_mail($email_to, $email_cc, $email_subject, $content) )
			{
			    // Generate error
			    $data['error'] = '<p>'.lang('send_email_unsuccessfully').'</p>';
			} else {
				$data['success'] = '<p>'.lang('send_email_successfully').'</p>';
			}
		} else {
			
			$data['validation'] = array(
										array( 'sm_name',form_error('sm_name') ),
										array( 'sm_email_from' , form_error('sm_email_from') ),
										array( 'sm_email_to' , form_error('sm_email_to') ),
										array( 'sm_email_cc' , form_error('sm_email_cc') ),
										array( 'sm_email_subject' , form_error('sm_email_subject') ),
										array( 'sm_email_content' , form_error('sm_email_content') )
										);
		}
		
		if ($this->input->server('HTTP_X_REQUESTED_WITH') && ($this->input->server('HTTP_X_REQUESTED_WITH') == 'XMLHttpRequest')) {
			echo json_encode($data);
			exit;
		}
		
		return $data;
	}
	
	public function search()
	{
		if(empty($_POST['txtsearch']))
		{
			$txtsearch = "";
		}
		else
		{
			$txtsearch = $this->input->xss_clean($_POST['txtsearch']);
			if($txtsearch != $_POST['txtsearch']) $txtsearch = "";
		}
		$typetour = $_POST['typetour'];
		
		$hash =  $this->encrypt->sha1("$typetour/$txtsearch");
		$this->tour_model->add_search($hash, $typetour, $txtsearch);
		
		redirect("tour/do_search/$hash");
	}

	public function do_search( $hash = "" )
	{
		$limit = 5;
		$uri_search = $this->tour_model->get_search( $hash );
		$arr_search = explode('/', $uri_search);
		$typetour = $arr_search[0];
		$txtsearch = $arr_search[1];
		$offset = intval($this->uri->segment(4));
		
		$data['data'] = $this->tour_model->search( $count, $typetour, $txtsearch, $limit, $offset );
		
		//config paging
		$config['base_url'] = site_url($this->router->class."/do_search/$hash");
		$config['total_rows'] = $count;
		$config['per_page'] = $limit;
		$config['num_links'] = 10;
		$config['uri_segment'] = 4;
		$config['first_link'] = lang('first_link');
		$config['last_link'] = lang('last_link');
		
		//Khoi tao paging
		$this->pagination->initialize($config);
		
		$data['result'] = sprintf(lang('tour_search_result'), $count, $txtsearch);
		$data['title'] = lang('tour_search_title');
		$view = $this->load->view($this->router->class.'/search', $data, true);
		
		$master_data['content'] = $view;
		$master_data['title'] = $this->setting->item('namesite');
		
		$this->theme->output($master_data);
	}
}