<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advert_model extends MY_Model
{
	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct();	
	}
	
	public function create( $data )
	{
		//Insert thong tin chung
		$object['name'] 	= $data['name'];
		$object['alias'] 	= $data['alias'];
		$object['active'] 	= $data['active'];
		
		$result = $this->db->insert('advert_cat', $object); //do to insert
		
		return $result;
	}
	
	public function create_advert( $data )
	{
		//Lay ordering
					$this->db->select('max(ordering) as ordering');
		$ordering = $this->db->from('advert')->get()->row_array();
		
		if( $ordering ) $object['ordering'] = $ordering['ordering'] + 1;
		else $object['ordering'] = 1;
		
		//Insert thong tin chung
		$object['adv_text'] = $data['adv_text'];
		$object['link'] 	= $data['link'];
		$object['image'] 	= $data['image'];
		$object['parent'] 	= $data['parent'];
		$object['active'] 	= $data['active'];
		
		$result = $this->db->insert('advert', $object); //do to insert
		
		return $result;
	}
	
	//lay tat ca category
	public function get_all_cat(&$count = 0, $limit = FALSE, $offset = FALSE)
	{
		$this->db->start_cache();
		$this->db->select('*');
		$this->db->from('advert_cat');
		
		$this->db->stop_cache();
		$count = $this->db->get()->num_rows();
		if ($limit != false) {
			if ($offset == false) $this->db->limit($limit);
			else $this->db->limit($limit, $offset);
		}
		$list = $this->db->get()->result_array();
		
		$this->db->flush_cache();
                $result = array();
		foreach($list as $item)
		{
			$count = $this->count_adv_by_cat($item['id']);
			$item['count'] = $count;
			$result[] = $item;
		}

		return $result;
	}
	
	public function count_adv_by_cat($id = 0)
	{
		$this->db->select('id');
		$this->db->from('advert');
		$this->db->where('parent', $id);

		$count = $this->db->get()->num_rows();
		if($count === 0) $count = '-';
		
		return $count;
	}
	
	//lay tat ca category khong paging
	public function get_all_cat_no_paging()
	{
		$this->db->select('*');
		$result = $this->db->from('advert_cat')->get()->result_array();
		return $result;
	}
	
	//lay tat ca info category ($id = category id)
	public function get_info_cat( $id = 0 )
	{
		$this->db->select('*');
		$this->db->from('advert_cat');
		$this->db->where('id', $id);
		$row = $this->db->get()->row_array();
		
		return $row;
	}
	
	//lay tat ca advert trong category ( $id = category id )
	public function get_all_advert( $id = 0, &$count = 0, $limit = FALSE, $offset = FALSE )
	{
		$this->db->start_cache();
		$this->db->select('*');
		$this->db->from('advert');
		$this->db->where('parent', $id);
		
		$this->db->stop_cache();
		$count = $this->db->get()->num_rows();
		if ($limit != false) {
			if ($offset == false) $this->db->limit($limit);
			else $this->db->limit($limit, $offset);
		}
		$result = $this->db->get()->result_array();
		
		$this->db->flush_cache();
		
		return $result;
	}
	
	//Lay info advert ($id = advert id)
	public function get_info_advert( $id = 0 )
	{
		$this->db->select('*');
		$this->db->from('advert');
		$this->db->where('id', $id);
		$row = $this->db->get()->row_array();
		
		return $row;
	}
	
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
			
		$result = $this->db->update('advert_cat', $data);
		
		return $result;
	}
	
	public function active_advert( $id, $active = 0 )
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
			
		$result = $this->db->update('advert', $data);
		
		return $result;
	}
	
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
		$result = $this->db->delete('advert_cat');
		
		return $result;
	}

        public function delete_advert($id)
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
		$result = $this->db->delete('advert');
		
		return $result;
	}
	
	public function edit( $data )
	{
		if ( empty($data['id']) )
		{
			return FALSE;
		}
		$object = array();
		$id = $data['id'];
		
		//update thong tin chung
		$object['name'] 	= $data['name'];
		$object['alias'] 	= $data['alias'];
		$object['active'] 	= $data['active'];
		
		$this->db->where('id', $id);
		$result = $this->db->update('advert_cat', $object);
		
		return $result;
	}
	
	public function edit_advert( $data )
	{
		if ( empty($data['id']) )
		{
			return FALSE;
		}
		$object = array();
		$id = $data['id'];
		
		//update thong tin chung
		$object['adv_text'] = $data['adv_text'];
		$object['link'] 	= $data['link'];
		$object['image'] 	= $data['image'];
		$object['parent'] 	= $data['parent'];
		$object['active'] 	= $data['active'];
		
		$this->db->where('id', $id);
		$result = $this->db->update('advert', $object);
		
		return $result;
	}
	
	public function exist_alias($alias, $id = FALSE)
	{
		$this->db->select('count(id) as num');
		$this->db->from('advert_cat');
		if($id)
		{
			$this->db->where('id !=', $id);
		}
		$result = $this->db->where('alias', $alias)->get()->row_array();
		
		if($result['num'] == 1) return TRUE;
		
		return FALSE;
	}
	
	public function get_adv($alias, $limit = FALSE)
	{
		$this->db->select('image, link');
		$this->db->from('advert as a');
		$this->db->join('advert_cat as ac', 'ac.id = a.parent');
		$this->db->where('a.active', 1);
		$this->db->where('ac.active', 1);
		$this->db->where('alias', $alias);
		if (  $limit !== FALSE )
		{
			$this->db->limit($limit);
		}
		
		$result = $this->db->get()->result_array();
		return $result;
	}
}