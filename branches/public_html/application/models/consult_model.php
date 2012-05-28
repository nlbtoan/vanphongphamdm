<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consult_model extends MY_Model{
	
	function __construct(){
		
		parent::__construct();
		
	}
	
	function get_faq(){
		
		$this->db->select('id, question, answer, is_enabled');
		$this->db->from('faq');
		$this->db->join('faq_lang', 'id = faq_id');
		$this->db->where('faq_lang.lang', $this->current_lang_abbr);
		
		$result = $this->db->get();
		
		return $result->result_array();
		
	}
	
	public function get_faq_count( &$count = 0, $limit = FALSE, $offset = FALSE)
	{
		$this->db->start_cache();
		$this->db->select('id, question, answer, is_enabled');
		$this->db->from('faq');
		$this->db->join('faq_lang', 'id = faq_id');
		$this->db->where('faq_lang.lang', $this->current_lang_abbr);
		
		$this->db->stop_cache();
		$count = $this->db->get()->num_rows();
		
		if ($limit != FALSE) {
			if ($offset == FALSE) $this->db->limit($limit);
			else $this->db->limit($limit, $offset);
		}
		
		$return = $this->db->get()->result_array();
		$this->db->flush_cache();

		return $return;
	}
	
	function get_info_faq( $faq_id = 0){
		
		$this->db->select('*');
		$this->db->from('faq');
		$this->db->join('faq_lang', 'id = faq_id');
		$this->db->where('id', $faq_id);
		$result = $this->db->get();
		
		return count($result->result_array()) > 0 ? $result->result_array() : false;
		
	}
	
	/*
	 * create a faq
	 * @param : string
	 * @return true or false
	 */
	public function create_faq( $data )
	{
		////START TRANSACTION////
		$this->db->trans_begin();

		//Insert thong tin chung
		$this->db->set('date', 			empty( $data['date'] ) ? time()-3600: $data['date']);
		$this->db->set('is_enabled', 		empty( $data['is_enabled'] ) ? 0 : $data['is_enabled']);
		$this->db->insert('faq'); //do to insert faq
		
		//Get last id in table FAQ
		$id = $this->db->insert_id();
		
		//Insert thong tin rieng cho tung language
		foreach( $data['lang'] as $item )
		{
			$this->db->set('faq_id', 	$id);
			$this->db->set('lang', 		$item['lang']);
			$this->db->set('question', 	$item['question']);
			$this->db->set('answer', 	$item['answer']);
			$this->db->insert('faq_lang'); //do to insert faq_lang
		}
		
		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    return FALSE;
		}
		else
		{
		    $this->db->trans_commit();
		    return TRUE;
		}
	}
	
	/*
	 * active or un_active faq
	 * @param : (int|array)faq_id
	 * @param : string
	 * @return true or false
	 */
	public function active_faq( $faq_id, $active = 0 )
	{

		if( is_array($faq_id) )
		{
			for($item = 0; $item < count($faq_id); $item++)
			{
				if($item == 0) $this->db->where('id', $faq_id[$item]);
				else $this->db->or_where('id', $faq_id[$item]);
			}
		}
		else
		{	
			$this->db->where('id', $faq_id);
		}
		
		$data = array(
               		'is_enabled' => $active
            	);
			
		$result = $this->db->update('faq', $data);
		return $result;
		
	}
	
	/*
	 * Xoa 1 hoac nhieu faq
	 * - Neu xoa thanh cong return TRUE
	 * - Nguoc lai return FASLE
	 * @param : (int|array)faq
	 * @return true or false
	 */
	public function delete_faq($faq_id)
	{
		////START TRANSACTION////
		$this->db->trans_begin();
		
		//DELETE ROW IN "FAQ" TABLE
		if( is_array($faq_id) )
		{
			for($item = 0; $item < count($faq_id); $item++)
			{
				if($item == 0) $this->db->where('id', $faq_id[$item]);
				else $this->db->or_where('id', $faq_id[$item]);
			}
		}
		else
		{
			$this->db->where('id', $faq_id);
		}
		$this->db->delete('faq');
		
		//DELETE ROW IN "FAQ_LANG" TABLE
		if( is_array($faq_id) )
		{
			for($item = 0; $item < count($faq_id); $item++)
			{
				if($item == 0) $this->db->where('faq_id', $faq_id[$item]);
				else $this->db->or_where('faq_id', $faq_id[$item]);
			}
		}
		else
		{
			$this->db->where('faq_id', $faq_id);
		}
		$this->db->delete('faq_lang');
		
		//------------------------------------//
		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    return FALSE;
		}
		else
		{
		    $this->db->trans_commit();
		    return TRUE;
		}
	}
	
	/*
	 * edit faq
	 * @param : string
	 * @return true or false
	 */
	public function edit_faq( $data )
	{
		if ( empty($data['id']) ){
			return FALSE;
		}
		////START TRANSACTION////
		$this->db->trans_begin();
		
		$object = array();
		$id = $data['id'];
		//update thong tin chung
		//$object['date'] 		= empty( $data['date'] ) ? time()-3600: $data['date'];
		$object['is_enabled'] 		= empty( $data['is_enabled'] ) ? 0 : $data['is_enabled'];
		//var_dump($object);die();
		$this->db->where('id', $id);
		$this->db->update('faq', $object); 
		
		//update thong tin rieng cho tung language
		foreach( $data['lang'] as $item )
		{
			$object = array();
			$object['question'] 	= 	empty( $item['question'] ) ? "": $item['question'];
			$object['answer'] 	= 	empty( $item['answer'] ) ? "": $item['answer'];
			$this->db->where('lang', $item['lang']);
			$this->db->where('faq_id', $id);
			$this->db->update('faq_lang', $object); 
		}
		
		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    return FALSE;
		}
		else
		{
		    $this->db->trans_commit();
		    return TRUE;
		}
	}
	
	
	/*FEEDBACK*/
	
	
	function get_feedback(){
		
		$result = $this->db->get('feedback');
		
		return $result->result_array();
		
	}
	
	public function get_feedback_count( &$count = 0, $limit = FALSE, $offset = FALSE)
	{
		$this->db->start_cache();
		$this->db->select('*');
		$this->db->from('feedback');
		
		$this->db->stop_cache();
		$count = $this->db->get()->num_rows();
		
		if ($limit != FALSE) {
			if ($offset == FALSE) $this->db->limit($limit);
			else $this->db->limit($limit, $offset);
		}
		
		$return = $this->db->get()->result_array();
		$this->db->flush_cache();

		return $return;
	}
	
	function get_info_feedback( $id = 0){
		
		$this->db->select('*');
		$this->db->from('feedback');
		$this->db->where('id', $id);
		$result = $this->db->get();
		
		return count( $result->row_array() ) > 0 ? $result->row_array() : false;
		
	}
	
	/*
	 * create a feedback
	 * @param : string
	 * @return true or false
	 */
	public function create_feedback( $data )
	{
		////START TRANSACTION////
		$this->db->trans_begin();

		//Insert thong tin chung
		$this->db->set('date', 			empty( $data['date'] ) ? time()-3600 : $data['date']);
		$this->db->set('fullname', 		empty( $data['fullname'] ) ? "" : $data['fullname']);
		$this->db->set('email', 		empty( $data['email'] ) ? "" : $data['email']);
		$this->db->set('title', 		empty( $data['title'] ) ? "" : $data['title']);
		$this->db->set('content', 		empty( $data['content'] ) ? "" : $data['content']);
		$this->db->insert('feedback'); //do to insert feedback
		
		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    return FALSE;
		}
		else
		{
		    $this->db->trans_commit();
		    return TRUE;
		}
	}
	
	/*
	 * read or read yet feedback
	 * @param : (int|array)feedback_id
	 * @param : string
	 * @return true or false
	 */
	public function read_feedback( $feedback_id, $active = 0 )
	{

		if( is_array($feedback_id) )
		{
			for($item = 0; $item < count($feedback_id); $item++)
			{
				if($item == 0) $this->db->where('id', $feedback_id[$item]);
				else $this->db->or_where('id', $feedback_id[$item]);
			}
		}
		else
		{	
			$this->db->where('id', $feedback_id);
		}
		
		$data = array(
               		'is_read' => $active
            	);
			
		$result = $this->db->update('feedback', $data);
		return $result;
		
	}
	
	/*
	 * answer or answer yet feedback
	 * @param : (int|array)feedback_id
	 * @param : string
	 * @return true or false
	 */
	public function answer_feedback( $feed_id, $active = 0 )
	{

		if( is_array($feed_id) )
		{
			for($item = 0; $item < count($feed_id); $item++)
			{
				if($item == 0) $this->db->where('id', $feed_id[$item]);
				else $this->db->or_where('id', $feed_id[$item]);
			}
		}
		else
		{	
			$this->db->where('id', $feed_id);
		}
		
		$data = array(
               		'is_answered' => $active
            	);
			
		$result = $this->db->update('feedback', $data);
		return $result;
		
	}
	
	/*
	 * Xoa 1 hoac nhieu feedback
	 * - Neu xoa thanh cong return TRUE
	 * - Nguoc lai return FASLE
	 * @param : (int|array)feedback
	 * @return true or false
	 */
	public function delete_feedback($feedback_id)
	{
		////START TRANSACTION////
		$this->db->trans_begin();
		
		//DELETE ROW IN "FEEDBACK" TABLE
		if( is_array($feedback_id) )
		{
			for($item = 0; $item < count($feedback_id); $item++)
			{
				if($item == 0) $this->db->where('id', $feedback_id[$item]);
				else $this->db->or_where('id', $feedback_id[$item]);
			}
		}
		else
		{
			$this->db->where('id', $feedback_id);
		}
		$this->db->delete('feedback');
		
		//------------------------------------//
		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    return FALSE;
		}
		else
		{
		    $this->db->trans_commit();
		    return TRUE;
		}
	}
	
	/*
	 * edit feedback
	 * @param : string
	 * @return true or false
	 */
	public function edit_feedback( $data )
	{
		if ( empty($data['id']) ){
			return FALSE;
		}
		////START TRANSACTION////
		$this->db->trans_begin();
		
		$object = array();
		$id = $data['id'];
		//update thong tin chung
		//$object['date'] 		= empty( $data['date'] ) ? time()-3600: $data['date'];
		$object['title'] 		= empty( $data['title'] ) ? "" : $data['title'];
		$object['content'] 		= empty( $data['content'] ) ? "" : $data['content'];
		$object['fullname'] 	= empty( $data['fullname'] ) ? "" : $data['fullname'];
		$object['email'] 		= empty( $data['email'] ) ? "" : $data['email'];
		$this->db->where('id', $id);
		$this->db->update('feedback', $object); 

		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    return FALSE;
		}
		else
		{
		    $this->db->trans_commit();
		    return TRUE;
		}
	}
	
}