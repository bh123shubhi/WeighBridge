<?php

class Agencymaster_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $this->db = $CI->db;
    }

    public function getAgencyMaster() {
        $this->db->select('agency.*,user.first_name,user.last_name');
        $this->db->from('tbl_master_agency as agency');
        $this->db->join('tbl_master_user as user','agency.entry_by=user.id','left');
        $result = $this->db->get()->result_array();
        if (count($result) > 0) {
            return array('status' => true, 'msg' => 'Agency List Found', 'value' => $result);
        } else {
            return array('status' => false, 'msg' => 'Agency list not found', 'value' => []);
        }
    }

    public function agencyStatusChange($id) {
        $this->db->select('status');
        $this->db->from('tbl_master_agency');
        $this->db->where('id', $id);
        $res = $this->db->get()->row_array();
        if (count($res) > 0) {
            $status = $res['status'];
            $new_status = $status == 'TRUE' ? 'FALSE' : 'TRUE';
            $data = array('status' => $new_status,'entry_by'=>$this->res['value']['id']);
            $data['updated_at']=date('Y-m-d H:i:s');
            $this->db->where('id', $id);
            $this->db->update('tbl_master_agency', $data);
            if ($this->db->affected_rows() > 0) {
                return $array = array('status' => true, 'msg' => 'Status Successfully Updated');
            } else {
                return $array = array('status' => false, 'msg' => 'Status Not Updated');
            }
        } else {
            return $array = array('status' => false, 'msg' => 'Data Not found');
        }
    }

    public function saveAgency($data) {
        $data['timestamp']=date('Y-m-d H:i:s');
        $data['updated_at']=date('Y-m-d H:i:s');
        $this->db->insert('tbl_master_agency', $data);
        if ($this->db->affected_rows() > 0) {
            return $array = array('status' => true, 'msg' => 'Data Successfully Saved');
        } else {
            return $array = array('status' => false, 'msg' => 'Data Not Saved');
        }
    }

    public function getSingleAgency($id) {
        $this->db->select('*');
        $this->db->from('tbl_master_agency');
        $this->db->where('id', $id);
        $result = $this->db->get()->row_array();
        if (count($result) > 0) {
            return array('status' => true, 'msg' => 'Agency Found', 'value' => $result);
        } else {
            return array('status' => false, 'msg' => 'Agency Not Found', 'value' => []);
        }
    }

    public function updateAgency($data, $id) {
        $this->db->select('*');
        $this->db->from('tbl_master_agency');
        $this->db->where('agencyname', $data['agencyname']);
        $this->db->where('id !=', $id);
        $res = $this->db->get()->result_array();
        if (count($res) > 0) {
            $array = array('status' => false, 'msg' => 'Agency Already Exists');
            return $array;
        } else {
            $data['updated_at']=date('Y-m-d H:i:s');
            $this->db->where('id', $id);
            $this->db->update('tbl_master_agency', $data);
            if ($this->db->affected_rows() > 0) {
                return $array = array('status' => true, 'msg' => 'Data Successfully Updated');
            } else {
                return $array = array('status' => false, 'msg' => 'Data Not Updated');
            }
        }
    }

}
