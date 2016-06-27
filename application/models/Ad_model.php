<?php defined("BASEPATH") or exit('No direct script access allowed');

class Ad_model extends BaseModel
{
    protected $table = 'ads';

    public function __construct()
    {
        parent::__construct();
    }

    public function by_company()
    {
        return $this->where('get_id', 'by_company');
    }

    public function update($data)
    {
        return $this->db->update($this->table, $data);

    }

}
