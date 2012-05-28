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
                <div class="panel_right" align="center">            
				<!-- ########################## CONTENT ########################## -->
				<h1><?php echo $namesite?></h1>
				<img src="<?php echo $logo?>" alt="" style="max-width: 600px"/>
				<!-- ########################## END CONTENT ########################## -->
				<h3 style="margin-top:20px;">Thống kê Booking:</h3>
				<ul style="text-align: center; margin-top:10px;">
					<?php foreach( $data as $key=>$item ):?>
					<?php if ( !empty($item['read']) || !empty($item['check']) ) {?>
					<li style="line-height:28px;">
						<?php $crl = $key; $view = 'manage_book'; if ( $key == 'tour_seft' ) { $crl='tour'; $view = 'manage_book_seft';}?>
						<a href="<?php echo site_url('admin/'.$crl.'/'.$view);?>"><b><?php echo $item['title']?></b></a> có: 
						<?php if ( !empty($item['read'])  ){?><?php echo $item['read']?> chưa đọc; <?php }?>
						<?php if ( !empty($item['check']) ){?><?php echo $item['check']?> chưa check<?php }?>
					</li>
					<?php }?>
					<?php endforeach;?>
				</ul>			  	    				   				    				                                                                                                                                                                            
                </div>
            </div>
            <div class="panel_bottom"><div></div></div>
        </div><!--/wrapper-->
        <!-- ########################## END WRAPPER ###################### -->
        <div class="clear"></div>        
    </div><!--/containner-->
</body>
</html>