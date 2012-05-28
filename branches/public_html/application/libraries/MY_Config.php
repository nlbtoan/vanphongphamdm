<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Xucxich
 * 
 * Hệ thống quản lý nội dung (CMS) xây dựng dựa trên codigniter.
 *
 * @package		Xucxich
 * @author		Nguyen Hoang Viet <nguyenhoangvietvn@gmail.com>
 * @since		Version 1.0
 */

// ------------------------------------------------------------------------

/**
 * MY_Config
 * 
 * Thừa kế từ lớp CI_Config và bổ sung thêm tính năng hỗ trợ ngôn ngữ.
 *
 * @package		Xucxich
 * @subpackage	Library
 * @category	Config
 * @author		Nguyen Hoang Viet <nguyenhoangvietvn@gmail.com>
 */

class MY_Config extends CI_Config
{
	public $lang = '';
	private $who_is = 'user';
	private $mimes = FALSE;
	/**
	 * Site URL
	 *
	 * @access	public
	 * @param	string	the URI string
	 * @return	string
	 */
	function site_url($uri = '', $lang = '')
	{
		if (is_array($uri))
		{
			$uri = implode('/', $uri);
		}
		
		//Neu la admin se khong xet $lang cho site_url
		if($this->who_is == 'admin')
		{
			$this->admin_site_url();
		}
		//Neu la user se xet $lang cho site_url
		else
		{
			$this->user_site_url($lang);
		}
		
		if ($uri == '')
		{
			return $this->slash_item('base_url').$this->item('index_page') . $this->lang;
		}
		else
		{
			$suffix = ($this->item('url_suffix') == FALSE) ? '' : $this->item('url_suffix');
			
			// kiem tra extension, de xem co can them suffix ko ?
			if ( strpos($uri, '.') !== FALSE )
			{
				$file_ext = end( explode( '.', $uri ) );
				
				if ( $this->mimes === FALSE )
				{
					@require_once(APPPATH.'config/mimes'.EXT);
					$this->mimes = $mimes;				
					unset($mimes);
				}
				
				if ( isset($this->mimes[$file_ext]) )
						$suffix = '';
			}
			// neu cuoi uri la '/' thi khong dung suffix			
			return $this->slash_item('base_url').$this->slash_item('index_page') . $this->lang . trim($uri, '/').$suffix;
		}
	}
	
	//Toi biet ban la` ai toi se xet site_url du'ng cho ban!
	public function set_who_is( $who_is = 'user' )
	{
		if($who_is == 'user')
		{
			$this->who_is = $who_is;
		}
		else
		{
			$this->who_is = 'admin';
		}
	}
	
	//User se xet lang cho site_url
	public function user_site_url($lang = '')
	{
		$lang_table = $this->item('lang_table');
		
		if ($lang_table != false) 
		{
			if ($lang == '')
			{
				$CI =& get_instance();
				$CI->load->library('setting');
				
				if($CI->setting->lang('abbr'))
				{
					$this->lang = $CI->setting->lang('abbr'). '/';
				}
				else
				{
					$this->lang = ($this->item('language_abbr') == false) ? '' : $this->slash_item('language_abbr');
				}
			}
			else
			{
				$this->lang = trim($lang, '/') . '/';
			}		
		}
		else
		{ // khong su dung lang
			$this->lang = '';
		}
	}
	
	//Admin se khong xet lang cho site_url
	public function admin_site_url()
	{
		$this->lang = '';
	}
}