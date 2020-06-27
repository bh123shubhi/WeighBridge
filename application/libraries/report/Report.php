<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report {

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->model('report/Report_model', 'rmodelObj');
    }

    public function ShowMasterZone(){
        $result = $this->CI->rmodelObj->ShowMasterZone();
        return $result;
    }


    public function ShowZoneWiseReport($inputArr){
        $result = $this->CI->rmodelObj->ShowZoneWiseReport($inputArr);
        return $result;
    }

    public function ShowMasterGarbage(){
        $result = $this->CI->rmodelObj->ShowMasterGarbage();
        return $result;  
    }

    public function ShowGarbageWiseReport($inputArr){
        $result = $this->CI->rmodelObj->ShowGarbageWiseReport($inputArr);
        return $result;  
    }

    public function ShowMasterFleet(){
        $result = $this->CI->rmodelObj->ShowMasterFleet();
        return $result;    
    }

    public function ShowFleetWiseReport($inputArr){
        $result = $this->CI->rmodelObj->ShowFleetWiseReport($inputArr);
        return $result;    
    }

    public function ShowMasterAgency(){
        $result = $this->CI->rmodelObj->ShowMasterAgency();
        return $result;  
    }

    public function ShowAgencyWiseReport($inputArr){
        $result = $this->CI->rmodelObj->ShowAgencyWiseReport($inputArr);
        return $result;     
    }

    public function ShowMasterVehicle(){
        $result = $this->CI->rmodelObj->ShowMasterVehicle();
        return $result;   
    }

    public function ShowVehicleWiseReport($inputArr){
        $result = $this->CI->rmodelObj->ShowVehicleWiseReport($inputArr);
        return $result;    
    }

}