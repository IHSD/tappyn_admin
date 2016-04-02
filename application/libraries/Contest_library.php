<?php defined("BASEPATH") or exit('No direct script access allowed');

class Contest_library
{
    public function __construct()
    {
        $this->load->model('contest');
        $this->registerPostSelectCallback(array(
            'submission_count_callback',
            'vote_callback',
            'company_callback',
            'share_callback',
            'views_callback'
        ));
    }

    public function __call($method, $args)
    {
        if(! method_exists($this->contest, $method))
        {
            throw new Exception("Undefined method Contest_library::{$method}()");
        }
        return call_user_func_array(array($this->contest, $method), $args);
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }


    public function getAll()
    {
        $this->processReportQueryString();
        $count = $this->contest->count();
        $contests = $this->contest->fetch()->result();
        return array(
            'count' => $count,
            'contests' => $contests
        );
    }

    public function processReportQueryString()
    {
        if($this->input->get('fields')) $this->contest->select($this->input->get('fields'));
        if($this->input->get('title')) $this->contest->like('title', $this->input->get('title'));
        $limit = 25;
        $offset = 0;
        if($this->input->get('limit')) $limit = $this->input->get('limit');
        if($this->input->get('offset')) $offset = $this->input->get('offset');

        $this->contest->limit($limit)->offset($offset);
        if($this->input->get('sort_by') && $this->input->get('sort_dir'))
        {
            $this->contest->order_by($this->input->get('sort_by'), $this->input->get('sort_dir'));
        } else if($this->input->get('sort_by'))
        {
            $this->contest->order_by($this->input->get('sort_by'), 'desc');
        }
        if($this->input->get('status'))
        {
            switch($this->input->get('status'))
            {
                case 'active':
                    $this->contest->where(array('start_time <' => date('Y-m-d H:i:s'), 'stop_time >' => date('Y-m-d H:i:s'), 'paid' => 1));
                    break;
                case 'unpaid':
                    $this->contest->where('paid', 0);
                    break;
                case 'completed':
                    $this->contest->where(array('paid' => 1, 'stop_time <' => date('Y-m-d H:i:s')));
                    break;
            }
        }

    }
}
