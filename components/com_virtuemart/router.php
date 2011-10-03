<?php
/*------------------------------------------------------------------------
# vm_sef - Search Engine Friendly URL's for Virtuemart
# ------------------------------------------------------------------------
# author    Jeremy Magne
# copyright Copyright (C) 2010 Daycounts.com. All Rights Reserved.
# Websites: http://www.daycounts.com
# Technical Support: http://www.daycounts.com/en/contact/
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# See http://daycounts.com/ for details
# @version 1.4.4
-------------------------------------------------------------------------*/

defined( '_JEXEC' ) or die( 'Restricted access - vm_sef free v1.5.3' );

if (!function_exists('print_a')) { 
	function print_a($subject){
		echo str_replace("=>","&#8658;",str_replace("Array","<font color=\"red\"><b>Array</b></font>",nl2br(str_replace(" "," &nbsp; ",print_r($subject,true)))));
	}
} 




function virtuemartBuildRoute(&$query)
{
	
    jimport('joomla.filter.output');
	require_once (JPATH_ADMINISTRATOR.DS.'components'.DS.'com_vm_sef'.DS.'classes'.DS.'config.php');
	$segments = array();

	$debug = JRequest::getVar('debug',false);
	
	$SefConfig = new SefConfig();
	if (!$SefConfig->is_active && !$debug) return $segments;
	
	$sef = "";
    $db =& JFactory::getDBO();
    jimport('joomla.filter.output');

	if (isset($query['task']))	{
		$segments[] = $query['task'];
		unset($query['task']);
		$sef .= 't';
	}
	//print_a($query);
	if(isset($query['page']))	{
		switch($query['page']) {
			case "shop.browse":				
				$segments[] = "browse";
				unset($query['page']);
				$sef .= 'h';
				break;
			case "shop.product_details":	
				$segments[] = "detail";
				unset($query['page']);
				$sef .= 'h';
				break;
			case "account.index":			
				$segments[] = "account";
				unset($query['page']);
				$sef .= 'h';
				break;
			case "shop.cart":				
				$segments[] = "cart";
				unset($query['page']);
				$sef .= 'h';
				break;
			case "checkout.index":			
				$segments[] = "checkout";
				unset($query['page']);
				$sef .= 'h';
				break;
			case "checkout.thankyou":		
				$segments[] = "thankyou";
				unset($query['page']);
				$sef .= 'h';
				break;
			case "account.order_details":	
				$segments[] = "order_details";
				unset($query['page']);
				$sef .= 'h';
				break;
			case "shop.search":				
				$segments[] = "search";
				unset($query['page']);
				$sef .= 'h';
				break;
			case "shop.parameter_search":	
				$segments[] = "search_param";
				unset($query['page']);
				$sef .= 'h';
				break;
			case "shop.downloads":			
				$segments[] = "downloads";
				unset($query['page']);
				$sef .= 'h';
				break;
			case "account.billing":			
				$segments[] = "billing";
				unset($query['page']);
				$sef .= 'h';
				break;
			case "account.shipto":			
				$segments[] = "shipto";
				unset($query['page']);
				$sef .= 'h';
				break;
			default:						
		}
	}
	if(isset($query['category_id']))	{
		if ($SefConfig->rewrite_mode == 'full') {
			$q = "SELECT category_id, category_name from #__vm_category WHERE category_id = ".(int)$query['category_id'];
			$db->setQuery($q);
			$category = $db->loadObject();
			$cat_title = JFilterOutput::stringURLSafe($category->category_name);
			$segments[] = $query['category_id']."-".$cat_title;
		} else {
			$segments[] = $query['category_id'];
		}
		unset($query['category_id']);
		$sef .= 'c';
	}
	if(isset($query['flypage']))	{
		$flypage = str_replace(".tpl","",$query['flypage']);
		$flypage = str_replace("-","|",$flypage);
		$segments[] = $flypage;
		unset($query['flypage']);
		$sef .= 'f';
	}
	if(isset($query['product_id']))	{
		if ($SefConfig->rewrite_mode == 'full') {
			$q = "SELECT product_id, product_name from #__vm_product WHERE product_id = ".(int)$query['product_id'];
			$db->setQuery($q);
			$prod = $db->loadObject();
			$prod_title = JFilterOutput::stringURLSafe($prod->product_name);
			$segments[] = $query['product_id']."-".$prod_title;
		} else {
			$segments[] = $query['product_id'];
		}
		unset($query['product_id']);
		$sef .= 'p';
	}
	if(isset($query['manufacturer_id']))	{
		if ($SefConfig->rewrite_mode == 'full') {
			$q = "SELECT manufacturer_id, mf_name from #__vm_manufacturer WHERE manufacturer_id = ".(int)$query['manufacturer_id'];
			$db->setQuery($q);
			$manufacturer = $db->loadObject();
			$mf_title = JFilterOutput::stringURLSafe($manufacturer->mf_name);
			$segments[] = $query['manufacturer_id']."-".$mf_title;
		} else {
			$segments[] = $query['manufacturer_id'];
		}
		unset($query['manufacturer_id']);
		$sef .= 'm';
	}
	if(isset($query['vendor_id']))	{
		if ($SefConfig->rewrite_mode == 'full') {
			$q = "SELECT vendor_id, vendor_name from #__vm_vendor WHERE vendor_id = ".(int)$query['vendor_id'];
			$db->setQuery($q);
			$vendor = $db->loadObject();
			$vendor_title = JFilterOutput::stringURLSafe($vendor->vendor_name);
			$segments[] = $query['vendor_id']."-".$vendor_title;
		} else {
			$segments[] = $query['vendor_id'];
		}
		unset($query['vendor_id']);
		$sef .= 'v';
	}
	if(isset($query['ssl_redirect']))	{
		$segments[] = $query['ssl_redirect'];
		unset($query['ssl_redirect']);
		$sef .= 's';
	}
	if(isset($query['order_id']))	{
		$segments[] = $query['order_id'];
		unset($query['order_id']);
		$sef .= 'o';
	}
	if ($sef)
		$query['sef']=$sef;
	return $segments;
}

