<?php

if ( ! function_exists('redirect')){
	function redirect($uri = '', $method = 'location', $http_response_code = 302) {			
		if ( ! preg_match('#^https?://#i', $uri)) {
			$uri = site_url($uri);
		}
		
		// ajax request
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
		&& ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {			
			echo json_encode(array('_redirect' => $uri));
			exit;
		}
		
		switch($method) {
			case 'refresh'	: header("Refresh:0;url=".$uri);
				break;
			default			: header("Location: ".$uri, TRUE, $http_response_code);
				break;
		}
		
		exit;
	}
}

if (!function_exists('message')) {
	function message($message, $type = 'info') {
		if (trim($message) == '') return '';
		$html = '<div class="'.$type.'">';
		$html .= '<ul>'. $message . '</ul>';
		$html.= '</div>';
		return $html;
	}
}

if (!function_exists('show_permission_error')) {
	function show_permission_error() {
		$error =& load_class('Exceptions');
		echo $error->show_permission_error();
		exit;
	}
}

if ( ! function_exists('permalink')) {
	function permalink($url) {				
		$url = strtolower(remove_accents($url));		
		$search = array(" ",":","?",",","%", "--");
		$replace = array("-","","","","-phan-tram", "-");				
		return str_replace($search,$replace,$url);
	}
}

if ( ! function_exists('remove_accents')) {	
	function remove_accents($string){
	   $marTViet=array('à','á','ạ','ả','ã','â','ầ','ấ','ậ','ẩ','ẫ','ă',
	    'ằ','ắ','ặ','ẳ','ẵ','è','é','ẹ','ẻ','ẽ','ê','ề'
	    ,'ế','ệ','ể','ễ',
	    'ì','í','ị','ỉ','ĩ',
	    'ò','ó','ọ','ỏ','õ','ô','ồ','ố','ộ','ổ','ỗ','ơ'
	    ,'ờ','ớ','ợ','ở','ỡ',
	    'ù','ú','ụ','ủ','ũ','ư','ừ','ứ','ự','ử','ữ',
	    'ỳ','ý','ỵ','ỷ','ỹ',
	    'đ',
	    'À','Á','Ạ','Ả','Ã','Â','Ầ','Ấ','Ậ','Ẩ','Ẫ','Ă'
	    ,'Ằ','Ắ','Ặ','Ẳ','Ẵ',
	    'È','É','Ẹ','Ẻ','Ẽ','Ê','Ề','Ế','Ệ','Ể','Ễ',
	    'Ì','Í','Ị','Ỉ','Ĩ',
	    'Ò','Ó','Ọ','Ỏ','Õ','Ô','Ồ','Ố','Ộ','Ổ','Ỗ','Ơ'
	    ,'Ờ','Ớ','Ợ','Ở','Ỡ',
	    'Ù','Ú','Ụ','Ủ','Ũ','Ư','Ừ','Ứ','Ự','Ử','Ữ',
	    'Ỳ','Ý','Ỵ','Ỷ','Ỹ',
	    'Đ');
	    
	    $marKoDau=array('a','a','a','a','a','a','a','a','a','a','a'
	    ,'a','a','a','a','a','a',
	    'e','e','e','e','e','e','e','e','e','e','e',
	    'i','i','i','i','i',
	    'o','o','o','o','o','o','o','o','o','o','o','o'
	    ,'o','o','o','o','o',
	    'u','u','u','u','u','u','u','u','u','u','u',
	    'y','y','y','y','y',
	    'd',
	    'A','A','A','A','A','A','A','A','A','A','A','A'
	    ,'A','A','A','A','A',
	    'E','E','E','E','E','E','E','E','E','E','E',
	    'I','I','I','I','I',
	    'O','O','O','O','O','O','O','O','O','O','O','O'
	    ,'O','O','O','O','O',
	    'U','U','U','U','U','U','U','U','U','U','U',
	    'Y','Y','Y','Y','Y',
	    'D');
	    $s = str_replace($marTViet,$marKoDau,trim($string));
	    return $s;
	}
}