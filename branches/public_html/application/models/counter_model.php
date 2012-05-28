<?php
class Counter_model extends Model{
	public function __construct(){
		parent::__construct();
	}
	
	public function get_counter($year,$month,$day){
		$result['counter'] = 0;
		$result['type'] = '';
		if(is_numeric($year) && is_numeric($month) && is_numeric($day)
		&& $year >= 1970 && $month >= 0 && $day >= 0 ){			
			if($year != 0 && $month == 0 && $day == 0){
				// search by year
				$day_first = mktime(0,0,0,1,1,$year);
				$day_last = mktime(0,0,0,1,1,$year+1);
				$this->db->select('counter')->from('counter');
				$this->db->where('day >= ',$day_first)->where('day < ',$day_last);
				foreach($this->db->get()->result_array() as $row){
					$result['counter'] += $row['counter'] ;
				}
				$result['type'] = 'y';
				
			}elseif($year != 0 && $month != 0 && $day == 0){
				// search by month, year
				$day_first = mktime(0,0,0,$month,1,$year);
				$day_last = mktime(0,0,0,$month+1,1,$year);
				$this->db->select('counter')->from('counter');
				$this->db->where('day >= ',$day_first)->where('day < ',$day_last);
				foreach($this->db->get()->result_array() as $row){
					$result['counter'] += $row['counter'] ;
				}
				$result['type'] = 'm';
				
			}elseif($year != 0 && $month != 0 && $day != 0){
				// search by day, month, year
				$day_first = mktime(0,0,0,$month,$day,$year);
				$this->db->select('counter')->from('counter');
				$this->db->where('day',$day_first);
				if($counter = $this->db->get()->row_array()){
					$result['counter'] += $counter['counter'];
				}
				$result['type'] = 'd';
			}
		}
		return $result;	
	}
}
