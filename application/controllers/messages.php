<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model("User");
        $this->load->model("Request");
        $this->load->model("Request_has_doggo");
        $this->load->model("Message");
        $this->load->model("Conversation");
        $this->output->enable_profiler(TRUE);
	}
    public function new()
    {
        $convos = $this->Conversation->find_convo($this->input->post('sender_id'), $this->input->post('recipient_id'));
        if (count($convos) < 1) 
        {
            $this->Conversation->create();
            $convo = $this->Conversation->get_last();
            $convo = $convo['id'];
        }
        else
        {
            $convo = $convos[0]['convo_id'];
        }
        $this->Message->create($convo,$this->input->post());
        redirect('/dashboard');
    }
    public function show()
    {
        // $inbox_messages = $this->Message->get_inbox_by_userid($this->session->userdata('current_user_id'));
        // $outbox_messages = $this->Message->get_outbox_by_userid($this->session->userdata('current_user_id'));
        // $this->load->view('messages', array('inbox_messages'=>$inbox_messages, 'outbox_messages'=>$outbox_messages));
        $messages = $this->Conversation->get_user_convos($this->session->userdata('current_user_id'));
        // var_dump($messages);
        $this->load->view('messages', array('messages'=>$messages));
    }


}


