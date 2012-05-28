<style>
.listing th, .listing td {
	border:1px solid #E9E9E9;
	padding:2px;
	text-align:center;
	vertical-align:middle;
}

.listing tr:hover td {
	background:none repeat scroll 0 0 #F2EEE5;
}

.listing {
	margin:25px 0;
	width:100%;
}

.flight{
	font-weight:bold;
	background-color:#DBEAEF;
	color:#006EAB;
}

table {
	border-collapse:collapse;
	border-spacing:0;
}
.btn_b_t{ position:absolute; top:9px; right: 1px; }
</style>
<div class="title_page" style="position:relative;">								
	<div class="title"><?php echo $title?></div>
	<a href="<?php echo site_url('flight/book');?>" class="button btn_update btn_b_t"><?php echo lang('book');?></a>
</div>

<div>
	<?php if(! empty($flight) ):?>
	<?php foreach( $flight as $data ) :?>
	<table class="listing">
		<col/>
        <col/>
        <col/>
        	     
        <tbody id="tbody_manage">
        <?php if( empty($data) ):?>
	        <tr>
	        	<td colspan="3" style="line-height:20px"><?php echo lang('none_item')?></td>
	        </tr>
        <?php else:?>
        	<tr>
        		<td colspan="3" style="text-align: left; font-weight: bold; padding-left:5px;background-color: #006EAB; color:#FFF"> 
        			<?php echo lang('trip')?> : <?php echo $data['to']?> - <?php echo $data['from']?>
        		</td>
        	</tr>
        	<?php if( empty($data['flight_to']) ):?>
	        <tr>
	        	<td colspan="10" style="line-height:20px"><?php echo lang('no_flight')?></td>
	        </tr>
        	<?php else:?>
        	<tr class="flight">
        		<th><?php echo lang('flight_code')?></th>
        		<th><?php echo lang('time_departure')?></th>
        		<th><?php echo lang('time_arrival')?></th>
        	</tr>
        	<?php foreach( $data['flight_to'] as $k => $item ):?>
	        <tr>
	        	<td><?php echo $item['flight_code']?></td>
	        	<td><?php echo $item['time_departure']?></td>
	        	<td><?php echo $item['time_arrival']?></td>
	        </tr>
        	<?php endforeach;?>
        	<?php endif;?>
        	
        	<tr>
        		<td colspan="3" style="text-align: left; font-weight: bold; padding-left:5px;background-color:#006EAB; color:#FFF"> 
        			<?php echo lang('trip')?> : <?php echo $data['from']?> - <?php echo $data['to']?>
        		</td>
        	</tr>
        	<?php if( empty($data['flight_from']) ):?>
	        <tr>
	        	<td colspan="3" style="line-height:20px"><?php echo lang('no_flight')?></td>
	        </tr>
        	<?php else:?>
        	<tr class="flight">
        		<th><?php echo lang('flight_code')?></th>
        		<th><?php echo lang('time_departure')?></th>
        		<th><?php echo lang('time_arrival')?></th>
        	</tr>
        	<?php foreach( $data['flight_from'] as $k => $item ):?>
	        <tr>
	        	<td><?php echo $item['flight_code']?></td>
	        	<td><?php echo $item['time_departure']?></td>
	        	<td><?php echo $item['time_arrival']?></td>
	        </tr>
        	<?php endforeach;?>
        	<?php endif;?>
        <?php endif;?>
        </tbody>
	</table>
	<?php endforeach;?>
	<?php endif;?>
	
</div>