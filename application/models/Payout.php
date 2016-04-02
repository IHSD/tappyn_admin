<?php defined("BASEPATH") or exit('No direct script access allowed');

class Payout extends BaseModel
{
    protected $table = 'payouts';
    public function __construct()
    {
        parent::__construct();
    }
}
