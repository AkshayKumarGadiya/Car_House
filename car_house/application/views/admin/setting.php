
<!doctype html>

<html class="fixed">
    <?php
    $this->load->view('admin/header_link');
    ?>
    <body style="background-color: #F2F2F2;">
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
                        <h2>Setting</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Admin-Home">
                                        <i class="fa fa-home dashboard"></i>
                                    </a>
                                </li>
                                <li><span class="dashboardname">Setting</span></li>
                            </ol>
                        </div>
                    </header>
                    <br/>
                    <div class="col-xl-12 col-md-12">
                        <section class="panel panel-transparent">
                            <div class="panel-body">
                                <section class="panel panel-group emaildisplay">
                                    <div id="accordion">
                                        <div class="panel panel-accordion panel-accordion-first">
                                            <div id="collapse1One" class="accordion-body collapse in">
                                                <div class="panel-body">
                                                    <br/>
                                                    <div class="row">
                                                        <form method="post" class="my-form" enctype="multipart/form-data">
                                                            <div class="col-md-6 text-center">
                                                                <img id="blah" src="<?php foreach($select as $val) { echo base_url().$val->profile_pic; }?>" title="Car House" class="img-circle" style="width: 150px;" />
                                                                <br/>
                                                                <input type="file" name="photo" id="upload" style="display: none;"/>
                                                                <label id="fileupd" for="upload" style="width: 80%;">
                                                                    <div>
                                                                        <h3>Select Your Profile</h3>
                                                                    </div>
                                                                </label>
                                                                <div class="col-md-12 col-xs-12 text-center" style="padding: 10px 40px 10px 0px;">
                                                                    <button type="submit" name="ok" value="Ok" class="btn btnemail1" ><i class="fa fa-plus" ></i>OK</button>
                                                                    <button type="reset" class="btn btnemail1" ><i class="fa fa-close" ></i>Cancel</button>
                                                                </div>
                                                                <br/><br/><br/><br/>
                                                                <div>
                                                                <?php
                                                                    if(isset($su))
                                                                    {
                                                                    ?>
                                                                    <div class="alert alert-success alert-dismissable">
                                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                        <?php
                                                                            echo $su;
                                                                        ?>
                                                                    </div>
                                                                    <?php
                                                                    }
                                                                    ?>
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
                                                                </div>
                                                            </div>
                                                        </form>

                                                        <div class="col-md-6">
                                                            <form method="post" novalidate="" class="my-form" style="padding: 28px;border-radius: 2px;border: 1px solid #CBCBCB;">
                                                                <p style="text-align: center;font-size: 15px;">Change Password</p>
                                                                <div class="form-group mb-lg">
                                                                    <div class="setting input-group input-group-icon">
                                                                        <input type="password" name="cpassword" placeholder="Current Password" id="pwd1" class="form-control input-md" required="" pattern="^(AB|)[a-zA-Z0-9]{8,16}$"/>

                                                                        <span class="icon icon-lg" >
                                                                            <i class="fa fa-toggle-off" id="toggle1" title="Show Password"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-lg">
                                                                    <div class="setting input-group input-group-icon">
                                                                        <input type="password" name="npassword" placeholder="New Password" id="pwd2" class="form-control input-md" required="" pattern="^(AB|)[a-zA-Z0-9]{8,16}$" />

                                                                        <span class="icon icon-lg" >
                                                                            <i class="fa fa-toggle-off" id="toggle2" title="Show Password"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-lg">
                                                                    <div class="setting input-group input-group-icon">
                                                                        <input type="password" name="rpassword" placeholder="Confirm Password" id="pwd" class="form-control input-md" required="" pattern="^(AB|)[a-zA-Z0-9]{8,16}$" />

                                                                        <span class="icon icon-lg" >
                                                                            <i class="fa fa-toggle-off" id="toggle" title="Show Password"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="btn" name="editpass" value="Change Password" style="background-color: #FF6200;color: white;font-size: 13px;width: 100%;height: 35px;"><i class="fa fa-lock" style="margin-right: 5px;font-size: 13px;"></i>Change Password</button>
                                                                <br/>
                                                                <br/>
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
                                                                <?php
                                                                    if(isset($success))
                                                                    {
                                                                    ?>
                                                                    <div class="alert alert-success alert-dismissable">
                                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                        <?php
                                                                            echo $success;
                                                                        ?>
                                                                    </div>
                                                                <?php
                                                                }
                                                                ?>
                                                                <?php
                                                                    if(form_error('npassword') != "")
                                                                    {
                                                                ?>
                                                                    <div class="alert alert-danger alert-dismissable">
                                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                        <?php
                                                                            echo form_error('npassword');
                                                                        ?>
                                                                    </div>
                                                                <?php
                                                                }
                                                                ?>
                                                                <?php
                                                                    if(form_error('rpassword') != "")
                                                                    {
                                                                ?>
                                                                    <div class="alert alert-danger alert-dismissable">
                                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                        <?php   
                                                                            echo form_error('rpassword');
                                                                        ?>
                                                                    </div>
                                                                <?php
                                                                }
                                                                ?>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </section>
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
            function readURL(input) {

                if (input.files && input.files[0]) {
                  var reader = new FileReader();

                  reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                  }

                  reader.readAsDataURL(input.files[0]);
                }
            }

            $("#upload").change(function() {
              readURL(this);
            });
        </script>
    </body>
