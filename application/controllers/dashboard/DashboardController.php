<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->library('dashboard/Dashboard');
        $this->res = $this->common->checkLoginAuth();
        if($this->res===false){
            redirect(base_url()."login");
        }
    }

    public function dashboardview(){
        $data['page'] = 'dashboard/dashboard';
        $data['result']=$this->dashboard->getInVehicle();
        $this->load->view('welcome_message', $data);
    }
}