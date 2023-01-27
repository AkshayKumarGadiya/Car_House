<!doctype html>
<html class="fixed">
    <title>Member Panel - Car House</title>
    <?php
    $this->load->view('user/header_link');
    ?>
    <style>
        .col-md-6 .col-lg-6
        {
            padding: 0px;
        }
        .panel-body
        {
            padding: 5px;
        }
        .s
        {
            font-size: 14px!important;
            font-weight: normal;
            text-transform: uppercase;
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
                        <h2>Dashboard</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Dashboard">
                                        <i class="fa fa-home" style="padding-right: 5px;font-size: 17px;margin-top: -4px"></i>
                                    </a>
                                </li>
                                <li><span style="padding-right: 25px;font-size: 13px;">Dashboard</span></li>
                            </ol>
                        </div>
                    </header>
                    <div class="row">
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
                                            <h5><b>Plat Number : </b><span class="s">&nbsp;<?php echo $userbill[0]->plat_no; ?></span></h5>
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
                    </div>
                </section>
            </div>
        </section>

        <?php
        $this->load->view('user/footer_script');
        ?>
    </body>
</html>