</html>
<script>
    
    $(document).ready(function () {
        $("#toggle1").on("click", function () {
            $c = 0;
            if ($("#toggle1").hasClass("fa fa-toggle-off"))
            {
                $c = 1;
                $(this).removeClass("fa fa-toggle-off");
                $(this).addClass("fa fa-toggle-on");
                $("#pwd1").attr("type", "text");
                $("#toggle1").attr("title", "Hide Password");
                $("#toggle1").css("color", "#FF6200");

            } else
            {
                $c = 0;
                $(this).removeClass("fa fa-toggle-on");
                $(this).addClass("fa fa-toggle-off");
                $("#pwd1").attr("type", "password");
                $("#toggle1").attr("title", "Show Password");
                $("#toggle1").css("color", "#AAAAAA");
            }
        });
    });
    $(document).ready(function () {
        $("#toggle2").on("click", function () {
            $c = 0;
            if ($("#toggle2").hasClass("fa fa-toggle-off"))
            {
                $c = 1;
                $(this).removeClass("fa fa-toggle-off");
                $(this).addClass("fa fa-toggle-on");
                $("#pwd2").attr("type", "text");
                $("#toggle2").attr("title", "Hide Password");
                $("#toggle2").css("color", "#FF6200");

            } else
            {
                $c = 0;
                $(this).removeClass("fa fa-toggle-on");
                $(this).addClass("fa fa-toggle-off");
                $("#pwd2").attr("type", "password");
                $("#toggle2").attr("title", "Show Password");
                $("#toggle2").css("color", "#AAAAAA");
            }
        });
    });
    $(document).ready(function () {
        $("#toggle").on("click", function () {
            $c = 0;
            if ($("#toggle").hasClass("fa fa-toggle-off"))
            {
                $c = 1;
                $(this).removeClass("fa fa-toggle-off");
                $(this).addClass("fa fa-toggle-on");
                $("#pwd").attr("type", "text");
                $("#toggle").attr("title", "Hide Password");
                $("#toggle").css("color", "#FF6200");

            } else
            {
                $c = 0;
                $(this).removeClass("fa fa-toggle-on");
                $(this).addClass("fa fa-toggle-off");
                $("#pwd").attr("type", "password");
                $("#toggle").attr("title", "Show Password");
                $("#toggle").css("color", "#AAAAAA");
            }
        });
    });
</script>