<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forum extends MY_Base
{
	public function __construct() {
		
		parent::__construct();
	}

	public function index() { 
                redirect('http://forum.phuquocsmile.com');
	}
}
