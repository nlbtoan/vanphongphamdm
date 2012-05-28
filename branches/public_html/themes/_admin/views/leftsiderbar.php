<script>
$(document).ready(function()
{	
	var ocl = $.cookie("open_close");
	
	if(ocl != "" && typeof ocl != 'object')
	{
		ocl = ocl.split(',');

		length = ocl.length;
		for(var i = 0; i < length; i ++)
		{
			if( $('h5').eq(ocl[i]).hasClass('open') == false )
			{
				$('h5').eq(ocl[i]).removeClass('close');
				$('h5').eq(ocl[i]).addClass('open');

				$('h5').eq(ocl[i]).children('span').removeClass('close_img');
				$('h5').eq(ocl[i]).children('span').addClass('open_img');

				$(this).css('border-bottom','1px solid #F0F0F0');
			}
		}
	}
	
	var open = function(index, obj)
	{
		var ocl = $.cookie("open_close");
		
		if(ocl != "" && typeof ocl != "object") ocl = ocl.split(',');
		else ocl = new Array();
		ocl.push(index);
		ocl = ocl.join(",");
		$.cookie("open_close", ocl, { path: '/'});
		
		$(obj).removeClass('open');
		$(obj).addClass('close');

		$(obj).children('span').removeClass('close_img');
		$(obj).children('span').addClass('open_img');

		$(obj).css('border-bottom','1px solid #F0F0F0');

		$(obj).next().animate({
			'height' : 'show',
			'opacity' : 'show'
		}, 300);

		$(obj).unbind('click');
		$(obj).click( function(){close(index, this)} );
	};
	
	var close = function(index, obj)
	{	
		var ocl = $.cookie("open_close");
		ocl = ocl.split(',');
		
		if(ocl.length > 0)
		{
			ocl = jQuery.grep(ocl, function(value) {
				return value != index;
			});
			
			ocl = ocl.join(",");
			$.cookie("open_close", ocl, { path: '/'});
		}
		
		$(obj).removeClass('close');
		$(obj).addClass('open');

		$(obj).children('span').removeClass('open_img');
		$(obj).children('span').addClass('close_img');
		
		$(obj).css('border-bottom','0');

		$(obj).next().animate({
			'height' : 'hide',
			'opacity' : 'hide'
		}, 300);

		$(obj).unbind('click');
		$(obj).click( function(){open(index, this)} );
	};
	
	$('h5').each(function(index) 
	{	
		if( $(this).hasClass('open') )
		{
			$(this).next().show();
			$(this).css('border-bottom','1px solid #F0F0F0');
			
			$(this).click( function(){close(index, this)} );
		}
		else if( $(this).hasClass('close') )
		{
			$(this).next().hide();
			$(this).css('border-bottom', '');
			
			$(this).click( function(){open(index, this)} )
		}
	});
	
});
</script>

