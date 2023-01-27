<?php
$this->load->view("master_header");
?>
<title>About Us - Car House</title>
<section class="b-pageHeader">
    <div class="container">
        <h1 class=" wow zoomInLeft" data-wow-delay="0.5s">About Car House</h1>
        <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.5s">
            <h3>Get In Touch With Us Now</h3>
        </div>
    </div>
</section><!--b-pageHeader-->
<div class="b-breadCumbs s-shadow wow zoomInUp" data-wow-delay="0.5s">
    <div class="container">
        <a href="<?php echo base_url(); ?>Home" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="<?php echo base_url(); ?>Aboutcarhouse" class="b-breadCumbs__page m-active">About Car House</a>
    </div>
</div><!--b-breadCumbs-->

<section class="b-best">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <div class="b-best__info">
                    <header class="s-lineDownLeft b-best__info-head">
                        <h2 class="wow zoomInUp" data-wow-delay="0.5s">The Best &amp; The Largest Car House</h2>
                    </header>
                    <h6 class="wow zoomInUp" data-wow-delay="0.5s">Our Mission </h6>
                    <p class="wow zoomInUp" data-wow-delay="0.5s">Our mission is to bring joy and delight into car buying and ownership.
To achieve this goal, we aim to empower Indian consumers to make informed car buying and ownership decisions with exhaustive and un-biased information on cars through our expert reviews, owner reviews, detailed specifications and comparisons. We understand that a car is by and large the second-most expensive asset a consumer associates his lifestyle with.</p>
                    <h6 class="wow zoomInUp" data-wow-delay="0.5s">History </h6>
                    <p class="wow zoomInUp" data-wow-delay="0.5s">Car House was launched in October 2005 by Akshay , Dhaval and Narendra. Since then we have been credited with several initiatives for Indian car consumers.
                        In 2005, we became the first website in India to consolidate used car inventory across dealers and present it to car buyers as an online marketplace.</p> 
                    
<!--                    <a href="article.html" class="btn m-btn m-readMore wow zoomInUp" data-wow-delay="0.5s">view listings<span class="fa fa-angle-right"></span></a>-->
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <img class="img-responsive center-block wow zoomInUp" data-wow-delay="0.5s" alt="best" src="<?php echo base_url(); ?>visitor/media/about/best.jpg" />
            </div>
        </div>
    </div>
</section><!--b-best-->
<?php
    $allcarmela = $this->md->my_query("select count(*) as c from tbl_carmela where status = 1")[0]->c;
    $allcar = $this->md->my_query("select count(*) as c from tbl_car_detail where status = 1 and del_status = 0")[0]->c;
    $carreview = $this->md->my_query("select count(*) as c from tbl_car_review where status = 1 and del_status = 0")[0]->c;
    $carmelareview = $this->md->my_query("select count(*) as c from tbl_carmela_review where status = 1 and del_status = 0")[0]->c;
    $allreview = $carreview + $carmelareview;
    ?>
 <section class="b-count">
            <div class="container">
                <div class="row">
                    <div class="col-md-11 col-xs-12 percent-blocks m-main" data-waypoint-scroll="true">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6">
                                <div class="b-count__item">
                                    <div class="b-count__item-circle">
                                        <span class="fa fa-users"></span>
                                    </div>
                                    <div class="chart">
                                        <h2  class="percent allcarmela">0</h2>
                                    </div>
                                    <h5>Carmela</h5>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="b-count__item j-last">
                                    <div class="b-count__item-circle">
                                        <span class="fa fa-car"></span>
                                    </div>
                                    <div class="chart">
                                        <h2  class="percent car">0</h2>
                                    </div>
                                    <h5>VEHICLES IN STOCK</h5>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="b-count__item">
                                    <div class="b-count__item-circle">
                                        <span class="fa fa-user"></span>
                                    </div>
                                    <div class="chart">
                                        <h2  class="percent review">0</h2>
                                    </div>
                                    <h5>HAPPY CUSTOMER REVIEWS</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<br/>
<br/>
<section class="b-more">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <div class="b-more__why wow zoomInLeft" data-wow-delay="0.5s">
                    <h2 class="s-title">WHY CHOOSE US</h2>
                    <p>Our rates are competitive with other comparable repair facilities. You pay us for expertise and integrity and you can expect to receive great value.
Car House uses state-of-the-art computerized testing and diagnostic equipment and we've made a long-term commitment to providing you with the finest service and support.</p>
                    <ul class="s-list">
                        <li><span class="fa fa-check"></span>At Car House, we have ASE-Certified Technicians working on your car.</li>
                        <li><span class="fa fa-check"></span>You'll always receive a complete, easy-to-understand, itemized invoice.</li>
                        <li><span class="fa fa-check"></span>We're always happy to prepare a written estimate before we begin repairs. </li>
                        <li><span class="fa fa-check"></span> Show you any worn or replaced parts when we're finished.</li>
                        <li><span class="fa fa-check"></span>We have also arranged a discount with a car.</li>
                        <li><span class="fa fa-check"></span>Here on our website, we have a Request Appointment Page.     </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="b-more__info wow zoomInRight" data-wow-delay="0.5s">
                    <h2 class="s-title">MORE INFO</h2>
                    <div class="b-more__info-block">
                        <div class="b-more__info-block-title">Fair Price for Everyone<a class="j-more" href="#"><span class="fa fa-angle-left"></span></a></div>
                        <div class="b-more__info-block-inside j-inside">
                            <p>A lot of thought goes into the process of buying a used car. Of course, there's reading reviews and taking a test drive. There's securing financing, assessing the vehicle's condition and finding a car with the lowest possible odometer reading. But the most important part of buying a pre-owned vehicle is, of course, making sure the price is fair. If you're not sure how to do that, we've provided a few tips to make sure you don't pay too much.</p>
                        </div>
                    </div>
                    <div class="b-more__info-block">
                        <div class="b-more__info-block-title">Large Number of Vehicles<a href="#" class="j-more"><span class="fa fa-angle-left"></span></a></div>
                        <div class="b-more__info-block-inside j-inside">
                            <p>car house.com is associated with corporates and Authorized Service Stations and focus on "total car care" in India.</p>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</section><!--b-more-->
<br/>
<br/>
<?php

$this->load->view("master_footer");
?>
<script type="text/javascript">
    function dash(c,action,cnt)
        {
                var cc = setInterval(function() {
                $("."+action).text(c);
                c++;
                if(c > cnt)
                {
                    clearInterval(cc);
                }
            },100);

        }

        dash(0,'allcarmela',<?php echo $allcarmela; ?>);
        dash(0,'car',<?php echo $allcar; ?>);
        dash(0,'review',<?php echo $allreview; ?>);

    $(document).ready(function (){
       $(".carousel").carousel({ interval:5000,pause:false }); 
    });
</script>   