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

<?php if (!empty($this->searchword)) : ?>
<div class="searchintro<?php echo $this->escape($this->params->get('pageclass_sfx')) ?> clearfix">
	<p>
		<?php echo JText::_('Search Keyword') ?> <strong><?php echo $this->escape($this->searchword) ?></strong>
		<?php echo $this->result ?>
	</p>
	<p>
		<a href="#form1" onclick="document.getElementById('search_searchword').focus();return false" onkeypress="document.getElementById('search_searchword').focus();return false" ><?php echo JText::_('Search_again') ?></a>
	</p>
</div>
<?php endif; ?>

<?php if (count($this->results)) : ?>
<div class="results  clearfix">
	<h3><span><?php echo JText :: _('Search_result'); ?></span></h3>
	<?php $start = $this->pagination->limitstart + 1; ?>
	<ol class="list<?php echo $this->escape($this->params->get('pageclass_sfx')) ?>" start="<?php echo (int)$start ?>">
		<?php foreach ($this->results as $result) : ?>
		<li>
			<?php if ($result->href) : ?>
			<h4>
				<a href="<?php echo JRoute :: _($result->href) ?>" <?php echo ($result->browsernav == 1) ? 'target="_blank"' : ''; ?> >
					<?php echo $this->escape($result->title); ?></a>
			</h4>
			<?php endif; ?>
			<?php if ($result->section) : ?>
			<p><?php echo JText::_('Category') ?>:
				<span class="small<?php echo $this->escape($this->params->get('pageclass_sfx')) ?>">
					<?php echo $this->escape($result->section); ?>
				</span>
			</p>
			<?php endif; ?>

			<?php echo $result->text; ?>
			<span class="small<?php echo $this->escape($this->params->get('pageclass_sfx')) ?>">
				<?php echo $this->escape($result->created); ?>
			</span>
		</li>
		<?php endforeach; ?>
	</ol>
	<?php echo $this->pagination->getPagesLinks(); ?>
</div>
<?php endif; ?>
