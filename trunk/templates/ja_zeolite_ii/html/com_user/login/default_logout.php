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

defined( '_JEXEC' ) or die( 'Restricted access' );
?>

<form action="<?php echo JRoute::_( 'index.php' ); ?>" method="post" name="login" id="login" class="logout_form<?php echo $this->escape($this->params->get( 'pageclass_sfx' )); ?>">
	<?php if ( $this->params->get( 'page_title' ) ) : ?>
	<h1 class="componentheading<?php echo $this->escape($this->params->get( 'pageclass_sfx' )); ?>">
		<?php echo $this->params->get( 'header_logout' ); ?>
	</h1>
	<?php endif; ?>

	<?php if ( $this->params->get( 'description_logout' ) || isset( $this->image ) ) : ?>
	<div class="contentdescription<?php echo $this->escape($this->params->get( 'pageclass_sfx' )); ?> clearfix">
		<?php if (isset ($this->image)) :
			echo $this->image;
		endif;
		if ( $this->params->get( 'description_logout' ) ) : ?>
		<p>
			<?php echo $this->params->get('description_logout_text'); ?>
		</p>
		<?php endif;
		if (isset ($this->image)) : ?>
		<div class="wrap_image">&nbsp;</div>
		<?php endif; ?>
	</div>
	<?php endif; ?>

	<p><input type="submit" name="Submit" class="button" value="<?php echo JText::_( 'Logout' ); ?>" /></p>
	<input type="hidden" name="option" value="com_user" />
	<input type="hidden" name="task" value="logout" />
	<input type="hidden" name="return" value="<?php echo $this->return; ?>" />
</form>
