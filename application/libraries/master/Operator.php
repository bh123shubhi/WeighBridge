<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Operator {

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->model('master/Operator_model', 'opmodelObj');
    }

    public function saveoperator($data) {
        $result = $this->CI->opmodelObj->saveOperator($data);
        return $result;
    }

    public function getoperatorlist() {
        $result = $this->CI->opmodelObj->getOperatorlist();
        return $result;
    }

    public function getsingleoperator($id) {
        $result = $this->CI->opmodelObj->getSingleOperator($id);
        return $result;
    }

    public function updateoperator($data, $id) {
        $result = $this->CI->opmodelObj->updateOperator($data, $id);
        return $result;
    }

    public function operatorstatuschange($id) {
        $result = $this->CI->opmodelObj->operatorStatusChange($id);
        return $result;
    }

    public function updatePassword($dataArray,$id){
        $result = $this->CI->opmodelObj->updatePassword($dataArray,$id);
        return $result;  
    }

}
