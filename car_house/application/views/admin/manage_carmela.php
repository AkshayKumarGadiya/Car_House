<!doctype html>
<html class="fixed">
    <?php
        $this->load->view('admin/header_link');
    ?>
    <body style="background-color: #F2F2F2;">
        <section class="body">
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
                        <h2>Manage Carmela</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Admin-Home">
                                        <i class="fa fa-home dashboard"></i>
                                    </a>
                                </li>
                                <li><span class="dashboardname">Manage Carmela</span></li>
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
                                                    <th nova-search="yes">Profile Pics</th>
                                                    <th nova-search="yes">Name</th>
                                                    <th nova-search="yes">Email</th>
                                                    <th nova-search="yes">Contact No</th>
                                                    <th nova-search="yes">City</th>
                                                    <th nova-search="no">Status</th>
                                                    <th nova-search="no">Visit Profile</th>
                                                </tr>
                                            </thead>
                                            <tbody style="text-transform: lowercase;">
                                                <?php
                                                $i=0;
                                                foreach($carmela as $val)
                                                {
                                                    $i++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><img src="<?php echo $val->profile; ?>" class="img-circle" style="width:50px;height: 50px;"</td>
                                                    <td><?php echo $val->name; ?></td>
                                                    <td style="text-transform: lowercase;"><?php echo $val->email; ?></td>
                                                    <td><?php echo $val->owner_contact_no; ?></td>
                                                    <td><?php
                                                        $c = $val->location_id;
                                                        $cc = $this->md->my_select('tbl_location',array('location_id'=>$c));
                                                        $ccc = $this->md->my_select('tbl_location',array('location_id'=>$cc[0]->parent_id));
                                                        $cccc = $this->md->my_select('tbl_location',array('location_id'=>$ccc[0]->parent_id));
                                                        echo $cccc[0]->name;
                                                    ?></td>
                                                    <?php
                                                    if($val->status == 0)
                                                    {
                                                    ?>
                                                        <td><i id="<?php echo $val->carmela_id; ?>" class="fa fa-toggle-off toggle2" onclick="toggle(this.id,'carmela');" title="Deactive"/></i></td>
                                                    <?php
                                                    }
                                                    if($val->status == 1)
                                                    {
                                                    ?>
                                                        <td><i id="<?php echo $val->carmela_id; ?>" class="fa fa-toggle-on toggle2" onclick="toggle(this.id,'carmela');" title="Active"/></i></td>
                                                   <?php
                                                    }
                                                    ?>
                                                    
                                                        <td><a href="<?php echo base_url(); ?>Carmela-Detail/<?php echo $val->carmela_id; ?>" style="color: #FF6200;">More Details</a></td>
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
<script src="<?php echo base_url(); ?>assets/javascripts/set.js" type="text/javascript"></script>