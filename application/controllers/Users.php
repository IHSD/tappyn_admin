<?php defined("BASEPATH") or exit('No direct script access allowed');

class Users extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('user_library', 'pagination', 'submission_library', 'payout_library'));
    }

    public function index()
    {
        $data = $this->user_library->getAll();

        $config['base_url'] = base_url('users/index');
        $config['total_rows'] = $data['count'];
        $config['per_page'] = $this->input->get('limit') ? $this->input->get('limit') : 25;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('users/index', $data);
    }

    public function search()
    {
        $uid = NULL;
        $string = $this->input->post('search');
        if(is_numeric($string))
        {
            // Let's search by UID
            $user = $this->user_library->select('*')->where('id', $string)->limit(1)->fetch();
            if($user && $user->num_rows() == 1)
            {
                $uid= $user->row()->id;
            }
        } else {
            // Let's search for the email
            $users = $this->user_library->select('*')->like('email', $string)->limit(25)->fetch();
            if($users->num_rows() == 1)
            {
                redirect('users/show/'.$users->result()[0]->id, 'refresh');
            } else {
                redirect('users/index?email='.$string, 'refresh');
            }
        }

        $this->session->set_flashdata('error', "We couldnt find out what you were looking for");
        redirect('users/index', 'refresh');
    }

    public function show($uid)
    {
        $user = $this->user_library->get($uid);
        $this->submission_library->registerPostSelectCallback('contest_callback');
        $user->submissions = $this->submission_library->where('owner', $user->id)->limit(5)->order_by('created_at', 'desc')->fetch()->result();
        $user->payouts = $this->payout_library->select('*')->from('payouts')->where('user_id', $uid)->fetch()->result();
        $this->load->view('users/show', array('user' => $user));
    }

    public function submissions_by_date($uid)
    {
        $results = array();
        $this->submission_library->clearCallbacks();
        $temp_data = $this->submission_library->select('COUNT(*) as count, DATE(created_at) as created')->where('owner', $uid)->group_by('created')->order_by('created', 'desc')->fetch()->result();
        $dates = array();
        for($i = 0; $i < 30; $i++)
        {
            $dates[] = date("Y-m-d", strtotime("-{$i} days"));
        }

        foreach($dates as $result)
        {
            $count = 0;
            foreach($temp_data as $datum)
            {
                if($datum->created == $result)
                {
                    $count = $datum->count;
                }
            }
            $results[] = array(
                'date' => $result,
                'count' => $count
            );
        }

        echo json_encode(array(
            'success' => true,
            'data' => array_reverse($results)
        ));
    }

    public function account($account_id)
    {
        $this->load->library('stripe_account_library');
        echo json_encode($this->stripe_account_library->get($account_id));
    }

    public function votes_by_date()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function deactivate()
    {

    }

    public function activate()
    {

    }

    public function delete()
    {

    }
}
