<?php defined("BASEPATH") or exit('No direct script access allowed');

class Ads extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ad_model');
    }

    public function index()
    {
        $ads = $this->ad_model->by_company()->get()->result();
        $this->load->view('ads/index', $data);
    }

    public function show($cid = null)
    {
        $this->contest->registerPostSelectCallback(array('format_callback'));
        if (is_null($cid)) {
            redirect("contests/index", 'refresh');
        }

        $contest              = $this->contest_library->select('*')->where('id', $cid)->fetch()->row();
        $contest->submissions = $this->submission_library->inContest($cid);

        $contest->payout = $this->payout_library->select('*')->from('payouts')->where('contest_id', $cid)->fetch()->row();
        if ($contest->payout) {
            $winning_sub = false;
            foreach ($contest->submissions as $key => $sub) {
                $contest->submissions[$key]->winner = false;
                if ($contest->payout->submission_id == $sub->id) {
                    $winning_sub                        = true;
                    $contest->submissions[$key]->winner = true;
                    $submish                            = $sub;
                    unset($contest->submissions[$key]);
                }
            }
            if ($winning_sub) {
                $contest->submissions = array_values(array($submish) + $contest->submissions);
            }
        }
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

}
