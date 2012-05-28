<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_model extends MY_Model
{
	public function __construct() {
		parent::__construct();
	}
	
	public function get_by_id( $page_id ) {
		$this->db->select('*');
		$this->db->from('page');
		$this->db->join('page_lang', 'id = page_id');
		$this->db->where('page_lang.lang', $this->current_lang_abbr);
		$this->db->where('id', $page_id);
		
		return $this->db->get()->row_array();
	}
	
	public function get_info_page( $page_id = 0){
		
		$this->db->select('*');
		$this->db->from('page');
		$this->db->join('page_lang', 'id = page_id');
		$this->db->where('id', $page_id);
		$result = $this->db->get();
		
		return count($result->result_array()) > 0 ? $result->result_array() : false;
		
	}
	
	/* Admin */
	public function get_page(){
		
		$this->db->select('id, title, active');
		$this->db->from('page');
		$this->db->join('page_lang', 'id = page_id');
		$this->db->where('page_lang.lang', $this->current_lang_abbr);
		
		$result = $this->db->get();
		
		return $result->result_array();
	}
	
	/*
	 * create a page
	 * @param : string
	 * @return true or false
	 */
	public function create_page( $data )
	{
		////START TRANSACTION////
		$this->db->trans_begin();

		//Insert thong tin chung
		$this->db->set('css', 			empty( $data['css'] ) ? "": $data['css']);
		$this->db->set('view', 			empty( $data['view'] ) ? "": $data['view']);
		$this->db->set('master_view', 	empty( $data['master_view'] ) ? "": $data['master_view']);
		$this->db->set('active', 		empty( $data['active'] ) ? 0 : $data['active']);
		$this->db->insert('page'); //do to insert page
		
		//Get last id in table MENU
		$id = $this->db->insert_id();
		
		//Insert thong tin rieng cho tung language
		foreach( $data['lang'] as $item )
		{
			$this->db->set('page_id', 	$id);
			$this->db->set('lang', 		$item['lang']);
			$this->db->set('title', 	$item['title']);
			$this->db->set('content', 		$item['content']);
			$this->db->insert('page_lang'); //do to insert page_lang
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
	 * active or un_active page
	 * @param : (int|array)page_id
	 * @param : string
	 * @return true or false
	 */
	public function active_page( $page_id, $active = 0 )
	{
		if( is_array($page_id) )
		{
			for($item = 0; $item < count($page_id); $item++)
			{
				if($item == 0) $this->db->where('id', $page_id[$item]);
				else $this->db->or_where('id', $page_id[$item]);
			}
		}
		else
		{	
			$this->db->where('id', $page_id);
		}
		
		$data = array(
               		'active' => $active
            	);
			
		$result = $this->db->update('page', $data);
		return $result;
	}
	
	/*
	 * Xoa 1 hoac nhieu page
	 * - Neu xoa thanh cong return TRUE
	 * - Nguoc lai return FASLE
	 * @param : (int|array)page
	 * @return true or false
	 */
	public function delete_page($page_id)
	{
		////START TRANSACTION////
		$this->db->trans_begin();
		
		//DELETE ROW IN "PAGE" TABLE
		if( is_array($page_id) )
		{
			for($item = 0; $item < count($page_id); $item++)
			{
				if($item == 0) $this->db->where('id', $page_id[$item]);
				else $this->db->or_where('id', $page_id[$item]);
			}
		}
		else
		{
			$this->db->where('id', $page_id);
		}
		$this->db->delete('page');
		
		//DELETE ROW IN "PAGE_LANG" TABLE
		if( is_array($page_id) )
		{
			for($item = 0; $item < count($page_id); $item++)
			{
				if($item == 0) $this->db->where('page_id', $page_id[$item]);
				else $this->db->or_where('page_id', $page_id[$item]);
			}
		}
		else
		{
			$this->db->where('page_id', $page_id);
		}
		$this->db->delete('page_lang');
		
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
	 * edit page
	 * @param : string
	 * @return true or false
	 */
	public function edit_page( $data )
	{
		if ( empty($data['id']) ){
			return FALSE;
		}
		////START TRANSACTION////
		$this->db->trans_begin();
		
		$object = array();
		$id = $data['id'];
		//update thong tin chung
		$object['css'] 			= empty( $data['css'] ) ? "": $data['css'];
		$object['view'] 		= empty( $data['view'] ) ? "": $data['view'];
		$object['master_view'] 	= empty( $data['master_view'] ) ? "": $data['master_view'];
		$object['active'] 		= empty( $data['active'] ) ? 0 : $data['active'];
		$this->db->where('id', $id);
		$this->db->update('page', $object); 
		
		//update thong tin rieng cho tung language
		foreach( $data['lang'] as $item )
		{
			$object = array();
			$object['title'] 	= 	empty( $item['title'] ) ? "": $item['title'];
			$object['content'] 	= 	empty( $item['content'] ) ? "": $item['content'];
			$this->db->where('lang', $item['lang']);
			$this->db->where('page_id', $id);
			$this->db->update('page_lang', $object); 
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
	
}