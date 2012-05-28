
	<div class="name_hotel"><?php echo $data_info['name'];?></div> 
	<div class="level">
	<?php for( $i = 0; $i < $data_info['level']; $i++){?>
		<img src="<?php echo theme_url('styles/default/images/star16.png');?>" title="<?php echo $data_info['level'].' star';?>" alt="*" />
	<?php }?>
	</div>
	<div style="clear:both;"></div>
	<div class="info">
		<div class="image"><img src="<?php echo empty($data_info['image']) ? base_url().'/upload/image/noimage.gif' : base_url().$data_info['image'];?>" alt="<?php echo $data_info['name'];?>" title="<?php echo $data_info['name'];?>" height="130" width="165"/></div>
		<div class="content">
			<?php if ( !empty($data_info['address']) ){?><p class="address"><span><?php echo lang('address');?></span>: <?php echo $data_info['address'];?></p><?php }?>
			<!-- <?php if ( !empty($data_info['website']) ){?><p class="website"><span><?php echo lang('website');?></span>: <?php echo $data_info['website'];?></p><?php }?> -->
			<?php if ( !empty($data_info['short_introduce']) ){?>
			<p class="introduce"><span><?php echo lang('introduce');?></span>:</p>
			<?php echo $data_info['short_introduce'];?>
			<?php }?>
		</div>
	</div>
	<div style="clear:both;"></div>
