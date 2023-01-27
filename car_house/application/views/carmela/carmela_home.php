<!doctype html>
<html class="fixed">
    <title>Carmela Panel - Car House</title>
    <?php
    $this->load->view('carmela/header_link');
    ?>
    <style>
        .summary-icon{
            background-color: #FF6200;
        }
        .panel-body
        {
            border:1px solid #F2F2F2;
        }
        .text-muted 
        {
            cursor: pointer;
        }
    </style>
    <body>
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
                        <h2>Dashboard</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Dashboard">
                                        <i class="fa fa-home" style="padding-right: 5px;font-size: 17px;margin-top: -4px"></i>
                                    </a>
                                </li>
                                <li><span style="padding-right: 25px;font-size: 13px;">Dashboard</span></li>
                            </ol>
                        </div>
                    </header>
                    <?php
                    $allcar = $this->md->my_query("select count(*) as c from tbl_car_detail where carmela_id=".$this->session->userdata("carmela"))[0]->c;
                    $activecar = $this->md->my_query("select count(*) as c from tbl_car_detail where status = 1 and del_status = 0 and carmela_id=".$this->session->userdata('carmela'))[0]->c;
                    $pendingcar = $this->md->my_query("select count(*) as c from tbl_car_detail where status = 0 and del_status = 0 and carmela_id=".$this->session->userdata('carmela'))[0]->c;
                    $allreview = $this->md->my_query("select count(*) as c from tbl_carmela_review where carmela_id=".$this->session->userdata('carmela'))[0]->c;
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>

                                    <h2 class="panel-title">Car Details</h2>

                                </header>
                                <div class="panel-body">
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <section class="panel panel-featured-left panel-featured-warning">
                                            <div class="panel-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-primary">
                                                            <i class="fa fa-car"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">All Car</h4>
                                                            <div class="info">
                                                                <strong class="amount allcar"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a href="<?php echo base_url(); ?>View-All-Car" class="text-muted text-uppercase">view all</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <section class="panel panel-featured-left panel-featured-warning">
                                            <div class="panel-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-primary">
                                                            <i class="fa fa-car"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Active Car</h4>
                                                            <div class="info">
                                                                <strong class="amount activecar"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a class="text-muted text-uppercase">view all</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6" >
                                        <section class="panel panel-featured-left panel-featured-warning">
                                            <div class="panel-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-primary">
                                                            <i class="fa fa-car"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">Pending Car</h4>
                                                            <div class="info">
                                                                <strong class="amount pendingcar"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a class="text-muted text-uppercase">view all</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-md- col-lg-6 col-xl-6">
                                        <section class="panel panel-featured-left panel-featured-warning">
                                            <div class="panel-body">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon bg-primary">
                                                            <i class="fa fa-list"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title">All Reviews</h4>
                                                            <div class="info">
                                                                <strong class="amount allreview"></strong>
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a class="text-muted text-uppercase">view all</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
            </div>


        </section>
        
        <?php
        $this->load->view('carmela/footer_script');
        ?>
        <?php
        if($this->session->userdata('carmela'))
        {
            $data = $this->md->my_select('tbl_carmela',array('carmela_id'=>$this->session->userdata('carmela')));
        ?>
        <script type="text/javascript">
            toastr.success("Welcome to , <?php echo $data[0]->name; ?>");
        </script>
        <?php
        }
        ?>
        <script>
            
            function cardash(c,action,cnt)
            {
                    var cc = setInterval(function() {
                    $("."+action).text(c);
                    c++;
                    if(c > cnt)
                    {
                        clearInterval(cc);
                    }
                },100);

            }
        
            cardash(0,'allcar',<?php echo $allcar; ?>);
            cardash(0,'activecar',<?php echo $activecar; ?>);
            cardash(0,'pendingcar',<?php echo $pendingcar; ?>);
            cardash(0,'allreview',<?php echo $allreview; ?>);
        </script>
    </body>
</html>