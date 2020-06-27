<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard {

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->model('dashboard/Dashboard_model', 'dmodelObj');
    }

    public function getInVehicle(){
        $result=$this->CI->dmodelObj->getInVehicle();
        return $result;
    }
}