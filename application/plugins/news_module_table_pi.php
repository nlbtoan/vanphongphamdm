<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function news_module_table( $config = array()){
	if( empty($config) ){
		return;
	}
	
	$tag_info =  get_tag_info($config['tag_id']);
	if( !empty($tag_info['tag_id']) ){
		$list_news = get_news_byTagID($tag_info['tag_id'], $config['row']);
	}
	
	$html = '';
	if( !empty($list_news) ){
		if( $config['style_ul'] ) $html = '<ul ' . $config['style_ul'] . '>';
		else $html = '<ul>';
		
		foreach( $list_news as $news ){
			if( $config['style_li'] ) $html .= '<li ' . $config['style_li'] . '><a href="' . $config['url'] . $news['url'] . '">'. $news['title'] . '</a></li>';
			else $html .= '<li><a href="' . $config['url'] . $news['url'] . '">'. $news['title'] . '</a></li>';
		}
		$html .= '</ul>';
	}
	
	return $html;
}

if( !function_exists('get_news_byTagID') ){
	function get_news_byTagID( $tag_id = 0, $row = 5 ){
		$lg = 'vn';
		$CI =& get_instance();
		
		$CI->db->select('title, url');
		$CI->db->from('news_tags_news');
		$CI->db->join('news', 'news_tags_news.news_id = news.id');
		$CI->db->join('news_lang', 'news.id = news_lang.news_id');
		$CI->db->where('tags_id', $tag_id);
		$CI->db->where('lang', $lg);
		
		return $CI->db->get()->result_array();
	}
}

if( !function_exists('get_tag_info') ){
	function get_tag_info( $tag_id = 0 ){
		$lg = 'vn';
		$CI =& get_instance();
		
		$CI->db->select('*');
		$CI->db->from('news_tags');
		$CI->db->where('id', $tag_id);
		$CI->db->where('is_module', 1);
		$CI->db->where('is_enabled', 1);
		$CI->db->where('lang', $lg);
		
		return $CI->db->get()->row_array();
	}
}
