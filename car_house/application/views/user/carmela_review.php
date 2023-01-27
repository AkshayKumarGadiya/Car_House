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
                                        Are You Sure You Want To Delete Carmela Review ?    
                                   </div>
                                   <br/>
                                   <br/>
                                   <div class="col-sm-12 col-xs-12 col-md-12 text-center">
                                       <a href="<?php echo base_url(); ?>Del/carmelareview/" id="cyes"><button type="button" class="btn pl-xl pr-xl" name="yes" value="yes" style="background-color: #FF6200;color: white;">Yes</button></a>
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
                        <h2>My Carmela Review</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Dashboard">
                                        <i class="fa fa-home" style="padding-right: 5px;font-size: 17px;margin-top: -4px"></i>
                                    </a>
                                </li>
                                <li><span style="padding-right: 25px;font-size: 13px;">My Carmela Review</span></li>
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
                                                <th nova-search="yes">Carmela Image</th>
                                                <th nova-search="yes">Carmela Name</th>
                                                <th nova-search="yes">Review</th>
                                                <th nova-search="yes">Date-Time</th>
                                                <th nova-search="no">Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach($carmelareview as $val)
                                            {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td style="width:5%"><?php echo $i; ?></td>
                                                    <?php
                                                    $img = $this->md->my_select('tbl_carmela',array('carmela_id'=>$val->carmela_id));
                                                    ?>
                                                    <td style="width: 18%"><img src="<?php echo base_url().$img[0]->profile; ?>" style="width: 110px;height: 75px;"></td>
                                                    <td style="width: 15%;"><?php echo $img[0]->name; ?></td>
                                                    <td style="width: 40%"><?php echo $val->review; ?></td>
                                                    <td style="width: 18%"><?php echo date('d-m-Y h:i:s',strtotime($val->date)); ?></td>
                                                    <td><i id="<?php echo $val->review_id; ?>" class="fa fa-trash trash layer" style="font-size: 15px;" title="Remove"></i></td>
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