<div class="panel_top"><div></div></div>            
<div class="panel_left">
	<div class="panel_right">
		<div class="panel">
    		<div class="panel_content">
			    <div class="panel_top"><div></div></div>
			    <div class="panel_left">
			        <div class="panel_right">
			        	<h5 class="title close"><?php echo lang('layout_menu_title')?><span class="close_img"></span></h5>
			            <ul class="vmenu">
			                <li class="manage">
			                	<img src="<?php echo theme_url('styles/default/images/icons/manage.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/menu', lang('layout_menu_manage_menu'))?>
			                </li>
			                <li class="setting">
			                	<img src="<?php echo theme_url('styles/default/images/icons/insert_row.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/menu/create_menu', lang('layout_menu_insert_menu'))?>
			                </li>                
			            </ul>
			        </div><!--bg_centerleftt-->
			    </div><!--bg_centerright-->
			    <div class="panel_bottom"><div></div></div>
		    </div>
		    
			<!-- Page -->
		   	<div class="panel_content">
			    <div class="panel_top"><div></div></div>
			    <div class="panel_left">
			        <div class="panel_right">
			        	<h5 class="title close"><?php echo lang('layout_page_title')?><span class="close_img"></span></h5>
			            <ul class="vmenu">
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/manage.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/page', lang('layout_page_manage_page'))?>
			                </li>
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/insert_row.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/page/create', lang('layout_page_manage_page'))?>
			                </li>
			            </ul>
			        </div><!--bg_centerleftt-->
			    </div><!--bg_centerright-->
			    <div class="panel_bottom"><div></div></div>
		    </div>

			<!-- Tour -->
		    <div class="panel_content">
			    <div class="panel_top"><div></div></div>
			    <div class="panel_left">
			        <div class="panel_right">
			        	<h5 class="title close"><?php echo lang('layout_tour_title')?><span class="close_img"></span></h5>
			            <ul class="vmenu">
			            	<li>
			            		<img src="<?php echo theme_url('styles/default/images/icons/setting.png')?>" class="left_img"/>
			            		<?php echo anchor('admin/setting/tour', lang('layout_tour_setting_tour'))?>
			            	</li>
			            	<li>
			            	<img src="<?php echo theme_url('styles/default/images/icons/book.png')?>" class="left_img"/>
			            		<?php echo anchor('admin/tour/manage_book_seft', lang('layout_tour_manage_book_seft'))?>
			            	</li>
			            	<li>
			            		<img src="<?php echo theme_url('styles/default/images/icons/book.png')?>" class="left_img"/>
			            		<?php echo anchor('admin/tour/manage_book', lang('layout_tour_manage_book'))?>
			            	</li>
			            	<li>
			            		<img src="<?php echo theme_url('styles/default/images/icons/manage.png')?>" class="left_img"/>
			            		<?php echo anchor('admin/tour/manage_cat', lang('layout_tour_manage_tour'))?>
			            	</li>
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/insert_row.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/tour/create', lang('layout_tour_create_tour'))?>
			                </li>
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/manage.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/tour/manage_region', lang('layout_tour_manage_region'))?>
			                </li>
		            		<li>
		            			<img src="<?php echo theme_url('styles/default/images/icons/insert_row.png')?>" class="left_img"/>
		            			<?php echo anchor('admin/tour/create_region', lang('layout_tour_create_region'))?>
		            		</li>
			            </ul>
			        </div><!--bg_centerleftt-->
			    </div><!--bg_centerright-->
			    <div class="panel_bottom"><div></div></div>
			 </div>
			
			 <!-- Hotel -->	    
		    <div class="panel_content">
			    <div class="panel_top"><div></div></div>
			    <div class="panel_left">
			        <div class="panel_right">
			        	<h5 class="title close"><?php echo lang('layout_hotel_title')?><span class="close_img"></span></h5>
			            <ul class="vmenu">
			            	<li>
			            		<img src="<?php echo theme_url('styles/default/images/icons/book.png')?>" class="left_img"/>
			            		<?php echo anchor('admin/hotel/manage_book', lang('layout_hotel_manage_book'))?>
			            	</li>
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/manage.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/hotel/manage', lang('layout_hotel_manage_hotel'))?>
			                </li>
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/insert_row.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/hotel/create', lang('layout_hotel_create_hotel'))?>
			                </li>
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/manage.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/hotel/manage_cat_room', lang('layout_hotel_manage_cat_room'))?>
			                </li>
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/insert_row.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/hotel/create_cat_room', lang('layout_hotel_create_cat_room'))?>
			                </li>
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/manage.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/hotel/manage_room', lang('layout_hotel_manage_room'))?>
			                </li>
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/insert_row.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/hotel/create_room', lang('layout_hotel_create_room'))?>
			                </li>
			            </ul>
			        </div><!--bg_centerleftt-->
			    </div><!--bg_centerright-->
			    <div class="panel_bottom"><div></div></div>
			</div>
			
			<!-- Support -->
		    <div class="panel_content">
			    <div class="panel_top"><div></div></div>
			    <div class="panel_left">
			        <div class="panel_right">
			        	<h5 class="title close"><?php echo lang('layout_support_title')?><span class="close_img"></span></h5>
			            <ul class="vmenu">
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/manage.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/consult/manage_faq', lang('layout_support_manage_faq'))?>
			                </li>
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/manage.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/consult/manage_feedback', lang('layout_support_manage_question'))?>
			                </li>
			            </ul>
			        </div><!--bg_centerleftt-->
			    </div><!--bg_centerright-->
			    <div class="panel_bottom"><div></div></div>
			</div>
		    
			<!-- News -->
		    <div class="panel_content">
			    <div class="panel_top"><div></div></div>
			    <div class="panel_left">
			        <div class="panel_right">
			        	<h5 class="title close"><?php echo lang('layout_news_title')?><span class="close_img"></span></h5>
			            <ul class="vmenu">
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/manage.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/news/category', lang('layout_news_manage_category'))?>
			                </li>
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/insert_row.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/news/create_category', lang('layout_insert_category'))?>
			                </li>
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/insert_row.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/news/create_news', lang('layout_insert_news'))?>
			                </li>                
			            </ul>
			        </div><!--bg_centerleftt-->
			    </div><!--bg_centerright-->
			    <div class="panel_bottom"><div></div></div>
			</div>
		    
		    <!-- flight -->
		    <div class="panel_content">
			    <div class="panel_top"><div></div></div>
			    <div class="panel_left">
			        <div class="panel_right">
			        	<h5 class="title close"><?php echo lang('layout_flight_title')?><span class="close_img"></span></h5>
			            <ul class="vmenu">
			            	<li>
			            		<img src="<?php echo theme_url('styles/default/images/icons/book.png')?>" class="left_img"/>
			            		<?php echo anchor('admin/flight/manage_book', lang('layout_flight_manage_book'))?>
			            	</li>
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/manage.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/flight/manage', lang('layout_flight_manage'))?>
			                </li>
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/insert_row.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/flight/create', lang('layout_flight_create'))?>
			                </li>
			            </ul>
			        </div><!--bg_centerleftt-->
			    </div><!--bg_centerright-->
			    <div class="panel_bottom"><div></div></div>
			</div>
		    
		    <!-- vehicle -->
		    <div class="panel_content">
			    <div class="panel_top"><div></div></div>
			    <div class="panel_left">
			        <div class="panel_right">
			        	<h5 class="title close"><?php echo lang('layout_vehicle_title')?><span class="close_img"></span></h5>
			            <ul class="vmenu">
			            	<li>
			            		<img src="<?php echo theme_url('styles/default/images/icons/book.png')?>" class="left_img"/>
			            		<?php echo anchor('admin/vehicle/manage_book', lang('layout_vehicle_manage_book'))?>
			            	</li>
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/manage.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/vehicle/manage', lang('layout_vehicle_manage'))?>
			                </li>
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/insert_row.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/vehicle/create', lang('layout_vehicle_create'))?>
			                </li>
			            </ul>
			        </div><!--bg_centerleftt-->
			    </div><!--bg_centerright-->
			    <div class="panel_bottom"><div></div></div>
			</div>
			
			<!-- advert -->
		    <div class="panel_content">
			    <div class="panel_top"><div></div></div>
			    <div class="panel_left">
			        <div class="panel_right">
			        	<h5 class="title close"><?php echo lang('layout_advert_title')?><span class="close_img"></span></h5>
			            <ul class="vmenu">
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/manage.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/advert/manage', lang('layout_advert_manage'))?>
			                </li>
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/insert_row.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/advert/create', lang('layout_advert_create_cat'))?>
			                </li>
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/insert_row.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/advert/create_advert', lang('layout_advert_create'))?>
			                </li>
			            </ul>
			        </div><!--bg_centerleftt-->
			    </div><!--bg_centerright-->
			    <div class="panel_bottom"><div></div></div>
			</div>
		    
		    <!-- nickchat -->
		    <div class="panel_content">
			    <div class="panel_top"><div></div></div>
			    <div class="panel_left">
			        <div class="panel_right">
			        	<h5 class="title close"><?php echo lang('layout_nickchat_title')?><span class="close_img"></span></h5>
			            <ul class="vmenu">
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/manage.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/nickchat/manage', lang('layout_nickchat_manage'))?>
			                </li>
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/insert_row.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/nickchat/create', lang('layout_nickchat_create'))?>
			                </li>
			            </ul>
			        </div><!--bg_centerleftt-->
			    </div><!--bg_centerright-->
			    <div class="panel_bottom"><div></div></div>
			</div>
		    		    
			<!-- Account -->
		    <div class="panel_content">
			    <div class="panel_top"><div></div></div>
			    <div class="panel_left">
			        <div class="panel_right">
			        	<h5 class="title close"><?php echo lang('layout_account_title')?><span class="close_img"></span></h5>
			            <ul class="vmenu">
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/manage.png')?>" class="left_img"/>
			                	<?php echo anchor('admin/auth/manage', lang('layout_account_manage_user'))?>
			                </li>                
			            </ul>
			        </div><!--bg_centerleftt-->
			    </div><!--bg_centerright-->
			    <div class="panel_bottom"><div></div></div>
			</div>
			
			<!-- Statistic -->
		    <div class="panel_content">
			    <div class="panel_top"><div></div></div>
			    <div class="panel_left">
			        <div class="panel_right">
			        	<h5 class="title close"><?php echo lang('layout_statistic_title')?><span class="close_img"></span></h5>
			            <ul class="vmenu">
			                <li>
			                	<img src="<?php echo theme_url('styles/default/images/icons/icon-statistics.png')?>" class="left_img"/>
			                	<?php echo anchor('https://www.google.com/accounts/ServiceLogin?service=analytics&passive=true&nui=1&continue=https://www.google.com/analytics/settings/&followup=https://www.google.com/analytics/settings/', lang('layout_statistic_manage'), 'target="_blank"')?>
			                </li>                
			            </ul>
			        </div><!--bg_centerleftt-->
			    </div><!--bg_centerright-->
			    <div class="panel_bottom"><div></div></div>
			</div>
		</div>
		</div>
	</div>
<div class="panel_bottom"><div></div></div>
<p style="margin-top:10px;"><?php echo lang('copyright') ?></p>