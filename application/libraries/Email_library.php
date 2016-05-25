<?php defined("BASEPATH") or exit('No direct script access allowed');

class Email_library
{
    public function __construct()
    {
        $this->load->model('email');
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }

    public function getAll()
    {
        $this->processReportQueryString();
        $count = $this->email->count();
        $emails = $this->email->fetch()->result();
        return array(
            'count' => $count,
            'emails' => $emails
        );
    }

    public function get()
    {

    }

    public function processReportQueryString()
    {
        if($this->input->get('fields')) $this->email->select($this->input->get('fields'));
        $limit = 25;
        $offset = 0;
        if($this->input->get('limit')) $limit = $this->input->get('limit');
        if($this->input->get('offset')) $offset = $this->input->get('offset');

        $this->email->limit($limit)->offset($offset);
        if($this->input->get('sort_by') && $this->input->get('sort_dir'))
        {
            $this->email->order_by($this->input->get('sort_by'), $this->input->get('sort_dir'));
        } else if($this->input->get('sort_by'))
        {
            $this->email->order_by($this->input->get('sort_by'), 'desc');
        }
    }
}
