<?php defined("BASEPATH") or exit('No direct script access allowed');

class Email_model extends BaseModel
{
    protected $select = 'id,queued_at,sent_at,failure_reason,recipient,recipient_id,email_type,processing,object_type,object_id,opened,clicks';

    protected $table = 'mailing_queue';

    public function __construct()
    {
        parent::__construct();
    }

    public function update($id, $data)
    {
        if($this->db->where('id', $id)->update($this->table, $data))
        {
            return TRUE;
        }
        $this->errors = $this->db->error()['message'];
        return FALSE;
    }

    public function create($data)
    {
        if($this->db->insert($this->table, $data))
        {
            return TRUE;
        }
        $this->errors = $this->db->error()['message'];
        return FALSE;
    }
}
