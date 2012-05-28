<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends Controller
{
	public function __construct() {
		parent::__construct();

                //$this->output->cache(15);

		$this->load->database();

		$this->load->library('session');
		$this->load->library('theme');
		$this->load->library('setting');
		

		$this->load->helper('common');
		$this->load->helper('url');
		$this->load->helper('url_lang');
		$this->load->helper('language');
	}
	
	//Hay xung minh` la` ai ?? de toi co`n xet site_url cho ba.n
	public function who_is( $iam = 'user' )
	{
		$CI =& get_instance();
		
		$CI->config->set_who_is( $iam );
		$CI->lang->set_who_is( $iam );
	}
	
	private function initialize() {
		// $this->history->push($this->uri->uri_string());
	}	
}

// --------------------------------------------------------------------


class MY_Base extends MY_Controller
{
	public $current_url = '';
	public $late_head = array();
	
	protected $data = array(
		'message' => ''
	);
	
	public function __construct() {
		parent::__construct();
		
		$this->load->helper('menu');

		$this->load->helper('image_helper');
		
		$this->setting->initialize(false);
		
		$this->initialize();
	}
	
	public function initialize() 
	{
		$this->who_is('user');
		
		$this->set_current();
		
		$this->theme->set_theme('travel');
	}
	
	public function set_current(){
		$segment = $this->uri->segment(1);
		
		if($this->uri->segment(1)) 
		{
			$this->current_url = $segment;
		}
		else if( empty($segment) )
		{
			$CI =& get_instance();
			$var_table = 'menu';
			
			if( !empty($var_table) ){
				$CI->db->select('link')->from($var_table);
				//$CI->db->join($var_table . '_lang', 'id = ' . $var_table . '_id');
				$query = $CI->db->where('homepage', 1)->get();
				
				if($homepage = $query->row_array())
				{
					$this->current_url = $homepage['link'];
				}
			}
		}
	}
	
	protected function output($view, $return = FALSE) {
		if ($this->input->server('HTTP_X_REQUESTED_WITH') 
		&& ($this->input->server('HTTP_X_REQUESTED_WITH') == 'XMLHttpRequest') && $return == false) {			
			echo json_encode($this->data);
			exit;
		}		
		$this->load->view($view, $this->data, $return);
	}
	
	public function _output($content) {
		$html = '';
		foreach ($this->late_head as $head) {
			$html .= $head;
		}
		$content = str_replace('</head>', $html . '</head>', $content);
		echo $content;
	}
}
// --------------------------------------------------------------------

class MY_Admin extends MY_Controller
{
	public $user = null;
	
	protected $data = array(
		'message' => ''
	);
	
	public function __construct() {
		parent::__construct();
		
 		$this->load->config('admin', TRUE);
 			
		$this->load->library('auth');
        
		$this->load->helper('html');
		
		$this->setting->initialize();
		
		$this->initialize();
	}
	
	private function initialize() 
	{
		$this->who_is('admin');
		
		$this->lang->load('layout');
		
		$this->theme->set_theme('_admin');
					
		$this->user = $this->check_auth();
	}
	
	private function check_auth() {			
		if (!$this->auth->is_admin()) { 
			$method = $this->router->fetch_method();
			
			if ($method != 'login' && $method != 'logout') {					
				if ($this->auth->logged_in()) {					
					show_permission_error();					  			    				
				}														
				$this->session->set_flashdata('continue', current_url());				
				redirect('admin/auth/login', 'refresh');									  
			}
		}
		return $this->auth->profile();		
	}
	
	protected function output($view, $return = FALSE) {
		if ($this->input->server('HTTP_X_REQUESTED_WITH') 
		&& ($this->input->server('HTTP_X_REQUESTED_WITH') == 'XMLHttpRequest') && $return == false) {			
			echo json_encode($this->data);
			exit;
		}
		$this->load->view($view, $this->data, $return);
	}
	
}

/* End of file MY_Controller.php */
/* Location: ./application/controllers/MY_Controller.php */