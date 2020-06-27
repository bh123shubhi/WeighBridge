<?php

class Home_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $this->db = $CI->db;
    }

    public function saveAdmin($data) {
        $usrname = $this->db->get_where('tbl_master_user', array('username' => $data['username']))->result_array();
        if (count($usrname) > 0) {
            return $array = array('status' => false, 'msg' => 'UserName Already Exists');
        } else {
            $data['timestamp']=date('Y-m-d H:i:s');
            $data['updated_at']=date('Y-m-d H:i:s');
            $this->db->insert('tbl_master_user', $data);
            if ($this->db->affected_rows() > 0) {
                return $array = array('status' => true, 'msg' => 'Data Successfully Saved');
            } else {
                return $array = array('status' => false, 'msg' => 'Data Not Saved');
            }
        }
    }

    public function getAdmin() {
        $this->db->select('*');
        $this->db->from('tbl_master_user');
        $this->db->where('user_type', 'ADMIN');
        $result = $this->db->get()->result_array();
        if (count($result) > 0) {
            return array('status' => true, 'msg' => 'Admin List Found', 'value' => $result);
        } else {
            return array('status' => false, 'msg' => 'Admin list not found', 'value' => []);
        }
    }

    public function getSingleAdmin($id) {
        $this->db->select('*');
        $this->db->from('tbl_master_user');
        $this->db->where('id', $id);
        $result = $this->db->get()->row_array();
        if (count($result) > 0) {
            $adminarr = [];
            $adminarr['id'] = $result['id'];
            $adminarr['user_type'] = $result['user_type'];
            $adminarr['fname'] = $result['first_name'];
            $adminarr['lname'] = $result['last_name'];
            $adminarr['lfsid'] = $result['landfill_site_id'];
            $adminarr['mob'] = $result['contact_no'];
            $adminarr['validity'] = $result['valid_till'];
            $adminarr['address'] = $result['address'];
            $adminarr['state'] = $result['state'];
            $adminarr['city'] = $result['city'];
            $adminarr['pin'] = $result['pincode'];
            $adminarr['username'] = $result['username'];
            $adminarr['pass'] = $result['password'];
            $adminarr['cpass'] = $result['confirm_password'];
            return array('status' => true, 'msg' => 'Admin Found', 'value' => $adminarr);
        } else {
            return array('status' => false, 'msg' => 'Admin Found', 'value' => []);
        }
    }

    public function updateAdmin($data, $id) {
        $this->db->select('*');
        $this->db->from('tbl_master_user');
        $this->db->where('username', $data['username']);
        $this->db->where('id !=', $id);
        $res = $this->db->get()->result_array();
        if (count($res) > 0) {
            return $array = array('status' => false, 'msg' => 'UserName Already Exists');
        } else {
            $data['updated_at']=date('Y-m-d H:i:s');
            $this->db->where('id', $id);
            $this->db->update('tbl_master_user', $data);
            if ($this->db->affected_rows() > 0) {
                return $array = array('status' => true, 'msg' => 'Data Successfully Updated');
            } else {
                return $array = array('status' => false, 'msg' => 'Data Not Updated');
            }
        }
    }

    public function adminStatusChange($id) {
        $this->db->select('status');
        $this->db->from('tbl_master_user');
        $this->db->where('id', $id);
        $res = $this->db->get()->row_array();
        if (count($res) > 0) {
            $status = $res['status'];
            $new_status = $status == 'Active' ? 'In-Active' : 'Active';
            $data=array('status'=>$new_status);
            $data['updated_at']=date('Y-m-d H:i:s');
            $this->db->where('id', $id);
            $this->db->update('tbl_master_user', $data);
            if ($this->db->affected_rows() > 0) {
                return $array = array('status' => true, 'msg' => 'Status Successfully Updated');
            } else {
                return $array = array('status' => false, 'msg' => 'Status Not Updated');
            }
        } else {
            return $array = array('status' => false, 'msg' => 'Data Not found');
        }
    }

    public function check_user_name($username){
        $this->db->select('username');
        $result=$this->db->get_where('tbl_master_user',array('username'=>$username))->result_array();
        if(count($result)>0){
            return false;
        }else{
            return true;
        }
    }

}
