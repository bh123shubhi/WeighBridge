<?php

class Vehiclemaster_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $this->db = $CI->db;
    }

    public function getZoneTimeList() {
        $this->db->select('zonetime.*,zone.zone');
        $this->db->from('tbl_zone_time_details as zonetime');
        $this->db->join('tbl_master_zone as zone', 'zonetime.zone_id=zone.id', 'left');
        $result = $this->db->get()->result_array();
        if (count($result) > 0) {
            return array('status' => true, 'msg' => 'Zone Time List Found', 'value' => $result);
        } else {
            return array('status' => false, 'msg' => 'Zone Time List not found', 'value' => []);
        }
    }

    public function getZoneMasterList() {
        $sql="select * from tbl_master_zone where status='TRUE' and id NOT IN(select zone_id from tbl_zone_time_details where status='TRUE')";
        $result = $this->db->query($sql)->result_array();
        if (count($result) > 0) {
            return array('status' => true, 'msg' => 'Zone Master List Found', 'value' => $result);
        } else {
            return array('status' => false, 'msg' => 'Zone Master list not found', 'value' => []);
        }
    }

    public function getmcdzonemasterlist(){
        $sql="select * from tbl_master_zone where status='TRUE'";
        $result = $this->db->query($sql)->result_array();
        if (count($result) > 0) {
            return array('status' => true, 'msg' => 'Zone Master List Found', 'value' => $result);
        } else {
            return array('status' => false, 'msg' => 'Zone Master list not found', 'value' => []);
        }   
    }

    public function zonetimeStatusChange($id) {
        $this->db->select('status');
        $this->db->from('tbl_zone_time_details');
        $this->db->where('id', $id);
        $res = $this->db->get()->row_array();
        if (count($res) > 0) {
            $status = $res['status'];
            $new_status = $status == 'TRUE' ? 'FALSE' : 'TRUE';
            $data = array('status' => $new_status);
            $this->db->where('id', $id);
            $this->db->update('tbl_zone_time_details', $data);
            if ($this->db->affected_rows() > 0) {
                return $array = array('status' => true, 'msg' => 'Status Successfully Updated');
            } else {
                return $array = array('status' => false, 'msg' => 'Status Not Updated');
            }
        }
    }

    public function saveZoneTime($data) {
        $this->db->insert('tbl_zone_time_details', $data);
        if ($this->db->affected_rows() > 0) {
            return $array = array('status' => true, 'msg' => 'Data Successfully Saved');
        } else {
            return $array = array('status' => false, 'msg' => 'Data Not Saved');
        }
    }

    public function getSingleZoneTime($id) {
        $this->db->select('*');
        $this->db->from('tbl_zone_time_details');
        $this->db->where('id', $id);
        $result = $this->db->get()->row_array();
        if (count($result) > 0) {
            $result['time'] = $result['zone_time'];
            unset($result['zone_time']);
            return array('status' => true, 'msg' => 'Agency Found', 'value' => $result);
        } else {
            return array('status' => false, 'msg' => 'Agency Not Found', 'value' => []);
        }
    }

    public function updateZoneTime($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('tbl_zone_time_details', $data);
        if ($this->db->affected_rows() > 0) {
            return $array = array('status' => true, 'msg' => 'Data Successfully Updated');
        } else {
            return $array = array('status' => false, 'msg' => 'Data Not Updated');
        }
    }

    public function getAgencyMasterList() {
        $this->db->select('*');
        $this->db->from('tbl_master_agency');
        $this->db->where('status', 'TRUE');
        $result = $this->db->get()->result_array();
        if (count($result) > 0) {
            return array('status' => true, 'msg' => 'Agency Found', 'value' => $result);
        } else {
            return array('status' => false, 'msg' => 'Agency Not Found', 'value' => []);
        }
    }

    public function getGarbageMasterList() {
        $this->db->select('*');
        $this->db->from('tbl_master_garbage');
        $this->db->where('status', 'TRUE');
        $result = $this->db->get()->result_array();
        if (count($result) > 0) {
            return array('status' => true, 'msg' => 'Garbage Found', 'value' => $result);
        } else {
            return array('status' => false, 'msg' => 'Garbage Not Found', 'value' => []);
        }
    }

    public function savePrivateVehicle($data) {
        $this->db->insert('tbl_private_vehicle_details', $data);
        if ($this->db->affected_rows() > 0) {
            return $array = array('status' => true, 'msg' => 'Data Successfully Saved');
        } else {
            return $array = array('status' => false, 'msg' => 'Data Not Saved');
        }
    }

    public function getPrivateVehicleList() {
        $this->db->select('veh.*,gar.garbage,agency.agencyname');
        $this->db->from('tbl_private_vehicle_details as veh');
        $this->db->join('tbl_master_garbage as gar', 'veh.garbage_id=gar.id', 'left');
        $this->db->join('tbl_master_agency as agency', 'veh.agency_id=agency.id', 'left');
        $result = $this->db->get()->result_array();
        if (count($result) > 0) {
            return array('status' => true, 'msg' => 'Private Vehicle List Found', 'value' => $result);
        } else {
            return array('status' => false, 'msg' => 'Private Vehicle List Not Found', 'value' => []);
        }
    }

    public function getSinglePrivateVehicle($id) {
        $this->db->select('veh.*,gar.garbage,agency.agencyname');
        $this->db->from('tbl_private_vehicle_details as veh');
        $this->db->join('tbl_master_garbage as gar', 'veh.garbage_id=gar.id', 'left');
        $this->db->join('tbl_master_agency as agency', 'veh.agency_id=agency.id', 'left');
        $this->db->where('veh.id', $id);
        $result = $this->db->get()->row_array();
        if (count($result) > 0) {
            return array('status' => true, 'msg' => 'Private Vehicle Details Found', 'value' => $result);
        } else {
            return array('status' => false, 'msg' => 'Private Vehicle Details Not Found', 'value' => []);
        }
    }

    public function updatePrivateVehicle($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('tbl_private_vehicle_details', $data);
        if ($this->db->affected_rows() > 0) {
            return $array = array('status' => true, 'msg' => 'Data Successfully Updated');
        } else {
            return $array = array('status' => false, 'msg' => 'Data Not Updated');
        }
    }

    public function privateVehicleStatusChange($id) {
        $this->db->select('status');
        $this->db->from('tbl_private_vehicle_details');
        $this->db->where('id', $id);
        $res = $this->db->get()->row_array();
        if (count($res) > 0) {
            $status = $res['status'];
            $new_status = $status == 'TRUE' ? 'FALSE' : 'TRUE';
            $data = array('status' => $new_status);
            $this->db->where('id', $id);
            $this->db->update('tbl_private_vehicle_details', $data);
            if ($this->db->affected_rows() > 0) {
                return $array = array('status' => true, 'msg' => 'Status Successfully Updated');
            } else {
                return $array = array('status' => false, 'msg' => 'Status Not Updated');
            }
        }
    }

    public function getFleetMasterList() {
        $this->db->select('*');
        $this->db->from('tbl_master_fleetoperator');
        $this->db->where('status', 'TRUE');
        $result = $this->db->get()->result_array();
        if (count($result) > 0) {
            return array('status' => true, 'msg' => 'Fleet Operator Found', 'value' => $result);
        } else {
            return array('status' => false, 'msg' => 'Fleet Operator Not Found', 'value' => []);
        }
    }

    public function saveMcdVehicle($data) {
        $this->db->insert('tbl_mcd_own_vehicle_details', $data);
        if ($this->db->affected_rows() > 0) {
            return $array = array('status' => true, 'msg' => 'Data Successfully Saved');
        } else {
            return $array = array('status' => false, 'msg' => 'Data Not Saved');
        }
    }

    public function getMcdVehicleList() {
        $this->db->select('mcd.*,gar.garbage,fleet.fleetoperator,zone.zone');
        $this->db->from('tbl_mcd_own_vehicle_details as mcd');
        $this->db->join('tbl_master_garbage as gar', 'mcd.garbage_id=gar.id', 'left');
        $this->db->join('tbl_master_fleetoperator as fleet', 'mcd.fleet_operator_id=fleet.id', 'left');
        $this->db->join('tbl_master_zone as zone', 'mcd.zone_id=zone.id', 'left');
        $result = $this->db->get()->result_array();
        if (count($result) > 0) {
            return array('status' => true, 'msg' => 'Private Vehicle Details Found', 'value' => $result);
        } else {
            return array('status' => false, 'msg' => 'Private Vehicle Details Not Found', 'value' => []);
        }
    }

    public function mcdVehicleStatusChange($id) {
        $this->db->select('status');
        $this->db->from('tbl_mcd_own_vehicle_details');
        $this->db->where('id', $id);
        $res = $this->db->get()->row_array();
        if (count($res) > 0) {
            $status = $res['status'];
            $new_status = $status == 'TRUE' ? 'FALSE' : 'TRUE';
            $data = array('status' => $new_status);
            $this->db->where('id', $id);
            $this->db->update('tbl_mcd_own_vehicle_details', $data);
            if ($this->db->affected_rows() > 0) {
                return $array = array('status' => true, 'msg' => 'Status Successfully Updated');
            } else {
                return $array = array('status' => false, 'msg' => 'Status Not Updated');
            }
        }
    }

    public function getSingleMcdVehicle($id) {
        $this->db->select('mcd.*,gar.garbage,fleet.fleetoperator,zone.zone');
        $this->db->from('tbl_mcd_own_vehicle_details as mcd');
        $this->db->join('tbl_master_garbage as gar', 'mcd.garbage_id=gar.id', 'left');
        $this->db->join('tbl_master_fleetoperator as fleet', 'mcd.fleet_operator_id=fleet.id', 'left');
        $this->db->join('tbl_master_zone as zone', 'mcd.zone_id=zone.id', 'left');
        $this->db->where('mcd.id', $id);
        $result = $this->db->get()->row_array();
        if (count($result) > 0) {
            return array('status' => true, 'msg' => 'Private Vehicle Details Found', 'value' => $result);
        } else {
            return array('status' => false, 'msg' => 'Private Vehicle Details Not Found', 'value' => []);
        }
    }

    public function updateMcdVehicle($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('tbl_mcd_own_vehicle_details', $data);
        if ($this->db->affected_rows() > 0) {
            return $array = array('status' => true, 'msg' => 'Data Successfully Updated');
        } else {
            return $array = array('status' => false, 'msg' => 'Data Not Updated');
        }
    }

}
