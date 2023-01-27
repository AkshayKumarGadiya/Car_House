<!doctype html>
<html class="fixed">
    <title>Carmela Panel - Car House</title>
    <?php
    $this->load->view('carmela/header_link');
    ?>
    <style>
        /* layer */

        .backdiv
        {
            background: rgba(0,0,0,0.5);
            width: 100%;
            height: 100%;
            z-index: 9999;
            position: fixed;
            display: none;
        }
        .contentdiv
        {
            margin:20% 35%;
            background-color: #fff;
            width: 400px;
            text-align: justify;
            border-radius: 5px;
        }
        .contentdiv1
        {
            width: 100%;
            text-align: center;
            padding: 15px 0 0 0;
            background-color: #FF6200;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .contentdiv2
        {
            padding: 20px;
            font-size: 13px;
            text-align: justify;

        }
        @media(max-width:700px)
        {
            .contentdiv
            {
                margin: 59% 5%;
                background-color: #fff;
                width: 90%;
                text-align: justify;
                border-radius: 5px;
            }
            .contentdiv1
            {
                width: 100%;
                text-align: center;
                padding: 15px 0 0 0;
                background-color: #FF6200;
                border-top-left-radius: 5px;
                border-top-right-radius: 5px;
            }
            .contentdiv2
            {
                padding: 10px;
                text-align: justify;

            }
        }
    </style>
    <body style="background-color: #F6F6F6;">
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
                                         Are You Sure You Want To Delete Car ?    
                                    </div>
                                    <br/>
                                    <br/>
                                    <div class="col-sm-12 col-xs-12 col-md-12 text-center">
                                        <a href="<?php echo base_url(); ?>CDelete/car/" id="cyes"><button type="button" class="btn pl-xl pr-xl" name="yes" value="yes" style="background-color: #FF6200;color: white;">Yes</button></a>
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
                        <h2>My Gallery</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Carmela-Home">
                                        <i class="fa fa-home" style="padding-right: 5px;font-size: 17px;margin-top: -4px"></i>
                                    </a>
                                </li>
                                <li><span style="padding-right: 25px;font-size: 13px;">My Gallery</span></li>
                            </ol>
                        </div>
                    </header>

                    <!-- start: page -->
                    <div class="container-fluid">
                        <div class="row">
                            <section class="panel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <section class="panel">
                                            <form method="post" enctype="multipart/form-data">
                                            <header class="panel-heading" style="background-color: #3F4557;">
                                                <div class="panel-actions">
                                                    <label><button type="submit" id="open" value="Next" name="save" class="btn" style="margin-top: -3px;background-color: #F6F6F6;color: #3F4557;display: none;">Save</button></label>
                                                    <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                                    <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                                </div>
                                                <h2 class="panel-title" style="color: #FFFFFF;">My Visiting Card</h2>
                                            </header>
                                            <div class="panel-body">
                                                <section class="content-with-menu-has-toolbar media-gallery">
                                                    <div class="">
                                                        <div class="">
                                                            <div class="row mg-files" data-sort-destination data-sort-id="media-gallery" style="padding: 15px;padding-bottom: 0px;">
                                                                <div class="isotope-item document col-sm-6 col-md-4 col-lg-4">
                                                                    <div class="thumbnail"  style="height: 190px;">
                                                                        <div class="thumb-preview">
                                                                            <a class="thumb-image">
                                                                                <img src="<?php echo base_url().$visiting[0]->photo;  ?>" id="blah" class="img-responsive"  style="height: 167px;" alt="Project">
                                                                            </a>
                                                                            <div class="mg-thumb-options">
                                                                                <div class="mg-toolbar">
                                                                                    <div class="mg-group pull-right">
                                                                                        <label style="cursor: pointer;" id="vedit"><i class="fa fa-pencil" ></i>&nbsp;Edit</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="isotope-item document col-sm-6 col-md-4 col-lg-4" id="openv" style="display: none;">
                                                                    <input type="file" name="myfile" id="myfile" style="display: none;">
                                                                    <label for="myfile">
                                                                        <div class="isotope-item document col-sm-6 col-md-4 col-xs-12 col-lg-4 text-center">
                                                                            <div class="thumbnail ghight">
                                                                                    <i class="fa fa-plus" ></i>
                                                                            </div>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                            </form>
                                        </section>
                                    </div>
                                </div>
                                <?php
                                if(isset($err))
                                {
                                ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <?php
                                        echo $err;
                                    ?>
                                </div>
                                <?php
                                }
                                ?>
                            </section>
                            <section class="panel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <section class="panel">
                                            <form method="post" enctype="multipart/form-data">
                                                <header class="panel-heading" style="background-color: #3F4557;">
                                                    <div class="panel-actions">
                                                    <?php 
                                                    if(isset($ucarmela))
                                                    {
                                                    ?>
                                                        <label><button type="submit" value="Next" name="upd" class="btn" style="margin-top: -3px;background-color: #F6F6F6;color: #3F4557;">Update</button></label>
                                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                        <label><button type="submit" value="Next" name="add" class="btn" style="margin-top: -3px;background-color: #F6F6F6;color: #3F4557;">Save</button></label>
                                                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                                    <?php
                                                    }
                                                    ?>
                                                    </div>

                                                    <h2 class="panel-title" style="color: #FFFFFF;">My Carmela Images</h2>

                                                </header>
                                                <div class="panel-body">
                                                    <section class="content-with-menu-has-toolbar media-gallery">
                                                        <div class="">
                                                            <div class="">
                                                                <div class="row mg-files" data-sort-destination data-sort-id="media-gallery" style="padding: 15px;padding-bottom: 0px;">
                                                                    <?php
                                                                        foreach ($carmela as $val)
                                                                        {
                                                                                        if(isset($ucarmela) &&  $ucarmela[0]->gallery_id == $val->gallery_id)
                                                                                        {
                                                                                        ?>
                                                                                            <div class="isotope-item document col-sm-6 col-md-4 col-lg-4">
                                                                                                <div style="height: 190px;">
                                                                                                    <div class="thumb-preview">
                                                                                                        <input type="file" name="myfile2" id="myfile2" style="display: none;">
                                                                                                        <label for="myfile2">
                                                                                                            <div class="isotope-item document text-center">
                                                                                                                <div class="thumbnail ghight" style="width: 268px;"  id="b-text" >
                                                                                                                        <i class="fa fa-pencil"  ></i>
                                                                                                                </div>
                                                                                                                <div class="isotope-item document" id="imgsw">
                                                                                                                    <div class="thumbnail" style="height:190px;width:260px;">
                                                                                                                        <div class="thumb-preview">
                                                                                                                            <a class="thumb-image">
                                                                                                                                <img id="blah1" style="height: 167px;" >
                                                                                                                            </a>
                                                                                                                         </div>
                                                                                                                     </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        <?php
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                        ?>
                                                                                        <div class="isotope-item document col-sm-6 col-md-4 col-lg-4">
                                                                                            <div class="thumbnail" style="height: 190px;">
                                                                                                <div class="thumb-preview">
                                                                                                    <a class="thumb-image">
                                                                                                        <img src="<?php echo base_url().$val->photo; ?>" class="img-responsive" style="height: 167px;" alt="Project">
                                                                                        </a>
                                                                                                    <div class="mg-thumb-options">
                                                                                        <div class="mg-toolbar">
                                                                                            <div class="mg-group pull-right">
                                                                                                <a href="<?php echo base_url(); ?>Update-Car/<?php echo $val->gallery_id; ?>"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
                                                                                                <i id="<?php echo $val->gallery_id; ?>" class="fa fa-trash trash layer" title="Remove" style="color: #76768F;cursor: pointer;color: #fff;">&nbsp;Remove</i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                                            <?php
                                                                                        }
                                                                                        ?>
                                                                    <?php
                                                                        }
                                                                    if(!isset($ucarmela))
                                                                    {
                                                                    ?>
                                                                    <input type="file" name="myfiles[]" multiple="" id="myfile1" style="display: none;">
                                                                    <label for="myfile1">
                                                                        <div class="isotope-item document col-sm-6 col-md-4 col-xs-12 col-lg-4 text-center">
                                                                            <div class="thumbnail ghight" id="btxt">

                                                                                    <i class="fa fa-plus" ></i>

                                                                            </div>
                                                                            <div class="isotope-item document" id="imgsw1">
                                                                                <div class="thumbnail" style="width:260px;">
                                                                                    <div class="thumb-preview" id='fileupload'>
                                                                                     </div>
                                                                                 </div>
                                                                            </div>
                                                                        </div>
                                                                    </label>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        if(isset($imageerror))
                                                        {
                                                        ?>
                                                        <div class="alert alert-danger alert-dismissable">
                                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                            <?php
                                                            $c=0;
                                                            foreach($imageerror as $msg)
                                                            {
                                                                $c++;
                                                                echo "$c.$msg.<br/>";
                                                            }
                                                            ?>
                                                        </div>
                                                        <?php
                                                        }
                                                        if(isset($imageselect))
                                                        {
                                                        ?>
                                                        <div class="alert alert-danger alert-dismissable">
                                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                            <?php
                                                                echo $imageselect;
                                                            ?>
                                                        </div>
                                                        <?php
                                                        }
                                                        if(isset($uerr))
                                                        {
                                                        ?>
                                                        <div class="alert alert-danger alert-dismissable">
                                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                            <?php
                                                                echo $uerr;
                                                            ?>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </section>
                                                </div>
                                            </form>
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
     <script>
            $("#vedit").click(function() {
                $("#openv").show();
                $("#open").show();
            });
            $("#imgsw").hide();
            $("#imgsw1").hide();
            function readURL(input,a) {

                if (input.files && input.files[0]) {
                  var reader = new FileReader();

                  reader.onload = function(e) {
                    $(a).attr('src',e.target.result);
                  }
                  reader.readAsDataURL(input.files[0]);
                }
            }

            $("#myfile").change(function() {
              readURL(this,'#blah');
            });
//            $("#myfile1").change(function() {
//                $('#btxt').hide();
//                $('#imgsw1').show();
//                readURL(this,'#blah2');
//            });
            $("#myfile2").change(function() {
                $('#b-text').hide();
                $('#imgsw').show();
              readURL(this,'#blah1');
            });
            
            $id1 = "";
            $('.layer').click(function(){
                $id1 = $("#cyes").attr('href');
                $id2 = $id1 + $(this).attr("id");
                $("#cyes").attr("href",$id2);
                $(".backdiv").fadeIn(500);
            });
            $('#btncls').click(function(){
                $(".backdiv").fadeOut(500);
                $("#cyes").attr('href',$id1);
            });
            $(function () {
            $("#myfile1").change(function () {
                if (typeof (FileReader) != "undefined") {
                    
                    var dvPreview = $("#fileupload");
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
                    $('#btxt').hide();
                    $("#imgsw1").show();
                }
            });
        });
        </script>
</html>