<html>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
<!--        <title>Car House - Eye it..try it..buy it!</title>-->
        <script src="<?php echo base_url(); ?>visitor/js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <title>Contact Us - Car House</title>
        <?php
        $this->load->view("header_link");
        ?>

    </head>
    <body class="m-index" data-scrolling-animations="true" data-equal-height=".b-auto__main-item">
        
        <div class="backdiv" id="backdiv">
            <div class="contentdiv">
                <div class="contentdiv1">
                    <h2 class="s-title1">Thanks For Contact Us</h2>
                </div>
                <div class="contentdiv2">
                    <p>Thanks for contact us. We will contact within 24 hours in your registered email id : <span style="color: #FF6200;"><?php echo $this->input->post('email'); ?></span>.</p>
                    <div class="text-right">
                        <button type="submit" class="btn m-btn cls" style="background-color: #FF6200;color:#fff;font-size:12px;">CANCEL<i class="fa fa-close" style="border-radius: 15px;font-size:17px;margin:0 5px;width: 23px;height: 20px;background-color: #fff;color:#000;" ></i></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Loader -->
<!--        <div id="page-preloader"><span class="spinner"></span></div>-->
        <!-- Loader end -->
        <?php
        $this->load->view("header_top");
        ?>
        <?php
        $this->load->view("header_bottom");
        ?>
        <section class="b-pageHeader">
            <div class="container">
                <h1 class=" wow zoomInLeft" data-wow-delay="0.5s">Contact Us</h1>
                <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.5s">
                    <h3>Get In Touch With Us Now</h3>
                </div>
            </div>
        </section><!--b-pageHeader-->

        <div class="b-breadCumbs s-shadow wow zoomInUp" data-wow-delay="0.5s">
            <div class="container">
                <a href="<?php echo base_url(); ?>Home" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="<?php echo base_url(); ?>ContactUs" class="b-breadCumbs__page m-active">Contact Us</a>
            </div>
        </div><!--b-breadCumbs-->

        <div class="b-map wow zoomInUp" data-wow-delay="0.5s">
            <iframe src="https://goo.gl/ANB6YC" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div><!--b-map-->
        <style>
            .errmsg1 + p
            {
                font-size: 12px;
                margin-top: -30px;
                margin-bottom: -25px;
                color: #ff6200;
                margin-left: 10px;
            }
        </style>
        <section class="b-contacts" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="b-contacts__form">
                            <header class="b-contacts__form-header s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
                                <h2 class="s-titleDet">Quick Response Form</h2> 
                            </header>
                            <p class=" wow zoomInUp" data-wow-delay="0.5s">Enter your comments through the form below, and our admin will contact you as soon as possible.</p>
                            <div id="success"></div>
                            <form id="contactForm" novalidate="" method="post" action="#contact" class="my-form s-form wow zoomInUp" data-wow-delay="0.5s">
                                <input type="text" placeholder="YOUR NAME" name="name" style="text-transform:capitalize;" value="<?php if(!isset($success)){ echo set_value('name'); } ?>" required="" pattern="^[a-zA-Z ]+$" />
                                <p class="errmsg1"><?php echo form_error('name'); ?></p>
                                <input type="text" placeholder="EMAIL ADDRESS" name="email" style="text-transform:initial;" value="<?php if(!isset($success)){ echo set_value('email'); } ?>" required="" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" />
                                <p class="errmsg1"><?php echo form_error('email'); ?></p>
                                <input type="text" placeholder="SUBJECT" name="subject" style="text-transform:capitalize;" value="<?php if(!isset($success)){ echo set_value('subject'); } ?>" required="" pattern="^[a-zA-Z ]+$" />
                                <p class="errmsg1"><?php echo form_error('subject'); ?></p>
                                <textarea id="user-message" name="message" style="text-transform:capitalize;" placeholder="MESSAGE" required=""><?php if(!isset($success)){ echo set_value('message'); } ?></textarea>
                                <p class="errmsg1"><?php echo form_error('message'); ?></p>
                                <button type="submit" name="add" value="CONTACT NOW" class="btn m-btn">CONTACT NOW<span class="fa fa-angle-right"></span></button>
                                <br/>   
                                <br/>
                                <?php
                                if (isset($error)) {
                                    ?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <?php
                                        echo $error;
                                        ?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="b-contacts__address">
                            <div class="b-contacts__address-hours">
                                <h2 class="s-titleDet wow zoomInUp" data-wow-delay="0.5s">opening hours</h2>
                                <div class="b-contacts__address-hours-main wow zoomInUp" data-wow-delay="0.5s">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <h5>Sales Department</h5>
                                            <p>Mon - Sat : 8:00am - 5:00pm <br/>Sunday is closed</p>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <h5>Service Department</h5>
                                            <p>Mon -  Sat : 8:00am - 5:00pm <br/>Sunday is closed</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="b-contacts__address-info">
                                <h2 class="s-titleDet wow zoomInUp" data-wow-delay="0.5s">Get In Touch Now</h2>
                                <address class="b-contacts__address-info-main wow zoomInUp" data-wow-delay="0.5s">
                                    <div class="b-contacts__address-info-main-item">
                                        <span class="fa fa-home"></span>ADDRESS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<em>3<sup>rd</sup>&nbsp;Floor,Vrundavan Complex, Rachana Circle,Surat</em>
                                    </div>
                                    <div class="b-contacts__address-info-main-item">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 col-xs-12">
                                                <span class="fa fa-phone"></span>
                                                PHONE
                                            </div>
                                            <div class="col-lg-9 col-md-8 col-xs-12">
                                                <em>+91 77790 92666</em>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="b-contacts__address-info-main-item">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 col-xs-12">
                                                <span class="fa fa-fax"></span>
                                                WEB
                                            </div>
                                            <div class="col-lg-9 col-md-8 col-xs-12">
                                                <em><a href="http://novaoneclicksolution.in" target="__new" style="text-decoration: none; color:#A9A9A9;">novaoneclicksolution.in</a></em>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="b-contacts__address-info-main-item">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 col-xs-12">
                                                <span class="fa fa-envelope"></span>
                                                EMAIL
                                            </div>
                                            <div class="col-lg-9 col-md-8 col-xs-12">
                                                <em>novaoneclicksolution@gmail.com</em>
                                            </div>
                                        </div>
                                    </div>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--b-contacts-->
        <?php
        $this->load->view("master_footer");
        ?>
        <?php
        if (isset($success)) {
            ?>
            <script type="text/javascript">
                $("#backdiv").show();
            </script>
            <?php
        }
        ?>
