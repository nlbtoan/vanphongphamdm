<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Email extends CI_Email
{
	private $ci;
	private $title_email = '';
	private $local_email = '';
	
	public function __construct(){
		parent::__construct();
		$this->ci =& get_instance();

		$this->ci->config->load('email');
		$config = $this->ci->config->item('email');
		
		$this->initialize($config);
		
		$setting = $this->_get_email($config);
		
		$this->local_email = $setting['email'];
		$this->title_email = $setting['namesite'];
		
		$this->ci->lang->load('email');
		
	}
	
	private function _get_email($config)
	{
		$this->ci->db->select('name, value');
		$this->ci->db->from('setting');
		$this->ci->db->where('name', 'email');
		$this->ci->db->or_where('name', 'namesite');

		$data = $this->ci->db->get()->result_array();
		foreach($data as $item)
		{
			$result[$item['name']] = $item['value'];
		}
		
		if(empty($result['namesite']) )
		{
			$result['namesite'] = $config['title_email'];
		}
		if(empty($result['email']) )
		{
			$result['email'] = $config['smtp_user'];
		}
		
		return $result;
	}
	
	
	public function send_mail( $email_to, $email_cc ,$subject, $mail_content, $title_email = false){

		if ( $title_email == false ){
			$title_email = $this->title_email;
		}
		
		$this->from( $this->local_email, $title_email );  
		$this->to($email_to);
		$this->cc($email_cc);  
		$this->subject($subject);  
		$this->message($mail_content);
		$return = $this->send();
		
		return $return;
		
	}
	
	public function notify_mail( $subject, $mail_content, $title_email = false, $email_from = false ){
		
		if ( $email_from == false ){
			$email_from = $this->local_email;
		}
		
		if ( $title_email == false ){
			$title_email = $this->title_email;
		}

		$this->from( $email_from, $title_email );  
		$this->to($email_from);  
		$this->subject($subject);  
		$this->message($mail_content);  
		$return = $this->send();
		
		return $return;
		
	}
	
}
