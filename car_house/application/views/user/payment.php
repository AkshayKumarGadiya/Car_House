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
                                <div class="col-md-8 col-lg-8 col-xs-12" style="padding: 0 1px 0 0;">
                                    <section class="panel">
                                        <div class="panel-body">
                                            <div class="row" style="padding: 5px;">
                                                <div class="col-md-12">
                                                    <h5><b>1. Car Pick & Drop Address</b></h5>
                                                    <hr>
                                                    <div class="col-md-5" style="border: 1px solid #F2F2F2;">
                                                        <?php
                                                        $username = $this->md->my_select("tbl_registration",array('registration_id'=>$checkout[0]->registration_id));
                                                        ?>
                                                        <center><h6><b><?php echo ucwords($username[0]->name); ?></h6></p></center>
                                                        <p style="font-weight: normal;text-align: justify;"><?php echo ucwords($checkout[0]->address); ?></p>
                                                        <button type="button" style="width: 99%;margin: 5px 7px;" name="select" class="btn btn-danger" value="Pick & Drop Here">Pick & Drop Here</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <br/>
                                                    <h5><b>1. Select Payment Option</b></h5>
                                                    <hr>
                                                    <div class="col-md-12">
                                                        <span class="d">Paid With</span>
                                                        <label class="radio-inline c">&nbsp;&nbsp;Cash On Delivery
                                                            <input type="radio" name="payment" value="Cash On Delivery">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="radio-inline c" style="margin-top: 6px;">&nbsp;&nbsp;Online Payment
                                                            <input type="radio" name="payment" value="Online Payment">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <p class="errmsg"><?php echo form_error('payment'); ?></p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <br/>
                                                        <center><button type="submit" style="width: 30%;margin: 5px 7px;" name="select" class="btn btn-danger" value="Make Payment">Make Payment</button></center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-4 col-lg-4 col-xs-12">
                                    <section class="panel">
                                        <div class="panel-body">
                                            <div class="row" style="padding: 5px;">
                                                <?php
                                                $amount = $this->md->my_query("select b.* , s.* , sp.* , us.booking_id , us.position_id , us.status as user from tbl_booking as b , tbl_service as s , tbl_service_position as sp , tbl_user_service as us where us.booking_id = '".$this->uri->segment(2)."' and us.booking_id = b.booking_id and b.registration_id = '".$this->session->userdata("userid")."' and us.position_id = sp.position_id and sp.service_id = s.service_id");
                                                $total=0;
                                                foreach($amount as $val)
                                                {
                                                    $total += $val->price;
                                                }
                                                ?>
                                                <center><h5><b>Service Summary</b></h5></center>
                                                    <hr>
                                                    <div class="col-md-12">
                                                        <div class="col-md-6">
                                                            Total
                                                        </div>
                                                        <div class="col-md-6">
                                                            : Rs. <?php echo $total; ?> /-
                                                        </div>
                                                        <?php
                                                        if($checkout[0]->pic_drop != "")
                                                        {
                                                        ?>
                                                        <div class="col-md-6">
                                                            Pick & Drop
                                                        </div>
                                                        <div class="col-md-6">
                                                            : Rs. 100 /-
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <hr>
                                                        <?php $t = $total + 100; ?>
                                                        <center><h5><b><?php if($checkout[0]->pic_drop != "") { echo  "You Pay : Rs. $t"; } else { echo "You Pay : Rs. $total"; } ?></b></h5></center>
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