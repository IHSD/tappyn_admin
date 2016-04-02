<?php defined("BASEPATH") or exit('No direct script access allowed');

class Permissions
{
    public function __construct()
    {
        $this->config->load('permissions', TRUE);
    }

    public function __get($var)
    {
        return get_instance()->$var;
    }
    
    public function authorized()
    {

    }
}
