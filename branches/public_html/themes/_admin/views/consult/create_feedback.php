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
        <?php echo form_open("admin/consult/create_feedback");?>
        <div id="wrapper" class="panel">
            <div class="panel_top"><div></div></div>            
            <div class="panel_left">
                <div class="panel_right">
                	<!-- ########################## ICON & BREADCRUMB ########################## --> 
				    <p class="float_l"><img src="<?php echo theme_url('styles/default/images/icons/user.gif') ?>" /></p>					
				    <p class="float_l">
				        <span class="large">Thêm menu con</span><br />
				        <span class="quiet">Quản lý menu</span>
				    </p>
				    <div class="clear"></div>
				    
				    <!-- ########################## TOOLBAR ########################## -->
				    <div class="toolbar">
				    	<button class="negative" type="button" onclick="window.location = '<?php echo $back_url?>'"><img src="<?php echo theme_url('styles/default/images/icons/back.png')?>"/><br/><?php echo lang('layout_toolbar_cancel') ?></button>
				    	<button class="positive" type="submit"><img src="<?php echo theme_url('styles/default/images/icons/insert_row.png')?>"/><br/><?php echo lang('layout_toolbar_save') ?></button>
				    </div>
				    
				    <!-- ########################## MESSAGE ########################## -->
				    <div id="message">
				    	<?php if( !empty($message) ) echo $message;?>
				    </div>
				    <div class="clear"></div>

				<!-- ########################## CONTENT ########################## -->
					<fieldset>
						<legend>Thông tin chung</legend>
						<table class="editing">
							<tr>
			            		<th><?php echo lang('your_name');?>  : </th>
			            		<td><input type="text" size="26" name="fullname" <?php if ( !empty($restore_data) ) echo 'value="'.$restore_data['fullname'].'"'; ?> /></td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('email');?>  : </th>
			            		<td><input type="text" size="26" name="email" <?php if ( !empty($restore_data) ) echo 'value="'.$restore_data['email'].'"'; ?> /></td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('title_fb');?> : </th>
			            		<td><input type="text" size="26" name="title" <?php if ( !empty($restore_data) ) echo 'value="'.$restore_data['title'].'"'; ?> /></td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('content_fb');?> : </th>
			            		<td><textarea name="content"><?php if ( !empty($restore_data) ) echo $restore_data['content']; ?></textarea></td>
			            	</tr>
						</table>
					</fieldset>
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