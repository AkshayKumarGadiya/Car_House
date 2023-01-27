<div class="b-info">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-6">
                <aside class="b-info__aside wow zoomInLeft" data-wow-delay="0.3s">
                    <article class="b-info__aside-article">
                        <div class="b-info__aside-article-item">
                            <div id="logo" class="b-nav__logo wow slideInRight" data-wow-delay="0.3s" title="Car house">
                                <h3><a href="<?php echo base_url() ?>Home">Car<span> House</span></a></h3>
                                <h2><a href="<?php echo base_url() ?>Home">Eye it..try it..buy it!</a></h2>
                            </div>
                        </div>
                    </article>
                    <br/>
                    <br/>
                    <article class="b-info__aside-article">
                        <h2 class="s-title wow zoomInUp" data-wow-delay="0.3s" style="color: white;">ABOUT US</h2>

                        <p class="about">The web portal is creating 
                            awareness and providing a 
                            platform for car owners to 
                            make easy contact to car 
                            workshops and recommend 
                            them based on customer 
                            reviews. car house.com 
                            is associated with corporates
                            and Authorized Service Stations
                            and focus on "total car care"
                            in India.</p>
                    </article>
                    <a href="<?php echo base_url(); ?>Aboutcarhouse" class="btn m-btn">Read More<span class="fa fa-angle-right"></span></a>
                    <br/>
                    <article class="b-info__aside-article tagsymbol">
                        <div class="row" style="padding: 0px;">
                            <div class="col-md-12 col-xs-12 col-sm-12">
                            <br/>
                            <?php
                            $tagdata = $this->md->my_select("tbl_tag");
                            $my_tag = array();
                            foreach ($tagdata as $v)
                            {
                                $tagarr= explode(",",$v->tag);
                                foreach($tagarr as $tt)
                                {
                                    if($tt != "")
                                    {
                                        if(!in_array($tt,$my_tag))
                                        {
                                            array_push($my_tag, $tt);
                                        }
                                    }
                                }
                            }
                            $tc=0;
                            $cc=0;
                            foreach($my_tag as $ttt)
                            {
                                $tc++;
                                $cc++;
                                if($cc < 10)
                                {
                                    if($tc%3==1)
                                    {
                                        echo "<div>";
                                    }
                            ?>
                            <span class="tag" style="cursor: pointer;" title="<?php echo strtolower($ttt); ?>" onclick="window.location.href='<?php echo base_url();?>Search-Car/Tagdata/<?php echo strtolower($ttt); ?>';"><i class="fa fa-tags"></i>&nbsp;<?php echo strtolower($ttt); ?></span>
                            <?php
                                    if($tc%3==0)
                                    {
                                        echo "</div><br/>";
                                        $tc=0;
                                    }
                                }
                            }
                            ?>
                            </div>
                        </div>
                    </article>
                </aside>
            </div>
            <div class="col-md-2 col-xs-6" style="padding: 0px;">
                <div class="b-info__latest">
                    <h2 class="s-title wow zoomInUp" data-wow-delay="0.3s" style="color: white;">OUR SERVICE</h2>
                    <div class="b-info__latest-article wow zoomInUp" data-wow-delay="0.3s">
                        <div class="b-info__latest-article-info">
                            <h6><i class="fa fa-leaf"></i><a href="<?php echo base_url(); ?>ContactUs">&nbsp;&nbsp;&nbsp;Contact Us</a></h6>
                        </div>
                        <div class="b-info__latest-article-info">
                            <h6><i class="fa fa-leaf"></i><a href="<?php echo base_url(); ?>Feedback">&nbsp;&nbsp;&nbsp;Feedback</a></h6>
                        </div>
                        <div class="b-info__latest-article-info">
                            <h6><i class="fa fa-leaf"></i><a href="<?php echo base_url(); ?>TermsandCondition">&nbsp;&nbsp;&nbsp;Terms & Condition</a></h6>
                        </div>
                        <div class="b-info__latest-article-info">
                            <h6><i class="fa fa-leaf"></i><a href="<?php echo base_url(); ?>Privacy-Policy">&nbsp;&nbsp;&nbsp;Privacy Policy</a></h6>
                        </div>
                        <div class="b-info__latest-article-info">
                            <h6><i class="fa fa-leaf"></i><a href="<?php echo base_url(); ?>Carmela-Policy">&nbsp;&nbsp;&nbsp;Carmela Policy</a></h6>
                        </div>                        
                        <div class="b-info__latest-article-info">
                            <h6><i class="fa fa-leaf"></i><a href="<?php echo base_url(); ?>FAQs">&nbsp;&nbsp;&nbsp;FAQ'S</a></h6>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <address class="b-info__contacts wow zoomInUp" data-wow-delay="0.3s">
                    <h2 class="s-title wow zoomInUp" data-wow-delay="0.3s" style="color: white;">CONTACT US</h2>
                    <div class="b-info__contacts-item">
                        <span class="fa fa-map-marker"></span>
                        <em>3<sup>rd</sup>&nbsp;Floor, Vrundavan Complex,
                            Near Jantanagar Soc,
                            Rachana Circle,Surat</em>
                    </div>
                    <div class="b-info__contacts-item">
                        <span class="fa fa-phone"></span>
                        <em>Phone:  077790 92666</em>
                    </div>
                    <div class="b-info__contacts-item">
                        <span class="fa fa-fax"></span>
                        <em>Web:  www.novaoneclicksolution.in/</em>
                    </div>
                    <div class="b-info__contacts-item">
                        <span class="fa fa-envelope"></span>
                        <em>novaoneclicksolution@gmail.com</em>
                    </div>
                    <a href="#"><img src="<?php echo base_url(); ?>visitor/images/logo/play.png" width="200px" height="80px"/></a>
                    <a href="#"><img src="<?php echo base_url(); ?>visitor/images/logo/istore.png" width="200px" height="80px"/></a>
                </address>
            </div>
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12';
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
            <div class="col-md-4 col-xs-6">
                <div class="b-info__twitter">
                    <h2 class="s-title wow zoomInUp" data-wow-delay="0.3s" style="color: white;">CONNECT WITH US</h2>
                    <div class="b-info__twitter-article wow zoomInUp" data-wow-delay="0.3s">
                        <div>
                            <div class="fb-page" data-href="https://www.facebook.com/pg/Car-House-1498570813552340/posts/?ref=page_internal" data-tabs="timeline" data-width="345" data-height="285" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/pg/Car-House-1498570813552340/posts/?ref=page_internal" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/pg/Car-House-1498570813552340/posts/?ref=page_internal">Car House</a></blockquote></div>
                            <br/>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--Slider-->
        <div class="footerslider">
            <section class="b-featured1">
                <div class="container">
                    <h2 class="s-title wow zoomInUp" data-wow-delay="0.3s" style="color: white;margin-top:15px;">OUR CARMELA</h2>
                    <div id="carousel-small" class="owl-carousel enable-owl-carousel" data-items="4" data-navigation="true" data-auto-play="true" data-stop-on-hover="true" data-items-desktop="4" data-items-desktop-small="4" data-items-tablet="3" data-items-tablet-small="2">
                        <?php $data = $this->md->my_select('tbl_carmela',array('status'=>1));
                        foreach($data as $val)
                        {
                        ?>
                        <div>
                            <div class="b-featured1__item wow rotateIn" data-wow-delay="0.3s" data-wow-offset="150">
                                <a>
                                    <img src="<?php echo base_url().$val->profile; ?>" title="<?php echo $val->name; ?>" style="border-radius: 10px;width:186px;height: 113px;cursor: pointer;" />
                                </a>
                                <h5 class="text-uppercase"><a href="<?php echo base_url(); ?>Carmela-Detail/<?php echo $val->carmela_id; ?>"><?php echo ucwords($val->name); ?></a></h5>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </section><!--b-featured-->
        </div>
    </div>
</div><!--b-info-->
<footer class="b-footer">
    <a id="to-top" href="#this-is-top"><i class="fa fa-chevron-up"></i></a>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-4">
                <div class="b-footer__company wow fadeInLeft" data-wow-delay="0.3s">
                    <p>Copyright &copy; <span style="color:#FF6200;">Car House</span> 2018. All Rights Reserved | Powered By : <a href="<?php echo base_url(); ?>Home" target="__new" style="text-decoration: none;"><span style="color:#FF6200;">Car House</span></a></p>
                </div>
            </div>
            <div class="col-md-6 col-xs-8">
                <div class="b-footer__content wow fadeInRight" data-wow-delay="0.3s">
                    <div class="b-footer__content-social">
                        <a href="https://www.facebook.com/pg/Car-House-1498570813552340/posts/?ref=page_internal" target="__new"><span class="fa fa-facebook-square"></span></a>
                        <a href="https://www.instagram.com/carhouse2k18/" target="__new"><span class="fa fa-instagram"></span></a>
                        <a href="https://plus.google.com/collection/EpO3WE" target="__new"><span class="fa fa-google-plus-square"></span></a>
                        <a href="https://twitter.com/carhouse2k18"><span class="fa fa-twitter-square" target="__new"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer><!--b-footer-->