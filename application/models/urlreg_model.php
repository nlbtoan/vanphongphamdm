<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Hexmedia., JSC
 *
 * @package		HexCMS
 * @author		Hexmedia IT Team
 * @license		http://hexcms.hexmedia.com.vn/doc-license
 * @link		http://hexcms.hexmedia.com.vn
 * @since		Version 1.0
 */

// ------------------------------------------------------------------------

/**
 * HexCMS, Urlreg Model
 *
 * @table		urlreg
 * @package		HexCMS
 * @subpackage	Models
 * @category	Urlreg
 * @author		Hexmedia IT Team
 *
 */

class Urlreg_model extends Model
{
	/**
	 * Constructor
	 */
	function __construct() {
		parent::__construct();
	}
	// --------------------------------------------------------------------

	function get_url($url) {
		$query = $this->db->from('urlreg')->where('url', $url)->get();
		return $query->row_array();
	}

	function getDefaultUrl() {
		$query = $this->db->from('urlreg')->where('homepage', 1)->get();
		return $query->row_array();
	}
	// --------------------------------------------------------------------

	function getMenu($lang) {
		$this->db->select('urlreg.url, urlreg_lang.name');
		$this->db->from('urlreg');
		$this->db->join('urlreg_lang', 'urlreg.url = urlreg_lang.url', 'left');
		$query = $this->db->where('lang', $lang)->order_by('ordering', 'asc')->get();
		return $query->result_array();
	}
}

/* End of file urlreg_model.php */
/* Location: ./application/models/urlreg_model.php */
