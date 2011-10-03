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

jimport( 'joomla.application.component.controller' );
jimport('joomla.application.helper');
jimport('joomla.filesystem.file');

$version = "1.5.2";
$versont_cat = 3;


?>
	<h1><img src="components/com_vm_sef/assets/sef-48.png" />Search Engine Friendly URL's for Virtuemart installer</h1>
	<br /><br />
<?php

//Check if Virtuemart is installed
if (!file_exists(JPATH_ADMINISTRATOR.DS."components".DS."com_virtuemart".DS."virtuemart.cfg.php")) {
	echo "<h3 style='color:red;'>Virtuemart does not seem to be installed. Please install Virtuemart first<h3>";
} else {

	$src = JPATH_ADMINISTRATOR.DS."components".DS."com_vm_sef".DS."site_virtuemart";
	$dest = JPATH_SITE.DS."components".DS."com_virtuemart";
	echo "<br>Copying Virtuemart router file....";
	if (JFile::copy($src.DS."router.php", $dest.DS."router.php")) {
		echo "<span style='color:green'>OK</span>";
	} else {
		echo "<span style='color:red'>ERROR</span>";
		$fail = true;
	}

	//Check if router patch is installed
	if (file_exists($dest.DS."router.php")) {
		echo "<br/><br/>SEF router patch installed";
	}

	if (file_exists(JPATH_ADMINISTRATOR.DS."components".DS."com_vm_sef".DS."vm_sef.php")) {
		JFile::delete(JPATH_ADMINISTRATOR.DS."components".DS."com_vm_sef".DS."vm_sef.php");
	}
	
	$config =& JFactory::getConfig();
	if(!$config->getValue('sef')){
		echo "<br/><br/><span style='color:red'>WARNING: The Joomla SEF does not seem to be activated, Virtumart SEF will not work without Joomla SEF activated and confugured properly.</span><br/><br/>";
	}
	
	

} //End check Virtuemart is installed
?>

	<form action="index.php" method="post" name="adminForm">
	   <input type="submit" value="OK" />
	   <input type="hidden" name="option" value="com_vm_sef" />
	</form>
    
	<br/><br/><div style="text-align:center;"><a href="http://www.daycounts.com/" target="_blank" title="DayCounts.com"><img src="components/com_vm_sef/assets/daycounts.png"  alt="DayCounts.com" border="0" height="40" /></a><div>
    <br/><br/>
<?php
	echo "Virtuemart SEF Free version ".$version
		.' (<a href="http://www.daycounts.com/index2.php?option=com_versions&amp;catid='.$versont_cat.'&amp;myVersion='.$version.'" onclick="javascript:void window.open(this.href, \'win2\', \'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=580,directories=no,location=no\'); return false;" target="_blank">Check now</a>)';

?>