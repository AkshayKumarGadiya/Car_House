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
    <body class="m-listTable" data-scrolling-animations="true" data-equal-height=".b-items__cell">
        
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
                <a href="<?php echo base_url(); ?>Home" class="b-breadCumbs__page" style="text-decoration: none;">Home</a><span class="fa fa-angle-right"></span><a href="<?php echo base_url(); ?>All-Car" class="b-breadCumbs__page m-active" style="text-decoration: none;">View All Car</a>
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
                                    <a href="<?php echo base_url(); ?>List-View-All-Car" class="m-list"><span class="fa fa-list"></span></a>
                                    <a href="<?php echo base_url(); ?>All-Car" class="m-table m-active"><span class="fa fa-table"></span></a>
                                </div>
                                <div class="b-infoBar__select-one" style="width: 300px;">
                                    
                                </div>
                                <div class="b-infoBar__select-one">
                                    <span class="b-infoBar__select-one-title">SORT BY</span>
                                    <select name="sort" class="m-select" onchange="sorted(this.value,'sort')">
                                        <option value="ladd">LAST ADDED</option>
                                        <option value="atoz">A To Z</option>
                                        <option value="ztoa">Z To A</option>
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
                    <div class="col-lg-9 col-sm-8 col-xs-12" id="sort">
                        <h3 style="text-align: center;color: #FF6200;">Search Result For : <?php echo ucwords($product[0]->carname); ?></h3>
                        <br/>
                        <div class="row">
                            <?php
                            foreach($product as $val)
                            {
                            ?>
                            <div class="col-lg-4 col-md-6 col-xs-12">
                                
                                <a href="<?php echo base_url(); ?>Car-Detail/<?php echo $val->car_id; ?>" style="text-decoration: none;"><div class="b-items__cell wow zoomInUp" data-wow-delay="0.5s">
                                    <div class="b-items__cars-one-img">
                                        <?php
                                             $ii = $this->md->my_select('tbl_car_image', array('car_id' => $val->car_id))[0]->path;
                                        ?>
                                        <img src="<?php echo base_url().$ii; ?>" style="width: 250px;height: 221px;" title="<?php echo $val->carname; ?>"/>
                                        <?php
                                        if($val->offer_id != 0)
                                        {
                                            if($val->offer_id != 0)
                                            {
                                                $rate = $this->md->my_select('tbl_offer',array('offer_id'=>$val->offer_id[0]));
                                        ?>
                                        
                                        <span class="b-items__cars-one-img-type m-premium"><?php echo $rate[0]->offer_rate; ?>% OFF</span>
                                        <?php
                                            }
                                        }
                                        ?>
                                        <form method="post">
                                            <input type="checkbox" name="check1" id='<?php echo $val->car_id; ?>' value='<?php echo $val->car_id; ?>' class="get"/>
                                            <label for="<?php echo $val->car_id; ?>" class="b-items__cars-one-img-check"><span class="fa fa-check"></span></label>
                                        </form>
                                    </div>
                                    <div class="b-items__cell-info rate">
                                        <div class="s-lineDownLeft b-items__cell-info-title">
                                            <h2 style="min-height: 10px;text-transform: capitalize;"><?php if(strlen($val->carname) > 0 && strlen($val->carname) < 27) { echo $val->carname; } else { echo $a = substr($val->carname,0,24).'...'; } ?></h2>
                                        </div>
                                        <p>
                                            <?php
                                            if($val->offer_id != 0)
                                            {
                                                $c = $val->price;
                                                $a = strlen($c);
                                                $ext = "";
                                                $number_of_digits = $a;
                                                $cc=1;
                                                if($a % 2 != 0)
                                                {
                                                for($i=2;$i<$a;$i++)
                                                {
                                                    $cc.="0";

                                                }
                                                }
                                                else {
                                                    for($i=1;$i<$a;$i++)
                                                {
                                                    $cc.="0";

                                                }
                                                }
                                                $fraction=$c/$cc;
                                                $fraction=number_format($fraction,2);
                                                if($number_of_digits==4 ||$number_of_digits==5)
                                                    $ext="k";
                                                if($number_of_digits==6 ||$number_of_digits==7)
                                                    $ext="Lac";
                                                if($number_of_digits==8 ||$number_of_digits==9)
                                                    $ext="Cr";
                                                
                                                $rrate = $this->md->my_select('tbl_offer',array('offer_id'=>$val->offer_id))[0]->offer_rate;
                                                $oprice = ($val->price - ($val->price * $rrate) / 100 );

                                                $op = $oprice;
                                                $b = strlen($op);
                                                $ext = "";
                                                $number_of_digits = $b;
                                                $ccc=1;
                                                if($b % 2 != 0)
                                                {
                                                for($i=2;$i<$b;$i++)
                                                {
                                                    $ccc.="0";

                                                }
                                                }
                                                else {
                                                    for($i=1;$i<$b;$i++)
                                                {
                                                    $ccc.="0";

                                                }
                                                }
                                                $f=$op/$ccc;
                                                $f=number_format($f,2);
                                                if($number_of_digits==4 ||$number_of_digits==5)
                                                    $ext="k";
                                                if($number_of_digits==6 ||$number_of_digits==7)
                                                    $ext="Lakh";
                                                if($number_of_digits==8 ||$number_of_digits==9)
                                                    $ext="Cr";
                                            ?>
                                            <span class="fa fa-inr" style="font-size: 16px;color: #565656;">&nbsp;<?php echo $f." ".$ext; ?> /-</span>
                                            <span style="font-size: 16px;color: #565656;float: right;">&nbsp;<strike class="fa fa-inr" >&nbsp;<?php echo $fraction." ".$ext; ?> /-</strike></span>
                                            <?php
                                            }
                                            else
                                            {
                                                $c = $val->price;
                                                $a = strlen($c);
                                                $ext = "";
                                                $number_of_digits = $a;
                                                $cc=1;
                                                if($a % 2 != 0)
                                                {
                                                for($i=2;$i<$a;$i++)
                                                {
                                                    $cc.="0";

                                                }
                                                }
                                                else {
                                                    for($i=1;$i<$a;$i++)
                                                {
                                                    $cc.="0";

                                                }
                                                }
                                                $fraction=$c/$cc;
                                                $fraction=number_format($fraction,2);
                                                if($number_of_digits==4 ||$number_of_digits==5)
                                                    $ext="k";
                                                if($number_of_digits==6 ||$number_of_digits==7)
                                                    $ext="Lac";
                                                if($number_of_digits==8 ||$number_of_digits==9)
                                                    $ext="Cr";
                                            ?>
                                            <span class="fa fa-inr" style="font-size: 16px;color: #565656;">&nbsp;<?php echo $fraction." ".$ext ?> /-</span>
                                            <?php
                                            }
                                            ?>
                                        </p>
                                        <?php
                                        $drate = $this->md->my_query("select count(*) as cn from tbl_rating where car_id ='".$val->car_id."'")[0]->cn;
                                        if($drate == 0)
                                        {
                                           for($i=1;$i<=5;$i++)
                                            {
                                        ?>
                                            <span class="fa fa-star-o" style="color: #FF6200;font-size: 20px;"></span>
                                            
                                        <?php
                                            }
                                        ?>
                                            <span class="b-world__item-num" style="background-color:#FF6200 ;color: white" id="hello">0 Rate</span>
                                        <?php
                                        }
                                        else
                                        {
                                        $ratesum = $this->md->my_query("SELECT SUM(rate) as s FROM tbl_rating WHERE car_id=".$val->car_id)[0]->s;
                                        $rateuser = $this->md->my_query("select count(register_id) as c from tbl_rating where car_id=".$val->car_id)[0]->c;
                                        $totalrate = round($ratesum / $rateuser);
                                        for($i=1;$i<=$totalrate;$i++)
                                        {
                                        ?>
                                        <span class="fa fa-star" style="color: #FF6200;font-size: 20px;"></span>
                                        <?php
                                        }
                                        for($j=$i;$j<=5;$j++)
                                        {
                                    ?>
                                    <i class="fa fa-star-o" style="color: #FF6200;font-size: 20px;"></i>
                                    <?php
                                        }
                                        ?>
                                        <span class="b-world__item-num" style="background-color:#FF6200 ;color: white" id="hello"><?php echo $totalrate." Rate"; ?></span>
                                        <?php
                                        }
                                        ?>
                                        
                                        <div class="row">
                                            <?php
                                                if($this->session->userdata('userid') != "")
                                                {
                                            ?>
                                            <div class="col-xs-6 col-md-6 <?php echo $val->car_id; ?>">
                                                <?php
                                                    $wishc = $this->md->my_query('select count(*) as c from tbl_wishlist where car_id ="'.$val->car_id.'" and register_id = "'.$this->session->userdata('userid').'"')[0]->c;
                                                    if($wishc == 0)
                                                    {
                                                ?>
                                                <a class="btn m-btn" style="margin-top: 16px;" onclick="addwish(<?php echo $val->car_id; ?>)" title="Add Wishlist">ADD WISH<span class="fa fa-angle-right"></span></a>
                                                <?php
                                                    }
                                                    else
                                                    {
                                                ?>
                                                <a class="btn m-btn" style="margin-top: 16px;background-color: #565656;color: #fff;" title="Added To Wish">ADDED WISH<span class="fa fa-angle-right" style='background-color:white;color:#000;'></span></a>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                            <?php
                                                }
                                                else
                                                {
                                            ?>
                                            <div class="col-xs-6 col-md-6">
                                                <a href="<?php echo base_url(); ?>Login" class="btn m-btn" style="margin-top: 16px;">ADD WISH<span class="fa fa-angle-right"></span></a>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                            <div class="col-xs-6 col-md-6" style="padding-left: 8px;">
                                                    <a href="<?php echo base_url(); ?>Car-Detail/<?php echo $val->car_id; ?>" class="btn m-btn" style="margin-top: 16px;">VIEW DETAIL<span class="fa fa-angle-right"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    </div></a>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                        $this->load->view("filterpanel");
                    ?>
                </div>
            </div>
        </div><!--b-items-->
        <?php
        $this->load->view("master_footer");
        ?>
    </body>
</html>
<script type="text/javascript">
    $(".get").click(function () {
        $id1 = $(this).attr('value');
        $id2 = $("#compare").attr('href');
        $url = $id2+"/"+$id1;
        $("#compare").attr('href',$url);
    });
    
    function sorted(id,action)
    {
        var base="http://localhost/car_house/";
        var path=base+'Ajax/'+action;
        var data={id:id,action:action};
        $.post(path,data,function(ans){
           $("#"+action).html(ans);
        });
    }
</script>