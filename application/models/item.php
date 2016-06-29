<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends CI_Model {

	public function add($item_info){

		$user = $this->session->userdata('user_id');

		$query = "INSERT INTO items (description, created_by, date_added) VALUES (?,?,?)";

		$values = array($item_info['description'],$user,date('Y/m/d'));


		return $this->db->query($query, $values);
	}

	public function get_last_item_id(){
		return $this->db->query("SELECT * FROM items ORDER BY id DESC LIMIT 1")->row_array();
	}

	public function get_items(){
		return $this->db->query("SELECT * FROM items LEFT JOIN users_items ON items.id = users_items.item_id")->result_array();
	}

	public function get_item_by_id($id){

		return $this->db->query("SELECT * FROM items WHERE id = $id")->row_array();

	}

	public function delete_key($id){
		return $this->db->query("DELETE FROM users_items WHERE item_id = $id");
	}

	public function delete($id){
		return $this->db->query("DELETE FROM items WHERE id = $id");
	}
}