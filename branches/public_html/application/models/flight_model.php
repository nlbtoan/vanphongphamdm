<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Flight_model extends MY_Model
{
	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct();	
	}
	
	public function get_info($id)
	{
		$this->db->select('*');
		$this->db->from('flight_info');
		$return = $this->db->where('id', $id)->get()->row_array();
		
		return $return;
	}
	
	public function get_info_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('flight');
		$return = $this->db->where('id', $id)->get()->row_array();
		
		return $return;
	}
	
	public function get_flight(&$count = 0, $limit = false, $offset = false)
	{
		$this->db->start_cache();
		
		$this->db->select('*');
		$this->db->from('flight');
		
		$this->db->stop_cache();
		
		$count = $this->db->get()->num_rows();
		if ($limit != false) {
			if ($offset == false) $this->db->limit($limit);
			else $this->db->limit($limit, $offset);			
		}
		$return = $this->db->get()->result_array();
		
		$this->db->flush_cache();
		return $return;
	}
	
	public function get_flight_all()
	{
		$this->db->select('*');
		return $this->db->from('flight')->get()->result_array();
		
	} 
	
	public function get_flight_info_to( $cat_id )
	{
		/*
		 * 0 = di
		 * 1 = ve
		 */
		$this->db->select('*');
		$this->db->from('flight_info');
		$return = $this->db->where('flight_id', $cat_id);
		$return = $this->db->where('is_go', 0)->get()->result_array();
		
		return $return;
	}
	public function get_flight_info_from( $cat_id )
	{
		/*
		 * 0 = di
		 * 1 = ve
		 */
		$this->db->select('*');
		$this->db->from('flight_info');
		$return = $this->db->where('flight_id', $cat_id);
		$return = $this->db->where('is_go', 1)->get()->result_array();
		
		return $return;
	}
	
	public function create($row)
	{
		$object= array(
					   'to' 		=> $row['to'],
					   'from' 		=> $row['from'],
					   'transit' 	=> $row['transit'],
					   'active' 	=> $row['active'],
					   'date' 		=> time()-3600
		            );

		$result = $this->db->insert('flight', $object); 
		
		return $result;
	}
	
	public function create_flight($row)
	{
		$object= array(
					   'flight_code' 	=> $row['flight_code'],
					   'time_departure' => $row['time_departure'],
					   'time_arrival' 	=> $row['time_arrival'],
					   'flight_id' 		=> $row['flight_id'],
					   'is_go' 			=> $row['is_go'],
		            );

		$result = $this->db->insert('flight_info', $object);
		
		return $result;
	}
	
	public function delete($id)
	{
		////START TRANSACTION////
		$this->db->trans_begin();
		
		//DELETE ROW IN "MENU" TABLE
		if( is_array($id) )
		{
			foreach($id as $k => $item)
			{
				if($k == 0) $this->db->where('id', $item);
				else $this->db->or_where('id', $item);
			}
		}
		else
		{
			$this->db->where('id', $id);
		}
		$this->db->delete('flight');
		
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
	
	public function delete_flight($id)
	{
		////START TRANSACTION////
		$this->db->trans_begin();
		
		//DELETE ROW IN "MENU" TABLE
		if( is_array($id) )
		{
			foreach($id as $k => $item)
			{
				if($k == 0) $this->db->where('flight_id', $item);
				else $this->db->or_where('flight_id', $item);
			}
		}
		else
		{
			$this->db->where('flight_id', $id);
		}
		$this->db->delete('flight_info');
		
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
	
	public function update($row)
	{
		$object= array(
					   'to' 		=> $row['to'],
					   'from' 		=> $row['from'],
					   'transit' 	=> $row['transit'],
					   'active' 	=> $row['active'],
					   'date' 		=> time()-3600
		            );
		            
				  $this->db->where('id', $row['id']);
		$result = $this->db->update('flight', $object); 
		
		return $result;
	}
	
	public function update_flight($row)
	{
		$object= array(
					   'flight_code' 	=> $row['flight_code'],
					   'time_departure' => $row['time_departure'],
					   'time_arrival' 	=> $row['time_arrival'],
					   'is_go' 			=> $row['is_go']
		            );
		          
				  $this->db->where('id', $row['id']);
		$result = $this->db->update('flight_info', $object);
		
		return $result;
	}
	
	public function active($id, $active = 0)
	{
		if( is_array($id) )
		{
			foreach($id as $k => $item)
			{
				if($k == 0) $this->db->where('id', $item);
				else $this->db->or_where('id', $item);
			}
		}
		else
		{	
			$this->db->where('id', $id);
		}
		
		$data = array(
               		'active' => $active
            	);
			
		$result = $this->db->update('flight', $data);
		return $result;
	}
	
	/*
	 * create book
	 * @param : array
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
					'departure' 	=> $data['departure'],	
					'arrival' 		=> $data['arrival'],	
					'adult' 		=> $data['adult'],	
					'child' 		=> $data['child'],	
					'baby' 			=> $data['baby'],
					'other_requirement' => $data['other_requirement'],	
					'type_ticket' 		=> $data['type_ticket'],	
					'payment_method' 	=> $data['payment_method'],
					'is_read' 		=> 0,
					'is_checked' 	=> 0,
					'date' 			=> time() - 3600
					);
					
		$this->db->insert('flight_book', $object);
		
		//Get last id in table
		$id = $this->db->insert_id();
		
		if ( !empty($data['list_name']) ){
			
			foreach( $data['list_name'] as $key=>$item ){
				if ( !empty($item) ){
					$object = array( 
							'name' => $item,
							'birthday' => $data['list_birthday'][$key],
							'address' => $data['list_address'][$key],
							'sex' => $data['list_sex'][$key],
							'age' => $data['list_age'][$key], 
							'flight_book_id' => $id 
							);
					$this->db->insert('flight_book_detail', $object);
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
	
	public function get_data_book_count( &$count = 0, $limit = FALSE, $offset = FALSE )
	{
		$this->db->start_cache();
		$this->db->select('id, date, is_read, is_checked');
		$this->db->from('flight_book');
				
		$this->db->stop_cache();
		$count = $this->db->get()->num_rows();
		
		if ($limit != FALSE) {
			if ($offset == FALSE) $this->db->limit($limit);
			else $this->db->limit($limit, $offset);
		}
		$this->db->order_by('flight_book.date desc, flight_book.id desc');
		
		$return = $this->db->get()->result_array();
		$this->db->flush_cache();

		return $return;
	}
	
	function get_data_book_info($id){

		$this->db->select('flight_book.*');
		$this->db->from('flight_book');
		$this->db->where('flight_book.id', $id);
		
		$result = $this->db->get();
		
		return $result->row_array();
		
	}
	
	function get_list_person( $book_id ){
		$this->db->select('*');
		$this->db->from('flight_book_detail');
		$this->db->where('flight_book_id', $book_id);
		$result = $this->db->get();
		return $result->result_array();
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
			
		$result = $this->db->update('flight_book', $data);
		
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
		$this->db->delete('flight_book');
		
		
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
					'departure' 	=> $data['departure'],	
					'arrival' 		=> $data['arrival'],	
					'adult' 		=> $data['adult'],	
					'child' 		=> $data['child'],	
					'baby' 			=> $data['baby'],
					'other_requirement' => $data['other_requirement'],	
					'type_ticket' 		=> $data['type_ticket'],	
					'payment_method' 	=> $data['payment_method'],
					'is_checked' 	=> $data['is_checked']
					);
		
		$this->db->where('id', $id);
		$this->db->update('flight_book', $object);
		
		//update list person
		if ( !empty($data['list_id']) ){
			foreach( $data['list_id'] as $key=>$item ){
				if ( !empty($item) ){ 
					$object = array(
							'name' 			=> $data['list_name'][$key],
							'birthday' 		=> strtotime($data['list_birthday'][$key]),
							'address' 		=> $data['list_address'][$key],
							'sex' 			=> $data['list_sex'][$key],
							'age' 			=> $data['list_age'][$key]
							);
					$this->db->where('id', $item);
					$this->db->update('flight_book_detail', $object);
				}
			}
		}
		
		//insert list person
		if ( !empty($data['list_name_i']) ){
			foreach( $data['list_name_i'] as $key=>$item ){
				if ( !empty($item) ){
					$object = array(  
						'flight_book_id'=> $id,
						'name' 			=> $item,
						'birthday' 		=> !empty($data['list_birthday_i'][$key]) ? strtotime($data['list_birthday_i'][$key]) : 0,
						'address' 		=> $data['list_address_i'][$key],
						'sex' 			=> $data['list_sex_i'][$key],
						'age' 			=> $data['list_age_i'][$key]
						);
					
					$this->db->insert('flight_book_detail', $object);
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
		$this->db->delete('flight_book_detail');
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
		$this->db->update('flight_book', $object);
		
	}
	
}