<p><a href="<?php echo site_url() ?>" target="_blank"><?php echo lang('layout_view_website') ?></a> | 
<a href="<?php echo site_url('admin/auth/profile') ?>"><?php echo lang('layout_account') ?></a> | 
<a href="<?php echo site_url('admin/auth/logout') ?>"><?php echo lang('layout_logout') ?></a></p>
<h3><?php echo lang('layout_hello') ?> <?php echo ucfirst($this->user->username) ?> !</h3>
<div class="header_menu">
    <div class="hor_menu">
        <div class="left_hor"></div>
        <div class="center_hor"><a href="<?php echo site_url('admin');?>"><?php echo lang('layout_manage_website') ?></a></div>
        <div class="right_hor"></div>
    </div><!--hor_menu-->
    
    <div class="hor_menu">
        <div class="left_hor"></div>
        <div class="center_hor"><?php echo anchor('admin/setting', lang('layout_config_website')) ?></div>
        <div class="right_hor"></div>
    </div><!--hor_menu-->    
    <div class="clear"></div>        
</div>
