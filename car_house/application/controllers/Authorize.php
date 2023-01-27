<?php

class Authorize extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }

    public function index() {
        $data[''] = '';
        if ($this->input->post('login')) {
            $data = $this->md->my_query("select * from tbl_admin_login where email='" . $this->input->post('username') . "'");
            $c = count($data);
            if ($c == 1) {
                $ops = $this->encryption->decrypt($data[0]->password);
                $ps = $this->input->post('pwd');
                if ($ops == $ps) {
                    if ($this->input->post('rememberme')) {
                        $second = 60 * 60 * 24 * 365;
                        set_cookie('username', $data[0]->email, $second);
                        set_cookie('password', $data[0]->password, $second);
                    } else {
                        if (get_cookie('username') != "") {
                            delete_cookie('username');
                            delete_cookie('password');
                        }
                    }
                    $this->session->set_userdata('admin', $data[0]->admin_id);
                    $this->session->set_userdata('lastlogin', date('Y-m-d h:i:s'));

//                    SMS Start
                    
                    $client = new WAY2SMSClient();
                    $uid = "9909684989";
                    $pwd = "M3888N";
                    $phone = "9909684989";
                    $msg = "Hey Admin, someone access your account!";
                    $client->login($uid, $pwd);
                    $result = $client->send($phone, $msg);
                    $client->logout(); 

//                    SMS END
                    
                    redirect('Admin-Home');
                } else {
                    $data['error'] = " <b>Oops !</b> Invalid Login. Try Again. ";
                }
            } else {
                $data['error'] = " <b>Oops !</b> Invalid Login. Try Again. ";
            }
        }
        $this->load->view('admin/index', $data);
    }

    public function logout() {
        $this->security();
        $wh['admin_id'] = $this->session->userdata('admin');
        $data['last_login'] = $this->session->userdata('lastlogin');
        $this->md->my_update('tbl_admin_login', $data, $wh);
        $this->session->unset_userdata('admin');
        $this->session->unset_userdata('lastlogin');
        redirect('Admin');
    }

    public function lostpassword() {
        $password = $this->md->my_select("tbl_admin_login")[0]->password;
        $password = $this->encryption->decrypt($password);
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'novamailer2018@gmail.com',
            'smtp_pass' => 'hello12321618',);

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('novamailer2018@gmail.com', 'Carmela & Service Center');
        $this->email->to('akshaygadhiya0@gmail.com');
        $this->email->subject(' Recover Password ');
        $this->email->message('Your Forgot Password Is "' . $password . '"');
        if ($this->email->send()) {
            redirect('Admin/1');
        }
    }

    public function dashbord() {
        $this->security();
        $this->session->set_userdata('pages', 'dashboard');
        $this->load->view('admin/dashboard');
    }

    public function contactus() {
        $this->security();
        $this->session->set_userdata('pages', 'pages');
        $dt['contactshow'] = $this->md->my_select("tbl_contact_us");
        $this->load->view('admin/manage_contact', $dt);
    }

    public function feedback() {
        $this->security();
        $this->session->set_userdata('pages', 'pages');
        $dt['feedbackshow'] = $this->md->my_select("tbl_feedback");
        $this->load->view('admin/manage_feedback', $dt);
    }

    public function email() {
        $this->security();
        $this->session->set_userdata('pages', 'pages');
        if ($this->input->post('sendmail')) {
            $this->form_validation->set_rules('name', 'Subject', 'required', array('required' => 'Subject Is Required.'));
            $this->form_validation->set_rules('message', 'Message', 'required', array('required' => 'Message Is Required.'));
            if ($this->form_validation->run() == TRUE) {
                $e = implode(",", $this->input->post('email'));
                $s = $this->input->post('name');
                $m = $this->input->post('message');
                $r = $this->md->mailer($e, $s, $m);
                if ($r == 1) {
                    $dt['success'] = "Send Email Successfully.";
                } else {
                    $dt['error'] = "Something Went Wrong.";
                }
            }
        }
        $dt['display'] = $this->md->my_select('tbl_email_subscriber');
        $this->load->view('admin/manage_email', $dt);
    }

    public function bill() {
        $this->security();
        $this->session->set_userdata('pages', 'bill');
        $this->load->view('admin/searchbill');
    }

    public function banner() {
        $this->security();
        $this->session->set_userdata('pages', 'pages');
        $msg[''] = '';
        if ($this->input->post('add')) {

            $this->form_validation->set_rules('type', 'Type', 'required', array('required' => 'Car Type Name Is Required.'));
            $this->form_validation->set_rules('company', 'Company', 'required', array('required' => 'Car Company Name Is Required.'));
            $this->form_validation->set_rules('model', 'Model', 'required', array('required' => 'Car Model Name Is Required.'));

            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './visitor/images/banner/';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size'] = 2048;
                $mx = $this->md->my_query('SELECT MAX(banner_id) as mx FROM tbl_banner')[0]->mx;
                if ($mx != "") {
                    $config['file_name'] = "banner_" . $mx;
                } else {
                    $config['file_name'] = "banner_0";
                }
                $config['overwrite'] = TRUE;
                $result = $this->md->my_file($config, 'photo');
                if (in_array('file_name', $result)) {
                    $dbpath = "visitor/images/banner/" . $result['file_name'];
                    $dt['path'] = $dbpath;
                    $dt['status'] = 0;
                    $dt['category_id'] = $this->input->post('model');
                    $r = $this->md->my_insert('tbl_banner', $dt);
                    if ($r == 1) {
                        $msg['success'] = "Upload Successfully.";
                    }
                } else {
                    $msg['error'] = $result[0];
                }
            }
        }
        $msg['cartype'] = $this->md->my_select('tbl_category', array('label' => 'type'));
        $msg['select'] = $this->md->my_select('tbl_banner', array('path'));
        $this->load->view('admin/manage_banner', $msg);
    }

    public function member() {
        $this->security();
        $this->session->set_userdata('pages', 'user');
        $data['detail'] = $this->md->my_query('SELECT * FROM tbl_registration ORDER BY registration_id DESC');
        $this->load->view('admin/manage_member', $data);
    }

    public function carmela() {
        $this->security();
        $this->session->set_userdata('pages', 'user');
        $data['carmela'] = $this->md->my_query('SELECT * FROM tbl_carmela ORDER BY carmela_id DESC');
        $this->load->view('admin/manage_carmela', $data);
    }

    public function state() {
        $this->security();
        $this->session->set_userdata('pages', 'location');
        $dt[''] = "";
        if ($this->input->post('add')) {

            $this->form_validation->set_rules('state', 'State', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'State Name Is Required.', 'regex_match' => 'Please Enter Valid State Name.'));

            if ($this->form_validation->run() == TRUE) {
                $c = $this->md->my_query("select count(*) as cm from tbl_location where name='" . $this->input->post('state') . "' AND lable='state'")[0]->cm;

                if ($c == 0) {
                    $data['name'] = $this->input->post('state');
                    $data['parent_id'] = 0;
                    $data['lable'] = "state";
                    $result = $this->md->my_insert('tbl_location', $data);
                    if ($result == 1) {
                        $dt['success'] = $this->input->post('state') . " Added Successfully.";
                    } else {
                        $dt['error'] = "Something is wrong.";
                    }
                } else {
                    $dt['err'] = $this->input->post('state') . " is already exist.";
                }
            }
        }
        $dt['statedata'] = $this->md->my_select("tbl_location", array('lable' => 'state'));
        $this->load->view('admin/manage_state', $dt);
    }

    public function city() {
        $this->security();
        $this->session->set_userdata('pages', 'location');
        $dt[''] = "";
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('state', 'State', 'required', array('required' => 'State Name Is Required.'));
            $this->form_validation->set_rules('city', 'City', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'City Name Is Required.', 'regex_match' => 'Please Enter Valid City Name.'));

            if ($this->form_validation->run() == TRUE) {
                $c = $this->md->my_query("select count(*) as cm from tbl_location where name='" . $this->input->post('city') . "' AND parent_id='" . $this->input->post('state') . "'")[0]->cm;
                if ($c == 0) {
                    $data['name'] = $this->input->post('city');
                    $data['parent_id'] = $this->input->post('state');
                    $data['lable'] = "city";
                    $result = $this->md->my_insert("tbl_location", $data);
                    if ($result == 1) {
                        $dt['success'] = $this->input->post('city') . " Added Successfully.";
                    } else {
                        $dt['error'] = "Something is wrong.";
                    }
                } else {
                    $dt['err'] = $this->input->post('city') . " is already exist.";
                }
            }
        }
        $dt['citydata'] = $this->md->my_select('tbl_location', array('lable' => 'state'));
        $dt['cityshow'] = $this->md->my_query("select s.name as state , c.* from tbl_location as s,tbl_location as c where s.location_id = c.parent_id and c.lable='city'");
        $this->load->view('admin/manage_city', $dt);
    }

    public function area() {
        $this->security();
        $this->session->set_userdata('pages', 'location');
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('state', 'State', 'required', array('required' => 'State Name Is Required.'));
            $this->form_validation->set_rules('city', 'City', 'required', array('required' => 'City Name Is Required.'));
            $this->form_validation->set_rules('area', 'Area', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Area Name Is Required.', 'regex_match' => 'Please Enter Valid Area Name.'));

            if ($this->form_validation->run() == TRUE) {
                $c = $this->md->my_query("select count(*) as cm from tbl_location where name='" . $this->input->post('area') . "' AND parent_id='" . $this->input->post('city') . "'")[0]->cm;
                if ($c == 0) {
                    $data['name'] = $this->input->post('area');
                    $data['parent_id'] = $this->input->post('city');
                    $data['lable'] = "area";
                    $result = $this->md->my_insert("tbl_location", $data);
                    if ($result == 1) {
                        $dt['success'] = $this->input->post('area') . " Added Successfully.";
                    } else {
                        $dt['error'] = "Something is wrong.";
                    }
                } else {
                    $dt['err'] = $this->input->post('area') . " is already exist.";
                }
            }
        }
        $dt['statedata'] = $this->md->my_select("tbl_location", array('lable' => 'state'));
        $dt['display'] = $this->md->my_query("SELECT st.name as state,city.name as city,a.* from tbl_location as st,tbl_location as city,tbl_location as a where st.location_id = city.parent_id and city.location_id = a.parent_id and a.lable='area'");
        $this->load->view('admin/manage_area', $dt);
    }

    public function landmark() {
        $this->security();
        $this->session->set_userdata('pages', 'location');
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('state', 'State', 'required', array('required' => 'State Name Is Required.'));
            $this->form_validation->set_rules('city', 'City', 'required', array('required' => 'City Name Is Required.'));
            $this->form_validation->set_rules('area', 'Area', 'required', array('required' => 'Area Name Is Required.'));
            $this->form_validation->set_rules('landmark', 'Landmark', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Landmark Name Is Required.', 'regex_match' => 'Please Enter Valid Landmark Name.'));

            if ($this->form_validation->run() == TRUE) {
                $c = $this->md->my_query("select count(*) as cm from tbl_location where name='" . $this->input->post('landmark') . "' AND parent_id='" . $this->input->post('area') . "'")[0]->cm;
                if ($c == 0) {
                    $data['name'] = $this->input->post('landmark');
                    $data['parent_id'] = $this->input->post('area');
                    $data['lable'] = "landmark";
                    $result = $this->md->my_insert("tbl_location", $data);
                    if ($result == 1) {
                        $dt['success'] = $this->input->post('landmark') . " Added Successfully.";
                    } else {
                        $dt['error'] = "Something is wrong.";
                    }
                } else {
                    $dt['err'] = $this->input->post('landmark') . " is already exist.";
                }
            }
        }
        $dt['statedata'] = $this->md->my_select("tbl_location", array('lable' => 'state'));
        $dt['display'] = $this->md->my_query("SELECT st.name as state , ct.name as city, ar.name as area, l.* FROM tbl_location as st , tbl_location as ct , tbl_location as ar, tbl_location as l WHERE st.location_id = ct.parent_id and ct.location_id = ar.parent_id and ar.location_id = l.parent_id and l.lable='landmark'");
        $this->load->view('admin/manage_landmark', $dt);
    }

    public function cartype() {
        $this->security();
        $this->session->set_userdata('pages', 'category');
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('cartype', 'cartype', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Car Type Is Required.', 'regex_match' => 'Please Enter Valid Car Type.'));

            if ($this->form_validation->run() == TRUE) {
                $c = $this->md->my_query("select count(*) as cm from tbl_category where category_name='" . $this->input->post('cartype') . "' AND label='type'")[0]->cm;
                if ($c == 0) {
                    $data['category_name'] = $this->input->post('cartype');
                    $data['parent_id'] = 0;
                    $data['label'] = "type";
                    $data['image'] = "";
                    $result = $this->md->my_insert("tbl_category", $data);
                    if ($result == 1) {
                        $dt['success'] = $this->input->post('cartype') . " Added Successfully.";
                    } else {
                        $dt['error'] = "Something is wrong.";
                    }
                } else {
                    $dt['err'] = $this->input->post('cartype') . " is already exist.";
                }
            }
        }
        $dt['cartype'] = $this->md->my_select("tbl_category", array('label' => 'type'));
        $this->load->view('admin/manage_car_type', $dt);
    }

    public function carcompany() {
        $this->security();
        $this->session->set_userdata('pages', 'category');
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('cartype', 'Car Type', 'required', array('required' => 'Car Type Is Required.'));
            $this->form_validation->set_rules('carcompany', 'Car Company', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Car Company Name Is Required.', 'regex_match' => 'Please Enter Valid Car Company.'));

            if ($this->form_validation->run() == TRUE) {
                $c = $this->md->my_query("select count(*) as cm from tbl_category where category_name='" . $this->input->post('carcompany') . "' AND parent_id='" . $this->input->post('cartype') . "'")[0]->cm;
                if ($c == 0) {
                    $data['category_name'] = $this->input->post('carcompany');
                    $data['parent_id'] = $this->input->post('cartype');
                    $data['label'] = "company";
                    $data['image'] = "";
                    $result = $this->md->my_insert("tbl_category", $data);
                    if ($result == 1) {
                        $dt['success'] = $this->input->post('carcompany') . " Added Successfully.";
                    } else {
                        $dt['error'] = "Something is wrong.";
                    }
                } else {
                    $dt['err'] = $this->input->post('carcompany') . " is already exist.";
                }
            }
        }
        $dt['cartypedata'] = $this->md->my_query("select * from tbl_category where label='type'");
        $dt['companyshow'] = $this->md->my_query("select type.category_name as cartype , company.* from tbl_category as type,tbl_category as company where type.category_id = company.parent_id and company.label='company'");
        $this->load->view('admin/manage_car_company', $dt);
    }

    public function carmodel() {
        $this->security();
        $this->session->set_userdata('pages', 'category');
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('type', 'Car Type', 'required', array('required' => 'Car Type Is Required.'));
            $this->form_validation->set_rules('company', 'Car Company', 'required', array('required' => 'Car Company Is Required.'));
            $this->form_validation->set_rules('model', 'Car Model', 'required|regex_match[/^[a-zA-Z0-9- ]+$/]', array('required' => 'Car Model Is Required.', 'regex_match' => 'Please Enter Valid Car Model.'));

            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './assets/images/vectorimage/';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size'] = 2048;
                $mx = $this->md->my_query('SELECT MAX(category_id) as mx FROM tbl_category')[0]->mx;
                if ($mx != "") {
                    $config['file_name'] = "vector_" . $mx;
                } else {
                    $config['file_name'] = "vector_0";
                }
                $result = $this->md->my_file($config, 'modelimg');
                if (in_array('file_name', $result)) {
                    $dbpath = "assets/images/vectorimage/" . $result['file_name'];
                    $c = $this->md->my_query("select count(*) as cm from tbl_category where category_name='" . $this->input->post('model') . "' AND parent_id='" . $this->input->post('company') . "'")[0]->cm;
                    if ($c == 0) {
                        $data['category_name'] = $this->input->post('model');
                        $data['parent_id'] = $this->input->post('company');
                        $data['label'] = "model";
                        $data['image'] = $dbpath;
                        $result = $this->md->my_insert("tbl_category", $data);
                        if ($result == 1) {
                            $dt['success'] = $this->input->post('model') . " Added Successfully.";
                        } else {
                            $dt['error'] = "Something is wrong.";
                        }
                    } else {
                        $dt['err'] = $this->input->post('model') . " is already exist.";
                    }
                } else {
                    $dt['fileerr'] = $result[0];
                }
            }
        }
        $dt['cartype'] = $this->md->my_select("tbl_category", array('label' => 'type'));
        $dt['display'] = $this->md->my_query("select type.category_name as cartype , company.category_name as companyname , model.* from tbl_category as type,tbl_category as company,tbl_category as model where type.category_id = company.parent_id AND company.category_id = model.parent_id and model.label='model'");
        $this->load->view('admin/manage_car_model', $dt);
    }

    public function carsubmodel() {
        $this->security();
        $this->session->set_userdata('pages', 'category');
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('type', 'Car Type', 'required', array('required' => 'Car Type Is Required.'));
            $this->form_validation->set_rules('company', 'Car Company', 'required', array('required' => 'Car Company Is Required.'));
            $this->form_validation->set_rules('model', 'Car Model', 'required', array('required' => 'Car Model Is Required.'));
            $this->form_validation->set_rules('submodel', 'Sub Model', 'required|regex_match[/^[a-zA-Z0-9-.& ]+$/]', array('required' => 'Car Model Is Required.', 'regex_match' => 'Please Enter Valid Car Sub Model.'));

            if ($this->form_validation->run() == TRUE) {
                $c = $this->md->my_query("select count(*) as cm from tbl_category where category_name='" . $this->input->post('submodel') . "' AND parent_id='" . $this->input->post('model') . "'")[0]->cm;
                if ($c == 0) {
                    $data['category_name'] = $this->input->post('submodel');
                    $data['parent_id'] = $this->input->post('model');
                    $data['label'] = "submodel";
                    $data['image'] = "";
                    $result = $this->md->my_insert("tbl_category", $data);
                    if ($result == 1) {
                        $dt['success'] = $this->input->post('submodel') . " Added Successfully.";
                    } else {
                        $dt['error'] = "Something is wrong.";
                    }
                } else {
                    $dt['err'] = $this->input->post('submodel') . " is already exist.";
                }
            }
        }
        $dt['cartype'] = $this->md->my_select("tbl_category", array('label' => 'type'));
        $dt['display'] = $this->md->my_query("SELECT tp.category_name as type , com.category_name as company, md.category_name as model, sub.* FROM tbl_category as tp , tbl_category as com , tbl_category as md,tbl_category as sub WHERE tp.category_id = com.parent_id and com.category_id = md.parent_id and md.category_id = sub.parent_id and sub.label='submodel'");
        $this->load->view('admin/manage_car_submodel', $dt);
    }

    public function specificationset() {
        $this->security();
        $this->session->set_userdata('pages', 'specification');
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('type', 'Car Type', 'required', array('required' => 'Car Type Is Required.'));
            $this->form_validation->set_rules('company', 'Car Company', 'required', array('required' => 'Car Company Is Required.'));
            $this->form_validation->set_rules('model', 'Car Model', 'required', array('required' => 'Car Model Is Required.'));
            $this->form_validation->set_rules('setname', 'Set Name', 'required|regex_match[/^[a-zA-Z, ]+$/]', array('required' => 'Set Name Is Required.', 'regex_match' => 'Enater Valid Set Name.'));
            if ($this->form_validation->run() == TRUE) {
                $c = $this->md->my_query("select count(*) as cm from tbl_attribute_set where set_name='" . $this->input->post('setname') . "' and category_id='" . $this->input->post('model') . "'")[0]->cm;
                if ($c == 0) {
                    $data['category_id'] = $this->input->post('model');
                    $data['set_name'] = $this->input->post('setname');
                    $result = $this->md->my_insert("tbl_attribute_set", $data);
                    if ($result == 1) {
                        $dt['success'] = $this->input->post('setname') . " Added Successfully.";
                    } else {
                        $dt['error'] = "Something is wrong.";
                    }
                } else {
                    $dt['err'] = $this->input->post('setname') . " is already exist.";
                }
            }
        }
        $dt['type'] = $this->md->my_select('tbl_category', array('label' => 'type'));
        $dt['display'] = $this->md->my_query("SELECT c.category_name as type , com.category_name as company , mo.category_name as model , a.* from tbl_category as c , tbl_category as com , tbl_category as mo ,tbl_attribute_set as a WHERE c.category_id = com.parent_id and com.category_id = mo.parent_id and mo.category_id = a.category_id");
        $this->load->view('admin/manage_specification_set', $dt);
    }

    public function specification() {
        $this->security();
        $this->session->set_userdata('pages', 'specification');
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('type', 'Car Type', 'required', array('required' => 'Car Type Is Required.'));
            $this->form_validation->set_rules('company', 'Company Name', 'required', array('required' => 'Company Name Is Required.'));
            $this->form_validation->set_rules('model', 'Car Model', 'required', array('required' => 'Car Model Is Required.'));
            $this->form_validation->set_rules('set', 'Set Name', 'required', array('required' => 'Set Name Is Required.'));
            $this->form_validation->set_rules('specificationname', 'Specification Name', 'required', array('required' => 'Specification Name Is Required.'));
            $this->form_validation->set_rules('specificationtype', 'Specification Type', 'required', array('required' => 'Specification Type Is Required.'));

            if ($this->input->post('specificationtype') == "Selectbox" || $this->input->post('specificationtype') == "Checkbox") {
                $this->form_validation->set_rules('spevalue', 'Specification Value', 'required|regex_match[/^[a-zA-Z0-9-, ]+$/]', array('required' => 'Specification Type Is Required.', 'regex_match' => 'Enter Correct Specification Value.'));
            }
            if ($this->form_validation->run() == TRUE) {
                $c = $this->md->my_query("select count(*) as cm from tbl_attribute where attribute_name='" . $this->input->post('specificationname') . "' AND set_id='" . $this->input->post('set') . "'")[0]->cm;
                if ($c == 0) {
                    $data['set_id'] = $this->input->post('set');
                    $data['attribute_name'] = $this->input->post('specificationname');
                    $data['attribute_type'] = $this->input->post('specificationtype');
                    $data['attribute_value'] = $this->input->post('spevalue');
                    $result = $this->md->my_insert('tbl_attribute', $data);
                    if ($result == 1) {
                        $dt['success'] = $this->input->post('specificationname') . " Added Successfully.";
                    } else {
                        $dt['error'] = "Something is wrong.";
                    }
                } else {
                    $dt['err'] = $this->input->post('specificationname') . " is already exist.";
                }
            }
        }
        $dt['type'] = $this->md->my_select('tbl_category', array('label' => 'type'));
        $dt['display'] = $this->md->my_query("SELECT t.category_name as dtype , co.category_name as dcompany , mo.category_name as dmodel , aset.set_name as dset , an.* FROM tbl_category as t , tbl_category as co,  tbl_category as mo, tbl_attribute_set as aset , tbl_attribute as an  WHERE t.category_id = co.parent_id AND co.category_id = mo.parent_id AND mo.category_id = aset.category_id AND aset.set_id = an.set_id");
        $this->load->view('admin/manage_specification', $dt);
    }

    public function cardetail() {
        $this->security();
        $this->session->set_userdata('pages', 'aboutcar');
        $dt['cardata'] = $this->md->my_query("SELECT c.name,car.* FROM tbl_carmela as c,tbl_car_detail as car WHERE c.carmela_id = car.carmela_id and  car.del_status = 0 ORDER BY car.car_id DESC");
        $this->load->view('admin/manage_car_detail', $dt);
    }

    public function carreview() {
        $this->security();
        $this->session->set_userdata('pages', 'aboutcar');
        $data['carreview'] = $this->md->my_query("SELECT r.name , r.profile_pic , cr.* FROM tbl_registration AS r , tbl_car_review AS cr WHERE r.registration_id = cr.registration_id AND cr.del_status = 0");
        $this->load->view('admin/manage_carreview', $data);
    }

    public function carmelareview() {
        $this->security();
        $this->session->set_userdata('pages', 'aboutcar');
        $data['carmelareview'] = $this->md->my_query("SELECT cr.review , cr.review_id , cr.del_status , cr.date , cr.status as a , r.registration_id , r.name as aaa , r.profile_pic , c.* FROM tbl_carmela_review AS cr , tbl_registration AS r , tbl_carmela AS c WHERE cr.register_id = r.registration_id AND cr.carmela_id = c.carmela_id AND cr.del_status = 0");
        $this->load->view('admin/manage_carmela_review', $data);
    }

    public function setting() {
        $this->security();
        $data[''] = '';
        if ($this->input->post('ok')) {
            $config['upload_path'] = './assets/images/profile/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = 2048;
            $config['file_name'] = 'admin';
            $config['overwrite'] = TRUE;

            $result = $this->md->my_file($config, 'photo');
            if (in_array('file_name', $result)) {
                $dbpath = "assets/images/profile/" . $result['file_name'];
                $dt['profile_pic'] = $dbpath;
                $r = $this->md->my_update('tbl_admin_login', $dt, array('admin_id' => $this->session->userdata('admin')));
                if ($r == 1) {
                    $data['su'] = "Profile Updated Successfully.";
                }
            } else {
                $data['err'] = $result[0];
            }
        }
        $data['select'] = $this->md->my_select('tbl_admin_login', array('admin_id' => $this->session->userdata('admin')));



        if ($this->input->post('editpass')) {
            if ($this->input->post('cpassword') != "") {
                $data = $this->md->my_select('tbl_admin_login', array('admin_id' => $this->session->userdata('admin')));

                $ops = $this->encryption->decrypt($data[0]->password);

                $ps = $this->input->post('cpassword');

                if ($ps == $ops) {
                    $this->form_validation->set_rules('npassword', 'New Password', 'required|min_length[8]|max_length[16]', array('required' => 'New Password Is Required.', 'min_length' => 'New Password atleast 8 Character.', 'max_length' => 'New Password Maximum 16 Character.'));
                    $this->form_validation->set_rules('rpassword', 'Retype Password', 'matches[npassword]', array('matches' => 'Retype Password Is Not Match.'));

                    if ($this->form_validation->run() == TRUE) {
                        $wh['admin_id'] = $this->session->userdata('admin');
                        $data1['password'] = $this->encryption->encrypt($this->input->post('npassword'));
                        $result = $this->md->my_update('tbl_admin_login', $data1, $wh);

                        if ($result == 1) {
                            $this->session->unset_userdata('admin');
                            $this->session->unset_userdata('lastlogin');
                            redirect('Admin');
                        }
                    }
                } else {
                    $data['error'] = "Please Enter Valid Password.";
                }
            } else {
                $data['error'] = "Please Enter Current Password.";
            }
        }
        $this->load->view('admin/setting', $data);
    }

    public function security() {
        if ($this->session->userdata('admin') == "") {
            redirect('Admin');
        }
    }

    public function addservice() {
        $this->security();
        $this->session->set_userdata('pages', 'addservice');
        $dt[''] = "";
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('service', 'Car Service', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Car Service Is Required.', 'regex_match' => 'Please Enter Valid Car Service Name.'));
            $this->form_validation->set_rules('type', 'Car Type', 'required', array('required' => 'Car Type Is Required.'));
            $this->form_validation->set_rules('company', 'Car Company', 'required', array('required' => 'Car Company Is Required.'));
            $this->form_validation->set_rules('model', 'Car Model', 'required', array('required' => 'Car Model Is Requirsed.'));
            $this->form_validation->set_rules('price', 'Service Price', 'required|numeric', array('required' => 'Price Is Required.', 'numeric' => 'Please Enter Valid Price.'));

            if ($this->form_validation->run() == TRUE) {
                $c = $this->md->my_query("select count(*) as cm from tbl_service where name='" . $this->input->post('service') . "' and category_id = '" . $this->input->post('model') . "'")[0]->cm;
                if ($c == 0) {
                    $data['name'] = $this->input->post('service');
                    $data['category_id'] = $this->input->post('model');
                    $data['price'] = $this->input->post('price');

                    $r = $this->md->my_insert('tbl_service', $data);

                    if ($r == 1) {
                        $dt['success'] = $this->input->post('service') . " Is Add Successfully. ";
                    } else {
                        $dt['error'] = "Something Is Wrong.";
                    }
                } else {
                    $dt['error'] = $this->input->post('service') . " is already exist. ";
                }
            }
        }
        $dt['cartype'] = $this->md->my_select("tbl_category", array('label' => 'type'));
        $dt['display'] = $this->md->my_query("SELECT s.* , t.category_name as type , c.category_name as company , m.category_name as model from tbl_service as s , tbl_category as t , tbl_category as m ,tbl_category as c where s.category_id = m.category_id and m.parent_id = c.category_id and c.parent_id = t.category_id");
        $this->load->view('admin/add_service', $dt);
    }

    public function servicepos() {
        $this->security();
        $this->session->set_userdata('pages', 'addservice');
        $dt[''] = "";
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('type', 'Car Type', 'required', array('required' => 'Car Type Is Required.'));
            $this->form_validation->set_rules('company', 'Car Company', 'required', array('required' => 'Car Company Is Required.'));
            $this->form_validation->set_rules('service', 'Car Service', 'required', array('required' => 'Car Service Is Required.'));
            $this->form_validation->set_rules('xposition', 'X Position', 'required|regex_match[/^[a-zA-Z0-9 ]+$/]', array('required' => 'X Position Is Required.', 'regex_match' => 'Please Enter Valid X Position.'));
            $this->form_validation->set_rules('yposition', 'Y Position', 'required|regex_match[/^[a-zA-Z0-9 ]+$/]', array('required' => 'Y Position Is Required.', 'regex_match' => 'Please Enter Valid Y Position.'));

            if ($this->form_validation->run() == TRUE) {
                $data['service_id'] = $this->input->post('service');
                $data['x_position'] = $this->input->post('xposition');
                $data['y_position'] = $this->input->post('yposition');

                $r = $this->md->my_insert('tbl_service_position', $data);

                if ($r == 1) {
                    $dt['success'] = "Position Is Add Successfully. ";
                } else {
                    $dt['error'] = "Something Is Wrong.";
                }
            }
        }
        $dt['cartype'] = $this->md->my_select("tbl_category", array('label' => 'type'));
        $dt['display'] = $this->md->my_query("select type.category_name as cartype , company.category_name as companyname , model.* from tbl_category as type,tbl_category as company,tbl_category as model where type.category_id = company.parent_id AND company.category_id = model.parent_id and model.label='model'");
        $this->load->view('admin/service_position', $dt);
    }

    public function manageser() {
        $this->security();
        $this->session->set_userdata('pages', 'addservice');
        if ($this->input->post('add')) {
            $da = date('Y-m-d');
            if($this->input->post('rdate') >= $da)
            {
            $dt['message'] = $this->input->post('msg');
            $dt['request_date'] = $this->input->post('rdate');
            $dt['status'] = 1;
            $rr = $this->md->my_update('tbl_booking', $dt, array('booking_id' => $this->session->userdata('booking')));

            if ($rr == 1) {
                redirect('Manage-Service');
            }
            }
            else
            {
                $data['error'] = "Select Correct Request Date.";
            }
        }
        $data['service'] = $this->md->my_select('tbl_booking');
        $this->load->view('admin/service_detail', $data);
    }

    public function pcr() {
        $this->security();
        $this->session->set_userdata('pages', 'addservice');
        $dat = date('Y-m-d');
//        $data['prc'] = $this->md->my_query("SELECT us.* , sp.service_id , ss.* , b.booking_id , b.status AS bokingsta , b.plat_no , b.book_date AS s FROM tbl_user_service AS us , tbl_service_position AS sp , tbl_service  AS ss , tbl_booking AS b WHERE us.booking_id = b.booking_id AND us.position_id = sp.position_id AND sp.service_id = ss.service_id AND b.book_date = '".$dat."'");
        $data['plat'] = $this->md->my_select('tbl_booking');
        $this->load->view('admin/service_pcr', $data);
    }

    public function del() {
        $this->security();
        $action = $this->uri->segment(2);
        $id = $this->uri->segment(3);

        if ($action == 'state') {
            $where['location_id'] = $id;
            $this->md->my_delete('tbl_location', $where);
            redirect('Manage-State');
        } elseif ($action == 'city') {
            $where['location_id'] = $id;
            $this->md->my_delete('tbl_location', $where);
            redirect('Manage-City');
        } elseif ($action == 'type') {
            $where['category_id'] = $id;
            $this->md->my_delete('tbl_category', $where);
            redirect('Manage-Car-Type');
        } elseif ($action == 'company') {
            $where['category_id'] = $id;
            $this->md->my_delete('tbl_category', $where);
            redirect('Manage-Car-Company');
        } elseif ($action == 'feedback') {
            $where['feedback_id'] = $id;
            $this->md->my_delete('tbl_feedback', $where);
            redirect('Manage-Feedback');
        } elseif ($action == 'contact') {
            $where['contact_id'] = $id;
            $this->md->my_delete('tbl_contact_us', $where);
            redirect('Manage-Contact');
        } elseif ($action == 'area') {
            $where['location_id'] = $id;
            $this->md->my_delete('tbl_location', $where);
            redirect('Manage-Area');
        } elseif ($action == 'landmark') {
            $where['location_id'] = $id;
            $this->md->my_delete('tbl_location', $where);
            redirect('Manage-Landmark');
        } elseif ($action == 'service') {
            $where['service_id'] = $id;
            $this->md->my_delete('tbl_service', $where);
            redirect('Manage-Car-Service');
        } elseif ($action == 'positiondel') {
            $where['position_id'] = $id;
            $this->md->my_delete('tbl_service_position', $where);
            redirect('Manage-Car-Position');
        } elseif ($action == 'carmodel') {
            $where['category_id'] = $id;
            $cc = $this->md->my_select('tbl_category', array('category_id' => $where['category_id']));
            unlink('./' . $cc[0]->image);
            $this->md->my_delete('tbl_category', $where);
            redirect('Manage-Car-Model');
        } elseif ($action == 'carsubmodel') {
            $where['category_id'] = $id;
            $this->md->my_delete('tbl_category', $where);
            redirect('Manage-Car-Submodel');
        } elseif ($action == 'attributeset') {
            $where['set_id'] = $id;
            $this->md->my_delete('tbl_attribute_set', $where);
            redirect('Manage-Specification-Set');
        } elseif ($action == 'specification') {
            $where['attribute_id'] = $id;
            $this->md->my_delete('tbl_attribute', $where);
            redirect('Manage-Specification');
        } elseif ($action == 'emailsub') {
            $where['email_id'] = $id;
            $this->md->my_delete('tbl_email_subscriber', $where);
            redirect('Manage-Email-Subscriber');
        } elseif ($action == 'banner') {
            $where['banner_id'] = $id;
            $data = $this->md->my_select('tbl_banner', $where);
            unlink("./" . $data[0]->path);
            $this->md->my_delete('tbl_banner', $where);
            redirect('Manage-Banner');
        } elseif ($action == 'product') {
            $where['car_id'] = $id;
            $data['del_status'] = 1;
            $data['status'] = 0;
            $this->md->my_update('tbl_car_detail', $data, $where);
            redirect('Manage-Car-Detail');
        } elseif ($action == 'review') {
            $where['review_id'] = $id;
            $data['del_status'] = 1;
            $data['status'] = 0;
            $this->md->my_update('tbl_car_review', $data, $where);
            redirect('Manage-Car-Review');
        } elseif ($action == 'caemelare') {
            $where['review_id'] = $id;
            $data['del_status'] = 1;
            $data['status'] = 0;
            $this->md->my_update('tbl_carmela_review', $data, $where);
            redirect('Manage-Carmela-Review');
        }
    }

}

