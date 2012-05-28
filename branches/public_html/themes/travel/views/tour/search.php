<div class="title_page">								
	<div class="title"><?php echo $title?></div>
</div>
<div style="width:100%; height:35px; border:2px solid #DBEAEF; background-color:#AED6FE; font-size:14px;margin:10px 0">
	<p style="margin:9px 14px; color:#FF591F; font-weight:bold"><?php echo $result?></p>
</div>
<?php foreach ( $data as $item ):?>
<div class="danhlam" style="margin-top:10px;">					
	<div class="pic_boxs">
		<a href="<?php echo site_url('tour/detail/'.$item['id']);?>"><img src="<?php if ( !empty($item['image']) ) echo base_url().$item['image']; else echo base_url().'upload/image/noimage.gif';?>" width="146" height="94"/></a>
		<div class="fprice" style="width:130px; overflow:hidden">
		<b><?php echo lang('price');?>:</b>&nbsp;<span class="price"><?php echo $item['price']?></span>
		</div>
	</div>
	<div class="text" style="min-height:140px;">
		<div class="title">
			<a href="<?php echo site_url('tour/detail/'.$item['id']);?>"><?php echo $item['title']?></a>
			<?php if(! empty($item['is_hot']) ):?>
			<img src="<?php echo theme_url('styles/default/images/hot-icon.jpg');?>" style="margin:-1px 5px"/>
			<?php endif;?>
		</div>
		<div class="text_nd">
			<p><?php echo "<span>".lang('time_tour'). "</span> : " . $item['time_tour'];?></p>
			<p><?php echo "<span>".lang('destination'). "</span> : " . $item['destination'];?></p>
			<p><?php echo "<span>".lang('vehicle'). "</span> : " . $item['vehicle'];?></p>
			<p align="justify" style="float:left;"><?php echo "<span>".lang('intro'). "</span> : </p>" . $item['summary']?> 
		</div>
		<div class="clear"></div>	
		<div class="action" style="margin:20px 0 5px 0; text-align: right;">
			<a href="<?php echo site_url('tour/book/'.$item['id']);?>" class="button btn_booking"><?php echo lang('book_tour');?></a>
			<a href="<?php echo site_url('tour/detail/'.$item['id']);?>" class="button btn_booking"><?php echo lang('see_more');?></a>
		</div>
	</div>
	<div style="clear:both;"></div>	
	<div class="line"></div>		
</div>
<div style="clear:both;"></div>	
<?php endforeach;?>
<div class="paging">
	<?php echo $this->pagination->create_links(); ?>
</div>