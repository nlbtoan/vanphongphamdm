<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); 
/**
*
* @version : portuguese.php 1071 2007-12-03 08:42:28Z thepisu $
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
	'PHPSHOP_ACC_CUSTOMER_ACCOUNT' => 'Conta de Cliente:',
	'PHPSHOP_ACC_UPD_BILL' => 'Aqui pode encontrar os dados de factura��o.',
	'PHPSHOP_ACC_UPD_SHIP' => 'Aqui pode adicionar ou actualizar a morada para envio.',
	'PHPSHOP_ACC_ACCOUNT_INFO' => 'Informa��o de Conta',
	'PHPSHOP_ACC_SHIP_INFO' => 'Informa��o de Envio',
	'PHPSHOP_DOWNLOADS_CLICK' => 'Clique no nome do produto para efectuar o Download.',
	'PHPSHOP_DOWNLOADS_EXPIRED' => 'J� efectuou o downlod a quantidade maxima de vezes, ou o periodo de download terminou.'
); $VM_LANG->initModule( 'account', $langvars );
?>