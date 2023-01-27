<!doctype html>
<html class="fixed">
    <?php
    $this->load->view('admin/header_link');
    ?>
    <body style="background-color: #F2F2F2;">
        <section class="body">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="backdiv">
                        <section class="contentdiv">
                            <div class="panel">
                                <div class="panel-heading alert-default " style="background-color: #FF6200;height: 44px;">
                                    <h6 class="panel-title" style="color:white;margin-top: -6px;"><i class="fa fa-warning delete" style="font-size: 20px;"></i>&nbsp;&nbsp;Confirm</h6>
                                </div>
                                <div class="panel-body">
                                    <div class="col-sm-12 col-xs-12 col-md-12 text-justify text-center">
                                        Are You Sure You Want To Delete Car ?    
                                    </div>
                                    <br/>
                                    <br/>
                                    <div class="col-sm-12 col-xs-12 col-md-12 text-center">
                                        <a href="<?php echo base_url(); ?>Delete/product/" id="cyes"><button type="button" class="btn pl-xl pr-xl" name="yes" value="yes" style="background-color: #FF6200;color: white;">Yes</button></a>
                                        <button type="button" class="btn btn-primary pl-xl pr-xl" name="close" id="btncls" style="background-color: #FF6200;">No</button>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <!-- start: header -->
            <?php
            $this->load->view('admin/header');
            ?>  
            <!-- end: header -->

            <div class="inner-wrapper">
                <!-- start: sidebar -->
                <aside id="sidebar-left" class="sidebar-left">

                    <?php
                    $this->load->view('admin/menu');
                    ?>
                </aside>
                <!-- end: sidebar -->

                <section role="main" class="content-body">
                    <header class="page-header">
                        <h2>Manage Car Detail</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Admin-Home">
                                        <i class="fa fa-home dashboard"></i>
                                    </a>
                                </li>
                                <li><span class="dashboardname">Manage Car Detail</span></li>
                            </ol>
                        </div>
                    </header>

                    <div class="col-md-12">
                        <section class="panel">
                            <div class="panel-body">
                                <div class="table-responsive" style='overflow-x: unset;'>
                                    <table class="table table-striped text-center nova-pagging" >
                                        <thead>
                                            <tr>
                                                <th nova-search="yes">No</th>
                                                <th nova-search="yes">Carmela Name</th>
                                                <th nova-search="yes">Car Name</th>
                                                <th nova-search="yes">Carmela Image</th>
                                                <th nova-search="yes">Price</th>
                                                <th nova-search="no">Status</th>
                                                <th nova-search="no">Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($cardata as $val) {
                                                $i++;
                                                ?>
                                                <tr>


                                                    <td style="width:5%"><?php echo $i; ?></td>
                                                    <td><?php echo $val->name; ?></td>
                                                    <td><?php echo $val->carname; ?></td>
                                                    <td>
                                                        <?php
                                                        $ii = $this->md->my_select('tbl_car_image', array('car_id' => $val->car_id))[0]->path;
                                                        ?>
                                                        <img src="<?php echo base_url().$ii; ?>" style="width: 140px;height: 78px;"</td>
                                                    <td><?php echo $val->price; ?></td>
                                                    <?php
                                                    if ($val->status == 0) {
                                                        ?>
                                                        <td style="width:5%"><i class="fa fa-toggle-off toggle2" id="<?php echo $val->car_id; ?>" onclick="toggle(this.id, 'cardetailstatus');"  title="Deactive"></i></td>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <td style="width:5%"><i class="fa fa-toggle-on toggle2" id="<?php echo $val->car_id; ?>" onclick="toggle(this.id, 'cardetailstatus');" title="Active"></i></td>
                                                        <?php
                                                    }
                                                    ?>
                                                    <td style="width:5%"><i id='<?php echo $val->car_id; ?>' class="fa fa-trash trash layer" title="Remove" style="color: #76768F;"></i></td>
                                                </tr>
                                                    <?php
                                                }
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>
                </section>
            </div>
        </section>
        <?php
        $this->load->view('admin/footer_script');
        ?>
        <script type="text/javascript">
            paging(1);
        </script>
    </body>
</html>