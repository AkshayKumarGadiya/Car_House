<html>
    <script src="<?php echo base_url(); ?>visitor/js/jquery-1.11.3.min.js"></script>
    <?php
    $this->load->view('carmela/header_link');
    ?>
    <body style="margin: 0px;padding: 0px;">
        <div class="container-fluid cf">
            <div class="row">
                <div class="col-md-6 col-xs-12" style="margin: 20px 0 20px 0;">
                    <div class="adminlogo wow slideInLeft" data-wow-delay="0.3s" title="Car house">
                        <h3><a href="<?php echo base_url(); ?>Home">Car<span style="color:#FFFFFF;"> House</span></a></h3>
                        <h2><a href="<?php echo base_url(); ?>Home">Everyone Dreams of Car</a></h2>
                    </div>
                </div>
                <div class="col-md-5 col-xs-12 loginuser" id="loginuser" style="margin-top: 10px;">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-4 col-xs-6 col-sm-6">
                                <label style="color: white;">Email Id</label>
                                <input type="text" name="emaill" value="<?php
                                    if(get_cookie('emaill') != "")
                                    {
                                        echo get_cookie('emaill');
                                    }
                                    ?>" autocomplete="off" class="form-control textbox input-md"/>
                                <label class="checkbox11">Remember Me ?
                                    <input type="checkbox" name="rememberme" 
                                        <?php
                                        if(get_cookie('emaill'))
                                        {
                                            echo 'checked';
                                        }
                                        ?>/>
                                    <span class="checkmark12" style="border-radius: 2px;"></span>
                                </label>
                            </div>
                            <div class="col-md-4 col-xs-6 col-sm-6">
                                <label style="color: white;">Password</label>
                                <input type="password" name="pass" value="<?php
                                    if(get_cookie('pass') != "")
                                    {
                                        echo $this->encryption->decrypt(get_cookie('pass'));
                                    }
                                    ?>" autocomplete="off" class="form-control textbox input-md pass pr-30"/>
                                <i class="fa fa-toggle-off" id="showme2" style="position:absolute;margin-top: -25px;font-size: 16px;right: 22px;color: #FFFFFF;cursor: pointer;" id="toggle1" title="Show Password"></i>
                                <p class="errmsg" style="color: #FFFFFF;"><?php if(isset($error)) { echo $error; } ?></p>
                            </div>
                            <div class="col-md-3 col-xs-12 col-sm-12 text-center" style="">
                                <p><a href="#" id="next" style="color: #FFFFFF;">Unable Login?</a></p>
                                <input type="submit" value="Login" name="sumbit" class="btn sub" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 forgetpass">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-offset-5 col-md-4 col-xs-5">
                                <label style="color: white;margin-top: -20px;">Email Id</label>
                                <input type="text" name="email" id="email" autocomplete="off" class="form-control textbox input-md"/>
                            </div>
                            <div class="col-md-3 col-xs-5 text-right" style="margin-top: -20px;">
                                <a href="#" id="back" style="color: #FFFFFF;">Back To Login ?</a>
                                <button type="button" onclick="forgot(email.value,'selleremail')" name="sumbit" class="btn forgetsub"><i class="fa fa-envelope" style="margin:0;color: #FF6200;font-size: 13px;"></i>Send Now</button>
                            </div>
                        </div>
                    </form>
                    <p class="sellermsg" style="color: #fff;margin-left: 219px;margin-top: -9px;">
                                
                    </p>
                </div>
               
            </div>
        </div>
        <div class="container-fluid"  style="background-image: url('carmela/images/carr.jpg');background-repeat: round;min-height: 563px;">
            <div class="row">
                <div class="col-md-offset-7 col-md-4 col-xs-12 panel" style="padding: 20px 0;">
                    <form method="post" class="my-form panel-body" novalidate="">
                        <h5 class="text-center">Register Now</h5>
                        <div class="col-md-12 col-xs-12">
                            <label>Carmela Name</label>
                            <input type="text" name="companyname" value="<?php if($this->session->userdata('companyname') && $this->input->post('next') == "") { echo $this->session->userdata('companyname'); } else { echo set_value('companyname'); } ?>" class="form-control input-md textbox1" required="" pattern="^[A-Za-z0-9 ]+$" />
                            <p class="errmsg"><?php echo form_error('companyname'); ?></p>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-12 col-xs-12" style="padding: 0;">
                                <label>Email</label>
                                <input type="text" name="email" value="<?php if($this->session->userdata('email') && $this->input->post('next') == "") { echo $this->session->userdata('email'); } else { echo set_value('email'); } ?>" class="form-control input-md textbox1" required="" pattern="/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/" style="text-transform: lowercase;"  />
                                <p class="errmsg"><?php echo form_error('email'); ?></p>
                            </div>
                            <div class="col-md-12 col-xs-12" style="padding: 0;">
                                <label>Contact No</label>
                                <input type="text" name="contact" value="<?php if($this->session->userdata('contact') && $this->input->post('next') == "") { echo $this->session->userdata('contact'); } else { echo set_value('contact'); } ?>" class="form-control input-md textbox1" required="" pattern="^[0-9]{10}$" />
                                <p class="errmsg"><?php echo form_error('contact'); ?></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-12 col-xs-12" style="padding: 0px;">
                                <label>Password</label>
                                <input type="password" name="password" style="position: relative;" value="<?php if($this->session->userdata('password') && $this->input->post('next') == "") { echo $this->session->userdata('password'); } else { echo set_value('password'); } ?>" class="form-control input-md textbox1 passme pr-30" required="" pattern="^(AB|)[a-zA-Z0-9]{8,16}$"/>
                                
                                <i class="fa fa-toggle-off" id="showme" style="position:absolute;margin-top: -25px;font-size: 16px;right: 22px;cursor: pointer;" id="toggle1" title="Show Password"></i>
                                <p class="errmsg"><?php echo form_error('password'); ?></p>
                            </div>
                            <div class="col-md-12 col-xs-12" style="padding: 0px;">
                                <label>Confirm Password</label>
                                <input type="password" name="rpassword" style="position: relative;" value="<?php if($this->session->userdata('rpassword') && $this->input->post('next') == "") { echo $this->session->userdata('rpassword'); } else { echo set_value('rpassword'); } ?>" class="form-control input-md textbox1 password1 pr-30" required="" pattern="^(AB|)[a-zA-Z0-9]{8,16}$"/>
                                <i class="fa fa-toggle-off" id="showme1" style="position:absolute;z-index: 9999;top:30px;font-size: 16px;right: 22px;cursor: pointer;" id="toggle1" title="Show Password"></i>
                                <p class="errmsg"><?php echo form_error('rpassword'); ?></p>
                            </div>
                        </div>
                        <div class="text-right col-md-12">
                            <button type="submit" value="Next" name="next" class="btn btn1" style="margin: 38px 0 0 0;">Next&nbsp;&nbsp;<i class="fa fa-angle-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center sellerfooter" style="background-color: #292929;">
            <p>Copyright &copy;&nbsp;<span>Car House</span> 2018. All Rights Reserved | Powered By : <a href="https://www.novaoneclicksolution.in" target="__new"><span>NOVA One Click Solution</span></a></p>
        </div>
    </body>
</html>
<script>
    $(document).ready(function () {

        $("#next").on("click", function () {

            $(".forgetpass").show();
            $("#loginuser").hide();

        });
        $("#back").on("click", function () {

            $(".loginuser").show();
            $(".forgetpass").hide();

        });
    });
    
    function forgot(email,action)
    {
        var base="http://localhost/car_house/";
        var path=base+'Ajax/'+action;
        var data={email:email,action:action};
        $.post(path,data,function(ans){
           $('.sellermsg').html(ans);
        });
    }
</script>
<script src="<?php echo base_url(); ?>carmela/javascripts/set.js" type="text/javascript"></script>