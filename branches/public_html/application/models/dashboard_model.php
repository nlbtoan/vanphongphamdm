<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends MY_Model{
	
	function __construct(){
		
		parent::__construct();
		
	}
	
	function get_statistic_read_tour_book_seft(){
		$this->db->select('id, date');
		$this->db->from('tour_book');
		$this->db->where('is_read', 0);
		$this->db->where('tour_id', 0);
		return $this->db->count_all_results();
	}
	
	function get_statistic_read_tour_book(){
		$this->db->select('id, date');
		$this->db->from('tour_book');
		$this->db->where('is_read', 0);
		$this->db->where('tour_id <>', 0);
		return $this->db->count_all_results();
	}
	
	function get_statistic_read_hotel_book(){
		$this->db->select('id, date');
		$this->db->from('hotel_book');
		$this->db->where('is_read', 0);
		return $this->db->count_all_results();
	}
	
	function get_statistic_read_flight_book(){
		$this->db->select('id, date');
		$this->db->from('flight_book');
		$this->db->where('is_read', 0);
		return $this->db->count_all_results();
	}
	
	function get_statistic_read_vehicle_book(){
		$this->db->select('id, date');
		$this->db->from('vehicle_book');
		$this->db->where('is_read', 0);
		return $this->db->count_all_results();
	}
	
	//check
	function get_statistic_check_tour_book_seft(){
		$this->db->select('id, date');
		$this->db->from('tour_book');
		$this->db->where('is_checked', 0);
		$this->db->where('tour_id', 0);
		return $this->db->count_all_results();
	}
	
	function get_statistic_check_tour_book(){
		$this->db->select('id, date');
		$this->db->from('tour_book');
		$this->db->where('is_checked', 0);
		$this->db->where('tour_id <>', 0);
		return $this->db->count_all_results();
	}
	
	function get_statistic_check_hotel_book(){
		$this->db->select('id, date');
		$this->db->from('hotel_book');
		$this->db->where('is_checked', 0);
		return $this->db->count_all_results();
	}
	
	function get_statistic_check_flight_book(){
		$this->db->select('id, date');
		$this->db->from('flight_book');
		$this->db->where('is_checked', 0);
		return $this->db->count_all_results();
	}
	
	function get_statistic_check_vehicle_book(){
		$this->db->select('id, date');
		$this->db->from('vehicle_book');
		$this->db->where('is_checked', 0);
		return $this->db->count_all_results();
	}
	
}