<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Router extends CI_Router
{	
	private $ajax = false;
	private $lang = false;
	private $var_table = 'menu';
	private $lang_table;
	
	public function MY_Router() {
		require_once(BASEPATH.'database/DB'.EXT);
		$this->db = & DB();
		
		$this->config =& load_class('Config');
		$this->uri =& load_class('URI');
		
		// lay cac bien tu config		
		$this->lang_table = $this->config->item('lang_table');
		
		$this->_set_routing();
					
		log_message('debug', "Router Class Initialized");								
	}
	
	// ------------------------------------------------------------------------

	public function _validate_request($segments) 
	{ 	
		// neu urlreg khong xac dinh nghia la khong dung db
		if ($this->var_table != false)
		{
			/*
			 * Dau tien xem set homepage trong database truoc,
			 * Neu khong co se lay default_controller mac dinh ben trong config 
			 */

			if( empty($this->uri->segments) ) //segment = null
			{
				$this->db->select('link')->from($this->var_table);
				$query = $this->db->where('homepage', 1)->get();
				if($link = $query->row_array())
				{
					$segments = $this->_parse_link($link['link']);
				}
			}
			else
			{  
				$this->db->select('link')->from($this->var_table);
				$this->db->join($this->var_table . '_lang', 'id = ' . $this->var_table . '_id');
				$query = $this->db->where('alias', $segments[0])->get();
				
				if ($link = $query->row_array()) 
				{
					$restore_sg = $segments;

					//Gan segment tim thay trong database cho len dau array
					$new_sg = $this->_parse_link($link['link']);
					
					foreach( $new_sg as $k => $item )
					{
						$segments[$k] = $item;
					}
					
					//Gan restore_sg duoc restore vao segments tru` segments[0]
					foreach( $restore_sg as $k => $item )
					{
						if( $k != 0 )
						{
							$segments[] = $item;
						}
					}
				}
			}
		}

		return parent::_validate_request($segments);
	}
	
	function _parse_link( $link = '' )
	{
		return explode("/", $link);
	}

	// --------------------------------------------------------------------

	function _set_routing()
	{
		// Are query strings enabled in the config file?
		// If so, we're done since segment based URIs are not used with query strings.
		// phan tich lang khong quan tam toi query_string		
		if ($this->config->item('enable_query_strings') === TRUE AND isset($_GET[$this->config->item('controller_trigger')])
			AND $this->config->item('uri_protocol') != 'PATH_INFO')
		{
			$this->set_class(trim($this->uri->_filter_uri($_GET[$this->config->item('controller_trigger')])));

			if (isset($_GET[$this->config->item('function_trigger')]))
			{
				$this->set_method(trim($this->uri->_filter_uri($_GET[$this->config->item('function_trigger')])));
			}
			
			return;
		}
		
		// Load the routes.php file.
		@include(APPPATH.'config/routes'.EXT);
		$this->routes = ( ! isset($route) OR ! is_array($route)) ? array() : $route;
		// lay table urlreg tu routes.php
		/*if (!empty($route['urlreg_table'])) {
			$this->urlreg_table = $route['urlreg_table'];
		}*/
		
		unset($route);

		// Set the default controller so we can display it in the event
		// the URI doesn't correlated to a valid controller.
		$this->default_controller = ( ! isset($this->routes['default_controller']) OR $this->routes['default_controller'] == '') ? FALSE : strtolower($this->routes['default_controller']);	
		
		// Fetch the complete URI string
		$this->uri->_fetch_uri_string();
		
		// xac dinh ngon ngu
		$this->_check_lang();			
		
		// Is there a URI string? If not, the default controller specified in the "routes" file will be shown.

		if ($this->uri->uri_string == '')
		{
			if ($this->default_controller === FALSE)
			{
				show_error("Unable to determine what should be displayed. A default route has not been specified in the routing file.");
			}
			
			if (strpos($this->default_controller, '/') !== FALSE)
			{
				$x = explode('/', $this->default_controller);

				$this->set_class(end($x));
				$this->set_method('index');
				$this->_set_request($x);
			}
			else
			{
				$this->set_class($this->default_controller);
				$this->set_method('index');
				$this->_set_request(array($this->default_controller, 'index'));
			}

			// re-index the routed segments array so it starts with 1 rather than 0
			$this->uri->_reindex_segments();
			
			log_message('debug', "No URI present. Default controller set.");
			return;
		}
		unset($this->routes['default_controller']);
				
			
		// Kiem tra ajax tren uri string /ajax/class/method
		$this->_check_ajax();
		
		// Do we need to remove the URL suffix?
		$this->uri->_remove_url_suffix();
		
		// Compile the segments into an array
		$this->uri->_explode_segments();
		
		// Parse any custom routing that may exist
		$this->_parse_routes();		
		
		// Re-index the segment array so that it starts with 1 rather than 0
		$this->uri->_reindex_segments();		
	}
		
	
	// ------------------------------------------------------------------------
	/**
	 * Validate lang truyên trên link. Ham kiểm tra chỉ mang tính tương đối, vì
	 * bảng language bao gồm của front-end và back-end.
	 * @param unknown_type $lang
	 */
	private function _validate_lang($lang) {
		if (empty($lang)) 
			return FALSE;					
		return $this->db->where('abbr', $lang)->count_all_results($this->lang_table) > 0;		
	}
	
	// ------------------------------------------------------------------------
	
	/**
	 * Xác định lang được truyền trên link
	 */
	private function _check_lang() {
		if ($this->lang_table != false && $this->uri->uri_string != '') {
			$this->uri->_remove_url_suffix();
			$this->uri->_explode_segments();
			$lang_candidate = current($this->uri->segments);
			
			// kiem tra hop le cua lang
			if ($this->_validate_lang($lang_candidate)) {
				$this->set_lang($lang_candidate);
				// xoa dau vet
				if (count($this->uri->segments) == 1) { // language dung 1 minh
					$this->uri->uri_string = '';
				} else {
					$this->uri->uri_string = '/' . preg_replace('/\/?'.preg_quote($lang_candidate).'\//', '', $this->uri->uri_string);
				}
			}
			
			// roll back
			$this->uri->segments = array();
		}
	}
	
	/**
	 * Ham kiem tra ajax, neu duong dan chi ra la ajax thi input->is_ajax() tra ve true, nguoc lai false.
	 */
	private function _check_ajax() {
		$this->uri->_remove_url_suffix();
		$this->uri->_explode_segments();
		
		if ('ajax' == current($this->uri->segments)) {
			$this->ajax = true;
			$this->uri->uri_string = '/' . preg_replace('/\/?'.preg_quote('ajax').'\//', '', $this->uri->uri_string);	
		}
		$this->uri->segments = array();				
	}
	
	// ------------------------------------------------------------------------
	
	/**
	 * Xac dinh request hien tai co phai la ajax hay khong ?
	 * @return boolean 
	 */
	public function is_ajax() {
		return $this->ajax;
	}
	
	// ------------------------------------------------------------------------
	
	/**
	 * Thay đổi lang xac định trên đường dẫn.
	 * @param string $lang
	 */
	public function set_lang($lang) {
		$this->lang = $lang;
		$this->config->set_item('language_abbr', $lang);
	}

	// ------------------------------------------------------------------------
	/**
	 * Trả về lang xác định đượng trên đường dẫn.
	 * @return string
	 */
	public function fetch_lang() {
		return $this->lang;
	}
}