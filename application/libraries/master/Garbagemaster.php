<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Garbagemaster {

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->model('master/Garbagemaster_model', 'gmodelObj');
    }

    public function getgarbagemaster() {
        $result = $this->CI->gmodelObj->getGarbageMaster();
        return $result;
    }

    public function garbagestatuschange($id) {
        $result = $this->CI->gmodelObj->garbageStatusChange($id);
        return $result;
    }

    public function savegarbage($data) {
        $result = $this->CI->gmodelObj->saveGarbage($data);
        return $result;
    }

    public function getsinglegarbage($id) {
        $result = $this->CI->gmodelObj->getSingleGarbage($id);
        return $result;
    }

    public function updategarbage($data, $id) {
        $result = $this->CI->gmodelObj->updateGarbage($data, $id);
        return $result;
    }

}
