<?php defined("BASEPATH") or exit('No direct script access allowed');

class Ads extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ad_model');
        $this->load->library(array('pagination'));
    }

    public function index()
    {
        $data        = array();
        $data['ads'] = $this->ad_model->by_company()->fetch()->result();

        $config['base_url']    = base_url('ads/index');
        $config['total_rows']  = count($data['ads']);
        $config['per_page']    = $this->input->get('limit') ? $this->input->get('limit') : 25;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('ads/index', $data);
    }

    public function import()
    {
        $data = array();
        $post = $this->input->post();

        try {
            if (isset($post['csv_data'])) {
                $post['csv_data'] = json_decode($post['csv_data'], true);
                if (!$post['csv_data']) {
                    throw new Exception("no csv data");
                }
                var_dump($post);
            }

        } catch (Exception $e) {
            $data['msg'] = $e->getMessage();
        }

        $this->load->view('ads/import', $data);
    }

    public function show()
    {

    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

}
