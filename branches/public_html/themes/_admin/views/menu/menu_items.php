<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo lang('tieu_de') ?></title>
<?php $this->load->view('head') ?>

<!-- LOAD JS -->
<script type="text/javascript" src="<?php echo site_url('assets/jquery-ui-1.8.2.custom.min.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/jquery.easy-confirm-dialog.js')?>"></script>

<script type="text/javascript">
var toolbar = {
	_insert : function(url)
	{
		if(url != null)	window.location = url;
	},
	
	_delete : function()
	{
		if( $('input:checked').length == 0 )
		{
			my_alert('Hãy chọn checkbox bên dưới để xóa');
		}
		else
		{
			var answer = confirm('Bạn chắc chắn muốn xóa menu');
			if(answer)
			{
				var url = site_url("admin/menu/delete_menu_item");
				var array_id = [];
				
				$('#tbody_manage > tr').each(function()
				{
					if( $(this).children().eq(0).children().attr('checked') )
					{
						var id = $(this).children().eq(0).children().val();
						array_id.push( id );
					}
				});
				
				$.post(url, {id : array_id, current_url : $('#current_url').val(), action : 'delete'} );
			}
		}
	},
	
	_publish : function()
	{
		if( $('input:checked').length == 0 )
		{
			my_alert('Hãy chọn checkbox bên dưới để mở');
		}
		else
		{
			var answer = confirm('Bạn chắc chắn muốn mở menu');
			if(answer)
			{
				var url = site_url("admin/menu/update_menu_item");
				var array_id = [];
				
				$('#tbody_manage > tr').each(function()
				{
					if( $(this).children().eq(0).children().attr('checked') )
					{
						var id = $(this).children().eq(0).children().val();
						array_id.push( id );
					}
				});
				
				$.post(url, {id : array_id, active : 1, current_url : $('#current_url').val(), action : 'publish'} );
			}
		}
	},
	
	_unpublish : function()
	{
		if( $('input:checked').length == 0 )
		{
			my_alert('Hãy chọn checkbox bên dưới để khóa');
		}
		else
		{
			var answer = confirm('Bạn chắc chắn muốn khóa menu');
			if(answer)
			{
				var url = site_url("admin/menu/update_menu_item");
				var array_id = [];
				
				$('#tbody_manage > tr').each(function()
				{
					if( $(this).children().eq(0).children().attr('checked') )
					{
						var id = $(this).children().eq(0).children().val();
						array_id.push( id );
					}
				});

				$.post(url, {id : array_id, active : 0, current_url : $('#current_url').val(), action : 'publish'} );
			}
		}
	},

	_homepage : function()
	{
		if( $('input:checked').length == 0 )
		{
			my_alert('Hãy chọn checkbox bên dưới để khóa');
		}
		else
		{
			var url = site_url("admin/menu/update_menu_item");
			var id = 0;

			$('#tbody_manage > tr').each(function()
			{
				if( $(this).children().eq(0).children().attr('checked') )
				{
					id = $(this).children().eq(0).children().val();
					return false;
				}
			});
			
			$.post(url, {id : id, homepage : 1, current_url : $('#current_url').val(), action : 'homepage'} );
		}
	}
};

