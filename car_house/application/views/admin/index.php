<!doctype html>
<html class="fixed">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">
        <meta name="keywords" content="HTML5 Admin Template" />
        <meta name="description" content="Porto Admin - Responsive HTML5 Template">
        <meta name="author" content="okler.net">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.css" />

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/magnific-popup/magnific-popup.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stylesheets/theme.css" />
        <!-- link image -->
        <link href="<?php echo base_url() ?>images/favicon.png" rel="icon"/>

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stylesheets/theme-custom.css">

        <!-- Head Libs -->
        <script src="<?php echo base_url(); ?>assets/vendor/modernizr/modernizr.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/style-switcher/style.switcher.localstorage.js"></script>
        <script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>

        <title>Authontication - Car House</title>
        

    </head>
    <body>
        <!-- start: page -->
        <section class="body-sign">
            <div class="center-sign">
                <div class="row">
                    <div class="col-md-offset-4 col-xs-offset-4">
                        <div class="adminlogo wow slideInLeft" data-wow-delay="0.3s" title="Car house" style="position: fixed;">
                            <h3><a href="<?php echo base_url(); ?>Home">Car<span style="color: #555555;"> House</span></a></h3>
                            <h2><a href="<?php echo base_url(); ?>Home">Everyone Dreams of Car</a></h2>
                        </div>
                    </div>
                </div>
                <br/>
                <br/>
                <div class="panel panel-sign">
                    <div class="panel-body" style=" border-left: 1px solid gray; border-right: 1px solid gray; border-bottom: 1px solid gray;">
                        <form method="post" class="my-form" novalidate="">
                            <div class="form-group mb-lg">
                                <label>Username</label>
                                <div class="input-group input-group-icon">
                                    <input name="username"  type="text" style="text-transform:lowercase;" value="<?php 
                                    if(get_cookie('username') != "")
                                    {
                                        echo get_cookie('username');
                                    }
                                    ?>" class="form-control input-lg" required="" pattern="^[a-zA-Z ]+$" />
                                </div>
                            </div>
                            <div class="form-group mb-lg">
                                <div class="clearfix">
                                    <label class="pull-left">Password</label>
                                    <a href="<?php echo base_url(); ?>Lost-Password" class="pull-right">Lost Password?</a>
                                </div>
                                <div class="sign-pass input-group input-group-icon">
                                    <input type="password" name="pwd" autocomplete="off" value="<?php
                                    if(get_cookie('password') != "")
                                    {
                                        echo $this->encryption->decrypt(get_cookie('password'));
                                    }
                                    ?>"  id="pwd" style="width:99%;" style="position: relative;" class="form-control input-lg" required="" pattern="^(AB|)[a-zA-Z0-9]{8,16}$" />

                                    <span class="icon icon-lg" >
                                        <i class="fa fa-eye-slash" id="eyeslash" title="Show Password"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="checkbox-custom checkbox-default">
                                        <input id="RememberMe" name="rememberme" type="checkbox" <?php
                                        if(get_cookie('username'))
                                        {
                                            echo 'checked';
                                        }
                                        ?>/>
                                        <label for="RememberMe">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-right">
                                    <button type="submit" name="login" value="Sign In" class="btn hidden-xs" style="background-color: #FF6200;color: white;">Sign In</button>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-12 col-xs-12">
                                    <?php
                                    if(isset($error))
                                    {
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
                                    <?php
                                    if($this->uri->segment(2))
                                    {
                                    ?>
                                        <div class="alert alert-success alert-dismissable">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            Email Send On Registered Email Id.
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>

                <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All Rights Reserved.</p>
            </div>
        </section>
        <!-- end: page -->

        <!-- Vendor -->
        <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.js"></script>		<script src="<?php echo base_url(); ?>assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>		<script src="<?php echo base_url(); ?>assets/vendor/jquery-cookie/jquery-cookie.js"></script>		<script src="<?php echo base_url(); ?>assets/vendor/style-switcher/style.switcher.js"></script>		<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.js"></script>		<script src="<?php echo base_url(); ?>assets/vendor/nanoscroller/nanoscroller.js"></script>		<script src="<?php echo base_url(); ?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>		<script src="<?php echo base_url(); ?>assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>		<script src="<?php echo base_url(); ?>assets/vendor/jquery-placeholder/jquery-placeholder.js"></script>

        <!-- Theme Base, Components and Settings -->
        <script src="<?php echo base_url(); ?>assets/javascripts/theme.js"></script>

        <!-- Theme Custom -->
        <script src="<?php echo base_url(); ?>assets/javascripts/theme.custom.js"></script>

        <!-- Theme Initialization Files -->
        <script src="<?php echo base_url(); ?>assets/javascripts/theme.init.js"></script>
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
            ga('send', 'pageview');



        </script>
        <script src="<?php echo base_url(); ?>assets/javascripts/adminjava.js"/></script>

</body>

</html>