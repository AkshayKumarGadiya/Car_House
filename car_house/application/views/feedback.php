<!DOCTYPE html>
<html>

    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
<!--        <title>Car House - Eye it..try it..buy it!</title>-->
        <title>Feedback - Car House</title>
        <?php
        $this->load->view("header_link");
        ?>
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

    </head>
    <body class="m-index" data-scrolling-animations="true" data-equal-height=".b-auto__main-item">
       
        <div class="backdiv" id="feedback">
            <div class="contentdiv">
                <div class="contentdiv1">
                    <h2 class="s-title1">Thanks For Suggesstion</h2>
                </div>
                <div class="contentdiv2">
                    <p>Thanks for Suggest. Thanks for: <span style="color: #FF6200;">&nbsp;<?php echo ucwords($this->input->post('name')); ?></span> .</p>
                    <div class="text-right">
                        <button type="submit" class="btn m-btn cls" style="padding: 3px 5px 3px 11px;background-color: #ff6200;color: #fff;">CANCEL<span class="fa fa-close" style="margin-left: 10px;padding: 2px 6px 0 6px;height: 25px;width: 25px;color: #000;background-color: #fff;"></span></button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $this->load->view("header_top");
        ?>
        <?php
        $this->load->view("header_bottom");
        ?>

        <section class="b-pageHeader">
            <div class="container">
                <h1 class=" wow zoomInLeft" data-wow-delay="0.5s">FEEDBACK</h1>
                <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.5s">
                    <h3>Get In Touch With Us Now</h3>
                </div>
            </div>
        </section><!--b-pageHeader-->
        <div class="b-breadCumbs s-shadow wow zoomInUp" data-wow-delay="0.5s">
            <div class="container">
                <a href="<?php echo base_url(); ?>Home" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="<?php echo base_url(); ?>Feedback" class="b-breadCumbs__page m-active">Feedback</a>
            </div>
        </div><!--b-breadCumbs-->
        <br/>
        <div class="container">
            <div class="row">
                <div class="col-md-5 b-contacts__form">
                    <br/><br/>
                    <p class=" wow zoomInUp" data-wow-delay="0.5s">Put Your Opinion For Our Website </p>
                    <div id="success"></div>
                    <form id="contactForm1" novalidate="" method="post" class="my-form s-form wow zoomInUp" data-wow-delay="0.5s">
                        <input type="text" placeholder="YOUR NAME" name="name" value="<?php if(!isset($success)){ echo set_value('name'); } ?>"required="" pattern="^[a-zA-Z ]+$"/>
                        <p class="errmsg1"><?php echo form_error('name'); ?></p>
                        <textarea id="user-message" name="message" placeholder="YOUR SUGGESTION" required="" ><?php if(!isset($success)){ echo set_value('message'); } ?></textarea>
                        <p class="errmsg1"><?php echo form_error('message'); ?></p>
                        <button type="submit" name="add" value="SEND NOW" class="btn m-btn">SEND NOW<span class="fa fa-angle-right"></span></button><br/><br/>
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
                <div class="col-md-7">
                    <section class="b-review">
                        <div class="container">
                            <div class="col-sm-7 col-md-7 col-lg-7 col-xs-12">
                                <div id="carousel-small-rev" class="owl-carousel enable-owl-carousel" data-items="1" data-navigation="true" data-auto-play="true" data-stop-on-hover="true" data-items-desktop="1" data-items-desktop-small="1" data-items-tablet="1" data-items-tablet-small="1">
                                    <?php
                                    $re = $this->md->my_select('tbl_feedback');
                                    foreach($re as $rr)
                                    {
                                    ?>
                                    <div class="b-review__main">
                                        <div class="b-review__main-person">
                                            <div class="b-review__main-person-inside">
                                                
                                                <img src="<?php echo base_url(); ?>user_asset/images/user-blank.png" style="width: 88px;height: 88px;" class="img-circle">
                                                
                                            </div>
                                        </div>
                                        <h5><span><?php echo ucwords($rr->name); ?> </span></h5>
                                        <p><?php echo $rr->message."."; ?></p>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
        </div>
        <br/>
        <br/>
        <?php
        $this->load->view("master_footer");
        ?>
        <?php
        if (isset($success)) {
            ?>
            <script type="text/javascript">
                $("#feedback").show();
            </script>
            <?php
        }
        ?>