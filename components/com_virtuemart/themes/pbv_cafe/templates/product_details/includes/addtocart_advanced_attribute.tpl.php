<?php if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); 

foreach($attributes as $attribute) { 		
    ?>
    <div class="vmAttribChildDetail" style="float: left;width:35%;text-align:left;margin:0px;">
        <label for="<?php echo $attribute['titlevar'] ?>_field"><?php echo $attribute['title'] ?></label>:
    </div>
    <div class="vmAttribChildDetail" style="text-align:left;float:left;width:60%;margin:0px;">
        <select class="inputboxattrib" id="<?php echo $attribute['titlevar'] ?>_field" name="<?php echo $attribute['titlevar'].$attribute['product_id'] ?>">
		<?php foreach ( $attribute['options_list'] as $options_item ) : ?>
	        <?php if( isset( $options_item['display_price']) ) : ?>
	        <option value="<?php echo $options_item['base_var'] ?>"><?php echo $options_item['base_value'] ?> (<?php echo $options_item['sign'].$options_item['display_price'] ?>)</option>
	        <?php else : ?>
	        <option value="<?php echo $options_item['base_var'] ?>"><?php echo $options_item['base_value'] ?></option>
	        <?php endif; ?>
        <?php endforeach; ?>
        </select>
    </div>
    <br style="clear:both;" />
    
<?php 
} ?>