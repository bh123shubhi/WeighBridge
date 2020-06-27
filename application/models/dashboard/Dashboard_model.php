<?php

class Dashboard_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $this->db = $CI->db;
    }

    public function getInVehicle() {
        $finalArr=[];
        $vehicle=$this->getVehicle();
        $emptyvehicle=$this->getEmptyVehicle();
        if(count($vehicle)>0 && count($emptyvehicle)>0){
            $finalArr=array_merge($vehicle,$emptyvehicle);
        }else if(count($vehicle)==0 && count($emptyvehicle)>0){
            $finalArr=array_merge($vehicle,$emptyvehicle);
        }else if(count($vehicle)>0 && count($emptyvehicle)==0){
            $finalArr=array_merge($vehicle,$emptyvehicle);
        }else{
             $finalArr=[];
            }
            if(!empty($finalArr) && count($finalArr)>0){
                foreach($finalArr as $key=>$value){
                    $finalArr[$key]['entrytime']=!empty($value['entrytime'])?date('d/M/Y h:i:s A',strtotime($value['entrytime'])):'';
                    $finalArr[$key]['net_garbage']=$value['inweight']-$value['tareweight'];
                }
            }; 
            return $finalArr;
    }

    public function getVehicle(){
        $vehicleinarr=[];
        $mcdvehcile=$this->getMcdInVehicle();
        $privatevehicle=$this->getPrivateInVehicle();
        if(count($mcdvehcile)>0 && count($privatevehicle)>0){
            $vehicleinarr=array_merge($mcdvehcile,$privatevehicle);
        }else if(count($mcdvehcile)==0 && count($privatevehicle)>0){
            $vehicleinarr=array_merge($mcdvehcile,$privatevehicle);
        }else if(count($mcdvehcile)>0 && count($privatevehicle)==0){
            $vehicleinarr=array_merge($mcdvehcile,$privatevehicle);
        }else{
             $vehicleinarr=[];
            } 
            return $vehicleinarr;
    }

    public function getEmptyVehicle(){
        $emptyvehicleinarr=[];
        $mcdemptyvehicle=$this->getMcdEmptyInVehicle();
        $privateemptyvehicle=$this->getPrivateEmptyInVehicle();
        if(count($mcdemptyvehicle)>0 && count($privateemptyvehicle)>0){
            $emptyvehicleinarr=array_merge($mcdemptyvehicle,$privateemptyvehicle);
        }else if(count($mcdemptyvehicle)==0 && count($privateemptyvehicle)>0){
            $emptyvehicleinarr=array_merge($mcdemptyvehicle,$privateemptyvehicle);
        }else if(count($mcdemptyvehicle)>0 && count($privateemptyvehicle)==0){
            $emptyvehicleinarr=array_merge($mcdemptyvehicle,$privateemptyvehicle);
        }else{
             $emptyvehicleinarr=[];
            }
            if(!empty($emptyvehicleinarr) && count($emptyvehicleinarr)>0){
                foreach($emptyvehicleinarr as $key=>$value){
                    $emptyvehicleinarr[$key]['entrytime']=!empty($value['entrytime'])?date('d/M/Y h:i:s A',strtotime($value['entrytime'])):'';
                    $emptyvehicleinarr[$key]['net_garbage']=$value['inweight']-$value['tareweight'];
                }
            };  
            return $emptyvehicleinarr;
    }

    public function getMcdInVehicle(){
        $this->db->select('veh.slipno,veh.fleet_operator as fleetoperator,veh.gross_weight as inweight,veh.timestamp as entrytime,mcd.registration_no as vehicle_no,mcd.tareweight as tareweight,mzone.zone as zone_coming_from,mgar.garbage as garbage');
        $this->db->from('tbl_vehicle_entry as veh');
        $this->db->join('tbl_mcd_own_vehicle_details as mcd','mcd.id=veh.vehicle_id','left');
        $this->db->join('tbl_master_zone as mzone','mzone.id=veh.zone_coming_id','left');
        $this->db->join('tbl_master_garbage as mgar','mgar.id=veh.garbage_type_id','left');
        $this->db->where('veh.vehicle_type','MCD');
        $this->db->where('veh.vehicle_in_status','IN');
        $result=$this->db->get()->result_array();
        return $result; 
    }

    public function getPrivateInVehicle(){
        $this->db->select('veh.slipno,veh.agency as fleetoperator,veh.gross_weight as inweight,veh.timestamp as entrytime,pri.registration_no as vehicle_no,pri.tareweight as tareweight,mzone.zone as zone_coming_from,mgar.garbage as garbage');
        $this->db->from('tbl_vehicle_entry as veh');
        $this->db->join('tbl_private_vehicle_details as pri','pri.id=veh.vehicle_id','left');
        $this->db->join('tbl_master_zone as mzone','mzone.id=veh.zone_coming_id','left');
        $this->db->join('tbl_master_garbage as mgar','mgar.id=veh.garbage_type_id','left');
        $this->db->where('veh.vehicle_type','PRIVATE');
        $this->db->where('veh.vehicle_in_status','IN');
        $result=$this->db->get()->result_array();
        return $result; 
    }

    public function getMcdEmptyInVehicle(){
        $this->db->select('veh.slipno,veh.fleet_operator as fleetoperator,veh.tare_weight as inweight,veh.timestamp as entrytime,mcd.registration_no as vehicle_no,mcd.tareweight as tareweight,mzone.zone as zone_coming_from,mgar.garbage as garbage');
        $this->db->from('tbl_empty_vehicle_entry as veh');
        $this->db->join('tbl_mcd_own_vehicle_details as mcd','mcd.id=veh.vehicle_id','left');
        $this->db->join('tbl_master_zone as mzone','mzone.id=veh.zone_coming_id','left');
        $this->db->join('tbl_master_garbage as mgar','mgar.id=veh.garbage_type_id','left');
        $this->db->where('veh.vehicle_type','MCD');
        $this->db->where('veh.vehicle_in_status','IN');
        $result=$this->db->get()->result_array();
        return $result;
    }

    public function getPrivateEmptyInVehicle(){
        $this->db->select('veh.slipno,veh.agency as fleetoperator,veh.tare_weight as inweight,veh.timestamp as entrytime,pri.registration_no as vehicle_no,pri.tareweight as tareweight,mzone.zone as zone_coming_from,mgar.garbage as garbage');
        $this->db->from('tbl_empty_vehicle_entry as veh');
        $this->db->join('tbl_private_vehicle_details as pri','pri.id=veh.vehicle_id','left');
        $this->db->join('tbl_master_zone as mzone','mzone.id=veh.zone_coming_id','left');
        $this->db->join('tbl_master_garbage as mgar','mgar.id=veh.garbage_type_id','left');
        $this->db->where('veh.vehicle_type','PRIVATE');
        $this->db->where('veh.vehicle_in_status','IN');
        $result=$this->db->get()->result_array();
        return $result;
    }
}
;