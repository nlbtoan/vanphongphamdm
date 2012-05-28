<div class="title_page">								
	<div class="title"><?php echo $title?></div>
</div>

<div class="info_hotel">
	<img  width="220" height="190" src="<?php if ( !empty($data['image']) ) echo base_url().$data['image']; else echo base_url().'upload/image/noimage.gif';?>" width="245"  alt="" />
	<div class="short_introduce"><?php echo $data['short_introduce'];?></div>
	<div class="general_info">
		<p><?php echo lang('hotel');?>: <?php echo $data['level'].' '.lang('star');?></p>
		<p><?php echo lang('address');?>: <?php echo $data['address']?></p>
		<p><?php if ( !empty($data['web']) ) echo lang('web'). ' : <a href="'.$data['web'].'" target="_blank">'.$data['web'].'</a>';?></p>
	</div>	
	<div style="clear:both;"></div>
	<a href="<?php echo site_url('hotel/book/'.$data['id']);?>" class="booking_room" style="margin:20px 0 0 70px;">Đặt hotel</a>		
</div>
<div style="clear:both;"></div>
<div class="line"></div>

<?php if (!empty($room)){?>
	<div class="list_room">
		<?php foreach( $room as $key=>$item ):?>
		<div class="room">
			<p class="name"><?php echo $item['name']?></p>
			<div class="image"><img width="135" height="100" src="<?php if ( !empty($data['image']) ) echo base_url().$data['image']; else echo base_url().'upload/image/noimage.gif';?>" width="245"  alt="" /></div>
			<p class="price"><?php echo $item['price']?></p>
			<p class="cat_name"><?php echo $item['cat_name']?></p>
		</div>
		<?php if( ($key + 1) % 3 == 0 || ($key+1) == count($room) ) :?><div style="clear:both;"></div><?php endif;?>
		<?php endforeach;?>
	</div>
	<div style="clear:both;"></div>
	<div class="line"></div>
<?php }?>

<div class="introduce">
	<div class="title_info"><?php echo lang('detail_info');?></div>
	<div class="content"><?php echo $data['full_introduce']?></div>
</div>
<div style="clear:both;"></div>
<div class="line"></div>

<div class="other_hotel">
	<?php foreach($hotel as $key => $item):?>
		<?php if ( $item['id'] != $data['id'] ) {?>
		<div class="hotel">
			<p class="name"><?php echo $item['name']?></p>
			<img width="135" height="100" src="<?php if ( !empty($data['image']) ) echo base_url().$data['image']; else echo base_url().'upload/image/noimage.gif';?>" width="245"  alt="" />
		</div>
		<?php } ?>
		<?php if( ($key + 1) % 3 == 0 || ($key+1) == count($room) ) :?><div style="clear:both;"></div><?php endif;?>
	<?php endforeach;?>
</div>