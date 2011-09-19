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

<?php if ($this->params->get('show_page_title', 1)) : ?>
<h1 class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php echo $this->escape($this->params->get('page_title')); ?>
</h1>
<?php endif; ?>


<div class="weblinks<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">

	<?php if ( $this->category->image || $this->category->description) : ?>
	<div class="contentdescription<?php echo $this->escape($this->params->get('pageclass_sfx')); ?> clearfix">

		<?php if ($this->category->image) :
			echo $this->category->image;
		endif; ?>

		<?php echo $this->category->description; ?>

		<?php if ($this->category->image) : ?>
		<div class="wrap_image">&nbsp;</div>
		<?php endif; ?>

	</div>
	<?php endif; ?>

	<?php echo $this->loadTemplate('items'); ?>

</div>
