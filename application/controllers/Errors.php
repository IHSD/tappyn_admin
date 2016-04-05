<?php defined("BASEPATH") or exit('No direct script access allowed');

class Errors extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function show_404()
    {
        $this->load->view('errors/404');
    }

    public function show_500()
    {
        $this->load->view('errors/500');
    }

    public function unauthorized()
    {
        $this->load->library('ion_auth');
        if(!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
        $user = $this->ion_auth->user()->row();
        $this->load->view('templates/navbar', array('user' => $user));
        $this->load->view('errors/unauthorized');
    }
}
