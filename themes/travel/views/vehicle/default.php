<style>
.listing th, .listing td {
	border:1px solid #E9E9E9;
	padding:2px;
	text-align:center;
	vertical-align:middle;
}

.listing {
	margin:10px 0;
	width:100%;
}

.listing tr:hover td {
	background:none repeat scroll 0 0 #F2EEE5;
}

.vehicle{
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

<div class="title_page" style="margin-bottom:20px; position:relative">								
	<div class="title"><?php echo $title?></div>
	<a href="<?php echo site_url('vehicle/book');?>" class="button btn_update btn_b_t"><?php echo lang('book');?></a>
</div>

<div>
	<?php if(! empty($data) ):?>
	<?php foreach($data as $item):?>
	<table class="listing">
		<col/>
        <col/>
        <col width="18%"/>
        <col width="18%"/>
        <col width="18%"/>       
        	     
        <tbody id="tbody_manage">
        	<tr>
        		<th colspan="3" style="text-align: left; font-weight: bold; padding-left:5px;background-color: #006EAB; color:#FFF"> 
        			<?php echo lang('boat')?> : <?php echo $item['name']?> 
        		</th>
        		<th colspan="2" style="text-align: left; font-weight: bold; padding-left:5px;background-color: #006EAB; color:#FFF"> 
        			<?php echo lang('price')?> : <?php echo $item['price']?> 
        		</th>
        	</tr>
        	<tr class="vehicle">
        		<th><?php echo lang('location_departure')?></th>
        		<th><?php echo lang('location_arrival')?></th>
        		<th><?php echo lang('time_departure')?></th>
        		<th><?php echo lang('time_arrival')?></th>
        		<th><?php echo lang('total_time')?></th>
        	</tr>
        	<tr>
        		<td><?php echo $item['location_departure_to']?></td>
        		<td><?php echo $item['location_arrival_to']?></td>
        		<td><?php echo $item['time_departure_to']?></td>
        		<td><?php echo $item['time_arrival_to']?></td>
        		<td><?php echo $item['total_time_to']?></td>
        	</tr>
        	<tr>
        		<td><?php echo $item['location_departure_back']?></td>
        		<td><?php echo $item['location_arrival_back']?></td>
        		<td><?php echo $item['time_departure_back']?></td>
        		<td><?php echo $item['time_arrival_back']?></td>
        		<td><?php echo $item['total_time_back']?></td>
        	</tr>
        </tbody>
	</table>
	<?php endforeach;?>
	<?php endif;?>
	
</div>