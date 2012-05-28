<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lib_Controller
{
	protected $CI;
	
	protected $messages = array();
	
	protected $errors = array();
	
	protected $error_start_delimiter = '<li>';
	
	protected $error_end_delimiter = '</li>';
	
	public function __construct() {
		$this->CI =& get_instance();
	}
	
	/**
	 * set_message
	 * 
	 * set a message
	 *
	 * @param string
	 * @return array
	 **/
	public function set_message($message)
	{
		$this->messages[] = $message;

		return $message;
	}
	
	/**
	 * set_error
	 * 
	 * set a error
	 *
	 * @param string
	 * @return array
	 **/
	public function set_error($error)
	{
		$this->errors[] = $error;

		return $error;
	}
	
	/**
	 * messages
	 *
	 * Get the messages
	 *
	 * @return string
	 **/
	public function messages() {
		$_output = '';
		foreach ($this->messages as $message) {
			$_output .= $this->error_start_delimiter . $this->get_lang_line($message) . $this->error_end_delimiter;
		}

		return $_output;
	}

	/**
	 * errors
	 *
	 * Get the error message
	 *
	 * @return string
	 **/
	public function errors() 
	{
		$_output = '';
		
		foreach ($this->errors as $error)
		{
			$_output .= $this->error_start_delimiter. $this->get_lang_line($error) . $this->error_end_delimiter;
		}

		return $_output;
	}
	
	/**
	 * get_lang_line
	 *
	 * Fetch a single line of text from language
	 *
	 * @return string
	 **/
	public function get_lang_line( $string )
	{
		$param = explode('|', $string);
		
		if( is_array($param) )
		{
			$lang_line = "";
			foreach($param as $k => $item)
			{
				if($k == 0)
				{
					$lang_line = $this->CI->lang->line($item);
				}
				else
				{
					$lang_line = sprintf( $lang_line, lang($item) ); 
				}
			}
			return $lang_line;
		}
		
		return $this->CI->lang->line($param);
	}
	
	function order_array_num ($array, $key, $order = "ASC")
    {
        $tmp = array();
        foreach($array as $akey => $array2)
        {
            $tmp[$akey] = $array2[$key];
        }
       
        if($order == "DESC")
        {arsort($tmp , SORT_NUMERIC );}
        else
        {asort($tmp , SORT_NUMERIC );}

        $tmp2 = array();       
        foreach($tmp as $key => $value)
        {
            $tmp2[$key] = $array[$key];
        }       
       
        return $tmp2;
    } 
}