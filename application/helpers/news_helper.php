<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('news_cat_url')) {
	function news_cat_url( $url = '' ) {
		$CI =& get_instance();
		return $CI->config->site_url($CI->uri->segment(1) . '/category/' . $url);
	}
}

if ( ! function_exists('news_url')) {
	function news_url($url = '') {
		$CI =& get_instance();
		if ($url != '')
			return $CI->config->site_url($CI->uri->segment(1) . '/detail/' . $url);
		return $CI->config->site_url($CI->uri->segment(1));
	}
}

if ( ! function_exists('comment_url')) {
	function comment_url($url = '') {
		$CI =& get_instance();
		if ($url != '')
			return $CI->config->site_url($CI->uri->segment(1) . '/comment_ajax/' . $url);
		return $CI->config->site_url($CI->uri->segment(1));
	}
}

if ( ! function_exists('category_combobox')) {
	function category_combobox($lang = FALSE, $selected = 0, $current_id = FALSE, $parent_id = 0, $space = '&nbsp;&nbsp;&nbsp;', $first = TRUE) {
		$CI = &get_instance();
		$lang_abbr = ($lang) ? $lang : $CI->setting->lang('abbr');
		
		$CI->db->select('id, name, alias, parent');
		$CI->db->from('news_cat');
		$CI->db->join('news_cat_lang', 'id = cat_id');
		$CI->db->order_by('ordering, id');
		$CI->db->where('lang', $lang_abbr);
		$CI->db->where('parent', $parent_id);
		if($current_id !== FALSE){
			$CI->db->where('id !=', $current_id);
		}
		
		$Main_Cbb_Query = $CI->db->get()->result_array();
		
		$html_content_combobox = ($first) ? "<option value='0'" . (($selected == 0) ? "selected='selected'" : "") . ">Top</option>" : "";
			
		$symbol = ($first) ? "" : "|-";
		
		//Get Content Main Menu
		foreach($Main_Cbb_Query as $Main_Cbb_Query_Results)
		{
			//Set main data
	        $Main_Cbb_ID        = $Main_Cbb_Query_Results['id'];
	        $Main_Cbb_Name      = $Main_Cbb_Query_Results['name'];
	        $Main_Cbb_Alias     = $Main_Cbb_Query_Results['alias'];
	        $Main_Cbb_Href      = site_url($Main_Cbb_Query_Results['alias']);
	        $Main_Cbb_Parent    = $Main_Cbb_Query_Results['parent'];

        	//Get Menu Children
        	$html_content_combobox .= "<option value='$Main_Cbb_ID'" . (($selected == $Main_Cbb_ID) ? "selected='selected'" : "") . ">$space $symbol $Main_Cbb_Name</option>";
        	$html_content_combobox .= category_combobox($lang_abbr, $selected, $current_id, $Main_Cbb_ID, $space.'&nbsp;&nbsp;&nbsp;', FALSE);
		}

    	return $html_content_combobox;
	}
}