<?php
$this->load->view("master_header");
?>
<title>FAQ's - Car House</title>

<section class="b-pageHeader">
    <div class="container">
        <h1 class=" wow zoomInLeft" data-wow-delay="0.5s">FAQ's</h1>
        <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.5s">
            <h3>Get In Touch With Us Now</h3>
        </div>
    </div>
</section><!--b-pageHeader-->
<div class="b-breadCumbs s-shadow wow zoomInUp" data-wow-delay="0.5s">
    <div class="container">
        <a href="<?php echo base_url(); ?>Home" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="<?php echo base_url(); ?>FAQs" class="b-breadCumbs__page m-active">FAQ's</a>
    </div>
</div><!--b-breadCumbs-->
<div class="container">
    <br/><br/>
    <div class="faqs">
        <div class="question1" id="11">
            <i class="fa fa-plus"></i><span> Q.1 : What is Car House?</span>
        </div>
        <div class="answer1" id="afaq" style="display: none;">
            <p><i class="fa fa-angle-double-right" aria-hidden="true"></i> Car House is an online service community that offers auto enthusiasts a friendly home where they can find their dream car.</p>
           
        </div>
        <div class="question1" id="2">
            <i class="fa fa-plus"></i><span> Q.2 : How do I access Car House?</span>
        </div>
        <div class="answer1" id="b" style="display: none;">
            <p><i class="fa fa-angle-double-right" aria-hidden="true"></i> Searching for cars on our website is easier and faster than ever. To begin, just go to our home page and decide how you would like to search. You can use the question1s ,you can specify several criteria at once, or you can search by keywords that you type in.</p>
        </div>
        <div class="question1" id="3">
            <i class="fa fa-plus"></i>
            <span> Q.3 : How is Car House content organized?</span>
        </div>
        <div class="answer1" id="c" style="display: none;">
            <p><i class="fa fa-angle-double-right" aria-hidden="true"></i> Car House consists of four sub-categories --New Car Details, New Car Search By Make, Vehicle Type and Price Range, Dealer Details and Latest Car Details.</p>
        </div>
        <div class="question1" id="4">
            <i class="fa fa-plus"></i>
            <span> Q.4 : What kind of topics can be found on Car House?</span>
        </div>
        <div class="answer1" id="d" style="display: none;">
            <p><i class="fa fa-angle-double-right" aria-hidden="true"></i> Car House features latest car news, car photos, all car model detailed specification , photo galleries, classics, videos and more.</p>
        </div>
        <div class="question1" id="5">
            <i class="fa fa-plus"></i>
            <span> Q.5 : How frequently is Car House updated?
        </div>
        <div class="answer1" id="e" style="display: none;">
            <p><i class="fa fa-angle-double-right" aria-hidden="true"></i> WCF is updated weekly !!</p>
        </div>
        <div class="question1" id="6">
            <i class="fa fa-plus"></i>
            <span> Q.6 : what you do....Why do you do?</span>
        </div>
        <div class="answer1" id="f" style="display: none;">
            <p><i class="fa fa-angle-double-right" aria-hidden="true"></i> Because we are crazy passionate about cars and want to share that love with as many people as possible.</p>
        </div>
    </div>
</div>
<br/>
<br/>
<?php
$this->load->view("master_footer");
?>