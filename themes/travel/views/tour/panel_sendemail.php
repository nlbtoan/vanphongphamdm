Bạn nhận được mail từ: <b><?php echo $email_name;?></b> [<?php echo $email_from;?>] gửi cho bạn tour du lịch:<br/><br/>
Tiêu đề tour: <a href="<?php echo $link?>" target="_blank"><?php echo $title?></a> &lt;-- Nhấn vào đây để biết nội dung chi tiết<br/>
hay <a href="<?php echo $link?>" target="_blank"><?php echo $link?></a><br/><br/>
Với lời nhắn: <?php echo $email_content;?><br/>
<hr/>
Email này được gửi bằng tiện ích "Gửi cho bạn bè" của <a href="<?php echo site_url();?>" target="_blank"><?php echo $this->setting->item('namesite');?></a>