<!doctype html>
<html class="fixed">
    <title>Member Panel - Car House</title>
    <?php
    $this->load->view('user/header_link');
    ?>
    <style>
    .my-form input[type="text"]:focus:invalid
    {
        border:1px solid red;
    }
    .my-form input[type="text"]:focus:valid
    {
        border:1px solid green;
    }    
    </style>
    <body style="background-color: #F6F6F6;">
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
                        <h2>My Profile</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>User-Home">
                                        <i class="fa fa-home" style="padding-right: 5px;font-size: 17px;margin-top: -4px"></i>
                                    </a>
                                </li>
                                <li><span style="padding-right: 25px;font-size: 13px;">My Profile</span></li>
                            </ol>
                        </div>
                    </header>

                    <!-- start: page -->
                   <div class="container-fluid">
                        <div class="row">
                            <form method="post" enctype="multipart/form-data">
                                <div class="col-md-12 col-lg-12 col-xs-12">
                                    <section class="panel">
                                        <div class="panel-body" style="height: 180px;padding-top: 0px;">
                                            <div class="row">
                                                <div class="checko">
                                                    <div class="col-md-3 col-xs-12">
                                                    <?php
                                                    if($update[0]->profile_pic == "")
                                                    {
                                                    ?>
                                                        <input type="file" name="userprofile" id="upload" style="display: none;"/>
                                                        <label for="upload">
                                                            <div class="ownfile">
                                                                <h3><img src="<?php echo base_url(); ?>user_asset/images/user-blank.png" id="blah1" class="img-responsive" title="<?php echo $update[0]->name; ?>" style="width: 150px;height: 150px;cursor: pointer;"/></h3>
                                                            </div>
                                                        </label>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                        <input type="file" name="userprofile" id="upload1" style="display: none;"/>
                                                        <label for="upload1">
                                                            <div class="ownfile">
                                                                <h3><img src="<?php echo base_url().$update[0]->profile_pic; ?>"  id="blah" title="<?php echo $update[0]->name; ?>" title="<?php echo $update[0]->name; ?>" class="img-responsive" style="width: 150px;height: 150px;cursor: pointer;"/></h3>
                                                            </div>
                                                        </label>
                                                        
                                                    <?php
                                                    }
                                                    ?>
                                                    </div>
                                                    <div class="col-md-9 col-xs-12">
                                                        <h4 class="text-capitalize" style="margin: 32px 0 15px 5px;"><?php echo $update[0]->name; ?></h4>
                                                        <button type="submit" class="btn" name="uprofile" value="Edit Profile" style="border-radius: 20px;background-color: #FF6200;color: white;font-size: 13px;">Save Profile&nbsp;&nbsp;<i class="fa fa-edit" style="margin-top: -1px;border-radius: 50%;width: 23px;margin-left: 5px;margin-right: -5px;padding: 4px;background-color: #FFFFFF;color: #000;font-size: 13px;"></i></button>
                                                        <a href="<?php echo base_url(); ?>User-Profile"><button type="button" class="btn" style="border-radius: 20px;background-color: #FF6200;color: white;font-size: 13px;">Cancel&nbsp;&nbsp;<i class="fa fa-close" style="margin-top: -1px;border-radius: 50%;width: 23px;margin-left: 5px;margin-right: -5px;padding: 4px;background-color: #FFFFFF;color: #000;font-size: 13px;"></i></button></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>
                                            <br/>
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
                                    </section>
                                </div>

                                <div class="col-md-12 col-lg-12 col-xl-12" style="padding: 0px;">
                                    <div class="col-md-6">
                                        <div class="table-responsive">
                                            <table class="table-striped text-center" >
                                                <thead class="table-bordered">
                                                    <tr>
                                                        <th colspan="2" style="text-align: center;"><h4>Basic Information</h4></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-bordered my-form">
                                                    <tr>
                                                        <th>Name</th>
                                                        <td><input type="text" name="name" class="form-control input-md" value="<?php if($this->input->post('uprofile')){ echo set_value('name'); }else{ echo $update[0]->name; } ?>" pattern="^[a-zA-Z ]+$"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>  <td><p class="errmsg"><?php echo form_error('name'); ?></p></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gender</th>
                                                        <td><label class="radio-inline c">Male
                                                                <input type="radio" value="male" name="gender" <?php if($update[0]->gender == "male") { echo 'checked'; } ?>>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                            <label class="radio-inline c" style="margin-top: 6px;">Female
                                                                <input type="radio" value="female" name="gender"  <?php if($update[0]->gender == "female") { echo 'checked'; } ?>>
                                                                <span class="checkmark"></span>
                                                            </label></td>
                                                    </tr>
                                                    <tr>
                                                        <th>D.O.B</th>
                                                        <td><input type="date" name="dob" class="form-control input-md" value="<?php if($update[0]->dob != "0000-00-00") { echo $update[0]->dob; }?>" style="text-transform: lowercase;"/></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="table-responsive">
                                            <table class="table-striped text-center table-hover" >
                                                <thead class="table-bordered">
                                                    <tr>
                                                        <th colspan="2" style="text-align: center;"><h4>Contact Information</h4></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-bordered my-form">
                                                    <tr>
                                                        <th>Email</th>
                                                        <td><input type="text" name="email" class="form-control input-md" value="<?php if($this->input->post('uprofile')){ echo set_value('email'); }else{ echo $update[0]->email; } ?>" style="text-transform: lowercase;" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>  <td><p class="errmsg"><?php echo form_error('email'); ?></p></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mobile</th>
                                                        <td><input type="text" name="mobile" class="form-control input-md" placeholder="Not Specified" value="<?php if($this->input->post('uprofile')){ echo set_value('mobile'); }else{ echo $update[0]->contact_no; } ?>" pattern="^[0-9]{10}$"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>  <td><p class="errmsg"><?php echo form_error('mobile'); ?></p></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
<script type="text/javascript">
    function readURL(input,a) {

        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $(a).attr('src', e.target.result);
            $(a).attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
        }
    }

    $("#upload1").change(function() {
      readURL(this,'#blah1');
    });
    $("#upload").change(function() {
      readURL(this,'#blah1');
    });
</script>