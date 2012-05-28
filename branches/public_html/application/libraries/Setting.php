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
 * MY_Setting
 * 
 * Bao gồm các phương thức hỗ trợ cho việc quản lý cấu hình chung cho toàn 
 * hệ thống (setting, language, biến toàn cục).
 *
 * @package		Xucxich
 * @subpackage	Library
 * @category	Setting
 * @author		Nguyen Hoang Viet <nguyenhoangvietvn@gmail.com>
 */

class MY_Setting 
{	
	private $setting = array();
	private $langs = null;
	private $current_lang = null;
	private $ci;
	
	public function __construct() {
		$this->ci = & get_instance();
		$this->ci->load->model('setting_model');		
	}
	
	// ------------------------------------------------------------------------
	
	/**
	 * Khởi tạo lấy các giá trị từ bảng setting và language. <code>$admin</code> giúp xác định sẽ
	 * lấy của Back-end hay Front-end.
	 * @param boolean $admin
	 */
	public function initialize() 
	{
		// lang init
		$langs = $this->ci->setting_model->get_language_many();
		
		// kiem tra xem co dung lang khong ?		
		if (!empty($langs)) 
		{
			if (false == ($fetch_lang = $this->ci->router->fetch_lang())) 
			{
				$this->current_lang = $this->langs[0];
			}
			
			foreach ($langs as $lang) 
			{
				// uu tien lang xac dinh tren link hon
				// nhung can kiem tra ky link tren lang
				if ($lang['abbr'] == $fetch_lang) 
				{
					$this->current_lang = $lang;
				}
				
				// neu khong xac dinh lang tren link thi dua theo db
				if ($lang['active'] == 1 && $fetch_lang == false) 
				{ 
					$this->current_lang = $lang;					
				}		
				$this->langs[$lang['abbr']] = $lang;					
			}					
		}
		else
		{ // lay lang trong config
			$this->ci->router->set_lang($this->ci->config->item('language_abbr'));
			$this->current_lang = array(
				'abbr' => $this->ci->config->item('language_abbr'),
				'name' => $this->ci->config->item('language')
			);
			$this->langs[$this->ci->config->item('language_abbr')] = $this->current_lang;
		}
		
		// setting init
		$array = $this->get_table_setting();
		
		if ($array)
		{
			foreach ($array as $item) 
			{
				if (!empty($item['lang']))
				{
					$tmp[$item['name']] = $item['value'];
					
					if (isset($this->setting[$item['lang']]) ) 
					{
						$this->setting[$item['lang']] = array_merge($this->setting[$item['lang']], $tmp);
					}
					else
					{
						$this->setting[$item['lang']] = $tmp;
					}
					// bao ve moi truong
					unset($tmp);	
				} 
				else 
				{
					$this->setting[$item['name']] = $item['value'];
				}
			}
		}//if
	}
	
	public function get_setting_by_type($type_setting = 'sys')
	{
		$setting 	= array();
		$array 		= $this->get_table_setting($type_setting);
		
		if ($array)
		{
			foreach ($array as $item) 
			{
				if (!empty($item['lang']))
				{
					$tmp[$item['name']] = array(
							 			   		'value' => $item['value'],
												'name'	=> $item['name'],
								 			    'title' => $item['title']
								 			   );
					
					if (isset($setting[$item['lang']]) )
					{
						$setting[$item['lang']] = array_merge($setting[$item['lang']], $tmp);
					}
					else
					{
						$setting[$item['lang']] = $tmp;
					}
			
					// bao ve moi truong
					unset($tmp);	
				} 
				else 
				{
					$setting[$item['name']] = array(
							 			   			'value' =>$item['value'],
													'name'	=> $item['name'],
								 			    	'title' => $item['title']
								 			   );
				}
			}//foreach
		}
		
		return $setting;
	}
	
	public function get_table_setting($type_setting = 'sys')
	{
		return $this->ci->setting_model->get_many($type_setting);
	}
	
	// ------------------------------------------------------------------------
	
	/**
	 * Trả về các giá trị theo <code>$name</code> và <code>$lang<code>. Nếu <code>$lang<code>
	 * không được xác định phương thức sẽ trả về giá trị theo lang hệ thống. Với những biến
	 * độc lập với lang thì chỉ cần gọi item($name). 
	 * 	 
	 * @param string $name
	 */
	public function item($name, $lang = '') 
	{
		if ($lang == '') {
			// setting doc lap voi lang
			if (isset($this->setting[$name]))
				return $this->setting[$name];
				
			// lay lang mac dinh, cho setting phu thuoc vao lang
			$lang = $this->lang('abbr');			
		} 					
		
		if ( ! isset($this->setting[$lang])) {
			return FALSE;
		}

		if ( ! isset($this->setting[$lang][$name])) {
			return FALSE;
		}

		$pref = $this->setting[$lang][$name];
		
		return $pref;
	}
	
	public function item_by_type($name, $type_setting = 'sys', $lang = '') 
	{
		if( $type_setting != 'sys' )
		{
			if($lang == '')
			{
				$lang = $this->lang('abbr');
			}
			return $this->ci->setting_model->get_item_by_type($name, $type_setting, $lang);
		}
	}
	// ------------------------------------------------------------------------
	/**
	 * Trả về giá trị theo <code>$name</code> (abbr, name, active, admin) của ngôn ngữ 
	 * được chọn hiện tại. <code>$name</code> không xác định phương thức sẽ trả về name
	 * của ngôn ngữ hiện tại (ex : vietnames, english)
	 * @param string $name
	 */
	public function lang($name='') {
		if ($name == '') {
			if (!isset($this->current_lang['name']))
				return false;
			return $this->current_lang['name'];
		}
		if (isset($this->current_lang[$name])) {
			return $this->current_lang[$name];
		}
		return false;
	}
	
	public function get_langs() {
		return $this->langs;
	}
	
	public function validate_lang($abbr) {
		if (is_array($this->langs))
			return array_key_exists($abbr, $this->langs);
		return false;
	}
	// ------------------------------------------------------------------------
	
	/**
	 * Lưu các giá trị theo <code>$name</code>.
	 * 	 
	 * @param string $name
	 * @param mixed $value
	 */
	public function set_item($name, $value) {
		$this->setting[$name] = $value;
	}
	
}

/* End of file Setting */
/* Location: ./system/libraries/Setting.php */