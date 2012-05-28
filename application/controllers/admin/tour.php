<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tour extends MY_Admin{

	function __construct(){

		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('Lib_Tour');

		##--LOAD MODEL--##
		$this->load->helper('menu');

		$this->lang->load('language_code');
	}

	function index(){
		$this->manage();
	}

	function manage( $cat_id = FALSE )
	{
		if($cat_id == FALSE) redirect("admin/tour/manage_cat");
		$data['current_cat'] = $cat_id;

		//Luu url trang hien tai cho cac trang sau se back tro lai
		$this->session->set_userdata('back_url', current_url());
			
		//set per_page paging
		if($this->input->post('select_per_page'))
		{
			$this->pagination->set_per_page($this->input->post('select_per_page'));
		}
		//set language vao session
		if($this->input->post('select_lang'))
		{
			$this->session->set_userdata('current_lang_abbr', $this->input->post('select_lang'));
			redirect(uri_string());
		}
		// data cho combobox language
		$data['languages'] = $this->setting->get_langs();
		/*
		 * Lay current lang khi co tu 2 language tro len
		 * Neu co session thi current_lang = session
		 * nguoc lai lay language duoc active trong database;
		 */
		if($data['languages'])
		{
			if($this->session->userdata('current_lang_abbr'))
			{
				$data['current_lang'] = $this->session->userdata('current_lang_abbr');
			}
			else
			{
				foreach($data['languages'] as $item)
				{
					if($item['active'] == 1)
					{
						$data['current_lang'] = $item['abbr'];
					}
				}
			}
		}

		//Lay limit trong database
		$limit = $this->pagination->get_per_page();
		$offset = intval($this->uri->segment(5));

		//data cho page
		$data['data'] = $this->tour_model->get_data_count_admin($cat_id, $count, $limit, $offset);
		$data['back_url'] = site_url('/admin/tour/manage_cat');

		//config paging
		$config['base_url'] = site_url("/admin/tour/manage/".$cat_id);
		$config['total_rows'] = $count;
		$config['per_page'] = $this->pagination->get_per_page();
		$config['num_links'] = $this->pagination->get_config('num_links');
		$config['uri_segment'] = 5;
		$config['first_link'] = lang('first_link');
		$config['last_link'] = lang('last_link');

		//Khoi tao paging
		$this->pagination->initialize($config);

		$this->load->view('tour/manage', $data);

	}

	function manage_book(){

		//Luu url trang hien tai cho cac trang sau se back tro lai
		$this->session->set_userdata('back_url', current_url());
			
		//set per_page paging
		if($this->input->post('select_per_page'))
		{
			$this->pagination->set_per_page($this->input->post('select_per_page'));
		}
		//set language vao session
		if($this->input->post('select_lang'))
		{
			$this->session->set_userdata('current_lang_abbr', $this->input->post('select_lang'));
			redirect(uri_string());
		}
		// data cho combobox language
		$data['languages'] = $this->setting->get_langs();
		/*
		 * Lay current lang khi co tu 2 language tro len
		 * Neu co session thi current_lang = session
		 * nguoc lai lay language duoc active trong database;
		 */
		if($data['languages'])
		{
			if($this->session->userdata('current_lang_abbr'))
			{
				$data['current_lang'] = $this->session->userdata('current_lang_abbr');
			}
			else
			{
				foreach($data['languages'] as $item)
				{
					if($item['active'] == 1)
					{
						$data['current_lang'] = $item['abbr'];
					}
				}
			}
		}

		//Lay limit trong database
		$limit = $this->pagination->get_per_page();
		$offset = intval($this->uri->segment(4, 0));

		//data cho page
		$data['data'] = $this->tour_model->get_data_book_count($count, $limit, $offset);
		//config paging
		$config['base_url'] = site_url("/admin/tour/manage_book");
		$config['total_rows'] = $count;
		$config['per_page'] = $this->pagination->get_per_page();
		$config['num_links'] = $this->pagination->get_config('num_links');
		$config['uri_segment'] = 4;
		$config['first_link'] = lang('first_link');
		$config['last_link'] = lang('last_link');

		//Khoi tao paging
		$this->pagination->initialize($config);

		$this->load->view('tour/manage_book', $data);

	}

	public function update_book(){

		$current_url = 'admin/tour/manage_book';

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
					$this->lib_tour->active_book($id, $active, 'is_checked');
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
				$delete = $this->lib_tour->delete_book( $id );
			}
		}

		if( $this->lib_tour->messages() )
		{
			$delete_talk[] = message($this->lib_tour->messages(), 'info');
		}
		if( $this->lib_tour->errors() )
		{
			$delete_talk[] = message($this->lib_tour->errors(), 'error');
		}

		$this->session->set_flashdata('delete_talk', $delete_talk);

		redirect("admin/tour/manage_book");

	}

	public function edit_book($id = false){

		//Lay duong dan trang truoc no'
		$data['back_url'] = $this->session->userdata('back_url');

		if ( $id != false ){

			$this->lib_tour->active_book( $id, 1, 'is_read' );

			$info = $this->tour_model->get_data_book_info($id);

			if ( $info != false ){
					
				/********************* Kiem tra va create ***********************/
				$this->form_validation->set_rules('fullname', lang('fullname'), 'required');
				$this->form_validation->set_rules('phone', lang('phone'), 'required');
				$this->form_validation->set_rules('email', lang('email'), 'required|valid_email');
				$this->form_validation->set_rules('total_person', lang('total_person'), 'required|is_natural_no_zero');
				$this->form_validation->set_rules('date_start', lang('date_start'), 'required');

				//Form post = TRUE
				if ($this->form_validation->run() == TRUE)
				{

					$object['id'] = $id;

					//same create
					$object['tour_id'] = $this->input->post('tour_id');
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

					$object['is_checked'] = $this->input->post('is_checked');

					$object['list_id'] = $this->input->post('hd_id');
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

					//insert data
					$object['list_name_i'] = $this->input->post('txt_name_i');
					$object['list_birthday_i'] = $this->input->post('txt_birthday_i');
					$object['list_sex_i'] = $this->input->post('sl_sex_i');
					$object['list_age_i'] = $this->input->post('sl_age_i');
					$object['list_single_room_i'] = $this->input->post('sl_single_room_i');

					$object['list_address_i'] = $this->input->post('txt_address_i');
					$object['list_customer_based_i'] = $this->input->post('sl_customer_based_i');

					$object['list_date_issue_i'] = $this->input->post('txt_date_issue_i');
					$object['list_date_expiry_i'] = $this->input->post('txt_date_expiry_i');
					$object['list_passport_i'] = $this->input->post('txt_passport_i');
					//same create

					//Edit
					if( $this->lib_tour->edit_book( $object ) )
					{
						$this->session->set_flashdata('message',  message($this->lib_tour->messages()) );
						redirect("admin/tour/edit_book/".$id);
					}
					else
					{
						$this->session->set_flashdata('message', message($this->lib_tour->errors(), 'error'));
						redirect("admin/tour/edit_book/".$id);
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
					//$data['tours'] = $this->tour_model->get_data_by_cat($data['restore_data']['tour_cat_id'], 'tour.id, tour_lang.title');
					$data['sl_tour'] = $this->select_tour($data['restore_data']['tour_cat_id'], $data['restore_data']['tour_id']);
					$data['list_person'] = $this->tour_model->get_list_person($id);

					$v = !empty($data['restore_data']['name_type']) && $data['restore_data']['name_type'] == "outbound" ? "_outbound" : "";
					$this->load->view('tour/edit_book'.$v, $data);
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

	function select_tour($cat_id = false, $id = false){

		if ( $cat_id == false || $id == false ){
			$cat_id = $this->input->post('cat_id');
			$id = $this->input->post('id');
		}

		$tours = $this->tour_model->get_data_by_cat( $cat_id, 'tour.id, tour_lang.title' );
		$html = '';

		foreach ( $tours as $item ){
			$html .= '<option value="'.$item['id'].'" ';
			if ( $item['id'] == $id && $id != false) {
				$html .= ' selected="selected"';
			}
			$html .= '>'.$item['title'].'</option>';
		}

		if ($this->input->server('HTTP_X_REQUESTED_WITH') && ($this->input->server('HTTP_X_REQUESTED_WITH') == 'XMLHttpRequest')) {
			echo json_encode($html);
			exit;
		}

		return $html;

	}

	function delete_book_detail(){

		$id = $this->input->post('id');
		$this->tour_model->delete_book_detail($id);

		$object['total_person'] = $this->input->post('total_person');
		$object['adult'] = $this->input->post('adult');
		$object['child'] = $this->input->post('child');
		$object['baby'] = $this->input->post('baby');
		$object['id'] = $this->input->post('book');

		$this->tour_model->update_person($object);

		$data['success'] = "Xóa người thành công";
		if ($this->input->server('HTTP_X_REQUESTED_WITH') && ($this->input->server('HTTP_X_REQUESTED_WITH') == 'XMLHttpRequest')) {
			echo json_encode($data);
			exit;
		}

	}


	function create(){

		//Lay duong dan trang truoc no'
		$data['back_url'] = $this->session->userdata('back_url');
		
		//Lay category_id
		$data['cat_id'] = end( explode('/', $data['back_url']) );

		/*
		 * data cho combobox language
		 * - Neu trong setting khong co language thi se lay trong config
		 */
		$data['languages'] = $this->setting->get_langs();

		if( empty($data['languages']) )
		{
			$cf_lang['active'] = 1;
			$cf_lang['name'] = $this->config->config['language'];
			$cf_lang['abbr'] = $this->config->config['language_abbr'];

			$data['languages'][$cf_lang['abbr']] = $cf_lang;
		}

		//Get current_lang
		if($data['languages'] && $this->session->userdata('current_lang') == FALSE)
		{
			foreach($data['languages'] as $item)
			{
				if($item['active'] == 1)
				{
					//Set current_lang
					$data['current_lang'] = $item['abbr'];
					break;
				}
			}
		}
		else
		{
			$data['current_lang'] = $this->session->userdata('current_lang');
		}

		/********************* Kiem tra va create ***********************/
		foreach( $data['languages'] as $lang_item ){
			$lang_abbr = $lang_item['abbr'];
			$this->form_validation->set_rules($lang_abbr.'_'.'title', lang('title'), 'required|min_length[4]|xss_clean' );
			$this->form_validation->set_rules($lang_abbr.'_'.'time_tour', lang('time_tour'), 'required|xss_clean' );
			$this->form_validation->set_rules($lang_abbr.'_'.'destination', lang('destination'), 'required|xss_clean' );
			$this->form_validation->set_rules($lang_abbr.'_'.'price', lang('price'), 'required|xss_clean' );
			$this->form_validation->set_rules($lang_abbr.'_'.'vehicle', lang('vehicle'), 'required|xss_clean' );
			$this->form_validation->set_rules($lang_abbr.'_'.'summary', lang('summary'), 'required|min_length[5]|xss_clean' );
			$this->form_validation->set_rules($lang_abbr.'_'.'content', lang('content'), 'required|min_length[5]|xss_clean' );
		}

		//Form post = TRUE
		if ($this->form_validation->run() == TRUE)
		{

			$object = array();

			//Thong tin chung cho tat ca language
			$object['date'] 		= time()-3600;
			$object['is_enabled'] 	= $this->input->post('is_enabled');
			$object['is_hot'] 		= $this->input->post('is_hot');
			$object['file'] 		= $this->input->post('file');
			$object['file_price'] 	= $this->input->post('file_price');
			$object['image'] 		= $this->input->post('image');
			$object['tour_cat_id'] 	= $this->input->post('tour_cat_id');
			$object['list_images'] 	= $this->input->post('list_images');
			if($object['list_images'])
			{
				$object['list_images'] 	= implode(',', $this->input->post('list_images'));
			}

			//Thong tin rieng tung language
			//$k == lang_abbr
			foreach( $data['languages'] as $k => $lang_item ){

				$object['lang'][$k]['lang']		= $k;

				$object['lang'][$k]['title'] 		= $this->input->post($lang_item['abbr'].'_'.'title');
				$object['lang'][$k]['time_tour'] 	= $this->input->post($lang_item['abbr'].'_'.'time_tour');
				$object['lang'][$k]['price'] 		= $this->input->post($lang_item['abbr'].'_'.'price');
				$object['lang'][$k]['curency'] 		= $this->input->post($lang_item['abbr'].'_'.'curency');
				$object['lang'][$k]['vehicle'] 		= $this->input->post($lang_item['abbr'].'_'.'vehicle');
				$object['lang'][$k]['summary'] 		= $this->input->post($lang_item['abbr'].'_'.'summary');
				$object['lang'][$k]['content'] 		= $this->input->post($lang_item['abbr'].'_'.'content');
				$object['lang'][$k]['destination'] 	= $this->input->post($lang_item['abbr'].'_'.'destination');
					
			}

			//Insert
			if($this->lib_tour->create( $object ) )
			{
				//success
				$this->session->set_flashdata('message', $this->lib_tour->messages());
				redirect("admin/tour/create");
			}
			else
			{
				//Neu xay ra loi trong luc insert
				$data['restore_data'] =  $_POST;
				$data['message'] = message($this->lib_tour->errors(), 'error');
				$this->load->view('tour/create', $data);
			}
		}
		else
		{
			if( !empty($_POST) ){
				$data['restore_data'] =  $_POST;
			}

			//$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('tour/create', $data);
		}

	}

	public function delete()
	{
		$current_url = 'admin/tour/manage';
		if( $this->input->post('current_url') )
		{
			$current_url = $this->input->post('current_url');
		}
		
		$delete_talk = array();

		$this->form_validation->set_rules('id', 'ID', 'required | is_natural ');

		if ( $this->form_validation->run() == TRUE )//Post xay ra
		{
			//Xoa 1 hoac nhieu
			if ( $id = $this->input->post('id') )
			{
				$delete = $this->lib_tour->delete( $id );
			}
		}

		if( $this->lib_tour->messages() )
		{
			$delete_talk[] = message($this->lib_tour->messages(), 'info');
		}
		if( $this->lib_tour->errors() )
		{
			$delete_talk[] = message($this->lib_tour->errors(), 'error');
		}

		$this->session->set_flashdata('delete_talk', $delete_talk);

		redirect($current_url);

	}

	public function update(){

		$current_url = 'admin/tour/manage';

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
					$this->lib_tour->active($id, $active);
				}

				if( $this->input->post('active') !== FALSE && $action == 'check_hot' )
				{
					$active = $this->input->post('active');
					$this->lib_tour->active($id, $active, 'is_hot');
				}

			}

			if( $this->input->post('current_url') )
			{
				$current_url = $this->input->post('current_url');
			}
		}

		redirect($current_url);

	}

	public function edit($id = false){

		//Lay duong dan trang truoc no'
		$data['back_url'] = $this->session->userdata('back_url');

		if ( $id != false ){

			$info = $this->tour_model->get_data_info($id);

			if ( $info != false ){

				/*
				 * data cho combobox language
				 * - Neu trong setting khong co language thi se lay trong config
				 */
				$data['languages'] = $this->setting->get_langs();
					
				if( empty($data['languages']) )
				{
					$cf_lang['active'] = 1;
					$cf_lang['name'] = $this->config->config['language'];
					$cf_lang['abbr'] = $this->config->config['language_abbr'];

					$data['languages'][$cf_lang['abbr']] = $cf_lang;
				}
					
				//Get current_lang
				if($data['languages'] && $this->session->userdata('current_lang') == FALSE)
				{
					foreach($data['languages'] as $item)
					{
						if($item['active'] == 1)
						{
							//Set current_lang
							$data['current_lang'] = $item['abbr'];
							break;
						}
					}
				}
				else
				{
					$data['current_lang'] = $this->session->userdata('current_lang');
				}
					
				/********************* Kiem tra va create ***********************/
				foreach( $data['languages'] as $lang_item ){

					$lang_abbr = $lang_item['abbr'];

					$this->form_validation->set_rules(	$lang_abbr.'_'.'title',
					lang('title').' ['.lang($lang_abbr).']',
												'required|min_length[4]|xss_clean' );
					$this->form_validation->set_rules(	$lang_abbr.'_'.'time_tour',
					lang('time_tour').' ['.lang($lang_abbr).']',
												'required|xss_clean' );
					$lang_abbr = $lang_item['abbr'];
					$this->form_validation->set_rules(	$lang_abbr.'_'.'destination',
					lang('destination').' ['.lang($lang_abbr).']',
												'required|xss_clean' );
					$this->form_validation->set_rules(	$lang_abbr.'_'.'price',
					lang('price').' ['.lang($lang_abbr).']',
												'required|xss_clean' );
					$lang_abbr = $lang_item['abbr'];
					$this->form_validation->set_rules(	$lang_abbr.'_'.'vehicle',
					lang('vehicle').' ['.lang($lang_abbr).']',
												'required|xss_clean' );
					$this->form_validation->set_rules(	$lang_abbr.'_'.'summary',
					lang('summary').' ['.lang($lang_abbr).']',
												'required|min_length[5]|xss_clean' );
					$this->form_validation->set_rules(	$lang_abbr.'_'.'content',
					lang('content').' ['.lang($lang_abbr).']',
												'required|min_length[5]|xss_clean' );

				}

				//Form post = TRUE
				if ($this->form_validation->run() == TRUE)
				{

					$object['id'] = $id;

					//same create
					//Thong tin chung cho tat ca language
					//$object['date'] 		= time()-3600;
					$object['is_enabled'] 	= $this->input->post('is_enabled');
					$object['is_hot'] 		= $this->input->post('is_hot');
					$object['file'] 		= $this->input->post('file');
					$object['file_price'] 	= $this->input->post('file_price');
					$object['image'] 		= $this->input->post('image');
					$object['list_images'] 	= implode(',', $this->input->post('list_images'));
					$object['tour_cat_id'] 	= $this->input->post('tour_cat_id');

					//Thong tin rieng tung language
					//$k == lang_abbr
					foreach( $data['languages'] as $k => $lang_item ){

						$object['lang'][$k]['lang']		= $k;

						$object['lang'][$k]['title'] 		= $this->input->post($lang_item['abbr'].'_'.'title');
						$object['lang'][$k]['time_tour'] 	= $this->input->post($lang_item['abbr'].'_'.'time_tour');
						$object['lang'][$k]['price'] 		= $this->input->post($lang_item['abbr'].'_'.'price');
						$object['lang'][$k]['vehicle'] 		= $this->input->post($lang_item['abbr'].'_'.'vehicle');
						$object['lang'][$k]['summary'] 		= $this->input->post($lang_item['abbr'].'_'.'summary');
						$object['lang'][$k]['content'] 		= $this->input->post($lang_item['abbr'].'_'.'content');
						$object['lang'][$k]['destination'] 	= $this->input->post($lang_item['abbr'].'_'.'destination');
							
					}
					//same create

					//Edit
					if( $this->lib_tour->edit( $object ) )
					{
						$this->session->set_flashdata('message',  message($this->lib_tour->messages()) );
						redirect("admin/tour/edit/".$id);
					}
					else
					{
						$this->session->set_flashdata('message', message($this->lib_tour->errors(), 'error'));
						redirect("admin/tour/edit/".$id);
					}
				}
				else
				{
					$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : $this->session->flashdata('message');
					if( !empty($_POST) ){
						$data['restore_data'] =  $_POST;
					} else {
						foreach ( $info as $key=>$item ){

							//Thong tin chung
							$restore_data['is_enabled'] 	= $item['is_enabled'];
							$restore_data['is_hot'] 		= $item['is_hot'];
							$restore_data['file'] 			= $item['file'];
							$restore_data['file_price'] 	= $item['file_price'];
							$restore_data['image'] 			= $item['image'];
							$restore_data['list_images']	= explode(',', $item['list_images']);
							$restore_data['tour_cat_id'] 	= $item['tour_cat_id'];


							//thong tin rieng
							$restore_data[$item['lang'].'_'.'title'] 		= $item['title'];
							$restore_data[$item['lang'].'_'.'time_tour'] 	= $item['time_tour'];
							$restore_data[$item['lang'].'_'.'price'] 		= $item['price'];
							$restore_data[$item['lang'].'_'.'vehicle'] 		= $item['vehicle'];
							$restore_data[$item['lang'].'_'.'summary'] 		= $item['summary'];
							$restore_data[$item['lang'].'_'.'content'] 		= $item['content'];
							$restore_data[$item['lang'].'_'.'destination'] 	= $item['destination'];

						}


						$data['restore_data'] = $restore_data;
					}

					$data['restore_data']['id'] = $id;
					//echo'<pre>';var_dump($data['restore_data']);die();
					$this->load->view('tour/edit', $data);
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


	//Manage Category tour

	function manage_cat(){

		//Luu url trang hien tai cho cac trang sau se back tro lai
		$this->session->set_userdata('back_url', current_url());
			
		//set per_page paging
		if($this->input->post('select_per_page'))
		{
			$this->pagination->set_per_page($this->input->post('select_per_page'));
		}
		//set language vao session
		if($this->input->post('select_lang'))
		{
			$this->session->set_userdata('current_lang_abbr', $this->input->post('select_lang'));
			redirect(uri_string());
		}
		// data cho combobox language
		$data['languages'] = $this->setting->get_langs();
		/*
		 * Lay current lang khi co tu 2 language tro len
		 * Neu co session thi current_lang = session
		 * nguoc lai lay language duoc active trong database;
		 */
		if($data['languages'])
		{
			if($this->session->userdata('current_lang_abbr'))
			{
				$data['current_lang'] = $this->session->userdata('current_lang_abbr');
			}
			else
			{
				foreach($data['languages'] as $item)
				{
					if($item['active'] == 1)
					{
						$data['current_lang'] = $item['abbr'];
					}
				}
			}
		}

		//Lay limit trong database
		$limit = $this->pagination->get_per_page();
		$offset = intval($this->uri->segment(4, 0));

		//data cho page
		$data['data'] = $this->tour_model->get_cat_data_count($count, $limit, $offset);

		//config paging
		$config['base_url'] = site_url("/admin/tour/manage_cat");
		$config['total_rows'] = $count;
		$config['per_page'] = $this->pagination->get_per_page();
		$config['num_links'] = $this->pagination->get_config('num_links');
		$config['uri_segment'] = 4;
		$config['first_link'] = lang('first_link');
		$config['last_link'] = lang('last_link');

		//Khoi tao paging
		$this->pagination->initialize($config);

		$this->load->view('tour/manage_cat', $data);

	}


	function create_cat(){

		//Lay duong dan trang truoc no'
		$data['back_url'] = $this->session->userdata('back_url');

		/*
		 * data cho combobox language
		 * - Neu trong setting khong co language thi se lay trong config
		 */
		$data['languages'] = $this->setting->get_langs();

		if( empty($data['languages']) )
		{
			$cf_lang['active'] = 1;
			$cf_lang['name'] = $this->config->config['language'];
			$cf_lang['abbr'] = $this->config->config['language_abbr'];

			$data['languages'][$cf_lang['abbr']] = $cf_lang;
		}

		//Get current_lang
		if($data['languages'] && $this->session->userdata('current_lang') == FALSE)
		{
			foreach($data['languages'] as $item)
			{
				if($item['active'] == 1)
				{
					//Set current_lang
					$data['current_lang'] = $item['abbr'];
					break;
				}
			}
		}
		else
		{
			$data['current_lang'] = $this->session->userdata('current_lang');
		}

		/********************* Kiem tra va create ***********************/
		foreach( $data['languages'] as $lang_item ){
			$lang_abbr = $lang_item['abbr'];

			$this->form_validation->set_rules(	$lang_abbr.'_'.'name',
			lang('cat_name').' ['.lang($lang_abbr).']',
												'required|min_length[4]|xss_clean' );
			$this->form_validation->set_rules(	$lang_abbr.'_'.'alias',
			lang('cat_alias').' ['.lang($lang_abbr).']',
												'required|min_length[4]|xss_clean' );
		}

		//Form post = TRUE
		if ($this->form_validation->run() == TRUE)
		{

			$object = array();

			//Thong tin chung cho tat ca language
			$object['is_enabled'] 	= $this->input->post('is_enabled');
			$object['parent_id'] 	= $this->input->post('parent_id');

			//Thong tin rieng tung language
			//$k == lang_abbr
			foreach( $data['languages'] as $k => $lang_item ){

				$object['lang'][$k]['lang']		= $k;

				$object['lang'][$k]['name'] 	= $this->input->post($lang_item['abbr'].'_'.'name');
				$object['lang'][$k]['alias'] 	= $this->input->post($lang_item['abbr'].'_'.'alias');
					
			}

			//Insert
			if($this->lib_tour->create_cat( $object ) )
			{
				//success
				$this->session->set_flashdata('message', $this->lib_tour->messages());
				redirect("admin/tour/create_cat");
			}
			else
			{
				//Neu xay ra loi trong luc insert
				$data['restore_data'] =  $_POST;
				$data['message'] = message($this->lib_tour->errors(), 'error');
				$this->load->view('tour/create_cat', $data);
			}
		}
		else
		{
			if( !empty($_POST) ){
				$data['restore_data'] =  $_POST;
			}
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('tour/create_cat', $data);
		}

	}

	public function delete_cat(){

		$delete_talk = array();

		$this->form_validation->set_rules('id', 'ID', 'required | is_natural ');

		if ( $this->form_validation->run() == TRUE )//Post xay ra
		{
			//Xoa 1 hoac nhieu
			if ( $id = $this->input->post('id') )
			{
				$delete = $this->lib_tour->delete_cat( $id );
			}
		}

		if( $this->lib_tour->messages() )
		{
			$delete_talk[] = message($this->lib_tour->messages(), 'info');
		}
		if( $this->lib_tour->errors() )
		{
			$delete_talk[] = message($this->lib_tour->errors(), 'error');
		}

		$this->session->set_flashdata('delete_talk', $delete_talk);

		redirect("admin/tour/manage_cat");

	}

	public function update_cat(){

		$current_url = 'admin/tour/manage_cat';

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
					$this->lib_tour->active_cat($id, $active, 'is_enabled');
				}

				/**
				 * action == order
				 * set order
				 */
				else if( $this->input->post('order') !== FALSE && $action == 'order' )
				{
					$order = $this->input->post('order');
					$this->lib_tour->saveorder($id, $order);
				}
			}//if
		}

		redirect($current_url);

	}

	public function edit_cat($id = false){

		//Lay duong dan trang truoc no'
		$data['back_url'] = $this->session->userdata('back_url');

		if ( $id != false ){

			$info = $this->tour_model->get_cat_data_info_admin($id);

			if ( $info != false ){

				/*
				 * data cho combobox language
				 * - Neu trong setting khong co language thi se lay trong config
				 */
				$data['languages'] = $this->setting->get_langs();
					
				if( empty($data['languages']) )
				{
					$cf_lang['active'] = 1;
					$cf_lang['name'] = $this->config->config['language'];
					$cf_lang['abbr'] = $this->config->config['language_abbr'];

					$data['languages'][$cf_lang['abbr']] = $cf_lang;
				}
					
				//Get current_lang
				if($data['languages'] && $this->session->userdata('current_lang') == FALSE)
				{
					foreach($data['languages'] as $item)
					{
						if($item['active'] == 1)
						{
							//Set current_lang
							$data['current_lang'] = $item['abbr'];
							break;
						}
					}
				}
				else
				{
					$data['current_lang'] = $this->session->userdata('current_lang');
				}
					
				/********************* Kiem tra va create ***********************/
				foreach( $data['languages'] as $lang_item )
				{
					$lang_abbr = $lang_item['abbr'];

					$this->form_validation->set_rules(	$lang_abbr.'_'.'name',
					lang('cat_name').' ['.lang($lang_abbr).']',
														'required|min_length[4]|xss_clean' );
					$this->form_validation->set_rules(	$lang_abbr.'_'.'alias',
					lang('cat_alias').' ['.lang($lang_abbr).']',
														'required|min_length[4]|xss_clean' );
				}

				//Form post = TRUE
				if ($this->form_validation->run() == TRUE)
				{

					$object['id'] = $id;

					//Thong tin chung cho tat ca language
					$object['is_enabled'] 	= $this->input->post('is_enabled');
					$object['parent_id'] 	= $this->input->post('parent_id');
					$object['ordering'] 	= $this->input->post('ordering');

					//Thong tin rieng tung language
					//$k == lang_abbr
					foreach( $data['languages'] as $k => $lang_item ){

						$object['lang'][$k]['lang']		= $k;

						$object['lang'][$k]['name'] 	= $this->input->post($lang_item['abbr'].'_'.'name');
						$object['lang'][$k]['alias'] 	= $this->input->post($lang_item['abbr'].'_'.'alias');
							
					}

					//Edit
					if( $this->lib_tour->edit_cat( $object ) )
					{
						$this->session->set_flashdata('message',  message($this->lib_tour->messages()) );
						redirect("admin/tour/edit_cat/".$id);
					}
					else
					{
						$this->session->set_flashdata('message', message($this->lib_tour->errors(), 'error'));
						redirect("admin/tour/edit_cat/".$id);
					}
				}
				else
				{
					$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : $this->session->flashdata('message');
					if( !empty($_POST) ){
						$data['restore_data'] =  $_POST;
					} else {

						foreach ( $info as $key => $item ){

							//Thong tin chung
							$restore_data['is_enabled'] = $item['is_enabled'];
							$restore_data['ordering'] = $item['ordering'];
							$restore_data['parent_id'] = $item['parent_id'];

							//thong tin rieng
							$restore_data[$item['lang'].'_'.'name'] 				= $item['name'];
							$restore_data[$item['lang'].'_'.'alias'] 				= $item['alias'];

						}

						$data['restore_data'] = $restore_data;
					}

					$data['restore_data']['id'] = $id;
					$this->load->view('tour/edit_cat', $data);
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

	//ham kiem tra alias co hay khong.
	public function ajax_check_exits_alias()
	{
		if($this->input->post('alias') && !is_array($this->input->post('alias')))
		{
			$have_alias = $this->tour_model->exist_alias($this->input->post('alias'), $this->input->post('lang'));
			if($have_alias)
			{
				echo(json_encode( lang('have_alias') ));
			}
			else
			{
				echo(json_encode( lang('have_not_alias') ));
			}
		}
		exit;
	}

	//Manage region
	function manage_region(){

		//Luu url trang hien tai cho cac trang sau se back tro lai
		$this->session->set_userdata('back_url', current_url());
			
		//set per_page paging
		if($this->input->post('select_per_page'))
		{
			$this->pagination->set_per_page($this->input->post('select_per_page'));
		}
		//set language vao session
		if($this->input->post('select_lang'))
		{
			$this->session->set_userdata('current_lang_abbr', $this->input->post('select_lang'));
			redirect(uri_string());
		}
		// data cho combobox language
		$data['languages'] = $this->setting->get_langs();
		/*
		 * Lay current lang khi co tu 2 language tro len
		 * Neu co session thi current_lang = session
		 * nguoc lai lay language duoc active trong database;
		 */
		if($data['languages'])
		{
			if($this->session->userdata('current_lang_abbr'))
			{
				$data['current_lang'] = $this->session->userdata('current_lang_abbr');
			}
			else
			{
				foreach($data['languages'] as $item)
				{
					if($item['active'] == 1)
					{
						$data['current_lang'] = $item['abbr'];
					}
				}
			}
		}

		//Lay limit trong database
		$limit = $this->pagination->get_per_page();
		$offset = intval($this->uri->segment(4, 0));

		//data cho page
		$data['data'] = $this->tour_model->get_region_count($count, $limit, $offset);

		//config paging
		$config['base_url'] = site_url("/admin/tour/manage_region");
		$config['total_rows'] = $count;
		$config['per_page'] = $this->pagination->get_per_page();
		$config['num_links'] = $this->pagination->get_config('num_links');
		$config['uri_segment'] = 4;
		$config['first_link'] = lang('first_link');
		$config['last_link'] = lang('last_link');

		//Khoi tao paging
		$this->pagination->initialize($config);

		$this->load->view('tour/manage_region', $data);

	}


	function create_region(){

		//Lay duong dan trang truoc no'
		$data['back_url'] = $this->session->userdata('back_url');

		/*
		 * data cho combobox language
		 * - Neu trong setting khong co language thi se lay trong config
		 */
		$data['languages'] = $this->setting->get_langs();

		if( empty($data['languages']) )
		{
			$cf_lang['active'] = 1;
			$cf_lang['name'] = $this->config->config['language'];
			$cf_lang['abbr'] = $this->config->config['language_abbr'];

			$data['languages'][$cf_lang['abbr']] = $cf_lang;
		}

		//Get current_lang
		if($data['languages'] && $this->session->userdata('current_lang') == FALSE)
		{
			foreach($data['languages'] as $item)
			{
				if($item['active'] == 1)
				{
					//Set current_lang
					$data['current_lang'] = $item['abbr'];
					break;
				}
			}
		}
		else
		{
			$data['current_lang'] = $this->session->userdata('current_lang');
		}

		/********************* Kiem tra va create ***********************/
		foreach( $data['languages'] as $lang_item ){
			$lang_abbr = $lang_item['abbr'];

			$this->form_validation->set_rules(	$lang_abbr.'_'.'name',
			lang('region_name').' ['.lang($lang_abbr).']',
												'required|min_length[4]|xss_clean' );
			$this->form_validation->set_rules(	$lang_abbr.'_'.'alias',
			lang('cat_alias').' ['.lang($lang_abbr).']',
												'required|min_length[2]|max_length[5]|xss_clean' );
		}

		//Form post = TRUE
		if ($this->form_validation->run() == TRUE)
		{

			//Kiem tra alias co ton tai hay khong cua tat ca language
			foreach( $data['languages'] as $lang_item )
			{
				$have_alias = $this->lib_tour->exist_region_alias($this->input->post($lang_item['abbr'].'_alias'), $lang_item['abbr']);
				if($have_alias)
				{
					//Tru`ng ten_ma [alias] trong database
					$data['message'] = message($this->lib_tour->errors(), 'error');
					$this->load->view('tour/create_region', $data);
					return;
				}
			}

			$object = array();

			//Thong tin chung cho tat ca language
			$object['is_enabled'] 	= $this->input->post('is_enabled');
			$object['parent_id'] 	= $this->input->post('parent_id');

			//Thong tin rieng tung language
			//$k == lang_abbr
			foreach( $data['languages'] as $k => $lang_item ){

				$object['lang'][$k]['lang']		= $k;

				$object['lang'][$k]['name'] 	= $this->input->post($lang_item['abbr'].'_'.'name');
				$object['lang'][$k]['alias'] 	= $this->input->post($lang_item['abbr'].'_'.'alias');
					
			}

			//Insert
			if($this->lib_tour->create_region( $object ) )
			{
				//success
				$this->session->set_flashdata('message', $this->lib_tour->messages());
				redirect("admin/tour/create_region");
			}
			else
			{
				//Neu xay ra loi trong luc insert
				$data['restore_data'] =  $_POST;
				$data['message'] = message($this->lib_tour->errors(), 'error');
				$this->load->view('tour/create_regiont', $data);
			}
		}
		else
		{
			if( !empty($_POST) ){
				$data['restore_data'] =  $_POST;
			}
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('tour/create_region', $data);
		}

	}

	public function delete_region(){

		$delete_talk = array();

		$this->form_validation->set_rules('id', 'ID', 'required | is_natural ');

		if ( $this->form_validation->run() == TRUE )//Post xay ra
		{
			//Xoa 1 hoac nhieu
			if ( $id = $this->input->post('id') )
			{
				$delete = $this->lib_tour->delete_region( $id );
			}
		}

		if( $this->lib_tour->messages() )
		{
			$delete_talk[] = message($this->lib_tour->messages(), 'info');
		}
		if( $this->lib_tour->errors() )
		{
			$delete_talk[] = message($this->lib_tour->errors(), 'error');
		}

		$this->session->set_flashdata('delete_talk', $delete_talk);

		redirect("admin/tour/manage_region");

	}

	public function update_region(){

		$current_url = 'admin/tour/manage_region';

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
					$this->lib_tour->active_region($id, $active);
				}

				/**
				 * action == order
				 * set order
				 */
				else if( $this->input->post('order') !== FALSE && $action == 'order' )
				{
					$order = $this->input->post('order');
					$this->lib_tour->saveorder_region($id, $order);
				}
			}//if
		}

		redirect($current_url);

	}

	public function edit_region($id = false){

		//Lay duong dan trang truoc no'
		$data['back_url'] = $this->session->userdata('back_url');

		if ( $id != false ){

			$info = $this->tour_model->get_region_info($id);

			if ( $info != false ){

				/*
				 * data cho combobox language
				 * - Neu trong setting khong co language thi se lay trong config
				 */
				$data['languages'] = $this->setting->get_langs();
					
				if( empty($data['languages']) )
				{
					$cf_lang['active'] = 1;
					$cf_lang['name'] = $this->config->config['language'];
					$cf_lang['abbr'] = $this->config->config['language_abbr'];

					$data['languages'][$cf_lang['abbr']] = $cf_lang;
				}
					
				//Get current_lang
				if($data['languages'] && $this->session->userdata('current_lang') == FALSE)
				{
					foreach($data['languages'] as $item)
					{
						if($item['active'] == 1)
						{
							//Set current_lang
							$data['current_lang'] = $item['abbr'];
							break;
						}
					}
				}
				else
				{
					$data['current_lang'] = $this->session->userdata('current_lang');
				}
					
				/********************* Kiem tra va create ***********************/
				foreach( $data['languages'] as $lang_item )
				{
					$lang_abbr = $lang_item['abbr'];

					$this->form_validation->set_rules(	$lang_abbr.'_'.'name',
					lang('region_name').' ['.lang($lang_abbr).']',
														'required|min_length[4]|xss_clean' );
					$this->form_validation->set_rules(	$lang_abbr.'_'.'alias',
					lang('cat_alias').' ['.lang($lang_abbr).']',
														'required|min_length[2]|max_length[5]|xss_clean' );
				}

				//Form post = TRUE
				if ($this->form_validation->run() == TRUE)
				{

					$object['id'] = $id;

					//Thong tin chung cho tat ca language
					$object['is_enabled'] 	= $this->input->post('is_enabled');
					$object['parent_id'] 	= $this->input->post('parent_id');
					$object['ordering'] 	= $this->input->post('ordering');

					//Thong tin rieng tung language
					//$k == lang_abbr
					foreach( $data['languages'] as $k => $lang_item ){

						$object['lang'][$k]['lang']		= $k;

						$object['lang'][$k]['name'] 	= $this->input->post($lang_item['abbr'].'_'.'name');
						$object['lang'][$k]['alias'] 	= $this->input->post($lang_item['abbr'].'_'.'alias');
							
					}

					//Edit
					if( $this->lib_tour->edit_region( $object ) )
					{
						$this->session->set_flashdata('message',  message($this->lib_tour->messages()) );
						redirect("admin/tour/edit_region/".$id);
					}
					else
					{
						$this->session->set_flashdata('message', message($this->lib_tour->errors(), 'error'));
						redirect("admin/tour/edit_region/".$id);
					}
				}
				else
				{
					$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : $this->session->flashdata('message');
					if( !empty($_POST) ){
						$data['restore_data'] =  $_POST;
					} else {

						foreach ( $info as $key => $item ){

							//Thong tin chung
							$restore_data['active'] = $item['active'];
							$restore_data['ordering'] = $item['ordering'];
							$restore_data['parent_id'] = $item['parent_id'];

							//thong tin rieng
							$restore_data[$item['lang'].'_'.'name'] 				= $item['name'];
							$restore_data[$item['lang'].'_'.'alias'] 				= $item['alias'];

						}

						$data['restore_data'] = $restore_data;
					}

					$data['restore_data']['id'] = $id;
					$this->load->view('tour/edit_region', $data);
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

	//ham kiem tra alias co hay khong.
	public function ajax_check_exits_region_alias()
	{
		if($this->input->post('alias') && !is_array($this->input->post('alias')))
		{
			$have_alias = $this->tour_model->exist_region_alias($this->input->post('alias'), $this->input->post('lang'));
			if($have_alias)
			{
				echo(json_encode( array('error'=>lang('have_alias')) ));
			}
			else
			{
				echo(json_encode( array('success'=>lang('have_not_alias')) ));
			}
		}
		exit;
	}

	//book seft
	function manage_book_seft(){

		//Luu url trang hien tai cho cac trang sau se back tro lai
		$this->session->set_userdata('back_url', current_url());
			
		//set per_page paging
		if($this->input->post('select_per_page'))
		{
			$this->pagination->set_per_page($this->input->post('select_per_page'));
		}
		//set language vao session
		if($this->input->post('select_lang'))
		{
			$this->session->set_userdata('current_lang_abbr', $this->input->post('select_lang'));
			redirect(uri_string());
		}
		// data cho combobox language
		$data['languages'] = $this->setting->get_langs();
		/*
		 * Lay current lang khi co tu 2 language tro len
		 * Neu co session thi current_lang = session
		 * nguoc lai lay language duoc active trong database;
		 */
		if($data['languages'])
		{
			if($this->session->userdata('current_lang_abbr'))
			{
				$data['current_lang'] = $this->session->userdata('current_lang_abbr');
			}
			else
			{
				foreach($data['languages'] as $item)
				{
					if($item['active'] == 1)
					{
						$data['current_lang'] = $item['abbr'];
					}
				}
			}
		}

		//Lay limit trong database
		$limit = $this->pagination->get_per_page();
		$offset = intval($this->uri->segment(4, 0));

		//data cho page
		$data['data'] = $this->tour_model->get_data_book_seft_count($count, $limit, $offset);

		//config paging
		$config['base_url'] = site_url("/admin/tour/manage_book_seft");
		$config['total_rows'] = $count;
		$config['per_page'] = $this->pagination->get_per_page();
		$config['num_links'] = $this->pagination->get_config('num_links');
		$config['uri_segment'] = 4;
		$config['first_link'] = lang('first_link');
		$config['last_link'] = lang('last_link');

		//Khoi tao paging
		$this->pagination->initialize($config);

		$this->load->view('tour/manage_book_seft', $data);

	}

	public function edit_book_seft($id = false){

		//Lay duong dan trang truoc no'
		$data['back_url'] = $this->session->userdata('back_url');

		if ( $id != false ){

			$this->lib_tour->active_book( $id, 1, 'is_read' );

			$info = $this->tour_model->get_data_book_seft_info($id);

			if ( $info != false ){
					
				/********************* Kiem tra va create ***********************/
				$this->form_validation->set_rules('fullname', lang('fullname'), 'required');
				$this->form_validation->set_rules('phone', lang('phone'), 'required');
				$this->form_validation->set_rules('email', lang('email'), 'required|valid_email');
				$this->form_validation->set_rules('total_person', lang('total_person'), 'required|is_natural_no_zero');
				$this->form_validation->set_rules('date_start', lang('date_start'), 'required');
				$this->form_validation->set_rules('date_end', lang('date_end'), 'required');

				//Form post = TRUE
				if ($this->form_validation->run() == TRUE)
				{

					$object['id'] = $id;

					//same create
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

					$object['is_checked'] = $this->input->post('is_checked');

					$object['list_id'] = $this->input->post('hd_id');
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

					//insert data
					$object['list_name_i'] = $this->input->post('txt_name_i');
					$object['list_birthday_i'] = $this->input->post('txt_birthday_i');
					$object['list_sex_i'] = $this->input->post('sl_sex_i');
					$object['list_age_i'] = $this->input->post('sl_age_i');
					$object['list_single_room_i'] = $this->input->post('sl_single_room_i');

					$object['list_address_i'] = $this->input->post('txt_address_i');
					$object['list_customer_based_i'] = $this->input->post('sl_customer_based_i');

					$object['list_date_issue_i'] = $this->input->post('txt_date_issue_i');
					$object['list_date_expiry_i'] = $this->input->post('txt_date_expiry_i');
					$object['list_passport_i'] = $this->input->post('txt_passport_i');
					//same create

					//Edit
					if( $this->lib_tour->edit_book_seft( $object ) )
					{
						$this->session->set_flashdata('message',  message($this->lib_tour->messages()) );
						redirect("admin/tour/edit_book_seft/".$id);
					}
					else
					{
						$this->session->set_flashdata('message', message($this->lib_tour->errors(), 'error'));
						redirect("admin/tour/edit_book_seft/".$id);
					}
				}
				else
				{
					$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : $this->session->flashdata('message');
					if( !empty($_POST) ){
						$data['restore_data'] = $_POST;
						$data['restore_data']['date'] = $info['date'];
						$data['restore_data']['date_start'] = strtotime($data['restore_data']['date_start']);
						$data['restore_data']['date_end'] = strtotime($data['restore_data']['date_end']);
					} else {
						$data['restore_data'] = $info;
						$data['restore_data']['place_visit'] = explode(',',$info['place_visit']);
					}
					$data['restore_data']['place_visit'] = $this->tour_model->get_region_info($data['restore_data']['place_visit']);
					$data['restore_data']['id'] = $id;
					$data['cb_region'] = $this->lib_tour->region_combobox();
					$data['list_person'] = $this->tour_model->get_list_person($id);

					$this->load->view('tour/edit_book_seft', $data);
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

	//output exel
	function xsl_tour($id){

		if ( $id != false ){

			$info = $this->tour_model->get_data_book_info($id);

			if ( $info != false ){
				
				$list_person = $this->tour_model->get_list_person($id);
				
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
				$tour_id		= $info['tour_id'];
				$tour_title		= $this->tour_model->get_title_tour($tour_id);
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
				
				$worksheet->mergeCells($star_r, $star_c, $star_r, $star_c+2);
				$worksheet->write($star_r, $star_c, "THÔNG TIN TOUR", $f_l_title);
				$star_r++;
				$worksheet->write($star_r, $star_c, "Tour:", $f_til);
				$worksheet->write($star_r, $star_c+1, $tour_title['title'], $f_val);
				$star_r++;
				$worksheet->write($star_r, $star_c, "Ngày khởi hành:", $f_til);
				$worksheet->write($star_r, $star_c+1, $date_start, $f_val);
				
				$star_r+=2;
				$worksheet->mergeCells($star_r, $star_c, $star_r, $star_c+1);
				$worksheet->write($star_r, $star_c, "THÔNG TIN LIÊN LẠC", $f_l_title);
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
				$worksheet->write($star_row, $star_col+5, "Loại Khách", $f_row_title);
				$worksheet->write($star_row, $star_col+6, "Độ Tuổi", $f_row_title);
				$worksheet->write($star_row, $star_col+7, "Phòng Đơn", $f_row_title);
				$worksheet->write($star_row, $star_col+8, "Ghi Chú", $f_row_title);
	
				$f_row =& $workbook->addFormat();
				$f_row->setAlign('center');
				$f_row->setAlign('vcenter');
				$f_row->setBorder(1);
				
				$arr_age = array('Người lớn', 'Trẻ em', 'Trẻ nhỏ');
				$arr_cuscomer_based = array('Việt Nam', 'Việt Kiều', 'Nước Ngoài');
				
				foreach( $list_person as $key=>$item ){
					$star_row++;
					$name 			= $item['name'];
					$birthday 		= $item['birthday'] == 0 ? '' :  date('d/m/Y', $item['birthday']);
					$address 		= $item['address'];
					$sex 			= $item['sex'] == 0 ? 'Nữ' : 'Nam';
					$customer_based = $arr_cuscomer_based[$item['customer_based']];
					$age			= $arr_age[$item['age']];
					$single_room 	= $item['single_room'] == 0 ? 'Không' : 'Có';
					
					$worksheet->write($star_row, $star_col, $key+1, $f_row);
					$worksheet->write($star_row, $star_col+1, $name, $f_row);
					$worksheet->write($star_row, $star_col+2, $birthday, $f_row);
					$worksheet->write($star_row, $star_col+3, $address, $f_row);
					$worksheet->write($star_row, $star_col+4, $sex, $f_row);
					$worksheet->write($star_row, $star_col+5, $customer_based, $f_row);
					$worksheet->write($star_row, $star_col+6, $age, $f_row);
					$worksheet->write($star_row, $star_col+7, $single_room, $f_row);
					$worksheet->write($star_row, $star_col+8, '', $f_row);
				}
				
				$f_row_foo =& $workbook->addFormat();
				$f_row_foo->setBold();
				$f_row_foo->setAlign('center');
				$f_row_foo->setAlign('vcenter');
				
				$star_row+=2;
				$worksheet->mergeCells($star_row, 6, $star_row, 8);
				$d = 'Ngày '.date('d', time()).' tháng '.date('m', time()).' năm '.date('Y', time());
				$worksheet->write($star_row, 8, $d);
				
				$star_row++;
				$worksheet->mergeCells($star_row, 0, $star_row, 2);
				$worksheet->write($star_row, 1, 'GIÁM ĐỐC', $f_row_foo);
				$worksheet->mergeCells($star_row, 3, $star_row, 5);
				$worksheet->write($star_row, 3, 'ĐIỀU HÀNH TOUR', $f_row_foo);
				$worksheet->mergeCells($star_row, 6, $star_row, 8);
				$worksheet->write($star_row, 8, 'KHÁCH HÀNG', $f_row_foo);
				
				$workbook->send('tour_book_'.$book_id.'_'.$date.'.xls');
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
	
	function xsl_tour_seft($id){
		
		if ( $id != false ){

			$info = $this->tour_model->get_data_book_seft_info($id);

			if ( $info != false ){
				
				$list_person = $this->tour_model->get_list_person($id);
				
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
				$date_end		= date('d/m/Y', $info['date_end']);
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
								
				$place_visit = $this->tour_model->get_region_info(explode(',',$info['place_visit']));
				$place_other = $info['place_other'];
				$arr_place_visit = array();
				foreach($place_visit as $item){
					if( $item['lang'] == $this->setting->lang('abbr') ){
						$arr_place_visit[] = $item['name'];
					}
				}
				$place_visit = implode(', ', $arr_place_visit);
				
				$worksheet->mergeCells($star_r, $star_c, $star_r, $star_c+2);
				$worksheet->write($star_r, $star_c, "THÔNG TIN TOUR", $f_l_title);
				$star_r++;
				$worksheet->write($star_r, $star_c, "Địa điểm:", $f_til);
				$worksheet->write($star_r, $star_c+1, $place_visit, $f_val);
				if ( !empty($place_other) ){
					$star_r++;
					$worksheet->write($star_r, $star_c, "Địa điểm khác:", $f_til);
					$worksheet->write($star_r, $star_c+1, $place_other, $f_val);
				}
				$star_r++;
				$worksheet->write($star_r, $star_c, "Ngày khởi hành:", $f_til);
				$worksheet->write($star_r, $star_c+1, $date_start, $f_val);
				$star_r++;
				$worksheet->write($star_r, $star_c, "Ngày kết thúc:", $f_til);
				$worksheet->write($star_r, $star_c+1, $date_end, $f_val);
				
				$star_r+=2;
				$worksheet->mergeCells($star_r, $star_c, $star_r, $star_c+1);
				$worksheet->write($star_r, $star_c, "THÔNG TIN LIÊN LẠC", $f_l_title);
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
				$worksheet->write($star_row, $star_col+5, "Loại Khách", $f_row_title);
				$worksheet->write($star_row, $star_col+6, "Độ Tuổi", $f_row_title);
				$worksheet->write($star_row, $star_col+7, "Phòng Đơn", $f_row_title);
				$worksheet->write($star_row, $star_col+8, "Ghi Chú", $f_row_title);
	
				$f_row =& $workbook->addFormat();
				$f_row->setAlign('center');
				$f_row->setAlign('vcenter');
				$f_row_title->setBorder(1);
				
				$arr_age = array('Người lớn', 'Trẻ em', 'Trẻ nhỏ');
				$arr_cuscomer_based = array('Việt Nam', 'Việt Kiều', 'Nước Ngoài');
				
				foreach( $list_person as $key=>$item ){
					$star_row++;
					$name 			= $item['name'];
					$birthday 		= $item['birthday'] == 0 ? '' :  date('d/m/Y', $item['birthday']);
					$address 		= $item['address'];
					$sex 			= $item['sex'] == 0 ? 'Nữ' : 'Nam';
					$customer_based = $arr_cuscomer_based[$item['customer_based']];
					$age			= $arr_age[$item['age']];
					$single_room 	= $item['single_room'] == 0 ? 'Không' : 'Có';
					
					$worksheet->write($star_row, $star_col, $key+1, $f_row);
					$worksheet->write($star_row, $star_col+1, $name, $f_row);
					$worksheet->write($star_row, $star_col+2, $birthday, $f_row);
					$worksheet->write($star_row, $star_col+3, $address, $f_row);
					$worksheet->write($star_row, $star_col+4, $sex, $f_row);
					$worksheet->write($star_row, $star_col+5, $customer_based, $f_row);
					$worksheet->write($star_row, $star_col+6, $age, $f_row);
					$worksheet->write($star_row, $star_col+7, $single_room, $f_row);
					$worksheet->write($star_row, $star_col+8, '', $f_row);
				}
				
				$f_row_foo =& $workbook->addFormat();
				$f_row_foo->setBold();
				$f_row_foo->setAlign('center');
				$f_row_foo->setAlign('vcenter');
				
				$star_row+=2;
				$worksheet->mergeCells($star_row, 6, $star_row, 8);
				$d = 'Ngày '.date('d', time()).' tháng '.date('m', time()).' năm '.date('Y', time());
				$worksheet->write($star_row, 8, $d);
				
				$star_row++;
				$worksheet->mergeCells($star_row, 0, $star_row, 2);
				$worksheet->write($star_row, 1, 'GIÁM ĐỐC', $f_row_foo);
				$worksheet->mergeCells($star_row, 3, $star_row, 5);
				$worksheet->write($star_row, 3, 'ĐIỀU HÀNH TOUR', $f_row_foo);
				$worksheet->mergeCells($star_row, 6, $star_row, 8);
				$worksheet->write($star_row, 8, 'KHÁCH HÀNG', $f_row_foo);

				$workbook->send('tour_book_'.$book_id.'_'.$date.'.xls');
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
