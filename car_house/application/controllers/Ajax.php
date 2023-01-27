<?php

class Ajax extends CI_Controller
{
    public function city() 
    {
            $id=$this->input->post('id');
            $action=$this->input->post('action');
            echo "<option value=''>Select City</option>";
            
            $dt = $this->md->my_select("tbl_location",array('lable'=>'city','parent_id' => $id));
            foreach($dt as $val)
            {
?>
<option value="<?php echo $val->location_id; ?>"><?php echo $val->name; ?></option>
<?php
                }
    }
    public function area() 
    {
            $id=$this->input->post('id');
            $action=$this->input->post('action');
            echo "<option value=''>Select Area</option>";
            $dt = $this->md->my_select('tbl_location',array('lable'=>'area','parent_id'=>$this->input->post('id')));
            foreach($dt as $val)
            {
?>
<option value="<?php echo $val->location_id; ?>"><?php echo $val->name; ?></option>
<?php
            }
    }
    public function landmark() 
    {
            $id=$this->input->post('id');
            $action=$this->input->post('action');
            echo "<option value=''>Select Landmark</option>";
            $dt = $this->md->my_select('tbl_location',array('lable'=>'landmark','parent_id'=>$this->input->post('id')));
            foreach($dt as $val)
            {
?>
<option value="<?php echo $val->location_id; ?>"><?php echo $val->name; ?></option>
<?php
            }
    }
    public function company() 
    {
            $id=$this->input->post('id');
            $action=$this->input->post('action');
            echo "<option value=''>Select Car Company</option>";
            $dt = $this->md->my_select("tbl_category",array('label'=>'company','parent_id' => $id));
            foreach($dt as $val)
            {
?>
<option value="<?php echo $val->category_id; ?>"><?php echo $val->category_name; ?></option>
<?php
            }
    }
    public function selleroffer() 
    {
            $id=$this->input->post('id');
            echo "<option value=''>Select Car Company</option>";
            $dt = $this->md->my_query("select c.* , cd.* from tbl_category as c , tbl_car_detail as cd where c.parent_id = '".$id."' and cd.carmela_id = '".$this->session->userdata("carmela")."' and cd.company_id = c.category_id group by c.category_id");
            foreach($dt as $val)
            {
?>
<option value="<?php echo $val->category_id; ?>"><?php echo $val->category_name; ?></option>
<?php
            }
    }
    
    public function sellermodel() 
    {
            $id=$this->input->post('id');
            echo "<option value=''>Select Car Company</option>";
            $dt = $this->md->my_query("select c.* , cd.* from tbl_category as c , tbl_car_detail as cd where c.parent_id = '".$id."' and cd.carmela_id = '".$this->session->userdata("carmela")."' and cd.model_id = c.category_id group by c.category_id");
            foreach($dt as $val)
            {
?>
<option value="<?php echo $val->category_id; ?>"><?php echo $val->category_name; ?></option>
<?php
            }
    }
    
    
    public function model() 
    {
            $id=$this->input->post('id');
            $action=$this->input->post('action');
            echo "<option value=''>Select Car Model</option>";
            $dt = $this->md->my_select("tbl_category",array('label'=>'model','parent_id' => $id));
            foreach($dt as $val)
            {
?>
<option value="<?php echo $val->category_id; ?>"><?php echo $val->category_name; ?></option>
<?php
                }
    }
    public function submodel() 
    {
            
            $id=$this->input->post('id');
            $action=$this->input->post('action');
            echo "<option value=''>Select Sub Model</option>";
            $dt = $this->md->my_select("tbl_category",array('label'=>'submodel','parent_id' => $id));
            foreach($dt as $val)
            {
?>
<option value="<?php echo $val->category_id; ?>"><?php echo $val->category_name; ?></option>
<?php
                }
    }
    public function setname() 
    {
            $id=$this->input->post('id');
            echo "<option value=''>Select Name</option>";
            $dt = $this->md->my_select('tbl_attribute_set',array('category_id'=>$id));
            foreach($dt as $val)
            {
?>
<option value="<?php echo $val->set_id; ?>"><?php echo $val->set_name; ?></option>
<?php
                }
    }
    public function images() 
    {
            $id=$this->input->post('id');
            $dt = $this->md->my_select('tbl_car_image',array('image_id'=>$id));
?>    
<img src="<?php echo base_url().$dt[0]->path; ?>" class="img-responsive" style="width:426px;height:284px;"/>
<?php          
    }
    public function changeimg() 
    {
           
            $id=$this->input->post('id');
            $this->session->set_userdata('modelid',$id);
            $dt = $this->md->my_select('tbl_category',array('category_id'=>$id));
            $ss=$this->md->my_query("SELECT * FROM tbl_service_position where category_id=".$id);
?>    
<img src="<?php echo base_url().$dt[0]->image; ?>" id="img" class="img-responsive mytagimg" style="width:100%;height:30%;"/>
<?php
$cou=100;
foreach ($ss as $val){
    $cou++;
    $cc=$this->md->my_query("SELECT * FROM tbl_service where service_id not in (SELECT service_id FROM tbl_service_position where category_id='".$this->session->userdata('modelid')."' and service_id not in($val->service_id))");

?>
<div class="mycartag tagide<?php echo $cou; ?>" style="top:<?php echo $val->y_position; ?>%;left:<?php echo $val->x_position; ?>%"><div style="position:relative;"><div class="tagtri"></div></div>
    <select class="tagservices" oldid="<?php echo $val->service_id; ?>">
<?php
foreach($cc as $valme)
        {
           if($val->service_id == $valme->service_id){
            ?>
        <option selected value="<?php echo $valme->service_id; ?>"><?php echo $valme->name ;?></option>
        <?php
           }
           else{
            ?>
            <option value="<?php echo $valme->service_id; ?>"><?php echo $valme->name ;?></option>
<?php
           }
        }
    ?>
    </select>
    <span style="color:#e88e8e;"><i class="fa fa-times" style="cursor:pointer;"></i></span></div>

<?php
}
    }
    public function service() 
    {
            $id=$this->input->post('id');
            echo "<option value=''>Select Car Service</option>";
            $dt = $this->md->my_select('tbl_service',array('category_id'=>$id));
            foreach($dt as $val)
            {
?>
<option value="<?php echo $val->service_id; ?>"><?php echo $val->name; ?></option>
<?php
                }
    }
    public function emailsub() 
    {
        if($this->input->post('email'))
        {
            if(preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3}$/",$this->input->post('email')))
            {
                $email = $this->md->my_select('tbl_email_subscriber',array('email'=>$this->input->post('email')));
                $c = count($email);
                if($c == 0)
                {
                    $data['email'] = $this->input->post('email');
                    $this->md->my_insert('tbl_email_subscriber',$data);
                    echo "yes";
                }
                else
                {
                    echo "no";
                }
            }
            else
            {
                echo "Email Is Not Valid.";
            }
        }
        else
        {
            echo "Email Is Required.";
        }
    }
    public function emailsend() 
    {
        if($this->input->post('email'))
        {
            if(preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3}$/",$this->input->post('email')))
            {
                $email = $this->md->my_select('tbl_registration',array('email'=>$this->input->post('email')));
                $c = count($email);
                if($c == 0)
                {
                    echo "Your Email Id Is Not Verified.";
                }
                else
                {
                    $e = $this->input->post('email');
                    $s = "Your Forgot Password";
                    $m = "Your Password Is '".$this->encryption->decrypt($email[0]->password)."'";
                    $r = $this->md->mailer($e,$s,$m);
                    if($r == 1)
                    {    
                        echo "Send Email Successfully.";
                    }
                    else
                    {
                         echo "Something Went Wrong.";
                    }
                }
            }
            else
            {
                echo "Email Is Not Valid.";
            }
        }
        else
        {
            echo "Email Is Required.";
        }
    }
    public function selleremail() 
    {
        if($this->input->post('email'))
        {
            if(preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3}$/",$this->input->post('email')))
            {
                $email = $this->md->my_select('tbl_carmela',array('email'=>$this->input->post('email')));
                $c = count($email);
                if($c == 0)
                {
                    echo "Your Email Id Is Not Verified.";
                }
                else
                {
                    $e = $this->input->post('email');
                    $s = "Your Forgot Password";
                    $m = "Your Password Is '".$this->encryption->decrypt($email[0]->password)."'";
                    $r = $this->md->mailer($e,$s,$m);
                    if($r == 1)
                    {    
                        echo "Send Email Successfully.";
                    }
                    else
                    {
                        echo "Something Went Wrong.";
                    }
                }
            }
            else
            {
                echo "Email Is Not Valid.";
            }
        }
        else
        {
            echo "Email Is Required.";
        }
    }
    public function addreview() 
    {
        $data['car_id'] = $this->input->post('id');
        $data['registration_id'] = $this->session->userdata('userid');
        $data['review'] = $this->input->post('msg');
        $data['date'] = date('Y-m-d h:i:s');
        $data['status'] = 0;
        $data['del_status'] = 0;
        
        $result = $this->md->my_insert('tbl_car_review',$data);
        
        if($result == 1)
        {
            echo "ha";
        }
    }
    public function carmelareview() 
    {
        $data['register_id'] = $this->session->userdata('userid');
        $data['carmela_id'] = $this->input->post('id');
        $data['review'] = $this->input->post('msg');
        $data['date'] = date('Y-m-d');
        $data['status'] = 0;
        
        $result = $this->md->my_insert('tbl_carmela_review',$data);
        
        if($result == 1)
        {
            echo "ha";
        }
    }
    public function banner() 
    {
        $id=$this->input->post('id');
        $action=$this->input->post('action');
        
        if($action == "banner")
        {
            $c = $this->md->my_select('tbl_banner',array('banner_id'=>$id))[0]->status;
            if($c == 0)
            {
                $this->md->my_update('tbl_banner',array('status'=>'1'),array('banner_id'=>$id));
            }
            else
            {
                $this->md->my_update('tbl_banner',array('status'=>'0'),array('banner_id'=>$id));
            }
            
        }
    }
    public function running() 
    {
        $id=$this->input->post('id');
        $status=$this->input->post('status');
        $this->md->my_update('tbl_user_service',array('status'=>$status),array('user_service_id'=>$id));
        
    }
    public function complete() 
    {
        $id=$this->input->post('id');
        $action=$this->input->post('action');
        $c = $this->md->my_select('tbl_user_service',array('user_service_id'=>$id));
        
        $this->md->my_update('tbl_user_service',array('status'=>'2'),array('user_service_id'=>$id));
        
    }
    public function carr() 
    {
        $id=$this->input->post('id');
        $c = $this->md->my_select('tbl_carmela_review',array('review_id'=>$id))[0]->status;
        if($c == 0)
        {
            $this->md->my_update('tbl_carmela_review',array('status'=>'1'),array('review_id'=>$id));
        }
        else
        {
            $this->md->my_update('tbl_carmela_review',array('status'=>'0'),array('review_id'=>$id));
        }
    }
    public function testdrive() 
    {
        $id=$this->input->post('id');
        
        $c = $this->md->my_select('tbl_test_drive',array('test_drive_id'=>$id));
        if($c[0]->status == 0)
        {
            $this->md->my_update('tbl_test_drive',array('status'=>'1'),array('test_drive_id'=>$id));
        }
        elseif($c[0]->status == 1)
        {
            $this->md->my_update('tbl_test_drive',array('status'=>'2'),array('test_drive_id'=>$id));
        }
    }
    public function review() 
    {
        $id=$this->input->post('id');
        $action=$this->input->post('action');
        
        if($action == "review")
        {
            $c = $this->md->my_select('tbl_car_review',array('review_id'=>$id))[0]->status;
            if($c == 0)
            {
                $this->md->my_update('tbl_car_review',array('status'=>'1'),array('review_id'=>$id));
            }
            else
            {
                $this->md->my_update('tbl_car_review',array('status'=>'0'),array('review_id'=>$id));
            }
            
        }
    }
    public function addwish() 
    {
        $data['register_id'] = $this->session->userdata('userid');
        $data['car_id'] = $this->input->post('cid');
        $result = $this->md->my_insert('tbl_wishlist',$data);
        echo $result;
    }
    public function followme() 
    {
        
        $data['carmela_id'] = $this->input->post('cid');
        $data['register_id'] = $this->session->userdata('userid');
        $result = $this->md->my_insert('tbl_follow',$data);
    }
    public function followdel() 
    {
        $data['carmela_id'] = $this->input->post('did');
        $result = $this->md->my_delete('tbl_follow',$data);
    }
    public function userstatus() 
    {
        $id=$this->input->post('id');
        $action=$this->input->post('action');
        
        if($action == "userstatus")
        {
            $c = $this->md->my_select('tbl_registration',array('registration_id'=>$id))[0]->status;
            if($c == 0)
            {
                $this->md->my_update('tbl_registration',array('status'=>'1'),array('registration_id'=>$id));
            }
            else
            {
                $this->md->my_update('tbl_registration',array('status'=>'0'),array('registration_id'=>$id));
            }
            
        }
    }
    public function cardetailstatus() 
    {
        $id=$this->input->post('id');
        $action=$this->input->post('action');
        
        if($action == "cardetailstatus")
        {
            $c = $this->md->my_select('tbl_car_detail',array('car_id'=>$id))[0]->status;
            if($c == 0)
            {
                $this->md->my_update('tbl_car_detail',array('status'=>'1'),array('car_id'=>$id));
            }
            else
            {
                $this->md->my_update('tbl_car_detail',array('status'=>'0'),array('car_id'=>$id));
            }
            
        }
    }
    public function carmela() 
    {
        $id=$this->input->post('id');
        $action=$this->input->post('action');
        
        if($action == "carmela")
        {
            $c = $this->md->my_select('tbl_carmela',array('carmela_id'=>$id))[0]->status;
            if($c == 0)
            {
                $this->md->my_update('tbl_carmela',array('status'=>'1'),array('carmela_id'=>$id));
            }
            else
            {
                $this->md->my_update('tbl_carmela',array('status'=>'0'),array('carmela_id'=>$id));
            }
        }
    }
    public function change() 
    {
        $id=$this->input->post('cid');
        $action=$this->input->post('action');
        $cn = $this->md->my_query("select count(*) as cn from tbl_car_image where car_id = '".$id."' and image_type='".$action."'")[0]->cn;
        
        if($cn == $cn)
        {
            $data = $this->md->my_select('tbl_car_image',array('car_id'=>$id,'image_type'=>$action));
   ?>
    <input type="file" name="upload[]" multiple="multiple" id="fileupload" style="display: none;"/>
    <label id="fileupd1" for="fileupload" style="width: 100%;margin-top: 32px;border:2px dashed #FF6200;cursor: pointer;">
        <div id="dvPreview">
            <h3 style="margin: 15%;">
                <?php
                foreach ($data as $path)
                {
                ?>
                    <img src="<?php  echo base_url().$path->path; ?>" style="height: 90px;width: 90px;">
                <?php
                }
                ?>
            </h3>
        </div>
    </label>
    <?php
        }
    }
    public function missspecification() 
    {
        $id = $this->input->post('id');
        $set = $this->md->my_select('tbl_attribute_set',array('category_id'=>$id));
        
?>
    <div class="panel-body">
    <div class="row">
        <p style="font-size: 15px;font-weight: bold;margin: 0 0 15px 14px;">Add Car Details</p>
        <?php
        foreach($set as $val)
        {
            $aset = $this->md->my_select('tbl_attribute',array('set_id'=>$val->set_id));
            if(count($aset > 0))
            {
        ?>
        <div class="col-lg-6 col-md-6 col-xs-12">
            <p style="font-size: 15px;font-weight: bold;text-transform: capitalize;"><?php echo $val->set_name; ?></p>
           
                <?php
                foreach ($aset as $v)
                {
                    if($v->attribute_type == "Textbox")
                    {    
                ?>
            <input type="text" placeholder="<?php echo ucwords($v->attribute_name); ?>" name="<?php echo $v->attribute_id; ?>"  class="form-control input-md" style="font-size: 12px;" required="" pattern="^[a-zA-Z0-9 ]+$"/>
                <br/>
                <?php
                    }
                    elseif($v->attribute_type == "Selectbox")
                    {
                ?>
                <select name="<?php echo $v->attribute_id; ?>" required="" style="width:100%;background-color: #FFFFFF;margin-bottom: 10px;">
                    <option value=""><?php echo ucwords($v->attribute_name); ?></option>
                <?php
                $vv = explode(',', $v->attribute_value);
                foreach ($vv as $vvv)
                {
                ?>
                    <option><?php echo $vvv; ?></option>
                <?php
                }
                ?>
                </select>
                <br/>
                <?php
                    }
                    elseif($v->attribute_type == "Boolean")
                    {
                ?>
                <span class="d"><?php echo ucwords($v->attribute_name); ?>&nbsp;&nbsp;&nbsp;: </span>
                <label class="radio-inline c">Yes
                    <input type="radio" value="Yes" name="<?php echo $v->attribute_id; ?>">
                    <span class="checkmark"></span>
                </label>
                <label class="radio-inline c" style="margin-top: 6px;">No
                    <input type="radio" value="No" name="<?php echo $v->attribute_id; ?>">
                    <span class="checkmark"></span>
                </label>
                <br/>
                <?php
                    }
                    elseif($v->attribute_type == "Checkbox")
                    {
                ?>
                <p class="d" style="margin-top: 5px;"><?php echo ucwords($v->attribute_name); ?>&nbsp;&nbsp;&nbsp;: </p>
                <?php
                $cc = explode(',', $v->attribute_value);
                foreach ($cc as $cv)
                {
                ?>
                <label class="checkbox1"  style="text-transform: capitalize;"><?php echo $cv; ?>
                    <input type="checkbox" value="<?php echo $cv; ?>" name="<?php echo $v->attribute_id; ?>[]">
                    <span class="checkmark123"></span>
                </label>
                <?php
                }
                ?>
                <br/>
                <br/>
                <?php
                    }
                }
                ?>
        </div>
       
        <?php
            }
        }
        ?>
    </div>
        <div class="col-md-12">
            <button type="submit" value="Clear" name="add" class="btn" style="border-radius: 20px;background-color: #FF6200;color: white;font-size: 13px;">Add Image&nbsp;&nbsp;<i class="fa fa-photo" style="margin-top: -1px;border-radius: 50%;width: 23px;margin-left: 5px;margin-right: -4px;padding: 4px;background-color: #FFFFFF;color: #000;font-size: 13px;font-weight: bold;"></i></button>
            <button type="reset" class="btn" style="border-radius: 20px;background-color: #FF6200;color: white;font-size: 13px;">Clear Specification&nbsp;&nbsp;<i class="fa fa-check" style="margin-top: -1px;border-radius: 50%;width: 23px;margin-left: 5px;margin-right: -5px;padding: 4px;background-color: #FFFFFF;color: #000;font-size: 13px;"></i></button>
        </div>
</div>

<?php
    }
    public function selectservices() {
       $selservice= $this->md->my_query("select * from tbl_service where category_id = '".$this->session->userdata('modelid')."' and service_id not in (select service_id from tbl_service_position where category_id = '".$this->session->userdata('modelid')."')");
       echo "<option Value='0'>Select Services</option>";
       
       foreach($selservice as $val){
           echo "<option Value='".$val->service_id."'>".$val->name."</option>";
       }
       
    }
    public function addservicespos() {
        
        $xpos=$this->input->post("xpos");
        $ypos=$this->input->post("ypos");
        $service_id=$this->input->post("service_id");
        $oldservice_id=$this->input->post("oldservice_id");
        
        $data["x_position"]=$xpos;
        $data["y_position"]=$ypos;
        $data["service_id"]=$service_id;
        $data["category_id"]=$this->session->userdata("modelid");
        
        $cccc= $this->md->my_query("SELECT count(*) as couter from tbl_service_position where category_id='".$this->session->userdata('modelid')."' and service_id=$oldservice_id");
        
        
        if($cccc[0]->couter==0)
        {
            $this->md->my_insert("tbl_service_position",$data);
        }
        else
        {
            $this->md->my_update("tbl_service_position",$data,array('category_id'=>$this->session->userdata('modelid'),"service_id"=>$oldservice_id));
        }
        
    }
    
    
    public function deleteservices() {
        $service_id= $this->input->post("service_id");
        $this->md->my_delete("tbl_service_position",array("service_id"=>$service_id,'category_id'=>$this->session->userdata('modelid')));
    }
    
