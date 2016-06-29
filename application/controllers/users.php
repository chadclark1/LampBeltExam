<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}

	public function dashboard()
	{

		$this->load->model('User');

		$users = $this->User->get_users();

		$this->session->set_userdata('users', $users);

		redirect("/items/show_items");

		// $this->load->view('dashboard');
	}

	public function login()
	{

		$this->load->model('User');

		$user_info=$this->input->post();
		$username = $this->input->post('username');
        $password = $this->input->post('password');


		$this->load->library("form_validation");
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');


		if($this->form_validation->run() === FALSE)
		{
		     $this->session->set_flashdata("login_error", "The username or password is incorrect");
            redirect("/");
		}

		$user_data = $this->User->get_user_by_username($user_info['username']);



        if($user_data == NULL){
			$this->session->set_flashdata("login_error", "The username or password is incorrect");
            redirect("/");
		}

		 $encrypted_password = md5($password . '' . $user_data['salt']);

		 if($user_data['password'] === $encrypted_password){

        	$user = array(
               'user_username' => $user_data['username'],
               'user_first_name' => $user_data['first_name'],
               'user_last_name' => $user_data['last_name'],
               'is_logged_in' => true,
               'user_id' => $user_data['id']
            );

        	$this->session->set_userdata($user);

        	// $this->show($user_data['id']);
        	$this->dashboard();
        } else {
      
			$this->session->set_flashdata("login_error", "The username or password is incorrect.");
            redirect("/");
		}


	}


	public function register()
	{

		$this->load->model('User');

		

		// var_dump($this->input->post()); die();

		$user_info=$this->input->post();



		// var_dump($user_info);

		$this->load->library("form_validation");
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]', array(
                'required'      => 'You have not provided %s.'
        ));
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]',  array(
                'required'      => 'You have not provided %s.'
        ));
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]', array(
                'required'      => 'You have not provided %s.'
        ));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]', array(
                'required'      => 'You have not provided %s.'
        ));
		$this->form_validation->set_rules('confirm', 'Password Confirmation', 'trim|required|matches[password]', array(
                'required'      => 'You have not provided %s.'
        ));
        $this->form_validation->set_rules('date', 'Date Hired', 'callback_date_check');


		
		if($this->form_validation->run() === FALSE)
		{
		     $this->session->set_flashdata("login_error", validation_errors());
            redirect("/");
		}


		date_default_timezone_set('America/Los_Angeles');

		$date = $this->input->post('date');
		// var_dump($date); die();
		$today = date('Y/m/d');

		if($date > $today){
			$this->session->set_flashdata('login_error', "'Date Hired' cannot be a future date");
            redirect("/");
		}








		$username = $this->User->get_user_by_username($user_info['username']);


		if($username != NULL){
			$this->session->set_flashdata("login_error", "There is already and account associated with this username");
            redirect("/users/registration");
		} else {


			$password = $user_info['password'];
			

			$salt = bin2hex(openssl_random_pseudo_bytes(22));

			$encrypted_password = md5($password . '' . $salt);

			$this->User->add($user_info, $salt, $encrypted_password);

			$id = $this->User->get_user_by_username($user_info['username']);



			// var_dump($id); die();

			$user = array(
               'user_username' => $user_info['username'],
               'user_first_name' => $user_info['first_name'],
               'user_last_name' => $user_info['last_name'],
               'is_logged_in' => true,
               'user_id' => $id['id']
            );

		}
		

		// var_dump($this->User->add($user_info, $salt, $encrypted_password)); die();

		$this->session->set_userdata($user);

		// echo "success"; die();

		$this->dashboard();

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
                    $this->form_validation->set_message('date_check', 'Please format the dates as YYYY/MM/DD');
                    return FALSE; 
                }
            
		}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

}
