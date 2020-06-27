<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ListVehicleController extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->library('user_agent');   
        $this->load->library('vehicle/Vehicle');

    }

    public function vehicle_register() {
        $data['page'] = '/vehicle/vehicle_register';
        $data['result']=$this->vehicle->show_vehicle_list();
        $this->load->view('welcome_message', $data);
    }

    public function view_vehicle($slipno,$entrytype){
        $entry_type=str_replace('_',' ',$entrytype);
        $data['page'] = '/vehicle/view_vehicle';
        $data['result']=$this->vehicle->show_single_vehicle($slipno,$entry_type);
        $this->load->view('welcome_message', $data);  
    }

}
