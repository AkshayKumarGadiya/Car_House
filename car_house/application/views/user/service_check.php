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
                        <h2>Service</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Dashboard">
                                        <i class="fa fa-home" style="padding-right: 5px;font-size: 17px;margin-top: -4px"></i>
                                    </a>
                                </li>
                                <li><span style="padding-right: 25px;font-size: 13px;">Service</span></li>
                            </ol>
                        </div>
                    </header>
                    <div class="panel-body">
                        <label style="font-size: 16px;font-weight: bold;margin-left: 12px;">Car Image</label>
                        <div style="position: relative;">
                            <?php
                            $img = $this->md->my_select('tbl_booking', array('booking_id'=>$this->uri->segment(2)));
                            $path = $this->md->my_select('tbl_category', array('category_id' => $img[0]->category_id));

                            $servicedetail = $this->md->my_query("SELECT sp.* , us.position_id , us.status , s.* FROM tbl_service_position AS sp , tbl_user_service AS us , tbl_service AS s WHERE '" . $path[0]->category_id . "' = sp.category_id AND sp.service_id = s.service_id AND sp.position_id = us.position_id");
                            ?>
                            <img src="<?php echo base_url() . $path[0]->image; ?>" style="width:797px;height:350px ;"/>
                            <?php
                                                                                            
                                foreach($servicedetail as $se)
                                {
                            ?>

                            <div title="<?php echo $se->name; ?>" style="position: absolute;top:<?php echo $se->y_position; ?>%;left:<?php echo $se->x_position; ?>%;width: 10px;height:10px;border-radius: 100%;<?php if($se->status == 0) { echo 'background: red'; } elseif($se->status == 1) { echo 'background:yellow'; } else { echo 'background:green'; }?>"></div>


                                   <?php 
                                }
                            ?>
                        </div>
                        <br/><br/>
                        <div class="col-md-6 b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
                            <label style="font-size: 16px;font-weight: bold;">Service Status</label>
                                <div class='s-relative s-form'>
                                    <table class="table" >
                                        <thead>
                                            <tr>
                                                <th nova-search="yes">Pending</th>
                                                <th nova-search="yes">Running</th>
                                                <th nova-search="yes">Complete</th>
                                                <th nova-search="yes">Car Service Name</th>
                                            </tr>
                                        </thead>
                                        <tbody class="servicestate">
                                            
                                       </tbody>
                                    </table>
                                </div>
                        </div>
                        <div class="col-md-12">
                            <?php
                            if($servicedetail[0]->status == 2)
                            {
                            ?>  
                            <br/>
                            <a href="<?php echo base_url(); ?>Payment/<?php echo $this->uri->segment(2); ?>"><button type="button" class="btn" name="payment" value="MAKE A PAYMENT" style="border-radius: 20px;background-color: #FF6200;color: white;font-size: 13px;">MAKE A PAYMENT&nbsp;&nbsp;<i class="fa fa-angle-right" style="margin-top: 0px;border-radius: 50%;width: 23px;margin-left: 5px;margin-right: -5px;padding: 4px;background-color: #FFFFFF;color: #000;font-size: 13px;"></i></button></a>
                            <a href='<?php echo base_url(); ?>Car-Service-Confirm'><button type="button" class="btn" name="Go" value="NO" style="border-radius: 20px;background-color: #FF6200;color: white;font-size: 13px;">BACK&nbsp;&nbsp;<i class="fa fa-angle-left" style="margin-top: 0px;border-radius: 50%;width: 23px;margin-left: 5px;margin-right: -5px;padding: 4px;background-color: #FFFFFF;color: #000;font-size: 13px;"></i></button></a>
                            <?php
                            }
                            if($servicedetail[0]->status == 0 || $servicedetail[0]->status == 1)
                            {
                            ?>
                                <br/>
                                <button type="submit" class="btn" name="Go" value="NO" style="border-radius: 20px;background-color: #FF6200;color: white;font-size: 13px;">BACK&nbsp;&nbsp;<i class="fa fa-angle-left" style="margin-top: -1px;border-radius: 50%;width: 23px;margin-left: 5px;margin-right: -5px;padding: 4px;background-color: #FFFFFF;color: #000;font-size: 13px;"></i></button>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </section>
            </div>
        </section>

        <?php
        $this->load->view('user/footer_script');
        ?>
        
    </body>
</html>
<script>
    var x= setInterval(function() {
        servicestate(<?php echo $this->uri->segment(2); ?>);
    },100);
            
        </script>