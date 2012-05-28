<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Theme 
{
	protected $theme = '';
	protected $theme_path = 'themes/';
	protected $ci;
	
	public function __construct() 
	{
		$this->ci = &get_instance();
		$this->ci->load->helper('theme');
	}
	
	public function set_theme( $theme ) 
	{
		/*if($theme == FALSE)
		{
			$this->theme = $this->get_theme();
		}*/
		if( is_string($theme) )
		{
			$this->theme = $theme;
			Finder::add_path($this->get_theme_path());
		}
	}
	
	public function get_theme()
	{
		return $this->theme;
	}

	public function get_theme_path() 
	{		
		return $this->theme_path . $this->theme . '/';
	}
	
	public function output($vars = array(), $return = FALSE)
	{	
		return $this->ci->load->view($this->theme, $vars, $return);
	}
}