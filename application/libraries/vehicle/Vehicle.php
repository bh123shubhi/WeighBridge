<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vehicle {

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->model('vehicle/Vehicle_Model', 'vehimodelObj'); 
    }

    public function show_vehicle_no() {
        $result = $this->CI->vehimodelObj->show_vehicle_no();
        return $result;
    }
    public function show_garbage() {
        $result = $this->CI->vehimodelObj->show_garbage();
        return $result;
    }

    public function show_zone() {
        $result = $this->CI->vehimodelObj->show_zone();
        return $result;
    }


    public function show_vehicle_detail($vehicle_no,$type){
        $result = $this->CI->vehimodelObj->show_vehicle_detail($vehicle_no,$type);
        return $result;  
    }

    public function getvehicleid($vehicleno,$type){
        $result = $this->CI->vehimodelObj->getvehicleid($vehicleno,$type);
        return $result;   
    }

    public function save_vehicle_entry($insertArr){

        $result = $this->CI->vehimodelObj->save_vehicle_entry($insertArr);
        return $result;
    } 
    //Vehicle Exit
    public function show_exit_vehicle_no(){
        $result = $this->CI->vehimodelObj->show_exit_vehicle_no();
        return $result;
    }
    public function save_exit_vehicle($vehicle_exit_arr){
       
       $result = $this->CI->vehimodelObj->save_exit_vehicle($vehicle_exit_arr);
       return $result;


    }
    public function check_vehicle_entry($vehicle_no=null,$vehicle_type=null){
           $result_array = $this->CI->vehimodelObj->check_vehicle_status($vehicle_no,$vehicle_type);
           $result_status = ["status"=>true,"msg"=>"vehicle Entry Allow"];
           if(!empty($result_array) && count($result_array)>0){
                if(in_array($result_array['vehicle_in_status'],["IN"])){
                  $result_status = ["status"=>false,"msg"=>"Vehicle Not Allowed"];
                }else if(in_array($result_array['vehicle_in_status'],["OUT"])){
                    $vehicle_exit_details = $this->CI->vehimodelObj->check_exit_vehicle($vehicle_no,$vehicle_type);
                    if(!empty($vehicle_exit_details) && count($vehicle_exit_details)>0){
                        $exit_dattime = $vehicle_exit_details['vehicle_exit_time'];
                        $start = date_create($exit_dattime);
                        $end = date_create(date('Y-m-d H:i:s'));
                        $diff=date_diff($end,$start);    
                        $minutes = $diff->days * 24 * 60;
                        $minutes += $diff->h * 60;
                        $minutes += $diff->i;
                        if(strtolower($vehicle_type)=='mcd'){
                            //zone master
                            $zone_minutes = $this->CI->vehimodelObj->zoneTimeDetails($result_array['zone_coming_id']);
                            $msg ="Vehicle has come before time :Zone Time Not Completed";
                        }else{
                            $zone_minutes = $this->CI->vehimodelObj->getTripTimeDetails($vehicle_no);
                            $msg ="Vehicle has come before time :Trip Time Not Completed";
                        }
                        if($zone_minutes>0 && $minutes<$zone_minutes){
                           $result_status = ["status"=>false,"msg"=>$msg];
                        }

                    }
                }
           }
           return $result_status;

    }
    public function save_empty_vehicle_entry($dataArr){
        $status = true;
        if(!empty($dataArr)){
           $status = $this->CI->vehimodelObj->save_empty_vehicle_entry($dataArr);
        }
        return $status;
    }

     public function getVehicleSlipNo(){
        $result = $this->CI->vehimodelObj->getVehicleSlipNo();
        return $result;  
    }

     public function show_vehicle_list(){
        $result = $this->CI->vehimodelObj->show_vehicle_list();
        return $result;
    }

    public function getmcdzonemasterlist(){
        $result = $this->CI->vehimodelObj->getmcdzonemasterlist();
        return $result;  
    }

    public function show_single_vehicle($slipno,$entrytype){
        $result = $this->CI->vehimodelObj->show_single_vehicle($slipno,$entrytype);
        return $result;   
    }
}
