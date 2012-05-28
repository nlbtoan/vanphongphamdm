<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo lang('title') ?></title>
<?php $this->load->view('head') ?>

<!-- LOAD JS -->
<script type="text/javascript" src="<?php echo site_url('assets/jquery-ui-1.8.2.custom.min.js')?>"></script>
<?php load_js('assets/treeview/jquery.treeview.js')?>

<?php load_css('assets/message/screen.css') ?>
<?php load_css('assets/treeview/jquery.treeview.css')?>

<script type="text/javascript">
$(document).ready(function(){
	/**
	* Hien thi message neu co'
	*/
	$('#message').show().delay(10000).fadeOut('slow');

	// first example
	$(".navigation").treeview({
		persist: "location",
		collapsed: true,
		unique: true
	});

	$(".choose").click(function(e){
		var url = site_url('admin/menu/create_menu_item');
		var link_com = $(this).attr('rel');
		$.post(url, {link: link_com});
	});

	$('#line_drag').height($('#wrapper').height());
	$('#line_drag').draggable({
		axis: 'x',
		posStart : 0,
		posStop : 0,
		opacity : 0.50,
		start: function(event, ui)
		{
			$('#line_drag').css('background-color', '#CBCBCB');
			posStart = ui.position.left;
		},
		drag: function(event, ui)
		{
			var left = parseInt($(this).css('left').replace('px',''));
		},
		stop: function(event, ui)
		{
			$('#line_drag').css('background-color', '');
			posStop = ui.position.left;
			var posLength = posStart - posStop;
			
			//if(posLength > 0)
			//{
				var left_width = $('#left').width();
				var wrapper_width = $('#wrapper').width();
	
				left_width -= posLength;
				wrapper_width += posLength;
	
				$('#left').width(left_width);
				$('#wrapper').width(wrapper_width);
				$(this).css('left', 0);
			//}
		}
	});
});	
</script>

</head>
<body>	
	<div id="echo"></div>
    <div id="container">    	   
        <!-- ########################## HEADER ########################## -->
		<div id="header">
       	<?php $this->load->view('header') ?>                
        </div>          
		<!-- ########################## END HEADER ###################### -->
        
       <!-- ########################## LEFT ########################## -->
        <div id="left" class="panel" style="padding-right:0px">        	            
			<?php $this->load->view('leftsiderbar') ?>                                                    
        </div>
        <div id="line_drag" style="cursor:col-resize; margin-top:5px; float:left; width:10px; height:200px; background: url('<?php echo theme_url('styles/default/images/icons/dot_resize.png')?>') no-repeat scroll 3px 50%;"></div>
        <!-- ########################## END LEFT ###################### -->
        
        <!-- ########################## WRAPPER ########################## -->
        <div id="wrapper" class="panel">
        	<form action="<?php echo site_url("admin/menu/manage");?>" method="post" id="adminForm">        	
            <div class="panel_top"><div></div></div>            
            <div class="panel_left">
                <div class="panel_right">
                	<!-- ########################## ICON & BREADCRUMB ########################## --> 
				    <p class="float_l"><img src="<?php echo theme_url('styles/default/images/icons/user.gif') ?>" /></p>					
				    <p class="float_l">
				        <span class="large">Tạo menu</span><br />
				        <span class="quiet"><?php echo lang('title') ?></span>
				    </p>
				    <div class="clear"></div>
				    
				    <!-- ########################## TOOLBAR ########################## -->
				    <div class="toolbar">
				    	<button class="negative" type="button" onclick="window.location = ''"><img src="<?php echo theme_url('styles/default/images/icons/delete_row.png')?>"/><br/><?php echo lang('layout_toolbar_cancel') ?></button>
				    </div>
				    
				    <!-- ########################## MESSAGE ########################## -->
				    <div id="message">
				    	<?php if( !empty($message) ) foreach($message as $item) echo $item;?>
				    </div>
				    <div class="clear"></div>
				    
				<!-- ########################## CONTENT ########################## -->
				<?php if( !empty($page) ):?>
				<fieldset>
					<legend>Nội dung</legend>
					<ul class="navigation">
					<?php 
						foreach($page as $item) :
						$url = site_url("admin/menu/create_menu_item/$page_url" . $item['page_id']);
					?>
					<li><a href='<?php echo $url?>'><?php echo $item['title']?></a></li>
					<?php endforeach;?>
					</ul>
				</fieldset>
				<?php endif;?>

				<?php if( !empty($tour) ):?>
				<fieldset>
					<legend>Tour</legend>
					<ul class="navigation">
					<?php
						$level = 0;
						foreach($tour as $item){
							$url = site_url("admin/menu/create_menu_item/$tour_url" . $item['data']['id']);
							
							if(isset($parent)){
								if($item['lv'] > $parent)
								{
									echo '<ul>';
									echo "<li><a href='$url'>" . $item['data']['name'] . '</a>';
									
									$parent = $item['lv'];
									$level++;
								}
								elseif ($item['lv'] < $parent )
								{
									for($i = 0; $i < $parent; $i++)
									{
										echo '</li>';
										echo '</ul>';
									}
									echo '</li>';
									echo "<li><a href='$url'>" . $item['data']['name'] . '</a>';
									$parent = 0;
								}
								else
								{
									echo '</li>';
									echo "<li><a href='$url'>" . $item['data']['name'] . '</a>';
								}
							}
							else{
								echo "<li><a href='$url'>" . $item['data']['name'] . '</a>';
								$parent = $item['lv'];
							}
							
						}
						unset($parent);
					?>
					</ul>
				</fieldset>
				<?php endif;?>
				
				<?php if( !empty($news) ):?>
				<fieldset>
					<legend>Tin tức</legend>
					<ul class="navigation">
					<?php
						$level = 0;
						foreach($news as $item){
							$url = site_url("admin/menu/create_menu_item/$tour_url" . $item['data']['id']);
							
							if(isset($parent)){
								if($item['lv'] > $parent)
								{
									echo '<ul>';
									echo "<li><a href='$url'" . $item['data']['name'] . '</a>';
									
									$parent = $item['lv'];
									$level++;
								}
								elseif ($item['lv'] < $parent )
								{
									for($i = 0; $i < $parent; $i++)
									{
										echo '</li>';
										echo '</ul>';
									}
									echo '</li>';
									echo "<li><a href='$url'>" . $item['data']['name'] . '</a>';
									$parent = 0;
								}
								else
								{
									echo '</li>';
									echo "<li><a href='$url'>" . $item['data']['name'] . '</a>';
								}
							}
							else{
								echo "<li><a href='$url'>" . $item['data']['name'] . '</a>';
								$parent = $item['lv'];
							}
							
						}
					?>
					</ul>
				</fieldset>
				<?php endif;?>
				
				<fieldset>
					<legend>Link</legend>
					<ul class="navigation">
						<?php $url = site_url("admin/menu/create_menu_item/link")?>
						<li><a href="<?php echo $url?>">Link Url</a></li>
					</ul>
				</fieldset>
				<!-- ########################## END CONTENT ########################## -->
                </div>
            </div>
            <div class="panel_bottom"><div></div></div>
            </form>
        </div><!--/wrapper-->
        <!-- ########################## END WRAPPER ###################### -->
        <div class="clear"></div>
        
        <!-- ########################## FOOTER ########################## -->
		<div id="footer">
       	<?php $this->load->view('footer') ?>                
        </div>          
		<!-- ########################## END FOOTER ###################### -->
    </div><!--/containner-->
</body>
</html>

