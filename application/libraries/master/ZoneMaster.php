<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ZoneMaster {

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->model('master/Zonemaster_model', 'zonemodelObj');
    }

    public function getzonemaster() {
        $result = $this->CI->zonemodelObj->getZoneMaster();
        return $result;
    }

    public function zonestatuschange($id) {
        $result = $this->CI->zonemodelObj->zoneStatusChange($id);
        return $result;
    }

    public function savezone($data) {
        $result = $this->CI->zonemodelObj->saveZone($data);
        return $result;
    }

    public function getsinglezone($id) {
        $result = $this->CI->zonemodelObj->getSingleZone($id);
        return $result;
    }

    public function updatezone($data, $id) {
        $result = $this->CI->zonemodelObj->updateZone($data, $id);
        return $result;
    }

}
