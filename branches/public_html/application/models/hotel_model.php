<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotel_model extends MY_Model{
	
	function __construct(){
		
		parent::__construct();
		
	}
	
	function get_data($select = 'id, name, image'){

		$this->db->select($select);
		$this->db->from('hotel');
		$this->db->join('hotel_lang', 'hotel.id = hotel_lang.hotel_id');
		$this->db->where('hotel_lang.lang', $this->current_lang_abbr);
		$this->db->order_by('date desc, id desc');
		
		$result = $this->db->get();
		
		return $result->result_array();
		
	}
	
	public function get_data_count( &$count = 0, $limit = FALSE, $offset = FALSE)
	{
		$this->db->start_cache();
		$this->db->select('*');
		$this->db->from('hotel');
		$this->db->join('hotel_lang', 'hotel.id = hotel_lang.hotel_id');
		$this->db->where('hotel_lang.lang', $this->current_lang_abbr);
				
		$this->db->stop_cache();
		$count = $this->db->get()->num_rows();
		
		if ($limit != FALSE) {
			if ($offset == FALSE) $this->db->limit($limit);
			else $this->db->limit($limit, $offset);
		}
		$this->db->order_by('date desc, id desc');
		
		$return = $this->db->get()->result_array();
		$this->db->flush_cache();

		return $return;
	}

        public function get_data_count_front( &$count = 0, $limit = FALSE, $offset = FALSE)
	{
		$this->db->start_cache();
		$this->db->select('*');
		$this->db->from('hotel');
		$this->db->join('hotel_lang', 'hotel.id = hotel_lang.hotel_id');
		$this->db->where('hotel_lang.lang', $this->current_lang_abbr);
		$this->db->where('is_enabled', 1);
		
		$this->db->stop_cache();
		$count = $this->db->get()->num_rows();
		
		if ($limit != FALSE) {
			if ($offset == FALSE) $this->db->limit($limit);
			else $this->db->limit($limit, $offset);
		}
		$this->db->order_by('date desc, id desc');
		
		$return = $this->db->get()->result_array();
		$this->db->flush_cache();

		return $return;
	}
	
	function get_data_info( $id = 0){
		
		$this->db->select('*');
		$this->db->from('hotel');
		$this->db->join('hotel_lang', 'hotel.id = hotel_lang.hotel_id');
		$this->db->where('id', $id);
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
		
		$object['image'] 		= empty( $data['image'] ) 		? '' : $data['image'];
		$object['level'] 		= empty( $data['level'] ) 		? 1 			: $data['level'];
		$object['web'] 			= empty( $data['web'] ) 		? '' 			: $data['web'];
		
		//do to insert table
		$this->db->set($object);
		$this->db->insert('hotel', $object);
		
		//Get last id in table
		$id = $this->db->insert_id();
		
		//Insert thong tin rieng cho tung language
		foreach( $data['lang'] as $item )
		{
			$object = array();
			$object['hotel_id'] 		= $id;
			$object['lang'] 			= empty( $item['lang'] ) 			? $this->current_lang_abbr	: $item['lang'];
			
			$object['name'] 			= empty( $item['name'] ) 			? ''	: $item['name'];
			$object['address'] 			= empty( $item['address'] ) 		? '' 	: $item['address'];
			$object['short_introduce'] 	= empty( $item['short_introduce'] ) ? '' 	: $item['short_introduce'];
			$object['full_introduce'] 	= empty( $item['full_introduce'] ) 	? '' 	: $item['full_introduce'];

			//do to insert table_lang
			$this->db->set($object);
			$this->db->insert('hotel_lang', $object);
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
			
		$result = $this->db->update('hotel', $data);
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
		$this->db->delete('hotel');
		
		//DELETE ROW IN TABLE_LANG
		if( is_array($id) )
		{
			for($item = 0; $item < count($id); $item++)
			{
				if($item == 0) $this->db->where('hotel_id', $id[$item]);
				else $this->db->or_where('hotel_id', $id[$item]);
			}
		}
		else
		{
			$this->db->where('hotel_id', $id);
		}
		$this->db->delete('hotel_lang');
		
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
		
		$object['image'] 		= empty( $data['image'] ) 		? '' : $data['image'];
		$object['level'] 		= empty( $data['level'] ) 		? 1 			: $data['level'];
		$object['web'] 			= empty( $data['web'] ) 		? '' 			: $data['web'];
		
		$this->db->where('id', $id);
		$this->db->update('hotel', $object); 
		
		//update thong tin rieng cho tung language
		foreach( $data['lang'] as $item )
		{
			$object = array();
			$object['name'] 			= empty( $item['name'] ) 			? ''	: $item['name'];
			$object['address'] 			= empty( $item['address'] ) 		? '' 	: $item['address'];
			$object['short_introduce'] 	= empty( $item['short_introduce'] ) ? '' 	: $item['short_introduce'];
			$object['full_introduce'] 	= empty( $item['full_introduce'] ) 	? '' 	: $item['full_introduce'];
			
			$this->db->where('lang', empty( $item['lang'] ) ? $this->current_lang_abbr : $item['lang']);
			$this->db->where('hotel_id', $id);
			$this->db->update('hotel_lang', $object); 
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
	
	// Hotel room category
	
	function get_cat_room_data(){

		$this->db->select('id, name');
		$this->db->from('hotel_room_cat');
		$this->db->join('hotel_room_cat_lang', 'hotel_room_cat.id = hotel_room_cat_lang.hotel_room_cat_id');
		$this->db->where('hotel_room_cat_lang.lang', $this->current_lang_abbr);
		$this->db->order_by('date desc, id desc');
		
		$result = $this->db->get();
		
		return $result->result_array();
		
	}
	
	public function get_cat_room_data_count( &$count = 0, $limit = FALSE, $offset = FALSE)
	{
		$this->db->start_cache();
		$this->db->select('*');
		$this->db->from('hotel_room_cat');
		$this->db->join('hotel_room_cat_lang', 'hotel_room_cat.id = hotel_room_cat_lang.hotel_room_cat_id');
		$this->db->where('hotel_room_cat_lang.lang', $this->current_lang_abbr);
				
		$this->db->stop_cache();
		$count = $this->db->get()->num_rows();
		
		if ($limit != FALSE) {
			if ($offset == FALSE) $this->db->limit($limit);
			else $this->db->limit($limit, $offset);
		}
		$this->db->order_by('date desc, id desc');
		
		$return = $this->db->get()->result_array();
		$this->db->flush_cache();

		return $return;
	}
	
	function get_cat_room_data_info( $id = 0){
		
		$this->db->select('*');
		$this->db->from('hotel_room_cat');
		$this->db->join('hotel_room_cat_lang', 'hotel_room_cat.id = hotel_room_cat_lang.hotel_room_cat_id');
		$this->db->where('id', $id);
		$result = $this->db->get();
		
		return $result->result_array();
		
	}
	
	/*
	 * create
	 * @param : string
	 * @return true or false
	 */
	public function create_cat_room( $data )
	{
		////START TRANSACTION////
		$this->db->trans_begin();

		//Insert thong tin chung
		$object = array();
		$object['date'] 		= empty( $data['date'] ) 		? time()-3600	: $data['date'];
		$object['is_enabled'] 	= empty( $data['is_enabled'] ) 	? 0				: $data['is_enabled'];
		
		$object['ordering'] 	= empty( $data['ordering'] ) 		? 0 : $data['ordering'];
		$object['parent_id'] 	= empty( $data['parent_id'] ) 		? 0 : $data['parent_id'];
		$object['is_category'] 	= empty( $data['is_category'] ) 	? 0 : $data['is_category'];
		
		//do to insert table
		$this->db->set($object);
		$this->db->insert('hotel_room_cat', $object);
		
		//Get last id in table
		$id = $this->db->insert_id();
		
		//Insert thong tin rieng cho tung language
		foreach( $data['lang'] as $item )
		{
			$object = array();
			$object['hotel_room_cat_id'] 		= $id;
			$object['lang'] 			= empty( $item['lang'] ) 		? $this->current_lang_abbr	: $item['lang'];
			
			$object['name'] 			= empty( $item['name'] ) 		? ''	: $item['name'];
			$object['url'] 				= empty( $item['url'] ) 		? '' 	: $item['url'];


			//do to insert table_lang
			$this->db->set($object);
			$this->db->insert('hotel_room_cat_lang', $object);
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
	public function active_cat_room( $id, $active = 0 , $field = 'is_enabled')
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
			
		$result = $this->db->update('hotel_room_cat', $data);
		return $result;
		
	}
	
	/*
	 * Xoa 1 hoac nhieu
	 * - Neu xoa thanh cong return TRUE
	 * - Nguoc lai return FASLE
	 * @param : (int|array)id
	 * @return true or false
	 */
	public function delete_cat_room($id)
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
		$this->db->delete('hotel_room_cat');
		
		//DELETE ROW IN TABLE_LANG
		if( is_array($id) )
		{
			for($item = 0; $item < count($id); $item++)
			{
				if($item == 0) $this->db->where('hotel_room_cat_id', $id[$item]);
				else $this->db->or_where('hotel_room_cat_id', $id[$item]);
			}
		}
		else
		{
			$this->db->where('hotel_room_cat_id', $id);
		}
		$this->db->delete('hotel_room_cat_lang');
		
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
	
	public function edit_cat_room( $data )
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
		
		$object['ordering'] 	= empty( $data['ordering'] ) 		? 0 : $data['ordering'];
		$object['parent_id'] 	= empty( $data['parent_id'] ) 		? 0 : $data['parent_id'];
		$object['is_category'] 	= empty( $data['is_category'] ) 	? 0 : $data['is_category'];
		
		$this->db->where('id', $id);
		$this->db->update('hotel_room_cat', $object); 
		
		//update thong tin rieng cho tung language
		foreach( $data['lang'] as $item )
		{
			$object = array();
			$object['name'] 			= empty( $item['name'] ) 		? ''	: $item['name'];
			$object['url'] 				= empty( $item['url'] ) 		? '' 	: $item['url'];
			
			$this->db->where('lang', empty( $item['lang'] ) ? $this->current_lang_abbr : $item['lang']);
			$this->db->where('hotel_room_cat_id', $id);
			$this->db->update('hotel_room_cat_lang', $object); 
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
	
	// Hotel Room
	
	function get_room_data(){

		$this->db->select('*');
		$this->db->from('hotel_room');
		$this->db->join('hotel_room_lang', 'hotel_room.id = hotel_room_lang.hotel_room_id');
		$this->db->where('hotel_room_lang.lang', $this->current_lang_abbr);
		$this->db->order_by('date desc, id desc');
		
		$result = $this->db->get();
		
		return $result->result_array();
		
	}
	
	public function get_room_data_count( &$count = 0, $limit = FALSE, $offset = FALSE)
	{
		$this->db->start_cache();
		$this->db->select('*');
		$this->db->from('hotel_room');
		$this->db->join('hotel_room_lang', 'hotel_room.id = hotel_room_lang.hotel_room_id');
		$this->db->where('hotel_room_lang.lang', $this->current_lang_abbr);
				
		$this->db->stop_cache();
		$count = $this->db->get()->num_rows();
		
		if ($limit != FALSE) {
			if ($offset == FALSE) $this->db->limit($limit);
			else $this->db->limit($limit, $offset);
		}
		$this->db->order_by('date desc, id desc');
		
		$return = $this->db->get()->result_array();
		$this->db->flush_cache();

		return $return;
	}
	
	function get_room_data_info( $id = 0){
		
		$this->db->select('*');
		$this->db->from('hotel_room');
		$this->db->join('hotel_room_lang', 'hotel_room.id = hotel_room_lang.hotel_room_id');
		$this->db->where('id', $id);
		$result = $this->db->get();
		
		return $result->result_array();
		
	}
	
	function get_room_by_hotel_id( $id ){
		
		$this->db->select('hotel_room.id, hotel_room.image, hotel_room_lang.name, hotel_room_lang.price, hotel_room_cat_lang.name as cat_name');
		$this->db->from('hotel_room');
		$this->db->join('hotel_room_lang', 'hotel_room.id = hotel_room_lang.hotel_room_id');
		$this->db->join('hotel', 'hotel.id = hotel_room.hotel_id');
		$this->db->join('hotel_room_cat', 'hotel_room_cat.id = hotel_room.hotel_room_cat_id');
		$this->db->join('hotel_room_cat_lang', 'hotel_room_cat.id = hotel_room_cat_lang.hotel_room_cat_id');
		$this->db->where('hotel_room.hotel_id', $id);
		$this->db->where('hotel_room_lang.lang', $this->current_lang_abbr);
		$this->db->group_by('hotel_room.id, hotel_room.image, hotel_room_lang.name, hotel_room_lang.price');
		$result = $this->db->get();
		
		return $result->result_array();
		
	}
	
	/*
	 * create
	 * @param : string
	 * @return true or false
	 */
	public function create_room( $data )
	{
		////START TRANSACTION////
		$this->db->trans_begin();

		//Insert thong tin chung
		$object = array();
		$object['date'] 		= empty( $data['date'] ) 		? time()-3600	: $data['date'];
		$object['is_enabled'] 	= empty( $data['is_enabled'] ) 	? 0				: $data['is_enabled'];
		
		$object['image'] 				= empty( $data['image'] ) 				? '' : $data['image'];
		$object['hotel_id'] 			= empty( $data['hotel_id'] ) 			? 0 			: $data['hotel_id'];
		$object['hotel_room_cat_id'] 	= empty( $data['hotel_room_cat_id'] ) 	? 0 			: $data['hotel_room_cat_id'];
		
		//do to insert table
		$this->db->set($object);
		$this->db->insert('hotel_room', $object);
		
		//Get last id in table
		$id = $this->db->insert_id();
		
		//Insert thong tin rieng cho tung language
		foreach( $data['lang'] as $item )
		{
			$object = array();
			$object['hotel_room_id'] 		= $id;
			$object['lang'] 			= empty( $item['lang'] ) 			? $this->current_lang_abbr	: $item['lang'];
			
			$object['name'] 			= empty( $item['name'] ) 			? ''	: $item['name'];
			$price = '';
			$price .= $item['price'].' ';
			$price .= $item['curency'].' ';
			//$price .= $object['lang'] == 'vi' ? '/ 1 người' : '/ 1 person';
			$object['price'] 			= $price;
			$object['introduce'] 		= empty( $item['introduce'] ) 		? '' 	: $item['introduce'];

			//do to insert table_lang
			$this->db->set($object);
			$this->db->insert('hotel_room_lang', $object);
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
	public function active_room( $id, $active = 0 , $field = 'is_enabled')
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
			
		$result = $this->db->update('hotel_room', $data);
		return $result;
		
	}
	
	/*
	 * Xoa 1 hoac nhieu
	 * - Neu xoa thanh cong return TRUE
	 * - Nguoc lai return FASLE
	 * @param : (int|array)id
	 * @return true or false
	 */
	public function delete_room($id)
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
		$this->db->delete('hotel_room');
		
		//DELETE ROW IN TABLE_LANG
		if( is_array($id) )
		{
			for($item = 0; $item < count($id); $item++)
			{
				if($item == 0) $this->db->where('hotel_room_id', $id[$item]);
				else $this->db->or_where('hotel_room_id', $id[$item]);
			}
		}
		else
		{
			$this->db->where('hotel_room_id', $id);
		}
		$this->db->delete('hotel_room_lang');
		
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
	public function edit_room( $data )
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
		
		$object['image'] 				= empty( $data['image'] ) 				? '' : $data['image'];
		$object['hotel_id'] 			= empty( $data['hotel_id'] ) 			? 0 			: $data['hotel_id'];
		$object['hotel_room_cat_id'] 	= empty( $data['hotel_room_cat_id'] ) 	? 0 			: $data['hotel_room_cat_id'];
		
		$this->db->where('id', $id);
		$this->db->update('hotel_room', $object); 
		
		//update thong tin rieng cho tung language
		foreach( $data['lang'] as $item )
		{
			$object = array();
			$object['name'] 			= empty( $item['name'] ) 			? ''	: $item['name'];
			$object['price'] 			= empty( $item['price'] ) 		? '' 	: $item['price'];
			$object['introduce'] 		= empty( $item['introduce'] ) 		? '' 	: $item['introduce'];
			
			$this->db->where('lang', empty( $item['lang'] ) ? $this->current_lang_abbr : $item['lang']);
			$this->db->where('hotel_room_id', $id);
			$this->db->update('hotel_room_lang', $object); 
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
					'company' 		=> $data['company'],
					'tax_code' 		=> $data['tax_code'],		
					'check_in' 		=> $data['check_in'],
					'check_out' 	=> $data['check_out'],	
					'adult' 		=> $data['adult'],	
					'child' 		=> $data['child'],	
					'baby' 			=> $data['baby'],
					'other_requirement' => $data['other_requirement'],	
					'payment_method' 	=> $data['payment_method'],
					'single_room' 		=> $data['single_room'],	
					'double_room' 		=> $data['double_room'],	
					'family_room' 		=> $data['family_room'],
					'hotel_id' 			=> $data['hotel_id'],
					'is_read' 		=> 0,
					'is_checked' 	=> 0,
					'date' 			=> time() - 3600
					);
					
		//Get last id in table
		$this->db->insert('hotel_book', $object);

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
	
	
	function get_hotel( $select = '*' ){

		$this->db->select($select);
		$this->db->from('hotel');
		$this->db->join('hotel_lang', 'hotel.id = hotel_lang.hotel_id');
		$this->db->where('hotel_lang.lang', $this->current_lang_abbr);
		$this->db->where('hotel.is_enabled', 1);
		$this->db->order_by('hotel.level, hotel.date desc, hotel.id desc');
		
		$result = $this->db->get();
		
		return $result->result_array();
		
	}
	
	function get_hotel_info( $id = false, $select = '*' ){
		
		if( !$id ) return false;
		
		$this->db->select($select);
		$this->db->from('hotel');
		$this->db->join('hotel_lang', 'hotel.id = hotel_lang.hotel_id');
		$this->db->where('hotel_lang.lang', $this->current_lang_abbr);
		$this->db->where('hotel.is_enabled', 1);
		$this->db->where('hotel.id', $id);
		
		$result = $this->db->get();
		
		return $result->row_array();
		
	}
	
	public function get_data_book_count( &$count = 0, $limit = FALSE, $offset = FALSE )
	{
		$this->db->start_cache();
		$this->db->select('id, date, is_read, is_checked');
		$this->db->from('hotel_book');
				
		$this->db->stop_cache();
		$count = $this->db->get()->num_rows();
		
		if ($limit != FALSE) {
			if ($offset == FALSE) $this->db->limit($limit);
			else $this->db->limit($limit, $offset);
		}
		$this->db->order_by('hotel_book.date desc, hotel_book.id desc');
		
		$return = $this->db->get()->result_array();
		$this->db->flush_cache();

		return $return;
	}
	
	function get_data_book_info($id){

		$this->db->select('hotel_book.*');
		$this->db->from('hotel_book');
		$this->db->where('hotel_book.id', $id);
		
		$result = $this->db->get();
		
		return $result->row_array();
		
	}
	
	/*
	 * active or un_active
	 * @param : (int|array)id
	 * @param : string
	 * @return true or false
	 */
	public function active_book( $id, $active = 0 , $field = 'active')
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
			
		$result = $this->db->update('hotel_book', $data);
		
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
		$this->db->delete('hotel_book');
		
		
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
					'company' 		=> $data['company'],
					'tax_code' 		=> $data['tax_code'],		
					'check_in' 		=> $data['check_in'],
					'check_out' 	=> $data['check_out'],	
					'adult' 		=> $data['adult'],	
					'child' 		=> $data['child'],	
					'baby' 			=> $data['baby'],
					'other_requirement' => $data['other_requirement'],	
					'payment_method' 	=> $data['payment_method'],
					'single_room' 		=> $data['single_room'],	
					'double_room' 		=> $data['double_room'],	
					'family_room' 		=> $data['family_room'],
					'hotel_id' 			=> $data['hotel_id'],
					'is_checked' 	=> $data['is_checked']
					);
		
		$this->db->where('id', $id);
		$this->db->update('hotel_book', $object);
		
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

	function get_name_hotel( $id = 0 ){
		$this->db->select('name');
		$this->db->from('hotel');
		$this->db->join('hotel_lang', 'hotel.id = hotel_lang.hotel_id');
		$this->db->where('hotel.id', $id);
		$this->db->where('hotel_lang.lang', 'vi');
		$result = $this->db->get();
		return $result->row_array();
	}
	
}