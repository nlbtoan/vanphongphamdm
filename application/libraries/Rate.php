<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
.rate_wrapper ul{
list-style:none;
margin:0;
padding:0 0 0 15px;
}
.rate_wrapper li{
width:11px;
height:12px;
float:left;
padding:0 2px;
}
li.rate_star_on{
background:url(http://localhost/volano/themes/demo/styles/default/images/st_Star-on.gif) no-repeat;
}

li.rate_star_off{
background:url(http://localhost/volano/themes/demo/styles/default/images/st_Star-off.gif) no-repeat;
}
*/
class Rate {
	
	var $CI;
	var $id						= 0;
	var $type		 			= 0;
	var $url_rate				= 'add_rate';
	var $prefix_table			= "news_";
	
	var $is_img					= false; // if image = false, then use radio; if image = true, then use ul li
	var $value					= 3;
	var $max_value				= 5;
	var $rd_attr				= array('name'=>'rd_rate');
	var $rate_attr				= array('class'=>'rate_wrapper', 'id'=>'rate_wrapper');
	var $star_on_class			= 'rate_star_on';
	var $star_off_class			= 'rate_star_off';
	
	var $button_like_attr 		= array('class'=>'button_rate_like', 'id'=>'button_rate_like');
	var $button_like_content	= 'like';
	
	var $button_dislike_attr	= array('class'=>'button_rate_dislike', 'id'=>'button_rate_dislike');
	var $button_dislike_content	= 'dislike';
	
	var $statistic_attr			= array('class'=>'statistic_rate', 'id'=>'statistic_rate');
	var $statistic_content		= array('none'=>'Chưa có đánh giá nào', 'first'=>'', 'last'=>'Ý kiến', 'like'=>'Thích', 'dislike'=>'Không Thích');
		
	var $cookie					= array();
	
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
	
	function setType($type) {
		
		$this->type = $type;
		
	}

	// --------------------------------------------------------------------
	
	/*
	 * Tao html thong ke theo dang
	 * <div $statistic_attr>
	 *		$statistic_content
	 * </div>
	 */
	function create_statistic_rate($data_statistic){
		
		$id_attr = $this->statistic_attr['id'];
		$this->statistic_attr['id'] .= "_".$this->id;
		
		$total = $data_statistic['total'];
		$output = '';
		
		$type = 'div';
		$attr = $this->convert_array_to_string($this->statistic_attr);
		$output .= "<".$type.$attr.">" . "\n";
		
		if ( $total == 0 ){
			
			$output .= $this->statistic_content['none'];
			
		} else {
			
			if( $this->type == 2){
				
				$like = $data_statistic['like'];
				$dislike = $total - $like;
				$output .= $this->statistic_content['first'].' '.$like.' '.$this->statistic_content['like']. "\n";
				$output .= $this->statistic_content['first'].' '.$dislike.' '.$this->statistic_content['dislike']. "\n";
			
			} else {
				
				$output .= $this->statistic_content['first'].' '.$total.' '.$this->statistic_content['last']. "\n";
				
			}
			
		}
		
		$this->statistic_attr['id'] = $id_attr;
		$output .= '</div>';
		
		return $output;
		
	}
	/*
	 *<?php echo $this->rate_attr['id'];?>
	 *<?php echo $this->star_on_class;?>
	 *<?php echo $this->star_off_class;?>
	 */
	function rate_javacript(){
		
		$id_attr = '#'.$this->rate_attr['id']."_".$this->id;
		$id_stat = '#'.$this->statistic_attr['id']."_".$this->id;
		
		ob_start();
		
		if ($this->type == 0){
			$id_li = '#'.$this->rate_attr['id']."_".$this->id.' li, ';
			
?>

<script type="text/javascript">
	$(document).ready(function(){
		var on_len = $('<?php echo $id_attr;?> li.<?php echo $this->star_on_class;?>').length;
		
		$('<?php echo $id_li;?>').hover(function(){
			if ( $(this).toggleClass('<?php echo $this->star_on_class;?>').attr('class') == '' ){
				$(this).attr('class', '<?php echo $this->star_on_class;?>');
				for( i = $(this).index() + 1 ; i < $('<?php echo $id_attr;?> li').length; i++ ) {
					if ( $('<?php echo $id_li;?>').eq(i).toggleClass('<?php echo $this->star_off_class;?>').attr('class') == '' )
						$('<?php echo $id_li;?>').eq(i).attr('class', '<?php echo $this->star_off_class;?>');
				}
			} else {
				for( i = 0; i <= $(this).index(); i++ ) {
					$('<?php echo $id_li;?>').eq(i).attr('class', '<?php echo $this->star_on_class;?>');
				}
			}
		}, function(){
			for( i = 0 ; i < $('<?php echo $id_li;?>').length; i++ ) {
				if ( i < on_len) { $('<?php echo $id_li;?>').eq(i).attr('class', '<?php echo $this->star_on_class;?>'); }
				else { $('<?php echo $id_li;?>').eq(i).attr('class', '<?php echo $this->star_off_class;?>'); }
				
			}
		});

			var rate_click = function(e){
			var value_rate = $(this).index() + 1;
			var data = { id : <?php echo $this->id;?>, value : value_rate };
			e.preventDefault();
			$.ajax({
			   	type: "POST",
			   	data: data,
			   	url: "<?php echo site_url($this->url_rate);?>",
			   	dataType: "json",
			  	success: function(data){
			   		$('<?php echo $id_attr; ?>').html(data.view_rate);
			   		$('<?php echo $id_stat; ?>').html(data.view_stat);
			   		$('<?php echo $id_li;?>').click(rate_click);
			   	}
			});
		}
		
		$('<?php echo $id_li;?>').click(rate_click);
	});
</script>

<?php
		} else {
			$id_button = '#'.$this->rate_attr['id']."_".$this->id.' button, ';
?>

<script type="text/javascript">
	$(document).ready(function(){
		
		var rate_click = function(e){
			var value_rate = $(this).index() + 1;
			var data = { id : <?php echo $this->id;?>, value : value_rate };
			e.preventDefault();
			$.ajax({
			   	type: "POST",
			   	data: data,
			   	url: "<?php echo site_url($this->url_rate);?>",
			   	dataType: "json",
			  	success: function(data){
			   		$('<?php echo $id_attr; ?>').html(data.view_rate);
			   		$('<?php echo $id_stat; ?>').html(data.view_stat);
			   		$('<?php echo $id_button;?>').click(rate_click);
			   	}
			});
		}
		
		$('<?php echo $id_button;?>').click(rate_click);
	});
</script>

<?php	
		}
		$r = ob_get_contents();
		ob_end_clean();
		return $r;
	}
	
	/*
	 * Tao html cac kieu danh gia
	 * Kieu 0:
	 * 	- Dang 1: Khong co img, se xuat ra $max_value(5) radio theo cau truc
	 * 			<div $rate_attr>
	 * 				<input type="radio" $rd_attr/>1
	 * 				<input type="radio" $rd_attr/>2
	 * 				<input type="radio" $rd_attr/>3
	 * 				<input type="radio" $rd_attr checked="checked"/>4
	 * 				<input type="radio" $rd_attr/>5
	 * 			</div>
	 * 	- Dang 2: Co img, se xuat ra $max_value img(5) do theo cau truc html
	 * 			<ul $rate_attr>
	 * 				<li class="rate_star_on">*</li>
	 * 				<li class="rate_star_on">*</li>
	 * 				<li class="rate_star_on">*</li>
	 * 				<li class="rate_star_on">*</li>
	 * 				<li class="rate_star_off"></li>
	 * 			<ul>
	 * Kieu 1:
	 *  		<div $rate_attr>
	 * 				<button $button_like_attr> $button_like_content </button>
	 * 			</div>
	 * Kieu 2:
	 *  		<div $rate_attr>
	 * 				<button $button_like_attr> $button_like_content </button>
	 * 				<button $button_dislike_attr> $button_dislike_content </button>
	 * 			</div>
	 */
	function create_rate($id){

		$id_attr = $this->rate_attr['id'];
		$this->rate_attr['id'] .= "_".$id;
		
		$output = '';
		
		if( $this->type == 0){
			
			if ($this->max_value == 0){
				return '';
			}
			
			$value= $this->get_rate_avgByID($id);
			if ( $value['value'] != null ) {
				$this->value = round($value['value']);
			}
			
			//rate star	
			if ($this->is_img == false){
				
				$type = 'div';
				$rate_attr = $this->convert_array_to_string($this->rate_attr);
				$output .= "<".$type.$rate_attr.">" . "\n";
				
				for($i = 1; $i <= $this->max_value; $i+=1 ){
					
					$checked = false;
					if ($i == $this->value) $checked = true;
					
					$this->rd_attr['value'] = $i;
					$this->rd_attr['checked'] = $checked;
					
					$output .= form_radio($this->rd_attr) . $i . "\n";
					
				}
				
				$output.= '</div>';
				
			} 
			else {
				
				$type = 'div';
				$rate_attr = $this->convert_array_to_string($this->rate_attr);
				$output .= "<".$type.$rate_attr.">" . "\n";
				$output .= "<ul>";
				
				for($i = 1; $i <= $this->max_value; $i+=1 ){
					$li_class = 'class="' . $this->star_on_class . '" ';
					if ($i > $this->value) $li_class = 'class="' . $this->star_off_class . '" ';
					$li = "<li " . $li_class . '></li>' . "\n";
					$output .= $li;
				}
				
				$output .= '</ul>';
				$output .= '</div>';
				
			}
		}
		
		if ( $this->type == 1 ){
			//rate like
			
			$type = 'div';
			$rate_attr = $this->convert_array_to_string($this->rate_attr);
			$output .= "<".$type.$rate_attr.">" . "\n";
			
			$output .= form_button($this->button_like_attr, $this->button_like_content) . "\n";
			
			$output .= '</div>';
			
		}
		
		if ( $this->type == 2 ){
			//rate like or dislike
			
			$type = 'div';
			$rate_attr = $this->convert_array_to_string($this->rate_attr);
			$output .= "<".$type.$rate_attr.">" . "\n";
			
			$output .= form_button($this->button_like_attr, $this->button_like_content) . "\n";
			$output .= form_button($this->button_dislike_attr, $this->button_dislike_content) . "\n";
			
			$output .= '</div>';
			
		}
		$this->rate_attr['id'] = $id_attr;
		return $output;
	}
	
	function set_id($id){
		if( $id == 0 ) $id = '';
		$this->id = $id;
	}
	
	/*
	 * 
	 */
	function view_rate($id, $value_rate = false, $users_id = -1){
		
		$this->set_id($id);
		
		$is_rated = $this->is_rated($id, $users_id);
		$rate_js = '';
		
		if ($is_rated != false) {
			
			$rate_js = $this->rate_javacript();
			
			if ( $value_rate != false ){
					
					$rate_js = '';
					
					if ( $users_id == -1 ) $users_id = 0;
					
						$rate_data = array('news_id' => $id, 'value' => $value_rate, 'type' => $this->type, 'users_id' => $users_id);					
						$this->add_rate($rate_data);
						
						$this->cookie['value'] = $is_rated;
						set_cookie($this->cookie);
						
			}
			
		}
		
		$data = $this->create_rate($id).$rate_js;
		
		return $data;
	}
	
	function view_stat($id, $users_id = -1){
		$this->set_id($id);
		
		$data_statistic = $this->get_rate_statisticByID($id);
		$data = $this->create_statistic_rate($data_statistic);
		
		return $data;
	}
	
	/*
	 * KT nguoi doc da rate san pham, bai viet do chua?
	 * True: da rate 
	 * Neu co tham so users_id thi kt trong co so du lieu doi voi user do
	 * Neu khong co users_id thi kt id san pham hay bai viet co trong cookie hay khong 
	 * Neu chua cookie thi tao cookie voi value la id san pham hay bai viet do
	 */
	function is_rated($id, $users_id = -1){
		
		$value = false;
		
		if ( $users_id == -1){
		
			//KT cookie
			if(get_cookie('news_rate')){
				
				$value = '';
				$strid = get_cookie('news_rate');
				
				if(strpos($strid, $id) === false){
					
					$value = $id . ';' . $strid;
					
				}
				
			} else {
				
				$value = $id;
				
			}
			
			
		} else {
			
			$this->CI->db->select('*');
			$this->CI->db->from($this->prefix_table.'rate');
			$this->CI->db->where($this->prefix_table.'id', $id);
			$this->CI->db->where('users_id', $users_id);
			$query = $this->CI->db->get();
			
			if( $query->num_rows() != 0 ) $value = true;
			
		}
		
		return $value;
	}
	
	//Them danh gia
	public function add_rate($data){
		
		if (is_array($data)){
		
			$rate_data = array(
				'value' => $data['value'],
				'date' => time(),
				'news_id' => $data[$this->prefix_table.'id'],
				'users_id' => $data['users_id'],
				'type' => $data['type']
			);
			
			$this->CI->db->insert($this->prefix_table.'rate', $rate_data);
		
		}
		
	}
	
	//Thong ke danh gia theo san pham
	public function get_rate_statisticByID($id = 0){	
		
		if ( $id == 0 ){
			return;	
		}
		
		$this->CI->db->select('value');
		$this->CI->db->from($this->prefix_table.'rate');
		$this->CI->db->where($this->prefix_table.'id', $id);
		$this->CI->db->where('type', $this->type);
		$query = $this->CI->db->get();
		$data['total'] = $query->num_rows();
		
		if ($this->type == 2){
			
			$this->CI->db->select('value');
			$this->CI->db->from($this->prefix_table.'rate');
			$this->CI->db->where($this->prefix_table.'id', $id);
			$this->CI->db->where('type', $this->type);
			$this->CI->db->where('value', 1);
			
			$query_like = $this->CI->db->get();
			
			$data['like'] = $query_like->num_rows();
		}

		return $data;
		
	}
	
	//Lay trung binh diem cua type=0
	public function get_rate_avgByID($id){
		
		if ( $id == 0 ){
			return;	
		}
		
		$this->CI->db->select_avg('value');
		$this->CI->db->from($this->prefix_table.'rate');
		$this->CI->db->where($this->prefix_table.'id', $id);
		$this->CI->db->where('type', 0);
		$query = $this->CI->db->get();
		
		return $query->row_array();
		
	}
	
	//Chuyen mang thanh chuoi $key="$val"
	function convert_array_to_string($array){
		
		if (is_array($array)){
			$atts = '';
			foreach ($array as $key => $val){
				$atts .= ' ' . $key . '="' . $val . '"';
			}
			$array = $atts;
		}
		
		return $array;
		
	}
	
}

// END Pagination Class

/* End of file Rate.php */
/* Location: ./applicatino/libraries/Rate.php */