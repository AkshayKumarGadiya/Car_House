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
                        <h2>My Car</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Carmela-Home">
                                        <i class="fa fa-home" style="padding-right: 5px;font-size: 17px;margin-top: -4px"></i>
                                    </a>
                                </li>
                                <li><span style="padding-right: 25px;font-size: 13px;">My Car</span></li>
                            </ol>
                        </div>
                    </header>

                    <!-- start: page -->
                    <div class="container-fluid">
                        <section class="panel">
                            <div class="row">
                                <div class="col-md-12">
                                    <section class="panel">
                                        <header class="panel-heading" style="background-color: #3F4557;">
                                            <div class="panel-actions">
                                                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                            </div>

                                            <h2 class="panel-title" style="color: #FFFFFF;">My Car Images</h2>

                                        </header>
                                        <div class="panel-body">
                                            <section class="content-with-menu-has-toolbar media-gallery">
                                                <div class="">
                                                    <div class="">
                                                        <div class="row mg-files" data-sort-destination data-sort-id="media-gallery" style="padding: 15px;padding-bottom: 0px;">
                                                            <?php
                                                            foreach($dis as $val)
                                                            {
                                                            ?>
                                                            <div class="isotope-item document col-sm-6 col-md-4 col-lg-4" style="padding: 2px;">

                                                                    <div class="thumbnail" style="height: 215px;padding: 1px 1px;">
                                                                        <div class="thumb-preview">
                                                                            <a class="thumb-image">
                                                                                <?php
                                                                                $ii = $this->md->my_select('tbl_car_image', array('car_id' => $val->car_id))[0]->path;
                                                                                ?>
                                                                                <img src="<?php echo base_url().$ii; ?>" class="img-responsive" style="height: 167px;" alt="Project">
                                                                            </a>
                                                                            <div class="mg-thumb-options">
                                                                                <div class="mg-toolbar">
                                                                                    <div class="mg-toolbar">
                                                                                        <div class="mg-option my1">
                                                                                            <a href="<?php echo base_url(); ?>View-Car-Detail/<?php echo $val->car_id; ?>" style="color: #FFFFFF;"><i class="fa fa-car"></i>&nbsp;View</a>
                                                                                        </div>
                                                                                        <div class="mg-group pull-right">
                                                                                            <a href="#"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
                                                                                            <a href="#"><i class="fa fa-trash"></i>&nbsp;Remove</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <p class="mg-title text-weight-semibold" style="margin-top: 8px;margin-left: 3px;font-size: 12px;text-transform: capitalize;"><?php echo $val->carname; ?></p>
                                                                        <?php
                                                                        if($val->status == 1)
                                                                        {
                                                                        ?>
                                                                        <h5 class="mg-title text-weight-semibold pull-right"><button type="button" class="btn btn-success btn-sm success1">Verify</button></h5>
                                                                        <?php
                                                                        }
                                                                        else
                                                                        {
                                                                            if($val->del_status == 1)
                                                                            {
                                                                        ?>
                                                                        <h5 class="mg-title text-weight-semibold pull-right"><button type="button" class="btn btn-danger btn-sm success1">Deleted</button></h5>
                                                                        <?php
                                                                            }
                                                                            else
                                                                            {
                                                                        ?>      
                                                                        <h5 class="mg-title text-weight-semibold pull-right"><button type="button" class="btn btn-danger btn-sm success1">Not Verify</button></h5>   
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>

                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
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
</body>
</html>
