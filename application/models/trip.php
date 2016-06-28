<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trip extends CI_Model {

	function add_trip($user_id, $travel_id){

		$query = "INSERT INTO trips (user_id, travel_id) VALUES (?,?)";

		$values = array($user_id, $travel_id);

		return $this->db->query($query,$values);

	}

	function get_users_by_id($id){
		return $this->db->query("SELECT * FROM trips WHERE user_id = $id")->result_array();
	}
}