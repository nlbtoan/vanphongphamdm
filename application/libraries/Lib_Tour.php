<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'Lib_Controller.php';

class Lib_Tour extends Lib_Controller
{

	public function __construct() {
		
		parent::__construct();
		
		$this->CI->load->model('tour_model');
		$this->CI->lang->load('tour');
		
	}
	
	/**
	 * create
	 *
	 * @param  array
	 * @return bool
	 **/
	public function create( $data )
	{
		if ($this->CI->tour_model->create( $data ) )
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
	public function delete( $id )
	{
		if ( $this->CI->tour_model->delete( $id ) )
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
	public function edit( $data )
	{
		if ( $this->CI->tour_model->edit( $data ) )
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
	public function active( $id, $active , $field = 'is_enabled')
	{
		if ( $this->CI->tour_model->active($id, $active, $field) )
		{ 
			$this->set_message('active_successfully');
			return TRUE;
		}
		$this->set_message('active_unsuccessfully');
		return FALSE;
	}
	
	//Tour category
	/**
	 * create
	 *
	 * @param  array
	 * @return bool
	 **/
	public function create_cat( $data )
	{
		if ($this->CI->tour_model->create_cat( $data ) )
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
	public function delete_cat( $id )
	{
		if ( $this->CI->tour_model->delete_cat( $id ) )
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
	public function active_cat( $id, $active , $field = 'is_enabled')
	{
		if ( $this->CI->tour_model->active_cat($id, $active, $field) )
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
	public function edit_cat( $data )
	{
		if ( $this->CI->tour_model->edit_cat( $data ) )
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
		if ($this->CI->tour_model->create_book( $data ) )
		{
			$this->set_message('book_successfully');
			return TRUE;
		}

		$this->set_error('book_unsuccessfully');
		return FALSE;
	}
	
	/**
	 * create booking
	 *
	 * @param  array
	 * @return bool
	 **/
	public function create_book_seft( $data )
	{
		if ($this->CI->tour_model->create_book_seft( $data ) )
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
		if ( $this->CI->tour_model->delete_book( $id ) )
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
		if ( $this->CI->tour_model->edit_book( $data ) )
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
	public function active_book( $id, $active , $field = 'is_enabled')
	{
		if ( $this->CI->tour_model->active_book($id, $active, $field) )
		{ 
			$this->set_message('active_successfully');
			return TRUE;
		}
		$this->set_message('active_unsuccessfully');
		return FALSE;
	}
	
	public function saveorder( $id, $order )
	{
		if( is_array($id) && is_array($order) )
		{
			if( count($id) != count($order) ) return FALSE;
			
			$list = array();
			foreach( $id as $k => $item )
			{
				$this->CI->db->select('parent_id');
				$this->CI->db->from('tour_cat');
				$parent = $this->CI->db->where('id', $item)->get()->row_array();
				
				if(! empty($parent) )
				{
					$list[ $parent['parent_id'] ][] = array( 'id' => $item, 'ordering' => $order[$k] );
				}
				
			}
			
			//Sap Xep
			foreach( $list as $parent => $list_item )
			{
				$list[$parent] = $this->order_array_num($list_item, 'ordering');
			}
			
			if ( $this->CI->tour_model->saveorder( $list ) )
			{ 
				return TRUE;
			}
		}//if
		return FALSE;
	}
	
	public function exist_alias( $alias, $lang = "", $id = FALSE )
	{
		if($id) // Xay ra khi update menu item
		{
			if ( $this->CI->tour_model->exist_alias($alias, $lang, $id) )
			{
				$this->set_error('exist_alias|'.$lang);
				return TRUE;
			}
		}
		else if ( $this->CI->tour_model->exist_alias($alias, $lang) )
		{ 
			$this->set_error('exist_alias|'.$lang);
			return TRUE;
		}
		
		return FALSE;
	}
	
	//Region
	/**
	 * create
	 *
	 * @param  array
	 * @return bool
	 **/
	public function create_region( $data )
	{
		if ($this->CI->tour_model->create_region( $data ) )
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
	public function delete_region( $id )
	{
		if ( $this->CI->tour_model->delete_region( $id ) )
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
	public function active_region( $id, $active , $field = 'active')
	{
		if ( $this->CI->tour_model->active_region($id, $active, $field) )
		{ 
			$this->set_message('active_successfully');
			return TRUE;
		}
		$this->set_message('active_unsuccessfully');
		return FALSE;
	}
	
	public function saveorder_region( $id, $order )
	{
		if( is_array($id) && is_array($order) )
		{
			if( count($id) != count($order) ) return FALSE;
			
			$list = array();
			foreach( $id as $k => $item )
			{
				$this->CI->db->select('parent_id');
				$this->CI->db->from('region');
				$parent = $this->CI->db->where('id', $item)->get()->row_array();
				
				if(! empty($parent) )
				{
					$list[ $parent['parent_id'] ][] = array( 'id' => $item, 'ordering' => $order[$k] );
				}
				
			}
			
			//Sap Xep
			foreach( $list as $parent => $list_item )
			{
				$list[$parent] = $this->order_array_num($list_item, 'ordering');
			}
			
			if ( $this->CI->tour_model->saveorder_region( $list ) )
			{ 
				return TRUE;
			}
		}//if
		return FALSE;
	}
	
	/**
	 * edit
	 *
	 * @param int
	 * @return array
	 **/
	public function edit_region( $data )
	{
		if ( $this->CI->tour_model->edit_region( $data ) )
		{ 
			$this->set_message('edit_successfully');
			return TRUE;
		}
		$this->set_error('edit_unsuccessfully');
		return FALSE;
	}
	
	public function exist_region_alias( $alias, $lang = "", $id = FALSE )
	{
		if($id) // Xay ra khi update menu item
		{
			if ( $this->CI->tour_model->exist_region_alias($alias, $lang, $id) )
			{
				$this->set_error('have_alias|'.$lang);
				return TRUE;
			}
		}
		else if ( $this->CI->tour_model->exist_region_alias($alias, $lang) )
		{ 
			$this->set_error('have_alias|'.$lang);
			return TRUE;
		}
		
		return FALSE;
	}
	
	function region_combobox($lang = FALSE, $selected = 0, $current_id = FALSE, $parent_id = 0, $space = '', $first = TRUE) {
		$lang_abbr = ($lang) ? $lang : $this->CI->setting->lang('abbr');
		
		$this->CI->db->select('*');
		$this->CI->db->from('region');
		$this->CI->db->join('region_lang', 'region.id = region_lang.region_id');
		$this->CI->db->order_by('ordering, id');
		$this->CI->db->where('lang', $lang_abbr);
		$this->CI->db->where('active', 1);
		$this->CI->db->where('parent_id', $parent_id);
		
		if($current_id !== FALSE){
			$this->CI->db->where('id !=', $current_id);
		}
		
		$Main_Cbb_Query = $this->CI->db->get()->result_array();
		
		$html_content_combobox = ($first) ? "<option value='0'" . (($selected == 0) ? "selected='selected'" : "") . ">Chọn 1 hoặc nhiều địa điểm</option>" : "";
		
		$symbol = ($first) ? "" : "|-";
		
		//Get Content Main Menu
		foreach($Main_Cbb_Query as $Main_Cbb_Query_Results)
		{
			//Set main data
	        $Main_Cbb_ID        = $Main_Cbb_Query_Results['id'];
	        $Main_Cbb_Name      = $Main_Cbb_Query_Results['name'];
	        $Main_Cbb_Alias      = $Main_Cbb_Query_Results['alias'];

        	//Get Menu Children
        	$html_content_combobox .= "<option value='$Main_Cbb_ID'" . (($selected == $Main_Cbb_ID) ? "selected='selected'" : "") . ">$space $symbol $Main_Cbb_Name ($Main_Cbb_Alias)</option>";
        	$html_content_combobox .= $this->region_combobox($lang_abbr, $selected, $current_id, $Main_Cbb_ID, $space.'&nbsp;&nbsp;&nbsp;', FALSE);
		}

    	return $html_content_combobox;
	}
	
	/**
	 * edit
	 *
	 * @param int
	 * @return array
	 **/
	public function edit_book_seft( $data )
	{
		if ( $this->CI->tour_model->edit_book_seft( $data ) )
		{ 
			$this->set_message('edit_successfully');
			return TRUE;
		}
		$this->set_error('edit_unsuccessfully');
		return FALSE;
	}
}