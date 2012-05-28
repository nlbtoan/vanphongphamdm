<?php echo doctype(); ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo lang('tieu_de') ?></title>
<?php $this->load->view('head') ?>

<!-- LOAD JS -->
<script type="text/javascript" src="<?php echo site_url('assets/jquery-ui-1.8.2.custom.min.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/jquery.easy-confirm-dialog.js')?>"></script>

<!-- LOAD CSS -->
<?php load_css('assets/message/screen.css') ?>

<script type="text/javascript">
$(document).ready(function(){
	$('#message, .notice').show().delay(10000).fadeOut('slow');
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
        <?php echo form_open("admin/flight/edit/".$info['id']);?>
        <div id="wrapper" class="panel">
            <div class="panel_top"><div></div></div>            
            <div class="panel_left">
                <div class="panel_right">
                	<!-- ########################## ICON & BREADCRUMB ########################## --> 
				    <p class="float_l"><img src="<?php echo theme_url('styles/default/images/icons/user.gif') ?>" /></p>					
				    <p class="float_l">
				        <span class="large"><?php echo lang('layout_flight_manage') ?></span><br />
				        <span class="quiet"><?php echo lang('layout_flight_create') ?></span>
				    </p>
				    <div class="clear"></div>
				    
				    <!-- ########################## TOOLBAR ########################## -->
				    <div class="toolbar">
				    	<button class="negative" type="button" onclick="window.location = '<?php echo site_url('admin/flight/manage');?>'"><img src="<?php echo theme_url('styles/default/images/icons/back.png')?>"/><br/><?php echo lang('layout_toolbar_cancel') ?></button>
				    	<button class="positive" type="submit"><img src="<?php echo theme_url('styles/default/images/icons/insert_row.png')?>"/><br/><?php echo lang('layout_toolbar_save') ?></button>
				    </div>
				    
				    <!-- ########################## MESSAGE ########################## -->
				    <div id="message">
				    	<?php if( !empty($message) ) echo $message;?>
				    </div>
				    <div class="clear"></div>
				
				<!-- ########################## CONTENT ########################## -->
					<fieldset>
						<legend>Thông tin chuyến bay</legend>
						<table class="editing">
							<tr>
			            		<th>ID : </th>
			            		<td style="font-weight: bold">
			            			<?php echo $info['id']?>
			            		</td>
			            	</tr>
			            	<tr>
			            		<th>Ngày tạo : </th>
			            		<td style="font-weight: bold">
			            			<?php echo date('d/m/Y', $info['date'])?>
			            		</td>
			            	</tr>
			            	<tr>
			            		<th>Từ  : </th>
			            		<td>
			            			<input type="text" style="width:300px" value="<?php echo $info['to']?>" name="to">
			            		</td>
			            	</tr>
			            	<tr>
			            		<th>Đến  : </th>
			            		<td>
			            			<input type="text" style="width:300px" value="<?php echo $info['from']?>" name="from">
			            		</td>
			            	</tr>
			            	<tr>
			            		<th>Quá cảnh  : </th>
			            		<td>
			            			<input type="text" style="width:300px" value="<?php echo $info['transit']?>" name="transit">
			            		</td>
			            	</tr>
			            	<tr>
			            		<th>Mở  : </th>
			            		<td>
			            			<?php if( $info['active'] == 1 ):?>
				            			<?php echo form_radio(array('checked' => 'checked', 'name' => 'active', 'value' => '1')); ?> Mở
				            			<?php echo form_radio(array('name' => 'active', 'value' => '0')); ?> Đóng
				            		<?php else:?>
				            			<?php echo form_radio(array('name' => 'active', 'value' => '1')); ?> Mở
				            			<?php echo form_radio(array('checked' => 'checked', 'name' => 'active', 'value' => '0')); ?> Đóng
				            		<?php endif;?>
			            		</td>
			            	</tr>
						</table>
					</fieldset>
				<!-- ########################## END CONTENT ########################## -->  				  	    				   				    				                                                                                                                                                                            
                </div>
            </div>
            <div class="panel_bottom"><div></div></div>
            <input type="hidden" name="date" value="<?php echo $info['date']?>">
        </div><!--/wrapper-->
        <?php echo form_close();?>
        <!-- ########################## END WRAPPER ###################### -->
        <div class="clear"></div>        
    </div><!--/containner-->
</body>
</html>