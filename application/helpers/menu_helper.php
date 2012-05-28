<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('menu')) {
	function menu($abbrev, $parent_id = 0, $first = TRUE) 
	{
		$CI = &get_instance();
		$lang_abbr = $CI->setting->lang('abbr');
		
		$CI->db->select('menu_id, title, link, controller, alias, parent');
		$CI->db->from('menu_group');
		$CI->db->join('menu', 'menu.menu_group_id = menu_group.id');
		$CI->db->join('menu_lang', 'menu.id = menu_lang.menu_id');
		$CI->db->order_by('ordering, menu.id');
		$CI->db->where('menu_group.abbrev', $abbrev);
		$CI->db->where('menu_lang.lang', $CI->setting->lang('abbr'));
		$CI->db->where('menu.active', 1);
		$CI->db->where('parent', $parent_id);
		
		$Main_Nav_Query = $CI->db->get()->result_array();
		$html_content_menu = "";
		
		//Get Content Main Menu
		foreach($Main_Nav_Query as $Main_Nav_Query_Results) 
		{
			//Set main data
	        $Main_Nav_ID        = $Main_Nav_Query_Results['menu_id'];
	        $Main_Nav_Name      = $Main_Nav_Query_Results['title'];
	        $Main_Nav_Alias     = $Main_Nav_Query_Results['alias'];
	        $Main_Nav_Href      = site_url($Main_Nav_Query_Results['alias']);
	        $Main_Nav_Parent    = $Main_Nav_Query_Results['parent'];
            $Main_Nav_Link		= $Main_Nav_Query_Results['link'];
	        
                //Create the list items for each main level
	        if($Main_Nav_Link == '/' || $Main_Nav_Link == '#' || $Main_Nav_Link == '')
	        {
	        	$html_content_menu .= "\t\t\t\t<li><a href=\"#\">$Main_Nav_Name</a>";
	        }
	        else
	        {
	        	$html_content_menu .= "\t\t\t\t<li><a href=\"$Main_Nav_Href\">$Main_Nav_Name</a>";
	        }
        	
        	//Get Menu Children
        	$html_content_menu .= menu($abbrev, $Main_Nav_ID, FALSE);
        	
        	//Close the sub items
            $html_content_menu .= "</li>\n";
		}
		
		//Create Main Menu
		if($html_content_menu != "")
		{
			$html_menu = ($first == TRUE)? "<ul class=\"menu_horizontal\">\n" : "<ul>\n";
			$html_menu .= $html_content_menu;
			$html_menu .= "\t\t\t</ul>\n";        //Close the unordered list for the main items
			
			return $html_menu;
		}

    	return "";
	}
}


/**
 * parent_id : se mac dinh selected parent_id
 */

if ( ! function_exists('menu_combobox')) {
	function menu_combobox($group_id, $lang = FALSE, $selected = 0, $current_id = FALSE, $parent_id = 0, $space = '&nbsp;&nbsp;&nbsp;', $first = TRUE) {
		$CI = &get_instance();
		$lang_abbr = ($lang) ? $lang : $CI->setting->lang('abbr');
		
		$CI->db->select('menu_id, title, link, controller, alias, parent');
		$CI->db->from('menu_group');
		$CI->db->join('menu', 'menu.menu_group_id = menu_group.id');
		$CI->db->join('menu_lang', 'menu.id = menu_lang.menu_id');
		$CI->db->order_by('ordering, menu.id');
		$CI->db->where('menu_group.id', $group_id);
		$CI->db->where('menu_lang.lang', $lang_abbr);
		$CI->db->where('menu.active', 1);
		$CI->db->where('parent', $parent_id);
		
		if($current_id !== FALSE){
			$CI->db->where('menu.id !=', $current_id);
		}
		
		$Main_Cbb_Query = $CI->db->get()->result_array();
		
		$html_content_combobox = ($first) ? "<option value='0'" . (($selected == 0) ? "selected='selected'" : "") . ">Top</option>" : "";
		
		$symbol = ($first) ? "" : "|-";
		
		//Get Content Main Menu
		foreach($Main_Cbb_Query as $Main_Cbb_Query_Results)
		{
			//Set main data
	        $Main_Cbb_ID        = $Main_Cbb_Query_Results['menu_id'];
	        $Main_Cbb_Name      = $Main_Cbb_Query_Results['title'];
	        $Main_Cbb_Alias     = $Main_Cbb_Query_Results['alias'];
	        $Main_Cbb_Href      = site_url($Main_Cbb_Query_Results['alias']);
	        $Main_Cbb_Parent    = $Main_Cbb_Query_Results['parent'];

        	//Get Menu Children
        	$html_content_combobox .= "<option value='$Main_Cbb_ID'" . (($selected == $Main_Cbb_ID) ? "selected='selected'" : "") . ">$space $symbol $Main_Cbb_Name</option>";
        	$html_content_combobox .= menu_combobox($group_id, $lang_abbr, $selected, $current_id, $Main_Cbb_ID, $space.'&nbsp;&nbsp;&nbsp;', FALSE);
		}

    	return $html_content_combobox;
	}
}

