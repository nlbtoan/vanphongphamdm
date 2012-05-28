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

	$('.select_group_menu').change(function(){
		var url = site_url("admin/menu/ajax_combobox_group_menu");
		var id = $(this).val();
		//var lang = $('#select_language > option:selected').val();
		
		$.post(url, {id : id}, function(data){
			$('.select_parent_menu').html(data);
		}, "json");
	});
	
	$(".check_alias").click(function() {
		if( $(".check_alias").parent().children("input").val() == "" )
		{
			alert('Bạn chưa nhập tên mã');
		}
		else
		{
			var url = site_url("admin/menu/ajax_check_exits_alias");
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
        <?php echo form_open("admin/menu/create_menu_item");?>
        <div id="wrapper" class="panel">
            <div class="panel_top"><div></div></div>            
            <div class="panel_left">
                <div class="panel_right">
                	<!-- ########################## ICON & BREADCRUMB ########################## --> 
				    <p class="float_l"><img src="<?php echo theme_url('styles/default/images/icons/user.gif') ?>" /></p>					
				    <p class="float_l">
				        <span class="large">Thêm menu con</span><br />
				        <span class="quiet">Quản lý menu</span>
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
			            		<th>Tên menu : </th>
			            		<td>
			            			<input type="text" size="26" maxlength="20" name="<?php echo $item_lang['abbr']?>_namemenu">
			            		</td>
			            	</tr>
			            	<tr>
			            		<th>Tên mã : </th>
			            		<td>
			            			<input type="text" size="26" maxlength="20" name="<?php echo $item_lang['abbr']?>_alias">
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
			            		<th>Link : </th>
			            		<td>
			            			<?php if($link == 'link'):?>
			            				<input type="text" value=""/>
			            			<?php else:?>
			            				<input type="text" name="link" value="<?php echo $link?>" readonly="readonly"/>
			            			<?php endif;?>
			            		</td>
			            	</tr>
			            	<tr>
			            		<th>Mở theo : </th>
			            		<td>
			            			<select size="3" name="browser_nav">
			            				<option value="_self" selected="selected">Mở Link trên trang hiện tại</option>
			            				<option value="_blank">Mở Link ra một cửa sổ mới</option>
			            			</select>
			            		</td>
			            	</tr>
			            	<tr>
		            			<th>Menu Cha : </th>
			            		<td>
			            			<select style="width:107px" class="select_group_menu" name="group_id">
			            				<?php foreach( $group_menus as $item ):?>
			            				<option <?php echo ($group_id == $item['id']) ? 'selected="selected"' : ""; ?> value="<?php echo $item['id']?>"><?php echo $item['name']?></option>
			            				<?php endforeach;?>
			            			</select> <-- Chọn group menu <br/>
			            			<select size="10" style="margin-top:5px; min-width:107px" name="parent" class="select_parent_menu">
			            				<?php echo menu_combobox($group_id, $current_lang)?>
			            			</select>
			            		</td>
			            	</tr>
			            	<tr>
			            		<th>Thứ tự : </th>
			            		<td>
			            			Thứ tự mặc định là ví trí cuối cùng. Thứ tự có thể thay đổi sau khi được Thêm thành công.
			            		</td>
			            	</tr>
			            	<tr>
			            		<th>Mở  : </th>
			            		<td>
			            			<?php echo form_radio(array('name' => 'active', 'value' => '1')); ?> Mở
			            			<?php echo form_radio(array('checked' => 'checked', 'name' => 'active', 'value' => '0')); ?> Đóng
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