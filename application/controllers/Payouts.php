<?php defined("BASEPATH") or exit('No direct script access allowed');

class Payouts extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('payout_library', 'pagination'));
    }

    public function index()
    {
        $data = $this->payout_library->getAll();

        $config['base_url'] = base_url('payouts/index');
        $config['total_rows'] = $data['count'];
        $config['per_page'] = $this->input->get('limit') ? $this->input->get('limit') : 25;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('payouts/index', $data);
    }

    public function show($pid = NULL)
    {
        $this->payout->registerPostSelectCallback(array('format_callback'));
        if(is_null($pid)) redirect("contests/index", 'refresh');
        $payout = $this->payout_library->select('*')->where('id', $cid)->fetch()->row();
        $this->load->view('payouts/show', array('payout' => $payout));
    }

    public function update()
    {

    }

    public function edit()
    {

    }

    public function delete()
    {

    }
}
