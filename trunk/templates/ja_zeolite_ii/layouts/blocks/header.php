<!-- CPANEL
<div id="ja-cpanel" class="wrap">
    <div class="main clearfix">
		<?php if ($this->countModules('search')) { ?>
        <div id="ja-search">
            <jdoc:include type="modules" name="search" style="raw" />
        </div>	
        <?php } ?>
        
        <div id="ja-pathway">
        <strong><?php echo JText::_('You are here');?></strong><jdoc:include type="module" name="breadcrumbs" />
        </div>
	</div>
</div>
-->

<!-- //CPANEL -->

<div id="ja-header" class="wrap">
<div class="main">
<div class="inner clearfix">


	<jdoc:include type="modules" name="banner" />
	<?php if (!$this->isContentEdit() && $this->countModules('vm-cart')) { ?>
	<div id="ja-vmcart">
		<jdoc:include type="modules" name="vm-cart" style="xhtml" />
	</div>
	<?php } ?>

	<!-- MAIN NAVIGATION -->
	<?php $this->loadBlock('mainnav') ?>
	<!-- //MAIN NAVIGATION -->

</div>

</div>
</div>
