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

<?php if (count($list) == 1) :
	$item = $list[0];
	modNewsFlashHelper::renderItem($item, $params, $access);
elseif (count($list) > 1) : ?>
<ul class="horiz<?php echo $params->get('moduleclass_sfx'); ?>">
	<?php foreach ($list as $item) : ?>
	<li>
		<?php modNewsFlashHelper::renderItem($item, $params, $access); ?>
	</li>
	<?php endforeach; ?>
</ul>
<?php endif;
