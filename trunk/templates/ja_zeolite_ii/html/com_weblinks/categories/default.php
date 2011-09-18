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
$cparams = JComponentHelper::getParams ('com_media');
?>

<?php if ($this->params->get('show_page_title',1)) : ?>
<h1 class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php echo $this->escape($this->params->get('page_title')); ?>
</h1>
<?php endif; ?>


<div class="weblinks<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">

	<?php if ($this->params->def('show_comp_description', 1) || $this->params->def('image', -1) != -1) : ?>
	<div class="contentdescription<?php echo $this->escape($this->params->get('pageclass_sfx')); ?> clearfix">

		<?php if ($this->params->def('image', -1) != -1) : ?>
		<img src="<?php echo $this->baseurl . $this->escape($cparams->get('image_path')).'/'.$this->escape($this->params->get('image')); ?>" alt="" class="image_<?php echo $this->escape($this->params->get('image_align')); ?>" />
		<?php endif; ?>

		<?php if ($this->params->get('show_comp_description')) :
			echo $this->params->get('comp_description');
		endif; ?>

		<?php if ($this->params->def('image', -1) != -1) : ?>
		<div class="wrap_image">&nbsp;</div>
		<?php endif; ?>

	</div>
	<?php endif; ?>

</div>


<?php if (count($this->categories)) : ?>
<ul>
	<?php foreach ($this->categories as $category) : ?>
	<li>
		<a href="<?php echo $category->link; ?>" class="category<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
			<?php echo $this->escape($category->title); ?></a>
		&nbsp;<span class="small">(<?php echo (int)$category->numlinks ?>)</span>
	</li>
	<?php endforeach; ?>
</ul>
<?php endif;
