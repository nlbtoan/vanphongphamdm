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
				if ( $.trim($("input[name*=txt_name]", "#list_p tr:last").val()).length > 0 && options.index < options.total && $.trim($("input[name*=txt_passport]", "#list_p tr:last").val()).length > 0 ){
					options.index ++;
					
					var html = '<tr>';
					//html += $('#list_p tr:eq(1)').html();
					html += '<td align="center">1</td>';
					html += '<td><input type="text" name="txt_name[]" autocomplete="off" class="txt_name"/></td>';
					html += '<td><input type="text" name="txt_birthday[]" autocomplete="off" size="8" readonly="readonly" style="background:#FFF; border:1px solid #7F9DB9; height:18px;"/></td>';
					html += '<td>';
						html += '<select name="sl_sex[]" style="width:55px;">';
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
					html += '<td><input type="text" name="txt_passport[]" autocomplete="off" size="10"/></td>';
					html += '<td><input type="text" name="txt_date_issue[]" autocomplete="off" size="8" readonly="readonly" style="background:#FFF; border:1px solid #7F9DB9; height:18px;"/></td>';
					html += '<td><input type="text" name="txt_date_expiry[]" autocomplete="off" size="10" readonly="readonly" style="background:#FFF; border:1px solid #7F9DB9; height:18px;"/></td>';
					html += '<td>';
						html += '<select name="sl_single_room[]" style="width:75px;">';
							html += '<option value="0"><?php echo lang('no');?></option>';
							html += '<option value="1"><?php echo lang('yes');?></option>';
						html += '</select>';
					html += '</td>';
					
					html += '<td>';
					html += 	'<a href="" class="remove_row"><img src="<?php echo theme_url('styles/default/images/delete-icon-large.gif');?>" alt="x"></a>';
					html += '</td>';
					
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

					$("input[name*=txt_birthday], input[name*=txt_date_issue], input[name*=txt_date_expiry]", "#list_p tr:last" ).datepicker({
						 changeMonth: true,
						 changeYear: true,
						 minDate: new Date(1990, 0, 1),
						 yearRange: '1900:c',
						 maxDate: 'today'
					 });

					$('select[name*=sl_age]', "#list_p tr:last").bind('change', options.event_age_change);
					
					$('a.remove_row', "#list_p tr:last").bind('click', options.remove_row);
					
					$(this).unbind('keypress');
					$('input[name*=txt_name]', "#list_p tr:last").bind('keypress', options.add_row);

					$('input[name*=txt_passport]', "#list_p tr:last").unbind('keypress');
					$('input[name*=txt_passport]', "#list_p tr:last").bind('keypress', options.add_row);
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
					$("#list_p tr:eq(1) td:eq(9)").remove();
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
				$('input[name*=txt_passport]', "#list_p tr:last").bind('keypress', options.add_row);
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
		$('input[name*=txt_passport]', "#list_p tr:last").bind('keypress', options.add_row);
		
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
	 
	 $("input[name*=txt_birthday], input[name*=txt_date_issue], input[name*=txt_date_expiry]", "#list_p tr:last" ).datepicker({
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
			$('input[name*=txt_passport]', "#list_p tr:last").unbind('keypress');

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
		$('input[name*=txt_passport]', "#list_p tr:last").unbind('keypress');

		$('#b_submit').attr('disabled', true);
		$('#b_submit').addClass('btn_disabled');

		$('html, body').animate({scrollTop: $('.title_page').position().top+'px'}, 600);
		
	});
	
	$('#frm_send').submit(function(e){
		e.preventDefault();
		var content = "";
		var check = check_list();
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
						$('input[name*=txt_passport]', "#list_p tr:last").unbind('keypress');

						$('.agree input[name*=chk_a]').attr('checked', false); 
						$('#b_submit').attr('disabled', true);
						$('#b_submit').addClass('btn_disabled');
						
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

				$('html, body').animate({scrollTop: $('.title_page').position().top+'px'}, 600);
						
			} else {
				content = 'Du lieu khong khop';
			}
		} else {
			content = "Danh sách người tham gia đang thiếu thông tin bắt buộc, không cân xứng với tổng số lượng khách";
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
						$('html, body').animate({scrollTop: $('.title_page').position().top+'px'}, 600);
					}
				}
			});
		}

	});

	function check_list(){
		var f = -1;
		var txt_name = $('input:[name*=txt_name]');
		var txt_passport = $('input:[name*=txt_passport]');
		for (i = 0; i < txt_name.length; i++ ){
			if ( $.trim(txt_name.eq(i).val()).length <= 0 || $.trim(txt_passport.eq(i).val()).length <= 0){
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
			alert('<?php echo lang('not_number');?>');
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
		$('input[name*=txt_passport]', "#list_p tr:last").unbind('keypress');

		$('input[name*=txt_name]', "#list_p tr:last").create_row(
		{
			total : parseInt(in_tol.val()),
			index : parseInt($("#list_p tr:last td:first").html())
		});

		if( rs > 100  || $("#list_p tr:last").length == 2 ){
			$('input[name*=txt_name]', "#list_p tr:last").unbind('keypress');
			$('input[name*=txt_passport]', "#list_p tr:last").unbind('keypress');
		}
	}
	
	$('.agree span').click(function(){;
		if ( $('.agree input[name*=chk_a]').attr('checked') ){
			$('.agree input[name*=chk_a]').attr('checked', '');
			$('#b_submit').attr('disabled', true);
			$('#b_submit').addClass('btn_disabled');
		} else {
			$('.agree input[name*=chk_a]').attr('checked', 'checked');
			$('#b_submit').attr('disabled', '');
			$('#b_submit').removeClass('btn_disabled');
		}
	});

	$('#chk_a').click(function(){
		if ( $('.agree input[name*=chk_a]').attr('checked') ){
			$('#b_submit').attr('disabled', '');
			$('#b_submit').removeClass('btn_disabled');
		} else {
			$('#b_submit').attr('disabled', true);
			$('#b_submit').addClass('btn_disabled');
		}
	});

	if ( $('.agree input[name*=chk_a]').attr('checked') ){
		$('#b_submit').attr('disabled', '');
		$('#b_submit').removeClass('btn_disabled');
	} else {
		$('#b_submit').attr('disabled', true);
		$('#b_submit').addClass('btn_disabled');
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

	<table class="table_info" cellspacing="0" cellpadding="4" align="center" width="300" style="margin: 12px  0 20px 60px;">
		<tr>
			<td align="left"><?php echo lang('time_tour')?>:</td>
			<td><?php echo $data['time_tour']?></td>
	
		 </tr>
		 <tr>
			<td align="left"><?php echo lang('destination')?></td>
			<td><?php echo $data['destination']?></td>
		</tr>
		<tr>
			<td align="left"><?php echo lang('vehicle')?>:</td>
			<td><?php echo $data['vehicle']?></td>
		 </tr>
		 <tr>
			<td align="left"><b><?php echo lang('price')?>:</b></td>
			<td><font class="price1"><?php echo $data['price']?></font></td>
		</tr>
	</table>

<div style="clear:both;"></div>
<div class="send_message book">
	<div class="title_info"><?php echo lang('info_book');?></div>
	<div class="message"></div>
	<?php echo form_open('tour/send_info', 'id="frm_send"');?>
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
			<label><?php echo lang('total_person');?> <span>*</span> </label>
			<div class="field"><input type="text" name="total_person" maxlength="2" class="text number_len" value="1" autocomplete="off" readonly="readonly" style="background:#EEE; text-align:center;"/></div>
		</div>
		<div style="clear:both"></div>
		<div class="form_row">
			<label><?php echo lang('child');?></label>
			<div class="field"><input type="text" name="child" maxlength="2" class="text number_len" value="0" autocomplete="off" style="text-align:center;"/><span><?php echo lang('note_child');?></span></div>
		</div>
		<div style="clear:both"></div>
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
			<col width=""/>
			<tr style="background-color:#DBEAEF; text-align:center; line-height: 24px; font-weight:bold;">
				<td align="center"><?php echo lang('number')?></td>
				<td><?php echo lang('name')?> <span style="color:red;">*</span> </td>
				<td><?php echo lang('birthday')?> </td>
				<td><?php echo lang('sex')?> </td>
				<td><?php echo lang('age')?> </td>
				<td><?php echo lang('passport')?>  <span style="color:red;">*</span> </td>
				<td><?php echo lang('date_of_issue')?> </td>
				<td><?php echo lang('date_of_expiry')?> </td>
				<td><?php echo lang('single_room')?> </td>
			</tr>
			<tr>
				<td align="center">1</td>
				<td><input type="text" name="txt_name[]" autocomplete="off" class="txt_name"/></td>
				<td><input type="text" name="txt_birthday[]" autocomplete="off" size="8" readonly="readonly" style="background:#FFF; border:1px solid #7F9DB9; height:18px;"/></td>
				<td>
					<select name="sl_sex[]" style="width:55px;">
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
				<td><input type="text" name="txt_passport[]" autocomplete="off" size="10"/></td>
				<td><input type="text" name="txt_date_issue[]" autocomplete="off" size="8" readonly="readonly" style="background:#FFF; border:1px solid #7F9DB9; height:18px;"/></td>
				<td><input type="text" name="txt_date_expiry[]" autocomplete="off" size="10" readonly="readonly" style="background:#FFF; border:1px solid #7F9DB9; height:18px;"/></td>
				<td>
					<select name="sl_single_room[]" style="width:75px;">
						<option value="0"><?php echo lang('no');?></option>
						<option value="1"><?php echo lang('yes');?></option>
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
					<input type="radio" name="payment" value="0" checked="checked"/><span><?php echo lang('cash');?></span><br/>
					<input type="radio" name="payment" value="1"/><span><?php echo lang('transfer');?></span><br/>
					<input type="radio" name="payment" value="2"/><span><?php echo lang('credit_card');?></span>
				</p>
			</div>
		</div>
		<div style="clear:both"></div>
		<input type="hidden" value="<?php echo $data['tour_id']?>" name="tour"/>
		<div class="note">
			<p><?php echo lang('promotion');?></p>
			<ul>
				<li>Giam gia 50%</li>
				<li>Giam gia 20%</li>
			</ul>
		</div>
		<div style="clear:both"></div>
		<div class="rules">
			<div class="title_info" style="margin-top:25px; "><?php echo lang('conditions_online_registration_tour');?></div>
			<div class="content">
<table width="100%" border="0" cellpadding="2" cellspacing="2">
  <tr>
    <td><strong class="right">ĐIỀU KIỆN BOOKTOUR </strong></td>
  </tr>
  <tr>
    <td><p align="justify"><strong>I/. GIÁ TOUR</strong> : Được tính theo giá 
	niêm yết trên mỗi tour<br>

      - Giá Tour du lịch nước ngoài : được tính theo USD &amp; được quy đổi ra VNĐ 
	theo tỉ giá tại thời điểm thanh toán.<br>
      - Giá Tour du lịch trong nước : được tính bằng VNĐ (Đồng Việt Nam)<br>
      - Giá tour chỉ bao gồm những khoản được liệt kê trong phần “Bao gồm” trong 
	chương trình tour, GREEN CRUISE TOURIST không có nghĩa vụ thanh toán bất cứ chi phí 
	nào không nằm trong phần “Bao gồm”.<br>
      <br>
      <strong>Ghi chú</strong> : Giá tour du lịch nước ngoài thường có hai nội 
	dung : Giá tour và thuế hàng không. <br>

      Giá tour không thay đổi sau khi GREEN CRUISE TOURIST đã công bố trên hệ thống trực 
	tuyến.<br>
      “Thuế hàng không” gồm bảo hiểm hàng không, thuế phi trường các nước, phụ 
	phí xăng dầu…đây là khoản phí mà GREEN CRUISE 
	TOURIST thu hộ cho các hãng hàng không. Khoản phí này thường có sự thay đổi 
	(tăng hoặc giảm nhẹ tùy theo giá xăng dầu thế giới ) tại thời điểm xuất vé 
	máy bay (từ 03 đến 05 ngày trước ngày khởi hành). GREEN CRUISE TOURIST sẽ thu theo 
	giá thực tế vào lần thanh toán thứ hai của khách hàng.<br>
      <br>
      <strong>II/. THỜI GIAN ĐĂNG KÝ TOUR</strong>:<br>
      Tour không cần xin thị thực (visa) nhập cảnh: du lịch trong nước, Thái Lan, 
	Malaysia,Singapore. Quý Khách nên đăng ký ít nhất 07 (bảy)ngày trước ngày 
	khởi hành đối với những tour đang còn chỗ.<br>
      <br>

      Tour cần xin thị thực (visa) nhập cảnh : Đối với những tour còn chỗ, Quý 
	Khách nên đăng ký:<br>
      - Ít nhất 10 ngày đối với các tour Trung Quốc.<br>
      - Ít nhất 20 ngày đối với các tour đến HongKong.<br>
      - Ít nhất 30 ngày đối với các tour đến Hoa Kỳ, Châu Âu, Nam Phi, Ấn Độ, 
	Hàn Quốc, Nhật Bản.<br>
      - Ít nhất 60 ngày đối với các tour đến Úc.<br>
      <strong>Ghi chú</strong> : Quý Khách nên xem kỹ phần “Bản tóm tắt những 
	yêu cầu cơ bản khi đi tour &amp; xin cấp thị thực nhập cảnh“ trước khi đăng ký 
	tour.<br>

      <br>
      <strong>III/. PHƯƠNG THỨC THANH TOÁN</strong><br>
      Hiện nay chúng tôi cung cấp cho khách hàng 3 phương thức thanh toán:</p>
	<p align="justify"><b>1. Thanh toán bằng tiền mặt:</b><br>
	CÔNG TY CỔ PHẦN DỊCH VỤ DU LỊCH &amp; THƯƠNG MẠI GREEN CRUISE.<br>
	Địa chỉ: 389A, đường Điện Biên Phủ, Phường 4, Quận 3, TP. HCM, Việt Nam.<br>

	Tel: (84-8) 38 328 328 (20 lines)<br>
	Fax: (84-8) 38 327 327<br>
	Email: <a href="mailto:info@GREEN CRUISEtourist.com">info@GREEN CRUISEtourist.com</a> </p>
	<p align="justify"><b>2. Thanh toán bằng chuyển khoản:</b><br>
	Tên tài khỏan: CÔNG TY CỔ PHẦN DỊCH VỤ DU LỊCH &amp; THƯƠNG MẠI GREEN CRUISE. </p>

	<p align="justify">- Tài khỏan SACOMBANK<br>
&nbsp; Số tài khoản:<br>
&nbsp; USD: 060005969398<br>
&nbsp; VND: 060005960749<br>
&nbsp; Tại NGÂN HÀNG SÀI GÒN THƯƠNG TÍN (SACOMBANK)<br>
&nbsp; Địa chỉ: 266-268, đường Nam Kỳ Khởi Nghĩa, Quận 3, TP. HCM, Việt Nam.</p>

	<p align="justify">- Tài khỏan VIETCOMBANK<br>
&nbsp; Số tài khoản :<br>
&nbsp; USD: 007.137.4396270<br>
&nbsp; VND: 007.100.4396260<br>
&nbsp; Tại ngân hàng VIETCOMBANK chi nhánh Kỳ Đồng<br>
&nbsp; Địa chỉ: 13, đường Kỳ Đồng, Quận 3, TP. HCM, Việt Nam.</p>

	<p align="justify">- Tài khỏan TECHCOMBANK – PGD TECHCOMBANK PASTEUR – CN 
	TP.HCM<br>
&nbsp; Số tài khoản :<br>
&nbsp; VND: 102 2162 6074019&nbsp; <br>
&nbsp; Địa chỉ: 24-26 Pasteur, Phường Nguyễn Thái Bình, Quận 1, TP Hồ Chí Minh</p>
	<p align="justify"><b>3. Thanh toán bằng thẻ tín dụng qua mạng:</b><br>
	Chúng tôi hiện đang chấp nhận thanh toán bằng thẻ VISA (Credit và Debit), 
	MasterCard (Credit), JCB (Credit) và American Express (Credit) <br>

      <br>
      <strong>IV/. HỦY TOUR &amp; PHÍ HỦY TOUR</strong><br>
      Trong trường hợp khách hàng báo hủy chuyến đi sau khi GREEN CRUISE TOURIST đã hoàn 
	tất mọi thủ tục thì chi phí hủy là: <br>
      - 05 ngày (làm việc) trước ngày khởi hành : phạt 50% giá tour hoặc 100% 
	tiền đặt cọc.<br>
      - Từ 02 - 04 ngày (làm việc) trước ngày khởi hành : phạt 70% giá tour hoặc 
	100% tiền đặt cọc.<br>
      - Trong vòng 24 tiếng trước giờ khởi hành : phạt 100% giá tour hoặc 100% 
	tiền đặt cọc.<br>

      Nếu GREEN CRUISE TOURIST chậm trễ hoặc không thực hiện được chương trình tham quan 
	theo đúng kỳ hạn như đã ký trong hợp đồng, GREEN CRUISE TOURIST sẽ hoàn trả lại toàn 
	bộ số tiền khách hàng đã ứng trước cho GREEN CRUISE TOURIST và chịu mọi thiệt hại đối 
	với bên thứ ba như là: hàng không, khách sạn, nhà hàng,…<br>
      <br>
      <strong>V/. BẢO HIỂM DU LỊCH</strong>:<br>
      - Giá tour đã bao gồm bảo hiểm du lịch.<br>
      - Nếu khách hàng có nhu cầu bảo hiểm thêm về y tế, nhân mạng, tài sản, 
	khách hàng phải đăng ký trước và đóng thêm số tiền tùy theo mức bảo hiểm mà 
	khách hàng mong muốn cho GREEN CRUISE TOURIST ít nhất 03 ngày trước ngày khởi hành. <br>
      <strong><br>

      VI/. TIẾP NHẬN THÔNG TIN TOUR</strong>:<br>
      - Khách hàng có thể trực tiếp hoặc nhờ người đại diện đến đăng ký tour và 
	thanh toán tiền tour tại trụ sở của GREEN CRUISE TOURIST, hoặc đăng ký trên trang web du 
	lịch trực tuyến của GREEN CRUISEtourist.com.<br>
      - Khi đến đăng ký quý khách cần cung cấp đầy đủ, chính xác thông tin cá 
	nhân như họ và tên, số hộ chiếu, ngày tháng năm sinh.. . Mọi sự sai sót thông 
	tin dẫn đến sai tên khi xuất vé máy bay, visa... GREEN CRUISE TOURIST không chịu 
	trách nhiệm cho phần phí tổn phát sinh.<br>
      <br>
      - Chúng tôi chỉ có trách nhiệm cung cấp thông tin của chuyến đi cho khách 
	hàng đến đăng ký trực tiếp hoặc cho người đại diện, GREEN CRUISE TOURIST không chịu 
	bất cứ trách nhiệm nào trong trường hợp người đại diện không cung cấp lại 
	hoặc cung cấp không chính xác các thông tin của chuyến đi cho khách hàng.<br>
      <br>

      - Đối với những tour cần xin thị thực nhập cảnh (visa), sau khi đăng ký 
	tour Quý Khách nên liên lạc với GREEN CRUISE TOURIST để được hướng dẫn hoàn tất hồ sơ 
	xin visa.<br>
      <br>
      <strong>VII/. LƯU Ý</strong>:<br>
      - Trưởng đoàn của GREEN CRUISE TOURIST sẽ giữ toàn bộ hộ chiếu và vé máy bay của 
	khách trong suốt chuyến đi để tránh những trường hợp rủi ro, mất mát đáng 
	tiếc có thể xảy ra.<br>
      - Khách hàng trên 70 tuổi khi đi du lịch phải có thân nhân đi kèm hoặc có 
	giấy cam kết của gia đình và bảo hiểm sức khỏe.<br>
      <br>

      <strong>VIII/. TRÁCH NHIỆM VÀ CAM KẾT KHÁC</strong>:<br>
      <strong>1. Về phía GREEN CRUISE TOURIST</strong><br>
      - Đảm bảo đầy đủ mọi dịch vụ theo đúng như chương trình.<br>
      - Phổ biến những thông tin cần thiết cho chuyến đi đến khách hàng (phong 
	tục tập quán của nước tham quan, món ăn, thời tiết…)<br>
      - Mọi thay đổi (nếu có) phải được thông báo cho khách hàng trước ngày khởi 
	hành hoặc ngay sau khi phát hiện có những phát sinh xảy ra (đối với trường 
	hợp đang thực hiện chuyến đi)<br>
      - GREEN CRUISE TOURIST không chịu trách nhiệm về những khách hàng bị cơ quan quản 
	lý nhà nước từ chối cho xuất cảnh hoặc các cơ quan hữu quan của nước ngoài 
	từ chối cho nhập cảnh. Mọi chi phí phát sinh từ việc từ chối này sẽ do khách 
	hàng chi trả (bao gồm cả chi phí phạt hủy dịch vụ của các nhà cung cấp).<br>

      - GREEN CRUISE TOURIST không chịu trách nhiệm về những sự cố khách quan như: thiên 
	tai, hạn hán, trì hoãn chuyến bay do thời tiết, đình công, hỏa hoạn, chiến 
	tranh, dịch bệnh… Trong trường hợp này chúng tôi sẽ trao đổi với bên thứ 
	03 về các khoản phí tổn dịch vụ vượt ngoài chương trình với chi phí hợp lý 
	nhất và thông báo lại với khách hàng.<br>
      <br>
      <strong>2. Về phía khách hàng</strong><br>
      - Cung cấp hộ chiếu, hình ảnh và các giấy tờ liên quan đến thủ tục xuất 
	nhập cảnh đúng hạn quy định.<br>
      - Cung cấp tài chính đúng hạn.<br>
      - Tuân thủ theo pháp luật và các quy định của nước tham quan, GREEN CRUISE TOURIST 
	không chịu trách nhiệm pháp lý cũng như vật chất cá nhân của khách hàng 
	trong suốt thời gian đi tour. Trong trường hợp khách hàng vi phạm pháp luật 
	hoặc các quy định của nước sở tại, khách hàng phải chịu trách nhiệm thanh 
	toán tất cả các chi phí phát sinh do việc vi phạm gây ra. GREEN CRUISE TOURIST chỉ có 
	trách nhiệm giúp đỡ khách hàng trong trường hợp này nhằm giảm thiểu mức 
	thiệt hại cho khách hàng.<br>

      - Trong thời gian du lịch, khách hàng phải tuân thủ theo chương trình, 
	không được tự ý tách đoàn. Nếu có yêu cầu thay đổi, khách hàng phải thông báo 
	cho trưởng đoàn của GREEN CRUISE TOURIST<br>
      <br>
      <strong>3. GREEN CRUISE TOURIST</strong> giữ toàn quyền thay đổi lộ trình hoặc hủy 
	bỏ chuyến đi du lịch bất cứ lúc nào mà GREEN CRUISE TOURIST thấy cần thiết vì sự an 
	toàn cho khách hàng.<br>
      <br>
      <strong>4. Trong quá trình thực hiện</strong>, nếu xảy ra tranh chấp sẽ 
	được giải quyết trên cơ sở thương lượng giữa 2 bên. Nếu việc thương lượng 
	không đạt được kết quả, vụ việc sẽ được đưa ra tòa án theo đúng quy định của 
	pháp luật hiện hành, mọi chi phí liên quan sẽ do bên thua kiện trả.</p>
      <p><br>

      - Mọi thắc mắc Quý Khách điện thoại 38.328.328 hoặc email: 
		<a href="mailto:info@GREEN CRUISEtourist.com">info@GREEN CRUISEtourist.com</a> để được hướng dẫn thêm.</p>
      <p>Cám ơn sự quan tâm &amp; ủng hộ của Quý Khách <br>
        <strong>GREEN CRUISE TOURIST</strong><br></p>
    </td>
  </tr>
</table>

			</div>
			<div class="agree">
				<input type="checkbox" name="chk_a" id="chk_a"/> <span><?php echo lang('i_have_read_and_agree_with_the_above_conditions');?></span> 
			</div>
		</div>
		<div style="clear:both"></div>
		<div class="button_row">
			<button type="submit" value="update" class="button btn_update btn_disabled" id="b_submit">
				<strong><?php echo lang('action_send');?></strong>
			</button>
			<button id="reset" type="reset" value="update" class="button btn_update">
				<strong><?php echo lang('action_reset');?></strong>
			</button>
		</div>
	<?php echo form_close()?>
</div>

<div style="clear:both"></div>