<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {


	function get_user_by_username($user_info){
		
		return $this->db->query( "SELECT * FROM users WHERE username = ?", array($user_info)) ->row_array();

	}

	function add($user_info, $salt, $encrypted_password){

		$query = "INSERT INTO users (username, password, salt, first_name, last_name, date_hired) VALUES (?,?,?,?,?,?)";

		$values = array($user_info['username'], $encrypted_password, $salt, $user_info['first_name'], $user_info['last_name'], $user_info['date']);

		// var_dump($query);
		// var_dump($values); die();

		return $this->db->query($query, $values);
	}

	public function get_users(){
		return $this->db->query("SELECT * FROM users LEFT JOIN users_items ON users.id = users_items.user_id")->result_array();
	}


}