function virtuemartParseRoute($segments)
{

	require_once (JPATH_ADMINISTRATOR.DS.'components'.DS.'com_vm_sef'.DS.'classes'.DS.'config.php');
	$vars = array();

	$debug = JRequest::getVar('debug',false);
	$SefConfig = new SefConfig();
	if (!$SefConfig->is_active && !$debug) return $vars;

	$sef = $_REQUEST['sef'];


	$i = strpos($sef,'t');
	if (isset($i))	$vars['task'] 		= $segments[$i];
	$i = strpos($sef,'h');
	if (isset($i)) {
		switch($segments[$i]) {
			case "browse": $vars['page'] 		= "shop.browse";				break;
			case "detail": $vars['page'] 			= "shop.product_details";	break;
			case "account": $vars['page'] 		= "account.index";				break;
			case "cart": $vars['page'] 			= "shop.cart";					break;
			case "checkout": $vars['page'] 		= "checkout.index";			break;
			case "thankyou": $vars['page'] 		= "checkout.thankyou";		break;
			case "order_details": $vars['page']	= "account.order_details";	break;
			case "search": $vars['page']		= "shop.search";				break;
			case "search_param": $vars['page']	= "shop.parameter_search";	break;
			case "downloads": $vars['page']		= "shop.downloads";			break;
			case "billing": $vars['page']		= "account.billing";			break;
			case "shipto": $vars['page']		= "account.shipto";			break;
			default: $vars['page'] 				= $segments[$i];
		}
	}
	$i = strpos($sef,'s');
	if (isset($i) && is_numeric($i))	$vars['ssl_redirect'] 	= $segments[$i];
	$i = strpos($sef,'c');
	if (isset($i) && is_numeric($i))	$vars['category_id'] 	= $segments[$i];
	$i = strpos($sef,'o');
	if (isset($i) && is_numeric($i))	$vars['order_id'] 	= $segments[$i];
	$i = strpos($sef,'f');
	if (isset($i) && is_numeric($i)) {
		$flypage = str_replace("|","-",$segments[$i]);
		$vars['flypage'] 	= $flypage.".tpl";
	}
	$i = strpos($sef,'p');
	if (isset($i) && is_numeric($i))	$vars['product_id'] 	= $segments[$i];
	$i = strpos($sef,'m');
	if (isset($i) && is_numeric($i))	$vars['manufacturer_id'] 	= $segments[$i];
	$i = strpos($sef,'v');
	if (isset($i) && is_numeric($i))	$vars['vendor_id'] 	= $segments[$i];

	return $vars;
}

?>