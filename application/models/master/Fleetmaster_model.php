<?php

class Fleetmaster_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $this->db = $CI->db;
    }

    public function getFleetMaster() {
        $this->db->select('fleet.*,user.first_name,user.last_name');
        $this->db->from('tbl_master_fleetoperator as fleet');
        $this->db->join('tbl_master_user as user','fleet.entry_by=user.id','left');
        $result = $this->db->get()->result_array();
        if (count($result) > 0) {
            return array('status' => true, 'msg' => 'Fleet Operator List Found', 'value' => $result);
        } else {
            return array('status' => false, 'msg' => 'Fleet Operator list not found', 'value' => []);
        }
    }

    public function fleetStatusChange($id) {
        $this->db->select('status');
        $this->db->from('tbl_master_fleetoperator');
        $this->db->where('id', $id);
        $res = $this->db->get()->row_array();
        if (count($res) > 0) {
            $status = $res['status'];
            $new_status = $status == 'TRUE' ? 'FALSE' : 'TRUE';
            $data = array('status' => $new_status,'entry_by'=>$this->res['value']['id']);
            $data['updated_at']=date('Y-m-d H:i:s');
            $this->db->where('id', $id);
            $this->db->update('tbl_master_fleetoperator', $data);
            if ($this->db->affected_rows() > 0) {
                return $array = array('status' => true, 'msg' => 'Status Successfully Updated');
            } else {
                return $array = array('status' => false, 'msg' => 'Status Not Updated');
            }
        } else {
            return $array = array('status' => false, 'msg' => 'Data Not found');
        }
    }

    public function saveFleet($data) {
        $data['timestamp']=date('Y-m-d H:i:s');
        $data['updated_at']=date('Y-m-d H:i:s');
        $this->db->insert('tbl_master_fleetoperator', $data);
        if ($this->db->affected_rows() > 0) {
            return $array = array('status' => true, 'msg' => 'Data Successfully Saved');
        } else {
            return $array = array('status' => false, 'msg' => 'Data Not Saved');
        }
    }

    public function getSingleFleet($id) {
        $this->db->select('*');
        $this->db->from('tbl_master_fleetoperator');
        $this->db->where('id', $id);
        $result = $this->db->get()->row_array();
        if (count($result) > 0) {
            return array('status' => true, 'msg' => 'Fleet Operator Found', 'value' => $result);
        } else {
            return array('status' => false, 'msg' => 'Fleet Operator Not Found', 'value' => []);
        }
    }

    public function updateFleet($data, $id) {
        $this->db->select('*');
        $this->db->from('tbl_master_fleetoperator');
        $this->db->where('fleetoperator', $data['fleetoperator']);
        $this->db->where('id !=', $id);
        $res = $this->db->get()->result_array();
        if (count($res) > 0) {
            $array = array('status' => false, 'msg' => 'Fleet Operator Already Exists');
            return $array;
        } else {
            $data['updated_at']=date('Y-m-d H:i:s');
            $this->db->where('id', $id);
            $this->db->update('tbl_master_fleetoperator', $data);
            if ($this->db->affected_rows() > 0) {
                return $array = array('status' => true, 'msg' => 'Data Successfully Updated');
            } else {
                return $array = array('status' => false, 'msg' => 'Data Not Updated');
            }
        }
    }

}
