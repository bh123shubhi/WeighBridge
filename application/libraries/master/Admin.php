<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin {

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->model('master/home_model', 'modelObj');
    }

    public function save_admin($data) {
        $result = $this->CI->modelObj->saveAdmin($data);
        return $result;
    }

    public function get_admin() {
        $result = $this->CI->modelObj->getAdmin();
        return $result;
    }

    public function get_single_admin($id) {
        $result = $this->CI->modelObj->getSingleAdmin($id);
        return $result;
    }

    public function update_admin($data, $id) {
        $result = $this->CI->modelObj->updateAdmin($data, $id);
        return $result;
    }

    public function adminstatuschange($id) {
        $result = $this->CI->modelObj->adminStatusChange($id);
        return $result;
    }

    public function check_user_name($usertext){
        $result = $this->CI->modelObj->check_user_name($usertext);
        return $result;  
    }

}
