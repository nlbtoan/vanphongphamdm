<?php
/*------------------------------------------------------------------------
# vm_sef - Search Engine Friendly URL's for Virtuemart
# ------------------------------------------------------------------------
# author    Jeremy Magne
# copyright Copyright (C) 2010 Daycounts.com. All Rights Reserved.
# Websites: http://www.daycounts.com
# Technical Support: http://www.daycounts.com/en/contact/
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# See http://daycounts.com/fr/component/content/article/7 for details
-------------------------------------------------------------------------*/

// no direct access
defined('_JEXEC') or die('Restricted access');

global $option;
JHTML::stylesheet( 'admin.css', 'administrator/components/'.$option.'/assets/css/');

require_once( JPATH_COMPONENT.DS.'controller.php' );

$controller = new VmSefController();
$controller->execute( JRequest::getWord( 'task' ) );

?>