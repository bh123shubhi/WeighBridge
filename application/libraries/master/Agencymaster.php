<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Agencymaster {

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->model('master/Agencymaster_model', 'amodelObj');
    }

    public function getagencymaster() {
        $result = $this->CI->amodelObj->getAgencyMaster();
        return $result;
    }

    public function agencystatuschange($id) {
        $result = $this->CI->amodelObj->agencyStatusChange($id);
        return $result;
    }

    public function saveagency($data) {
        $result = $this->CI->amodelObj->saveAgency($data);
        return $result;
    }

    public function getsingleagency($id) {
        $result = $this->CI->amodelObj->getSingleAgency($id);
        return $result;
    }

    public function updateagency($data, $id) {
        $result = $this->CI->amodelObj->updateAgency($data, $id);
        return $result;
    }

}
