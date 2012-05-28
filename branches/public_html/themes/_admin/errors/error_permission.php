<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thong bao - Khong du quyen truy cap</title>
<style type="text/css">

body {
background-color:	#fff;
margin:				40px;
font-family:		Lucida Grande, Verdana, Sans-serif;
font-size:			12px;
color:				#000;
}

#content  {
border:				#999 1px solid;
background-color:	#fff;
padding:			20px 20px 12px 20px;
}

h1 {
font-weight:		normal;
font-size:			14px;
color:				#990000;
margin: 			0 0 4px 0;
}
ul li {
line-height: 150%;
}
</style>
</head>
<body>
	<?php 
		$ci = &get_instance();
		$profile = $ci->auth->profile();		
	?>
	<div id="content">
		<h1>Xin lỗi  ! Bạn không đủ quyền truy cập trang này !</h1>
		<p>Xin liên hệ ban quản trị website để biết thêm thông tin quyền hạn của bạn.</p>		
		<p>Bạn đang đăng nhập với tài khoản <b><?php echo $profile->username ?></b>. Bạn có thể <a href="<?php echo site_url('/admin/auth/logout') ?>">nhấn đây</a> để đăng xuất và đăng nhập với tài khoản khác.</p>						
			
	</div>
</body>
</html>