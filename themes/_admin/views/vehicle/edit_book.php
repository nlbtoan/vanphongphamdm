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
        <?php echo form_open("admin/vehicle/edit_book/".$restore_data['id'], 'id="frm_edit_book"');?>
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
						<legend>Thông tin</legend>
						<a id="save_xsl" class="button" href="<?php echo site_url('admin/vehicle/xsl/'.$restore_data['id']);?>"><img src="<?php echo theme_url('styles/default/images/icons/xls.png')?>"/>Xuất file Exel</a>
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
			            			
			            			<input name= "type_ticket" <?php if ( !empty($restore_data) && $restore_data['type_ticket'] == "0") { echo ' checked="checked"'; }?> value="0" type="radio" autocomplete="off"/>
			            			<?php echo lang('one_way');?>
			            			<input name= "type_ticket" <?php if ( !empty($restore_data) && $restore_data['type_ticket'] == "1") { echo ' checked="checked"'; }?> value="1" type="radio" autocomplete="off"/>
			            			<?php echo lang('round_trip');?>
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
			            		<th><?php echo lang('departure');?>: </th>
			            		<td>
			            			<input name="departure"  value="<?php if ( !empty($restore_data) ) echo $restore_data['departure']; ?>"  autocomplete="off" type="text" size="50"/>
			            		</td>
			            	</tr>
			            	<tr>
			            		<th><?php echo lang('arrival');?>: </th>
			            		<td>
			            			<input name="arrival" value="<?php if ( !empty($restore_data) ) echo $restore_data['arrival']; ?>" autocomplete="off" type="text" size="50"/>
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
			            	<tr>
			            		<th><?php echo lang('nation');?>: </th>
			            		<td>
			            			<input name="nation" value="<?php if ( !empty($restore_data) ) echo $restore_data['nation']; ?>" autocomplete="off" type="text" size="50" />
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