<?php

class Carmela extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        $data['']='';
        if($this->input->post('sumbit'))
        {
            $data = $this->md->my_query("select * from tbl_carmela where email='".$this->input->post('emaill')."'");
            $c = count($data);
            if($c == 1)
            {
                $ops = $this->encryption->decrypt($data[0]->password);
                $ps = $this->input->post('pass');
                if($ops == $ps)
                {
                    if($this->input->post('rememberme'))
                    {
                        $second = 60 * 60 * 24 * 365;
                        set_cookie('emaill',$data[0]->email,$second);
                        set_cookie('pass',$data[0]->password,$second);
                    }
                    else
                    {
                        if(get_cookie('emaill') != "")
                        {
                            delete_cookie('emaill');
                            delete_cookie('pass');
                        }
                    }
                    $this->session->set_userdata('carmela',$data[0]->carmela_id);
                    $this->session->set_userdata('lastlogin',date('Y-m-d h:i:s'));
                    
                    redirect('Carmela-Home');
                }
                else
                {
                    $data['error'] = "Invalid Login. Try Again. ";
                }
            }
            else
            {
                $data['error'] = "Invalid Login. Try Again. ";
            }
        }
        
        
        if($this->input->post('next'))
        {
            $this->form_validation->set_rules('companyname', 'a', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Carmela Name Is Required.','regex_match' => 'Please Enter Valid Carmela Name.'));
            $this->form_validation->set_rules('email', 'b', 'required|valid_email|is_unique[tbl_carmela.email]', array('required' => 'Email Is Required.','valid_email'=>'Please Enter Valid Email.','is_unique'=>'Email Is Already Exist.'));
            $this->form_validation->set_rules('contact', 'c', 'required|regex_match[/^[0-9]{10}$/]', array('required' => 'Contact Is Required.','regex_match' => 'Please Enter Valid Contact.'));
            $this->form_validation->set_rules('password', 'd', 'required|min_length[8]|max_length[16]', array('required' => 'Password Is Required.','min_length'=>'Password atleast 8 Character.','max_length'=>'Password Maximum 16 Character.'));
            $this->form_validation->set_rules('rpassword', 'f', 'matches[password]', array('matches' => 'Retype Password Is Not Match.'));
            if($this->form_validation->run())
            {
                $this->session->set_userdata('companyname',$this->input->post('companyname'));
                $this->session->set_userdata('email',$this->input->post('email'));
                $this->session->set_userdata('contact',$this->input->post('contact'));
                $this->session->set_userdata('password',$this->input->post('password'));
                $this->session->set_userdata('rpassword',$this->input->post('rpassword'));
                
                redirect('Carmela-Registration-2');
            }
        }
        $this->load->view("carmela/index",$data);
    }
    public function carmelareg()
    {
        if($this->session->userdata('companyname') != "")
        {
            if($this->input->post('next'))
            {
                $this->form_validation->set_rules('state', 'a', 'required', array('required' => 'State Name Is Required.'));
                $this->form_validation->set_rules('city', 'b', 'required', array('required' => 'City Name Is Required.'));
                $this->form_validation->set_rules('area', 'c', 'required', array('required' => 'Area Name Is Required.'));
                $this->form_validation->set_rules('landmark', 'd', 'required', array('required' => 'Landmark Name Is Required.'));
                $this->form_validation->set_rules('address', 'f', 'required', array('required' => 'Address Is Required.'));
                $this->form_validation->set_rules('pin', 'g', 'required|regex_match[/^[0-9]{6}$/]', array('required' => 'Pin Code Is Required.','regex_match'=>'Please Enter Valid Pin Code.'));

                if($this->form_validation->run())
                {
                    $this->session->set_userdata('state',$this->input->post('state'));
                    $this->session->set_userdata('city',$this->input->post('city'));
                    $this->session->set_userdata('area',$this->input->post('area'));
                    $this->session->set_userdata('landmark',$this->input->post('landmark'));
                    $this->session->set_userdata('address',$this->input->post('address'));
                    $this->session->set_userdata('pin',$this->input->post('pin'));

                    redirect('Carmela-Registration-3');
                }
            }
            $dt['statedata'] = $this->md->my_select("tbl_location",array('lable'=>'state'));
            $dt['city'] = $this->md->my_select('tbl_location',array('parent_id'=>$this->session->userdata('state')));
            $dt['area'] = $this->md->my_select('tbl_location',array('parent_id'=>$this->session->userdata('city')));
            $dt['landmark'] = $this->md->my_select('tbl_location',array('parent_id'=>$this->session->userdata('area')));
            $this->load->view("carmela/carmela_registration_2",$dt);
        }
        else
        {
            redirect('Carmela-Registration-1');
        }
    }
    public function carmelareg3()
    {
        if($this->session->userdata('companyname') != "" && $this->session->userdata('state') != "" )
        {
            $msg['']='';
            if($this->input->post('next'))
            {
                $this->form_validation->set_rules('name', 'a', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Name Is Required.','regex_match' => 'Please Enter Valid Owner Name.'));
                $this->form_validation->set_rules('contactno', 'b', 'required|regex_match[/^[0-9]{10}$/]', array('required' => 'Contact No Is Required.','regex_match' => 'Please Enter Valid Contact No.'));
                
                if($this->form_validation->run())
                {
                    $config['upload_path']          = './carmela/images/logo/';
                    $config['allowed_types']        = 'jpeg|jpg';
                    $config['max_size']             = 2048;
                    $mx = $this->md->my_query('SELECT MAX(carmela_id) as mx FROM tbl_carmela')[0]->mx;
                    if($mx != "")
                    {
                        $config['file_name'] = "logo_".$mx;
                    }
                    else
                    {
                        $config['file_name'] = "logo_0";
                    }
                    $result = $this->md->my_file($config,'logo');
                    if(in_array('file_name',$result))
                    {
                        $config1['upload_path']          = './carmela/images/card/';
                        $config1['allowed_types']        = 'jpeg|jpg';
                        $config1['max_size']             = 2048;
                        $m = $this->md->my_query('SELECT MAX(gallery_id) as m FROM tbl_carmela_gallery')[0]->m;
                        if($m != "")
                        {
                            $config1['file_name'] = "card_".$m;
                        }
                        else
                        {
                            $config1['file_name'] = "card_0";
                        }
                        $config1['overwrite']=TRUE;
                        $result1 = $this->md->my_file($config1,'card');
                        if(in_array('file_name',$result1))
                        {
                            
                                $dbpath = "carmela/images/logo/".$result['file_name'];
                                $dbpath1 = "carmela/images/card/".$result1['file_name'];
                                $data['name'] = $this->session->userdata('companyname');
                                $data['email'] = $this->session->userdata('email');
                                $data['password'] = $this->encryption->encrypt($this->session->userdata('password'));
                                $data['contact_no'] = $this->session->userdata('contact');
                                $data['location_id'] = $this->session->userdata('landmark');
                                $data['address'] = $this->session->userdata('address');
                                $data['last_login'] = date('Y-m-d h:i:s');
                                $data['profile'] = $dbpath;
                                $data['status'] = 0;
                                $data['owner_name'] = $this->input->post('name');
                                $data['owner_contact_no'] = $this->input->post('contactno');
                                $data['pincode'] = $this->session->userdata('pin');
                                $data['join_date'] = date('y/m/d');
                                $dt['carmela_id']=($mx+1);
                                $dt['photo']=$dbpath1;
                                $dt['type']="visiting_card";
                                $result = $this->md->my_insert('tbl_carmela',$data);
                                $result1 = $this->md->my_insert('tbl_carmela_gallery',$dt);
                                if($result == 1)
                                {
                                        $data =  $this->md->my_select('tbl_carmela',array('email'=>$this->session->userdata('email')));
                                        $this->session->unset_userdata('companyname');
                                        $this->session->unset_userdata('email');
                                        $this->session->unset_userdata('contact');
                                        $this->session->unset_userdata('password');
                                        $this->session->unset_userdata('rpassword');
                                        $this->session->unset_userdata('pan');
                                        $this->session->unset_userdata('gst');
                                        $this->session->unset_userdata('state');
                                        $this->session->unset_userdata('city');
                                        $this->session->unset_userdata('area');
                                        $this->session->unset_userdata('landmark');
                                        $this->session->unset_userdata('address');
                                        $this->session->unset_userdata('pin');
                                        $this->session->set_userdata('carmela',$data[0]->carmela_id);
                                        $this->session->set_userdata('lastlogin',date('d-m-y h:i:s'));
                                        
                                        redirect('Carmela-Home');
                                }
                           }
                           else
                           {
                                $msg['error'] = $result1[0];
                           }
                        }
                        else
                        {
                            $msg['error'] = $result[0];
                        }
                }
            }   
        }
        else
        {
            redirect('Carmela-Registration-1');
        }
        $this->load->view("carmela/carmela_registration_3",$msg);
    }
    public function logout() 
    {
        $this->security();
        $wh['carmela_id'] = $this->session->userdata('carmela');
        $data['last_login'] = $this->session->userdata('lastlogin');
        $this->md->my_update('tbl_carmela',$data,$wh);
        $this->session->unset_userdata('carmela');
        $this->session->unset_userdata('lastlogin');
        redirect('Carmela-Registration-1');
    }
    public function sellerhome()
    {
        $this->security();
        $this->session->set_userdata('seller','dashboard');
        $this->load->view("carmela/carmela_home");
    }
    public function profile()
    {
        $this->security();
        $this->session->set_userdata('seller','profile');
        $this->load->view("carmela/myprofile");
    }
    public function uprofile()
    {
        $this->security();
        
        $wh['carmela_id'] = $this->session->userdata('carmela');
        
        if($this->input->post('save'))
        {
            
            $this->form_validation->set_rules('companyname', 'a', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Carmela Name Is Required.','regex_match' => 'Please Enter Valid Carmela Name.'));
            $this->form_validation->set_rules('email', 'b', 'required|valid_email', array('required' => 'Email Is Required.','valid_email'=>'Please Enter Valid Email.'));
            $this->form_validation->set_rules('contact', 'c', 'required|regex_match[/^[0-9]{10}$/]', array('required' => 'Contact Is Required.','regex_match' => 'Please Enter Valid Contact.'));   
            $this->form_validation->set_rules('ustate', 'a', 'required', array('required' => 'State Name Is Required.'));
            $this->form_validation->set_rules('ucity', 'b', 'required', array('required' => 'City Name Is Required.'));
            $this->form_validation->set_rules('uarea', 'c', 'required', array('required' => 'Area Name Is Required.'));
            $this->form_validation->set_rules('ulandmark', 'd', 'required', array('required' => 'Landmark Name Is Required.'));
            $this->form_validation->set_rules('address', 'f', 'required', array('required' => 'Address Is Required.'));
            $this->form_validation->set_rules('pin', 'g', 'required|regex_match[/^[0-9]{6}$/]', array('required' => 'Pin Code Is Required.','regex_match'=>'Please Enter Valid Pin Code.'));
            $this->form_validation->set_rules('owner', 'h', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Name Is Required.','regex_match' => 'Please Enter Valid Owner Name.'));
            $this->form_validation->set_rules('ocontact', 'i', 'required|regex_match[/^[0-9]{10}$/]', array('required' => 'Owner Contact Is Required.','regex_match' => 'Please Enter Valid Contact No.'));
            if($this->form_validation->run() == TRUE)
            {
                $c = $this->md->my_query("select count(*) as cm from tbl_carmela where email = '".$this->input->post('email')."' AND carmela_id != '".$wh['carmela_id']."'")[0]->cm;
                if($c == 0)
                {
                    if($_FILES['cover']['name'] != "")
                    {
                        $config['upload_path']          = './carmela/images/coverphoto/';
                        $config['allowed_types']        = 'jpeg|jpg';
                        $config['max_size']             = 2048;
                        $config['file_name'] = "cover_".($this->session->userdata('carmela')-1);
                        $config['overwrite']=TRUE;

                        $result = $this->md->my_file($config,'cover');
                        if(in_array('file_name',$result))
                        {
                            $dbpath = "carmela/images/coverphoto/".$result['file_name'];
                            $udata['cover_pic'] = $dbpath;
                        }
                        else
                        {
                            $data['err'] = $result[0];
                        }
                    }
                    if($_FILES['logo']['name'] != "")
                    {
                        
                        $config1['upload_path']          = './carmela/images/coverphoto/';
                        $config1['allowed_types']        = 'jpeg|jpg';
                        $config1['max_size']             = 2048;
                        $config1['file_name'] = "logo_".($this->session->userdata('carmela')-1);
                        $config1['overwrite']=TRUE;

                        $result1 = $this->md->my_file($config1,'logo');
                        if(in_array('file_name',$result1))
                        {
                            $dbpath1 = "carmela/images/coverphoto/".$result1['file_name'];
                            $udata['profile'] = $dbpath1;
                        }
                        else
                        {
                            $data['err'] = $result1[0];
                        }
                    }
                    if(!isset($data['err']))
                    {
                        $udata['name'] = $this->input->post('companyname');
                        $udata['email'] = $this->input->post('email');
                        $udata['contact_no'] = $this->input->post('contact');
                        $udata['location_id'] = $this->input->post('ulandmark');
                        $udata['address'] = $this->input->post('address');
                        $udata['pincode'] = $this->input->post('pin');
                        $udata['owner_name'] = $this->input->post('owner');
                        $udata['owner_contact_no'] = $this->input->post('ocontact');
                        $r = $this->md->my_update('tbl_carmela',$udata,$wh);
                        if ($r == 1) 
                        {
                            redirect('My-Profile');
                        }
                    }
                }
                else
                {
                    $data['error'] = "Email Is Already Exist.";
                }
            }
        }
        $data['uprofile'] = $this->md->my_select('tbl_carmela',$wh);
        $data['ulandmark'] = $this->md->my_select('tbl_location',array('location_id'=>$data['uprofile'][0]->location_id)); 
        $data['landmark'] = $this->md->my_select('tbl_location',array('parent_id'=>$data['ulandmark'][0]->parent_id)); 
        $data['uarea'] = $this->md->my_select("tbl_location",array('location_id'=>$data['ulandmark'][0]->parent_id));
        $data['area'] = $this->md->my_select("tbl_location",array('parent_id'=>$data['uarea'][0]->parent_id));
        $data['ucity'] = $this->md->my_select("tbl_location",array('location_id'=>$data['uarea'][0]->parent_id));
        $data['city'] = $this->md->my_select("tbl_location",array('parent_id'=>$data['ucity'][0]->parent_id));
        $data['ustate'] = $this->md->my_select("tbl_location",array('lable'=>'state'));
        $this->load->view('carmela/update_profile',$data);
    }
    public function cpassword()
    {
        $this->security();
        $data[''] = '';
        if($this->input->post('editpass'))
        {
           if($this->input->post('cpassword') != "")
           {
               $data = $this->md->my_select('tbl_carmela',array('carmela_id'=>$this->session->userdata('carmela')));
               
               $ops = $this->encryption->decrypt($data[0]->password);
               
               $ps = $this->input->post('cpassword');
               
               if( $ps == $ops)
               {
                   $this->form_validation->set_rules('npassword', 'New Password', 'required|min_length[8]|max_length[16]', array('required' => 'New Password Is Required.','min_length'=>'New Password atleast 8 Character.','max_length'=>'New Password Maximum 16 Character.'));
                   $this->form_validation->set_rules('rpassword', 'Retype Password', 'matches[npassword]', array('matches' => 'Retype Password Is Not Match.'));
               
                   if($this->form_validation->run() == TRUE)
                   {
                       $wh['carmela_id'] = $this->session->userdata('carmela');
                       $data1['password'] = $this->encryption->encrypt($this->input->post('npassword'));
                       $result = $this->md->my_update('tbl_carmela',$data1,$wh);
                       
                       if($result == 1)
                       {
                            $this->session->unset_userdata('carmela');
                            $this->session->unset_userdata('lastlogin');
                            redirect('Carmela-Registration-1');
                       }
                   }
               }
               else
               {
                   $data['error'] = "Please Enter Valid Password.";
               }
           }
           else
           {
               $data['error'] = "Please Enter Current Password.";
           }
        }
        $this->load->view("carmela/change_pass",$data);
    }
    public function gallery()
    {
        $this->security();
        $this->session->set_userdata('seller','gallery');
        $data['']='';
        if($this->input->post('add'))
        {
            if($_FILES['myfiles']['name'][0] != "")
            {
                $cc=0;
                $c =  count($_FILES['myfiles']['name']);
                for($i=0;$i<$c;$i++)
                {
                    $_FILES['single']['name'] = $_FILES['myfiles']['name'][$i];
                    $_FILES['single']['type'] = $_FILES['myfiles']['type'][$i];
                    $_FILES['single']['error'] = $_FILES['myfiles']['error'][$i];
                    $_FILES['single']['size'] = $_FILES['myfiles']['size'][$i];
                    $_FILES['single']['tmp_name'] = $_FILES['myfiles']['tmp_name'][$i];
                    
                    $config['upload_path']          = './carmela/images/carmela/';
                    $config['allowed_types']        = 'jpeg|jpg';
                    $config['max_size']             = 2048;
                    $config['file_exe_tolower'] = TRUE;
                    
                    $mx = $this->md->my_query("select MAX(gallery_id) as mx from tbl_carmela_gallery")[0]->mx;
                    
                    if($mx != "")
                    {
                        $config['file_name'] = "carmela_".$this->session->userdata('carmela')."_".$mx."_".$i;

                    }
                    else
                    {
                        $config['file_name'] = "carmela_".$this->session->userdata('carmela')."_0_".$i;
                    }

                    $result = $this->md->my_file($config,'single');
                    
                    if(in_array('file_name',$result))
                    {
                        $multi['photo'] ="carmela/images/carmela/".$this->upload->data('file_name');
                        $multi['type'] = "carmela";
                        $multi['carmela_id'] = $this->session->userdata('carmela');
                        $rr = $this->md->my_insert('tbl_carmela_gallery',$multi);
                        if($rr == 1)
                        {
                            $cc = 1;
                        }
                    }
                    else
                    {
                         $data['imageerror'][$i] = $result[0];
                    }
                }
                if($cc == 1)
                {
                    redirect("My-Gallery");
                }
            }
            else
            {
                $data['imageselect'] = "Please Select Image";
            }
            
        }
        if($this->input->post('save'))
        {
            $config['upload_path']          = './carmela/images/card/';
            $config['allowed_types']        = 'jpeg|jpg';
            $config['max_size']             = 2048;
            $mx = $this->md->my_select('tbl_carmela_gallery',array('carmela_id'=>$this->session->userdata('carmela'),'type'=>"visiting_card"));
            $cc = $mx[0]->gallery_id - 1;
            $config['file_name'] = "card_".$cc;
            $config['overwrite']=TRUE;
            $result = $this->md->my_file($config,'myfile');
            if(in_array('file_name',$result))
            {
                $dbpath = "carmela/images/card/".$result['file_name'];
                $dt['photo'] = $dbpath;
                $r = $this->md->my_update('tbl_carmela_gallery',$dt,array('gallery_id'=>$mx[0]->gallery_id));
                if($r == 1)
                {
                    $data['success'] = "Upload Successfully.";
                    $this->cache->clean();
                }
            }
            else
            {
                $data['err'] = $result[0];
            }
        }
        
        $data['visiting'] = $this->md->my_select('tbl_carmela_gallery',array('carmela_id'=>$this->session->userdata('carmela'),'type'=>'visiting_card'));
        $data['carmela'] = $this->md->my_select('tbl_carmela_gallery',array('carmela_id'=>$this->session->userdata('carmela'),'type'=>'carmela'));
        $this->load->view("carmela/carmela_gallery",$data);
    }
    public function addcar()
    {
        $this->security();
        $this->session->set_userdata('seller','car');
        $this->status();
        
        if($this->input->post('add'))
        {
            $this->form_validation->set_rules('carname', 'Car Name', 'required|regex_match[/^[a-zA-Z0-9. ]+$/]', array('required' => 'Car Name Is Required.','regex_match' => 'Please Enter Valid Car Name.'));
            $this->form_validation->set_rules('type_id', 'Car Type', 'required', array('required' => 'Car Type Is Required.'));
            $this->form_validation->set_rules('company_id', 'Car Company', 'required', array('required' => 'Car Company Is Required.'));
            $this->form_validation->set_rules('model_id', 'Car Model', 'required', array('required' => 'Car Model Is Required.'));
            $this->form_validation->set_rules('submodel_id', 'Sub Model', 'required', array('required' => 'Car Sub Model Is Required.'));
            $this->form_validation->set_rules('price', 'Price', 'required|regex_match[/^[0-9A-Za-z. ]+$/]', array('required' => 'Price Is Required.','regex_match'=>'Please Enter Correct Price.'));
            $this->form_validation->set_rules('tag', 'Tag|regex_match[/^[#a-zA-Z0-9,-]+$/]', 'required', array('required' => 'Tag Is Required.','regex_match'=>'Please Enter Valid Tag.'));
            $this->form_validation->set_rules('description', 'Description', 'required', array('required' => 'Car Description Is Required.'));

            if ($this->form_validation->run() == TRUE) 
            {
                $data['carmela_id'] = $this->session->userdata('carmela');
                $data['carname'] = $this->input->post('carname');
                $data['type_id'] = $this->input->post('type_id');
                $data['company_id'] = $this->input->post('company_id');
                $data['model_id'] = $this->input->post('model_id');
                $data['submodel_id'] = $this->input->post('submodel_id');
                $data['price'] = $this->input->post('price');
                $data['description'] = $this->input->post('description');
                $data['status'] = 0;
                $data['offer_id'] = 0;
                
                $r = $this->md->my_insert('tbl_car_detail',$data);
                if($r == 1)
                {
                    $tagdata = $this->md->my_query("select MAX(car_id) as mx from tbl_car_detail where carmela_id = '".$this->session->userdata('carmela')."'")[0]->mx;
                    $tag['car_id'] = $tagdata;
                    $tag['tag'] = $this->input->post('tag');
                    $result = $this->md->my_insert('tbl_tag',$tag);
                    if($result == 1)
                    {
                        $cc = 0;
                        foreach ($this->input->post() as $k=>$value)
                        {
                            $cc++;
                            if($cc > 8)
                            {
                                $att[$k] = $value;
                            }
                        }
                        array_pop($att);
                        $rr=0;
                        foreach($att as $key=>$valu)
                        {
                           if($valu != "")
                           {
                                $valdata['attribute_id'] = $key;
                                $valdata['car_id'] = $tagdata;
                                
                                if(is_array($valu))
                                {
                                   $valdata['value'] = implode(",", $valu);
                                }
                                else
                                {
                                    $valdata['value'] = $valu;
                                }
                                $rr = $this->md->my_insert('tbl_attribute_value',$valdata);
                                $finalresult = 1;
                           }
                        }
                        if($rr == 1)
                        {
                            if($finalresult == 1)
                            {
                                $this->session->set_userdata('lastcar',$tagdata);
                                redirect('Add-Car-Image');
                            }
                        }
                    }
                }
                else
                {
                    $data['error'] = "Somthing Is Wrong";
                }
            }
        }
        
        $data['cartype'] = $this->md->my_select("tbl_category",array('label'=>'type'));
        $this->load->view("carmela/add_new_car",$data);
    }
    public function carmelaoffer() 
    {
    $this->security();
    $this->status();
    $this->session->set_userdata('seller','offer');
    if($this->input->post("offer"))
    {
            $this->form_validation->set_rules('offername', 'a', 'required', array('required' => 'Offer Name Is Required.'));
            $this->form_validation->set_rules('rate', 'b', 'required|regex_match[/^[0-9]+$/]', array('required' => 'Offer Rate Is Required.','regex_match' => 'Please Enter Valid Offer Rate.'));
            $this->form_validation->set_rules('max', 'c', 'required|regex_match[/^[0-9]+$/]', array('required' => 'Maximum Price Is Required.','regex_match' => 'Please Enter Valid Maximum Price.'));
            $this->form_validation->set_rules('min', 'd', 'required|regex_match[/^[0-9]+$/]', array('required' => 'Minimum Price Is Required.','regex_match' => 'Please Enter Valid Car Minimum Price.'));
            $this->form_validation->set_rules('mindate', 'e', 'required', array('required' => 'Start date Is Required.'));
            $this->form_validation->set_rules('maxdate', 'f', 'required', array('required' => 'End Date Is Required.'));
            
            if ($this->form_validation->run() == TRUE) 
            {
                if($this->input->post('type_id') != "" && $this->input->post('company_id') != "" && $this->input->post('model_id') != "")
                {
                    $d['category_id'] = $this->input->post('model_id');
                    $d['lable'] = "model";
                }
                elseif($this->input->post('type_id') != "" && $this->input->post('company_id') != "" && $this->input->post('model_id') == "")
                {
                    $d['category_id'] = $this->input->post('company_id');
                    $d['lable'] = "company";
                }
                elseif($this->input->post('type_id') != "" && $this->input->post('company_id') == "" && $this->input->post('model_id') == "")
                {
                    $d['category_id'] = $this->input->post('type_id');
                    $d['lable'] = "type";
                }
                else
                {
                    $d['category_id'] = 0;
                    $d['lable'] = "all";
                }
                
                $c = $this->md->my_query("select count(*) as cn from tbl_offer where offer_name = '".$this->input->post('offername')."' and category_id = '".$d['category_id']."'")[0]->cn;
                
                if($c == 0)
                {
                    $d['offer_name'] = $this->input->post('offername');
                    $d['offer_rate'] = $this->input->post('rate');
                    $d['min_price'] = $this->input->post('min');
                    $d['max_price'] = $this->input->post('max');
                    $d['start_date'] = date('Y-m-d',strtotime($this->input->post('mindate')));
                    $d['end_date'] = date('Y-m-d',strtotime($this->input->post('maxdate')));
                    $d['status'] = 0;
                    
                    $result = $this->md->my_insert('tbl_offer',$d);
                    
                    if($result == 1)
                    {
                        $data['success'] = "Offer Added Successfullly.";
                    }
                    else
                    {
                        $data['error'] = "Something Is Wrong.";
                    }
                }
                else
                {
                    $data['error'] = "Offer Is Already Exist.";
                }
            }
    }
    $data['cartype'] = $this->md->my_query("select c.* , cd.* from tbl_car_detail as cd , tbl_category as c where cd.type_id = c.category_id and cd.carmela_id = '".$this->session->userdata("carmela")."' group by c.category_id");
    $data['offer'] = $this->md->my_query("select * from tbl_offer");
    $this->load->view("carmela/offer",$data);
    }
    public function addcarimage()
    {
        $this->security();
        $this->session->set_userdata('seller','car');
        $this->status();
        $dt['']="";
        if($this->input->post('finish'))
        {
            if($this->session->userdata('lastcar') != "")
            {
                $cc = $this->md->my_query("select count(*) as c from tbl_car_image where car_id = '".$this->session->userdata('lastcar')."'")[0]->c;
                
                if($cc > 0)
                {
                    $this->session->unset_userdata('lastcar');
                    redirect('Add-Car');
                }
                else
                {
                    $dt['imgerror'] = "Car Required Atleast One Image";
                }
            }
            else
            {
                redirect('Add-Car');
            }
        }
        
        if($this->input->post('addimg'))
        {
            $this->form_validation->set_rules('carimagetype', 'Car Image Type', 'required', array('required' => 'Car Image Type Is Required.'));
            
            if($this->session->userdata('lastcar')!="")
            {
                 $this->form_validation->set_rules('carname', 'Car Type', 'required', array('required' => 'Car Name Is Required.'));
                 
            }
            if ($this->form_validation->run() == TRUE) 
            {
                /* file upload */
                if($_FILES['upload']['name'][0] != "")
                {
                    if($this->session->userdata('lastcar') == "")
                    {
                        $data['car_id'] = $this->input->post('carname');
                    }
                    else
                    {
                        $data['car_id']=$this->session->userdata('lastcar');
                    }
                    $c =  count($_FILES['upload']['name']);
                    for($i=0;$i<$c;$i++)
                    {
                        $_FILES['single']['name'] = $_FILES['upload']['name'][$i];
                        $_FILES['single']['type'] = $_FILES['upload']['type'][$i];
                        $_FILES['single']['error'] = $_FILES['upload']['error'][$i];
                        $_FILES['single']['size'] = $_FILES['upload']['size'][$i];
                        $_FILES['single']['tmp_name'] = $_FILES['upload']['tmp_name'][$i];

                        $config['upload_path']          = './carmela/images/carimage/';
                        $config['allowed_types']        = 'jpeg|jpg';
                        $config['max_size']             = 2048;
                        $config['file_exe_tolower'] = TRUE;
                        $mx = $this->md->my_query("select MAX(image_id) as mx from tbl_car_image")[0]->mx;
                        
                        if($mx != "")
                        {
                            $config['file_name'] = "car_".$data['car_id']."_".$mx."_".$i;
                            
                        }
                        else
                        {
                            $config['file_name'] = "car_".$data['car_id']."_0_".$i;
                        }

                        $result = $this->md->my_file($config,'single');
                        if(in_array('file_name',$result))
                        {
                            $data['image_type'] = $this->input->post('carimagetype');
                            $data['path'] ="carmela/images/carimage/".$this->upload->data('file_name');
                            
                            $r = $this->md->my_insert('tbl_car_image',$data);
                            if($r == 1)
                            {
                                $dt['imgerr'][$i] = "Car Images Upload Successfully.";
                            }
                        }
                        else
                        {
                             $dt['imgerrors'][$i] = $result[0];
                        }
                    }
                }
                else
                {
                    $dt['imgselect'] = "Please Select Image";
                }
            }
        }
        $this->load->view("carmela/addnewcar_image",$dt);
    }
    public function car()
    {
        $this->security();
        $this->status();
        $this->session->set_userdata('seller','car');
        $data['dis'] = $this->md->my_select('tbl_car_detail',array('carmela_id'=>$this->session->userdata('carmela')));
        
        $this->load->view("carmela/view_all_car",$data);
    }
    public function cardetail()
    {
        $this->security();
        $this->status();
        $this->session->set_userdata('seller','car');
        $id = $this->uri->segment(2);
        
//      $data['getmodel'] = $this->md->my_query('SELECT c.* , a.* , aa.* , av.* FROM tbl_car_detail as c , tbl_attribute_set as a , tbl_attribute as aa , tbl_attribute_value as av WHERE c.model_id = a.category_id AND a.set_id = aa.set_id AND aa.attribute_id = av.attribute_id AND c.car_id = "'.$this->uri->segment(2).'"');
        $data['display'] = $this->md->my_query("SELECT d.* , i.* FROM tbl_car_detail AS d , tbl_car_image AS i WHERE d.car_id = i.car_id AND i.car_id = '".$id."'");
        $this->load->view("carmela/car_details",$data);
    }
    public function carreview()
    {
        $this->security();
        $this->status();  
        $this->session->set_userdata('seller','carreview');
        $data['carreview'] = $this->md->my_query("select c.* , cd.* , r.* from tbl_car_review as c , tbl_car_detail as cd , tbl_registration as r where c.car_id = cd.car_id and c.registration_id = r.registration_id and c.status = 1 and c.del_status = 0 and cd.carmela_id = '".$this->session->userdata('carmela')."'");
        $this->load->view("carmela/car_review",$data);
    }
    public function testdrive()
    {
        $this->security();
        $this->status();  
        $this->session->set_userdata('seller','cartest');
        $data['test'] = $this->md->my_query("SELECT r.* , t.* FROM tbl_registration AS r , tbl_test_drive AS t WHERE t.register_id = r.registration_id AND t.carmela_id = '".$this->session->userdata('carmela')."'");
        $this->load->view("carmela/car_test_drive",$data);
    }
    public function carmelareview()
    {
        $this->security();
        $this->status();
        $this->session->set_userdata('seller','carmelareview');
        $data['carmelareview'] = $this->md->my_query('select cr.* , r.registration_id , r.name , r.profile_pic from tbl_carmela_review as cr , tbl_registration as r where cr.carmela_id = "'.$this->session->userdata('carmela').'" and cr.register_id = r.registration_id and cr.status = 1 and cr.del_status = 0');
        $this->load->view("carmela/carmela_review",$data);
    }
    public function mydemo()
    {
        $this->security();
        $this->status();
        $this->load->view("carmela/demo");
    }
    public function follower()
    {
        $this->security();
        $this->status();
        $this->session->set_userdata('seller','follow');
        $data['follow'] = $this->md->my_query("SELECT f.* , c.carmela_id , r.name , r.email , r.profile_pic FROM tbl_follow AS f , tbl_carmela AS c , tbl_registration AS r WHERE f.carmela_id = c.carmela_id AND f.register_id = r.registration_id and c.carmela_id = '".$this->session->userdata('carmela')."'");
        $this->load->view("carmela/my_follow",$data);
    }
    public function delete()
    {
        $this->security();
        $action = $this->uri->segment(2);
        $id = $this->uri->segment(3);
        if($action == 'car')
        {
            $wh['gallery_id'] = $id;
            $data = $this->md->my_select('tbl_carmela_gallery',array('type'=>"carmela",'gallery_id'=>$id));
            unlink("./".$data[0]->photo);
            $del = $this->md->my_delete('tbl_carmela_gallery',$wh);
            redirect('My-Gallery');
        }
     
    }
    public function ucar() 
    {
         $this->security();
         $data['']='';
         $wh['gallery_id'] = $this->uri->segment(2);
         if($this->input->post('upd'))
         {
            $config['upload_path']          = './carmela/images/carmela/';
            $config['allowed_types']        = 'jpeg|jpg';
            $config['max_size']             = 2048;
            $mx = $this->md->my_query("select gallery_id from tbl_carmela_gallery where gallery_id = '".$this->uri->segment(2)."'");
            $c = $mx[0]->gallery_id - 1;
            $config['file_name'] = "car_".$c;
            $config['overwrite']=TRUE;
            $result = $this->md->my_file($config,'myfile2');
            if(in_array('file_name',$result))
            {
                $dbpath = "carmela/images/carmela/".$result['file_name'];
                $dt['photo'] = $dbpath;
                $r = $this->md->my_update('tbl_carmela_gallery',$dt,$wh);
                if($r == 1)
                {
                    redirect('My-Gallery');
                    $this->cache->clean();
                }
            }
            else
            {
                $data['uerr'] = $result[0];
            }
         }
         $data['ucarmela'] = $this->md->my_select('tbl_carmela_gallery',$wh);
         $data['visiting'] = $this->md->my_select('tbl_carmela_gallery',array('carmela_id'=>$this->session->userdata('carmela'),'type'=>'visiting_card'));
         $data['carmela']  = $this->md->my_select('tbl_carmela_gallery',array('carmela_id'=>$this->session->userdata('carmela'),'type'=>'carmela'));
         $this->load->view('carmela/carmela_gallery',$data);
    }
    public function security() 
    {
      if($this->session->userdata('carmela') == "")
      {
          redirect('Carmela-Registration-1');
      }
    }
    public function status() 
    {
        $data = $this->md->my_select('tbl_carmela',array('carmela_id'=>$this->session->userdata('carmela')))[0]->status;
        if($data != 1)
        {
            redirect('Carmela-Home');
        }
    }
}
?>
