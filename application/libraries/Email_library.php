<?php defined("BASEPATH") or exit('No direct script access allowed');

class Email_library
{
    public function __construct()
    {
        $this->load->model('email_model');
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }

    public function getAll()
    {
        $this->processReportQueryString();
        $count = $this->email_model->count();
        $emails = $this->email_model->fetch()->result();
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
        if($this->input->get('fields')) $this->email_model->select($this->input->get('fields'));
        $limit = 25;
        $offset = 0;
        if($this->input->get('limit')) $limit = $this->input->get('limit');
        if($this->input->get('offset')) $offset = $this->input->get('offset');

        $this->email_model->limit($limit)->offset($offset);
        if($this->input->get('sort_by') && $this->input->get('sort_dir'))
        {
            $this->email_model->order_by($this->input->get('sort_by'), $this->input->get('sort_dir'));
        } else if($this->input->get('sort_by'))
        {
            $this->email_model->order_by($this->input->get('sort_by'), 'desc');
        }
    }
}
