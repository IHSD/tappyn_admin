<?php defined("BASEPATH") or exit('No direct script access allowed');

class Stripe extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('stripe_library');
    }

    /**
     * Generate our stripe dashboard
     * @return void
     */
    public function index()
    {
        $data = array();
        if($this->session->flashdata('message')) $data['message'] = $this->session->flashdata('message');
        if($this->session->flashdata('error')) $data['error'] = $this->session->flashdata('error');
        $data['balance'] = \Stripe\Balance::retrieve();
        $data['disputes'] = \Stripe\Dispute::all(array("limit" => 10));
        $data['balance_transactions'] = \Stripe\BalanceTransaction::all(array(
            "limit" => 10
        ));
        $data['transfers'] = \Stripe\Transfer::all(array(
            "limit" => 5
        ));
        $this->load->view('stripe/home', $data);
    }

    public function balance()
    {
        $data = array();
        $data['amount'] = $this->input->post('amount') * 100;
        $stripe_token = $this->input->post('stripeToken');
        try {
            $charge = \Stripe\Charge::create(array(
                'amount' => $data['amount'],
                'currency' => 'usd',
                'source' => $stripe_token,
                'description' => "Adding ".$data['amount']." to Tappyn account balance"
            ));
        } catch(Exception $e) {
            $this->session->set_flashdata('error', $e->getMessage());    
            redirect('stripe/index', 'refresh');
        }
        $this->session->set_flashdata('message', "$".$this->input->post('amount')." successfully added to the account");
        redirect('stripe/index', 'refresh');
    }
}
