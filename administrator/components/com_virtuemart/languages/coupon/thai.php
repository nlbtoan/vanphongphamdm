<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); 
/**
*
* @version : thai.php 1071 2007-12-03 08:42:28Z thepisu $
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
	'CHARSET' => 'ISO-8859-1',
	'PHPSHOP_COUPON_EDIT_HEADER' => '���',
	'PHPSHOP_COUPON_CODE_HEADER' => '���ʤٻͧ',
	'PHPSHOP_COUPON_PERCENT_TOTAL' => '�����繵� ���� ������',
	'PHPSHOP_COUPON_TYPE' => '�������ٻͧ',
	'PHPSHOP_COUPON_TYPE_TOOLTIP' => '- �ٻͧ�ͧ��ѭ��ź��ѧ�ҡ�١���š��ǹŴ����<br />- �ٻͧ���è�����ö������ҷ���١��ҵ�ͧ���',
	'PHPSHOP_COUPON_TYPE_GIFT' => '�ٻͧ�ͧ��ѭ',
	'PHPSHOP_COUPON_TYPE_PERMANENT' => '�ٻͧ����',
	'PHPSHOP_COUPON_VALUE_HEADER' => '��Ť��',
	'PHPSHOP_COUPON_PERCENT' => '�����繵�',
	'PHPSHOP_COUPON_TOTAL' => '������'
); $VM_LANG->initModule( 'coupon', $langvars );
?>