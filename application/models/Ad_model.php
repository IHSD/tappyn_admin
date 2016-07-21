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

    public function update_by_submission($sid, $data)
    {
        $sid = is_array($sid) ? $sid : array($sid);
        return $this->db->where_in('submission_id', $sid)->update($this->table, $data);

    }

}
