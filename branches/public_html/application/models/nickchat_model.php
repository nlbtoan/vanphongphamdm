<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nickchat_model extends MY_Model
{
	public function __construct() {
		parent::__construct();
	}
	
	public function get_nickchat()
	{
		$this->db->select('*');
		$this->db->from('nickchat');
		$result = $this->db->order_by('id')->get()->result_array();
		
		return $result;
	}
	
	public function get_info( $id )
	{
		$this->db->select('*');
		$this->db->from('nickchat');
		$result = $this->db->where('id', $id)->get()->row_array();
		
		return $result;
	}
	
	/*
	 * create
	 * @param : string
	 * @return true or false
	 */
	public function create( $data )
	{
		//Insert thong tin chung
		$object['name'] 		= $data['name'];
		$object['nickchat'] 	= $data['nickchat'];
		$object['active'] 		= $data['active'];
		
		$result = $this->db->insert('nickchat', $object); //do to insert
		
		return $result;
	}
	
	/*
	 * active or un_active
	 * @param : (int|array) id
	 * @param : string
	 * @return true or false
	 */
	public function active( $id, $active = 0 )
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
               		'active' => $active
            	);
			
		$result = $this->db->update('nickchat', $data);
		
		return $result;
	}
	
	/*
	 * Xoa 1 hoac nhieu
	 * - Neu xoa thanh cong return TRUE
	 * - Nguoc lai return FASLE
	 * @param : (int|array)
	 * @return true or false
	 */
	public function delete($id)
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
		$result = $this->db->delete('nickchat');
		
		return $result;
	}
	
	/*
	 * edit
	 * @param : string
	 * @return true or false
	 */
	public function edit( $data )
	{
		if ( empty($data['id']) )
		{
			return FALSE;
		}
		
		$object = array();
		$id = $data['id'];
		
		//update thong tin chung
		$object['name'] 		= $data['name'];
		$object['nickchat'] 	= $data['nickchat'];
		$object['active'] 		= $data['active'];
		
		$this->db->where('id', $id);
		$result = $this->db->update('nickchat', $object);
		
		return $result;
	}
}