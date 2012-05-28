<div class="title_page">								
	<div class="title"><?php echo $title?></div>
</div>
<?php foreach ( $data as $item ):?>
<div class="danhlam" style="margin-top:10px;">					
	<div class="pic_boxs">
		<a href="<?php echo site_url('hotel/detail/'.$item['id']);?>" style="display:block;"><img src="<?php if ( !empty($item['image']) ) echo base_url().$item['image']; else echo base_url().'upload/image/noimage.gif';?>" width="146" height="94" alt="" class="img2" /></a>
	</div>
	<div class="text" style="min-height:140px;">
		<div class="title"><a href="<?php echo site_url('hotel/detail/'.$item['id']);?>"><?php echo $item['name']?></a></div>
		<div class="text_nd">
			<p align="justify">
				<?php echo $item['short_introduce']?>
			</p> 
		</div>	
		<div class="action" style="margin:20px 0 5px 0; text-align: right;">
			<a href="<?php echo site_url('hotel/book/'.$item['id']);?>" class="button btn_booking"><?php echo lang('book');?></a>
			<a href="<?php echo site_url('hotel/detail/'.$item['id']);?>" class="button btn_booking"><?php echo lang('see_more');?></a>
		</div>					
	</div>
	<div style="clear:both;"></div>	
	<div class="line"></div>		
</div>
<div style="clear:both;"></div>	
<?php endforeach;?>
<div class="paging" style="text-align: center; margin-bottom: 8px;">
	<?php echo $this->pagination->create_links(); ?>
</div>