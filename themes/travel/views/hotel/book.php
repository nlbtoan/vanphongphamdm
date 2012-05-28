<script type="text/javascript" src="<?php echo base_url().'assets/jquery-ui-1.8.2.custom.min.js'?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'assets/ui/base/jquery.ui.all.css'?>" type="text/css" media="screen" />
<script type="text/javascript">
$(document).ready(function(){
	 $("#check_in, #check_out").datepicker({
		 showOn: 'button',
		 buttonImage: '<?php echo theme_url("styles/default/images/calendar_icon.png");?>', 
		 buttonImageOnly: true,
		 changeMonth: true,
		 changeYear: true,
		 minDate: 'today', 
		 maxDate: ''
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

		$('html, body').animate({scrollTop: '400px'}, 600);
		
	});
	
	$('#frm_send').submit(function(e){
		
		e.preventDefault();

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
				
				$('input[name*=adult]').val(1);
				$('input[name*=child]').val(0);
				$('input[name*=baby]').val(0);
				$('input[name*=total_person]').val(1);
				
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
			my_alert('du lieu qua lon');
			rs = 1;
			$('input[name*=adult]').val(1);
			$('input[name*=child]').val(0);
			$('input[name*=baby]').val(0);
		}
		
		in_tol.val(rs);

	}

	$('input[name*=single_room], input[name*=double_room], input[name*=family_room]').bind('change', function(){
		if ( isNaN($(this).val()) ){
			$(this).val(0);
			my_alert('<?php echo lang('not_number');?>');
		}
		if ( $(this).val() == "" ){
			$(this).val(0);
		}
		if ($('input[name*=single_room]').val() == 0 && $('input[name*=double_room]').val() == 0 && $('input[name*=family_room]').val() == 0){
			$('input[name*=single_room]').val(1);
		}
	});

	$('input[name*=check_out]').bind('change', function(){
		if ( $('input[name*=check_in]').val() == "" ){
			my_alert('Mời bạn nhập ngày nhận phòng trước');
			$(this).val('');
		} else {
			var chk_in = new Date($('input[name*=check_in]').val()); 
			var chk_out = new Date($(this).val()); 
			if ( chk_in > chk_out ){
				my_alert('Ngày trả phòng không được phép trước ngày nhận phòng');
				$(this).val('');
			}
			
		}
	});

	function change_hotel(e){
		e.preventDefault();
		var url = site_url('hotel/book/'+$(this).val());
		var data = { };

		var wr_div = $(".hotel_info");
		var name_hotel = $(".name_hotel");
		var ip_hd = $("input[name*=hotel_id]");
		$.post(url, data, function(data){
			if ( typeof(data.html) != 'undefined' && data.html != "" ){
				wr_div.html(data.html);
			}
			if ( typeof(data.name) != 'undefined' && data.name != "" ){
				name_hotel.html(data.name);
			}
			ip_hd.val(data.id);
			
		}, 'json');
	}

	$('#sl_hotel').bind('change', change_hotel);
	
});
</script>

<div class="title_page">								
	<div class="title"><?php echo $title?></div>
	<div class="list_hotel">
	<span><?php echo lang('select_hotel');?>:</span>
	<select name="sl_hotel" id="sl_hotel">
		<?php foreach( $list_data as $item ):?>
			<option value="<?php echo $item['id']?>" <?php if ( $item['id']== $data_info['id'] ) { echo ' selected="selected"'; }?>><?php echo $item['name'];?></option>
		<?php endforeach;?>
	</select>
</div>
	
</div>

<div class="hotel_info">
	<?php echo $html_hotel_info;?>
</div>

<div style="clear:both;"></div>
<div class="send_message book" style="margin-top:20px;">
	<div class="title_info"><?php echo lang('info_book');?></div>
	<div class="message"></div>
	<?php echo form_open('hotel/send_info', 'id="frm_send"');?>
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
			<label><?php echo lang('total_person');?> <span>*</span> </label>
			<div class="field"><input type="text" name="total_person" maxlength="2" class="text number_len" value="1" autocomplete="off" readonly="readonly" style="background:#EEE; text-align:center;"/></div>
		</div>
		<div style="clear:both"></div>
		<div class="form_row">
			<label><?php echo lang('child');?></label>
			<div class="field"><input type="text" name="child" maxlength="2" class="text number_len" value="0" autocomplete="off" style="text-align:center;"/><span><?php echo lang('note_child');?></span></div>
		</div>
	</div>
	<div class="info_not_r" style="float: left;  margin-left:43px;">
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
		<div style="clear:both"></div>
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
	
	<div class="info_service" style="float:left;">
		<div class="title_info"><?php echo lang('info_service');?></div>
		<div class="form_row">
			<label><?php echo lang('name_hotel');?></label>
			<div class="field"><span class="name_hotel"><?php echo $data_info['name'];?></span></div>
		</div>
		<div style="clear:both"></div>
		<div class="form_row">
			<label><?php echo lang('check_in');?> <span>*</span> </label>
			<div class="field"><input type="text" id="check_in" readonly="readonly" name="check_in" maxlength="40" class="text" value="" autocomplete="off" style="margin-right:2px;"/></div>
		</div>
		<div style="clear:both"></div>
		<div class="form_row">
			<label><?php echo lang('check_out');?> <span>*</span> </label>
			<div class="field"><input type="text" id="check_out" readonly="readonly" name="check_out" maxlength="40" class="text" value="" autocomplete="off" style="margin-right:2px;"/></div>
		</div>
		<div style="clear:both"></div>
	</div>
	<div class="info_room" style="float:left; margin-left:35px;">
		<div class="title_info"><?php echo lang('info_room');?></div>
		<div style="clear:both"></div>
		<div class="form_row">
			<label><?php echo lang('single_room');?></label>
			<div class="field"><input type="text" name="single_room" maxlength="2" class="text number_len" value="1" autocomplete="off" style="text-align:center;"/><span><?php echo lang('note_adult');?></span></div>
		</div>
		<div style="clear:both"></div>
		<div class="form_row">
			<label><?php echo lang('double_room');?></label>
			<div class="field"><input type="text" name="double_room" maxlength="2" class="text number_len" value="0" autocomplete="off" style="text-align:center;"/><span><?php echo lang('note_adult');?></span></div>
		</div>
		<div style="clear:both"></div>
		<div class="form_row">
			<label><?php echo lang('family_room');?></label>
			<div class="field"><input type="text" name="family_room" maxlength="2" class="text number_len" value="0" autocomplete="off" style="text-align:center;"/><span><?php echo lang('note_adult');?></span></div>
		</div>
	</div>
	
	<div style="clear:both"></div>
	<div class="panel_i">
		<div class="other_req">
			<div class="title_info"><?php echo lang('other_requirement');?></div>
			<div class="field clear_margin"><textarea name="other_requirement" class="text textarea"></textarea></div>
		</div>
		<div class="payment">
			<div class="title_info"><?php echo lang('payment_method');?></div>
			<p>
				<input type="radio" name="payment_method" value="0" checked="checked"/><span><?php echo lang('cash');?></span><br/>
				<input type="radio" name="payment_method" value="1"/><span><?php echo lang('transfer');?></span><br/>
				<input type="radio" name="payment_method" value="2"/><span><?php echo lang('credit_card');?></span>
			</p>
		</div>
	</div>
	<div style="clear:both"></div>
	<div class="button_row">
		<input type="hidden" value="<?php echo $data_info['id']?>" name="hotel_id"/>
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