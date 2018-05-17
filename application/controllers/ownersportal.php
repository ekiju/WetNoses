<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ownersportal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model("User");
        $this->load->model("Request");
        $this->load->model("Doggo");
        $this->load->model("Request_has_doggo");
        $this->output->enable_profiler(TRUE);
	}
	public function dash()
	{
        $actives = $this->Request->get_active();
        $doggos = $this->Doggo->get_doggos_by_owner_id($this->session->userdata['current_user_id']);
		$this->load->view('ownersportal', ['actives'=>$actives, 'doggos' => $doggos]);
    }
    public function view($id)
    {
        $doggo = $this->Doggo->get_doggo_by_id($id);
        $events = $this->Request_has_doggo->get_request($id);

        $this->load->view('doggo', ['doggo'=>$doggo, 'error' => '', 'events'=> $events]);
    }
    public function add()
    {
        $this->Doggo->add_doggo($this->input->post());
        redirect('/ownersportal');
    }
    public function image($doggo_id)
    {
        $image = file_get_contents($_FILES['image']['tmp_name']); 
        $image_caption = $this->input->post('image_caption');
        $this->Doggo->add_image($doggo_id, $image, $image_caption);
        redirect('/ownersportal/view/'.$doggo_id);

    }
    public function new()
    {
        // var_dump($this->input->post());
        if(strtotime($this->input->post('date')) < strtotime("now"))
		{
			$this->session->set_flashdata('date_error', "The date must be set in the future!");
		}
        else
        {
            $this->Request->create_request($this->input->post());
            $request = $this->Request->get_last();
            // var_dump($request);
            foreach($this->input->post('doggo_id') as $doggo_id)
            {
                $this->Request_has_doggo->create($request['id'], $doggo_id);
            }
        }
        redirect('/ownersportal');
    }
}
