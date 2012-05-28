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
			var answer = confirm('Bạn chắc chắn muốn xóa');
			if(answer)
			{
				var url = site_url("admin/nickchat/delete");
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
			var answer = confirm('Bạn chắc chắn muốn mở');
			if(answer)
			{
				var url = site_url("admin/nickchat/update");
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
			var answer = confirm('Bạn chắc chắn muốn khóa');
			if(answer)
			{
				var url = site_url("admin/nickchat/update");
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
	* Click active
	* 0 = un_active
	* 1 = active
	*/
	$('.active').click(function(e){
		e.preventDefault();

		var url = site_url("admin/nickchat/update");
		var id = $(this).attr('rel');

		if( $(this).hasClass('tick') )
		{
			$.post(url, {id : id, active : 0, current_url : $('#current_url').val(), action : 'publish'} );
		}
		else if( $(this).hasClass('untick') )
		{
			$.post(url, {id : id, active : 1, current_url : $('#current_url').val(), action : 'publish'} );
		}	
	});

	/**
	* Delete
	*/
	$('.delete').click(function(e){
		e.preventDefault();
		
		var answer = confirm('Bạn chắc chắn muốn xóa');
		if(answer)
		{
			var url = site_url("admin/nickchat/delete");
			var id = $(this).attr('rel');

			$.post(url, {id : id, current_url : $('#current_url').val(), action : 'delete'} );
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
        	<form action="<?php echo site_url("admin/nickchat/manage");?>" method="post" id="adminForm">        	
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
				    	<button class="positive" type="button" title="<?php echo lang('action_add');?>"  onclick="toolbar._insert('<?php echo site_url('admin/nickchat/create');?>')"><img src="<?php echo theme_url('styles/default/images/icons/insert_row.png')?>"/><br/><?php echo lang('layout_toolbar_insert') ?></button>
				    	<button class="positive" type="button" onclick="toolbar._publish()"><img src="<?php echo theme_url('styles/default/images/icons/publish.png')?>"/><br/><?php echo lang('layout_toolbar_publish') ?></button>
				    	<button class="negative" type="button" onclick="toolbar._unpublish()"><img src="<?php echo theme_url('styles/default/images/icons/unpublish.png')?>"/><br/><?php echo lang('layout_toolbar_unpublish') ?></button>
				    </div>
				    
				    <!-- ########################## MESSAGE ########################## -->
				    <div id="message">
				    	<?php if( !empty($message) ) foreach($message as $item) echo $item;?>
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
				    <?php endif;?>
				    <div class="clear"></div>
				    
				<!-- ########################## CONTENT ########################## -->
				<table class="listing" id="listing">
			        <col width="20"/>
			        <col width="20"/>
			        <col width="30"/>
			        <col />
			        <col />
			        <col width="30"/>
			        <colgroup>
			            <col width="25"/>
			            <col width="25"/>
			        </colgroup> 
			        <thead> 
			        <tr>
			        	<th><input type="checkbox" id="checkall"/></th>
			            <th>#</th>
			            <th><?php echo lang('table_th_id') ?></th>
			            <th><?php echo lang('table_th_title_name') ?></th>
			            <th><?php echo lang('table_th_title_nickchat') ?></th>
			            <th><?php echo lang('table_th_open') ?></th>
			            <th colspan="2"><?php echo lang('table_th_manage') ?></th>
			        </tr>
			        </thead>
			        <tbody id="tbody_manage">
					<?php if( empty($data) ):?>
						<tr>
							<td colspan="10" style="line-height:20px"><?php echo lang('none_item')?></td>
						</tr>
					<?php else:?>
					<?php for ($i=0; $i < count($data); $i++ ): ?>
						<tr>
							<td> <input type="checkbox" value="<?php echo $data[$i]['id']?>" class="checkbox"/> </td>
							<td> <?php echo ( $i + 1 )?> </td>
							<td> <?php echo $data[$i]['id']?> </td>
							<td style="text-align: left; padding-left:5px;"> <?php echo $data[$i]['name']?> </td>
							<td style="text-align: left; padding-left:5px;"> <?php echo $data[$i]['nickchat']?> </td>
							<td> <a href="" class="icon active <?php if($data[$i]['active']) echo('tick'); else echo('untick');?>" rel="<?php echo $data[$i]['id']?>"></a> </td>
							<td> <a href="" class="icon delete" rel="<?php echo $data[$i]['id']?>" title="<?php echo lang('action_delete');?>"></a></td>
							<td> <a href="<?php echo site_url('admin/nickchat/edit/' . $data[$i]['id'])?>" class="icon edit" rel="<?php echo $data[$i]['id']?>"></a></td>
						</tr>
					<?php endfor;?>
					<?php endif;?>
			    </tbody>
				</table>
				<!-- ########################## END CONTENT ########################## -->
                </div>
            </div>
            <input type="hidden" value="<?php echo uri_string()?>" id="current_url"></input>
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