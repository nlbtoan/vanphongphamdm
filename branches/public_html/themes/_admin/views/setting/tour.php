<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo lang('tieu_de') ?></title>
<?php $this->load->view('head') ?>

<?php load_css('assets/message/screen.css') ?>

<!-- LOAD JS -->
<script type="text/javascript" src="<?php echo site_url('assets/tinymce.jquery/jquery.tinymce.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/tinymce.jquery/tiny_mce.js')?>"></script>

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

	$('#select_language').change_language();

	$('.promotion').tinymce({
		// General options
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,fontselect,fontsizeselect,|,forecolor,backcolor",
		theme_advanced_buttons2 : "bullist,numlist,|,outdent,indent,|,undo,redo,|,insertdate,inserttime,|,sub,sup,|,charmap,emotions",
		theme_advanced_buttons3 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left"
	});

	$('.rules').tinymce({
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
					<form action="<?php echo site_url("admin/setting/update/$controller")?>" method="post" id="adminForm">
					<?php foreach( $languages as $item_lang ):?>
					<?php if( !empty($data[$item_lang['abbr']]) ):?>
					<fieldset class="element_<?php echo $item_lang['abbr']?>">
						<legend>Thông tin riêng [ <?php echo lang($item_lang['abbr'])?> ]</legend>
						<table class="editing">
							<?php foreach( $data[$item_lang['abbr']] as $key => $item ):?>
							<tr>
			            		<th style="width:180px;"><?php echo $item['title']?>: </th>
			            		<td>
			            			<textarea style="width:547px; height:200px"  name="<?php echo $item_lang['abbr'] . '_' . $item['name']?>" class="<?php echo $item['name']?>"><?php echo $item['value']?></textarea>
			            		</td>
			            	</tr>
			            	<?php endforeach;?>
		            	</table>
					</fieldset>
					<?php unset($data[$item_lang['abbr']])?>
					<?php endif;?>
					<?php endforeach;?>
					
					<?php if( !empty($data) ):?>
					<fieldset>
						<legend>Thông tin chung</legend>
						<table class="editing" >
						<?php foreach( $data as $key => $item ):?>
						<tr>
		            		<th style="width:180px;"><?php echo $item['title']?> :</th>
		            		<td>
		            			<input type="text" size="50" value="<?php echo $item['value']?>" name="<?php echo $key?>" >
		            		</td>
		            	</tr>
		            	<?php endforeach;?>
					</table>
					</fieldset>
					<?php endif;?>
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
