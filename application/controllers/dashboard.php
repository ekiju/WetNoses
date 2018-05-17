<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model("User");
        $this->load->model("Request");
        $this->load->model("Request_has_doggo");
        $this->load->model("Interest");
        $this->output->enable_profiler(TRUE);
	}
	public function index()
	{
		$this->load->view('landing');
    }
    public function login()
    {
        $this->load->view('login');
    }
    public function process_signin()
    {
        $email = $this->input->post("email");
        $password = $this->input->post("password");
        $user = $this->User->get_user_by_email($email);
        $encpass = md5($password. "secrethashing" .$user['salt']);
        var_dump($user['password'], $encpass);

		if($encpass == $user["password"])
		{
			$current_user = array(
                    "current_user_id" => $user["id"],
                    "current_user_email" => $user["email"],
                    "current_user_first_name" => $user["first_name"],
                    "current_user_last_name" => $user["last_name"],
                    "is_logged_in" => TRUE
            );
			$this->session->set_userdata($current_user);
            $this->session->set_flashdata("login_success", "You logged in successfully");
			redirect("/dashboard");
		}
		else
		{
			$this->session->set_flashdata("login_errors", "Invalid email or password!");
			redirect("/login");
		}
    }
    public function process_register()
    {
        $this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", "required|is_unique[users.email]|valid_email");		
		$this->form_validation->set_rules("first_name", "First Name", "required");
		$this->form_validation->set_rules("last_name", "Last Name", "required");
		$this->form_validation->set_rules("password", "Password", "required|min_length[8]");
		$this->form_validation->set_rules("confirm_password", "Password Confirmation", "required|matches[password]");
		if($this->form_validation->run() === TRUE)
		{
            $user = $this->User->register($this->input->post());
            $this->session->set_flashdata("register_success", 'Registered successfully. Please sign in.');
		}
		else
		{
			$this->session->set_flashdata("register_errors", validation_errors());
        }
        redirect('/login');
    }
    public function dash()
    {
        if($this->session->userdata("is_logged_in"))
		{
            $requests = $this->Request->get_all();
            $interests = $this->Interest->get_all_by_id($this->session->userdata('current_user_id'));
            $doggos = $this->Request_has_doggo->get_all();
            // var_dump($doggos);
			$this->load->view('dashboard', ["requests" => $requests, "interests"=>$interests, "doggos" => $doggos]);
		}
		else
		{
			$this->session->set_flashdata("errors", "Please sign in!");
			redirect("/");
		}
    }
    public function delete_request($id)
    {
        $this->Request->remove($id);
        redirect('/dashboard');
    }
    public function edit_request($id)
    {
        if(strtotime($this->input->post('date')) < strtotime("now"))
		{
			$this->session->set_flashdata('error', "The date must be set in the future!");
		}
		else
        $this->Request->update($id, $this->input->post());
        redirect('/dashboard');
    }
    public function view_request($id)
    {
        $requests = $this->Request_has_doggo->get_request($id);
        // var_dump($requests);
        $this->load->view('request', array('requests'=> $requests));
    }
    public function logout()
    {
        $this->session->sess_destroy();
		redirect("/");
    }
    public function userprofile($id)
    {
        $this->load->view('profile');
    }

}


