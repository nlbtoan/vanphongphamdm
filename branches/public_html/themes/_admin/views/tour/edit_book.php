<?php echo doctype(); ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo lang('tieu_de') ?></title>
<?php $this->load->view('head') ?>

<link rel="stylesheet" href="<?php echo site_url('assets/ui/base/jquery.ui.all.css'); ?>" type="text/css" media="screen" />

<!-- LOAD JS -->
<script type="text/javascript" src="<?php echo site_url('assets/jquery-ui-1.8.2.custom.min.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/jquery.easy-confirm-dialog.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/tinymce.jquery/jquery.tinymce.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/tinymce.jquery/tiny_mce.js')?>"></script>
<!-- LOAD CSS -->
<?php load_css('assets/message/screen.css') ?>

<script type="text/javascript">
$(document).ready(function(){
	
	$('#message, .notice').show().delay(10000).fadeOut('slow');

	$("#date_start").datepicker({
		 showOn: 'button',
		 buttonImage: '<?php echo theme_url("styles/default/images/calendar_icon.png");?>', 
		 buttonImageOnly: true,
		 changeMonth: true,
		 changeYear: true,
		 minDate: 'today', 
		 maxDate: ''
	 });

	 $('input[name*=adult]').bind('change', function(){
		change($(this), parseInt($('input[name*=baby]').val()), parseInt($('input[name*=child]').val()));
	});

	$('input[name*=child]').bind('change', function(){
		change($(this), parseInt($('input[name*=baby]').val()), parseInt($('input[name*=adult]').val()));
	});

	$('input[name*=baby]').bind('change', function(){
		change($(this), parseInt($('input[name*=child]').val()), parseInt($('input[name*=adult]').val()));
	});

	function change( obj, var1, var2 ){
		if ( isNaN(obj.val()) ){
			obj.val(0);
			my_alert('<?php echo lang('not_number');?>');
		}
		if ( obj.val() == "" ){
			obj.val(0);
		}
		var in_tol = $('input[name*=total_person]');
		var rs = parseInt(obj.val()) + var1 + var2;
		
		if ( rs == 0 ){
			rs = 1;
			$('input[name*=adult]').val(rs);
		} else if ( rs > 100 ){
			alert('du lieu qua lon');
			rs = 1;
			$('input[name*=adult]').val(1);
			$('input[name*=child]').val(0);
			$('input[name*=baby]').val(0);
		}
		
		in_tol.val(rs);

	}

	var event_change = function(e){
		var i_arr = new Array('adult','child','baby');
		
		if ( $('select[name*=sl_age] option[value=0]:selected').length == 0 ){
			my_alert('Tour phải có ít nhất một người lớn đăng ký');
			$('option[value=0]', $(this)).attr('selected', 'selected');
		} else {
			for ( var i = 0; i < i_arr.length; i++ ){
				$('input[name*='+i_arr[i]+']').val($('select[name*=sl_age] option[value='+i+']:selected').length);
			}
		}

	}

	$('select[name*=sl_age]').bind('change', event_change);

	var event_remove = function(e){
		e.preventDefault();
		/*if ( $('select[name*=sl_age] option[value=0]:selected').length < 1 ){
			my_alert('Tour phải có ít nhất một người lớn đăng ký');
		} 
		else {*/
			var tr = $(this).parent().parent();
			var sl_val = $('select[name*=sl_age] option:selected', tr).val();
			var i_arr = new Array('adult','child','baby');
			 
			var idx = tr.index();
			tr.remove();

			if ( $("#list_p tr").length > 2 ){
				if ( $("#list_p tr").length > idx ){
					for ( var j = idx; j < $("#list_p tr").length ; j++ ){
						$('td:first', $("#list_p tr").eq(j) ).html(j);
					}
				}
			}
		     
			var total_person = parseInt($("#list_p tr:last td:first").html());
	
			$('input[name*='+i_arr[sl_val]+']').val($('select[name*=sl_age] option[value='+sl_val+']:selected').length);
			$('input[name*=total_person]').val(total_person);
			
			if ( $(this).attr('rel') != "" ){
				var url = site_url('admin/tour/delete_book_detail');
				var adult = $('input[name*=adult]').val();
				var child = $('input[name*=child]').val();
				var baby = $('input[name*=baby]').val();
				var book = $('input[name*=book]').val();
				var data = { id: $(this).attr('rel'), total_person: total_person, adult: adult, child: child, baby: baby, book: book  }
				$.post(url, data, function(data){
					my_alert(data.success);
				}, 'json');
			}
		//}
	 }

	$('a.remove_row').bind('click', event_remove);

	 $('#add_client').bind('click', function(e){
		e.preventDefault();
		var total_person = parseInt($("#list_p tr:last td:first").html()) + 1;
		
		var html = '<tr>';
		html += '<td align="center">'+total_person+'</td>';
		html += '<td><input type="text" name="txt_name_i[]" autocomplete="off" class="txt_name"/></td>';
		html += '<td><input type="text" name="txt_birthday_i[]" autocomplete="off" size="8" readonly="readonly" style="background:#FFF; border:1px solid #7F9DB9; height:18px;"/></td>';
		html += '<td><input type="text" name="txt_address_i[]" autocomplete="off"/></td>';
		html += '<td>';
			html += '<select name="sl_sex_i[]" style="width:70px;">';
				html += '<option value="0"><?php echo lang('female');?></option>';
				html += '<option value="1"><?php echo lang('male');?></option>';
			html += '</select>';
		html += '</td>';
		html += '<td>';
			html += '<select name="sl_customer_based_i[]" style="width:98px;">';
				html += '<option value="0"><?php echo lang('vietnamese');?></option>';
				html += '<option value="1"><?php echo lang('oversea_vietnamese');?></option>';
				html += '<option value="2"><?php echo lang('foreigner');?></option>';
				html += '</select>';
		html += '</td>';
		html += '<td>';
			html += '<select name="sl_age_i[]" style="width:82px;">';
				html += '<option value="0"><?php echo lang('adult');?></option>';
				html += '<option value="1"><?php echo lang('child');?></option>';
				html += '<option value="2"><?php echo lang('baby');?></option>';
			html += '</select>';
		html += '</td>';
		html += '<td>';
			html += '<select name="sl_single_room_i[]" style="width:75px;">';
				html += '<option value="0"><?php echo lang('no_1');?></option>';
				html += '<option value="1"><?php echo lang('yes');?></option>';
			html += '</select>';
		html += '</td>';
		
		html += '<td>';
		html += 	'<a href="" class="remove_row"><img src="<?php echo theme_url('styles/default/images/delete-icon-large.gif');?>" alt="remove"></a>';
		html += '</td>';
		
		html += '</tr>';
		html += '</tr>';
		
		$('#list_p').append(html);

		$("input[name*=txt_birthday]", "#list_p tr:last" ).datepicker({
			 changeMonth: true,
			 changeYear: true,
			 minDate: new Date(1920, 0, 1),
			 maxDate: 'today'
		 });

		$('a.remove_row', "#list_p tr:last").bind('click', event_remove);

		$('select[name*=sl_age]').bind('change', event_change);
		
		$('input[name*=total_person]').val(total_person);

		$('input[name*=adult]').val(parseInt($('input[name*=adult]').val())+1);
		
	});

	$("input[name*=txt_birthday]").datepicker({
		changeMonth: true,
		changeYear: true,
		minDate: new Date(1920, 0, 1),
		maxDate: 'today'
	});

	 $('#btn_submit').click(function(e){
		 
		e.preventDefault();
	 	var flag = true;

	 	$('input[name*=txt_name]').each(function(idx){
	 		if ( $(this).val().trim().length < 1 ){
				flag = false;
	 		}	
		});
		
	 	$('input[name*=txt_name_i]').each(function(idx){
	 		if ( $(this).val().trim().length < 1 ){
				flag = false;
	 		}	
		});

	 	if ( flag == true ){
	 		$('#frm_edit_book').submit();
	 	} else {
			my_alert('Chưa điền đầy đủ dữ liệu trong danh sách người tham gia');
	 	}
	 	
	 });

	$('select[name*=tour_cat_id]').bind('change', function(e){
		
		e.preventDefault();
		var url = site_url('admin/tour/select_tour');
		var cat_id = $(this).val();
		var id = $('input[name*=tour]').val();
		var data = { cat_id: cat_id, id: id};

		$.post(url, data, function(data){
			if( data != "" ){
				$('select[name*=tour_id]').html(data)
			}
		}, 'json');
		
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
        <div id="left" class="panel">        	            
			<?php $this->load->view('leftsiderbar') ?>                                                    
        </div>        
        <!-- ########################## END LEFT ###################### -->
        
        <!-- ########################## WRAPPER ########################## -->
        <?php echo form_open("admin/tour/edit_book/".$restore_data['id'], 'id="frm_edit_book"');?>
        <div id="wrapper" class="panel">
            <div class="panel_top"><div></div></div>            
            <div class="panel_left">
                <div class="panel_right">
                	<!-- ########################## ICON & BREADCRUMB ########################## --> 
				    <p class="float_l"><img src="<?php echo theme_url('styles/default/images/icons/user.gif') ?>"  title="<?php echo lang('edit');?>"/></p>					
				    <p class="float_l">
				        <span class="large"><?php echo lang('edit');?></span><br />
				        <span class="quiet"><?php echo lang('manage');?></span>
				    </p>
				    <div class="clear"></div>
				    
				    <!-- ########################## TOOLBAR ########################## -->
				    <div class="toolbar">
				    	<button title="<?php echo lang('action_save');?>" class="negative" type="button" onclick="window.location = '<?php echo $back_url?>'"><img src="<?php echo theme_url('styles/default/images/icons/back.png')?>"/><br/><?php echo lang('layout_toolbar_cancel') ?></button>
				    	<button title="<?php echo lang('action_back');?>" class="positive" type="submit" id="btn_submit"><img src="<?php echo theme_url('styles/default/images/icons/insert_row.png')?>"/><br/><?php echo lang('layout_toolbar_save') ?></button>
				    </div>
				    
				    <!-- ########################## MESSAGE ########################## -->
				    <div id="message">
				    	<?php if( !empty($message) ) echo $message;?>
				    </div>
				    <div class="clear"></div>
				
				<!-- ########################## CONTENT ########################## -->
					<fieldset>
						<legend><?php echo lang('general_information');?></legend>
						<a id="save_xsl" class="button" href="<?php echo site_url('admin/tour/xsl_tour/'.$restore_data['id']);?>"><img src="<?php echo theme_url('styles/default/images/icons/xls.png')?>"/>Xuất file Exel</a>
						<table class="editing">
							<tr>
			            		<th><?php echo lang('is_checked');?>  : </th>
			            		<td>
			            			<input name= "is_checked" <?php if ( !empty($restore_data) && $restore_data['is_checked'] == "0") { echo ' checked="checked"'; }?> value="0" type="radio" autocomplete="off"/>
			            			<?php echo lang('action_close');?>
			            			<input name= "is_checked" <?php if ( !empty($restore_data) && $restore_data['is_checked'] == "1") { echo ' checked="checked"'; }?> value="1" type="radio" autocomplete="off"/>
			            			<?php echo lang('action_open');?>
			            		</td>
			            	</tr>
							<tr>
			            		<th><?php echo lang('date');?>: </th>
			            		<td>
			            			<input type="hidden" name="book" value="<?php echo $restore_data['id'];?>"/>
			            			<input type="hidden" name="tour" value="<?php echo !empty($restore_data['tour']) ? $restore_data['tour'] : $restore_data['tour_id'];?>"/>
			            			<?php  echo date('h:i:s - d/m/Y', $restore_data['date']) ?>
			            		</td>
			            	</tr>
			            	<tr>
		            			<th><?php echo lang('tour');?>: </th>
			            		<td>
			            			<select name="tour_id" autocomplete="off" size="1" style="margin-top:5px; min-width:107px" >
			            				<!--<?php foreach($tours as $item):?>
			            				<option value="<?php echo $item['id']?>" <?php if( $item['id'] == $restore_data['tour_id'] ) echo ' selected="selected"'?>><?php echo $item['title'];?></option>
			            				<?php endforeach;?>-->
			            				<?php echo $sl_tour;?>
			            			</select>
			            		</td>
			            	</tr>
			            	<tr>
		            			<th><?php echo lang('tour_cat');?>: </th>
			            		<td>
			            			<select name="tour_cat_id" autocomplete="off" size="10" style="margin-top:5px; min-width:107px" >
			            				<?php echo tour_combobox($current_lang, $restore_data['tour_cat_id']);?>
			            			</select>
			            		</td>
			            	</tr>
							<tr>
			            		<th><?php echo lang('fullname');?>: </th>
			            		<td>
			            			<input name="fullname" value="<?php if ( !empty($restore_data) ) echo $restore_data['fullname']; ?>" autocomplete="off"  type="text" size="50" />
			            		</td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('phone');?>: </th>
			            		<td>
			            			<input name="phone" value="<?php if ( !empty($restore_data) ) echo $restore_data['phone']; ?>" autocomplete="off"  type="text" size="50" />
			            		</td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('email');?>: </th>
			            		<td>
			            			<input name="email" value="<?php if ( !empty($restore_data) ) echo $restore_data['email']; ?>" autocomplete="off"  type="text" size="50" />
			            		</td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('date_start');?>: </th>
			            		<td>
			            			<input id="date_start" name="date_start" value="<?php if ( !empty($restore_data) ) echo date('m/d/Y', $restore_data['date_start']); ?>" style="margin-right:2px;" autocomplete="off"  type="text" size="50"  readonly="readonly"/>
			            		</td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('total_person');?>: </th>
			            		<td>
			            			<input name="total_person" value="<?php if ( !empty($restore_data) ) echo $restore_data['total_person']; ?>" autocomplete="off" size="1" maxlength="2" type="text" style="text-align:center" readonly="readonly" />
			            			<span style="padding-left:12px;"><?php echo lang('adult');?></span>: 
			            			<input name="adult" value="<?php if ( !empty($restore_data) ) echo $restore_data['adult']; ?>"  autocomplete="off" size="1" maxlength="2" type="text" style="text-align:center" readonly="readonly" />
			            			<span style="padding-left:12px;"><?php echo lang('child');?></span>: 
			            			<input name="child" value="<?php if ( !empty($restore_data) ) echo $restore_data['child']; ?>" autocomplete="off" size="1" maxlength="2" type="text" style="text-align:center" readonly="readonly" />
			            			<span style="padding-left:12px;"><?php echo lang('baby');?></span>: 
			            			<input name="baby" value="<?php if ( !empty($restore_data) ) echo $restore_data['baby']; ?>" autocomplete="off" size="1" maxlength="2" type="text" style="text-align:center" readonly="readonly" />
			            		</td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('payment_method');?>: </th>
			            		<td>
			            			<input name= "payment_method" <?php if ( !empty($restore_data) && $restore_data['payment_method'] == "0") { echo ' checked="checked"'; }?> value="0" type="radio" autocomplete="off"/>
			            			<?php echo lang('cash');?>
			            			<input name= "payment_method" <?php if ( !empty($restore_data) && $restore_data['payment_method'] == "1") { echo ' checked="checked"'; }?> value="1" type="radio" autocomplete="off"/>
			            			<?php echo lang('transfer');?>
			            			<input name= "payment_method" <?php if ( !empty($restore_data) && $restore_data['payment_method'] == "2") { echo ' checked="checked"'; }?> value="2" type="radio" autocomplete="off"/>
			            			<?php echo lang('credit_card');?>
			            		</td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('other_requirement');?>: </th>
			            		<td>
			            			<textarea name="other_requirement" autocomplete="off" style="width:322px; height:70px;" ><?php if ( !empty($restore_data) ) echo $restore_data['other_requirement']; ?></textarea>
			            		</td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('address');?>: </th>
			            		<td>
			            			<input name="address" value="<?php if ( !empty($restore_data) ) echo $restore_data['address']; ?>" autocomplete="off" type="text" size="50" />
			            		</td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('company');?>: </th>
			            		<td>
			            			<input name="company" value="<?php if ( !empty($restore_data) ) echo $restore_data['company']; ?>" autocomplete="off" type="text" size="50" />
			            		</td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('tax_code');?>: </th>
			            		<td>
			            			<input name="tax_code" value="<?php if ( !empty($restore_data) ) echo $restore_data['company']; ?>" autocomplete="off" type="text" size="50" />
			            		</td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('nation');?>: </th>
			            		<td>
			            			<input name="nation" value="<?php if ( !empty($restore_data) ) echo $restore_data['nation']; ?>" autocomplete="off" type="text" size="50" />
			            		</td>
			            	</tr>
			            	<tr>
			            		<td colspan="2">
			            			
			            			<h5><?php echo lang('list_person');?></h5>
			            			
			            			<table id="list_p" cellspacing="1">
										<tr>
											<td align="center"><?php echo lang('number')?></td>
											<td><?php echo lang('name')?> <span style="color:red;">*</span> </td>
											<td><?php echo lang('birthday')?> </td>
											<td><?php echo lang('address')?> </td>
											<td><?php echo lang('sex')?> </td>
											<td><?php echo lang('customer_based')?> </td>
											<td><?php echo lang('age')?> </td>
											<td><?php echo lang('single_room')?> </td>
										</tr>
										
										<?php foreach( $list_person as $key=>$item ): ?>
										<tr>
											<td align="center"><?php echo $key + 1 ?></td>
											<td><input name="txt_name[]" value="<?php echo $item['name']?>" autocomplete="off" type="text"/><input name="hd_id[]" value="<?php echo $item['id'];?>" type="hidden" /></td>
											<td><input name="txt_birthday[]" value="<?php echo $item['birthday'] != 0 ? date('m/d/Y', $item['birthday']) : "" ; ?>" type="text" autocomplete="off" size="8" readonly="readonly" style="background:#FFF; border:1px solid #7F9DB9; height:18px;"/></td>
											<td><input name="txt_address[]" value="<?php echo $item['address']?>" autocomplete="off" type="text"/></td>
											<td>
												<select name="sl_sex[]" style="width:70px;" autocomplete="off">
													<option value="0" <?php if( $item['sex'] == 0 ) echo ' selected="selected"';?>><?php echo lang('female');?></option>
													<option value="1" <?php if( $item['sex'] == 1 ) echo ' selected="selected"';?>><?php echo lang('male');?></option>
												</select>
											</td>
											<td>
												<select name="sl_customer_based[]" style="width:98px;" autocomplete="off">
													<option value="0" <?php if( $item['customer_based'] == 0 ) echo ' selected="selected"';?>><?php echo lang('vietnamese');?></option>
													<option value="1" <?php if( $item['customer_based'] == 0 ) echo ' selected="selected"';?>><?php echo lang('oversea_vietnamese');?></option>
													<option value="2" <?php if( $item['customer_based'] == 0 ) echo ' selected="selected"';?>><?php echo lang('foreigner');?></option>
												</select>
											</td>
											<td>	
												<select name="sl_age[]" style="width:82px;" autocomplete="off">
													<option value="0" <?php if( $item['age'] == 0 ) echo ' selected="selected"';?>><?php echo lang('adult');?></option>
													<option value="1" <?php if( $item['age'] == 1 ) echo ' selected="selected"';?>><?php echo lang('child');?></option>
													<option value="2" <?php if( $item['age'] == 2 ) echo ' selected="selected"';?>><?php echo lang('baby');?></option>
												</select>
											</td>
											<td>
												<select name="sl_single_room[]" style="width:75px;" autocomplete="off">
													<option value="0" <?php if( $item['single_room'] == 0 ) echo ' selected="selected"';?>><?php echo lang('no_1');?></option>
													<option value="1" <?php if( $item['single_room'] == 1 ) echo ' selected="selected"';?>><?php echo lang('yes');?></option>
												</select>
											</td>
											<?php if ( $key > 0 ):?>
											<td><a href="" class="remove_row" rel="<?php echo $item['id'];?>"><img src="<?php echo theme_url('styles/default/images/delete-icon-large.gif');?>" alt="remove"></a></td>
											<?php endif;?>
										</tr>
										<?php endforeach;?>
									</table>
									<a href="" id="add_client">Thêm khách</a>
			            			
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