<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nickchat extends MY_Admin{

	function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('Lib_Nickchat');
	}

	public function index()
	{
		$this->manage();
	}
	
	public function manage()
	{
		//Luu url trang hien tai cho cac trang sau se back tro lai
		$this->session->set_userdata('back_url', current_url());

		$data['data'] = $this->nickchat_model->get_nickchat();
		
		//Xay ra khi co action delete
		$delete_talk = $this->session->flashdata('delete_talk');
		if( !empty($delete_talk) )
		{
			$data['message'] = $delete_talk;
			$this->session->keep_flashdata('delete_talk');
		}

		$this->load->view('nickchat/manage', $data);
	}
	
	public function create()
	{
		$this->form_validation->set_rules('name', 'lang:name', 'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('nickchat', 'lang:nickchat', 'required|max_length[50]|xss_clean');

		//Form post = TRUE
		if ($this->form_validation->run() == TRUE)
		{
			$row['name']		= $this->input->post('name');
			$row['nickchat']	= $this->input->post('nickchat');
			$row['active']		= $this->input->post('active');
			
			//Insert
			if( $this->lib_nickchat->create($row) )
			{
				$this->session->set_flashdata('message', $this->lib_nickchat->messages());
				redirect("admin/nickchat/create");
			}
			else
			{
				//Luu data post khi loi xay ra
				$data['restore_data'] = $_POST;
				
				//Neu xay ra loi trong luc insert
				$data['message'] = message($this->lib_nickchat->errors(), 'error');
				$this->load->view('nickchat/create', $data);
			}
		}
		else
		{
			//Luu data post khi loi xay ra
			if(! empty($_POST) ) $data['restore_data'] = $_POST;
			
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('nickchat/create', $data);
		}
	}
	
	public function edit( $id = FALSE )
	{
		if($id == FALSE)
		{
			redirect('admin/nickchat');
		}
		
		(empty($_POST)) ? $data['info'] = $this->nickchat_model->get_info($id) : $data['info'] = $_POST;
		
		$data['info']['id'] = $id;

		if( empty($data['info']) )
		{
			redirect('admin/nickchat');
		}
		
		$this->form_validation->set_rules('name', 'lang:name', 'required|max_length[50]|xss_clean');
		$this->form_validation->set_rules('nickchat', 'lang:nickchat', 'required|max_length[50]|xss_clean');

		//Form post = TRUE
		if ($this->form_validation->run() == TRUE)
		{
			$row['id']			= $id;
			$row['name']		= $this->input->post('name');
			$row['nickchat']	= $this->input->post('nickchat');
			$row['active']		= $this->input->post('active');
			
			//Insert
			if( $this->lib_nickchat->edit($row) )
			{
				$this->session->set_flashdata('message', $this->lib_nickchat->messages());
				redirect("admin/nickchat/edit/".$id);
			}
			else
			{
				//Luu data post khi loi xay ra
				$data['restore_data'] = $_POST;
				
				//Neu xay ra loi trong luc insert
				$data['message'] = message($this->lib_nickchat->errors(), 'error');
				$this->load->view('nickchat/edit', $data);
			}
		}
		else
		{		
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('nickchat/edit', $data);
		}
	}
	
	public function update()
	{
		$current_url = 'admin/nickchat';
		
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
					$this->lib_nickchat->active($id, $active);
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
				$delete = $this->lib_nickchat->delete($id);
			}
		}
		
		if( $this->lib_nickchat->messages() )
		{
			$delete_talk[] = message($this->lib_nickchat->messages(), 'info');
		}
		if( $this->lib_nickchat->errors() )
		{
			$delete_talk[] = message($this->lib_nickchat->errors(), 'error');
		}
		
		$this->session->set_flashdata('delete_talk', $delete_talk);

		redirect("admin/nickchat");
	}
}