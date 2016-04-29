<?php defined("BASEPATH") or exit('No direct script access allowed');

class Submissions extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('submission_library', 'pagination'));
    }

    public function index()
    {
        $data = $this->submission_library->getAll();

        $config['base_url'] = base_url('submissions/index');
        $config['total_rows'] = $data['count'];
        $config['per_page'] = $this->input->get('limit') ? $this->input->get('limit') : 25;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('submissions/index', $data);
    }

    public function show($sid)
    {
        $submission = $this->submission_library->get($sid);

        $this->load->view('submissions/show', array('submission' => $submission));
    }

    public function delete($cid, $sid)
    {
        $submission = $this->submission_library->get($sid);
        if(!$submission)
        {
            $this->session->set_flashdata('error', "That submission does not exist");
            redirect("contests/show/{$cid}", 'refresh');
            return;
        }
        if($this->db->where('id', $sid)->delete('submissions'))
        {
            $this->session->set_flashdata('message', "Submission successfully deleted");
        } else {
            $this->session->set_flashdata('error', "There was an error deleting the submission");
        }
        redirect("contests/show/{$cid}", 'refresh');
    }

    public function edit()
    {

    }

    public function update()
    {

    }
}
