<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vehicle_model extends MY_Model
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
		$this->db->from('vehicles');
		$return_vehicles = $this->db->where('id', $id)->get()->row_array();
		
		$this->db->select('*');
		$this->db->from('vehicles_info');
		$return_vehicles_info = $this->db->where('vehicles_id', $id)->get()->row_array();
		
		$return = array_merge($return_vehicles_info, $return_vehicles);
		
		return $return;
	}
	
	public function get_vehicle_all()
	{
		
		$this->db->select('*');
		$this->db->from('vehicles');
		$this->db->join('vehicles_info', 'vehicles.id = vehicles_id');
		$return = $this->db->where('active', 1)->get()->result_array();
		
		return $return;
	}
	
	public function get_vehicle(&$count = 0, $limit = false, $offset = false)
	{
		$this->db->start_cache();
		
		$this->db->select('*');
		$this->db->from('vehicles');
		
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
	
	public function get_vehicle_info( $id )
	{
		$this->db->select('*');
		$return = $this->db->from('vehicles_info')->get->result_array();
		
		return $return;
	}
	
	public function create($row)
	{
		////START TRANSACTION////
		$this->db->trans_begin();
		
		$object= array(
					   'name' 		=> $row['name'],
					   'price' 		=> $row['price'],
					   'active' 	=> $row['active'],
					   'date' 		=> time()-3600
		            );
		            
		$this->db->insert('vehicles', $object); 
		
		//Get last id in table MENU
		$id = $this->db->insert_id();
		            
		$object= array(
					   'vehicles_id ' 				=> $id,
					   'time_departure_to' 			=> $row['time_departure_to'],
					   'time_arrival_to' 			=> $row['time_arrival_to'],
					   'total_time_to' 				=> $row['total_time_to'],
				       'location_departure_to' 		=> $row['location_departure_to'],
					   'location_arrival_to' 		=> $row['location_arrival_to'],
				
					   'time_departure_back' 		=> $row['time_departure_back'],
					   'time_arrival_back' 			=> $row['time_arrival_back'],
					   'total_time_back' 			=> $row['total_time_back'],
					   'location_departure_back' 	=> $row['location_departure_back'],
					   'location_arrival_back' 		=> $row['location_arrival_back']
		            );

		$this->db->insert('vehicles_info', $object);
		
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
		$this->db->delete('vehicles');
		
		//--------------------
		
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
			$this->db->where('vehicles_id', $id);
		}
		$this->db->delete('vehicles_info');
		
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
	
	public function delete_vehicle()
	{
		////START TRANSACTION////
		$this->db->trans_begin();
		
		//DELETE ROW IN "MENU" TABLE
		if( is_array($id) )
		{
			foreach($id as $k => $item)
			{
				if($k == 0) $this->db->where('vehicles_id', $item);
				else $this->db->or_where('vehicles_id', $item);
			}
		}
		else
		{
			$this->db->where('vehicles_id', $menu_id);
		}
		$this->db->delete('vehicles_info');
		
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
	
	public function edit($row)
	{
	////START TRANSACTION////
		$this->db->trans_begin();
		
		$object= array(
					   'name' 		=> $row['name'],
					   'price' 		=> $row['price'],
					   'active' 	=> $row['active'],
					   'date' 		=> time()-3600
		            );
		            
		$this->db->where('id', $row['id']);
		$this->db->update('vehicles', $object); 
		            
		$object= array(
					   'time_departure_to' 			=> $row['time_departure_to'],
					   'time_arrival_to' 			=> $row['time_arrival_to'],
					   'total_time_to' 				=> $row['total_time_to'],
				       'location_departure_to' 		=> $row['location_departure_to'],
					   'location_arrival_to' 		=> $row['location_arrival_to'],
				
					   'time_departure_back' 		=> $row['time_departure_back'],
					   'time_arrival_back' 			=> $row['time_arrival_back'],
					   'total_time_back' 			=> $row['total_time_back'],
					   'location_departure_back' 	=> $row['location_departure_back'],
					   'location_arrival_back' 		=> $row['location_arrival_back']
		            );
		
		$this->db->where('vehicles_id', $row['id']);
		$this->db->update('vehicles_info', $object);
		
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
	
	public function edit_vehicle($row)
	{
		$object= array(
					   'time_departure_to' 			=> $row['time_departure_to'],
					   'time_arrival_to' 			=> $row['time_arrival_to'],
					   'total_time_to' 				=> $row['total_time_to'],
				       'location_departure_to' 		=> $row['location_departure_to'],
					   'location_arrival_to' 		=> $row['location_arrival_to'],

					   'time_departure_back' 		=> $row['time_departure_back'],
					   'time_arrival_back' 			=> $row['time_arrival_back'],
					   'total_time_back' 			=> $row['total_time_back'],
					   'location_departure_back' 	=> $row['location_departure_back'],
					   'location_arrival_back' 		=> $row['location_arrival_back'],
		            );
		          
				  $this->db->where('vehicles_id', $row['id']);
		$result = $this->db->update('vehicles_info', $object);
		
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
			
		$result = $this->db->update('vehicles', $data);
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
					
		//Get last id in table
		$this->db->insert('vehicle_book', $object);

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
		$this->db->from('vehicle_book');
				
		$this->db->stop_cache();
		$count = $this->db->get()->num_rows();
		
		if ($limit != FALSE) {
			if ($offset == FALSE) $this->db->limit($limit);
			else $this->db->limit($limit, $offset);
		}
		$this->db->order_by('vehicle_book.date desc, vehicle_book.id desc');
		
		$return = $this->db->get()->result_array();
		$this->db->flush_cache();

		return $return;
	}
	
	function get_data_book_info($id){

		$this->db->select('vehicle_book.*');
		$this->db->from('vehicle_book');
		$this->db->where('vehicle_book.id', $id);
		
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
			
		$result = $this->db->update('vehicle_book', $data);
		
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
		$this->db->delete('vehicle_book');
		
		
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
		$this->db->update('vehicle_book', $object);
		
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