<?php defined("BASEPATH") or exit('No direct script access allowed');

class User_library
{
    public function __construct()
    {
        $this->load->model('user_model');
        $this->registerPostSelectCallback(array(

        ));
    }

    public function __call($method, $args)
    {
        if(! method_exists($this->user_model, $method))
        {
            throw new Exception("Undefined method User_library::{$method}()");
        }
        return call_user_func_array(array($this->user_model, $method), $args);
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }


    public function getAll($params)
    {
        $this->processReportQueryString();
        $this->user_model->select('users.*, profiles.age, profiles.gender,profiles.state,users_groups.user_id,users_groups.group_id')->join('profiles', 'users.id = profiles.id', 'left')->join('users_groups', 'users.id = users_groups.user_id', 'left')->where('users_groups.group_id', 2);
        $count = $this->user_model->count();
        $users = $this->user_model->fetch()->result();
        return array(
            'count' => $count,
            'users' => $users
        );
    }

    public function get($id)
    {
        $this->registerPostSelectCallback('account_callback');
        return $this->user_model->where('users.id', $id)->join('profiles', 'users.id = profiles.id', 'left')->limit(1)->fetch()->row();
    }

    public function processReportQueryString()
    {
        if($this->input->get('fields')) $this->user_model->select($this->input->get('fields'));
        $limit = 25;
        $offset = 0;
        if($this->input->get('limit')) $limit = $this->input->get('limit');
        if($this->input->get('offset')) $offset = $this->input->get('offset');

        $this->user_model->limit($limit)->offset($offset);
        if($this->input->get('sort_by') && $this->input->get('sort_dir'))
        {
            $this->user_model->order_by($this->input->get('sort_by'), $this->input->get('sort_dir'));
        } else if($this->input->get('sort_by'))
        {
            $this->user_model->order_by($this->input->get('sort_by'), 'desc');
        }
        if($this->input->get('active'))
        {
            $this->user_model->where('active', $this->input->get('active'));
        }
        if($this->input->get('email')) $this->user_model->like('email', $this->input->get('email'), 'both');
        if($this->input->get('facebook')) $this->user_model->where('facebook_login', $this->input->get('facebook_login'));
    }
}
