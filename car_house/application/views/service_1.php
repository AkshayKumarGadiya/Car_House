<!DOCTYPE html>
<html>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Car House - Eye It..Try It..Buy It!</title>

        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>visitor/images/favicon.png" />

        <link href="<?php echo base_url(); ?>visitor/css/master.css" rel="stylesheet">

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
    </head>
    <body class="m-submit1" data-scrolling-animations="true">
       
        <?php
        $this->load->view("header_top");
        $this->load->view("header_bottom");
        ?>
        <section class="b-pageHeader">
            <div class="container">
                <h1 class="wow zoomInLeft" data-wow-delay="0.5s">Car Service</h1>
                <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.5s">
                    <h3>Get In Touch With Us Now</h3>
                </div>
            </div>
        </section><!--b-pageHeader-->

        <div class="b-breadCumbs s-shadow">
            <div class="container wow zoomInUp" data-wow-delay="0.5s">
                <a href="<?php echo base_url(); ?>Home" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="<?php echo base_url(); ?>Car-Service-1" class="b-breadCumbs__page m-active">Car Service</a>
            </div>
        </div><!--b-breadCumbs-->
        <div class="b-submit">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-5 col-xs-6">
                        <aside class="b-submit__aside">
                            <div class="b-submit__aside-step m-active wow zoomInUp" data-wow-delay="0.5s">
                                <h3>Step 1</h3>
                                <div class="b-submit__aside-step-inner m-active clearfix">
                                    <div class="b-submit__aside-step-inner-icon">
                                        <span class="fa fa-car"></span>
                                    </div>
                                    <div class="b-submit__aside-step-inner-info">
                                        <h4>Car Detail</h4>
                                        <p>Select your Car &amp; add info</p>
                                        <div class="b-submit__aside-step-inner-info-triangle"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="b-submit__aside-step wow zoomInUp" data-wow-delay="0.5s">
                                <h3>Step 2</h3>
                                <div class="b-submit__aside-step-inner clearfix">
                                    <div class="b-submit__aside-step-inner-icon">
                                        <span class="fa fa-photo"></span>
                                    </div>
                                    <div class="b-submit__aside-step-inner-info">
                                        <h4>Your Car Image</h4>
                                        <p>Car Image</p>
                                    </div>
                                </div>
                            </div>
                            <div class="b-submit__aside-step wow zoomInUp" data-wow-delay="0.5s">
                                <h3>Step 3</h3>
                                <div class="b-submit__aside-step-inner clearfix">
                                    <div class="b-submit__aside-step-inner-icon">
                                        <span class="fa fa-globe"></span>
                                    </div>
                                    <div class="b-submit__aside-step-inner-info">
                                        <h4>Your Details</h4>
                                        <p>Your Car Detail</p>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-7 col-xs-6">
                        <div class="b-submit__main">
                            <header class="s-headerSubmit s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
                                <h2 class="">Car Service</h2>
                            </header>
                            <form class="s-submit clearfix" method="post">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
                                            <label>Car Type <span>*</span></label>
                                            <div class='s-relative'>
                                                <select class="m-select" name="type" onchange="set_combo(this.value,'company');set_combo(0,'submodel')">
                                                    <option value="">Select Car Type</option>
                                                    <?php
                                                        foreach($cartype as $val)
                                                        {
                                                    ?>
                                                    <option value="<?php echo $val->category_id; ?>"
                                                            <?php
                                                                if(set_select('type',$val->category_id))
                                                                {
                                                                    echo "selected";
                                                                }
                                                            ?>
                                                            ><?php echo $val->category_name; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <span class="fa fa-caret-down"></span>
                                                <p class="errmsg1"><?php echo form_error("type"); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
                                            <label>Car Company <span>*</span></label>
                                            <div class='s-relative'>
                                                <select class="m-select" name="company" id="company" onchange="set_combo(this.value,'model')">
                                                    <option value="">Select Car Company</option>
                                                    <?php
                                                        if($this->input->post('type') != "")
                                                        {
                                                            $cm = $this->md->my_select('tbl_category',array('label'=>'company','parent_id'=>$this->input->post('type')));
                                                            foreach ($cm as $val)
                                                            {
                                                    ?>
                                                    <option value="<?php echo $val->category_id; ?>"
                                                            <?php
                                                                if(set_select('company',$val->category_id))
                                                                {
                                                                    echo "selected";
                                                                }

                                                            ?>><?php echo $val->category_name; ?></option>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <span class="fa fa-caret-down"></span>
                                                <p class="errmsg1"><?php echo form_error("company"); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
                                            <label>Car Model <span>*</span></label>
                                            <div class='s-relative'>
                                                <select class="m-select" name="model" id="model" onchange="set_combo(this.value,'submodel')">
                                                    <option value="">Select Car Model</option>
                                                    <?php
                                                        if($this->input->post('type') != "")
                                                        {
                                                            $cm = $this->md->my_select('tbl_category',array('label'=>'model','parent_id'=>$this->input->post('company')));
                                                            foreach ($cm as $val)
                                                            {
                                                    ?>
                                                    <option value="<?php echo $val->category_id; ?>"
                                                            <?php
                                                                if(set_select('model',$val->category_id))
                                                                {
                                                                    echo "selected";
                                                                }

                                                            ?>><?php echo $val->category_name; ?></option>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <span class="fa fa-caret-down"></span>
                                                <p class="errmsg1"><?php echo form_error("model"); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
                                            <label>Car Submodel <span>*</span></label>
                                            <div class='s-relative'>
                                                <select class="m-select" name="submodel" id="submodel">
                                                    <option value="">Select Car Submodel</option>
                                                    <?php
                                                        if($this->input->post('type') != "")
                                                        {
                                                            $sm = $this->md->my_select('tbl_category',array('label'=>'submodel','parent_id'=>$this->input->post('model')));
                                                            foreach ($sm as $val)
                                                            {
                                                    ?>
                                                    <option value="<?php echo $val->category_id; ?>"
                                                            <?php
                                                                if(set_select('submodel',$val->category_id))
                                                                {
                                                                    echo "selected";
                                                                }
                                                            ?>><?php echo $val->category_name; ?></option>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <span class="fa fa-caret-down"></span>
                                                <p class="errmsg1"><?php echo form_error("submodel"); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
                                            <label>Select State <span>*</span></label>
                                            <div class='s-relative'>
                                                <select class="m-select" name="state" onchange="set_combo(this.value,'city');set_combo(0,'area');set_combo(0,'landmarks')">
                                                    <option value="">Select state</option>
                                                    <?php
                                                            $state = $this->md->my_select('tbl_location',array('lable'=>'state'));
                                                            foreach ($state as $val)
                                                            {
                                                    ?>
                                                    <option value="<?php echo $val->location_id; ?>"
                                                            <?php
                                                                if(set_select('state',$val->location_id))
                                                                {
                                                                    echo "selected";
                                                                }
                                                            ?>><?php echo $val->name; ?></option>
                                                    <?php
                                                            }
                                                    ?>
                                                </select>
                                                <span class="fa fa-caret-down"></span>
                                                <p class="errmsg1"><?php echo form_error("state"); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
                                            <label>Select City <span>*</span></label>
                                            <div class='s-relative'>
                                                <select class="m-select" name="city" onchange="set_combo(this.value,'area')" id="city">
                                                    <option value="">Select City</option>
                                                    <?php
                                                        if($this->input->post('state') != "")
                                                        {
                                                            $ct = $this->md->my_select('tbl_location',array('lable'=>'city','parent_id'=>$this->input->post('state')));
                                                            foreach ($ct as $val)
                                                            {
                                                    ?>
                                                    <option value="<?php echo $val->location_id; ?>"
                                                            <?php
                                                                if(!isset($success) && set_select('city',$val->location_id))
                                                                {
                                                                    echo "selected";
                                                                }

                                                            ?>><?php echo $val->name; ?></option>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <span class="fa fa-caret-down"></span>
                                                <p class="errmsg1"><?php echo form_error("city"); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
                                            <label>Select Area <span>*</span></label>
                                            <div class='s-relative'>
                                                <select class="m-select" name="area" id="area" onchange="set_combo(this.value,'landmark')">
                                                    <option value="">Select Area</option>
                                                    <?php
                                                        if($this->input->post('city') != "")
                                                        {
                                                            $area = $this->md->my_select('tbl_location',array('lable'=>'area','parent_id'=>$this->input->post('city')));
                                                            foreach ($area as $val)
                                                            {
                                                    ?>
                                                    <option value="<?php echo $val->location_id; ?>"
                                                            <?php
                                                                if(!isset($success) && set_select('area',$val->location_id))
                                                                {
                                                                    echo "selected";
                                                                }

                                                            ?>><?php echo $val->name; ?></option>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <span class="fa fa-caret-down"></span>
                                                <p class="errmsg1"><?php echo form_error("area"); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
                                            <label>Select Landmark <span>*</span></label>
                                            <div class='s-relative'>
                                                <select class="m-select" name="landmark" id="landmark">
                                                    <option value="">Select Landmark</option>
                                                    <?php
                                                        if($this->input->post('area') != "")
                                                        {
                                                            $landmark = $this->md->my_select('tbl_location',array('lable'=>'landmark','parent_id'=>$this->input->post('area')));
                                                            foreach ($landmark as $val)
                                                            {
                                                    ?>
                                                    <option value="<?php echo $val->location_id; ?>"
                                                            <?php
                                                                if(!isset($success) && set_select('landmark',$val->location_id))
                                                                {
                                                                    echo "selected";
                                                                }

                                                            ?>><?php echo $val->name; ?></option>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <span class="fa fa-caret-down"></span>
                                                <p class="errmsg1"><?php echo form_error("landmark"); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
                                            <label>Plat Number <span>*</span></label>
                                            <input placeholder="Enter Plat Number" type="text" value="<?php echo set_value('plat'); ?>"  name="plat" style="text-transform: uppercase;" />
                                            <p class="errmsg1"><?php echo form_error("plat"); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
                                            <label>Request Date <span>*</span></label>
                                            <input type="date"  name="rdate" value="<?php echo set_value('rdate'); ?>"/>
                                            <p class="errmsg1"><?php echo form_error("rdate"); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
                                            <br/><br/>
                                            <div class="col-xs-4">
                                                <span class="d" style="color: #B1B1B1;">Pick & Drop&nbsp;&nbsp;&nbsp;: </span>
                                            </div>
                                            <div class="col-xs-2">

                                                <label class="radio-inline c">Yes
                                                    <input type="radio" value="Yes" name="pick" <?php if($this->input->post('pick') == "Yes") { echo 'checked'; } ?>>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="col-xs-6">
                                                <label class="radio-inline c">No
                                                    <input type="radio" value="No" name="pick" <?php if($this->input->post('pick') == "No") { echo 'checked'; } ?>>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="col-xs-12" style="padding-left: 0px;">
                                                <p class="errmsg1"><?php echo form_error("pick"); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
                                            <label>Address <span>*</span></label>
                                            <textarea  name="address" style="resize: none;width: 100%;border: 1px solid #CBCBCB;padding: 15px 20px;height: 60px;border-radius: 10px;outline: none;background-color: #F7F7F7;"></textarea>
                                            <p class="errmsg1"><?php echo form_error("address"); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12">
                                        <button type="submit" name="service" value="Save &amp; PROCEED to next step" class="btn m-btn pull-right wow zoomInUp" data-wow-delay="0.5s">Save &amp; PROCEED to next step<span class="fa fa-angle-right"></span></button>
                                        <br/>
                                        <br/>
                                    </div>
                                </div>
                            </form>
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
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--b-submit-->
        <?php
        $this->load->view("master_footer");
        ?>
    </body>


</html>