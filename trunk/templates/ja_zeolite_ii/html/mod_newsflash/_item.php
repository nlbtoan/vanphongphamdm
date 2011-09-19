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

defined('_JEXEC') or die('Restricted access');
?>

<?php if ($params->get('item_title')) : ?>
<h4>
	<?php if ($params->get('link_titles') && (isset($item->linkOn))) : ?>
	<a href="<?php echo JRoute::_($item->linkOn); ?>" class="contentpagetitle<?php echo $params->get('moduleclass_sfx'); ?>">
		<?php echo $item->title; ?></a>
	<?php else :
		echo $item->title;
	endif; ?>
</h4>
<?php endif; ?>

<?php if (!$params->get('intro_only')) :
	echo $item->afterDisplayTitle;
endif; ?>

<?php echo $item->beforeDisplayContent;
echo JFilterOutput::ampReplace($item->text);

$itemparams=new JParameter($item->attribs);
$readmoretxt=$itemparams->get('readmore',JText::_('Read more'));
if (isset($item->linkOn) && $item->readmore && $params->get('readmore')) : ?>
<a href="<?php echo $item->linkOn; ?>" class="readon">
	<?php echo $readmoretxt; ?></a>
<?php endif; ?>
<span class="article_separator">&nbsp;</span>
