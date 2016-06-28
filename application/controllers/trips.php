<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trips extends CI_Controller {

	public function add($travel_id){
		$this->load->model('Trip');

		$user_id=$this->session->userdata('user_id');

		// var_dump($user_id); die();

		$this->Trip->add_trip($user_id, $travel_id);

		redirect("/users/show_schedule");

	}


	public function get_users_by_id($id){
		$this->load->model('Trip');

		// var_dump($this->session->userdata('destination'));
		$destination_users = $this->Trip->get_users_by_id($id);
		// var_dump($this->session->userdata('destination'));
		$this->session->set_userdata('destination_users', $destination_users);

		// var_dump($this->session->all_userdata());
		
		$this->load->view('destination');

	}
}