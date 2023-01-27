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
            .b-compare__block-inside-title
            {
                text-align: center;
            }
        </style>
    </head>
    <body class="m-compare" data-scrolling-animations="true">
        
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
			<div class="container wow zoomInUp" data-wow-delay="0.3s">
                            <a href="<?php echo base_url(); ?>Home" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="<?php echo base_url(); ?>Compare" class="b-breadCumbs__page m-active">Compare Vehicles</a>
			</div>
		</div><!--b-breadCumbs-->

		<div class="b-infoBar">
			<div class="container">
				<div class="row">
                                    <div class="col-sm-5 col-xs-12 wow zoomInUp" data-wow-delay="0.3s">
                                            <h5>QUESTIONS? CALL US  :  <span>1-800- 624-5462</span></h5>
                                    </div>
				</div>
			</div>
		</div><!--b-infoBar-->

		<section class="b-compare">
			<div class="container">
				<div class="b-compare__images">
					<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4">
							<div class="b-compare__images-item s-lineDownCenter wow zoomInUp" data-wow-delay="0.3s">
								<h3><?php echo $compare[0]->carname; ?></h3>
                                                                <img class="img-responsive center-block" src="<?php echo base_url().$image[0]->path; ?>" style="width: 262px;height: 175px;" />
                                                                <?php
                                                                $c = $compare[0]->price;
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
								<div class="b-compare__images-item-price m-right"><div class="b-compare__images-item-price-vs">vs</div><?php echo $fraction." ".$ext; ?></div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12 ">
							<div class="b-compare__images-item s-lineDownCenter wow zoomInUp" data-wow-delay="0.3s">
								<h3><?php echo $comparetwo[0]->carname; ?></h3>
								<img class="img-responsive center-block" src="<?php echo base_url().$images[0]->path; ?>" style="width: 262px;height: 175px;" />
								<?php
                                                                $c = $comparetwo[0]->price;
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
                                                                <div class="b-compare__images-item-price m-right m-left"><?php echo $fraction." ".$ext; ?></div>
							</div>
						</div>
					</div>
				</div>
				<div class="b-compare__block wow zoomInUp" data-wow-delay="0.3s">
					<div class="b-compare__block-title s-whiteShadow">
						<h3 class="s-titleDet">BASIC INFO</h3>
						<a class="j-more" href="#"><span class="fa fa-angle-left"></span></a>
					</div>
					<div class="b-compare__block-inside j-inside">
						<div class="row">
							<div class="col-xs-4 col-md-4">
								<div class="b-compare__block-inside-title">
									Parsing Year
								</div>
							</div>
							<div class="col-xs-4 col-md-4">
								<div class="b-compare__block-inside-value">
									<?php echo $spe[1]->value; ?>
								</div>
							</div>
							<div class="col-xs-4 col-md-4">
								<div class="b-compare__block-inside-value">
									<?php echo $specification[1]->value; ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<div class="b-compare__block-inside-title">
									Width
								</div>
							</div>
							<div class="col-xs-4">
								<div class="b-compare__block-inside-value">
									<?php echo $spe[16]->value; ?>
								</div>
							</div>
							<div class="col-xs-4">
								<div class="b-compare__block-inside-value">
									<?php echo $specification[16]->value; ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<div class="b-compare__block-inside-title">
									Height
								</div>
							</div>
							<div class="col-xs-4">
								<div class="b-compare__block-inside-value">
									<?php echo $spe[17]->value; ?>
								</div>
							</div>
							<div class="col-xs-4">
								<div class="b-compare__block-inside-value">
									<?php echo $specification[17]->value; ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<div class="b-compare__block-inside-title">
									Length
								</div>
							</div>
							<div class="col-xs-4">
								<div class="b-compare__block-inside-value">
									<?php echo $spe[15]->value; ?>
								</div>
							</div>
							<div class="col-xs-4">
								<div class="b-compare__block-inside-value">
									<?php echo $specification[15]->value; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="b-compare__block wow zoomInUp" data-wow-delay="0.3s">
					<div class="b-compare__block-title s-whiteShadow">
						<h3 class="s-titleDet">MECHANICAL FEATURES</h3>
						<a class="j-more" href="#"><span class="fa fa-angle-left"></span></a>
					</div>
					<div class="b-compare__block-inside j-inside">
						<div class="row">
							<div class="col-xs-4">
								<div class="b-compare__block-inside-title">
									Engine Displacement
								</div>
							</div>
							<div class="col-xs-4">
								<div class="b-compare__block-inside-value">
									<?php echo $spe[11]->value; ?>
								</div>
							</div>
							<div class="col-xs-4">
								<div class="b-compare__block-inside-value">
									<?php echo $specification[11]->value; ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<div class="b-compare__block-inside-title">
									Fuel Type
								</div>
							</div>
							<div class="col-xs-4">
								<div class="b-compare__block-inside-value">
									<?php echo $spe[9]->value; ?>
								</div>
							</div>
							<div class="col-xs-4">
								<div class="b-compare__block-inside-value">
									<?php echo $specification[9]->value; ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<div class="b-compare__block-inside-title">
									Max Power
								</div>
							</div>
							<div class="col-xs-4">
								<div class="b-compare__block-inside-value">
									<?php echo $spe[10]->value; ?>
								</div>
							</div>
							<div class="col-xs-4">
								<div class="b-compare__block-inside-value">
									<?php echo $specification[10]->value; ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<div class="b-compare__block-inside-title">
									Transmission
								</div>
							</div>
							<div class="col-xs-4">
								<div class="b-compare__block-inside-value">
									<?php echo $spe[3]->value; ?>
								</div>
							</div>
							<div class="col-xs-4">
								<div class="b-compare__block-inside-value">
									<?php echo $specification[3]->value; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="b-compare__block wow zoomInUp" data-wow-delay="0.3s">
					<div class="b-compare__block-title s-whiteShadow">
						<h3 class="s-titleDet">EXTERIOR / INTERIOR FEATURES</h3>
						<a class="j-more" href="#"><span class="fa fa-angle-left"></span></a>
					</div>
					<div class="b-compare__block-inside j-inside">
						<div class="row">
							<div class="col-xs-4">
								<div class="b-compare__block-inside-title">
									Tyre Type
								</div>
							</div>
							<div class="col-xs-4">
								<div class="b-compare__block-inside-value">
									<?php echo $spe[7]->value; ?>
								</div>
							</div>
							<div class="col-xs-4">
								<div class="b-compare__block-inside-value">
									<?php echo $specification[7]->value; ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<div class="b-compare__block-inside-title">
									Fuel Supply System
								</div>
							</div>
							<div class="col-xs-4">
								<div class="b-compare__block-inside-value">
									<?php echo $spe[12]->value; ?>
								</div>
							</div>
							<div class="col-xs-4">
								<div class="b-compare__block-inside-value">
									<?php echo $specification[12]->value; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!--b-compare-->
                <?php
                $this->load->view("master_footer");
                ?>
    </body>
</html>