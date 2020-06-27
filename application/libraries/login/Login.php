<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login {

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->model('login/Login_model', 'lmodelObj');
    }

    public function checkLoginCredentials($data){
        $result=$this->CI->lmodelObj->checkLoginCredentials($data);
        return $result;
    }
}