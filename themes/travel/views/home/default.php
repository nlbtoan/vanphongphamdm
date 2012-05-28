<!-- the tabs -->
<ul class="tabs">
	<?php foreach( $tabs as $item ):?>
	<li><a href="#"><?php echo $item?></a></li>
	<?php endforeach?>
</ul>

<!-- tab "panes" -->
<div class="panes">
	<!-- Tour Hot -->
	<div class="tour_hot">	
		<div class="list_tour">						
			<?php echo $list_page_welcome;?>
		</div>	
	</div>
	<div class="tour_hot">	
		<div class="list_tour">						
			<?php echo $list_tour_hot;?>
		</div>	
	</div>
	<div class="tour_package">
		<div class="list_tour">						
			<?php echo $list_tour_package;?>
		</div>	
	</div>
	<div class="tour_daily">
		<div class="list_tour">						
			<?php echo $list_tour_daily?>
		</div>
	</div>
</div>

<div style="clear:both;"></div>	
<div class="line"></div>

<?php if (!empty($news) ) {?>

<div id="home_news">
	<div class="title_page">								
		<div class="title"><?php echo lang('travel_news');?></div>
	</div>
	<div class="news_f">
	    <div class="pic_boxs"><a href="<?php echo site_url('news/detail/'.$news[0]['id']);?>"  title="" ><img src="<?php if ( !empty($news[0]['image']) ) echo base_url().$news[0]['image']; else echo base_url().'upload/image/noimage.gif';?>"/></a></div>
	    <div class="text">
	    	<div class="title"><a href="<?php echo site_url('news/detail/'.$news[0]['id']);?>"><?php echo $news[0]['title'];?></a></div>
	        <div class="text_nd"><?php echo $news[0]['summary'];?></div>
	   		<div class="more_news"><a href="<?php echo site_url('news/detail/'.$news[0]['id']);?>" class="button btn_booking"><?php echo lang('see_more');?></a></div>
	    </div>
    </div>         
    <div style="clear:both;"></div>
    <div class="list_news_more">
    <?php foreach( $news as $key => $item ):?>
    	<?php if ( $key != 0 ){ ?>
			<div class="news_more"><a href="<?php echo site_url('news/detail/'.$item['id']);?>"><?php echo $item['title']?></a><font class="date"><?php echo date('d/m/Y',$item['date'])?></font></div>
		<?php } ?>
    <?php endforeach;?>
	</div>
</div>
<?php } ?>

<?php echo load_js('assets/tabs.min.js');?>
<?php echo load_css('styles/default/tabs.css');?> 

<script type="text/javascript">
$(document).ready(function () {
	$("ul.tabs").tabs('div.panes > div');
});
</script>   
