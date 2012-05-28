<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment {
	
	var $CI;
	var $id						= 0;
	var $url_comment			= 'test/index';
	var $prefix_table			= "news_";
	var $comment_per_page 		= 3;
	var $config_paging			= array();
	
	/**
	 * Constructor
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 */
	function __construct($params = array())
	{
		if (count($params) > 0)
		{
			$this->initialize($params);
		}
		
		$this->CI =& get_instance();
		$this->CI->load->helper('form');
		$this->CI->load->helper('url');
		$this->CI->load->library('pagination');
		
		$this->cookie = array('name' => 'rate', 'expire' => '86500', 'prefix' => $this->prefix_table );
		//log_message('debug', "Rate Class Initialized");
	}

	// --------------------------------------------------------------------

	/**
	 * Initialize Preferences
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 * @return	void
	 */
	function initialize($params = array())
	{
		if (count($params) > 0)
		{
			foreach ($params as $key => $val)
			{
				if (isset($this->$key))
				{
					$this->$key = $val;
				}
			}
		}
	}
	
	function set_id($id = 0){
		$this->id = $id;
	}
	
	function view_comment($id = 0, $offset = 0){
		$config_paging = array();
		
		if( $id == 0){
			return '';
		}
		else {
			$this->id = $id;
		}
		
		$total_rows = $this->get_comment($this->id);
		
		if($this->comment_per_page == 0){ 
			
			$this->comment_per_page = $total_rows; 
		
		}else {
			if (empty($this->config_paging)){
				$config_paging['base_url'] = site_url($this->url_comment);
				$config_paging['total_rows'] = $total_rows;
				$config_paging['per_page'] = $this->comment_per_page;
				$config_paging['num_links'] = 10;
				$config_paging['uri_segment'] = 3;
			} else {
				
				$config_paging = $this->config_paging;
				
			}
			
		}

		$this->CI->pagination->initialize($config_paging);
		
		$data['paging'] = $this->CI->pagination->create_links();
		
		$comments['comments'] = $this->get_comment($this->id, $this->comment_per_page, $offset);
		$data['comments'] = $this->CI->load->view('news/comment', $comments, true);
		
		return $data;
		
	}
	
	function view_comment_form($id){
		
		ob_start();
			
?>

<?php echo form_open($this->url_comment, array('id'=>'form_comment', 'name'=>'form_comment'));?>
	<div class="comment_info">
		<input style="width:280px; margin-right:1px;" type="text" name="txt_name" class="txt_adword" onkeyup="initTyper(this);" onblur="nameOnBlur(this)" onfocus="nameOnFocus(this)" value="Họ Tên"/>
		<input style="width:170px;" type="text" name="txt_email" class="txt_adword" onblur="emailOnBlur(this)" onfocus="emailOnFocus(this)" value="Email"/>
	</div>
	<div class="clear"></div>
	<textarea name="txt_content" class="txt_content" onkeyup="initTyper(this);" rows="7"></textarea>
	<p class="form_btn">
		<input type="submit" name="submit" value="Gửi Bài" />
		<input type="reset" name="reset" value="Xóa Trắng" onClick="InputDefault();"/> 
		<input type="button" name="hidden" value="Ẩn"/>
	</p>
	<div class="typingmode">
		<input type="radio" class="switch" name="switch" />&nbsp;OFF
		<input type="radio" class="switch" name="switch" checked="checked" />&nbsp;TELEX
		<input type="radio" class="switch" name="switch" />&nbsp;VNI
	  	<input type="radio" class="switch" name="switch" />&nbsp;VIQR
	</div>
	<div class="clear"></div>
	<input type="hidden" name="hd_id" value="<?echo $id;?>"/>
	
<?php echo form_close();?>
<script type="text/javascript">
	
	function nameOnFocus(field)
	{
		if(field.value=='Họ Tên'){ field.value = ''; field.className = 'txt_adword2'}
	}
	
	function nameOnBlur(field)
	{
		if(field.value==''){ field.value='Họ Tên'; field.className = 'txt_adword'}
	}
	
	function emailOnFocus(field)
	{
		if(field.value=='Email'){ field.value = ''; field.className = 'txt_adword2'}
	}
	
	function emailOnBlur(field)
	{
		if(field.value==''){ field.value='Email'; field.className = 'txt_adword'}
	}
	
	function InputDefault() {
		document.form_comment.txt_name.value = 'Họ Tên';
		document.form_comment.txt_name.className = 'txt_adword';
		document.form_comment.txt_email.value = 'Email';
		document.form_comment.txt_email.className = 'txt_adword';
		document.form_comment.txt_content.value = '';
	}
	
	function checkField(error) {
		
		document.form_comment.txt_email.focus();
		document.form_comment.txt_email.className = 'txt_adword2';
	
		if (document.form_comment.txt_content.value == '' && error.indexOf('Địa Chỉ Email', 0) == -1){
			document.form_comment.txt_content.focus();
		}
		
		if (document.form_comment.txt_name.value == ''){
			document.form_comment.txt_name.focus();
			document.form_comment.txt_name.className = 'txt_adword2';
		}
		
	}

	$(document).ready(function(){
		
		setTypingMode(1);

		$("input:reset").click(function(){
			
		});
		$("input[name='switch']").click(function(){
			setTypingMode($(this).index());
		});
		
		$('#form_comment').submit(function(e){
			var url = $(this).attr('action');
			if(document.form_comment.txt_name.value=='Họ Tên'){ document.form_comment.txt_name.value = '';}
			if(document.form_comment.txt_email.value=='Email'){ document.form_comment.txt_email.value = '';}
			var form = this;
			e.preventDefault();
			$.ajax({
			   	type: "POST",
			   	data: $(form).serialize(),
			   	url: url,
			   	dataType: 'json',
			  	success: function(data){
			  		if(data.error){
			  			alert(data.error);
			  			checkField(data.error);
			  		}
			  		else{
						$('#comment_wrapper').html(data.comments);
						InputDefault();
						$('#pagination').html(data.paging);	
						$("#pagination a").click(paging_click);
			  		}
			   }
			});
		});
		/*
		 var paging_click = function (e){
			e.preventDefault();
			$.ajax({
			   	type: "GET",
			   	url: this.href,			   	
			   	dataType: 'json',
			  	success: function(data){
					$('#comment_wrapper').html(data.comments);
					$('#pagination').html(data.paging);		
					$("#pagination a").click(paging_click);
			   }
			});
		}
		
		$("#pagination a").click(paging_click);*/
	});
	
</script>

<?php	
		$r = ob_get_contents();
		ob_end_clean();
		return $r;
	}
	
	public function add_comment($data, $users_id = 0){
		
		if (is_array($data)){
		
			$comment_data = array(
				'content' => $data['txt_content'],
				'date' => time(),
				'title' => $data['txt_title'],
				'name' => $data['txt_name'],
				'email' => $data['txt_email'],
				'news_id' => $data['hd_id'],
				'users_id' => $users_id
			);
			
			$this->CI->db->insert('news_comment', $comment_data);
		
		}
		
	}
	
	/*
	 * if $_perpage = -1 return array comment follow id
	 * else return total row array comment follow id
	 */
	
	public function get_comment($id = 0, $per_page = -1, $offset = 0){
		
		if ( $id == 0 ) {
			return;
		}
		
		$select = $this->prefix_table.'comment.id';
		
		if ($per_page != -1) {
			
			$select = $this->prefix_table.'comment.id, name, title, content, date, users_id, first_name, last_name';
			$this->CI->db->join('user_profile', 'user_profile.user_id = news_comment.users_id', 'left');
			$this->CI->db->limit($per_page, $offset);
			$this->CI->db->order_by($this->prefix_table.'comment.id', 'desc');
			
		}
		
		$this->CI->db->select($select);
		$this->CI->db->from($this->prefix_table.'comment');
		$this->CI->db->where($this->prefix_table.'id', $id);
		
		$query = $this->CI->db->get();
		
		if ($per_page == -1) { return $query->num_rows(); } 
		
		return $query->result_array();
		
	}
	
}

// END Pagination Class

/* End of file Comment.php */
/* Location: ./applicatino/libraries/Comment.php */