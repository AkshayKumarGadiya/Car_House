<?php $c = $this->md->my_select('tbl_carmela',array('carmela_id'=>$this->session->userdata('carmela'))); ?>

<div class="sidebar-header">
    <div class="sidebar-title">
        Menubar
    </div>
    <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
    </div>
</div>

<div class="nano">
    <div class="nano-content">
        <nav id="menu" class="nav-main" role="navigation">
            <ul class="nav nav-main">
                <?php
                if($this->session->userdata('seller') == 'dashboard')
                {
                ?>
                <li class="nav-active">
                    <a href="<?php echo base_url(); ?>Carmela-Home">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php
                }
                else
                {
                ?>
                <li>
                    <a href="<?php echo base_url(); ?>Carmela-Home">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php
                }
                if($this->session->userdata('seller') == 'profile')
                {
                ?>
                <li class="nav nav-active">
                    <a href="<?php echo base_url(); ?>My-Profile">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <?php
                }
                else
                {
                ?>
                <li class="nav">
                    <a href="<?php echo base_url(); ?>My-Profile">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <?php
                }
                if($c[0]->status == 1)
                {
                    if($this->session->userdata('seller') == 'gallery')
                    {
                ?>
                    <li class="nav nav-active">
                        <a href="<?php echo base_url(); ?>My-Gallery">
                            <i class="fa fa-photo" aria-hidden="true"></i>
                            <span>My Gallery</span>
                        </a>
                    </li>
                    <?php
                    }
                    else
                    {
                    ?>
                    <li class="nav">
                        <a href="<?php echo base_url(); ?>My-Gallery">
                            <i class="fa fa-photo" aria-hidden="true"></i>
                            <span>My Gallery</span>
                        </a>
                    </li>
                    <?php
                    }
                    if($this->session->userdata('seller') == 'car')
                    {
                    ?>
                    <li class="nav-parent nav-active">
                        <a>
                            <i class="fa fa-car" aria-hidden="true" style="font-size: 15px;"></i>
                            <span>My Car</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo base_url(); ?>Add-Car">
                                    Add New Car
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Add-Car-Image">
                                    Add New Car Image
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>View-All-Car">
                                    View All Car
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php
                    }
                    else
                    {
                    ?>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-car" aria-hidden="true" style="font-size: 15px;"></i>
                            <span>My Car</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo base_url(); ?>Add-Car">
                                    Add New Car
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Add-Car-Image">
                                    Add New Car Image
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>View-All-Car">
                                    View All Car
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php
                    }
                    if($this->session->userdata('seller') == 'offer')
                    {
                    ?>
                    <li class="nav nav-active">
                        <a href="<?php echo base_url(); ?>Carmela-Offer">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>Offer</span>
                        </a>
                    </li>
                    <?php
                    }
                    else
                    {
                    ?>
                    <li>
                        <a href="<?php echo base_url(); ?>Carmela-Offer">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>Offer</span>
                        </a>
                    </li>
                    <?php
                    }
                    if($this->session->userdata('seller') == 'carmelareview')
                    {
                    ?>
                    <li class="nav nav-active">
                        <a href="<?php echo base_url(); ?>My-Carmela-Review">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>My Carmela Review</span>
                        </a>
                    </li>
                    <?php
                    }
                    else
                    {
                    ?>
                    <li>
                        <a href="<?php echo base_url(); ?>My-Carmela-Review">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>My Carmela Review</span>
                        </a>
                    </li>
                    <?php
                    }
                    if($this->session->userdata('seller') == 'carreview')
                    {
                    ?>
                    <li class="nav nav-active">
                        <a href="<?php echo base_url(); ?>My-Car-Review">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            My Car Review
                        </a>
                    </li>
                    <?php
                    }
                    else
                    {
                    ?>
                    <li>
                        <a href="<?php echo base_url(); ?>My-Car-Review">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            My Car Review
                        </a>
                    </li>
                    <?php
                    }
                    if($this->session->userdata('seller') == 'cartest')
                    {
                    ?>
                    <li class="nav nav-active">
                        <a href="<?php echo base_url(); ?>My-Car-Testdrive">
                            <i class="fa fa-car" aria-hidden="true"></i>
                            My Car Test Drive
                        </a>
                    </li>
                    <?php
                    }
                    else
                    {
                    ?>
                    <li>
                        <a href="<?php echo base_url(); ?>My-Car-Testdrive">
                            <i class="fa fa-car" aria-hidden="true"></i>
                            My Car Test Drive
                        </a>
                    </li>
                    <?php
                    }
                    if($this->session->userdata('seller') == 'follow')
                    {
                    ?>
                    <li class="nav nav-active">
                        <a href="<?php echo base_url(); ?>Follower">
                            <i class="fa fa-user-times" aria-hidden="true"></i>
                            <span>My Followers</span>
                        </a>
                    </li>
                    <?php
                    }
                    else
                    {
                    ?>
                    <li class="nav">
                        <a href="<?php echo base_url(); ?>Follower">
                            <i class="fa fa-user-times" aria-hidden="true"></i>
                            <span>My Followers</span>
                        </a>
                    </li>
                    <?php
                    }
                }
                ?>
            </ul>
        </nav>
    </div>
