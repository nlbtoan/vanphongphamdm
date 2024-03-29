<?php if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); ?>

<?php
// User is not allowed to see a price or there is no price
if( !$auth['show_prices'] || !isset($price_info["product_price_id"] )) {
	
	$link = $sess->url( $_SERVER['PHP_SELF'].'?page=shop.ask&amp;product_id='.$product_id.'&amp;subject='. urlencode( $VM_LANG->_('PHPSHOP_PRODUCT_CALL').": $product_name") );
	echo vmCommonHTML::hyperLink( $link, $VM_LANG->_('PHPSHOP_PRODUCT_CALL') );
}
?>

<?php
if( !empty( $price_info["product_price_id"] )) { ?>
	<span class="productPrice">
		<?php echo $CURRENCY_DISPLAY->getFullValue($base_price) ?>
		<?php echo $text_including_tax ?>
	</span><br />
<?php
}
echo $price_table;
?>

<?php
// DISCOUNT: Show old price!
//First line makes sure that the old price and discount are not shown on category broswe pages
if (! $_GET['page'] = 'shop.browse') {
if(!empty($discount_info["amount"])) {
	?>
	<span class="product-Old-Price">
		Retail Price: <?php echo $CURRENCY_DISPLAY->getFullValue($undiscounted_price); ?></span>	
	
	<?php
}
}
?>

<?php
// DISCOUNT: Show the amount the customer saves
if (! $_GET['page'] = 'shop.browse') {
if(!empty($discount_info["amount"])) {
	echo "<br /><span class=\"product-amount-saved\">";
	echo $VM_LANG->_('PHPSHOP_PRODUCT_DISCOUNT_SAVE').": ";
	if($discount_info["is_percent"]==1) {
		echo $discount_info["amount"]."%";
	}
	else {
		echo $CURRENCY_DISPLAY->getFullValue($discount_info["amount"]);
	}
	echo '</span>';
}
}
?>