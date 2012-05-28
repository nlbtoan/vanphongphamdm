<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo lang('tieu_de') ?></title>
<?php $this->load->view('head') ?>

<?php load_css('assets/message/screen.css') ?>

<script type="text/javascript">
$(document).ready(function(){
	/**
	* Hien thi message neu co'
	*/
	$('#message').show().delay(10000).fadeOut('slow');
});

var site_url = "<?php echo site_url();?>";
var UploadField = false;

function OpenFileBrowser( url, width, height ) {
	var iLeft = ( screen.width  - width ) / 2 ;
	var iTop  = ( screen.height - height ) / 2 ;

	var sOptions = "toolbar=no,status=no,resizable=yes,dependent=yes,scrollbars=yes" ;
	sOptions += ",width=" + width ;
	sOptions += ",height=" + height ;
	sOptions += ",left=" + iLeft ;
	sOptions += ",top=" + iTop ;

	window.open( url, 'OpenFile', sOptions ) ;
}

function UpoadFile( obj )
{
	UploadField = $( obj ).prev( 'input' );
	OpenFileBrowser( site_url + 'assets/fckeditor/editor/filemanager/browser/default/browser.html?Type=File&Connector=' + site_url + '%2Fassets%2Ffckeditor%2Feditor%2Ffilemanager%2Fconnectors%2Fphp%2Fconnector.php', 700, 500); 
}

function UpoadImage( obj )
{
	UploadField = $( obj ).prev( 'input' );
	OpenFileBrowser( site_url + 'assets/fckeditor/editor/filemanager/browser/default/browser.html?Type=Image&Connector=' + site_url + '%2Fassets%2Ffckeditor%2Feditor%2Ffilemanager%2Fconnectors%2Fphp%2Fconnector.php', 700, 500); 
}

function UpoadFlash( obj )
{
	UploadField = $( obj ).prev().prev( 'input' );
	OpenFileBrowser( site_url + 'assets/fckeditor/editor/filemanager/browser/default/browser.html?Type=Flash&Connector=' + site_url + '%2assets%2fckeditor%2editor%2filemanager%2Fconnectors%2Fphp%2Fconnector.php', 700, 500); 
}

function SetUrl( url )
{
	$( UploadField ).attr( 'value', decodeURI(url) );
}
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
        <?php echo form_open("admin/advert/edit_advert/".$info['id']);?>
        <div id="wrapper" class="panel">        	
            <div class="panel_top"><div></div></div>            
            <div class="panel_left">
                <div class="panel_right">
                	<!-- ########################## ICON & BREADCRUMB ########################## --> 
				    <p class="float_l"><img src="<?php echo theme_url('styles/default/images/icons/user.gif') ?>" /></p>					
				    <p class="float_l">
				        <span class="large">Thêm danh mục quảng cáo</span><br />
				        <span class="quiet">Quản lý danh mục</span>
				    </p>
				    <div class="clear"></div>
				    
				    <!-- ########################## TOOLBAR ########################## -->
				    <div class="toolbar">
				    	<button class="negative" type="button" onclick="window.location = '<?php echo $back_url?>'"><img src="<?php echo theme_url('styles/default/images/icons/delete_row.png')?>"/><br/><?php echo lang('layout_toolbar_cancel') ?></button>
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
				            		<th><?php echo lang('name') ?>: </th>
				            		<td>
				            			<input type="text" size="30" name="adv_text" value="<?php echo $info['adv_text'];?>"></input>
				            		</td>
				            	</tr>
				            	<tr>
				            		<th>Link: </th>
				            		<td>
				            			<input type="text" size="30" name="link" value="<?php echo $info['link'];?>"></input>
				            		</td>
				            	</tr>
				            	<tr>
				            		<th><?php echo lang('image') ?>: </th>
				            		<td>
				            			<input type="text" size="50" name="image" value="<?php echo $info['image'];?>"></input>
				            			<a href="javascript:void(0);" onclick="UpoadImage( this, 'none' );"><img src="<?php echo theme_url('styles/default/images/icons/image.gif');?>"/></a>
				            		</td>
				            	</tr>
				            	<tr>
				            		<th><?php echo lang('cate') ?>: </th>
				            		<td>
				            			<select name="parent">
				            				<?php foreach($category as $item):?>
				            				<option value="<?php echo $item['id']?>" <?php if($item['id'] == $info['parent']) echo 'selected="selected"'?>><?php echo $item['name']?></option>
				            				<?php endforeach;?>
				            			</select>
				            		</td>
				            	</tr>
				            	<tr>
				            		<th>Mở  : </th>
				            		<td>
				            			<?php if ( !empty($info) && $info['active'] == "1") { ?>
				            			<?php echo form_radio(array('checked' => 'checked', 'name' => 'active', 'value' => '1')); ?> Mở
				            			<?php echo form_radio(array('name' => 'active', 'value' => '0')); ?> Đóng
				            			<?php } else { ?>
				            			<?php echo form_radio(array('name' => 'active', 'value' => '1')); ?> Mở
				            			<?php echo form_radio(array('checked' => 'checked', 'name' => 'active', 'value' => '0')); ?> Đóng
				            			<?php } ?>
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