</div>
<!--
               <li class="nav-parent">
                    <a>
                        <i class="fa fa-user" aria-hidden="true" style="font-size: 15px;"></i>
                        <span>User</span>
                    </a>
                    <ul class="nav nav-children">
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Member">
                                Member
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Carmela">
                                Carmela
                            </a>
                        </li>
                    </ul>
                </li>
               <li class="nav-parent">
                    <a>
                        <i class="fa fa-map-marker" aria-hidden="true" style="font-size: 15px;"></i>
                        <span>Location</span>
                    </a>
                    <ul class="nav nav-children">
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-State">
                                State
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-City">
                                City
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Area">
                                Area
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Landmark">
                                Landmark
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-parent">
                    <a>
                        <i class="fa fa-car" aria-hidden="true" style="font-size: 15px;"></i>
                        <span>Car Category</span>
                    </a>
                    <ul class="nav nav-children">
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Car-Type">
                                Car Type
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Car-Company">
                                Car Company
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Car-Model">
                                Car Model
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Car-Submodel">
                                Car Submodel
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-parent">
                    <a>
                        <i class="fa fa-dashboard" aria-hidden="true" style="font-size: 15px;"></i>
                        <span>Car Specification</span>
                    </a>
                    <ul class="nav nav-children">
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Specification-Set">
                                Specification Set
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Specification">
                                Specification
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-parent">
                    <a>
                        <i class="fa fa-info" aria-hidden="true" style="font-size: 15px;"></i>
                        <span>About Car</span>
                    </a>
                    <ul class="nav nav-children">
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Car-Detail">
                                Car Detail
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Car-Review">
                                Car Review
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Carmela-Review">
                                Carmela Review
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Offer">
                                Offer
                            </a>
                        </li>
                    </ul>
                </li>-->
