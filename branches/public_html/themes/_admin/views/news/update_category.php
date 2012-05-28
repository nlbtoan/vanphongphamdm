<?php echo doctype(); ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo lang('tieu_de') ?></title>
<?php $this->load->view('head') ?>

<!-- LOAD JS -->
<script type="text/javascript" src="<?php echo site_url('assets/jquery-ui-1.8.2.custom.min.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/jquery.easy-confirm-dialog.js')?>"></script>

<!-- LOAD CSS -->
<?php load_css('assets/message/screen.css') ?>

<script type="text/javascript">
$(document).ready(function(){
	$('#message, .notice').show().delay(10000).fadeOut('slow');

	$('#select_language').change_language();
	
	$(".check_alias").click(function() {
		if( $(".check_alias").parent().children("input").val() == "" )
		{
			alert('Bạn chưa nhập tên mã');
		}
		else
		{
			var url = site_url("admin/news/ajax_check_exits_alias");
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
        <?php echo form_open("admin/news/edit_category/" . $info['id']);?>
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
				    	<button class="negative" type="button" onclick="window.location = '<?php echo site_url('admin/news/category');?>'"><img src="<?php echo theme_url('styles/default/images/icons/back.png')?>"/><br/><?php echo lang('layout_toolbar_cancel') ?></button>
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
			            		<th>Tên danh mục : </th>
			            		<td>
			            			<input type="text" size="26" maxlength="20" name="<?php echo $item_lang['abbr']?>_name" value="<?php echo $info[$item_lang['abbr'].'_name']?>">
			            		</td>
			            	</tr>
			            	<tr>
			            		<th>Tên mã : </th>
			            		<td>
			            			<input type="text" size="26" maxlength="20" name="<?php echo $item_lang['abbr']?>_alias" value="<?php echo $info[$item_lang['abbr'].'_alias']?>">
			            			<button type="button" class="check_alias" style="margin:0 0 0 5px; float:right; padding:2px 10px 3px 7px">Kiểm tra</button>
			            			<br/>
			            			<label class="notice"></label>
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
			            		<th>Mở theo : </th>
			            		<td>
			            			<select size="3" name="browser_nav">
			            				<?php if($info['browser_nav'] == "_self"): ?>
			            				<option value="_self" selected="selected">Mở Link trên trang hiện tại</option>
			            				<option value="_blank">Mở Link ra một cửa sổ mới</option>
			            				<?php else:?>
			            				<option value="_self">Mở Link trên trang hiện tại</option>
			            				<option value="_blank" selected="selected">Mở Link ra một cửa sổ mới</option>
			            				<?php endif;?>
			            			</select>
			            		</td>
			            	</tr>
			            	<tr>
		            			<th>Menu Cha : </th>
			            		<td>
			            			<select size="10" style="min-width:107px" name="parent">
			            				<?php echo category_combobox($current_lang, $info['parent'], $info['id']);?>
			            			</select>
			            		</td>
			            	</tr>
			            	<tr>
			            		<th>Thứ tự : </th>
			            		<td>
			            			<input type="text" size="6" maxlength="20" name="ordering" style="text-align: center" value="<?php echo $info['ordering']?>">
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
        </div><!--/wrapper-->
        <?php echo form_close();?>
        <!-- ########################## END WRAPPER ###################### -->
        <div class="clear"></div>        
    </div><!--/containner-->
</body>
</html>