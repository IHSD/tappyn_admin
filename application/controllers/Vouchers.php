<?php defined("BASEPATH") or exit('No direct script access allowed');

class Vouchers extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('vouchers_library', 'pagination'));
        $this->data = array();
    }

    public function index()
    {
        $data = $this->vouchers_library->getAll();

        $config['base_url'] = base_url('vouchers/index');
        $config['total_rows'] = $data['count'];
        $config['per_page'] = $this->input->get('limit') ? $this->input->get('limit') : 25;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('vouchers/index', $data);
    }

    public function show($id = 0)
    {
        if(is_null($id)) redirect("vouchers/index", 'refresh');
        $this->vouchers_library->registerPostSelectCallback(array('uses_callback'));
        $voucher = $this->vouchers_library->select('*')->where('id', $id)->fetch()->row();
        $this->load->view('vouchers/show', array('voucher' => $voucher));
    }

    public function activate($id = 0)
    {
        if($this->db->where('id', $id)->update('vouchers', array('active' => 1)))
        {
            echo json_encode(array(
                'success' => true
            ));
        } else {
            echo json_encode(array(
                'success' => false
            ));
        }
    }

    public function deactivate($id = 0)
    {
        if($this->db->where('id', $id)->update('vouchers', array('active' => 0)))
        {
            echo json_encode(array(
                'success' => true
            ));
        } else {
            echo json_encode(array(
                'success' => false
            ));
        }
    }

    public function create()
    {
        if(isset($_POST) && !empty($_POST))
        {
            $this->form_validation->set_rules('code', 'Code', 'required|min_length[8]|max_length[16]|alpha_numeric');
            $this->form_validation->set_rules('discount_type', 'Discount Type', 'required|callback_discount_type_check');
            $this->form_validation->set_rules('value', 'Value', 'required');
            $this->form_validation->set_rules('expiration', 'Expiration', 'required|callback_expiration_check');
            if($this->input->post('expiration') == 'time_length')
            {
                $this->form_validation->set_rules('start_time', 'Start Time', "required");
                $this->form_validation->set_rules('stop_time', 'Stop Time', 'required');
            } else {
                $this->form_validation->set_rules('usage_limit', 'Usage Limit', 'required|is_natural_no_zero');
            }
            if($this->form_validation->run() === true)
            {
                $data = array(
                    'code' => strtoupper($this->input->post('code')),
                    'discount_type' => $this->input->post('discount_type'),
                    'value' => $this->input->post('value'),
                    'expiration' => $this->input->post('expiration'),
                    'starts_at' => $this->input->post('start_time') ? strtotime($this->input->post('start_time')) : NULL,
                    'ends_at' => $this->input->post('stop_time') ? strtotime($this->input->post('stop_time')) : NULL,
                    'usage_limit' => $this->input->post('usage_limit'),
                    'created_at' => time()
                );
            }
            if($this->form_validation->run() === true && $vid = $this->vouchers_library->create($data))
            {
                // Successfully created the voucher code
                $this->data['message'] = "Voucher {$data['code']} successfully created";
            } else {
                // There was an error creating the voucher
                $this->data['error'] = (validation_errors() ? validation_errors() : ($this->vouchers_library->errors() ? $this->voucher_library->errors() : "An unknown error occured"));
            }
        }
        $this->load->view('vouchers/create', $this->data);
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

    function discount_type_check($param)
    {
        $valid_params = array(
            'amount',
            'percentage'
        );
        if(in_array($param, $valid_params))
        {
            return TRUE;
        }
        $this->form_validation->set_message("discount_type_check", "The %s field must be either amount or percentage");
        return FALSE;
    }

    function expiration_check($param)
    {
        $valid_params = array(
            'uses',
            'time_length'
        );
        if(in_array($param, $valid_params))
        {
            return TRUE;
        }
        $this->form_validation->set_rules('expiration_check', "The %s field must be either uses or time_length");
        return FALSE;
    }
}
