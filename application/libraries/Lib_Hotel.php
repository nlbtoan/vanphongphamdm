<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'Lib_Controller.php';

class Lib_Hotel extends Lib_Controller
{

	public function __construct() {
		
		parent::__construct();
		
		$this->CI->load->model('hotel_model');
		$this->CI->lang->load('hotel');
		
	}
	
	/**
	 * create
	 *
	 * @param  array
	 * @return bool
	 **/
	public function create( $data )
	{
		if ($this->CI->hotel_model->create( $data ) )
		{
			$this->set_message('create_successfully');
			return TRUE;
		}

		$this->set_error('create_unsuccessfully');
		return FALSE;
	}
	
	/**
	 * edit
	 *
	 * @param int
	 * @return array
	 **/
	public function edit( $data )
	{
		if ( $this->CI->hotel_model->edit( $data ) )
		{ 
			$this->set_message('edit_successfully');
			return TRUE;
		}
		$this->set_error('edit_unsuccessfully');
		return FALSE;
	}
	
	/**
	 * delete
	 *
	 * @param int
	 * @return array
	 **/
	public function delete( $id )
	{
		if ( $this->CI->hotel_model->delete( $id ) )
		{ 
			$this->set_message('delete_successfully');
			return TRUE;
		}
		$this->set_error('delete_unsuccessfully');
		return FALSE;
	}
	
	/**
	 * active or un_active
	 *
	 * @param int
	 * @return array
	 **/
	public function active( $id, $active , $field = 'is_enabled')
	{
		if ( $this->CI->hotel_model->active($id, $active) )
		{ 
			$this->set_message('active_successfully');
			return TRUE;
		}
		$this->set_message('active_unsuccessfully');
		return FALSE;
	}
	
	//Hotel room category
	/**
	 * create
	 *
	 * @param  array
	 * @return bool
	 **/
	public function create_cat_room( $data )
	{
		if ($this->CI->hotel_model->create_cat_room( $data ) )
		{
			$this->set_message('create_successfully');
			return TRUE;
		}

		$this->set_error('create_unsuccessfully');
		return FALSE;
	}
	
	/**
	 * delete
	 *
	 * @param int
	 * @return array
	 **/
	public function delete_cat_room( $id )
	{
		if ( $this->CI->hotel_model->delete_cat_room( $id ) )
		{ 
			$this->set_message('delete_successfully');
			return TRUE;
		}
		$this->set_error('delete_unsuccessfully');
		return FALSE;
	}
	
	/**
	 * active or un_active
	 *
	 * @param int
	 * @return array
	 **/
	public function active_cat_room( $id, $active , $field = 'is_enabled')
	{
		if ( $this->CI->hotel_model->active_cat_room($id, $active, $field) )
		{ 
			$this->set_message('active_successfully');
			return TRUE;
		}
		$this->set_message('active_unsuccessfully');
		return FALSE;
	}
	
	/**
	 * edit
	 *
	 * @param int
	 * @return array
	 **/
	public function edit_cat_room( $data )
	{
		if ( $this->CI->hotel_model->edit_cat_room( $data ) )
		{ 
			$this->set_message('edit_successfully');
			return TRUE;
		}
		$this->set_error('edit_unsuccessfully');
		return FALSE;
	}
	
	//Hotel Rooom
	/**
	 * create
	 *
	 * @param  array
	 * @return bool
	 **/
	public function create_room( $data )
	{
		if ($this->CI->hotel_model->create_room( $data ) )
		{
			$this->set_message('create_successfully');
			return TRUE;
		}

		$this->set_error('create_unsuccessfully');
		return FALSE;
	}
	
	/**
	 * delete
	 *
	 * @param int
	 * @return array
	 **/
	public function delete_room( $id )
	{
		if ( $this->CI->hotel_model->delete_room( $id ) )
		{ 
			$this->set_message('delete_successfully');
			return TRUE;
		}
		$this->set_error('delete_unsuccessfully');
		return FALSE;
	}
	
	/**
	 * active or un_active
	 *
	 * @param int
	 * @return array
	 **/
	public function active_room( $id, $active , $field = 'is_enabled')
	{
		if ( $this->CI->hotel_model->active_room($id, $active) )
		{ 
			$this->set_message('active_successfully');
			return TRUE;
		}
		$this->set_message('active_unsuccessfully');
		return FALSE;
	}
	
	/**
	 * edit
	 *
	 * @param int
	 * @return array
	 **/
	public function edit_room( $data )
	{
		if ( $this->CI->hotel_model->edit_room( $data ) )
		{ 
			$this->set_message('edit_successfully');
			return TRUE;
		}
		$this->set_error('edit_unsuccessfully');
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
		if ($this->CI->hotel_model->create_book( $data ) )
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
		if ( $this->CI->hotel_model->delete_book( $id ) )
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
		if ( $this->CI->hotel_model->edit_book( $data ) )
		{ 
			$this->set_message('edit_successfully');
			return TRUE;
		}
		$this->set_error('edit_unsuccessfully');
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
		if ( $this->CI->hotel_model->active_book($id, $active, $field) )
		{ 
			$this->set_message('active_successfully');
			return TRUE;
		}
		$this->set_message('active_unsuccessfully');
		return FALSE;
	}
	
}