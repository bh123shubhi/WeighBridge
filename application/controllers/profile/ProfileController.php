<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('profile/Profile');
        $this->load->library('form_validation');
        $this->load->helper('url', 'form');
        $this->res = $this->common->checkLoginAuth();
        if($this->res===false){
            redirect(base_url()."login");
        }
    }
    public function viewProfile(){
        $data['page'] = 'profile/profile';
        $data['url'] = 'save_profile';
        $data['userdata']=$this->session->userData('user_auth_data');
        $this->load->view('welcome_message', $data);
    }

    public function save_profile(){
        $emailid=$this->input->post('profile_email_id',TRUE);
        $contact_no=$this->input->post('contact_no',TRUE);
        $uploadOk=0;
        $file_path='';
        if(empty($emailid) && empty($contact_no) && empty($_FILES['profile_pic'])){
            $data['msg']='Please Fill Details';
            $data['color']='alert alert-danger';
            $data['url'] = 'save_profile';
            $this->session->set_flashdata('temp_data', $data);
            redirect(base_url() . 'profile');
        }else{
            if($_FILES['profile_pic']['error']!==4){
                $target_dir = "upload/profileimage/";
                $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                    $data['msg']='Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
                    $data['color']='alert alert-danger';
                    $data['url'] = 'save_profile';
                    $data['userdata']=$this->session->userData('user_auth_data');
                    $this->session->set_flashdata('temp_data', $data);
                    redirect(base_url() . 'profile');
                }
                if ($_FILES["profile_pic"]["size"] > 20000) {
                    $data['msg']='Sorry, your file is too large.';
                    $data['color']='alert alert-danger';
                    $data['url'] = 'save_profile';
                    $data['userdata']=$this->session->userData('user_auth_data');
                    $this->session->set_flashdata('temp_data', $data);
                    redirect(base_url() . 'profile');
                }
                if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
                    $uploadOk=1;
                }else{
                    $data['msg']='Sorry, there was an error uploading your file.';
                    $data['color']='alert alert-danger';
                    $data['url'] = 'save_profile';
                    $data['userdata']=$this->session->userData('user_auth_data');
                    $this->session->set_flashdata('temp_data', $data);
                    redirect(base_url() . 'profile');   
                }

            }else{
                $uploadOk=1;
            }
            if($uploadOk==1){
                $datarray=[
                    'email_id'=>$emailid,
                    'contact_no'=>!empty($contact_no)?$contact_no:$this->session->userData('user_auth_data')['value']['contact_no'],
                    'profile_filepath'=>$target_file,
                    'id'=>$this->session->userData('user_auth_data')['value']['id']
                    ]; 
            }else{
                $datarray=[
                    'email_id'=>$emailid,
                    'contact_no'=>!empty($contact_no)?$contact_no:$this->session->userData('user_auth_data')['value']['contact_no'],
                    'profile_filepath'=>'',
                    'id'=>$this->session->userData('user_auth_data')['value']['id']
                    ]; 
            }
            $result=$this->profile->updateProfileDetail($datarray);
            if($result==1){
                $data['msg']='Data Successfully Updated';
                $data['color']='alert alert-success';
                $data['url'] = 'save_profile';
                $result=$this->profile->checkLoginCredentials($this->session->userData('user_auth_data')['value']['id']);
                $this->session->set_userdata('user_auth_data',$result);
                $data['userdata']=$this->session->userData('user_auth_data');
                $this->session->set_flashdata('temp_data', $data);
                redirect(base_url() . 'profile');
            }else{
                $data['msg']='Data Not Updated';
                $data['color']='alert alert-danger';
                $data['url'] = 'save_profile';
                $result=$this->profile->checkLoginCredentials($this->session->userData('user_auth_data')['value']['id']);
                $this->session->set_userdata('user_auth_data',$result);
                $data['userdata']=$this->session->userData('user_auth_data');
                $this->session->set_flashdata('temp_data', $data);
                redirect(base_url() . 'profile');
            }
        }
    }

    public function account_setting(){
        $data['page'] = 'profile/account_setting';
        $data['url'] = 'save_account_setting';
        $data['userdata']=$this->session->userData('user_auth_data');
        $this->load->view('welcome_message', $data);
    }

    public function save_account_setting(){
        $password=$this->input->post('password',TRUE);
        $confirm_password=$this->input->post('confirm_password',TRUE);
        if(empty($password) || empty($confirm_password)){
            $data['msg']='Please Fill Details';
            $data['color']='alert alert-danger';
            $data['url'] = 'save_account_setting';
            $this->session->set_flashdata('temp_data', $data);
            redirect(base_url() . 'account_setting');
        }else{
            $dataArr=['password'=>$password,'confirm_password'=>$confirm_password];
            $userid=$this->session->userData('user_auth_data')['value']['id'];
            $result=$this->profile->updateUserPassword($dataArr,$userid);
            if($result==1){
                $data['msg']='Password Successfully Changed';
                $data['color']='alert alert-success';
                $data['url'] = 'save_account_setting';
                $this->session->set_flashdata('temp_data', $data);
                redirect(base_url() . 'account_setting');
            }else{
                $data['msg']='Password Not Updated';
                $data['color']='alert alert-danger';
                $data['url'] = 'save_account_setting';    
                $this->session->set_flashdata('temp_data', $data);
                redirect(base_url() . 'account_setting');
            }
        }


    }

    
}