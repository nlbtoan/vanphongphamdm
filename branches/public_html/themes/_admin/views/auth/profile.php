<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo lang('tieu_de') ?></title>
<?php load_css('styles/default/css/reset.css') ?>
<?php load_css('styles/default/css/typography.css') ?>
<?php load_css('styles/default/css/screen.css') ?>

<!--[if lte IE 6]>
<?php load_css('styles/default/css/ie6.css', array('media'=>'projection, screen')) ?>
<![endif]-->
<!--[if lte IE 7]>
<?php load_css('styles/default/css/ie7.css', array('media'=>'projection, screen')) ?>
<![endif]-->

<script type="text/javascript" src="<?php echo site_url('assets/base'); ?>"></script>

<?php load_css('assets/buttons/screen.css') ?>


<?php load_css('assets/tabs/screen.css') ?>
<?php load_js('assets/tabs/jquery.tabs3.min.js') ?>

<?php load_css('assets/message/screen.css') ?>

<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.form'); ?>"></script>

<script type="text/javascript">
$(document).ready(function(){				
	$('#container-1').tabs();

	var options = {		
		dataType: 'json',		
		success: function(data) {			
			if (isset(data.message) == true) {				
				$('#message').show_message(data.message);
			}
		}			
	};

	var options_change_password = $.extend({        
		clearForm: true,	
		success: function(data) {	
						
			if (isset(data.message) == true) {
				$('#message').show_message(data.message);
			}
		}	
    }, options);
    
	$('#form_profile').ajaxForm(options);
	$('#form_change_password').ajaxForm(options_change_password);
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
        <div id="wrapper" class="panel">        	
            <div class="panel_top"><div></div></div>            
            <div class="panel_left">
                <div class="panel_right">                    	
                    <!-- ########################## ICON & BREADCRUMB ########################## --> 
	               
				    <p class="float_l"><img src="<?php echo theme_url('styles/default/images/icons/user.gif') ?>" /></p>					
				    <p>
				        <span class="large">Cập nhật thông tin</span><br />
				        <span class="quiet">Quản trị website / <?php echo anchor('admin/auth/manage','Quản lý thành viên')?></span>
				    </p>
				    <div class="clear"></div>
				    				    	
				   <div id="message">
				   <?php echo $message ?>
				   </div> 		    
									
                    <!-- ########################## /ICON & BREADCRUMB ########################## -->
                   
                    <!-- ########################## CONTENT ########################## -->
                    <div id="container-1" class="container">
                    	                  	                    
	                    <ul style="width:100%">		            			                		               					                					                					            
			                <li class="<?php echo ($this->router->fetch_method() == 'profile') ? 'ui-tabs-selected' : ''?>" >
			                	<a href="#profile"><span>Thông tin</span></a>
			                </li>
			                <li class="<?php echo ($this->router->fetch_method() == 'change_password') ? 'ui-tabs-selected' : ''?>">
			                	<a href="#change_password"><span>Mật khẩu</span></a>
			                </li>
			            </ul>                   						
						<?php 
						
	        			$user_id = array(	'name'    => 'user_id',
	                                                    'id'      => 'user_id',
	                                                    'type'    => 'hidden',
	        								'value'   => $user->id);
	        			$first_name = array( 	'name' => 'first_name',
	        									'id' => 'first_name',        												
	        									'type' => 'text',
	        									'value' => $user->first_name);	
	        			$last_name = array( 	'name' => 'last_name',
	        									'id' => 'last_name',
	        									'size' => 40,
	        									'type' => 'text',
	        									'value' => $user->last_name);
	        			$company = array( 	'name' => 'company',
	        									'id' => 'company',
	        									'size' => 40,
	        									'type' => 'text',
	        									'value' => $user->company);	
	        			$phone = array( 	'name' => 'phone',
	        									'id' => 'phone',
	        									'size' => 20,
	        									'type' => 'text',
	        									'value' => $user->phone);		
	        			$old_password = array(	'name'    => 'old',
	                                                		'id'      => 'old',
	                                                		'type'    => 'password');
									
	        			$new_password = array(	'name'    => 'new',
	                                               'id'      => 'new',
	                                              'type'    => 'password');
	        			$new_password_confirm = array(	'name'    => 'new_confirm',
	                                                        'id'      => 'new_confirm',
	                                                        'type'    => 'password');
	        			$user_id = array(	'name'    => 'user_id',
	                                                    'id'      => 'user_id',
	                                                    'type'    => 'hidden',
	        								'value'   => $user->id); 					
						?>
						<!-- ########################## FRAGMENT 1 ########################## -->
						<div id="profile">
							<?php echo form_open("admin/auth/profile/" . $user->id, array('id'=>'form_profile'));?>
							<div class="panel_top"><div></div></div>            
				            <div class="panel_left">
				                <div class="panel_right"> 									
									
									<table class="editing">
										<tr>
						            		<th>Tên đăng nhập</th>
						            		<td><input type="text" value="<?php echo $user->username ?>" disabled="disabled"/></td>
						            	</tr>
						            	
										<tr>
						            		<th>Tên</th>
						            		<td><?php echo form_input($first_name);?></td>
						            	</tr>
						            	<tr>
						            		<th>Họ và tên đệm</th>
						            		<td><?php echo form_input($last_name);?></td>
						            	</tr>
						            	<tr>
						            		<th>Đại chỉ email</th>
						            		<td><input type="text" size="40" value="<?php echo $user->email ?>" disabled="disabled"/></td>
						            	</tr>
														            					            	 
						            	<tr>
						            		<th>Công ty</th>
						            		<td><?php echo form_input($company);?></td>
						            	</tr>  
						            	<tr>
						            		<th>Số điện thoại</th>
						            		<td><?php echo form_input($phone);?></td>
						            	</tr>  			            					            
					            	</table>
									<?php echo form_input($user_id);?>
									
									
									<div style="width: 200px; margin: 0 auto;">					
										<button type="submit" class="button positive">							
									    	<img src="<?php echo theme_url('assets/buttons/icons/tick.png') ?>" alt="Save"/> Cập nhật
									  	</button>
									  	
									  	<button type="reset" class="button negative">							
									    	<img src="<?php echo theme_url('assets/buttons/icons/cross.png') ?>" alt="Reset"/> Xóa
									  	</button>
									  	<div class="clear"></div> 					    
									</div>									    							
				                </div>
				            </div>
				            <div class="panel_bottom"><div></div></div>
				            
				               
							<?php echo form_close();?>
						</div>
						<!-- ########################## /FRAGMENT 1 ########################## -->
						
						<!-- ########################## FRAGMENT 2 ########################## -->
						<div id="change_password">
							<?php echo form_open("admin/auth/change_password/" . $user->id, array('id'=>'form_change_password'));?>
							<div class="panel_top"><div></div></div>            
				            <div class="panel_left">
				                <div class="panel_right"> 																
									<table class="editing">																				            
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
									
									
									
									<div style="width: 200px; margin: 0 auto;">					
										<button type="submit" class="button positive">							
									    	<img src="<?php echo theme_url('assets/buttons/icons/tick.png') ?>" alt="Save"/> Cập nhật
									  	</button>
									  	
									  	<button type="reset" class="button negative">							
									    	<img src="<?php echo theme_url('assets/buttons/icons/cross.png') ?>" alt="Reset"/> Xóa
									  	</button>
									  	<div class="clear"></div> 					    
									</div>	 								    							
				                </div>
				            </div>
				            <div class="panel_bottom"><div></div></div>
				            
				              
							<?php echo form_close();?>
						</div>
						<!-- ########################## /FRAGMENT 2 ########################## -->
					</div>
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