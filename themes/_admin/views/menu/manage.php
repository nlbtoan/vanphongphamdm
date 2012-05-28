<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo lang('title') ?></title>
<?php $this->load->view('head') ?>

<!-- LOAD JS -->
<script type="text/javascript" src="<?php echo site_url('assets/jquery-ui-1.8.2.custom.min.js')?>"></script>

<?php load_css('assets/message/screen.css') ?>

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
				var url = site_url("admin/menu/delete_menu");
				var array_id = [];
				var warning = "";
				$('#tbody_manage > tr').each(function()
				{
					if( $(this).children().eq(0).children().attr('checked') )
					{
						position = $(this).children().eq(7).html();
						
						//position la so menu_child chua ben trong
						//Kiem tra xem position phai la so va == 0
						if( !isNaN(position) && position == 0 )
						{
							var id = $(this).children().eq(0).children().val();
							array_id.push( id );
						}
						//canh bao co' group menu co child
						if( position > 0 && warning == "")
						{
							warning = 'enable';
						}
					}
				});
				
				//$.post(url, {id : array_id, warning : warning} );
			}
		}
	},
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
	* Select group menu
	*/
	$('#select_group').change(function(){
		var url = $(this).val();
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

	/**
	* Delete row group menu
	*/
	$('.delete').click(function(e){
		e.preventDefault();
		
		var answer = confirm('Bạn chắc chắn muốn xóa menu');
		if(answer)
		{
			var url = site_url("admin/menu/delete_menu");
			var menu_id = $(this).attr('rel');
			
			$.post(url, {id : menu_id} );
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
});	
</script>

</head>
<body>	
	<div id="echo"></div>
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
        	<form action="<?php echo site_url("admin/menu/manage");?>" method="post" id="adminForm">        	
            <div class="panel_top"><div></div></div>            
            <div class="panel_left">
                <div class="panel_right">
                	<!-- ########################## ICON & BREADCRUMB ########################## --> 
				    <p class="float_l"><img src="<?php echo theme_url('styles/default/images/icons/user.gif') ?>" /></p>					
				    <p class="float_l">
				        <span class="large"><?php echo lang('title') ?></span><br />
				        <span class="quiet"><?php echo lang('title') ?></span>
				    </p>
				    <div class="clear"></div>
				    
				    <!-- ########################## TOOLBAR ########################## -->
				    <div class="toolbar">
				    	<button class="positive" type="button" onclick="toolbar._insert('<?php echo site_url('admin/menu/create_menu');?>')"><img src="<?php echo theme_url('styles/default/images/icons/insert_row.png')?>"/><br/><?php echo lang('layout_toolbar_insert') ?></button>
				    	<button class="negative" type="button" onclick="toolbar._delete()"><img src="<?php echo theme_url('styles/default/images/icons/delete_row.png')?>"/><br/><?php echo lang('layout_toolbar_delete') ?></button>
				    </div>
				    
				    <!-- ########################## MESSAGE ########################## -->
				    <div id="message">
				    	<?php if( !empty($message) ) foreach($message as $item) echo $item;?>
				    </div>
				    <div class="clear"></div>
				    
				    <!-- ########################## LIST GROUP MENU ########################## -->
				    <div class="select float_l" style="margin-top: 20px" >	
						<b><?php echo lang('title_cbb_group_menu') ?> :</b>
				        <select id="select_group" name="select_group" style="width:120px">
				        	<option value="<?php echo site_url('admin/menu') ?>"><?php echo lang('cbb_option_all') ?></option>
				        	<?php foreach ($cate_menus as $menu): ?>				            
				            <option value="<?php echo site_url('admin/menu/menu_items/' . $menu['id']) ?>"><?php echo $menu['name'] ?></option>
				            <?php endforeach; ?>
				        </select>
				    </div>
				    <div class="clear"></div>
				    
				<!-- ########################## CONTENT ########################## -->
				<table class="listing" id="listing">
			        <col width="20"/>
			        <col width="20"/>
			        <col width="30"/>
			        <col />
			        <col />
			        <col width="50"/>
			        <col width="50"/>
			        <col width="100"/>
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
			            <th><?php echo lang('table_th_alias') ?></th>
			            <th><?php echo lang('table_th_open') ?></th>
			            <th><?php echo lang('table_th_close') ?></th>
			            <th><?php echo lang('table_th_number_menu_child') ?></th>
			            <th colspan="2"><?php echo lang('table_th_manage') ?></th>
			        </tr>
			        </thead>
			        <tbody id="tbody_manage">
					<?php if( empty($menus) ):?>
						<tr>
							<td colspan="10" style="line-height:20px"><?php echo lang('none_item')?></td>
						</tr>
					<?php else:?>
					<?php for ($i=0; $i < count($menus); $i++ ): ?>
						<tr>
							<td> <input type="checkbox" value="<?php echo $menus[$i]['id']?>" class="checkbox"/> </td>
							<td> <?php echo ( $i + 1 )?> </td>
							<td> <?php echo $menus[$i]['id']?> </td>
							<td> <a href="<?php echo site_url('admin/menu/menu_items/' . $menus[$i]['id']);?>" class="icon menu pad_left"><?php echo $menus[$i]['name']?> </a></td>
							<td> <?php echo $menus[$i]['abbrev']?> </td>
							<?php $count = $this->menu_model->count_menu_items_by_group_menu_id($menus[$i]['id']);?>
							<td> <?php echo $count['active']['count']?> </td>
							<td> <?php echo $count['not_active']['count']?> </td>
							<td> <?php echo $count['num']['count']?> </td>
							<td><a href="" class="icon delete" rel="<?php echo $menus[$i]['id']?>"></a></td>
							<td><a href="<?php echo site_url('admin/menu/update_menu/' . $menus[$i]['id'])?>" class="icon edit" rel="<?php echo $menus[$i]['id']?>"></a></td>
						</tr>
					<?php endfor;?>
					<?php endif;?>
			    </tbody>
				</table>
				<div class="paging" style="text-align: center; margin-bottom: 8px;">
				    <?php echo $this->pagination->create_links(); ?>
				</div>
				<div style="text-align:center; padding-bottom: 10px;">
					<?php echo $this->pagination->create_result();?>
                </div>
				<!-- ########################## END CONTENT ########################## -->
                </div>
            </div>
            <div class="panel_bottom"><div></div></div>
            </form>
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

