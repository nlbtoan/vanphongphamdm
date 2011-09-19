<?php
/*
# ------------------------------------------------------------------------
# JA Zeolite II Template for Joomla 1.5
# ------------------------------------------------------------------------
# Copyright (C) 2004-2010 JoomlArt.com. All Rights Reserved.
# @license - PHP files are GNU/GPL V2. CSS / JS are Copyrighted Commercial,
# bound by Proprietary License of JoomlArt. For details on licensing, 
# Please Read Terms of Use at http://www.joomlart.com/terms_of_use.html.
# Author: JoomlArt.com
# Websites:  http://www.joomlart.com -  http://www.joomlancers.com
# Redistribution, Modification or Re-licensing of this file in part of full, 
# is bound by the License applied. 
# ------------------------------------------------------------------------
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$positions = array (
	'content-top'			=>'',
	'content-bottom'		=>'content-bot',
);

$this->_basewidth = 20;
$this->definePosition ($positions);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">

<head>
<?php $this->loadBlock('handheld/head') ?>
</head>

<body id="bd" onload="window.scrollTo(0, 1);updateOrientation()" onorientationchange="updateOrientation()">

<div id="ja-wrapper">
	<a name="Top" id="Top"></a>

	<!-- HEADER -->
	<?php $this->loadBlock('handheld/header') ?>
	<!-- //HEADER -->

	<!-- NAV -->
	<?php $this->loadBlock('handheld/mainnav') ?>
	<!-- //NAV -->

	<!-- CONTENT -->
	<?php $this->loadBlock('handheld/main') ?>
	<!-- //CONTENT -->

	<!-- FOOTER -->
	<?php $this->loadBlock('handheld/footer') ?>
	<!-- //FOOTER -->

</div>

<jdoc:include type="modules" name="debug" />

</body>

</html>
