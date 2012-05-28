<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'Lib_Controller.php';

class Lib_Menu extends Lib_Controller
{
	public function __construct() {
		parent::__construct();
		
		$this->CI->load->model('menu_model');
		
		$this->CI->lang->load('menu');
	}
	
	/**
	 * add_group_menu
	 *
	 * Them 1 group menu
	 *
	 * @param string
	 * @param string
	 * @return bool
	 **/
	public function create_group_menu($namemenu, $abbrev)
	{
		if ($this->CI->menu_model->create_group_menu($namemenu, $abbrev))
		{
			$this->set_message('menu_creation_successful');
			return TRUE;
		}

		$this->set_error('menu_creation_unsuccessful');
		return FALSE;
	}
	
	/**
	 * add_menu_item
	 *
	 * Them 1 menu item
	 *
	 * @param  array
	 * @return bool
	 **/
	public function create_menu_item( $row )
	{
		if ($this->CI->menu_model->create_menu_item($row))
		{
			$this->set_message('menu_creation_successful');
			return TRUE;
		}

		$this->set_error('menu_creation_unsuccessful');
		return FALSE;
	}
	
	/**
	 * update_group_menu
	 *
	 * Them 1 group menu
	 *
	 * @param string
	 * @param string
	 * @return bool
	 **/
	public function update_group_menu($menu_id, $namemenu, $abbrev)
	{
		if ($this->CI->menu_model->update_group_menu($menu_id, $namemenu, $abbrev))
		{
			$this->set_message('menu_update_successful');
			return TRUE;
		}

		$this->set_error('menu_update_unsuccessful');
		return FALSE;
	}
	
	/**
	 * exist_abbrev
	 * 
	 * Kiem tra abbrev co' trong database khong
	 * - Neu co return TRUE
	 * - Khong co return FALSE
	 *
	 * @param string
	 * @return array
	 **/
	public function exist_abbrev( $abbrev, $menu_id = FALSE )
	{
		if($menu_id) // Xay ra khi update menu
		{
			if ( $this->CI->menu_model->exist_abbrev($abbrev, $menu_id) )
			{ 
				$this->set_error('exist_abbrev');
				return TRUE;
			}
		}
		else if ( $this->CI->menu_model->exist_abbrev($abbrev) )
		{
			$this->set_error('exist_abbrev');
			return TRUE;
		}
		
		return FALSE;
	}
	
	/**
	 * exist_alias
	 * 
	 * Kiem tra alias co' trong database khong
	 * - Neu co return TRUE
	 * - Khong co return FALSE
	 *
	 * @param string
	 * @return array
	 **/
	public function exist_alias( $alias, $lang = "", $menu_id = FALSE )
	{
		if($menu_id) // Xay ra khi update menu item
		{
			if ( $this->CI->menu_model->exist_alias($alias, $lang, $menu_id) )
			{
				$this->set_error('exist_alias|'.$lang);
				return TRUE;
			}
		}
		else if ( $this->CI->menu_model->exist_alias($alias, $lang) )
		{ 
			$this->set_error('exist_alias|'.$lang);
			return TRUE;
		}
		
		return FALSE;
	}
	
	/**
	 * exist_menu_child
	 * 
	 * Kiem tra menu co' menu con hay khong
	 * - Neu co return TRUE
	 * - Khong co return FALSE
	 *
	 * @param int
	 * @return array
	 **/
	public function exist_menu_child( $menu_id )
	{
		if ( $this->CI->menu_model->exist_menu_child($menu_id) )
		{
			$this->set_error('menu_have_child');
			return TRUE;
		}
		
		return FALSE;
	}
	
	/**
	 * update_group_menu
	 *
	 * Them 1 group menu
	 *
	 * @param string
	 * @param string
	 * @return bool
	 **/
	public function update_menu_item($data)
	{
		if ($this->CI->menu_model->update_menu_item($data))
		{
			$this->set_message('menu_update_successful');
			return TRUE;
		}

		$this->set_error('menu_update_unsuccessful');
		return FALSE;
	}
	
	/**
	 * delete_group_menu
	 * 
	 * Delete mot menu
	 *
	 * @param int
	 * @return array
	 **/
	public function delete_group_menu( $menu_id )
	{
		if ( $this->CI->menu_model->delete_group_menu($menu_id) )
		{ 
			$this->set_message('menu_delete_successful');
			return TRUE;
		}

		$this->set_error('menu_delete_unsuccessful');
		return FALSE;
	}
	
	/**
	 * active or un_active
	 * 
	 * Delete mot menu
	 *
	 * @param int
	 * @return array
	 **/
	public function active_menu_item( $menu_id, $active )
	{
		if ( $this->CI->menu_model->active_menu_item($menu_id, $active) )
		{ 
			return TRUE;
		}
		return FALSE;
	}
	
	/**
	 * homepage
	 * 
	 * Set homepage
	 *
	 * @param int
	 * @return array
	 **/
	public function homepage_menu_item( $menu_id, $homepage )
	{
		if ( $this->CI->menu_model->homepage_menu_item($menu_id, $homepage) )
		{ 
			return TRUE;
		}
		return FALSE;
	}
	
	/**
	 * homepage
	 * 
	 * Set homepage
	 *
	 * @param int
	 * @return array
	 **/
	public function saveorder_menu_item( $menu_id, $order )
	{
		if( is_array($menu_id) && is_array($order) )
		{
			if( count($menu_id) != count($order) ) return FALSE;
			
			$list = array();
			foreach( $menu_id as $k => $id )
			{
				$this->CI->db->select('parent');
				$this->CI->db->from('menu');
				$parent = $this->CI->db->where('id', $id)->get()->row_array();
				
				if(! empty($parent) )
				{
					$list[ $parent['parent'] ][] = array( 'id' => $id, 'ordering' => $order[$k] );
				}
				
			}
			
			//Sap Xep
			foreach( $list as $parent => $list_item )
			{
				$list[$parent] = $this->order_array_num($list_item, 'ordering');
			}
			
			if ( $this->CI->menu_model->saveorder_menu_item( $list ) )
			{ 
				return TRUE;
			}
		}//if
		return FALSE;
	}
	
	/**
	 * delete
	 * 
	 * Delete mot menu
	 *
	 * @param int
	 * @return array
	 **/
	public function delete_menu_item( $menu_id )
	{
		if ( $this->CI->menu_model->delete_menu_item($menu_id) )
		{ 
			return TRUE;
		}
		return FALSE;
	}
}