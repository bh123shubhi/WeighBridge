<?php

class Profile_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $this->db = $CI->db;
    }

    public function updateProfileDetail($data){
        $id=$data['id'];
        unset($data['id']);
        $this->db->where('id',$id);
        $this->db->update('tbl_master_user',$data);
        if($this->db->affected_rows()>0){
            $status=true;
        }else{
            $status=false;
        }
        return $status;
    }

    public function updateUserPassword($data,$userid){
        $this->db->where('id',$userid);
        $this->db->update('tbl_master_user',$data);
        if($this->db->affected_rows()>0){
            $status=true;
        }else{
            $status=false;
        }
        return $status;    
    }

    public function checkLoginCredentials($id){
        $this->db->select('*');
        $this->db->from('tbl_master_user');
        $this->db->where('id',$id);
        $result = $this->db->get()->row_array();
        if (!empty($result) && is_array($result) && count($result) > 0) {
            return array('status' => true, 'msg' => 'User Successfully login', 'value' => $result);
        } else {
            return array('status' => false, 'msg' => 'Login Credentials Invalid', 'value' => []);
        }
    }

}