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
                        <h2>Add New Car</h2>
                        
                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Carmela-Home">
                                        <i class="fa fa-home" style="padding-right: 5px;font-size: 17px;margin-top: -4px"></i>
                                    </a>
                                </li>
                                <li><span style="padding-right: 25px;font-size: 13px;">Add New Car</span></li>
                            </ol>
                        </div>
                    </header>

                    <!-- start: page -->
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <section class="panel">
                                <div class="panel-body">
                                    <div class="row">
                                        <form method="post" novalidate="" class="my-form" enctype="multipart/form-data">
                                        <div class="col-lg-6 col-md-6 col-xs-12">
                                            <p style="font-size: 15px;font-weight: bold;">Add Car Image</p>
                                            
                                                <?php
                                                if($this->session->userdata('lastcar') !="")
                                                {
                                                    $data = $this->md->my_select('tbl_car_detail',array('car_id'=>$this->session->userdata('lastcar')))[0];
                                                ?>
                                                <br/>
                                                <input type="text" placeholder="<?php echo $data->carname; ?>" value="<?php echo $data->carname; ?>" name="carname" class="form-control input-md" readonly=""/>
                                                <br/>    
                                                <?php
                                                }
                                                else
                                                {
                                                    $allcar = $this->md->my_select('tbl_car_detail',array('carmela_id'=>$this->session->userdata('carmela')));
                                                ?>
                                                <select name="carname" required="" id="n" style="width:100%;background-color: #FFFFFF;">
                                                    <option value="">Select Car Name</option>
                                                    <?php
                                                       foreach($allcar as $val)
                                                       {
                                                    ?>
                                                    <option value="<?php echo $val->car_id; ?>"
                                                            <?php
                                                                if(set_select('carname',$val->car_id))
                                                                {
                                                                    echo "selected";
                                                                }
                                                            ?>
                                                            ><?php echo $val->carname; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <p class="errmsg"><?php echo form_error('carname'); ?></p>
                                                <?php
                                                }
                                                ?>
                                                <select name="carimagetype" onchange="show(n.value,m.value)" id="m" required="" style="width:100%;background-color: #FFFFFF;">
                                                    <option value="">Car Image Type</option>
                                                    <option value="front" <?php if(set_select('carimagetype','front')) { echo "selected"; } ?>>Front</option>
                                                    <option value="rear" <?php if(set_select('carimagetype','rear')) { echo "selected"; } ?>>Rear</option>
                                                    <option value="interior" <?php if(set_select('carimagetype','interior')) { echo "selected"; } ?>>Interior</option>
                                                </select>
                                                <p class="errmsg"><?php echo form_error('carimagetype'); ?></p>
                                                <br/>
                                                <br/>
                                                <div class="container-fluid" style="margin-left: -12px;margin-right: -13px;">
                                                    <div class="row">
                                                        <div class="col-md-4 col-xs-6 col-sm-6 text-center" style="padding: 0px;">
                                                            <button type="submit" value="Next" name="addimg" class="btn" style="border-radius: 20px;background-color: #FF6200;color: white;font-size: 13px;">Add Image&nbsp;&nbsp;<i class="fa fa-check" style="margin-top: -1px;border-radius: 50%;width: 23px;margin-left: 5px;margin-right: -5px;padding: 4px;background-color: #FFFFFF;color: #000;font-size: 13px;"></i></button>
                                                        </div>
                                                        <div class="col-md-4 col-xs-6 col-sm-6 text-center" style="padding: 0px;">
                                                            <button type="reset" value="Next" class="btn" style="border-radius: 20px;background-color: #FF6200;color: white;font-size: 13px;">Clear&nbsp;&nbsp;<i class="fa fa-minus" style="margin-top: -1px;border-radius: 50%;width: 23px;margin-left: 5px;margin-right: -5px;padding: 4px;background-color: #FFFFFF;color: #000;font-size: 13px;"></i></button>
                                                        </div>
                                                        <div class="col-md-4 col-xs-6 col-sm-6 text-center" style="padding: 0px;">
                                                            <button type="submit" value="Next" name="finish" class="btn" style="border-radius: 20px;background-color: #FF6200;color: white;font-size: 13px;">Finish&nbsp;&nbsp;<i class="fa fa-flag" style="margin-top: -1px;border-radius: 50%;width: 23px;margin-left: 5px;margin-right: -5px;padding: 4px;background-color: #FFFFFF;color: #000;font-size: 13px;"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br/>
                                                <br/>
                                                <?php
                                                if(isset($imgerror))
                                                {
                                                ?>
                                                <div class="alert alert-danger alert-dismissable">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <?php
                                                    echo $imgerror;
                                                    ?>
                                                </div>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if(isset($imgerrors))
                                                {
                                                ?>
                                                <div class="alert alert-danger alert-dismissable">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <?php
                                                    $c=0;
                                                    foreach($imgerrors as $msg)
                                                    {
                                                        $c++;
                                                        echo "$c.$msg.<br/>";
                                                    }
                                                    ?>
                                                </div>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if(isset($imgerr))
                                                {
                                                ?>
                                                <div class="alert alert-success alert-dismissable">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <?php
                                                    $c=0;
                                                    foreach($imgerr as $ms)
                                                    {
                                                        $c++;
                                                        echo "$c.$ms.<br/>";
                                                    }
                                                    ?>
                                                </div>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if(isset($imgselect))
                                                {
                                                ?>
                                                <div class="alert alert-danger alert-dismissable">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <?php
                                                        echo $imgselect;
                                                    ?>
                                                </div>
                                                <?php
                                                }
                                                ?>
                                            
                                        </div>
                                            <div class="col-lg-6 col-md-6 col-xs-12 text-center" id="d"> 
                                            <input type="file" name="upload[]" multiple="multiple" id="fileupload" style="display: none;"/>

                                            <label id="fileupd1" for="fileupload" style="width: 100%;margin-top: 32px;border:2px dashed #FF6200;cursor: pointer;">
                                                <div id="dvPreview">
                                                    <h3 style="margin: 15%;"><i class="glyphicon glyphicon-picture" style="font-size: 20px;"></i> Click To Select Multiple File</h3>
                                                </div>
                                            </label>
                                        </div>
                                        </form>
                                        
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
<script src="<?php echo base_url(); ?>carmela/javascripts/set.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
    function show(cid,action)
    {
        var base='http://localhost/car_house/';
        var data = {cid:cid,action:action};
        var url = base + 'Ajax/change';
        
        $.post(url,data,function(ans){
            $("#d").html(ans);
        });
    }
    
    $(function () {
        $("#fileupload").change(function () {
            if (typeof (FileReader) != "undefined") {
                var dvPreview = $("#dvPreview");
                dvPreview.html("");
                var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                $($(this)[0].files).each(function () {
                    var file = $(this);
                    if (regex.test(file[0].name.toLowerCase())) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var img = $("<img />");
                            img.attr("style", "height:100px;width: 100px;margin:3px;border:1px solid #CBCBCB;");
                            img.attr("src", e.target.result);
                            dvPreview.append(img);
                        }
                        reader.readAsDataURL(file[0]);
                    }
                });
            }
        });
    });
</script>



