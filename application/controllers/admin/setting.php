<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends My_Admin
{
	public function __construct(){
		parent::__construct();
		
		##--LOAD LIBRARY--##
		$this->load->library('form_validation');
		$this->load->library('setting');
		$this->load->library('Lib_Setting');
		
		##--LOAD LANG--##
		$this->lang->load('language_code');
		
		##--LOAD MODEL--##
		$this->load->model('setting_model');
		
		##--FIRST FIX--##
		$this->form_validation->set_error_delimiters('<li>', '</li>');
	}
	
	public function index()
	{
		$this->system();
	}
	
	public function system( $type_setting = 'sys' )
	{	
		//Get data setting
		$data['data'] = $this->setting->get_setting_by_type($type_setting);
		
		// data cho combobox language
		$data['languages'] = $this->setting->get_langs();
		
		//Xay ra khi co action update
		$update_talk= $this->session->flashdata('update_talk');
		if( !empty($update_talk) )
		{
			$data['message'] = $update_talk;
			$this->session->keep_flashdata('update_talk');
		}

		$this->load->view('setting/index', $data);
	}
	
	public function tour($type_setting = 'tour')
	{
		$data['controller'] = 'tour';
		//Get data setting
		$data['data'] = $this->setting->get_setting_by_type('tour');
		
		// data cho combobox language
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
		
		//Xay ra khi co action update
		$update_talk= $this->session->flashdata('update_talk');
		if( !empty($update_talk) )
		{
			$data['message'] = $update_talk;
			$this->session->keep_flashdata('update_talk');
		}

		$this->load->view('setting/tour', $data);
	}
	
	public function update($controller = '')
	{
		if(! empty($_POST) )
		{
			// data cho combobox language
			$lang = $this->setting->get_langs();
			$data = $_POST;
			
			foreach( $data as $key => $item )
			{
				/*
				 * Key co the co cac danh nhu sau
				 * dang_1: vi_name -> co language (vi)
				 * dang_2: ab_name -> khong co lang
				 * dang_3: name    -> khong co lang
				 */
				$name = explode('_', $key, 2);
				$count = count($name);

				if( $count == 2 )
				{//co the la dang_1 || dang_2
					$search = array_key_exists($name[0], $lang);
					if($search === TRUE)
					{//la dang_1
						$row['lang'][$name[0]][$name[1]] = $item;
					}
					else
					{//la dang_2
						$row['data'][$key] = $item;
					}
				}
				else if( $count == 1 )
				{//la dang_3
					$row['data'][$key] = $item;
				}
			}
			
			if( $this->lib_setting->update($row) )
			{
				if( $this->lib_setting->messages() )
				{
					$update_talk[] = message($this->lib_setting->messages(), 'info');
				}
				if( $this->lib_setting->errors() )
				{
					$update_talk[] = message($this->lib_setting->errors(), 'error');
				}
				
				$this->session->set_flashdata('update_talk', $update_talk);
			}
		}
		
		redirect("admin/setting/$controller");
	}
}