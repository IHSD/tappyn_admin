<?php defined("BASEPATH") or exit('No direct script access allowed');

class Analytics
{
    protected $db;

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
        return $this->exec('SELECT COUNT(*) as count, DATE(FROM_UNIXTIME(created_on)) as created FROM users JOIN users_groups ON users_groups.user_id = users.id WHERE users_groups.group_id = 2 GROUP BY created');

    }

    public function exec($query)
    {
        $data = $this->db->query($query);
        if($data)
        {
            return $data->result();
        }
        else
        {
            $this->error = $this->db->error()['message'];
            die($this->db->error()['message']);
        }
        return FALSE;
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
