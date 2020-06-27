<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->library('form_validation');
        $this->load->library('login/Login');
    }
    public function viewlogin(){
        $this->load->view('login/login');
    }

    public function save_login(){
        $username=$this->input->post('username',TRUE);
        $password=$this->input->post('password',TRUE);
        $dataArr=['username'=>$username,'password'=>$password];
        $form_status=$this->ValidateLoginEntry();
        $data['msg'] = "Invalid credentials please try again";
        $this->session->set_flashdata('temp_data', $data);
        $redirect_url = base_url() . 'login'; 
        if($form_status==true){
            $result=$this->login->checkLoginCredentials($dataArr);
            if($result['status']){
                $this->session->set_userdata('user_auth_data',$result);
                $redirect_url = base_url() . 'dashboard'; 
            }
            
        }else{
            $data['msg'] = validation_errors();
            $this->session->set_flashdata('temp_data', $data);
         
        }
        redirect($redirect_url); 
    }

    public function ValidateLoginEntry() {
        $this->form_validation->set_rules('username', 'UserName', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            return false;
        } else {
            return true;
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        $this->res = $this->common->checkLoginAuth();
        if($this->res===false || !empty($this->res)){
            redirect(base_url()."login");
        }
    }
}