/**
 * parent_id : se mac dinh selected parent_id
 */

if ( ! function_exists('tour_combobox')) {
	function tour_combobox($lang = FALSE, $selected = 0, $current_id = FALSE, $parent_id = 0, $space = '', $first = TRUE) {
		$CI = &get_instance();
		$lang_abbr = ($lang) ? $lang : $CI->setting->lang('abbr');
		
		$CI->db->select('*');
		$CI->db->from('tour_cat');
		$CI->db->join('tour_cat_lang', 'id = tour_cat_id');
		$CI->db->order_by('ordering, id');
		$CI->db->where('lang', $lang_abbr);
		$CI->db->where('is_enabled', 1);
		$CI->db->where('parent_id', $parent_id);
		
		if($current_id !== FALSE){
			$CI->db->where('id !=', $current_id);
		}
		
		$Main_Cbb_Query = $CI->db->get()->result_array();
		
		//$html_content_combobox = ($first) ? "<option value='0'" . (($selected == 0) ? "selected='selected'" : "") . ">Top</option>" : "";
		
		$symbol = ($first) ? "" : "|-";
		
		//Get Content Main Menu
		foreach($Main_Cbb_Query as $Main_Cbb_Query_Results)
		{
			//Set main data
	        $Main_Cbb_ID        = $Main_Cbb_Query_Results['id'];
	        $Main_Cbb_Name      = $Main_Cbb_Query_Results['name'];
	        $Main_Cbb_Alias     = $Main_Cbb_Query_Results['alias'];
	        $Main_Cbb_Href      = site_url($Main_Cbb_Query_Results['alias']);
	        $Main_Cbb_Parent    = $Main_Cbb_Query_Results['parent_id'];

        	//Get Menu Children
        	$html_content_combobox .= "<option value='$Main_Cbb_ID'" . (($selected == $Main_Cbb_ID) ? "selected='selected'" : "") . ">$space $symbol $Main_Cbb_Name</option>";
        	$html_content_combobox .= tour_combobox($lang_abbr, $selected, $current_id, $Main_Cbb_ID, $space.'&nbsp;&nbsp;&nbsp;', FALSE);
		}

    	return $html_content_combobox;
	}
}

//region
if ( ! function_exists('region_combobox')) {
	function region_combobox($lang = FALSE, $selected = 0, $current_id = FALSE, $parent_id = 0, $space = '&nbsp;&nbsp;&nbsp;', $first = TRUE) {
		$CI = &get_instance();
		$lang_abbr = ($lang) ? $lang : $CI->setting->lang('abbr');
		
		$CI->db->select('*');
		$CI->db->from('region');
		$CI->db->join('region_lang', 'region.id = region_lang.region_id');
		$CI->db->order_by('ordering, id');
		$CI->db->where('lang', $lang_abbr);
		$CI->db->where('active', 1);
		$CI->db->where('parent_id', $parent_id);
		
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

        	//Get Menu Children
        	$html_content_combobox .= "<option value='$Main_Cbb_ID'" . (($selected == $Main_Cbb_ID) ? "selected='selected'" : "") . ">$space $symbol $Main_Cbb_Name</option>";
        	$html_content_combobox .= region_combobox($lang_abbr, $selected, $current_id, $Main_Cbb_ID, $space.'&nbsp;&nbsp;&nbsp;', FALSE);
		}

    	return $html_content_combobox;
	}
}