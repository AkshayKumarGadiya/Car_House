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
                if($this->session->userdata('user') == 'home')
                {
                ?>
                <li class="nav-active">
                    <a href="<?php echo base_url(); ?>User-Home">
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
                    <a href="<?php echo base_url(); ?>User-Home">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php
                }
                if($this->session->userdata('user') == 'profile')
                {
                ?>
                <li class="nav-active">
                    <a href="<?php echo base_url(); ?>User-Profile">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <?php
                }
                else
                {
                ?>
                <li>
                    <a href="<?php echo base_url(); ?>User-Profile">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <?php
                }
                if($this->session->userdata('user') == "review")
                {
                ?>
                <li class="nav-active">
                    <a href="<?php echo base_url(); ?>My-Review">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <span>My Car Review</span>
                    </a>
                </li>
                <?php
                }
                else
                {
                ?>
                <li>
                    <a href="<?php echo base_url(); ?>My-Review">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <span>My Car Review</span>
                    </a>
                </li>
                <?php
                }
                if($this->session->userdata('user') == "carmr")
                {
                ?>
                <li class="nav-active">
                    <a href="<?php echo base_url(); ?>Carmela-Review">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <span>My Carmela Review</span>
                    </a>
                </li>
                <?php
                }
                else
                {
                ?>
                <li>
                    <a href="<?php echo base_url(); ?>Carmela-Review">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <span>My Carmela Review</span>
                    </a>
                </li>
                <?php
                }
                if($this->session->userdata('user') == 'wish')
                {
                ?>
                <li class="nav-active">
                    <a href="<?php echo base_url(); ?>My-Wishlist">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                        <span>My Wishlist</span>
                    </a>
                </li>
                <?php
                }
                else
                {
                ?>
                <li>
                    <a href="<?php echo base_url(); ?>My-Wishlist">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                        <span>My Wishlist</span>
                    </a>
                </li>
                <?php
                }
                if($this->session->userdata('user') == 'test')
                {
                ?>
                <li class="nav-active">
                    <a href="<?php echo base_url(); ?>User-Test-Drive">
                        <i class="fa fa-car" aria-hidden="true"></i>
                        <span>My Test Drive</span>
                    </a>
                </li>
                <?php
                }
                else
                {
                ?>
                <li>
                    <a href="<?php echo base_url(); ?>User-Test-Drive">
                        <i class="fa fa-car" aria-hidden="true"></i>
                        <span>My Test Drive</span>
                    </a>
                </li>
                <?php
                }
                if($this->session->userdata('user') == 'service')
                {
                ?>
                <li class="nav-active">
                    <a href="<?php echo base_url(); ?>Car-Service-Confirm">
                        <i class="fa fa-gears" aria-hidden="true"></i>
                        <span>Car Services</span>
                    </a>
                </li>
                <?php
                }
                else
                {
                ?>
                <li>
                    <a href="<?php echo base_url(); ?>Car-Service-Confirm">
                        <i class="fa fa-gears" aria-hidden="true"></i>
                        <span>Car Services</span>
                    </a>
                </li>
                <?php
                }
                if($this->session->userdata('user') == 'viewb')
                {
                ?>
                <li class="nav-active">
                    <a href="<?php echo base_url(); ?>View-Bill">
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
                    <a href="<?php echo base_url(); ?>View-Bill">
                        <i class="fa fa-print" aria-hidden="true"></i>
                        <span>View Bill</span>
                    </a>
                </li>
                <?php
                }
                ?>
                <li>
                    <a href="<?php echo base_url(); ?>All-Car">
                        <i class="fa fa-car" aria-hidden="true"></i>
                        <span>All Car</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

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
