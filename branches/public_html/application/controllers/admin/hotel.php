<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotel extends MY_Admin{

	function __construct(){

		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('Lib_Hotel');

		$this->lang->load('language_code');

	}

	function index(){
		$this->manage();
	}

	function manage(){

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
		$data['data'] = $this->hotel_model->get_data_count($count, $limit, $offset);

		//config paging
		$config['base_url'] = site_url("/admin/hotel/manage");
		$config['total_rows'] = $count;
		$config['per_page'] = $this->pagination->get_per_page();
		$config['num_links'] = $this->pagination->get_config('num_links');
		$config['uri_segment'] = 4;
		$config['first_link'] = lang('first_link');
		$config['last_link'] = lang('last_link');

		//Khoi tao paging
		$this->pagination->initialize($config);

		$this->load->view('hotel/manage', $data);

	}


	function create(){
		
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
			lang('name').' ['.lang($lang_abbr).']',
												'required|min_length[4]|xss_clean' );
			$this->form_validation->set_rules(	$lang_abbr.'_'.'address',
			lang('address').' ['.lang($lang_abbr).']',
												'required|xss_clean' );
			$lang_abbr = $lang_item['abbr'];
			$this->form_validation->set_rules(	$lang_abbr.'_'.'short_introduce',
			lang('short_introduce').' ['.lang($lang_abbr).']',
												'required|xss_clean' );
			$this->form_validation->set_rules(	$lang_abbr.'_'.'full_introduce',
			lang('full_introduce').' ['.lang($lang_abbr).']',
												'required|xss_clean' );
		}
		
		//Form post = TRUE
		if ($this->form_validation->run() == TRUE)
		{

			$object = array();
			
			//Thong tin chung cho tat ca language
			$object['date'] 		= time()-3600;
			$object['is_enabled'] 	= $this->input->post('is_enabled');
			
			$object['image'] 		= $this->input->post('image');
			$object['level'] 		= $this->input->post('level');
			$object['web'] 			= $this->input->post('web');

			//Thong tin rieng tung language
			//$k == lang_abbr
			foreach( $data['languages'] as $k => $lang_item ){

				$object['lang'][$k]['lang']		= $k;

				$object['lang'][$k]['name'] 				= $this->input->post($lang_item['abbr'].'_'.'name');
				$object['lang'][$k]['address'] 				= $this->input->post($lang_item['abbr'].'_'.'address');
				$object['lang'][$k]['short_introduce'] 		= $this->input->post($lang_item['abbr'].'_'.'short_introduce');
				$object['lang'][$k]['full_introduce'] 		= $this->input->post($lang_item['abbr'].'_'.'full_introduce');
					
			}

			//Insert
			if($this->lib_hotel->create( $object ) )
			{
				//success
				$this->session->set_flashdata('message', $this->lib_hotel->messages());
				redirect("admin/hotel/create");
			}
			else
			{
				//Neu xay ra loi trong luc insert
				$data['restore_data'] =  $_POST;
				$data['message'] = message($this->lib_hotel->errors(), 'error');
				$this->load->view('hotel/create', $data);
			}
		}
		else
		{
			if( !empty($_POST) ){
				$data['restore_data'] =  $_POST;
			}
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('hotel/create', $data);
		}

	}

	public function delete(){

		$delete_talk = array();

		$this->form_validation->set_rules('id', 'ID', 'required | is_natural ');

		if ( $this->form_validation->run() == TRUE )//Post xay ra
		{
			//Xoa 1 hoac nhieu
			if ( $id = $this->input->post('id') )
			{
				$delete = $this->lib_hotel->delete( $id );
			}
		}

		if( $this->lib_hotel->messages() )
		{
			$delete_talk[] = message($this->lib_hotel->messages(), 'info');
		}
		if( $this->lib_hotel->errors() )
		{
			$delete_talk[] = message($this->lib_hotel->errors(), 'error');
		}

		$this->session->set_flashdata('delete_talk', $delete_talk);

		redirect("admin/hotel/manage");

	}

	public function update(){

		$current_url = 'admin/hotel/manage';

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
					$this->lib_hotel->active($id, $active, 'is_enabled');
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

			$info = $this->hotel_model->get_data_info($id);

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
						
					$this->form_validation->set_rules(	$lang_abbr.'_'.'name',
					lang('name').' ['.lang($lang_abbr).']',
														'required|min_length[4]|xss_clean' );
					$this->form_validation->set_rules(	$lang_abbr.'_'.'address',
					lang('address').' ['.lang($lang_abbr).']',
														'required|xss_clean' );
					$lang_abbr = $lang_item['abbr'];
					$this->form_validation->set_rules(	$lang_abbr.'_'.'short_introduce',
					lang('short_introduce').' ['.lang($lang_abbr).']',
														'required|xss_clean' );
					$this->form_validation->set_rules(	$lang_abbr.'_'.'full_introduce',
					lang('full_introduce').' ['.lang($lang_abbr).']',
														'required|xss_clean' );
							
				}

				//Form post = TRUE
				if ($this->form_validation->run() == TRUE)
				{
					
					$object['id'] = $id;
					
					//same create
					//Thong tin chung cho tat ca language
					$object['date'] 		= time()-3600;
					$object['is_enabled'] 	= $this->input->post('is_enabled');
					
					$object['image'] 		= $this->input->post('image');
					$object['level'] 		= $this->input->post('level');
					$object['web'] 			= $this->input->post('web');

					//Thong tin rieng tung language
					//$k == lang_abbr
					foreach( $data['languages'] as $k => $lang_item ){

						$object['lang'][$k]['lang']		= $k;

						$object['lang'][$k]['name'] 				= $this->input->post($lang_item['abbr'].'_'.'name');
						$object['lang'][$k]['address'] 				= $this->input->post($lang_item['abbr'].'_'.'address');
						$object['lang'][$k]['short_introduce'] 		= $this->input->post($lang_item['abbr'].'_'.'short_introduce');
						$object['lang'][$k]['full_introduce'] 		= $this->input->post($lang_item['abbr'].'_'.'full_introduce');
							
					}
					//same create
						
					//Edit
					if( $this->lib_hotel->edit( $object ) )
					{
						$this->session->set_flashdata('message',  message($this->lib_hotel->messages()) );
						redirect("admin/hotel/edit/".$id);
					}
					else
					{
						$this->session->set_flashdata('message', message($this->lib_hotel->errors(), 'error'));
						redirect("admin/hotel/edit/".$id);
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

							$restore_data['image'] 		= $item['image'];
							$restore_data['level'] 		= $item['level'];
							$restore_data['web'] 		= $item['web'];
										
							//thong tin rieng
							$restore_data[$item['lang'].'_'.'name'] 				= $item['name'];
							$restore_data[$item['lang'].'_'.'address'] 				= $item['address'];
							$restore_data[$item['lang'].'_'.'short_introduce'] 		= $item['short_introduce'];
							$restore_data[$item['lang'].'_'.'full_introduce'] 		= $item['full_introduce'];
								
						}
						
						$data['restore_data'] = $restore_data;
					}
					
					$data['restore_data']['id'] = $id;
					$this->load->view('hotel/edit', $data);
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
	
	//Manage Category Hotel
	
	function manage_cat_room(){

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
		$data['data'] = $this->hotel_model->get_cat_room_data_count($count, $limit, $offset);

		//config paging
		$config['base_url'] = site_url("/admin/hotel/manage_cat_room");
		$config['total_rows'] = $count;
		$config['per_page'] = $this->pagination->get_per_page();
		$config['num_links'] = $this->pagination->get_config('num_links');
		$config['uri_segment'] = 4;
		$config['first_link'] = lang('first_link');
		$config['last_link'] = lang('last_link');

		//Khoi tao paging
		$this->pagination->initialize($config);

		$this->load->view('hotel/manage_cat_room', $data);

	}


	function create_cat_room(){
		
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
			lang('name').' ['.lang($lang_abbr).']',
												'required|min_length[4]|xss_clean' );
		}
		
		//Form post = TRUE
		if ($this->form_validation->run() == TRUE)
		{

			$object = array();
			
			//Thong tin chung cho tat ca language
			$object['date'] 		= time()-3600;
			$object['is_enabled'] 	= $this->input->post('is_enabled');

			//Thong tin rieng tung language
			//$k == lang_abbr
			foreach( $data['languages'] as $k => $lang_item ){

				$object['lang'][$k]['lang']		= $k;

				$object['lang'][$k]['name'] 	= $this->input->post($lang_item['abbr'].'_'.'name');
					
			}

			//Insert
			if($this->lib_hotel->create_cat_room( $object ) )
			{
				//success
				$this->session->set_flashdata('message', $this->lib_hotel->messages());
				redirect("admin/hotel/create_cat_room");
			}
			else
			{
				//Neu xay ra loi trong luc insert
				$data['restore_data'] =  $_POST;
				$data['message'] = message($this->lib_hotel->errors(), 'error');
				$this->load->view('hotel/create_cat_room', $data);
			}
		}
		else
		{
			if( !empty($_POST) ){
				$data['restore_data'] =  $_POST;
			}
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('hotel/create_cat_room', $data);
		}

	}
	
	public function delete_cat_room(){

		$delete_talk = array();

		$this->form_validation->set_rules('id', 'ID', 'required | is_natural ');

		if ( $this->form_validation->run() == TRUE )//Post xay ra
		{
			//Xoa 1 hoac nhieu
			if ( $id = $this->input->post('id') )
			{
				$delete = $this->lib_hotel->delete_cat_room( $id );
			}
		}

		if( $this->lib_hotel->messages() )
		{
			$delete_talk[] = message($this->lib_hotel->messages(), 'info');
		}
		if( $this->lib_hotel->errors() )
		{
			$delete_talk[] = message($this->lib_hotel->errors(), 'error');
		}

		$this->session->set_flashdata('delete_talk', $delete_talk);

		redirect("admin/hotel/manage_cat_room");

	}
	
	public function update_cat_room(){

		$current_url = 'admin/hotel/manage_cat_room';

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
					$this->lib_hotel->active_cat_room($id, $active, 'is_enabled');
				}

			}

			if( $this->input->post('current_url') )
			{
				$current_url = $this->input->post('current_url');
			}
		}

		redirect($current_url);

	}
	
	public function edit_cat_room($id = false){

		//Lay duong dan trang truoc no'
		$data['back_url'] = $this->session->userdata('back_url');

		if ( $id != false ){

			$info = $this->hotel_model->get_cat_room_data_info($id);

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
						
					$this->form_validation->set_rules(	$lang_abbr.'_'.'name',
					lang('name').' ['.lang($lang_abbr).']',
														'required|min_length[4]|xss_clean' );
							
				}

				//Form post = TRUE
				if ($this->form_validation->run() == TRUE)
				{
					
					$object['id'] = $id;
					
					//same create
					//Thong tin chung cho tat ca language
					$object['date'] 		= time()-3600;
					$object['is_enabled'] 	= $this->input->post('is_enabled');

					//Thong tin rieng tung language
					//$k == lang_abbr
					foreach( $data['languages'] as $k => $lang_item ){

						$object['lang'][$k]['lang']		= $k;

						$object['lang'][$k]['name'] 				= $this->input->post($lang_item['abbr'].'_'.'name');
							
					}
					//same create
						
					//Edit
					if( $this->lib_hotel->edit_cat_room( $object ) )
					{
						$this->session->set_flashdata('message',  message($this->lib_hotel->messages()) );
						redirect("admin/hotel/edit_cat_room/".$id);
					}
					else
					{
						$this->session->set_flashdata('message', message($this->lib_hotel->errors(), 'error'));
						redirect("admin/hotel/edit_cat_room/".$id);
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
										
							//thong tin rieng
							$restore_data[$item['lang'].'_'.'name'] 				= $item['name'];
								
						}
						
						$data['restore_data'] = $restore_data;
					}
					
					$data['restore_data']['id'] = $id;
					$this->load->view('hotel/edit_cat_room', $data);
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
	
	//Manage Hotel Room
	
	function manage_room(){

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
		$data['data'] = $this->hotel_model->get_room_data_count($count, $limit, $offset);

		//config paging
		$config['base_url'] = site_url("/admin/hotel/manage_room");
		$config['total_rows'] = $count;
		$config['per_page'] = $this->pagination->get_per_page();
		$config['num_links'] = $this->pagination->get_config('num_links');
		$config['uri_segment'] = 4;
		$config['first_link'] = lang('first_link');
		$config['last_link'] = lang('last_link');

		//Khoi tao paging
		$this->pagination->initialize($config);

		$this->load->view('hotel/manage_room', $data);

	}


	function create_room(){
		
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
			lang('name').' ['.lang($lang_abbr).']',
												'required|min_length[4]|xss_clean' );
			$this->form_validation->set_rules(	$lang_abbr.'_'.'price',
			lang('price').' ['.lang($lang_abbr).']',
												'required|xss_clean' );
		}
		
		//Form post = TRUE
		if ($this->form_validation->run() == TRUE)
		{

			$object = array();
			
			//Thong tin chung cho tat ca language
			$object['date'] 		= time()-3600;
			$object['is_enabled'] 	= $this->input->post('is_enabled');
			
			$object['image'] 				= $this->input->post('image');
			$object['hotel_id'] 			= $this->input->post('hotel');
			$object['hotel_room_cat_id'] 	= $this->input->post('room_cat');

			//Thong tin rieng tung language
			//$k == lang_abbr
			foreach( $data['languages'] as $k => $lang_item ){

				$object['lang'][$k]['lang']		= $k;

				$object['lang'][$k]['name'] 		= $this->input->post($lang_item['abbr'].'_'.'name');
				$object['lang'][$k]['price'] 		= $this->input->post($lang_item['abbr'].'_'.'price');
				$object['lang'][$k]['curency'] 		= $this->input->post($lang_item['abbr'].'_'.'curency');
				$object['lang'][$k]['introduce'] 	= $this->input->post($lang_item['abbr'].'_'.'introduce');
				
			}

			//Insert
			if($this->lib_hotel->create_room( $object ) )
			{
				//success
				$this->session->set_flashdata('message', $this->lib_hotel->messages());
				//$data['hotel'] = $this->hotel_model->get_data();
				//$data['room_cat'] = $this->hotel_model->get_cat_room_data();
				redirect("admin/hotel/create_room");
			}
			else
			{
				//Neu xay ra loi trong luc insert
				$data['restore_data'] =  $_POST;
				$data['message'] = message($this->lib_hotel->errors(), 'error');
				$data['hotel'] = $this->hotel_model->get_data();
				$data['room_cat'] = $this->hotel_model->get_cat_room_data();
				$this->load->view('hotel/create_room', $data);
			}
		}
		else
		{
			if( !empty($_POST) ){
				$data['restore_data'] =  $_POST;
			}
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$data['hotel'] = $this->hotel_model->get_data();
			$data['room_cat'] = $this->hotel_model->get_cat_room_data();
			$this->load->view('hotel/create_room', $data);
		}

	}
	
	public function delete_room(){

		$delete_talk = array();

		$this->form_validation->set_rules('id', 'ID', 'required | is_natural ');

		if ( $this->form_validation->run() == TRUE )//Post xay ra
		{
			//Xoa 1 hoac nhieu
			if ( $id = $this->input->post('id') )
			{
				$delete = $this->lib_hotel->delete_room( $id );
			}
		}

		if( $this->lib_hotel->messages() )
		{
			$delete_talk[] = message($this->lib_hotel->messages(), 'info');
		}
		if( $this->lib_hotel->errors() )
		{
			$delete_talk[] = message($this->lib_hotel->errors(), 'error');
		}

		$this->session->set_flashdata('delete_talk', $delete_talk);

		redirect("admin/hotel/manage_room");

	}
	
	public function update_room(){

		$current_url = 'admin/hotel/manage_room';

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
					$this->lib_hotel->active_room($id, $active, 'is_enabled');
				}

			}

			if( $this->input->post('current_url') )
			{
				$current_url = $this->input->post('current_url');
			}
		}

		redirect($current_url);

	}
	
	public function edit_room($id = false){

		//Lay duong dan trang truoc no'
		$data['back_url'] = $this->session->userdata('back_url');

		if ( $id != false ){

			$info = $this->hotel_model->get_room_data_info($id);

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
						
					$this->form_validation->set_rules(	$lang_abbr.'_'.'name',
					lang('name').' ['.lang($lang_abbr).']',
														'required|min_length[4]|xss_clean' );

					$this->form_validation->set_rules(	$lang_abbr.'_'.'price',
					lang('price').' ['.lang($lang_abbr).']',
														'required|xss_clean' );
					
				}

				//Form post = TRUE
				if ($this->form_validation->run() == TRUE)
				{
					
					$object['id'] = $id;
					
					//same create
					//Thong tin chung cho tat ca language
					//$object['date'] 		= time()-3600;
					$object['is_enabled'] 	= $this->input->post('is_enabled');
					
					$object['image'] 				= $this->input->post('image');
					$object['hotel_id'] 			= $this->input->post('hotel');
					$object['hotel_room_cat_id'] 	= $this->input->post('room_cat');	

					//Thong tin rieng tung language
					//$k == lang_abbr
					foreach( $data['languages'] as $k => $lang_item ){

						$object['lang'][$k]['lang']		= $k;

						$object['lang'][$k]['name'] 		= $this->input->post($lang_item['abbr'].'_'.'name');
						$object['lang'][$k]['price'] 		= $this->input->post($lang_item['abbr'].'_'.'price');
						$object['lang'][$k]['introduce'] 	= $this->input->post($lang_item['abbr'].'_'.'introduce');
						
					}
					//same create
						
					//Edit
					if( $this->lib_hotel->edit_room( $object ) )
					{
						$this->session->set_flashdata('message',  message($this->lib_hotel->messages()) );
						//$data['hotel'] = $this->hotel_model->get_data();
						//$data['room_cat'] = $this->hotel_model->get_cat_room_data();
						redirect("admin/hotel/edit_room/".$id);
					}
					else
					{
						$this->session->set_flashdata('message', message($this->lib_hotel->errors(), 'error'));
						//$data['hotel'] = $this->hotel_model->get_data();
						//$data['room_cat'] = $this->hotel_model->get_cat_room_data();
						redirect("admin/hotel/edit_room/".$id);
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
							$restore_data['is_enabled'] 		= $item['is_enabled'];
							$restore_data['image'] 				= $item['image'];
							$restore_data['hotel'] 				= $item['hotel_id'];
							$restore_data['room_cat'] 			= $item['hotel_room_cat_id'];
										
							//thong tin rieng
							$restore_data[$item['lang'].'_'.'name'] 		= $item['name'];
							$restore_data[$item['lang'].'_'.'price'] 		= $item['price'];
							$restore_data[$item['lang'].'_'.'introduce'] 	= $item['introduce'];
								
						}
						
						$data['restore_data'] = $restore_data;
					}
					
					$data['restore_data']['id'] = $id;
					$data['hotel'] = $this->hotel_model->get_data();
					$data['room_cat'] = $this->hotel_model->get_cat_room_data();
					$this->load->view('hotel/edit_room', $data);
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
		$data['data'] = $this->hotel_model->get_data_book_count($count, $limit, $offset);
		
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
					$this->lib_hotel->active_book($id, $active, 'is_checked');
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
				$delete = $this->lib_hotel->delete_book( $id );
			}
		}

		if( $this->lib_hotel->messages() )
		{
			$delete_talk[] = message($this->lib_hotel->messages(), 'info');
		}
		if( $this->lib_hotel->errors() )
		{
			$delete_talk[] = message($this->lib_hotel->errors(), 'error');
		}

		$this->session->set_flashdata('delete_talk', $delete_talk);

		redirect("admin/".$this->router->class."/manage_book");

	}
	
	public function edit_book($id = false){

		//Lay duong dan trang truoc no'
		$data['back_url'] = $this->session->userdata('back_url');
		
		if ( $id != false ){
			
			$this->lib_hotel->active_book( $id, 1, 'is_read' );
			
			$info = $this->hotel_model->get_data_book_info($id);
			
			if ( $info != false ){
					
				/********************* Kiem tra va create ***********************/
				$this->form_validation->set_rules('fullname', lang('fullname'), 'required');
				$this->form_validation->set_rules('phone', lang('phone'), 'required');
				$this->form_validation->set_rules('email', lang('email'), 'required|valid_email');
				$this->form_validation->set_rules('total_person', lang('total_person'), 'required|is_natural_no_zero');
				$this->form_validation->set_rules('check_in', lang('check_in'), 'required');
				$this->form_validation->set_rules('check_out', lang('check_out'), 'required');

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
					$object['tax_code'] = $this->input->post('tax_code');
					$object['company'] = $this->input->post('company');
					$object['check_in'] = strtotime($this->input->post('check_out'));
					$object['check_out'] = strtotime($this->input->post('check_in'));
					$object['other_requirement'] = $this->input->post('other_requirement');
					$object['payment_method'] = $this->input->post('payment_method');
					$object['hotel_id'] = $this->input->post('hotel');
					
					$object['single_room'] = $this->input->post('single_room');
					$object['double_room'] = $this->input->post('double_room');
					$object['family_room'] = $this->input->post('family_room');
					
					$object['is_checked'] = $this->input->post('is_checked');
						
					//Edit
					if( $this->lib_hotel->edit_book( $object ) )
					{
						$this->session->set_flashdata('message',  message($this->lib_hotel->messages()) );
						redirect("admin/".$this->router->class."/edit_book/".$id);
					}
					else
					{
						$this->session->set_flashdata('message', message($this->lib_hotel->errors(), 'error'));
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
					$data['list_hotel'] = $this->hotel_model->get_hotel('id, level, name');
					
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
	
	function xsl($id){

		if ( $id != false ){

			$info = $this->hotel_model->get_data_book_info($id);

			if ( $info != false ){
								
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
				$hotel_id		= $info['hotel_id'];
				$hotel_name		= $this->hotel_model->get_name_hotel($hotel_id);
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
				$single_room	= $info['single_room'];
				$double_room	= $info['double_room'];
				$family_room	= $info['family_room'];
				$check_in		= date('d/m/Y', $info['check_in']);
				$check_out		= date('d/m/Y', $info['check_out']);
				
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
				$star_r++;
				
				$star_r+=2;
				$worksheet->mergeCells($star_r, $star_c, $star_r, $star_c+1);
				$worksheet->write($star_r, $star_c, "THÔNG TIN ĐẶT", $f_l_title);
				$star_r++;
				$worksheet->write($star_r, $star_c, "Khách sạn:", $f_til);
				$worksheet->write($star_r, $star_c+1, $hotel_name['name'], $f_val);
				$star_r++;
				$worksheet->write($star_r, $star_c, "Ngày nhận phòng:", $f_til);
				$worksheet->write($star_r, $star_c+1, $check_in, $f_val);
				$star_r++;
				$worksheet->write($star_r, $star_c, "Ngày trả phòng:", $f_til);
				$worksheet->write($star_r, $star_c+1, $check_out, $f_val);
				$star_r+=2;
				$worksheet->write($star_r, $star_c, "Số lượng phòng:", $f_til);
				$star_r++;
				$worksheet->write($star_r, $star_c, "Phòng đơn:", $f_til);
				$worksheet->write($star_r, $star_c+1, $single_room, $f_val);
				$star_r++;
				$worksheet->write($star_r, $star_c, "Phòng đôi:", $f_til);
				$worksheet->write($star_r, $star_c+1, $double_room, $f_val);
				$star_r++;
				$worksheet->write($star_r, $star_c, "Phòng gia đình:", $f_til);
				$worksheet->write($star_r, $star_c+1, $family_room, $f_val);
				
				$star_row = $star_r+2;
				$star_col = 0;
				
				$worksheet->setColumn($star_col, $star_col, 4);
				$worksheet->setColumn($star_col+1, $star_col+1, 25);
				$worksheet->setColumn($star_col+2, $star_col+2, 10);
				$worksheet->setColumn($star_col+3, $star_col+3, 20);
				$worksheet->setColumn($star_col+4, $star_col+4, 10);
				$worksheet->setColumn($star_col+5, $star_col+5, 12);
				$worksheet->setColumn($star_col+6, $star_col+6, 10);
				$worksheet->setColumn($star_col+7, $star_col+7, 10);
				$worksheet->setColumn($star_col+8, $star_col+8, 20);

				$worksheet->write($star_row, $star_col+1, 'Người lớn', $f_til);
				$worksheet->write($star_row, $star_col+2, $adult, $f_val);
				$star_row++;
				$worksheet->write($star_row, $star_col+1, 'Trẻ em', $f_til);
				$worksheet->write($star_row, $star_col+2, $child, $f_val);
				$star_row++;
				$worksheet->write($star_row, $star_col+1, 'Trẻ nhỏ', $f_til);
				$worksheet->write($star_row, $star_col+2, $baby, $f_val);
				$star_row++;
				$worksheet->write($star_row, $star_col+1, 'Tổng số người', $f_til);
				$worksheet->write($star_row, $star_col+2, $total_person, $f_val);
				
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
				
				$workbook->send('hotel_book_'.$book_id.'_'.$date.'.xls');
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
