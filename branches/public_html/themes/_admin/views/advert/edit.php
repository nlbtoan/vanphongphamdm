<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo lang('tieu_de') ?></title>
<?php $this->load->view('head') ?>

<?php load_css('assets/message/screen.css') ?>

<script type="text/javascript">
$(document).ready(function(){	
	$('#message').show().delay(10000).fadeOut('slow');
});
</script>
</head>

<body>	
    <div id="container">    	   
        <!-- ########################## HEADER ########################## -->
		<div id="header">
       	<?php $this->load->view('header') ?>                
        </div>          
		<!-- ########################## END HEADER ###################### -->
        
       <!-- ########################## LEFT ########################## -->
        <div id="left" class="panel">        	            
			<?php $this->load->view('leftsiderbar') ?>                                                    
        </div>        
        <!-- ########################## END LEFT ###################### -->
        
        <!-- ########################## WRAPPER ########################## -->
        <?php echo form_open("admin/advert/edit/".$info['id']);?>
        <div id="wrapper" class="panel">        	
            <div class="panel_top"><div></div></div>
            <div class="panel_left">
                <div class="panel_right">
                	<!-- ########################## ICON & BREADCRUMB ########################## --> 
				    <p class="float_l"><img src="<?php echo theme_url('styles/default/images/icons/user.gif') ?>" /></p>					
				    <p class="float_l">
				        <span class="large">Sửa nickchat</span><br />
				        <span class="quiet">Quản lý nickchat</span>
				    </p>
				    <div class="clear"></div>
				    
				    <!-- ########################## TOOLBAR ########################## -->
				    <div class="toolbar">
				    	<button class="negative" type="button" onclick="window.location = '<?php echo site_url('admin/advert');?>'"><img src="<?php echo theme_url('styles/default/images/icons/delete_row.png')?>"/><br/><?php echo lang('layout_toolbar_cancel') ?></button>
				    	<button class="positive" type="submit"><img src="<?php echo theme_url('styles/default/images/icons/insert_row.png')?>"/><br/><?php echo lang('layout_toolbar_save') ?></button>
				    </div>
				    
				    <div id="message" >
				    	<?php if( !empty($message) ) echo $message; ?>
				    </div> 
				
				<!-- ########################## CONTENT ########################## -->
				<div id="container-1" class="container" style="margin-top: 20px">
					<div class="panel_top"><div></div></div>
					<div class="panel_left">
						<div class="panel_right">
							<table class="editing">							
								<tr>
				            		<th><?php echo lang('name_cat') ?></th>
				            		<td>
				            			<input type="text" name="name" value="<?php echo $info['name'];?>" style="width:300px;"></input>
				            		</td>
				            	</tr>
				            	<tr>
				            		<th><?php echo lang('alias') ?></th>
				            		<td>
				            			<input type="text" name="alias" value="<?php echo $info['alias'];?>" style="width:300px;"></input>
				            		</td>
				            	</tr>
				            	<tr>
				            		<th>Mở  : </th>
				            		<td>
				            			<?php if ( $info['active'] == "1") : ?>
					            			<?php echo form_radio(array('checked' => 'checked', 'name' => 'active', 'value' => '1')); ?> Mở
					            			<?php echo form_radio(array('name' => 'active', 'value' => '0')); ?> Đóng
				            			<?php else :?>
					            			<?php echo form_radio(array('name' => 'active', 'value' => '1')); ?> Mở
					            			<?php echo form_radio(array('checked' => 'checked', 'name' => 'active', 'value' => '0')); ?> Đóng
				            			<?php endif; ?>
				            		</td>
			            		</tr>
							</table>
						</div>
					</div>
					<div class="panel_bottom"><div></div></div>
				</div>
				<!-- ########################## END CONTENT ########################## -->  				  	    				   				    				                                                                                                                                                                            
                </div>
            </div>
            <div class="panel_bottom"><div></div></div>
        </div><!--/wrapper-->
        <?php echo form_close();?>
        <!-- ########################## END WRAPPER ###################### -->
        <div class="clear"></div>        
    </div><!--/containner-->
</body>
</html>

