<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('theme_url')) {	
	function theme_url($uri = '') {		
		$ci = &get_instance();
		if ($uri != '' && $uri[0] == '/') $uri = substr($uri, 1);		
		return base_url() . $ci->theme->get_theme_path() . $uri;
	}
}

if (! function_exists('load_js')) {
	function load_js($file, $attrs = array(), $late = false) {
		$s = '';
		$type = 'text/javascript';
		if (is_array($attrs)) {
			foreach ($attrs as $attr => $val) {
				if ($attr == 'type') $$attr = $val;				
				else $s .= " $attr=\"$val\"";				
			}		
		}
		$html = '<script type="'.$type.'" src="' . theme_url($file) . '"'.$s.'></script>';
		if ($late != false) {
			$ci = & get_instance();
			$ci->late_head[] = $html;
			return;
		}			
		echo $html . "\r\n";
	}
}

if (! function_exists('load_css')) {
	function load_css($file, $attrs = array(), $late = false) {
		$s = '';
		$media = 'screen';
		$rel = 'stylesheet';
		$type = 'text/css';
		if (is_array($attrs)) {
			foreach ($attrs as $attr => $val) {
				if ($attr == 'rel' || $attr == 'type' || $attr == 'media') $$attr = $val;				
				else $s .= " $attr=\"$val\"";			
			}
		}		
		$html = '<link rel="'.$rel.'" href="'. theme_url($file) .'" type="'.$type.'"'.$s.' media="'.$media.'" />';
		if ($late != false) {
			$ci = & get_instance();
			$ci->late_head[] = $html;
			return;
		}	
		echo $html. "\r\n";
	}
}
