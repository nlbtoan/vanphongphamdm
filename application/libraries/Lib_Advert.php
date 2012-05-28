<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'Lib_Controller.php';

class Lib_Advert extends Lib_Controller
{
	public function __construct() 
	{
		parent::__construct();
		
		$this->CI->load->model('advert_model');
		$this->CI->lang->load('advert');
	}
	
	public function create( $data )
	{
		if ($this->CI->advert_model->create($data))
		{
			$this->set_message('creation_successful');
			return TRUE;
		}
		$this->set_error('creation_unsuccessful');
		return FALSE;
	}
	
	public function create_advert( $data )
	{
		if ($this->CI->advert_model->create_advert($data))
		{
			$this->set_message('creation_successful');
			return TRUE;
		}
		$this->set_error('creation_unsuccessful');
		return FALSE;
	}
	
	public function exist_alias( $alias, $id = FALSE )
	{
		if($id) // Xay ra khi update menu
		{
			if ( $this->CI->advert_model->exist_alias($alias, $id) )
			{ 
				$this->set_error('exist_alias');
				return TRUE;
			}
		}
		else if ( $this->CI->advert_model->exist_alias($alias) )
		{
			$this->set_error('exist_alias');
			return TRUE;
		}
		
		return FALSE;
	}
	
	public function delete( $id )
	{
		if ( $this->CI->advert_model->delete($id) )
		{
			$this->set_message('delete_successful');
			return TRUE;
		}
		$this->set_message('delete_unsuccessful');
		return FALSE;
	}
	
	public function delete_advert( $id )
	{
		if ( $this->CI->advert_model->delete_advert($id) )
		{
			$this->set_message('delete_successful');
			return TRUE;
		}
		$this->set_message('delete_unsuccessful');
		return FALSE;
	}
	
	public function edit( $data )
	{
		if ( $this->CI->advert_model->edit( $data ) )
		{
			$this->set_message('update_successful');
			return TRUE;
		}
		$this->set_message('update_unsuccessful');
		return FALSE;
	}
	
	public function edit_advert( $data )
	{
		if ( $this->CI->advert_model->edit_advert( $data ) )
		{
			$this->set_message('update_successful');
			return TRUE;
		}
		$this->set_message('update_unsuccessful');
		return FALSE;
	}

	public function active( $id, $active )
	{
		if ( $this->CI->advert_model->active($id, $active) )
		{
			return TRUE;
		}
		return FALSE;
	}
	
	public function active_advert( $id, $active )
	{
		if ( $this->CI->advert_model->active_advert($id, $active) )
		{
			return TRUE;
		}
		return FALSE;
	}
}
