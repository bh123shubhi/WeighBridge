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

}