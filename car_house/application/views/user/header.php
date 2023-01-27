<?php $userdata = $this->md->my_select('tbl_registration',array('registration_id'=>$this->session->userdata('userid'))); ?>
<header class="header">
    <div class="col-md-3">
        <div class="logo-container" style="padding-left: 50px;">
            <div class="adminlogo1 wow slideInLeft" data-wow-delay="0.3s" title="Car house" style="position: fixed;">
                <h3><a href="<?php echo base_url(); ?>User-Home">Car<span style="color: #555555;"> House</span></a></h3>
                <h2><a href="<?php echo base_url(); ?>Home" style="color: #565656;">Everyone Dreams of Car</a></h2>
            </div>
            <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>

            </div>

        </div>
    </div>
    <div class="col-md-6">
<!--        maequee-->
    </div>
    <!-- start: search & user box -->
    <div class="col-md-3">
    <div class="header-right">
        
        <span class="separator"></span>

        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture" style="">
                    <?php
                    if($userdata[0]->profile_pic != "")
                    {
                    ?>
                    <img src="<?php echo base_url().$userdata[0]->profile_pic; ?>" style="width: 40px;height: 40px;" alt="Joseph Doe" class="img-circle" />
                    <?php
                    }
                    else
                    {
                    ?>
                    <img src="<?php echo base_url(); ?>user_asset/images/user-blank.png" style="width: 40px;height: 40px;" alt="Joseph Doe" class="img-circle" />
                    <?php
                    }
                    ?>
                </figure>
                <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com" style="width: 127px;">
                    
                    <span class="name" style="text-transform: capitalize;"><?php echo $userdata[0]->name; ?></span>
                    <span class="role"><i class="fa fa-clock-o" style="font-size: 11px;margin-top:4px;"></i>&nbsp;<?php if($userdata[0]->last_login == "0000-00-00 00:00:00") { echo date('d-m-Y h:i:s'); }else{echo date('d-m-Y h:i:s' ,strtotime($userdata[0]->last_login));} ?></span>
                </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>User-Change-Password"><i class="fa fa-gear"></i>Settings</a>
                    </li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>User-Logout"><i class="fa fa-power-off"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </div>
    <!-- end: search & user box -->
</header>