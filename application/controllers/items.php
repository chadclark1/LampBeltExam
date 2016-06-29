<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items extends CI_Controller {

	public function show_items(){

		$this->load->model('Item');


		$items = $this->Item->get_items();

		$users = $this->Item->get_users();

		$this->load->view('dashboard', array(
			'items' => $items,
			'users' => $users,
			));

	}


	public function add(){

		$this->load->view('add');
	}

	public function profile($id){
		$this->load->model('Item');

		$item = $this->Item->get_item_by_id($id);

		// echo "here"; die();

		
		$users = $this->Item->get_users();
		
		$this->load->view('profile', array(
			'item' => $item,
			'users' => $users,
			));


	}

	public function delete($id){
		$this->load->model('Item');

		$this->Item->delete_key($id);

		$this->Item->delete($id);

		$this->show_items();
	}



	public function add_item(){
		$this->load->model('Item');

		$item_info=$this->input->post();

		// var_dump($item_info); die();

		$this->load->library("form_validation");
		$this->form_validation->set_rules('description', 'Item', 'trim|required|min_length[3]', 
			array('required' => 'You must enter an %s.')
			);


		if($this->form_validation->run() === FALSE)
		{
		     // $this->session->set_flashdata("login_error", "Please complete the registration form.");
			$this->session->set_flashdata('error', validation_errors());
            redirect("/items/add");
		}

		// echo "here"; die();
		
		$this->Item->add($item_info);

		


		$item_info_id=$this->Item->get_last_item_id();

		$item_id=$item_info_id['id'];

		// var_dump($item_info_id); die();

		// echo "success"; die();

		redirect("/users_items/add/$item_id");
		
			
	}








}












