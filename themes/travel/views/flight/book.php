<script type="text/javascript" src="<?php echo base_url().'assets/jquery-ui-1.8.2.custom.min.js'?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'assets/ui/base/jquery.ui.all.css'?>" type="text/css" media="screen" />
<script type="text/javascript">
(function($) 
{	
	$.fn.create_row = function(options)
	{
		_func = options;
		
		var options = $.extend(
		{
			index : 1,
			total : 1,
			add_row : function()
			{	
				if ( $("input[name*=txt_name]", "#list_p tr:last").val().trim().length > 0 && options.index < options.total ){
					options.index ++;
					
					var html = '<tr>';
					html += '<td align="center">1</td>';
					html += '<td><input type="text" name="txt_name[]" autocomplete="off" class="txt_name"/></td>';
					html += '<td><input type="text" name="txt_birthday[]" autocomplete="off" size="8" readonly="readonly" style="background:#FFF; border:1px solid #7F9DB9; height:18px;"/></td>';
					html += '<td><input type="text" name="txt_address[]" autocomplete="off"/></td>';
					html += '<td>';
						html += '<select name="sl_sex[]" style="width:70px;">';
							html += '<option value="0"><?php echo lang('female');?></option>';
							html += '<option value="1"><?php echo lang('male');?></option>';
						html += '</select>';
					html += '</td>';

					html += '<td>';
						html += '<select name="sl_age[]" style="width:82px;">';
							html += '<option value="0"><?php echo lang('adult');?></option>';
							html += '<option value="1"><?php echo lang('child');?></option>';
							html += '<option value="2"><?php echo lang('baby');?></option>';
						html += '</select>';
					html += '</td>';
					
					html += '<td>';
					html += 	'<a href="" class="remove_row"><img src="<?php echo theme_url('styles/default/images/delete-icon-large.gif');?>" alt="x"></a>';
					html += '</td>';
					
					html += '</tr>';
					html += '</tr>';
					
					$('#list_p').append(html);
					
					if ( $('select[name*=sl_age] option[value=2]:selected').length < parseInt($('input[name*=baby]').val()) ){
						$('select[name*=sl_age] option[value=2]', "#list_p tr:last").attr('selected', 'selected');
					}
					if ( $('select[name*=sl_age] option[value=1]:selected').length < parseInt($('input[name*=child]').val()) ){
						$('select[name*=sl_age] option[value=1]', "#list_p tr:last").attr('selected', 'selected');
					}
					if ( $('select[name*=sl_age] option[value=0]:selected').length < parseInt($('input[name*=adult]').val()) ){
						$('select[name*=sl_age] option[value=0]', "#list_p tr:last").attr('selected', 'selected');
					}
					
					$('#list_p tr:last td:first').html(options.index);

					$("input[name*=txt_birthday]", "#list_p tr:last" ).datepicker({
						 changeMonth: true,
						 changeYear: true,
						 minDate: new Date(1900, 0, 1),
						 yearRange: '1900:c',
						 maxDate: 'today'
					 });

					$('select[name*=sl_age]', "#list_p tr:last").bind('change', options.event_age_change);
					
					$('a.remove_row', "#list_p tr:last").bind('click', options.remove_row);
					
					$(this).unbind('keypress');
					$('input[name*=txt_name]', "#list_p tr:last").bind('keypress', options.add_row);
				}
			},
			hide_rows: function(){
				if ( $("#list_p tr").length > options.total ){
					for ( i = $("#list_p tr").length; i > options.total; i-- ){
						$("#list_p tr").eq(i).remove();
					}
					options.index = parseInt($("#list_p tr:last td:first").html());
				}
			},
			delete_rows: function(){
				if ( $("#list_p tr").length > 2 ){
					if ( $('select[name*=sl_age] option[value=2]:selected').length > parseInt($('input[name*=baby]').val()) ){
						var num_b = $('select[name*=sl_age] option[value=2]:selected').length - parseInt($('input[name*=baby]').val());
						for ( i = 0; i < num_b; i++ ){
							options.remove_idx( $('select[name*=sl_age] option[value=2]:selected:last').parent().parent().parent().index() );
						}
					}
					if ( $('select[name*=sl_age] option[value=1]:selected').length > parseInt($('input[name*=child]').val()) ){
						var num_c = $('select[name*=sl_age] option[value=1]:selected').length - parseInt($('input[name*=child]').val());
						for ( i = 0; i < num_c; i++ ){
							options.remove_idx( $('select[name*=sl_age] option[value=1]:selected:last').parent().parent().parent().index() );
						}
					}
					if ( $('select[name*=sl_age] option[value=0]:selected').length > parseInt($('input[name*=adult]').val()) ){
						var num_a = $('select[name*=sl_age] option[value=0]:selected').length - parseInt($('input[name*=adult]').val());
						for ( i = 0; i < num_a; i++ ){
							options.remove_idx( $('select[name*=sl_age] option[value=0]:selected:last').parent().parent().parent().index() );
						}
					}
					$("#list_p tr:eq(1) td:eq(6)").remove();
					if ( $("#list_p tr").length == 2 ){
						$('select[name*=sl_age] option[value=0]', "#list_p tr:last").attr('selected', 'selected');
					}
				}
			},
			/*,
			show_rows:  function(){
				if ( $('#list_p tr:visible').length-1 < options.total ){
					for ( i = $('#list_p tr:visible').length; i <= options.total; i++ ){
						$("#list_p tr").eq(i).show();
					}
				}
			}*/
			remove_row: function(e){
				e.preventDefault();
				options.index = parseInt($("#list_p tr:last td:first").html());
				var tr = $(this).parent().parent();
				var idx= tr.index();
				tr.remove();
				options.index-- ;
				if ( $("#list_p tr").length > idx ){
					for ( i = idx; i < $("#list_p tr").length ; i++ ){
						$('td:first', $("#list_p tr").eq(i) ).html(i);
					}
				}

				$('input[name*=txt_name]', "#list_p tr:last").bind('keypress', options.add_row);
				options.add_row();
			},
			remove_idx: function(idx){
				if ( $("#list_p tr").length > 2 ){
					$("#list_p tr").eq(idx).remove();
					if ( $("#list_p tr").length > idx ){
						for ( j = idx; j < $("#list_p tr").length ; j++ ){
							$('td:first', $("#list_p tr").eq(j) ).html(j);
						}
					}
					options.index = parseInt($("#list_p tr:last td:first").html());
				}
			},
			event_age_change: function(e){
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
			
		}, options || {});

		 if(typeof(_func) == "function"){
			 _func.prototype = $.extend(this, _func);
			 _func.prototype.func = _func;
		}
		
		//options.hide_rows();
		options.delete_rows();
		options.add_row();

		//BIND su kien dong cuoi
		$(this).bind('keypress', options.add_row);
		
	}
})(jQuery);

$(document).ready(function(){
	 $("#date_start").datepicker({
		 showOn: 'button',
		 buttonImage: '<?php echo theme_url("styles/default/images/calendar_icon.png");?>', 
		 buttonImageOnly: true,
		 changeMonth: true,
		 changeYear: true,
		 minDate: 'today', 
		 maxDate: ''
	 });
	 
	 $("input[name*=txt_birthday]", "#list_p tr:last" ).datepicker({
		 changeMonth: true,
		 changeYear: true,
		 minDate: new Date(1900, 0, 1),
		 yearRange: '1900:c',
		 maxDate: 'today'
	 });

	$('input[name*=total_person]').bind('change', function(){
		if ( isNaN($(this).val()) ){
			alert('<?php echo lang('not_number');?>');
		} else {

			$('input[name*=txt_name]', "#list_p tr:last").unbind('keypress');

			$('input[name*=txt_name]', "#list_p tr:last").create_row(
			{
				total : parseInt($(this).val()),
				index : parseInt($("#list_p tr:last td:first").html())
			});

		}
	});
	
	function field_error( data ){
		for ( var i=0; i<data.length; i++ ){
			if ( isNaN(data[i][1]) ){
				$('input[name*='+data[i][0] +']').parent().append(data[i][1]);
				$('input[name*='+data[i][0] +']').addClass('text_error');
			} else {
				$('input[name*='+data[i][0] +']').removeClass('text_error');
			}
		}
	}

	$('#reset').click(function(){
		$('input[name*=txt_name]', "#list_p tr:last").create_row(
		{
			total : 1,
			index : 1
		});
		$('input[name*=txt_name]', "#list_p tr:last").unbind('keypress');

		$('html, body').animate({scrollTop: '400px'}, 600);
		
	});
	
	$('#frm_send').submit(function(e){
		e.preventDefault();
		var check = check_list();
		var content = "";
		if ( check == -1 ){
			if ( check_list_age() == -1 ){
				var url = $(this).attr('action');
				var data = $(this).serialize();
				
				var parent = $(this).parent();
				var div_message = $('.message',  parent );
				var fields = $('.field', this);

				$('.error', this).remove();
				$('.text', fields).removeClass('text_error');
		        var input = $('input', fields);
				var text_area = $('textarea', fields);

				div_message.removeClass('success error');
				$('p', div_message).remove();
				div_message.addClass('loader');
				div_message.append('<p> Loading ........ </p>');

				$.post(url, data, function(data){
					div_message.removeClass('loader');
					$('p', div_message).remove();

					if ( typeof(data.success) != 'undefined' && data.success != "" ){
						div_message.addClass('success');
						div_message.append(data.success);
						div_message.show().delay(10000).fadeOut('slow');
						
						//reset
						input.val('');
						text_area.val('');
						$('input', '#list_p').val('');
						
						$('input[name*=adult]').val(1);
						$('input[name*=child]').val(0);
						$('input[name*=baby]').val(0);
						$('input[name*=total_person]').val(1);
						$('input[name*=txt_name]', "#list_p tr:last").create_row(
						{
							total : 1,
							index : 1
						});
						$('input[name*=txt_name]', "#list_p tr:last").unbind('keypress');

					}
					if ( typeof(data.error) != 'undefined' && data.error != "" ){
						div_message.addClass('error');
						div_message.append(data.error);
						div_message.show().delay(10000).fadeOut('slow');
					}
					if ( typeof(data.validation) != 'undefined' && data.validation != "" ){
						field_error(data.validation);
					}
				}, 'json');
				$('html, body').animate({scrollTop: '400px'}, 600);
			} else {
				
				content = 'Dữ liệu không khớp';
			}
		} else {
			content = 'Danh sách người tham gia đang thiếu thông tin bắt buộc, không cân xứng với tổng số lượng khách';
		}

		var title = "Thông báo";

		if ( content != "" ){
			$('body').append('<div id="dialog-message" title="'+title+'"><p>'+content+'</p></div>');
			$("#dialog").dialog("destroy");
			$("#dialog-message").dialog({
				modal: true,
				buttons: {
					Ok: function(e) {
						$(this).dialog('close');
						$('#dialog-message').remove();
						$('html, body').animate({scrollTop: '400px'}, 600);
					}
				}
			});
		}

	});

	function check_list(){
		var f = -1;
		var txt_name = $('input:[name*=txt_name]');
		for (i = 0; i < txt_name.length; i++ ){
			if ( txt_name.eq(i).val().trim().length <= 0 ){
				f = i;
				break;
			}
		}
		return f;
	}

	function check_list_age(){
		var f = -1;
		if ( $('select[name*=sl_age] option[value=2]:selected').length != parseInt($('input[name*=baby]').val()) || $('select[name*=sl_age] option[value=1]:selected').length != parseInt($('input[name*=child]').val()) || $('select[name*=sl_age] option[value=0]:selected').length != parseInt($('input[name*=adult]').val()) ){
			f = 0;
		}
		return f;
	}

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

		$('input[name*=txt_name]', "#list_p tr:last").unbind('keypress');

		$('input[name*=txt_name]', "#list_p tr:last").create_row(
		{
			total : parseInt(in_tol.val()),
			index : parseInt($("#list_p tr:last td:first").html())
		});

		if( rs > 100 || $("#list_p tr:last").length == 2 ){
			$('input[name*=txt_name]', "#list_p tr:last").unbind('keypress');
		}
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
	
});
</script>

<div class="title_page">								
	<div class="title"><?php echo $title?></div>
</div>
<div style="clear:both;"></div>
<div class="send_message book" style="margin-top:20px;">
	<div class="title_info"><?php echo lang('info_book');?></div>
	<div class="message"></div>
	<?php echo form_open('flight/send_info', 'id="frm_send"');?>
	<div class="info_require" style="float: left">
		<div class="form_row">
			<label><?php echo lang('fullname');?> <span>*</span> </label>
			<div class="field"><input type="text" name="fullname" maxlength="50" class="text" value="" autocomplete="off"/></div>
		</div>	
		<div style="clear:both"></div>
		<div class="form_row">
			<label><?php echo lang('phone');?> <span>*</span> </label>
			<div class="field"><input type="text" name="phone" maxlength="50" class="text" value="" autocomplete="off"/></div>
		</div>	
		<div style="clear:both"></div>
		<div class="form_row">
			<label><?php echo lang('email');?> <span>*</span> </label>
			<div class="field"><input type="text" name="email" maxlength="50" class="text" value="" autocomplete="off"/></div>
		</div>
		<div style="clear:both"></div>
		<div class="form_row">
			<label><?php echo lang('date_start');?> <span>*</span> </label>
			<div class="field"><input type="text" id="date_start" readonly="readonly" name="date_start" maxlength="40" class="text" value="" autocomplete="off" style="margin-right:2px;"/></div>
		</div>
		<div style="clear:both"></div>
		<div class="form_row">
			<label><?php echo lang('departure');?> <span>*</span> </label>
			<div class="field"><input type="text" name="departure" maxlength="40" class="text" value="" autocomplete="off"/></div>
		</div>
		<div style="clear:both"></div>
		<div class="form_row">
			<label><?php echo lang('total_person');?> <span>*</span> </label>
			<div class="field"><input type="text" name="total_person" maxlength="2" class="text number_len" value="1" autocomplete="off" readonly="readonly" style="background:#EEE; text-align:center;"/></div>
		</div>
		<div style="clear:both"></div>
		<div class="form_row">
			<label><?php echo lang('child');?></label>
			<div class="field"><input type="text" name="child" maxlength="2" class="text number_len" value="0" autocomplete="off" style="text-align:center;"/><span><?php echo lang('note_child');?></span></div>
		</div>
		<div style="clear:both"></div>
		<div class="form_row">
			<label></label>
			<div class="field">
				<p class="rd">
					<input type="radio" name="type_ticket" value="0" checked="checked"/><span><?php echo lang('one_way');?></span>
					<input type="radio" name="type_ticket" value="1"/><span><?php echo lang('round_trip');?></span>
				</p>
			</div>
		</div>
	</div>
	<div class="info_not_r" style="float: left">
		<div class="form_row">
			<label><?php echo lang('address');?></label>
			<div class="field"><input type="text" name="address" maxlength="40" class="text" value="" autocomplete="off"/></div>
		</div>
		<div style="clear:both"></div>
		<div class="form_row">
			<label><?php echo lang('company');?></label>
			<div class="field"><input type="text" name="company" maxlength="40" class="text" value="" autocomplete="off"/></div>
		</div>
		<div style="clear:both"></div>
		<div class="form_row">
			<label><?php echo lang('tax_code');?></label>
			<div class="field"><input type="text" name="tax_code" maxlength="40" class="text" value="" autocomplete="off"/></div>
		</div>
		<div style="clear:both"></div><div class="form_row">
			<label><?php echo lang('nation');?></label>
			<div class="field"><input type="text" name="nation" maxlength="50" class="text" value="" autocomplete="off"/></div>
		</div>
		<div style="clear:both"></div>
		<div class="form_row">
			<label><?php echo lang('arrival');?> <span>*</span> </label>
			<div class="field"><input type="text" name="arrival" maxlength="40" class="text" value="" autocomplete="off"/></div>
		</div>
		<div class="form_row">
			<label><?php echo lang('adult');?></label>
			<div class="field"><input type="text" name="adult" maxlength="2" class="text number_len" value="1" autocomplete="off" style="text-align:center;"/><span><?php echo lang('note_adult');?></span></div>
		</div>
		<div style="clear:both"></div>
		<div class="form_row">
			<label><?php echo lang('baby');?></label>
			<div class="field"><input type="text" name="baby" maxlength="2" class="text number_len" value="0" autocomplete="off" style="text-align:center;"/><span><?php echo lang('note_baby');?></span></div>
		</div>
		<div style="clear:both"></div>
	</div>	
		<div style="clear:both"></div>
		<div class="title_info" style="margin-top:10px;"><?php echo lang('list_person');?></div>
		<table id="list_p" cellspacing="1">
			<col width="30"/>
			<col width=""/>
			<col width=""/>
			<col width=""/>
			<col width=""/>
			<col width=""/>
			<col width=""/>
			<col width=""/>
			<tr style="background-color:#DBEAEF; text-align:center; line-height: 24px; font-weight:bold;">
				<td align="center"><?php echo lang('number')?></td>
				<td><?php echo lang('name')?> <span style="color:red;">*</span> </td>
				<td><?php echo lang('birthday')?> </td>
				<td><?php echo lang('address')?> </td>
				<td><?php echo lang('sex')?> </td>
				<td><?php echo lang('age')?> </td>
			</tr>
			<tr>
				<td align="center">1</td>
				<td><input type="text" name="txt_name[]" autocomplete="off"/></td>
				<td><input type="text" name="txt_birthday[]" autocomplete="off" size="8" readonly="readonly" style="background:#FFF; border:1px solid #7F9DB9; height:18px;"/></td>
				<td><input type="text" name="txt_address[]" autocomplete="off"/></td>
				<td>
					<select name="sl_sex[]" style="width:70px;">
						<option value="0"><?php echo lang('female');?></option>
						<option value="1"><?php echo lang('male');?></option>
					</select>
				</td>
				<td>	
					<select name="sl_age[]" style="width:82px;">
						<option value="0"><?php echo lang('adult');?></option>
						<option value="1"><?php echo lang('child');?></option>
						<option value="2"><?php echo lang('baby');?></option>
					</select>
				</td>
			</tr>
		</table>
		<div style="clear:both"></div>
		<div class="panel_i">
			<div class="other_req">
				<div class="title_info" style="margin-top:25px;"><?php echo lang('other_requirement');?></div>
				<div class="field clear_margin"><textarea name="other_requirement" class="text textarea"></textarea></div>
			</div>
			<div class="payment">
				<div class="title_info" style="margin-top:25px;"><?php echo lang('payment_method');?></div>
				<p>
					<input type="radio" name="payment_method" value="0" checked="checked"/><span><?php echo lang('cash');?></span><br/>
					<input type="radio" name="payment_method" value="1"/><span><?php echo lang('transfer');?></span><br/>
					<input type="radio" name="payment_method" value="2"/><span><?php echo lang('credit_card');?></span>
				</p>
			</div>
		</div>
		<div style="clear:both"></div>
		<div class="button_row">
			<button type="submit" value="update" class="button btn_update" id="b_submit">
				<strong><?php echo lang('action_send');?></strong>
			</button>
			<button id="reset" type="reset" value="update" class="button btn_update">
				<strong><?php echo lang('action_reset');?></strong>
			</button>
		</div>
	<?php echo form_close()?>
</div>

<div style="clear:both"></div>