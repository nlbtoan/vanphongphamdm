<?php echo doctype(); ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo lang('tieu_de') ?></title>
<?php $this->load->view('head') ?>

<!-- LOAD JS -->
<script type="text/javascript" src="<?php echo site_url('assets/jquery-ui-1.8.2.custom.min.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/jquery.easy-confirm-dialog.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/tinymce.jquery/jquery.tinymce.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/tinymce.jquery/tiny_mce.js')?>"></script>
<!-- LOAD CSS -->
<?php load_css('assets/message/screen.css') ?>
<style>
.l_image{ margin-bottom:10px; }
</style>
<script type="text/javascript">
$(document).ready(function(){
	
	$('#message, .notice').show().delay(10000).fadeOut('slow');

	$('#select_language').change_language();

	$('textarea[name*="summary"]').tinymce({
		// General options
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect,|,forecolor,backcolor",
		theme_advanced_buttons2 : "bullist,numlist,|,outdent,indent,|,undo,redo,|,insertdate,inserttime,|,sub,sup,|,charmap,emotions,|,link,unlink,image,media",
		theme_advanced_buttons3 : "fullscreen,code,preview",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left"
	});

	$('textarea[name*="content"]').tinymce({
		// General options
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect,|,forecolor,backcolor",
		theme_advanced_buttons2 : "bullist,numlist,|,outdent,indent,|,undo,redo,|,insertdate,inserttime,|,sub,sup,|,charmap,emotions,|,link,unlink,image,media",
		theme_advanced_buttons3 : "tablecontrols,|,styleprops,removeformat,|,fullscreen,code,preview",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		height:"319px",
		//file_browser_callback : "",

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});

	$('#line_drag').height($('#wrapper').height());
	$('#line_drag').draggable({
		axis: 'x',
		posStart : 0,
		posStop : 0,
		opacity : 0.50,
		start: function(event, ui)
		{
			$('#line_drag').css('background-color', '#CBCBCB');
			posStart = ui.position.left;
		},
		drag: function(event, ui)
		{
			var left = parseInt($(this).css('left').replace('px',''));
		},
		stop: function(event, ui)
		{
			$('#line_drag').css('background-color', '');
			posStop = ui.position.left;
			var posLength = posStart - posStop;
			
			//if(posLength > 0)
			//{
				var left_width = $('#left').width();
				var wrapper_width = $('#wrapper').width();
	
				left_width -= posLength;
				wrapper_width += posLength;
	
				$('#left').width(left_width);
				$('#wrapper').width(wrapper_width);
				$(this).css('left', 0);
			//}
		}
	});

	$('#btn_image_add').click(function(e){
		e.preventDefault();
		var html = '<div class="l_image">';
		html += '<input name="list_images[]" value="" type="text" size="50"/>';
		html += '&nbsp;<a href="javascript:void(0);" onclick="UpoadImage( this, '+"'none'"+' );"><img src="<?php echo theme_url('styles/default/images/icons/image.gif');?>" title="<?php echo lang('action_upload_image');?>"/></a>';
		html += '&nbsp;<a class="image_remove" href="">[ Remove ]</a>';
		html += '</div>';
		$(this).parent().parent().append(html);
		$('a.image_remove:last').click(i_remove);
	});

	$('a.image_remove').click(i_remove);

	var i_remove = function(e){
		e.preventDefault();
		$(this).parent().remove();
	}

});

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

var site_url = "<?php echo site_url();?>";
var UploadField = false;

function UpoadFile( obj ){
	UploadField = $( obj ).prev( 'input' );
	OpenFileBrowser( site_url + 'assets/fckeditor/editor/filemanager/browser/default/browser.html?Type=File&Connector=' + site_url + '%2Fassets%2Ffckeditor%2Feditor%2Ffilemanager%2Fconnectors%2Fphp%2Fconnector.php', 700, 500);	
}

function UpoadImage( obj ){
	UploadField = $( obj ).prev( 'input' );
	OpenFileBrowser( site_url + 'assets/fckeditor/editor/filemanager/browser/default/browser.html?Type=Image&Connector=' + site_url + '%2Fassets%2Ffckeditor%2Feditor%2Ffilemanager%2Fconnectors%2Fphp%2Fconnector.php', 700, 500);	
}

