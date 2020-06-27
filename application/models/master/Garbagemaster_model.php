<?php

class Garbagemaster_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $this->db = $CI->db;
    }

    public function getGarbageMaster() {
        $this->db->select('gar.*,user.first_name,user.last_name');
        $this->db->from('tbl_master_garbage as gar');
        $this->db->join('tbl_master_user as user','gar.entry_by=user.id','left');
        $result = $this->db->get()->result_array();
        if (count($result) > 0) {
            return array('status' => true, 'msg' => 'Garbage List Found', 'value' => $result);
        } else {
            return array('status' => false, 'msg' => 'Garbage list not found', 'value' => []);
        }
    }

    public function garbageStatusChange($id) {
        $this->db->select('status');
        $this->db->from('tbl_master_garbage');
        $this->db->where('id', $id);
        $res = $this->db->get()->row_array();
        if (count($res) > 0) {
            $status = $res['status'];
            $new_status = $status == 'TRUE' ? 'FALSE' : 'TRUE';
            $data = array('status' => $new_status,'entry_by'=>$this->res['value']['id']);
            $data['updated_at']=date('Y-m-d H:i:s');
            $this->db->where('id', $id);
            $this->db->update('tbl_master_garbage', $data);
            if ($this->db->affected_rows() > 0) {
                return $array = array('status' => true, 'msg' => 'Status Successfully Updated');
            } else {
                return $array = array('status' => false, 'msg' => 'Status Not Updated');
            }
        } else {
            return $array = array('status' => false, 'msg' => 'Data Not found');
        }
    }

    public function saveGarbage($data) {
        $data['timestamp']=date('Y-m-d H:i:s');
        $data['updated_at']=date('Y-m-d H:i:s');
        $this->db->insert('tbl_master_garbage', $data);
        if ($this->db->affected_rows() > 0) {
            return $array = array('status' => true, 'msg' => 'Data Successfully Saved');
        } else {
            return $array = array('status' => false, 'msg' => 'Data Not Saved');
        }
    }

    public function getSingleGarbage($id) {
        $this->db->select('*');
        $this->db->from('tbl_master_garbage');
        $this->db->where('id', $id);
        $result = $this->db->get()->row_array();
        if (count($result) > 0) {
            return array('status' => true, 'msg' => 'Garbage Found', 'value' => $result);
        } else {
            return array('status' => false, 'msg' => 'Garbage Not Found', 'value' => []);
        }
    }

    public function updateGarbage($data, $id) {
        $this->db->select('*');
        $this->db->from('tbl_master_garbage');
        $this->db->where('garbage', $data['garbage']);
        $this->db->where('id !=', $id);
        $res = $this->db->get()->result_array();
        if (count($res) > 0) {
            $array = array('status' => false, 'msg' => 'Garbage Already Exists');
            return $array;
        } else {
            $data['updated_at']=date('Y-m-d H:i:s');
            $this->db->where('id', $id);
            $this->db->update('tbl_master_garbage', $data);
            if ($this->db->affected_rows() > 0) {
                return $array = array('status' => true, 'msg' => 'Data Successfully Updated');
            } else {
                return $array = array('status' => false, 'msg' => 'Data Not Updated');
            }
        }
    }

}
