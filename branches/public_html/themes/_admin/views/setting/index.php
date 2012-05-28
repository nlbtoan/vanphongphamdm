<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo lang('tieu_de') ?></title>
<?php $this->load->view('head') ?>

<?php load_css('assets/message/screen.css') ?>
<script type="text/javascript">
var toolbar = {
	_update : function()
	{
		$('#adminForm').submit();
	}
}

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

function UpoadFlash( obj ){
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
        <div id="wrapper" class="panel">        	
            <div class="panel_top"><div></div></div>            
            <div class="panel_left">
                <div class="panel_right">
                	<!-- ########################## ICON & BREADCRUMB ########################## --> 
				    <p class="float_l"><img src="<?php echo theme_url('styles/default/images/icons/user.gif') ?>" /></p>					
				    <p>
				        <span class="large">Cấu hình website</span><br />
				        <span class="quiet">Cấu hình website</span>
				    </p>
				    <div class="clear"></div>
				    
				    <!-- ########################## MESSAGE ########################## -->
				    <div id="message">
				    	<?php if( !empty($message) ) foreach($message as $item) echo $item;?>
				    </div>
				    <div class="clear"></div>
				    
				    <!-- ########################## TOOLBAR ########################## -->
				    <div class="toolbar">
				    	<button class="positive" type="button" onclick="toolbar._update('<?php echo site_url('admin/setting/update');?>')"><img src="<?php echo theme_url('styles/default/images/icons/insert_row.png')?>"/><br/><?php echo lang('layout_toolbar_update') ?></button>
				    </div>
					<!-- ########################## CONTENT ########################## -->
					<form action="<?php echo site_url("admin/setting/update")?>" method="post" id="adminForm">
					<table class="editing" style="margin-top: 20px" >
						<?php foreach( $data as $item ):?>
						<tr>
		            		<th style="width:180px;"><?php echo $item['title']?> :</th>
		            		<td>
		            			<input type="text" size="50" value="<?php echo $item['value']?>" name="<?php if($item['name'] != 'master_view') echo $item['name']?>" <?php if($item['name'] == 'master_view') echo 'readonly="readonly"' ?> >
		            			<?php if($item['name'] == 'logo' || $item['name'] == 'banner' || $item['name'] == 'background'):?>
		            			 <a href="javascript:void(0);" onclick="UpoadImage( this, 'none' );"><img src="<?php echo theme_url('styles/default/images/icons/image.gif');?>"/></a>
		            			<?php endif;?>
		            		</td>
		            	</tr>
		            	<?php endforeach;?>
		            	<?php if( !empty($languages) ):?>
		            	<tr>
		            		<th style="width:180px;">Ngôn ngữ :</th>
		            		<td>
		            			<select id="select_language" name="select_lang" style="width:120px" title="Ngôn ngữ mặc định cho site">
						        	<?php foreach ($languages as $item): ?>
						        	<option value="<?php echo $item['abbr']?>" <?php echo ($item['active'] == 1) ? 'selected="selected"' : ''?>><?php echo $item['name']?></option>
						        	<?php endforeach?>
						        </select>
		            		</td>
		            	</tr>
		            	<?php endif;?>
					</table>
					</form>
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
