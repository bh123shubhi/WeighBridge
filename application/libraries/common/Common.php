<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common {

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->model('login/Login_model', 'lmodelObj');
    }
    public function checkLoginAuth(){
       $authRes =  $this->CI->session->userData('user_auth_data');
       if(!empty($authRes)){
           return $authRes;
       }else{
           return false;
       }
    }
}