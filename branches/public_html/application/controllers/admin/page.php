<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends MY_Admin{

	function __construct(){

		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('Lib_Page');

		$this->lang->load('language_code');

	}

	function index(){

		$this->manage();

	}

	function manage(){

		//Luu url trang hien tai cho cac trang sau se back tro lai
		$this->session->set_userdata('back_url', current_url());

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

		/*/config paging
		 $config['base_url'] = site_url("/admin/page/manage");
		 $config['total_rows'] = $count;
		 $config['per_page'] = $this->pagination->get_per_page();
		 $config['num_links'] = $this->pagination->get_config('num_links');
		 $config['uri_segment'] = 4;
		 $config['first_link'] = lang('first_link');
		 $config['last_link'] = lang('last_link');
		 */


		//data cho page
		$data['pages'] = $this->page_model->get_page();

		$this->load->view('page/manage', $data);
	}

	//Insert page
	public function create_page()
	{

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

		/********************* Kiem tra va create menu item ***********************/
		foreach( $data['languages'] as $lang_item ){
			$this->form_validation->set_rules($lang_item['abbr'].'_title', lang('title').' ['.lang($lang_item['abbr']).']', 'min_length[4]|xss_clean');
			$this->form_validation->set_rules($lang_item['abbr'].'_content', lang('content').' ['.lang($lang_item['abbr']).']', 'xss_clean');
		}

		//Form post = TRUE
		if ($this->form_validation->run() == TRUE)
		{
				
			//Thong tin chung cho tat ca language
			$page['active']		= $this->input->post('active');

				
			//Thong tin rieng tung language
			//$k == lang_abbr
			foreach( $data['languages'] as $k => $lang_item ){
				$page['lang'][$k]['lang']		= $k;
				$page['lang'][$k]['title'] 		= $this->input->post($lang_item['abbr'].'_title');
				$page['lang'][$k]['content'] 		= $this->input->post($lang_item['abbr'].'_content');
			}

			//Insert
			if($this->lib_page->create_page( $page ))
			{
				$this->session->set_flashdata('message', $this->lib_page->messages());
				redirect("admin/page/create_page");
			}
			else
			{
				//Neu xay ra loi trong luc insert
				$data['restore_data'] =  $_POST;
				$data['message'] = message($this->lib_page->errors(), 'error');
				$this->load->view('page/create_page', $data);
			}
		}
		else
		{
			if( !empty($_POST) ){
				$data['restore_data'] =  $_POST;
			}
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('page/create_page', $data);
		}

	}

	public function delete_page(){

		$delete_talk = array();

		$this->form_validation->set_rules('id', 'Page ID', 'required | is_natural');

		if ( $this->form_validation->run() == TRUE )//Post xay ra
		{
			//Xoa 1 hoac nhieu group menu
			if ( $page_id = $this->input->post('id') )
			{
				$delete = $this->lib_page->delete_page( $page_id );
			}
		}

		if( $this->lib_page->messages() )
		{
			$delete_talk[] = message($this->lib_page->messages(), 'info');
		}
		if( $this->lib_page->errors() )
		{
			$delete_talk[] = message($this->lib_page->errors(), 'error');
		}

		$this->session->set_flashdata('delete_talk', $delete_talk);

		redirect("admin/page");

	}

	public function edit_page($page_id = false){

		//Lay duong dan trang truoc no'
		$data['back_url'] = $this->session->userdata('back_url');

		if ( $page_id != false ){
				
			$page_info = $this->page_model->get_info_page($page_id);
				
			if ( $page_info != false ){

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
					
				/********************* Kiem tra va create menu item ***********************/
				foreach( $data['languages'] as $lang_item ){
					$this->form_validation->set_rules($lang_item['abbr'].'_title', lang('title').' ['.lang($lang_item['abbr']).']', 'required|min_length[4]|xss_clean');
					$this->form_validation->set_rules($lang_item['abbr'].'_content', lang('content').' ['.lang($lang_item['abbr']).']', 'required|xss_clean');
				}

				//Form post = TRUE
				if ($this->form_validation->run() == TRUE)
				{

					//Thong tin chung cho tat ca language
					$page['active']		= $this->input->post('active');
					$page['id']			= $page_id;

					//Thong tin rieng tung language
					//$k == lang_abbr
					foreach( $data['languages'] as $k => $lang_item ){
						$page['lang'][$k]['lang']		= $k;
						$page['lang'][$k]['title'] 		= $this->input->post($lang_item['abbr'].'_title');
						$page['lang'][$k]['content'] 		= $this->input->post($lang_item['abbr'].'_content');
					}

					//Edit
					if($this->lib_page->edit_page( $page ))
					{
						$this->session->set_flashdata('message', $this->lib_page->messages());
						redirect("admin/page/edit_page");
					}
					else
					{
						//Neu xay ra loi trong luc update
						$data['restore_data'] =  $_POST;
						$data['message'] = message($this->lib_page->errors(), 'error');
						$this->load->view('page/edit_page', $data);
					}
				}
				else
				{
					$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
					if( !empty($_POST) ){
						$data['restore_data'] =  $_POST;
					} else {
						foreach ( $page_info as $item ){
							$restore_data[$item['lang'].'_title'] = $item['title'];
							$restore_data[$item['lang'].'_content'] = $item['content'];	
							$restore_data['active'] = $item['active'];
						}
						$data['restore_data'] = $restore_data;
					}
					$data['restore_data']['id'] = $page_id;
					$this->load->view('page/edit_page', $data);
				}

			} 
			else {
				// page_id khong co trong CSDL
				redirect($data['back_url']);
			}
		}
		else {
			// khong co page_id tren link
			redirect($data['back_url']);
		}

	}

	public function update_page(){

		$current_url = 'admin/page';

		$this->form_validation->set_rules('id', 'required | is_natural');
		$this->form_validation->set_rules('current_url', 'required');

		if( $this->form_validation->run() == TRUE )
		{
			//MUTIL UPDATE
			if( $this->input->post('id') !== FALSE
			&& $this->input->post('action') !== FALSE)
			{
				$page_id = $this->input->post('id');
				$action = $this->input->post('action');

				/**
				 * action == publish
				 * set publish and unpublish
				 */
				if( $this->input->post('active') !== FALSE && $action == 'publish' )
				{
					$active = $this->input->post('active');
					$this->lib_page->active_page($page_id, $active);
				}

			}
				
			if( $this->input->post('current_url') )
			{
				$current_url = $this->input->post('current_url');
			}
		}

		redirect($current_url);

	}

}