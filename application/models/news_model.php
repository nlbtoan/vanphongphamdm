<?php

class News_model extends MY_Model
{
	public function __construct() {
		parent::__construct();
	}
	
	/*
	 * - Lay tat ca category
	 * - Theo language
	 * @return array
	 */
	public function get_cat_all( &$count = 0, $limit = FALSE, $offset = FALSE)
	{
		$this->benchmark->mark('my_mark_start');
		$this->db->select('id, name, ordering, alias, active, parent');
		$this->db->from('news_cat');
		$this->db->join('news_cat_lang', 'id = cat_id');
		$this->db->where('lang', $this->current_lang_abbr);
		$this->db->where('parent', 0);
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
				$this->db->select('id, name, ordering, alias, active, parent');
				$this->db->from('news_cat');
				$this->db->join('news_cat_lang', 'id = cat_id');
				$this->db->where('lang', $this->current_lang_abbr);
				$this->db->where('parent', $data_item['id']);
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
		$this->benchmark->mark('my_mark_end');
		//die($this->benchmark->elapsed_time());
		//die($this->benchmark->memory_usage());
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
	 * - Lay tat ca category (Khong phan trang)
	 * - Theo language
	 * @return array
	 */
	public function get_cat_all_no_paging()
	{
		$this->db->select('id, name, ordering, alias, active, parent');
		$this->db->from('news_cat');
		$this->db->join('news_cat_lang', 'id = cat_id');
		$this->db->where('lang', $this->current_lang_abbr);
		$this->db->where('parent', 0);
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
				$this->db->select('id, name, ordering, alias, active, parent');
				$this->db->from('news_cat');
				$this->db->join('news_cat_lang', 'id = cat_id');
				$this->db->where('lang', $this->current_lang_abbr);
				$this->db->where('parent', $data_item['id']);
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
	
	/*
	 * Lay thong tin menu item
	 * @return array
	 */
	public function get_category_info($id = 0)
	{
		$this->db->select('*');
		$this->db->from('news_cat');
		$cat = $this->db->where('id', $id)->get()->row_array();
		
		$this->db->select('lang, name, alias');
		$this->db->from('news_cat_lang');
		$cat_lang = $this->db->where('cat_id', $id)->get()->result_array();
		
		$data = $cat;
		foreach($cat_lang as $cat_item)
		{
			$lang = $cat_item['lang'];
			unset($cat_item['lang']);
			
			foreach($cat_item as $k => $item)
			{
				$data[$lang."_".$k] = $item;
			}
		}
		
		return $data;
	}
	
	/*
	 * Lay thong tin menu item
	 * @return array
	 */
	public function get_news_info($id = 0)
	{
		$this->db->select('id, date, image, cat_id, active');
		$this->db->from('news');
		$news = $this->db->where('id', $id)->get()->row_array();
		
		$this->db->select('lang, title, alias, summary, content');
		$this->db->from('news_lang');
		$news_lang = $this->db->where('news_id', $id)->get()->result_array();
		
		$data = $news;
		foreach($news_lang as $news_item)
		{
			$lang = $news_item['lang'];
			unset($news_item['lang']);
			
			foreach($news_item as $k => $item)
			{
				$data[$lang."_".$k] = $item;
			}
		}
		
		return $data;
	}
	
	/*
	 * Lay thong tin menu item
	 * @return array
	 */
	public function get_news($id = 0)
	{
		$this->db->select('*');
		$this->db->from('news_lang');
		$this->db->where('lang', $this->current_lang_abbr);
		$news = $this->db->where('news_id', $id)->get()->row_array();
		
		return $news;
	}
	
	/*
	 * create category
	 * @param : string
	 * @return true or false
	 */
	public function create_category( $data )
	{
		////START TRANSACTION////
		$this->db->trans_begin();

		//Lay ordering
					$this->db->select('max(ordering) as ordering');
					$this->db->from('news_cat');
		$ordering = $this->db->where('parent', $data['parent'])->get()->row_array();
		
		if( $ordering ) $data['ordering'] = $ordering['ordering'] + 1;
		else $data['ordering'] = 1;
		
		//Insert thong tin chung
		$this->db->set('browser_nav', 	$data['browser_nav']);
		$this->db->set('active', 		$data['active']);
		$this->db->set('ordering', 		$data['ordering']);
		$this->db->set('parent', 		$data['parent']);
		$this->db->insert('news_cat'); //do to insert category
		
		//Get last id in table MENU
		$id = $this->db->insert_id();
		
		//Insert thong tin rieng cho tung language
		foreach( $data['lang'] as $item )
		{
			$this->db->set('cat_id', 	$id);
			$this->db->set('lang', 		$item['lang']);
			$this->db->set('name', 	$item['name']);
			$this->db->set('alias', 	$item['alias']);
			$this->db->insert('news_cat_lang'); //do to insert menu_lang
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
	 * create news
	 * @param : string
	 * @return true or false
	 */
	public function create_news( $data )
	{
		////START TRANSACTION////
		$this->db->trans_begin();
		
		//Insert thong tin chung
		$this->db->set('date',	 	time()-3600);
		$this->db->set('image', 	$data['image']);
		$this->db->set('cat_id', 	$data['cat_id']);
		$this->db->set('active', 	$data['active']);
		$this->db->insert('news'); //do to insert category
		
		//Get last id in table MENU
		$id = $this->db->insert_id();
		
		//Insert thong tin rieng cho tung language
		foreach( $data['lang'] as $item )
		{
			$this->db->set('news_id', 	$id);
			$this->db->set('lang', 		$item['lang']);
			$this->db->set('title', 	$item['title']);
			$this->db->set('alias', 	$item['alias']);
			$this->db->set('summary', 	$item['summary']);
			$this->db->set('content', 	$item['content']);
			$this->db->insert('news_lang'); //do to insert news_lang
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
	 * Tao category
	 * @param : string
	 * @param : string
	 * @return true or false
	 */
	public function update_category($data)
	{
		////START TRANSACTION////
		$this->db->trans_begin();
		
		//Insert thong tin chung
		$row = array(
			   'browser_nav' 	=> $data['browser_nav'],
			   'active' 		=> $data['active'],
			   'ordering' 		=> $data['ordering'],
               'parent' 		=> $data['parent']
            );
        $this->db->where('id', $data['id']);
		$result = $this->db->update('news_cat', $row);
		
		//Insert thong tin rieng cho tung language
		foreach( $data['lang'] as $lang => $item )
		{
			$row = array(
			   'name' 	=> $item['name'],
			   'alias' 	=> $item['alias']
            );
            $this->db->where('lang', $lang);
	        $this->db->where('cat_id', $data['id']);
			$result = $this->db->update('news_cat_lang', $row);
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
	 * cap nhat news
	 * @param : array
	 * @return true or false
	 */
	public function update_news($data)
	{
		////START TRANSACTION////
		$this->db->trans_begin();
		
		//Insert thong tin chung
		$row = array(
			   'image' 		=> $data['image'],
			   'cat_id' 	=> $data['cat_id'],
			   'active' 	=> $data['active']
            );
        $this->db->where('id', $data['id']);
		$result = $this->db->update('news', $row);
		
		//Insert thong tin rieng cho tung language
		foreach( $data['lang'] as $lang => $item )
		{
			$row = array(
			   	'title' 	=> $item['title'],
			   	'alias' 	=> $item['alias'],
				'summary' 	=> $item['summary'],
				'content' 	=> $item['content']
            );
            $this->db->where('lang', $lang);
	        $this->db->where('news_id', $data['id']);
			$result = $this->db->update('news_lang', $row);
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
	 * Xoa 1 hoac nhieu row category
	 * - Neu xoa thanh cong return TRUE
	 * - Nguoc lai return FASLE
	 * @param : (int|array)_id
	 * @return true or false
	 */
	public function delete_category($cat_id)
	{
		////START TRANSACTION////
		$this->db->trans_begin();
		
		//DELETE ROW IN "NEWS_CAT" TABLE
		if( is_array($cat_id) )
		{
			for($item = 0; $item < count($cat_id); $item++)
			{
				if($item == 0) $this->db->where('id', $cat_id[$item]);
				else $this->db->or_where('id', $cat_id[$item]);
			}
		}
		else
		{
			$this->db->where('id', $cat_id);
		}
		$this->db->delete('news_cat');
		
		//DELETE ROW IN "NEWS_CAT_LANG" TABLE
		if( is_array($cat_id) )
		{
			for($item = 0; $item < count($cat_id); $item++)
			{
				if($item == 0) $this->db->where('cat_id', $cat_id[$item]);
				else $this->db->or_where('cat_id', $cat_id[$item]);
			}
		}
		else
		{
			$this->db->where('cat_id', $cat_id);
		}
		$this->db->delete('news_cat_lang');
		
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
	 * Xoa 1 hoac nhieu row news
	 * - Neu xoa thanh cong return TRUE
	 * - Nguoc lai return FASLE
	 * @param : (int|array)_id
	 * @return true or false
	 */
	public function delete_news($id)
	{
		////START TRANSACTION////
		$this->db->trans_begin();
		
		//DELETE ROW IN "NEWS" TABLE
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
		$this->db->delete('news');
		
		//DELETE ROW IN "NEWS_LANG" TABLE
		if( is_array($id) )
		{
			for($item = 0; $item < count($id); $item++)
			{
				if($item == 0) $this->db->where('news_id', $id[$item]);
				else $this->db->or_where('news_id', $id[$item]);
			}
		}
		else
		{
			$this->db->where('news_id', $id);
		}
		$this->db->delete('news_lang');
		
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
	 * active or un_active  item
	 * @param : (int|array)_id
	 * @param : string
	 * @return true or false
	 */
	public function active_category( $cat_id, $active = 0 )
	{
		if( is_array($cat_id) )
		{
			for($item = 0; $item < count($cat_id); $item++)
			{
				if($item == 0) $this->db->where('id', $cat_id[$item]);
				else $this->db->or_where('id', $cat_id[$item]);
			}
		}
		else
		{	
			$this->db->where('id', $cat_id);
		}
		
		$data = array(
               		'active' => $active
            	);
			
		$result = $this->db->update('news_cat', $data);
		return $result;
	}
	
	/*
	 * active or un_active  item
	 * @param : (int|array)_id
	 * @param : string
	 * @return true or false
	 */
	public function active_news( $id, $active = 0 )
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
			
		$result = $this->db->update('news', $data);
		return $result;
	}
	
	/*
	 * set save order news category
	 * @param : array(int)
	 * @return true or false
	 */
	public function saveorder_category( $list = array() )
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
				$this->db->update('news_cat', $data);
				
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
	
	/*
	 * - Lay tat ca news trong category
	 * - Theo language
	 * @return array
	 */
	public function get_news_by_cat($cat_id, &$count = 0, $limit = FALSE, $offset = FALSE)
	{
		$this->db->start_cache();
		$this->db->select('*');
		$this->db->from('news');
		$this->db->join('news_lang', 'id = news_id');
		$this->db->where('cat_id', $cat_id);
		$this->db->where('lang', $this->current_lang_abbr);
		$this->db->order_by('date, id');
		
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
	 * Kiem tra category co category_child hay khong
	 * - Neu co' trong database return TRUE
	 * - Nguoc lai return FASLE
	 * @param : (int|array) cat_id
	 * @return true or false
	 */
	public function exist_category_child($cat_id)
	{
		$this->db->select('is_category');
		$this->db->from('news_cat');
		if( is_array($cat_id) )
		{ 
			for($item = 0; $item < count($cat_id); $item++)
			{
				if($item == 0) $this->db->where('id', $cat_id[$item]);
				else $this->db->or_where('id', $cat_id[$item]);
			}
		}
		else
		{
			$this->db->where('id', $cat_id);
		}
		
		$result = $this->db->get()->row_array(); 

		if( $result['is_category'] == 1 ) return TRUE;
		
		return FALSE;
	}
	
	/*
	 * kiem tra alias khong duoc tru`ng
	 * - Neu co' trong database return TRUE
	 * - Nguoc lai return FASLE
	 * @param : string
	 * @return true or false
	 */
	public function exist_alias_category($alias, $lang, $id = FALSE)
	{
		$this->db->select('count(cat_id) as num');
		$this->db->from('news_cat_lang');
		$this->db->where('lang', $lang);
		
		if($id)
		{
			$this->db->where('cat_id !=', $id);
		}
		
		$result = $this->db->where('alias', $alias)->get()->row_array();
		
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
	public function exist_alias_news($alias, $lang, $id = FALSE)
	{
		$this->db->select('count(news_id) as num');
		$this->db->from('news_lang');
		$this->db->where('lang', $lang);
		
		if($id)
		{
			$this->db->where('news_id !=', $id);
		}
		
		$result = $this->db->where('alias', $alias)->get()->row_array();
		
		if($result['num'] == 1) return TRUE;
		
		return FALSE;
	}
	
	/*
	 * - Lay tat ca news trong category
	 * - Theo language
	 * @return array
	 */
	public function get_news_all(&$count = 0, $limit = FALSE, $offset = FALSE)
	{
		$this->db->start_cache();
		$this->db->select('*');
		$this->db->from('news');
		$this->db->join('news_lang', 'id = news_id');
		$this->db->where('lang', $this->current_lang_abbr);
		$this->db->where('active', 1);
		$this->db->order_by('date, id');
		
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
}