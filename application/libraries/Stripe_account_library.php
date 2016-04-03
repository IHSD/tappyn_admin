<?php defined("BASEPATH") or exit('No direct script access allowed');

class Stripe_account_library
{
    protected $api_key;
    protected $errors = FALSE;
    public function __construct()
    {
        $this->config->load('secrets');
        $this->api_key = $this->config->item('stripe_api_key');
        \Stripe\Stripe::setApiKey($this->api_key);
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }

    public function addSource($aid, $token)
    {
        try {
            $account = \Stripe\Account::retrieve($aid);
            $account->external_accounts->create(array("external_account" => $token));
            $account->save();
        } catch(Exception $e) {
            $this->errors = $e->getMessage();
            return FALSE;
        }
        return TRUE;
    }

    /**
     * Set A Default Payment Source
     * @todo   Convert to Stripe SDK
     * @param  string $aid Account ID
     * @param  string $sid Source ID
     * @return mixed
     */
    public function setAsDefault($aid, $sid)
    {
        $c = curl_init();
        curl_setopt($c, CURLOPT_HTTPHEADER, array("Authorization: Bearer {$this->api_key}"));
        $url = "https://api.stripe.com/v1/accounts/{$aid}/external_accounts/{$sid}?default_for_currency=true";
        error_log($url);
        curl_setopt($c, CURLOPT_URL, $url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_POST, 1);
        $res =  curl_exec($c);
        $response = json_decode($res);
        if(is_null($response))
        {
            $this->errors = "An unknown error occured";
            return false;
        }
        error_log($res);
        if(isset($response->error))
        {
            $this->errors = $response->error->message;
            return FALSE;
        }
        return TRUE;
    }

    /**
     * Remove a payment source
     * @todo   Convert to Stripe SDK
     * @param  string $aid Account ID
     * @param  string $sid Source ID
     * @return mixed
     */
    public function removeSource($aid, $sid)
    {
        $c = curl_init();
        curl_setopt($c, CURLOPT_HTTPHEADER, array("Authorization: Bearer {$this->api_key}"));
        $url = "https://api.stripe.com/v1/accounts/{$aid}/external_accounts/{$sid}";
        error_log($url);
        curl_setopt($c, CURLOPT_URL, $url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_CUSTOMREQUEST, "DELETE");
        $res =  curl_exec($c);
        $response = json_decode($res);
        if(is_null($response))
        {
            $this->errors = "An unknown error occured";
            return false;
        }
        error_log($res);
        if(isset($response->error))
        {
            $this->errors = $response->error->message;
            return FALSE;
        }
        return TRUE;
    }

    public function get($aid)
    {
        try {
            $account = \Stripe\Account::retrieve($aid);
        } catch(Exception $e) {
            $this->errors = $e->getMessage();
            return false;
        }
        return $account;
    }

    public function updateTransferStatus($account)
    {
        $account_data = $this->db->select('*')->from('stripe_accounts')->where('account_id', $account->id)->limit(1)->get();
        if($account_data && $account_data->num_rows () == 1)
        {
            echo "1";
            $account_data = $account_data->row();
            // Check if our stripe account has been updated as enabled
            if($account_data->transfers_enabled == FALSE && $account->transfers_enabled == TRUE)
            {
                echo "2";
                // We trigger the update, and transfer all pending payouts to our newly enabled account
                $payouts = $this->db->select('*')->from('payouts')->where(array('user_id' => $account_data->user_id, 'pending' => 0))->get();
                echo "Payouts to process => ".$payouts->num_rows();
                if(!$payouts || $payouts->num_rows() == 0) return FALSE;
                echo "3";
                $payouts = $payouts->result();
                foreach($payouts as $payout)
                {
                    echo "transfering payout to account";
                    $this->load->library('stripe/stripe_transfer_library');
                    if($transfer = $this->stripe_transfer_library->create($account_data->account_id, $payout->contest_id, $payout->amount))
                    {
                        // Update that our payout has been claimed
                        $this->db->where('id', $payout->id)->update('payouts', array('account_id' => $account_data->account_id, 'transfer_id' => $transfer->id, 'pending' => 0, 'claimed' => 1));
                    } else {
                        echo $this->stripe_transfer_library->errors();
                    }
                }
            }
        }
    }

    public function errors()
    {
        return $this->errors;
    }
}
