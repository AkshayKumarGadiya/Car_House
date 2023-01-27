<!DOCTYPE html>
<html>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title><?php echo $carmela[0]->name; ?>&nbsp;- Car House</title>

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
                padding: 4px;
                font-size: 16px;
                margin-left: 10px;
            }
        </style>
    </head>
    <body class="m-blog" data-scrolling-animations="true">
        
        <div class="backdiv" id="carmela">
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
        <?php
        $this->load->view("header_top");
        ?>
        <?php
        $this->load->view("header_bottom");
        ?>
        <section class="b-pageHeader" style="background: url(<?php if($carmela[0]->cover_pic != "") { echo base_url().$carmela[0]->cover_pic; } else { echo base_url()."visitor/images/backgrounds/pageHead.jpg"; }?>) center;">
            <div class="container">
                <h1 class=" wow zoomInLeft" data-wow-delay="0.5s">Carmela Detail</h1>
                <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.5s">
                    <h3>Get In Touch With Us Now</h3>
                </div>
            </div>
        </section><!--b-pageHeader-->

        <div class="b-breadCumbs s-shadow">
            <div class="container wow zoomInUp" data-wow-delay="0.5s">
                <a href="home.html" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="<?php echo base_url(); ?>Carmela-Detail" class="b-breadCumbs__page m-active">Carmela Detail</a>
            </div>
        </div><!--b-breadCumbs-->

        <section class="b-blog" style="padding-bottom: 0px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <div class="b-blog__posts">
                            <div class="b-blog__posts-one wow zoomInUp" data-wow-delay="0.3s">
                                <div class="row m-noBlockPadding">
                                    <div class="col-sm-1 col-xs-2">
                                        <div class="b-blog__posts-one-author">
                                                <div class="b-blog__posts-one-author-img">
                                                    <img src="<?php echo base_url().$carmela[0]->profile; ?>" style="height: 70px;width: 70px;border-radius: 100%;margin-bottom: 35px;">
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-11 col-xs-10">
                                        <div class="b-blog__posts-one-body">
                                            <header class="b-blog__posts-one-body-head">
                                                <h2 class="s-titleDet" style="text-transform: capitalize;"><?php echo $carmela[0]->name; ?><span class="<?php echo $carmela[0]->carmela_id; ?> s-form"><?php
                                                    if($this->session->userdata('userid') != "")
                                                    {
                                                        $follow = $this->md->my_query('select count(*) as c from tbl_follow where carmela_id ="'.$carmela[0]->carmela_id.'" and register_id = "'.$this->session->userdata('userid').'"')[0]->c;
                                                        if($follow == 0)
                                                        {
                                                ?>
                                                        <button type="button" onclick="follow(<?php echo $carmela[0]->carmela_id; ?>)" class="btn m-btn" style="float: right;">Follow Now<span class="fa fa-plus"></span></button>
                                                        
                                                <?php
                                                        }
                                                        else
                                                        {
                                                ?>
                                                       <button type="button" onclick="del(<?php echo $carmela[0]->carmela_id; ?>)" class="btn m-btn" style="float: right;background-color:#565656;color:#fff;">Following<span class="fa fa-user-times"></span></button>
                                                <?php
                                                        }
                                                    }
                                                    else
                                                    {
                                                ?>
                                                       <a href="<?php echo base_url(); ?>Login"><button type="button" class="btn m-btn" style="float: right;">Follow Now<span class="fa fa-plus"></span></button></a>
                                                <?php
                                                    }
                                                ?>
                                                </span></h2>
                                                <div class="b-blog__posts-one-body-head-notes">
                                                    <?php
                                                    $c = $this->md->my_query("select count(*) as c from tbl_carmela_review where carmela_id = '".$carmela[0]->carmela_id."'")[0]->c;
                                                    ?>
                                                    <span class="b-blog__posts-one-body-head-notes-note"><span class="fa fa-calendar-o"></span><?php echo date('d-m-Y',strtotime($carmela[0]->join_date)); ?></span>
                                                    <span class="b-blog__posts-one-body-head-notes-note"><span class="fa fa-comment"></span><?php echo $c; ?>&nbsp;Comments</span>
                                                </div>
                                            </header>
                                            <div class="b-blog__posts-one-body-main">
                                                <div class="b-blog__posts-one-body-main-img">
                                                    <ul class="bxslider enable-bx-slider" data-pager-custom="#bx-pager" data-mode="fade" data-pager-slide="false" data-mode-pager="horizontal" data-pager-qty="0">
                                                        <?php
                                                        $loop = $this->md->my_select('tbl_carmela_gallery',array('carmela_id'=>$carmela[0]->carmela_id,'type'=>'carmela'));
                                                        foreach($loop as $l)
                                                        {
                                                        ?>
                                                        <li><img class="img-responsive" src="<?php echo base_url().$l->photo; ?>" style="width: 653px;height: 261px;" /></li>
                                                        <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                    <div class="b-blog__posts-one-body-main-img-small" id="bx-pager">
                                                        <?php
                                                        $loop = $this->md->my_select('tbl_carmela_gallery',array('carmela_id'=>$carmela[0]->carmela_id,'type'=>'carmela'));
                                                        $i=0;
                                                        foreach($loop as $l)
                                                        {
                                                        ?>
                                                        <a href="#" data-slide-index="<?php echo $i; ?>"><img src="<?php echo base_url().$l->photo; ?>" style="width: 90px;height: 65px;" /></a>
                                                        <?php
                                                        $i++;
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-xs-12">
                                                        <aside class="b-blog__aside">
                                                            <div class="b-blog__aside-categories wow zoomInUp" data-wow-delay="0.3s">
                                                                <header class="s-lineDownLeft">
                                                                    <h2 class="s-titleDet">Basic Details</h2>
                                                                </header>
                                                                <nav>
                                                                    <ul class="b-blog__aside-categories-list">
                                                                        <li><a href="#" >Owner Name<span style="margin-left: 55px;"><?php echo ucwords($carmela[0]->owner_name); ?></span></a></li>
                                                                        <li><a href="#">Owner Contact No<span style="margin-left: 25px;"><?php echo $carmela[0]->owner_contact_no; ?></span></a></li>
                                                                        <li><a href="#">Email<span style="margin-left: 100px;"><?php echo $carmela[0]->email; ?></span></a></li>
                                                                        <li><a href="#">Contact<span style="margin-left: 90px;"><?php echo $carmela[0]->contact_no; ?></span></a></li>
                                                                        <li><a href="#">Join Date<span style="margin-left: 80px;"><?php echo date('d-m-Y',strtotime($carmela[0]->join_date)); ?></span></a></li>
                                                                    </ul>
                                                                </nav>
                                                            </div>
                                                        </aside>
                                                </div>
                                                <div class="col-md-6 col-xs-12">
                                                        <aside class="b-blog__aside">
                                                            <div class="b-blog__aside-categories wow zoomInUp" data-wow-delay="0.3s">
                                                                <header class="s-lineDownLeft">
                                                                    <h2 class="s-titleDet">Location</h2>
                                                                </header>
                                                                <?php
                                                                $landmark = $this->md->my_select('tbl_location',array('location_id'=>$carmela[0]->location_id));
                                                                $area = $this->md->my_select('tbl_location',array('location_id'=>$landmark[0]->parent_id));
                                                                $company = $this->md->my_select('tbl_location',array('location_id'=>$area[0]->parent_id));
                                                                $state = $this->md->my_select('tbl_location',array('location_id'=>$company[0]->parent_id));
                                                                ?>
                                                                <nav>
                                                                    <ul class="b-blog__aside-categories-list detail">
                                                                        <li><a href="#" >State<span style="margin-left: 70px;"><?php echo $state[0]->name; ?></span></a></li>
                                                                        <li><a href="#">City<span style="margin-left: 77px;"><?php echo ucwords($company[0]->name); ?></span></a></li>
                                                                        <li><a href="#">Area<span style="margin-left: 73px;"><?php echo ucwords($area[0]->name); ?></span></a></li>
                                                                        <li><a href="#">Landmark<span style="margin-left: 40px;"><?php echo ucwords($landmark[0]->name); ?></span></a></li>
                                                                        <li><a href="#">Address<span style="margin-left: 52px;"><?php echo ucwords($carmela[0]->address); ?></span></a></li>
                                                                        <li><a href="#">Pincode<span style="margin-left: 55px;"><?php echo ucwords($carmela[0]->pincode); ?></span></a></li>
                                                                    </ul>
                                                                </nav>
                                                            </div>
                                                        </aside>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                         <aside class="b-detail__main-aside">
                            <div class="b-detail__main-aside-about wow zoomInUp" data-wow-delay="0.5s">
                                <div class="b-detail__main-aside-about-call">
                                    <span class="fa fa-phone"></span>
                                    <div><?php echo $carmela[0]->contact_no; ?></div>
                                    <p>Call the seller 24/7 and they would help you.</p>
                                </div>
                                <div class="b-detail__main-aside-about-form">
                                    <div class="b-detail__main-aside-about-form-links">
                                        <a href="#" class="j-tab m-active s-lineDownCenter" data-to='#form1'>Carmela Review</a>

                                    </div>
                                    <?php
                                        if($this->session->userdata('userid') != "")
                                        {
                                    ?>
                                    <form method="post" class="s-form" enctype="multipart/form-data">
                                        <textarea name="msg" id="reviewmsg" placeholder="WRITE YOUR REVIEW ABOUT CARMELA..." style="resize: none;height: 100px;"></textarea>
                                        <button type="button" value="Book Test Drive" name="test" onclick="review(<?php echo $carmela[0]->carmela_id; ?>)" class="btn m-btn" style="margin-top: 10px;">ADD REVIEW<span class="fa fa-angle-right"></span></button>
                                    </form>
                                    <br/>
                                    <div id="reviewerror" style="color: #FF6200;font-size: 13px;">
                                            
                                    </div>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                    <form method="post" class="s-form">
                                        <p>Please Login After You Can  Give Review.</p>

                                        <a href="<?php echo base_url(); ?>Login"><button type="button" class="btn m-btn">Login<span class="fa fa-angle-right"></span></button></a>
                                    </form>
                                    <?php
                                        }
                                    ?>
                                </div>                                  
                            </div>
                        </aside>
                    </div>
                    <div class="col-md-4 col-xs-12">
                         <aside class="b-detail__main-aside">
                            <div class="b-detail__main-aside-about wow zoomInUp" data-wow-delay="0.5s">
                                    <?php
                                    $visiting = $this->md->my_select('tbl_carmela_gallery',array('carmela_id'=>$carmela[0]->carmela_id,'type'=>'visiting_card'));
                                    ?>
                                    <h2 class="s-titleDet" style="text-transform: capitalize;">VISITING CARD</h2>
                                    <br/>
                                    <img src="<?php echo base_url().$visiting[0]->photo; ?>" style="width: 300px;height: 200px;margin: 0 0 0 31px;" />
                                                              
                            </div>
                        </aside>
                    </div>
                    <div class="col-sm-12 col-xs-12">
                        <div class="b-blog__posts-one-body b-related" style="background-color: #fff;padding-top: 0px;">
                            <header class="b-blog__posts-one-body-head">
                                <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s" style="margin-left: 15px;margin-bottom: 6px;">REVIEW</h2>
                                <br/><br/>
                                <div id="carousel-small-rev" class="owl-carousel enable-owl-carousel" data-items="1" data-navigation="true" data-auto-play="true" data-stop-on-hover="true" data-items-desktop="1" data-items-desktop-small="1" data-items-tablet="1" data-items-tablet-small="1">
                                    <?php
                                    $re = $this->md->my_query("SELECT cr.* , r.* , cd.carmela_id , cd.name as car FROM tbl_carmela_review AS cr , tbl_registration AS r , tbl_carmela AS cd WHERE cr.register_id = r.registration_id AND cr.carmela_id = '".$this->uri->segment(2)."' AND cr.status = 1");
                                    foreach($re as $rr)
                                    {
                                    ?>
                                    <div class="b-review__main">
                                        <div class="b-review__main-person">
                                            <div class="b-review__main-person-inside">
                                                <?php
                                                if($rr->profile_pic == "")
                                                {
                                                ?>
                                                <img src="<?php echo base_url(); ?>user_asset/images/user-blank.png"  style="width: 88px;height: 88px;" class="img-circle">
                                                <?php
                                                }
                                                else
                                                {
                                                ?>
                                                <img src="<?php echo base_url().$rr->profile_pic; ?>"  style="width: 88px;height: 88px;" class="img-circle">
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <h5 style="text-transform: capitalize;"><span><?php echo $rr->name; ?> ,</span>&nbsp;<?php echo date('d-m-Y',strtotime($rr->date)); ?><em>"</em></h5>
                                        <p style="text-transform: capitalize;text-align: justify;font-size: 15px;"><?php echo $rr->review; ?></p>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </header>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $this->load->view('master_footer');
        ?>
        <script>
            var base='http://localhost/car_house/';
            
            function follow(cid)
            {
                var data = {cid:cid};
                var path = base + 'Ajax/followme';
                $.post(path,data,function(ans){
                    $("."+cid).html('<button type="button" onclick="del(<?php echo $carmela[0]->carmela_id; ?>)" class="btn m-btn" style="float: right;background-color:#565656;color:#fff;">Following<span class="fa fa-user-times"></span></button>');
                });
            }
            
            function del(did)
            {
                var data = {did:did};
                var path = base + 'Ajax/followdel';
                $.post(path,data,function(ans){
                    $("."+did).html('<button type="button" onclick="follow(<?php echo $carmela[0]->carmela_id; ?>)" class="btn m-btn" style="float: right;">Follow Now<span class="fa fa-plus"></span></button>');
                });
            }
            
            function review(id)
            {
                var msg = document.getElementById('reviewmsg').value;
                if(msg != "")
                {
                    var data = {id:id,msg:msg};
                    var path = base + 'Ajax/carmelareview';

                    $.post(path,data,function(ans){
                        if(ans == "ha")
                        {
                            $("#carmela").fadeIn(500);
                            $("#reviewmsg").html("");
                            $("#reviewmsg").val("");
                        }
                    });
                }
                else
                {
                    $("#reviewerror").html("Enter Review For This Car.");
                }
            }
        </script>
    </body>
</html>