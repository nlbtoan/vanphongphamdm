<?php if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' );
mm_showMyFileName(__FILE__);

?>
<div class="browseProductContainerpbv">
	<div class="browseProductImageContainerpbv">
		<script type="text/javascript">//<![CDATA[
		document.write('<a title="<?php echo $product_name ?>" href="<?php echo $product_flypage ?>">');
		document.write('<?php echo ps_product::image_tag( $product_thumb_image, 'class="browseProductImage" border="0"  title="'.$product_name.'" alt="'.$product_name .'"' ) ?></a>' );
		//]]>
		</script>
		<noscript>
			<a href="<?php echo $product_full_image ?>" target="_blank" title="<?php echo $product_name ?>">
			<?php echo ps_product::image_tag($product_thumb_image, 'class="browseProductImage" border="0"  title="'.$product_name.'" alt="'.$product_name .'"' ) ?>
			</a>
		</noscript>
	</div>
			
	<div style="width:95%;vertical-align:baseline;">
	<div class="browsePriceContainerpbv">
	   <h5 class="browseProductTitlepbv">
	   <a title="<?php echo $product_name ?>" href="<?php echo $product_flypage ?>">
		<?php echo $product_name ?></a>
	</h5>
	<br />
	   <?php echo $product_price ?>
	</div>
	</div>
</div>