class WAY2SMSClient {
    /* ------------ Way2sms code by GoProHost.In -----
      |  Find More Scripts @ MobGyan.Com
     * -------------------------------------------- */

    var $curl;
    var $timeout = 30;
    var $jstoken;
    var $way2smsHost;
    var $refurl;

    function login($username, $password) {
        /* ------------ Way2sms code by GoProHost.In -----
          |  Find More Scripts @ MobGyan.Com
         * -------------------------------------------- */
        $this->curl = curl_init();
        $uid = urlencode($username);
        $pwd = urlencode($password);

        // Go where the server takes you :P
        curl_setopt($this->curl, CURLOPT_URL, "http://way2sms.com");
        curl_setopt($this->curl, CURLOPT_HEADER, true);
        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, TRUE);
        $a = curl_exec($this->curl);
        if (preg_match('#Location: (.*)#', $a, $r))
            $this->way2smsHost = trim($r[1]);

        // Setup for login
        curl_setopt($this->curl, CURLOPT_URL, $this->way2smsHost . "Login1.action");
        curl_setopt($this->curl, CURLOPT_POST, 1);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, "username=" . $uid . "&password=" . $pwd . "&button=Login");
        curl_setopt($this->curl, CURLOPT_COOKIESESSION, 1);
        curl_setopt($this->curl, CURLOPT_COOKIEFILE, "cookie_way2sms");
        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($this->curl, CURLOPT_MAXREDIRS, 20);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36");
        curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT, $this->timeout);
        curl_setopt($this->curl, CURLOPT_REFERER, $this->way2smsHost);
        $text = curl_exec($this->curl);

        // Check if any error occured
        if (curl_errno($this->curl))
            return "access error : " . curl_error($this->curl);

        // Check for proper login
        $pos = stripos(curl_getinfo($this->curl, CURLINFO_EFFECTIVE_URL), "main.action");
        if ($pos === "FALSE" || $pos == 0 || $pos == "")
            return "invalid login";

        // Set the home page from where we can send message
        $this->refurl = curl_getinfo($this->curl, CURLINFO_EFFECTIVE_URL);
        /* $newurl = str_replace("ebrdg.action?id=", "main.action?section=s&Token=", $this->refurl);
          curl_setopt($this->curl, CURLOPT_URL, $newurl); */

        // Extract the token from the URL
        $tokenLocation = strpos($this->refurl, "Token");
        $this->jstoken = substr($this->refurl, $tokenLocation + 6, 37);
        //Go to the homepage
        //$text = curl_exec($this->curl);

        return true;
    }

    function send($phone, $msg) {
        $result = array();

        // Check the message
        if (trim($msg) == "" || strlen($msg) == 0)
            return "invalid message";

        // Take only the first 140 characters of the message
        $msg = substr($msg, 0, 140);
        // Store the numbers from the string to an array
        $pharr = explode(",", $phone);

        // Send SMS to each number
        foreach ($pharr as $p) {
            if (strlen($p) != 10 || !is_numeric($p) || strpos($p, ".") != false) {
                $result[] = array('phone' => $p, 'msg' => $msg, 'result' => "invalid number");
                continue;
            }

            // Setup to send SMS
            curl_setopt($this->curl, CURLOPT_URL, $this->way2smsHost . 'smstoss.action');
            curl_setopt($this->curl, CURLOPT_REFERER, curl_getinfo($this->curl, CURLINFO_EFFECTIVE_URL));
            curl_setopt($this->curl, CURLOPT_POST, 1);

            curl_setopt($this->curl, CURLOPT_POSTFIELDS, "ssaction=ss&Token=" . $this->jstoken . "&mobile=" . $p . "&message=" . $msg . "&button=Login");
            $contents = curl_exec($this->curl);

            //Check Message Status
            $pos = strpos($contents, 'Message has been submitted successfully');
            $res = ($pos !== false) ? true : false;
            $result[] = array('phone' => $p, 'msg' => $msg, 'result' => $res);
        }
        return $result;
    }

    function logout() {
        curl_setopt($this->curl, CURLOPT_URL, $this->way2smsHost . "LogOut");
        curl_setopt($this->curl, CURLOPT_REFERER, $this->refurl);
        $text = curl_exec($this->curl);
        curl_close($this->curl);
    }

}
