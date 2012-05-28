<?php
if( ! function_exists('get_nickchat')){
	function get_nickchat($pid=0,&$html=''){
		// get all nickchat from db (which have is_enabled = 1)
		$ci = &get_instance();
		$ci->db->select('*')->from('nickchat');
		$ci->db->where('is_enabled',1)->where('parent_id',$pid);
		$ci->db->order_by('ordering','desc');
		$result = $ci->db->get();
		
		if($result){
			$html .= '<ul>';
			foreach($result->result_array() as $row){
				// show nickchat title
				$html .= '<li>';
				if($row['is_category'] == 1){
					$html .= '<b>'.$row['nickchat_title'].'</b>';
				}else{
					if($row['nickchat_type'] == 'yahoo'){
						$html .= '<a href="ymsgr:sendIM?'.$row['nickchat'].'" style="text-decoration: none">';
						$html .= '<img border="0" src="http://opi.yahoo.com/online?u='.$row['nickchat'].'&m=g&t=ImageNo&l=us" title="Yahoo"> '; 
						$html .= $row['nickchat_title'];
						$html .= '</a>';
					}elseif($row['nickchat_type'] == 'skype'){
						$html .= '<a href="skype:'.$row['nickchat'].'?call" style="text-decoration: none">';
						$html .= '<img src="http://download.skype.com/share/skypebuttons/buttons/call_blue_transparent_34x34.png" width="20" height="20" title="Skype" /> ';
						$html .= $row['nickchat_title'];
						$html .= '</a>';
					}
				}
				//recursion
				get_nickchat($row['nickchat_id'],$html);
				$html .= '</li>';
			}
			$html .= '</ul>';
		}
		
		return $html;
	}
}
