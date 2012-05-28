<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'Lib_Controller.php';

class Lib_vehicle extends Lib_Controller
{
	public function __construct() 
	{
		parent::__construct();
		
		$this->CI->load->model('vehicle_model');
		
		$this->CI->lang->load('front_end/vehicle');
		$this->CI->lang->load('vehicle');
	}
	
	public function create($row)
	{
		if ($this->CI->vehicle_model->create($row))
		{
			$this->set_message('creation_successful');
			return TRUE;
		}

		$this->set_error('creation_unsuccessful');
		return FALSE;
	}
	
	public function create_vehicle($row)
	{
		if ($this->CI->vehicle_model->create_vehicle($row))
		{
			$this->set_message('creation_successful');
			return TRUE;
		}

		$this->set_error('creation_unsuccessful');
		return FALSE;
	}
	
	public function edit($row)
	{
		if ($this->CI->vehicle_model->edit($row))
		{
			$this->set_message('update_successful');
			return TRUE;
		}

		$this->set_error('update_unsuccessful');
		return FALSE;
	}
	
	public function edit_vehicle($row)
	{
		if ($this->CI->vehicle_model->edit_vehicle($row))
		{
			$this->set_message('update_successful');
			return TRUE;
		}

		$this->set_error('update_unsuccessful');
		return FALSE;
	}
	
	public function delete($id)
	{
		if ($this->CI->vehicle_model->delete($id))
		{
			$this->set_message('delete_successful');
			return TRUE;
		}

		$this->set_error('delete_unsuccessful');
		return FALSE;
	}
	
	public function delete_vehicle($id)
	{
		if ($this->CI->vehicle_model->delete_vehicle($id))
		{
			$this->set_message('delete_successful');
			return TRUE;
		}

		$this->set_error('delete_unsuccessful');
		return FALSE;
	}
	
	public function active( $id, $active )
	{
		if ( $this->CI->vehicle_model->active($id, $active) )
		{ 
			return TRUE;
		}
		return FALSE;
	}
	
	/**
	 * create booking
	 *
	 * @param  array
	 * @return bool
	 **/
	public function create_book( $data )
	{
		if ($this->CI->vehicle_model->create_book( $data ) )
		{
			$this->set_message('book_successfully');
			return TRUE;
		}

		$this->set_error('book_unsuccessfully');
		return FALSE;
	}
	
	/**
	 * delete
	 *
	 * @param int
	 * @return array
	 **/
	public function delete_book( $id )
	{
		if ( $this->CI->vehicle_model->delete_book( $id ) )
		{ 
			$this->set_message('delete_successfully');
			return TRUE;
		}
		$this->set_error('delete_unsuccessfully');
		return FALSE;
	}
	
	/**
	 * edit
	 *
	 * @param int
	 * @return array
	 **/
	public function edit_book( $data )
	{
		if ( $this->CI->vehicle_model->edit_book( $data ) )
		{ 
			$this->set_message('update_successful');
			return TRUE;
		}
		$this->set_error('update_unsuccessful');
		return FALSE;
	}
	
	/**
	 * active or un_active
	 *
	 * @param int
	 * @return array
	 **/
	public function active_book( $id, $active , $field = 'active')
	{
		if ( $this->CI->vehicle_model->active_book($id, $active, $field) )
		{ 
			$this->set_message('active_successfully');
			return TRUE;
		}
		$this->set_message('active_unsuccessfully');
		return FALSE;
	}
	
}