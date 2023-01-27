<?php

class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('google');
        date_default_timezone_set('Asia/Kolkata');
        $offer = $this->md->my_select('tbl_offer');
        foreach($offer as $val)
        {
            $start = $val->start_date;
            $end = $val->end_date;
            $today = date('Y-m-d');
            
            if($today >= $start && $today <= $end)
            {
                $this->md->my_update('tbl_offer',array('status'=>1),array('offer_id'=>$val->offer_id));
                if($val->lable == "type")
                {
                    $this->md->my_up_query("update tbl_car_detail set offer_id = '".$val->offer_id."' where type_id = '".$val->category_id."' and price >= '".$val->min_price."' and price <= '".$val->max_price."' and carmela_id = '".$this->session->userdata('carmela')."'");
                }
                elseif ($val->lable == "company") 
                {
                    $this->md->my_up_query("update tbl_car_detail set offer_id = '".$val->offer_id."' where company_id = '".$val->category_id."' and price >= '".$val->min_price."' and price <= '".$val->max_price."' and carmela_id = '".$this->session->userdata('carmela')."'");
                }
                elseif ($val->lable == "model") 
                {
                    $this->md->my_up_query("update tbl_car_detail set offer_id = '".$val->offer_id."' where model_id = '".$val->category_id."' and price >= '".$val->min_price."' and price <= '".$val->max_price."' and carmela_id = '".$this->session->userdata('carmela')."'");
                }
                elseif ($val->lable == "all") 
                {
                    $this->md->my_up_query("update tbl_car_detail set offer_id = '".$val->offer_id."' where price >= '".$val->min_price."' and price <= '".$val->max_price."' and carmela_id = '".$this->session->userdata('carmela')."'");
                }
            }
            else
            {
                $this->md->my_update('tbl_offer',array('status'=>0),array('offer_id'=>$val->offer_id));
                $this->md->my_update('tbl_car_detail',array('offer_id'=>0),array('offer_id'=>$val->offer_id,'carmela_id'=>$this->session->userdata('carmela')));
            }
        }
    }
    public function index()
    {
        $this->load->view("index");
    }
    public function login()
    {
        $dt[''] = "";
        
        if($this->input->post('login'))
        {
            $data = $this->md->my_query("select * from tbl_registration where email='".$this->input->post('emailid')."'");
            
            $c = count($data);
            if($c == 1)
            {
                $ops = $this->encryption->decrypt($data[0]->password);
                $ps = $this->input->post('passs');
                
                if($ops == $ps)
                {
                    if($data[0]->status == 1)
                    {
                        if($this->input->post('rememberme'))
                        {
                            $second = 60 * 60 * 24 * 365;
                            set_cookie('emailid',$data[0]->email,$second);
                            set_cookie('passs',$data[0]->password,$second);
                        }
                        else
                        {
                            if(get_cookie('emailid') != "")
                            {
                                delete_cookie('emailid');
                                delete_cookie('passs');
                            }
                        }
                        $this->session->set_userdata('userid',$data[0]->registration_id);
                        $this->session->set_userdata('userlastlogin',date('Y-m-d h:i:s'));
                        $contact=$this->md->my_select('tbl_registration',array('registration_id'=>$this->session->userdata('userid')));
                        if(count($contact)>0)
                        {
                            $client = new WAY2SMSClient();
                            $uid = "9909684989";
                            $pwd = "M3888N";
                            $phone = $contact[0]->contact_no;
                            $msg = "Hey ".$contact[0]->name.", someone access your account!";
                            $client->login($uid, $pwd);
                            $result = $client->send($phone, $msg);
                            $client->logout(); 
                        }
                        redirect('User-Home');
                    }
                    else
                    {
                       
                        $dt['err'] = "You Are Blocked By Admin. Please Contact Admin.";
                    }
                }
                else
                {
                    $dt['err'] = "Invalid Login.";
                }
            }
            else
            {
                $dt['err'] = "Invalid Login. Try Again. ";
            }
        }
        
        if($this->input->post('register'))
        {
            $this->form_validation->set_rules('username', 'User Name', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'User Name Is Required.', 'regex_match' => 'Please Enter Valid User Name.'));
            $this->form_validation->set_rules('email', 'Email Id', 'required|valid_email|is_unique[tbl_registration.email]', array('required' => 'Email Id is Required.', 'valid_email' => 'Please Enter Valid Email Id.','is_unique'=>'Email Id is Already Existing.'));
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[16]', array('required' => 'Password Is Required.','min_length'=>'New Password atleast 8 Character.','max_length'=>'New Password Maximum 16 Character.'));
            $this->form_validation->set_rules('repassword', 'Retype Password', 'required|matches[password]', array('required' => 'Comfirm Password is Required.','matches[password]' => 'Retype Password Is Not Match.'));
        
            if ($this->form_validation->run() == TRUE) 
            {
                $data['a_provider'] = "Website";
                $data['name'] = $this->input->post('username');
                $data['email'] = $this->input->post('email');
                $data['password'] = $this->encryption->encrypt($this->input->post('password'));
                $data['last_login'] = date('Y-m-d h:i:s');
                $data['join_date'] = date('Y-m-d');
                $data['status'] = 1;
                
                $r = $this->md->my_insert('tbl_registration',$data);
                
                if($r == 1)
                {
                    $mx = $this->md->my_query("select max(registration_id) as mx from tbl_registration")[0]-> mx;
                    
                    $this->session->set_userdata('userid',$mx);
                    $this->session->set_userdata('userlastlogin',date('Y-m-d h:i:s'));
                    
                    redirect('User-Home');
                }
                else
                {
                    $dt['error'] = "Something Is Wrong.";
                }
            }
            
        }
        $dt['google_url']= $this->google_connect();
        $this->load->view("login",$dt);
    }
    public function aboutcarhouse()
    {
        $this->load->view("aboutcarhouse");
    }
    public function contactus()
    {
        $dt['']=""; 
        if ($this->input->post('add')) 
        {
            $this->form_validation->set_rules('name', 'User Name', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'User Name Is Required.', 'regex_match' => 'Please Enter Valid User Name.'));
            $this->form_validation->set_rules('email', 'Email Id', 'required|valid_email|is_unique[tbl_contact_us.email]', array('required' => 'Email Id is Required.', 'valid_email' => 'Please Enter Valid Email Id.','is_unique'=>'Email Id is Already Existing.'));
            $this->form_validation->set_rules('subject', 'Subject', 'required|regex_match[/^[a-zA-Z. ]+$/]', array('required' => 'Subject Is Required.', 'regex_match' => 'Please Enter Valid Subject.'));
            $this->form_validation->set_rules('message', 'Message', 'required|regex_match[/^[a-zA-Z0-9._@ ]+$/]', array('required' => 'Message Is Required.', 'regex_match' => 'Please Enter Valid Message.'));
            
            if ($this->form_validation->run() == TRUE) 
            {
                    $data['name'] = $this->input->post('name');
                    $data['email'] = $this->input->post('email');
                    $data['subject'] = $this->input->post('subject');
                    $data['message'] = $this->input->post('message');
                    $result = $this->md->my_insert('tbl_contact_us',$data);
                    if ($result == 1) 
                    {
                        $dt['success'] = "Your Send Message Successfully.";
                    } 
                    else 
                    {
                        $dt['error'] = "Something is wrong.";
                    }
            }
        }
        $this->load->view("contact_us",$dt);
    }
    public function feedback()
    {
        $dt['']=""; 
        if ($this->input->post('add')) 
        {
            $this->form_validation->set_rules('name', 'User Name', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'User Name Is Required', 'regex_match' => 'Please Enter Valid User Name'));
            $this->form_validation->set_rules('message', 'Message', 'required|regex_match[/^[a-zA-Z0-9._@ ]+$/]', array('required' => 'Message Is Required', 'regex_match' => 'Please Enter Valid Message'));
            
            if ($this->form_validation->run() == TRUE) 
            {
                    $data['name'] = $this->input->post('name');
                    $data['message'] = $this->input->post('message');
                    $result = $this->md->my_insert('tbl_feedback',$data);
                    if ($result == 1) 
                    {
                        $dt['success'] = "Your Feedback Send Successfully.";
                    } 
                    else 
                    {
                        $dt['error'] = "Something is wrong.";
                    }
            }
        }
        $this->load->view("feedback",$dt);
    }
    public function termsandcondition()
    {
        $this->load->view("terms&condition");
    }
    public function privacy()
    {
        $this->load->view("privacy");
    }
    public function carmelaprivacy()
    {
        $this->load->view("carmela_privacy");
    }
    public function FAQs()
    {
        $this->load->view("faqs");
    }
    public function allcar()
    {
        $data[''] = "";
        $id = $this->uri->segment(2);
        $action = $this->uri->segment(3);
        if($id != "")
        {
            if($action == 'type')
            {
                $data['filter'] = $this->md->my_query("select * from tbl_car_detail where type_id= '".$id."'");
            }
            if($action == 'company')
            {
                $data['filter'] = $this->md->my_query("select * from tbl_car_detail where company_id= '".$id."'");
            }
            if($action == 'model')
            {
                $data['filter'] = $this->md->my_query("select * from tbl_car_detail where model_id= '".$id."'");
            }
            if($action == 'submodel')
            {
                $data['filter'] = $this->md->my_query("select * from tbl_car_detail where submodel_id= '".$id."'");
            }
            if($action == 'price')
            {
                $data['filter'] = $this->md->my_query("select * from tbl_car_detail where price <=".$id);
            }
        }
        $this->load->view("listTable",$data);
    }
    public function listview()
    {
        $this->load->view("list_car");
    }
    public function carmeladetail()
    {
        $data['carmela'] = $this->md->my_select('tbl_carmela',array('carmela_id'=>$this->uri->segment(2)));
        $this->load->view("carmela_detail",$data);
    }
    public function service()
    {
        $err[''] = "";
        if($this->input->post('service'))
        {
            $this->form_validation->set_rules('type', 'a', 'required', array('required' => 'Car Type Is Required.'));
            $this->form_validation->set_rules('company', 'b', 'required', array('required' => 'Car Company Is Required.'));
            $this->form_validation->set_rules('model', 'c', 'required', array('required' => 'Car Model Is Required.'));
            $this->form_validation->set_rules('submodel', 'd', 'required', array('required' => 'Car Submodel Is Required.'));
            $this->form_validation->set_rules('plat', 'e', 'required', array('required' => 'Plat Number Is Required.'));
            $this->form_validation->set_rules('pick', 'f', 'required', array('required' => 'Pick & Drop Is Required.'));
            $this->form_validation->set_rules('address', 'g', 'required', array('required' => 'Address Is Required.'));
            $this->form_validation->set_rules('rdate', 'h', 'required', array('required' => 'Request Date Is Required.'));
            $this->form_validation->set_rules('state', 'State', 'required', array('required' => 'State Is Required.'));
            $this->form_validation->set_rules('city', 'City', 'required', array('required' => 'City Is Required.'));
            $this->form_validation->set_rules('area', 'Area', 'required', array('required' => 'Area Is Required.'));
            $this->form_validation->set_rules('landmark', 'Landmark', 'required', array('required' => 'Landmark Is Required.'));
            if($this->form_validation->run() == TRUE)
            {
            $da = date('Y-m-d');
            if($this->input->post('rdate') >= $da)
            {
                $data['plat_no'] = $this->input->post('plat');
                $data['registration_id'] = $this->session->userdata('userid');
                $data['pic_drop'] = $this->input->post('pick');
                $data['location_id'] = $this->input->post("landmark");
                if($this->input->post("pick") == "Yes")
                {
                    $data['pd_amount'] = 100;
                }
                else
                {
                    $data['pd_amount'] = 0;
                }
                $data['request_date'] = $this->input->post('rdate');
                $data['status'] = 0;
                $data['address'] = $this->input->post('address');
                $data['category_id'] = $this->input->post('model');
                
                $result = $this->md->my_insert('tbl_booking',$data);
                if($result == 1)
                {
                    $mx = $this->md->my_query('select MAX(booking_id) as mx from tbl_booking')[0]->mx;
                    if($mx != "")
                    {
                        $this->session->set_userdata('booking',$mx);
                    }
                    else
                    {
                        $this->session->set_userdata('booking',1);
                    }
                    redirect('Car-Service-2');
                }
                else
                {
                    $err['error'] = "Something Went Wrong.";
                }
            }
            }
            else
            {
                $err['error'] = "Please Select Correct Date.";
            }
        }
        $err['cartype'] = $this->md->my_select('tbl_category',array('label'=>'type'));
        $this->load->view('service_1',$err);
    }
    public function service2()
    {
        if($this->session->userdata('booking') == "")
        {
            redirect('Car-Service-1');
        }
        else
        {
        if($this->input->post('sernext'))
        {
            
            
            $checkbox=$this->input->post('check');
            
            
            
            foreach ($checkbox as $value) {
                
                $data['booking_id']=$this->session->userdata('booking');
                $data['position_id']=$value;
                $data['status'] = 0;
                
                $result = $this->md->my_insert('tbl_user_service',$data);
            }
            if($result == 1)
            {
                redirect('Car-Service-3');
            }
            else
            {
                $err['error'] = "Something Went Wrong.";
            }
        }
        }
        $this->load->view('service_2');
    }
    public function service3()
    {
        if($this->session->userdata('booking') == "")
        {
            redirect('Car-Service-1');
        }
        $this->load->view('service_3');
    }
    public function exitser() {
        $this->session->unset_userdata('booking');
        redirect('User-Home');
    }
    public function compare()
    {
        $id1 = $this->uri->segment(2);
        $id2 = $this->uri->segment(3);
            $msg['compare'] = $this->md->my_select('tbl_car_detail',array('car_id'=>$id1));
            $msg['image'] = $this->md->my_select('tbl_car_image',array('car_id'=>$id1));
            $msg['comparetwo'] = $this->md->my_select('tbl_car_detail',array('car_id'=>$id2));
            $msg['images'] = $this->md->my_select('tbl_car_image',array('car_id'=>$id2));
            $msg['spe'] = $this->md->my_query('SELECT a.attribute_name , av.value FROM tbl_attribute as a , tbl_attribute_value as av WHERE a.attribute_id = av.attribute_id AND av.car_id = "'.$id1.'"');
            $msg['specification'] = $this->md->my_query('SELECT a.attribute_name , av.value FROM tbl_attribute as a , tbl_attribute_value as av WHERE a.attribute_id = av.attribute_id AND av.car_id = "'.$id2.'"');
        
        $this->load->view("compare",$msg);
    }
    public function cardetail()
    {
        $msg[''] = "";
        $id = $this->uri->segment(2);
        $msg['cardetail'] = $this->md->my_select('tbl_car_detail',array('car_id'=>$id));
        $msg['specification'] = $this->md->my_query('SELECT c.car_id , c.model_id , se.* , a.* , av.* FROM tbl_car_detail AS c , tbl_attribute_set AS se , tbl_attribute AS a , tbl_attribute_value AS av WHERE c.car_id = "'.$id.'" AND c.model_id = se.category_id AND se.set_id = a.set_id AND a.attribute_id = av.attribute_id');
       
        if($id == "")
        {
            redirect('All-Car');
        }
        else
        {
            
            if(count($msg['cardetail']) == 0)
            {
                redirect('All-Car');
            }
        }
        
        if($this->input->post('test'))
        {
            $a = $this->md->my_query("select * from tbl_car_detail where car_id = '".$this->uri->segment(2)."'")[0]->carmela_id;
            $this->form_validation->set_rules('date', 'a', 'required', array('required' => 'Date Is Required.'));
            $this->form_validation->set_rules('time', 'b', 'required', array('required' => 'Time Is Required.'));
            
            if($this->form_validation->run() == TRUE)
            {
                $config['upload_path']          = './visitor/images/license/';
                $config['allowed_types']        = 'jpeg|jpg';
                $config['max_size']             = 2048;
                $mx = $this->md->my_query('SELECT MAX(test_drive_id) as mx FROM tbl_test_drive')[0]->mx;
                if($mx != "")
                {
                    $config['file_name'] = "license_".$mx;
                }
                else
                {
                    $config['file_name'] = "license_0";
                }
                $re = $this->md->my_file($config,'photo');
                if(in_array('file_name',$re))
                {
                    $d = date('Y-m-d');
                    if($this->input->post('date') >= $d)
                    {
                    $dbpath = "visitor/images/license/".$re['file_name'];
                    $data['register_id'] = $this->session->userdata('userid');
                    $data['carmela_id'] = $a;
                    $data['car_id'] = $id;
                    
                    
                    $data['date'] = $this->input->post('date');
                    
                    
                    $data['time'] = $this->input->post('time');
                    $data['licence_image']=$dbpath;
                    $data['status'] = 0;
                    $count = $this->md->my_insert('tbl_test_drive',$data);
                    
                    if($count == 1)
                    {
                        $msg['success'] = "Your Test Drive Is Successfully Booked.";
                    }
                    }
                    else
                    {
                        $msg['error'] = "Please Select Correct Request Date.";
                    }
                }
                else
                {
                    $msg['error'] = $re[0];
                }
            }
        }
        $this->load->view("cardetail",$msg);
    }
    public function searchcar() 
    {
        $data['']="";
        $action=$this->uri->segment(2);
        $search=$this->uri->segment(3);
        if($action == "Search")
        {
          $data['product']=$this->md->my_query('select * from tbl_car_detail where status = 1 and carname like "%'.$search.'%" order by car_id');
        }
        else if($action == "Tagdata")
        {
            $c=0;
            $tag = $this->md->my_select('tbl_tag');
            foreach($tag as $t)
            {
                $a = explode(',',$t->tag);
                foreach ($a as $b)
                {
                    if($search == $b)
                    {
                        $searchtag[$c] = $t->car_id;
                        $c++;
                    }
                    
                }
            }
            $vv = implode(',', $searchtag);
            $data['product'] = $this->md->my_query('select * from tbl_car_detail where status = 1 and car_id in ('.$vv.') order by car_id');
        }
        $this->load->view('search_car',$data);
    }
    function google_connect()
    {
       	if(isset($_GET['code'])){
			//authenticate user
			$this->google->getAuthenticate();
			
			//get user info from google
			$gpInfo = $this->google->getUserInfo();
            //preparing data for database insertion
			$userData['oauth_provider'] = 'google';
			$userData['oauth_uid'] 		= $gpInfo['id'];
                        $userData['first_name'] 	= $gpInfo['given_name'];
                        $userData['last_name'] 		= $gpInfo['family_name'];
                        $userData['email'] 			= $gpInfo['email'];
			$userData['gender'] 		= !empty($gpInfo['gender'])?$gpInfo['gender']:'';
			$userData['locale'] 		= !empty($gpInfo['locale'])?$gpInfo['locale']:'';
                        $userData['profile_url'] 	= !empty($gpInfo['link'])?$gpInfo['link']:'';
                        $userData['picture_url'] 	= !empty($gpInfo['picture'])?$gpInfo['picture']:'';
			
			//insert or update user data to the database
            
			$data=array(
                            'a_id'=>$gpInfo['id'],
                            'a_provider'=>'google',
                            'name'=>$gpInfo['given_name'],
                            'email'=>$gpInfo['email'],
                        );
			
                        $a = $this->md->my_insert('tbl_registration',$data);
                        if($a == 1)
                        {
                            $mx = $this->md->my_query("select max(registration_id) as mx from tbl_registration")[0]-> mx;
                    
                            $this->session->set_userdata('userid',$mx);
                            $this->session->set_userdata('userlastlogin',date('Y-m-d h:i:s'));
                            redirect('User-Home');
                        }
		} 
		
		//google login url
		$data['loginURL'] = $this->google->loginURL();
                return $data['loginURL'];  
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