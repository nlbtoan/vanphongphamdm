<?php echo doctype(); ?>
<?php                   	           
	if ($term != '') {
		$paging['base_url'] = site_url("/admin/auth/manage/$current_group/term/$term");
	}else{
		$paging['base_url'] = site_url("/admin/auth/manage/$current_group/alpha/$current_alpha");	
	}                   	                           	
	
	$paging['total_rows'] = $count;
	$paging['cur_page'] = $current_page;
	$paging['uri_segment'] = 7;
	$paging['num_links'] = $this->config->item('num_links', 'admin'); 
	$paging['per_page'] = $this->config->item('per_page', 'admin'); 		
	
	$this->pagination->initialize($paging);										
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo lang('tieu_de') ?></title>
<?php $this->load->view('head') ?>

<?php load_css('assets/message/screen.css') ?>

<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.pagination/jquery.alphabet')?>"></script>
<script type="text/javascript">

function build_table(input) {	
	if (typeof input == 'undefined') return;
	var html = '';
	for (var i=0; i < input.length; i++) {
		data = input[i];
		if (i % 2 != 0) html += '<tr class="odd">';
		else html += '<tr>';
	    html += '<td><input type="checkbox"/></td>';
	    html += '<td>'+(i+1)+'</td>';
	    html += '<td>'+ data.id +'</td>';
	    html += '<td><a href="#" class="icon user pad_left">'+ data.last_name +  ' ' + data.first_name+'</a></td>';
	    html += '<td>'+ data.username +'</td>';
	    html += '<td>'+data.email+'</td>';
	    html += '<td>'+data.group_description+'</td>';
	    var cl = 'tick';
	    if (data.active == 0) cl = 'untick';
	    html += '<td><a href="#id/'+data.id+'/username/'+data.username+'" class="icon active '+cl+'"></a></td>';
	    html += '<td><a href="#id/'+data.id+'/username/'+data.username+'" class="icon delete"></a></td>';
	    html += '<td><a href="#" class="icon edit"></a></td>';
	    html += '</tr>';
	}
	return html;
}

