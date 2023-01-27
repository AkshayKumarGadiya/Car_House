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
            <ul class="nav nav-main adminmenu">
                <?php
                    if($this->session->userdata('pages') == "dashboard")
                    {
                ?>
                <li class="nav-active">
                    <a href="<?php echo base_url(); ?>Admin-Home">
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
                    <a href="<?php echo base_url(); ?>Admin-Home">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php
                    }
                    if($this->session->userdata('pages') == 'pages')
                    {
                ?>
                <li class="nav-parent nav-active">
                    <a>
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                        <span>Pages</span>
                    </a>
                    <ul class="nav nav-children">
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Contact">
                                Contact Us
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Feedback">
                                Feedback
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Email-Subscriber">
                                Email Subscriber
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Banner">
                                Banner
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
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                        <span>Pages</span>
                    </a>
                    <ul class="nav nav-children">
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Contact">
                                Contact Us
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Feedback">
                                Feedback
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Email-Subscriber">
                                Email Subscriber
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Banner">
                                Banner
                            </a>
                        </li>
                    </ul>
                </li>
                <?php
                    }
                    if($this->session->userdata('pages') == 'user')
                    {
                ?>
                <li class="nav-parent nav-active">
                    <a>
                        <i class="fa fa-user" aria-hidden="true"></i>
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
                <?php
                    }
                    else
                    {
                ?>
                <li class="nav-parent">
                    <a>
                        <i class="fa fa-user" aria-hidden="true"></i>
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
                <?php
                    }
                    if($this->session->userdata('pages') == 'location')
                    {
                ?>
                <li class="nav-parent nav-active">
                    <a>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
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
                <?php
                    }
                    else
                    {
                ?>
                <li class="nav-parent">
                    <a>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
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
                <?php
                    }
                    if($this->session->userdata('pages') == 'category')
                    {
                ?>
                <li class="nav-parent nav-active">
                    <a>
                        <i class="fa fa-car" aria-hidden="true"></i>
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
                <?php
                    }
                    else
                    {
                ?>
                <li class="nav-parent">
                    <a>
                        <i class="fa fa-car" aria-hidden="true"></i>
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
                <?php
                    }
                    if($this->session->userdata('pages') == 'specification')
                    {
                ?>
                <li class="nav-parent nav-active">
                    <a>
                        <i class="fa fa-dashboard" aria-hidden="true"></i>
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
                <?php
                    }
                    else
                    {
                ?>
                <li class="nav-parent">
                    <a>
                        <i class="fa fa-dashboard" aria-hidden="true"></i>
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
                <?php
                    }
                    if($this->session->userdata('pages') == "addservice")
                    {
                ?>
                <li class="nav-parent nav-active">
                    <a>
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                        <span>Car Service</span>
                    </a>
                    <ul class="nav nav-children">
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Car-Service">
                                Car Service
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Car-Position">
                                Car Service Position
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Service">
                                <span>Service</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Service-Status">
                                <span>Track Services</span>
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
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                        <span>Car Service</span>
                    </a>
                    <ul class="nav nav-children">
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Car-Service">
                                Car Service
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Car-Position">
                                Car Service Position
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Manage-Service">
                                <span>Service</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>Service-Status">
                                <span>Track Services</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php
                    }
                    if($this->session->userdata('pages') == 'aboutcar')
                    {
                ?>
                <li class="nav-parent nav-active">
                    <a>
                        <i class="fa fa-info" aria-hidden="true"></i>
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
                    </ul>
                </li>
                <?php
                    }
                    else
                    {
                ?>
                <li class="nav-parent">
                    <a>
                        <i class="fa fa-info" aria-hidden="true"></i>
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
                    </ul>
                </li>
                <?php
                    }
                    if($this->session->userdata('pages') == 'bill')
                    {
                ?>
                <li class="nav-active">
                    <a href="<?php echo base_url(); ?>Manage-Bill">
                        <i class="fa fa-print" aria-hidden="true"></i>
                        <span>View Bill</span>
                    </a>
                </li>
                <?php
                    }
                    else
                    {
                ?>
                <li>
                    <a href="<?php echo base_url(); ?>Manage-Bill">
                        <i class="fa fa-print" aria-hidden="true"></i>
                        <span>View Bill</span>
                    </a>
                </li>
                <?php
                    }
                ?>
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
            </ul>

        </nav>
    </div>
</div>
