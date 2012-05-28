<bcaster>
<?php foreach($data as $item) :?>
<item item_url="<?php echo base_url().$item['image']?>" link="<?php echo $item['link']?>" />
<?php endforeach;?>
</bcaster>