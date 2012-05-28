<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fckeditor extends Controller
{
	public function connector()
	{		
		require_once FCPATH . 'assets/fckeditor/editor/filemanager/connectors/php/connector.php';	
	}
}