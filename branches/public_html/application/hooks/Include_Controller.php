<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Include_Controller
{	
	public function call_lib_controller(){
		if( file_exists('./application/hooks/Include_Controller.php') === TRUE )
		{
			require_once './application/hooks/Include_Controller.php';
		}
	}
}