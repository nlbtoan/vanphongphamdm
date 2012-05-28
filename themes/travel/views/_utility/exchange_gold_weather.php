<?php 
	$ci =& get_instance();
	$ci->lang->load('front_end/exchange_gold');
?>
<script type="text/javascript" language="javascript" src="http://vnexpress.net/Service/Forex_Content.js"></script>
<script type="text/javascript" language="javascript" src="http://vnexpress.net/Service/Gold_Content.js"></script>
<style type="text/css">
	.box_exchange_gold {
		-moz-border-radius:0.5em 0.5em 0.5em 0.5em;
		margin-top:10px;
		font:12px arial;
		padding:5px;
		background:#F2EEE5;
		border:1px solid #E7E3DA;
	}
	.forex_content{
		width:118px;
	}
	.gold_content{
		margin-top:5px;
	}
	.gold_content .gold_table{
		height:58px;
		overflow-x:hidden;
		overflow-y:scroll;
		margin:5px 0;
		padding:0;
		width:100%;
	}
	.link_folder{
		color:#E0390D;
		font:bold 12px arial;
		text-decoration:none;
		margin-bottom:3px
	}
	.border_table{
		background:#FFF;
		border:1px solid #C3C3C3;
		border-collapse:collapse;
	}
	.border_table td{
		border:1px solid #C3C3C3;
		padding:2px;
		vertical-align:top;
	}
</style>

<div class="box_exchange_gold fl">
	<p class="link_folder"><?php echo lang('egw_gold')?></p>
	<table style="width:100%" class="border_table">
		<col/>
        <col/>
        <col/>
		<tr style="text-align:center; font-weight:bold;">
	    	<td></td>
	    	<td><?php echo lang('egw_buy')?></td>
	    	<td><?php echo lang('egw_sell')?></td>
	  	</tr>
		<tr>
	    	<td>SBJ</td>
	    	<td><script>document.write(vGoldSbjBuy);</script></td>
	    	<td><script>document.write(vGoldSbjSell);</script></td>
	  	</tr>
	  	<tr>
	    	<td>SJC</td>
	    	<td><script>document.write(vGoldSjcBuy);</script></td>
	    	<td><script>document.write(vGoldSjcSell);</script></td>
	  	</tr>
	</table>
	<p style="text-align: right; margin-top:5px;">
		<a href="http://www.sacombank.com.vn" rel="nofollow" target="_blank"><img  style="border:0px;vertical-align:middle" src="http://vnexpress.net/Images/logosb.gif" /></a>
	</p>
	
	<p class="link_folder" style="margin-top:10px"><?php echo lang('egw_exchange')?></p>
	<div class="gold_table">
	<table style="width:100%" class="border_table">
		<?php for($i = 0; $i < 8; $i++):?>
		<tr>
	    	<td><script>document.write(vForexs[<?= $i ?>]);</script></td>
	    	<td><script>document.write(vCosts[<?= $i ?>]);</script></td>
	  	</tr>
	  	<?php endfor;?>
	</table>
	<p style="text-align: right; margin-top:5px;">
		<a href="http://www.eximbank.com.vn" rel="nofollow" target="_blank"><img  style="border:0px;vertical-align:middle" src="http://vnexpress.net/Images/logo-EXIM.gif" /></a>
	</p>
	</div>
	
</div>