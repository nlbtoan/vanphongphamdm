<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo lang('tieu_de') ?></title>

<?php load_css('assets/buttons/screen.css') ?>

<style type="text/css">
#container{ margin: 100px auto; width: 400px; }
body{ color: #999999; font-family: Arial,Helvetica,sans-serif; font-size: 12px; }
.border{ border: 1px solid #e9e9e9; float: left; padding: 10px; }
.header{ font-size:15px; font-weight:bold; }
.clear{ clear: both; }
ul {padding: 0px; margin-left: 15px;}
ul li { color: red; font-weight: bold; line-height: 150%}
</style>
</head>
<body>	
<?php 

$username = array(
	'name' => 'username',
	'id' => 'username',
	'type' => 'text',
	'size' => 30,
	'value'   => $this->form_validation->set_value('username'),
);

$password = array(
	'name' => 'password',
	'id' => 'password',
	'type' => 'password',
	'size' => 30,
);
?>                                           
<div id="container">  
    <div class="header">ĐĂNG NHẬP</div>
    <div class="border">
        <?php echo form_open("admin/auth/login");?>
        <table>
            <tr>
                <th align="right"><label for="email">Tên đăng nhập:</label></th>
                <td><?php echo form_input($username);?></td>
            </tr>
            <tr>
                <th align="right"><label for="password">Mật khẩu:</label></th>
                <td><?php echo form_input($password);?></td>
            </tr>
            <tr>
                <th colspan="2" align="center" style="padding-left: 100px">                            	  
	                <button type="submit" class="button" style="margin: 7px 0px 0px 0px;">
					    <img src="<?php echo theme_url('assets/buttons/icons/tick.png') ?>" alt="Save"/> Đăng nhập
					</button>					
                </th>                
            </tr>            
        </table>
        
      	<?php if ($continue != false):?>
        <input type="hidden" name="continue" value="<?php echo $continue ?>" />
      	<?php endif; ?>
      	
        <?php echo form_close();?>
    </div>
    <div class="clear"></div>
    <ul>
    <?php echo $message;?>
    </ul>
</div>    
</body>
</html>