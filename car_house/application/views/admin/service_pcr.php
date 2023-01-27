<!doctype html>
<html class="fixed">
    <?php
    $this->load->view('admin/header_link');
    ?>
    <style>
            /* check & radio */
            .c {
                position: relative;
                padding-left: 20px;
                margin-bottom: 12px;
                margin-left: 10px;
                margin-top: 6px;
                cursor: pointer;
                font-size: 13px;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
            .d
            {
                font-size: 13px;
            }
            /* Hide the browser's default radio button */
            .c input {
                position: absolute;
                opacity: 0;
                cursor: pointer;
            }
            /* Create a custom radio button */
            .checkmark {
                position: absolute;
                top: 0px;
                left: 0;
                height: 15px;
                width: 15px;
                background-color: #eee;
                border-radius: 50%;
            }
            /* On mouse-over, add a grey background color */
            .c:hover input ~ .checkmark {
                background-color: #ccc;
            }
            /* When the radio button is checked, add a blue background */
            .c input:checked ~ .checkmark {
                background-color: #FF6200;
            }
            /* Create the indicator (the dot/circle - hidden when not checked) */
            .checkmark:after {
                content: "";
                position: absolute;
                display: none;
            }
            /* Show the indicator (dot/circle) when checked */
            .c input:checked ~ .checkmark:after {
                display: block;
            }
            /* Style the indicator (dot/circle) */
            .c .checkmark:after {
                top: 5px;
                left: 5px;
                width: 5px;
                height: 5px;
                border-radius: 50%;
                background: white;
            }
            .errmsg1 + p
            {
                font-size: 12px;
                margin-top: -30px;
                margin-bottom: -25px;
                color: #ff6200;
                margin-left: 10px;
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
                        <h2>Manage Carmela</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Admin-Home">
                                        <i class="fa fa-home dashboard"></i>
                                    </a>
                                </li>
                                <li><span class="dashboardname">Manage Carmela</span></li>
                            </ol>
                        </div>
                    </header>
                    <div class="panel-body">
                        <section class="content-with-menu-has-toolbar media-gallery">
                            <div class="">
                                <div class="">
                                    <div class="row mg-files" data-sort-destination data-sort-id="media-gallery" style="padding: 15px;padding-bottom: 0px;">
                                        <div class="col-md-12">
                                            <section class="panel">
                                                <div class="panel-body">
                                                    <div class="table-responsive">
                                                        <?php
                                                        $c=0;
                                                        foreach($plat as $val)
                                                        {
                                                            $c++;
                                                        ?>
                                                        <div class="col-md-6">
                                                        <table class="table table-striped text-center" >
                                                            <thead>
                                                                <tr>
                                                                    <td>Plat No</td>
                                                                    <td style="text-transform: uppercase;"><?php echo $val->plat_no; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Service Name</th>
                                                                    <th>Pending</th>
                                                                    <th>Running</th>
                                                                    <th>Complete</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody style="text-transform: lowercase;">
                                                                <?php
                                                                $i=0;
                                                                    $pcr = $this->md->my_query("SELECT us.user_service_id , us.booking_id , us.position_id , us.status as ustatus , sp.service_id , ss.* FROM tbl_user_service AS us , tbl_service_position AS sp , tbl_service  AS ss WHERE us.booking_id = '".$val->booking_id."' AND us.position_id = sp.position_id AND sp.service_id = ss.service_id");
                                                                    foreach($pcr as $p)
                                                                    {
                                                                        $i++;
                                                                        
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $p->name." Service"; ?></td>
                                                                    <td>
                                                                        <?php
                                                                        if($p->ustatus == 0)
                                                                        {
                                                                        ?>
                                                                        <label class="radio c">
                                                                            <input type="radio" name="status<?php echo $c.$i; ?>" checked="">
                                                                        <span class="checkmark"></span>
                                                                        </label>
                                                                        <?php
                                                                        }
                                                                        else
                                                                        {
                                                                        ?>
                                                                        <label class="radio c">
                                                                        <input type="radio" name="status<?php echo $c.$i; ?>">
                                                                        <span class="checkmark"></span>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <label class="radio c">
                                                                        <input type="radio" name="status<?php echo $c.$i; ?>" <?php if($p->ustatus == 1){ echo 'checked'; } ?> onclick="run(<?php echo $p->user_service_id; ?>,1);">
                                                                        <span class="checkmark"></span>
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                         <label class="radio c">
                                                                        <input type="radio" name="status<?php echo $c.$i; ?>" <?php if($p->ustatus == 2){ echo 'checked'; } ?> onclick="run(<?php echo $p->user_service_id; ?>,2);">
                                                                        <span class="checkmark"></span>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </section>
            </div>
        </section>
        <?php
        $this->load->view('admin/footer_script');
        ?>
    </body>
</html>
<script src="<?php echo base_url(); ?>assets/javascripts/set.js" type="text/javascript"></script>