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
                        <h2>My Car Review</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Carmela-Home">
                                        <i class="fa fa-home" style="padding-right: 5px;font-size: 17px;margin-top: -4px"></i>
                                    </a>
                                </li>
                                <li><span style="padding-right: 25px;font-size: 13px;">My Car Review</span></li>
                            </ol>
                        </div>
                    </header>

                    <div class="col-md-12">
                        <section class="panel">
                            <div class="panel-body">
                                <div class="table-responsive" style="overflow-x: unset;">
                                    <table class="table table-striped tbl wraped nova-pagging" >
                                        <thead>
                                            <tr>
                                                <th nova-search="yes">No</th>
                                                <th nova-search="yes">Car Image</th>
                                                <th nova-search="yes">Car Name</th>
                                                <th nova-search="yes">User Name</th>
                                                <th nova-search="yes">Review</th>
                                                <th nova-search="no">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach($carreview as $val)
                                            {
                                                $i++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <?php
                                                    $ii = $this->md->my_select('tbl_car_image',array('car_id'=>$val->car_id));
                                                    ?>
                                                    <td width="20%"><img src="<?php echo base_url().$ii[0]->path; ?>" style="width: 140px;height: 78px;"</td>
                                                    <td width="10%"><?php echo ucwords($val->carname); ?></td>
                                                    <td width="10%"><?php echo ucwords($val->name); ?></td>
                                                    
                                                    <td width="40%"><?php echo ucwords($val->review); ?></td>
                                                    <?php
                                                    if($val->status == 1)
                                                    {
                                                    ?>
                                                    <td><button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-success" style="width: 55px;">Verify</button></td>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                        if($val->del_status == 1)
                                                        {
                                                    ?>
                                                    <td><button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-warning" style="width: 55px;">Deleted</button></td>
                                                    <?php
                                                        }
                                                        else
                                                        {
                                                    ?>
                                                    <td><button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-danger" style="width: 65px;">Not Verify</button></td>
                                                    <?php
                                                        }
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
        $this->load->view('carmela/footer_script');
        ?>
        <script type="text/javascript">
            paging(1);
        </script>
    </body>
</html>