$(document).ready(function(){
	/**
	* Hien thi message neu co'
	*/
	$('#message').show().delay(10000).fadeOut('slow');
	
	/**
	* Check all Check-Box 
	*/
	$('#checkall').click(function(){
		( $(this).attr('checked') == true ) ? checked = true : checked = false;
		
		$('#tbody_manage > tr').each(function(){
			//table > tr > first(td) > input(checkbox) > set checked = true or false
			$(this).children().eq(0).children().attr('checked', checked);
			(checked) ? $(this).addClass('checkrow') : $(this).removeClass('checkrow');
		});
	});

	/**
	* Click uncheck / check Check-Box 
	*/
	$('.checkbox').click(function(){
		( $(this).attr('checked') == true ) ? $(this).parent().parent().addClass('checkrow') : $(this).parent().parent().removeClass('checkrow');
	});

	/**
	* Click active menu item
	* 0 = un_active
	* 1 = active
	*/
	$('.active').click(function(e){
		e.preventDefault();

		var url = site_url("admin/menu/update_menu_item");
		var menu_id = $(this).attr('rel');

		if( $(this).hasClass('tick') )
		{
			$.post(url, {id : menu_id, active : 0, current_url : $('#current_url').val(), action : 'publish'} );
		}
		else if( $(this).hasClass('untick') )
		{
			$.post(url, {id : menu_id, active : 1, current_url : $('#current_url').val(), action : 'publish'} );
		}	
	});

	/**
	* Click save_order
	*/
	$('#saveorder').click(function(e){
		e.preventDefault();
		
		var array_order = [];
		var array_id= [];
		var url = site_url("admin/menu/update_menu_item");
		
		$('#tbody_manage > tr').each(function(){
			var order = $(this).children().eq(6).children().val();
			array_order.push(order);
			
			var id = $(this).children().eq(2).html();
			array_id.push(id);
		});

		$.post(url, {id:array_id, order:array_order, current_url:$('#current_url').val(), action:'order'} );
	});

	/**
	* Delete row group menu
	*/
	$('.delete').click(function(e){
		e.preventDefault();
		
		var answer = confirm('Bạn chắc chắn muốn xóa menu');
		if(answer)
		{
			var url = site_url("admin/menu/delete_menu_item");
			var menu_id = $(this).attr('rel');

			$.post(url, {id : menu_id, current_url : $('#current_url').val(), action : 'delete'} );
		}
	});
	
	/**
	* Select group menu
	*/
	$('#select_group').change(function(){
		var value = $(this).val();
		var url = '<?php echo site_url();?>/admin/menu';
		if(value != 0) url = '<?php echo site_url();?>/admin/menu/menu_items/' + $(this).val();
		
		$(window.location).attr('href', url);
	});

	/**
	* Thay doi so luong row hien thi
	*/
	$('#select_per_page').change(function(){
		$('#adminForm').submit();
	});

	/**
	* Thay doi language
	*/
	$('#select_language').change(function(){
		$('#adminForm').submit();
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
        <div id="left" class="panel" style="padding-right:0px">        	            
			<?php $this->load->view('leftsiderbar') ?>                                                    
        </div>
        <div id="line_drag" style="cursor:col-resize; margin-top:5px; float:left; width:10px; height:200px; background: url('<?php echo theme_url('styles/default/images/icons/dot_resize.png')?>') no-repeat scroll 3px 50%;"></div>       
        <!-- ########################## END LEFT ###################### -->
        
        <!-- ########################## WRAPPER ########################## -->
        <div id="wrapper" class="panel">    
        	<form action="<?php echo site_url("admin/menu/menu_items/" . $current_menu);?>" method="post" id="adminForm">		    	
            <div class="panel_top"><div></div></div>            
            <div class="panel_left">
                <div class="panel_right">
                	<!-- ########################## ICON & BREADCRUMB ########################## --> 
				    <p class="float_l"><img src="<?php echo theme_url('styles/default/images/icons/user.gif') ?>" /></p>					
				    <p class="float_l">
				        <span class="large">Quản lý menu con</span><br />
				        <span class="quiet">Quản lý menu</span>
				    </p>
				    <div class="clear"></div>
				    
				    <!-- ########################## TOOLBAR ########################## -->
				    <div class="toolbar">
				    	<button class="positive" type="button" onclick="toolbar._insert('<?php echo site_url('admin/menu/choose');?>')"><img src="<?php echo theme_url('styles/default/images/icons/insert_row.png')?>"/><br/><?php echo lang('layout_toolbar_insert') ?></button>
				    	<button class="negative" type="button" onclick="toolbar._delete()"><img src="<?php echo theme_url('styles/default/images/icons/delete_row.png')?>"/><br/><?php echo lang('layout_toolbar_delete') ?></button>
				    	<button class="positive" type="button" onclick="toolbar._publish()"><img src="<?php echo theme_url('styles/default/images/icons/publish.png')?>"/><br/><?php echo lang('layout_toolbar_publish') ?></button>
				    	<button class="negative" type="button" onclick="toolbar._unpublish()"><img src="<?php echo theme_url('styles/default/images/icons/unpublish.png')?>"/><br/><?php echo lang('layout_toolbar_unpublish') ?></button>
				    	<button class="positive" type="button" onclick="toolbar._homepage()"><img src="<?php echo theme_url('styles/default/images/icons/icon-32-default.png')?>" style="width:32px; height:32px; padding:0 0 0 1px; margin:0px"/></button>
				    </div>
				    
				    <!-- ########################## LIST GROUP MENU ########################## -->
				    <div class="select float_l" style="margin-top: 20px" >	
						<b><?php echo lang('title_cbb_group_menu') ?> :</b>
				        <select id="select_group" name="select_group">
				        	<option value="0">Tất cả</option>
				        	<?php foreach ($cate_menus as $menu): ?>				            
				            <option value="<?php echo $menu['id']?>" <?php echo ($current_menu == $menu['id']) ? 'selected="selected"' : ''?>><?php echo $menu['name'] ?></option>
				            <?php endforeach; ?>
				        </select>			        
				    </div>
				    <?php if( !empty($languages) && count($languages) > 1): ?>
				    <!-- ########################## LIST LANGUAGE ########################## -->
				    <div class="select float_r" style="margin-top: 20px" >	
						<b><?php echo lang('title_cbb_language') ?> :</b>
				        <select id="select_language" name="select_lang" style="width:120px">
				        	<?php foreach ($languages as $item): ?>
				        	<option value="<?php echo $item['abbr']?>" <?php echo ($current_lang == $item['abbr']) ? 'selected="selected"' : ''?>><?php echo $item['name']?></option>
				        	<?php endforeach?>
				        </select>
				    </div>
				    <?php endif;?>
				    <div class="clear"></div>
				    
				<!-- ########################## CONTENT ########################## -->
				<table class="listing" id="listing">
			        <col width="20"/>
			        <col width="20"/>
			        <col width="30"/>
			        <col style="min-width: 100px"/>
			        <col width="70"/>
			        <col />
			        <col width="65"/>
			        <col width="25"/>
			        <colgroup>
			            <col width="25"/>
			            <col width="25"/>
			        </colgroup>
			        <thead> 
			        <tr>
			        	<th><input type="checkbox" id="checkall"/></th>
			            <th>#</th>
			            <th><?php echo lang('table_th_id') ?></th>
			            <th><?php echo lang('table_th_name_menu') ?></th>
			            <th><?php echo lang('table_th_default') ?></th>
			            <th>Link - Url</th>
			            <th><?php echo lang('table_th_order') ?> <a href="" id="saveorder"><img title="<?php echo lang('alt_save_order')?>" style="vertical-align: bottom;" src="<?php echo theme_url('styles/default/images/icons/filesave.png')?>"/></a></th>
			            <th><?php echo lang('table_th_open') ?></th>
			            <th colspan="2"><?php echo lang('table_th_manage') ?></th>
			        </tr>
			        </thead>
			        <tbody id="tbody_manage">
			        <?php if( empty($menu_items) ):?>
				        <tr>
				        	<td colspan="10" style="line-height:20px"><?php echo lang('none_item')?></td>
				        </tr>
			        <?php else:?>
			        <?php foreach( $menu_items as $k => $item ):?>
				        <tr>
				        	<td> <input type="checkbox" value="<?php echo $item['data']['id']?>" class="checkbox"/> </td>
				        	<td> <?php echo ( $k + 1 )?> </td>
				        	<td> <?php echo $item['data']['id']?> </td>
				        	<td style="text-align: left; padding-left:5px;"> 
				        		<a href="<?php echo site_url('admin/menu_items');?>">
				        			<?php 
				        				if($item['lv'] > 0){
					        				for($i = 0; $i < $item['lv']; $i++)
					        				{
					        					echo '.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
					        				}
					        				echo '<sup>|_</sup>';
				        				}
				        				echo $item['data']['title']
				        			?>
				        		</a>
				        	</td>
				        	<td> <?php if($item['data']['homepage'] == 1)echo'<span class="icon homepage"></span>'?></td>
				        	<td> <a href="<?php echo site_url($item['data']['alias']);?>" title="<?php echo site_url($item['data']['link']);?>" target="_black"><?php echo $item['data']['controller'];?> </a> </td>
				        	<td> <input type="text" size="5" value="<?php echo $item['data']['ordering']?>" style="text-align:center;"></input> </td>
				        	<td> <a href="" class="icon active <?php if($item['data']['active']) echo('tick'); else echo('untick');?>" rel="<?php echo $item['data']['id']?>"></a> </td>
				        	<td>
				                <a href="" class="icon delete" rel="<?php echo $item['data']['id']?>"></a>
				            </td>
				            <td>
				                <a href="<?php echo site_url('admin/menu/edit_menu_item/' . $item['data']['id'])?>" class="icon edit" rel="<?php echo $item['data']['id']?>"></a>
				            </td>
				        </tr>
			        <?php endforeach;?>
			        <?php endif;?>
			        </tbody>
				</table>
				<input type="hidden" value="<?php echo uri_string()?>" id="current_url"></input>
				<div class="paging" style="text-align: center; margin-bottom: 8px;">
				    <?php echo $this->pagination->create_links(); ?>
				</div>
				<div style="text-align:center; padding-bottom: 10px;">
					<?php echo $this->pagination->create_result();?>
                </div>
				<!-- ########################## END CONTENT ########################## -->  				  	    				   				    				                                                                                                                                                                            
                </div>
            </div>
            </form>
            <div class="panel_bottom"><div></div></div>
        </div><!--/wrapper-->
        <!-- ########################## END WRAPPER ###################### -->
        <div class="clear"></div>   
        
        <!-- ########################## FOOTER ########################## -->
		<div id="footer">
       	<?php $this->load->view('footer') ?>                
        </div>          
		<!-- ########################## END FOOTER ###################### -->     
    </div><!--/containner-->
</body>
</html>

