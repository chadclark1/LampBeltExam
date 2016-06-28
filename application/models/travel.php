<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Travel extends CI_Model {

	public function add($travel_info){

		$query = "INSERT INTO travels (destination, description, date_from, date_to) VALUES (?,?,?,?)";

		$values = array($travel_info['destination'], $travel_info['description'], $travel_info['date_from'], $travel_info['date_to']);


		return $this->db->query($query, $values);
	}

	public function get_last_travel_id(){
		return $this->db->query("SELECT * FROM travels ORDER BY id DESC LIMIT 1")->row_array();
	}

	public function get_travels_trips(){
		return $this->db->query("SELECT * FROM travels LEFT JOIN trips ON travels.id = trips.travel_id")->result_array();
	}

	public function get_travel_by_id($id){
		return $this->db->query("SELECT * FROM travels WHERE id = $id")->row_array();
	}


	// public function get_travel_by_id($id){
	// 	return $this->db->query("SELECT * FROM travels LEFT JOIN trips ON travels.id = trips.travel_id")->result_array();
	// }


	
}