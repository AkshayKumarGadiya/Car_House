<!DOCTYPE html>
<html>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Car House - Eye It..Try It..Buy It!</title>

        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>visitor/images/favicon.png" />

        <link href="<?php echo base_url(); ?>visitor/css/master.css" rel="stylesheet">


    </head>
    <body class="m-submit1" data-scrolling-animations="true">
        
        <?php
        $this->load->view("header_top");
        $this->load->view("header_bottom");
        ?>
        <section class="b-pageHeader">
            <div class="container">
                <h1 class="wow zoomInLeft" data-wow-delay="0.5s">Car Service</h1>
                <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.5s">
                    <h3>Get In Touch With Us Now</h3>
                </div>
            </div>
        </section><!--b-pageHeader-->

        <div class="b-breadCumbs s-shadow">
            <div class="container wow zoomInUp" data-wow-delay="0.5s">
                <a href="<?php echo base_url(); ?>Home" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="<?php echo base_url(); ?>Car-Service-3" class="b-breadCumbs__page m-active">Car Service</a>
            </div>
        </div><!--b-breadCumbs-->

        <div class="b-submit">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-5 col-xs-6">
                        <aside class="b-submit__aside">

                            <div class="b-submit__aside-step wow zoomInUp" data-wow-delay="0.5s">
                                <h3>Step 1</h3>
                                <div class="b-submit__aside-step-inner clearfix">
                                    <div class="b-submit__aside-step-inner-icon">
                                        <span class="fa fa-list-ul"></span>
                                    </div>
                                    <div class="b-submit__aside-step-inner-info">
                                        <h4>Add YOUR Vehicle</h4>
                                        <p>Select your vehicle &amp; add info</p>
                                    </div>
                                </div>
                            </div>
                            <div class="b-submit__aside-step wow zoomInUp" data-wow-delay="0.5s">
                                <h3>Step 2</h3>
                                <div class="b-submit__aside-step-inner clearfix">
                                    <div class="b-submit__aside-step-inner-icon">
                                        <span class="fa fa-photo"></span>
                                    </div>
                                    <div class="b-submit__aside-step-inner-info">
                                        <h4>Your Car Image</h4>
                                        <p>Car Image</p>
                                    </div>
                                </div>
                            </div>
                            <div class="b-submit__aside-step wow zoomInUp" data-wow-delay="0.5s">
                                <h3>Step 3</h3>
                                <div class="b-submit__aside-step-inner m-active clearfix">
                                    <div class="b-submit__aside-step-inner-icon">
                                        <span class="fa fa-globe"></span>
                                    </div>
                                    <div class="b-submit__aside-step-inner-info">
                                        <h4>Your Details</h4>
                                        <p>Your Car Detail</p>
                                        <div class="b-submit__aside-step-inner-info-triangle"></div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-7 col-xs-6">
                        <div class="b-submit__main">
                            <header class="s-headerSubmit s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
                                <h2 class="">Your Car Service Detail</h2>
                            </header>
                            <form class="s-submit clearfix" method="post">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <?php
                                        $img = $this->md->my_select('tbl_booking', array('booking_id'=>$this->session->userdata('booking')));
                            $path = $this->md->my_select('tbl_category', array('category_id' => $img[0]->category_id));

                            $servicedetail = $this->md->my_query("SELECT sp.* , us.position_id , us.status , s.* FROM tbl_service_position AS sp , tbl_user_service AS us , tbl_service AS s WHERE '" . $path[0]->category_id . "' = sp.category_id AND sp.service_id = s.service_id AND sp.position_id = us.position_id and us.booking_id='".$this->session->userdata('booking')."'");
                            ?>
                            <img src="<?php echo base_url() . $path[0]->image; ?>" style="width:797px;height:350px ;"/>
                            <?php
                                                                                            
                                foreach($servicedetail as $se)
                                {
                            ?>

                            <div title="<?php echo $se->name; ?>" style="position: absolute;top:<?php echo $se->y_position; ?>%;left:<?php echo $se->x_position; ?>%;width: 10px;height:10px;border-radius: 100%;background: red;"></div>


                                   <?php 
                                }
                            ?>
                                    </div>
                                    <div class="col-md-12">
                                        <br/>
                                        <br/>
                                        <div class="b-detail__main-info-text wow zoomInUp" data-wow-delay="0.5s">
                                            <div class="b-detail__main-aside-about-form-links">
                                                <a href="#" class="j-tab m-active s-lineDownCenter" data-to='#info1'>User Detail</a>
                                                <a href="#" class="j-tab m-active s-lineDownCenter" data-to='#info2'>Service Detail</a>
                                                <a href="#" class="j-tab m-active s-lineDownCenter" data-to='#info3'>Total Amount</a>
                                            </div>
                                            <div id="info1" style="text-align: justify;min-height: 208px;">
                                                <div class="b-detail__main-info-extra">
                                                    <div class="row">
                                                        <ul>
                                                            <?php
                                                            $userdetail = $this->md->my_select('tbl_registration', array('registration_id' => $this->session->userdata('userid')));
                                                            $book = $this->md->my_select('tbl_booking', array('booking_id' => $this->session->userdata('booking')));
                                                            ?>
                                                            <div class="col-md-12">
                                                                <li class="col-md-4 col-xs-6"><span class="fa fa-check" style="font-size: 15px;">&nbsp;&nbsp;Name</span></li>
                                                                <li class="col-md-8 col-xs-6"><span><?php echo $userdetail[0]->name; ?></span></li>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <li class="col-md-4 col-xs-6"><span class="fa fa-check" style="font-size: 15px;">&nbsp;&nbsp;Email</span></li>
                                                                <li class="col-md-8 col-xs-6"><span><?php echo $userdetail[0]->email; ?></span></li>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <li class="col-md-4 col-xs-6"><span class="fa fa-check" style="font-size: 15px;">&nbsp;&nbsp;Address</span></li>
                                                                <li class="col-md-8 col-xs-6"><span><?php echo $book[0]->address; ?></span></li>
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="info2" style="text-align: justify;min-height: 208px;">
                                                <div class="b-detail__main-info-extra m-active">
                                                    <div class="row">
                                                        <ul>
                                                            <div class="col-md-12">
                                                                <li class="col-md-4 col-xs-6"><span class="fa fa-check" style="font-size: 15px;">&nbsp;&nbsp;Pick & Drop</span></li>
                                                                <li class="col-md-8 col-xs-6"><span><?php echo $book[0]->pic_drop; ?></span></li>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <li class="col-md-4 col-xs-6"><span class="fa fa-check" style="font-size: 15px;">&nbsp;&nbsp;Book Date</span></li>
                                                                <li class="col-md-8 col-xs-6"><span><?php echo date('d-m-Y', strtotime($book[0]->book_date)); ?></span></li>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <li class="col-md-4 col-xs-6"><span class="fa fa-check" style="font-size: 15px;">&nbsp;&nbsp;Request Date</span></li>
                                                                <li class="col-md-8 col-xs-6"><span><?php echo date('d-m-Y', strtotime($book[0]->request_date)); ?></span></li>
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="info3" style="text-align: justify;">
                                                <div class="b-detail__main-info-extra m-active">
                                                    <div class="row">
                                                        <?php
                                                            $amount = $this->md->my_query("select us.* , sp.* , s.* , b.* from tbl_user_service as us , tbl_service_position as sp , tbl_service as s , tbl_booking as b where us.booking_id = b.booking_id and b.booking_id = '".$this->session->userdata('booking')."' and us.position_id = sp.position_id and sp.service_id = s.service_id and b.registration_id =".$this->session->userdata("userid"));
                                                        ?>
                                                        <ul>
                                                            <?php
                                                            $total=0;
                                                            foreach($amount as $a)
                                                            {
                                                                $total+=$a->price;
                                                            ?>
                                                            <div class="col-md-12">
                                                                <li class="col-md-4 col-xs-6"><span class="fa fa-check" style="font-size: 15px;">&nbsp;&nbsp;<?php echo ucwords($a->name); ?></span></li>
                                                                <li class="col-md-8 col-xs-6"><span><?php echo $a->price; ?></span></li>
                                                            </div>
                                                            <?php
                                                            }
                                                            ?>
                                                            <hr style="width: 400px;float: left;">
                                                            <div class="col-md-12">
                                                                <li class="col-md-4 col-xs-6"><span class="fa fa-check" style="font-size: 15px;">&nbsp;&nbsp;Amount</span></li>
                                                                <li class="col-md-8 col-xs-6"><span><?php echo $total; ?></span></li>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <li class="col-md-4 col-xs-6"><span class="fa fa-check" style="font-size: 15px;">&nbsp;&nbsp;Pick & Drop</span></li>
                                                                <?php
                                                                if($amount[0]->pic_drop == "Yes")
                                                                {
                                                                ?>
                                                                <li class="col-md-8 col-xs-6"><span><?php echo "100"; ?></span></li>
                                                                <?php
                                                                }
                                                                else
                                                                {
                                                                ?>
                                                                <li class="col-md-8 col-xs-6"><span><?php echo "0"; ?></span></li>
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                            <hr style="width: 400px;float: left;">
                                                            <div class="col-md-12">
                                                                
                                                                <li class="col-md-4 col-xs-6"><span class="fa fa-check" style="font-size: 15px;">&nbsp;&nbsp;Total Pay Amount</span></li>
                                                                <li class="col-md-8 col-xs-6"><span><?php if($amount[0]->pic_drop == "Yes") { echo $total+100; } else { echo $total; }?></span></li>
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>Car-Service-Confirm"><button type="button" class="btn m-btn pull-right wow zoomInUp" data-wow-delay="0.5s">Save &amp; PROCEED to next step<span class="fa fa-angle-right"></span></button></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--b-submit-->
        <br/>
        <br/>
        <br/>
        <?php
        $this->load->view("master_footer");
        ?>
    </body>
</html>