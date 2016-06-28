<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Travels extends CI_Controller {

	public function add(){
		$this->load->model('Travel');

		$travel_info=$this->input->post();

		// var_dump($travel_info); die();

		$this->load->library("form_validation");
		$this->form_validation->set_rules('destination', 'Destination', 'trim|required', 
			array('required' => 'You must provide a %s.')
			);

		$this->form_validation->set_rules('description', 'Description', 'trim|required',
			array('required' => 'You must provide a %s.')
			);

		$this->form_validation->set_rules('date_from', 'Date From', 'callback_date_check');

		$this->form_validation->set_rules('date_to', 'Date To',  'callback_date_check');


		if($this->form_validation->run() === FALSE)
		{
		     // $this->session->set_flashdata("login_error", "Please complete the registration form.");
			$this->session->set_flashdata('error', validation_errors());
            redirect("/users/add");
		}

		date_default_timezone_set('America/Los_Angeles');

		$date_from = $this->input->post('date_from');
		$date_to = $this->input->post('date_to');
		$today = date('Y/m/d');

		if($date_from <= $today){
			$this->session->set_flashdata('error', "'Date From' must be must be a future date");
            redirect("/users/add");
		}

		if ($date_from > $date_to){
			$this->session->set_flashdata('error', "'Date To' must be greater than 'Date From'");
            redirect("/users/add");
		}

		// var_dump($today); die();




		// echo "end"; die();	
		
		$this->Travel->add($travel_info);

		// var_dump($travel_info); die();


		$travel_info_id=$this->Travel->get_last_travel_id();

		$travel_id=$travel_info_id['id'];

		// var_dump($travel_id); die();


		redirect("/trips/add/$travel_id");
		
			
	}


	public function date_check($date)
		{
			// echo "hello"; die();
		    $d = DateTime::createFromFormat('Y/m/d', $date);
		    // return $d && $d->format($format) == $date;
		    // var_dump($d);
		    if ($d && $d->format('Y/m/d') == $date)
                {
                	return TRUE;
                	
                }
                else
                {
                	// echo "hi hi"; die();
                    $this->form_validation->set_message('date_check', 'Please format the dates as YY/MM/DD');
                    return FALSE; 
                }
            
		}


	public function get_travels_trips(){
		$this->load->model('Travel');

		$travels_trips = $this->Travel->get_travels_trips();

		$this->session->set_userdata('travels_trips', $travels_trips);

		// echo "hello"; die();

		// var_dump($travels_trips); die();

		$this->load->view('schedule');

	}

	public function destination($id){
		$this->load->model('Travel');

		$destination = $this->Travel->get_travel_by_id($id);

		// var_dump($destination); die();

		$this->session->set_userdata('destination', $destination);

		// var_dump($this->session->all_userdata());

		redirect("/trips/get_users_by_id/$id");
	}

}