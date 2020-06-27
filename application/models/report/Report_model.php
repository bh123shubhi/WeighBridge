<?php

class Report_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $this->db = $CI->db;
    }

    public function ShowMasterZone(){
        $result=$this->db->get_where('tbl_master_zone')->result_array();
        return $result;
    }

    public function ShowZoneWiseReport($inputarr){
        $outputarr=[];
        $vehicle=$this->getVehicleEntrylist($inputarr);
        $emptyvehicle=$this->getEmptyVehicleEntry($inputarr);
        if(count($vehicle)>0 && count($emptyvehicle)>0){
            $outputarr=array_merge($vehicle,$emptyvehicle);
        }else if(count($vehicle)>0 && count($emptyvehicle)==0){
            $outputarr=array_merge($vehicle,$emptyvehicle);
        }else if(count($emptyvehicle)>0 && count($vehicle)==0){
            $outputarr=array_merge($vehicle,$emptyvehicle);
        }else{
            $outputarr=[];  
        }
        if(!empty($outputarr) && count($outputarr)>0){
            foreach($outputarr as $key=>$value){
                $outputarr[$key]['entrytime']=!empty($value['entrytime'])?date('d/M/Y h:i:s A',strtotime($value['entrytime'])):'';
                $outputarr[$key]['exittime']=!empty($value['exittime'])?date('d/M/Y h:i:s A',strtotime($value['exittime'])):'';
                $outputarr[$key]['net_garbage']=$value['inweight']-$value['outweight'];
            }
        };
        return $outputarr;
    }

    public function getVehicleEntrylist($inputarr){
        $nrmlvehicleArr=[];
        $mcdvehicle=$this->getMcdVehicleEntrylist($inputarr);
        $privatevehicle=$this->getPrivateVehicleEntrylist($inputarr);
        if(count($mcdvehicle)>0 && count($privatevehicle)>0){
            $nrmlvehicleArr=array_merge($mcdvehicle,$privatevehicle);
        }else if(count($mcdvehicle)>0 && count($privatevehicle)==0){
            $nrmlvehicleArr=array_merge($mcdvehicle,$privatevehicle);
        }else if(count($privatevehicle)>0 && count($mcdvehicle)==0){
            $nrmlvehicleArr=array_merge($mcdvehicle,$privatevehicle);
        }else{
            $nrmlvehicleArr=[];  
        }
        return $nrmlvehicleArr;
    }

    public function getMcdVehicleEntrylist($inputarr){
        $this->db->select('veh.slipno,veh.fleet_operator as fleetoperator,veh.gross_weight as inweight,veh.timestamp as entrytime,mcd.registration_no as vehicle_no,mcd.tareweight as tareweight,mzone.zone as zone_coming_from,mgar.garbage as garbage,exitvehicle.emptyweight as outweight,exitvehicle.timestamp as exittime');
        $this->db->from('tbl_vehicle_entry as veh');
        $this->db->join('tbl_mcd_own_vehicle_details as mcd','mcd.id=veh.vehicle_id','left');
        $this->db->join('tbl_master_zone as mzone','mzone.id=veh.zone_coming_id','left');
        $this->db->join('tbl_master_garbage as mgar','mgar.id=veh.garbage_type_id','left');
        $this->db->join('tbl_vehicle_exit as exitvehicle','exitvehicle.vehicle_entry_id=veh.id','left');
        $this->db->join('tbl_vehicle_exit as exitveh','exitveh.entry_type=veh.entry_type','left');
        $this->db->where('date(veh.timestamp) >=',$inputarr['startdate']);
        $this->db->where('date(veh.timestamp) <=',$inputarr['enddate']);
        $this->db->where('veh.vehicle_type','MCD');
        if(isset($inputarr['zone']) && ($inputarr['zone']>0)){
            $this->db->where('veh.zone_coming_id',$inputarr['zone']);
        }else if(isset($inputarr['garbage']) && ($inputarr['garbage'])>0){
            $this->db->where('veh.garbage_type_id',$inputarr['garbage']);  
        }else if(isset($inputarr['fleetoperator']) && ($inputarr['fleetoperator'])!='All'){
            $this->db->where('veh.fleet_operator',$inputarr['fleetoperator']); 
        }else if(isset($inputarr['vehicle_id']) && ($inputarr['vehicle_id'])>0){
            $this->db->where('veh.vehicle_id',$inputarr['vehicle_id']);
        }
        $result=$this->db->get()->result_array();
        return $result;
    }

    public function getPrivateVehicleEntrylist($inputarr){
        $this->db->select('veh.slipno,veh.agency as fleetoperator,veh.gross_weight as inweight,veh.timestamp as entrytime,pri.registration_no as vehicle_no,pri.tareweight as tareweight,mzone.zone as zone_coming_from,mgar.garbage as garbage,exitvehicle.emptyweight as outweight,exitvehicle.timestamp as exittime');
        $this->db->from('tbl_vehicle_entry as veh');
        $this->db->join('tbl_private_vehicle_details as pri','pri.id=veh.vehicle_id','left');
        $this->db->join('tbl_master_zone as mzone','mzone.id=veh.zone_coming_id','left');
        $this->db->join('tbl_master_garbage as mgar','mgar.id=veh.garbage_type_id','left');
        $this->db->join('tbl_vehicle_exit as exitvehicle','exitvehicle.vehicle_entry_id=veh.id','left');
        $this->db->join('tbl_vehicle_exit as exitveh','exitveh.vehicle_type=veh.entry_type','left');
        $this->db->where('date(veh.timestamp) >=',$inputarr['startdate']);
        $this->db->where('date(veh.timestamp) <=',$inputarr['enddate']);
        $this->db->where('veh.vehicle_type','PRIVATE');
        if(isset($inputarr['zone']) && ($inputarr['zone']>0)){
            $this->db->where('veh.zone_coming_id',$inputarr['zone']);
        }else if(isset($inputarr['garbage']) && ($inputarr['garbage'])>0){
            $this->db->where('veh.garbage_type_id',$inputarr['garbage']);  
        }else if(isset($inputarr['agency']) && ($inputarr['agency'])!='All'){
            $this->db->where('veh.agency',$inputarr['agency']);
        }else if(isset($inputarr['vehicle_id']) && ($inputarr['vehicle_id'])>0){
            $this->db->where('veh.vehicle_id',$inputarr['vehicle_id']);
        }
        $result=$this->db->get()->result_array();
        return $result;
    }

    public function getEmptyVehicleEntry($inputarr){
        $emptyvehicleArr=[];
        $mcdvehicle=$this->getMcdEmptyVehicleEntrylist($inputarr);
        $privatevehicle=$this->getPrivateEmptyVehicleEntrylist($inputarr);
        if(count($mcdvehicle)>0 && count($privatevehicle)>0){
            $emptyvehicleArr=array_merge($mcdvehicle,$privatevehicle);
        }else if(count($mcdvehicle)>0 && count($privatevehicle)==0){
            $emptyvehicleArr=array_merge($mcdvehicle,$privatevehicle);
        }else if(count($privatevehicle)>0 && count($mcdvehicle)==0){
            $emptyvehicleArr=array_merge($mcdvehicle,$privatevehicle);
        }else{
            $emptyvehicleArr=[];  
        }
        return $emptyvehicleArr;   
    }

    public function getMcdEmptyVehicleEntrylist($inputarr){
        $this->db->select('veh.slipno,veh.fleet_operator as fleetoperator,veh.tare_weight as inweight,veh.timestamp as entrytime,mcd.registration_no as vehicle_no,mcd.tareweight as tareweight,mzone.zone as zone_coming_from,mgar.garbage as garbage,exitvehicle.grossweight as outweight,exitvehicle.timestamp as exittime');
        $this->db->from('tbl_empty_vehicle_entry as veh');
        $this->db->join('tbl_mcd_own_vehicle_details as mcd','mcd.id=veh.vehicle_id','left');
        $this->db->join('tbl_master_zone as mzone','mzone.id=veh.zone_coming_id','left');
        $this->db->join('tbl_master_garbage as mgar','mgar.id=veh.garbage_type_id','left');
        $this->db->join('tbl_vehicle_exit as exitvehicle','exitvehicle.vehicle_entry_id=veh.id','left');
        $this->db->join('tbl_vehicle_exit as exitveh','exitveh.entry_type=veh.vehicle_type','left');
        $this->db->where('date(veh.timestamp) >=',$inputarr['startdate']);
        $this->db->where('date(veh.timestamp) <=',$inputarr['enddate']);
        $this->db->where('veh.vehicle_type','MCD');
        if(isset($inputarr['zone']) && ($inputarr['zone']>0)){
            $this->db->where('veh.zone_coming_id',$inputarr['zone']);
        }else if(isset($inputarr['garbage']) && ($inputarr['garbage'])>0){
            $this->db->where('veh.garbage_type_id',$inputarr['garbage']);  
        }else if(isset($inputarr['fleetoperator']) && ($inputarr['fleetoperator'])!='All'){
            $this->db->where('veh.fleet_operator',$inputarr['fleetoperator']); 
        }else if(isset($inputarr['vehicle_id']) && ($inputarr['vehicle_id'])>0){
            $this->db->where('veh.vehicle_id',$inputarr['vehicle_id']);
        }
        $result=$this->db->get()->result_array();
        return $result;    
    }

    public function getPrivateEmptyVehicleEntrylist($inputarr){
        $this->db->select('veh.slipno,veh.agency as fleetoperator,veh.tare_weight as inweight,veh.timestamp as entrytime,pri.registration_no as vehicle_no,pri.tareweight as tareweight,mzone.zone as zone_coming_from,mgar.garbage as garbage,exitvehicle.grossweight as outweight,exitvehicle.timestamp as exittime');
        $this->db->from('tbl_empty_vehicle_entry as veh');
        $this->db->join('tbl_private_vehicle_details as pri','pri.id=veh.vehicle_id','left');
        $this->db->join('tbl_master_zone as mzone','mzone.id=veh.zone_coming_id','left');
        $this->db->join('tbl_master_garbage as mgar','mgar.id=veh.garbage_type_id','left');
        $this->db->join('tbl_vehicle_exit as exitvehicle','exitvehicle.vehicle_entry_id=veh.id','left');
        $this->db->join('tbl_vehicle_exit as exitveh','exitveh.entry_type=veh.vehicle_type','left');
        $this->db->where('date(veh.timestamp) >=',$inputarr['startdate']);
        $this->db->where('date(veh.timestamp) <=',$inputarr['enddate']);
        $this->db->where('veh.vehicle_type','PRIVATE');
        if(isset($inputarr['zone']) && ($inputarr['zone']>0)){
            $this->db->where('veh.zone_coming_id',$inputarr['zone']);
        }else if(isset($inputarr['garbage']) && ($inputarr['garbage'])>0){
            $this->db->where('veh.garbage_type_id',$inputarr['garbage']);  
        }else if(isset($inputarr['agency']) && ($inputarr['agency'])!='All'){
            $this->db->where('veh.agency',$inputarr['agency']);
        }else if(isset($inputarr['vehicle_id']) && ($inputarr['vehicle_id'])>0){
            $this->db->where('veh.vehicle_id',$inputarr['vehicle_id']);
        }
        $result=$this->db->get()->result_array();
        return $result;
    }

    public function ShowMasterGarbage(){
        $result=$this->db->get_where('tbl_master_garbage',array('status'=>'TRUE'))->result_array();
        return $result;  
    }

    public function ShowGarbageWiseReport($inputarr){
        $outputarr=[];
        $vehicle=$this->getVehicleEntrylist($inputarr);
        $emptyvehicle=$this->getEmptyVehicleEntry($inputarr);
        if(count($vehicle)>0 && count($emptyvehicle)>0){
            $outputarr=array_merge($vehicle,$emptyvehicle);
        }else if(count($vehicle)>0 && count($emptyvehicle)==0){
            $outputarr=array_merge($vehicle,$emptyvehicle);
        }else if(count($emptyvehicle)>0 && count($vehicle)==0){
            $outputarr=array_merge($vehicle,$emptyvehicle);
        }else{
            $outputarr=[];  
        }
        if(!empty($outputarr) && count($outputarr)>0){
            foreach($outputarr as $key=>$value){
                $outputarr[$key]['entrytime']=!empty($value['entrytime'])?date('d/M/Y h:i:s A',strtotime($value['entrytime'])):'';
                $outputarr[$key]['exittime']=!empty($value['exittime'])?date('d/M/Y h:i:s A',strtotime($value['exittime'])):'';
                $outputarr[$key]['net_garbage']=$value['inweight']-$value['outweight'];
            }
        };
        return $outputarr;   
    }

    public function ShowMasterFleet(){
        $result=$this->db->get_where('tbl_master_fleetoperator',array('status'=>'TRUE'))->result_array();
        return $result;    
    }

    public function ShowFleetWiseReport($inputarr){
        $outputarr=[];
        $vehicle=$this->getMcdVehicleEntrylist($inputarr);
        $emptyvehicle=$this->getMcdEmptyVehicleEntrylist($inputarr);
        if(count($vehicle)>0 && count($emptyvehicle)>0){
            $outputarr=array_merge($vehicle,$emptyvehicle);
        }else if(count($vehicle)>0 && count($emptyvehicle)==0){
            $outputarr=array_merge($vehicle,$emptyvehicle);
        }else if(count($emptyvehicle)>0 && count($vehicle)==0){
            $outputarr=array_merge($vehicle,$emptyvehicle);
        }else{
            $outputarr=[];
        }
        if(!empty($outputarr) && count($outputarr)>0){
            foreach($outputarr as $key=>$value){
                $outputarr[$key]['entrytime']=!empty($value['entrytime'])?date('d/M/Y h:i:s A',strtotime($value['entrytime'])):'';
                $outputarr[$key]['exittime']=!empty($value['exittime'])?date('d/M/Y h:i:s A',strtotime($value['exittime'])):'';
                $outputarr[$key]['net_garbage']=$value['inweight']-$value['outweight'];
            }
        };
        return $outputarr;
    }

    public function ShowMasterAgency(){
        $result=$this->db->get_where('tbl_master_agency',array('status'=>'TRUE'))->result_array();
        return $result;     
    }

    public function ShowAgencyWiseReport($inputarr){
        $outputarr=[];
        $vehicle=$this->getPrivateVehicleEntrylist($inputarr);
        $emptyvehicle=$this->getPrivateEmptyVehicleEntrylist($inputarr);
        if(count($vehicle)>0 && count($emptyvehicle)>0){
            $outputarr=array_merge($vehicle,$emptyvehicle);
        }else if(count($vehicle)>0 && count($emptyvehicle)==0){
            $outputarr=array_merge($vehicle,$emptyvehicle);
        }else if(count($emptyvehicle)>0 && count($vehicle)==0){
            $outputarr=array_merge($vehicle,$emptyvehicle);
        }else{
            $outputarr=[];
        }
        if(!empty($outputarr) && count($outputarr)>0){
            foreach($outputarr as $key=>$value){
                $outputarr[$key]['entrytime']=!empty($value['entrytime'])?date('d/M/Y h:i:s A',strtotime($value['entrytime'])):'';
                $outputarr[$key]['exittime']=!empty($value['exittime'])?date('d/M/Y h:i:s A',strtotime($value['exittime'])):'';
                $outputarr[$key]['net_garbage']=$value['inweight']-$value['outweight'];
            }
        };
        return $outputarr;
    }

    public function ShowMasterVehicle(){
        $query="select id,registration_no,'mcd' as type from tbl_mcd_own_vehicle_details UNION select id,registration_no,'private' as type from tbl_private_vehicle_details";
        $result=$this->db->query($query)->result_array();
        return $result;
    }

    public function ShowVehicleWiseReport($inputarr){
        $mcdarr=$privatearr=$finalarr=[];
        if(!empty($inputarr['vehicle_id']) && !empty($inputarr['vehicle_type'])){
            if($inputarr['vehicle_type']=='mcd'){
                $mcdVehicle=$this->getVehicleMcd($inputarr);
                $mcdemptyVehicle=$this->getEmptyVehicleMcd($inputarr);
                if(count($mcdVehicle)>0 && count($mcdemptyVehicle)>0){
                    $mcdarr=array_merge($mcdVehicle,$mcdemptyVehicle);
                }else if(count($mcdVehicle)==0 && count($mcdemptyVehicle)>0){
                    $mcdarr=array_merge($mcdVehicle,$mcdemptyVehicle);
                }else if(count($mcdVehicle)>0 && count($mcdemptyVehicle)==0){
                    $mcdarr=array_merge($mcdVehicle,$mcdemptyVehicle);
                }else{
                    $mcdarr=[];
                }
            }else{
                $privateVehicle=$this->getVehiclePrivate($inputarr);
                $privateemptyVehicle=$this->getEmptyVehiclePrivate($inputarr);
                if(count($privateVehicle)>0 && count($privateemptyVehicle)>0){
                    $privatearr=array_merge($privateVehicle,$privateemptyVehicle);
                }else if(count($privateVehicle)==0 && count($privateemptyVehicle)>0){
                    $privatearr=array_merge($privateVehicle,$privateemptyVehicle);
                }else if(count($privateVehicle)>0 && count($privateemptyVehicle)==0){
                    $privatearr=array_merge($privateVehicle,$privateemptyVehicle);
                }else{
                    $privatearr=[];
                }
            }
        }else{
                $mcdVehicle=$this->getVehicleMcd($inputarr);
                $mcdemptyVehicle=$this->getEmptyVehicleMcd($inputarr);
                if(count($mcdVehicle)>0 && count($mcdemptyVehicle)>0){
                    $mcdarr=array_merge($mcdVehicle,$mcdemptyVehicle);
                }else if(count($mcdVehicle)==0 && count($mcdemptyVehicle)>0){
                    $mcdarr=array_merge($mcdVehicle,$mcdemptyVehicle);
                }else if(count($mcdVehicle)>0 && count($mcdemptyVehicle)==0){
                    $mcdarr=array_merge($mcdVehicle,$mcdemptyVehicle);
                }else{
                    $mcdarr=[];
                }
                $privateVehicle=$this->getVehiclePrivate($inputarr);
                $privateemptyVehicle=$this->getEmptyVehiclePrivate($inputarr); 
                if(count($privateVehicle)>0 && count($privateemptyVehicle)>0){
                    $privatearr=array_merge($privateVehicle,$privateemptyVehicle);
                }else if(count($privateVehicle)==0 && count($privateemptyVehicle)>0){
                    $privatearr=array_merge($privateVehicle,$privateemptyVehicle);
                }else if(count($privateVehicle)>0 && count($privateemptyVehicle)==0){
                    $privatearr=array_merge($privateVehicle,$privateemptyVehicle);
                }else{
                    $privatearr=[];
                }
            

        }
        if(count($mcdarr)>0 && count($privatearr)>0){
            $finalarr=array_merge($mcdarr,$privatearr);
        }else if(count($mcdarr)==0 && count($privatearr)>0){
            $finalarr=array_merge($mcdarr,$privatearr);
        }else if(count($mcdarr)>0 && count($privatearr)==0){
            $finalarr=array_merge($mcdarr,$privatearr);
        }else{
             $finalarr=[];
            }
            if(!empty($finalarr) && count($finalarr)>0){
                foreach($finalarr as $key=>$value){
                    $finalarr[$key]['entrytime']=!empty($value['entrytime'])?date('d/M/Y h:i:s A',strtotime($value['entrytime'])):'';
                    $finalarr[$key]['exittime']=!empty($value['exittime'])?date('d/M/Y h:i:s A',strtotime($value['exittime'])):'';
                    $finalarr[$key]['net_garbage']=$value['inweight']-$value['outweight'];
                }
            };   
            return $finalarr;
    }

    public function getVehicleMcd($inputarr){
        $this->db->select('veh.slipno,veh.fleet_operator as fleetoperator,veh.gross_weight as inweight,veh.timestamp as entrytime,mcd.registration_no as vehicle_no,mcd.tareweight as tareweight,mzone.zone as zone_coming_from,mgar.garbage as garbage,exitvehicle.emptyweight as outweight,exitvehicle.timestamp as exittime');
        $this->db->from('tbl_vehicle_entry as veh');
        $this->db->join('tbl_mcd_own_vehicle_details as mcd','mcd.id=veh.vehicle_id','left');
        $this->db->join('tbl_master_zone as mzone','mzone.id=veh.zone_coming_id','left');
        $this->db->join('tbl_master_garbage as mgar','mgar.id=veh.garbage_type_id','left');
        $this->db->join('tbl_vehicle_exit as exitvehicle','exitvehicle.vehicle_entry_id=veh.id','left');
        $this->db->join('tbl_vehicle_exit as exitveh','exitveh.entry_type=veh.entry_type','left');
        $this->db->where('date(veh.timestamp) >=',$inputarr['startdate']);
        $this->db->where('date(veh.timestamp) <=',$inputarr['enddate']);
        $this->db->where('veh.vehicle_type','MCD');
        if(!empty($inputarr['vehicle_id'])){
        $this->db->where('veh.vehicle_id',$inputarr['vehicle_id']);
        }
        $result=$this->db->get()->result_array();
        return $result; 
    }

    public function getEmptyVehicleMcd($inputarr){
        $this->db->select('veh.slipno,veh.fleet_operator as fleetoperator,veh.tare_weight as inweight,veh.timestamp as entrytime,mcd.registration_no as vehicle_no,mcd.tareweight as tareweight,mzone.zone as zone_coming_from,mgar.garbage as garbage,exitvehicle.grossweight as outweight,exitvehicle.timestamp as exittime');
        $this->db->from('tbl_empty_vehicle_entry as veh');
        $this->db->join('tbl_mcd_own_vehicle_details as mcd','mcd.id=veh.vehicle_id','left');
        $this->db->join('tbl_master_zone as mzone','mzone.id=veh.zone_coming_id','left');
        $this->db->join('tbl_master_garbage as mgar','mgar.id=veh.garbage_type_id','left');
        $this->db->join('tbl_vehicle_exit as exitvehicle','exitvehicle.vehicle_entry_id=veh.id','left');
        $this->db->join('tbl_vehicle_exit as exitveh','exitveh.entry_type=veh.vehicle_type','left');
        $this->db->where('date(veh.timestamp) >=',$inputarr['startdate']);
        $this->db->where('date(veh.timestamp) <=',$inputarr['enddate']);
        $this->db->where('veh.vehicle_type','MCD');
        if(!empty($inputarr['vehicle_id'])){
            $this->db->where('veh.vehicle_id',$inputarr['vehicle_id']);
        }
        $result=$this->db->get()->result_array();
        return $result;
    }

    public function getVehiclePrivate($inputarr){
        $this->db->select('veh.slipno,veh.agency as fleetoperator,veh.gross_weight as inweight,veh.timestamp as entrytime,pri.registration_no as vehicle_no,pri.tareweight as tareweight,mzone.zone as zone_coming_from,mgar.garbage as garbage,exitvehicle.emptyweight as outweight,exitvehicle.timestamp as exittime');
        $this->db->from('tbl_vehicle_entry as veh');
        $this->db->join('tbl_private_vehicle_details as pri','pri.id=veh.vehicle_id','left');
        $this->db->join('tbl_master_zone as mzone','mzone.id=veh.zone_coming_id','left');
        $this->db->join('tbl_master_garbage as mgar','mgar.id=veh.garbage_type_id','left');
        $this->db->join('tbl_vehicle_exit as exitvehicle','exitvehicle.vehicle_entry_id=veh.id','left');
        $this->db->join('tbl_vehicle_exit as exitveh','exitveh.vehicle_type=veh.entry_type','left');
        $this->db->where('date(veh.timestamp) >=',$inputarr['startdate']);
        $this->db->where('date(veh.timestamp) <=',$inputarr['enddate']);
        $this->db->where('veh.vehicle_type','PRIVATE');
        if(!empty($inputarr['vehicle_id'])){
            $this->db->where('veh.vehicle_id',$inputarr['vehicle_id']);
        }
        $result=$this->db->get()->result_array();
        return $result;   
    }

    public function getEmptyVehiclePrivate($inputarr){
        $this->db->select('veh.slipno,veh.agency as fleetoperator,veh.tare_weight as inweight,veh.timestamp as entrytime,pri.registration_no as vehicle_no,pri.tareweight as tareweight,mzone.zone as zone_coming_from,mgar.garbage as garbage,exitvehicle.grossweight as outweight,exitvehicle.timestamp as exittime');
        $this->db->from('tbl_empty_vehicle_entry as veh');
        $this->db->join('tbl_private_vehicle_details as pri','pri.id=veh.vehicle_id','left');
        $this->db->join('tbl_master_zone as mzone','mzone.id=veh.zone_coming_id','left');
        $this->db->join('tbl_master_garbage as mgar','mgar.id=veh.garbage_type_id','left');
        $this->db->join('tbl_vehicle_exit as exitvehicle','exitvehicle.vehicle_entry_id=veh.id','left');
        $this->db->join('tbl_vehicle_exit as exitveh','exitveh.entry_type=veh.vehicle_type','left');
        $this->db->where('date(veh.timestamp) >=',$inputarr['startdate']);
        $this->db->where('date(veh.timestamp) <=',$inputarr['enddate']);
        $this->db->where('veh.vehicle_type','PRIVATE');
        if(!empty($inputarr['vehicle_id'])){
            $this->db->where('veh.vehicle_id',$inputarr['vehicle_id']);
        }
        $result=$this->db->get()->result_array();
        return $result;   
    }

}
