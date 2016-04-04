<?php defined("BASEPATH") or exit('No direct script access allowed');

class Analytics
{
    protected $db;
    protected $error;
    public function __construct()
    {

    }

    public function setDatabase($db)
    {
        $this->db = $db;
    }

    public function setStartDate()
    {

    }

    public function setEndDate()
    {

    }

    public function submissions_by_age_gender()
    {
        return $this->exec("SELECT COUNT(*) as count, age_range, gender, DATE(created_at) as created
                            	FROM (
                                SELECT case
                                	when age between 16 and 24 then '18-24'
                                	when age between 25 and 34 then '25-34'
                                	when age between 35 and 44 then '35-44'
                                	when age between 45 and 54 then '45-54'
                                	else '55+' end as age_range, created_at, gender, profiles.id as uid
                                FROM submissions LEFT JOIN profiles ON submissions.owner = profiles.id) as data
                            GROUP BY age_range, gender");
    }

    public function submissions_by_age_gender_date()
    {
        return $this->exec("SELECT COUNT(*) as count, age_range, gender, DATE(created_at) as created, created_at
                            	FROM (
                                SELECT case
                                	when age between 16 and 24 then '18-24'
                                	when age between 25 and 34 then '25-34'
                                	when age between 35 and 44 then '35-44'
                                	when age between 45 and 54 then '45-54'
                                	else '55+' end as age_range, created_at, gender, profiles.id as uid
                                FROM submissions LEFT JOIN profiles ON submissions.owner = profiles.id) as data
                            GROUP BY age_range, gender, created");
    }

    public function unique_submissions_by_age_gender()
    {
        return $this->exec("SELECT COUNT(DISTINCT uid) as count, age_range, gender, DATE(created_at) as created
                            	FROM (
                                SELECT case
                                	when age between 16 and 24 then '18-24'
                                	when age between 25 and 34 then '25-34'
                                	when age between 35 and 44 then '35-44'
                                	when age between 45 and 54 then '45-54'
                                	else '55+' end as age_range, created_at, gender, profiles.id as uid
                                FROM submissions LEFT JOIN profiles ON submissions.owner = profiles.id) as data
                            GROUP BY age_range, gender");
    }

    public function unique_submissions_by_age_gender_date()
    {
        return $this->exec("SELECT COUNT(DISTINCT uid) as count, age_range, gender, DATE(created_at) as created, created_at
                            	FROM (
                                SELECT case
                                	when age between 16 and 24 then '18-24'
                                	when age between 25 and 34 then '25-34'
                                	when age between 35 and 44 then '35-44'
                                	when age between 45 and 54 then '45-54'
                                	else '55+' end as age_range, created_at, gender, profiles.id as uid
                                FROM submissions LEFT JOIN profiles ON submissions.owner = profiles.id) as data
                            GROUP BY age_range, gender, created");
    }

    public function submissions_by_date()
    {
        return $this->exec("SELECT COUNT(*) as count, DATE(created_at) as created
                            FROM submissions
                            GROUP BY created");
    }

    public function unique_submissions_by_date()
    {
        return $this->exec("SELECT COUNT(DISTINCT users.id) as count, DATE(created_at) as created
                            FROM submissions LEFT JOIN users ON submissions.owner = users.id
                            GROUP BY created");
    }

    public function users_by_gender()
    {
        return $this->exec("SELECT COUNT(*) as count, gender
                                FROM profiles
                                JOIN users_groups ON users_groups.user_id = profiles.id WHERE users_groups.group_id = 2
                                GROUP BY gender");
    }

    public function users_by_age_gender()
    {
        return $this->exec("SELECT COUNT(*) as count, age_range, gender
                                	FROM (
                                    SELECT case
                                    	when age between 16 and 24 then '18-24'
                                    	when age between 25 and 34 then '25-34'
                                    	when age between 35 and 44 then '35-44'
                                    	when age between 45 and 54 then '45-54'
                                    	else '55+' end as age_range, age, gender, created_on
                                    FROM users JOIN profiles ON users.id = profiles.id JOIN users_groups ON users_groups.user_id = users.id WHERE users_groups.group_id = 2) as data
                                GROUP BY age_range, gender");

    }

    public function users_by_age_gender_date()
    {
        return $this->exec("SELECT COUNT(*) as count, age_range, gender, DATE(FROM_UNIXTIME(created_on)) as created
                                	FROM (
                                    SELECT case
                                    	when age between 16 and 24 then '18-24'
                                    	when age between 25 and 34 then '25-34'
                                    	when age between 35 and 44 then '35-44'
                                    	when age between 45 and 54 then '45-54'
                                    	else '55+' end as age_range, age, gender, created_on
                                    FROM users JOIN profiles ON users.id = profiles.id JOIN users_groups ON users_groups.user_id = users.id WHERE users_groups.group_id = 2) as data
                                GROUP BY age_range, gender, created");

    }

    public function users_by_date()
    {
        $start = strtotime('2016-03-17');
        return $this->exec('SELECT COUNT(*) as count, DATE(FROM_UNIXTIME(created_on)) as created, created_on FROM users JOIN users_groups ON users_groups.user_id = users.id WHERE users_groups.group_id = 2 AND users.created_on > '.$start.' GROUP BY created');

    }

    public function user_summary()
    {
        $today = strtotime(date('Y-m-d'));
        $yesterday = strtotime(date('Y-m-d', strtotime('-1 day')));
        $this_week = strtotime(date('Y-m-d', strtotime('last Monday')));
        $this_month = strtotime(date('Y-m-d', strtotime(date('Y-m-01'))));
        return array(
            'today' => $this->exec('SELECT COUNT(*) as count FROM users WHERE created_on > '.$today)[0]->count,
            'yesterday' => $this->exec('SELECT COUNT(*) as count FROM users WHERE created_on > '.$yesterday)[0]->count,
            'this_week' => $this->exec('SELECT COUNT(*) as count FROM users WHERE created_on > '.$this_week)[0]->count,
            'this_month' => $this->exec('SELECT COUNT(*) as count FROM users WHERE created_on > '.$this_month)[0]->count,
        );
    }

    public function submission_summary()
    {
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        $this_week = date('Y-m-d', strtotime('last Monday'));
        $this_month = date('Y-m-d', strtotime(date('Y-m-01')));
        return array(
            'today' => $this->exec('SELECT COUNT(*) as count FROM submissions WHERE DATE(created_at) >= "'.$today.'"')[0]->count,
            'yesterday' => $this->exec('SELECT COUNT(*) as count FROM submissions WHERE DATE(created_at) >= "'.$yesterday.'"')[0]->count,
            'this_week' => $this->exec('SELECT COUNT(*) as count FROM submissions WHERE DATE(created_at) >= "'.$this_week.'"')[0]->count,
            'this_month' => $this->exec('SELECT COUNT(*) as count FROM submissions WHERE DATE(created_at) >= "'.$this_month.'"')[0]->count,
        );
    }

    public function exec($query)
    {
        $data = $this->db->query($query);
        error_log($this->db->last_query());
        if($data)
        {
            return $data->result();
        }
        else
        {
            error_log("Error with query");
            $this->error = $this->db->error()['message'];
        }
        return FALSE;
    }

    public function error()
    {
        return $this->error;
    }

    public function submissions_by_time_range()
    {
        $results = array();
        $data = $db->select('COUNT(*) as count, DATE(created_at) as created')->from('submissions')->where('contest_id', $contest_id)->group_by('created')->order_by('created', 'desc')->get();
        if(!$data)
        {
            $this->error = $this->db->error()['message'];
            return FALSE;
        }

        foreach($data->result() as $datum)
        {
            $results[] = array(
                'date' => $datum->created,
                'count' => $datum->count
            );
        }
        return $results;
    }
}