    public function servicestate()
    {
        $book_id = $this->input->post('bookid');
        
        $q = $this->md->my_query("select us.* , s.* , sp.* from tbl_user_service as us , tbl_service as s , tbl_service_position as sp where us.position_id = sp.position_id and sp.service_id = s.service_id and us.booking_id =".$book_id);
       
            foreach($q as $se)
            {
       ?>
            <tr>
            <td>
                <label class="radio-inline c">
                    <input type="radio" disabled="" <?php if($se->status == 0) { echo "checked"; } ?>>
                    <span class="checkmark"></span>
                </label>
            </td>
            <td>
                <label class="radio-inline c">
                    <input type="radio" disabled="" <?php if($se->status == 1) { echo "checked"; } ?>>
                    <span class="checkmark"></span>
                </label>
            </td>
            <td>
                <label class="radio-inline c">
                    <input type="radio" disabled="" <?php if($se->status == 2) { echo "checked"; } ?>>
                    <span class="checkmark"></span>
                </label>
            </td>
            <td><?php echo ucwords($se->name)." Service"; ?></td>
            </tr>
            <?php
            }
    }
    
    public function addrate() 
    {
        $data['car_id'] = $this->input->post('rid');
        $data['register_id'] = $this->session->userdata('userid');
        $data['rate'] = $this->input->post('star');
        $cn = $this->md->my_query("select count(*) as cn from tbl_rating where car_id ='".$this->input->post('rid')."' and register_id='".$this->session->userdata("userid")."'")[0]->cn;
        if($cn == 0)
        {
            $result = $this->md->my_insert('tbl_rating',$data);
        }
        else
        {
            $result = $this->md->my_update('tbl_rating',$data,array('car_id'=>$this->input->post('rid')));
        }
    }

