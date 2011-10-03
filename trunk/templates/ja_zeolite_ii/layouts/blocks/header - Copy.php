<!-- CPANEL -->
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
<!-- //CPANEL -->


<div id="ja-header" class="wrap">
<div class="main">
<div class="inner clearfix">


	<?php
	$siteName = $this->sitename();
	if ($this->getParam('logoType')=='image'): ?>
	<h1 class="logo">
		<a href="index.php" title="<?php echo $siteName; ?>"><span><?php echo $siteName; ?></span></a>
	</h1>
	<?php else:
	$logoText = (trim($this->getParam('logoType-text-logoText'))=='') ? $config->sitename : $this->getParam('logoType-text-logoText');
	$sloganText = (trim($this->getParam('logoType-text-sloganText'))=='') ? JText::_('SITE SLOGAN') : $this->getParam('logoType-text-sloganText');?>
	<div class="logo-text">
		<h1><a href="index.php" title="<?php echo $siteName; ?>"><span><?php echo $logoText; ?></span></a></h1>
		<p class="site-slogan"><?php echo $sloganText;?></p>
	</div>
	<?php endif; ?>
	
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
