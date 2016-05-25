<?php defined("BASEPATH") or exit('No direct script access allowed');

class Emails extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('email_library', 'pagination'));
    }

    public function index()
    {
        $data = $this->email_library->getAll();

        $config['base_url'] = base_url('emails/index');
        $config['total_rows'] = $data['count'];
        $config['per_page'] = $this->input->get('limit') ? $this->input->get('limit') : 25;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('emails/index', $data);
    }

    public function show()
    {

    }

    public function resend($eid)
    {
        $res = array();
        if($this->email_library->resend($eid))
        {
            $res['success'] = TRUE;
        }
        else
        {
            $res['success'] = FALSE;
            $res['error'] = $this->email_library->errors();
        }
        echo json_encode($res);
    }

    public function test()
    {

    }

    public function delete()
    {

    }
}
