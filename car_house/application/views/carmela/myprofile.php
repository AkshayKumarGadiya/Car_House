<?php $data = $this->md->my_query('SELECT s.name as state , c.name as city ,a.name as area , l.name as landmark , cc.* FROM tbl_location AS s , tbl_location AS c, tbl_location AS a, tbl_location AS l, tbl_carmela as cc WHERE s.location_id = c.parent_id AND c.location_id = a.parent_id AND a.location_id = l.parent_id AND cc.location_id = l.location_id AND cc.carmela_id = "'.$this->session->userdata('carmela').'"') ?>
<?php $images = $this->md->my_select('tbl_carmela',array('carmela_id'=>$this->session->userdata('carmela'))); ?>

<!doctype html>
<html class="fixed">
    <title>Carmela Panel - Car House</title>
    <?php
    $this->load->view('carmela/header_link');
    ?>
    <body style="background-color: #F6F6F6;">
        <section class="body">

            <!-- start: header -->
            <?php
            $this->load->view('carmela/header');
            ?>  
            <!-- end: header -->

            <div class="inner-wrapper">
                <!-- start: sidebar -->
                <aside id="sidebar-left" class="sidebar-left">

                    <?php
                    $this->load->view('carmela/menu');
                    ?>
                </aside>
                <!-- end: sidebar -->

                <section role="main" class="content-body">
                    <header class="page-header">
                        <h2>My Profile</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Carmela-Home">
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
                                                <div class="col-md-12 col-xs-12">
                                                <?php
                                                if($images[0]->cover_pic == "")
                                                {
                                                ?>
                                                    <img src="<?php echo base_url(); ?>carmela/images/cover.jpg" class="img-responsive imgcoverpic" style="border-radius: 5px;"/>
                                                <?php
                                                }
                                                else
                                                {
                                                ?>
                                                    <img src="<?php echo $images[0]->cover_pic; ?>" class="img-responsive imgcoverpic"/>
                                                <?php
                                                }
                                                ?>
                                                </div>
                                                <div class="col-xs-offset-6 col-xs-6 col-md-offset-9 col-sm-offset-8 col-md-3 col-sm-4 omp text-center">
                                                    <a href="<?php echo base_url(); ?>Update-Carmela"><p style="transition: 2s;margin-left: 45px;margin-right: 10px;margin-top: -290px;visibility: hidden;height: 30px;padding: 3px;"><i class="fa fa-user" style="padding: 5px;color: #FFFFFF;" ></i>&nbsp;Update Profile</p></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <img src="<?php echo $images[0]->profile; ?>" class="img-thumbnail logopic"/>
                                    </div>
                                    <div class="col-md-9 col-xs-12 aaa">
                                        <p class="companyname"><?php echo $data[0]->name; ?></p>
                                    </div>
                                </section>
                            </div>
                            <div class="col-md-6 col-lg-12 col-xl-12" style="padding: 0px;">
                                <br/><br/>
                                <div class="tabs">
                                    <ul class="nav nav-tabs text-center tabs-primary">
                                        <li class="active col-xs-4 col-md-4 pp">
                                            <a href="#popular7" data-toggle="tab"><i class="fa fa-phone"></i> Contact Detail</a>
                                        </li>
                                        <li class="col-xs-4 col-md-4 pp">
                                            <a href="#recent7" data-toggle="tab"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;&nbsp;Location Detail</a>
                                        </li>
                                        <li class="col-xs-4 col-md-4 pp">
                                            <a href="#recent8" data-toggle="tab"><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;Owner Detail</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" style="text-transform: capitalize;">
                                        <div id="popular7" class=" tab-pane active tblseller">
                                            <table class="table-hover">
                                                <tr>
                                                    <td><b>Email Id</b></td>
                                                    <td style="text-transform: lowercase;"><?php echo $data[0]->email; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Contact</b></td>
                                                    <td><?php echo $data[0]->contact_no; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Join-Date</b></td>
                                                    <td><?php $c = $data[0]->join_date;
                                                              echo date('d-m-Y', strtotime($c));
                                                    ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div id="recent7" class="tab-pane">
                                            <table class="table-hover">
                                                <tr>
                                                    <td><b>State</b></td>
                                                    <td><?php echo $data[0]->state; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>City</b></td>
                                                    <td><?php echo $data[0]->city; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Area</b></td>
                                                    <td><?php echo $data[0]->area ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Landmark</b></td>
                                                    <td><?php echo $data[0]->landmark; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Address</b></td>
                                                    <td><?php echo $data[0]->address; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Pincode</b></td>
                                                    <td><?php echo $data[0]->pincode; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div id="recent8" class="tab-pane" style="height:251px;">
                                            <table class="table-hover">
                                                <tr>
                                                    <td><b>Owner Name</b></td>
                                                    <td><?php echo $data[0]->owner_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Contact No</b></td>
                                                    <td><?php echo $data[0]->owner_contact_no; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                           </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>


        </section>
        <?php
        $this->load->view('carmela/footer_script');
        ?>
    </body>
</html>