<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fleetmaster {

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->model('master/Fleetmaster_model', 'fmodelObj');
    }

    public function getfleetmaster() {
        $result = $this->CI->fmodelObj->getFleetMaster();
        return $result;
    }

    public function fleetstatuschange($id) {
        $result = $this->CI->fmodelObj->fleetStatusChange($id);
        return $result;
    }

    public function savefleet($data) {
        $result = $this->CI->fmodelObj->saveFleet($data);
        return $result;
    }

    public function getsinglefleet($id) {
        $result = $this->CI->fmodelObj->getSingleFleet($id);
        return $result;
    }

    public function updatefleet($data, $id) {
        $result = $this->CI->fmodelObj->updateFleet($data, $id);
        return $result;
    }

}
