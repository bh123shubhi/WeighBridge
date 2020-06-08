<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EntryVehicleController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->library('vehicle/Vehicle');
        $this->entryType = [
            "General Entry",
            "Other Vehicle",
            "Empty Entry"];
        date_default_timezone_set("Asia/Calcutta");
        $this->load->library('form_validation');

    }

    public function vehicle_entry() {
        $data['page'] = '/vehicle/vehicle_entry';
        $data['result']=$this->vehicle->show_vehicle_no();
        $data['garbage']=$this->vehicle->show_garbage();
        $data['zone']=$this->vehicle->show_zone();
        $data['entry'] = $this->entryType;
        $data['url']='/save_vehicle_entryin';

        $this->load->view('welcome_message', $data);
    }

    public function show_vehicle_detail() {
        $vehicle_no = $this->input->post('vehicleno');
        $vehicle_type = $this->input->post('type');
        $status = $this->checkVehicleIn($vehicle_no,$vehicle_type);
        $result = ["status"=>false,"result"=>[],"vehicle_entry_status"=>$status['status'],"msg"=>$status['msg']];
        if($status['status']){
             $result=$this->vehicle->show_vehicle_detail($vehicle_no,$vehicle_type);
             $result["vehicle_entry_status"] = $status['status'];
             $result["msg"] = $status['msg'];
        }
       
        echo json_encode($result);
    }

    public function save_vehicle_entryin(){
        //onload condition
        $data['page'] = '/vehicle/vehicle_entry';
        $data['result']=$this->vehicle->show_vehicle_no();
        $data['garbage']=$this->vehicle->show_garbage();
        $data['zone']=$this->vehicle->show_zone();
        $data['entry'] = $this->entryType;
        $data['url']='/save_vehicle_entryin';
        $data['msg']='';
         //onload conditon ends
          $dataArr=[];
          $uploadpath=$_SERVER['DOCUMENT_ROOT'].'/upload/webcamimage/';
          if(!is_dir($uploadpath)){
              if (!mkdir($uploadpath, 0777, true)) {
                  die('Failed to create folders...');
              }
          }
          $file_path='';
          if(!empty($this->input->post('webcam_img_ul'))){
              $img_url=$this->input->post('webcam_img_ul');
              $image_parts = explode(";base64,", $this->input->post('webcam_img_ul'));
              $image_type_aux = explode("image/", $image_parts[0]);
              $image_type = $image_type_aux[1];
              $image_base64 = base64_decode($image_parts[1]);
              $filename = uniqid() . '.jpg';
              $filepath=$uploadpath .$filename;
              if(file_put_contents($filepath, $image_base64)){
                  $file_path='upload/webcamimage/'.$filename;
              }else{
                  $data['color']='alert alert-danger';
                  $data['msg']='File Not Uploaded';
                  $data['page'] = '/vehicle/vehicle_entry';
                  $data['url']='/save_vehicle_entryin';
              }
          }
          $vehicleno = $this->input->post('vehicleno', TRUE);
          $vehicle=explode('-',$vehicleno);
        
          $dataArr =[
              "vehicle_no" => $vehicle[0],
              "vehicle_id" => $this->vehicle->getvehicleid($vehicle[0],$vehicle[1]),
              "vehicle_type" => strtolower($vehicle[1])=='mcd'?'MCD':'PRIVATE',
              "entry_type" => isset($this->entryType[$this->input->post('main_entry_type', TRUE)])?$this->entryType[$this->input->post('main_entry_type', TRUE)]:'',
              "zone_coming_id" => (!empty($this->input->post('zone_coming_from', TRUE))?$this->input->post('zone_coming_from', TRUE):0),
              "garbage_type_id" => $this->input->post('garbage', TRUE),
              "garbage_nature"=> $this->input->post('garbage_nature', TRUE),
              "reference" => $this->input->post('refrence', TRUE),
              "driver_id" => $this->input->post('driveid', TRUE),
              "webcam_imgpath"=>$file_path
          ];
            
          if(strtolower($vehicle[1])=='mcd'){
              $dataArr["fleet_operator"] = $this->input->post('floperator', TRUE);
  
              $dataArr["base_zone"] = $this->input->post('bzone', TRUE);
          }
          if(strtolower($vehicle[1])=='private'){
              $dataArr["agency"] = $this->input->post('agency', TRUE);
  
          }
        
          //Others or General
         
          if(!empty($dataArr['vehicle_no'])){
              $slip_no=$this->getVehicleSlipNo();
  
              $dataArr['slipno'] =!empty($slip_no)?$slip_no+1:1000; 
              $form_status=$this->ValidateVehicleEntryForm($dataArr);
              if($form_status==false){
                $data['msg'] = '';
                $data['color'] = 'alert alert-danger';
                $data['page'] = '/vehicle/vehicle_entry';
                $data['result']=$this->vehicle->show_vehicle_no();
                $data['garbage']=$this->vehicle->show_garbage();
                $data['zone']=$this->vehicle->show_zone();
                $data['entry'] = $this->entryType;
                $data['url']='/save_vehicle_entryin';
            }else{
                if(in_array($this->input->post('main_entry_type', TRUE),['0','1'])){
                    $grosswt=$this->input->post('gross_weight', TRUE);
                    $dataArr['gross_weight']=isset($grosswt)?floatval($grosswt):0;
                    $insertresult=$this->vehicle->save_vehicle_entry($dataArr);
                }else{
                     //Empty Condition
                    $tarewt=$this->input->post('tareweight', TRUE);
                    $dataArr['tare_weight']=isset($tarewt)?floatval($tarewt):0;
                    $insertresult=$this->vehicle->save_empty_vehicle_entry($dataArr);
                  
                }
                if($insertresult['status']==true){
                    $data['msg'] = $insertresult['msg'];
                    $data['color'] = 'alert alert-success';
                    $data['page'] = '/vehicle/vehicle_entry';
                    $data['url']='/save_vehicle_entryin';
                
                }else{
                    $data['msg'] = $insertresult['msg'];
                    $data['color'] = 'alert alert-success';
                    $data['page'] = '/vehicle/vehicle_entry';
                    $data['url']='/save_vehicle_entryin';
                } 
            } 
              
          }else{
              $data['msg'] = "vehicle no required";
              $data['color'] = 'alert alert-success';
              $data['page'] = '/vehicle/vehicle_entry';
              $data['url']='/save_vehicle_entryin';
              
          }
        

        
        $this->load->view('welcome_message', $data);      
        
    }
    public function checkVehicleIn($vehicle_no,$vehicle_type){
        $res = ['status'=>true,"msg"=>"Vehicle Entry Allow"]; //true means allow entry false means disallow entry
        
       if(!empty($vehicle_no) && !empty($vehicle_type)){
          $res = $this->vehicle->check_vehicle_entry($vehicle_no,$vehicle_type);
        }
        return $res;
    }

     public function getVehicleSlipNo(){
        $res = $this->vehicle->getVehicleSlipNo();  
        return $res;
    }

    public function ValidateVehicleEntryForm($dataArr) {
        $this->form_validation->set_rules('vehicleno', 'Vehicle No', 'required');
        //$this->form_validation->set_rules('entrytype', 'Entry Type', 'required');
        $this->form_validation->set_rules('zone_coming_from', 'Zone Coming From', 'required');
        if(strtolower(str_replace(" ","_",$dataArr['entry_type']))!='empty_entry'){
            $this->form_validation->set_rules('gross_weight', 'Gross Weight', 'required');
        }else{
            $this->form_validation->set_rules('tareweight', 'Tare Weight', 'required');
        }
        $this->form_validation->set_rules('garbage_id', 'GarBage Type', 'required');
        if ($this->form_validation->run() == FALSE) {
            return false;
        } else {
            return true;
        }
    }


}
