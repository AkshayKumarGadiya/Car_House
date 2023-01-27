<!doctype html>
<html class="fixed">
    <title>Member panel - Car House</title>
    <?php
    $this->load->view('user/header_link');
    ?>
    <body style="background-color: #F6F6F6;">
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
                        <h2>Make A Payment</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>User-Home">
                                        <i class="fa fa-home" style="padding-right: 5px;font-size: 17px;margin-top: -4px"></i>
                                    </a>
                                </li>
                                <li><span style="padding-right: 25px;font-size: 13px;">Make A Payment</span></li>
                            </ol>
                        </div>
                    </header>

                    <!-- start: page -->
                    <div class="container-fluid">
                        <div class="row">
                            <form method="post">
                                <div class="col-md-12 col-lg-12 col-xs-12" style="padding: 0 1px 0 0;">
                                    <section class="panel">
                                        <div class="panel-body">
                                            <div class="row" style="padding: 5px;">
                                                <div class="col-md-12 text-center">
                                                    <img src="<?php echo base_url(); ?>user_asset/images/tick.svg" class="img-circle" style="width: 120px;height: 120px;"/>
                                                    <?php
                                                    $username = $this->md->my_select('tbl_registration',array('registration_id'=>$success[0]->registration_id));
                                                    ?>
                                                    <h5 style="color: #FF6200;font-weight: bold;">Hello , <?php echo ucwords($username[0]->name); ?> Thank you for your Car Service.</h5>
                                                    <h6>Car House has received your payment successfully.</h6>
                                                    <h6>If you have any query then contact us via email.</h6>
                                                </div>
                                                <div class="col-md-12">
                                                    <br/>
                                                    <div class="col-md-4">
                                                        Payable Amount : Rs. <?php echo $success[0]->amount; ?> /-
                                                    </div>
                                                    <div class="col-md-4">
                                                        Car Drop Time : 1 Days
                                                    </div>
                                                    <div class="col-md-4">
                                                        Payable Mode : <?php echo $success[0]->payment_type; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <br/>
                                                    
                                                    <div class="col-md-4 text-left">
                                                        <a href="<?php echo base_url(); ?>Car-Service-1"><button type="button" style="width:140px;margin: 5px 7px;" name="select" class="btn btn-danger" value="Continue Service">Continue Service</button></a>
                                                    </div>
                                                    <div class="col-md-4 text-center">
                                                        <a href="<?php echo base_url(); ?>User-Bill/<?php echo $this->session->userdata('booking'); ?>"><button type="button" style="width:140px;margin: 5px 7px;" name="viewbill" class="btn btn-danger" value="View Bill">View Bill</button></a>
                                                    </div>
                                                    <div class="col-md-4 text-right">
                                                        <a href="<?php echo base_url(); ?>Service-Exit"><button type="button" style="width:140px;margin: 5px 7px;" name="select" class="btn btn-danger" value="Exit">Exit</button></a>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>


        </section>
        <?php
        $this->load->view('user/footer_script');
        ?>
    </body>
</html>