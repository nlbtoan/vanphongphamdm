<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'Lib_Controller.php';

class Lib_Nickchat extends Lib_Controller
{

	public function __construct() {
		parent::__construct();

		$this->CI->load->model('nickchat_model');

		$this->CI->lang->load('nickchat');
	}

	public function create( $data )
	{
		if ($this->CI->nickchat_model->create($data))
		{
			$this->set_message('creation_successful');
			return TRUE;
		}
		$this->set_error('creation_unsuccessful');
		return FALSE;
	}

	public function delete( $id )
	{
		if ( $this->CI->nickchat_model->delete($id) )
		{
			$this->set_message('delete_successful');
			return TRUE;
		}
		$this->set_message('delete_unsuccessful');
		return FALSE;
	}

	public function edit( $data )
	{
		if ( $this->CI->nickchat_model->edit( $data ) )
		{
			$this->set_message('update_successful');
			return TRUE;
		}
		$this->set_message('update_unsuccessful');
		return FALSE;
	}

	public function active( $id, $active )
	{
		if ( $this->CI->nickchat_model->active($id, $active) )
		{
			return TRUE;
		}
		return FALSE;
	}


}