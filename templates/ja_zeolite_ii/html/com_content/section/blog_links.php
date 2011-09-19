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

<div class="blog_more">
	<h2><?php echo JText::_('More Articles...'); ?></h2>
	<ul class="blogsection">
		<?php foreach ($this->links as $link) : ?>
		<li>
			<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($link->slug, $link->catslug, $link->sectionid)); ?>">
				<?php echo $this->escape($link->title); ?></a>
		</li>
		<?php endforeach; ?>
	</ul>
</div>
