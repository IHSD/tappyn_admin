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

    public function send_to_me($id)
    {
        $res = array();
        $user_email = $this->ion_auth->user()->row()->email;
        $email = $this->email_library->get($id);
        if(!$email)
        {
             $res['success'] = FALSE;
             $res['error'] = "That email does not exist";
        } else {
            $data = [
                'queued_at' => time(),
                'sent_at' => null,
                'failure_reason' => null,
                'recipient' => $user_email,
                'recipient_id' => 1,
                'type' => $email->email_type,
                'object_type' => $email->object_type,
                'object_id' => $email->object_id,
                'opened' => 0,
                'clicks' => 0
            ];

            if($this->email_library->create($data))
            {
                $res['success'] = TRUE;
            } else {
                $res['success'] = FALSE;
                $res['error'] = $this->email_library->errors();
            }
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
