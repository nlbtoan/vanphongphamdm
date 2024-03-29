<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); 
/**
*
* @version : vietnamese.php 1071 2007-12-03 08:42:28Z thepisu $
* @package VirtueMart
* @subpackage languages
* @copyright Copyright (C) 2004-2007 soeren - All rights reserved.
* @translator soeren
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* VirtueMart is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See /administrator/components/com_virtuemart/COPYRIGHT.php for copyright notices and details.
*
* http://virtuemart.net
*/
global $VM_LANG;
$langvars = array (
	'CHARSET' => 'UTF-8',
	'PHPSHOP_ZONE_ASSIGN_COUNTRY_LBL' => 'Quốc gia',
	'PHPSHOP_ZONE_ASSIGN_ASSIGN_LBL' => 'Phân công cho Khu vực',
	'PHPSHOP_ASSIGN_ZONE_PG_LBL' => 'Phân công Khu vực',
	'PHPSHOP_ZONE_FORM_NAME_LBL' => 'Tên Khu vực',
	'PHPSHOP_ZONE_FORM_DESC_LBL' => 'Mô tả Khu vực',
	'PHPSHOP_ZONE_FORM_COST_PER_LBL' => 'Khu vực Cost Per Item',
	'PHPSHOP_ZONE_FORM_COST_LIMIT_LBL' => 'Khu vực Cost Limit',
	'PHPSHOP_ZONE_LIST_LBL' => 'Khu vực Liệt kê',
	'PHPSHOP_ZONE_LIST_NAME_LBL' => 'Tên Khu vực',
	'PHPSHOP_ZONE_LIST_DESC_LBL' => 'Mô tả Khu vực',
	'PHPSHOP_ZONE_LIST_COST_PER_LBL' => 'Khu vực Cost Per Item',
	'PHPSHOP_ZONE_LIST_COST_LIMIT_LBL' => 'Chi phí khu Hạn chế',
	'VM_ZONE_ASSIGN_PERITEM' => 'Theo khoản',
	'VM_ZONE_ASSIGN_LIMIT' => 'Giới hạn',
	'VM_ZONE_EDITZONE' => 'Chỉnh sửa Khu vực này'
); $VM_LANG->initModule( 'zone', $langvars );
?>