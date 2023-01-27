<!DOCTYPE html>
<html>

    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
<!--        <title>Car House - Eye it..try it..buy it!</title>-->
        <script src="<?php echo base_url(); ?>visitor/js/jquery-3.2.1.min.js" type="text/javascript"></script>
              
        <?php
        $this->load->view("header_link");
        ?>

    </head>
    <body class="m-index" data-scrolling-animations="true" data-equal-height=".b-auto__main-item">

        <!-- Loader -->
<!--        <div id="page-preloader"><span class="spinner"></span></div>-->
        <!-- Loader end -->
        <?php
        $this->load->view("header_top");
        ?>
        <?php
        $this->load->view("header_bottom");
        ?>
