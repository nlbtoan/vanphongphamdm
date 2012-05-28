<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function tag_cloud( $url = "" ){
	$html = '';
	$tags = get_tag_all();
	$description = ' bài viết liên quan tới từ khóa ';
	$font_percent = 100;
	
	if( count($tags) > 0 ){
		foreach( $tags as $tag ){
			if( ($number = count_news_in_tag( $tag['id'] )) > 0 ){
				$increase_percent = 0;
				
				if( $number >= 5  ){
					$increase_percent = ($number - 4) * 5;
					if($increase_percent > 150) $increase_percent = 150;
				}
				
				$increase_percent = $increase_percent + $font_percent;
				$html .= '<a href="' . $url . $tag['url'] . '" style="font-size:' . $increase_percent . '%" title="' . $number . $description . '"' . $tag['name'] . '/"">' . $tag['name'] . '</a>';
			}
		}
	}
	return $html;
}

//Lay tat ca category child theo id cha
if( !function_exists("count_news_in_tag") ){
	function count_news_in_tag( $tags_id ){
		$lg = 'vn';
		$CI =& get_instance();
		
		$CI->db->select('count(tags_id) as "number"');
		$CI->db->from('news_tags_news');
		$CI->db->where('tags_id', $tags_id);
		
		$number = $CI->db->get()->row_array();
		return $number['number'];
	}
}

if( !function_exists("get_tag_all") ){
	function get_tag_all(){
		$lg = 'vn';
		$CI =& get_instance();
		
		$CI->db->select("id, name, url");
		$CI->db->from('news_tags');
		$CI->db->join('news_tags_lang', 'news_tags.id = news_tags_lang.tags_id');
		$CI->db->where('is_enabled', 1);
		$CI->db->where('is_module', 0);
		$CI->db->where('lang', $lg);
		
		return $CI->db->get()->result_array();
	}
}
