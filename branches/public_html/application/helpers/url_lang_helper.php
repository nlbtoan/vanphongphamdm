<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------

if ( ! function_exists('validate_lang'))
{
	function validate_lang($abbr) {
		$CI =& get_instance();
		return $CI->setting->validate_lang($abbr);
	}
}

/**
 * Site URL theo ngôn ngữ
 *
 * Tương tự như hàm site_url() và bổ sung thêm tính năng chỉ định ngôn ngữ.
 *
 * @access	public
 * @param	string $lang
 * @param 	string $uri
 * @return	string
 */
if ( ! function_exists('site_url_lang'))
{
	function site_url_lang($lang = '', $uri = '')
	{
		$CI =& get_instance();
		return $CI->config->site_url($uri, $lang);
	}
}

/**
 * Anchor Lang Link
 *
 * Tương tự anchor và bổ sung thêm tính năng chỉ định ngôn ngữ.
 *
 * @access	public
 * @param	string	the URL
 * @param	string	the link title
 * @param	mixed	any attributes
 * @return	string
 */
if ( ! function_exists('anchor_lang'))
{
	function anchor_lang($lang = '', $uri = '', $title = '', $attributes = '')
	{
		$title = (string) $title;

		if ( ! is_array($uri))
		{
			$site_url = ( ! preg_match('!^\w+://! i', $uri)) ? site_url_lang($lang, $uri) : $uri;
		}
		else
		{
			$site_url = site_url_lang($lang, $uri);
		}

		if ($title == '')
		{
			$title = $site_url;
		}

		if ($attributes != '')
		{
			$attributes = _parse_attributes($attributes);
		}

		return '<a href="'.$site_url.'"'.$attributes.'>'.$title.'</a>';
	}
}

/**
 * Anchor Link - Pop-up & Lang version
 *
 * Creates an anchor based on the local URL. The link
 * opens a new window based on the attributes specified.
 *
 * @access	public
 * @param	string	the URL
 * @param	string	the link title
 * @param	mixed	any attributes
 * @return	string
 */
if ( ! function_exists('anchor_popup_lang'))
{
	function anchor_popup_lang($lang = '', $uri = '', $title = '', $attributes = FALSE)
	{
		$title = (string) $title;

		$site_url = ( ! preg_match('!^\w+://! i', $uri)) ? site_url_lang($lang, $uri) : $uri;

		if ($title == '')
		{
			$title = $site_url;
		}

		if ($attributes === FALSE)
		{
			return "<a href='javascript:void(0);' onclick=\"window.open('".$site_url."', '_blank');\">".$title."</a>";
		}

		if ( ! is_array($attributes))
		{
			$attributes = array();
		}

		foreach (array('width' => '800', 'height' => '600', 'scrollbars' => 'yes', 'status' => 'yes', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0', ) as $key => $val)
		{
			$atts[$key] = ( ! isset($attributes[$key])) ? $val : $attributes[$key];
			unset($attributes[$key]);
		}

		if ($attributes != '')
		{
			$attributes = _parse_attributes($attributes);
		}

		return "<a href='javascript:void(0);' onclick=\"window.open('".$site_url."', '_blank', '"._parse_attributes($atts, TRUE)."');\"$attributes>".$title."</a>";
	}
}