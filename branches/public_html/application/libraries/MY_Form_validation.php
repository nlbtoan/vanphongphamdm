<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation
{

	function __construct(){
		parent::__construct();
		$this->set_error_delimiters('<p class="error">', '</p>');
	}
	
	function valid_emails($str)
	{
		if (strpos($str, ',') === FALSE)
		{
			return $this->valid_email(trim($str));
		}

		foreach(explode(',', $str) as $email)
		{
			{
				if ( $this->valid_email(trim($email)) == FALSE )
				return FALSE;
			}
		}

		return TRUE;
	}
	
}
