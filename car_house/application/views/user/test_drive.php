<!doctype html>
<html class="fixed">
    <title>Member Panel - Car House</title>
    <?php
    $this->load->view('user/header_link');
    ?>
    <body>
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
                        <h2>My Review</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Dashboard">
                                        <i class="fa fa-home" style="padding-right: 5px;font-size: 17px;margin-top: -4px"></i>
                                    </a>
                                </li>
                                <li><span style="padding-right: 25px;font-size: 13px;">My Review</span></li>
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
                                                <th nova-search="yes">Carmela Name</th>
                                                <th nova-search="yes">Car Image</th>
                                                <th nova-search="yes">Car Name</th>
                                                <th nova-search="yes">Date</th>
                                                <th nova-search="yes">Time</th>
                                                <th nova-search="no">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody style="text-transform: capitalize;">
                                            <?php
                                            $i = 0;
                                            foreach($usertest as $val)
                                            {
                                                $a = $this->md->my_select('tbl_carmela',array('carmela_id'=>$val->carmela_id));
                                                $b = $this->md->my_select('tbl_car_image',array('car_id'=>$val->car_id))[0]->path;
                                                $c = $this->md->my_select('tbl_car_detail',array('car_id'=>$val->car_id));
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $a[0]->name; ?></td>
                                                    <td><img src="<?php echo base_url().$b; ?>" style="width: 105px;height: 78px;"></td>
                                                    <td><?php echo $c[0]->carname; ?></td>
                                                    <td><?php echo date('d-m-Y',strtotime($val->date)); ?></td>
                                                    <td><?php echo $val->time; ?></td>
                                                    <td>
                                                        <?php
                                                        if($val->status == 1)
                                                        {
                                                        ?>
                                                            <button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-success" style="width: 65px;">Confirm</button>
                                                        <?php
                                                        }
                                                        elseif($val->status == 0)
                                                        {
                                                        ?>
                                                            <button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-danger" style="width: 65px;">Waiting</button>
                                                        <?php
                                                        }
                                                        elseif($val->status == 2)
                                                        {
                                                        ?>
                                                            <button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-warning" style="width: 65px;">Complete</button>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
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
        $this->load->view('user/footer_script');
        ?>
        <script type="text/javascript">
            $id1 = "";
            $('.layer').click(function(){
                $id1 = $("#cyes").attr('href');
                $id2 = $id1 + $(this).attr("id");
                $("#cyes").attr("href",$id2);
                $("#wish").fadeIn(500);
            });
            $('#btncls').click(function(){
                $(".backdiv").fadeOut(500);
                $("#cyes").attr('href',$id1);
            });
            
            paging(1);
        </script>
    </body>
</html>