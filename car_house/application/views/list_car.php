<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>View All Car - Car House</title>

        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>visitor/images/favicon.png" />

        <link href="<?php echo base_url(); ?>visitor/css/master.css" rel="stylesheet">
        <style>
            input[type=range] {
              width: 100%;
              -webkit-appearance: none;
              margin: 0;
            }
            input[type=range]:focus {
              outline: none;
            }
            input[type=range]::-webkit-slider-runnable-track {
              width: 100%;
              height: 19px;
              cursor: pointer;
              box-shadow: 0 4px 4px rgba(0,0,0,0.3) inset;
              background: linear-gradient(to right, #005fc2, #35A834 40%, #ffd400 65%, #FF6400);
             
              border: 0.2px solid #010101;
            }
            input[type=range]::-webkit-slider-thumb {
              box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
              border: 1px solid #000000;
              height: 20px;
              width: 20px;
              border-radius: 20px;
              background: white;
              cursor: pointer;
              -webkit-appearance: none;
              margin-top: -1px;
            }
            #slide:before {
              content: attr(min);
              position: absolute;
              bottom: 0;
              left: 0;
              color: #fff;
              font-size: 1rem;
              top: 123px;
            }
            #slide:after {
              content: attr(max);
              position: absolute;
              bottom: 0;
              right: 0;
              color: #fff;
              font-size: 1rem;
              top: 123px;
            }
            #val {
              font-size: 1.6rem;
              position: absolute;
              left: 0;
              bottom: 26px;
              width: 100px;
            }
            .form {
              height: 100px;
              display: flex;
              justify-content: space-evenly;
              align-items: center;
              flex-direction: column;
            }
        </style>
    </head>
    <body class="m-listingsTwo" data-scrolling-animations="true" onload="viewmorelist(9)">
        
        <?php
        $this->load->view("header_top");
        ?>
        <?php
        $this->load->view("header_bottom");
        ?>
        <section class="b-pageHeader">
            <div class="container">
                <h1 class="wow zoomInLeft" data-wow-delay="0.5s">View All Car</h1>
                <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.5s">
                    <h3>Get In Touch With Us Now</h3>
                </div>
            </div>
        </section>
        <div class="b-breadCumbs s-shadow">
            <div class="container wow zoomInUp" data-wow-delay="0.5s">
                <a href="<?php echo base_url(); ?>Home" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="<?php echo base_url(); ?>List-View-All-Car" class="b-breadCumbs__page m-active">View All Car</a>
            </div>
        </div><!--b-breadCumbs-->

        <div class="b-infoBar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-xs-12">
                        <div class="b-infoBar__compare wow zoomInUp" data-wow-delay="0.5s">
                            <?php
                            if($this->session->userdata("userid") != "")
                            {
                                $recent = $this->md->my_select('tbl_recent_view',array('register_id'=>$this->session->userdata("userid")));
                            ?>
                            <form method="post">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle b-infoBar__compare-item" data-toggle='dropdown'><span class="fa fa-clock-o"></span>RECENTLY VIEWED<span class="fa fa-caret-down"></span></a>
                                    <ul class="dropdown-menu">
                                        <?php
                                        foreach($recent as $re)
                                        {
                                            $cname = $this->md->my_select("tbl_car_detail",array('car_id'=>$re->car_id));
                                        ?>
                                        <li><a href="<?php echo base_url(); ?>Car-Detail/<?php echo $cname[0]->car_id; ?>" style="float: left;"><?php echo ucwords($cname[0]->carname); ?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <a class="b-infoBar__compare-item" href="<?php echo base_url(); ?>Compare" id="compare"><span class="fa fa-compress"></span>COMPARE VEHICLES</a>
                            </form>
                            <?php
                            }
                            else
                            {
                            ?>
                            <form method="post">
                                <div class="dropdown">
                                    <a href="<?php echo base_url(); ?>Login" class="dropdown-toggle b-infoBar__compare-item" data-toggle='dropdown'><span class="fa fa-clock-o"></span>RECENTLY VIEWED<span class="fa fa-caret-down"></span></a>
                                </div>
                                <a class="b-infoBar__compare-item" href="<?php echo base_url(); ?>Compare" id="compare"><span class="fa fa-compress"></span>COMPARE VEHICLES</a>
                            </form>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xs-12">
                        <div class="b-infoBar__select wow zoomInUp" data-wow-delay="0.5s">
                            <form method="post">
                                <div class="b-infoBar__select-one">
                                    <span class="b-infoBar__select-one-title">SELECT VIEW</span>
                                    <a href="<?php echo base_url(); ?>List-View-All-Car" class="m-list m-active"><span class="fa fa-list"></span></a>
                                    <a href="<?php echo base_url(); ?>All-Car" class="m-table"><span class="fa fa-table"></span></a>
                                </div>
                                <div class="b-infoBar__select-one" style="width: 300px;">
                                    
                                </div>
                                <div class="b-infoBar__select-one">
                                    <span class="b-infoBar__select-one-title">SORT BY</span>
                                    <select name="select2" class="m-select">
                                        <option value="" selected="">Last Added</option>
                                    </select>
                                    <span class="fa fa-caret-down"></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--b-infoBar-->

        <div class="b-items">
            <div class="container">
                <div class="row">
                    <?php
                    $this->load->view('listfilter');
                    ?>
                    <div id="sort">
                        
                    </div>
                </div>
            </div>
        </div><!--b-items-->
        <?php
        $this->load->view("master_footer");
        ?>
    </body>
</html>