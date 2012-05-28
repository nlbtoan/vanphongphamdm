<script type="text/javascript">
$(document).ready(function(){

	function field_error( fields, data ){
		for ( var i=0; i<data.length; i++ ){
			if ( isNaN(data[i]) ){
				fields.eq(i).append(data[i]);
				$('.text', fields.eq(i)).addClass('text_error');
			} else {
				$('.text', fields.eq(i)).removeClass('text_error');
			}
		}
	}

	$('#frm_send_message').submit(function(e){
		
		e.preventDefault();
		
		var url = $(this).attr('action');
		var data = $(this).serialize();
		
		var parent = $(this).parent();
		var div_message = $('.message',  parent );
		var fields = $('.field', this);
		var input = $('input', fields);
		var text_area = $('textarea', fields);

		$('.error', this).remove();
		$('.text', fields).removeClass('text_error');

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
				input.val('');
				text_area.val('');
			}
			if ( typeof(data.error) != 'undefined' && data.error != "" ){
				div_message.addClass('error');
				div_message.append(data.error);
			}
			if ( typeof(data.validation) != 'undefined' && data.validation != "" ){
				field_error(fields, data.validation);
			}
		}, 'json');

		div_message.show().delay(10000).fadeOut('slow');

	});
	
});
</script>


<div class="title_page">								
	<div class="title"><?php echo $title?></div>
</div>
<div style="height:30px"></div>

<div style="clear:both"></div>
<div class="contact" style="margin:0 0 30px 21px;">
	<h3><b></b></h3>
	<div class="contact_address">
		<span class="marker"><img src="<?php echo theme_url('styles/default/images/con_address.png');?>" alt="Address: "  /></span>
		14 Tran Hung Dao, Duong Dong , Phu Quoc - Kien Giang
		<br />
		<br />
    	<span class="marker"><img src="<?php echo theme_url('styles/default/images/con_tel.png');?>" alt="Tel: "  /></span>
		(084) - 077 39 78 111<br />

        	<span class="marker"><img src="<?php echo theme_url('styles/default/images/con_fax.png');?>" alt=" Fax: "  /></span>
		(084) - 077 39 78 222<br />
	<br />
		Website: <a href="<?php echo site_url();?>" target="_blank"><?php echo base_url();?></a><br />
	</div>
</div>

<div class="send_message">
	<div class="message"></div>
	<?php echo form_open('contact/send_message', 'id="frm_send_message"');?>
		<div class="form_row">
			<label><?php echo lang('your_name');?>:</label>
			<div class="field"><input type="text" name="fullname" maxlength="50" class="text" value="" autocomplete="off"/></div>
		</div>	
		<div style="clear:both"></div>
		<div class="form_row">
			<label><?php echo lang('email');?>:</label>
			<div class="field"><input type="text" name="email" maxlength="50" class="text" value="" autocomplete="off"/></div>
		</div>
		<div style="clear:both"></div>
		<div class="form_row">
			<label><?php echo lang('title_fb');?>:</label>
			<div class="field"><input type="text" name="title" maxlength="40" class="text" value="" autocomplete="off"/></div>
		</div>
		<div style="clear:both"></div>
		<div class="form_row">
			<label><?php echo lang('content_fb');?>:</label>
			<div style="clear:both"></div>
			<div class="field clear_margin"><textarea name="content" class="text textarea"></textarea></div>
		</div>
		<div style="clear:both"></div>
		<div class="button_row">
			<button type="submit" value="update" class="button btn_update">
				<strong>Send</strong>
			</button>
		</div>
	<?php echo form_close()?>
</div>

<div style="clear:both"></div>
