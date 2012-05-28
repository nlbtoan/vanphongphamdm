<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends Model{

	protected $lang_abbr = '';
	
	/*
	 * Bien nay de lay du lieu theo language trong admin nhu : hien thi table, Insert, Update...
	 * No luu khi co' 1 ai do' set session 'store_lang_abbr' va no lay language khi da duoc xet vo session
	 * Neu khong co ai xet session no' se lay language duoc active trong Object setting
	 */
	protected $current_lang_abbr = '';

	/**
	 * Constructor
	 *
	 * @access public
	 */
	function __construct()
	{
		parent::__construct();
		
		$this->initialize();
	}
	
	private function initialize() {
		$CI =& get_instance();
		$router = $CI->uri->segments;
		//Lay language duoc active cua user
		$this->current_lang_abbr = $CI->setting->lang('abbr');
		
		//Lay language cua admin
		if( !empty($router[1]) && $router[1] == 'admin')
		{
			if( $lang = $CI->session->userdata('current_lang_abbr') )
			{
				$this->current_lang_abbr = $lang;
			}
			else
			{
				$this->current_lang_abbr = $CI->setting->lang('abbr');
			}
		}
	}
}