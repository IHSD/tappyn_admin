<?php defined("BASEPATH") or exit('No direct script access allowed');

class Submission_library
{
    public function __construct()
    {
        $this->load->model('submission');
        $this->registerPostSelectCallback('votes_callback');
        $this->registerPostSelectCallback('owner_callback');
    }

    public function __call($method, $args)
    {
        if(! method_exists($this->submission, $method))
        {
            throw new Exception("Undefined method Submission_library::{$method}()");
        }
        return call_user_func_array(array($this->submission, $method), $args);
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }


    public function getAll()
    {
        $this->registerPostSelectCallback('contest_callback');
        $this->submission->select('id,created_at,owner,attachment,headline,description,text,link_explanation,contest_id');
        $this->processReportQueryString();
        $count = $this->submission->count();
        $submissions = $this->submission->fetch()->result();
        return array(
            'count' => $count,
            'submissions' => $submissions
        );
    }

    public function get($id)
    {
        $this->registerPostSelectCallback('contest_callback');
        $submission = $this->submission->where('id', $id)->limit(1)->fetch()->row();
        return $submission;
    }
    public function inContest($cid)
    {
        return $this->submission->where('contest_id', $cid)->fetch()->result();
    }

    public function processReportQueryString()
    {
        if($this->input->get('fields')) $this->submission->select($this->input->get('fields'));
        if($this->input->get('title')) $this->submission->like('title', $this->input->get('title'));
        $limit = 25;
        if($this->input->get('limit') && $this->input->get('offset'))
        {
            $this->submission->limit($this->input->get('limit'), $this->input->get('offset'));
        } else if($this->input->get('offset'))
        {
            $this->submission->limit(25, $this->input->get('offset'));
        } else if($this->input->get('limit'))
        {
            $this->submission->limit($this->input->get('limit'), 0);
        }
        else
        {
            $this->submission->limit(25, 0);
        }
        if($this->input->get('sort_by') && $this->input->get('sort_dir'))
        {
            $this->submission->order_by($this->input->get('sort_by'), $this->input->get('sort_dir'));
        } else if($this->input->get('sort_by'))
        {
            $this->submission->order_by($this->input->get('sort_by'), 'desc');
        }
        if($this->input->get('owner')) $this->submission->where('owner', $this->input->get('owner'));
        if($this->input->get('contest')) $this->submission->where('contest', $this->input->get('contest'));
    }
}
