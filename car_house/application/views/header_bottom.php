<style>
    .my li
    {
        list-style-type: none;
        cursor: pointer;
    }
    .m li
    {
        list-style-type: none;
        cursor: pointer;
    }
    .mym li
    {
        list-style-type: none;
        display: inline;
        padding: 25px;
        cursor: pointer;
    }
    .www ul li
    {
        list-style-type: none;
        cursor: pointer;
    }
    .sss ul li
    {
        list-style-type: none;
        cursor: pointer;
    }
</style>
<nav class="b-nav">
    <div class="container">
        <div class="row">
            <div class="col-sm-2 col-xs-2">
                <div class="b-nav__logo wow slideInLeft" data-wow-delay="0.3s" title="Car house">
                    <h3><a href="<?php echo base_url(); ?>Home">Car<span> House</span></a></h3>
                    <h2><a href="<?php echo base_url(); ?>Home">Everyone Dreams of Car</a></h2>
                </div>
            </div>
            <div class="col-sm-4 col-xs-4" >
                <center>
                <div class="input-group" style="border: 1px solid #FF6200; border-radius: 15px;">
                    <div class="input-group-addon" title="Click To Voice Search..." onclick="startDictation()" style="border: none; background-color: #FFFFFF; border-radius: 15px;"><i class="fa fa-microphone"></i></div>
                    <input type="text" id="search" class="form-control" onkeyup="fillsearch(this.value)" placeholder="Search Favourite Car Here..."/>
                    <div class="input-group-addon" style="border: none; border-radius: 15px; background-color: #FFFFFF;"><i class="fa fa-search" onclick="window.location.href='<?php echo base_url();?>Search-Car/Search/'+$('#search').val();"></i></div>
                </div>
                <div class="panel d-none" id="searchdiv" style="border: 1px solid #FF6200;border-radius: 0px;margin-left: 50px;float: left;position: absolute;z-index: 9999;width: 260px;margin-top: -25px;box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                    
                </div>
                </center>
            </div>
            <div class="col-sm-6 col-xs-6">
                <div class="b-nav__list wow slideInRight" data-wow-delay="0.3s">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse navbar-main-slide" id="nav">
                        <ul class="navbar-nav-menu">
                            <li><a href="<?php echo base_url(); ?>Home"> <i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></li>
                            <li id="mymenu" style="cursor: pointer;"><a href="<?php echo base_url(); ?>All-Car"><i class="fa fa-car"></i>&nbsp;&nbsp;Used Car's</a></li>
                            <?php
                                if($this->session->userdata('userid') != "")
                                {
                            ?>
                            <li><a href="<?php echo base_url(); ?>Car-Service-1"><i class="fa fa-server"></i>&nbsp;&nbsp;Service</span></a></li>
                            <?php
                                }
                                else
                                {
                            ?>
                            <li><a href="<?php echo base_url(); ?>Login"><i class="fa fa-server"></i>&nbsp;&nbsp;Service</span></a></li>
                            <?php
                                }
                            ?>
                            <li><a href="<?php echo base_url(); ?>Aboutcarhouse"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;About Car House</span></a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>