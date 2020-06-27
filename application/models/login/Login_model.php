<?php

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $this->db = $CI->db;
    }

    public function checkLoginCredentials($data) {
        $this->db->select('*');
        $this->db->from('tbl_master_user');
        $this->db->where(array('username'=>$data['username'],'password'=>$data['password'],'status'=>'Active'));
        $result = $this->db->get()->row_array();
        if (!empty($result) && is_array($result) && count($result) > 0) {
            return array('status' => true, 'msg' => 'User Successfully login', 'value' => $result);
        } else {
            return array('status' => false, 'msg' => 'Login Credentials Invalid', 'value' => []);
        }
    }








}
