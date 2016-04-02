<?php defined("BASEPATH") or exit('No direct script access allowed');

class User_model extends BaseModel
{
    protected $table = 'users';

    protected $select = 'users.id,ip_address,email,created_on,last_login,active,first_name,last_name,points,facebook_login,profiles.*';
    public function __construct()
    {
        parent::__construct();
    }

    public function account($uid)
    {
        return $this->db->select('*')->from('stripe_accounts')->where('user_id', $uid)->limit(1)->get()->row();
    }
    public function account_callback($row)
    {
        $row->account = $this->account($row->id);
        return $row;
    }
}
