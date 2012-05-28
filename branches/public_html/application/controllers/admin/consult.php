<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consult extends MY_Admin{

	function __construct(){

		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('Lib_Consult');

		$this->lang->load('language_code');
	}

	function index(){

	}

	function manage_faq(){

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
		$data['faq'] = $this->consult_model->get_faq_count($count, $limit, $offset);
		
		//config paging
		$config['base_url'] = site_url("/admin/consult/manage_faq");
		$config['total_rows'] = $count;
		$config['per_page'] = $this->pagination->get_per_page();
		$config['num_links'] = $this->pagination->get_config('num_links');
		$config['uri_segment'] = 4;
		$config['first_link'] = lang('first_link');
		$config['last_link'] = lang('last_link');
		
		//Khoi tao paging
		$this->pagination->initialize($config);

		$this->load->view('consult/manage_faq', $data);

	}

	function create_faq(){

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
			$this->form_validation->set_rules($lang_item['abbr'].'_question', lang('question').' ['.lang($lang_item['abbr']).']', 'required|min_length[4]|xss_clean');
			$this->form_validation->set_rules($lang_item['abbr'].'_answer', lang('answer').' ['.lang($lang_item['abbr']).']', 'required|min_length[4]|xss_clean');
		}

		//Form post = TRUE
		if ($this->form_validation->run() == TRUE)
		{

			//Thong tin chung cho tat ca language
			$faq['is_enabled']		= $this->input->post('is_enabled');
			$faq['date']			= time()-3600;


			//Thong tin rieng tung language
			//$k == lang_abbr
			foreach( $data['languages'] as $k => $lang_item ){
				$faq['lang'][$k]['lang']		= $k;
				$faq['lang'][$k]['question'] 	= $this->input->post($lang_item['abbr'].'_question');
				$faq['lang'][$k]['answer'] 		= $this->input->post($lang_item['abbr'].'_answer');
			}

			//Insert
			if($this->lib_consult->create_faq( $faq ))
			{
				$this->session->set_flashdata('message', $this->lib_consult->messages());
				redirect("admin/consult/create_faq");
			}
			else
			{
				//Neu xay ra loi trong luc insert
				$data['restore_data'] =  $_POST;
				$data['message'] = message($this->lib_consult->errors(), 'error');
				$this->load->view('page/create_page', $data);
			}
		}
		else
		{

			if( !empty($_POST) ){
				$data['restore_data'] =  $_POST;
			}
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('consult/create_faq', $data);
		}

	}

	public function update_faq(){

		$current_url = 'admin/consult/manage_faq';

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
				if( $this->input->post('is_enabled') !== FALSE && $action == 'publish' )
				{
					$active = $this->input->post('is_enabled');
					$this->lib_consult->active_faq($page_id, $active);
				}

			}

			if( $this->input->post('current_url') )
			{
				$current_url = $this->input->post('current_url');
			}
		}

		redirect($current_url);

	}

	public function delete_faq(){

		$delete_talk = array();

		$this->form_validation->set_rules('id', 'Page ID', 'required | is_natural ');

		if ( $this->form_validation->run() == TRUE )//Post xay ra
		{
			//Xoa 1 hoac nhieu FAQ
			if ( $faq_id = $this->input->post('id') )
			{
				$delete = $this->lib_consult->delete_faq( $faq_id );
			}
		}

		if( $this->lib_consult->messages() )
		{
			$delete_talk[] = message($this->lib_consult->messages(), 'info');
		}
		if( $this->lib_consult->errors() )
		{
			$delete_talk[] = message($this->lib_consult->errors(), 'error');
		}

		$this->session->set_flashdata('delete_talk', $delete_talk);

		redirect("admin/consult/manage_faq");

	}

	public function edit_faq($faq_id = false){

		//Lay duong dan trang truoc no'
		$data['back_url'] = $this->session->userdata('back_url');

		if ( $faq_id != false ){

			$faq_info = $this->consult_model->get_info_faq($faq_id);

			if ( $faq_info != false ){

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
					$this->form_validation->set_rules($lang_item['abbr'].'_question', lang('question').' ['.lang($lang_item['abbr']).']', 'required|min_length[4]|xss_clean');
					$this->form_validation->set_rules($lang_item['abbr'].'_answer', lang('answer').' ['.lang($lang_item['abbr']).']', 'required|xss_clean');
				}

				//Form post = TRUE
				if ($this->form_validation->run() == TRUE)
				{

					//Thong tin chung cho tat ca language
					$faq['is_enabled']		= $this->input->post('is_enabled');
					$faq['id']				= $faq_id;

					//Thong tin rieng tung language
					//$k == lang_abbr
					foreach( $data['languages'] as $k => $lang_item ){
						$faq['lang'][$k]['lang']		= $k;
						$faq['lang'][$k]['question'] 		= $this->input->post($lang_item['abbr'].'_question');
						$faq['lang'][$k]['answer'] 		= $this->input->post($lang_item['abbr'].'_answer');
					}

					//Edit
					if($this->lib_consult->edit_faq( $faq ))
					{
						$this->session->set_flashdata('message', $this->lib_consult->messages());
						redirect("admin/consult/manage_faq");
					}
					else
					{
						//Neu xay ra loi trong luc update
						$data['restore_data'] =  $_POST;
						$data['restore_data']['id'] = $faq_id;
						$data['message'] = message($this->lib_consult->errors(), 'error');
						$this->load->view('consult/edit_faq/'.$faq_id, $data);
					}
				}
				else
				{
					$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
					if( !empty($_POST) ){
						$data['restore_data'] =  $_POST;
					} else {
						foreach ( $faq_info as $item ){
							$restore_data[$item['lang'].'_question'] = $item['question'];
							$restore_data[$item['lang'].'_answer'] = $item['answer'];
							$restore_data['is_enabled'] = $item['is_enabled'];
						}
						$data['restore_data'] = $restore_data;
					}
					$data['restore_data']['id'] = $faq_id;
					$this->load->view('consult/edit_faq', $data);
				}

			}
			else {
				// faq_id khong co trong CSDL
				redirect($data['back_url']);
			}
		}
		else {
			// khong co faq_id tren link
			redirect($data['back_url']);
		}

	}

	function manage_feedback(){

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
		
		//data cho feedback
		$data['feedback'] = $this->consult_model->get_feedback_count($count, $limit, $offset);

		//config paging
		$config['base_url'] = site_url("/admin/consult/manage_feedback");
		$config['total_rows'] = $count;
		$config['per_page'] = $this->pagination->get_per_page();
		$config['num_links'] = $this->pagination->get_config('num_links');
		$config['uri_segment'] = 4;
		$config['first_link'] = lang('first_link');
		$config['last_link'] = lang('last_link');
		
		//Khoi tao paging
		$this->pagination->initialize($config);

		$this->load->view('consult/manage_feedback', $data);

	}

	function create_feedback(){

		//Lay duong dan trang truoc no'
		$data['back_url'] = $this->session->userdata('back_url');


		/********************* Kiem tra va create feedback ***********************/
		$this->form_validation->set_rules('fullname', lang('your_name'), 'required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('email', lang('email'), 'required|min_length[4]|xss_clean|valid_email');
		$this->form_validation->set_rules('title', lang('title_fb'), 'required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('content', lang('content_fb'), 'required|min_length[10]|xss_clean');

		//Form post = TRUE
		if ($this->form_validation->run() == TRUE)
		{

			//Thong tin feedback
			$fb['date']			= time()-3600;
			$fb['fullname']		= $this->input->post('fullname');
			$fb['email']		= $this->input->post('email');
			$fb['title'] 		= $this->input->post('title');
			$fb['content'] 		= $this->input->post('content');
			//Insert
			if($this->lib_consult->create_feedback( $fb ))
			{
				$this->session->set_flashdata('message', $this->lib_consult->messages());
				redirect("admin/consult/create_feedback");
			}
			else
			{
				//Neu xay ra loi trong luc insert
				$data['restore_data'] =  $_POST;
				$data['message'] = message($this->lib_consult->errors(), 'error');
				$this->load->view('consult/create_feedback', $data);
			}
		}
		else
		{

			if( !empty($_POST) ){
				$data['restore_data'] =  $_POST;
			}
			$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
			$this->load->view('consult/create_feedback', $data);
		}

	}

	public function delete_feedback(){

		$delete_talk = array();

		$this->form_validation->set_rules('id', 'Page ID', 'required | is_natural ');

		if ( $this->form_validation->run() == TRUE )//Post xay ra
		{
			//Xoa 1 hoac nhieu FEEDBACK
			if ( $feed_id = $this->input->post('id') )
			{
				$delete = $this->lib_consult->delete_feedback( $feed_id );
			}
		}

		if( $this->lib_consult->messages() )
		{
			$delete_talk[] = message($this->lib_consult->messages(), 'info');
		}
		if( $this->lib_consult->errors() )
		{
			$delete_talk[] = message($this->lib_consult->errors(), 'error');
		}

		$this->session->set_flashdata('delete_talk', $delete_talk);

		redirect("admin/consult/manage_feedback");

	}

	public function update_feedback(){

		$current_url = 'admin/consult/manage_feedback';

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
				if( $this->input->post('is_read') !== FALSE && $action == 'publish' )
				{
					$active = $this->input->post('is_read');
					$this->lib_consult->read_feedback($id, $active);
				}

			}

			if( $this->input->post('current_url') )
			{
				$current_url = $this->input->post('current_url');
			}
		}

		redirect($current_url);

	}

	public function edit_feedback($id = false){

		//Lay duong dan trang truoc no'
		$data['back_url'] = $this->session->userdata('back_url');

		if ( $id != false ){

			$info = $this->consult_model->get_info_feedback($id);

			if ( $info != false ){
				
				/* Update is_read */
				$this->lib_consult->read_feedback($id, 1);
					
				/********************* Kiem tra va edit feedback ***********************/

				$this->form_validation->set_rules('mail_to', lang('mail_to'), 'required|min_length[4]|xss_clean|valid_emails');
				$this->form_validation->set_rules('subject', lang('subject'), 'required|min_length[4]|xss_clean');
				$this->form_validation->set_rules('mail_content', lang('mail_content'), 'required|min_length[10]|xss_clean');

				//Form post = TRUE
				if ($this->form_validation->run() == TRUE)
				{
					$email_to		= $this->input->post('mail_to');
					$subject 		= $this->input->post('subject');
					$mail_content 	= $this->input->post('mail_content');
					$name_mail      = 'Hanh Trinh Xanh';
					
					
					//Send mail
					  
					$this->load->library('email');
					
					$this->email->from('dtthaison@gmail.com',$name_mail);  
					$this->email->to($email_to);  
					$this->email->subject($subject);  
					$this->email->message($mail_content);  
					$this->email->send();
					
					$this->lib_consult->answer_feedback($id, 1);
					
					redirect('admin/consult/edit_feedback/'.$id);
					
				}
				else
				{
					$data['message'] = (validation_errors()) ? message(validation_errors(), 'error') : message($this->session->flashdata('message'));
					$data['restore_data'] = $info;
					$this->load->view('consult/edit_feedback', $data);
				}

			}
			else {
				// faq_id khong co trong CSDL
				redirect($data['back_url']);
			}
		}
		else {
			// khong co faq_id tren link
			redirect($data['back_url']);
		}

	}

}