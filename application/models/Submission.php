<?php defined("BASEPATH") or exit("No direct script access allowed");

class Submission extends BaseModel
{
    protected $table = 'submissions';

    public function __construct()
    {
        parent::__construct();
    }

    public function votes($sid)
    {
        $votes = $this->db->select('COUNT(*) as count')->from('votes')->where('submission_id', $sid)->get()->row();
        return $votes->count;
    }

    public function owner($uid)
    {
        $owner = $this->db->select('id, email, first_name, last_name')->from('users')->where('id', $uid)->get();
        return $owner->row();
    }

    public function contest($cid)
    {
        $contest = $this->db->select('*')->from('contests')->where('id', $cid)->get();
        return $contest->row();
    }

    public function delete($sid)
    {
        return $this->db->where('id', $sid)->delete('submissions');
    }
    /*==================================
      Callbacks that can be registered
    ==================================*/
    public function votes_callback($row)
    {
        $row->votes = $this->votes($row->id);
        return $row;
    }

    public function owner_callback($row)
    {
        $row->owner = $this->owner($row->owner);
        return $row;
    }

    public function contest_callback($row)
    {
        $row->contest = $this->contest($row->contest_id);
        return $row;
    }
}
