<?php defined("BASEPATH") or exit('No direct script access allowed');

class Payout extends BaseModel
{
    protected $table = 'payouts';
    public function __construct()
    {
        parent::__construct();
    }

    public function create($data)
    {
        if($this->db->insert($this->table, $data))
        {
            return $this->db->insert_id();
        }
        $this->errors = "There was an error creating the payout";
        error_log($this->db->error()['message']);
        return FALSE;
    }
}