$(document).ready(function(){	
	// functions
	var active_click = function(e) {
		e.preventDefault();
		var target = this;
		var data = $(this).assoc();		
		var post_data = {
			id : data.id,
			confirm : 'yes'
		};		
		
		// Defaul la kich hoat user
		var msg = 'Bạn chắc chắn muốn kích hoạt user "' + data.username + '" ?';
		var acl = 'tick';
		var rcl = 'untick';
		var url = site_url('admin/auth/activate/' + data.id);
		
		// Dang active --> nguoi dung muon vo hieu hoa
		if ($(target).hasClass('tick')) {			
			msg = 'Bạn chắc chắn muốn vô hiệu hóa user "' + data.username + '" ?';
			acl = 'untick';
			rcl = 'tick';
			url = site_url('admin/auth/deactivate/' + data.id);
		}
							
		var answer = confirm(msg);		
		if (answer){						
			$.ajax({
				url : url,
				dataType : 'json',
				type : 'post',
				data : post_data,
				success : function(data) {	
					if (isset(data.message) == true) {						
						$('#message').show_message(data.message);
					}											
					if (data.status == true) $(target).removeClass(rcl).addClass(acl);				
				}// success
			});
		} // anwer	
	}; // active_click

	var delete_click = function(e) {		
		e.preventDefault();
		var data = $(this).assoc();
		
		var answer = confirm('Bạn chắc chắn muốn xóa user "'+data.username+'"');
		if (answer) {
			var target = this;
			
			var post_data = {
				id : data.id,
				confirm : 'yes'};
					
			$.ajax({
				url : site_url('admin/auth/delete_user/' + data.id),
				dataType : 'json',
				type : 'post',
				data: post_data,
				success : function(data) {
					if (isset(data.message)) {
						$('#message').show_message(data.message);
					}
					
					if (data.status == true) {
						// Kiem tra la rong hay khong						
						// Cap nhat lai table		
						var on_success = function(data){						
							$('#listing tbody').html(build_table(data.users));
							// truong hop xoa het tren 1 page
							if (data.users.length == 0 && obj_paging.cur_page > 0) {															
								$.getJSON(obj_paging.base_url + obj_paging.prev_page, on_success);
							}
							$('.delete').click(delete_click); 
							$('.active').click(active_click);
							// cap nhap link cua paging : alphabet = all, group = selected
							
							obj_paging.total_rows = data.count;								
							obj_paging.create_links();	      	
						};
						// request khoi mao																		
						$.getJSON(site_url(uri.uri_string), on_success);
					} 	
				}
			});
		} // answer				
	};
	
	//var temp = $('#listing tbody').chain('template');
	//var_dump(temp[0]);
	// pagination	
	var obj_paging = $('#paging').pagination({
		base_url: '<?php echo $paging['base_url'] ?>',
		uri_segment : <?php echo $paging['uri_segment'] ?>,
		total_rows: <?php echo $paging['total_rows'] ?>,
		num_links: <?php echo $paging['num_links'] ?>,
		per_page: <?php echo $paging['per_page'] ?>, 
		click : function(e) {								
			$.getJSON(this.href, function(data) {																															
				$('#listing tbody').html(build_table(data.users));  
				
				obj_paging.total_rows = data.count;
				obj_paging.create_links();
				
				$('.delete').click(delete_click); 
				$('.active').click(active_click);
			});
		}
	});
	
	// alphabet
	var obj_alphabet = $('#alphabet').alphabet({
		click : function() {
			var obj = this;
			$.getJSON(this.href, function(data){				
				$('#listing tbody').html(build_table(data.users));		

				$('.delete').click(delete_click); 
				$('.active').click(active_click);
						
				obj_paging.total_rows = data.count;					
				obj_paging.base_url = obj.href;										
				// alert(obj_paging.total_rows);													
				obj_paging.create_links();		
			});
			$('#term').val('');				
		}
	});
	
	// events
	// doi group --> doi alphabet -> doi paging
	// doi alphabet -> doi paging
	
	$('#select_group').change(function() {
		var url = $(this).val();
		
		$.getJSON(url, function(data){						
			$('#listing tbody').html(build_table(data.users)); 

			$('.delete').click(delete_click); 
			$('.active').click(active_click);
			
			// cap nhap link cua paging : alphabet = all, group = selected
			obj_paging.total_rows = data.count;	
			obj_paging.base_url = url + '/alpha/all';		
			obj_paging.create_links();	      	
		});
		
		$('#term').val('');
		// cap nhat link cua alphabet va tro ve all
		obj_alphabet.base_url = url;
		obj_alphabet.update();			
	});	
	
	$('#search').submit(function(e) {
		e.preventDefault();		
		var url = $('#select_group').val(); // --> admin/auth/manage/$group
						
		var term = $.trim($('#term').val());
		
		term = remove_accents(term).replace(/ /g, '+');

		
		$.getJSON(url + '/term/' + term, function(data){						
			$('#listing tbody').html(build_table(data.users)); 

			$('.delete').click(delete_click); 
			$('.active').click(active_click);
			
			// cap nhap link cua paging : alphabet = all, group = selected
			obj_paging.total_rows = data.count;	
			obj_paging.base_url = url + '/term/' + term;;			
			obj_paging.create_links();	 

			obj_alphabet.base_url = url;
			obj_alphabet.update();	
		});	
	});
	
	$('a.active').click(active_click); // active

	$('a.delete').click(delete_click);	// delete
});
</script>

