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

	 $("#check_in, #check_out").datepicker({
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
					$(this).val('<?php if ( !empty($restore_data) ) echo date('m/d/Y', $restore_data['check_out']); ?>');
				}
				
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
        <div id="left" class="panel">        	            
			<?php $this->load->view('leftsiderbar') ?>                                                    
        </div>        
        <!-- ########################## END LEFT ###################### -->
        
        <!-- ########################## WRAPPER ########################## -->
        <?php echo form_open("admin/hotel/edit_book/".$restore_data['id'], 'id="frm_edit_book"');?>
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
						<a id="save_xsl" class="button" href="<?php echo site_url('admin/hotel/xsl/'.$restore_data['id']);?>"><img src="<?php echo theme_url('styles/default/images/icons/xls.png')?>"/>Xuất file Exel</a>
						<div class="clear"></div>
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
			            		<th><?php echo lang('date');?> : </th>
			            		<td>
			            			<input type="hidden" name="book" value="<?php echo $restore_data['id'];?>"/>
			            			<?php  echo date('h:i:s - d/m/Y', $restore_data['date']) ?>
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
			            		<th><?php echo lang('total_person');?>: </th>
			            		<td>
			            			<input value="<?php if ( !empty($restore_data) ) echo $restore_data['total_person']; ?>" autocomplete="off" size="1" maxlength="2" type="text" style="text-align:center" name="total_person" readonly="readonly" />
			            			<span style="padding-left:12px;"><?php echo lang('adult');?></span>: 
			            			<input value="<?php if ( !empty($restore_data) ) echo $restore_data['adult']; ?>"  autocomplete="off" size="1" maxlength="2" type="text" name="adult" style="text-align:center"/>
			            			<span style="padding-left:12px;"><?php echo lang('child');?></span>: 
			            			<input value="<?php if ( !empty($restore_data) ) echo $restore_data['child']; ?>" autocomplete="off" size="1" maxlength="2" type="text" name="child" style="text-align:center"/>
			            			<span style="padding-left:12px;"><?php echo lang('baby');?></span>: 
			            			<input value="<?php if ( !empty($restore_data) ) echo $restore_data['baby']; ?>" autocomplete="off" size="1" maxlength="2" type="text" name="baby" style="text-align:center" />
			            		</td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('hotel');?>: </th>
			            		<td>
			            			<select name="hotel" style="width:326px;" autocomplete="off">
			            				<?php foreach ($list_hotel as $item):?>
										<option value="<?php echo $item['id']?>" <?php if( $item['id'] == !empty($restore_data['hotel']) ? $restore_data['hotel'] : $restore_data['hotel_id'] ) echo ' selected="selected"';?>><?php echo $item['name'];?> - <?php echo $item['level'].' '.lang('star');?></option>
										<?php endforeach;?>
									</select>
			            		</td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('check_in');?>: </th>
			            		<td>
			            			<input id="check_in" name="check_in" value="<?php if ( !empty($restore_data) ) echo date('m/d/Y', $restore_data['check_in']); ?>" style="margin-right:2px;" autocomplete="off"  type="text" size="50"  readonly="readonly"/>
			            		</td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('check_out');?>: </th>
			            		<td>
			            			<input id="check_out" name="check_out" value="<?php if ( !empty($restore_data) ) echo date('m/d/Y', $restore_data['check_out']); ?>" style="margin-right:2px;" autocomplete="off"  type="text" size="50"  readonly="readonly"/>
			            		</td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('info_room');?>: </th>
			            		<td>
			            			<span style="padding-left:12px;"><?php echo lang('single_room');?></span>: 
			            			<input name="single_room" value="<?php if ( !empty($restore_data) ) echo $restore_data['single_room']; ?>" autocomplete="off" size="1" maxlength="2" type="text" style="text-align:center"/>
			            			<span style="padding-left:12px;"><?php echo lang('double_room');?></span>: 
			            			<input name="double_room" value="<?php if ( !empty($restore_data) ) echo $restore_data['double_room']; ?>" autocomplete="off" size="1" maxlength="2" type="text" style="text-align:center"/>
			            			<span style="padding-left:12px;"><?php echo lang('family_room');?></span>: 
			            			<input name="family_room" value="<?php if ( !empty($restore_data) ) echo $restore_data['family_room']; ?>" autocomplete="off" size="1" maxlength="2" type="text" style="text-align:center" />
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
			            			<textarea name="other_requirement" autocomplete="off" style="width:322px; height:100px;" ><?php if ( !empty($restore_data) ) echo $restore_data['other_requirement']; ?></textarea>
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