<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo lang('tieu_de') ?></title>
<?php $this->load->view('head') ?>

<script type="text/javascript">
$(document).ready(function(){				
	
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
				        <span class="large">Thay đổi thông tin cá nhân</span><br />
				        <span class="quiet">Quản trị website / Quản lý thành viên</span>
				    </p>
				    <div class="clear"></div>
				    				    	
				   <div id="message">
				   <?php echo $message ?>
				   </div> 		    
									
                    <!-- ########################## /ICON & BREADCRUMB ########################## -->
                   
                    <!-- ########################## CONTENT ########################## -->
                    <div id="container-1" class="container">
                    	                  	                    
	               <div class='mainInfo'>
						<h1>Create User</h1>
						<p>Please enter the users information below.</p>						
						
					    <?php echo form_open("admin/auth/create_user");?>
					      <p>Username:<br />
					      <?php echo form_input($username);?>
					      </p>
					      <p>First Name:<br />
					      <?php echo form_input($first_name);?>
					      </p>
					      
					      <p>Last Name:<br />
					      <?php echo form_input($last_name);?>
					      </p>
					      
					      <p>Company Name:<br />
					      <?php echo form_input($company);?>
					      </p>
					      
					      <p>Email:<br />
					      <?php echo form_input($email);?>
					      </p>
					      
					      <p>Phone:<br />
					      <?php echo form_input($phone1);?>-<?php echo form_input($phone2);?>-<?php echo form_input($phone3);?>
					      </p>
					      
					      <p>Password:<br />
					      <?php echo form_input($password);?>
					      </p>
					      
					      <p>Confirm Password:<br />
					      <?php echo form_input($password_confirm);?>
					      </p>
					      
					      
					      <p><?php echo form_submit('submit', 'Create User');?></p>
					
					      
					    <?php echo form_close();?>
					
					</div>
	               
						
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