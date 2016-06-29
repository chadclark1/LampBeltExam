<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_Items extends CI_Controller {

	public function add($item_id){
		$this->load->model('User_Item');

		$user_id=$this->session->userdata('user_id');

		// var_dump($user_id); die();

		$this->User_Item->add_user_item($user_id, $item_id);

		// echo "success"; die();

		redirect("/items/show_items");

	}

	public function remove($item_id){
		$this->load->model('User_Item');

		$user_id=$this->session->userdata('user_id');

		// var_dump($user_id); die();

		$this->User_Item->remove_item($user_id, $item_id);

		// echo "success"; die();

		redirect("/items/show_items");

	}
}