<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'Lib_Controller.php';

class Lib_Flight extends Lib_Controller
{
	public function __construct() 
	{
		parent::__construct();
		
		$this->CI->load->model('flight_model');
		
		$this->CI->lang->load('front_end/flight');
		$this->CI->lang->load('flight');
	}
	
	public function create($row)
	{
		if ($this->CI->flight_model->create($row))
		{
			$this->set_message('creation_successful');
			return TRUE;
		}

		$this->set_error('creation_unsuccessful');
		return FALSE;
	}
	
	public function create_flight($row)
	{
		if ($this->CI->flight_model->create_flight($row))
		{
			$this->set_message('creation_successful');
			return TRUE;
		}

		$this->set_error('creation_unsuccessful');
		return FALSE;
	}
	
	public function update($row)
	{
		if ($this->CI->flight_model->update($row))
		{
			$this->set_message('update_successful');
			return TRUE;
		}

		$this->set_error('update_unsuccessful');
		return FALSE;
	}
	
	public function update_flight($row)
	{
		if ($this->CI->flight_model->update_flight($row))
		{
			$this->set_message('update_successful');
			return TRUE;
		}

		$this->set_error('update_unsuccessful');
		return FALSE;
	}
	
	public function delete($id)
	{
		if ($this->CI->flight_model->delete($id))
		{
			$this->set_message('delete_successful');
			return TRUE;
		}

		$this->set_error('delete_unsuccessful');
		return FALSE;
	}
	
	public function delete_flight($id)
	{
		if ($this->CI->flight_model->delete_flight($id))
		{
			$this->set_message('delete_successful');
			return TRUE;
		}

		$this->set_error('delete_unsuccessful');
		return FALSE;
	}
	
	public function active( $id, $active )
	{
		if ( $this->CI->flight_model->active($id, $active) )
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
		if ($this->CI->flight_model->create_book( $data ) )
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
		if ( $this->CI->flight_model->delete_book( $id ) )
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
		if ( $this->CI->flight_model->edit_book( $data ) )
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
		if ( $this->CI->flight_model->active_book($id, $active, $field) )
		{ 
			$this->set_message('active_successfully');
			return TRUE;
		}
		$this->set_message('active_unsuccessfully');
		return FALSE;
	}
	
}