<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="<?php echo theme_url('styles/default/images/favicon.ico')?>" rel="shortcut icon"></link>
<meta name="robots" content="index, follow">
<meta name="google-site-verification" content="MMdDpOM4JhDt6wAUVy6B4WeN1oBku0Ku-u5MzPGklws" />
<meta name="keywords" content="<?php echo $this->setting->item('ceo_value')?>" />
<meta name="description" content="Green Cruise Tourism - Công ty du lịch" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title?>, tour du lich phu quoc, du lich phu quoc, phu quoc</title>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32290915-1']);
  _gaq.push(['_setDomainName', 'phuquocsmile.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<?php load_css('assets/TopStory/css/topstory.css') ?>
<?php load_css('styles/default/default.css') ?>
<?php load_css('styles/default/menu.css') ?>
<!--[if IE 8]>
	<?php load_css('styles/default/ie8.css');?>
<![endif]-->
<!--[if IE 7]>
	<?php load_css('styles/default/ie7.css');?>
<![endif]-->
	
<script type="text/javascript" src="<?php echo site_url('assets/base');?>"></script>

<style>
.fullBg {
	position: fixed;
	top: 0;
	left: 0;
	overflow: hidden;
	width: 100%;
	height: 100%;
}

#page {
	position: absolute;
	top: 0;
	left: 0;
	z-index: 50;
	width: 100%;
}
<?php if ( $this->setting->lang('abbr') == 'en' ){?>
	.menu_horizontal li a { margin: auto 16px !important; }
<?php }?>
</style>

<script>
(function($) {
	$.fn.fullBg = function(){
		var bgImg = $(this);
		
		bgImg.addClass('fullBg');
		
		function resizeImg() {
			var imgwidth = bgImg.width();
			var imgheight = bgImg.height();
			
			var winwidth = $(window).width();
			var winheight = $(window).height();
			
			var widthratio = winwidth / imgwidth;
			var heightratio = winheight / imgheight;
			
			var widthdiff = heightratio * imgwidth;
			var heightdiff = widthratio * imgheight;
		
			if(heightdiff>winheight) {
				bgImg.css({
					width: winwidth+'px',
					height: heightdiff+'px'
				});
			} else {
				bgImg.css({
					width: widthdiff+'px',
					height: winheight+'px'
				});		
			}
		} 
		resizeImg();
		$(window).resize(function() {
			resizeImg();
		}); 
	};
})(jQuery)

$(document).ready(function(){
	$(".scrollable").scrollable();
	
	$(".menu_horizontal li").hover(function(){
		$(this).find("ul:first").animate({
			'height' : 'show',
			'opacity' : 'show'
		}, 300);
	}, function(){
		 $(this).find("ul:first").stop(true, true);
		 $(this).find("ul:first").hide();
	});
	
	$("#background").fullBg();

	$("#back_top").click(function(e){
		e.preventDefault();
		$('html, body').animate({scrollTop: $('#top_cmain').position().top+'px'}, 600);
	});
});
</script>

</head>
<?php 

$logo = $this->setting->item('logo');
$banner = $this->setting->item('banner');
$banner_url = $this->setting->item('banner_url');
$lang = $this->setting->get_langs();
$ci =& get_instance();
$ci->load->model('tour_model');
$ci->load->model('advert_model');
$slide_data = $ci->tour_model->get_data( 'id, title, image, is_hot');

if ( empty($list_images) ) {
	$list_images = $ci->advert_model->get_adv('quang-cao');
}
//echo'<pre>';var_dump($list_images);die();
?>
<body>

<div id="page">
<div id="mpage">
    <div id="top">
        <div id="topNav">
            <ul>
                <li>
                    <?php echo lang('language');?>
                </li>
                <?php foreach($lang as $item):?>
                <li>
                    <a href="<?php echo base_url().$item['abbr'];?>"><img src="<?php echo theme_url('styles/default/images/lang/'.$item['abbr'].'.jpg')?>" alt="" /></a>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
  <div id="header">
    <div id="logo"><img src="<?php echo base_url().$logo;?>" alt="" width="173" height="128" /></div>

    <?php if(!empty($banner)): ?><div id="banner"><a href="<?php echo $banner_url?>"><img src="<?php echo base_url().$banner;?>" width="450" height="90" alt="" /></a></div><?php endif; ?>
  </div>
  <div id="main">
  	<div id="menu" style="width:965px">
  		<?php echo $list_of_menu = menu('main_menu'); ?>
  	</div>
<div>
	    <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="965" height="250">
		 	<param name="movie" value="<?php echo base_url()?>/upload/flash/bcastr.swf?bcastr_xml_url=<?php echo site_url('slides')?>"><param name="quality" value="high">
		 	<param name="menu" value="false"><param name=wmode value="opaque">
		 	<param name="FlashVars" value="bcastr_config=|2|||0xFFFFFF|0xFF6600||4|3|1|_blank">
		 	<embed src="<?php echo base_url()?>/upload/flash/bcastr.swf?bcastr_xml_url=<?php echo site_url('slides')?>" wmode="opaque" FlashVars="bcastr_config=|2|||0xFFFFFF|0xFF6600||4|3|1|_blank" menu="false" quality="high" width="965" height="250" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" wmode="transparent"/>
		 </object>
  	</div>
    <div id="c_main">
      <div id="slide">
        <!-- "previous page" action -->
        <a class="prev browse left"></a>
        <!-- root element for scrollable -->
        <div class="scrollable">
          <!-- root element for the items -->
          <div class="items">
            <?php foreach( $slide_data as $key => $item ):?>
            	<?php if( $key % 4 == 0 ):?><div class="B-items"><?php endif;?>
            		 <div class="Bslide">
            		 	<?php if($item['is_hot'] == 1):?><div class="hot"></div><?php endif;?>
            	 		<?php if ( !empty($item['image']) ):?>
            	 			<?php echo image_thumb($item['image'], 105, 155, "title=".$item['title']." border='0'")?>
            	 		<?php else:?>
            	 			<img title="<?php echo $item['title'];?>" src="<?php echo base_url().'upload/image/noimage.gif';?>" border="0" />
            	 		<?php endif;?>
		                <div><a href="<?php echo site_url('tour/detail/'.$item['id']);?>"><?php echo $item['title'];?></a></div>
		             </div>
				<?php if( ($key + 1) % 4 == 0 || ($key+1) == count($slide_data) ) :?></div><?php endif;?>
            <?php endforeach;?>
          </div>
        </div>
        <!-- "next page" action -->
        <a class="next browse right"></a> </div>
      <div id="top_cmain"></div>
      <div id="Lajax">
        <div id="left_main"  class="css-panes">
          <div style="display:block" >
            <!-- HOME -->
            
            <?php echo $content?>
            
            <!-- END HOME -->
          </div>
        </div>

        <div id="right_main">
          <div class="your_tour">
        		<a href="<?php echo site_url('tour/book_seft');?>" class="button btn_update your_book"><?php echo lang('your_tour');?></a>
          </div>
          <div id="search">
	     	<p class="title_s"><?php echo lang('layout_search')?></p>
	     	<div>
	     		<form method="post" action="<?php echo site_url('tour/search');?>">
	     		<p class="tour">
		     		<input type="radio" name="typetour" value="inbound" checked="checked"/> <?php echo lang('layout_inbound')?> -  
		     		<input type="radio" name="typetour" value="outbound"/> <?php echo lang('layout_outbound')?>
	     		</p>
	     		<p class="txt">
	     			<?php echo lang('layout_name_tour')?> <span style="font-style: italic"><?php echo lang('layout_attention')?></span><br/>
	     			<input type="text" name="txtsearch" size="27"/>
	     		</p>
	     		<button class="btn" type="submit"><?php echo lang('layout_bt_search')?></button>
	     		<div class="clear"></div>
	     		</form>
	     	</div>
	      </div>
<style>
	      	.support{border:1px solid #89B9E8; margin-top:10px; text-align:center; -moz-border-radius:5px;}
	      	.support .sp_title{height:20px; background-image:-moz-linear-gradient(center top , #6CA2D7, #AFD7FF); margin-bottom:10px; padding:6px 0 2px; color:#FFF; font-weight:bold; font-size:14px;}
	      	.support span{display:block; padding:2px 0 15px;}
	      </style>
	      <ul class="support">
      		<li class="sp_title">Hỗ trợ trực tuyến</li>
      		<li>
      			<a title="Hồ Thanh Minh" href="ymsgr:sendim?thanhminh_246">
      				<img border="0" alt="" src="http://opi.yahoo.com/online?u=thanhminh_246&amp;m=g&amp;t=2">
      			</a>
				<a href="skype:thanhminh246?call">
					<img src="http://download.skype.com/share/skypebuttons/buttons/call_blue_white_124x52.png" style="border: none;" width="124" height="52" alt="Skype Me™!" />
				</a>
				<span>Hồ Thanh Minh</span>
      		</li>
      		<li>
      			<a title="Hồ Thanh Minh" href="ymsgr:sendim?thanhminh_246">
      				<img border="0" alt="" src="http://opi.yahoo.com/online?u=thanhminh_246&amp;m=g&amp;t=2">
      			</a>
				<a href="skype:thanhminh246?call">
					<img src="http://download.skype.com/share/skypebuttons/buttons/call_blue_white_124x52.png" style="border: none;" width="124" height="52" alt="Skype Me™!" />
				</a>
				<span>Hồ Thanh Minh</span>
      		</li>
      	  </ul>
	      
          <div><div id="tdTS"></div></div>


          
          <div class="list_images">
          		<div style="border-bottom:1px dotted #CECECE; position: relative; height: 10px; margin-bottom: 10px;">
          			<span style="position: absolute; background: #F5F5F5; top:2px; left:10px; font-style: italic; color: #A7A7A7; padding:0 2px;"><?php echo lang('advertising');?></span>
         	 	</div>
          	<?php foreach($list_images as $item): ?>
          		<?php if ( is_array($item) ){?>
          		<?php if (!empty($item['link']) ){?><a href="<?php echo $item['link'];?>" target="_blank"><?php }?>
          				<?php echo image_thumb($item['image'], 150, 205, " border='0'")?>
          		<?php if (!empty($item['link']) ){?></a><?php }?>
          		<?php } else {?>
          			<?php echo image_thumb($item, 150, 205, " border='0'")?>
          		<?php }?>
          	<?php endforeach;?>
          </div>




<div style="margin:10px auto; width:157px;">
          	<a href="http://www.phuquocsmile.com" target="blank" >
			<img alt="GREEN CRUISE TOURISM" hspace="0" vspace="0" border="0" src="http://bigbluecounters.com/3018085-0A3390B2ADB4064AA7FEAF1B0063FFCF/counter.img?theme=44&digits=9&siteId=7"/>
			</a>
          </div>
        </div>
        <div id="bot_cmain"><a href="" id="back_top" title="<?php echo lang('back_to_top')?>"></a></div>
      </div>
      <div style="height:1px;"></div>
    </div>
    <div id="footerpanel">
   		<div style="width:965px; margin:auto; font-weight:bold; position: relative;">
   			<div style="position: absolute; bottom:-25px; left:-25px; *bottom:0px"><img src="<?php echo base_url().'upload/image/logo1.png';?>" width="26px"/></div>
   			<p style="float:left; color:#39B449; vertical-align: middle; padding:0 7px; line-height:26px;">
   				<span>GREEN CRUISE TOURISM</span>
   			</p>
   			<p style="float:left; line-height:26px; padding:0 72px">
   				<span style="color:#F60908;">HOT LINE:</span>  0907 55 0809 - 0907 588 155
   			</p>
		    <?php echo show_nickchat();?>
		    <p style="float:right; line-height:26px;"><?php echo lang('online_support');?> : </p>
		    <div class="clear"></div>
		</div>
	</div>
	
    <div id="footer">
      <?php
      	$ci =& get_instance();
      	$ci->db->select('title, alias');
      	$ci->db->from('menu');
      	$ci->db->join('menu_lang', 'id = menu_id');
      	$ci->db->where('parent', 0);
      	$ci->db->where('active', 1);
      	$ci->db->where('lang', $this->setting->lang('abbr'));
      	$ci->db->order_by('ordering, id');
      	$menu_footer = $ci->db->get()->result_array();
      ?>
      <p class="f_menu">
      <?php 
      	$count = count($menu_footer)-1;
      	foreach($menu_footer as $k => $item):
      ?>
      <a href="<?php echo site_url($item['alias'])?>"><?php echo $item['title']?></a>
      <?php if($k != $count) echo(' | ')?>
      <?php endforeach;?>
      </p>
    
      <p>Copyright © 2010 Công ty Cổ phần Dịch vụ Du lịch - Thương mại Hành Trình Xanh.</p>
      <p>® Ghi rõ nguồn "phuquocsmile.com" khi sử dụng thông tin từ website này.</p>
      <p>14 Trần Hưng Đạo, Dương Đông, Phú Quốc - Kiên Giang. </p>
      <p>Tel: 077 39 78 111 or 077 39 78 111 - Fax: 077 39 78 222.</p>
    </div>
</div>
</div>
</div>
<?php load_js('assets/scrollable.js');?>
<?php load_js('assets/jquery.easing.1.3.js');?>
<?php load_js('assets/TopStory/AjaxRequest.js');?>
<?php load_js('assets/TopStory/Library.js');?>
<?php load_js('assets/TopStory/TopStory.js');?>
<a href="http://www.prchecker.info/" title="Free PageRank Checker" target="_blank">
<img src="http://pr.prchecker.info/getpr.php?codex=aHR0cDovL3BodXF1b2NzbWlsZS5jb20=&tag=1" alt="Free PageRank Checker" style="border:0;" /></a>
</body>
</html>
