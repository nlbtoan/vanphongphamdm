<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo lang('tieu_de') ?></title>
<?php $this->load->view('head') ?>
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
        <div id="wrapper" class="panel">        	
            <div class="panel_top"><div></div></div>            
            <div class="panel_left">
                <div class="panel_right">    
                    <!-- ########################## ICON & BREADCRUMB ########################## --> 
	                <div>
					    <p class="float_l"><img src="<?php echo theme_url('styles/default/images/icons/user.gif') ?>" /></p>					
					    <p>
					        <span class="large">Thay đổi thông tin cá nhân</span><br />
					        <span class="quiet">Quản trị website / Quản lý thành viên</span>
					    </p>
					    <div class="clear"></div>
					</div>
                    <!-- ########################## /ICON & BREADCRUMB ########################## -->
					<!-- ########################## CONTENT ########################## -->
					<?php echo form_open("admin/auth/change_password");?>
					<div class="panel_top"><div></div></div>            
		            <div class="panel_left">
		                <div class="panel_right"> 		
							<div id="infoMessage"><?php echo $message;?></div>
							
							
							
							<table class="info">				            	
				            	<tr>
				            		<th>Mật khẩu cũ</th>
				            		<td><?php echo form_input($old_password);?></td>
				            	</tr>		
				            	<tr>
				            		<th>Mật khẩu mới</th>
				            		<td><?php echo form_input($new_password);?></td>
				            	</tr>			         
				            	<tr>
				            		<th>Xác nhận mật khẩu mới</th>
				            		<td><?php echo form_input($new_password_confirm);?></td>
				            	</tr>   				            					            
			            	</table>
							<?php echo form_input($user_id);?>
															    
							
		                </div>
		            </div>
		            <div class="panel_bottom"><div></div></div>
		            
		            <div style="position: relative; left: 40%">					
						<a class="button submit positive disabled" href="#">							
					    	<img src="<?php echo theme_url('assets/buttons/icons/tick.png') ?>" alt="Save"/> Cập nhật
					  	</a>
					  	
					  	<a class="button reset negative disabled" href="#">							
					    	<img src="<?php echo theme_url('assets/buttons/icons/cross.png') ?>" alt="Reset"/> Xóa
					  	</a>
					  	<div class="clear"></div> 					    
					</div>	   
					<?php echo form_close();?>
					<!-- ########################## END CONTENT ########################## -->  				  	    				   				    				                                                                                                                                                                            
                </div>
            </div>
            <div class="panel_bottom"><div></div></div>
        </div><!--/wrapper-->
        <!-- ########################## END WRAPPER ###################### -->
        <div class="clear"></div>        
    </div><!--/containner-->
</body>
</html>