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
                                        Are You Sure You Want To Delete Carmela Review ?    
                                   </div>
                                   <br/>
                                   <br/>
                                   <div class="col-sm-12 col-xs-12 col-md-12 text-center">
                                       <a href="<?php echo base_url(); ?>Delete/caemelare/" id="cyes"><button type="button" class="btn pl-xl pr-xl" name="yes" value="yes" style="background-color: #FF6200;color: white;">Yes</button></a>
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
                        <h2>Manage Carmela Review</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Admin-Home">
                                        <i class="fa fa-home dashboard"></i>
                                    </a>
                                </li>
                                <li><span class="dashboardname">Manage Carmela Review</span></li>
                            </ol>
                        </div>
                    </header>

                    <div class="col-md-12">
                            <section class="panel">
                                <div class="panel-body">
                                    <div class="table-responsive" style="overflow-x: unset;">
                                        <table class="table table-striped text-center nova-pagging" >
                                            <thead>
                                                <tr>
                                                    <th nova-search="yes">No</th>
                                                    <th nova-search="yes">Carmela Image</th>
                                                    <th style="width: 110px;" nova-search="yes">User Profile</th>
                                                    <th style="width: 86px;" nova-search="yes">User Name</th>
                                                    <th nova-search="yes">Review</th>
                                                    <th nova-search="yes">Date</th>
                                                    <th nova-search="no">Status</th>
                                                    <th nova-search="no">Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=0;
                                                foreach($carmelareview as $val)
                                                {
                                                    $i++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><img src="<?php echo base_url().$val->profile; ?>" style="width: 110px;height: 70px;"></td>
                                                    <?php
                                                    if($val->profile_pic != "")
                                                    {
                                                    ?>
                                                    <td><img src="<?php echo base_url().$val->profile_pic; ?>" class="img-circle" style="width: 75px;height: 75px;"></td>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                    <td><img src="<?php echo base_url(); ?>user_asset/images/user-blank.png" class="img-circle" style="width: 75px;height: 75px;"></td>
                                                    <?php
                                                    }
                                                    ?>
                                                    <td><?php echo $val->aaa; ?></td>
                                                    <td><?php echo $val->review; ?></td>
                                                    <td style="width:10%;"><?php echo date('d-m-Y',strtotime($val->date)); ?></td>
                                                    <?php
                                                    if($val->a == 1)
                                                    {
                                                    ?>
                                                    <td><i class="fa fa-toggle-on" id="<?php echo $val->review_id; ?>" onclick="toggle(this.id,'carr');" style="width: 53px;color: #FF6200;font-size: 18px;" title="Active"></i></td>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                    <td><i class="fa fa-toggle-off" id="<?php echo $val->review_id; ?>" onclick="toggle(this.id,'carr');" style="width: 53px;color: #FF6200;font-size: 18px;" title="Active"></i></td>
                                                    <?php
                                                    }
                                                    ?>
                                                    <td><i id='<?php echo $val->review_id; ?>' class="fa fa-trash trash layer" title="Remove" ></i></td>
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
    </body>
</html>
<script type="text/javascript">
    paging(1);
</script>