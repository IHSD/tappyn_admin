<?php defined("BASEPATH") or exit('No direct script access allowed');

class Contests extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('contest_library', 'submission_library', 'pagination', 'payout_library'));
    }

    public function index()
    {
        $data = $this->contest_library->getAll();

        $config['base_url'] = base_url('contests/index');
        $config['total_rows'] = $data['count'];
        $config['per_page'] = $this->input->get('limit') ? $this->input->get('limit') : 25;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('contests/index', $data);
    }

    public function show($cid = NULL)
    {
        $this->contest->registerPostSelectCallback(array('format_callback'));
        if(is_null($cid)) redirect("contests/index", 'refresh');
        $contest = $this->contest_library->select('*')->where('id', $cid)->fetch()->row();
        $submissions = $this->submission_library->inContest($cid);

        $contest->payout = $this->payout_library->select('*')->from('payouts')->where('contest_id', $cid)->fetch()->row();
        if($contest->payout)
        {
            $winning_sub = FALSE;
            foreach($submissions as $key => $sub)
            {
                $submissions[$key]->winner = FALSE;
                if($contest->payout->submission_id == $sub->id)
                {
                    $winning_sub = TRUE;
                    $submission[$key]->winner = TRUE;
                    $submish = $sub;
                    unset($submissions[$key]);
                }
            }
            if($winning_sub)
            {
                $submissions = array_values(array($submish) + $submissions);
            }
        }
        $contest->submissions = $submissions;
        $this->load->view('contests/show', array('contest' => $contest));
    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function submissions_by_time_range($contest_id)
    {
        $results = array();
        $db = $this->load->database('master', TRUE);
        $data = $db->select('COUNT(*) as count, DATE(created_at) as created')->from('submissions')->where('contest_id', $contest_id)->group_by('created')->order_by('created', 'desc')->get();
        if(!$data)
        {
            die($this->db->error()['message']);
        }
        foreach($data->result() as $datum)
        {
            $results[] = array(
                'date' => $datum->created,
                'count' => $datum->count
            );
        }
        echo json_encode(array(
            'success' => true,
            'data' => array_reverse($results)
        ));
    }
}
