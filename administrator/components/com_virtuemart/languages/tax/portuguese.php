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
	'PHPSHOP_TAX_LIST_LBL' => 'Lista Tarifas de Imposto',
	'PHPSHOP_TAX_LIST_STATE' => 'Impostos por Distrito ou Regi�o',
	'PHPSHOP_TAX_LIST_COUNTRY' => 'Impostos no Pa�s',
	'PHPSHOP_TAX_FORM_LBL' => 'Adicionar Imposto Informa��o',
	'PHPSHOP_TAX_FORM_STATE' => 'Imposto por Distrito ou Regi�o',
	'PHPSHOP_TAX_FORM_COUNTRY' => 'Imposto do Pa�s',
	'PHPSHOP_TAX_FORM_RATE' => 'Tarifas de Imposto'
); $VM_LANG->initModule( 'tax', $langvars );
?>