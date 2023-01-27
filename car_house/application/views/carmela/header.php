<?php
$data = $this->md->my_select('tbl_carmela',array('carmela_id' => $this->session->userdata('carmela')));
?>
<header class="header">
    <div class="col-md-3">
        <div class="logo-container" style="padding-left: 50px;">
            <div class="adminlogo1 wow slideInLeft" data-wow-delay="0.3s" title="Car house" style="position: fixed;">
                <h3><a href="<?php echo base_url(); ?>Admin-Home">Car<span style="color: #555555;"> House</span></a></h3>
                <h2><a href="<?php echo base_url(); ?>Home" style="color: #565656;">Everyone Dreams of Car</a></h2>
            </div>
            <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>

            </div>

        </div>
    </div>
    <div class="col-md-6">
        <?php
        if($data[0]->status == 0)
        {
        ?>
        <marquee style="margin:16px 0;color:red;">You Are Still Not Verify By Admin !!!</marquee>
        <?php
        }
        ?>
    </div>
    <!-- start: search & user box -->
    <div class="col-md-3">
    <div class="header-right">
        
        <span class="separator"></span>

        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                    <img src="<?php echo base_url().$data[0]->profile; ?>" style="width: 40px;height: 40px;" alt="Joseph Doe" class="img-circle" />
                </figure>
                <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                    
                    <span class="name" style="text-transform: capitalize;"><?php echo $data[0]->name; ?></span>
                    <span class="role"><i class="fa fa-clock-o" style="font-size: 14px;margin-top:4px;"></i>&nbsp;<?php echo date('d-m-Y h:i:s' ,strtotime($data[0]->last_login)); ?></span>
                </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>Change-Password"><i class="fa fa-gear"></i>Settings</a>
                    </li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>Carmela-Logout"><i class="fa fa-power-off"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </div>
    <!-- end: search & user box -->
</header>