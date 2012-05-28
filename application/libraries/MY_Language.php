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
 * MY_Language
 *
 * Overwrite lại một số phương thức của language nhằm hỗ trợ tính năng themes
 * và ngôn ngữ.
 *
 * @package		Xucxich
 * @subpackage	Library
 * @category	Setting
 * @author		Nguyen Hoang Viet <nguyenhoangvietvn@gmail.com>
 */

class MY_Language extends CI_Language
{
	private $who_is = 'user';
	
	public function __construct() {
		parent::__construct();
	}
	// ------------------------------------------------------------------------
	/**
	 * Overwrite lai phuong thuc load cua CI_Language. Neu trong bang language
	 * khong dinh nghia cac language thi language se duoc chon theo config.
	 * @param unknown_type $langfile
	 * @param unknown_type $idiom
	 * @param unknown_type $return
	 */
	function load($langfile = '', $idiom = '', $return = FALSE)
	{
		// dam bao $langfile = file (khong .php)
		$langfile = str_replace(EXT, '', str_replace('_lang.', '', $langfile)).'_lang';

		// dam bao khong load hon 1 lan
		if (in_array($langfile, $this->is_loaded, TRUE))
		{ 
			return;
		}

		if ($idiom == '')
		{
			$idiom = $this->default_lang();
		}

		// Determine where the language file is and load it
		$files = Finder::find_file($idiom.'/'.$langfile, 'language');

		$files = array_shift($files);
		if (file_exists($files)) {
			include($files);
		}else{
			show_error('Unable to load the requested language file: language/'.$idiom.'/'.$langfile.EXT);
		}

		if ( ! isset($lang))
		{
			log_message('error', 'Language file contains no data: language/'.$idiom.'/'.$langfile);
			return;
		}

		if ($return == TRUE)
		{
			return $lang;
		}

		$this->is_loaded[] = $langfile;
		
		$this->language = array_merge($this->language, $lang); 
		unset($lang);

		log_message('debug', 'Language file loaded: language/'.$idiom.'/'.$langfile);
		return TRUE;
	}
	
	//Toi biet ban la` ai toi se xet language du'ng cho ban!
	public function set_who_is( $iam = 'user' )
	{
		if($iam == 'user')
		{
			$this->who_is = $iam;
		}
		else
		{
			$this->who_is = 'admin';
		}
	}

	public function default_lang()
	{
		if($this->who_is == 'admin')
		{ 
			$CI =& get_instance();
			$deft_lang = $CI->config->item('admin_language');
			$idiom = ($deft_lang == '') ? 'vietnamese' : $deft_lang;
			
			return $idiom;
		}
		else
		{
			$CI =& get_instance();
			// lang trong bang setting
			$idiom = $CI->setting->lang();

			if ( empty($idiom) ) {
				$deft_lang = $CI->config->item('language');
				$idiom = ($deft_lang == '') ? 'vietnamese' : $deft_lang;		
			}
			
			return $idiom;
		}
	}
}