    public function sort()
    {
        $target = $this->input->post('id');
        if($target == "atoz")
        {
        $product = $this->md->my_query("SELECT * FROM tbl_car_detail WHERE status = 1 ORDER BY carname ASC");
    ?>
    <div class="row">
        <?php
        foreach($product as $val)
        {
        ?>
        <div class="col-lg-4 col-md-6 col-xs-12">

            <a href="<?php echo base_url(); ?>Car-Detail/<?php echo $val->car_id; ?>" style="text-decoration: none;"><div class="b-items__cell wow zoomInUp" data-wow-delay="0.5s">
                <div class="b-items__cars-one-img">
                    <?php
                         $ii = $this->md->my_select('tbl_car_image', array('car_id' => $val->car_id))[0]->path;
                    ?>
                    <img src="<?php echo base_url().$ii; ?>" style="width: 250px;height: 221px;" title="<?php echo $val->carname; ?>"/>
                    <?php
                    if($val->offer_id != 0)
                    {
                        if($val->offer_id != 0)
                        {
                            $rate = $this->md->my_select('tbl_offer',array('offer_id'=>$val->offer_id[0]));
                    ?>

                    <span class="b-items__cars-one-img-type m-premium"><?php echo $rate[0]->offer_rate; ?>% OFF</span>
                    <?php
                        }
                    }
                    ?>
                    <form method="post">
                        <input type="checkbox" name="check1" id='<?php echo $val->car_id; ?>' value='<?php echo $val->car_id; ?>' class="get"/>
                        <label for="<?php echo $val->car_id; ?>" class="b-items__cars-one-img-check"><span class="fa fa-check"></span></label>
                    </form>
                </div>
                <div class="b-items__cell-info rate">
                    <div class="s-lineDownLeft b-items__cell-info-title">
                        <h2 style="min-height: 10px;text-transform: capitalize;"><?php if(strlen($val->carname) > 0 && strlen($val->carname) < 27) { echo $val->carname; } else { echo $a = substr($val->carname,0,24).'...'; } ?></h2>
                    </div>
                    <p>
                        <?php
                        if($val->offer_id != 0)
                        {
                            $c = $val->price;
                            $a = strlen($c);
                            $ext = "";
                            $number_of_digits = $a;
                            $cc=1;
                            if($a % 2 != 0)
                            {
                            for($i=2;$i<$a;$i++)
                            {
                                $cc.="0";

                            }
                            }
                            else {
                                for($i=1;$i<$a;$i++)
                            {
                                $cc.="0";

                            }
                            }
                            $fraction=$c/$cc;
                            $fraction=number_format($fraction,2);
                            if($number_of_digits==4 ||$number_of_digits==5)
                                $ext="k";
                            if($number_of_digits==6 ||$number_of_digits==7)
                                $ext="Lac";
                            if($number_of_digits==8 ||$number_of_digits==9)
                                $ext="Cr";

                            $rrate = $this->md->my_select('tbl_offer',array('offer_id'=>$val->offer_id))[0]->offer_rate;
                            $oprice = ($val->price - ($val->price * $rrate) / 100 );

                            $op = $oprice;
                            $b = strlen($op);
                            $ext = "";
                            $number_of_digits = $b;
                            $ccc=1;
                            if($b % 2 != 0)
                            {
                            for($i=2;$i<$b;$i++)
                            {
                                $ccc.="0";

                            }
                            }
                            else {
                                for($i=1;$i<$b;$i++)
                            {
                                $ccc.="0";

                            }
                            }
                            $f=$op/$ccc;
                            $f=number_format($f,2);
                            if($number_of_digits==4 ||$number_of_digits==5)
                                $ext="k";
                            if($number_of_digits==6 ||$number_of_digits==7)
                                $ext="Lakh";
                            if($number_of_digits==8 ||$number_of_digits==9)
                                $ext="Cr";
                        ?>
                        <span class="fa fa-inr" style="font-size: 16px;color: #565656;">&nbsp;<?php echo $f." ".$ext; ?> /-</span>
                        <span style="font-size: 16px;color: #565656;float: right;">&nbsp;<strike class="fa fa-inr" >&nbsp;<?php echo $fraction." ".$ext; ?> /-</strike></span>
                        <?php
                        }
                        else
                        {
                            $c = $val->price;
                            $a = strlen($c);
                            $ext = "";
                            $number_of_digits = $a;
                            $cc=1;
                            if($a % 2 != 0)
                            {
                            for($i=2;$i<$a;$i++)
                            {
                                $cc.="0";

                            }
                            }
                            else {
                                for($i=1;$i<$a;$i++)
                            {
                                $cc.="0";

                            }
                            }
                            $fraction=$c/$cc;
                            $fraction=number_format($fraction,2);
                            if($number_of_digits==4 ||$number_of_digits==5)
                                $ext="k";
                            if($number_of_digits==6 ||$number_of_digits==7)
                                $ext="Lac";
                            if($number_of_digits==8 ||$number_of_digits==9)
                                $ext="Cr";
                        ?>
                        <span class="fa fa-inr" style="font-size: 16px;color: #565656;">&nbsp;<?php echo $fraction." ".$ext ?> /-</span>
                        <?php
                        }
                        ?>
                    </p>
                    <?php
                    $drate = $this->md->my_query("select count(*) as cn from tbl_rating where car_id ='".$val->car_id."'")[0]->cn;
                    if($drate == 0)
                    {
                       for($i=1;$i<=5;$i++)
                        {
                    ?>
                        <span class="fa fa-star-o" style="color: #FF6200;font-size: 20px;"></span>

                    <?php
                        }
                    ?>
                        <span class="b-world__item-num" style="background-color:#FF6200 ;color: white" id="hello">0 Rate</span>
                    <?php
                    }
                    else
                    {
                    $ratesum = $this->md->my_query("SELECT SUM(rate) as s FROM tbl_rating WHERE car_id=".$val->car_id)[0]->s;
                    $rateuser = $this->md->my_query("select count(register_id) as c from tbl_rating where car_id=".$val->car_id)[0]->c;
                    $totalrate = round($ratesum / $rateuser);
                    for($i=1;$i<=$totalrate;$i++)
                    {
                    ?>
                    <span class="fa fa-star" style="color: #FF6200;font-size: 20px;"></span>
                    <?php
                    }
                    for($j=$i;$j<=5;$j++)
                    {
                ?>
                <i class="fa fa-star-o" style="color: #FF6200;font-size: 20px;"></i>
                <?php
                    }
                    ?>
                    <span class="b-world__item-num" style="background-color:#FF6200 ;color: white" id="hello"><?php echo $totalrate." Rate"; ?></span>
                    <?php
                    }
                    ?>

                    <div class="row">
                        <?php
                            if($this->session->userdata('userid') != "")
                            {
                        ?>
                        <div class="col-xs-6 col-md-6 <?php echo $val->car_id; ?>">
                            <?php
                                $wishc = $this->md->my_query('select count(*) as c from tbl_wishlist where car_id ="'.$val->car_id.'" and register_id = "'.$this->session->userdata('userid').'"')[0]->c;
                                if($wishc == 0)
                                {
                            ?>
                            <a class="btn m-btn" style="margin-top: 16px;" onclick="addwish(<?php echo $val->car_id; ?>)" title="Add Wishlist">ADD WISH<span class="fa fa-angle-right"></span></a>
                            <?php
                                }
                                else
                                {
                            ?>
                            <a class="btn m-btn" style="margin-top: 16px;background-color: #565656;color: #fff;" title="Added To Wish">ADDED WISH<span class="fa fa-angle-right" style='background-color:white;color:#000;'></span></a>
                            <?php
                                }
                            ?>
                        </div>
                        <?php
                            }
                            else
                            {
                        ?>
                        <div class="col-xs-6 col-md-6">
                            <a href="<?php echo base_url(); ?>Login" class="btn m-btn" style="margin-top: 16px;">ADD WISH<span class="fa fa-angle-right"></span></a>
                        </div>
                        <?php
                            }
                        ?>
                        <div class="col-xs-6 col-md-6" style="padding-left: 8px;">
                                <a href="<?php echo base_url(); ?>Car-Detail/<?php echo $val->car_id; ?>" class="btn m-btn" style="margin-top: 16px;">VIEW DETAIL<span class="fa fa-angle-right"></span></a>
                        </div>
                    </div>
                </div>
                </div></a>
        </div>
        <?php
        }
        ?>
    </div>
    <?php
        }
        if($target == "ztoa")
        {
            $product = $this->md->my_query("SELECT * FROM tbl_car_detail WHERE status = 1 ORDER BY carname DESC");
    ?>
    <div class="row">
        <?php
        foreach($product as $val)
        {
        ?>
        <div class="col-lg-4 col-md-6 col-xs-12">

            <a href="<?php echo base_url(); ?>Car-Detail/<?php echo $val->car_id; ?>" style="text-decoration: none;"><div class="b-items__cell wow zoomInUp" data-wow-delay="0.5s">
                <div class="b-items__cars-one-img">
                    <?php
                         $ii = $this->md->my_select('tbl_car_image', array('car_id' => $val->car_id))[0]->path;
                    ?>
                    <img src="<?php echo base_url().$ii; ?>" style="width: 250px;height: 221px;" title="<?php echo $val->carname; ?>"/>
                    <?php
                    if($val->offer_id != 0)
                    {
                        if($val->offer_id != 0)
                        {
                            $rate = $this->md->my_select('tbl_offer',array('offer_id'=>$val->offer_id[0]));
                    ?>

                    <span class="b-items__cars-one-img-type m-premium"><?php echo $rate[0]->offer_rate; ?>% OFF</span>
                    <?php
                        }
                    }
                    ?>
                    <form method="post">
                        <input type="checkbox" name="check1" id='<?php echo $val->car_id; ?>' value='<?php echo $val->car_id; ?>' class="get"/>
                        <label for="<?php echo $val->car_id; ?>" class="b-items__cars-one-img-check"><span class="fa fa-check"></span></label>
                    </form>
                </div>
                <div class="b-items__cell-info rate">
                    <div class="s-lineDownLeft b-items__cell-info-title">
                        <h2 style="min-height: 10px;text-transform: capitalize;"><?php if(strlen($val->carname) > 0 && strlen($val->carname) < 27) { echo $val->carname; } else { echo $a = substr($val->carname,0,24).'...'; } ?></h2>
                    </div>
                    <p>
                        <?php
                        if($val->offer_id != 0)
                        {
                            $c = $val->price;
                            $a = strlen($c);
                            $ext = "";
                            $number_of_digits = $a;
                            $cc=1;
                            if($a % 2 != 0)
                            {
                            for($i=2;$i<$a;$i++)
                            {
                                $cc.="0";

                            }
                            }
                            else {
                                for($i=1;$i<$a;$i++)
                            {
                                $cc.="0";

                            }
                            }
                            $fraction=$c/$cc;
                            $fraction=number_format($fraction,2);
                            if($number_of_digits==4 ||$number_of_digits==5)
                                $ext="k";
                            if($number_of_digits==6 ||$number_of_digits==7)
                                $ext="Lac";
                            if($number_of_digits==8 ||$number_of_digits==9)
                                $ext="Cr";

                            $rrate = $this->md->my_select('tbl_offer',array('offer_id'=>$val->offer_id))[0]->offer_rate;
                            $oprice = ($val->price - ($val->price * $rrate) / 100 );

                            $op = $oprice;
                            $b = strlen($op);
                            $ext = "";
                            $number_of_digits = $b;
                            $ccc=1;
                            if($b % 2 != 0)
                            {
                            for($i=2;$i<$b;$i++)
                            {
                                $ccc.="0";

                            }
                            }
                            else {
                                for($i=1;$i<$b;$i++)
                            {
                                $ccc.="0";

                            }
                            }
                            $f=$op/$ccc;
                            $f=number_format($f,2);
                            if($number_of_digits==4 ||$number_of_digits==5)
                                $ext="k";
                            if($number_of_digits==6 ||$number_of_digits==7)
                                $ext="Lakh";
                            if($number_of_digits==8 ||$number_of_digits==9)
                                $ext="Cr";
                        ?>
                        <span class="fa fa-inr" style="font-size: 16px;color: #565656;">&nbsp;<?php echo $f." ".$ext; ?> /-</span>
                        <span style="font-size: 16px;color: #565656;float: right;">&nbsp;<strike class="fa fa-inr" >&nbsp;<?php echo $fraction." ".$ext; ?> /-</strike></span>
                        <?php
                        }
                        else
                        {
                            $c = $val->price;
                            $a = strlen($c);
                            $ext = "";
                            $number_of_digits = $a;
                            $cc=1;
                            if($a % 2 != 0)
                            {
                            for($i=2;$i<$a;$i++)
                            {
                                $cc.="0";

                            }
                            }
                            else {
                                for($i=1;$i<$a;$i++)
                            {
                                $cc.="0";

                            }
                            }
                            $fraction=$c/$cc;
                            $fraction=number_format($fraction,2);
                            if($number_of_digits==4 ||$number_of_digits==5)
                                $ext="k";
                            if($number_of_digits==6 ||$number_of_digits==7)
                                $ext="Lakh";
                            if($number_of_digits==8 ||$number_of_digits==9)
                                $ext="Cr";
                        ?>
                        <span class="fa fa-inr" style="font-size: 16px;color: #565656;">&nbsp;<?php echo $fraction." ".$ext ?> /-</span>
                        <?php
                        }
                        ?>
                    </p>
                    <?php
                    $drate = $this->md->my_query("select count(*) as cn from tbl_rating where car_id ='".$val->car_id."'")[0]->cn;
                    if($drate == 0)
                    {
                       for($i=1;$i<=5;$i++)
                        {
                    ?>
                        <span class="fa fa-star-o" style="color: #FF6200;font-size: 20px;"></span>

                    <?php
                        }
                    ?>
                        <span class="b-world__item-num" style="background-color:#FF6200 ;color: white" id="hello">0 Rate</span>
                    <?php
                    }
                    else
                    {
                    $ratesum = $this->md->my_query("SELECT SUM(rate) as s FROM tbl_rating WHERE car_id=".$val->car_id)[0]->s;
                    $rateuser = $this->md->my_query("select count(register_id) as c from tbl_rating where car_id=".$val->car_id)[0]->c;
                    $totalrate = round($ratesum / $rateuser);
                    for($i=1;$i<=$totalrate;$i++)
                    {
                    ?>
                    <span class="fa fa-star" style="color: #FF6200;font-size: 20px;"></span>
                    <?php
                    }
                    for($j=$i;$j<=5;$j++)
                    {
                ?>
                <i class="fa fa-star-o" style="color: #FF6200;font-size: 20px;"></i>
                <?php
                    }
                    ?>
                    <span class="b-world__item-num" style="background-color:#FF6200 ;color: white" id="hello"><?php echo $totalrate." Rate"; ?></span>
                    <?php
                    }
                    ?>

                    <div class="row">
                        <?php
                            if($this->session->userdata('userid') != "")
                            {
                        ?>
                        <div class="col-xs-6 col-md-6 <?php echo $val->car_id; ?>">
                            <?php
                                $wishc = $this->md->my_query('select count(*) as c from tbl_wishlist where car_id ="'.$val->car_id.'" and register_id = "'.$this->session->userdata('userid').'"')[0]->c;
                                if($wishc == 0)
                                {
                            ?>
                            <a class="btn m-btn" style="margin-top: 16px;" onclick="addwish(<?php echo $val->car_id; ?>)" title="Add Wishlist">ADD WISH<span class="fa fa-angle-right"></span></a>
                            <?php
                                }
                                else
                                {
                            ?>
                            <a class="btn m-btn" style="margin-top: 16px;background-color: #565656;color: #fff;" title="Added To Wish">ADDED WISH<span class="fa fa-angle-right" style='background-color:white;color:#000;'></span></a>
                            <?php
                                }
                            ?>
                        </div>
                        <?php
                            }
                            else
                            {
                        ?>
                        <div class="col-xs-6 col-md-6">
                            <a href="<?php echo base_url(); ?>Login" class="btn m-btn" style="margin-top: 16px;">ADD WISH<span class="fa fa-angle-right"></span></a>
                        </div>
                        <?php
                            }
                        ?>
                        <div class="col-xs-6 col-md-6" style="padding-left: 8px;">
                                <a href="<?php echo base_url(); ?>Car-Detail/<?php echo $val->car_id; ?>" class="btn m-btn" style="margin-top: 16px;">VIEW DETAIL<span class="fa fa-angle-right"></span></a>
                        </div>
                    </div>
                </div>
                </div></a>
        </div>
        <?php
        }
        ?>
    </div>       
    <?php
        }
        if($target == "ladd")
        {
            $product = $this->md->my_query("SELECT * FROM tbl_car_detail WHERE status = 1 ORDER BY car_id DESC");
    ?>
    <div class="row">
        <?php
        foreach($product as $val)
        {
        ?>
        <div class="col-lg-4 col-md-6 col-xs-12">

            <a href="<?php echo base_url(); ?>Car-Detail/<?php echo $val->car_id; ?>" style="text-decoration: none;"><div class="b-items__cell wow zoomInUp" data-wow-delay="0.5s">
                <div class="b-items__cars-one-img">
                    <?php
                         $ii = $this->md->my_select('tbl_car_image', array('car_id' => $val->car_id))[0]->path;
                    ?>
                    <img src="<?php echo base_url().$ii; ?>" style="width: 250px;height: 221px;" title="<?php echo $val->carname; ?>"/>
                    <?php
                    if($val->offer_id != 0)
                    {
                        if($val->offer_id != 0)
                        {
                            $rate = $this->md->my_select('tbl_offer',array('offer_id'=>$val->offer_id[0]));
                    ?>

                    <span class="b-items__cars-one-img-type m-premium"><?php echo $rate[0]->offer_rate; ?>% OFF</span>
                    <?php
                        }
                    }
                    ?>
                    <form method="post">
                        <input type="checkbox" name="check1" id='<?php echo $val->car_id; ?>' value='<?php echo $val->car_id; ?>' class="get"/>
                        <label for="<?php echo $val->car_id; ?>" class="b-items__cars-one-img-check"><span class="fa fa-check"></span></label>
                    </form>
                </div>
                <div class="b-items__cell-info rate">
                    <div class="s-lineDownLeft b-items__cell-info-title">
                        <h2 style="min-height: 10px;text-transform: capitalize;"><?php if(strlen($val->carname) > 0 && strlen($val->carname) < 27) { echo $val->carname; } else { echo $a = substr($val->carname,0,24).'...'; } ?></h2>
                    </div>
                    <p>
                        <?php
                        if($val->offer_id != 0)
                        {
                            $c = $val->price;
                            $a = strlen($c);
                            $ext = "";
                            $number_of_digits = $a;
                            $cc=1;
                            if($a % 2 != 0)
                            {
                            for($i=2;$i<$a;$i++)
                            {
                                $cc.="0";

                            }
                            }
                            else {
                                for($i=1;$i<$a;$i++)
                            {
                                $cc.="0";

                            }
                            }
                            $fraction=$c/$cc;
                            $fraction=number_format($fraction,2);
                            if($number_of_digits==4 ||$number_of_digits==5)
                                $ext="k";
                            if($number_of_digits==6 ||$number_of_digits==7)
                                $ext="Lakh";
                            if($number_of_digits==8 ||$number_of_digits==9)
                                $ext="Cr";

                            $rrate = $this->md->my_select('tbl_offer',array('offer_id'=>$val->offer_id))[0]->offer_rate;
                            $oprice = ($val->price - ($val->price * $rrate) / 100 );

                            $op = $oprice;
                            $b = strlen($op);
                            $ext = "";
                            $number_of_digits = $b;
                            $ccc=1;
                            if($b % 2 != 0)
                            {
                            for($i=2;$i<$b;$i++)
                            {
                                $ccc.="0";

                            }
                            }
                            else {
                                for($i=1;$i<$b;$i++)
                            {
                                $ccc.="0";

                            }
                            }
                            $f=$op/$ccc;
                            $f=number_format($f,2);
                            if($number_of_digits==4 ||$number_of_digits==5)
                                $ext="k";
                            if($number_of_digits==6 ||$number_of_digits==7)
                                $ext="Lakh";
                            if($number_of_digits==8 ||$number_of_digits==9)
                                $ext="Cr";
                        ?>
                        <span class="fa fa-inr" style="font-size: 16px;color: #565656;">&nbsp;<?php echo $f." ".$ext; ?> /-</span>
                        <span style="font-size: 16px;color: #565656;float: right;">&nbsp;<strike class="fa fa-inr" >&nbsp;<?php echo $fraction." ".$ext; ?> /-</strike></span>
                        <?php
                        }
                        else
                        {
                            $c = $val->price;
                            $a = strlen($c);
                            $ext = "";
                            $number_of_digits = $a;
                            $cc=1;
                            if($a % 2 != 0)
                            {
                            for($i=2;$i<$a;$i++)
                            {
                                $cc.="0";

                            }
                            }
                            else {
                                for($i=1;$i<$a;$i++)
                            {
                                $cc.="0";

                            }
                            }
                            $fraction=$c/$cc;
                            $fraction=number_format($fraction,2);
                            if($number_of_digits==4 ||$number_of_digits==5)
                                $ext="k";
                            if($number_of_digits==6 ||$number_of_digits==7)
                                $ext="Lac";
                            if($number_of_digits==8 ||$number_of_digits==9)
                                $ext="Cr";
                        ?>
                        <span class="fa fa-inr" style="font-size: 16px;color: #565656;">&nbsp;<?php echo $fraction." ".$ext ?> /-</span>
                        <?php
                        }
                        ?>
                    </p>
                    <?php
                    $drate = $this->md->my_query("select count(*) as cn from tbl_rating where car_id ='".$val->car_id."'")[0]->cn;
                    if($drate == 0)
                    {
                       for($i=1;$i<=5;$i++)
                        {
                    ?>
                        <span class="fa fa-star-o" style="color: #FF6200;font-size: 20px;"></span>

                    <?php
                        }
                    ?>
                        <span class="b-world__item-num" style="background-color:#FF6200 ;color: white" id="hello">0 Rate</span>
                    <?php
                    }
                    else
                    {
                    $ratesum = $this->md->my_query("SELECT SUM(rate) as s FROM tbl_rating WHERE car_id=".$val->car_id)[0]->s;
                    $rateuser = $this->md->my_query("select count(register_id) as c from tbl_rating where car_id=".$val->car_id)[0]->c;
                    $totalrate = round($ratesum / $rateuser);
                    for($i=1;$i<=$totalrate;$i++)
                    {
                    ?>
                    <span class="fa fa-star" style="color: #FF6200;font-size: 20px;"></span>
                    <?php
                    }
                    for($j=$i;$j<=5;$j++)
                    {
                ?>
                <i class="fa fa-star-o" style="color: #FF6200;font-size: 20px;"></i>
                <?php
                    }
                    ?>
                    <span class="b-world__item-num" style="background-color:#FF6200 ;color: white" id="hello"><?php echo $totalrate." Rate"; ?></span>
                    <?php
                    }
                    ?>

                    <div class="row">
                        <?php
                            if($this->session->userdata('userid') != "")
                            {
                        ?>
                        <div class="col-xs-6 col-md-6 <?php echo $val->car_id; ?>">
                            <?php
                                $wishc = $this->md->my_query('select count(*) as c from tbl_wishlist where car_id ="'.$val->car_id.'" and register_id = "'.$this->session->userdata('userid').'"')[0]->c;
                                if($wishc == 0)
                                {
                            ?>
                            <a class="btn m-btn" style="margin-top: 16px;" onclick="addwish(<?php echo $val->car_id; ?>)" title="Add Wishlist">ADD WISH<span class="fa fa-angle-right"></span></a>
                            <?php
                                }
                                else
                                {
                            ?>
                            <a class="btn m-btn" style="margin-top: 16px;background-color: #565656;color: #fff;" title="Added To Wish">ADDED WISH<span class="fa fa-angle-right" style='background-color:white;color:#000;'></span></a>
                            <?php
                                }
                            ?>
                        </div>
                        <?php
                            }
                            else
                            {
                        ?>
                        <div class="col-xs-6 col-md-6">
                            <a href="<?php echo base_url(); ?>Login" class="btn m-btn" style="margin-top: 16px;">ADD WISH<span class="fa fa-angle-right"></span></a>
                        </div>
                        <?php
                            }
                        ?>
                        <div class="col-xs-6 col-md-6" style="padding-left: 8px;">
                                <a href="<?php echo base_url(); ?>Car-Detail/<?php echo $val->car_id; ?>" class="btn m-btn" style="margin-top: 16px;">VIEW DETAIL<span class="fa fa-angle-right"></span></a>
                        </div>
                    </div>
                </div>
                </div></a>
        </div>
        <?php
        }
        ?>
    </div>
    <?php
        }
    }
    
