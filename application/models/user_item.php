<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Item extends CI_Model {

	function add_user_item($user_id, $item_id){

		$query = "INSERT INTO users_items (user_id, item_id) VALUES (?,?)";

		$values = array($user_id, $item_id);

		return $this->db->query($query,$values);

	}

	function remove_item($user_id, $item_id){

		return $this->db->query("DELETE FROM users_items WHERE user_id = $user_id and item_id = $item_id");

	}

	// function get_users_by_id($id){
	// 	return $this->db->query("SELECT * FROM trips WHERE user_id = $id")->result_array();
	// }
}