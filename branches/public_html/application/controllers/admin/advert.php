<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advert extends MY_Admin
{
	public function __construct()
	{
		parent::__construct();
		##--LOAD LIBRARY--##
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('Lib_Advert');

		##--LOAD MODEL--##
		$this->load->model('advert_model');

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
		$data['data'] = $this->advert_model->get_all_cat($count, $limit, $offset);

		//config paging
		$config['base_url'] = site_url("/admin/advert/manage");
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
		$this->load->view('advert/manage', $data);
	}
	
	public function manage_advert( $id = FALSE )
	{
		if($id === FALSE)
		{
			redirect('admin/advert/manage');
		}
		
		//Luu url trang hien tai cho cac trang sau se back tro lai
		$this->session->set_userdata('back_url', current_url());
		
		//set per_page paging
		if($this->input->post('select_per_page'))
		{
			$this->pagination->set_per_page($this->input->post('select_per_page'));
		}	

		//Lay limit trong database
		$limit = $this->pagination->get_per_page();
		$offset = intval($this->uri->segment(5));

		// data table
		$data['data'] = $this->advert_model->get_all_advert($id, $count, $limit, $offset);

		//config paging
		$config['base_url'] = site_url("/admin/advert/manage_advert");
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

		//load view
		$this->load->view('advert/manage_advert', $data);
	}
	
	public function create()
	{
		$this->form_validation->set_rules('name', 'lang:name', 'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('alias', 'lang:alias', 'required|max_length[50]|xss_clean');

		//Form post = TRUE
		if ($this->form_validation->run() == TRUE)
		{
			$row['name']	= $this->input->post('name');
			$row['alias']	= $this->input->post('alias');
			$row['active']	= $this->input->post('active');
			
			$alias = $this->lib_advert->exist_alias($row['alias']);

			if( $alias )
			{
				//Tru`ng ten_ma(alias) trong database
				$data['message'] = message($this->lib_advert->errors(), 'error');
				$this->load->view('advert/create', $data);
			}
			else
			{
				//Insert
				if( $this->lib_advert->create($row) )
				{
					$this->session->set_flashdata('message', $this->lib_advert->messages());
					redirect("admin/advert/create");
				}
				else
				{
					//Luu data post khi loi xay ra
					$data['restore_data'] = $_POST;
					
					//Neu xay ra loi trong luc insert
					$data['message'] = message($this->lib_advert->errors(), 'error');
					$this->load->view('advert/create', $data);
				}
			}
		}
		else
		{
			//Luu data post khi loi xay ra
			if(! empty($_POST) ) $data['restore_data'] = $_POST;
			
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('advert/create', $data);
		}
	}
	
	public function create_advert()
	{
		//Lay group_id tren back_url
		$back_url = $this->session->userdata('back_url');
		$data['parent'] = end( explode('/', $back_url) );
		
		$data['category'] = $this->advert_model->get_all_cat_no_paging();
		
		$this->form_validation->set_rules('adv_text', 'lang:name', 'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('image', 'lang:image', 'required|xss_clean');

		//Form post = TRUE
		if ($this->form_validation->run() == TRUE)
		{
			$row['adv_text']	= $this->input->post('adv_text');
			$row['image']		= $this->input->post('image');
			$row['link']		= $this->input->post('link');
			$row['parent']		= $this->input->post('parent');
			$row['active']		= $this->input->post('active');
			
			//Insert
			if( $this->lib_advert->create_advert($row) )
			{
				$this->session->set_flashdata('message', $this->lib_advert->messages());
				redirect("admin/advert/create_advert");
			}
			else
			{
				//Luu data post khi loi xay ra
				$data['restore_data'] = $_POST;
				
				//Neu xay ra loi trong luc insert
				$data['message'] = message($this->lib_advert->errors(), 'error');
				$this->load->view('advert/create_advert', $data);
			}
		}
		else
		{
			//Luu data post khi loi xay ra
			if(! empty($_POST) ) $data['restore_data'] = $_POST;
			
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('advert/create_advert', $data);
		}
	}
	
	public function update()
	{
		$current_url = 'admin/advert';
		
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
					$this->lib_advert->active($id, $active);
				}
			}//if
		}//if
		redirect($current_url);
	}
	
	public function update_advert()
	{
		$current_url = $this->session->userdata('back_url');;
		
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
					$this->lib_advert->active_advert($id, $active);
				}
			}//if
		}//if
		redirect($current_url);
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
				$delete = $this->lib_advert->delete($id);
			}
		}
		
		if( $this->lib_advert->messages() )
		{
			$delete_talk[] = message($this->lib_advert->messages(), 'info');
		}
		if( $this->lib_advert->errors() )
		{
			$delete_talk[] = message($this->lib_advert->errors(), 'error');
		}
		
		$this->session->set_flashdata('delete_talk', $delete_talk);

		redirect("admin/advert");
	}

	public function delete_advert()
	{
		$delete_talk = array();
		
		$current_url = 'admin/advert';
		if( $this->input->post('current_url') )
		{
			$current_url =  $this->input->post('current_url');
		}
		
		$this->form_validation->set_rules('id', 'ID', 'required | is_natural');
			
		if ( $this->form_validation->run() == TRUE )//Post xay ra
		{
			//Xoa 1 hoac nhieu
			if ( $id = $this->input->post('id') )
			{
				$delete = $this->lib_advert->delete_advert($id);
			}
		}
		
		if( $this->lib_advert->messages() )
		{
			$delete_talk[] = message($this->lib_advert->messages(), 'info');
		}
		if( $this->lib_advert->errors() )
		{
			$delete_talk[] = message($this->lib_advert->errors(), 'error');
		}
		
		$this->session->set_flashdata('delete_talk', $delete_talk);

		redirect($current_url);
	}
	
	public function edit( $id = FALSE )
	{
		if($id == FALSE)
		{
			redirect('admin/advert');
		}
		
		(empty($_POST)) ? $data['info'] = $this->advert_model->get_info_cat($id) : $data['info'] = $_POST;
		
		$data['info']['id'] = $id;

		if( empty($data['info']) )
		{
			redirect('admin/advert');
		}
		
		$this->form_validation->set_rules('name', 'lang:name', 'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('alias', 'lang:alias', 'required|max_length[50]|xss_clean');

		//Form post = TRUE
		if ($this->form_validation->run() == TRUE)
		{
			$row['id']		= $id;
			$row['name']	= $this->input->post('name');
			$row['alias']	= $this->input->post('alias');
			$row['active']	= $this->input->post('active');
			
			$alias = $this->lib_advert->exist_alias($row['alias'], $id);

			if( $alias )
			{
				//Tru`ng ten_ma(alias) trong database
				$data['message'] = message($this->lib_advert->errors(), 'error');
				$this->load->view('advert/edit', $data);
			}
			else
			{
				//edit
				if( $this->lib_advert->edit($row) )
				{
					$this->session->set_flashdata('message', $this->lib_advert->messages());
					redirect("admin/advert/edit/".$id);
				}
				else
				{
					//Luu data post khi loi xay ra
					$data['info'] = $_POST;
					
					//Neu xay ra loi trong luc insert
					$data['message'] = message($this->lib_advert->errors(), 'error');
					$this->load->view('advert/edit', $data);
				}
			}
		}
		else
		{
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('advert/edit', $data);
		}
	}
	
	public function edit_advert($id)
	{	
		if($id == FALSE)
		{
			redirect('admin/advert');
		}
		
		(empty($_POST)) ? $data['info'] = $this->advert_model->get_info_advert($id) : $data['info'] = $_POST;
		
		$data['info']['id'] = $id;

		if( empty($data['info']) )
		{
			redirect('admin/advert');
		}
		
		//Lay group_id tren back_url
		$data['back_url'] = $this->session->userdata('back_url');
		
		$data['parent'] = end( explode('/', $data['back_url']) );
		
		$data['category'] = $this->advert_model->get_all_cat_no_paging();
		
		$this->form_validation->set_rules('adv_text', 'lang:text', 'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('image', 'lang:image', 'required|max_length[50]|xss_clean');

		//Form post = TRUE
		if ($this->form_validation->run() == TRUE)
		{
			$row['id']			= $id;
			$row['adv_text']	= $this->input->post('adv_text');
			$row['link']		= $this->input->post('link');
			$row['image']		= $this->input->post('image');
			$row['parent']		= $this->input->post('parent');
			$row['active']		= $this->input->post('active');
			
			//edit
			if( $this->lib_advert->edit_advert($row) )
			{
				$this->session->set_flashdata('message', $this->lib_advert->messages());
				redirect("admin/advert/edit_advert/".$id);
			}
			else
			{
				//Luu data post khi loi xay ra
				$data['info'] = $_POST;
				
				//Neu xay ra loi trong luc insert
				$data['message'] = message($this->lib_advert->errors(), 'error');
				$this->load->view('advert/edit_advert', $data);
			}
		}
		else
		{
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('advert/edit_advert', $data);
		}
	}
}