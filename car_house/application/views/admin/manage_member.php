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
                        <h2>Manage Member</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Admin-Home">
                                        <i class="fa fa-home dashboard"></i>
                                    </a>
                                </li>
                                <li><span class="dashboardname">Manage Member</span></li>
                            </ol>
                        </div>
                    </header>

                    <div class="col-md-12">
                            <section class="panel">
                                <div class="panel-body">
                                    <div class="table-responsive" style="overflow-x: unset;" >
                                        <table class="table table-striped text-center nova-pagging" >
                                            <thead>
                                                <tr>
                                                    <th nova-search="yes">No</th>
                                                    <th nova-search="yes">Provider</th>
                                                    <th nova-search="yes">Profile Pics</th>
                                                    <th nova-search="yes">Name</th>
                                                    <th nova-search="yes">Email</th>
                                                    <th nova-search="yes">Contact</th>
                                                    <th nova-search="no">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=0;
                                                foreach($detail as $val)
                                                {
                                                    $i++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $val->a_provider; ?></td>
                                                    <?php
                                                    if($val->profile_pic != "")
                                                    {
                                                    ?>
                                                    <td><img src="<?php echo base_url().$val->profile_pic; ?>" class="img-circle" style="width: 60px;height: 60px;"></td>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                    <td><img src="<?php echo base_url(); ?>user_asset/images/user-blank.png" class="img-circle" style="width: 60px;height: 60px;"></td>
                                                    <?php
                                                    }
                                                    ?>
                                                    <td><?php echo $val->name; ?></td>
                                                    <td style="text-transform: lowercase;"><?php echo $val->email; ?></td>
                                                    <td><?php if($val->contact_no != "") { echo $val->contact_no; } else { echo "Not Specified"; } ?></td>
                                                    <?php
                                                    if($val->status == 0)
                                                    {
                                                    ?>
                                                    <td><i id="<?php echo $val->registration_id; ?>" onclick="toggle(this.id,'userstatus');" class="fa fa-toggle-off toggle2" title="Active"></i></td>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                    <td><i id="<?php echo $val->registration_id; ?>" onclick="toggle(this.id,'userstatus');" class="fa fa-toggle-on toggle2" title="Deactive"></i></td>
                                                    <?php
                                                    }
                                                    ?>
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
        <script src="<?php echo base_url(); ?>assets/javascripts/set.js" type="text/javascript"></script>
    </body>
</html>

