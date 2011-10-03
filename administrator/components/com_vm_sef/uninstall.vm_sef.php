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

jimport('joomla.application.helper');
jimport('joomla.filesystem.file');

	
	JFile::delete(JPATH_SITE.DS."components".DS."com_virtuemart".DS."router.php");

$out = '<div style="margin:5px; padding 5px;"><div>'
. $msg
. '<br />Virtuemart Search Engine Friendly URL\'s was uninstalled'
. '</div></div>' . "\n";

echo $out;
