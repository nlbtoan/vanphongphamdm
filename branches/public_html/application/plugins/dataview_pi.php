<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function create_dataview($data, $map) {
ob_start();
?>
<table>	
	<tr>
	<?php 	
	foreach ($map as $field => $props):
		$title = $field;
		if (is_array($props)) {
			$attr = '';
			foreach ($props as $key => $val) {
				if ($key == 'title') {
					$$key = $val;
				} else if ($key != 'data') { 
					$attr .= ' ' . $key . '="' . $val . '"';
				} 				 			
			}			
		}			
	?>
		<th<?php echo $attr ?> ><?php echo $title ?></th>
	<?php endforeach;?>
	</tr>
	<?php foreach ($data as $row):?>
	<tr>
		<?php 
		foreach ($map as $field => $props):
			$value = $row[$field];
			if (isset($props['data'])){
				$value = str_replace('$value', $value, $props['data']);
			}
		?>			
		<td><?php echo $value ?></td>				
		<?php endforeach;?>
	</tr>	
	<?php endforeach;?>
</table>
<?php
$r = ob_get_contents();
ob_end_clean();
return $r;
}