<?php defined("BASEPATH") or exit('No direct script access allowed');

class Query extends MY_Controller
{
    protected $banned_keywords = array(
        'insert',
        'delete',
        'update',
        'drop',
        'into',
        'alter',
        'modify',
        'auto_increment',
        'deallocate',
        'duplicate',
        'enable',
        'global',
        'mysql',
        'index',
        'insert_method',
        'master_',
        'migrate',
        'release',
        'rename',
        'reorganize',
        'replication',
        'require',
        'revoke',
        'rollback',
        'rollup',
        'reverse',
        'schema',
        'socket'
    );

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array();
        if($this->input->post('query'))
        {
            if(!$this->validate($this->input->post('query')))
            {
                $data['error'] = $this->error;
            }
            else
            {
                $db = $this->load->database('master', TRUE);
                $res = $db->query($this->input->post('query'));
                if($res)
                {
                    $data['results'] = $res->result();
                } else $data['error'] = $db->error()['code'].' :: '.$db->error()['message'];
            }
        }
        $this->load->view('query', $data);
    }

    public function validate($query)
    {
        foreach($this->banned_keywords as $keyword)
        {
            if(stripos($query, $keyword) !== FALSE)
            {
                $this->error = "Usage of invalid keyword ".strtoupper($keyword);
                return FALSE;
            }
        }
        if(stripos($query, ';') !== FALSE)
        {
            $this->error = "Multi statement queries are not supported";
            return FALSE;
        }
        return TRUE;
    }
}
