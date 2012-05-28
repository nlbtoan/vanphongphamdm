<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends MY_Admin
{
	public function __construct()
	{
		parent::__construct();
				
		##--LOAD LIBRARY--##
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('Lib_News');
		
		##--LOAD LANGUAGE--##
		$this->lang->load('language_code');
		
		##--LOAD MODEL--##
		$this->load->helper('news');

		##--LOAD MODEL--##
		$this->load->model('news_model');

		##--FIRST FIX--##
		$this->form_validation->set_error_delimiters('<li>', '</li>');
	}
	
	public function index()
	{
		$this->category($paging = 1);
	}
	
	public function category()
	{
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
		
		//Lay limit trong database
		$limit = $this->pagination->get_per_page();
		$offset = intval($this->uri->segment(4));
		
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
		
		// data table menu
		$data['news_items'] = $this->news_model->get_cat_all($count, $limit, $offset);
		
		//config paging
		$config['base_url'] = site_url("/admin/news/category");
		$config['total_rows'] = $count;
		$config['per_page'] = $this->pagination->get_per_page();
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
		
		$this->load->view('news/category', $data);
	}
	
	public function create_category()
	{
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
		
		/********************* Kiem tra va create category ***********************/
		foreach( $data['languages'] as $lang_item ){
			$this->form_validation->set_rules($lang_item['abbr'].'_name', lang('name').' ['.lang($lang_item['abbr']).']', 'required|min_length[4]|max_length[64]|xss_clean');
			$this->form_validation->set_rules($lang_item['abbr'].'_alias', lang('abbrev').' ['.lang($lang_item['abbr']).']', 'required|min_length[4]|max_length[64]|alpha_dash|xss_clean');
		}

		//Form post = TRUE
		if ($this->form_validation->run() == TRUE)
		{ 
			//Kiem tra alias co ton tai hay khong cua tat ca language
			foreach( $data['languages'] as $lang_item ){
				$have_alias = $this->lib_news->exist_alias_category($this->input->post($lang_item['abbr'].'_alias'), $lang_item['abbr']);
				if($have_alias)
				{
					//Tru`ng ten_ma [alias] trong database
					$data['message'] = message($this->lib_news->errors(), 'error');
					$this->load->view('news/create_category', $data);
					return;
				}
			}
			
			//Thong tin chung cho tat ca language
			$row['browser_nav']	= $this->input->post('browser_nav');
			$row['active']		= $this->input->post('active');
			$row['parent'] 		= $this->input->post('parent');
			
			//Thong tin rieng tung language
			//$k == lang_abbr
			foreach( $data['languages'] as $k => $lang_item ){
				$row['lang'][$k]['lang']		= $k;
				$row['lang'][$k]['name'] 	= $this->input->post($lang_item['abbr'].'_name');
				$row['lang'][$k]['alias'] 		= $this->input->post($lang_item['abbr'].'_alias');
			}

			//Insert
			if($this->lib_news->create_category( $row ))
			{
				$this->session->set_flashdata('message', $this->lib_news->messages());
				redirect("admin/news/create_category");
			}
			else
			{
				//Luu data post khi loi xay ra
				$data['restore_data'] = $_POST;
				
				//Neu xay ra loi trong luc insert
				$data['message'] = message($this->lib_news->errors(), 'error');
				$this->load->view('news/create_category', $data);
			}
		}
		else
		{
			//Luu data post khi loi xay ra
			if(! empty($_POST) ) $data['restore_data'] = $_POST;
			
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('news/create_category', $data);
		}
	}
	
	public function edit_category( $cat_id = FALSE)
	{
		if($cat_id == FALSE)
		{
			redirect('admin/news');
		}
		
		(empty($_POST)) ? $data['info'] = $this->news_model->get_category_info($cat_id) : $data['info'] = $_POST;
		
		if( empty($data['info']) )
		{
			redirect('admin/news');
		}
		
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
		
		/********************* Kiem tra va create categoy ***********************/
		foreach( $data['languages'] as $lang_item ){
			$this->form_validation->set_rules($lang_item['abbr'].'_name', lang('name').' ['.lang($lang_item['abbr']).']', 'required|min_length[4]|max_length[64]|xss_clean');
			$this->form_validation->set_rules($lang_item['abbr'].'_alias', lang('abbrev').' ['.lang($lang_item['abbr']).']', 'required|min_length[4]|max_length[64]|alpha_dash|xss_clean');
		}
		
		if( $this->form_validation->run() == TRUE )
		{ 
			//Kiem tra alias co ton tai hay khong cua tat ca language
			foreach( $data['languages'] as $lang_item ){
				$have_alias = $this->lib_news->exist_alias_category($this->input->post($lang_item['abbr'].'_alias'), $lang_item['abbr'], $cat_id);
				if($have_alias)
				{
					//Tru`ng ten_ma [alias] trong database
					$data['message'] = message($this->lib_news->errors(), 'error');
					$this->load->view('news/create_category', $data);
					return;
				}
			}
			//Thong tin chung cho tat ca language
			$row['id']			= $cat_id;
			$row['browser_nav']	= $this->input->post('browser_nav');
			$row['active']		= $this->input->post('active');
			$row['parent'] 		= $this->input->post('parent');
			$row['ordering']	= $this->input->post('ordering');
			
			//Thong tin rieng tung language
			//$k == lang_abbr
			foreach( $data['languages'] as $k => $lang_item )
			{
				$row['lang'][$k]['name'] 	= $this->input->post($lang_item['abbr'].'_name');
				$row['lang'][$k]['alias'] 		= $this->input->post($lang_item['abbr'].'_alias');
			}
							
			//Update category
			if( $this->lib_news->update_category($row) )
			{
				$this->session->set_flashdata('message', $this->lib_news->messages());
				redirect("admin/news/edit_category/" . $cat_id);
			}
			else
			{
				//Neu xay ra loi trong luc insert
				$data['message'] = message($this->lib_news->errors(), 'error');
				$this->load->view('news/update_category', $data);
			}
		}//if
		else
		{
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('news/update_category', $data);
		}
	}
	
	public function update_category()
	{
		$this->form_validation->set_rules('id', 'required | is_natural');
		$this->form_validation->set_rules('current_url', 'required');
		
		if( $this->form_validation->run() == TRUE )
		{ 
			//MUTIL UPDATE
			if( $this->input->post('id') !== FALSE
				&& $this->input->post('action') !== FALSE)
			{
				$cat_id = $this->input->post('id');
				$action = $this->input->post('action');
				
				/**
				 * action == publish
				 * set publish and unpublish
				 */
				if( $this->input->post('active') !== FALSE && $action == 'publish' )
				{
					$active = $this->input->post('active');
					$this->lib_news->active_category($cat_id, $active);
				} 
				
				/**
				 * action == order
				 * set order
				 */
				else if( $this->input->post('order') !== FALSE && $action == 'order' )
				{
					$order = $this->input->post('order');
					$this->lib_news->saveorder_category($cat_id, $order);
				}
			}//if
		}
		redirect('admin/news/category');
	}
	
	public function delete_category()
	{
		$delete_talk = array();
		
		$this->form_validation->set_rules('id', 'Category ID', 'required | is_natural | exist_category_child');
			
		if ( $this->form_validation->run() == TRUE )//Post xay ra
		{
			//Xoa 1 hoac nhieu category
			if ( $cat_id = $this->input->post('id') )
			{
				$have_child = $this->lib_news->exist_category_child($this->input->post('id'));

				if( $have_child == FALSE ) // Xoa category
				{
					$delete = $this->lib_news->delete_category($cat_id);
				}
			}
		}
		
		if( $this->lib_news->messages() )
		{
			$delete_talk[] = message($this->lib_news->messages(), 'info');
		}
		if( $this->lib_news->errors() )
		{
			$delete_talk[] = message($this->lib_news->errors(), 'error');
		}
		
		$this->session->set_flashdata('delete_talk', $delete_talk);

		redirect("admin/news/category");
	}
	
	/*************************************************************
	 * 						AJAX FOR CATEGORY					 *
	 *************************************************************/
	
	//ham kiem tra alias co hay khong.
	public function ajax_check_exits_alias()
	{
		if($this->input->post('alias') && !is_array($this->input->post('alias')))
		{
			$have_alias = $this->news_model->exist_alias_category($this->input->post('alias'), $this->input->post('lang'));
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
	
	
	/***************************************************************/
	public function manage_news( $cat_id = FALSE, $paging = 1 )
	{
		//Neu khong co co id category se chuyen qua trang manage category
		if($cat_id == FALSE) redirect('admin/news');
		
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
		
		//Lay limit trong database
		$limit = $this->pagination->get_per_page();
		$offset = intval($this->uri->segment(5));
		
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
		
		// data table menu
		$data['data'] = $this->news_model->get_news_by_cat($cat_id, $count, $limit, $offset);
		
		//Truyen id ra ngoai view
		$data['current_cat'] = $cat_id;
		
		//set sesstion cho cat_id de khi Them,Edit news co the lay duoc cat_id
		$this->session->set_flashdata('category_id', $cat_id);
		
		//config paging
		$config['base_url'] = site_url("/admin/news/category");
		$config['total_rows'] = $count;
		$config['per_page'] = $this->pagination->get_per_page();
		$config['num_links'] = $this->pagination->get_config('num_links');
		$config['uri_segment'] = 5;
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
		
		$this->load->view('news/manage_news', $data);
	}
	
	public function update_news()
	{
		$current_url = 'admin/news';
		
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
					$this->lib_news->active_news($id, $active);
				}
				
				if( $this->input->post('current_url') )
				{
					$current_url = $this->input->post('current_url');
				}
			}//if
		}
		redirect($current_url);
	}
	
	public function delete_news()
	{
		$current_url = 'admin/news';
		$delete_talk = array();
		
		$this->form_validation->set_rules('id', 'News ID', 'required | is_natural');
			
		if ( $this->form_validation->run() == TRUE )//Post xay ra
		{
			//Xoa 1 hoac nhieu category
			if ( $id = $this->input->post('id') )
			{
				$delete = $this->lib_news->delete_news($id);
			}
			
			if( $this->input->post('current_url') )
			{
				$current_url = $this->input->post('current_url');
			}
		}
		
		if( $this->lib_news->messages() )
		{
			$delete_talk[] = message($this->lib_news->messages(), 'info');
		}
		if( $this->lib_news->errors() )
		{
			$delete_talk[] = message($this->lib_news->errors(), 'error');
		}
		
		$this->session->set_flashdata('delete_talk', $delete_talk);

		redirect($current_url);
	}
	
	public function create_news()
	{
		//Lay duong dan trang truoc no'
		$data['back_url'] = $this->session->userdata('back_url');
		
		//Lay group_id tren back_url
		$data['current_cat'] = end( explode('/', $data['back_url']) );
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
		
		/********************* Kiem tra va create category ***********************/
		foreach( $data['languages'] as $lang_item ){
			$this->form_validation->set_rules($lang_item['abbr'].'_title', lang('name').' ['.lang($lang_item['abbr']).']', 'required|min_length[4]|max_length[64]|xss_clean');
			$this->form_validation->set_rules($lang_item['abbr'].'_alias', lang('abbrev').' ['.lang($lang_item['abbr']).']', 'required|min_length[4]|max_length[64]|alpha_dash|xss_clean');
			$this->form_validation->set_rules($lang_item['abbr'].'_summary', lang('summary').' ['.lang($lang_item['abbr']).']', 'required|xss_clean');
			$this->form_validation->set_rules($lang_item['abbr'].'_content', lang('content').' ['.lang($lang_item['abbr']).']', 'required||xss_clean');
		}

		//Form post = TRUE
		if ($this->form_validation->run() == TRUE)
		{ 
			//Kiem tra alias co ton tai hay khong cua tat ca language
			foreach( $data['languages'] as $lang_item ){
				$have_alias = $this->lib_news->exist_alias_news($this->input->post($lang_item['abbr'].'_alias'), $lang_item['abbr']);
				if($have_alias)
				{
					//Tru`ng ten_ma [alias] trong database
					$data['message'] = message($this->lib_news->errors(), 'error');
					$this->load->view('news/create_news', $data);
					return;
				}
			}
			
			//Thong tin chung cho tat ca language
			$row['active']		= $this->input->post('active');
			$row['cat_id']		= $this->input->post('cat_id');
			$row['image'] 		= $this->input->post('image');
			
			//Thong tin rieng tung language
			//$k == lang_abbr
			foreach( $data['languages'] as $k => $lang_item ){
				$row['lang'][$k]['lang']		= $k;
				$row['lang'][$k]['title'] 	= $this->input->post($lang_item['abbr'].'_title');
				$row['lang'][$k]['alias'] 		= $this->input->post($lang_item['abbr'].'_alias');
				$row['lang'][$k]['summary'] 	= $this->input->post($lang_item['abbr'].'_summary');
				$row['lang'][$k]['content'] 		= $this->input->post($lang_item['abbr'].'_content');
			}

			//Insert
			if($this->lib_news->create_news($row ))
			{
				$this->session->set_flashdata('message', $this->lib_news->messages());
				redirect("admin/news/create_news");
			}
			else
			{
				//Luu data post khi loi xay ra
				$data['restore_data'] = $_POST;
				
				//Neu xay ra loi trong luc insert
				$data['message'] = message($this->lib_news->errors(), 'error');
				$this->load->view('news/create_news', $data);
			}
		}
		else
		{
			//Luu data post khi loi xay ra
			if(! empty($_POST) ) $data['restore_data'] = $_POST;
			
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('news/create_news', $data);
		}
	}
	
	public function edit_news( $news_id )
	{
		if($news_id == FALSE)
		{
			redirect('admin/news');
		}
		
		(empty($_POST)) ? $data['info'] = $this->news_model->get_news_info($news_id) : $data['info'] = $_POST;
		
		$data['info']['id'] = $news_id;
		
		if( empty($data['info']) )
		{
			redirect('admin/news');
		}
		
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
		
		/********************* Kiem tra va create categoy ***********************/
		foreach( $data['languages'] as $lang_item ){
			$this->form_validation->set_rules($lang_item['abbr'].'_title', lang('name').' ['.lang($lang_item['abbr']).']', 'required|min_length[4]|max_length[64]|xss_clean');
			$this->form_validation->set_rules($lang_item['abbr'].'_alias', lang('abbrev').' ['.lang($lang_item['abbr']).']', 'required|min_length[4]|max_length[64]|alpha_dash|xss_clean');
			$this->form_validation->set_rules($lang_item['abbr'].'_summary', lang('summary').' ['.lang($lang_item['abbr']).']', 'required|xss_clean');
			$this->form_validation->set_rules($lang_item['abbr'].'_content', lang('content').' ['.lang($lang_item['abbr']).']', 'required||xss_clean');
		}
		
		if( $this->form_validation->run() == TRUE )
		{ 
			//Kiem tra alias co ton tai hay khong cua tat ca language
			foreach( $data['languages'] as $lang_item ){
				$have_alias = $this->lib_news->exist_alias_news($this->input->post($lang_item['abbr'].'_alias'), $lang_item['abbr'], $news_id);
				if($have_alias)
				{
					//Tru`ng ten_ma [alias] trong database
					$data['message'] = message($this->lib_news->errors(), 'error');
					$this->load->view('news/create_category', $data);
					return;
				}
			}
			
			//Thong tin chung cho tat ca language
			$row['id']			= $news_id;
			$row['active']		= $this->input->post('active');
			$row['cat_id']		= $this->input->post('cat_id');
			$row['image'] 		= $this->input->post('image');
			
			//Thong tin rieng tung language
			//$k == lang_abbr
			foreach( $data['languages'] as $k => $lang_item )
			{
				$row['lang'][$k]['title'] 	= $this->input->post($lang_item['abbr'].'_title');
				$row['lang'][$k]['alias'] 		= $this->input->post($lang_item['abbr'].'_alias');
				$row['lang'][$k]['summary'] 	= $this->input->post($lang_item['abbr'].'_summary');
				$row['lang'][$k]['content'] 		= $this->input->post($lang_item['abbr'].'_content');
			}
							
			//Update category
			if( $this->lib_news->update_news($row) )
			{
				$this->session->set_flashdata('message', $this->lib_news->messages());
				redirect("admin/news/edit_news/" . $news_id);
			}
			else
			{
				//Neu xay ra loi trong luc insert
				$data['message'] = message($this->lib_news->errors(), 'error');
				$this->load->view('news/update_news', $data);
			}
		}//if
		else
		{
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('news/update_news', $data);
		}
	}
	
	/*************************************************************
	 * 						AJAX FOR CATEGORY					 *
	 *************************************************************/
	
	//ham kiem tra alias co hay khong.
	public function ajax_check_exits_alias_news()
	{
		if($this->input->post('alias') && !is_array($this->input->post('alias')))
		{
			$have_alias = $this->news_model->exist_alias_news($this->input->post('alias'), $this->input->post('lang'));
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
}