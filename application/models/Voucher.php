<?php defined("BASEPATH") or exit('No direct script access allowed');

class Voucher extends BaseModel
{
    protected $table = 'vouchers';
    protected $select = '*';
    protected $error = NULL;
    public function __construct()
    {
        parent::__construct();
    }
    public function errors()
    {
        return $this->error;
    }

    public function create($data)
    {
        if($this->voucher(array('code' => $data['code'])))
        {
            $this->error = "Code {$data['code']} has already been used!";
            return FALSE;
        }

        return $this->db->insert('vouchers', $data);
    }

    public function voucher($params)
    {
        $check = $this->db->where($params)->limit(1)->get();
        if(!$check || $check->num_rows() == 0)
        {
            return FALSE;
        }
        return $check->row();
    }

    public function uses($id)
    {
        $uses = $this->db->select('*')->from('voucher_uses')->where('voucher_id', $id)->get()->result();
        foreach($uses as $use)
        {
            $use->contest = $this->db->select('*')->from('contests')->where('id', $use->contest_id)->get()->row();
        }
        return $uses;
    }

    public function uses_callback($row)
    {
        $row->uses = $this->uses($row->id);
        return $row;
    }
}
