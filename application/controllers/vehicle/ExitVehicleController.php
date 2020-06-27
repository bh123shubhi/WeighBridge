<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ExitVehicleController extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->res = $this->common->checkLoginAuth();
        if($this->res===false){
            redirect(base_url()."login");
        }
        $this->load->library('user_agent');

        $this->load->library('vehicle/Vehicle');
        $this->entryType = [
            "General Entry",
            "Other Vehicle",
            "Empty Entry"];
        $this->flipentryType = array_flip($this->entryType);

    }

    public function vehicle_exit() {

        $data['page'] = '/vehicle/vehicle_exit';

        $data['result']=$this->vehicle->show_exit_vehicle_no();
         $data['entry']=$this->flipentryType;
        $data['url']='/save_vehicle_exit';
     
        $this->load->view('welcome_message', $data);
    }

    // public function show_vehicle_detail() {
    //     $result=$this->vehicle->show_vehicle_detail();
    //     echo json_encode($result);
    // }

    public function save_vehicle_exit(){

         $vehicle_no_exit = $this->input->post('exit_vehicle_no',TRUE);
         $emptyweight=$this->input->post('emptyweight',TRUE);
         $grossweight=$this->input->post('grossweight',TRUE);
         $empty_weight = (isset($emptyweight)?floatval($emptyweight):0);
         $gross_weight = (isset($grossweight)?floatval($grossweight):0);
         $vehicle_no = '';
         $vehicle_type = '';
         $vehicle_entry_id = 0;
         $entry_type ='';
         if(!empty($vehicle_no_exit)){
            $vehicle_no_arr = explode("-",$vehicle_no_exit);
            
            $vehicle_no = !empty($vehicle_no_arr[0])?$vehicle_no_arr[0]:'';
            $vehicle_type = !empty($vehicle_no_arr[1])?$vehicle_no_arr[1]:'';
            $vehicle_entry_id = !empty($vehicle_no_arr[2])?$vehicle_no_arr[2]:0;
            $entry_type = isset($vehicle_no_arr[3])?$vehicle_no_arr[3]:'';
         }
         $vehicle_exit_arr = ["vehicle_no"=>$vehicle_no,"vehicle_type"=>$vehicle_type,"vehicle_entry_id"=>$vehicle_entry_id,"entry_type"=>(isset($this->entryType[$entry_type])?$this->entryType[$entry_type]:'')];
         if($entry_type==2){
            $vehicle_exit_arr['grossweight'] = $gross_weight;
         }else{
            $vehicle_exit_arr['emptyweight'] = $empty_weight;
         }
         $insertresult = $this->vehicle->save_exit_vehicle($vehicle_exit_arr);
         if($insertresult['status']==true){
            $data['msg'] = $insertresult['msg'];
            $data['color'] = 'alert alert-success';
            $data['page'] = '/vehicle/vehicle_exit';
            $data['url']='/save_vehicle_exit';
            $this->load->view('welcome_message', $data);
        }else{
            $data['msg'] = $insertresult['msg'];
            $data['color'] = 'alert alert-danger';
            $data['page'] = '/vehicle/vehicle_exit';
            $data['url']='/save_vehicle_exit';
            $this->load->view('welcome_message', $data);

        }       



        
    }

}