function UpoadFlash( obj ){
	UploadField = $( obj ).prev().prev( 'input' );	
	OpenFileBrowser( site_url + 'assets/fckeditor/editor/filemanager/browser/default/browser.html?Type=Flash&Connector=' + site_url + '%2assets%2fckeditor%2editor%2filemanager%2Fconnectors%2Fphp%2Fconnector.php', 700, 500);	
}

var root = 'travel/';
function SetUrl( url ){		
	$( UploadField ).attr( 'value', decodeURI(url).replace(root, '') );	
}

(function($) {
	
	$.fn.change_language = function(options)
	{
		var cbb_id = $(this).attr('id');

		//gan bien
		_func = options;
		
		var options = $.extend(
		{
			element : 'element',
			current_option : '',
			value_options : [],
			
			initialize : function()
			{
				options._current_option();
				options._value_options();
				
				$.each( options.value_options, function(i,n){
					if(options.current_option == n) options._show_element(n);
					else options._hide_element(n);
				});
			},

			_set_current : function( value ){
				options.current_option = value;
			},

			_current_option : function(){
				$('#' + cbb_id).children().each(function(){
					if( $(this).attr('selected') == true )
					{
						options.current_option = $(this).val();
					}
				});
			},
			
			_value_options : function()
			{
				var values = [];
				$('#' + cbb_id).children().each(function(){
					values.push( $(this).val() );
				});
				options.value_options = values;
			},
			
			_hide_element : function( value_option )
			{
				$('.' + options.element + '_' + value_option).hide();
			},

			_show_element : function( value_option )
			{
				$('.' + options.element + '_' + value_option).show();
			}
		}, options || {});

		options.initialize();

		if(typeof(_func) == "function"){
			_func.prototype = $.extend(this, _func);
			_func.prototype.func = _func;
		}
		
		$(this).change(function(){
			//Neu _func la function thi goi ham _func()
			if(typeof(_func) == "function"){
				_func.prototype.func();
			}
			
			options._hide_element(options.current_option);
			options._show_element($(this).val());
			options._set_current($(this).val());
		});
	}
})(jQuery);

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
        <div id="left" class="panel" style="padding-right:0;">        	            
			<?php $this->load->view('leftsiderbar') ?>                                                    
        </div>     
        <div id="line_drag" style="cursor:col-resize; margin-top:5px; float:left; width:10px; height:200px; background: url('<?php echo theme_url('styles/default/images/icons/dot_resize.png')?>') no-repeat scroll 3px 50%;"></div>
        <!-- ########################## END LEFT ###################### -->
        
        <!-- ########################## WRAPPER ########################## -->
        <?php echo form_open_multipart("admin/tour/create");?>
        <div id="wrapper" class="panel">
            <div class="panel_top"><div></div></div>            
            <div class="panel_left">
                <div class="panel_right">
                	<!-- ########################## ICON & BREADCRUMB ########################## --> 
				    <p class="float_l"><img src="<?php echo theme_url('styles/default/images/icons/user.gif') ?>"  title="<?php echo lang('create');?>"/></p>					
				    <p class="float_l">
				        <span class="large"><?php echo lang('create');?></span><br />
				        <span class="quiet"><?php echo lang('manage');?></span>
				    </p>
				    <div class="clear"></div>
				    
				    <!-- ########################## TOOLBAR ########################## -->
				    <div class="toolbar">
				    	<button title="<?php echo lang('action_save');?>" class="negative" type="button" onclick="window.location = '<?php echo $back_url?>'"><img src="<?php echo theme_url('styles/default/images/icons/back.png')?>"/><br/><?php echo lang('layout_toolbar_cancel') ?></button>
				    	<button title="<?php echo lang('action_back');?>" class="positive" type="submit"><img src="<?php echo theme_url('styles/default/images/icons/insert_row.png')?>"/><br/><?php echo lang('layout_toolbar_save') ?></button>
				    </div>
				    
				    <!-- ########################## MESSAGE ########################## -->
				    <div id="message">
				    	<?php if( !empty($message) ) echo $message;?>
				    </div>
				    <div class="clear"></div>
				    
				    <!-- ########################## LIST LANGUAGE ########################## -->
				    <?php if( !empty($languages) && count($languages) > 1): ?>
				    <div class="select float_r" style="margin-top: 20px" >	
						<b><?php echo lang('title_cbb_language') ?> :</b>
				        <select id="select_language" name="select_lang" style="width:120px" title="<?php echo lang('action_choice_language');?>">
				        	<?php foreach ($languages as $item): ?>
				        	<option value="<?php echo $item['abbr']?>" <?php echo ($current_lang == $item['abbr']) ? 'selected="selected"' : ''?>><?php echo $item['name']?></option>
				        	<?php endforeach?>
				        </select>
				    </div>
				    <div class="clear"></div>
				    <?php endif;?>
				
				<!-- ########################## CONTENT ########################## -->
					<?php foreach( $languages as $item_lang ):?>
					<fieldset class="element_<?php echo $item_lang['abbr']?>">
						<legend><?php echo lang('private_information');?> [ <?php echo lang($item_lang['abbr'])?> ]</legend>
						<table class="editing">
							<tr>
			            		<th><?php echo lang('title');?>: </th>
			            		<td>
			            			<input type="text" size="50" name="<?php echo $item_lang['abbr']?>_title" value="<?php if ( !empty($restore_data) ) echo $restore_data[$item_lang['abbr'].'_title']; ?>" />
			            			<?php echo form_error($item_lang['abbr'].'_'.'title')?>
			            		</td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('time_tour');?>: </th>
			            		<td>
			            			<input type="text" size="50" name="<?php echo $item_lang['abbr']?>_time_tour" value="<?php if ( !empty($restore_data) ) echo $restore_data[$item_lang['abbr'].'_time_tour']; ?>" />
			            			<?php echo form_error($item_lang['abbr'].'_'.'time_tour')?>
			            		</td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('destination');?>: </th>
			            		<td>
			            			<input type="text" size="50" name="<?php echo $item_lang['abbr']?>_destination" value="<?php if ( !empty($restore_data) ) echo $restore_data[$item_lang['abbr'].'_destination']; ?>" />
			            			<?php echo form_error($item_lang['abbr'].'_'.'destination')?>
			            		</td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('vehicle');?>: </th>
			            		<td>
			            			<input type="text" size="50" name="<?php echo $item_lang['abbr']?>_vehicle" value="<?php if ( !empty($restore_data) ) echo $restore_data[$item_lang['abbr'].'_vehicle']; ?>" />
			            			<?php echo form_error($item_lang['abbr'].'_'.'vehicle')?>
			            		</td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('price');?>: </th>
			            		<td>
			            			<input type="text" size="50" name="<?php echo $item_lang['abbr']?>_price" value="<?php if ( !empty($restore_data) ) echo $restore_data[$item_lang['abbr'].'_price']; ?>" />
			            			<select name="<?php echo $item_lang['abbr']?>_curency">
			            				<option value="VND" <?php if ( $item_lang['abbr'] == 'vi' ){ echo ' selected="selected"'; } ?>>VND</option>
			            				<option value="USD" <?php if ( $item_lang['abbr'] == 'en' ){ echo ' selected="selected"'; } ?>>USD</option>
			            			</select>
			            			&nbsp;
			            			<?php if ( $item_lang['abbr'] == 'vi' ){ echo ' / 1 người'; } if ($item_lang['abbr'] == 'en') echo ' / 1 person';?>
			            			<?php echo form_error($item_lang['abbr'].'_'.'price')?>
			            		</td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('summary');?>: </th>
			            		<td>
			            			<textarea name="<?php echo $item_lang['abbr']?>_summary"><?php if ( !empty($restore_data) ) echo $restore_data[$item_lang['abbr'].'_summary']; ?></textarea>
			            			<?php echo form_error($item_lang['abbr'].'_'.'summary')?>
			            		</td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('content');?>: </th>
			            		<td>
			            			<textarea name="<?php echo $item_lang['abbr']?>_content"><?php if ( !empty($restore_data) ) echo $restore_data[$item_lang['abbr'].'_content']; ?></textarea>
			            			<?php echo form_error($item_lang['abbr'].'_'.'content')?>
			            		</td>
			            	</tr>
		            	</table>
					</fieldset>
					<?php endforeach;?>
					
					<fieldset>
						<legend><?php echo lang('general_information');?></legend>
						<table class="editing">
							<tr>
		            			<th>Danh mục tour : </th>
			            		<td>
			            			<select name="tour_cat_id" size="10" style="margin-top:5px; min-width:107px" class="select_parent_menu">
			            				<?php echo tour_combobox($current_lang, $cat_id)?>
			            			</select>
			            		</td>
			            	</tr>
							<tr>
			            		<th><?php echo lang('date');?> : </th>
			            		<td>
			            			<?php  echo date('d/m/Y',time()-3600) ?>
			            		</td>
			            	</tr>
							<tr>
			            		<th><?php echo lang('image');?>  : </th>
			            		<td> 
			            			<input type="text" size="50" value="<?php if ( !empty($restore_data) ) echo $restore_data['image'];?>" name="image" /> 
        							<a href="javascript:void(0);" onclick="UpoadImage( this, 'none' );"><img src="<?php echo theme_url('styles/default/images/icons/image.gif');?>" title="<?php echo lang('action_upload_image');?>"/></a>
			            			<div class="image_add">
			            				<button name="image_add" id="btn_image_add">Thêm ảnh</button>
			            			</div>
			            			<?php if ( !empty($restore_data['list_images']) ){ 
			            				foreach($restore_data['list_images'] as $item):
			            			?>
		            				<div class="l_image">
										<input name="list_images[]" value="<?php echo $item?>" type="text" size="50"/>
										<a href="javascript:void(0);" onclick="UpoadImage( this, 'none' );"><img src="<?php echo theme_url('styles/default/images/icons/image.gif');?>" title="<?php echo lang('action_upload_image');?>"/></a>
										<a class="image_remove" href="">[ Remove ]</a>
									</div>
			            			<?php endforeach; }?>
			            		</td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('file');?>  : </th>
			            		<td> 
			            			<input type="text" size="50" value="<?php if ( !empty($restore_data) ) echo $restore_data['file'];?>" name="file" /> 
        							<a href="javascript:void(0);" onclick="UpoadFile( this, 'none' );"><img src="<?php echo theme_url('styles/default/images/icons/file.gif');?>" title="<?php echo lang('action_upload_image');?>"/></a>
        						</td>
        					</tr>
        					<tr>
			            		<th><?php echo lang('file_price');?>  : </th>
			            		<td> 
			            			<input type="text" size="50" value="<?php if ( !empty($restore_data) ) echo $restore_data['file_price'];?>" name="file_price" /> 
        							<a href="javascript:void(0);" onclick="UpoadFile( this, 'none' );"><img src="<?php echo theme_url('styles/default/images/icons/file.gif');?>" title="<?php echo lang('action_upload_image');?>"/></a>
        						</td>
        					</tr>
							<tr>
			            		<th><?php echo lang('is_hot');?>  : </th>
			            		<td>
			            			<?php if ( !empty($restore_data) && $restore_data['is_hot'] == "1") { ?>
			            			<?php echo form_radio(array('checked' => 'checked', 'name' => 'is_hot', 'value' => '1')); ?> Mở
			            			<?php echo form_radio(array('name' => 'is_hot', 'value' => '0')); ?> Đóng
			            			<?php } else { ?>
			            			<?php echo form_radio(array('name' => 'is_hot', 'value' => '1')); ?> Mở
			            			<?php echo form_radio(array('checked' => 'checked', 'name' => 'is_hot', 'value' => '0')); ?> Đóng
			            			<?php } ?>
			            		</td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('is_enabled');?>  : </th>
			            		<td>
			            			<?php if ( !empty($restore_data) && $restore_data['is_enabled'] == "1") { ?>
			            			<?php echo form_radio(array('checked' => 'checked', 'name' => 'is_enabled', 'value' => '1')); ?> Mở
			            			<?php echo form_radio(array('name' => 'is_enabled', 'value' => '0')); ?> Đóng
			            			<?php } else { ?>
			            			<?php echo form_radio(array('name' => 'is_enabled', 'value' => '1')); ?> Mở
			            			<?php echo form_radio(array('checked' => 'checked', 'name' => 'is_enabled', 'value' => '0')); ?> Đóng
			            			<?php } ?>
			            		</td>
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