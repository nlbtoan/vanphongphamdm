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
 * Setting_model
 * 
 * Lớp model của bảng setting.
 *
 * @package		Xucxich
 * @subpackage	Model
 * @category	Setting
 * @author		Nguyen Hoang Viet <nguyenhoangvietvn@gmail.com>
 */

class Setting_model extends Model 
{		
	private $table = 'setting';
	private $lang_table = false;
	
	// ------------------------------------------------------------------------
	
	public function __construct() {
		parent::__construct();
				
		$this->lang_table = $this->config->item('lang_table'); 		
	}
	
	public function get_item_by_type($name, $type_setting = 'sys', $lang = FALSE)
	{
		$this->db->select('value');
		$this->db->from('setting');
		if($lang !== FALSE)
		{
			$this->db->where('lang', $lang);
		}
		$this->db->where('type_setting', $type_setting);
		$this->db->where('name', $name);
		$result = $this->db->get()->row_array();

		return $result['value'];
	}
	
	public function update_value($value, $key, $lang = FALSE){
		$data['value'] = $value;
		
		if($lang !== FALSE)
		{		
			$this->db->where('lang', $lang);
		}
		$this->db->where('name', $key);
		
		$result = $this->db->update('setting', $data);
		
		return $result;
	}
	
	public function active_language($lang){
		////START TRANSACTION////
		$this->db->trans_begin();

		//un_active lang new
		$this->db->select('abbr');
		$this->db->from('language');
		$result = $this->db->where('active', 1)->get()->row_array();
		
		if(! empty($result) )
		{
			$data = array(
	               'active' => 0,
	            );
			
			$this->db->where('abbr', $result['abbr']);
			$result = $this->db->update('language', $data);
		}
		
		//active lang new
		$data = array(
               'active' => 1,
            );
		
		$this->db->where('abbr', $lang);
		$result = $this->db->update('language', $data);
		
		//------------------------------------//
		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    return FALSE;
		}
		else
		{
		    $this->db->trans_commit();
		    return TRUE;
		}
	}
	
	/**
	 * Trả về tất cả record thỏa điều kiện:
	 * @param string|array $key
	 * @param string $value
	 */
	public function get_many( $type_setting ) {
		$this->db->from($this->table);
		$this->db->where('type_setting', $type_setting);

		$result = $this->db->get();
		
		return $result->result_array();
	}	
	
	// ------------------------------------------------------------------------
	
	/**
	 * Trả về tất cả record thỏa điều kiện:
	 * @param string|array $key
	 * @param string $value
	 */
	public function get_language_many() {
		if ($this->lang_table != false) { // neu co dung language
			$this->db->from($this->lang_table);
			$result = $this->db->get();
			
			return $result->result_array();
		}
	}
}

/* End of file Setting_model */
/* Location: ./system/libraries/Setting.php */