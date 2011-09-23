<?php if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); ?>
<table bgcolor="#efefef" border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td width="7"><img src="<?php echo VM_THEMEURL ?>/images/curveTL.gif"></td><td background="<?php echo VM_THEMEURL ?>/images/curveT.gif"></td><td><img src="<?php echo VM_THEMEURL ?>/images/curveTR.gif"></td></tr><tr><td background="<?php echo VM_THEMEURL ?>/images/curveL.gif" width="7"></td><td>Department: <?php echo $browsepage_lbl; ?> </td><td background="<?php echo VM_THEMEURL ?>/images/curveR.gif" width="7"></td></tr><tr><td width="7"><img src="<?php echo VM_THEMEURL ?>/images/curveBL.gif"></td><td background="<?php echo VM_THEMEURL ?>/images/curveB.gif"></td><td width="7"><img src="<?php echo VM_THEMEURL ?>/images/curveBR.gif"></td></tr></tbody></table>
<h3><!-- <?php echo $browsepage_lbl; ?>  -->
	<?php 
	if( $this->get_cfg( 'showFeedIcon', 1 ) && (VM_FEED_ENABLED == 1) ) { ?>
	<a href="index.php?option=<?php echo VM_COMPONENT_NAME ?>&amp;page=shop.feed&amp;category_id=<?php echo $category_id ?>" title="<?php echo $VM_LANG->_('VM_FEED_SUBSCRIBE_TOCATEGORY_TITLE') ?>">
	<img src="<?php echo VM_THEMEURL ?>/<?php echo VM_THEMEURL ?>/images/feed-icon-14x14.png" align="middle" alt="feed" border="0"/></a>
	<?php 
	} ?>
</h3>

<div style="text-align:left;">
	<?php echo $navigation_childlist; ?>
</div>
<?php if( trim(str_replace( "<br />", "" , $desc)) != "" ) { ?>

		<div style="width:100%;float:left;">
			<?php echo $desc; ?>
		</div>
		<br class="clr" /><br />
		<?php
     }
?>