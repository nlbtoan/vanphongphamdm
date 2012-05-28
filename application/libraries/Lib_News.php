<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'Lib_Controller.php';

class Lib_News extends Lib_Controller
{
	
	public function __construct() {
		parent:: __construct();
		
		$this->CI->load->model('news_model');
		
		$this->CI->lang->load('news');
	}
	
	/**
	 * add_category
	 *
	 * Them 1 category
	 *
	 * @param  array
	 * @return bool
	 **/
	public function create_category( $row )
	{
		if ($this->CI->news_model->create_category($row))
		{
			$this->set_message('creation_successful');
			return TRUE;
		}

		$this->set_error('creation_unsuccessful');
		return FALSE;
	}
	
	/**
	 * add_news
	 *
	 * Them 1 news
	 *
	 * @param  array
	 * @return bool
	 **/
	public function create_news( $row )
	{
		if ($this->CI->news_model->create_news($row))
		{
			$this->set_message('creation_successful');
			return TRUE;
		}

		$this->set_error('creation_unsuccessful');
		return FALSE;
	}
	
	/**
	 * update_category
	 *
	 * Them 1 category
	 *
	 * @param array
	 * @return bool
	 **/
	public function update_category($data)
	{
		if ($this->CI->news_model->update_category($data))
		{
			$this->set_message('update_successful');
			return TRUE;
		}

		$this->set_error('update_unsuccessful');
		return FALSE;
	}
	
	/**
	 * update_news
	 *
	 * Them 1 news
	 *
	 * @param array
	 * @return bool
	 **/
	public function update_news($data)
	{
		if ($this->CI->news_model->update_news($data))
		{
			$this->set_message('update_successful');
			return TRUE;
		}

		$this->set_error('update_unsuccessful');
		return FALSE;
	}
	
	/**
	 * delete_news_category
	 * 
	 * Delete mot category
	 *
	 * @param int
	 * @return array
	 **/
	public function delete_category( $cat_id )
	{
		if ( $this->CI->news_model->delete_category($cat_id) )
		{ 
			$this->set_message('delete_successful');
			return TRUE;
		}

		$this->set_error('delete_unsuccessful');
		return FALSE;
	}
	
	/**
	 * delete_news
	 * 
	 * Delete mot category
	 *
	 * @param int
	 * @return array
	 **/
	public function delete_news( $cat_id )
	{
		if ( $this->CI->news_model->delete_news($cat_id) )
		{ 
			$this->set_message('delete_successful');
			return TRUE;
		}

		$this->set_error('delete_unsuccessful');
		return FALSE;
	}
	
	/**
	 * active or un_active
	 * 
	 * active news category
	 *
	 * @param int
	 * @return array
	 **/
	public function active_category( $cat_id, $active )
	{
		if ( $this->CI->news_model->active_category($cat_id, $active) )
		{ 
			return TRUE;
		}
		return FALSE;
	}
	
	/**
	 * active or un_active
	 * 
	 * active news news
	 *
	 * @param int
	 * @return array
	 **/
	public function active_news( $id, $active )
	{
		if ( $this->CI->news_model->active_news($id, $active) )
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
	public function saveorder_category( $cat_id, $order )
	{
		if( is_array($cat_id) && is_array($order) )
		{
			if( count($cat_id) != count($order) ) return FALSE;
			
			$list = array();
			foreach( $cat_id as $k => $id )
			{
				$this->CI->db->select('parent');
				$this->CI->db->from('news_cat');
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
			
			if ( $this->CI->news_model->saveorder_category( $list ) )
			{ 
				return TRUE;
			}
		}//if
		return FALSE;
	}
	
	/**
	 * exist_category_child
	 * 
	 * Kiem tra category co' category con hay khong
	 * - Neu co return TRUE
	 * - Khong co return FALSE
	 *
	 * @param int
	 * @return array
	 **/
	public function exist_category_child( $cat_id )
	{
		if ( $this->CI->news_model->exist_category_child($cat_id) )
		{
			$this->set_error('news_category_have_child');
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
	public function exist_alias_category( $alias, $lang, $id = FALSE )
	{
		if($id) // Xay ra khi update
		{
			if ( $this->CI->news_model->exist_alias_category($alias, $lang, $id) )
			{
				$this->set_error('exist_alias|'.$lang);
				return TRUE;
			}
		}
		else if ( $this->CI->news_model->exist_alias_category($alias, $lang) )
		{
			$this->set_error('exist_alias|'.$lang);
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
	public function exist_alias_news( $alias, $lang, $id = FALSE )
	{
		if($id) // Xay ra khi update
		{
			if ( $this->CI->news_model->exist_alias_news($alias, $lang, $id) )
			{
				$this->set_error('exist_alias|'.$lang);
				return TRUE;
			}
		}
		else if ( $this->CI->news_model->exist_alias_news($alias, $lang) )
		{
			$this->set_error('exist_alias|'.$lang);
			return TRUE;
		}
		
		return FALSE;
	}
}