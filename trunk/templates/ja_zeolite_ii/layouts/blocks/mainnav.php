<div id="ja-mainnav">
	<div class="inner clearfix">
		<?php if (($jamenu = $this->loadMenu())) $jamenu->genMenu (0); ?>
	</div>
</div>

<ul class="no-display">
    <li><a href="<?php echo $this->getCurrentURL();?>#ja-content" title="<?php echo JText::_("Skip to content");?>"><?php echo JText::_("Skip to content");?></a></li>
</ul>
