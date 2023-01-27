<!DOCTYPE html>
<html>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title><?php echo $cardetail[0]->carname; ?> - Car House</title>
        <script src="<?php echo base_url(); ?>visitor/js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>visitor/images/favicon.png" />
        
        <link href="<?php echo base_url(); ?>visitor/css/master.css" rel="stylesheet">
        <style>
            .s-form button[type='button']{
                font: 700 12px 'Open Sans',sans-serif;
                padding-left: 20px;
                color: #fff;
                margin-top: 25px;
            }

            .s-form button[type='button'] span.fa{
                background-color: #fff;
                color: #000;
                width: 25px;
                height: 25px;
                padding: 3px;
                font-size: 16px;
                margin-left: 10px;
            }
            #fileupd:hover
            {
                cursor: pointer;
                color: #FF6200;
                font-weight: bold;
            }

            #fileupd div h3
            {
                
                border: 2px dashed #FF6200;
                text-align: center;
                background-color: #F9F9F9;
                padding: 38px 15px 15px 15px;
                border-radius: 5px;
                height: 108px;
            }
            .errmsg1 + p
            {
                font-size: 12px;
                margin-top: -7px;
                color: #ff6200;
                margin-left: 10px;
            }
        </style>
    </head>
    <body class="m-detail m-listTable" data-scrolling-animations="true" data-equal-height=".b-auto__main-item">
       
        <div class="backdiv" id="review">
            <div class="contentdiv">
                <div class="contentdiv1">
                    <h2 class="s-title1">Thanks For Review</h2>
                </div>
                <div class="contentdiv2">
                    <p>Thanks for giving review.</p>
                    <div class="text-right">
                        <button type="submit" class="btn m-btn cls" style="background-color: #FF6200;color:#fff;font-size:12px;">CANCEL<i class="fa fa-close" style="border-radius: 15px;font-size:17px;margin:0 5px;width: 23px;height: 20px;background-color: #fff;color:#000;" ></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="backdiv" id="testdrive">
            <div class="contentdiv">
                <div class="contentdiv1">
                    <h2 class="s-title1">Thanks For Book  Test Drive</h2>
                </div>
                <div class="contentdiv2">
                    <p>Your Test Drive Booked Successfully.</p>
                    <div class="text-right">
                        <button type="submit" class="btn m-btn cls" style="background-color: #FF6200;color:#fff;font-size:12px;">CANCEL<i class="fa fa-close" style="border-radius: 15px;font-size:17px;margin:0 5px;width: 23px;height: 20px;background-color: #fff;color:#000;" ></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="backdiv" id="opnrate">
            <div class="contentdiv">
                <div class="contentdiv1">
                    <h2 class="s-title1">Thanks For Rating</h2>
                </div>
                <div class="contentdiv2">
                    <p>Your Rate Is Successfully Submited.</p>
                    <div class="text-right">
                        <button type="submit" class="btn m-btn cls" style="background-color: #FF6200;color:#fff;font-size:12px;">CANCEL<i class="fa fa-close" style="border-radius: 15px;font-size:17px;margin:0 5px;width: 23px;height: 20px;background-color: #fff;color:#000;" ></i></button>
                    </div>
                </div>
            </div>
        </div>
        <section class="b-modal">
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Video</h4>
                        </div>
                        <div class="modal-body">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/a_ugz7GoHwY" allowfullscreen></iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--b-modal-->
        <?php
        $this->load->view("header_top");
        ?>
        <?php
        $this->load->view("header_bottom");
        ?>
        <section class="b-pageHeader">
            <div class="container">
                <h1 class="wow zoomInLeft" data-wow-delay="0.5s">CAR DETAILS</h1>
                <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.5s">
                    <h3>Get In Touch With Us Now</h3>
                </div>
            </div>
        </section>
        <div class="b-breadCumbs s-shadow wow zoomInUp" data-wow-delay="0.5s">
            <div class="container">
                <a href="<?php echo base_url(); ?>Home" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="<?php echo base_url(); ?>All-car" class="b-breadCumbs__page" style="text-decoration: none;">All Car</a><span class="fa fa-angle-right"></span><a href="" class="b-breadCumbs__page" style="text-decoration: none;"><?php echo $cardetail[0]->carname; ?></a>
            </div>
        </div><!--b-breadCumbs-->



        <section class="b-detail s-shadow" style="padding-top: 60px;padding-bottom: 0px;">
            <div class="container">
                <header class="b-detail__head s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
                    <div class="row">
                        <div class="col-sm-9 col-xs-12">
                            <div class="b-detail__head-title" style="padding-top: 12px;">
                                <h1 style="border-left:4px solid #f76d2b;text-transform: capitalize;">&nbsp;&nbsp;<?php echo $cardetail[0]->carname; ?></h1>
                             
                                <?php
                                $crew = $this->md->my_query("select count(review_id) as cn from tbl_car_review where car_id = '".$cardetail[0]->car_id."'")[0]->cn;
                                
                                $drate = $this->md->my_query("select count(*) as cn from tbl_rating where car_id ='".$cardetail[0]->car_id."'")[0]->cn;
                                if($drate == 0)
                                {
                                   for($i=1;$i<=5;$i++)
                                    {
                                ?>
                                    <i class="fa fa-star-o" style="color: #FF6200;font-size: 20px;"></i>
                                <?php
                                    } 
                                }
                                else
                                {
                                    $ratesum = $this->md->my_query("SELECT SUM(rate) as s FROM tbl_rating WHERE car_id=".$cardetail[0]->car_id)[0]->s;
                                    $rateuser = $this->md->my_query("select count(register_id) as c from tbl_rating where car_id=".$cardetail[0]->car_id)[0]->c;
                                    $totalrate = round($ratesum / $rateuser);
                                    for($i=1;$i<=$totalrate;$i++)
                                    {
                                    ?>
                                    <i class="fa fa-star" style="color: #FF6200;margin-top: 10px;font-size: 20px;"></i>
                                    <?php
                                    }
                                    for($j=$i;$j<=5;$j++)
                                    {
                                ?>
                                <i class="fa fa-star-o" style="color: #FF6200;font-size: 20px;"></i>
                                <?php
                                    }
                                }
                                ?>
                                <span class="b-world__item-num" style="background-color:#FF6200 ;color: white" id="hello"><?php echo $crew; ?>&nbsp;Review </span>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                            <div class="b-detail__head-price">
                                <?php
                                if($cardetail[0]->offer_id != 0)
                                {
                                    $c = $cardetail[0]->price;
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
                                        $ext="Lakh";
                                    if($number_of_digits==8 ||$number_of_digits==9)
                                        $ext="Cr";
                                    //offer less
                                    $rrate = $this->md->my_select('tbl_offer',array('offer_id'=>$cardetail[0]->offer_id))[0]->offer_rate;
                                    $oprice = ($cardetail[0]->price - ($cardetail[0]->price * $rrate) / 100 );
                                    
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
                                <div class="b-detail__head-price-num"><i class="fa fa-inr"></i>&nbsp;<?php echo $f." ".$ext; ?></div>
                                <div class="b-detail__head-price-num"><strike class="fa fa-inr">&nbsp;<?php echo $fraction." ".$ext; ?></strike></div>
                                <?php
                                }
                                else
                                {
                                    $c = $cardetail[0]->price;
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
                                <div class="b-detail__head-price-num"><i class="fa fa-inr"></i>&nbsp;<?php echo $fraction." ".$ext; ?></div>
                                <?php
                                }
                                ?>
                                <p>Included Taxes &amp; Checkup</p>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="b-detail__main">
                    <div class="row">
                        <div class="col-md-8 col-xs-12">
                            <div class="b-detail__main-info">
                                <div class="b-detail__main-info-images wow zoomInUp" data-wow-delay="0.5s">
                                    <div class="row m-smallPadding">
                                        <div class="col-xs-10">
                                            <?php
                                            $proimg = $this->md->my_select("tbl_car_image",array('car_id'=>$cardetail[0]->car_id))[0]->path;
                                            
                                            ?>
                                            <ul class="b-detail__main-info-images-big bxslider enable-bx-slider" data-pager-custom="#bx-pager" data-mode="horizontal" data-pager-slide="true" data-mode-pager="vertical" data-pager-qty="5">
                                                <?php
                                                $i=0;
                                                $proimg = $this->md->my_select("tbl_car_image",array('car_id'=>$cardetail[0]->car_id));
                                                foreach($proimg as $vv)
                                                {
                                                ?>
                                                <li class="s-relative">
                                                    <img class="img-responsive center-block" src="<?php echo base_url().$vv->path; ?>" style="width: 613px;height: 479px;margin-top: 8px;" />
                                                </li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="col-xs-2 pagerSlider pagerVertical">
                                            <div class="b-detail__main-info-images-small" id="bx-pager" style="border: 0px;">
                                            <?php
                                                $i=0;
                                                $proimg = $this->md->my_select("tbl_car_image",array('car_id'=>$cardetail[0]->car_id));
                                                foreach($proimg as $vv)
                                                {
                                                ?>
                                                <a href="#" data-slide-index="<?php echo $i; ?>" class="b-detail__main-info-images-small-one">
                                                    <img class="img-responsive" src="<?php echo base_url().$vv->path; ?>" style="width: 107px;height: 79px;" />
                                                </a>
                                            <?php
                                                $i++;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $v=array();
                                foreach($specification as $val)
                                {
                                    $v[strtolower($val->attribute_name)]=$val->value;
                                }
                                ?>
                                <div class="b-detail__main-info-characteristics wow zoomInUp" data-wow-delay="0.5s" style="text-transform: capitalize;">
                                    <div class="b-detail__main-info-characteristics-one">
                                        <div class="b-detail__main-info-characteristics-one-top">
                                            <div><span class="fa fa-car"></span></div>
                                            <p>Carmela name</p>
                                        </div>
                                        <div class="b-detail__main-info-characteristics-one-bottom">
                                            <?php
                                                $name = $this->md->my_select('tbl_carmela',array('carmela_id'=>$cardetail[0]->carmela_id));
                                                echo $name[0]->name;
                                            ?>
                                        </div>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one">
                                        <div class="b-detail__main-info-characteristics-one-top">
                                            <div><span class="fa fa-trophy"></span></div>
                                            <p>Year</p>
                                        </div>
                                        <div class="b-detail__main-info-characteristics-one-bottom">
                                            <?php if(key_exists("rto parsing year",$v)) { echo $v['rto parsing year']; } else { echo "Not Specified"; } ?>
                                        </div>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one">
                                        <div class="b-detail__main-info-characteristics-one-top">
                                            <div><span class="fa fa-cogs"></span></div>
                                            <p>Gear Type</p>
                                        </div>
                                        <div class="b-detail__main-info-characteristics-one-bottom">
                                            <?php if(key_exists("gear box",$v)) { echo $v['gear box']; } else { echo "Not Specified"; } ?>
                                        </div>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one">
                                        <div class="b-detail__main-info-characteristics-one-top">
                                            <div><span class="fa fa-car"></span></div>
                                            <p>Engine CC</p>
                                        </div>
                                        <div class="b-detail__main-info-characteristics-one-bottom text-uppercase">
                                             <?php if(key_exists("engine displacement",$v)) { echo $v['engine displacement']; } else { echo "Not Specified"; } ?>
                                        </div>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one">
                                        <div class="b-detail__main-info-characteristics-one-top">
                                            <div><span class="fa fa-user"></span></div>
                                            <p>Seating Capacity</p>
                                        </div>
                                        <div class="b-detail__main-info-characteristics-one-bottom">
                                            <?php if(key_exists("seating capacity",$v)) { echo $v['seating capacity']." Seat"; } else { echo "Not Specified"; } ?>
                                        </div>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one">
                                        <div class="b-detail__main-info-characteristics-one-top">
                                            <div><span class="fa fa-fire-extinguisher"></span></div>
                                            <p>Max Power</p>
                                        </div>
                                        <div class="b-detail__main-info-characteristics-one-bottom">
                                            <?php if(key_exists("max power",$v)) { echo $v['max power']; } else { echo "Not Specified"; } ?>
                                        </div>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one">
                                        <div class="b-detail__main-info-characteristics-one-top">
                                            <div><span class="fa fa-tint"></span></div>
                                            <p>Fuel Type</p>
                                        </div>
                                        <div class="b-detail__main-info-characteristics-one-bottom">
                                            <?php if(key_exists("fuel type",$v)) { echo $v['fuel type']; } else { echo "Not Specified"; } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="b-detail__main-info-text wow zoomInUp" data-wow-delay="0.5s">
                                    <div class="b-detail__main-aside-about-form-links">
                                        <a href="#" class="j-tab m-active s-lineDownCenter" data-to='#info1'>Description</a>
                                        <a href="#" class="j-tab" data-to='#info2'>Specification</a>
                                        <?php
                                            if($this->session->userdata('userid') != "")
                                            {
                                        ?>
                                        <a href="#" class="j-tab" data-to='#info3'>Review</a>
                                        <a href="#" class="j-tab" data-to='#info5'>RATE</a>
                                        <?php
                                            }
                                        ?>
                                        <a href="#" class="j-tab" data-to='#info4'>Car Tags</a>
                                        
                                    </div>
                                    <div id="info1" style="text-align: justify;">
                                        <p><?= $cardetail[0]->description; ?></p>
                                    </div>
                                    <div id="info2">
                                        <?php
                                        $pre="";
                                        $spe = $this->md->my_query("SELECT st.set_name , a.attribute_name , av.value FROM tbl_attribute_set as st ,tbl_attribute as a ,tbl_attribute_value as av , tbl_car_detail as p WHERE p.model_id = st.category_id AND st.set_id = a.set_id AND a.attribute_id = av.attribute_id AND av.car_id = p.car_id AND p.car_id = '".$cardetail[0]->car_id."'");
                                        foreach($spe as $single)
                                        {
                                        ?>
                                        <div class="b-detail__main-info-extra">
                                            <?php
                                            if($pre != $single->set_name)
                                            {
                                            ?>
                                            <h2 class="s-titleDet"><?php echo ucwords($single->set_name); ?></h2>
                                            <br/>
                                            <?php
                                            }
                                            ?>
                                            <div class="row">
                                                <div class="col-xs-12 col-md-12">
                                                    <ul>
                                                        <li class="col-md-4 col-xs-6"><span class="fa fa-check" style="font-size: 15px;">&nbsp;&nbsp;<?php echo ucwords($single->attribute_name); ?></span></li>
                                                        <li class="col-md-8 col-xs-6"><span><?php echo ucwords($single->value); ?></span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $pre = $single->set_name;
                                        }
                                        ?>
                                    </div>
                                    <?php
                                        if($this->session->userdata('userid') != "")
                                        {
                                    ?>
                                    <div id="info3">
                                        <div class="col-md-3" style="padding-left: 0px;">
                                            <h2 class="s-titleDet">Car Review</h2>
                                            <?php
                                            $path = $this->md->my_select('tbl_registration',array('registration_id'=>$this->session->userdata('userid')));
                                            if($path[0]->profile_pic == "")
                                            {
                                            ?>
                                            <img src="<?php echo base_url(); ?>user_asset/images/user-blank.png" title="<?php echo $path[0]->name; ?>" class="img-circle" style="height: 110px;width: 110px;margin: 0px 0 0 5px;text-transform: capitalize;">
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                            <img src="<?php echo base_url().$path[0]->profile_pic; ?>" title="<?php echo $path[0]->name; ?>" class="img-circle" style="height: 110px;width: 110px;margin: 0px 0 0 5px;text-transform: capitalize;">
                                            <?php
                                            }
                                            ?>
                                            <p style="font-size: 16px;font-weight: bold;margin: 10px 0 0 5px;text-transform: capitalize;"><?php echo $path[0]->name; ?></p>
                                        </div>
                                        <div class="col-md-9" style="padding-left: 0px;">
                                            <div class="b-contacts__form">
                                                <form method="post" class="my-form s-form">
                                                    <br/><br/><br/>
                                                    <textarea name="text" id="reviewmsg" placeholder="WRITE YOUR REVIEW ABOUT THIS CAR..." style="border: 1px solid #CBCBCB;" pattern="^[A-Za-z0-9 ]+$"></textarea>
                                                    <button type="button" class="btn m-btn" onclick="addreview(<?php echo $cardetail[0]->car_id; ?>)" style="float: right;">ADD REVIEW<span class="fa fa-angle-right"></span></button>
                                                </form>
                                            </div>
                                            
                                        </div>
                                        <div id="reviewerror" style="color: #FF6200;">
                                            
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                    <div id="info4">
                                        <div class="col-md-12" style="padding-left: 0px;">
                                            <h2 class="s-titleDet">Car Tags</h2>
                                            <?php
                                            $tag = $this->md->my_select('tbl_tag',array('car_id'=>$cardetail[0]->car_id));
                                            $a = explode(',', $tag[0]->tag);
                                            foreach($a as $td)
                                            {
                                                
                                            ?>
                                           <span class="tag" style="cursor: pointer;"><i class="fa fa-tags"></i>&nbsp;<?php echo $td; ?></span>
                                           <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    if($this->session->userdata("userid") != "")
                                    {
                                    ?>
                                    <div id="info5">
                                        <div class="col-md-12" style="padding-left: 0px;">
                                            <h2 class="s-titleDet">RATE</h2>
                                            <div class="col-md-12 text-center">
                                            <?php
                                                
                                                $drate = $this->md->my_query("select count(*) as cn from tbl_rating where car_id ='".$cardetail[0]->car_id."' and register_id='".$this->session->userdata("userid")."'")[0]->cn;
                                            ?>
                                                <div class="col-md-12 text-center">
                                            <?php
                                                $pr = $this->md->my_select("tbl_registration",array('registration_id'=>$this->session->userdata('userid')));
                                                if($pr[0]->profile_pic != "")
                                                {
                                            ?>
                                                <img src="<?php echo base_url().$pr[0]->profile_pic; ?>" class="img-circle" style="width: 100px;height: 100px;" />
                                            <?php
                                                }
                                                else
                                                {
                                            ?>
                                                <img src="<?php echo base_url(); ?>user_asset/images/user-blank.png" class="img-circle" style="width: 100px;height: 100px;" />
                                            <?php
                                                }
                                            ?>
                                                </div>
                                                
                                            <?php
                                                if($drate == 0)
                                                {
                                            ?>
                                                <div class="col-md-12 text-center">
                                                    <br/>
                                            <?php
                                                    for($i=1;$i<=5;$i++)
                                                    {
                                                ?>
                                                <i class="fa fa-star-o star" style="color: #FF6200;font-size: 20px;" value="<?php echo $i; ?>" id="s<?php echo $i; ?>" onclick="fillstar(<?php echo $i; ?>)" data-value="<?php echo $i; ?>"></i>
                                                <?php
                                                    }
                                                    for($j=$i;$j<=5;$j++)
                                                    {
                                                ?>
                                                <i class="fa fa-star-o star" style="color: #FF6200;font-size: 20px;" value="<?php echo $j; ?>" id="s<?php echo $j; ?>" onclick="fillstar(<?php echo $j; ?>)" data-value="<?php echo $j; ?>"></i>
                                                <?php
                                                    }
                                            ?>
                                                </div>
                                            <?php
                                                }
                                                else
                                                {
                                            ?>
                                                <div class="col-md-12 text-center">
                                                    <br/>
                                            <?php
                                                    $e = $this->md->my_query("select * from tbl_rating where register_id = '".$this->session->userdata('userid')."' and car_id = '".$cardetail[0]->car_id."'");
                                                    $frate = $e[0]->rate;
                                                    for($i=1;$i<=$frate;$i++)
                                                    {
                                                ?>
                                                <i class="fa fa-star star" style="color: #FF6200;font-size: 20px;" value="<?php echo $i; ?>" id="s<?php echo $i; ?>" onclick="fillstar(<?php echo $i; ?>)" data-value="<?php echo $i; ?>"></i>
                                                <?php
                                                    }     
                                                    for($j=$i;$j<=5;$j++)
                                                    {
                                                ?>
                                                <i class="fa fa-star-o star" style="color: #FF6200;font-size: 20px;" value="<?php echo $j; ?>" id="s<?php echo $j; ?>" onclick="fillstar(<?php echo $j; ?>)" data-value="<?php echo $j; ?>"></i>
                                                <?php
                                                    }
                                            ?>
                                                </div>
                                            <?php
                                                }
                                            ?>
                                                <div class="col-md-12 s-form">
                                                    <button type="button" class="btn m-btn" name="rate" onclick="addrate(<?php echo $cardetail[0]->car_id; ?>)">RATE NOW<span class="fa fa-angle-right"></span></button>
                                                </div>
                                            <br/>
                                            <span id="mess" style="color: red;">

                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <aside class="b-detail__main-aside">
                                <div class="b-detail__main-aside-about wow zoomInUp" data-wow-delay="0.5s">
                                    <h2 class="s-titleDet">INQUIRE ABOUT THIS VEHICLE</h2>
                                    <div class="b-detail__main-aside-about-call">
                                        <span class="fa fa-phone"></span>
                                        <div><?php echo $name[0]->contact_no; ?></div>
                                        <p>Call the seller 24/7 and they would help you.</p>
                                    </div>
                                    <div class="b-detail__main-aside-about-seller">
                                        <a href="<?php echo base_url(); ?>Carmela-Detail/<?php echo $name[0]->carmela_id; ?>" style="color: #fff;text-decoration: none;"><p>Carmela Info: <span style="text-transform: capitalize;"><?php echo $name[0]->name; ?></span></p></a>
                                    </div>
                                    <div class="b-detail__main-aside-about-form">
                                        <div class="b-detail__main-aside-about-form-links">
                                            <a href="#" class="j-tab m-active s-lineDownCenter" data-to='#form1'>SCHEDULE TEST DRIVE</a>

                                        </div>
                                        <?php
                                            if($this->session->userdata('userid') != "")
                                            {
                                        ?>
                                        <form method="post" class="s-form" enctype="multipart/form-data">
                                            <input type="file" name="photo" id="upload" style="display: none;"/>
                                            <span style="font-size: 12px;color: #AAAAAA;margin-left: 5px;" id="license">Select Licence Image</span>
                                            <label id="fileupd" for="upload" style="width: 94%;margin-top: -25px;">
                                                <img id="blah" style="width: 100%;cursor: pointer;"/>
                                                <div>
                                                    <h3  id="btext">Click To Select Licence</h3>
                                                </div>
                                            </label>
                                            <label>Select Date</label>
                                            <input type="date" name="date" style="width: 100%;padding: 10px 20px;border: 1px solid #eeeeee;border-radius: 30px;outline: none;margin-bottom: 10px;"/>
                                            <p class="errmsg1"><?php echo form_error('date'); ?></p>
                                            <label>Select Time</label>
                                            <input type="time" name="time" style="width: 100%;padding: 10px 20px;border: 1px solid #eeeeee;border-radius: 30px;outline: none;margin-bottom: 10px;"/>
                                            <p class="errmsg1"><?php echo form_error('time'); ?></p>
                                            <button type="submit" value="Book Test Drive" name="test" class="btn m-btn">Book Test Drive<span class="fa fa-angle-right"></span></button>
                                            <br/>
                                            <br/>
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
                                            if(isset($success))
                                            {
                                            ?>
                                                <script type="text/javascript">
                                                    $("#testdrive").fadeIn(500);
                                                </script>
                                            <?php
                                            }
                                            ?>
                                        </form>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                        <form method="post" class="s-form">
                                            <p>Please Login After You Can Book Test Drive.</p>
                                            
                                            <a href="<?php echo base_url(); ?>Login"><button type="button" class="btn m-btn">Login<span class="fa fa-angle-right"></span></button></a>
                                        </form>
                                        <?php
                                            }
                                        ?>
                                    </div>                                  
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--b-detail-->
        <section class="b-review b-related" style="background-color: #fff;">
            <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">Review</h2>
            <div class="container">
                <div class="col-sm-10 col-sm-offset-1 col-xs-12" style="margin-left: 60px;">
                    <div id="carousel-small-rev" class="owl-carousel enable-owl-carousel" data-items="1" data-navigation="true" data-auto-play="true" data-stop-on-hover="true" data-items-desktop="1" data-items-desktop-small="1" data-items-tablet="1" data-items-tablet-small="1">
                        <?php
                        $rev = $this->md->my_query("SELECT r.profile_pic , r.name , cv.review , cd.carname FROM tbl_registration AS r , tbl_car_review AS cv , tbl_car_detail AS cd WHERE r.registration_id = cv.registration_id AND cv.car_id = cd.car_id AND cv.car_id = '".$this->uri->segment(2)."' AND cv.status = 1");
                        foreach($rev as $s)
                        {
                        ?>
                        <div class="b-review__main">
                            <div class="b-review__main-person">
                                <div class="b-review__main-person-inside">
                                    <?php
                                    if($s->profile_pic != "")
                                    {
                                    ?>
                                    <img src="<?php echo base_url().$s->profile_pic; ?>"  style="width: 88px;height: 88px;" class="img-circle">
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <img src="<?php echo base_url(); ?>user_asset/images/user-blank.png"  style="width: 88px;height: 88px;" class="img-circle">
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <h5 style="text-transform: capitalize;"><span><?php echo $s->name; ?></span>&nbsp;, <?php echo $s->carname; ?><em>"</em></h5>
                            <p style="text-transform: capitalize;text-align: justify;"><?php echo $s->review; ?></p>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="b-featured" style="padding: 10px 0 0 0;">
            <div class="container">
                <h5 class="s-titleBg wow zoomInUp" data-wow-delay="0.5s">FIND OUT MORE</h5><br />
                <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">RELATED VEHICLES ON SALE</h2>
                
                <div id="carousel-small" class="owl-carousel enable-owl-carousel" data-items="4" data-navigation="true" data-auto-play="true" data-stop-on-hover="true" data-items-desktop="4" data-items-desktop-small="4" data-items-tablet="3" data-items-tablet-small="2">
                    <?php
                            $product = $this->md->my_query('select * from tbl_car_detail where status = 1 and model_id = "'.$cardetail[0]->model_id.'" and car_id != "'.$cardetail[0]->car_id.'"');
                            
                            foreach($product as $val)
                            {
                    ?>
                    <a href="<?php echo base_url(); ?>Car-Detail/<?php echo $val->car_id; ?>" style="text-decoration: none;">
                            <div class="b-items__cell wow zoomInUp" data-wow-delay="0.5s" style="padding: 10px;margin-right: 10px;">
                            <div class="b-items__cars-one-img">
                                <?php
                                     $ii = $this->md->my_select('tbl_car_image', array('car_id' => $val->car_id))[0]->path;
                                ?>
                                <img class='img-responsive' src="<?php echo base_url().$ii; ?>" style="width: 250px;height: 221px;" title="<?php echo $val->carname; ?>"/>
                                <?php
                                if($val->offer_id != 0)
                                {
                                    $rate = $this->md->my_select('tbl_offer',array('offer_id'=>$product[0]->offer_id[0]));
                                ?>
                                <span class="b-items__cars-one-img-type m-premium"><?php echo $rate[0]->offer_rate; ?>% OFF</span>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="b-items__cell-info rate">
                                <div class="s-lineDownLeft b-items__cell-info-title">
                                    <h2 style="min-height: 10px;text-transform: capitalize;"><?php if(strlen($val->carname) > 0 && strlen($val->carname) < 27) { echo $val->carname; } else { echo $a = substr($val->carname,0,24).'...'; } ?></h2>
                                </div>
                                <p class="text-left">
                                    <?php
                                    if($val->offer_id != 0)
                                    {
                                        $c = $cardetail[0]->price;
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
                                            $ext="Lakh";
                                        if($number_of_digits==8 ||$number_of_digits==9)
                                            $ext="Cr";
                                        /* offer less */ 
                                        $rrate = $this->md->my_select('tbl_offer',array('offer_id'=>$product[0]->offer_id))[0]->offer_rate;
                                        $oprice = ($cardetail[0]->price - ($cardetail[0]->price * $rrate) / 100 );

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
                                    ?>
                                    <span class="fa fa-inr" style="font-size: 16px;color: #565656;">&nbsp;<?php echo $val->price; ?> /-</span>
                                    <?php
                                    }
                                    ?>
                                </p>
                                <span style="float: left;">
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
                                </span>
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
                                    <div class="col-xs-6 col-md-6">
                                            <a href="<?php echo base_url(); ?>Car-Detail/<?php echo $val->car_id; ?>" class="btn m-btn" style="margin-top: 16px;">VIEW DETAIL<span class="fa fa-angle-right"></span></a>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>
        <section class="b-featured" style="padding: 10px 0 0 0;">
            <div class="container">
                <?php
                if($this->session->userdata('userid') != "")
                {
                    $wh['car_id'] = $cardetail[0]->car_id;
                    $wh['register_id'] = $this->session->userdata('userid');
                    
                    $data = $this->md->my_select('tbl_recent_view',$wh);
                    
                    $c = count($data);
                    
                    if($c == 0)
                    {
                        $this->md->my_insert('tbl_recent_view',$wh);
                    }
                ?>
                <h2 class="s-title wow zoomInUp" data-wow-delay="0.3s">RECENT VIEW</h2>
                
                <div id="carousel-small" class="owl-carousel enable-owl-carousel" data-items="4" data-navigation="true" data-auto-play="true" data-stop-on-hover="true" data-items-desktop="4" data-items-desktop-small="4" data-items-tablet="3" data-items-tablet-small="2">
                    <?php
                    $recent = $this->md->my_query("select * from tbl_recent_view where register_id = ".$this->session->userdata('userid')." ORDER BY view_id DESC");
                    foreach($recent as $rec)
                    {
                        
                        $bb = $this->md->my_select('tbl_car_detail',array('car_id'=>$rec->car_id));
                        $aa = $this->md->my_select('tbl_car_image',array('car_id'=>$bb[0]->car_id))[0]->path;
                    ?>
                    <a href="<?php echo base_url(); ?>Car-Detail/<?php echo $bb[0]->car_id; ?>" style="text-decoration: none;">
                            <div class="b-items__cell wow zoomInUp" data-wow-delay="0.5s" style="padding: 10px;margin-right: 10px;">
                            <div class="b-items__cars-one-img">
                                <img class='img-responsive' src="<?php echo base_url().$aa; ?>" style="width: 250px;height: 221px;" title="<?php echo $bb[0]->carname; ?>"/>
                                <?php
                                if($bb[0]->offer_id != 0)
                                {
                                    $rate = $this->md->my_select('tbl_offer',array('offer_id'=>$bb[0]->offer_id[0]));
                                ?>
                                <span class="b-items__cars-one-img-type m-premium"><?php echo $rate[0]->offer_rate; ?>% OFF</span>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="b-items__cell-info rate">
                                <div class="s-lineDownLeft b-items__cell-info-title">
                                    <h2 style="min-height: 10px;text-transform: capitalize;"><?php if(strlen($bb[0]->carname) > 0 && strlen($bb[0]->carname) < 27) { echo $bb[0]->carname; } else { echo $a = substr($bb[0]->carname,0,24).'...'; } ?></h2>
                                </div>
                                <p class="text-left">
                                    <?php
                                    if($bb[0]->offer_id != 0)
                                    {
                                        $c = $cardetail[0]->price;
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
                                            $ext="Lakh";
                                        if($number_of_digits==8 ||$number_of_digits==9)
                                            $ext="Cr";
                                        
                                        /* offer less */
                                        
                                        $rrate = $this->md->my_select('tbl_offer',array('offer_id'=>$bb[0]->offer_id))[0]->offer_rate;
                                        $oprice = ($cardetail[0]->price - ($cardetail[0]->price * $rrate) / 100 );

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
                                        $c = $bb[0]->price;
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
                                            $ext="Lakh";
                                        if($number_of_digits==8 ||$number_of_digits==9)
                                            $ext="Cr";
                                    ?>
                                    <span class="fa fa-inr" style="font-size: 16px;color: #565656;">&nbsp;<?php echo $fraction." ".$ext; ?> /-</span>
                                    <?php
                                    }
                                    ?>
                                </p>
                                <span style="float: left;">
                                <?php
                                $drate = $this->md->my_query("select count(*) as cn from tbl_rating where car_id ='".$rec->car_id."'")[0]->cn;
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
                                $ratesum = $this->md->my_query("SELECT SUM(rate) as s FROM tbl_rating WHERE car_id=".$rec->car_id)[0]->s;
                                $rateuser = $this->md->my_query("select count(register_id) as c from tbl_rating where car_id=".$rec->car_id)[0]->c;
                                $totalrate = round($ratesum / $rateuser);
                                for($i=1;$i<=$totalrate;$i++)
                                {
                                ?>
                                    <span class="fa fa-star" style="font-size: 20px;"></span>
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
                                </span>
                                <div class="row">
                                    <?php
                                        if($this->session->userdata('userid') != "")
                                        {
                                    ?>
                                    <div class="col-xs-6 col-md-6 <?php echo $rec->car_id; ?>">
                                        <?php
                                            $wishc = $this->md->my_query('select count(*) as c from tbl_wishlist where car_id ="'.$rec->car_id.'" and register_id = "'.$this->session->userdata('userid').'"')[0]->c;
                                            if($wishc == 0)
                                            {
                                        ?>
                                        <a class="btn m-btn" style="margin-top: 16px;" onclick="addwish(<?php echo $rec->car_id; ?>)" title="Add Wishlist">ADD WISH<span class="fa fa-angle-right"></span></a>
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
                            </div>
                        </a>
                    <?php
                    }
                    ?>
                </div>
                <?php
                }
                ?>
            </div>
        </section>
        <br/>
        <br/>
        <br/>
        <?php
        $this->load->view('master_footer');
        ?>
    </body>
</html>
<script type="text/javascript">
    function readURL(input) {

        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            
            $('#blah').attr('src', e.target.result);
            $("#blah").attr("style", "height:90px;width: 280px;margin-top:15px;");
            $('#btext').hide();
            $('#license').hide();
          }

          reader.readAsDataURL(input.files[0]);
        }
    }

    $("#upload").change(function() {
      readURL(this);
    });
    
</script>