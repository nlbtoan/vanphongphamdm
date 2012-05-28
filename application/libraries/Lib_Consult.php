<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'Lib_Controller.php';

class Lib_Consult extends Lib_Controller
{

	public function __construct() {
		parent::__construct();
		
		$this->CI->load->model('consult_model');
		$this->CI->lang->load('consult');
	}
	
	/**
	 * create_page
	 *
	 * Them 1 page
	 *
	 * @param  array
	 * @return bool
	 **/
	public function create_faq( $faq )
	{
		if ($this->CI->consult_model->create_faq($faq))
		{
			$this->set_message('faq_creation_successful');
			return TRUE;
		}

		$this->set_error('faq_creation_unsuccessful');
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
	public function delete_faq( $faq_id )
	{
		if ( $this->CI->consult_model->delete_faq($faq_id) )
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
	public function edit_faq( $faq )
	{
		if ( $this->CI->consult_model->edit_faq( $faq ) )
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
	public function active_faq( $faq_id, $active )
	{
		if ( $this->CI->consult_model->active_faq($faq_id, $active) )
		{ 
			return TRUE;
		}
		return FALSE;
	}
	
	/**
	 * create_feedback
	 *
	 * Them 1 feedback
	 *
	 * @param  array
	 * @return bool
	 **/
	public function create_feedback( $feedback )
	{
		if ($this->CI->consult_model->create_feedback($feedback))
		{
			//$this->set_message('feedback_creation_successful');
			return TRUE;
		}

		//$this->set_error('feedback_creation_unsuccessful');
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
	public function delete_feedback( $feedback_id )
	{
		if ( $this->CI->consult_model->delete_feedback($feedback_id) )
		{ 
			return TRUE;
		}
		return FALSE;
	}
	
	
	/**
	 * active or un_active is_read
	 *
	 * @param int
	 * @return array
	 **/
	public function read_feedback( $feedback_id, $active )
	{
		if ( $this->CI->consult_model->read_feedback( $feedback_id, $active ) )
		{ 
			return TRUE;
		}
		return FALSE;
	}
	
	/**
	 * active or un_active is_answered
	 *
	 * @param int
	 * @return array
	 **/
	public function answer_feedback( $feedback_id, $active )
	{
		if ( $this->CI->consult_model->answer_feedback( $feedback_id, $active ) )
		{ 
			return TRUE;
		}
		return FALSE;
	}
	
}