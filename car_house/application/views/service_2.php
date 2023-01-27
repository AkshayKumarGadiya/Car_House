<!DOCTYPE html>
<html>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>Car House - Eye It..Try It..Buy It!</title>

                <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>visitor/images/favicon.png" />

                <link href="<?php echo base_url(); ?>visitor/css/master.css" rel="stylesheet">


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
                            <a href="<?php echo base_url(); ?>Home" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="<?php echo base_url(); ?>Car-Service-2" class="b-breadCumbs__page m-active">Car Service</a>
			</div>
		</div><!--b-breadCumbs-->

		<div class="b-submit">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-5 col-xs-6">
						<aside class="b-submit__aside">
							<div class="b-submit__aside-step wow zoomInUp" data-wow-delay="0.5s">
								<h3>Step 1</h3>
								<div class="b-submit__aside-step-inner clearfix">
									<div class="b-submit__aside-step-inner-icon">
										<span class="fa fa-car"></span>
									</div>
									<div class="b-submit__aside-step-inner-info">
										<h4>Add Your Vehicle</h4>
										<p>Select your vehicle &amp; add info</p>
									</div>
								</div>
							</div>
							<div class="b-submit__aside-step m-active wow zoomInUp" data-wow-delay="0.5s">
								<h3>Step 2</h3>
								<div class="b-submit__aside-step-inner m-active clearfix">
									<div class="b-submit__aside-step-inner-icon">
										<span class="fa fa-photo"></span>
									</div>
									<div class="b-submit__aside-step-inner-info">
										<h4>Your Car Image</h4>
										<p>Car Image</p>
                                                                                <div class="b-submit__aside-step-inner-info-triangle"></div>
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
							
								<div class="row">
                                                                    <form class="s-submit clearfix" method="post">
									<div class="col-md-12 col-xs-12">
										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
											<label style="font-size: 16px;font-weight: bold;">Car Image</label>
                                                                                        <div class='s-relative' style="position: relative;">
                                                                                            <?php
                                                                                            $img = $this->md->my_select('tbl_booking',array('booking_id'=>$this->session->userdata('booking')));
                                                                                            $path = $this->md->my_select('tbl_category',array('category_id'=>$img[0]->category_id));
                                                                                
                                                                                            $servicedetail = $this->md->my_query("SELECT sp.* , s.* FROM tbl_service_position AS sp , tbl_service AS s WHERE '".$path[0]->category_id."' = sp.category_id AND sp.service_id = s.service_id");
                                                                                
                                                                                            ?>
                                                                                            <img src="<?php echo base_url().$path[0]->image; ?>" style="width:797px;height:350px ;"/>
                                                                                            <?php
                                                                                            
                                                                                                foreach($servicedetail as $se)
                                                                                                {?>
                                                                                            
                                                                                            <div title="<?php echo $se->name; ?>" style="position: absolute;top:<?php echo $se->y_position; ?>%;left:<?php echo $se->x_position; ?>%;width: 10px;height:10px;border-radius: 100%;background: red;"></div>
                                                                                            
                                                                                            
                                                                                                   <?php 
                                                                                                }
                                                                                            ?>
											</div>
										</div>
                                                                                
										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
                                                                                    <label style="font-size: 16px;font-weight: bold;">Selected Service</label>
											<div class='s-relative s-form'>
                                                                                            <?php
                                                                                            foreach($servicedetail as $se)
                                                                                            {
                                                                                            ?>
                                                                                            <label class="checkbox1">&nbsp;<?= ucwords($se->name)." Service"; ?>
                                                                                                <input type="checkbox" value="<?php echo $se->position_id; ?>" name="check[]">
                                                                                                <span class="checkmark123"></span>
                                                                                            </label>
                                                                                            <?php
                                                                                            }
                                                                                            ?>
											</div>
										</div>
                                                                            <button type="submit" name="sernext" value="Save &amp; PROCEED to next step" class="btn m-btn pull-right wow zoomInUp" data-wow-delay="0.5s">Save &amp; PROCEED to next step<span class="fa fa-angle-right"></span></button>
									</div>
                                                                    </form>
								</div>
							
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