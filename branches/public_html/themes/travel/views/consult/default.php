<div class="title_page">								
	<div class="title"><?php echo $title?></div>
</div>

<ul style="list-style:decimal; margin-left:25px; font-weight: bold;">
	<?php foreach( $data as $item ):?>
	<li style="padding:10px 0;">
		<h4><?php echo $item['question']?></h4>
		<p style=" font-weight: normal"><?php echo $item['answer']?></p>
	</li>
	<?php endforeach;?>
</ul>