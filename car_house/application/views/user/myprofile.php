<!doctype html>
<html class="fixed">
    <title>Member panel - Car House</title>
    <?php
    $this->load->view('user/header_link');
    ?>
    <body style="background-color: #F6F6F6;">
        <section class="body">

            <!-- start: header -->
            <?php
            $this->load->view('user/header');
            ?>  
            <!-- end: header -->

            <div class="inner-wrapper">
                <!-- start: sidebar -->
                <aside id="sidebar-left" class="sidebar-left">

                    <?php
                    $this->load->view('user/menu');
                    ?>
                </aside>
                <!-- end: sidebar -->

                <section role="main" class="content-body">
                    <header class="page-header">
                        <h2>My Profile</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>User-Home">
                                        <i class="fa fa-home" style="padding-right: 5px;font-size: 17px;margin-top: -4px"></i>
                                    </a>
                                </li>
                                <li><span style="padding-right: 25px;font-size: 13px;">My Profile</span></li>
                            </ol>
                        </div>
                    </header>

                    <!-- start: page -->
                    <div class="container-fluid">
                        <div class="row">
                            <form method="post">
                                <div class="col-md-12 col-lg-12 col-xs-12">
                                    <section class="panel">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="checko">
                                                    <div class="col-md-3 col-xs-12">
                                                    <?php
                                                    if($user[0]->profile_pic == "")
                                                    {
                                                    ?>
                                                        <img src="<?php echo base_url(); ?>user_asset/images/user-blank.png" class="img-responsive" style="width: 150px;height: 150px;cursor: pointer;"/>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                        <img src="<?php echo base_url().$user[0]->profile_pic; ?>" title="<?php echo $user[0]->name; ?>" class="img-responsive" style="width: 150px;height: 150px;cursor: pointer;"/>
                                                    <?php
                                                    }
                                                    ?>
                                                    </div>
                                                    <div class="col-md-9 col-xs-12">
                                                        <h4 class="text-capitalize" style="margin: 15px 0 15px 5px;"><?php echo $user[0]->name; ?></h4>
                                                        <a href="<?php echo base_url(); ?>User-Update-Profile"><button type="button" class="btn" name="uprofile" value="Edit Profile" style="border-radius: 20px;background-color: #FF6200;color: white;font-size: 13px;">Edit Profile&nbsp;&nbsp;<i class="fa fa-edit" style="margin-top: -1px;border-radius: 50%;width: 23px;margin-left: 5px;margin-right: -5px;padding: 4px;background-color: #FFFFFF;color: #000;font-size: 13px;"></i></button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>

                                <div class="col-md-12 col-lg-12 col-xl-12" style="padding: 0px;">
                                    <div class="col-md-6">
                                        <div class="table-responsive">
                                            <table class="table-striped text-center table-hover" >
                                                <thead class="table-bordered">
                                                    <tr>
                                                        <th colspan="2" style="text-align: center;"><h4>Basic Information</h4></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-bordered" style="text-transform: capitalize;">
                                                    <tr>
                                                        <th>Name</th>
                                                        <td><?php echo $user[0]->name; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gender</th>
                                                        <td><?php
                                                        if($user[0]->gender == "")
                                                        {
                                                            echo "Not Specified";
                                                        }
                                                        else
                                                        {
                                                            echo $user[0]->gender;
                                                        }    
                                                        ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>D.O.B</th>
                                                        <td><?php
                                                        if($user[0]->dob != "0000-00-00")
                                                        {
                                                            echo date('d-m-Y',strtotime($user[0]->dob));
                                                        }
                                                        else
                                                        {
                                                            echo "Not Specified";
                                                        }    
                                                        ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="table-responsive">
                                            <table class="table-striped text-center table-hover" >
                                                <thead class="table-bordered">
                                                    <tr>
                                                        <th colspan="2" style="text-align: center;"><h4>Contact Information</h4></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-bordered" style="text-transform: capitalize;">
                                                    <tr>
                                                        <th>Email</th>
                                                        <td style="text-transform: lowercase;"><?php echo $user[0]->email; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mobile</th>
                                                        <td><?php
                                                        if($user[0]->contact_no != "")
                                                        {
                                                            echo $user[0]->contact_no;
                                                        }
                                                        else
                                                        {
                                                            echo "Not Specified";
                                                        }
                                                        ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Join Date</th>
                                                        <td><?php echo date('d-m-Y',strtotime($user[0]->join_date)); ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>


        </section>
        <?php
        $this->load->view('user/footer_script');
        ?>
    </body>
</html>