<!-- <li class="nav-parent">
     <a>
         <i class="fa fa-tasks" aria-hidden="true"></i>
         <span>UI Elements</span>
     </a>
     <ul class="nav nav-children">
         <li>
             <a href="ui-elements-typography.html">
                 Typography
             </a>
         </li>
         <li class="nav-parent">
             <a>
                 Icons
             </a>
             <ul class="nav nav-children">
                 <li>
                     <a href="ui-elements-icons-elusive.html">
                         Elusive
                     </a>
                 </li>
                 <li>
                     <a href="ui-elements-icons-font-awesome.html">
                         Font Awesome
                     </a>
                 </li>
                 <li>
                     <a href="ui-elements-icons-glyphicons.html">
                         Glyphicons
                     </a>
                 </li>
                 <li>
                     <a href="ui-elements-icons-line-icons.html">
                         Line Icons
                     </a>
                 </li>
                 <li>
                     <a href="ui-elements-icons-meteocons.html">
                         Meteocons
                     </a>
                 </li>
             </ul>
         </li>
         <li>
             <a href="ui-elements-tabs.html">
                 Tabs
             </a>
         </li>
         <li>
             <a href="ui-elements-panels.html">
                 Panels
             </a>
         </li>
         <li>
             <a href="ui-elements-widgets.html">
                 Widgets
             </a>
         </li>
         <li>
             <a href="ui-elements-portlets.html">
                 Portlets
             </a>
         </li>
         <li>
             <a href="ui-elements-buttons.html">
                 Buttons
             </a>
         </li>
         <li>
             <a href="ui-elements-alerts.html">
                 Alerts
             </a>
         </li>
         <li>
             <a href="ui-elements-notifications.html">
                 Notifications
             </a>
         </li>
         <li>
             <a href="ui-elements-modals.html">
                 Modals
             </a>
         </li>
         <li>
             <a href="ui-elements-lightbox.html">
                 Lightbox
             </a>
         </li>
         <li>
             <a href="ui-elements-progressbars.html">
                 Progress Bars
             </a>
         </li>
         <li>
             <a href="ui-elements-sliders.html">
                 Sliders
             </a>
         </li>
         <li>
             <a href="ui-elements-carousels.html">
                 Carousels
             </a>
         </li>
         <li>
             <a href="ui-elements-accordions.html">
                 Accordions
             </a>
         </li>
         <li>
             <a href="ui-elements-nestable.html">
                 Nestable
             </a>
         </li>
         <li>
             <a href="ui-elements-tree-view.html">
                 Tree View
             </a>
         </li>
         <li>
             <a href="ui-elements-scrollable.html">
                 Scrollable
             </a>
         </li>
         <li>
             <a href="ui-elements-grid-system.html">
                 Grid System
             </a>
         </li>
         <li>
             <a href="ui-elements-charts.html">
                 Charts
             </a>
         </li>
         <li class="nav-parent">
             <a>
                 Animations
             </a>
             <ul class="nav nav-children">
                 <li>
                     <a href="ui-elements-animations-appear.html">
                         Appear
                     </a>
                 </li>
                 <li>
                     <a href="ui-elements-animations-hover.html">
                         Hover
                     </a>
                 </li>
             </ul>
         </li>
         <li class="nav-parent">
             <a>
                 Loading
             </a>
             <ul class="nav nav-children">
                 <li>
                     <a href="ui-elements-loading-overlay.html">
                         Overlay
                     </a>
                 </li>
                 <li>
                     <a href="ui-elements-loading-progress.html">
                         Progress
                     </a>
                 </li>
             </ul>
         </li>
         <li>
             <a href="ui-elements-extra.html">
                 Extra
             </a>
         </li>
     </ul>
 </li>
 <li class="nav-parent">
     <a>
         <i class="fa fa-list-alt" aria-hidden="true"></i>
         <span>Forms</span>
     </a>
     <ul class="nav nav-children">
         <li>
             <a href="forms-basic.html">
                 Basic
             </a>
         </li>
         <li>
             <a href="forms-advanced.html">
                 Advanced
             </a>
         </li>
         <li>
             <a href="forms-validation.html">
                 Validation
             </a>
         </li>
         <li>
             <a href="forms-layouts.html">
                 Layouts
             </a>
         </li>
         <li>
             <a href="forms-wizard.html">
                 Wizard
             </a>
         </li>
         <li>
             <a href="forms-code-editor.html">
                 Code Editor
             </a>
         </li>
     </ul>
 </li>
 <li class="nav-parent">
     <a>
         <i class="fa fa-table" aria-hidden="true"></i>
         <span>Tables</span>
     </a>
     <ul class="nav nav-children">
         <li>
             <a href="tables-basic.html">
                 Basic
             </a>
         </li>
         <li>
             <a href="tables-advanced.html">
                 Advanced
             </a>
         </li>
         <li>
             <a href="tables-responsive.html">
                 Responsive
             </a>
         </li>
         <li>
             <a href="tables-editable.html">
                 Editable
             </a>
         </li>
         <li>
             <a href="tables-ajax.html">
                 Ajax
             </a>
         </li>
         <li>
             <a href="tables-pricing.html">
                 Pricing
             </a>
         </li>
     </ul>
 </li>
 <li>
     <a href="mailbox-folder.html">
         <span class="pull-right label label-primary">182</span>
         <i class="fa fa-envelope" aria-hidden="true"></i>
         <span>Mailbox</span>
     </a>
 </li>
 <li class="nav-parent">
     <a>
         <i class="fa fa-map-marker" aria-hidden="true"></i>
         <span>Maps</span>
     </a>
     <ul class="nav nav-children">
         <li>
             <a href="maps-google-maps.html">
                 Basic
             </a>
         </li>
         <li>
             <a href="maps-google-maps-builder.html">
                 Map Builder
             </a>
         </li>
         <li>
             <a href="maps-vector.html">
                 Vector
             </a>
         </li>
     </ul>
 </li>
 <li class="nav-parent">
     <a>
         <i class="fa fa-asterisk" aria-hidden="true"></i>
         <span>Extra</span>
     </a>
     <ul class="nav nav-children">
         <li>
             <a href="extra-changelog.html">
                 Changelog
             </a>
         </li>
         <li>
             <a href="extra-ajax-made-easy.html">
                 Ajax Made Easy
             </a>
         </li>
     </ul>
 </li>
 <li>
     <a href="http://themeforest.net/item/porto-responsive-html5-template/4106987?ref=Okler" target="_blank">
         <i class="fa fa-external-link" aria-hidden="true"></i>
         <span>Front-End <em class="not-included">(Not Included)</em></span>
     </a>
 </li>
 <li class="nav-parent">
     <a>
         <i class="fa fa-align-left" aria-hidden="true"></i>
         <span>Menu Levels</span>
     </a>
     <ul class="nav nav-children">
         <li>
             <a>First Level</a>
         </li>
         <li class="nav-parent">
             <a>Second Level</a>
             <ul class="nav nav-children">
                 <li class="nav-parent">
                     <a>Third Level</a>
                     <ul class="nav nav-children">
                         <li>
                             <a>Third Level Link #1</a>
                         </li>
                         <li>
                             <a>Third Level Link #2</a>
                         </li>
                     </ul>
                 </li>
                 <li>
                     <a>Second Level Link #1</a>
                 </li>
                 <li>
                     <a>Second Level Link #2</a>
                 </li>
             </ul>
         </li>
     </ul>
 </li>-->
