<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends MY_Model
{
	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct();	
	}
	
	/*
	 * Lay toan bo group menu
	 * @return array
	 */
	public function get_group_menu_all()
	{
		$result = $this->db->select('*')->from('menu_group')->get();
		return $result->result_array();
	}

	/*
	 * Lay thong tin group menu
	 * @return array
	 */
	public function get_group_menu_info($menu_id = 0)
	{
		$this->db->select('*');
		$this->db->from('menu_group');
		$this->db->where('id', $menu_id);
		
		return $this->db->get()->row_array();
	}
	
	/*
	 * Lay thong tin menu item
	 * @return array
	 */
	public function get_menu_item_info($menu_id = 0)
	{
		$this->db->select('*');
		$this->db->from('menu');
		$menu = $this->db->where('id', $menu_id)->get()->row_array();
		
		$this->db->select('lang, title, alias');
		$this->db->from('menu_lang');
		$menu_lang = $this->db->where('menu_id', $menu_id)->get()->result_array();
		
		$data = $menu;
		foreach($menu_lang as $item_menu)
		{
			$lang = $item_menu['lang'];
			unset($item_menu['lang']);
			
			foreach($item_menu as $k => $item)
			{
				$data[$lang."_".$k] = $item;
			}
		}
		
		return $data;
	}
	
	/*
	 * Lay group menu co' paging
	 * @count int
	 * @limit int
	 * @offset int
	 * @return array
	 */
	public function get_group_menu(&$count = 0, $limit = false, $offset = false) 
	{
		$this->db->start_cache();
		
		$this->db->select('*');
		$this->db->from('menu_group');
		
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
	
	/*
	 * Dem menu_items ben trong group_menu
	 * @id : int -> group_menu_id
	 * @return : int -> So luong item
	 * 			 int -> So item active
	 * 			 int -> So item khong active 
	 */
	public function count_menu_items_by_group_menu_id( $id )
	{
		$this->db->start_cache();
		$this->db->select('count(active) as count');
		$this->db->from('menu');
		$this->db->join('menu_lang', 'id = menu_id');
		$this->db->where('menu_group_id', $id);
		$this->db->where('menu_lang.lang', $this->current_lang_abbr);
		$data["num"] = $this->db->get()->row_array(); 
		
		$this->db->stop_cache();
		
		$this->db->where('active', 1);
		$data["active"] = $this->db->get()->row_array();
		
		$this->db->flush_cache();
		
		$this->db->select('count(active) as count');
		$this->db->from('menu');
		$this->db->join('menu_lang', 'id = menu_id');
		$this->db->where('active', 0);
		$this->db->where('menu_group_id', $id);
		$this->db->where('menu_lang.lang', $this->current_lang_abbr);
		$data["not_active"] = $this->db->get()->row_array();
		
		return $data;
	}
	
	/*
	 * - Lay menu item theo menu_group_id co parent == 0
	 * - Theo language
	 * @return array
	 */
	public function get_item_by_parent_menu_group_id( $menu_id , &$count = 0, $limit = FALSE, $offset = FALSE)
	{
		$this->db->start_cache();
		$this->db->select('id, title, ordering, controller, link, alias, active, homepage');
		$this->db->from('menu');
		$this->db->join('menu_lang', 'id = menu_id');
		$this->db->where('menu_group_id', $menu_id);
		$this->db->where('lang', $this->current_lang_abbr);
		$this->db->where('parent', 0);
		$this->db->order_by('ordering, id');
		
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
	
	/*
	 * - Lay tat ca menu item theo menu_group_id
	 * - Theo language
	 * @return array
	 */
	public function get_item_by_menu_group_id( $menu_id , &$count = 0, $limit = FALSE, $offset = FALSE)
	{
		$this->db->select('id, title, ordering, controller, link, alias, active, homepage, parent');
		$this->db->from('menu');
		$this->db->join('menu_lang', 'id = menu_id');
		$this->db->where('menu_group_id', $menu_id);
		$this->db->where('lang', $this->current_lang_abbr);
		$this->db->where('parent', 0);
		$this->db->order_by('ordering, id');
		
		$parent_menu = $this->db->get()->result_array();
		
		//Khoi tao stack
		$k = 0;
		$level = 0;
		$stack['lv'.$level] = array('data' => $parent_menu, '_key' => $k);
		
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
				$this->db->select('id, title, ordering, controller, link, alias, active, homepage, parent');
				$this->db->from('menu');
				$this->db->join('menu_lang', 'id = menu_id');
				$this->db->where('menu_group_id', $menu_id);
				$this->db->where('lang', $this->current_lang_abbr);
				$this->db->where('parent', $data_item['id']);
				$this->db->order_by('ordering, id');
				
				$child_menu = $this->db->get()->result_array();
				$k ++;
				
				//Kiem tra xem children co khong ?
				if( count($child_menu) > 0)
				{
					//Luu key hien tai vao ['_key']
					$stack['lv'.$level]['_key'] = $k;
					//Gan children vo stack
					$k = 0;
					$level ++;
					$stack['lv'.$level] = array('data' => $child_menu, '_key' => $k);
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
	 * Lay menu item theo menu_group_id va` language
	 * @return array
	 */
	public function get_item_by_menu_group_id_and_lang( $menu_id , $language )
	{
		$this->db->select('id, title, ordering, controller, link, alias, active, lang');
		$this->db->from('menu');
		$this->db->join('menu_lang', 'id = menu_id');
		$this->db->where('menu_group_id', $menu_id);
		$this->db->where('lang', $language);
		
		return $this->db->get()->result_array();
	}
	
	/*
	 * Lay tat ca menu item du` khac language
	 * @return array
	 */
	public function get_item_by_menu_group_id_non_lang( $group_id )
	{
		$this->db->select('menu.id, menu_lang.title, menu.ordering, controller, link, alias, menu.active, lang');
		$this->db->from('menu');
		$this->db->join('menu_lang', 'menu.id = menu_id');
		$this->db->where('menu_group_id', $group_id);
		
		return $this->db->get()->result_array();
	}
	
	/*
	 * kiem tra abbrev khong duoc tru`ng
	 * - Neu co' trong database return TRUE
	 * - Nguoc lai return FASLE
	 * @param : string
	 * @return true or false
	 */
	public function exist_abbrev($abbrev, $menu_id = FALSE)
	{
		$this->db->select('count(id) as num');
		$this->db->from('menu_group');
		if($menu_id)
		{
			$this->db->where('id !=', $menu_id);
		}
		$result = $this->db->where('abbrev', $abbrev)->get()->row_array();
		
		if($result['num'] == 1) return TRUE;
		
		return FALSE;
	}
	
	/*
	 * kiem tra alias khong duoc tru`ng
	 * - Neu co' trong database return TRUE
	 * - Nguoc lai return FASLE
	 * @param : string
	 * @return true or false
	 */
	public function exist_alias($alias, $lang = "", $menu_id = FALSE)
	{
		$this->db->select('count(menu_id) as num');
		$this->db->from('menu_lang');
		$this->db->where('lang', $lang);
		
		if($menu_id)
		{
			$this->db->where('menu_id !=', $menu_id);
		}
		
		$result = $this->db->where('alias', $alias)->get()->row_array();
		
		if($result['num'] == 1) return TRUE;
		
		return FALSE;
	}
	
	/*
	 * Kiem tra menu co menu con hay khong
	 * - Neu co' trong database return TRUE
	 * - Nguoc lai return FASLE
	 * @param : (int|array) menu_id
	 * @return true or false
	 */
	public function exist_menu_child($menu_id)
	{
		$this->db->select('count(menu_group_id) as num');
		$this->db->from('menu');
		if( is_array($menu_id) )
		{ 
			for($item = 0; $item < count($menu_id); $item++)
			{
				if($item == 0) $this->db->where('menu_group_id', $menu_id[$item]);
				else $this->db->or_where('menu_group_id', $menu_id[$item]);
			}
		}
		else
		{
			$this->db->where('menu_group_id', $menu_id);
		}
		
		$result = $this->db->get()->row_array(); 

		if( !empty($result['num']) ) return TRUE;
		
		return FALSE;
	}
	
	/*
	 * Xoa 1 hoac nhieu row group menu
	 * - Neu xoa thanh cong return TRUE
	 * - Nguoc lai return FASLE
	 * @param : (int|array)menu_id
	 * @return true or false
	 */
	public function delete_group_menu($menu_id)
	{
		if( is_array($menu_id) )
		{
			for($item = 0; $item < count($menu_id); $item++)
			{
				if($item == 0) $this->db->where('id', $menu_id[$item]);
				else $this->db->or_where('id', $menu_id[$item]);
			}
		}
		else
		{
			$this->db->where('id', $menu_id);
		}
		
		$this->db->delete('menu_group');
		
		return $this->db->affected_rows() >= 1;
	}
	
	/*
	 * Tao group_menu
	 * @param : string
	 * @param : string
	 * @return true or false
	 */
	public function create_group_menu($namemenu, $abbrev)
	{
		$this->db->set('name', $namemenu);
		$this->db->set('abbrev', $abbrev);
		$result = $this->db->insert('menu_group'); 
		
		return $result;
	}
	
	/*
	 * Tao group_menu
	 * @param : string
	 * @param : string
	 * @return true or false
	 */
	public function update_group_menu($menu_id, $namemenu, $abbrev)
	{
		$data = array(
               'name' => $namemenu,
               'abbrev' => $abbrev
            );
		
		$this->db->where('id', $menu_id);
		$result = $this->db->update('menu_group', $data);
		
		return $result;
	}
	
	/*
	 * active or un_active menu item
	 * @param : string
	 * @return true or false
	 */
	public function create_menu_item( $data )
	{
		////START TRANSACTION////
		$this->db->trans_begin();

		//Lay ordering
					$this->db->select('max(ordering) as ordering');
					$this->db->from('menu');
		$ordering = $this->db->where('parent', $data['parent'])->get()->row_array();
		
		if( $ordering ) $data['ordering'] = $ordering['ordering'] + 1;
		else $data['ordering'] = 1;
		
		//Insert thong tin chung
		$this->db->set('link', 			$data['link']);
		$this->db->set('browser_nav', 	$data['browser_nav']);
		$this->db->set('menu_group_id', $data['group_id']);
		$this->db->set('active', 		$data['active']);
		$this->db->set('ordering', 		$data['ordering']);
		$this->db->set('parent', 		$data['parent']);
		$this->db->insert('menu'); //do to insert menu
		
		//Get last id in table MENU
		$id = $this->db->insert_id();
		
		//Insert thong tin rieng cho tung language
		foreach( $data['lang'] as $item )
		{
			$this->db->set('menu_id', 	$id);
			$this->db->set('lang', 		$item['lang']);
			$this->db->set('title', 	$item['namemenu']);
			$this->db->set('alias', 	$item['alias']);
			$this->db->insert('menu_lang'); //do to insert menu_lang
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
	
	/*
	 * Tao group_menu
	 * @param : string
	 * @param : string
	 * @return true or false
	 */
	public function update_menu_item($data)
	{
		////START TRANSACTION////
		$this->db->trans_begin();
		
		//Insert thong tin chung
		$row = array(
			   'browser_nav' 	=> $data['browser_nav'],
			   'menu_group_id' 	=> $data['group_id'],
			   'active' 		=> $data['active'],
			   'ordering' 		=> $data['ordering'],
               'parent' 		=> $data['parent']
            );
        $this->db->where('id', $data['id']);
		$result = $this->db->update('menu', $row);
		
		//Insert thong tin rieng cho tung language
		foreach( $data['lang'] as $lang => $item )
		{
			$row = array(
			   'title' 	=> $item['namemenu'],
			   'alias' 	=> $item['alias']
            );
            $this->db->where('lang', $lang);
	        $this->db->where('menu_id', $data['id']);
			$result = $this->db->update('menu_lang', $row);
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
		
		return $result;
	}
	
	/*
	 * Xoa 1 hoac nhieu row menu_item
	 * - Neu xoa thanh cong return TRUE
	 * - Nguoc lai return FASLE
	 * @param : (int|array)menu_id
	 * @return true or false
	 */
	public function delete_menu_item($menu_id)
	{
		////START TRANSACTION////
		$this->db->trans_begin();
		
		//DELETE ROW IN "MENU" TABLE
		if( is_array($menu_id) )
		{
			for($item = 0; $item < count($menu_id); $item++)
			{
				if($item == 0) $this->db->where('id', $menu_id[$item]);
				else $this->db->or_where('id', $menu_id[$item]);
			}
		}
		else
		{
			$this->db->where('id', $menu_id);
		}
		$this->db->delete('menu');
		
		//DELETE ROW IN "MENU_LANG" TABLE
		if( is_array($menu_id) )
		{
			for($item = 0; $item < count($menu_id); $item++)
			{
				if($item == 0) $this->db->where('menu_id', $menu_id[$item]);
				else $this->db->or_where('menu_id', $menu_id[$item]);
			}
		}
		else
		{
			$this->db->where('menu_id', $menu_id);
		}
		$this->db->delete('menu_lang');
		
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
	 * active or un_active menu item
	 * @param : (int|array)menu_id
	 * @param : string
	 * @return true or false
	 */
	public function active_menu_item( $menu_id, $active = 0 )
	{
		if( is_array($menu_id) )
		{
			for($item = 0; $item < count($menu_id); $item++)
			{
				if($item == 0) $this->db->where('id', $menu_id[$item]);
				else $this->db->or_where('id', $menu_id[$item]);
			}
		}
		else
		{	
			$this->db->where('id', $menu_id);
		}
		
		$data = array(
               		'active' => $active
            	);
			
		$result = $this->db->update('menu', $data);
		return $result;
	}
	
	/*
	 * set homepage menu item
	 * @param : int
	 * @param : string
	 * @return true or false
	 */
	public function homepage_menu_item( $menu_id, $homepage = 0 )
	{
		if(! is_array($menu_id) )
		{
			if( is_numeric($homepage) === FALSE && $homepage != 1 )
			{
				return FALSE;
			}
			
			////START TRANSACTION////
			$this->db->trans_begin();
			
			//Set OLD homepage of menu_item == 0
					  $this->db->select('id');
					  $this->db->from('menu');
			$old_id = $this->db->where('homepage', 1)->get()->row_array();
			
			
			$this->db->where('id', $old_id['id']);
			$data = array(
               			'homepage' => 0
            		);
			$this->db->update('menu', $data);
			
			//Set NEW homepage of menu_item == 1
			$this->db->where('id', $menu_id);
			$data = array(
               			'homepage' => 1
            		);
			$this->db->update('menu', $data);
			
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
		
		return FALSE;
	}
	
	/*
	 * set save order menu item
	 * @param : array(int)
	 * @return true or false
	 */
	public function saveorder_menu_item( $list = array() )
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
				$this->db->update('menu', $data);
				
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
}
