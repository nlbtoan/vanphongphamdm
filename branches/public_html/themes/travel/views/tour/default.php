<div class="title_page">							
	<div class="title" style="float:left; margin: 0 0 0 10px !important;"><?php echo $category_name?></div>
	<a href="#" class="switch-thumb">Switch Display</a>
	<div style="clear: both;"></div>
</div>
<div class="display">
	<?php foreach ( $data as $item ):?>
	<div class="danhlam" style="margin-top:10px;">					
		<div class="pic_boxs">
			<a href="<?php echo site_url('tour/detail/'.$item['id']);?>">
			<?php if ( !empty($item['image']) ):?>
	           <?php echo image_thumb($item['image'], 180, 200, 'title="'.$item['title'].'" border="0" height="94" width="146"')?>
	        <?php else:?>
	           <img title="<?php echo $item['title'];?>" src="<?php echo base_url().'upload/image/noimage.gif';?>" border="0" />
	        <?php endif;?>
	        </a>
	        <div class="text_2" style="display: none;">
			<?php echo $item['title']?>
			</div>
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
				<p><?php echo "<span class='title_nd'>".lang('time_tour'). "</span> : " . $item['time_tour'];?></p>
				<p><?php echo "<span class='title_nd'>".lang('destination'). "</span> : " . $item['destination'];?></p>
				<p><?php echo "<span class='title_nd'>".lang('vehicle'). "</span> : " . $item['vehicle'];?></p>
				<p align="justify" style="float:left;"><?php echo "<span class='title_nd'>".lang('intro'). "</span> : </p>" . $item['summary']?> 
			</div>
			<div class="action" style="margin:20px 0 5px 0; text-align: right;">
				<a href="<?php echo site_url('tour/book/'.$item['id']);?>" class="button btn_booking"><?php echo lang('book_tour');?></a>
				<a href="<?php echo site_url('tour/detail/'.$item['id']);?>" class="button btn_booking"><?php echo lang('see_more');?></a>
			</div>														
		</div>
		<div style="clear:left;"></div>
		<div class="line"></div>		
	</div>
	<?php endforeach;?>
</div>
<div style="clear:both;"></div>
<div class="paging">
	<?php echo $this->pagination->create_links(); ?>
</div>
<?php echo load_js('assets/switch.js');?>
<?php echo load_css('styles/default/switch.css');?> 