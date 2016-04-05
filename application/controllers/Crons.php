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
        $uniques = 0;
        $totals = 0;
        $users = $this->db->select('id')->from('users')->where('DATE(FROM_UNIXTIME(created_on))', date('Y-m-d', strtotime('-1 day')))->get()->result();
        echo "----------------------------------\n";
        echo "|  UID       |  Submissions      |\n";
        echo "|------------|-------------------|\n";

        foreach($users as $user)
        {
            $user->submissions = $this->db->select('COUNT(*) as count')->from('submissions')->where('owner', $user->id)->get()->row()->count;
            echo "|  {$user->id}       |  {$user->submissions}                |\n";
            if($user->submissions > 0) {
                $uniques++;
                $totals = $totals + $user->submissions;
            }
        }
        echo "|--------------------------------|\n\n\n";
        echo "==============================\n";
        echo "|| Totals!!!!               ||\n";
        echo "==============================\n";
        echo "Signups : ".count($users)."\n";
        echo "Total Subs : ".$totals."\n";
        echo "Unique Subs : ".$uniques."\n\n\n";
        echo "This report provided by your fuckin motha!!\n\n\n\n";
    }
}
