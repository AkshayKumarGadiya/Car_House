<?php

class Edit extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
        if($this->session->userdata('admin') == "")
        {
            redirect('Admin');
        }
    }
    public function state() 
    {
        $wh['location_id'] = $this->uri->segment(2);
        if($this->input->post('update'))
        {
            $this->form_validation->set_rules('upstate', 'Update State', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'State Name Is Required.', 'regex_match' => 'Please Enter Valid State Name.'));

            if ($this->form_validation->run() == TRUE) 
            {
                $c = $this->md->my_query("select count(*) as cm from tbl_location where name='".$this->input->post('upstate')."' AND lable='state' AND location_id !=  '".$this->uri->segment(2)."'")[0]->cm;
                
                    if ($c == 0) 
                    {
                        $data['name'] = $this->input->post('upstate');
                        $result = $this->md->my_update('tbl_location', $data,$wh);
                        if ($result == 1) 
                        {
                            redirect('Manage-State');
                        } 
                        else 
                        {
                            $data['error'] = "Something is wrong.";
                        }
                    }
                    else
                    {
                        $data['err'] = $this->input->post('upstate')." is already exist.";
                    }
            }
        }
        $data['editstate'] = $this->md->my_select('tbl_location',$wh);
        $data['statedata']=$this->md->my_select("tbl_location",array('lable'=>'state'));
        $this->load->view('admin/manage_state',$data);
    }
    public function type()
     {
        $wh['category_id'] = $this->uri->segment(2);
        
        if($this->input->post('update'))
        {
            $this->form_validation->set_rules('ucartype', 'ucartype', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Car Type Is Required.','regex_match' => 'Please Enter Valid Car Type.'));
            
            if($this->form_validation->run() == TRUE)
            {
                $c = $this->md->my_query("select count(*) as cm from tbl_category where category_name='".$this->input->post('ucartype')."' AND label='type' AND  category_id != '".$this->uri->segment(2)."'")[0]->cm;
                if($c == 0)
                {
                    $data['category_name'] = $this->input->post('ucartype');
                    
                    $result = $this->md->my_update("tbl_category",$data,$wh);
                    if ($result == 1) 
                        {
                        redirect('Manage-Car-Type');
                        } 
                        else 
                        {
                            $data['error'] = "Something is wrong.";
                        }
                }
                else
                {
                    $data['err'] = $this->input->post('ucartype')." is already exist.";
                }
                
            }
        }
        
        
        $data['edittype'] = $this->md->my_select('tbl_category',$wh);
        $data['cartype'] = $this->md->my_select("tbl_category",array('label'=>'type'));
        $this->load->view('admin/manage_car_type',$data);
    }
    public function city() 
    {
        $wh['location_id'] = $this->uri->segment(2);
        
        if ($this->input->post('update')) 
        {
            $this->form_validation->set_rules('upstate', 'Update State', 'required', array('required' => 'State Name Is Required.'));
            $this->form_validation->set_rules('upcity', 'Update City', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'State Name Is Required.','regex_match' => 'Please Enter Valid City Name.'));

            if ($this->form_validation->run() == TRUE) 
            {
                $c = $this->md->my_query("select count(*) as cm from tbl_location where name='".$this->input->post('upcity')."' AND parent_id='".$this->input->post('upstate')."' And location_id != '".$this->uri->segment(2)."'")[0]->cm;
                if($c == 0)
                {
                    $updata['name'] = $this->input->post('upcity');
                    $updata['parent_id'] = $this->input->post('upstate');
                    $result = $this->md->my_update("tbl_location",$updata,$wh);
                    if ($result == 1) 
                        {
                            redirect('Manage-City');
                        } 
                        else 
                        {
                            $data['error'] = "Something is wrong.";
                        }
                }
                else
                {
                    $data['err'] = $this->input->post('upcity')." is already exist.";
                }
            }   
        }
        $data['updatecity'] = $this->md->my_select('tbl_location',$wh);
        $data['statedata'] = $this->md->my_select("tbl_location",array('lable'=>'state'));
        $data['cityshow'] = $this->md->my_query("select s.name as state , c.* from tbl_location as s,tbl_location as c where s.location_id = c.parent_id and c.lable='city'");
        $this->load->view('admin/manage_city',$data);
    }
    public function company() 
    {
        $wh['category_id'] = $this->uri->segment(2);
        
        if ($this->input->post('update')) 
        {
            $this->form_validation->set_rules('upcartype', 'Updtae Car Type', 'required', array('required' => 'Car Type Is Required.'));
            $this->form_validation->set_rules('upcarcompany', 'Update Car Company', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Car Company Name Is Required.','regex_match' => 'Please Enter Valid Car Company.'));

            if ($this->form_validation->run() == TRUE) 
            {
                $c = $this->md->my_query("select count(*) as cm from tbl_category where category_name='".$this->input->post('upcarcompany')."' AND parent_id='".$this->input->post('upcartype')."' AND category_id != '".$this->uri->segment(2)."'")[0]->cm;
                if($c == 0)
                {
                    $updata['category_name'] = $this->input->post('upcarcompany');
                    $updata['parent_id'] = $this->input->post('upcartype');
                    $result = $this->md->my_update("tbl_category",$updata,$wh);
                    if ($result == 1) 
                        {
                            redirect('Manage-Car-Company');
                        } 
                        else 
                        {
                            $data['error'] = "Something is wrong.";
                        }
                }
                else
                {
                    $data['err'] = $this->input->post('upcarcompany')." is already exist.";
                }
            }   
        }
        
        $data['cardata'] = $this->md->my_select("tbl_category",array('label'=>'type'));
        $data['updatecompany'] = $this->md->my_select('tbl_category',$wh);
        $data['companyshow'] = $this->md->my_query("select type.category_name as cartype , company.* from tbl_category as type,tbl_category as company where type.category_id = company.parent_id and company.label='company'");
        $this->load->view('admin/manage_car_company',$data);
    }
    public function area()
    {
        $wh['location_id'] = $this->uri->segment(2);
        if ($this->input->post('update')) 
        {
            $this->form_validation->set_rules('upstate', 'Update State', 'required', array('required' => 'State Name Is Required.'));
            $this->form_validation->set_rules('upcity', 'Update City', 'required', array('required' => 'City Name Is Required.'));
            $this->form_validation->set_rules('uparea', 'Update Area', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Area Name Is Required.','regex_match' => 'Please Enter Valid Area Name.'));

            if ($this->form_validation->run() == TRUE) 
            {
                $c = $this->md->my_query("select count(*) as cm from tbl_location where name='".$this->input->post('uparea')."' AND parent_id='".$this->input->post('upcity')."' And location_id != '".$this->uri->segment(2)."'")[0]->cm;
                if($c == 0)
                {
                    $updata['name'] = $this->input->post('uparea');
                    $updata['parent_id'] = $this->input->post('upcity');
                    $result = $this->md->my_update("tbl_location",$updata,$wh);
                    if ($result == 1) 
                        {
                            redirect('Manage-Area');
                        } 
                        else 
                        {
                            $data['error'] = "Something is wrong.";
                        }
                }
                else
                {
                    $data['err'] = $this->input->post('uparea')." is already exist.";
                }
            }
        }
        
        $data['uparea'] = $this->md->my_select('tbl_location',$wh);
        $data['upcity'] = $this->md->my_select('tbl_location',array('location_id'=>$data['uparea'][0]->parent_id));
        $data['city'] = $this->md->my_select('tbl_location',array('parent_id'=>$data['upcity'][0]->parent_id));
        $data['state'] = $this->md->my_select('tbl_location',array('lable'=>'state'));
        $data['display'] = $this->md->my_query("SELECT st.name as state,city.name as city,a.* from tbl_location as st,tbl_location as city,tbl_location as a where st.location_id = city.parent_id and city.location_id = a.parent_id and a.lable='area'");
        $this->load->view('admin/manage_area',$data);
    }
    public function carmodel() 
    {
        $wh['category_id'] = $this->uri->segment(2);
        
        if ($this->input->post('update')) 
        {
            $this->form_validation->set_rules('uptype', 'Car Type', 'required', array('required' => 'Car Type Is Required.'));
            $this->form_validation->set_rules('ucompany', 'Car Company', 'required', array('required' => 'Car Company Is Required.'));
            $this->form_validation->set_rules('upmodel', 'Car Model', 'required|regex_match[/^[a-zA-Z0-9- ]+$/]', array('required' => 'Car Model Is Required.','regex_match' => 'Please Enter Valid Car Model.'));

            if ($this->form_validation->run() == TRUE) 
            {
                $c = $this->md->my_query("select count(*) as cm from tbl_category where category_name='".$this->input->post('upmodel')."' AND parent_id='".$this->input->post('ucompany')."' And category_id != '".$this->uri->segment(2)."'")[0]->cm;
                if($c == 0)
                {
                    if($_FILES['umodelimg']['name'] != "")
                    {
                        $config['upload_path']          = './assets/images/vectorimage/';
                        $config['allowed_types']        = 'jpeg|jpg|png';
                        $config['max_size']             = 2048;
                        $mx = $this->md->my_select('tbl_category',array('category_id'=>$this->uri->segment(2)));
                        $cc = $mx[0]->category_id - 1;
                        $config['file_name'] = "cover_".$cc;
                        $config['overwrite']=TRUE;
                        $result = $this->md->my_file($config,'umodelimg');
                        if(in_array('file_name',$result))
                        {
                            $dbpath = "assets/images/vectorimage/".$result['file_name'];
                            $udata['image'] = $dbpath;
                        }
                        else
                        {
                            $data['uerr'] = $result[0];
                        }
                    }
                    if(!isset($data['uerr']))
                    {
                        $udata['category_name'] = $this->input->post('upmodel');
                        $udata['parent_id'] = $this->input->post('ucompany');
                        $result = $this->md->my_update("tbl_category",$udata,$wh);
                        if ($result == 1) 
                        {
                            redirect('Manage-Car-Model');
                        } 
                        else 
                        {
                            $data['uperror'] = "Something is wrong.";
                        }
                    }
                }
                else
                {
                    $data['uperr'] = $this->input->post('upmodel')." is already exist.";
                }
            }
        }
        $data['updatemodel'] = $this->md->my_select('tbl_category',$wh);
        $data['upcompany'] = $this->md->my_select('tbl_category',array('category_id'=>$data['updatemodel'][0]->parent_id));
        $data['company'] = $this->md->my_select('tbl_category',array('parent_id'=>$data['upcompany'][0]->parent_id));
        $data['cartype'] = $this->md->my_select("tbl_category",array('label'=>'type'));
        $data['display']= $this->md->my_query("select type.category_name as cartype , company.category_name as companyname , model.* from tbl_category as type,tbl_category as company,tbl_category as model where type.category_id = company.parent_id AND company.category_id = model.parent_id and model.label='model'");
        $this->load->view('admin/manage_car_model',$data);
    }
    public function uservice() 
    {
        $wh['service_id'] = $this->uri->segment(2);
        if($this->input->post('update'))
        {
            $this->form_validation->set_rules('uservice', 'Update Service', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Car Service Is Required.','regex_match'=>'Please Enter Valid Car Service Name.'));
            
            if ($this->form_validation->run() == TRUE) 
            {
                $c = $this->md->my_query("select count(*) as cm from tbl_service where name='".$this->input->post('uservice')."' and category_id != '".$this->uri->segment(2)."'")[0]->cm;
                if($c == 0)
                {
                    $udata['name'] = $this->input->post('uservice');
                    $udata['category_id'] = $this->input->post('upmodel');
                    $udata['price'] = $this->input->post('uprice');
                    $result = $this->md->my_update("tbl_service",$udata,$wh);
                    if ($result == 1) 
                    {
                        redirect('Manage-Car-Service');
                    } 
                    else 
                    {
                        $data['uerr'] = "Something is wrong.";
                    }
                }
                else
                {
                    $data['uerr'] = $this->input->post('uservice')." is already exist. ";
                }
            }
        }
        $data['updateservice'] = $this->md->my_select('tbl_service',$wh);
        $data['upmodel'] = $this->md->my_select('tbl_category',array('category_id'=>$data['updateservice'][0]->category_id));
        $data['model'] = $this->md->my_select('tbl_category',array('parent_id'=>$data['upmodel'][0]->parent_id));
        $data['upcompany'] = $this->md->my_select('tbl_category',array('category_id'=>$data['upmodel'][0]->parent_id));
        $data['company'] = $this->md->my_select('tbl_category',array('parent_id'=>$data['upcompany'][0]->parent_id));
        $data['cartype'] = $this->md->my_select("tbl_category",array('label'=>'type'));
        $data['display'] = $this->md->my_query("SELECT s.* , t.category_name as type , c.category_name as company , m.category_name as model from tbl_service as s , tbl_category as t , tbl_category as m ,tbl_category as c where s.category_id = m.category_id and m.parent_id = c.category_id and c.parent_id = t.category_id");
        $this->load->view('admin/add_service',$data);
    }
    public function upposition() 
    {
        $wh['position_id'] = $this->uri->segment(2);
        if($this->input->post('update'))
        {
            $this->form_validation->set_rules('utype', 'Update Type', 'required', array('required' => 'Car Type Is Required.'));
            $this->form_validation->set_rules('ucompany', 'Update Company', 'required', array('required' => 'Car Company Is Required.'));
            $this->form_validation->set_rules('uservice', 'Update Service', 'required', array('required' => 'Car Service Is Required.'));
            $this->form_validation->set_rules('uxposition', 'Update X Position', 'required|regex_match[/^[a-zA-Z0-9 ]+$/]', array('required' => 'X Position Is Required.','regex_match'=>'Please Enter Valid X Position.'));
            $this->form_validation->set_rules('uyposition', 'Update Y Position', 'required|regex_match[/^[a-zA-Z0-9 ]+$/]', array('required' => 'Y Position Is Required.','regex_match'=>'Please Enter Valid Y Position.'));
            $this->form_validation->set_rules('uprice', 'Update Price', 'required|regex_match[/^[0-9]+$/]', array('required' => 'Price Is Required.','regex_match'=>'Please Enter Valid Price.'));
            
            if ($this->form_validation->run() == TRUE) 
            {
                $udata['service_id'] = $this->input->post('uservice');
                $udata['x_position'] = $this->input->post('uxposition');
                $udata['y_position'] = $this->input->post('uyposition');
                $udata['price'] = $this->input->post('uprice');
                $result = $this->md->my_update("tbl_service_position",$udata,$wh);
                if ($result == 1) 
                {
                    redirect('Manage-Car-Position');
                } 
                else 
                {
                    $data['uerr'] = "Something is wrong.";
                }
            }
        }
        $data['updateposition'] = $this->md->my_select('tbl_service_position',$wh);
        $data['upservice'] = $this->md->my_select('tbl_service',array('service_id'=>$data['updateposition'][0]->service_id));
        $data['service'] = $this->md->my_select('tbl_service',array('service_id'=>$data['upservice'][0]->service_id));
        $data['upcompany'] = $this->md->my_select('tbl_category',array('category_id'=>$data['upservice'][0]->category_id));
        $data['company'] = $this->md->my_select('tbl_category',array('category_id'=>$data['upcompany'][0]->category_id));
        $data['cartype'] = $this->md->my_select("tbl_category",array('label'=>'type'));
        $data['display'] = $this->md->my_query("SELECT s.name as service, p.* FROM tbl_service AS s , tbl_service_position AS p WHERE s.service_id = p.service_id");
        $this->load->view('admin/service_position',$data);
    }
    public function offer()
    {
        $wh['offer_id'] = $this->uri->segment(2);
        
        if($this->input->post('update'))
        {
            $this->form_validation->set_rules('uoffername', 'a', 'required', array('required' => 'Offer Name Is Required.'));
            $this->form_validation->set_rules('urate', 'b', 'required|regex_match[/^[0-9]+$/]', array('required' => 'Offer Rate Is Required.','regex_match' => 'Please Enter Valid Offer Rate.'));
            $this->form_validation->set_rules('umax', 'c', 'required|regex_match[/^[0-9]+$/]', array('required' => 'Maximum Price Is Required.','regex_match' => 'Please Enter Valid Maximum Price.'));
            $this->form_validation->set_rules('umin', 'd', 'required|regex_match[/^[0-9]+$/]', array('required' => 'Minimum Price Is Required.','regex_match' => 'Please Enter Valid Car Minimum Price.'));
            $this->form_validation->set_rules('umindate', 'e', 'required', array('required' => 'Start date Is Required.'));
            $this->form_validation->set_rules('umaxdate', 'f', 'required', array('required' => 'End Date Is Required.'));
            
            if ($this->form_validation->run() == TRUE) 
            {
                if($this->input->post('uptype') != "" && $this->input->post('ucompany') != "" && $this->input->post('upmodel') != "")
                {
                    $udata['category_id'] = $this->input->post('upmodel');
                    $udata['lable'] = "model";
                }
                elseif($this->input->post('uptype') != "" && $this->input->post('ucompany') != "" && $this->input->post('upmodel') == "")
                {
                    $udata['category_id'] = $this->input->post('ucompany');
                    $udata['lable'] = "company";
                }
                elseif($this->input->post('uptype') != "" && $this->input->post('ucompany') == "" && $this->input->post('upmodel') == "")
                {
                    $udata['category_id'] = $this->input->post('uptype');
                    $udata['lable'] = "type";
                }
                else
                {
                    $udata['category_id'] = 0;
                    $udata['lable'] = "all";
                }
                
                $c = $this->md->my_query("select count(*) as cn from tbl_offer where offer_name = '".$this->input->post('uoffername')."' and category_id = '".$udata['category_id']."' and offer_id != '".$this->uri->segment(2)."'")[0]->cn;
                
                if($c == 0)
                {
                    $udata['offer_name'] = $this->input->post('uoffername');
                    $udata['offer_rate'] = $this->input->post('urate');
                    $udata['min_price'] = $this->input->post('umin');
                    $udata['max_price'] = $this->input->post('umax');
                    $udata['start_date'] = date('Y-m-d',strtotime($this->input->post('umindate')));
                    $udata['end_date'] = date('Y-m-d',strtotime($this->input->post('umaxdate')));
                    
                    $result = $this->md->my_update('tbl_offer',$udata,$wh);
                    
                    if($result == 1)
                    {
                        redirect('Carmela-Offer');
                    }
                    else
                    {
                        $data['err'] = "Something Is Wrong.";
                    }
                }
                else
                {
                    $data['err'] = "Offer Is Already Exist.";
                }
            }
        }
        
        $data['uoffer'] = $this->md->my_select('tbl_offer',$wh);
        if($data['uoffer'][0]->lable == "model")
        {
            $data['upmodel'] = $this->md->my_select('tbl_category',array('category_id'=>$data['uoffer'][0]->category_id));
            $data['upcompany'] = $this->md->my_select('tbl_category',array('category_id'=>$data['upmodel'][0]->parent_id));
            $data['company'] = $this->md->my_select('tbl_category',array('parent_id'=>$data['upcompany'][0]->parent_id));
            $data['model'] = $this->md->my_select('tbl_category',array('parent_id'=>$data['upmodel'][0]->parent_id));
            $data['cartype'] = $this->md->my_query("select c.* , cd.* from tbl_car_detail as cd , tbl_category as c where cd.type_id = c.category_id and cd.carmela_id = '".$this->session->userdata("carmela")."' group by c.category_id");
            
        }
        elseif(($data['uoffer'][0]->lable == "company"))
        {
            $data['upcompany'] = $this->md->my_select('tbl_category',array('category_id'=>$data['uoffer'][0]->category_id));
            $data['company'] = $this->md->my_select('tbl_category',array('parent_id'=>$data['upcompany'][0]->parent_id));
            $data['upmodel'] = $this->md->my_select('tbl_category',array('parent_id'=>$data['upcompany'][0]->category_id));
            $data['model'] = $this->md->my_select('tbl_category',array('parent_id'=>$data['upmodel'][0]->parent_id));
            $data['cartype'] = $this->md->my_query("select c.* , cd.* from tbl_car_detail as cd , tbl_category as c where cd.type_id = c.category_id and cd.carmela_id = '".$this->session->userdata("carmela")."' group by c.category_id");
        }
        elseif(($data['uoffer'][0]->lable == "type"))
        {
            $data['cartype'] = $this->md->my_select('tbl_category',array('label'=>'type'));
            $data['typee'] = $this->md->my_select('tbl_category',array('category_id'=>$data['uoffer'][0]->category_id));
            $data['upcompany'] = $this->md->my_select('tbl_category',array('parent_id'=>$data['typee'][0]->category_id));
            $data['upmodel'] = $this->md->my_select('tbl_category',array('parent_id'=>$data['upcompany'][0]->category_id));
            $data['company'] = $this->md->my_select('tbl_category',array('parent_id'=>$data['upcompany'][0]->parent_id));
            $data['cartype'] = $this->md->my_query("select c.* , cd.* from tbl_car_detail as cd , tbl_category as c where cd.type_id = c.category_id and cd.carmela_id = '".$this->session->userdata("carmela")."' group by c.category_id");
            
        }
        elseif(($data['uoffer'][0]->lable == "all"))
        {
            $data['cartype'] = $this->md->my_query("select c.* , cd.* from tbl_car_detail as cd , tbl_category as c where cd.type_id = c.category_id and cd.carmela_id = '".$this->session->userdata("carmela")."' group by c.category_id");
        }
       $data['offer'] = $this->md->my_query("select * from tbl_offer");
        $this->load->view('carmela/offer',$data);
    }
    public function submodel() 
    {
        $wh['category_id'] = $this->uri->segment(2);
            
        if ($this->input->post('update')) 
        {
            $this->form_validation->set_rules('uptype', 'Update Type', 'required', array('required' => 'Car Type Is Required.'));
            $this->form_validation->set_rules('ucompany', 'Update Company', 'required', array('required' => 'Car Company Is Required.'));
            $this->form_validation->set_rules('upmodel', 'Update Model', 'required', array('required' => 'Car Model Is Required.'));
            $this->form_validation->set_rules('upsubmodel', 'Update Sub Model', 'required|regex_match[/^[a-zA-Z0-9-.& ]+$/]', array('required' => 'Car Model Is Required.','regex_match' => 'Please Enter Valid Car Sub Model.'));

            if ($this->form_validation->run() == TRUE) 
            {
                $c = $this->md->my_query("select count(*) as cm from tbl_category where category_name='".$this->input->post('upsubmodel')."' AND parent_id='".$this->input->post('upmodel')."' And category_id != '".$this->uri->segment(2)."'")[0]->cm;
                if($c == 0)
                {
                    $udata['category_name'] = $this->input->post('upsubmodel');
                    $udata['parent_id'] = $this->input->post('upmodel');
                    $result = $this->md->my_update("tbl_category",$udata,$wh);
                    if ($result == 1) 
                        {
                            redirect('Manage-Car-Submodel');
                        } 
                        else 
                        {
                            $data['error'] = "Something is wrong.";
                        }
                }
                else
                {
                    $data['err'] = $this->input->post('upsubmodel')." is already exist.";
                }
            }
            
        }
        $data['upsubmodel'] = $this->md->my_select('tbl_category',$wh);
        $data['upmodel'] = $this->md->my_select('tbl_category',array('category_id'=>$data['upsubmodel'][0]->parent_id));
        $data['upcompany'] = $this->md->my_select('tbl_category',array('category_id'=>$data['upmodel'][0]->parent_id));
        $data['company'] = $this->md->my_select('tbl_category',array('parent_id'=>$data['upcompany'][0]->parent_id));
        $data['model'] = $this->md->my_select('tbl_category',array('parent_id'=>$data['upmodel'][0]->parent_id));
        $data['cartype'] = $this->md->my_select("tbl_category",array('label'=>'type'));
        $data['display'] = $this->md->my_query("SELECT tp.category_name as type , com.category_name as company, md.category_name as model, sub.* FROM tbl_category as tp , tbl_category as com , tbl_category as md,tbl_category as sub WHERE tp.category_id = com.parent_id and com.category_id = md.parent_id and md.category_id = sub.parent_id and sub.label='submodel'");
        $this->load->view('admin/manage_car_submodel',$data);
    }
    public function landmark()
    {
        $wh['location_id'] = $this->uri->segment(2);
        
        if ($this->input->post('update')) 
        {
            $this->form_validation->set_rules('upstate', 'Update State', 'required', array('required' => 'State Name Is Required.'));
            $this->form_validation->set_rules('upcity', 'Update City', 'required', array('required' => 'City Name Is Required.'));
            $this->form_validation->set_rules('uparea', 'Update Area', 'required', array('required' => 'Area Name Is Required.'));
            $this->form_validation->set_rules('uplandmark','Update Landmark','required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Landmark Name Is Required.','regex_match' => 'Please Enter Valid Landmark Name.'));

            if ($this->form_validation->run() == TRUE) 
            {
                $c = $this->md->my_query("select count(*) as cm from tbl_location where name='".$this->input->post('uplandmark')."' AND parent_id='".$this->input->post('uparea')."'")[0]->cm;
                if($c == 0)
                {
                    $udata['name'] = $this->input->post('uplandmark');
                    $udata['parent_id'] = $this->input->post('uparea');
                    $result = $this->md->my_update("tbl_location",$udata,$wh);
                    if ($result == 1) 
                    {
                        redirect('Manage-Landmark');
                    } 
                    else 
                    {
                        $data['error'] = "Something is wrong.";
                    }
                }
                else
                {
                    $data['err'] = $this->input->post('uplandmark')." is already exist.";
                }
                
            }
        }
        
        $data['uplandmark'] = $this->md->my_select('tbl_location',$wh);
        $data['uparea'] = $this->md->my_select('tbl_location',array('location_id'=>$data['uplandmark'][0]->parent_id));
        $data['area'] = $this->md->my_select('tbl_location',array('parent_id'=>$data['uparea'][0]->parent_id));
        $data['upcit'] = $this->md->my_select('tbl_location',array('location_id'=>$data['uparea'][0]->parent_id));
        $data['city'] = $this->md->my_select('tbl_location',array('parent_id'=>$data['upcit'][0]->parent_id));
        $data['state'] = $this->md->my_select('tbl_location',array('lable'=>'state'));
        $data['display'] = $this->md->my_query("SELECT st.name as state , ct.name as city, ar.name as area, l.* FROM tbl_location as st , tbl_location as ct , tbl_location as ar, tbl_location as l WHERE st.location_id = ct.parent_id and ct.location_id = ar.parent_id and ar.location_id = l.parent_id and l.lable='landmark'");
        $this->load->view('admin/manage_landmark',$data);
    }
    public function specificationset() 
    {
        $wh['set_id'] = $this->uri->segment(2);
        
        if ($this->input->post('update')) 
        {
            $this->form_validation->set_rules('uptype', 'Update Car Type', 'required', array('required' => 'Car Type Is Required.'));
            $this->form_validation->set_rules('ucompany', 'Update Car Company', 'required', array('required' => 'Car Company Is Required.'));
            $this->form_validation->set_rules('upmodel', 'Update Car Model', 'required', array('required' => 'Car Model Is Required.'));
            $this->form_validation->set_rules('upsetname', 'Update Set Name Model', 'required|regex_match[/^[a-zA-Z, ]+$/]', array('required' => 'Set Name Is Required.'));
            if ($this->form_validation->run() == TRUE) 
            {
                $c = $this->md->my_query("select count(*) as cm from tbl_attribute_set where set_name='".$this->input->post('upsetname')."' AND category_id='".$this->input->post('upmodel')."' AND set_id != '".$this->uri->segment(2)."'")[0]->cm;
                if($c == 0)
                {
                    $udata['category_id'] = $this->input->post('upmodel');
                    $udata['set_name'] = $this->input->post('upsetname');
                    $result = $this->md->my_update("tbl_attribute_set",$udata,$wh);
                    if ($result == 1) 
                    {
                        redirect('Manage-Specification-Set');
                    } 
                    else 
                    {
                        $data['error'] = "Something is wrong.";
                    }
                }
                else
                {
                    $data['err'] = $this->input->post('upsetname')." is already exist.";
                }
            }
        }
        
        $data['upspecification'] = $this->md->my_select('tbl_attribute_set',$wh);
        $data['type'] = $this->md->my_select('tbl_category',array('label'=>'type'));
        $data['upmodel'] = $this->md->my_select('tbl_category',array('category_id'=>$data['upspecification'][0]->category_id));
        $data['upcompany'] = $this->md->my_select('tbl_category',array('category_id'=>$data['upmodel'][0]->parent_id));
        $data['company'] = $this->md->my_select('tbl_category',array('parent_id'=>$data['upcompany'][0]->parent_id));
        $data['model'] = $this->md->my_select('tbl_category',array('parent_id'=>$data['upmodel'][0]->parent_id));
        $data['display'] = $this->md->my_query("SELECT c.category_name as type , com.category_name as company , mo.category_name as model , a.* from tbl_category as c , tbl_category as com , tbl_category as mo ,tbl_attribute_set as a WHERE c.category_id = com.parent_id and com.category_id = mo.parent_id and mo.category_id = a.category_id");
        $this->load->view('admin/manage_specification_set',$data);
    }
    public function specification() 
    {
        $wh['attribute_id'] = $this->uri->segment(2);
        
        if ($this->input->post('update')) 
        {
            $this->form_validation->set_rules('uptype', 'Update Car Type', 'required', array('required' => 'Car Type Is Required.'));
            $this->form_validation->set_rules('ucompany','Update Company Name', 'required', array('required' => 'Company Name Is Required.'));
            $this->form_validation->set_rules('umodel', 'Update Car Model', 'required', array('required' => 'Car Model Is Required.'));
            $this->form_validation->set_rules('uset', 'Update Set Name', 'required', array('required' => 'Set Name Is Required.'));
            $this->form_validation->set_rules('uspecificationname', 'Update Specification Name', 'required|regex_match[/^[a-zA-Z0-9-, ]+$/]', array('required' => 'Specification Name Is Required.','regex_match'=>'Enter Correct Specification Value.'));
            $this->form_validation->set_rules('uspecificationtype', 'Update Specification Type', 'required', array('required' => 'Specification Type Is Required.'));
            
            if($this->input->post('uspecificationtype') == "Selectbox" || $this->input->post('uspecificationtype') == "Checkbox")
            {
                $this->form_validation->set_rules('uspevalue', 'Specification Value', 'required|regex_match[/^[a-zA-Z0-9-, ]+$/]', array('required' => 'Specification Type Is Required','regex_match'=>'Enter Correct Specification Value'));
            }
            if ($this->form_validation->run() == TRUE) 
            {
                $c = $this->md->my_query("select count(*) as cm from tbl_attribute where attribute_name='".$this->input->post('uspecificationname')."' AND attribute_id != '".$this->uri->segment(2)."' AND set_id = '".$this->input->post('uset')."'")[0]->cm;
                if($c == 0)
                {
                    $udata['set_id'] = $this->input->post('uset');
                    $udata['attribute_name'] = $this->input->post('uspecificationname');
                    $udata['attribute_type'] = $this->input->post('uspecificationtype');
                    if($udata['attribute_type'] == "Selectbox" || $udata['attribute_type'] == "Checkbox")
                    {
                        $udata['attribute_value'] = $this->input->post('uspevalue');
                    }
                    else
                    {
                        $udata['attribute_value'] = "";
                    }
                    $result = $this->md->my_update('tbl_attribute',$udata,$wh);
                    if ($result == 1) 
                    {
                        redirect('Manage-Specification');
                    } 
                    else 
                    {
                        $data['error'] = "Something is wrong.";
                    }
                }
                else
                {
                    $data['err'] = $this->input->post('uspecificationname')." is already exist.";
                }
            }
        }
        $data['upspecification'] = $this->md->my_select('tbl_attribute',$wh);
        $data['type'] = $this->md->my_select('tbl_category',array('label'=>'type'));
        $data['upsset'] = $this->md->my_select('tbl_attribute_set',array('set_id'=>$data['upspecification'][0]->set_id));
        $data['upmodel'] = $this->md->my_select('tbl_category',array('category_id'=>$data['upsset'][0]->category_id));
        $data['upcompany'] = $this->md->my_select('tbl_category',array('category_id'=>$data['upmodel'][0]->parent_id));
        $data['company'] = $this->md->my_select('tbl_category',array('parent_id'=>$data['upcompany'][0]->parent_id));
        $data['model'] = $this->md->my_select('tbl_category',array('parent_id'=>$data['upmodel'][0]->parent_id));
        $data['fsetname'] = $this->md->my_select('tbl_attribute_set',array('category_id'=>$data['upsset'][0]->category_id));
        $data['display'] = $this->md->my_query("SELECT t.category_name as dtype , co.category_name as dcompany , mo.category_name as dmodel , aset.set_name as dset , an.* FROM tbl_category as t , tbl_category as co,  tbl_category as mo, tbl_attribute_set as aset , tbl_attribute as an  WHERE t.category_id = co.parent_id AND co.category_id = mo.parent_id AND mo.category_id = aset.category_id AND aset.set_id = an.set_id");
        $this->load->view('admin/manage_specification',$data);
    }
}