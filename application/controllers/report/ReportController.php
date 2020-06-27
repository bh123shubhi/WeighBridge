<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReportController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('report/Report');
        $this->load->library('form_validation');
        $this->res = $this->common->checkLoginAuth();
        if($this->res===false){
            redirect(base_url()."login");
        }
    }

    public function zone_wise_report(){
        $data['page'] = '/report/zone_wise_report';
        $data['url'] = '/zone_wise_list';
        $data['zonearr']=$this->report->ShowMasterZone();
        $data['res']=(isset($this->session->flashdata('temp_data')['res'])?$this->session->flashdata('temp_data')['res']:[]);
        $data['startdate']=isset($this->session->flashdata('temp_data')['startdate'])?$this->session->flashdata('temp_data')['startdate']:'';
        $data['enddate']=isset($this->session->flashdata('temp_data')['enddate'])?$this->session->flashdata('temp_data')['enddate']:'';
        $this->load->view('welcome_message', $data);
    }

    public function zone_wise_list(){
        $startdate=$this->input->post('startdate',TRUE);
        $enddate=$this->input->post('enddate',TRUE);
        $zone=$this->input->post('zone',TRUE);
        $form_status=$this->ValidateDate();
        if($form_status==true){
            $sd=date('Y-m-d',strtotime($startdate));
            $ed=date('Y-m-d',strtotime($enddate));
            if(strtotime($sd)>strtotime($ed)){
                $data['msg']='End Date must be greater or equal to Start Date';
                $data['color']='alert alert-danger';
                $data['zonearr']=$this->report->ShowMasterZone();
                $data['url'] = '/zone_wise_list';
            }else{
                $inputarr=['startdate'=>$sd,'enddate'=>$ed,'zone'=>$zone];
                $data['res']=$this->report->ShowZoneWiseReport($inputarr);
                $data['page'] = '/report/zone_wise_report';
                $data['url'] = '/zone_wise_list';
                $data['startdate']=date('d/m/Y',strtotime($sd));
                $data['enddate']=date('d/m/Y',strtotime($ed));
                $data['zonearr']=$this->report->ShowMasterZone();
            }
        }else{
            $data['msg'] = "Please Fill Required Fields";
            $data['color']='alert alert-danger';
            $data['zonearr']=$this->report->ShowMasterZone();
        }        
        $this->session->set_flashdata('temp_data', $data);
        redirect(base_url() . 'report/zone_wise_report');
    }

    public function ValidateDate(){
        $this->form_validation->set_rules('startdate', 'Start Date', 'required');
        $this->form_validation->set_rules('enddate', 'End Date', 'required');
        if ($this->form_validation->run() == FALSE) {
            return false;
        } else {
            return true;
        }
    }

    public function garbage_wise_report(){
        $data['page'] = '/report/garbage_wise_report';
        $data['url'] = '/garbage_wise_list';
        $data['garbageaarr']=$this->report->ShowMasterGarbage();
        $data['result']=(isset($this->session->flashdata('temp_data')['result'])?$this->session->flashdata('temp_data')['result']:[]);
        $data['startdate']=isset($this->session->flashdata('temp_data')['startdate'])?$this->session->flashdata('temp_data')['startdate']:'';
        $data['enddate']=isset($this->session->flashdata('temp_data')['enddate'])?$this->session->flashdata('temp_data')['enddate']:'';
        $this->load->view('welcome_message', $data);  
    }

    public function garbage_wise_list(){
        $startdate=$this->input->post('startdate',TRUE);
        $enddate=$this->input->post('enddate',TRUE);
        $garbage=$this->input->post('garbage',TRUE);
        $form_status=$this->ValidateDate();
        if($form_status==true){
            $sd=date('Y-m-d',strtotime($startdate));
            $ed=date('Y-m-d',strtotime($enddate));
            if($sd>$ed){
                $data['msg']='End Date must be greater or equal to Start Date';
                $data['color']='alert alert-danger';
                $data['garbageaarr']=$this->report->ShowMasterGarbage();
                $data['url'] = '/garbage_wise_list';
            }else{
                $inputarr=['startdate'=>$sd,'enddate'=>$ed,'garbage'=>$garbage];
                $data['result']=$this->report->ShowGarbageWiseReport($inputarr);
                $data['page'] = '/report/zone_wise_report';
                $data['startdate']=date('d/m/Y',strtotime($sd));
                $data['enddate']=date('d/m/Y',strtotime($ed));
                $data['garbageaarr']=$this->report->ShowMasterGarbage();
                $data['url'] = '/garbage_wise_list';
            }
        }else{
                $data['msg'] = "Please Fill Required Fields";
                $data['color']='alert alert-danger';
                $data['url'] = '/garbage_wise_list';
                $data['garbageaarr']=$this->report->ShowMasterGarbage();
                }  
                $this->session->set_flashdata('temp_data', $data);
                redirect(base_url() . 'report/garbage_wise_report'); 
    }

    public function fleet_operator_wise_report(){
        $data['page'] = '/report/fleet_operator_wise_report';
        $data['url'] = '/fleet_operator_wise_list';
        $data['fleetarr']=$this->report->ShowMasterFleet();
        $data['result']=(isset($this->session->flashdata('temp_data')['result'])?$this->session->flashdata('temp_data')['result']:[]);
        $data['startdate']=isset($this->session->flashdata('temp_data')['startdate'])?$this->session->flashdata('temp_data')['startdate']:'';
        $data['enddate']=isset($this->session->flashdata('temp_data')['enddate'])?$this->session->flashdata('temp_data')['enddate']:'';
        $this->load->view('welcome_message', $data);    
    }

    public function fleet_operator_wise_list(){
        $startdate=$this->input->post('startdate',TRUE);
        $enddate=$this->input->post('enddate',TRUE);
        $fleet=$this->input->post('fleetoperator',TRUE);
        $form_status=$this->ValidateDate();
        if($form_status==true){
            $sd=date('Y-m-d',strtotime($startdate));
            $ed=date('Y-m-d',strtotime($enddate));
            if($sd>$ed){
                $data['msg']='End Date must be greater or equal to Start Date';
                $data['color']='alert alert-danger';
                $data['fleetarr']=$this->report->ShowMasterFleet();
                $data['url'] = '/fleet_operator_wise_list';
            }else{
                $inputarr=['startdate'=>$sd,'enddate'=>$ed,'fleetoperator'=>$fleet];
                $data['result']=$this->report->ShowFleetWiseReport($inputarr);
                $data['page'] = '/report/zone_wise_report';
                $data['startdate']=date('d/m/Y',strtotime($sd));
                $data['enddate']=date('d/m/Y',strtotime($ed));
                $data['fleetarr']=$this->report->ShowMasterFleet();
                $data['url'] = '/fleet_operator_wise_list';
            }
        }else{
                $data['msg'] = "Please Fill Required Fields";
                $data['color']='alert alert-danger';
                $data['url'] = '/fleet_operator_wise_list';
                $data['fleetarr']=$this->report->ShowMasterFleet();
                }  
                $this->session->set_flashdata('temp_data', $data);
                redirect(base_url() . 'report/fleet_operator_wise_report');     
    }

    public function agency_wise_report(){
        $data['page'] = '/report/agency_wise_report';
        $data['url'] = '/agency_wise_list';
        $data['agencyarr']=$this->report->ShowMasterAgency();
        $data['result']=(isset($this->session->flashdata('temp_data')['result'])?$this->session->flashdata('temp_data')['result']:[]);
        $data['startdate']=isset($this->session->flashdata('temp_data')['startdate'])?$this->session->flashdata('temp_data')['startdate']:'';
        $data['enddate']=isset($this->session->flashdata('temp_data')['enddate'])?$this->session->flashdata('temp_data')['enddate']:'';
        $this->load->view('welcome_message', $data);       
    }

    public function agency_wise_list(){
        $startdate=$this->input->post('startdate',TRUE);
        $enddate=$this->input->post('enddate',TRUE);
        $agency=$this->input->post('agency',TRUE);
        $form_status=$this->ValidateDate();
        if($form_status==true){
            $sd=date('Y-m-d',strtotime($startdate));
            $ed=date('Y-m-d',strtotime($enddate));
            if($sd>$ed){
                $data['msg']='End Date must be greater or equal to Start Date';
                $data['color']='alert alert-danger';
                $data['agencyarr']=$this->report->ShowMasterAgency();
                $data['url'] = '/agency_wise_list';
            }else{
                $inputarr=['startdate'=>$sd,'enddate'=>$ed,'agency'=>$agency];
                $data['result']=$this->report->ShowAgencyWiseReport($inputarr);
                $data['page'] = '/report/zone_wise_report';
                $data['startdate']=date('d/m/Y',strtotime($sd));
                $data['enddate']=date('d/m/Y',strtotime($ed));
                $data['agencyarr']=$this->report->ShowMasterAgency();
                $data['url'] = '/agency_wise_list';
            }
        }else{
                $data['msg'] = "Please Fill Required Fields";
                $data['color']='alert alert-danger';
                $data['url'] = '/agency_wise_list';
                $data['agencyarr']=$this->report->ShowMasterAgency();
                }  
                $this->session->set_flashdata('temp_data', $data);
                redirect(base_url() . 'report/agency_wise_report');     
    }

    public function vehicle_wise_report(){
        $data['page'] = '/report/vehicle_wise_report';
        $data['url'] = '/vehicle_wise_list';
        $data['vehiclearr']=$this->report->ShowMasterVehicle();
        $data['result']=(isset($this->session->flashdata('temp_data')['result'])?$this->session->flashdata('temp_data')['result']:[]);
        $data['startdate']=isset($this->session->flashdata('temp_data')['startdate'])?$this->session->flashdata('temp_data')['startdate']:'';
        $data['enddate']=isset($this->session->flashdata('temp_data')['enddate'])?$this->session->flashdata('temp_data')['enddate']:'';
        $this->load->view('welcome_message', $data);    
    }

    public function vehicle_wise_list(){
        $startdate=$this->input->post('startdate',TRUE);
        $enddate=$this->input->post('enddate',TRUE);
        $vehicle=$this->input->post('vehicle_no',TRUE);
        if($vehicle=='All'){
            $vehicle='';
        }
        $form_status=$this->ValidateDate();
        if($form_status==true){
            $sd=date('Y-m-d',strtotime($startdate));
            $ed=date('Y-m-d',strtotime($enddate));
            if($sd>$ed){
                $data['msg']='End Date must be greater or equal to Start Date';
                $data['color']='alert alert-danger';
                $data['vehiclearr']=$this->report->ShowMasterVehicle();
                $data['url'] = '/vehicle_wise_list';
            }else{
                if(!empty($vehicle)){
                    $vehiarr=explode('-',$vehicle);
                }
                $vehicleid=isset($vehiarr[0])?$vehiarr[0]:'';
                $vehicletype=isset($vehiarr[1])?$vehiarr[1]:'';
                $inputarr=['startdate'=>$sd,'enddate'=>$ed,'vehicle_id'=>$vehicleid,'vehicle_type'=>$vehicletype];
                $data['result']=$this->report->ShowVehicleWiseReport($inputarr);
                $data['page'] = '/report/vehicle_wise_report';
                $data['startdate']=date('d/m/Y',strtotime($sd));
                $data['enddate']=date('d/m/Y',strtotime($ed));
                $data['vehiclearr']=$this->report->ShowMasterVehicle();
                $data['url'] = '/vehicle_wise_list';
            }
        }else{
                $data['msg'] = "Please Fill Required Fields";
                $data['color']='alert alert-danger';
                $data['url'] = '/vehicle_wise_list';
                $data['vehiclearr']=$this->report->ShowMasterVehicle();
                }  
                $this->session->set_flashdata('temp_data', $data);
                redirect(base_url() . 'report/vehicle_wise_report');     
    }
 
}