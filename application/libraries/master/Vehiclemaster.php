<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vehiclemaster {

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->model('master/Vehiclemaster_model', 'vmodelObj');
    }

    public function getzonetimelist() {
        $result = $this->CI->vmodelObj->getZoneTimeList();
        return $result;
    }

    public function getzonemasterlist() {
        $result = $this->CI->vmodelObj->getZoneMasterList();
        return $result;
    }

    public function zonetimestatuschange($id) {
        $result = $this->CI->vmodelObj->zonetimeStatusChange($id);
        return $result;
    }

    public function savezonetime($data) {
        $result = $this->CI->vmodelObj->saveZoneTime($data);
        return $result;
    }

    public function getsinglezonetime($id) {
        $result = $this->CI->vmodelObj->getSingleZoneTime($id);
        return $result;
    }

    public function updatezonetime($data, $id) {
        $result = $this->CI->vmodelObj->updateZoneTime($data, $id);
        return $result;
    }

    public function getagencymasterlist() {
        $result = $this->CI->vmodelObj->getAgencyMasterList();
        return $result;
    }

    public function getgarbagemasterlist() {
        $result = $this->CI->vmodelObj->getGarbageMasterList();
        return $result;
    }

    public function saveprivatevehicle($data) {
        $result = $this->CI->vmodelObj->savePrivateVehicle($data);
        return $result;
    }

    public function getprivatevehiclelist() {
        $result = $this->CI->vmodelObj->getPrivateVehicleList();
        return $result;
    }

    public function getsingleprivatevehicle($id) {
        $result = $this->CI->vmodelObj->getSinglePrivateVehicle($id);
        return $result;
    }

    public function updateprivatevehicle($data, $id) {
        $result = $this->CI->vmodelObj->updatePrivateVehicle($data, $id);
        return $result;
    }

    public function privatevehiclestatuschange($id) {
        $result = $this->CI->vmodelObj->privateVehicleStatusChange($id);
        return $result;
    }

    public function getfleetmasterlist() {
        $result = $this->CI->vmodelObj->getFleetMasterList();
        return $result;
    }

    public function savemcdvehicle($data) {
        $result = $this->CI->vmodelObj->saveMcdVehicle($data);
        return $result;
    }

    public function getmcdvehiclelist() {
        $result = $this->CI->vmodelObj->getMcdVehicleList();
        return $result;
    }

    public function mcdvehiclestatuschange($id) {
        $result = $this->CI->vmodelObj->mcdVehicleStatusChange($id);
        return $result;
    }

    public function getsinglemcdvehicle($id) {
        $result = $this->CI->vmodelObj->getSingleMcdVehicle($id);
        return $result;
    }

    public function updatemcdvehicle($data,$id) {
        $result = $this->CI->vmodelObj->updateMcdVehicle($data,$id);
        return $result;
    }

    public function getmcdzonemasterlist(){
        $result = $this->CI->vmodelObj->getmcdzonemasterlist();
        return $result;  
    }


}
