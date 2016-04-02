<?php defined("BASEPATH") or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('ion_auth'));

        if(!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }

        $this->user = $this->ion_auth->user()->row();
        
        if(!is_ajax())
        {
            $this->load->view('templates/navbar', array('user' => $this->user));
        }
    }
}
