<?php defined("BASEPATH") or exit('No direct script access allowed');

class Email_model extends BaseModel
{
    protected $select = 'id,queued_at,sent_at,failure_reason,recipient,recipient_id,email_type,processing,object_type,object_id,opened,clicks';

    protected $table = 'emails';

    public function __construct()
    {
        parent::__construct();
    }
}
