<div class="backdiv" id="a">
    <div class="contentdiv">
        <div class="contentdiv1">
            <h2 class="s-title1">Thanks For Subscribe</h2>
        </div>
        <div class="contentdiv2">
            <p>Thank You for subscribing on Car House. We will send mail for Car Update on your registered email. Your email subscribe is Successfully done.</p>
            <div class="text-right">
                <button type="button" class="btn m-btn cls" style="background-color: #FF6200;color:#fff;font-size:12px;">CANCEL<i class="fa fa-close" style="border-radius: 15px;font-size:17px;margin:0 5px;width: 23px;height: 20px;background-color: #fff;color:#000;" ></i></button>
            </div>
        </div>
    </div>
</div>
<div class="backdiv" id="aa">
    <div class="contentdiv">
        <div class="contentdiv1">
            <h2 class="s-title1">Email Already Subscribe</h2>
        </div>
        <div class="contentdiv2">
            <p>You Are Already Subscriber On Car House. We will send mail for Car Update on your registered email. Your email subscribe is Successfully done.</p>
            <div class="text-right">
                <button type="button" class="btn m-btn cls" style="background-color: #FF6200;color:#fff;font-size:12px;">CANCEL<i class="fa fa-close" style="border-radius: 15px;font-size:17px;margin:0 5px;width: 23px;height: 20px;background-color: #fff;color:#000;" ></i></button>
            </div>
        </div>
    </div>
</div>
<header class="b-topBar wow slideInDown" data-wow-delay="0.7s">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-xs-4">
                <div class="b-topBar__addr">
                    <a href="https://mail.google.com/mail/u/0/#inbox" style="text-decoration: none;"><b class='white' style="cursor: pointer;"><i class="fa fa-envelope" style="vertical-align: baseline;"></i>&nbsp;&nbsp;&nbsp;carhouse2k18@gmail.com</b></a>
                </div>
            </div>
            <div class="col-md-6 col-xs-6">
                <nav class="b-topBar__nav">
                    <ul>
                        <li><a class="fa fa-sign-in" href="<?php echo base_url(); ?>Carmela-Registration-1" style="color:white;"> <span class='white'><span/>&nbsp;&nbsp;car dealer login?</a></li>
                        <?php
                        if ($this->session->userdata('userid') != "") {
                            ?>
                            <li><a class="fa fa-user-plus" href="<?php echo base_url(); ?>User-Home" style="color:white;"> <span class='white'>&nbsp;&nbsp;My Profile</span></a></li>
                            <li><a class="fa fa-user" href="<?php echo base_url(); ?>User-Logout" style="color:white;"> <span class='white'>&nbsp;&nbsp;Logout</span></a></li>
                            <?php
                        } else {
                            ?>
                            <li><a class="fa fa-user-plus" href="<?php echo base_url(); ?>Login" style="color:white;"> <span class='white'>&nbsp;&nbsp;Register</span></a></li>
                            <li><a class="fa fa-user" href="<?php echo base_url(); ?>Login" style="color:white;"> <span class='white'>&nbsp;&nbsp;Login</span></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </nav>
            </div>
            <div class="col-md-2 col-xs-2" style="padding-top: 6px;">
                <div id="google_translate_element">

                </div>
                <script type="text/javascript">
                    function googleTranslateElementInit() {
                        new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                    }
                </script>
                <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
            </div>

        </div>
    </div>
</header><!--b-topBar-->