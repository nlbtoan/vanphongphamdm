<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('show_nickchat')) {
	function show_nickchat() {
		$CI =& get_instance();
		
		$CI->db->select('nickchat, name');
		$CI->db->from('nickchat');
		$result = $CI->db->where('active', 1)->get()->result_array();
		
		$html = '<ul class="nickchat">';
		foreach($result as $item)
		{
			$nickchat = $item['nickchat'];
			$name = $item['name'];
			$html .= "<li><a href='ymsgr:sendim?$nickchat' title='$name'><img src='http://opi.yahoo.com/online?u=$nickchat&m=g&t=1' alt='' border=0/></a></li>";
		}
		
		$html .= "</ul>";
		
		return $html;
	}
}