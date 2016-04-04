<?php defined("BASEPATH") or exit('No direct script access allowed');

class Vouchers_library
{
    public function __construct()
    {
        $this->load->model('voucher');
        $this->registerPostSelectCallback(array(

        ));
    }

    public function __call($method, $args)
    {
        if(! method_exists($this->voucher, $method))
        {
            throw new Exception("Undefined method Voucher_library::{$method}()");
        }
        return call_user_func_array(array($this->voucher, $method), $args);
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }


    public function getAll()
    {
        $this->processReportQueryString();
        $count = $this->voucher->count();
        $vouchers = $this->voucher->fetch()->result();
        return array(
            'count' => $count,
            'vouchers' => $vouchers
        );
    }


    public function get($id)
    {
        // $this->registerPostSelectCallback('account_callback');
        // return $this->voucher->where('users.id', $id)->join('profiles', 'users.id = profiles.id', 'left')->limit(1)->fetch()->row();
    }

    public function processReportQueryString()
    {
        if($this->input->get('fields')) $this->voucher->select($this->input->get('fields'));
        if($this->input->get('title')) $this->voucher->like('title', $this->input->get('title'));
        $limit = 25;
        $offset = 0;
        if($this->input->get('limit')) $limit = $this->input->get('limit');
        if($this->input->get('offset')) $offset = $this->input->get('offset');

        $this->voucher->limit($limit)->offset($offset);
        if($this->input->get('sort_by') && $this->input->get('sort_dir'))
        {
            $this->voucher->order_by($this->input->get('sort_by'), $this->input->get('sort_dir'));
        } else if($this->input->get('sort_by'))
        {
            $this->voucher->order_by($this->input->get('sort_by'), 'desc');
        }
    }
}
