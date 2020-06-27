<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile {

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->model('profile/Profile_model', 'pmodelObj');
    }

    public function updateProfileDetail($dataArray){
        $result = $this->CI->pmodelObj->updateProfileDetail($dataArray);
        return $result;
    }

    public function updateUserPassword($dataArray,$userid){
        $result = $this->CI->pmodelObj->updateUserPassword($dataArray,$userid);
        return $result;  
    }

}