<!doctype html>
<html class="fixed">
    <title>Member Panel - Car House</title>
    <?php
    $this->load->view('user/header_link');
    ?>
    <style type="text/css">
        .col-md-12 .col-md-6
        {
            padding-left: 0px;
        }
        .sa
        {
            color: #000;
            font-size: 13px;
        }
        .b-items__cell-info-price
        {
            margin:  30px 0 0 0;
            color: #FF6200;
            font: 700 22px 'PT Sans',sans-serif;
        }
    </style>
    <body>
        <section class="body">

            <!-- start: header -->
            <?php
                $this->load->view('user/header');
            ?>  
            <!-- end: header -->

            <div class="inner-wrapper">
                <!-- start: sidebar -->
                <aside id="sidebar-left" class="sidebar-left">

                    <?php
                    $this->load->view('user/menu');
                    ?>
                </aside>
                <!-- end: sidebar -->

                <section role="main" class="content-body">
                    <header class="page-header">
                        <h2>Car Services</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Dashboard">
                                        <i class="fa fa-home" style="padding-right: 5px;font-size: 17px;margin-top: -4px"></i>
                                    </a>
                                </li>
                                <li><span style="padding-right: 25px;font-size: 13px;">Car Services</span></li>
                            </ol>
                        </div>
                    </header>
                    <div class="container-fluid">
                        <section class="panel">
                            <div class="row">
                                <div class="col-md-12">
                                    <section class="panel">
                                        <header class="panel-heading" style="background-color: #3F4557;">
                                            <div class="panel-actions">
                                                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                            </div>

                                            <h2 class="panel-title" style="color: #FFFFFF;">Car Services Conformation</h2>

                                        </header>
                                        <div class="panel-body">
                                            <section class="content-with-menu-has-toolbar media-gallery">
                                                <div class="">
                                                    <div class="">
                                                        <div class="row mg-files" data-sort-destination data-sort-id="media-gallery" style="padding: 15px;padding-bottom: 0px;">
                                                            <form method="post">
                                                                <?php

                                                                foreach($verify as $val)
                                                                {
                                                                    $carname = $this->md->my_query("SELECT b.category_id , b.booking_id , c.category_id , c.image , cd.* FROM tbl_booking AS b , tbl_category AS c , tbl_car_detail AS cd WHERE b.category_id = c.category_id AND c.category_id = cd.model_id AND b.booking_id =".$val->booking_id);
                                                                    if($val->status == 1)
                                                                    {
                                                                ?>
                                                                <div class="col-lg-4 col-md-6 col-xs-12" style="border: 1px solid #F2F2F2;padding: 5px;">
                                                                    <div class="b-items__cell wow zoomInUp" data-wow-delay="0.5s" style="height: 395px;">
                                                                        <div class="b-items__cars-one-img">
                                                                            <span class="text-uppercase btn-success" style="padding: 2px;"><?php echo $val->plat_no; ?></span>
                                                                            <img class='img-responsive' src="<?php echo base_url().$carname[0]->image; ?>" alt='chevrolet'/>
                                                                            
                                                                        </div>
                                                                        <div class="b-items__cell-info s-form">
                                                                            <p class="mg-title text-weight-semibold" style="margin-top: 8px;margin-left: 3px;font-size: 15px;text-transform: capitalize;"><?php echo $carname[0]->carname; ?></p>
                                                                           
                                                                            <div class="col-md-12">
                                                                                <div class="col-md-6 sa">
                                                                                    Message
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <?php echo ucwords($val->message); ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="col-md-6 sa">
                                                                                    Pick & Drop
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <?php echo $val->pic_drop; ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="col-md-6 sa">
                                                                                    Book Date
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <?php echo date('d-m-Y',strtotime($val->book_date)); ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="col-md-6 sa">
                                                                                    Request Date
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <?php echo date('d-m-Y',strtotime($val->request_date)); ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row m-smallPadding">
                                                                                <div class="col-xs-12 col-md-12">
                                                                                    <?php
                                                                                    $amount = $this->md->my_query("SELECT us.booking_id , us.position_id , sp.position_id , sp.service_id , s.* , b.pic_drop , b.booking_id FROM tbl_user_service AS us , tbl_service_position AS sp , tbl_service AS s , tbl_booking AS b WHERE us.booking_id = b.booking_id AND us.position_id = sp.position_id AND sp.service_id = s.service_id AND b.booking_id =".$val->booking_id);
                                                                                    $t=0;
                                                                                    foreach($amount as $v)
                                                                                    {
                                                                                        $t += $v->price;
                                                                                    }
                                                                                    ?>
                                                                                    <h5 class="b-items__cell-info-price">Total Amount : <i class="fa fa-inr" style="font-size: 20px;"></i>&nbsp;<?php if($verify[0]->pic_drop == "Yes") { echo $t+100; } else { echo $t; } ?></h5>
                                                                                    <br/>
                                                                                    <div class="col-md-6">
                                                                                        <button type="submit" class="btn" name="yes" value="YES" style="border-radius: 20px;background-color: #FF6200;color: white;font-size: 13px;">YES&nbsp;&nbsp;<i class="fa fa-check" style="margin-top: -1px;border-radius: 50%;width: 23px;margin-left: 5px;margin-right: -5px;padding: 4px;background-color: #FFFFFF;color: #000;font-size: 13px;"></i></button>
                                                                                    </div>
                                                                                    <div class="col-md-6 text-right">
                                                                                        <button type="submit" class="btn" name="no" value="NO" style="border-radius: 20px;background-color: #FF6200;color: white;font-size: 13px;">NO&nbsp;&nbsp;<i class="fa fa-close" style="margin-top: -1px;border-radius: 50%;width: 23px;margin-left: 5px;margin-right: -5px;padding: 4px;background-color: #FFFFFF;color: #000;font-size: 13px;"></i></button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                    }
                                                                    else
                                                                    {
                                                                ?>
                                                                <div class="col-lg-4 col-md-6 col-xs-12" style="border: 1px solid #F2F2F2;padding: 5px;">
                                                                    <div class="b-items__cell wow zoomInUp" data-wow-delay="0.5s" style="height: 355px;">
                                                                        <div class="b-items__cars-one-img">
                                                                            <span class="text-uppercase btn-success" style="padding: 2px;"><?php echo $val->plat_no; ?></span>
                                                                            <img class='img-responsive' src="<?php echo base_url().$carname[0]->image; ?>" alt='chevrolet'/>
                                                                            
                                                                        </div>
                                                                        <div class="b-items__cell-info s-form">
                                                                            <p class="mg-title text-weight-semibold" style="margin-top: 8px;margin-left: 3px;font-size: 15px;text-transform: capitalize;"><?php echo $carname[0]->carname; ?></p>
                                                                           
                                                                            <div class="col-md-12">
                                                                                <div class="col-md-6 sa">
                                                                                    Message
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <?php echo ucwords($val->message); ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="col-md-6 sa">
                                                                                    Pick & Drop
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <?php echo $val->pic_drop; ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="col-md-6 sa">
                                                                                    Book Date
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <?php echo date('d-m-Y',strtotime($val->book_date)); ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="col-md-6 sa">
                                                                                    Request Date
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <?php echo date('d-m-Y',strtotime($val->request_date)); ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row m-smallPadding">
                                                                                <div class="col-xs-12 col-md-12">
                                                                                    <?php
                                                                                    $amount = $this->md->my_query("SELECT us.booking_id , us.position_id , sp.position_id , sp.service_id , s.* , b.pic_drop , b.booking_id FROM tbl_user_service AS us , tbl_service_position AS sp , tbl_service AS s , tbl_booking AS b WHERE us.booking_id = b.booking_id AND us.position_id = sp.position_id AND sp.service_id = s.service_id AND b.booking_id =".$val->booking_id);
                                                                                    $t=0;
                                                                                    foreach($amount as $v)
                                                                                    {
                                                                                        $t += $v->price;
                                                                                    }
                                                                                    ?>
                                                                                    <h5 class="b-items__cell-info-price">Total Amount : <i class="fa fa-inr" style="font-size: 20px;"></i>&nbsp;<?php if($verify[0]->pic_drop == "Yes") { echo $t+100; } else { echo $t; } ?></h5>
                                                                                    <br/>
                                                                                    <?php
                                                                                    if($val->status == 0)
                                                                                    {
                                                                                    ?>
                                                                                    <button type="button" class="btn btn-danger">Waiting</button>
                                                                                    <?php
                                                                                    }
                                                                                    if($val->status == 2)
                                                                                    {
                                                                                        if($this->session->userdata('booking') != "")
                                                                                        {
                                                                                    ?>
                                                                                    <div class="col-md-12 text-right">
                                                                                        <a href="<?php echo base_url(); ?>Car-Service-Check/<?php echo $val->booking_id; ?>"><button type="button" class="btn" name="next" value="NEXT" style="border-radius: 20px;background-color: #FF6200;color: white;font-size: 13px;">NEXT&nbsp;&nbsp;<i class="fa fa-angle-right" style="margin-top: -1px;border-radius: 50%;width: 23px;margin-left: 5px;margin-right: -5px;padding: 4px;background-color: #FFFFFF;color: #000;font-size: 13px;"></i></button></a>
                                                                                    </div>
                                                                                    <?php
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </section>
                    </div>
                </section>
            </div>
        </section>
        
        <?php
        $this->load->view('user/footer_script');
        ?>
    </body>
</html>