<?php

$this->load->view("master_header");
?>
<title>Login & Register - Car House</title>
<section class="b-pageHeader">
    <div class="container">
        <h1 class=" wow zoomInLeft" data-wow-delay="0.5s">Login & Register</h1>
        <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.5s">
            <h3>Get In Touch With Us Now</h3>
        </div>
    </div>
</section><!--b-pageHeader-->
<div class="b-breadCumbs s-shadow wow zoomInUp" data-wow-delay="0.5s">
    <div class="container">
        <a href="<?php echo base_url(); ?>Home" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="<?php echo base_url(); ?>Login" class="b-breadCumbs__page m-active">Login & Register</a>
    </div>
</div><!--b-breadCumbs-->
<style>
.errmsg1 + p
{
    font-size: 12px;
    margin-top: -30px;
    margin-bottom: -25px;
    color: #ff6200;
    margin-left: 10px;
}
            .s-form button[type='button']{
                font: 700 12px 'Open Sans',sans-serif;
                padding-left: 20px;
                color: #fff;
                margin-top: 25px;
            }

            .s-form button[type='button'] span.fa{
                background-color: #fff;
                color: #000;
                width: 25px;
                height: 25px;
                padding: 4px;
                font-size: 16px;
                margin-left: 10px;
            }
</style>
<section class="b-contacts">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <div class="b-contacts__form" id="minheight">
                    <div class="loginuser" id="loginuser">
                        <header class="b-contacts__form-header s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
                            <h2 class="s-titleDet">Login</h2> 
                        </header>
                        <p class=" wow zoomInUp" data-wow-delay="0.5s">Please Enter Register Email Id And Password To Login Our Website.</p>
                        <div id="success"></div>
                        <form method="post" autocomplete="off" id="contactForm" novalidate="" class="my-form s-form wow zoomInUp" data-wow-delay="0.5s">
                            <input type="text" placeholder="EMAIL ID" style="text-transform: initial;" name="emailid" id="email" value="<?php
                                    if(get_cookie('emailid') != "")
                                    {
                                        echo get_cookie('emailid');
                                    }
                                    ?>" required="" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" />
                            <input type="password" class="passme" style="text-transform: lowercase;" name="passs" value="<?php
                                   if(get_cookie('passs') != "")
                                    {
                                        echo $this->encryption->decrypt(get_cookie('passs'));
                                    }
                                   ?>" placeholder="PSSWORD" required="" />
                            <div class="show"><i class="fa fa-toggle-off" id="showme" class="eye" title="Show Password" style="margin-top:5px;"/></i></div>
                           
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <label class="checkbox1">Save Password
                                        <input type="checkbox" checked="checked" name="rememberme"
                                        <?php
                                        if(get_cookie('emailid'))
                                        {
                                            echo 'checked';
                                        }
                                        ?>       
                                        >
                                        <span class="checkmark123"></span>
                                    </label>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <lable class="lblpass"><span id="next" style="cursor: pointer;">Forget Password ?</span></lable>
                                </div>
                            </div>
                            <button type="submit" class="btn m-btn" name="login" value="Login Now">Login Now<span class="fa fa-angle-right"></span></button>
                            <br/>
                            <br/>
                            <br/>
                            <div class="row">
                                <div class="col-md-12 col-xs-12 text-center">
                                    <a href="<?php echo @$google_url; ?>"><img src="<?php echo base_url(); ?>visitor/images/logo/gmail_login.png" width="50%"/></a>
                                </div>
                            </div>
                            <br/>
                            <?php
                            if(isset($err))
                            {
                            ?>
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php
                                    echo $err;
                                ?>
                            </div>
                            <?php
                            }
                            ?>
                        </form>
                    </div>
                    <div class="forgetpass" style="display: none;">
                        <header class="b-contacts__form-header s-lineDownLeft" data-wow-delay="0.3s">
                            <h2 class="s-titleDet">Forget Password</h2> 
                        </header>
                        <p class="" >Do You Want To Forget Password?</p>
                        <div id="success"></div>
                        <form method="post" novalidate="" id="contactForm" class="my-form s-form" data-wow-delay="0.4s">
                            <input type="text" placeholder="Your Email Id" name="forgotemail" style="text-transform: initial;" id="forgotemail" required="" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" />
                            <p class="err" style="color: #FF6200;font-size: 13px;">
                               
                            </p>
                            <br/>
                            <button type="button" name="userforgot" value="Send Now" onclick="forgot(forgotemail.value,'emailsend')" class="btn m-btn">Send Now<span class="fa fa-angle-right"></span></button>
                            <button type="button" class="btn m-btn" style="float: right;width: 80px;" id="back"><i  class="fa fa-angle-left"></i><span style="color:white;">Back</span></button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-6">
                <div class="b-contacts__form" id="minheight">
                    <form method="post" novalidate="" id="contactForm3" class="my-form s-form wow zoomInUp" data-wow-delay="0.5s">
                        <div class="register">
                            <header class="b-contacts__form-header s-lineDownLeft" data-wow-delay="0.2s">
                                <h2 class="s-titleDet">Registration</h2> 
                            </header>
                            <p class=" wow zoomInUp" data-wow-delay="0.5s">To Register Our Website To Fill Below Form.</p>
                            <div id="success"></div>
                            <input type="text" placeholder="USER NAME" name="username" value="<?php if(set_value('username')) { echo set_value('username'); } ?>" id="username" style="text-transform: capitalize;" required="" pattern="^[a-zA-Z ]+$" />
                            <p class="errmsg1"><?php echo form_error('username'); ?></p>
                            <input type="text" placeholder="EMAIL ID" name="email" id="email" style="text-transform: initial;" value="<?php if(set_value('email')) { echo set_value('email'); } ?>" required="" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" />
                            <p class="errmsg1"><?php echo form_error('email'); ?></p>
                            <input type="password" class="password1" style="text-transform: lowercase;" placeholder="Password" value="<?php if(set_value('password')) { echo set_value('password'); } ?>" id="pass" name="password" required="" pattern="^(AB|)[a-zA-Z0-9]{8,16}$"/>
                            <div class="show1"><i class="fa fa-toggle-off" id="showme1" title="Show Password" style="margin-top:5px;"></i></div>
                            <p class="errmsg1"><?php echo form_error('password'); ?></p>
                            <lable class="genetatepass"><h6 id="name">Generate Password</h6></lable>
                            <input type="password" style="text-transform: lowercase;" placeholder="Retype Password " name="repassword" value="<?php if(set_value('repassword')) { echo set_value('repassword'); } ?>" required="" pattern="^(AB|)[a-zA-Z0-9]{8,16}$" />
                            <p class="errmsg1"><?php echo form_error('repassword'); ?></p>
                            <label class="checkbox1">I Accept <a href="<?php echo base_url(); ?>TermsandCondition" style="text-decoration: none;color: #FF6200;cursor: pointer;">Terms & Condition</a>
                                <input type="checkbox" id="termsChkbx " onchange="isChecked(this, 'sub1')" >
                                <span class="checkmark123"></span>
                            </label>
                            <br/>
                            <button type="submit" value="Register Now" id="sub1" disabled="disabled" name="register" class="btn m-btn">Register Now<span class="fa fa-angle-right"></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section><!--b-contacts-->
<br/>
<?php
$this->load->view("master_footer");
?>
<script>
    function isChecked(checkbox, sub1) {
    var button = document.getElementById(sub1);

    if (checkbox.checked === true) {
        button.disabled = "";
    } else {
        button.disabled = "disabled";
    }
}

function forgot(email,action)
{
    var base="http://localhost/car_house/";
    var path=base+'Ajax/'+action;
    var data={email:email,action:action};
    $.post(path,data,function(ans){
       $('.err').html(ans);
    });
}
</script>