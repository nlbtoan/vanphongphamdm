<?php
if ( ! function_exists('counter_visiter_online')){
	function counter_visiter_online(){
		// get sessions which are active less than 15 minutes && last_activity > today(timestamp)
		$ci = &get_instance();
		$current = time();
		$today = strtotime(date('d-m-Y'));
		$ci->db->select('*')->from('sessions')->where('last_activity > ',$current-900)->where('last_activity >',$today);
		return $ci->db->count_all_results();
	}
}
// ----------------------

if ( ! function_exists('counter_visiter_all')){
	function counter_visiter_all(){
		// get all visiter
		$ci = &get_instance();
		$ci->db->select('counter')->from('counter');
		$count = 0;
		foreach($ci->db->get()->result_array() as $row){
			$count = $count + $row['counter'] ;
		}
		return $count;
	}
}
// ----------------------

if ( ! function_exists('counter_visiter_month')){
	function counter_visiter_month(){
		// get all visiter of month
		$ci = &get_instance();
		$month = date('m');
		$year = date('Y');
		$this_month = mktime(0,0,0,$month,1,$year);
		$ci->db->select('counter')->from('counter')->where('day >= ',$this_month);
		$count = 0;
		foreach($ci->db->get()->result_array() as $row){
			$count = $count + $row['counter'] ;
		}
		return $count;
	}
}
// ----------------------

if ( ! function_exists('counter_visiter_day')){
	function counter_visiter_day(){
		$ci = &get_instance();
		$today = strtotime(date('d-m-Y'));
		$cookie = array(
			'name' => 'last_activity',
			'value' => time(),
			'expire' => 86500
			);
		
		// check to set cookie
		if($last_activity_cookie = get_cookie('last_activity')){
			// cookie existed: check if value of cookie <= $today (timestamp)
			if($last_activity_cookie <= $today){
				// cookie < $today: call function update_counter
				update_counter($today);
				set_cookie($cookie);
			}
		}else{
			// cookie NOT existed: call function update_counter
			update_counter($today);
			set_cookie($cookie);
		}
		
		// get cookie which visit today
		$ci->db->select('counter')->from('counter')->where('day',$today);
		$result = $ci->db->get()->row_array();
		return $result['counter'];
	}
}
// ----------------------

/* Subfunction */
if ( ! function_exists('update_counter')){
	function update_counter($today){
		$ci = &get_instance();
		$ci->db->select('counter')->from('counter')->where('day',$today);
		
		if($result = $ci->db->get()->row_array()){
			// $today existed in "counter": Update Counter with counter+1
			$counter = array('counter' => $result['counter']+1);
			$ci->db->where('day',$today);
			$ci->db->update('counter',$counter);
		}else{
			// $today NOT existed in "counter": Insert into Counter
			$ci->db->set('day',$today);
			$ci->db->set('counter',1);
			$ci->db->insert('counter');
		}
	}
}