<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'Finder.php';

class MY_Loader extends CI_Loader
{	
	public function view($view, $vars = array(), $return = FALSE) {
		
		$files = Finder::find_file($view, 'views');
		
		$view = array_shift($files);
		
		return $this->_ci_load(array('_ci_path' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
	}
}