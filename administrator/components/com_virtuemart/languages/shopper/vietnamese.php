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
	'PHPSHOP_ADMIN_CFG_PRICES_INCLUDE_TAX' => 'Hiện Giá bao gồm thuế?',
	'PHPSHOP_ADMIN_CFG_PRICES_INCLUDE_TAX_EXPLAIN' => 'Sets the flag whether the shoppers sees prices including tax or excluding tax.',
	'PHPSHOP_SHOPPER_FORM_ADDRESS_LABEL' => 'Địa chỉ Nickname',
	'PHPSHOP_SHOPPER_GROUP_LIST_LBL' => 'Danh sách Nhóm Shopper',
	'PHPSHOP_SHOPPER_GROUP_LIST_NAME' => 'Tên nhóm',
	'PHPSHOP_SHOPPER_GROUP_LIST_DESCRIPTION' => 'Mô tả nhóm',
	'PHPSHOP_SHOPPER_GROUP_FORM_LBL' => 'Shopper Nhóm Form',
	'PHPSHOP_SHOPPER_GROUP_FORM_NAME' => 'Tên nhóm',
	'PHPSHOP_SHOPPER_GROUP_FORM_DESC' => 'Mô tả nhóm',
	'PHPSHOP_SHOPPER_GROUP_FORM_DISCOUNT' => 'Bớt tiền cho nhóm shopper mặc  định (in %)',
	'PHPSHOP_SHOPPER_GROUP_FORM_DISCOUNT_TIP' => 'A positive amount X means: If the Sản phẩm has no Giá assigned to THIS Shopper Nhóm, the default Giá is decreased by X %. A negative amount has the opposite effect'
); $VM_LANG->initModule( 'shopper', $langvars );
?>