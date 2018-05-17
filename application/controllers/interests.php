<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Interests extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model("Request");
        $this->load->model("Interest");
        $this->load->model("Transaction");
        $this->output->enable_profiler(TRUE);
	}
	public function interested($reqid)
	{
        $this->Interest->create($reqid);
        redirect('/dashboard');
    }
    public function accept($reqid)
    {
        $this->Transaction->create($this->input->post(), $reqid);
        $this->Request->change_status_to_pending($reqid);
        redirect('/dashboard/view_request',$reqid);
        // get the req id and create new transaction
        // change the req status to 'pending'
        // if pending, create another disabled button pending and also include a cancel button that will just delete the accept to request. once the cancel button is clicked, delete the transaction and change status back to 'active'
        // once the owner approves this again, change transaction status to 'complete'

    }
    public function cancel($reqid)
    {
        $this->Transaction->cancel($reqid);
        redirect('/dashboard');
    }


}


