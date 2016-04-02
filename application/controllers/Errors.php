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
}