<!--            </ul>
        </nav>

        <hr class="separator" />

        <div class="sidebar-widget widget-tasks">
            <div class="widget-header">
                <h6>Projects</h6>
                <div class="widget-toggle">+</div>
            </div>
            <div class="widget-content">
                <ul class="list-unstyled m-none">
                    <li><a href="#">Porto HTML5 Template</a></li>
                    <li><a href="#">Tucson Template</a></li>
                    <li><a href="#">Porto Admin</a></li>
                </ul>
            </div>
        </div>

        <hr class="separator" />

        <div class="sidebar-widget widget-stats">
            <div class="widget-header">
                <h6>Company Stats</h6>
                <div class="widget-toggle">+</div>
            </div>
            <div class="widget-content">
                <ul>
                    <li>
                        <span class="stats-title">Stat 1</span>
                        <span class="stats-complete">85%</span>
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
                                <span class="sr-only">85% Complete</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <span class="stats-title">Stat 2</span>
                        <span class="stats-complete">70%</span>
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                <span class="sr-only">70% Complete</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <span class="stats-title">Stat 3</span>
                        <span class="stats-complete">2%</span>
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                <span class="sr-only">2% Complete</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>-->

<script>
    // Maintain Scroll Position
    if (typeof localStorage !== 'undefined') {
        if (localStorage.getItem('sidebar-left-position') !== null) {
            var initialPosition = localStorage.getItem('sidebar-left-position'),
                    sidebarLeft = document.querySelector('#sidebar-left .nano-content');

            sidebarLeft.scrollTop = initialPosition;
        }
    }
</script>
