<!doctype html>
<html class="fixed">
    <title>Member Panel - Car House</title>
    <?php
    $this->load->view('user/header_link');
    ?>
    <style>
        .summary-icon{
            background-color: #FF6200;
        }
        .panel-body
        {
            border:1px solid #F2F2F2;
        }
        .text-muted 
        {
            cursor: pointer;
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
                    <?php
                    $wishlist = $this->md->my_query("select count(*) as c from tbl_wishlist where register_id=".$this->session->userdata('userid'))[0]->c;
                    $review = $this->md->my_query("select count(*) as c from tbl_car_review where registration_id=".$this->session->userdata('userid'))[0]->c;
                    $cc = $this->md->my_query("select count(*) as c from tbl_carmela_review where register_id=".$this->session->userdata('userid'))[0]->c;
                    $allreview = $review + $cc;
                    $areview = $this->md->my_query("select count(*) as c from tbl_car_review where status = 1 and del_status = 0 and registration_id=".$this->session->userdata('userid'))[0]->c;
                    $ccc = $this->md->my_query("select count(*) as c from tbl_carmela_review where status = 1 and del_status = 0 and register_id=".$this->session->userdata('userid'))[0]->c;
                    $activereview = $areview + $ccc;
                    $preview = $this->md->my_query("select count(*) as c from tbl_car_review where status = 0 and registration_id=".$this->session->userdata('userid'))[0]->c;
                    $cccc = $this->md->my_query("select count(*) as c from tbl_carmela_review where status = 0 and register_id=".$this->session->userdata('userid'))[0]->c;
                    $pendingreview = $preview + $cccc;
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>

                                    <h2 class="panel-title">Car Details</h2>

                                </header>
                                <div class="panel-body">
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <section class="panel panel-featured-left panel-featured-warning">
                                            <div class="panel-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-primary">
                                                            <i class="fa fa-heart"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">My Wishlist</h4>
                                                            <div class="info">
                                                                <strong class="amount wishlist"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a href="<?php echo base_url(); ?>My-Wishlist" class="text-muted text-uppercase">view all</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>

                                    <h2 class="panel-title">My Review</h2>

                                </header>
                                <div class="panel-body">
                                    <div class="col-md-4 col-lg-4 col-xl-6">
                                        <section class="panel panel-featured-left panel-featured-warning">
                                            <div class="panel-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-primary">
                                                            <i class="fa fa-list"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">All Review</h4>
                                                            <div class="info">
                                                                <strong class="amount allreview"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a href="<?php echo base_url(); ?>My-Review" class="text-muted text-uppercase">view all</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-xl-6">
                                        <section class="panel panel-featured-left panel-featured-warning">
                                            <div class="panel-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-primary">
                                                            <i class="fa fa-list"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Active Review</h4>
                                                            <div class="info">
                                                                <strong class="amount activereview"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a class="text-muted text-uppercase">view all</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-xl-6">
                                        <section class="panel panel-featured-left panel-featured-warning">
                                            <div class="panel-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-primary">
                                                            <i class="fa fa-list"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Pending Review</h4>
                                                            <div class="info">
                                                                <strong class="amount pendingreview"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a class="text-muted text-uppercase">view all</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
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
        <script>
            
            function cardash(c,action,cnt)
            {
                    var cc = setInterval(function() {
                    $("."+action).text(c);
                    c++;
                    if(c > cnt)
                    {
                        clearInterval(cc);
                    }
                },100);

            }
        
            cardash(0,'wishlist',<?php echo $wishlist; ?>);
            cardash(0,'allreview',<?php echo $allreview; ?>);
            cardash(0,'activereview',<?php echo $activereview; ?>);
            cardash(0,'pendingreview',<?php echo $pendingreview; ?>);
        </script>
    </body>
</html>