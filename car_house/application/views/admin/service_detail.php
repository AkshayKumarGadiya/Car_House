<!doctype html>
<html class="fixed">
    <title>Admin Panel - Car House</title>
    <?php
    $this->load->view('admin/header_link');
    ?>
    <style type="text/css">
        .col-md-12 .col-md-6
        {
            padding-left: 0px;
        }
        .sa
        {
            color: #000;
            font-size: 13px;
        }
    </style>
    <body style="background-color: #F6F6F6;">
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
                        <h2>Car Service Detail</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Admin-Home">
                                        <i class="fa fa-home" style="padding-right: 5px;font-size: 17px;margin-top: -4px"></i>
                                    </a>
                                </li>
                                <li><span style="padding-right: 25px;font-size: 13px;">Car Services</span></li>
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

                                            <h2 class="panel-title" style="color: #FFFFFF;">Car Services</h2>

                                        </header>
                                        <div class="panel-body">
                                            <section class="content-with-menu-has-toolbar media-gallery">
                                                <div class="">
                                                    <div class="">
                                                        <div class="row mg-files" data-sort-destination data-sort-id="media-gallery" style="padding: 15px;padding-bottom: 0px;">
                                                            <form method="post">
                                                            <?php
                                                            
                                                            foreach($service as $val)
                                                            {
                                                                $carname = $this->md->my_query("SELECT b.category_id , b.booking_id , c.category_id , c.image , cd.* FROM tbl_booking AS b , tbl_category AS c , tbl_car_detail AS cd WHERE b.category_id = c.category_id AND c.category_id = cd.model_id AND b.booking_id =".$val->booking_id);
                                                                if($val->status == 0)
                                                                {
                                                                ?>
                                                                <div class="isotope-item document col-sm-6 col-md-4 col-lg-4" style="padding: 5px;">
                                                                    <div class="thumbnail s-form" style="height: 405px;padding: 1px 1px;">
                                                                        <div class="">
                                                                            <a class="thumb-image">
                                                                                <img src="<?php echo base_url().$carname[0]->image; ?>" class="img-responsive" style="height: 167px;" alt="Project">
                                                                            </a>
                                                                        </div>
                                                                        <p class="mg-title text-weight-semibold" style="margin-top: 8px;margin-left: 3px;font-size: 15px;text-transform: capitalize;"><?php echo $carname[0]->carname; ?></p>
                                                                        <div class="col-md-12">
                                                                            <div class="col-md-6 sa">
                                                                                Pick & Drop
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <?php echo $val->pic_drop; ?>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                        $amount = $this->md->my_query("SELECT us.booking_id , us.position_id , sp.position_id , sp.service_id , s.* , b.pic_drop , b.booking_id FROM tbl_user_service AS us , tbl_service_position AS sp , tbl_service AS s , tbl_booking AS b WHERE us.booking_id = b.booking_id AND us.position_id = sp.position_id AND sp.service_id = s.service_id AND b.booking_id =".$val->booking_id);
                                                                        $t=0;
                                                                        foreach($amount as $v)
                                                                        {
                                                                            $t += $v->price;
                                                                        }
                                                                        ?>
                                                                        <div class="col-md-12">
                                                                            <div class="col-md-6 sa">
                                                                                Total Amount
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <?php if($service[0]->pic_drop == "Yes") { echo $t+100; } else { echo $t; } ?>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <textarea name="msg" placeholder="Enter Message" style="width: 88%;padding: 5px 5px;border: 1px solid #CBCBCB;margin-bottom:10px;margin-top:10px;margin-left: 12px;outline: none;border-radius: 5px;resize: none;"></textarea>
                                                                        
                                                                        <input type="date" name="rdate" value="<?php echo date('d-m-Y',strtotime($val->request_date)); ?>" style="width: 88%;padding: 5px 5px;border: 1px solid #CBCBCB;margin-bottom: 10px;margin-left: 12px;border-radius: 30px;">
                                                                        
                                                                        <button type="submit" name="add" value="Add" class="btn btnemail1" style="float:right;margin-right: 8px;"><i class="fa fa-paper-plane" style="font-size: 12px;"></i>Submit</button>
                                                                        <br/>
                                                                        <br/><br/>
                                                                        <?php
                                                                        if(isset($error))
                                                                        {
                                                                        ?>
                                                                        <div class="alert alert-danger alert-dismissable">
                                                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                            <?php
                                                                                echo $error;
                                                                            ?>
                                                                        </div>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                               }
                                                                else
                                                                {
                                                                ?>
                                                                    <div class="isotope-item document col-sm-6 col-md-4 col-lg-4" style="padding: 5px;">
                                                                        <div class="thumbnail s-form" style="height: 345px;padding: 1px 1px;">
                                                                            <div class="">
                                                                                <a class="thumb-image">
                                                                                    <img src="<?php echo base_url().$carname[0]->image; ?>" class="img-responsive" style="height: 167px;" alt="Project">
                                                                                </a>
                                                                            </div>
                                                                            
                                                                            <p class="mg-title text-weight-semibold" style="margin-top: 8px;margin-left: 3px;font-size: 15px;text-transform: capitalize;"><?php echo $carname[0]->carname; ?></p>
                                                                            <div class="col-md-12">
                                                                                <div class="col-md-6 sa">
                                                                                    Pick & Drop
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <?php echo $val->pic_drop; ?>
                                                                                </div>
                                                                            </div>
                                                                            <?php
                                                                            $amount = $this->md->my_query("SELECT us.booking_id , us.position_id , sp.position_id , sp.service_id , s.* , b.pic_drop , b.booking_id FROM tbl_user_service AS us , tbl_service_position AS sp , tbl_service AS s , tbl_booking AS b WHERE us.booking_id = b.booking_id AND us.position_id = sp.position_id AND sp.service_id = s.service_id AND b.booking_id =".$val->booking_id);
                                                                            $t=0;
                                                                            foreach($amount as $v)
                                                                            {
                                                                                $t += $v->price;
                                                                            }
                                                                            ?>
                                                                            <div class="col-md-12">
                                                                                <div class="col-md-6 sa">
                                                                                    Total Amount
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <?php if($service[0]->pic_drop == "Yes") { echo $t+100; } else { echo $t; } ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="col-md-6 sa">
                                                                                    Message
                                                                                </div>
                                                                                <div class="col-md-6 text-justify">
                                                                                    <?php echo ucwords($val->message."."); ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="col-md-6 sa">
                                                                                    Request Date
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <?php echo date('d-m-Y',strtotime($val->request_date)); ?>
                                                                                </div>
                                                                            </div>
                                                                            <?php
                                                                            if($val->status == 2)
                                                                            {
                                                                            ?>
                                                                            <button type="submit" name="add" value="Add" class="btn btnemail1" style="float:right;margin-right: 8px;margin-top: 10px;"><i class="fa fa-paper-plane" style="font-size: 12px;"></i>Confirm</button>
                                                                            <?php
                                                                            }
                                                                            else
                                                                            {
                                                                            ?>
                                                                            <button type="submit" name="add" value="Add" class="btn btnemail1 btn-danger" style="margin-top: 10px;float:right;margin-right: 8px;padding-left: 10px;">Not Confirm</button>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                <?php
                                                                }
                                                            }
                                                            ?>
                                                            </form>
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
$this->load->view('admin/footer_script');
?>
</body>
</html>
