<?php

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('userid') == "")
        {
            redirect('Login');
        }
    }
    public function logout() 
    {
        $this->md->my_update('tbl_registration',array('last_login'=>$this->session->userdata('userlastlogin')),array('registration_id'=>$this->session->userdata('userid')));
        $this->session->unset_userdata('userid');
        $this->session->unset_userdata('userlastlogin');
        redirect('Login');
    }
    public function index()
    {
        $this->session->set_userdata('user','home');
        $this->load->view("user/member_home");
    }
    public function profile()
    {
        $this->session->set_userdata('user','profile');
        $data['user'] = $this->md->my_select('tbl_registration',array('registration_id'=>$this->session->userdata('userid')));
        $this->load->view("user/myprofile",$data);
    }
    public function wishlist()
    {
        $this->session->set_userdata('user','wish');
        $data['wish'] = $this->md->my_select('tbl_wishlist',array('register_id'=>$this->session->userdata('userid')));
        $this->load->view("user/wishlist",$data);
    }
    public function review()
    {
        $this->session->set_userdata('user','review');
        $data['review'] = $this->md->my_select('tbl_car_review',array('registration_id'=>$this->session->userdata('userid')));
        $this->load->view("user/my_review",$data);
    }
    public function carmelareview()
    {
        $this->session->set_userdata('user','carmr');
        $data['carmelareview'] = $this->md->my_select('tbl_carmela_review',array('register_id'=>$this->session->userdata('userid')));
        $this->load->view("user/carmela_review",$data);
    }
    public function testdrive()
    {
        $this->session->set_userdata('user','test');
        $data['usertest'] = $this->md->my_select('tbl_test_drive',array('register_id'=>$this->session->userdata('userid')));
        $this->load->view("user/test_drive",$data);
    }
    public function bill()
    {
        $data['userbill'] = $this->md->my_query("select b.* , s.* , sp.* , us.booking_id , us.position_id , us.status as user from tbl_booking as b , tbl_service as s , tbl_service_position as sp , tbl_user_service as us where us.booking_id = '".$this->uri->segment(2)."' and us.booking_id = b.booking_id and b.registration_id = '".$this->session->userdata("userid")."' and us.position_id = sp.position_id and sp.service_id = s.service_id");
        $this->load->view("user/my_bill",$data);
    }
    public function viewbill()
    {
        $this->session->set_userdata('user','viewb');
        $this->load->view("user/view_bill");
    }
    public function payment()
    {
        if($this->input->post('select'))
        {
            $amount = $this->md->my_query("select b.* , s.* , sp.* , us.booking_id , us.position_id , us.status as user from tbl_booking as b , tbl_service as s , tbl_service_position as sp , tbl_user_service as us where us.booking_id = '".$this->uri->segment(2)."' and us.booking_id = b.booking_id and b.registration_id = '".$this->session->userdata("userid")."' and us.position_id = sp.position_id and sp.service_id = s.service_id");
            $total=0;
            foreach($amount as $val)
            {
                $total += $val->price;
            }
            $this->form_validation->set_rules('payment', 'payment', 'required', array('required' => 'Please Select Payment Option.'));
            
            if($this->form_validation->run() == TRUE)
            {
                $data['registration_id'] = $this->session->userdata('userid');
                $data['booking_id'] = $this->uri->segment(2);
                $data['date'] = date('Y-m-d h:i:s');
                $data['payment_type'] = $this->input->post('payment');
               
                if($amount[0]->pic_drop != "")
                {
                    $data['amount'] = $total + 100;
                }
                else
                {
                    $data['amount'] = $total;
                }
                
                $re = $this->md->my_insert("tbl_service_bill",$data);
                if($this->input->post('payment')=="Cash On Delivery")
                {
                 if($re == 1)
                 {
                     redirect('Payment-Success');
                 }
                }
                else 
                {
                     redirect("https://www.payumoney.com/");
                }
               
            }
        }
        $data['checkout'] = $this->md->my_select("tbl_booking",array("booking_id"=>$this->uri->segment(2)));
        
        $this->load->view("user/payment",$data);
    }
    public function psuccess()
    {
        if($this->session->userdata('booking') != "")
        {
        $data['success'] = $this->md->my_select("tbl_service_bill",array('registration_id'=>$this->session->userdata('userid'),'booking_id'=>$this->session->userdata("booking")));
        }
        else
        {
            redirect('User-Home');
        }
        $this->load->view("user/payment2",$data);
    }
    public function uprofile()
    {
        $wh['registration_id'] = $this->session->userdata('userid');
        if($this->input->post('uprofile'))
        {
            $this->form_validation->set_rules('name', 'User Name', 'regex_match[/^[a-zA-Z ]+$/]', array('regex_match' => 'Please Enter Valid User Name.'));
            $this->form_validation->set_rules('email', 'Email Id', 'valid_email', array('valid_email'=>'Please Enter Valid Email.'));
            $this->form_validation->set_rules('mobile', 'Mobile', 'regex_match[/^[0-9]{10}$/]', array('regex_match' => 'Please Enter Valid Mobile Number.'));
        
            if($this->form_validation->run() == TRUE)
            {
                if($_FILES['userprofile']['name'] != "")
                {
                    $config['upload_path']          = './user_asset/images/userprofile/';
                    $config['allowed_types']        = 'jpeg|jpg';
                    $config['max_size']             = 2048;
                    $mx = $this->md->my_query("select MAX(registration_id) as mx from tbl_registration")[0]-> mx;
                    if($mx != "")
                    {
                        $config['file_name'] = "profile_".$mx;
                    }
                    else
                    {
                        $config['file_name'] = "profile_0";
                    }
                    $config['overwrite'] = TRUE;
                    $result = $this->md->my_file($config,'userprofile');
                    if(in_array('file_name',$result))
                    {
                        $dbpath = "user_asset/images/userprofile/".$result['file_name'];
                        $udata['profile_pic'] = $dbpath;
                    }
                    else
                    {
                        $data['err'] = $result[0];
                    }
                }
                if(!isset($data['err']))
                {
                    $c = $this->md->my_query("select count(*) as cm from tbl_registration where email = '".$this->input->post('email')."' AND registration_id != '".$wh['registration_id']."'")[0]->cm;
                    if($c == 0)
                    {
                        $udata['name'] = $this->input->post('name');
                        $udata['email'] = $this->input->post('email');
                        $udata['dob'] = $this->input->post('dob');
                        $udata['gender'] = $this->input->post('gender');
                        $udata['contact_no'] = $this->input->post('mobile');

                        $r = $this->md->my_update('tbl_registration',$udata,$wh);
                        if($r == 1)
                        {
                            redirect('User-Profile');
                        }
                    }
                    else
                    {
                        $data['email'] = "Email Is Already Exist.";
                    }
                }
            }
        }
        $data['update'] = $this->md->my_select('tbl_registration',array('registration_id'=>$this->session->userdata('userid')));
        $this->load->view("user/update_profile",$data);
    }
    public function changepass()
    {
        $data[''] = '';
        if($this->input->post('editpass'))
        {
           if($this->input->post('cpassword') != "")
           {
               $data = $this->md->my_select('tbl_registration',array('registration_id'=>$this->session->userdata('userid')));
               
               $ops = $this->encryption->decrypt($data[0]->password);
               
               $ps = $this->input->post('cpassword');
               
               if( $ps == $ops)
               {
                   $this->form_validation->set_rules('npassword', 'New Password', 'required|min_length[8]|max_length[16]', array('required' => 'New Password Is Required.','min_length'=>'New Password atleast 8 Character.','max_length'=>'New Password Maximum 16 Character.'));
                   $this->form_validation->set_rules('rpassword', 'Retype Password', 'matches[npassword]', array('matches' => 'Retype Password Is Not Match.'));
               
                   if($this->form_validation->run() == TRUE)
                   {
                       $wh['registration_id'] = $this->session->userdata('userid');
                       $data1['password'] = $this->encryption->encrypt($this->input->post('npassword'));
                       $result = $this->md->my_update('tbl_registration',$data1,$wh);
                       
                       if($result == 1)
                       {
                           $this->session->unset_userdata('userid');
                           $this->session->unset_userdata('userlastlogin');
                           redirect('Login');
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
        $this->load->view("user/change_pass",$data);
    }
    public function serco()
    {
        $this->session->set_userdata('user','service');
        if($this->input->post('yes'))
        {
            $dt['status'] = 2;
            
            $result = $this->md->my_update('tbl_booking',$dt,array('booking_id'=>$this->session->userdata('booking'),'registration_id'=>$this->session->userdata("userid")));
            
        }
        if($this->input->post('no'))
        {
            $dt['status'] = 3;
            
            $result = $this->md->my_update('tbl_booking',$dt,array('booking_id'=>$this->session->userdata('booking'),'registration_id'=>$this->session->userdata("userid")));
            
        }
        
        $data['verify'] = $this->md->my_select('tbl_booking',array('registration_id'=>$this->session->userdata('userid')));
        $this->load->view('user/service_confirm',$data);
    }
    public function serstatus()
    {
        $this->load->view('user/service_check');
    }
    public function userdel()
    {
        $action = $this->uri->segment(2);
        $id = $this->uri->segment(3);
        
        if($action == 'wish')
        {
            $where['wish_id'] = $id;
            $this->md->my_delete('tbl_wishlist',$where);
            redirect('My-Wishlist');
        }
        if($action == 'review')
        {
            $where['review_id'] = $id;
            $this->md->my_delete('tbl_car_review',$where);
            redirect('My-Review');
        }
    }
}
