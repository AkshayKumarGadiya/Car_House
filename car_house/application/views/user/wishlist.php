<!doctype html>
<html class="fixed">
    <title>Member Panel - Car House</title>
    <?php
    $this->load->view('user/header_link');
    ?>
    <style type="text/css">
        
        /* layer */

        .backdiv
        {
            background: rgba(0,0,0,0.7);
            height: 100%;
            width: 100%;
            display: none;
            position: fixed;
            z-index: 9999;

        }
        .contentdiv
        {
            display: table;
            height: 100vh;
            margin: 0 auto;
            max-width: 497px;
            padding: 17% 4%;
            width: 50%;
        }
        @media(max-width:600px){
            .contentdiv {
            display: table;
            height: 100vh;
            margin: 0 auto;
            max-width: 497px;
            padding: 75% 0%;
            width: 94%;
        }
        }
    </style>
    <body>
        <section class="body">
            <div class="row">
               <div class="col-md-12 col-xs-12">
                   <div class="backdiv" id="wish">
                       <section class="contentdiv">
                           <div class="panel">
                               <div class="panel-heading alert-default " style="background-color: #FF6200;height: 44px;">
                                   <h6 class="panel-title" style="color:white;margin-top: -6px;"><i class="fa fa-warning delete" style="font-size: 20px;"></i>&nbsp;&nbsp;Confirm</h6>
                               </div>
                               <div class="panel-body">
                                   <div class="col-sm-12 col-xs-12 col-md-12 text-justify text-center">
                                        Are You Sure You Want To Delete Car Wish ?    
                                   </div>
                                   <br/>
                                   <br/>
                                   <div class="col-sm-12 col-xs-12 col-md-12 text-center">
                                       <a href="<?php echo base_url(); ?>Del/wish/" id="cyes"><button type="button" class="btn pl-xl pr-xl" name="yes" value="yes" style="background-color: #FF6200;color: white;">Yes</button></a>
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
                        <h2>My Wishlist</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Dashboard">
                                        <i class="fa fa-home" style="padding-right: 5px;font-size: 17px;margin-top: -4px"></i>
                                    </a>
                                </li>
                                <li><span style="padding-right: 25px;font-size: 13px;">My Wishlist</span></li>
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
                                                <th nova-search="yes">Price</th>
                                                <th nova-search="yes">View Detail</th>
                                                <th nova-search="no">Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach($wish as $single)
                                            {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <?php
                                                    $img = $this->md->my_select('tbl_car_image',array('car_id'=>$single->car_id));
                                                    $car = $this->md->my_select('tbl_car_detail',array('car_id'=>$img[0]->car_id));
                                                    ?>
                                                    <td><img src="<?php echo base_url().$img[0]->path; ?>" style="width: 140px;height: 78px;"</td>
                                                    
                                                    <td><?php echo ucwords($car[0]->carname); ?></td>
                                                    <td><?php echo $car[0]->price; ?></td>
                                                    <td><a href="<?php echo base_url(); ?>Car-Detail/<?php echo $single->car_id; ?>" style="color: #FF6200;">View More Detail</a></td>
                                                    <td><i id='<?php echo $single->wish_id; ?>' class="fa fa-trash trash layer" style="font-size: 15px;" title="Remove" ></i></td>
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