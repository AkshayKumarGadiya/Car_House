<!doctype html>
<html class="fixed">
    <head>
        <!-- Basic -->
        <meta charset="UTF-8">

        <title>Carmela Panel - Car House</title>
        <link href="<?php echo base_url(); ?>carmela/images/favicon.png" rel="icon"/>
        <meta name="keywords" content="HTML5 Admin Template" />
        <meta name="description" content="Porto Admin - Responsive HTML5 Template">
        <meta name="author" content="okler.net">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>carmela/vendor/bootstrap/css/bootstrap.css" />

        <link rel="stylesheet" href="<?php echo base_url(); ?>carmela/vendor/font-awesome/css/font-awesome.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>carmela/vendor/magnific-popup/magnific-popup.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>carmela/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

        <!-- Specific Page Vendor CSS -->		
        <link rel="stylesheet" href="<?php echo base_url(); ?>carmela/vendor/owl.carousel/assets/owl.carousel.css" />		
        <link rel="stylesheet" href="<?php echo base_url(); ?>carmela/vendor/owl.carousel/assets/owl.theme.default.css" />

        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>carmela/stylesheets/theme.css" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>carmela/stylesheets/theme-custom.css">

        <!-- Head Libs -->
        <script src="<?php echo base_url(); ?>carmela/vendor/modernizr/modernizr.js"></script>		
        <script src="<?php echo base_url(); ?>carmela/vendor/style-switcher/style.switcher.localstorage.js"></script>

    </head>
    <body style="background-color: #F6F6F6;">
        <section class="body">

            <!-- start: header -->
            <?php
            $this->load->view('carmela/header');
            ?>  
            <!-- end: header -->

            <div class="inner-wrapper">
                <!-- start: sidebar -->
                <aside id="sidebar-left" class="sidebar-left">

                    <?php
                    $this->load->view('carmela/menu');
                    ?>
                </aside>

                <section role="main" class="content-body">
                    <header class="page-header">
                        <h2 style="text-transform: capitalize;"><?php echo $display[0]->carname; ?></h2>
                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Carmela-Home">
                                        <i class="fa fa-home" style="padding-right: 5px;font-size: 17px;margin-top: -4px"></i>
                                    </a>
                                </li>
                                <li><span style="padding-right: 25px;font-size: 13px;">Car Detail</span></li>
                            </ol>
                        </div>
                    </header>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6" id='images'>
                                <img src="<?php echo base_url().$display[0]->path; ?>" class="img-responsive"/>
                            </div>
                            <div class="col-md-6">
                                <h2 style="font-size: 22px;text-transform: capitalize;"><b><?php echo $display[0]->carname; ?></b></h2>
                                <h4 style="margin-top: 25px;color: #FF6200;margin-left: 10px;"><i class="fa fa-rupee"></i>&nbsp;&nbsp;<?php echo $display[0]->price; ?></h4>
                                <h4 style="margin-top: 25px;margin-bottom: 10px;"><b>Overview</b></h4>
                                <div class="col-md-1 col-xs-2" style="padding: 0px;">
                                    <span><i class="fa fa-road" style="color: #000; font-size: 30px;margin-top: 6px;"></i></span>
                                </div>
                                <div class="col-md-5 col-xs-4" style="padding: 0px;">
                                    <span>&nbsp;&nbsp;KMs Driven</span>
                                    <p style="margin-left: 8px;"><b>27,560</b></p>
                                </div>
                                <div class="col-md-1 col-xs-2" style="padding: 0px;margin-top: 2px;">
                                    <span><img src="<?php echo base_url(); ?>carmela/images/fuel.png" style="height: 40px;margin-top: 5px;"></span>
                                </div>
                                <div class="col-md-5 col-xs-4" style="padding: 0px;margin-top: 2px;">
                                    <span>&nbsp;&nbsp;Fuel Type</span>
                                    <p style="margin-left: 8px;"><b>Petrol</b></p>
                                </div>
                                <br/>
                                <br/>
                                <br/>
                                <a href="#bottom" style="color:#FF6200;font-size: 15px;">View All Specification</a>
                            </div>
                        </div>
                        <br/>
                        <hr>
                        <br/>
                        <!-- start: page -->
                        <div class="owl-carousel owl-theme" data-plugin-carousel data-plugin-options='{ "dots": true, "autoplay": true, "autoplayTimeout": 3000, "loop": true, "margin": 10, "nav": false, "responsive": {"0":{"items":1 }, "600":{"items":3 }, "1000":{"items":6 } }  }'>
                            <?php
                            foreach($display as $val)
                            {
                            ?>
                            <div class="item"><img class="img-thumbnail" onclick="imgg(<?php echo $val->image_id; ?>,'images');" src="<?php echo base_url().$val->path; ?>" style="width: 139px; height: 96px;" alt=""></div>
                            <?php
                            }
                            ?>
                        </div>
                        <hr>
                        <div id="bottom" style="margin-top: 30px;">
                            <h4 style="text-align: center;font-weight: bold;">Car Specification</h4>
                        </div>
                        <div class="row">
                            <?php
                            $detail = $this->md->my_select('tbl_car_detail',array('car_id'=>$this->uri->segment(2)));
                            $upcategory = $this->md->my_select('tbl_car_detail',array('model_id'=>$detail[0]->model_id));

                            $model = $this->md->my_select('tbl_attribute_set',array('category_id'=>$upcategory[0]->model_id));

                            foreach($model as $val)
                            {
                                $value = $this->md->my_select('tbl_attribute',array('set_id'=>$val->set_id));
                            ?>
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table-striped text-center table-hover" >
                                        <br/>
                                        <thead class="table-bordered" style="text-transform: capitalize;">
                                            <tr>
                                                <th colspan="2" style="text-align: center;"><h4><?php echo $val->set_name; ?></h4></th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-bordered" style="text-transform: capitalize;">
                                            <?php
                                            foreach($value as $v)
                                            {
                                                $sv = $this->md->my_select('tbl_attribute_value',array('attribute_id'=>$v->attribute_id,'car_id'=>$detail[0]->car_id));
                                                $c=count($sv);
                                                if($c>0)
                                                {
                                                if($sv[0]->value != "")
                                                {
                                            ?>
                                            <tr>
                                                <th><?php echo $v->attribute_name; ?></th>
                                                <td><?php echo $sv[0]->value; ?></td>
                                            </tr>
                                            <?php
                                                }
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                    </div>
                </section>
            </div>

        </section>

        <!-- Vendor -->
        <script src="<?php echo base_url(); ?>carmela/vendor/jquery/jquery.js"></script>		
        <script src="<?php echo base_url(); ?>carmela/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>		
        <script src="<?php echo base_url(); ?>carmela/vendor/jquery-cookie/jquery-cookie.js"></script>		
        <script src="<?php echo base_url(); ?>carmela/vendor/style-switcher/style.switcher.js"></script>		
        <script src="<?php echo base_url(); ?>carmela/vendor/bootstrap/js/bootstrap.js"></script>		
        <script src="<?php echo base_url(); ?>carmela/vendor/nanoscroller/nanoscroller.js"></script>		
        <script src="<?php echo base_url(); ?>carmela/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>		
        <script src="<?php echo base_url(); ?>carmela/vendor/magnific-popup/jquery.magnific-popup.js"></script>		
        <script src="<?php echo base_url(); ?>carmela/vendor/jquery-placeholder/jquery-placeholder.js"></script>

        <!-- Specific Page Vendor -->
        <script src="<?php echo base_url(); ?>carmela/vendor/owl.carousel/owl.carousel.js"></script>

        <!-- Theme Base, Components and Settings -->
        <script src="<?php echo base_url(); ?>carmela/javascripts/theme.js"></script>

        <!-- Theme Custom -->
        <script src="<?php echo base_url(); ?>carmela/javascripts/theme.custom.js"></script>

        <!-- Theme Initialization Files -->
        <script src="<?php echo base_url(); ?>carmela/javascripts/theme.init.js"></script>
        <!-- Analytics to Track Preview Website -->		
        <script>		  (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o), m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '../../../www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-42715764-8', 'auto');
            ga('send', 'pageview');</script>
        <script src="<?php echo base_url(); ?>carmela/javascripts/set.js" type="text/javascript"></script>
        
    </body>


</html>