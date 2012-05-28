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