<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Pagination extends CI_Pagination
{	
	private $CI;
	private $param = '';
	
	public function __construct()
	{
		parent:: __construct();
		$this->CI =& get_instance();
	}

	// Lay biet per_page de phan trang, per_page luu vo SESSION
	public function set_per_page( $per_page )
	{
		if( ctype_digit($per_page) )
		{
			$this->CI->session->set_userdata('per_page', $per_page);
		}
	}
	
	//Lay biet per_page neu session khong co se lay trong file config/admin
	public function get_per_page()
	{
		if( $this->CI->session->userdata('per_page') )
		{
			return $this->CI->session->userdata('per_page');
		}
		else
		{
			return $this->CI->config->config['admin']['per_page'];
		}
	}
	
	//public lay bien config trong file config/admin
	public function get_config( $item )
	{
		if( empty($this->CI->config->config['admin'][$item]) )
		{
			return '';
		}
		else
		{
			return $this->CI->config->config['admin'][$item];
		}
	}

	public function list_option($min_row = 5, $max_row = 30, $increate_row = 5)
	{
		$output = '<select id="select_per_page" name="select_per_page">';
		for( $min_row = 5; $min_row <= $max_row; $min_row = $min_row + $increate_row )
		{
			if($this->per_page == $min_row)
			{
				$output .= '<option value=' . $min_row . ' selected="selected" >' . $min_row . '</option>';
			}
			else
			{
				$output .= '<option value=' . $min_row . '>' . $min_row . '</option>';
			}
		}
		$output .= '</select> ';

		return $output;
	}

	public function create_result()
	{
		//Neu khong co data return
		if(empty($this->total_rows))
		{
			return;
		}
		
		$this->CI->lang->load('pagination');

		$output = '';

		(lang('display') == FALSE) ?  $output = 'Hiển thị # ' : $output = lang('display') . ' # ';
		$output .= $this->list_option();

		$min_row = $this->CI->uri->segment($this->uri_segment) + 1;

		$max_row = $this->CI->uri->segment($this->uri_segment) +  $this->per_page;
		if($max_row > $this->total_rows)
		{
			$max_row = $this->total_rows;
		}

		if(lang('result') == FALSE)
		{
			$output .= lang('result') . $min_row . ' - ' . $max_row . ' của ' . $this->total_rows ;
		}
		else
		{
			$output .= sprintf(lang('result'), $min_row, $max_row, $this->total_rows );
		}

		return $output;
	}
	
/**
	 * Generate the pagination links
	 *
	 * @access	public
	 * @return	string
	 */
	
	function create_links() 
	{		
		// param (useful fo searching)
		 		
		if (is_array($this->param)) 
		{
			$param = '';		
			foreach ($this->param as $k => $v) 
				if ($param == '') $param = "?$k=$v";
				else $param .= "&$k=$v";			
		}else $param = $this->param;
				 	 
		
		// If our item count or per-page total is zero there is no need to continue.
		if ($this->total_rows == 0 OR $this->per_page == 0)
		{
			return '';
		}

		// Calculate the total number of pages
		$num_pages = ceil($this->total_rows / $this->per_page);

		// Is there only one page? Hm... nothing more to do here then.
		if ($num_pages == 1)
		{
			return '';
		}

		// Determine the current page number.
		$CI =& get_instance();

		if ( ($CI->config->item('enable_query_strings') === TRUE OR $this->page_query_string === TRUE)
			&& $CI->config->item('uri_protocol') != 'PATH_INFO' )
		{
			if ($CI->input->get($this->query_string_segment) != 0)
			{
				$this->cur_page = $CI->input->get($this->query_string_segment);

				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;
			}
		}
		else
		{
			if ($CI->uri->segment($this->uri_segment) != 0)
			{
				$this->cur_page = $CI->uri->segment($this->uri_segment);

				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;
			}
		}

		$this->num_links = (int)$this->num_links;

		if ($this->num_links < 1)
		{
			show_error('Your number of links must be a positive number.');
		}

		if ( ! is_numeric($this->cur_page))
		{
			$this->cur_page = 0;
		}

		// Is the page number beyond the result range?
		// If so we show the last page
		if ($this->cur_page > $this->total_rows)
		{
			$this->cur_page = ($num_pages - 1) * $this->per_page;
		}

		$uri_page_number = $this->cur_page;
		$this->cur_page = floor(($this->cur_page/$this->per_page) + 1);

		// Calculate the start and end numbers. These determine
		// which number to start and end the digit links with
		$start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
		$end   = (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;

		// Is pagination being used over GET or POST?  If get, add a per_page query
		// string. If post, add a trailing slash to the base URL if needed
		
		if ( ( $CI->config->item('enable_query_strings') === TRUE OR $this->page_query_string === TRUE )
 		&& $CI->config->item('uri_protocol') != 'PATH_INFO' )
		{
			$this->base_url = rtrim($this->base_url).'&amp;'.$this->query_string_segment.'=';
		}
		else
		{
			$this->base_url = preg_replace('/' . $CI->config->item('url_suffix') . '$/i', '', $this->base_url);			
			$this->base_url = rtrim($this->base_url, '/') .'/';
		}
			
		$url_suffix = $CI->config->item('url_suffix') === FALSE ? '' : $CI->config->item('url_suffix');
  		// And here we go...
		$output = '';

		// Render the "First" link
		if  ($this->cur_page > ($this->num_links + 1))
		{
			$output .= $this->first_tag_open.'<a href="'.$this->base_url.$param.'">'.$this->first_link.'</a>'.$this->first_tag_close;
		}

		// Render the "previous" link
		if  ($this->cur_page != 1)
		{
			$i = $uri_page_number - $this->per_page . $url_suffix;
			if ($i == 0) $i = '';
			$i .= $param;
			$output .= $this->prev_tag_open.'<a href="'.$this->base_url.$i.'">'.$this->prev_link.'</a>'.$this->prev_tag_close;
		}

		// Write the digit links
		for ($loop = $start -1; $loop <= $end; $loop++)
		{
			$i = ($loop * $this->per_page) - $this->per_page;
			
			if ($i >= 0)
			{
				if ($this->cur_page == $loop)
				{
					$output .= $this->cur_tag_open.$loop.$this->cur_tag_close; // Current page
				}
				else
				{
					$n = ($i == 0) ? '' : $i . $url_suffix;
					$n .= $param;					
					$output .= $this->num_tag_open.'<a href="'.$this->base_url.$n.'">'.$loop.'</a>'.$this->num_tag_close;
				}
			}
		}

		// Render the "next" link
		if ($this->cur_page < $num_pages)
		{
			$output .= $this->next_tag_open.'<a href="'.$this->base_url.($this->cur_page * $this->per_page).$url_suffix.$param.'">'.$this->next_link.'</a>'.$this->next_tag_close;
		}

		// Render the "Last" link
		if (($this->cur_page + $this->num_links) < $num_pages)
		{
			$i = (($num_pages * $this->per_page) - $this->per_page) . $url_suffix . $param;
			$output .= $this->last_tag_open.'<a href="'.$this->base_url.$i.'">'.$this->last_link.'</a>'.$this->last_tag_close;
		}

		// Kill double slashes.  Note: Sometimes we can end up with a double slash
		// in the penultimate link so we'll kill all double slashes.
		$output = preg_replace("#([^:])//+#", "\\1/", $output);

		// Add the wrapper HTML if exists
		$output = $this->full_tag_open.$output.$this->full_tag_close;

		return $output;
	}
}