<!doctype html>
<html class="fixed">
    <?php
    $this->load->view('admin/header_link');
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
    <body style="background-color: #F2F2F2;">
        <section class="body">
            <!-- start: header -->
            <?php
            $this->load->view('admin/header');
            ?>  
            <!-- end: header -->
            <div class="inner-wrapper">
                <!-- start: sidebar -->
                <aside id="sidebar-left" class="sidebar-left">
                    <?php
                    $this->load->view('admin/menu');
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
                                        <i class="fa fa-home dashboard" ></i>
                                    </a>
                                </li>
                                <li><span class="dashboardname">Dashboard</span></li>
                            </ol>
                        </div>
                    </header>
                    <?php
                    $contact = $this->md->my_query("select count(*) as c from tbl_contact_us")[0]->c;
                    $feed = $this->md->my_query("select count(*) as c from tbl_feedback")[0]->c;
                    $email = $this->md->my_query("select count(*) as c from tbl_email_subscriber")[0]->c;
                    $mem = $this->md->my_query("select count(*) as c from tbl_registration")[0]->c;
                    $activecarr = $this->md->my_query("select count(*) as c from tbl_carmela where status = 1")[0]->c;
                    $pactivecar = $this->md->my_query("select count(*) as c from tbl_carmela where status = 0")[0]->c;
                    $state = $this->md->my_query("select count(*) as c from tbl_location where lable = 'state'")[0]->c;
                    $city = $this->md->my_query("select count(*) as c from tbl_location where lable = 'city'")[0]->c;
                    $area = $this->md->my_query("select count(*) as c from tbl_location where lable = 'area'")[0]->c;
                    $landmark = $this->md->my_query("select count(*) as c from tbl_location where lable = 'landmark'")[0]->c;
                    $type = $this->md->my_query("select count(*) as c from tbl_category where label = 'type'")[0]->c;
                    $company = $this->md->my_query("select count(*) as c from tbl_category where label = 'company'")[0]->c;
                    $model = $this->md->my_query("select count(*) as c from tbl_category where label = 'model'")[0]->c;
                    $submodel = $this->md->my_query("select count(*) as c from tbl_category where label = 'submodel'")[0]->c;
                    $specification = $this->md->my_query("select count(*) as c from tbl_attribute")[0]->c;
                    $set = $this->md->my_query("select count(*) as c from tbl_attribute_set")[0]->c;
                    $allcar = $this->md->my_query("select count(*) as c from tbl_car_detail")[0]->c;
                    $activecar = $this->md->my_query("select count(*) as c from tbl_car_detail where status = 1 and del_status = 0")[0]->c;
                    $pendingcar = $this->md->my_query("select count(*) as c from tbl_car_detail where status = 0 and del_status = 0")[0]->c;
                    $carrev = $this->md->my_query("select count(*) as c from tbl_car_review")[0]->c;
                    $offer = $this->md->my_query("select count(*) as c from tbl_offer where status = 1")[0]->c;
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>

                                    <h2 class="panel-title">Pages</h2>

                                </header>
                                <div class="panel-body">
                                    <div class="col-md-4 col-lg-4 col-xl-6">
                                        <section class="panel panel-featured-left panel-featured-warning">
                                            <div class="panel-body" style="border:1px solid #F2F2F2;">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon" style="background-color: #FF6200;">
                                                            <i class="fa fa-phone" style="color:#fff;"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Contacts</h4>
                                                            <div class="info">
                                                                <strong class="amount contact"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a href="<?php echo base_url(); ?>Manage-Contact" class="text-muted text-uppercase">view all</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-xl-6">
                                        <section class="panel panel-featured-left panel-featured-warning">
                                            <div class="panel-body" style="border:1px solid #F2F2F2;">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon" style="background-color: #FF6200;">
                                                            <i class="fa fa-comments"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Feedback</h4>
                                                            <div class="info">
                                                                <strong class="amount feedback"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a href="<?php echo base_url(); ?>Manage-Feedback" class="text-muted text-uppercase">view all</a>
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
                                                            <i class="fa fa-envelope"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Subscribers</h4>
                                                            <div class="info">
                                                                <strong class="amount email"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a href="<?php echo base_url(); ?>Manage-Email-Subscriber" class="text-muted text-uppercase">view all</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="col-md-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>

                                    <h2 class="panel-title">Users</h2>

                                </header>
                                <div class="panel-body">
                                    <div class="col-md-4 col-lg-4 col-xl-6">
                                        <section class="panel panel-featured-left panel-featured-warning">
                                            <div class="panel-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-primary">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Member</h4>
                                                            <div class="info">
                                                                <strong class="amount member"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a href="<?php echo base_url(); ?>Manage-Member" class="text-muted text-uppercase">view all</a>
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
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Active Carmela</h4>
                                                            <div class="info">
                                                                <strong class="amount acarmela"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a href="<?php echo base_url(); ?>Manage-Carmela" class="text-muted text-uppercase">view all</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-xl-6" style="padding-left: 3px;">
                                        <section class="panel panel-featured-left panel-featured-warning">
                                            <div class="panel-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-primary">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Pending Carmela</h4>
                                                            <div class="info">
                                                                <strong class="amount pcarmela">1281</strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a href="#" class="text-muted text-uppercase">view all</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="col-md-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>

                                    <h2 class="panel-title">Locations</h2>

                                </header>
                                <div class="panel-body">
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <section class="panel panel-featured-left panel-featured-warning">
                                            <div class="panel-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-primary">
                                                            <i class="fa fa-map-marker"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">State</h4>
                                                            <div class="info">
                                                                <strong class="amount state"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a href="<?php echo base_url(); ?>Manage-State" class="text-muted text-uppercase">view all</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <section class="panel panel-featured-left panel-featured-warning">
                                            <div class="panel-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-primary">
                                                            <i class="fa fa-map-marker"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">City</h4>
                                                            <div class="info">
                                                                <strong class="amount city"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a href="<?php echo base_url(); ?>Manage-City" class="text-muted text-uppercase">view all</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <section class="panel panel-featured-left panel-featured-warning">
                                            <div class="panel-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-primary">
                                                            <i class="fa fa-map-marker"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Area</h4>
                                                            <div class="info">
                                                                <strong class="amount area"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a href="<?php echo base_url(); ?>Manage-Area" class="text-muted text-uppercase">view all</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <section class="panel panel-featured-left panel-featured-warning">
                                            <div class="panel-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-primary">
                                                            <i class="fa fa-map-marker"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Landmark</h4>
                                                            <div class="info">
                                                                <strong class="amount landmark"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a href="<?php echo base_url(); ?>Manage-Landmark" class="text-muted text-uppercase">view all</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="col-md-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>

                                    <h2 class="panel-title">Car Categories</h2>

                                </header>
                                <div class="panel-body">
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <section class="panel panel-featured-left panel-featured-warning">
                                            <div class="panel-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-primary">
                                                            <i class="fa fa-sitemap"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Car Type</h4>
                                                            <div class="info">
                                                                <strong class="amount type"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a href="<?php echo base_url(); ?>Manage-Car-Type" class="text-muted text-uppercase">view all</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <section class="panel panel-featured-left panel-featured-warning">
                                            <div class="panel-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-primary">
                                                            <i class="fa fa-sitemap"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Car Company</h4>
                                                            <div class="info">
                                                                <strong class="amount company"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a href="<?php echo base_url(); ?>Manage-Car-Company" class="text-muted text-uppercase">view all</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <section class="panel panel-featured-left panel-featured-warning">
                                            <div class="panel-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-primary">
                                                            <i class="fa fa-sitemap"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Car Model</h4>
                                                            <div class="info">
                                                                <strong class="amount model"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a href="<?php echo base_url(); ?>Manage-Car-Model" class="text-muted text-uppercase">view all</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <section class="panel panel-featured-left panel-featured-warning">
                                            <div class="panel-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-primary">
                                                            <i class="fa fa-sitemap"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Car Submodel</h4>
                                                            <div class="info">
                                                                <strong class="amount submodel"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a href="<?php echo base_url(); ?>Manage-Car-Submodel" class="text-muted text-uppercase">view all</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="col-md-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>

                                    <h2 class="panel-title">Specification</h2>

                                </header>
                                <div class="panel-body">
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <section class="panel panel-featured-left panel-featured-warning">
                                            <div class="panel-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-primary">
                                                            <i class="fa fa-database"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Specification</h4>
                                                            <div class="info">
                                                                <strong class="amount spe"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a href="<?php echo base_url(); ?>Manage-Specification" class="text-muted text-uppercase">view all</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <section class="panel panel-featured-left panel-featured-warning">
                                            <div class="panel-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-primary">
                                                            <i class="fa fa-database"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Specification Set</h4>
                                                            <div class="info">
                                                                <strong class="amount set"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a href="<?php echo base_url(); ?>Manage-Specification-Set" class="text-muted text-uppercase">view all</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </section>
                        </div>
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
                                                            <h4 class="title">All Car</h4>
                                                            <div class="info">
                                                                <strong class="amount allcar"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a href="<?php echo base_url(); ?>Manage-Car-Detail" class="text-muted text-uppercase">view all</a>
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
                                                            <h4 class="title">Active Car</h4>
                                                            <div class="info">
                                                                <strong class="amount acar"></strong>
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
                                    <div class="col-md-4 col-lg-4 col-xl-6" >
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
                                                            <h4 class="title">Pending Car</h4>
                                                            <div class="info">
                                                                <strong class="amount pcar"></strong>
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
                                                            <h4 class="title">All Reviews</h4>
                                                            <div class="info">
                                                                <strong class="amount areview"></strong>
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
                                                            <h4 class="title">All Offers</h4>
                                                            <div class="info">
                                                                <strong class="amount offer"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a href="<?php echo base_url(); ?>Manage-Offer" class="text-muted text-uppercase">view all</a>
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
        $this->load->view('admin/footer_script');
        ?>
        <script>
            
            function dash(c,action,cnt)
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
        
            dash(0,'contact',<?php echo $contact; ?>);
            dash(0,'feedback',<?php echo $feed; ?>);
            dash(0,'email',<?php echo $email; ?>);
            dash(0,'member',<?php echo $mem; ?>);
            dash(0,'acarmela',<?php echo $activecarr; ?>);
            dash(0,'pcarmela',<?php echo $pactivecar; ?>);
            dash(0,'state',<?php echo $state; ?>);
            dash(0,'city',<?php echo $city; ?>);
            dash(0,'area',<?php echo $area; ?>);
            dash(0,'landmark',<?php echo $landmark; ?>);
            dash(0,'type',<?php echo $type; ?>);
            dash(0,'company',<?php echo $company; ?>);
            dash(0,'model',<?php echo $model; ?>);
            dash(0,'submodel',<?php echo $submodel; ?>);
            dash(0,'spe',<?php echo $specification; ?>);
            dash(0,'set',<?php echo $set; ?>);
            dash(0,'allcar',<?php echo $allcar; ?>);
            dash(0,'acar',<?php echo $activecar; ?>);
            dash(0,'pcar',<?php echo $pendingcar; ?>);
            dash(0,'areview',<?php echo $carrev; ?>);
            dash(0,'offer',<?php echo $offer; ?>);
        </script>
    </body>
</html>