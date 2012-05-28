<?php

class MY_Exceptions extends CI_Exceptions
{
	public function show_404($page = '') {
		$heading = "Lỗi 404 : không tìm thấy trang";
		$message = "Không tìm thấy trang bạn yêu cầu";

		log_message('error', '404 Page Not Found --> '.$page);
		echo $this->show_error($heading, $message, 'error_404', 404);
		exit;
	}
	
	public function show_permission_error($template = 'error_permission', $status_code = 401) 
	{
		set_status_header($status_code);			
		
		if (ob_get_level() > $this->ob_level + 1) {
			ob_end_flush();	
		}
		ob_start();
		
		// Darm bao uu tien trong themes truoc
		if (!class_exists('Finder')) 
			require_once('Finder.php');
			
		$files = Finder::find_file($template, 'errors');		
		$template = array_shift($files);
	
		
				
		include($template);
				
		$buffer = ob_get_contents();
		ob_end_clean();
		
		return $buffer;
		
	}
	
	public function show_error($heading, $message, $template = 'error_general', $status_code = 500) {
		set_status_header($status_code);
		
		$message = '<p>'.implode('</p><p>', ( ! is_array($message)) ? array($message) : $message).'</p>';

		if (ob_get_level() > $this->ob_level + 1)
		{
			ob_end_flush();
		}
		ob_start();
		
		// Dam bao uu tien trong themes truoc
		if (!class_exists('Finder')) 
			require_once('Finder.php');
			
		$files = Finder::find_file($template, 'errors');	
		$template = array_shift($files);

				
		include($template);
				
		$buffer = ob_get_contents();
		ob_end_clean();
		return $buffer;
	}
}