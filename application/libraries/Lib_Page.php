<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'Lib_Controller.php';

class Lib_Page extends Lib_Controller
{

	public function __construct() {
		parent::__construct();

		$this->CI->load->model('page_model');

		$this->CI->lang->load('page');
	}

	/**
	 * create_page
	 *
	 * Them 1 page
	 *
	 * @param  array
	 * @return bool
	 **/
	public function create_page( $page )
	{
		if ($this->CI->page_model->create_page($page))
		{
			$this->set_message('page_creation_successful');
			return TRUE;
		}
		$this->set_error('page_creation_unsuccessful');
		return FALSE;
	}

	/**
	 * delete
	 *
	 * Delete page
	 *
	 * @param int
	 * @return array
	 **/
	public function delete_page( $page_id )
	{
		if ( $this->CI->page_model->delete_page($page_id) )
		{
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * edit
	 *
	 * edit page
	 *
	 * @param int
	 * @return array
	 **/
	public function edit_page( $page )
	{
		//echo'<pre>';var_dump($page);die();
		if ( $this->CI->page_model->edit_page( $page ) )
		{
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * active or un_active page
	 *
	 * @param int
	 * @return array
	 **/
	public function active_page( $page_id, $active )
	{
		if ( $this->CI->page_model->active_page($page_id, $active) )
		{
			return TRUE;
		}
		return FALSE;
	}


}