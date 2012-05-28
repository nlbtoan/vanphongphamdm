<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends MY_Admin
{
	public function __construct()
	{
		parent::__construct();
		##--LOAD LIBRARY--##
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('Lib_Menu');
		$this->lang->load('language_code');
		
		##--LOAD MODEL--##
		$this->load->helper('menu');

		##--LOAD MODEL--##
		$this->load->model('menu_model');
		$this->load->model('tour_model');
		$this->load->model('news_model');

		##--FIRST FIX--##
		$this->form_validation->set_error_delimiters('<li>', '</li>');
	}

	public function index()
	{
		$this->manage();
	}
	
	public function choose()
	{
		$ci =& get_instance();
		$ci->db->select('page_id, title');
		$ci->db->from('page_lang');
		$ci->db->where('lang', 'vi');
		$data['page'] = $ci->db->get()->result_array();
		$data['page_url'] = 'page-show-';
		
		$data['tour'] = $this->tour_model->get_cat_data_count_no_paging();
		$data['tour_url'] = 'tour-show-';
		
		$data['news'] = $this->news_model->get_cat_all_no_paging();
		$data['news_url'] = 'news-show-';
		
		$data['create_url'] = site_url('admin/menu/create_menu_item/');
		$this->load->view('menu/choose', $data);
	}
	
	/*************************************************************
	 * 						QUAN LY GROUP MENU					 *
	 *************************************************************/
	//Quan ly menu group
	public function manage($paging = 1)
	{
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

		// data cho combobox group menu
		$data['cate_menus'] = $this->menu_model->get_group_menu_all();

		// data table menu
		$data['menus'] = $this->menu_model->get_group_menu($count, $limit, $offset);

		//config paging
		$config['base_url'] = site_url("/admin/menu/manage");
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

		//load view
		$this->load->view('menu/manage', $data);
	}

	//Them menu group
	public function create_menu()
	{
		//Lay duong dan trang truoc no'
		$data['back_url'] = $this->session->userdata('back_url');
		
		$this->form_validation->set_rules('namemenu', 'lang:namemenu', 'required|min_length[6]|max_length[64]|xss_clean');
		$this->form_validation->set_rules('abbrev', 'lang:abbrev', 'required|min_length[6]|max_length[64]|alpha_dash|callback_exist_abbrev|xss_clean');

		//Form post = TRUE
		if ($this->form_validation->run() == TRUE)
		{
			$abbrev = $this->lib_menu->exist_abbrev($this->input->post('abbrev'));

			if( $abbrev )
			{
				//Tru`ng ten_ma(abbrev) trong database
				$data['message'] = message($this->lib_menu->errors(), 'error');
				$this->load->view('menu/create_menu', $data);
			}
			else
			{
				//Insert group menu
				if( $this->lib_menu->create_group_menu($this->input->post('namemenu'), $this->input->post('abbrev')) )
				{
					$this->session->set_flashdata('message', $this->lib_menu->messages());
					redirect("admin/menu/create_menu");
				}
				else
				{
					//Neu xay ra loi trong luc insert
					$data['message'] = message($this->lib_menu->errors(), 'error');
					$this->load->view('menu/create_menu', $data);
				}
			}
		}
		else
		{
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('menu/create_menu', $data);
		}
	}

	//Update group menu
	public function update_menu()
	{
		$menu_id = $this->uri->segment(4);
		if($menu_id == FALSE)
		{
			redirect('admin/menu');
		}

		$data['info'] = $this->menu_model->get_group_menu_info($menu_id);
			
		//Neu khong co info cua menu_id thi redirect
		if( !empty($menu_info) )
		{
			redirect('admin/menu');
		}

		$this->form_validation->set_rules('namemenu', 'lang:namemenu', 'required|min_length[6]|max_length[64]|xss_clean');
		$this->form_validation->set_rules('abbrev', 'lang:abbrev', 'required|min_length[6]|max_length[64]|alpha_dash|callback_exist_abbrev|xss_clean');

		//Form post = TRUE
		if ($this->form_validation->run() == TRUE)
		{
			$abbrev = $this->lib_menu->exist_abbrev($this->input->post('abbrev'), $menu_id);

			if( $abbrev )
			{
				//Tru`ng ten_ma(abbrev) trong database
				$data['message'] = message($this->lib_menu->errors(), 'error');
				$this->load->view('menu/update_menu', $data);
			}
			else
			{
				//Update group menu
				if( $this->lib_menu->update_group_menu($menu_id, $this->input->post('namemenu'), $this->input->post('abbrev')) )
				{
					$this->session->set_flashdata('message', $this->lib_menu->messages());
					redirect("admin/menu/update_menu/" . $menu_id);
				}
				else
				{
					//Neu xay ra loi trong luc insert
					$data['message'] = message($this->lib_menu->errors(), 'error');
					$this->load->view('menu/update_menu', $data);
				}
			}

			$this->load->view('menu/update_menu', $data);
		}
		else
		{
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('menu/update_menu', $data);
		}
	}

	//Xoa group menu
	public function delete_menu()
	{
		$delete_talk = array();
		
		$this->form_validation->set_rules('id', 'Menu ID', 'required | is_natural | exist_menu_child');

		//Truong hop xay ra neu javascript post warning bat duoc menu_id co child
		if( $this->input->post('warning') )
		{
			$warning = $this->input->post('warning');
			
			if( $warning == 'enable' )
			{
				$this->lib_menu->set_error('menu_have_child');
			}
		}
			
		if ( $this->form_validation->run() == TRUE )//Post xay ra
		{
			//Xoa 1 hoac nhieu group menu
			if ( $menu_id = $this->input->post('id') )
			{
				$have_child = $this->lib_menu->exist_menu_child($this->input->post('id'));

				if( $have_child == FALSE ) // Xoa menu
				{
					$delete = $this->lib_menu->delete_group_menu($menu_id);
				}
			}
		}
		
		if( $this->lib_menu->messages() )
		{
			$delete_talk[] = message($this->lib_menu->messages(), 'info');
		}
		if( $this->lib_menu->errors() )
		{
			$delete_talk[] = message($this->lib_menu->errors(), 'error');
		}
		
		$this->session->set_flashdata('delete_talk', $delete_talk);

		redirect("admin/menu");
	}


	/*************************************************************
	 * 						QUAN LY MENU ITEMS					 *
	 *************************************************************/
	//Quan ly menu items
	public function menu_items( $id = FALSE, $paging = 1 )
	{	
		//Neu link khong co number phan trang se chuyen ve trang group menu
		if($id == FALSE) redirect("admin/menu");
		
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
		
		// data cho combobox group menu
		$data['cate_menus'] = $this->menu_model->get_group_menu_all();
		
		// data table menu
		$data['menu_items'] = $this->menu_model->get_item_by_menu_group_id($id, $count, $limit, $offset);
		
		//Truyen id ra ngoai view
		$data['current_menu'] = $id;
		
		//config paging
		$config['base_url'] = site_url("/admin/menu/menu_items/" . $id);
		$config['total_rows'] = $count;
		$config['per_page'] = $this->pagination->get_per_page();
		$config['num_links'] = $this->pagination->get_config('num_links');
		$config['uri_segment'] = 5;
		$config['first_link'] = lang('first_link');
		$config['last_link'] = lang('last_link');

		//Khoi tao paging
		$this->pagination->initialize($config);

		$this->load->view('menu/menu_items', $data);
	}

	//Insert menu_item
	public function create_menu_item($link = 'link')
	{
		$data['link'] = str_replace('-', '/', $link);
		
		//Lay duong dan trang truoc no'
		$data['back_url'] = site_url('admin/menu/choose');
		
		//Lay group_id tren back_url
		$back_url = $this->session->userdata('back_url');
		$data['group_id'] = end( explode('/', $back_url) );
		
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
		
		//Get all group_menu
		$data['group_menus'] = $this->menu_model->get_group_menu_all();
		
		/********************* Kiem tra va create menu item ***********************/
		foreach( $data['languages'] as $lang_item ){
			$this->form_validation->set_rules($lang_item['abbr'].'_namemenu', lang('namemenu').' ['.lang($lang_item['abbr']).']', 'required|min_length[4]|max_length[64]|xss_clean');
			$this->form_validation->set_rules($lang_item['abbr'].'_alias', lang('abbrev').' ['.lang($lang_item['abbr']).']', 'required|min_length[4]|max_length[64]|alpha_dash|xss_clean');
		}

		//Form post = TRUE
		if ($this->form_validation->run() == TRUE)
		{ 
			//Kiem tra alias co ton tai hay khong cua tat ca language
			foreach( $data['languages'] as $lang_item )
			{
				$have_alias = $this->lib_menu->exist_alias($this->input->post($lang_item['abbr'].'_alias'), $lang_item['abbr']);
				if($have_alias)
				{
					//Tru`ng ten_ma [alias] trong database
					$data['message'] = message($this->lib_menu->errors(), 'error');
					$this->load->view('menu/create_menu_item', $data);
					return;
				}
			}
			
			//Thong tin chung cho tat ca language
			$row['link']		= $this->input->post('link');
			$row['browser_nav']	= $this->input->post('browser_nav');
			$row['active']		= $this->input->post('active');
			$row['group_id'] 	= $this->input->post('group_id');
			$row['parent'] 		= $this->input->post('parent');
			
			//Thong tin rieng tung language
			//$k == lang_abbr
			foreach( $data['languages'] as $k => $lang_item ){
				$row['lang'][$k]['lang']		= $k;
				$row['lang'][$k]['namemenu'] 	= $this->input->post($lang_item['abbr'].'_namemenu');
				$row['lang'][$k]['alias'] 		= $this->input->post($lang_item['abbr'].'_alias');
			}

			//Insert
			if($this->lib_menu->create_menu_item( $row ))
			{
				$this->session->set_flashdata('message', $this->lib_menu->messages());
				redirect("admin/menu/choose");
			}
			else
			{
				//Neu xay ra loi trong luc insert
				$data['message'] = message($this->lib_menu->errors(), 'error');
				$this->load->view('menu/create_menu_item', $data);
			}
		}
		else
		{
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('menu/create_menu_item', $data);
		}
	}
	
	//Sua menu item
	public function edit_menu_item()
	{	
		$menu_id = $this->uri->segment(4);
		
		if($menu_id == FALSE)
		{
			redirect('admin/menu');
		}
		
		(empty($_POST)) ? $data['info'] = $this->menu_model->get_menu_item_info($menu_id) : $data['info'] = $_POST;
		
		if( empty($data['info']) )
		{
			redirect('admin/menu');
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
		
		//Lay group_id tren back_url
		$data['group_id'] = end( explode('/', $data['back_url']) );
		
		//Get all group_menu
		$data['group_menus'] = $this->menu_model->get_group_menu_all();
		
		/********************* Kiem tra va create menu item ***********************/
		foreach( $data['languages'] as $lang_item ){
			$this->form_validation->set_rules($lang_item['abbr'].'_namemenu', lang('namemenu').' ['.lang($lang_item['abbr']).']', 'required|min_length[4]|max_length[64]|xss_clean');
			$this->form_validation->set_rules($lang_item['abbr'].'_alias', lang('abbrev').' ['.lang($lang_item['abbr']).']', 'required|min_length[4]|max_length[64]|alpha_dash|xss_clean');
		}
		
		if( $this->form_validation->run() == TRUE )
		{ 
			//Thong tin chung cho tat ca language
			$row['id']			= $menu_id;
			$row['browser_nav']	= $this->input->post('browser_nav');
			$row['active']		= $this->input->post('active');
			$row['group_id'] 	= $this->input->post('group_id');
			$row['parent'] 		= $this->input->post('parent');
			$row['ordering']	= $this->input->post('ordering');
			
			//Thong tin rieng tung language
			//$k == lang_abbr
			foreach( $data['languages'] as $k => $lang_item )
			{
				$row['lang'][$k]['namemenu'] 	= $this->input->post($lang_item['abbr'].'_namemenu');
				$row['lang'][$k]['alias'] 		= $this->input->post($lang_item['abbr'].'_alias');
			}
							
			//Update group menu
			if( $this->lib_menu->update_menu_item($row) )
			{
				$this->session->set_flashdata('message', $this->lib_menu->messages());
				redirect("admin/menu/edit_menu_item/" . $menu_id);
			}
			else
			{
				//Neu xay ra loi trong luc insert
				$data['message'] = message($this->lib_menu->errors(), 'error');
				$this->load->view('menu/update_menu_item', $data);
			}
		}//if
		else
		{
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('menu/update_menu_item', $data);
		}
	}
	
	//Sua menu item
	public function update_menu_item()
	{	
		$current_url = 'admin/menu';
		
		$this->form_validation->set_rules('id', 'required | is_natural');
		$this->form_validation->set_rules('current_url', 'required');
		
		if( $this->form_validation->run() == TRUE )
		{ 
			//MUTIL UPDATE
			if( $this->input->post('id') !== FALSE
				&& $this->input->post('action') !== FALSE)
			{
				$menu_id = $this->input->post('id');
				$action = $this->input->post('action');
				
				/**
				 * action == publish
				 * set publish and unpublish
				 */
				if( $this->input->post('active') !== FALSE && $action == 'publish' )
				{
					$active = $this->input->post('active');
					$this->lib_menu->active_menu_item($menu_id, $active);
				}
				
				/**
				 * action == homepage
				 * set homepage
				 */
				else if( $this->input->post('homepage') !== FALSE && $action == 'homepage' )
				{
					$homepage = $this->input->post('homepage');
					$this->lib_menu->homepage_menu_item($menu_id, $homepage);
				}
				
				/**
				 * action == order
				 * set order
				 */
				else if( $this->input->post('order') !== FALSE && $action == 'order' )
				{
					$order = $this->input->post('order');
					$this->lib_menu->saveorder_menu_item($menu_id, $order);
				}
				
				if( $this->input->post('current_url') )
				{
					$current_url = $this->input->post('current_url');
				}
			}//if
		}//if
		redirect($current_url);
	}
	
	//Xoa menu item
	public function delete_menu_item()
	{
		$current_url = 'admin/menu/menu_items';
		
		$this->form_validation->set_rules('id', 'required | is_natural');
		$this->form_validation->set_rules('current_url', 'required');
		
		if( $this->form_validation->run() == TRUE )
		{
			//MUTIL UPDATE
			if( $this->input->post('id') != FALSE &&
				$this->input->post('action') !== FALSE )
			{
				$menu_id = $this->input->post('id');
				$action = $this->input->post('action');
				
				/**
				 * action == delete
				 * delete menu_item
				 */
				if( $action == 'delete' )
				{
					$this->lib_menu->delete_menu_item($menu_id);
				}
			}
			
			if( $this->input->post('current_url') )
			{
				$current_url = $this->input->post('current_url');
			}
		}
		
		redirect($current_url);
	}
	
	/*************************************************************
	 * 						AJAX FOR MENU ITEM					 *
	 *************************************************************/
	public function ajax_combobox_group_menu()
	{
		if( $this->input->post('id') != "" && !is_array($this->input->post('id')) )
		{
			$langs = $this->setting->get_langs();
			if( empty($data['languages']) )
			{
				$lang_abbr = $this->config->config['language_abbr'];
			}
			else
			{
				foreach( $langs as $item ){
					if($item['active'] == 1) $lang_abbr = $item['abbr'];
					break;
				}
			}
			$html = menu_combobox( $this->input->post('id'), $lang_abbr );
			
			echo json_encode( $html );
		}
		exit;
	}
	
	public function ajax_set_current_lang()
	{
		if($this->input->post('lang') && !is_array($this->input->post('lang')))
		{
			$this->session->set_userdata('current_lang', $this->input->post('lang'));
			echo json_encode( "" );
		}
		exit;
	}
	
	//ham kiem tra alias co hay khong.
	public function ajax_check_exits_alias()
	{
		if($this->input->post('alias') && !is_array($this->input->post('alias')))
		{
			$have_alias = $this->menu_model->exist_alias($this->input->post('alias'), $this->input->post('lang'));
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