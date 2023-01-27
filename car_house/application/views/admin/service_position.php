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
                                         Are You Sure You Want To Delete Car Service ?    
                                    </div>
                                    <br/>
                                    <br/>
                                    <div class="col-sm-12 col-xs-12 col-md-12 text-center">
                                        <a href="<?php echo base_url(); ?>Delete/positiondel/" id="cyes"><button type="button" class="btn pl-xl pr-xl" name="yes" value="yes" style="background-color: #FF6200;color: white;">Yes</button></a>
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
                        <h2>Manage Car Position</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Admin-Home">
                                        <i class="fa fa-home dashboard"></i>
                                    </a>
                                </li>
                                <li><span class="dashboardname">Manage Car Position</span></li>
                            </ol>
                        </div>
                    </header>
                    <div class="col-xl-12 col-md-12">
                        <section class="panel panel-transparent">
                            <div class="panel-body">
                                <section class="panel panel-group emaildisplay">
                                    <div id="accordion">
                                        <div class="panel panel-accordion panel-accordion-first">
                                            <div id="collapse1One" class="accordion-body collapse in">
                                                <div class="panel-body " id="" >
                                                    <div class="settag" id="changeimg">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="col-xl-12 col-xs-12 col-lg-12 col-md-12">
                                    <section class="panel">
                                        <div class="panel-body">
                                            <div class="table-responsive" style="overflow-x: unset;" >
                                                <table class="table table-striped text-center nova-pagging" >
                                                    <thead>
                                                        <tr>
                                                            <th nova-search="yes">No</th>
                                                            <th nova-search="yes">Car Type</th>
                                                            <th nova-search="yes">Car Company</th>
                                                            <th nova-search="yes">Car Model</th>
                                                            <th nova-search="yes">Image</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $i = 0;
                                                            foreach ($display as $val) 
                                                            {
                                                                $i++;
                                                        ?>
                                                            <tr>
                                                                <td style="width:5%"><?php echo $i; ?></td>
                                                                <td><?php echo $val->cartype; ?></td>
                                                                <td><?php echo $val->companyname; ?></td>
                                                                <td><?php echo $val->category_name; ?></td>
                                                                <td><img src="<?php base_url();echo $val->image; ?>" onclick="image(<?php echo $val->category_id; ?>,'changeimg');" style="height: 80px;width: 150px;" /></td>
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
            function image(id,action)
            {
                var d = {id:id,action:action};
                var url = base + 'Ajax/' + action;

                $.post(url,d,function(ans)
                {
                   $("#"+action).html(ans);
                });
            }
            
            paging(1);
        </script>
    </body>
</html>