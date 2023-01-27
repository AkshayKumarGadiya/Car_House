<!doctype html>
<html class="fixed">
    <title>Carmela Panel - Car House</title>
    <?php
    $this->load->view('carmela/header_link');
    ?>
    <body style="background-color: #F2F2F2;">
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
                        <h2>Change Password</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Admin-Home">
                                        <i class="fa fa-home" style="padding-right: 5px;font-size: 17px;margin-top: -4px"></i>
                                    </a>
                                </li>
                                <li><span style="padding-right: 25px;font-size: 13px;">Change Password</span></li>
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
                                                    <div class="row">

                                                        <div class="col-md-offset-3 col-md-6 col-md-offset-3">
                                                            <form method="post" class="my-form" novalidate="" style="padding: 28px;border-radius: 2px;border: 1px solid #CBCBCB;">
                                                                <p style="text-align: center;font-size: 15px;">Change Password</p>
                                                                <div class="form-group mb-lg cpass">
                                                                    <div class="setting input-group input-group-icon">
                                                                        <input type="password" name="cpassword" placeholder="Current Password" style="position: relative;" id="pwd1" class="form-control input-md" required="" pattern="^(AB|)[a-zA-Z0-9]{8,16}$"/>

                                                                        <i class="fa fa-toggle-off" id="toggle1" title="Show Password"></i>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-lg cpass">
                                                                    <div class="setting input-group input-group-icon">
                                                                        <input type="password" name="npassword" placeholder="New Password" id="pwd2" class="form-control input-md" required="" pattern="^(AB|)[a-zA-Z0-9]{8,16}$" />

                                                                        
                                                                            <i class="fa fa-toggle-off" id="toggle2" title="Show Password"></i>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-lg cpass">
                                                                    <div class="setting input-group input-group-icon">
                                                                        <input type="password" name="rpassword" placeholder="Confirm Password" id="pwd" class="form-control input-md" required="" pattern="^(AB|)[a-zA-Z0-9]{8,16}$" />

                                                                        <i class="fa fa-toggle-off" id="toggle" title="Show Password"></i>
                                                                    </div>
                                                                </div>
                                                                <button type="submit" name="editpass" value="Change Password" class="btn" style="background-color: #FF6200;color: white;font-size: 13px;width: 100%;height: 35px;"><i class="fa fa-lock" style="margin-right: 5px;font-size: 13px;"></i>Change Password</button>
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
        $this->load->view('carmela/footer_script');
        ?>
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