<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Flight extends MY_Admin
{
	public function __construct()
	{
		parent::__construct();
		
		##--LOAD LIBRARY--##
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('Lib_Flight');
		$this->lang->load('language_code');

		##--LOAD MODEL--##
		$this->load->model('flight_model');

		##--FIRST FIX--##
		$this->form_validation->set_error_delimiters('<li>', '</li>');
	}
	

	public function index()
	{
		$this->manage();
	}
	
	public function manage()
	{
		//set per_page paging
		if($this->input->post('select_per_page'))
		{
			$this->pagination->set_per_page($this->input->post('select_per_page'));
		}
		
		//Lay limit trong database
		$limit = $this->pagination->get_per_page();
		$offset = intval($this->uri->segment(4));

		// data table
		$data['data'] = $this->flight_model->get_flight($count, $limit, $offset);

		//config paging
		$config['base_url'] = site_url("/admin/flight/manage");
		$config['total_rows'] = $count;
		$config['per_page'] = $limit;
		$config['num_links'] = $this->pagination->get_config('num_links');
		$config['uri_segment'] = 4;
		$config['first_link'] = lang('first_link');
		$config['last_link'] = lang('last_link');

		//Khoi tao paging
		$this->pagination->initialize($config);

		//Xay ra khi co action delete
		$delete_talk = $this->session->flashdata('delete_talk');
		if( !empty($delete_talk) )
		{
			$data['message'] = $delete_talk;
			$this->session->keep_flashdata('delete_talk');
		}

		//load view
		$this->load->view('flight/manage', $data);
	}
	
	public function manage_flight( $cat_id = FALSE)
	{
		//Neu khong co co id category se chuyen qua trang manage category
		if($cat_id == FALSE) redirect('admin/news');
		
		//Luu url trang hien tai cho cac trang sau se back tro lai
		$this->session->set_userdata('back_url', current_url());

		// data table
		$data['data']['to'] 	= $this->flight_model->get_flight_info_to($cat_id);
		$data['data']['from'] 	= $this->flight_model->get_flight_info_from($cat_id);
		$data['data']['flight'] = $this->flight_model->get_info_by_id($cat_id);
		
		//Truyen id ra ngoai view
		$data['current_cat'] = $cat_id;

		//Xay ra khi co action delete
		$delete_talk = $this->session->flashdata('delete_talk');
		if( !empty($delete_talk) )
		{
			$data['message'] = $delete_talk;
			$this->session->keep_flashdata('delete_talk');
		}

		//load view
		$this->load->view('flight/manage_flight', $data);
	}
	
	public function create()
	{	
		$this->form_validation->set_rules('to', 'lang:flight_to', 'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('from', 'lang:flight_from', 'required|max_length[50]|xss_clean');

		//Form post = TRUE
		if ($this->form_validation->run() == TRUE)
		{
			$row['to'] 			= $this->input->post('to');
			$row['from'] 		= $this->input->post('from');
			$row['transit'] 	= $this->input->post('transit');
			$row['active'] 		= $this->input->post('active');
			//Insert
			if( $this->lib_flight->create($row) )
			{
				$this->session->set_flashdata('message', $this->lib_flight->messages());
				redirect("admin/flight/create");
			}
			else
			{
				//Luu data post khi loi xay ra
				$data['restore_data'] = $_POST;
				
				//Neu xay ra loi trong luc insert
				$data['message'] = message($this->lib_flight->errors(), 'error');
				$this->load->view('flight/create', $data);
			}
		}
		else
		{
			//Luu data post khi loi xay ra
			if(! empty($_POST) ) $data['restore_data'] = $_POST;
			
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('flight/create', $data);
		}
	}
	
	public function create_flight()
	{
		//Lay duong dan trang truoc no'
		$data['back_url'] = $this->session->userdata('back_url');
		
		//Lay group_id tren back_url
		$data['current_cat'] = end( explode('/', $data['back_url']) );
		
		$this->form_validation->set_rules('flight_code', 	'lang:flight_code', 'required|max_length[20]|xss_clean');
		$this->form_validation->set_rules('time_departure', 'lang:time_departure', 'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('time_arrival', 	'lang:time_arrival', 'required|max_length[50]|xss_clean');

		//Form post = TRUE
		if ($this->form_validation->run() == TRUE)
		{
			$row['flight_code'] 		= $this->input->post('flight_code');
			$row['time_departure'] 		= $this->input->post('time_departure');
			$row['time_arrival'] 		= $this->input->post('time_arrival');
			$row['flight_id'] 			= $this->input->post('flight_id');
			$row['is_go'] 				= $this->input->post('is_go');
			
			//Insert
			if( $this->lib_flight->create_flight($row) )
			{
				$this->session->set_flashdata('message', $this->lib_flight->messages());
				redirect("admin/flight/create_flight");
			}
			else
			{
				//Luu data post khi loi xay ra
				$data['restore_data'] = $_POST;
				
				//Neu xay ra loi trong luc insert
				$data['message'] = message($this->lib_flight->errors(), 'error');
				$this->load->view('flight/create_flight', $data);
			}
		}
		else
		{
			//Luu data post khi loi xay ra
			if(! empty($_POST) ) $data['restore_data'] = $_POST;
			
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('flight/create_flight', $data);
		}
	}
	
	public function update()
	{
		$current_url = 'admin/flight';
		
		$this->form_validation->set_rules('id', 'required | is_natural');
		$this->form_validation->set_rules('current_url', 'required');
		
		if( $this->form_validation->run() == TRUE )
		{ 
			//MUTIL UPDATE
			if( $this->input->post('id') !== FALSE
				&& $this->input->post('action') !== FALSE)
			{
				$id = $this->input->post('id');
				$action = $this->input->post('action');
				
				/**
				 * action == publish
				 * set publish and unpublish
				 */
				if( $this->input->post('active') !== FALSE && $action == 'publish' )
				{
					$active = $this->input->post('active');
					$this->lib_flight->active($id, $active);
				}
			}//if
		}//if
		redirect($current_url);
	}
	
	public function edit( $id = FALSE )
	{	
		if($id == FALSE)
		{
			redirect('admin/flight');
		}
		
		(empty($_POST)) ? $data['info'] = $this->flight_model->get_info($id) : $data['info'] = $_POST;
		
		$data['info']['id'] = $id;
		
		if( empty($data['info']) )
		{
			redirect('admin/flight');
		}
		
		$this->form_validation->set_rules('to', 'lang:flight_to', 'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('from', 'lang:flight_from', 'required|max_length[50]|xss_clean');
		
		if( $this->form_validation->run() == TRUE )
		{ 
			$row['id'] 			= $id;
			$row['to'] 			= $this->input->post('to');
			$row['from'] 		= $this->input->post('from');
			$row['transit'] 	= $this->input->post('transit');
			$row['active'] 		= $this->input->post('active');
							
			//Update
			if( $this->lib_flight->update($row) )
			{
				$this->session->set_flashdata('message', $this->lib_flight->messages());
				redirect("admin/flight/edit/" . $id);
			}
			else
			{
				//Neu xay ra loi trong luc insert
				$data['message'] = message($this->lib_flight->errors(), 'error');
				$this->load->view('flight/update', $data);
			}
		}//if
		else
		{
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('flight/update', $data);
		}
	}
	
	public function edit_flight()
	{
		$id = $this->uri->segment(4);
		
		if($id == FALSE)
		{
			redirect('admin/flight');
		}
		
		(empty($_POST)) ? $data['info'] = $this->flight_model->get_info($id) : $data['info'] = $_POST;
		
		$data['info']['id'] = $id;
		
		if( empty($data['info']) )
		{
			redirect('admin/flight');
		}
		
		//Lay duong dan trang truoc no'
		$data['back_url'] = $this->session->userdata('back_url');
		
		/********************* Kiem tra va create ***********************/
		$this->form_validation->set_rules('flight_code', 	'lang:flight_code', 'required|max_length[20]|xss_clean');
		$this->form_validation->set_rules('time_departure', 'lang:time_departure', 'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('time_arrival', 	'lang:time_arrival', 'required|max_length[50]|xss_clean');
		
		if( $this->form_validation->run() == TRUE )
		{ 
			$row['id'] 					= $id;
			$row['flight_code'] 		= $this->input->post('flight_code');
			$row['time_departure'] 		= $this->input->post('time_departure');
			$row['time_arrival'] 		= $this->input->post('time_arrival');
			$row['is_go'] 				= $this->input->post('is_go');
			
			//Update
			if( $this->lib_flight->update_flight($row) )
			{
				$this->session->set_flashdata('message', $this->lib_flight->messages());
				redirect("admin/flight/edit_flight/" . $id);
			}
			else
			{
				//Neu xay ra loi trong luc insert
				$data['message'] = message($this->lib_flight->errors(), 'error');
				$this->load->view('flight/update_flight', $data);
			}
		}//if
		else
		{
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('flight/update_flight', $data);
		}
	}
	
	public function delete()
	{
		$delete_talk = array();
		
		$this->form_validation->set_rules('id', 'ID', 'required | is_natural');
		
		if ( $this->form_validation->run() == TRUE )//Post xay ra
		{
			//Xoa 1 hoac nhieu
			if ( $id = $this->input->post('id') )
			{
				$delete = $this->lib_flight->delete($id);
			}
		}
		
		if( $this->lib_flight->messages() )
		{
			$delete_talk[] = message($this->lib_flight->messages(), 'info');
		}
		if( $this->lib_flight->errors() )
		{
			$delete_talk[] = message($this->lib_flight->errors(), 'error');
		}
		
		$this->session->set_flashdata('delete_talk', $delete_talk);

		redirect("admin/flight/manage");
	}
	
	public function delete_flight()
	{
		$current_url = 'admin/flight';
		
		$delete_talk = array();
		
		$this->form_validation->set_rules('id', 'ID', 'required | is_natural');
			
		if ( $this->form_validation->run() == TRUE )//Post xay ra
		{
			//Xoa 1 hoac nhieu
			if ( $id = $this->input->post('id') )
			{
				$delete = $this->lib_flight->delete_flight($id);
			}
			
			if( $this->input->post('current_url') )
			{
				$current_url = $this->input->post('current_url');
			}
		}
		
		if( $this->lib_flight->messages() )
		{
			$delete_talk[] = message($this->lib_flight->messages(), 'info');
		}
		if( $this->lib_flight->errors() )
		{
			$delete_talk[] = message($this->lib_flight->errors(), 'error');
		}
		
		$this->session->set_flashdata('delete_talk', $delete_talk);

		redirect($current_url);
	}
	
	function manage_book(){
		
		//Luu url trang hien tai cho cac trang sau se back tro lai
		$this->session->set_userdata('back_url', current_url());
			
		//set per_page paging
		if($this->input->post('select_per_page'))
		{
			$this->pagination->set_per_page($this->input->post('select_per_page'));
		}

		//Lay limit trong database
		$limit = $this->pagination->get_per_page();
		$offset = intval($this->uri->segment(4, 0));

		//data cho page
		$data['data'] = $this->flight_model->get_data_book_count($count, $limit, $offset);
		
		//config paging
		$config['base_url'] = site_url("/admin/".$this->router->class."/manage_book");
		$config['total_rows'] = $count;
		$config['per_page'] = $this->pagination->get_per_page();
		$config['num_links'] = $this->pagination->get_config('num_links');
		$config['uri_segment'] = 4;
		$config['first_link'] = lang('first_link');
		$config['last_link'] = lang('last_link');
	
		//Khoi tao paging
		$this->pagination->initialize($config);

		$this->load->view($this->router->class.'/manage_book', $data);
		
	}
	
	public function update_book(){
		
		$current_url = 'admin/'.$this->router->class.'/manage_book';

		$this->form_validation->set_rules('id', 'required | is_natural');
		$this->form_validation->set_rules('current_url', 'required');

		if( $this->form_validation->run() == TRUE )
		{
			//MUTIL UPDATE
			if( $this->input->post('id') !== FALSE
			&& $this->input->post('action') !== FALSE)
			{
				$id = $this->input->post('id');
				$action = $this->input->post('action');

				/**
				 * action == publish
				 * set publish and unpublish
				 */
				if( $this->input->post('active') !== FALSE && $action == 'publish' )
				{
					$active = $this->input->post('active');
					$this->lib_flight->active_book($id, $active, 'is_checked');
				}

			}

			if( $this->input->post('current_url') )
			{
				$current_url = $this->input->post('current_url');
			}
			
		}

		redirect($current_url);

	}
	
	public function delete_book(){

		$delete_talk = array();

		$this->form_validation->set_rules('id', 'ID', 'required | is_natural ');

		if ( $this->form_validation->run() == TRUE )//Post xay ra
		{
			//Xoa 1 hoac nhieu
			if ( $id = $this->input->post('id') )
			{
				$delete = $this->lib_flight->delete_book( $id );
			}
		}

		if( $this->lib_flight->messages() )
		{
			$delete_talk[] = message($this->lib_flight->messages(), 'info');
		}
		if( $this->lib_flight->errors() )
		{
			$delete_talk[] = message($this->lib_flight->errors(), 'error');
		}

		$this->session->set_flashdata('delete_talk', $delete_talk);

		redirect("admin/".$this->router->class."/manage_book");

	}
	
	public function edit_book($id = false){

		//Lay duong dan trang truoc no'
		$data['back_url'] = $this->session->userdata('back_url');
		
		if ( $id != false ){
			
			$this->lib_flight->active_book( $id, 1, 'is_read' );
			
			$info = $this->flight_model->get_data_book_info($id);
			
			if ( $info != false ){
					
				/********************* Kiem tra va create ***********************/
				$this->form_validation->set_rules('fullname', lang('fullname'), 'required');
				$this->form_validation->set_rules('phone', lang('phone'), 'required');
				$this->form_validation->set_rules('email', lang('email'), 'required|valid_email');
				$this->form_validation->set_rules('total_person', lang('total_person'), 'required|is_natural_no_zero');
				$this->form_validation->set_rules('date_start', lang('date_start'), 'required');
				$this->form_validation->set_rules('departure', lang('departure'), 'required');
				$this->form_validation->set_rules('arrival', lang('arrival'), 'required');

				//Form post = TRUE
				if ($this->form_validation->run() == TRUE)
				{
					
					$object['id'] = $id;
					
					//same create
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
					
					$object['is_checked'] = $this->input->post('is_checked');
					
					$object['list_id'] = $this->input->post('hd_id');
					$object['list_name'] = $this->input->post('txt_name');
					$object['list_birthday'] = $this->input->post('txt_birthday');
					$object['list_address'] = $this->input->post('txt_address');
					$object['list_sex'] = $this->input->post('sl_sex');
					$object['list_age'] = $this->input->post('sl_age');
					
					$object['list_name_i'] = $this->input->post('txt_name_i');
					$object['list_birthday_i'] = $this->input->post('txt_birthday_i');
					$object['list_address_i'] = $this->input->post('txt_address_i');
					$object['list_sex_i'] = $this->input->post('sl_sex_i');
					$object['list_age_i'] = $this->input->post('sl_age_i');
						
					//Edit
					if( $this->lib_flight->edit_book( $object ) )
					{
						$this->session->set_flashdata('message',  message($this->lib_flight->messages()) );
						redirect("admin/".$this->router->class."/edit_book/".$id);
					}
					else
					{
						$this->session->set_flashdata('message', message($this->lib_flight->errors(), 'error'));
						redirect("admin/".$this->router->class."/edit_book/".$id);
					}
				}
				else
				{
					$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : $this->session->flashdata('message');
					if( !empty($_POST) ){
						$data['restore_data'] = $_POST;
					} else {
						$data['restore_data'] = $info;
					}
					$data['restore_data']['id'] = $id;
					
					//lay list person
					$data['list_person'] = $this->flight_model->get_list_person($id);

					$this->load->view($this->router->class.'/edit_book', $data);
				}

			}
			else {
				// id khong co trong CSDL
				redirect($data['back_url']);
			}
		}
		else {
			// khong co id tren link
			redirect($data['back_url']);
		}

	}
	
	function delete_book_detail(){
		$id = $this->input->post('id');
		$this->flight_model->delete_book_detail($id);
		
		$object['total_person'] = $this->input->post('total_person');
		$object['adult'] = $this->input->post('adult');
		$object['child'] = $this->input->post('child');
		$object['baby'] = $this->input->post('baby');
		$object['id'] = $this->input->post('book');
		
		$this->flight_model->update_person($object);
		
		$data['success'] = "Xóa người thành công";
		if ($this->input->server('HTTP_X_REQUESTED_WITH') && ($this->input->server('HTTP_X_REQUESTED_WITH') == 'XMLHttpRequest')) {
			echo json_encode($data);
			exit;
		}
		
	}
	
	//output exel
	function xsl($id){

		if ( $id != false ){

			$info = $this->flight_model->get_data_book_info($id);

			if ( $info != false ){
				
				$list_person = $this->flight_model->get_list_person($id);
				
				require_once APPPATH.'libraries/xls/Writer.php';
				$workbook = new Spreadsheet_Excel_Writer();
				$workbook->setVersion(8, 'utf-8');

				$format_bold =& $workbook->addFormat();
				$format_bold->setBold();

				$worksheet =& $workbook->addWorksheet();
				$worksheet->setInputEncoding('utf-8');
				
				//image gr
				$worksheet->insertBitmap(0, 1, FCPATH.'upload/image/xsl/logo.bmp', 35, 0, 0.4, 1);
				$worksheet->write(1, 2, "CÔNG TY CP DVDL & TM HÀNH TRÌNH XANH");
				$worksheet->write(2, 2, "14  Trần Hưng Đạo, Dương Đông, Phú Quốc, Kiên Giang");
				$worksheet->write(3, 2, "MST :");
				$worksheet->write(3, 3, "1701416181", $workbook->addFormat(array('Align' => 'left')));
				
				$star_r = 7;
				$star_c = 1;
				
				$f_l_title =& $workbook->addFormat();
				$f_l_title->setBold();
				$f_l_title->setAlign('left');
				$f_l_title->setAlign('vcenter');
				
				$f_til =& $workbook->addFormat();
				$f_til->setAlign('right');
				$f_til->setAlign('vcenter');
				
				$f_val =& $workbook->addFormat();
				$f_val->setBold();
				$f_val->setAlign('left');
				$f_val->setAlign('vcenter');
				
				$book_id 		= $info['id'];
				$date			= date('Ymd', $info['date']);
				$date_start		= date('d/m/Y', $info['date_start']);
				$fullname 		= $info['fullname'];
				$phone 			= $info['phone'];
				$email 			= $info['email'];
				$address		= $info['address'];
				$company		= $info['company'];
				$tax_code		= $info['tax_code'];
				$total_person 	= $info['total_person'];
				$adult 			= $info['adult'];
				$child			= $info['child'];
				$baby			= $info['baby'];
				$departure 		= $info['departure'];
				$arrival 		= $info['arrival'];
				$type_ticket 	= $info['type_ticket'];
				$arr_type_ticket= array('1 chiều', 'Khứ hồi'); 
				
				$star_r+=2;
				$worksheet->mergeCells($star_r, $star_c, $star_r, $star_c+1);
				$worksheet->write($star_r, $star_c, "THÔNG TIN", $f_l_title);
				$star_r++;
				$worksheet->write($star_r, $star_c, "Họ tên:", $f_til);
				$worksheet->write($star_r, $star_c+1, $fullname, $f_val);
				$star_r++;
				$worksheet->write($star_r, $star_c, "Điện thoại:", $f_til);
				$worksheet->write($star_r, $star_c+1, $phone, $f_val);
				$star_r++;
				$worksheet->write($star_r, $star_c, "Email:", $f_til);
				$worksheet->write($star_r, $star_c+1, $email, $f_val);
				$star_r++;
				$worksheet->write($star_r, $star_c, "Địa chỉ:", $f_til);
				$worksheet->write($star_r, $star_c+1, $address, $f_val);
				$star_r++;
				$worksheet->write($star_r, $star_c, "Công ty:", $f_til);
				$worksheet->write($star_r, $star_c+1, $company, $f_val);
				$star_r++;
				$worksheet->write($star_r, $star_c, "Mã số thuế:", $f_til);
				$worksheet->write($star_r, $star_c+1, $tax_code, $f_val);
				$star_r++;
				$worksheet->write($star_r, $star_c, "Ngày khởi hành:", $f_til);
				$worksheet->write($star_r, $star_c+1, $date_start, $f_val);
				$star_r++;
				$worksheet->write($star_r, $star_c, "Từ:", $f_til);
				$worksheet->write($star_r, $star_c+1, $departure, $f_val);
				$star_r++;
				$worksheet->write($star_r, $star_c, "Đến:", $f_til);
				$worksheet->write($star_r, $star_c+1, $arrival, $f_val);
				$star_r++;
				$worksheet->write($star_r, $star_c, "Vé:", $f_til);
				$worksheet->write($star_r, $star_c+1, $arr_type_ticket[$type_ticket], $f_val);
				
				$star_row = $star_r+2;
				$star_col = 0;
				
				$worksheet->mergeCells($star_row, $star_col, $star_row, $star_col + 8);
				$worksheet->write($star_row, $star_c, "DANH SÁCH ĐOÀN KHÁCH", $f_l_title);
					
				$star_row+=2;
				$worksheet->write($star_row, $star_col+1, 'Người lớn', $f_til);
				$worksheet->write($star_row, $star_col+2, $adult, $f_til);
				$star_row++;
				$worksheet->write($star_row, $star_col+1, 'Trẻ em', $f_til);
				$worksheet->write($star_row, $star_col+2, $child, $f_til);
				$star_row++;
				$worksheet->write($star_row, $star_col+1, 'Trẻ nhỏ', $f_til);
				$worksheet->write($star_row, $star_col+2, $baby, $f_til);
				$star_row++;
				$worksheet->write($star_row, $star_col+1, 'Tổng số người', $f_til);
				$worksheet->write($star_row, $star_col+2, $total_person, $f_til);

				$worksheet->setColumn($star_col, $star_col, 4);
				$worksheet->setColumn($star_col+1, $star_col+1, 25);
				$worksheet->setColumn($star_col+2, $star_col+2, 10);
				$worksheet->setColumn($star_col+3, $star_col+3, 20);
				$worksheet->setColumn($star_col+4, $star_col+4, 10);
				$worksheet->setColumn($star_col+5, $star_col+5, 12);
				$worksheet->setColumn($star_col+6, $star_col+6, 10);
				$worksheet->setColumn($star_col+7, $star_col+7, 10);
				$worksheet->setColumn($star_col+8, $star_col+8, 20);
				
				//show data
				$f_row_title =& $workbook->addFormat();
				$f_row_title->setBold();
				$f_row_title->setAlign('center');
				$f_row_title->setAlign('vcenter');
				$f_row_title->setColor('black');
				$f_row_title->setFgColor('gray');
				$f_row_title->setBorder(1);
				
				$star_row+=2;
				$worksheet->write($star_row, $star_col, "STT", $f_row_title);
				$worksheet->write($star_row, $star_col+1, "Họ Tên", $f_row_title);
				$worksheet->write($star_row, $star_col+2, "Ngày Sinh", $f_row_title);
				$worksheet->write($star_row, $star_col+3, "Địa Chỉ", $f_row_title);
				$worksheet->write($star_row, $star_col+4, "Giới Tính", $f_row_title);
				$worksheet->write($star_row, $star_col+5, "Độ Tuổi", $f_row_title);
				$worksheet->write($star_row, $star_col+6, "Ghi Chú", $f_row_title);
	
				$f_row =& $workbook->addFormat();
				$f_row->setAlign('center');
				$f_row->setAlign('vcenter');
				$f_row->setBorder(1);
				
				$arr_age = array('Người lớn', 'Trẻ em', 'Trẻ nhỏ');
				
				foreach( $list_person as $key=>$item ){
					$star_row++;
					$name 			= $item['name'];
					$birthday 		= $item['birthday'] == 0 ? '' :  date('d/m/Y', $item['birthday']);
					$address 		= $item['address'];
					$sex 			= $item['sex'] == 0 ? 'Nữ' : 'Nam';
					$age			= $arr_age[$item['age']];
					
					$worksheet->write($star_row, $star_col, $key+1, $f_row);
					$worksheet->write($star_row, $star_col+1, $name, $f_row);
					$worksheet->write($star_row, $star_col+2, $birthday, $f_row);
					$worksheet->write($star_row, $star_col+3, $address, $f_row);
					$worksheet->write($star_row, $star_col+4, $sex, $f_row);
					$worksheet->write($star_row, $star_col+5, $age, $f_row);
					$worksheet->write($star_row, $star_col+6, '', $f_row);
				}
				
				$f_row_foo =& $workbook->addFormat();
				$f_row_foo->setBold();
				$f_row_foo->setAlign('center');
				$f_row_foo->setAlign('vcenter');
				
				$star_row+=2;
				$worksheet->mergeCells($star_row, 6, $star_row, 8);
				$d = 'Ngày '.date('d', time()).' tháng '.date('m', time()).' năm '.date('Y', time());
				$worksheet->write($star_row, 3, $d);
				
				$star_row++;
				$worksheet->mergeCells($star_row, 0, $star_row, 2);
				$worksheet->write($star_row, 1, 'GIÁM ĐỐC', $f_row_foo);
				$worksheet->mergeCells($star_row, 3, $star_row, 5);
				$worksheet->write($star_row, 3, 'KHÁCH HÀNG', $f_row_foo);
				
				$workbook->send('flight_book_'.$book_id.'_'.$date.'.xls');
				$workbook->close();
				exit(0);
			}
			else {
				// id khong co trong CSDL
				//redirect($data['back_url']);
			}
		}
		else {
			// khong co id tren link
			//redirect($data['back_url']);
		}

	}
	
}