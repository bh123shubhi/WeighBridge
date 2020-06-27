<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->res = $this->common->checkLoginAuth();
        if($this->res===false){
            redirect(base_url()."login");
        }
        $this->load->library('master/admin');
        $this->load->library('user_agent');
        $this->load->library('form_validation');
        $this->load->library('master/zoneMaster');
        $this->load->library('master/garbagemaster');
        $this->load->library('master/fleetmaster');
        $this->load->library('master/vehiclemaster');
        $this->load->library('master/agencymaster');
        $this->load->library('master/Operator');
        date_default_timezone_set("Asia/Calcutta");
        //$this->load->model('master/admin/AdminModel', 'modelObj');
    }

    public function View($module, $page, $action = null, $param = null, $data = []) {
        if (isset($data['page'])) {
            unset($data['page']);
        }
        $base_module = 'master/';
        $dynamic_module = '';
        if (!empty($module) && !empty($page)) {
            $dynamic_module = $base_module . $module . '/' . $page;
            $data['page'] = $dynamic_module;
        }
        Switch ($dynamic_module) {
            case 'master/admin/admin_list':
                if (!empty($action)) {
                    if ($action == 'delete' && !empty($param) && $param > 0) {
                        $res = $this->admin->adminstatuschange($param);
                        if ($res['status'] == true) {
                            $data['msg'] = $res['msg'];
                            $data['color'] = 'alert alert-success';
                        } else {
                            $data['msg'] = $res['msg'];
                            $data['color'] = 'alert alert-danger';
                        }
                        $data['result'] = $this->admin->get_admin();
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/admin/admin_list');
                    } else {
                        $data['result'] = $this->admin->get_admin();
                        $this->load->view('welcome_message', $data);
                    }
                } else {
                    $data['result'] = $this->admin->get_admin();
                    $this->load->view('welcome_message', $data);
                }
                break;
            case 'master/admin/add_admin':
                if (!empty($action)) {
                    if ($action == 'edit' && !empty($param) && $param > 0) {
                        $data['result'] = $this->admin->get_single_admin($param);
                        $data['url'] = '/admin/save_admin/update/' . $param;
                        $this->load->view('welcome_message', $data);
                    } else {
                        $data['url'] = '/admin/save_admin/';
                        $this->load->view('welcome_message', $data);
                    }
                } else {
                    $data['url'] = '/admin/save_admin/';
                    $this->load->view('welcome_message', $data);
                }
                break;
            case 'master/admin/save_admin':
                if (!empty($action)) {
                    if ($action == 'update' && !empty($param) && $param > 0) {
                        $status = $this->ValidateFormData();
                        if ($status == true) {
                            $dataArr['first_name'] = $this->input->post('fname', TRUE);
                            $dataArr['user_type'] = 'ADMIN';
                            $dataArr['last_name'] = $this->input->post('lname', TRUE);
                            $dataArr['landfill_site_id'] = $this->input->post('lfsid', TRUE);
                            $dataArr['contact_no'] = $this->input->post('mob', TRUE);
                            $dataArr['valid_till'] = date('Y-m-d', strtotime($this->input->post('validity', TRUE)));
                            $dataArr['address'] = $this->input->post('address', TRUE);
                            $dataArr['state'] = $this->input->post('state', TRUE);
                            $dataArr['city'] = $this->input->post('city', TRUE);
                            $dataArr['pincode'] = $this->input->post('pin', TRUE);
                            $dataArr['username'] = $this->input->post('username', TRUE);
                            $dataArr['password'] = $this->input->post('pass', TRUE);
                            $dataArr['confirm_password'] = $this->input->post('cpass', TRUE);
                            $result = $this->admin->update_admin($dataArr, $param);
                            if ($result['status'] == true) {
                                $data['msg'] = $result['msg'];
                                $data['color'] = 'alert alert-success';
                                $this->session->set_flashdata('temp_data', $data);
                                redirect(base_url() . 'master/admin/admin_list');
                            } else {
                                $data['msg'] = $result['msg'];
                                $data['color'] = 'alert alert-danger';
                                $this->session->set_flashdata('temp_data', $data);
                                redirect(base_url() . 'master/admin/add_admin/edit/' . $param);
                            }
                        } else {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-danger';
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/admin/add_admin/edit/' . $param);
                        }
                    } else {
                        redirect(base_url() . 'master/admin/add_admin/edit/' . $param);
                    }
                } else {
                    $dataArr = [];
                    $status = $this->ValidateFormData();
                    if ($status == true) {
                        $dataArr['first_name'] = $this->input->post('fname', TRUE);
                        $dataArr['user_type'] = 'ADMIN';
                        $dataArr['last_name'] = $this->input->post('lname', TRUE);
                        $dataArr['landfill_site_id'] = $this->input->post('lfsid', TRUE);
                        $dataArr['contact_no'] = $this->input->post('mob', TRUE);
                        $dataArr['valid_till'] = date('Y-m-d', strtotime($this->input->post('validity', TRUE)));
                        $dataArr['address'] = $this->input->post('address', TRUE);
                        $dataArr['state'] = $this->input->post('state', TRUE);
                        $dataArr['city'] = $this->input->post('city', TRUE);
                        $dataArr['pincode'] = $this->input->post('pin', TRUE);
                        $dataArr['username'] = $this->input->post('username', TRUE);
                        $dataArr['password'] = $this->input->post('pass', TRUE);
                        $dataArr['confirm_password'] = $this->input->post('cpass', TRUE);
                        $result = $this->admin->save_admin($dataArr);
                        if ($result['status'] == true) {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-success';
                            $data['result'] = $this->admin->get_admin();
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/admin/admin_list');
                        } else {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-danger';
                            $this->load->view('welcome_message', $data);
                        }
                    } else {
                        $data['msg'] = 'Please Fill Mandatory Field First';
                        $data['color'] = 'alert alert-danger';
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/admin/add_admin');
                    }
                }
                break;
            case 'master/zone/zone_list':
                if ((isset($action) && !empty($action)) && (isset($param) && $param > 0)) {
                    if ($action == 'delete') {
                        $res = $this->zonemaster->zonestatuschange($param);
                        if ($res['status'] == true) {
                            $data['msg'] = $res['msg'];
                            $data['color'] = 'alert alert-success';
                        } else {
                            $data['msg'] = $res['msg'];
                            $data['color'] = 'alert alert-danger';
                        }
                        $data['result'] = $this->zonemaster->getzonemaster();
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/zone/zone_list');
                    } else {//extra 
                        $data['result'] = $this->zonemaster->getzonemaster();
                        $this->load->view('welcome_message', $data);
                    }
                } else {
                    $data['result'] = $this->zonemaster->getzonemaster();
                    $this->load->view('welcome_message', $data);
                }
                break;
            case 'master/zone/add_zone':
                if (!empty($action)) {
                    if ($action == 'edit' && $param > 0) {
                        $result = $this->zonemaster->getsinglezone($param);
                        $data['url'] = '/zone/save_zone/update/' . $result['value']['id'];
                        $data['result'] = $result;
                        $this->load->view('welcome_message', $data);
                    } else {//extra
                        $data['url'] = '/zone/save_zone';
                        $this->load->view('welcome_message', $data);
                    }
                } else {
                    $data['url'] = '/zone/save_zone';
                    $this->load->view('welcome_message', $data);
                }
                break;
            case 'master/zone/save_zone':
                if (!empty($action)) {
                    $dataArr = [];
                    $status = $this->ValidatezoneMasterFormData();
                    if ($status == true) {
                        $dataArr['zone'] = $this->input->post('zone', TRUE);
                        $dataArr['entry_by']=$this->res['value']['id'];
                        $result = $this->zonemaster->updatezone($dataArr, $param);
                        if ($result['status'] == true) {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-success';
                            $data['result'] = $this->zonemaster->getzonemaster();
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/zone/zone_list');
                        } else {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-danger';
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/zone/add_zone/edit/' . $param);
                        }
                    } else {
                        $data['msg'] = 'Please Fill Zone First';
                        $data['color'] = 'alert alert-danger';
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/zone/add_zone');
                    }
                } else {
                    $dataArr = [];
                    $status = $this->ValidatezoneMasterFormData();
                    if ($status == true) {
                        $dataArr['zone'] = $this->input->post('zone', TRUE);
                        $dataArr['entry_by']=$this->res['value']['id'];
                        $result = $this->zonemaster->savezone($dataArr);
                        if ($result['status'] == true) {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-success';
                            $data['result'] = $this->zonemaster->getzonemaster();
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/zone/zone_list');
                        } else {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-danger';
                            $this->load->view('welcome_message', $data);
                        }
                    } else {
                        $data['msg'] = 'Please Fill Zone First';
                        $data['color'] = 'alert alert-danger';
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/zone/add_zone');
                    }
                }
                break;
            case 'master/garbage/garbage_category_list':
                if ((isset($action) && !empty($action)) && (isset($param) && $param > 0)) {
                    if ($action == 'delete') {
                        $res = $this->garbagemaster->garbagestatuschange($param);
                        if ($res['status'] == true) {
                            $data['msg'] = $res['msg'];
                            $data['color'] = 'alert alert-success';
                        } else {
                            $data['msg'] = $res['msg'];
                            $data['color'] = 'alert alert-danger';
                        }
                        $data['result'] = $this->garbagemaster->getgarbagemaster();
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/garbage/garbage_category_list');
                    } else {//extra 
                        $data['result'] = $this->garbagemaster->getgarbagemaster();
                        $this->load->view('welcome_message', $data);
                    }
                } else {
                    $data['result'] = $this->garbagemaster->getgarbagemaster();
                    $this->load->view('welcome_message', $data);
                }
                break;

            case 'master/garbage/add_garbage':
                if (!empty($action)) {
                    if ($action == 'edit' && $param > 0) {
                        $result = $this->garbagemaster->getsinglegarbage($param);
                        $data['url'] = '/garbage/save_garbage/update/' . $param;
                        $data['result'] = $result;
                        $this->load->view('welcome_message', $data);
                    } else {//extra
                        $data['url'] = '/zone/save_garbage';
                        $this->load->view('welcome_message', $data);
                    }
                } else {
                    $data['url'] = '/garbage/save_garbage';
                    $this->load->view('welcome_message', $data);
                }
                break;
            case 'master/garbage/save_garbage':
                if (!empty($action)) {
                    $dataArr = [];
                    $status = $this->ValidategarbageMasterFormData();
                    if ($status == true) {
                        $dataArr['garbage'] = $this->input->post('garbage', TRUE);
                        $dataArr['entry_by']=$this->res['value']['id'];
                        $result = $this->garbagemaster->updategarbage($dataArr, $param);
                        if ($result['status'] == true) {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-success';
                            $data['result'] = $this->garbagemaster->getgarbagemaster();
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/garbage/garbage_category_list');
                        } else {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-danger';
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/garbage/add_garbage/edit/' . $param);
                        }
                    } else {
                        $data['msg'] = 'Please Fill Garbage First';
                        $data['color'] = 'alert alert-danger';
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/garbage/add_garbage');
                    }
                } else {
                    $dataArr = [];
                    $status = $this->ValidategarbageMasterFormData();
                    if ($status == true) {
                        $dataArr['garbage'] = $this->input->post('garbage', TRUE);
                        $dataArr['entry_by']=$this->res['value']['id'];
                        $result = $this->garbagemaster->savegarbage($dataArr);
                        if ($result['status'] == true) {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-success';
                            $data['result'] = $this->garbagemaster->getgarbagemaster();
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/garbage/garbage_category_list');
                        } else {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-danger';
                            $this->load->view('welcome_message', $data);
                        }
                    } else {
                        $data['msg'] = 'Please Fill Zone First';
                        $data['color'] = 'alert alert-danger';
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/garbage/add_garbage');
                    }
                }
            case 'master/fleet/fleet_operator_list':
                if (!empty($action)) {
                    if ($action == 'delete' && $param > 0) {
                        $res = $this->fleetmaster->fleetstatuschange($param);
                        if ($res['status'] == true) {
                            $data['msg'] = $res['msg'];
                            $data['color'] = 'alert alert-success';
                        } else {
                            $data['msg'] = $res['msg'];
                            $data['color'] = 'alert alert-danger';
                        }
                        $data['result'] = $this->fleetmaster->getfleetmaster();
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/fleet/fleet_operator_list');
                    } else {
                        $data['result'] = $this->fleetmaster->getfleetmaster();
                        $this->load->view('welcome_message', $data);
                    }
                } else {
                    $data['result'] = $this->fleetmaster->getfleetmaster();
                    $this->load->view('welcome_message', $data);
                }
                break;
            case 'master/fleet/add_fleet_operator':
                if (!empty($action)) {
                    if ($action == 'edit' && $param > 0) {
                        $result = $this->fleetmaster->getsinglefleet($param);
                        $data['url'] = '/fleet/save_fleet/update/' . $param;
                        $data['result'] = $result;
                        $this->load->view('welcome_message', $data);
                    } else {//extra
                        $data['url'] = '/fleet/save_fleet';
                        $this->load->view('welcome_message', $data);
                    }
                } else {
                    $data['url'] = '/fleet/save_fleet';
                    $this->load->view('welcome_message', $data);
                }
                break;
            case 'master/fleet/save_fleet':
                if (!empty($action)) {
                    $dataArr = [];
                    $status = $this->ValidatefleetMasterFormData();
                    if ($status == true) {
                        $dataArr['fleetoperator'] = $this->input->post('fleetoperator', TRUE);
                        $dataArr['entry_by']=$this->res['value']['id'];
                        $result = $this->fleetmaster->updatefleet($dataArr, $param);
                        if ($result['status'] == true) {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-success';
                            $data['result'] = $this->fleetmaster->getfleetmaster();
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/fleet/fleet_operator_list');
                        } else {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-danger';
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/fleet/add_fleet_operator/edit/' . $param);
                        }
                    } else {
                        $data['msg'] = 'Please Fill Fleet Operator First';
                        $data['color'] = 'alert alert-danger';
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/fleet/add_fleet_operator');
                    }
                } else {
                    $dataArr = [];
                    $status = $this->ValidatefleetMasterFormData();
                    if ($status == true) {
                        $dataArr['fleetoperator'] = $this->input->post('fleetoperator', TRUE);
                        $dataArr['entry_by']=$this->res['value']['id'];
                        $result = $this->fleetmaster->savefleet($dataArr);
                        if ($result['status'] == true) {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-success';
                            $data['result'] = $this->fleetmaster->getfleetmaster();
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/fleet/fleet_operator_list');
                        } else {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-danger';
                            $this->load->view('welcome_message', $data);
                        }
                    } else {
                        $data['msg'] = 'Please Fill Fleet Operator First';
                        $data['color'] = 'alert alert-danger';
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/fleet/add_fleet_operator');
                    }
                }
                break;
            case 'master/agency/agency_name_list':
                if (!empty($action)) {
                    if ($action == 'delete' && $param > 0) {
                        $res = $this->agencymaster->agencystatuschange($param);
                        if ($res['status'] == true) {
                            $data['msg'] = $res['msg'];
                            $data['color'] = 'alert alert-success';
                        } else {
                            $data['msg'] = $res['msg'];
                            $data['color'] = 'alert alert-danger';
                        }
                        $data['result'] = $this->agencymaster->getagencymaster();
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/agency/agency_name_list');
                    } else {
                        $data['result'] = $this->agencymaster->getagencymaster();
                        $this->load->view('welcome_message', $data);
                    }
                } else {
                    $data['result'] = $this->agencymaster->getagencymaster();
                    $this->load->view('welcome_message', $data);
                }
                break;
            case 'master/agency/add_agency_master':
                if (!empty($action)) {
                    if ($action == 'edit' && $param > 0) {
                        $result = $this->agencymaster->getsingleagency($param);
                        $data['url'] = '/agency/save_agency/update/' . $param;
                        $data['result'] = $result;
                        $this->load->view('welcome_message', $data);
                    } else {//extra
                        $data['url'] = '/agency/save_agency';
                        $this->load->view('welcome_message', $data);
                    }
                } else {
                    $data['url'] = '/agency/save_agency';
                    $this->load->view('welcome_message', $data);
                }
                break;
            case 'master/agency/save_agency':
                if (!empty($action)) {
                    $dataArr = [];
                    $status = $this->ValidateagencyMasterFormData();
                    if ($status == true) {
                        $dataArr['agencyname'] = $this->input->post('agencyname', TRUE);
                        $dataArr['entry_by']=$this->res['value']['id'];
                        $result = $this->agencymaster->updateagency($dataArr, $param);
                        if ($result['status'] == true) {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-success';
                            $data['result'] = $this->agencymaster->getagencymaster();
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/agency/agency_name_list');
                        } else {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-danger';
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/agency/add_agency_master/edit/' . $param);
                        }
                    } else {
                        $data['msg'] = 'Please Fill Agency First';
                        $data['color'] = 'alert alert-danger';
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/agency/add_agency_master');
                    }
                } else {
                    $dataArr = [];
                    $status = $this->ValidateagencyMasterFormData();
                    if ($status == true) {
                        $dataArr['agencyname'] = $this->input->post('agencyname', TRUE);
                        $dataArr['entry_by']=$this->res['value']['id'];
                        $result = $this->agencymaster->saveagency($dataArr);
                        if ($result['status'] == true) {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-success';
                            $data['result'] = $this->agencymaster->getagencymaster();
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/agency/agency_name_list');
                        } else {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-danger';
                            $this->load->view('welcome_message', $data);
                        }
                    } else {
                        $data['msg'] = 'Please Fill Agency First';
                        $data['color'] = 'alert alert-danger';
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/agency/add_agency_master');
                    }
                }
                break;
            case 'master/vehicle/zone_time_list':
                if (!empty($action)) {
                    if ($action == 'delete' && $param > 0) {
                        $res = $this->vehiclemaster->zonetimestatuschange($param);
                        if ($res['status'] == true) {
                            $data['msg'] = $res['msg'];
                            $data['color'] = 'alert alert-success';
                        } else {
                            $data['msg'] = $res['msg'];
                            $data['color'] = 'alert alert-danger';
                        }
                        $data['result'] = $this->vehiclemaster->getzonetimelist();
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/vehicle/zone_time_list');
                    } else {
                        $data['result'] = $this->vehiclemaster->getzonetimelist();
                        $this->load->view('welcome_message', $data);
                    }
                } else {
                    $data['result'] = $this->vehiclemaster->getzonetimelist();
                    $this->load->view('welcome_message', $data);
                }
                break;
            case 'master/vehicle/add_zone_time':
                if (!empty($action)) {
                    if ($action == 'edit' && $param > 0) {
                        $result = $this->vehiclemaster->getsinglezonetime($param);
                        $data['url'] = '/vehicle/save_zone_time/update/' . $param;
                        $data['result'] = $result;
                        $data['masterZoneArr'] = $this->vehiclemaster->getzonemasterlist();
                        $this->load->view('welcome_message', $data);
                    } else {//extra
                        $data['url'] = '/vehicle/save_zone_time';
                        $this->load->view('welcome_message', $data);
                    }
                } else {
                    $data['masterZoneArr'] = $this->vehiclemaster->getzonemasterlist();
                    $data['url'] = '/vehicle/save_zone_time';
                    $this->load->view('welcome_message', $data);
                }
                break;
            case 'master/vehicle/save_zone_time':
                if (!empty($action)) {
                    $dataArr = [];
                    $status = $this->ValidateZoneTimeFormData();
                    if ($status == true) {
                        $dataArr['zone_id'] = $this->input->post('zone_id', TRUE);
                        $dataArr['zone_time'] = $this->input->post('time', TRUE);
                        $dataArr['entry_by']=$this->res['value']['id'];
                        $result = $this->vehiclemaster->updatezonetime($dataArr, $param);
                        if ($result['status'] == true) {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-success';
                            $data['result'] = $this->vehiclemaster->getzonetimelist();
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/vehicle/zone_time_list');
                        } else {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-danger';
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/vehicle/add_zone_time/edit/' . $param);
                        }
                    } else {
                        $data['msg'] = 'Please Fill Field First';
                        $data['color'] = 'alert alert-danger';
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/vehicle/add_zone_time');
                    }
                } else {
                    $dataArr = [];
                    $status = $this->ValidateZoneTimeFormData();
                    if ($status == true) {
                        $dataArr['zone_id'] = $this->input->post('zone_id', TRUE);
                        $dataArr['zone_time'] = $this->input->post('time', TRUE);
                        $dataArr['entry_by']=$this->res['value']['id'];
                        $result = $this->vehiclemaster->savezonetime($dataArr);
                        if ($result['status'] == true) {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-success';
                            $data['result'] = $this->vehiclemaster->getzonetimelist();
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/vehicle/zone_time_list');
                        } else {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-danger';
                            $this->load->view('welcome_message', $data);
                        }
                    } else {
                        $data['msg'] = 'Please Fill Field First';
                        $data['color'] = 'alert alert-danger';
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/vehicle/add_zone_time');
                    }
                }
                break;
            case 'master/vehicle/private_vehicle_list':
                if (!empty($action)) {
                    if ($action == 'delete' && $param > 0) {
                        $res = $this->vehiclemaster->privatevehiclestatuschange($param);
                        if ($res['status'] == true) {
                            $data['msg'] = $res['msg'];
                            $data['color'] = 'alert alert-success';
                        } else {
                            $data['msg'] = $res['msg'];
                            $data['color'] = 'alert alert-danger';
                        }
                        $data['result'] = $this->vehiclemaster->getprivatevehiclelist();
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/vehicle/private_vehicle_list');
                    } else {
                        $data['result'] = $this->vehiclemaster->getprivatevehiclelist();
                        $this->load->view('welcome_message', $data);
                    }
                } else {
                    $data['result'] = $this->vehiclemaster->getprivatevehiclelist();
                    $this->load->view('welcome_message', $data);
                }
                break;
            case 'master/vehicle/add_private_vehicle':
                if (!empty($action)) {
                    if ($action == 'edit' && $param > 0) {
                        $result = $this->vehiclemaster->getsingleprivatevehicle($param);
                        $data['url'] = '/vehicle/save_vehicle/update/' . $param;
                        $data['result'] = $result;
                        $data['agencyArr'] = $this->vehiclemaster->getagencymasterlist();
                        $data['garbageArr'] = $this->vehiclemaster->getgarbagemasterlist();
                        $this->load->view('welcome_message', $data);
                    } else if ($action == 'view' && $param > 0) {
                        $data['agencyArr'] = $this->vehiclemaster->getagencymasterlist();
                        $data['garbageArr'] = $this->vehiclemaster->getgarbagemasterlist();
                        $result = $this->vehiclemaster->getsingleprivatevehicle($param);
                        $data['result'] = $result;
                        $data['url'] = '/vehicle/save_vehicle/update/' . $param;
                        $this->load->view('welcome_message', $data);
                    } else {//extra
                        $data['url'] = '/vehicle/save_vehicle';
                        $this->load->view('welcome_message', $data);
                    }
                } else {
                    $data['agencyArr'] = $this->vehiclemaster->getagencymasterlist();
                    $data['garbageArr'] = $this->vehiclemaster->getgarbagemasterlist();
                    $data['url'] = '/vehicle/save_vehicle';
                    $this->load->view('welcome_message', $data);
                }
                break;
            case 'master/vehicle/save_vehicle':
                if (!empty($action)) {
                    $dataArr = [];
                    $status = $this->ValidatePrivateVehicleFormData();
                    if ($status == true) {
                        $dataArr['registration_no'] = $this->input->post('registration_no', TRUE);
                        $dataArr['registration_date'] = date('Y-m-d', strtotime($this->input->post('registration_date', TRUE)));
                        $dataArr['purchase_date'] = date('Y-m-d', strtotime($this->input->post('purchase_date', TRUE)));
                        $dataArr['agency_id'] = $this->input->post('agency_id', TRUE);
                        $dataArr['model'] = $this->input->post('model', TRUE);
                        $dataArr['garbage_id'] = $this->input->post('garbage_id', TRUE);
                        $dataArr['tareweight'] = $this->input->post('tareweight', TRUE);
                        $dataArr['capacity'] = $this->input->post('capacity', TRUE);
                        $dataArr['triptime'] = $this->input->post('triptime', TRUE);
                        $dataArr['vehicle_status'] = $this->input->post('vehicle_status', TRUE);
                        $dataArr['entry_by']=$this->res['value']['id'];
                        $result = $this->vehiclemaster->updateprivatevehicle($dataArr, $param);
                        if ($result['status'] == true) {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-success';
                            $data['result'] = $this->vehiclemaster->getprivatevehiclelist();
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/vehicle/private_vehicle_list');
                        } else {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-danger';
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/vehicle/add_private_vehicle/edit/' . $param);
                        }
                    } else {
                        $data['msg'] = 'Please Fill Field First';
                        $data['color'] = 'alert alert-danger';
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/vehicle/add_private_vehicle');
                    }
                } else {
                    $dataArr = [];
                    $status = $this->ValidatePrivateVehicleFormData();
                    if ($status == true) {
                        $dataArr['registration_no'] = $this->input->post('registration_no', TRUE);
                        $dataArr['registration_date'] = date('Y-m-d', strtotime($this->input->post('registration_date', TRUE)));
                        $dataArr['purchase_date'] = date('Y-m-d', strtotime($this->input->post('purchase_date', TRUE)));
                        $dataArr['agency_id'] = $this->input->post('agency_id', TRUE);
                        $dataArr['model'] = $this->input->post('model', TRUE);
                        $dataArr['garbage_id'] = $this->input->post('garbage_id', TRUE);
                        $dataArr['tareweight'] = $this->input->post('tareweight', TRUE);
                        $dataArr['capacity'] = $this->input->post('capacity', TRUE);
                        $dataArr['triptime'] = $this->input->post('triptime', TRUE);
                        $dataArr['vehicle_status'] = $this->input->post('vehicle_status', TRUE);
                        $dataArr['entry_by']=$this->res['value']['id'];
                        $result = $this->vehiclemaster->saveprivatevehicle($dataArr);
                        if ($result['status'] == true) {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-success';
                            $data['result'] = $this->vehiclemaster->getprivatevehiclelist();
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/vehicle/private_vehicle_list');
                        } else {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-danger';
                            $this->load->view('welcome_message', $data);
                        }
                    } else {
                        $data['msg'] = 'Please Fill Mandatory Field First';
                        $data['color'] = 'alert alert-danger';
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/vehicle/add_private_vehicle');
                    }
                }
                break;
        case 'master/vehicle/view_private_vehicle':
            if (!empty($action)) {
                $result = $this->vehiclemaster->getsingleprivatevehicle($param);
                $data['result'] = $result;
                $data['agencyArr'] = $this->vehiclemaster->getagencymasterlist();
                $data['garbageArr'] = $this->vehiclemaster->getgarbagemasterlist();
                $this->load->view('welcome_message', $data);
            }else{
                $data['result']=$this->vehiclemaster->getsingleprivatevehicle($param);
                $data['result'] = $result;
                $data['agencyArr'] = $this->vehiclemaster->getagencymasterlist();
                $data['garbageArr'] = $this->vehiclemaster->getgarbagemasterlist();
                $this->load->view('welcome_message', $data);
            }
            break;
            case 'master/vehicle/mcd_vehicle_list':
                if (!empty($action)) {
                    if ($action == 'delete' && $param > 0) {
                        $res = $this->vehiclemaster->mcdvehiclestatuschange($param);
                        if ($res['status'] == true) {
                            $data['msg'] = $res['msg'];
                            $data['color'] = 'alert alert-success';
                        } else {
                            $data['msg'] = $res['msg'];
                            $data['color'] = 'alert alert-danger';
                        }
                        $data['result'] = $this->vehiclemaster->getmcdvehiclelist();
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/vehicle/mcd_vehicle_list');
                    } else {
                        $data['result'] = $this->vehiclemaster->getmcdvehiclelist();
                        $this->load->view('welcome_message', $data);
                    }
                } else {
                    $data['result'] = $this->vehiclemaster->getmcdvehiclelist();
                    $this->load->view('welcome_message', $data);
                }
                break;
            case 'master/vehicle/add_mcd_vehicle':
                if (!empty($action)) {
                    if ($action == 'edit' && $param > 0) {
                        $result = $this->vehiclemaster->getsinglemcdvehicle($param);
                        $data['url'] = '/vehicle/save_mcd_vehicle/update/' . $param;
                        $data['result'] = $result;
                        $data['zoneArr'] = $this->vehiclemaster->getmcdzonemasterlist();
                        $data['garbageArr'] = $this->vehiclemaster->getgarbagemasterlist();
                        $data['fleetArr'] = $this->vehiclemaster->getfleetmasterlist();
                        $this->load->view('welcome_message', $data);
                    } else if ($action == 'view' && $param > 0) {
                        $data['zoneArr'] = $this->vehiclemaster->getmcdzonemasterlist();
                        $data['garbageArr'] = $this->vehiclemaster->getgarbagemasterlist();
                        $data['fleetArr'] = $this->vehiclemaster->getfleetmasterlist();
                        $result = $this->vehiclemaster->getsinglemcdvehicle($param);
                        $data['result'] = $result;
                        $data['url'] = '/vehicle/save_mcd_vehicle/view/' . $param;
                        $this->load->view('welcome_message', $data);
                    } else {//extra
                        $data['url'] = '/vehicle/save_mcd_vehicle';
                        $this->load->view('welcome_message', $data);
                    }
                } else {
                    $data['zoneArr'] = $this->vehiclemaster->getmcdzonemasterlist();
                    $data['garbageArr'] = $this->vehiclemaster->getgarbagemasterlist();
                    $data['fleetArr'] = $this->vehiclemaster->getfleetmasterlist();
                    $data['url'] = '/vehicle/save_mcd_vehicle';
                    $this->load->view('welcome_message', $data);
                }
                break;
            case 'master/vehicle/save_mcd_vehicle':
                if (!empty($action)) {
                    $dataArr = [];
                    $status = $this->ValidateMCDVehicleFormData();
                    if ($status == true) {
                        $dataArr['registration_no'] = $this->input->post('registration_no', TRUE);
                        $dataArr['registration_date'] = date('Y-m-d', strtotime($this->input->post('registration_date', TRUE)));
                        $dataArr['purchase_date'] = date('Y-m-d', strtotime($this->input->post('purchase_date', TRUE)));
                        $dataArr['zone_id'] = $this->input->post('zone_id', TRUE);
                        $dataArr['fleet_operator_id'] = $this->input->post('fleet_operator_id', TRUE);
                        $dataArr['model'] = $this->input->post('model', TRUE);
                        $dataArr['garbage_id'] = $this->input->post('garbage_id', TRUE);
                        $dataArr['tareweight'] = $this->input->post('tareweight', TRUE);
                        $dataArr['capacity'] = $this->input->post('capacity', TRUE);
                        $dataArr['obu_id'] = $this->input->post('obu_id', TRUE);
                        $dataArr['vehicle_status'] = $this->input->post('vehicle_status', TRUE);
                        $dataArr['entry_by']=$this->res['value']['id'];
                        $result = $this->vehiclemaster->updatemcdvehicle($dataArr, $param);
                        if ($result['status'] == true) {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-success';
                            $data['result'] = $this->vehiclemaster->getmcdvehiclelist();
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/vehicle/mcd_vehicle_list');
                        } else {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-danger';
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/vehicle/mcd_vehicle_list/edit/' . $param);
                        }
                    } else {
                        $data['msg'] = 'Please Fill Mandatory Field First';
                        $data['color'] = 'alert alert-danger';
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/vehicle/add_mcd_vehicle');
                    }
                } else {
                    $dataArr = [];
                    $status = $this->ValidateMCDVehicleFormData();
                    if ($status == true) {
                        $dataArr['registration_no'] = $this->input->post('registration_no', TRUE);
                        $dataArr['registration_date'] = date('Y-m-d', strtotime($this->input->post('registration_date', TRUE)));
                        $dataArr['purchase_date'] = date('Y-m-d', strtotime($this->input->post('purchase_date', TRUE)));
                        $dataArr['zone_id'] = $this->input->post('zone_id', TRUE);
                        $dataArr['fleet_operator_id'] = $this->input->post('fleet_operator_id', TRUE);
                        $dataArr['model'] = $this->input->post('model', TRUE);
                        $dataArr['garbage_id'] = $this->input->post('garbage_id', TRUE);
                        $dataArr['tareweight'] = $this->input->post('tareweight', TRUE);
                        $dataArr['capacity'] = $this->input->post('capacity', TRUE);
                        $dataArr['obu_id'] = $this->input->post('obu_id', TRUE);
                        $dataArr['vehicle_status'] = $this->input->post('vehicle_status', TRUE);
                        $dataArr['entry_by']=$this->res['value']['id'];
                        $result = $this->vehiclemaster->savemcdvehicle($dataArr);
                        if ($result['status'] == true) {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-success';
                            $data['result'] = $this->vehiclemaster->getmcdvehiclelist();
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/vehicle/mcd_vehicle_list');
                        } else {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-danger';
                            $this->load->view('welcome_message', $data);
                        }
                    } else {
                        $data['msg'] = 'Please Fill Mandatory Field First';
                        $data['color'] = 'alert alert-danger';
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/vehicle/add_mcd_vehicle');
                    }
                }
                break;
            case 'master/vehicle/view_mcd_vehicle':
            if (!empty($action)) {
                $data['result']=$this->vehiclemaster->getsinglemcdvehicle($param);
                $data['zoneArr'] = $this->vehiclemaster->getmcdzonemasterlist();
                $data['garbageArr'] = $this->vehiclemaster->getgarbagemasterlist();
                $data['fleetArr'] = $this->vehiclemaster->getfleetmasterlist();
                $this->load->view('welcome_message', $data);
            }else{
                $data['result']=$this->vehiclemaster->getsinglemcdvehicle($param);
                $data['zoneArr'] = $this->vehiclemaster->getmcdzonemasterlist();
                $data['garbageArr'] = $this->vehiclemaster->getgarbagemasterlist();
                $data['fleetArr'] = $this->vehiclemaster->getfleetmasterlist();
                $this->load->view('welcome_message', $data);
            }
            break;
            case 'master/operator/operator_list':
                if (!empty($action)) {
                    if ($action == 'delete' && $param > 0) {
                        $res = $this->operator->operatorstatuschange($param);
                        if ($res['status'] == true) {
                            $data['msg'] = $res['msg'];
                            $data['color'] = 'alert alert-success';
                        } else {
                            $data['msg'] = $res['msg'];
                            $data['color'] = 'alert alert-danger';
                        }
                        $data['result'] = $this->operator->getoperatorlist();
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/operator/operator_list');
                    } else {
                        $data['result'] = $this->operator->getoperatorlist();
                        $this->load->view('welcome_message', $data);
                    }
                } else {
                    $data['result'] = $this->operator->getoperatorlist();
                    $this->load->view('welcome_message', $data);
                }
                break;
            case 'master/operator/add_operator':
                if (!empty($action)) {
                    if ($action == 'edit' && $param > 0) {
                        $result = $this->operator->getsingleoperator($param);
                        $data['url'] = '/operator/save_operator/update/' . $param;
                        $data['result'] = $result;
                        $this->load->view('welcome_message', $data);
                    } else {//extra
                        $data['url'] = '/operator/save_operator';
                        $this->load->view('welcome_message', $data);
                    }
                } else {
                    $data['url'] = '/operator/save_operator';
                    $this->load->view('welcome_message', $data);
                }
                break;
            case 'master/operator/save_operator':
                if (!empty($action)) {
                    if ($action == 'update' && !empty($param) && $param > 0) {
                        $status = $this->ValidateFormData();
                        if ($status == true) {
                            $dataArr['first_name'] = $this->input->post('fname', TRUE);
                            $dataArr['user_type'] = 'OPERATOR';
                            $dataArr['last_name'] = $this->input->post('lname', TRUE);
                            $dataArr['landfill_site_id'] = $this->input->post('lfsid', TRUE);
                            $dataArr['contact_no'] = $this->input->post('mob', TRUE);
                            $dataArr['valid_till'] = date('Y-m-d', strtotime($this->input->post('validity', TRUE)));
                            $dataArr['address'] = $this->input->post('address', TRUE);
                            $dataArr['state'] = $this->input->post('state', TRUE);
                            $dataArr['city'] = $this->input->post('city', TRUE);
                            $dataArr['pincode'] = $this->input->post('pin', TRUE);
                            $dataArr['username'] = $this->input->post('username', TRUE);
                            $dataArr['password'] = $this->input->post('pass', TRUE);
                            $dataArr['confirm_password'] = $this->input->post('cpass', TRUE);
                            if ($checkpass != 0) {
                                $data['msg'] = 'Password Not Match.';
                                $data['color'] = 'alert alert-danger';
                                $this->session->set_flashdata('temp_data', $data);
                                redirect(base_url() . 'master/operator/add_operator');
                            } else {
                                $result = $this->operator->updateoperator($dataArr,$param);
                                if ($result['status'] == true) {
                                    $data['msg'] = $result['msg'];
                                    $data['color'] = 'alert alert-success';
                                    $data['result'] = $this->operator->getoperatorlist();
                                    $this->session->set_flashdata('temp_data', $data);
                                    redirect(base_url() . 'master/operator/operator_list');
                                } else {
                                    $data['msg'] = $result['msg'];
                                    $data['color'] = 'alert alert-danger';
                                    $this->load->view('welcome_message', $data);
                                }
                            }
                        } else {
                            $data['msg'] = $result['msg'];
                            $data['color'] = 'alert alert-danger';
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/admin/add_admin/edit/' . $param);
                        }
                    } else {
                        redirect(base_url() . 'master/admin/add_admin/edit/' . $param);
                    }
                } else {
                    $dataArr = [];
                    $status = $this->ValidateFormData();
                    if ($status == true) {
                        $dataArr['first_name'] = $this->input->post('fname', TRUE);
                        $dataArr['user_type'] = 'OPERATOR';
                        $dataArr['last_name'] = $this->input->post('lname', TRUE);
                        $dataArr['landfill_site_id'] = $this->input->post('lfsid', TRUE);
                        $dataArr['contact_no'] = $this->input->post('mob', TRUE);
                        $dataArr['valid_till'] = date('Y-m-d', strtotime($this->input->post('validity', TRUE)));
                        $dataArr['address'] = $this->input->post('address', TRUE);
                        $dataArr['state'] = $this->input->post('state', TRUE);
                        $dataArr['city'] = $this->input->post('city', TRUE);
                        $dataArr['pincode'] = $this->input->post('pin', TRUE);
                        $dataArr['username'] = $this->input->post('username', TRUE);
                        $dataArr['password'] = $this->input->post('pass', TRUE);
                        $dataArr['confirm_password'] = $this->input->post('cpass', TRUE);
                        $checkpass = strcmp($dataArr['password'], $dataArr['confirm_password']);
                        if ($checkpass != 0) {
                            $data['msg'] = 'Password Not Match.';
                            $data['color'] = 'alert alert-danger';
                            $this->session->set_flashdata('temp_data', $data);
                            redirect(base_url() . 'master/operator/add_operator');
                        } else {
                            $result = $this->operator->saveoperator($dataArr);
                            if ($result['status'] == true) {
                                $data['msg'] = $result['msg'];
                                $data['color'] = 'alert alert-success';
                                $data['result'] = $this->operator->getoperatorlist();
                                $this->session->set_flashdata('temp_data', $data);
                                redirect(base_url() . 'master/operator/operator_list');
                            } else {
                                $data['msg'] = $result['msg'];
                                $data['color'] = 'alert alert-danger';
                                $this->load->view('welcome_message', $data);
                            }
                        }
                    } else {
                        $data['msg'] = 'Please Fill Mandatory Field First';
                        $data['color'] = 'alert alert-danger';
                        $this->session->set_flashdata('temp_data', $data);
                        redirect(base_url() . 'master/operator/add_operator');
                    }
                }
                break;
            default:
                redirect($this->agent->referrer());
        }
    }

    public function ValidateMCDVehicleFormData() {
        $this->form_validation->set_rules('registration_no', 'Registration No', 'required');
        $this->form_validation->set_rules('registration_date', 'Registration Date', 'required');
        $this->form_validation->set_rules('purchase_date', 'Purchase Date', 'required');
        if ($this->form_validation->run() == FALSE) {
            return false;
        } else {
            return true;
        }
    }

    public function ValidatePrivateVehicleFormData() {
        $this->form_validation->set_rules('registration_no', 'Registration No', 'required');
        $this->form_validation->set_rules('registration_date', 'Registration Date', 'required');
        $this->form_validation->set_rules('purchase_date', 'Purchase Date', 'required');
        if ($this->form_validation->run() == FALSE) {
            return false;
        } else {
            return true;
        }
    }

    public function ValidateZoneTimeFormData() {
        $this->form_validation->set_rules('zone_id', 'Zone', 'required');
        $this->form_validation->set_rules('time', 'Time', 'required');
        if ($this->form_validation->run() == FALSE) {
            return false;
        } else {
            return true;
        }
    }

    public function ValidategarbageMasterFormData() {
        $this->form_validation->set_rules('garbage', 'Garbage', 'required');
        if ($this->form_validation->run() == FALSE) {
            return false;
        } else {
            return true;
        }
    }

    public function ValidateagencyMasterFormData() {
        $this->form_validation->set_rules('agencyname', 'Agency', 'required');
        if ($this->form_validation->run() == FALSE) {
            return false;
        } else {
            return true;
        }
    }

    public function ValidatefleetMasterFormData() {
        $this->form_validation->set_rules('fleetoperator', 'Fleet Operator', 'required');
        if ($this->form_validation->run() == FALSE) {
            return false;
        } else {
            return true;
        }
    }

    public function ValidatezoneMasterFormData() {
        $this->form_validation->set_rules('zone', 'Zone', 'required');
        if ($this->form_validation->run() == FALSE) {
            return false;
        } else {
            return true;
        }
    }

    public function ValidateFormData() {
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('lfsid', 'Email', 'required');
        $this->form_validation->set_rules('mob', 'Address', 'required');
        $this->form_validation->set_rules('validity', 'Address', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('state', 'Address', 'required');
        $this->form_validation->set_rules('city', 'Address', 'required');
        $this->form_validation->set_rules('username', 'Address', 'required');
        $this->form_validation->set_rules('pass', 'Address', 'required');
        $this->form_validation->set_rules('cpass', 'Address', 'required');
        if ($this->form_validation->run() == FALSE) {
            return false;
        } else {
            return true;
        }
    }

    public function check_user_name(){
        $user=$this->input->post('username',TRUE);
        $status = $this->admin->check_user_name($user);
        echo $status;
        
    }

}