    public function billsearch() 
    {
        $id = $this->input->post('id');   
        $action = $this->input->post('action');   
        if($action == "billno")
        {
            $akshay = $this->md->my_select('tbl_service_bill',array('bill_id'=>$id));
            $result = count($akshay);
        }
        elseif($action == "date")
        {
            $akshay = $this->md->my_select('tbl_service_bill',array('date'=>$id));
            $result = count($akshay);
        }
        elseif($action == "user")
        {
            $akshay = $this->md->my_query("select bill.* , b.* from tbl_service_bill as bill , tbl_booking as b where bill.registration_id = '".$id."' and bill.booking_id = b.booking_id");
            $result = count($akshay);
        }
        elseif($action == "type")
        {
            $akshay = $this->md->my_select("tbl_service_bill",array("bill_id"=>$id));
            $result = count($akshay);
        }
        elseif($action == "model")
        {
            $akshay = $this->md->my_select("tbl_transaction",array('category_id'=>$id));
            $result = count($akshay);
        }
        elseif($action == "state")
        {
            $akshay = $this->md->my_query("select bb.bill_id, b.* from tbl_location as s , tbl_location as c , tbl_location as a , tbl_location as l , tbl_booking as b,tbl_service_bill as bb where bb.booking_id=b.booking_id and b.location_id = l.location_id and l.parent_id = a.location_id and a.parent_id = c.location_id and c.parent_id = s.location_id and s.location_id =".$id);
            $result = count($akshay);
        }
        elseif($action == "city")
        {
            $akshay = $this->md->my_query("select bb.bill_id, b.* from tbl_location as c , tbl_location as a , tbl_location as l , tbl_booking as b,tbl_service_bill as bb where bb.booking_id=b.booking_id and b.location_id = l.location_id and l.parent_id = a.location_id and a.parent_id = c.location_id and c.location_id =".$id);
            $result = count($akshay);
        }
        elseif($action == "area")
        {
            $akshay = $this->md->my_query("select bb.bill_id, b.* from tbl_location as a , tbl_location as l , tbl_booking as b,tbl_service_bill as bb where bb.booking_id=b.booking_id and b.location_id = l.location_id and l.parent_id = a.location_id and a.location_id =".$id);
            $result = count($akshay);
        }
        elseif($action == "landmark")
        {
            $akshay = $this->md->my_query("select bb.bill_id, b.* from tbl_location as l , tbl_booking as b,tbl_service_bill as bb where bb.booking_id=b.booking_id and b.location_id = l.location_id and l.location_id =".$id);
            $result = count($akshay);
        }
        elseif($action == "minmax")
        {
           $min = $this->input->post('min');
           $max = $this->input->post('max');
           $akshay = $this->md->my_query("select * from tbl_service_bill where amount BETWEEN $min and $max");
           $result = count($akshay);
        }
        if($result == 0)
        {
        ?>
            <h1 style="color: #ddd;text-align: center;">No Bill Generated.</h1>
        <?php
        }
        else
        {
        foreach($akshay as $a)
        {
            $userbill = $this->md->my_query("select bill.* , us.* , b.* , sp.* , s.* from tbl_service_bill as bill , tbl_user_service as us , tbl_booking as b , tbl_service_position as sp , tbl_service as s where bill.bill_id = '".$a->bill_id."' and bill.booking_id = b.booking_id and b.booking_id = us.booking_id and us.position_id = sp.position_id and sp.service_id = s.service_id");
        ?>
            <div class="col-md-12">
            <section class="panel" style="border: 1px solid #F2F2F2;">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                    </div>

                    <h2 class="panel-title">Car Service Invoice</h2>

                </header>
                <div class="panel-body" id="divprint">
                    <div class="col-md-6 col-lg-6 col-xl-6" style="padding: 0px;">
                        <div class="logo-container">
                            <h3><img src="<?php echo base_url(); ?>assets/images/Bb.png" style="width: 99px;height: 41px;margin-left: 11px;"/></h3>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6 text-right">
                        <h5><b>Tax Invoice Bill Of Services / Cash Memo</b></h5>
                        <h6>( Duplicate For Transporter )</h6>
                    </div>
                    <div class="col-md-12" style="padding: 0px;">
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <br/>
                            <h5><b>Plat Number : </b><span class="s">&nbsp;<?php echo ucwords($userbill[0]->plat_no); ?></span></h5>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6 text-right">
                        <br/>
                        <h5><b>Billing Address : </b></h5>
                        <h6>AMPKart WH-10,crystal indus Logistics Park,Bhayla</h6>
                        <h6>Ahmedabad,Gujarat,382220</h6>
                    </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6">
                        <h5><b>Order Number : </b><span class="s">171-9304673-0314729</span></h5>
                        <h5><b>Order Date : </b><span class="s">27-04-2018</span></h5>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6 text-right">
                        <br/>
                        <h5><b>Invoice Number : </b><span class="s">AMD1-79166</span></h5>
                        <h5><b>Invoice Date : </b><span class="s">27-04-2018</span></h5>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <br/>
                        <div class="table-responsive" style="overflow-x: unset;">
                            <table class="table table-striped table-bordered tbl wraped nova-pagging" >
                                <thead>
                                    <tr>
                                        <th nova-search="yes">No</th>
                                        <th nova-search="yes">Service Name</th>
                                        <th nova-search="yes">Price</th>
                                        <th nova-search="yes">Total Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    foreach($userbill as $bill)
                                    {
                                        $total += $bill->price;
                                    ?>
                                    <tr>
                                        <td>1</td>
                                        <td><?php echo ucwords($bill->name)." Service"; ?></td>
                                        <td><span class="fa fa-inr"></span>&nbsp;<?php echo $bill->price; ?> /-</td>
                                        <td><span class="fa fa-inr"></span>&nbsp;<?php echo $bill->price; ?> /-</td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="3" style="text-align: right!important;"><b>Total Amount</b></td>
                                        <td><span class="fa fa-inr"></span>&nbsp;<?php echo $total; ?> /-</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align: right!important;"><b>Pick & Drop Charges</b></td>
                                        <td><span class="fa fa-inr"></span>&nbsp;<?php if($userbill[0]->pic_drop != "") { echo "100"; } else { echo "-"; } ?> /-</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align: right!important;"><b>Net Amount</b></td>
                                        <?php
                                        $t = $total + 100;
                                        ?>
                                        <td><span class="fa fa-inr"></span>&nbsp;<?php if($userbill[0]->pic_drop != "") { echo $t; } else { echo $total; } ?> /-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-12 text-right">
                        <br/>
                        <h5><b>For AMPKart :</b></h5>
                        <h4>CAR HOUSE</h4>
                        <h6><b>Authorize Signatory</b></h6>
                        <button type="button" value="Print" onclick="printdiv('divprint')" class="btn btn-danger">Print</button>
                    </div>
                    </div>
            </section>
        </div>
            <script language="javascript">
            function printdiv(printpage)
            {
            var newstr = document.all.item(printpage).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = newstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;
            }
            </script>
        <?php
        }
        }
    }
    public function userbill() 
    {
        $id = $this->input->post('id');   
        $action = $this->input->post('action');   
        if($action == "billno")
        {
            $akshay = $this->md->my_select('tbl_service_bill',array('bill_id'=>$id));
            $result = count($akshay);
        }
        elseif($action == "date")
        {
            $akshay = $this->md->my_select('tbl_service_bill',array('date'=>$id));
            $result = count($akshay);
        }
        elseif($action == "type")
        {
            $akshay = $this->md->my_select('tbl_service_bill',array('bill_id'=>$id));
            $result = count($akshay);
        }
        elseif($action == "mmax")
        {
           $min = $this->input->post('min');
           $max = $this->input->post('max');
           $akshay = $this->md->my_query("select * from tbl_service_bill where amount BETWEEN $min and $max and registration_id = '".$this->session->userdata('userid')."'");
           $result = count($akshay);
        }
        
        if($result == 0)
        {
        ?>
            <h1 style="text-align: center;color: #ddd;">No Bills Generated.</h1>
        <?php
        }
        else
        {
        foreach($akshay as $a)
        {
            $userbill = $this->md->my_query("select bill.* , us.* , b.* , sp.* , s.* from tbl_service_bill as bill , tbl_user_service as us , tbl_booking as b , tbl_service_position as sp , tbl_service as s where bill.bill_id = '".$a->bill_id."' and bill.booking_id = b.booking_id and bill.registration_id = '".$this->session->userdata('userid')."' and b.booking_id = us.booking_id and us.position_id = sp.position_id and sp.service_id = s.service_id");
        ?>
            <div class="col-md-12">
            <section class="panel" style="border: 1px solid #F2F2F2;">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                    </div>

                    <h2 class="panel-title">Car Service Invoice</h2>

                </header>
                <div class="panel-body">
                    <div class="col-md-6 col-lg-6 col-xl-6" style="padding: 0px;">
                        <div class="logo-container">
                            <div class="adminlogo1 wow slideInLeft" data-wow-delay="0.3s" title="Car house">
                                <h3><a href="<?php echo base_url(); ?>User-Home">Car<span style="color: #555555;"> House</span></a></h3>
                                <h2><a href="<?php echo base_url(); ?>Home" style="color: #565656;">Everyone Dreams of Car</a></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6 text-right">
                        <h5><b>Tax Invoice Bill Of Services / Cash Memo</b></h5>
                        <h6>( Duplicate For Transporter )</h6>
                    </div>
                    <div class="col-md-12" style="padding: 0px;">
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <br/>
                            <h5><b>Plat Number : </b><span class="s">&nbsp;<?php echo ucwords($userbill[0]->plat_no); ?></span></h5>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6 text-right">
                        <br/>
                        <h5><b>Billing Address : </b></h5>
                        <h6>AMPKart WH-10,crystal indus Logistics Park,Bhayla</h6>
                        <h6>Ahmedabad,Gujarat,382220</h6>
                    </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6">
                        <h5><b>Order Number : </b><span class="s">171-9304673-0314729</span></h5>
                        <h5><b>Order Date : </b><span class="s">27-04-2018</span></h5>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6 text-right">
                        <br/>
                        <h5><b>Invoice Number : </b><span class="s">AMD1-79166</span></h5>
                        <h5><b>Invoice Date : </b><span class="s">27-04-2018</span></h5>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <br/>
                        <div class="table-responsive" style="overflow-x: unset;">
                            <table class="table table-striped table-bordered tbl wraped nova-pagging" >
                                <thead>
                                    <tr>
                                        <th nova-search="yes">No</th>
                                        <th nova-search="yes">Service Name</th>
                                        <th nova-search="yes">Price</th>
                                        <th nova-search="yes">Total Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    foreach($userbill as $bill)
                                    {
                                        $total += $bill->price;
                                    ?>
                                    <tr>
                                        <td>1</td>
                                        <td><?php echo ucwords($bill->name)." Service"; ?></td>
                                        <td><span class="fa fa-inr"></span>&nbsp;<?php echo $bill->price; ?> /-</td>
                                        <td><span class="fa fa-inr"></span>&nbsp;<?php echo $bill->price; ?> /-</td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="3" style="text-align: right!important;"><b>Total Amount</b></td>
                                        <td><span class="fa fa-inr"></span>&nbsp;<?php echo $total; ?> /-</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align: right!important;"><b>Pick & Drop Charges</b></td>
                                        <td><span class="fa fa-inr"></span>&nbsp;<?php if($userbill[0]->pic_drop != "") { echo "100"; } else { echo "-"; } ?> /-</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align: right!important;"><b>Net Amount</b></td>
                                        <?php
                                        $t = $total + 100;
                                        ?>
                                        <td><span class="fa fa-inr"></span>&nbsp;<?php if($userbill[0]->pic_drop != "") { echo $t; } else { echo $total; } ?> /-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-12 text-right">
                        <br/>
                        <h5><b>For AMPKart :</b></h5>
                        <h4>CAR HOUSE</h4>
                        <h6><b>Authorize Signatory</b></h6>
                    </div>
                    </div>
            </section>
        </div>
            
        <?php
        }
        }
    }
    public function fillsearch() 
    {
        $value=$this->input->post('value');
        $data=$this->md->my_query("select * from tbl_car_detail where status = 1 and carname like '%".$value."%' Limit 6");
    ?>
            <div class="panel-body" style="width: 260px;margin-top: -25px;box-shadow: 0 0 10px rgba(0,0,0,0.1);">  
            <br/>
    <?php
        if(count($data) == 0)
        {
    ?>
            <h5 style="padding:3px 2px 11px 2px;border-bottom: 1px solid #ddd;text-align: center;" class="text-capitalize"><b>Not Found</b></h5>
            <div class="text-center" style="cursor: pointer;"><b>Search All Car Of <span style="color: #FF6200;"><?php echo $value; ?></span></span></b></div>
    <?php
        }
        else
        {
             foreach($data as $val)
             {
             ?>
                <h5 onclick="window.location.href='<?php echo base_url();?>Car-Detail/<?php echo $val->car_id;?>'" style="padding:3px 2px 11px 2px;border-bottom: 1px solid #ddd;display: flex;cursor: pointer;" class="text-capitalize"><i class="fa fa-search" style="color: #FF6200;"></i>&nbsp;<span><?php echo ucwords($val->carname);?></span></h5>
             <?php
             }
             ?>
                <div class="text-center" style="cursor: pointer;"><b>Search All Car Of <span style="color: #FF6200;"><?php echo $value; ?></span></span></b></div>
             <?php
        }
        ?>
            </div>
        <?php
    }
    public function filterdata() 
    {
        $car = "";
        $car = "SELECT * from tbl_car_detail where status = 1";
        if($this->input->post('type'))
        {
            $car .= " AND "."type_id = '".$this->input->post('type')."'";
        }
        if($this->input->post('company')!="Loading..." && $this->input->post('company')!="")
        {
            $car .= " AND "."company_id = '".$this->input->post('company')."'";
           
        }
        if($this->input->post('model')!="Loading..." && $this->input->post('model')!="")
        {
            $car .= " AND "."model_id = '".$this->input->post('model')."'";
           
        }
        if($this->input->post('submodel')!="Loading..." && $this->input->post('submodel')!="")
        {
            $car .= " AND "."submodel_id = '".$this->input->post('submodel')."'";
        }
        if($this->input->post('slide'))
        {
            $car .= " AND price <=".$this->input->post('slide');
        }
        $f = $this->md->my_query($car);
        if(count($f) != 0)
        {
        foreach($f as $val)
        {
    ?>
        <div class="col-lg-4 col-md-6 col-xs-12">                  
            <a href="<?php echo base_url(); ?>Car-Detail/<?php echo $val->car_id; ?>" style="text-decoration: none;"><div class="b-items__cell wow zoomInUp" data-wow-delay="0.5s">
                <div class="b-items__cars-one-img">
                    <?php
                         $ii = $this->md->my_select('tbl_car_image', array('car_id' => $val->car_id))[0]->path;
                    ?>
                    <img src="<?php echo base_url().$ii; ?>" style="width: 250px;height: 221px;" title="<?php echo $val->carname; ?>"/>
                    <?php
                    if($val->offer_id != 0)
                    {
                        if($val->offer_id != 0)
                        {
                            $rate = $this->md->my_select('tbl_offer',array('offer_id'=>$val->offer_id[0]));
                    ?>

                    <span class="b-items__cars-one-img-type m-premium"><?php echo $rate[0]->offer_rate; ?>% OFF</span>
                    <?php
                        }
                    }
                    ?>
                    <form method="post">
                        <input type="checkbox" name="check1" id='<?php echo $val->car_id; ?>' value='<?php echo $val->car_id; ?>' class="get"/>
                        <label for="<?php echo $val->car_id; ?>" class="b-items__cars-one-img-check"><span class="fa fa-check"></span></label>
                    </form>
                </div>
                <div class="b-items__cell-info rate">
                    <div class="s-lineDownLeft b-items__cell-info-title">
                        <h2 style="min-height: 10px;text-transform: capitalize;"><?php if(strlen($val->carname) > 0 && strlen($val->carname) < 27) { echo $val->carname; } else { echo $a = substr($val->carname,0,24).'...'; } ?></h2>
                    </div>
                    <p>
                        <?php
                        if($val->offer_id != 0)
                        {
                            $c = $val->price;
                            $a = strlen($c);
                            $ext = "";
                            $number_of_digits = $a;
                            $cc=1;
                            if($a % 2 != 0)
                            {
                            for($i=2;$i<$a;$i++)
                            {
                                $cc.="0";

                            }
                            }
                            else {
                                for($i=1;$i<$a;$i++)
                            {
                                $cc.="0";

                            }
                            }
                            $fraction=$c/$cc;
                            $fraction=number_format($fraction,2);
                            if($number_of_digits==4 ||$number_of_digits==5)
                                $ext="k";
                            if($number_of_digits==6 ||$number_of_digits==7)
                                $ext="Lac";
                            if($number_of_digits==8 ||$number_of_digits==9)
                                $ext="Cr";

                            $rrate = $this->md->my_select('tbl_offer',array('offer_id'=>$val->offer_id))[0]->offer_rate;
                            $oprice = ($val->price - ($val->price * $rrate) / 100 );

                            $op = $oprice;
                            $b = strlen($op);
                            $ext = "";
                            $number_of_digits = $b;
                            $ccc=1;
                            if($b % 2 != 0)
                            {
                            for($i=2;$i<$b;$i++)
                            {
                                $ccc.="0";

                            }
                            }
                            else {
                                for($i=1;$i<$b;$i++)
                            {
                                $ccc.="0";

                            }
                            }
                            $f=$op/$ccc;
                            $f=number_format($f,2);
                            if($number_of_digits==4 ||$number_of_digits==5)
                                $ext="k";
                            if($number_of_digits==6 ||$number_of_digits==7)
                                $ext="Lakh";
                            if($number_of_digits==8 ||$number_of_digits==9)
                                $ext="Cr";
                        ?>
                        <span class="fa fa-inr" style="font-size: 16px;color: #565656;">&nbsp;<?php echo $f." ".$ext; ?> /-</span>
                        <span style="font-size: 16px;color: #565656;float: right;">&nbsp;<strike class="fa fa-inr" >&nbsp;<?php echo $fraction." ".$ext; ?> /-</strike></span>
                        <?php
                        }
                        else
                        {
                            $c = $val->price;
                            $a = strlen($c);
                            $ext = "";
                            $number_of_digits = $a;
                            $cc=1;
                            if($a % 2 != 0)
                            {
                            for($i=2;$i<$a;$i++)
                            {
                                $cc.="0";

                            }
                            }
                            else {
                                for($i=1;$i<$a;$i++)
                            {
                                $cc.="0";

                            }
                            }
                            $fraction=$c/$cc;
                            $fraction=number_format($fraction,2);
                            if($number_of_digits==4 ||$number_of_digits==5)
                                $ext="k";
                            if($number_of_digits==6 ||$number_of_digits==7)
                                $ext="Lac";
                            if($number_of_digits==8 ||$number_of_digits==9)
                                $ext="Cr";
                        ?>
                        <span class="fa fa-inr" style="font-size: 16px;color: #565656;">&nbsp;<?php echo $fraction." ".$ext ?> /-</span>
                        <?php
                        }
                        ?>
                    </p>
                    <?php
                    $drate = $this->md->my_query("select count(*) as cn from tbl_rating where car_id ='".$val->car_id."'")[0]->cn;
                    if($drate == 0)
                    {
                       for($i=1;$i<=5;$i++)
                        {
                    ?>
                        <span class="fa fa-star-o" style="color: #FF6200;font-size: 20px;"></span>

                    <?php
                        }
                    ?>
                        <span class="b-world__item-num" style="background-color:#FF6200 ;color: white" id="hello">0 Rate</span>
                    <?php
                    }
                    else
                    {
                    $ratesum = $this->md->my_query("SELECT SUM(rate) as s FROM tbl_rating WHERE car_id=".$val->car_id)[0]->s;
                    $rateuser = $this->md->my_query("select count(register_id) as c from tbl_rating where car_id=".$val->car_id)[0]->c;
                    $totalrate = round($ratesum / $rateuser);
                    for($i=1;$i<=$totalrate;$i++)
                    {
                    ?>
                    <span class="fa fa-star" style="color: #FF6200;font-size: 20px;"></span>
                    <?php
                    }
                    for($j=$i;$j<=5;$j++)
                    {
                ?>
                <i class="fa fa-star-o" style="color: #FF6200;font-size: 20px;"></i>
                <?php
                    }
                    ?>
                    <span class="b-world__item-num" style="background-color:#FF6200 ;color: white" id="hello"><?php echo $totalrate." Rate"; ?></span>
                    <?php
                    }
                    ?>

                    <div class="row">
                        <?php
                            if($this->session->userdata('userid') != "")
                            {
                        ?>
                        <div class="col-xs-6 col-md-6 <?php echo $val->car_id; ?>">
                            <?php
                                $wishc = $this->md->my_query('select count(*) as c from tbl_wishlist where car_id ="'.$val->car_id.'" and register_id = "'.$this->session->userdata('userid').'"')[0]->c;
                                if($wishc == 0)
                                {
                            ?>
                            <a class="btn m-btn" style="margin-top: 16px;" onclick="addwish(<?php echo $val->car_id; ?>)" title="Add Wishlist">ADD WISH<span class="fa fa-angle-right"></span></a>
                            <?php
                                }
                                else
                                {
                            ?>
                            <a class="btn m-btn" style="margin-top: 16px;background-color: #565656;color: #fff;" title="Added To Wish">ADDED WISH<span class="fa fa-angle-right" style='background-color:white;color:#000;'></span></a>
                            <?php
                                }
                            ?>
                        </div>
                        <?php
                            }
                            else
                            {
                        ?>
                        <div class="col-xs-6 col-md-6">
                            <a href="<?php echo base_url(); ?>Login" class="btn m-btn" style="margin-top: 16px;">ADD WISH<span class="fa fa-angle-right"></span></a>
                        </div>
                        <?php
                            }
                        ?>
                        <div class="col-xs-6 col-md-6" style="padding-left: 8px;">
                                <a href="<?php echo base_url(); ?>Car-Detail/<?php echo $val->car_id; ?>" class="btn m-btn" style="margin-top: 16px;">VIEW DETAIL<span class="fa fa-angle-right"></span></a>
                        </div>
                    </div>
                </div>
                </div></a>
        </div>   
    <?php
        }
        }
        else
        {
        ?>
            <div class="text-center">
                <img src="<?php echo base_url(); ?>visitor/images/search.gif" title="Car Is Not Found" style="margin-top: 70px;"/>
            </div>
        <?php
        }
        ?>
         <script>
            $(".get").click(function () {
                $id1 = $(this).attr('value');
                $id2 = $("#compare").attr('href');
                $url = $id2+"/"+$id1;
                $("#compare").attr('href',$url);
            });
        </script>
        <?php
    }
    public function filterdatalist() 
    {
        $carlist = "";
        $carlist = "SELECT * from tbl_car_detail where status = 1";
        if($this->input->post('type'))
        {
            $carlist .= " AND "."type_id = '".$this->input->post('type')."'";
        }
        if($this->input->post('company')!="Loading..." && $this->input->post('company')!="")
        {
            $carlist .= " AND "."company_id = '".$this->input->post('company')."'";
           
        }
        if($this->input->post('model')!="Loading..." && $this->input->post('model')!="")
        {
            $carlist .= " AND "."model_id = '".$this->input->post('model')."'";
           
        }
        if($this->input->post('submodel')!="Loading..." && $this->input->post('submodel')!="")
        {
            $carlist .= " AND "."submodel_id = '".$this->input->post('submodel')."'";
           
        }
        if($this->input->post('slide'))
        {
            $carlist .= " AND price <=".$this->input->post('slide');
           
        }
        $ff = $this->md->my_query($carlist);
        if(count($ff) != 0)
        {
        ?>
            <div class="col-lg-9 col-sm-8 col-xs-12" id="sort">
                <div class="b-items__cars">
        <?php
        foreach($ff as $val)
        {
            
    ?>
        <div class="b-items__cars-one">
            <div class="b-items__cars-one-img">
                <?php
                         $ii = $this->md->my_select('tbl_car_image', array('car_id' => $val->car_id))[0]->path;
                ?>
                <img src="<?php echo base_url().$ii; ?>" style="width: 237px;height: 202px;" title="<?php echo $val->carname; ?>"/>
                <?php
                    if($val->offer_id != 0)
                    {
                        if($val->offer_id != 0)
                        {
                            $rate = $this->md->my_select('tbl_offer',array('offer_id'=>$val->offer_id[0]));
                    ?>
                    <span class="b-items__cars-one-img-type m-premium"><?php echo $rate[0]->offer_rate; ?>% OFF</span>
                    <?php
                        }
                    }
                ?>
            </div>
            <div class="b-items__cars-one-info">
                <form class="b-items__cars-one-info-header s-lineDownLeft">
                    <h2><?php echo ucwords($val->carname); ?></h2>
                    <input type="checkbox" name="check1" id='<?php echo $val->car_id; ?>' value='<?php echo $val->car_id; ?>' class="get"/>
                    <label for="<?php echo $val->car_id; ?>" class="b-items__cars-one-img-check"><span class="fa fa-check"></span></label>
                </form>
                <div class="row s-noRightMargin">
                    <div class="col-md-8 col-xs-12 text-justify">
                        <p><?php if(strlen($val->description) > 0 && strlen($val->description) < 27) { echo $val->description; } else { echo $a = substr($val->description,0,120).'...'; }?></p>
                        <div class="m-width row m-smallPadding">
                            <div class="col-xs-9">
                                <div class="row m-smallPadding">
                                    <div class="col-xs-6">
                                        <?php
                                        $drate = $this->md->my_query("select count(*) as cn from tbl_rating where car_id ='".$val->car_id."'")[0]->cn;
                                        if($drate == 0)
                                        {
                                            for($i=1;$i<=5;$i++)
                                            {
                                        ?>
                                            <span class="fa fa-star-o" style="color: #FF6200;font-size: 20px;"></span>

                                        <?php
                                            }
                                        }
                                        else
                                        {
                                            $ratesum = $this->md->my_query("SELECT SUM(rate) as s FROM tbl_rating WHERE car_id=".$val->car_id)[0]->s;
                                            $rateuser = $this->md->my_query("select count(register_id) as c from tbl_rating where car_id=".$val->car_id)[0]->c;
                                            $totalrate = round($ratesum / $rateuser);
                                            for($i=1;$i<=$totalrate;$i++)
                                            {
                                            ?>
                                            <span class="fa fa-star" style="color: #FF6200;font-size: 20px;"></span>
                                            <?php
                                            }
                                            for($j=$i;$j<=5;$j++)
                                            {
                                        ?>
                                        <i class="fa fa-star-o" style="color: #FF6200;font-size: 20px;"></i>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12" style="top:25px;">
                        <div class="b-items__cars-one-info-price">
                            <?php
                            if($val->offer_id != 0)
                            {
                                $c = $val->price;
                                $a = strlen($c);
                                $ext = "";
                                $number_of_digits = $a;
                                $cc=1;
                                if($a % 2 != 0)
                                {
                                for($i=2;$i<$a;$i++)
                                {
                                    $cc.="0";

                                }
                                }
                                else {
                                    for($i=1;$i<$a;$i++)
                                {
                                    $cc.="0";

                                }
                                }
                                $fraction=$c/$cc;
                                $fraction=number_format($fraction,2);
                                if($number_of_digits==4 ||$number_of_digits==5)
                                    $ext="k";
                                if($number_of_digits==6 ||$number_of_digits==7)
                                    $ext="Lac";
                                if($number_of_digits==8 ||$number_of_digits==9)
                                    $ext="Cr";

                                $rrate = $this->md->my_select('tbl_offer',array('offer_id'=>$val->offer_id))[0]->offer_rate;
                            $oprice = ($val->price - ($val->price * $rrate) / 100 );

                            $op = $oprice;
                            $b = strlen($op);
                            $ext = "";
                            $number_of_digits = $b;
                            $ccc=1;
                            if($b % 2 != 0)
                            {
                            for($i=2;$i<$b;$i++)
                            {
                                $ccc.="0";

                            }
                            }
                            else {
                                for($i=1;$i<$b;$i++)
                            {
                                $ccc.="0";

                            }
                            }
                            $f=$op/$ccc;
                            $f=number_format($f,2);
                            if($number_of_digits==4 ||$number_of_digits==5)
                                $ext="k";
                            if($number_of_digits==6 ||$number_of_digits==7)
                                $ext="Lakh";
                            if($number_of_digits==8 ||$number_of_digits==9)
                                $ext="Cr";
                            ?>
                            <div class="pull-right">
                                <h3>Price:</h3>
                                <h4 style="font-weight: normal;font-size: 22px;"><span class="fa fa-inr"></span>&nbsp;<?php echo $f." ".$ext; ?></h4>
                                <h4><strike class="fa fa-inr">&nbsp;<?php echo $fraction." ".$ext; ?></strike></h4>
                            </div>
                            <?php
                            }
                            else
                            {
                                $c = $val->price;
                                $a = strlen($c);
                                $ext = "";
                                $number_of_digits = $a;
                                $cc=1;
                                if($a % 2 != 0)
                                {
                                for($i=2;$i<$a;$i++)
                                {
                                    $cc.="0";

                                }
                                }
                                else {
                                    for($i=1;$i<$a;$i++)
                                {
                                    $cc.="0";

                                }
                                }
                                $fraction=$c/$cc;
                                $fraction=number_format($fraction,2);
                                if($number_of_digits==4 ||$number_of_digits==5)
                                    $ext="k";
                                if($number_of_digits==6 ||$number_of_digits==7)
                                    $ext="Lakh";
                                if($number_of_digits==8 ||$number_of_digits==9)
                                    $ext="Cr";
                            ?>
                            <div class="pull-right">
                                <h3>Price:</h3>
                                <h4><span class="fa fa-inr"></span>&nbsp;<?php echo $fraction." ".$ext; ?></h4>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <div class="col-md-12 text-right">
                    <?php
                        if($this->session->userdata('userid') != "")
                        {
                    ?>
                    <span class="<?php echo $val->car_id; ?>">
                        <?php
                            $wishc = $this->md->my_query('select count(*) as c from tbl_wishlist where car_id ="'.$val->car_id.'" and register_id = "'.$this->session->userdata('userid').'"')[0]->c;
                            if($wishc == 0)
                            {
                        ?>
                        <a class="btn m-btn" style="margin-top: 16px;" onclick="addwish(<?php echo $val->car_id; ?>)" title="Add Wishlist">ADD WISH<span class="fa fa-angle-right"></span></a>
                        <?php
                            }
                            else
                            {
                        ?>
                        <a class="btn m-btn" style="margin-top: 16px;background-color: #565656;color: #fff;" title="Added To Wish">ADDED WISH<span class="fa fa-angle-right" style='background-color:white;color:#000;'></span></a>
                        <?php
                            }
                        ?>
                    </span>
                    <?php
                        }
                        else
                        {
                    ?>
                    <a href="<?php echo base_url(); ?>Login" class="btn m-btn" style="margin-top: 16px;">ADD WISH<span class="fa fa-angle-right"></span></a>
                    <?php
                        }
                    ?>
                    <a href="<?php echo base_url(); ?>Car-Detail/<?php echo $val->car_id; ?>" class="btn m-btn" style="margin-top: 16px;">VIEW DETAILS<span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
        ?>
                </div>
            </div>
        <script>
            $(".get").click(function () {
                $id1 = $(this).attr('value');
                $id2 = $("#compare").attr('href');
                $url = $id2+"/"+$id1;
                $("#compare").attr('href',$url);
            });
        </script>
        <?php
        }
        else
        {
        ?>
            <div class="text-center">
                <img src="<?php echo base_url(); ?>visitor/images/search.gif" title="Car Is Not Found" style="margin-top: 70px;"/>
            </div>
        <?php
        }
    }
    public function viewmore()
    {
        $segtwo=$this->input->post('id');
        $ac=$this->input->post('action');
        $limit=$this->input->post('limit');
        if($segtwo == 0)
        {
        
        $product = $this->md->my_query("select * from tbl_car_detail where status = '1' ORDER BY car_id DESC");
        $l=0;
        foreach($product as $val)
        {
            $l++;
            if($l <= $limit)
            {

        ?>
            <div class="col-lg-4 col-md-6 col-xs-12">                  
            <a href="<?php echo base_url(); ?>Car-Detail/<?php echo $val->car_id; ?>" style="text-decoration: none;"><div class="b-items__cell">
                <div class="b-items__cars-one-img">
                    <?php
                         $ii = $this->md->my_select('tbl_car_image', array('car_id' => $val->car_id))[0]->path;
                    ?>
                    <img src="<?php echo base_url().$ii; ?>" style="width: 250px;height: 221px;" title="<?php echo $val->carname; ?>"/>
                    <?php
                    if($val->offer_id != 0)
                    {
                        if($val->offer_id != 0)
                        {
                            $rate = $this->md->my_select('tbl_offer',array('offer_id'=>$val->offer_id[0]));
                    ?>

                    <span class="b-items__cars-one-img-type m-premium"><?php echo $rate[0]->offer_rate; ?>% OFF</span>
                    <?php
                        }
                    }
                    ?>
                    <form method="post">
                        <input type="checkbox" name="check1" id='<?php echo $val->car_id; ?>' value='<?php echo $val->car_id; ?>' class="get"/>
                        <label for="<?php echo $val->car_id; ?>" class="b-items__cars-one-img-check"><span class="fa fa-check"></span></label>
                    </form>
                </div>
                <div class="b-items__cell-info rate">
                    <div class="s-lineDownLeft b-items__cell-info-title">
                        <h2 style="min-height: 10px;text-transform: capitalize;"><?php if(strlen($val->carname) > 0 && strlen($val->carname) < 27) { echo $val->carname; } else { echo $a = substr($val->carname,0,24).'...'; } ?></h2>
                    </div>
                    <p>
                        <?php
                        if($val->offer_id != 0)
                        {
                            $c = $val->price;
                            $a = strlen($c);
                            $ext = "";
                            $number_of_digits = $a;
                            $cc=1;
                            if($a % 2 != 0)
                            {
                            for($i=2;$i<$a;$i++)
                            {
                                $cc.="0";

                            }
                            }
                            else {
                                for($i=1;$i<$a;$i++)
                            {
                                $cc.="0";

                            }
                            }
                            $fraction=$c/$cc;
                            $fraction=number_format($fraction,2);
                            if($number_of_digits==4 ||$number_of_digits==5)
                                $ext="k";
                            if($number_of_digits==6 ||$number_of_digits==7)
                                $ext="Lac";
                            if($number_of_digits==8 ||$number_of_digits==9)
                                $ext="Cr";

                            $rrate = $this->md->my_select('tbl_offer',array('offer_id'=>$val->offer_id))[0]->offer_rate;
                            $oprice = ($val->price - ($val->price * $rrate) / 100 );

                            $op = $oprice;
                            $b = strlen($op);
                            $ext = "";
                            $number_of_digits = $b;
                            $ccc=1;
                            if($b % 2 != 0)
                            {
                            for($i=2;$i<$b;$i++)
                            {
                                $ccc.="0";

                            }
                            }
                            else {
                                for($i=1;$i<$b;$i++)
                            {
                                $ccc.="0";

                            }
                            }
                            $f=$op/$ccc;
                            $f=number_format($f,2);
                            if($number_of_digits==4 ||$number_of_digits==5)
                                $ext="k";
                            if($number_of_digits==6 ||$number_of_digits==7)
                                $ext="Lakh";
                            if($number_of_digits==8 ||$number_of_digits==9)
                                $ext="Cr";
                        ?>
                        <span class="fa fa-inr" style="font-size: 16px;color: #565656;">&nbsp;<?php echo $f." ".$ext; ?> /-</span>
                        <span style="font-size: 16px;color: #565656;float: right;">&nbsp;<strike class="fa fa-inr" >&nbsp;<?php echo $fraction." ".$ext; ?> /-</strike></span>
                        <?php
                        }
                        else
                        {
                            $c = $val->price;
                            $a = strlen($c);
                            $ext = "";
                            $number_of_digits = $a;
                            $cc=1;
                            if($a % 2 != 0)
                            {
                            for($i=2;$i<$a;$i++)
                            {
                                $cc.="0";

                            }
                            }
                            else {
                                for($i=1;$i<$a;$i++)
                            {
                                $cc.="0";

                            }
                            }
                            $fraction=$c/$cc;
                            $fraction=number_format($fraction,2);
                            if($number_of_digits==4 ||$number_of_digits==5)
                                $ext="k";
                            if($number_of_digits==6 ||$number_of_digits==7)
                                $ext="Lakh";
                            if($number_of_digits==8 ||$number_of_digits==9)
                                $ext="Cr";
                        ?>
                        <span class="fa fa-inr" style="font-size: 16px;color: #565656;">&nbsp;<?php echo $fraction." ".$ext ?> /-</span>
                        <?php
                        }
                        ?>
                    </p>
                    <?php
                    $drate = $this->md->my_query("select count(*) as cn from tbl_rating where car_id ='".$val->car_id."'")[0]->cn;
                    if($drate == 0)
                    {
                       for($i=1;$i<=5;$i++)
                        {
                    ?>
                        <span class="fa fa-star-o" style="color: #FF6200;font-size: 20px;"></span>

                    <?php
                        }
                    ?>
                        <span class="b-world__item-num" style="background-color:#FF6200 ;color: white" id="hello">0 Rate</span>
                    <?php
                    }
                    else
                    {
                    $ratesum = $this->md->my_query("SELECT SUM(rate) as s FROM tbl_rating WHERE car_id=".$val->car_id)[0]->s;
                    $rateuser = $this->md->my_query("select count(register_id) as c from tbl_rating where car_id=".$val->car_id)[0]->c;
                    $totalrate = round($ratesum / $rateuser);
                    for($i=1;$i<=$totalrate;$i++)
                    {
                    ?>
                    <span class="fa fa-star" style="color: #FF6200;font-size: 20px;"></span>
                    <?php
                    }
                    for($j=$i;$j<=5;$j++)
                    {
                ?>
                <i class="fa fa-star-o" style="color: #FF6200;font-size: 20px;"></i>
                <?php
                    }
                    ?>
                    <span class="b-world__item-num" style="background-color:#FF6200 ;color: white" id="hello"><?php echo $totalrate." Rate"; ?></span>
                    <?php
                    }
                    ?>

                    <div class="row">
                        <?php
                            if($this->session->userdata('userid') != "")
                            {
                        ?>
                        <div class="col-xs-6 col-md-6 <?php echo $val->car_id; ?>">
                            <?php
                                $wishc = $this->md->my_query('select count(*) as c from tbl_wishlist where car_id ="'.$val->car_id.'" and register_id = "'.$this->session->userdata('userid').'"')[0]->c;
                                if($wishc == 0)
                                {
                            ?>
                            <a class="btn m-btn" style="margin-top: 16px;" onclick="addwish(<?php echo $val->car_id; ?>)" title="Add Wishlist">ADD WISH<span class="fa fa-angle-right"></span></a>
                            <?php
                                }
                                else
                                {
                            ?>
                            <a class="btn m-btn" style="margin-top: 16px;background-color: #565656;color: #fff;" title="Added To Wish">ADDED WISH<span class="fa fa-angle-right" style='background-color:white;color:#000;'></span></a>
                            <?php
                                }
                            ?>
                        </div>
                        <?php
                            }
                            else
                            {
                        ?>
                        <div class="col-xs-6 col-md-6">
                            <a href="<?php echo base_url(); ?>Login" class="btn m-btn" style="margin-top: 16px;">ADD WISH<span class="fa fa-angle-right"></span></a>
                        </div>
                        <?php
                            }
                        ?>
                        <div class="col-xs-6 col-md-6" style="padding-left: 8px;">
                                <a href="<?php echo base_url(); ?>Car-Detail/<?php echo $val->car_id; ?>" class="btn m-btn" style="margin-top: 16px;">VIEW DETAIL<span class="fa fa-angle-right"></span></a>
                        </div>
                    </div>
                </div>
                </div></a>
        </div>   
       <?php
            }
        }
        if(count($product)>9)
        {
            if(count($product)>$limit)
            {
                $limit +=3;
        ?>   
                <div class="text-center">
                    <img src="<?php echo base_url(); ?>visitor/images/loading.gif" title="View More" onmouseenter="viewmore(0,<?php echo $limit;?>)" style="width: 200px;height: 200px;"/>
                </div>
            <?php
            }
            else
            {
                $limit -=3;
            ?>   
                <div class="text-center">
                    <button type="button" class="btn btn-danger" onmouseenter="viewmore(0,<?php echo $limit;?>)">View Less</button>
                </div>
            <?php
            }
        }
        }
        else
        {
            $dhaval="";
            $id = $this->uri->segment(2);
            $action = $this->uri->segment(3);
            if($action == 'type')
            {
                $dhaval = "select * from tbl_car_detail where type_id= '".$id."'";
            }
            if($action == 'company')
            {
                $dhaval = "select * from tbl_car_detail where company_id= '".$id."'";
            }
            if($action == 'model')
            {
                $dhaval = "select * from tbl_car_detail where model_id= '".$id."'";
            }
            if($action == 'submodel')
            {
                $dhaval = "select * from tbl_car_detail where submodel_id= '".$id."'";
            }
            $datafilter = $this->md->my_query($dhaval);
            foreach($datafilter as $val)
            {
        ?>
            <div class="col-lg-4 col-md-6 col-xs-12">
                <a href="<?php echo base_url(); ?>Car-Detail/<?php echo $val->car_id; ?>" style="text-decoration: none;"><div class="b-items__cell wow zoomInUp" >
                    <div class="b-items__cars-one-img">
                        <?php
                             $ii = $this->md->my_select('tbl_car_image', array('car_id' => $val->car_id))[0]->path;
                        ?>
                        <img src="<?php echo base_url().$ii; ?>" style="width: 250px;height: 221px;" title="<?php echo $val->carname; ?>"/>
                        <?php
                        if($val->offer_id != 0)
                        {
                            if($val->offer_id != 0)
                            {
                                $rate = $this->md->my_select('tbl_offer',array('offer_id'=>$val->offer_id[0]));
                        ?>

                        <span class="b-items__cars-one-img-type m-premium"><?php echo $rate[0]->offer_rate; ?>% OFF</span>
                        <?php
                            }
                        }
                        ?>
                        <form method="post">
                            <input type="checkbox" name="check1" id='<?php echo $val->car_id; ?>' value='<?php echo $val->car_id; ?>' class="get"/>
                            <label for="<?php echo $val->car_id; ?>" class="b-items__cars-one-img-check"><span class="fa fa-check"></span></label>
                        </form>
                    </div>
                    <div class="b-items__cell-info rate">
                        <div class="s-lineDownLeft b-items__cell-info-title">
                            <h2 style="min-height: 10px;text-transform: capitalize;"><?php if(strlen($val->carname) > 0 && strlen($val->carname) < 27) { echo $val->carname; } else { echo $a = substr($val->carname,0,24).'...'; } ?></h2>
                        </div>
                        <p>
                            <?php
                            if($val->offer_id != 0)
                            {
                                $c = $val->price;
                                $a = strlen($c);
                                $ext = "";
                                $number_of_digits = $a;
                                $cc=1;
                                if($a % 2 != 0)
                                {
                                for($i=2;$i<$a;$i++)
                                {
                                    $cc.="0";

                                }
                                }
                                else {
                                    for($i=1;$i<$a;$i++)
                                {
                                    $cc.="0";

                                }
                                }
                                $fraction=$c/$cc;
                                $fraction=number_format($fraction,2);
                                if($number_of_digits==4 ||$number_of_digits==5)
                                    $ext="k";
                                if($number_of_digits==6 ||$number_of_digits==7)
                                    $ext="Lac";
                                if($number_of_digits==8 ||$number_of_digits==9)
                                    $ext="Cr";

                                $rrate = $this->md->my_select('tbl_offer',array('offer_id'=>$val->offer_id))[0]->offer_rate;
                                $oprice = ($val->price - ($val->price * $rrate) / 100 );

                                $op = $oprice;
                                $b = strlen($op);
                                $ext = "";
                                $number_of_digits = $b;
                                $ccc=1;
                                if($b % 2 != 0)
                                {
                                for($i=2;$i<$b;$i++)
                                {
                                    $ccc.="0";

                                }
                                }
                                else {
                                    for($i=1;$i<$b;$i++)
                                {
                                    $ccc.="0";

                                }
                                }
                                $f=$op/$ccc;
                                $f=number_format($f,2);
                                if($number_of_digits==4 ||$number_of_digits==5)
                                    $ext="k";
                                if($number_of_digits==6 ||$number_of_digits==7)
                                    $ext="Lakh";
                                if($number_of_digits==8 ||$number_of_digits==9)
                                    $ext="Cr";
                            ?>
                            <span class="fa fa-inr" style="font-size: 16px;color: #565656;">&nbsp;<?php echo $f." ".$ext; ?> /-</span>
                            <span style="font-size: 16px;color: #565656;float: right;">&nbsp;<strike class="fa fa-inr" >&nbsp;<?php echo $fraction." ".$ext; ?> /-</strike></span>
                            <?php
                            }
                            else
                            {
                                $c = $val->price;
                                $a = strlen($c);
                                $ext = "";
                                $number_of_digits = $a;
                                $cc=1;
                                if($a % 2 != 0)
                                {
                                for($i=2;$i<$a;$i++)
                                {
                                    $cc.="0";

                                }
                                }
                                else {
                                    for($i=1;$i<$a;$i++)
                                {
                                    $cc.="0";

                                }
                                }
                                $fraction=$c/$cc;
                                $fraction=number_format($fraction,2);
                                if($number_of_digits==4 ||$number_of_digits==5)
                                    $ext="k";
                                if($number_of_digits==6 ||$number_of_digits==7)
                                    $ext="Lac";
                                if($number_of_digits==8 ||$number_of_digits==9)
                                    $ext="Cr";
                            ?>
                            <span class="fa fa-inr" style="font-size: 16px;color: #565656;">&nbsp;<?php echo $fraction." ".$ext ?> /-</span>
                            <?php
                            }
                            ?>
                        </p>
                        <?php
                        $drate = $this->md->my_query("select count(*) as cn from tbl_rating where car_id ='".$val->car_id."'")[0]->cn;
                        if($drate == 0)
                        {
                           for($i=1;$i<=5;$i++)
                            {
                        ?>
                            <span class="fa fa-star-o" style="color: #FF6200;font-size: 20px;"></span>

                        <?php
                            }
                        ?>
                            <span class="b-world__item-num" style="background-color:#FF6200 ;color: white" id="hello">0 Rate</span>
                        <?php
                        }
                        else
                        {
                        $ratesum = $this->md->my_query("SELECT SUM(rate) as s FROM tbl_rating WHERE car_id=".$val->car_id)[0]->s;
                        $rateuser = $this->md->my_query("select count(register_id) as c from tbl_rating where car_id=".$val->car_id)[0]->c;
                        $totalrate = round($ratesum / $rateuser);
                        for($i=1;$i<=$totalrate;$i++)
                        {
                        ?>
                        <span class="fa fa-star" style="color: #FF6200;font-size: 20px;"></span>
                        <?php
                        }
                        for($j=$i;$j<=5;$j++)
                        {
                    ?>
                    <i class="fa fa-star-o" style="color: #FF6200;font-size: 20px;"></i>
                    <?php
                        }
                        ?>
                        <span class="b-world__item-num" style="background-color:#FF6200 ;color: white" id="hello"><?php echo $totalrate." Rate"; ?></span>
                        <?php
                        }
                        ?>

                        <div class="row">
                            <?php
                                if($this->session->userdata('userid') != "")
                                {
                            ?>
                            <div class="col-xs-6 col-md-6"><?php echo $val->car_id; ?>">
                                <?php
                                    $wishc = $this->md->my_query('select count(*) as c from tbl_wishlist where car_id ="'.$val->car_id.'" and register_id = "'.$this->session->userdata('userid').'"')[0]->c;
                                    if($wishc == 0)
                                    {
                                ?>
                                <a class="btn m-btn" style="margin-top: 16px;" onclick="addwish(<?php echo $val->car_id; ?>)" title="Add Wishlist">ADD WISH<span class="fa fa-angle-right"></span></a>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                <a class="btn m-btn" style="margin-top: 16px;background-color: #565656;color: #fff;" title="Added To Wish">ADDED WISH<span class="fa fa-angle-right" style='background-color:white;color:#000;'></span></a>
                                <?php
                                    }
                                ?>
                            </div>
                            <?php
                                }
                                else
                                {
                            ?>
                            <div class="col-xs-6 col-md-6">
                                <a href="<?php echo base_url(); ?>Login" class="btn m-btn" style="margin-top: 16px;">ADD WISH<span class="fa fa-angle-right"></span></a>
                            </div>
                            <?php
                                }
                            ?>
                            <div class="col-xs-6 col-md-6" style="padding-left: 8px;">
                                    <a href="<?php echo base_url(); ?>Car-Detail/<?php echo $val->car_id; ?>" class="btn m-btn" style="margin-top: 16px;">VIEW DETAIL<span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                    </div></a>
            </div>
        <?php
            }
        }
        ?>
        <script>
            $(".get").click(function () {
                $id1 = $(this).attr('value');
                $id2 = $("#compare").attr('href');
                $url = $id2+"/"+$id1;
                $("#compare").attr('href',$url);
            });
        </script>
        <?php
    }
    public function listvie()
    {
        $limit=$this->input->post('limit');
        $product = $this->md->my_query("select * from tbl_car_detail where status = '1' ORDER BY car_id DESC");
        $nn=0;
        ?>
            <div class="col-lg-9 col-sm-8 col-xs-12" id="sort">
                <div class="b-items__cars">
        <?php
        foreach($product as $val)
        {
            $nn++;
            if($nn <= $limit)
            {
        ?>
                    <div class="b-items__cars-one">
                        <div class="b-items__cars-one-img">
                            <?php
                                     $ii = $this->md->my_select('tbl_car_image', array('car_id' => $val->car_id))[0]->path;
                            ?>
                            <img src="<?php echo base_url().$ii; ?>" style="width: 237px;height: 202px;" title="<?php echo $val->carname; ?>"/>
                            <?php
                                if($val->offer_id != 0)
                                {
                                    if($val->offer_id != 0)
                                    {
                                        $rate = $this->md->my_select('tbl_offer',array('offer_id'=>$val->offer_id[0]));
                                ?>
                                <span class="b-items__cars-one-img-type m-premium"><?php echo $rate[0]->offer_rate; ?>% OFF</span>
                                <?php
                                    }
                                }
                            ?>
                        </div>
                        <div class="b-items__cars-one-info">
                            <form class="b-items__cars-one-info-header s-lineDownLeft">
                                <h2><?php echo ucwords($val->carname); ?></h2>
                                <input type="checkbox" name="check1" id='<?php echo $val->car_id; ?>' value='<?php echo $val->car_id; ?>' class="get"/>
                                <label for="<?php echo $val->car_id; ?>" class="b-items__cars-one-img-check"><span class="fa fa-check"></span></label>
                            </form>
                            <div class="row s-noRightMargin">
                                <div class="col-md-8 col-xs-12 text-justify">
                                    <p><?php if(strlen($val->description) > 0 && strlen($val->description) < 27) { echo $val->description; } else { echo $a = substr($val->description,0,120).'...'; }?></p>
                                    <div class="m-width row m-smallPadding">
                                        <div class="col-xs-9">
                                            <div class="row m-smallPadding">
                                                <div class="col-xs-6">
                                                    <?php
                                                    $drate = $this->md->my_query("select count(*) as cn from tbl_rating where car_id ='".$val->car_id."'")[0]->cn;
                                                    if($drate == 0)
                                                    {
                                                        for($i=1;$i<=5;$i++)
                                                        {
                                                    ?>
                                                        <span class="fa fa-star-o" style="color: #FF6200;font-size: 20px;"></span>

                                                    <?php
                                                        }
                                                    }
                                                    else
                                                    {
                                                        $ratesum = $this->md->my_query("SELECT SUM(rate) as s FROM tbl_rating WHERE car_id=".$val->car_id)[0]->s;
                                                        $rateuser = $this->md->my_query("select count(register_id) as c from tbl_rating where car_id=".$val->car_id)[0]->c;
                                                        $totalrate = round($ratesum / $rateuser);
                                                        for($i=1;$i<=$totalrate;$i++)
                                                        {
                                                        ?>
                                                        <span class="fa fa-star" style="color: #FF6200;font-size: 20px;"></span>
                                                        <?php
                                                        }
                                                        for($j=$i;$j<=5;$j++)
                                                        {
                                                    ?>
                                                    <i class="fa fa-star-o" style="color: #FF6200;font-size: 20px;"></i>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-12" style="top:25px;">
                                    <div class="b-items__cars-one-info-price">
                                        <?php
                                        if($val->offer_id != 0)
                                        {
                                            $c = $val->price;
                                            $a = strlen($c);
                                            $ext = "";
                                            $number_of_digits = $a;
                                            $cc=1;
                                            if($a % 2 != 0)
                                            {
                                            for($i=2;$i<$a;$i++)
                                            {
                                                $cc.="0";

                                            }
                                            }
                                            else {
                                                for($i=1;$i<$a;$i++)
                                            {
                                                $cc.="0";

                                            }
                                            }
                                            $fraction=$c/$cc;
                                            $fraction=number_format($fraction,2);
                                            if($number_of_digits==4 ||$number_of_digits==5)
                                                $ext="k";
                                            if($number_of_digits==6 ||$number_of_digits==7)
                                                $ext="Lac";
                                            if($number_of_digits==8 ||$number_of_digits==9)
                                                $ext="Cr";

                                            $rrate = $this->md->my_select('tbl_offer',array('offer_id'=>$val->offer_id))[0]->offer_rate;
                                        $oprice = ($val->price - ($val->price * $rrate) / 100 );

                                        $op = $oprice;
                                        $b = strlen($op);
                                        $ext = "";
                                        $number_of_digits = $b;
                                        $ccc=1;
                                        if($b % 2 != 0)
                                        {
                                        for($i=2;$i<$b;$i++)
                                        {
                                            $ccc.="0";

                                        }
                                        }
                                        else {
                                            for($i=1;$i<$b;$i++)
                                        {
                                            $ccc.="0";

                                        }
                                        }
                                        $f=$op/$ccc;
                                        $f=number_format($f,2);
                                        if($number_of_digits==4 ||$number_of_digits==5)
                                            $ext="k";
                                        if($number_of_digits==6 ||$number_of_digits==7)
                                            $ext="Lakh";
                                        if($number_of_digits==8 ||$number_of_digits==9)
                                            $ext="Cr";
                                        ?>
                                        <div class="pull-right">
                                            <h3>Price:</h3>
                                            <h4 style="font-weight: normal;font-size: 22px;"><span class="fa fa-inr"></span>&nbsp;<?php echo $f." ".$ext; ?></h4>
                                            <h4><strike class="fa fa-inr">&nbsp;<?php echo $fraction." ".$ext; ?></strike></h4>
                                        </div>
                                        <?php
                                        }
                                        else
                                        {
                                            $c = $val->price;
                                            $a = strlen($c);
                                            $ext = "";
                                            $number_of_digits = $a;
                                            $cc=1;
                                            if($a % 2 != 0)
                                            {
                                            for($i=2;$i<$a;$i++)
                                            {
                                                $cc.="0";

                                            }
                                            }
                                            else {
                                                for($i=1;$i<$a;$i++)
                                            {
                                                $cc.="0";

                                            }
                                            }
                                            $fraction=$c/$cc;
                                            $fraction=number_format($fraction,2);
                                            if($number_of_digits==4 ||$number_of_digits==5)
                                                $ext="k";
                                            if($number_of_digits==6 ||$number_of_digits==7)
                                                $ext="Lakh";
                                            if($number_of_digits==8 ||$number_of_digits==9)
                                                $ext="Cr";
                                        ?>
                                        <div class="pull-right">
                                            <h3>Price:</h3>
                                            <h4><span class="fa fa-inr"></span>&nbsp;<?php echo $fraction." ".$ext; ?></h4>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="col-md-12 text-right">
                                <?php
                                    if($this->session->userdata('userid') != "")
                                    {
                                ?>
                                <span class="<?php echo $val->car_id; ?>">
                                    <?php
                                        $wishc = $this->md->my_query('select count(*) as c from tbl_wishlist where car_id ="'.$val->car_id.'" and register_id = "'.$this->session->userdata('userid').'"')[0]->c;
                                        if($wishc == 0)
                                        {
                                    ?>
                                    <a class="btn m-btn" style="margin-top: 16px;" onclick="addwish(<?php echo $val->car_id; ?>)" title="Add Wishlist">ADD WISH<span class="fa fa-angle-right"></span></a>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                    <a class="btn m-btn" style="margin-top: 16px;background-color: #565656;color: #fff;" title="Added To Wish">ADDED WISH<span class="fa fa-angle-right" style='background-color:white;color:#000;'></span></a>
                                    <?php
                                        }
                                    ?>
                                </span>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                <a href="<?php echo base_url(); ?>Login" class="btn m-btn" style="margin-top: 16px;">ADD WISH<span class="fa fa-angle-right"></span></a>
                                <?php
                                    }
                                ?>
                                <a href="<?php echo base_url(); ?>Car-Detail/<?php echo $val->car_id; ?>" class="btn m-btn" style="margin-top: 16px;">VIEW DETAILS<span class="fa fa-angle-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
       <?php
            }
        }
        ?>
             </div>
        </div>  
        <script>
            $(".get").click(function () {
                $id1 = $(this).attr('value');
                $id2 = $("#compare").attr('href');
                $url = $id2+"/"+$id1;
                $("#compare").attr('href',$url);
            });
        </script>
        <?php
        if(count($product)>9)
        {
            if(count($product)>$limit)
            {
                $limit +=3;
        ?>   
                <div class="col-md-12 text-center">
                    <br/>
                    <img src="<?php echo base_url(); ?>visitor/images/loading.gif" title="View More" onmouseenter="viewmorelist(<?php echo $limit;?>)" style="width: 200px;height: 200px;"/>
                </div>
            <?php
            }
            else
            {
                $limit -=3;
            ?>   
                <div class="col-md-12 text-center">
                    <button type="button" class="btn btn-danger" onmouseenter="viewmorelist(<?php echo $limit;?>)">View Less</button>
                </div>
            <?php
            }
        }
    }
    public function chat()
    {
        $data['registration_id'] = $this->session->userdata('userid');
        $data['message'] = $this->input->post('msg');
        $data['date'] = date('Y-m-d h:i:s');

        $r = $this->md->my_insert('tbl_chat',$data);
        echo $r;
    }
    public function chatshow()
    {
        $id=$this->input->post('id');
        $msg = $this->md->my_query("select * from tbl_chat where registration_id =".$id);
        $userdetail = $this->md->my_select('tbl_registration',array('registration_id'=>$id));
        ?>
            <div class="contact-profile">
                <img src="<?php echo base_url().$userdetail[0]->profile_pic; ?>" alt="" style="height: 45px;" />
                <p>Harvey Specter</p>
            </div>
            <div class="messages">
                <ul>
                    <?php
                    foreach($msg as $m)
                    {
                    ?>
                    <li class="sent" style="margin-left: -159px;position: absolute;">
                        <img src="<?php echo base_url().$userdetail[0]->profile_pic; ?>" alt="" style="height:45px;width: 45px;"/>
                        <p><?php echo ucwords($m->message); ?></p>
                    </li>
                    <?php
                    }
                    ?>
                    <br/>
                    <br/>
                    <li class="replies">
                        <img src="<?php echo base_url(); ?>visitor/images/akshay.jpg" style="height:45px;width: 45px;" />
                        <p>When you're backed against the wall, break the god damn thing down.</p>
                    </li>
                </ul>
            </div>
            <div class="message-input">
                <div class="wrap">
                    <input type="text" placeholder="Write your message..." />
                    <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                </div>
            </div>
        <?php
    }
}
?>