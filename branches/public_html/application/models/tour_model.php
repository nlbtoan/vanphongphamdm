<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tour_model extends MY_Model{
	
	function __construct(){
		
		parent::__construct();
		
	}
	
	function get_data($select = '*'){

		$this->db->select($select);
		$this->db->from('tour');
		$this->db->join('tour_lang', 'tour.id = tour_lang.tour_id');
		$this->db->where('tour_lang.lang', $this->current_lang_abbr);
                $this->db->where('is_enabled', 1);
		$this->db->order_by('is_hot desc, date desc, id desc');
		$this->db->limit(8);
		$result = $this->db->get();
		
		return $result->result_array();
		
	}

        public function get_data_count_admin($cat_id, &$count = 0, $limit = FALSE, $offset = FALSE)
	{
		$this->db->start_cache();
		$this->db->select('*');
		$this->db->from('tour');
		$this->db->join('tour_lang', 'id = tour_id');
		$this->db->where('lang', $this->current_lang_abbr);
		$this->db->where('tour_cat_id', $cat_id);
				
		$this->db->stop_cache();
		$count = $this->db->get()->num_rows();
		
		if ($limit != FALSE) {
			if ($offset == FALSE) $this->db->limit($limit);
			else $this->db->limit($limit, $offset);
		}
		$this->db->order_by('tour.date desc, tour.id desc');
		
		$return = $this->db->get()->result_array();
		$this->db->flush_cache();

		return $return;
	}
	
	public function get_data_count($cat_id, &$count = 0, $limit = FALSE, $offset = FALSE)
	{
		$this->db->start_cache();
		$this->db->select('*');
		$this->db->from('tour');
		$this->db->join('tour_lang', 'id = tour_id');
		$this->db->where('lang', $this->current_lang_abbr);
		$this->db->where('tour_cat_id', $cat_id);
                $this->db->where('is_enabled', 1);
				
		$this->db->stop_cache();
		$count = $this->db->get()->num_rows();
		
		if ($limit != FALSE) {
			if ($offset == FALSE) $this->db->limit($limit);
			else $this->db->limit($limit, $offset);
		}
		$this->db->order_by('tour.date desc, tour.id desc');
		
		$return = $this->db->get()->result_array();
		$this->db->flush_cache();

		return $return;
	}
	
	function get_data_info( $id = 0 ){
		
		$this->db->select('*');
		$this->db->from('tour');
		$this->db->join('tour_lang', 'tour.id = tour_lang.tour_id');
		$this->db->where('tour.id', $id);
		$result = $this->db->get();
		
		return $result->result_array();
		
	}
	
	function get_title_tour( $id = 0 ){
		$this->db->select('title');
		$this->db->from('tour');
		$this->db->join('tour_lang', 'tour.id = tour_lang.tour_id');
		$this->db->where('tour.id', $id);
		$this->db->where('tour_lang.lang', 'vi');
		$result = $this->db->get();
		return $result->row_array();
	}
	
	function get_data_info_with_lang( $id = 0 ){
		
		$this->db->select('tour.*, tour_lang.*, name_type');
		$this->db->from('tour');
		$this->db->join('tour_lang', 'tour.id = tour_lang.tour_id');
		$this->db->join('tour_cat', 'tour_cat.id = tour.tour_cat_id');
		$this->db->where('tour.id', $id);
		$this->db->where('tour_lang.lang', $this->current_lang_abbr);
		$result = $this->db->get();
		
		return $result->row_array();
		
	}
	
	function get_tour_hot( &$count = 0, $limit = FALSE, $offset = FALSE){
		
		$this->db->start_cache();
		$this->db->select('tour.*, tour_lang.*');
		$this->db->from('tour');
		$this->db->join('tour_lang', 'tour.id = tour_lang.tour_id');
		$this->db->where('tour_lang.lang', $this->current_lang_abbr);
		$this->db->where('tour.is_hot', 1);
				
		$this->db->stop_cache();
		$count = $this->db->get()->num_rows();
		
		if ($limit != FALSE) {
			if ($offset == FALSE) $this->db->limit($limit);
			else $this->db->limit($limit, $offset);
		}
		$this->db->order_by('tour.date desc, tour.id desc');
		
		$return = $this->db->get()->result_array();
		$this->db->flush_cache();

		return $return;
		
	}
	
	function get_tour_package( &$count = 0, $limit = FALSE, $offset = FALSE){
		$this->db->start_cache();
		$this->db->select('tour.*, tour_lang.*');
		$this->db->from('tour');
		$this->db->join('tour_lang', 'tour.id = tour_lang.tour_id');
		$this->db->join('tour_cat', 'tour_cat.id = tour.tour_cat_id');
		$this->db->where('tour_lang.lang', $this->current_lang_abbr);
		$this->db->where('tour_cat.name_type', 'inbound');
				
		$this->db->stop_cache();
		$count = $this->db->get()->num_rows();
		
		if ($limit != FALSE) {
			if ($offset == FALSE) $this->db->limit($limit);
			else $this->db->limit($limit, $offset);
		}
		
		$this->db->order_by('tour.date desc, tour.id desc');
		
		$return = $this->db->get()->result_array();
		$this->db->flush_cache();

		return $return;
	}
	
	function get_tour_daily( &$count = 0, $limit = FALSE, $offset = FALSE){
		$this->db->start_cache();
		$this->db->select('*');
		$this->db->from('tour');
		$this->db->join('tour_lang', 'tour.id = tour_lang.tour_id');
		$this->db->join('tour_cat', 'tour_cat.id = tour.tour_cat_id');
		$this->db->where('tour_lang.lang', $this->current_lang_abbr);
		$this->db->where('tour_cat.name_type', 'outbound');
				
		$this->db->stop_cache();
		$count = $this->db->get()->num_rows();
		
		if ($limit != FALSE) {
			if ($offset == FALSE) $this->db->limit($limit);
			else $this->db->limit($limit, $offset);
		}
		
		$this->db->order_by('tour.date desc, tour.id desc');
		
		$return = $this->db->get()->result_array();
		$this->db->flush_cache();

		return $return;
	}
	
	function get_data_by_cat($cat_id, $select = 'tour.*, tour_lang.*'){

		$this->db->select($select);
		$this->db->from('tour');
		$this->db->join('tour_lang', 'tour.id = tour_lang.tour_id');
		//$this->db->join('tour_cat', 'tour_cat.id = tour_.tour_id');
		$this->db->where('tour_lang.lang', $this->current_lang_abbr);
		$this->db->where('tour_cat_id', $cat_id);
		$this->db->where('tour.is_enabled', 1);
		$this->db->order_by('date desc, id desc');
		
		$result = $this->db->get();
		
		return $result->result_array();
		
	}
		
	/*
	 * create
	 * @param : string
	 * @return true or false
	 */
	public function create( $data )
	{
		////START TRANSACTION////
		$this->db->trans_begin();

		//Insert thong tin chung
		$object = array();
		$object['date'] 		= empty( $data['date'] ) 		? time()-3600	: $data['date'];
		$object['is_enabled'] 	= empty( $data['is_enabled'] ) 	? 0				: $data['is_enabled'];
		$object['tour_cat_id'] 	= empty( $data['tour_cat_id'] ) ? 0				: $data['tour_cat_id'];
		
		$object['is_hot'] 		= empty( $data['is_hot'] ) 		? 0 			: $data['is_hot'];
		$object['file'] 		= $data['file'];
		$object['file_price'] 	= $data['file_price'];
		$object['image'] 		= empty( $data['image'] ) 		? '' : $data['image'];
		$object['list_images'] 	= $data['list_images'];
		
		//do to insert table
		$this->db->insert('tour', $object);
		
		//Get last id in table
		$id = $this->db->insert_id();
		
		//Insert thong tin rieng cho tung language
		foreach( $data['lang'] as $item )
		{
			$object = array();
			$object['tour_id'] 		= $id;
			$object['lang'] 		= empty( $item['lang'] ) 		? $this->current_lang_abbr	: $item['lang'];
			
			$object['title'] 		= empty( $item['title'] ) 		? ''	: $item['title'];
			$object['time_tour'] 	= empty( $item['time_tour'] ) 	? '' 	: $item['time_tour'];
			$price = '';
			$price .= $item['price'].' ';
			$price .= $item['curency'].' ';
			$price .= $object['lang'] == 'vi' ? '/ 1 người' : '/ 1 person';
			$object['price'] 		= $price;
			$object['vehicle'] 		= empty( $item['vehicle'] ) 	? '' 	: $item['vehicle'];
			$object['summary'] 		= empty( $item['summary'] ) 	? '' 	: $item['summary'];
			$object['content'] 		= empty( $item['content'] ) 	? '' 	: $item['content'];
			$object['destination'] 	= empty( $item['destination'] ) ? '' 	: $item['destination'];
			
			//do to insert table_lang
			$this->db->set($object);
			$this->db->insert('tour_lang', $object);
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
	 * active or un_active
	 * @param : (int|array)id
	 * @param : string
	 * @return true or false
	 */
	public function active( $id, $active = 0 , $field = 'is_enabled')
	{
		
		if( is_array($id) )
		{
			for($item = 0; $item < count($id); $item++)
			{
				if($item == 0) $this->db->where('id', $id[$item]);
				else $this->db->or_where('id', $id[$item]);
			}
		}
		else
		{	
			$this->db->where('id', $id);
		}
		
		$data = array(
               		$field => $active
            	);
			
		$result = $this->db->update('tour', $data);
		return $result;
		
	}
	
	/*
	 * Xoa 1 hoac nhieu
	 * - Neu xoa thanh cong return TRUE
	 * - Nguoc lai return FASLE
	 * @param : (int|array)id
	 * @return true or false
	 */
	public function delete($id)
	{
		////START TRANSACTION////
		$this->db->trans_begin();
		
		//DELETE ROW IN TABLE
		if( is_array($id) )
		{
			for($item = 0; $item < count($id); $item++)
			{
				if($item == 0) $this->db->where('id', $id[$item]);
				else $this->db->or_where('id', $id[$item]);
			}
		}
		else
		{
			$this->db->where('id', $id);
		}
		$this->db->delete('tour');
		
		//DELETE ROW IN TABLE_LANG
		if( is_array($id) )
		{
			for($item = 0; $item < count($id); $item++)
			{
				if($item == 0) $this->db->where('tour_id', $id[$item]);
				else $this->db->or_where('tour_id', $id[$item]);
			}
		}
		else
		{
			$this->db->where('tour_id', $id);
		}
		$this->db->delete('tour_lang');
		
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
	 * edit
	 * @param : string
	 * @return true or false
	 */
	public function edit( $data )
	{
		if ( empty($data['id']) ){
			return FALSE;
		}
		////START TRANSACTION////
		$this->db->trans_begin();
		
		$id = $data['id'];
		
		//update thong tin chung
		$object = array();
		//$object['date'] 		= empty( $data['date'] ) 		? time()-3600	: $data['date'];
		$object['is_enabled'] 	= empty( $data['is_enabled'] ) 	? 0				: $data['is_enabled'];
		$object['tour_cat_id'] 	= empty( $data['tour_cat_id'] ) ? 0				: $data['tour_cat_id'];
		
		$object['is_hot'] 		= empty( $data['is_hot'] ) 		? 0 			: $data['is_hot'];
		$object['file'] 		= $data['file'];
		$object['file_price'] 	= $data['file_price'];
		$object['image'] 		= empty( $data['image'] ) 		? '' : $data['image'];
		$object['list_images'] 	= $data['list_images'];
		
		$this->db->where('id', $id);
		$this->db->update('tour', $object); 
		
		//update thong tin rieng cho tung language
		foreach( $data['lang'] as $item )
		{
			$object = array();
			$object['title'] 		= empty( $item['title'] ) 		? ''	: $item['title'];
			$object['time_tour'] 	= empty( $item['time_tour'] ) 	? '' 	: $item['time_tour'];
			$object['price'] 		= empty( $item['price'] ) 		? '' 	: $item['price'];
			$object['vehicle'] 		= empty( $item['vehicle'] ) 	? '' 	: $item['vehicle'];
			$object['summary'] 		= empty( $item['summary'] ) 	? '' 	: $item['summary'];
			$object['content'] 		= empty( $item['content'] ) 	? '' 	: $item['content'];
			$object['destination'] 	= empty( $item['destination'] ) ? '' 	: $item['destination'];
			
			$this->db->where('lang', empty( $item['lang'] ) ? $this->current_lang_abbr : $item['lang']);
			$this->db->where('tour_id', $id);
			$this->db->update('tour_lang', $object); 
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
	
	// Tour category
	
	function get_cat_data(){

		$this->db->select('id, name');
		$this->db->from('tour_cat');
		$this->db->join('tour_cat_lang', 'tour_cat.id = tour_cat_lang.tour_cat_id');
		$this->db->where('tour_cat_lang.lang', $this->current_lang_abbr);
		//$this->db->order_by('date desc, id desc');
		
		$result = $this->db->get();
		
		return $result->result_array();
		
	}
	
	public function get_cat_data_count( &$count = 0, $limit = FALSE, $offset = FALSE)
	{
		$this->db->select('*');
		$this->db->from('tour_cat');
		$this->db->join('tour_cat_lang', 'id = tour_cat_id');
		$this->db->where('lang', $this->current_lang_abbr);
		$this->db->where('parent_id', 0);
		$this->db->order_by('ordering, id');
		
		$parent = $this->db->get()->result_array();
		
		//Khoi tao stack
		$k = 0;
		$level = 0;
		$stack['lv'.$level] = array('data' => $parent, '_key' => $k);
		
		$result = array();
		
		while(! empty($stack) )
		{
			if( $k == count($stack['lv'.$level]['data']) )
			{
				unset( $stack['lv'.$level] );
				$level --;
				
				if( empty($stack) ) break;
				else $k = $stack['lv'.$level]['_key'];
			}
			else{
				$data_item = $stack['lv'.$level]['data'][$k];
				$data_item['count'] = $this->count_tour_by_cat($data_item['id']);
				$result[] = array('lv' => $level, 'data' => $data_item);
				
				//Lay children
				$this->db->select('*');
				$this->db->from('tour_cat');
				$this->db->join('tour_cat_lang', 'id = tour_cat_id');
				$this->db->where('lang', $this->current_lang_abbr);
				$this->db->where('parent_id', $data_item['id']);
				$this->db->order_by('ordering, id');
				
				$child = $this->db->get()->result_array();
				$k ++;
				
				//Kiem tra xem children co khong ?
				if( count($child) > 0)
				{
					//Luu key hien tai vao ['_key']
					$stack['lv'.$level]['_key'] = $k;
					//Gan children vo stack
					$k = 0;
					$level ++;
					$stack['lv'.$level] = array('data' => $child, '_key' => $k);
				}
			}
		}
		
		$count = count($result);
		
		$result_limit = array();
		if ($limit != FALSE) {
			if ($offset == FALSE) $offset = 0;
			//else $offset --;
			
			for($i = $offset; $i < $count && $i < ($offset + $limit); $i++ )
			{
				$result_limit[] = $result[$i];
			}
			return $result_limit;
		}
		
		return $result;
	}
	
	public function count_tour_by_cat($id = 0)
	{
		$this->db->select('id');
		$this->db->from('tour');
		$this->db->where('tour_cat_id', $id);
		$count = $this->db->get()->num_rows();
		if($count === 0) $count = '-';
		return $count;
	}
	
	public function get_cat_data_count_no_paging()
	{
		$this->db->select('*');
		$this->db->from('tour_cat');
		$this->db->join('tour_cat_lang', 'id = tour_cat_id');
		$this->db->where('lang', $this->current_lang_abbr);
		$this->db->where('parent_id', 0);
		$this->db->order_by('ordering, id');
		
		$parent = $this->db->get()->result_array();
		
		//Khoi tao stack
		$k = 0;
		$level = 0;
		$stack['lv'.$level] = array('data' => $parent, '_key' => $k);
		
		$result = array();
		
		while(! empty($stack) )
		{
			if( $k == count($stack['lv'.$level]['data']) )
			{
				unset( $stack['lv'.$level] );
				$level --;
				
				if( empty($stack) ) break;
				else $k = $stack['lv'.$level]['_key'];
			}
			else{
				$data_item = $stack['lv'.$level]['data'][$k];
				$result[] = array('lv' => $level, 'data' => $data_item);
				
				//Lay children
				$this->db->select('*');
				$this->db->from('tour_cat');
				$this->db->join('tour_cat_lang', 'id = tour_cat_id');
				$this->db->where('lang', $this->current_lang_abbr);
				$this->db->where('parent_id', $data_item['id']);
				$this->db->order_by('ordering, id');
				
				$child = $this->db->get()->result_array();
				$k ++;
				
				//Kiem tra xem children co khong ?
				if( count($child) > 0)
				{
					//Luu key hien tai vao ['_key']
					$stack['lv'.$level]['_key'] = $k;
					//Gan children vo stack
					$k = 0;
					$level ++;
					$stack['lv'.$level] = array('data' => $child, '_key' => $k);
				}
			}
		}
		
		return $result;
	}
	
	function get_cat_data_info( $id = 0){
		
		$this->db->select('*');
		$this->db->from('tour_cat');
		$this->db->join('tour_cat_lang', 'id = tour_cat_id');
		$this->db->where('id', $id);
		$this->db->where('lang', $this->current_lang_abbr);
		$result = $this->db->get();
		
		return $result->row_array();
		
	}
	
	function get_cat_data_info_admin( $id = 0){
		
		$this->db->select('*');
		$this->db->from('tour_cat');
		$this->db->join('tour_cat_lang', 'id = tour_cat_id');
		$this->db->where('id', $id);
		$result = $this->db->get();
		
		return $result->result_array();
		
	}
	
	/*
	 * create
	 * @param : string
	 * @return true or false
	 */
	public function create_cat( $data )
	{
		////START TRANSACTION////
		$this->db->trans_begin();
		
		//Lay ordering
					$this->db->select('max(ordering) as ordering');
					$this->db->from('tour_cat');
		$ordering = $this->db->where('parent_id', $data['parent_id'])->get()->row_array();
		
		if( $ordering ) $data['ordering'] = $ordering['ordering'] + 1;
		else $data['ordering'] = 1;
		
		
		//Insert thong tin chung
		$object = array();
		if($data['parent_id'] != 0)
		{//Lay nametype cat_parent
						  $this->db->select('name_type');
			  			  $this->db->from('tour_cat');
			$name_type  = $this->db->where('id', $data['parent_id'])->get()->row_array();
			$object['name_type'] = $name_type['name_type'];
		}
		
		$object['is_enabled'] 	= $data['is_enabled'];
		$object['ordering'] 	= $data['ordering'];
		$object['parent_id'] 	= $data['parent_id'];
		
		//do to insert table
		$this->db->insert('tour_cat', $object);
		
		//Get last id in table
		$id = $this->db->insert_id();
		
		//Insert thong tin rieng cho tung language
		foreach( $data['lang'] as $item )
		{
			$object = array();
			$object['tour_cat_id'] 		= $id;
			$object['lang'] 			= $item['lang'];
			$object['name'] 			= $item['name'];
			$object['alias'] 			= $item['alias'];


			//do to insert table_lang
			$this->db->set($object);
			$this->db->insert('tour_cat_lang', $object);
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
	 * active or un_active
	 * @param : (int|array)id
	 * @param : string
	 * @return true or false
	 */
	public function active_cat( $id, $active = 0 , $field = 'is_enabled')
	{

		if( is_array($id) )
		{
			for($item = 0; $item < count($id); $item++)
			{
				if($item == 0) $this->db->where('id', $id[$item]);
				else $this->db->or_where('id', $id[$item]);
			}
		}
		else
		{	
			$this->db->where('id', $id);
		}
		
		$data = array(
               		$field => $active
            	);
			
		$result = $this->db->update('tour_cat', $data);
		return $result;
		
	}
	
	/*
	 * Xoa 1 hoac nhieu
	 * - Neu xoa thanh cong return TRUE
	 * - Nguoc lai return FASLE
	 * @param : (int|array)id
	 * @return true or false
	 */
	public function delete_cat($id)
	{
		////START TRANSACTION////
		$this->db->trans_begin();
		
		//DELETE ROW IN TABLE
		if( is_array($id) )
		{
			for($item = 0; $item < count($id); $item++)
			{
				if($item == 0) $this->db->where('id', $id[$item]);
				else $this->db->or_where('id', $id[$item]);
			}
		}
		else
		{
			$this->db->where('id', $id);
		}
		$this->db->delete('tour_cat');
		
		//DELETE ROW IN TABLE_LANG
		if( is_array($id) )
		{
			for($item = 0; $item < count($id); $item++)
			{
				if($item == 0) $this->db->where('tour_cat_id', $id[$item]);
				else $this->db->or_where('tour_cat_id', $id[$item]);
			}
		}
		else
		{
			$this->db->where('tour_cat_id', $id);
		}
		$this->db->delete('tour_cat_lang');
		
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
	
	public function edit_cat( $data )
	{
		if ( empty($data['id']) ){
			return FALSE;
		}
		////START TRANSACTION////
		$this->db->trans_begin();
		
		$id = $data['id'];
		
		//update thong tin chung
		$object = array();
		$object['is_enabled'] 	= $data['is_enabled'];
		$object['ordering'] 	= $data['ordering'];
		$object['parent_id'] 	= $data['parent_id'];
		
		$this->db->where('id', $id);
		$this->db->update('tour_cat', $object); 
		
		//update thong tin rieng cho tung language
		foreach( $data['lang'] as $item )
		{
			$object = array();
			$object['name'] 	= $item['name'];
			$object['alias'] 	= $item['alias'];
			
			$this->db->where('lang', empty( $item['lang'] ) ? $this->current_lang_abbr : $item['lang']);
			$this->db->where('tour_cat_id', $id);
			$this->db->update('tour_cat_lang', $object); 
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
	
	//Book tour
	
	function get_data_book($select = 'tour_book.*'){

		$this->db->select($select);
		$this->db->from('tour_book');
		//$this->db->join('tour', 'tour.id = tour_book.tour_id');
		//$this->db->where('tour_lang.lang', $this->current_lang_abbr);
		$this->db->where('tour_book.id', '<> 0');
		$this->db->order_by('tour_book.date desc, tour_book.id desc');
		
		$result = $this->db->get();
		
		return $result->result_array();
		
	}
	
    public function get_data_book_count( &$count = 0, $limit = FALSE, $offset = FALSE)
	{
		$this->db->start_cache();
		$this->db->select('tour_book.*');
		$this->db->from('tour_book');
		$this->db->where('tour_book.tour_id <>', '0');
		//$this->db->join('tour', 'tour.id = tour_book.tour_id');
		//$this->db->where('tour_lang.lang', $this->current_lang_abbr);
				
		$this->db->stop_cache();
		$count = $this->db->get()->num_rows();
		
		if ($limit != FALSE) {
			if ($offset == FALSE) $this->db->limit($limit);
			else $this->db->limit($limit, $offset);
		}
		$this->db->order_by('tour_book.date desc, tour_book.id desc');
		
		$return = $this->db->get()->result_array();
		$this->db->flush_cache();

		return $return;
	}
	
 	function get_data_book_info($id){

		$this->db->select('tour_book.*, tour.tour_cat_id, tour_cat.name_type');
		$this->db->from('tour_book');
		$this->db->join('tour', 'tour.id = tour_book.tour_id');
		$this->db->join('tour_cat', 'tour_cat.id = tour.tour_cat_id');
		$this->db->where('tour_book.id', $id);
		
		$result = $this->db->get();
		
		return $result->row_array();
		
	}
	
	function get_list_person( $book_id ){
		$this->db->select('*');
		$this->db->from('tour_book_detail');
		$this->db->where('tour_book_id', $book_id);
		$result = $this->db->get();
		return $result->result_array();
	}
	
	/*
	 * create book
	 * @param : string
	 * @return true or false
	 */
	public function create_book( $data )
	{
		////START TRANSACTION////
		$this->db->trans_begin();
		
		//Insert thong tin chung
		$object = array(  
					'fullname' 		=> $data['fullname'],
					'total_person' 	=> $data['total_person'],	
					'address' 		=> $data['address'],	
					'phone' 		=> $data['phone'],	
					'email' 		=> $data['email'],
					'nation' 		=> $data['nation'],	
					'company' 		=> $data['company'],
					'tax_code' 		=> $data['tax_code'],		
					'date_start' 	=> $data['date_start'],
					'adult' 		=> $data['adult'],
					'child' 		=> $data['child'],	
					'baby' 			=> $data['baby'],
					'other_requirement' => $data['other_requirement'],		
					'payment_method' 	=> $data['payment_method'],		
					'tour_id' 		=> $data['tour_id'],
					'is_read' 		=> 0,
					'is_checked' 	=> 0,
					'date' 			=> time() - 3600
					);
					
		//Get last id in table
		$this->db->insert('tour_book', $object);
		
		$id = $this->db->insert_id();
		
		$total_person = 0;
		foreach( $data['list_name'] as $key=>$item ){
			if ( !empty($item) ){
				$object = array( 
						'name' 			=> $item,
						'birthday' 		=> strtotime($data['list_birthday'][$key]), 
						'sex' 			=> $data['list_sex'][$key], 
						'age' 			=> $data['list_age'][$key], 
						'single_room' 	=> $data['list_single_room'][$key],
				
						'address'		=> !empty($data['list_address']) ? $data['list_address'][$key] : "",
						'customer_based'=> !empty($data['list_customer_based']) ? $data['list_customer_based'][$key] : 0,		
				
						'date_issue'	=> !empty($data['list_date_issue']) ? strtotime($data['list_date_issue'][$key]) : 0,
						'date_expiry'	=> !empty($data['list_date_expiry']) ? strtotime($data['list_date_expiry'][$key]) : 0,
						'passport'		=> !empty($data['list_passport']) ? $data['list_passport'][$key] : "", 
						
						'tour_book_id' => $id 
						);
				$this->db->insert('tour_book_detail', $object);
				$total_person = $key;
			}
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
	 * create book
	 * @param : string
	 * @return true or false
	 */
	public function create_book_seft( $data )
	{
		////START TRANSACTION////
		$this->db->trans_begin();
		
		//Insert thong tin chung
		$object = array(  
					'fullname' 		=> $data['fullname'],
					'phone' 		=> $data['phone'],	
					'email' 		=> $data['email'],
					
					'address' 		=> $data['address'],	
					'company' 		=> $data['company'],
					'tax_code' 		=> $data['tax_code'],
				
					'date_start' 	=> $data['date_start'],
					'date_end' 		=> $data['date_end'],
					'place_visit' 	=> $data['place_visit'],
					'place_other' 	=> $data['place_other'],
					
					'total_person' 	=> $data['total_person'],	
					'adult' 		=> $data['adult'],
					'child' 		=> $data['child'],	
					'baby' 			=> $data['baby'],
					
					'single_room'	=> $data['single_room'],
					'double_room'	=> $data['double_room'],
					'family_room'	=> $data['family_room'],
					'transport'		=> $data['transport'],
					'other_requirement' => $data['other_requirement'],		
					'payment_method' 	=> $data['payment_method'],		
					
					'tour_id' 		=> 0,
					'is_read' 		=> 0,
					'is_checked' 	=> 0,
					'date' 			=> time() - 3600
					);
					
		//Get last id in table
		$this->db->insert('tour_book', $object);
		
		$id = $this->db->insert_id();
		
		$total_person = 0;
		foreach( $data['list_name'] as $key=>$item ){
			if ( !empty($item) ){
				$object = array( 
						'name' 			=> $item,
						'birthday' 		=> strtotime($data['list_birthday'][$key]), 
						'sex' 			=> $data['list_sex'][$key], 
						'age' 			=> $data['list_age'][$key], 
						'single_room' 	=> $data['list_single_room'][$key],
				
						'address'		=> !empty($data['list_address']) ? $data['list_address'][$key] : "",
						'customer_based'=> !empty($data['list_customer_based']) ? $data['list_customer_based'][$key] : 0,		
				
						'date_issue'	=> !empty($data['list_date_issue']) ? strtotime($data['list_date_issue'][$key]) : 0,
						'date_expiry'	=> !empty($data['list_date_expiry']) ? strtotime($data['list_date_expiry'][$key]) : 0,
						'passport'		=> !empty($data['list_passport']) ? $data['list_passport'][$key] : "", 
						
						'tour_book_id' => $id 
						);
				$this->db->insert('tour_book_detail', $object);
				$total_person = $key;
			}
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
	 * active or un_active
	 * @param : (int|array)id
	 * @param : string
	 * @return true or false
	 */
	public function active_book( $id, $active = 0 , $field = 'is_enabled')
	{
		
		if( is_array($id) )
		{
			for($item = 0; $item < count($id); $item++)
			{
				if($item == 0) $this->db->where('id', $id[$item]);
				else $this->db->or_where('id', $id[$item]);
			}
		}
		else
		{	
			$this->db->where('id', $id);
		}
		
		
		$data = array(
               		$field => $active
            	);
			
		$result = $this->db->update('tour_book', $data);
		
		return $result;
		
	}
	
	/*
	 * Xoa 1 hoac nhieu
	 * - Neu xoa thanh cong return TRUE
	 * - Nguoc lai return FASLE
	 * @param : (int|array)id
	 * @return true or false
	 */
	public function delete_book($id)
	{
		////START TRANSACTION////
		$this->db->trans_begin();
		
		//DELETE ROW IN TABLE
		if( is_array($id) )
		{
			for($item = 0; $item < count($id); $item++)
			{
				if($item == 0) $this->db->where('id', $id[$item]);
				else $this->db->or_where('id', $id[$item]);
			}
		}
		else
		{
			$this->db->where('id', $id);
		}
		$this->db->delete('tour_book');
		
		
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
	 * edit
	 * @param : string
	 * @return true or false
	 */
	public function edit_book( $data )
	{
		if ( empty($data['id']) ){
			return FALSE;
		}
		////START TRANSACTION////
		$this->db->trans_begin();
		
		$id = $data['id'];
		
		//update thong tin chung
		$object = array(  
					'fullname' 		=> $data['fullname'],
					'total_person' 	=> $data['total_person'],	
					'address' 		=> $data['address'],	
					'phone' 		=> $data['phone'],	
					'email' 		=> $data['email'],
					'nation' 		=> $data['nation'],	
					'company' 		=> $data['company'],
					'tax_code' 		=> $data['tax_code'],		
					'date_start' 	=> $data['date_start'],
					'adult' 		=> $data['adult'],
					'child' 		=> $data['child'],	
					'baby' 			=> $data['baby'],
					'other_requirement' => $data['other_requirement'],		
					'payment_method' 	=> $data['payment_method'],		
					'tour_id' 		=> $data['tour_id'],
					'is_checked' 	=> $data['is_checked']
					);
		
		$this->db->where('id', $id);
		$this->db->update('tour_book', $object);
		
		
		//update list person
		if ( !empty($data['list_id']) ){
			foreach( $data['list_id'] as $key=>$item ){
				if ( !empty($item) ){ 
					$object = array(  
						
						'name' 			=> $data['list_name'][$key],
						'birthday' 		=> !empty($data['list_birthday'][$key]) ? strtotime($data['list_birthday'][$key]) : 0,
						'sex' 			=> $data['list_sex'][$key],
						'age' 			=> $data['list_age'][$key],
						'single_room' 	=> $data['list_single_room'][$key],
					
						'address' 		=> !empty($data['list_address']) ? $data['list_address'][$key] : "",
						'customer_based'=> !empty($data['list_customer_based']) ? $data['list_customer_based'][$key] : 0,		
				
						'date_issue'	=> !empty($data['list_date_issue']) ? strtotime($data['list_date_issue'][$key]) : 0,
						'date_expiry'	=> !empty($data['list_date_expiry']) ? strtotime($data['list_date_expiry'][$key]) : 0,
						'passport'		=> !empty($data['list_passport']) ? $data['list_passport'][$key] : ""
					
						);
					$this->db->where('id', $item);
					$this->db->update('tour_book_detail', $object);
				}
			}
		}
		
		//insert list person
		if ( !empty($data['list_name_i']) ){
			foreach( $data['list_name_i'] as $key=>$item ){
				if ( !empty($item) ){
					$object = array(  
						
						'name' 			=> $item,
						'birthday' 		=> !empty($data['list_birthday_i'][$key]) ? strtotime($data['list_birthday_i'][$key]) : 0,
						'sex' 			=> $data['list_sex_i'][$key],
						'age' 			=> $data['list_age_i'][$key],
						'single_room' 	=> $data['list_single_room_i'][$key],
					
						'address' 		=> !empty($data['list_address_i']) ? $data['list_address_i'][$key] : "",
						'customer_based'=> !empty($data['list_customer_based_i']) ? $data['list_customer_based_i'][$key] : 0,		
				
						'date_issue'	=> !empty($data['list_date_issue_i']) ? strtotime($data['list_date_issue_i'][$key]) : 0,
						'date_expiry'	=> !empty($data['list_date_expiry_i']) ? strtotime($data['list_date_expiry_i'][$key]) : 0,
						'passport'		=> !empty($data['list_passport_i']) ? $data['list_passport_i'][$key] : "",
					
						'tour_book_id'	=> $id
						);
					
					$this->db->insert('tour_book_detail', $object);
				}			
			}	
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
	
	function delete_book_detail( $id_book_detail ){
		$this->db->where('id', $id_book_detail);
		$this->db->delete('tour_book_detail');
	}
	
	function update_person($data){
		
		$id = $data['id'];
		
		$object = array(
					'total_person' 	=> $data['total_person'],	
					'adult' 		=> $data['adult'],	
					'child' 		=> $data['child'],	
					'baby' 			=> $data['baby'],
					);
					
		$this->db->where('id', $id);
		$this->db->update('tour_book', $object);
		
	}
	
/*
	 * set save order
	 * @param : array(int)
	 * @return true or false
	 */
	public function saveorder( $list = array() )
	{
		if(! is_array($list) && empty($list) ) return FALSE;
		
		////START TRANSACTION////
		$this->db->trans_begin();
		//Update
		foreach( $list as $parent => $list_item )
		{
			$ordering = 1;
			foreach($list[$parent] as $item)
			{
				$this->db->where('id', $item['id']);
				$data = array(
	               			'ordering' => $ordering
	            		);
				$this->db->update('tour_cat', $data);
				
				$ordering ++;
			}
		}
		
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
	
	public function exist_alias($alias, $lang = "", $id = FALSE)
	{
		$this->db->select('count(tour_cat_id) as num');
		$this->db->from('tour_cat_lang');
		$this->db->where('lang', $lang);
		
		if($id)
		{
			$this->db->where('id !=', $id);
		}
		
		$result = $this->db->where('alias', $alias)->get()->row_array();
		
		if($result['num'] == 1) return TRUE;
		
		return FALSE;
	}
	
	// region
	public function get_region_info( $id = false ){
		
		$this->db->select('*');
		$this->db->from('region');
		$this->db->join('region_lang', 'region.id = region_lang.region_id');
		if( is_array($id) )
		{
			for($item = 0; $item < count($id); $item++)
			{
				if($item == 0) $this->db->where('region.id', $id[$item]);
				else $this->db->or_where('region.id', $id[$item]);
			}
		}
		else
		{
			$this->db->where('region.id', $id);
		}
		
		$result = $this->db->get();
		
		return $result->result_array();		
	}
	
	public function get_region_count( &$count = 0, $limit = FALSE, $offset = FALSE)
	{
		$this->db->select('*');
		$this->db->from('region');
		$this->db->join('region_lang', 'id = region_id');
		$this->db->where('lang', $this->current_lang_abbr);
		$this->db->where('parent_id', 0);
		$this->db->order_by('ordering, id');
		
		$parent = $this->db->get()->result_array();
		
		//Khoi tao stack
		$k = 0;
		$level = 0;
		$stack['lv'.$level] = array('data' => $parent, '_key' => $k);
		
		$result = array();
		
		while(! empty($stack) )
		{
			if( $k == count($stack['lv'.$level]['data']) )
			{
				unset( $stack['lv'.$level] );
				$level --;
				
				if( empty($stack) ) break;
				else $k = $stack['lv'.$level]['_key'];
			}
			else{
				$data_item = $stack['lv'.$level]['data'][$k];
				$result[] = array('lv' => $level, 'data' => $data_item);
				
				//Lay children
				$this->db->select('*');
				$this->db->from('region');
				$this->db->join('region_lang', 'id = region_id');
				$this->db->where('lang', $this->current_lang_abbr);
				$this->db->where('parent_id', $data_item['id']);
				$this->db->order_by('ordering, id');
				
				$child = $this->db->get()->result_array();
				$k ++;
				
				//Kiem tra xem children co khong ?
				if( count($child) > 0)
				{
					//Luu key hien tai vao ['_key']
					$stack['lv'.$level]['_key'] = $k;
					//Gan children vo stack
					$k = 0;
					$level ++;
					$stack['lv'.$level] = array('data' => $child, '_key' => $k);
				}
			}
		}
		
		$count = count($result);
		
		$result_limit = array();
		if ($limit != FALSE) {
			if ($offset == FALSE) $offset = 0;
			//else $offset --;
			
			for($i = $offset; $i < $count && $i < ($offset + $limit); $i++ )
			{
				$result_limit[] = $result[$i];
			}
			return $result_limit;
		}
		
		return $result;
	}
	
	/*
	 * create
	 * @param : string
	 * @return true or false
	 */
	public function create_region( $data )
	{
		////START TRANSACTION////
		$this->db->trans_begin();
		
		//Lay ordering
		$this->db->select('max(ordering) as ordering');
		$this->db->from('region');
		$ordering = $this->db->where('parent_id', $data['parent_id'])->get()->row_array();
		
		if( $ordering ) $data['ordering'] = $ordering['ordering'] + 1;
		else $data['ordering'] = 1;

		//Insert thong tin chung
		$object = array();
		$object['active'] 		= $data['is_enabled'];
		$object['ordering'] 	= $data['ordering'];
		$object['parent_id'] 	= $data['parent_id'];
		
		//do to insert table
		$this->db->insert('region', $object);
		
		//Get last id in table
		$id = $this->db->insert_id();
		
		//Insert thong tin rieng cho tung language
		foreach( $data['lang'] as $item )
		{
			$object = array();
			$object['region_id'] 		= $id;
			$object['lang'] 			= $item['lang'];
			$object['name'] 			= $item['name'];
			$object['alias'] 			= $item['alias'];


			//do to insert table_lang
			$this->db->set($object);
			$this->db->insert('region_lang', $object);
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
	 * active or un_active
	 * @param : (int|array)id
	 * @param : string
	 * @return true or false
	 */
	public function active_region( $id, $active = 0 , $field = 'active')
	{

		if( is_array($id) )
		{
			for($item = 0; $item < count($id); $item++)
			{
				if($item == 0) $this->db->where('id', $id[$item]);
				else $this->db->or_where('id', $id[$item]);
			}
		}
		else
		{	
			$this->db->where('id', $id);
		}
		
		$data = array(
               		$field => $active
            	);
			
		$result = $this->db->update('region', $data);
		return $result;
		
	}
	
	/*
	 * Xoa 1 hoac nhieu
	 * - Neu xoa thanh cong return TRUE
	 * - Nguoc lai return FASLE
	 * @param : (int|array)id
	 * @return true or false
	 */
	public function delete_region($id)
	{
		////START TRANSACTION////
		$this->db->trans_begin();
		
		//DELETE ROW IN TABLE
		if( is_array($id) )
		{
			for($item = 0; $item < count($id); $item++)
			{
				if($item == 0) $this->db->where('id', $id[$item]);
				else $this->db->or_where('id', $id[$item]);
			}
		}
		else
		{
			$this->db->where('id', $id);
		}
		$this->db->delete('region');
		
		//DELETE ROW IN TABLE_LANG
		if( is_array($id) )
		{
			for($item = 0; $item < count($id); $item++)
			{
				if($item == 0) $this->db->where('region_id', $id[$item]);
				else $this->db->or_where('region_id', $id[$item]);
			}
		}
		else
		{
			$this->db->where('region_id', $id);
		}
		$this->db->delete('region_lang');
		
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
	
	public function edit_region( $data )
	{
		if ( empty($data['id']) ){
			return FALSE;
		}
		////START TRANSACTION////
		$this->db->trans_begin();
		
		$id = $data['id'];
		
		//update thong tin chung
		$object = array();
		$object['active'] 		= $data['is_enabled'];
		$object['ordering'] 	= $data['ordering'];
		$object['parent_id'] 	= $data['parent_id'];
		
		$this->db->where('id', $id);
		$this->db->update('region', $object); 
		
		//update thong tin rieng cho tung language
		foreach( $data['lang'] as $item )
		{
			$object = array();
			$object['name'] 	= $item['name'];
			$object['alias'] 	= $item['alias'];
			
			$this->db->where('lang', empty( $item['lang'] ) ? $this->current_lang_abbr : $item['lang']);
			$this->db->where('region_id', $id);
			$this->db->update('region_lang', $object); 
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
	
	public function saveorder_region( $list = array() )
	{
		if(! is_array($list) && empty($list) ) return FALSE;
		
		////START TRANSACTION////
		$this->db->trans_begin();
		//Update
		foreach( $list as $parent => $list_item )
		{
			$ordering = 1;
			foreach($list[$parent] as $item)
			{
				$this->db->where('id', $item['id']);
				$data = array(
	               			'ordering' => $ordering
	            		);
				$this->db->update('region', $data);
				
				$ordering ++;
			}
		}
		
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
	
	public function exist_region_alias($alias, $lang = "", $id = FALSE)
	{
		$this->db->select('count(region_id) as num');
		$this->db->from('region_lang');
		$this->db->where('lang', $lang);
		
		if($id)
		{
			$this->db->where('id !=', $id);
		}
		
		$result = $this->db->where('alias', $alias)->get()->row_array();
		
		if($result['num'] == 1) return TRUE;
		
		return FALSE;
	}
	
 	public function get_data_book_seft_count( &$count = 0, $limit = FALSE, $offset = FALSE)
	{
		$this->db->start_cache();
		$this->db->select('tour_book.*');
		$this->db->from('tour_book');
		$this->db->where('tour_book.tour_id', '0');
		//$this->db->join('tour', 'tour.id = tour_book.tour_id');
		//$this->db->where('tour_lang.lang', $this->current_lang_abbr);
				
		$this->db->stop_cache();
		$count = $this->db->get()->num_rows();
		
		if ($limit != FALSE) {
			if ($offset == FALSE) $this->db->limit($limit);
			else $this->db->limit($limit, $offset);
		}
		$this->db->order_by('tour_book.date desc, tour_book.id desc');
		
		$return = $this->db->get()->result_array();
		$this->db->flush_cache();

		return $return;
	}
	
	function get_data_book_seft_info($id){

		$this->db->select('tour_book.*');
		$this->db->from('tour_book');
		$this->db->where('tour_book.id', $id);
		
		$result = $this->db->get();
		
		return $result->row_array();
		
	}
	
	/*
	 * edit
	 * @param : string
	 * @return true or false
	 */
	public function edit_book_seft( $data )
	{
		if ( empty($data['id']) ){
			return FALSE;
		}
		////START TRANSACTION////
		$this->db->trans_begin();
		
		$id = $data['id'];
		
		//update thong tin chung
		$object = array(  
					'fullname' 		=> $data['fullname'],
					'phone' 		=> $data['phone'],	
					'email' 		=> $data['email'],
					
					'address' 		=> $data['address'],	
					'company' 		=> $data['company'],
					'tax_code' 		=> $data['tax_code'],
				
					'date_start' 	=> $data['date_start'],
					'date_end' 		=> $data['date_end'],
					'place_visit' 	=> $data['place_visit'],
					'place_other' 	=> $data['place_other'],
					
					'total_person' 	=> $data['total_person'],	
					'adult' 		=> $data['adult'],
					'child' 		=> $data['child'],	
					'baby' 			=> $data['baby'],
					
					'single_room'	=> $data['single_room'],
					'double_room'	=> $data['double_room'],
					'family_room'	=> $data['family_room'],
					'transport'		=> $data['transport'],
					'other_requirement' => $data['other_requirement'],		
					'payment_method' 	=> $data['payment_method'],
		
					'is_checked' 	=> $data['is_checked']
					);
		
		$this->db->where('id', $id);
		$this->db->update('tour_book', $object);
		
		
		//update list person
		if ( !empty($data['list_id']) ){
			foreach( $data['list_id'] as $key=>$item ){
				if ( !empty($item) ){ 
					$object = array(  
						
						'name' 			=> $data['list_name'][$key],
						'birthday' 		=> !empty($data['list_birthday'][$key]) ? strtotime($data['list_birthday'][$key]) : 0,
						'sex' 			=> $data['list_sex'][$key],
						'age' 			=> $data['list_age'][$key],
						'single_room' 	=> $data['list_single_room'][$key],
					
						'address' 		=> !empty($data['list_address']) ? $data['list_address'][$key] : "",
						'customer_based'=> !empty($data['list_customer_based']) ? $data['list_customer_based'][$key] : 0,		
				
						'date_issue'	=> !empty($data['list_date_issue']) ? strtotime($data['list_date_issue'][$key]) : 0,
						'date_expiry'	=> !empty($data['list_date_expiry']) ? strtotime($data['list_date_expiry'][$key]) : 0,
						'passport'		=> !empty($data['list_passport']) ? $data['list_passport'][$key] : ""
					
						);
					$this->db->where('id', $item);
					$this->db->update('tour_book_detail', $object);
				}
			}
		}
		
		//insert list person
		if ( !empty($data['list_name_i']) ){
			foreach( $data['list_name_i'] as $key=>$item ){
				if ( !empty($item) ){
					$object = array(  
						
						'name' 			=> $item,
						'birthday' 		=> !empty($data['list_birthday_i'][$key]) ? strtotime($data['list_birthday_i'][$key]) : 0,
						'sex' 			=> $data['list_sex_i'][$key],
						'age' 			=> $data['list_age_i'][$key],
						'single_room' 	=> $data['list_single_room_i'][$key],
					
						'address' 		=> !empty($data['list_address_i']) ? $data['list_address_i'][$key] : "",
						'customer_based'=> !empty($data['list_customer_based_i']) ? $data['list_customer_based_i'][$key] : 0,		
				
						'date_issue'	=> !empty($data['list_date_issue_i']) ? strtotime($data['list_date_issue_i'][$key]) : 0,
						'date_expiry'	=> !empty($data['list_date_expiry_i']) ? strtotime($data['list_date_expiry_i'][$key]) : 0,
						'passport'		=> !empty($data['list_passport_i']) ? $data['list_passport_i'][$key] : "",
					
						'tour_book_id'	=> $id
						);
					
					$this->db->insert('tour_book_detail', $object);
				}			
			}	
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
	
	//search tour
	public function search(&$count, $typetour, $txtsearch, $limit = FALSE, $offset = FALSE)
	{
		$this->db->start_cache();
		$this->db->select('t.image, t.date, t.id, t.is_hot, tl.*');
		$this->db->from('tour as t');
		$this->db->join('tour_lang as tl', 't.id = tl.tour_id');
		$this->db->join('tour_cat tc', 't.tour_cat_id = tc.id');
		$this->db->where('name_type', $typetour);
		$this->db->where('t.is_enabled', 1);
		$this->db->where('lang', $this->current_lang_abbr);
		$this->db->like('title', $txtsearch, 'both');
		
		$this->db->stop_cache();
		$count = $this->db->get()->num_rows();
		
		if ($limit != FALSE) 
		{
			if ($offset == FALSE) $this->db->limit($limit);
			else $this->db->limit($limit, $offset);
		}
		$this->db->order_by('is_hot desc, date desc');
		
		$return = $this->db->get()->result_array();
		$this->db->flush_cache();
		
		return $return;
	}
	
	//add_search
	public function add_search( $hash, $typetour, $txtsearch )
	{
		$this->db->select('id');
		$this->db->from('search');
		$this->db->where('hash', $hash);
		$result = $this->db->get()->row_array();
		if( count($result) == 0 )
		{
			$data = array(
						'hash' => $hash,
						'uri_search' => $typetour . '/' . $txtsearch
					);
			$this->db->insert('search', $data);
		}
	}
	
	//get_uri_search
	public function get_search( $hash = FALSE )
	{
		$this->db->select('uri_search');
		$this->db->from('search');
		$this->db->where('hash', $hash);
		$result = $this->db->get()->row_array();
		
		if( empty($result) ) return '';
	
		return $result['uri_search'];
	}
	
	public function get_data_cat($id = 0, &$count = 0, $limit = FALSE, $offset = FALSE){
		$this->db->select('id');
		$this->db->from('tour_cat');
		$this->db->where('parent_id', $id);
		$this->db->where('is_enabled', 1);
		
		$parent = $this->db->get()->result_array();
		
		//Khoi tao stack
		$k = 0;
		$level = 0;
		$stack['lv'.$level] = array('data' => $parent, '_key' => $k);
		
		$result = array();
		
		while(! empty($stack) )
		{
			if( $k == count($stack['lv'.$level]['data']) )
			{
				unset( $stack['lv'.$level] );
				$level --;
				
				if( empty($stack) ) break;
				else $k = $stack['lv'.$level]['_key'];
			}
			else{
				$data_item = $stack['lv'.$level]['data'][$k];
				
				$result[] = $data_item['id'];
				
				//Lay children
				$this->db->select('id');
				$this->db->from('tour_cat');
				$this->db->where('parent_id', $data_item['id']);
				$this->db->where('is_enabled', 1);
				
				$child = $this->db->get()->result_array();
				$k ++;
				
				//Kiem tra xem children co khong ?
				if( count($child) > 0)
				{
					//Luu key hien tai vao ['_key']
					$stack['lv'.$level]['_key'] = $k;
					//Gan children vo stack
					$k = 0;
					$level ++;
					$stack['lv'.$level] = array('data' => $child, '_key' => $k);
				}
			}
		}
		
		$this->db->start_cache();
		$this->db->select('*');
		$this->db->from('tour');
		$this->db->join('tour_lang', 'tour.id = tour_lang.tour_id');
		$this->db->where('is_enabled', 1);
		$this->db->where('lang', $this->current_lang_abbr);
		$where[] = $id;
		if( ! empty($result))
		{	
			foreach($result as $k => $id)
			{
				$where[] = $id;
			}
		}
		$this->db->where_in('tour_cat_id', $where);
				
		$this->db->stop_cache();
		$count = $this->db->get()->num_rows();
		
		if ($limit != FALSE) {
			if ($offset == FALSE) $this->db->limit($limit);
			else $this->db->limit($limit, $offset);
		}
		$this->db->order_by('tour.date desc, tour.id desc');
		
		$result = $this->db->get()->result_array();
		$this->db->flush_cache();
		
		return $result;	
	}
}