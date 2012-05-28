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

<script type="text/javascript">
var SiteUrl = "<?php echo site_url();?>";
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

function UpoadImage( obj )
{
	UploadField = $( obj ).prev( 'input' );
	OpenFileBrowser( SiteUrl + 'assets/fckeditor/editor/filemanager/browser/default/browser.html?Type=Image&Connector=' + SiteUrl + '%2Fassets%2Ffckeditor%2Feditor%2Ffilemanager%2Fconnectors%2Fphp%2Fconnector.php', 700, 500); 
}

var root = 'travel/';
function SetUrl( url ){		
	$( UploadField ).attr( 'value', decodeURI(url).replace(root, '') );	
}

$(document).ready(function(){
	$('#message, .notice').show().delay(10000).fadeOut('slow');

	$('#select_language').change_language();

	$('textarea[name*="summary"]').tinymce({
		// General options
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,fontselect,fontsizeselect,|,forecolor,backcolor",
		theme_advanced_buttons2 : "",
		theme_advanced_buttons3 : "",
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
	
	$(".check_alias").click(function() {
		if( $(".check_alias").parent().children("input").val() == "" )
		{
			alert('Bạn chưa nhập tên mã');
		}
		else
		{
			var url = site_url("admin/news/ajax_check_exits_alias_news");
			var alias = $(this).parent().children('input:text').val();
			var lang = $('#select_language > option:selected').val();

			$.post(url, {alias : alias, lang : lang}, function(data){
				$('.notice').show().delay(10000).fadeOut('slow');
				$('.notice').html(data);
			}, "json");
		}
	});
	
});

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
<?php 
$alias = array(
	'name' => 'alias',
	'type' => 'text',
	'size' => 26,
	'maxlength' => 25,
	'value'   => '',
);

$ordering = array(
	'name' => 'ordering',
	'id' => 'ordering',
	'type' => 'text',
	'size' => 13,
	'maxlength' => 10,
	'value'   => '',
);
?> 

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
        <?php echo form_open("admin/news/edit_news/".$info['id']);?>
        <div id="wrapper" class="panel">
            <div class="panel_top"><div></div></div>            
            <div class="panel_left">
                <div class="panel_right">
                	<!-- ########################## ICON & BREADCRUMB ########################## --> 
				    <p class="float_l"><img src="<?php echo theme_url('styles/default/images/icons/user.gif') ?>" /></p>					
				    <p class="float_l">
				        <span class="large">Thêm danh mục</span><br />
				        <span class="quiet">Quản lý danh mục</span>
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
				    
				    <!-- ########################## LIST LANGUAGE ########################## -->
				    <?php if( !empty($languages) && count($languages) > 1): ?>
				    <div class="select float_r" style="margin-top: 20px" >	
						<b><?php echo lang('title_cbb_language') ?> :</b>
				        <select id="select_language" name="select_lang" style="width:120px">
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
						<legend>Thông tin riêng [ <?php echo lang($item_lang['abbr'])?> ]</legend>
						<table class="editing">
							<tr>
			            		<th>Tiêu đề : </th>
			            		<td>
			            			<input type="text" size="50" name="<?php echo $item_lang['abbr']?>_title" value="<?php echo $info[$item_lang['abbr'].'_title']?>">
			            		</td>
			            	</tr>
			            	<tr>
			            		<th>Tên mã : </th>
			            		<td>
			            			<input style="float:left;" type="text" size="37" name="<?php echo $item_lang['abbr']?>_alias" value="<?php echo $info[$item_lang['abbr'].'_alias']?>">
			            			<button type="button" class="check_alias" style="margin:0 0 0 5px; float:left; padding:2px 10px 3px 7px">Kiểm tra</button>
			            			<br/>
			            			<div class="clear"></div>
			            			<label class="notice"></label>
			            		</td>
			            	</tr>
			            	<tr>
			            		<th >nội dung vắn tắt: </th>
			            		<td>
			            			<textarea style="width:547px;" name="<?php echo $item_lang['abbr']?>_summary"><?php echo $info[$item_lang['abbr'].'_summary']?></textarea>
			            		</td>
			            	</tr>
			            	<tr>
			            		<th>Nội dung : </th>
			            		<td>
			            			<textarea style="width:547px; height:350px;" name="<?php echo $item_lang['abbr']?>_content"><?php echo $info[$item_lang['abbr'].'_content']?></textarea>
			            		</td>
			            	</tr>
		            	</table>
					</fieldset>
					<?php endforeach;?>
					
					<fieldset>
						<legend>Thông tin chung</legend>
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
		            			<th>Danh mục : </th>
			            		<td>
			            			<select size="10" style="min-width:107px" name="cat_id">
			            				<?php echo category_combobox($current_lang, $info['cat_id'], FALSE, 0, "", FALSE); ?>
			            			</select>
			            		</td>
			            	</tr>
			            	<tr>
		            			<th>Hình ảnh : </th>
			            		<td>
			            			<input type="text" size="50" value="<?php echo $info['image']?>" name="image" >
			            			<a href="javascript:void(0);" onclick="UpoadImage( this, 'none' );"><img src="<?php echo theme_url('styles/default/images/icons/image.gif');?>"/></a>
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