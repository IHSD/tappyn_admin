<?php defined("BASEPATH") or exit('No direct script access allowed');

class Submissions extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('submission_library', 'pagination', 'contest_library', 'email_library', 'payout_library'));
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
        if($this->submission_library->delete($sid))
        {
            $this->session->set_flashdata('message', "Submission successfully deleted");
        } else {
            error_log($this->db->last_query());
            error_log(json_encode($this->db->error()));
            $this->session->set_flashdata('error', "There was an error deleting the submission");
        }
        redirect("contests/show/{$cid}", 'refresh');
    }

    public function confirm_delete($sid)
    {
        $submission = $this->submission_library->get($sid);
        if(!$submission)
        {
            $this->session->set_flashdata('error', "That submission does not exist");
            redirect("contests/show/{$cid}", 'refresh');
            return;
        }
        $this->load->view('submissions/confirm_delete', ['submission' => $submission]);
    }

    public function set_as_winner($cid, $sid)
    {
        $this->load->library("user_library");
        $res = array();
        // Check the contest exists
        $contest = $this->contest_library->select('*')->where('id', $cid)->fetch();
        if(!$contest || $contest->num_rows() == 0)
        {
            $res['success'] = FALSE;
            $res['error'] = "That contest does not exist";
            echo json_encode($res);
            return;
        }
        $contest = $contest->row();
        // Check the submission exists
        $submission = $this->submission_library->get($sid);
        if(!$submission)
        {
            $res['success'] = FALSE;
            $res['error'] = "That submission does not exist";
            echo json_encode($res);
            return;
        }
        // Check that the contest is over
        if($contest->stop_time > date('Y-m-d H:i:s'))
        {
            $res['success'] = FALSE;
            $res['error'] = "This contest has not ended yet";
            echo json_encode($res);
            return;
        }
        // Chech that a pyout doesnt already exist
        $payout = $this->payout_library->get(['contest_id' => $contest->id]);
        if($payout)
        {
            $res['error'] = "There is already a payout for this contest";
            $res['success'] = FALSE;
            echo json_encode($res);
            return;
        }
        $data = [
            'created_at' => time(),
            'contest_id' => $contest->id,
            'submission_id' => $submission->id,
            'claimed' => 0,
            'pending' => 1,
            'user_id' => $submission->owner->id,
            'amount' => $contest->prize * 100
        ];
        if($pid = $this->payout_library->create($data))
        {
            $res['success'] = TRUE;
            // Send post contest package to the winner
            $user = $this->user_library->get($contest->owner, FALSE);
            $this->session->set_flashdata('message', 'Winner successfully selected');
            $data = [
                'queued_at' => time(),
                'sent_at' => null,
                'failure_reason' => null,
                'recipient' => $user->email,
                'recipient_id' => $user->id,
                'email_type' => 'post_contest_package',
                'object_type' => 'contest',
                'object_id' => $contest->id,
                'opened' => 0,
                'clicks' => 0
            ];
            if(!$this->email_library->create($data))
            {
                error_log($this->db->error()['message']);
            }
            $submissions = $this->submission_library->get_in_contest($contest->id);

            foreach($submissions as $entry)
            {
                $user = $this->user_library->get($entry->owner->id, FALSE);

                if($entry->id == $sid)
                {
                    $data = [
                        'queued_at' => time(),
                        'sent_at' => null,
                        'failure_reason' => null,
                        'recipient' => $user->email,
                        'recipient_id' => $entry->owner->id,
                        'email_type' => 'submission_chosen',
                        'object_type' => 'contest',
                        'object_id' => $contest->id,
                        'opened' => 0,
                        'clicks' => 0
                    ];

                    if(!$this->email_library->create($data))
                    {
                        error_log($this->db->error()['message']);
                        error_log("Error sending some emails");
                    }

                } else {
                    $data = [
                        'queued_at' => time(),
                        'sent_at' => null,
                        'failure_reason' => null,
                        'recipient' => $user->email,
                        'recipient_id' => $entry->owner->id,
                        'email_type' => 'winner_announced',
                        'object_type' => 'contest',
                        'object_id' => $contest->id,
                        'opened' => 0,
                        'clicks' => 0
                    ];

                    if(!$this->email_library->create($data))
                    {
                        error_log($this->db->error()['message']);
                        error_log("Error sending some emails");
                    }
                }

                $user = NULL;
            }
            echo json_encode($res);
        }
        else
        {
            $res['success'] = FALSE;
            $res['error'] = 'There was an error selecting winners';
            echo json_encode($res);
        }
    }

    public function edit()
    {

    }

    public function update()
    {

    }
}
