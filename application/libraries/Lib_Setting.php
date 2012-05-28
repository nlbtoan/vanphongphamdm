<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'Lib_Controller.php';

class Lib_Setting extends Lib_Controller
{
	
	public function __construct() {
		parent:: __construct();
		
		$this->CI->load->model('setting_model');
		
		$this->CI->lang->load('setting');
	}
	
	/**
	 * update setting
	 *
	 * @param  array
	 * @return bool
	 **/
	public function update( $data )
	{
		if(! empty($data['data']) )
		{
			foreach( $data['data'] as $key => $value )
			{
				if($key == 'select_lang')
				{
					if( $this->CI->setting_model->active_language($value) == FALSE )
					{
						$this->set_error('update_unsuccessful');
						return FALSE;
					}
				}
				else
				{
					if( $this->CI->setting_model->update_value($value, $key) == FALSE )
					{
						$this->set_error('update_unsuccessful');
						return FALSE;
					}
				}
			}
		}
		
		if(! empty( $data['lang'] ) )
		{
			foreach( $data['lang'] as $lang => $item )
			{
				foreach( $item as $key => $value )
				{
					if( $this->CI->setting_model->update_value($value, $key, $lang) == FALSE )
					{
						$this->set_error('update_unsuccessful');
						return FALSE;
					}
				}
			}
		}
		
		$this->set_message('update_successful');
		return TRUE;
	}
}