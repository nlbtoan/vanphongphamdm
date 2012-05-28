<?php
if ( ! function_exists('image_thumb')) {
	function image_thumb($image_path, $height, $width, $attb = '')
	{
		$image_path = substr_replace(str_replace('%20',' ',$image_path),'',0,1);

		// Get the CodeIgniter super object
		$CI =& get_instance();
		
		// Path to image thumbnail
		$pathinfo = pathinfo($image_path);
		
		$image_thumb = 'upload/image/thumb_img/' . $pathinfo['basename'] . '_thumb_' . $height . 'x' . $width . '.' . $pathinfo['extension'];

		if( ! file_exists($image_thumb))
		{
			// LOAD LIBRARY
			$CI->load->library('image_lib');
			
			// CONFIGURE IMAGE LIBRARY
			$config['image_library']	= 'gd2';
			
			$config['source_image']		= $image_path;
			$config['new_image']		= $image_thumb;
			$config['maintain_ratio']	= TRUE;
			$config['height']			= $height;
			$config['width']			= $width;
			$CI->image_lib->initialize($config);
			$CI->image_lib->resize();
			$CI->image_lib->clear();
		}
		
		return '<img src="' . base_url() . $image_thumb . '" ' . $attb . '" width="' . $width . '"/>';
	}
}

/* End of file image_helper.php */
/* Location: ./application/helpers/image_helper.php */