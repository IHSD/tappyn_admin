<?php defined("BASEPATH") or exit('No direct script access allowed');

class Contest extends BaseModel
{
    protected $select = 'id,owner,title,start_time,stop_time,objective,platform,gender,audience,min_age,max_age';
    protected $table = 'contests';

    public function __construct()
    {
        parent::__construct();
    }

    public function submissionCount($contest_id)
    {
        $submissions = $this->db->select('COUNT(*) as count')->from('submissions')->where('contest_id', $contest_id)->get();
        return $submissions->row()->count;
    }

    public function votes($contest_id)
    {
        $votes = $this->db->select('COUNT(*) as count')->from('votes')->where('contest_id', $contest_id)->get();
        return $votes->row()->count;
    }

    public function owner($owner)
    {
        $owner = $this->db->select('users.email, users.id, profiles.logo_url, profiles.name, profiles.company_url, profiles.facebook_url, profiles.twitter_handle')
                      ->from('users')
                      ->join('profiles', 'users.id = profiles.id', 'LEFT')
                      ->where('users.id', $owner)
                      ->get();
        return $owner->row();
    }

    public function shares($contest_id)
    {
        $shares = $this->db->select('SUM(shares) as sum')->from('submissions')->where('contest_id', $contest_id)->get();
        return $shares->row()->sum;
    }

    public function share_clicks($contest_id)
    {
        $shares = $this->db->select('SUM(share_clicks) as sum')->from('submissions')->where('contest_id', $contest_id)->get();
        return $shares->row()->sum;
    }

    public function views($contest_id)
    {
        $views = $this->db->select('COUNT(*) as count')->from('impressions')->where('contest_id', $contest_id)->get();
        return $views->row()->count;
    }
    /*==================================
      Callbacks that can be registered
    ==================================*/

    public function submission_count_callback($row)
    {
        $row->submission_count = $this->submissionCount($row->id);
        return $row;
    }

    public function vote_callback($row)
    {
        $row->votes = $this->votes($row->id);
        return $row;
    }

    public function company_callback($row)
    {
        $row->company = $this->owner($row->owner);
        return $row;
    }

    public function share_callback($row)
    {
        $row->shares = $this->shares($row->id);
        $row->share_clicks = $this->share_clicks($row->id);
        return $row;
    }

    public function views_callback($row)
    {
        $row->views = $this->views($row->id);
        return $row;
    }

    public function format_callback($row)
    {
        $row->additional_images = json_decode($row->additional_images);
        return $row;
    }
}
