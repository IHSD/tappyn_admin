<?php defined("BASEPATH") or exit('No diret script access allowed');

class Crons extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!is_cli())
        {
            die('Unauthoried Area');
        }
        $this->db = $this->load->database('master', TRUE);
    }

    public function unique_submitters_from_yesterday()
    {
        $users = $this->db->select('*')->from('users')->where('DATE(FROM_UNIXTIME(created_on))', date('Y-m-d', strtotime('-1 day')))->get()->result();
        foreach($users as $user)
        {
            $user->submissions = $this->db->select('COUNT(*) as count')->from('submissions')->where('owner', $user->id)->get()->row()->count;
        }
        echo json_encode($users);
    }
}
