<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * - Ham nay lay ra Menu cua News(tin tu'c) theo dang html
 * - Hien thi theo level quy dinh
 * VD: level = 2 se hien thi ra cau truc phia duoi
 * 	<ul>
 * 		<li class="level_1">
 * 			Name Category
 * 		</li>
 * 		<li class="level_1">
 * 			Name Category
 * 			<ul>
 * 				<li class="level 2">
 *					Name Category
 * 				</li>
 * 			<ul>
 * 		</li>
 * 	</ul>
 * 
 * 	$attb = array(
 *		array( 'ul' => 'attribute ul 1', 'li' => 'attribute li 1'),
 *		array( 'ul' => 'attribute ul 2', 'li' => 'attribute li 2'),
 *		array( 'ul' => 'attribute ul 3', 'li' => 'attribute li 3')
 *	);
 * 
 * @name news_category
 * @param $level
 * @param $url
 * @return string 
 * 
 * author : Nguyen Quoc Trung
 */

function news_category( $parent_id = 0, $url = "", $level = 1 , $attb = array(), $level_start = 0 ){
	// Neu $level nho hon 1 thi` return
	if( $level < 1 ) return;
	// Khoi tao bien $attb
	if( !is_array($attb) ) $attb = array();
	// Kiem tra level duoc hien thi
	if( $level_start < $level )  $level_start++;
	else return;
	
	$html = "";
	// Lay list category
	$list_cat = get_cat_allByParentId($parent_id);
	
	if( count($list_cat) > 0 ){
		if( empty($attb[$level_start-1]['ul']) ) 
			$html = '<ul>';
		else 
			$html = '<ul ' . $attb[$level_start-1]['ul'] . '>';
			
		foreach( $list_cat as $cat ){
			if( $cat['is_category'] == 1 ){
				if( empty($attb[$level_start-1]['li']) ) 
					$html .= '<li>';
				else 
					$html .= '<li ' . $attb[$level_start-1]['li'] . '>';
					
				$html .= '<a href="' . $url . $cat['url'] . '">' . $cat['name'] . '</a>';
				$html .= news_category($cat['id'], $url, $level, $attb, $level_start);
				
				$html .= '</li>';
			}
			else{
				if( empty($attb[$level_start-1]['li']) ) 
					$html .= '<li>';
				else 
					$html .= '<li ' . $attb[$level_start-1]['li'] . '>';
				$html .= '<a href="' . $url . $cat['url'] . '">' . $cat['name'] . '</a>';
				$html .= '</li>';
			}
		}
		$html .= '</ul>';
		
		return $html;
	}
}

//Lay tat ca category child theo id cha
if( !function_exists("get_cat_allByParentId") ){
	function get_cat_allByParentId( $parent_id = 0 ){
		$lg = 'vn';
		$CI =& get_instance();
		
		$CI->db->select("*");
		$CI->db->from('news_cat');
		$CI->db->join('news_cat_lang', 'news_cat.id = news_cat_lang.cat_id');
		$CI->db->where('parent_id', $parent_id);
		$CI->db->where('is_enabled', 1);
		$CI->db->where('lang', $lg);
		
		return $CI->db->get()->result_array();
	}
}
?>