</head>
<body>		
    <div id="container">    	   
        <!-- ########################## HEADER ########################## -->
		<div id="header">
       	<?php $this->load->view('header') ?>                
        </div>          
		<!-- ########################## END HEADER ###################### -->
        
       <!-- ########################## LEFT ########################## -->
        <div id="left" class="panel">        	            
			<?php $this->load->view('leftsiderbar') ?>                                                    
        </div>        
        <!-- ########################## END LEFT ###################### -->
        
        <!-- ########################## WRAPPER ########################## -->
        <div id="wrapper" class="panel">        	
            <div class="panel_top"><div></div></div>            
            <div class="panel_left">
                <div class="panel_right">                    	
                    <!-- ########################## ICON & BREADCRUMB ########################## --> 
	               
				    <p class="float_l"><img src="<?php echo theme_url('styles/default/images/icons/user.gif') ?>" /></p>					
				    <p>
				        <span class="large">Quản lý thành viên</span><br />
				        <span class="quiet">Quản trị website / Quản lý thành viên</span>
				    </p>
				    <div class="clear"></div>
				    				    	
				   <div id="message">
				   <?php echo $message ?>
				   </div> 		    
				  
					<div class="select float_l" style="margin-top: 5px" >	
						<form action="#" method="get">											
						<b>Nhóm thành viên:</b>
				        <select id="select_group" name="select_group">
				        	<option value="<?php echo site_url('admin/auth/manage/all') ?>" <?php echo ($current_group == 'all') ? 'selected="selected"' : ''?>>Tất cả</option>
				        	<?php foreach ($groups as $group): ?>				            
				            <option value="<?php echo site_url('admin/auth/manage/' . $group['name']) ?>" <?php echo ($current_group == $group['name']) ? 'selected="selected"' : ''?>><?php echo $group['description'] ?></option>
				            <?php endforeach; ?>
				        </select> 				       
				        </form>
				    </div>		
				    <div class="float_r">
					   	<form action="http://localhost/volano/admin/auth/search" method="get" id="search">					   
					   	<b> Tìm thành viên</b> : <input type="text" name="term" value="<?php echo $term ?>" id="term" />
					   	<input type="submit" value="Tìm" id="button_search"/> 
					   	</form>
				   </div>
				    <div class="clear"></div>		
				    <div id="alphabet" class="alphabet" style="margin-top: 10px"><b>Tên đăng nhập bắt đầu :</b> 
				    	<a <?php echo ($current_alpha == 'all') ? 'class="selected"' : ''?> href="<?php echo site_url("/admin/auth/manage/all/alpha/all") ?>" id="alphabet_all">Tất cả</a> 
				    	<?php foreach(range('a', 'z') as $letter): ?>
						<a href="<?php echo site_url("/admin/auth/manage/all/alpha/$letter") ?>" id="alphabet_<?php echo $letter ?>" <?php echo ($current_alpha == $letter) ? 'class="selected"' : ''?>><?php echo strtoupper($letter) ?></a>
						<?php endforeach;?>
				    </div>
                    <!-- ########################## /ICON & BREADCRUMB ########################## -->
                  
                    <!-- ########################## CONTENT ########################## -->                   
                   <table class="listing" id="listing">
				        <col width="20"/>
				        <col width="20"/>
				        <col width="30"/>
				        <col/>
				        <col/>		
				        <col/>		
				        <col/>        
				        <col width="25"/>
				        <colgroup>
				            <col width="25"/>
				            <col width="25"/>
				        </colgroup>  
				       	<thead>      
				        <tr>
				            <th>&nbsp;</th>
				            <th><a href="">#</a></th>
				            <th><a href="">ID</a></th>
				            <th><a href="">Họ và Tên</a></th>
				            <th><a href="">Tên đăng nhập</a></th>				            
				            <th><a href="">Email</a></th>	
				            <th><a href="">Nhóm</a></th>			            
				            <th><a href="">Mở</a></th>
				            <th colspan="2"><a href="">Quản lý</a></th>
				        </tr> 
				        </thead>				      				       
				        <tbody>				        
				         <?php for ($i=0; $i < count($users); $i++):?>				        				       
				        <tr class="<?php echo ($i % 2 !=0) ? ' odd' : '' ?>" >
				            <td><input type="checkbox"/></td>
				            <td><?php echo ($i + 1) ?></td>
				            <td><?php echo $users[$i]['id']?></td>
				            <td><a href="<?php echo site_url('admin/auth/profile/' . $users[$i]['id']); ?>" class="icon user pad_left"><?php echo $users[$i]['last_name'] . ' ' . $users[$i]['first_name']; ?> </a></td>
				            <td><a href="<?php echo site_url('admin/auth/profile/' . $users[$i]['id']); ?>"><?php echo $users[$i]['username'] ?></a></td>
				            <td><?php echo $users[$i]['email'] ?></td>
				            <td><?php echo $users[$i]['group_description'] ?></td>
				            <td>							            		          
					        	<a href="<?php echo '#id/' . $users[$i]['id'] . '/username/' . $users[$i]['username'] ?>" class="icon active <?php echo ($users[$i]['active'] == 1) ? 'tick' : 'untick' ?>" ></a>					        	
				            </td>
				            <td>
				                <a href="<?php echo '#id/' . $users[$i]['id'] . '/username/' . $users[$i]['username'] ?>" class="icon delete"></a>
				            </td>
				            <td>
				                <a href="<?php echo site_url('admin/auth/profile/' . $users[$i]['id']); ?>" class="icon edit"></a>
				            </td>
				        </tr>   
				        <?php endfor; ?>
				        </tbody>      
				    </table>
                    
                   	<div class="float_r paging" style="margin-bottom: 15px;" id="paging">
				    <?php echo $this->pagination->create_links(); ?>
				    </div>
				    <div class="clear"></div>
					<!-- ########################## END CONTENT ########################## -->  				  	    				   				    				                                                                                                                                                                            
                </div>
            </div>
            <div class="panel_bottom"><div></div></div>
        </div><!--/wrapper-->
        <!-- ########################## END WRAPPER ###################### -->
        <div class="clear"></div>        
    </div><!--/containner-->
</body>
</html>