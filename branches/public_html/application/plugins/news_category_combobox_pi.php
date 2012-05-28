<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * - Ham nay lay ra Menu cua News (tin tu'c) theo danh combobox cua form
 * - Hien thi theo level quy dinh
 * VD: level = 2 se hien thi ra cau truc phia duoi
 * 
 * 	<select name="menu" size="3" multiple>
 *      <option value="1">text option 1</option>
 *      <option value="2">text option 2</option>
 *      <option value="3">text option 3</option>
 *  </select>
 * 
 * - Ham su dung 2 ham ben trong news_model
 * 
 * @name news_category_combobox
 * @param $attributs
 * @return string 
 * 
 * author : Nguyen Quoc Trung
 */

function news_category_combobox( $attributs = "", $parent_id = 0 ){
	$html = "";
	$space = "-";
	$level = 1;
	
	$list_of_cat = get_cat_allByParentId( $parent_id );
	
	if( count($list_of_cat) > 0 ){
		$html = '<select ' . $attributs . '>';
		foreach( $list_of_cat as $cat ){
			$html .= '<option value="' . $cat['id'] . '">' . $space . ' [' . $level . ']' . $cat['name'] . '</option>';
			
			if( $cat['is_category'] == 1 )
				$html .= news_categoryChild_combobox($cat, $level, $space);
		}
		$html .= '</select>';
	}
	
	return $html;
}

function news_categoryChild_combobox($cat, $level = 0, $space = ""){
	//Neu Menu Main co' is_category == 0 thi` return la` ro~ng
	if( $cat['parent_id'] == 0 && $cat['is_category'] == 0 || !is_array($cat) )return;
	
	//Khai ba'o bien $html de tra ra html
	$html = "";
	$level++;
	$space .= "--";
	// Neu is_category == 1 thi lay thang child ben trong no
	if($cat['is_category'] == 1){
		//Lay tat ca category CON
		$list_of_cat = get_cat_allByParentId($cat['id']);
		
		if( count($list_of_cat) > 0 ){
			foreach( $list_of_cat as $cat_child ){
				$html .= '<option value="' . $cat_child['id'] . '">' . $space . ' [' . $level . ']' . $cat_child['name'] . '</option>';
				$html .= news_categoryChild_combobox($cat_child, $level, $space);
			}
		}
		return $html;
	}
}

//Lay tat ca category child theo id cha
if( !function_exists("get_cat_allByParentId") ){
	function get_cat_allByParentId( $parent_id ){
		$lg = 'en';
		$CI =& get_instance();
		
		$CI->db->select('*');
		$CI->db->from('news_cat');
		$CI->db->join('news_cat_lang', 'news_cat.id = news_cat_lang.cat_id');
		$CI->db->where('parent_id', $parent_id);
		$CI->db->where('is_enabled', 1);
		$CI->db->where('lang', $lg);
		
		return $CI->db->get()->result_array();
	}
}
?>
