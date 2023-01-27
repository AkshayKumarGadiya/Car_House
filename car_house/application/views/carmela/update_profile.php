<?php
    $data = $this->md->my_select('tbl_carmela',array('carmela_id'=>$this->session->userdata('carmela')));
?>
<?php

?>
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
                        <h2>Update Profile</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Carmela-Home">
                                        <i class="fa fa-home" style="padding-right: 5px;font-size: 17px;margin-top: -4px"></i>
                                    </a>
                                </li>
                                <li><span style="padding-right: 25px;font-size: 13px;">Update Profile</span></li>
                            </ol>
                        </div>
                    </header>

                    <!-- start: page -->
                    <div class="container-fluid">
                        <div class="row">
                            <?php
                                if(isset($uprofile))
                                {
                            ?>
                            <form method="post" enctype="multipart/form-data">
                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <section class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="checko">
                                                    <div class="col-md-12 col-xs-12">
                                                        <?php 
                                                        if($data[0]->cover_pic == "")
                                                        {
                                                        ?>
                                                        <img src="<?php echo base_url(); ?>carmela/images/cover.jpg" id="blah" class="img-responsive imgcoverpic" style="border-radius: 5px;"/>
                                                        <?php
                                                        }
                                                        else
                                                        {
                                                        ?>
                                                            <img src="<?php echo $data[0]->cover_pic; ?>" width="100%" id="blah" class="img-responsive imgcoverpic" style="border-radius: 5px;"/>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-xs-6 col-md-3 col-sm-3 mop text-center">
                                                        <p>
                                                            <input type="file" id="myfile" name="cover" style="display: none;"/>
                                                            <label for="myfile" style="cursor: pointer;">
                                                                <i class="fa fa-camera" style="padding: 5px;color: #FFFFFF;" ></i>
                                                                &nbsp;&nbsp;Add New Cover Photo
                                                            </label>
                                                        </p>
                                                    </div>
                                                    <div class="col-xs-6 col-md-offset-6 col-sm-offset-6 col-md-3 col-sm-3 omp text-center">
                                                        <p><i class="fa fa-user" ></i><input type="submit" name="save" value="Save Profile" style="background: transparent;border: none;outline: none;" /></p>
                                                        <a href="<?php echo base_url(); ?>My-Profile"><p style="margin: 0 10px 0 0;width: 119px;float: right;"><i class="fa fa-close" ></i>&nbsp;Cancel</p></a>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="checkp">
                                        <div class="col-md-3 col-xs-12 profilep">
                                            <img src="<?php echo base_url().$data[0]->profile; ?>" id="blah1" class="img-thumbnail oop logopic" />
                                        </div>
                                        <div class="col-md-9 col-xs-12 aaa">
                                            <p class="companyname"><input type="text" name="companyname" value="<?php if($this->input->post('save')){ echo set_value('companyname'); }else{ echo $data[0]->name; } ?>" class="form-control input-md" style="font-size: 12px;"/></p>
                                        </div>
                                        <div class="col-md-12 col-xs-12 pqr">
                                            <p>
                                                <input type="file" name="logo" id="myfile1" style="display: none;"/>
                                                <label for="myfile1">
                                                    <i class="fa fa-camera" style="visibility: hidden;font-size: 20px;margin: 3px;"></i>
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                </section>
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
                            <div class="col-md-6 col-lg-12 col-xl-12" style="padding: 0px;">
                                <div class="tabs">
                                    <ul class="nav nav-tabs text-center tabs-primary">
                                        <li class="active col-xs-4 col-md-4 pp">
                                            <a href="#popular7" data-toggle="tab"><i class="fa fa-phone"></i> Contact Detail</a>
                                        </li>
                                        <li class="col-xs-4 col-md-4 pp">
                                            <a href="#recent7" data-toggle="tab"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;&nbsp;Location Detail</a>
                                        </li>
                                        <li class="col-xs-4 col-md-4 pp">
                                            <a href="#recent8" data-toggle="tab"><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;Owner Detail</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" style="text-transform: capitalize;">
                                        <div id="popular7" class=" tab-pane active tblseller">
                                            <table class="table-hover">
                                                <tr>
                                                    <td><b>Email Id</b></td>
                                                    <td><input type="text" name="email" value="<?php if($this->input->post('save')){ echo set_value('email'); }else{ echo $data[0]->email; } ?>" class="form-control input-md" style="width: 100%;padding: 5px;font-size: 12px;text-transform: lowercase;"/></td>
                                                    <td><p class="errmsg"><?php echo form_error('email'); ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Contact</b></td>
                                                    <td><input type="text" name="contact" value="<?php if($this->input->post('save')){ echo set_value('contact'); }else{ echo $data[0]->contact_no; } ?>" class="form-control input-md" style="width: 100%;padding: 5px;font-size: 12px;" /></td>
                                                    <td><p class="errmsg"><?php echo form_error('contact'); ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
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
                                                        
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div id="recent7" class="tab-pane">
                                            <table class="table-hover">
                                                <tr>
                                                    <td><b>State</b></td>
                                                    <td>
                                                        <select name="ustate" onchange="set_combo(this.value,'city');set_combo(0,'area');set_combo(0,'landmark')" style="background-color: #FFFFFF;width: 100%;">
                                                            <option value="">Select State</option>
                                                            <?php
                                                                foreach ($ustate as $val)
                                                                {
                                                                ?>
                                                                <option value="<?php echo $val->location_id; ?>"
                                                                <?php
                                                                    if($this->input->post('ustate') != "")
                                                                    {
                                                                        if(set_select('ustate',$val->location_id))
                                                                        {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    else
                                                                    {
                                                                        if($this->input->post('save') && $this->input->post('ustate') == "")
                                                                        {
                                                                            if(set_select('ustate',""))
                                                                            {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                        else
                                                                        {
                                                                            if($ucity[0]->parent_id == $val->location_id)
                                                                            {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                    }
                                                                ?>
                                                                ><?php echo $val->name; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                        </select>
                                                        <p class="errmsg"><?php echo form_error('ustate'); ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>City</b></td>
                                                    <td>
                                                        <select name="ucity" id="city" onchange="set_combo(this.value,'area')" style="background-color: #FFFFFF;width: 100%;">
                                                            <option value="">Select City</option>
                                                              <?php
                                                                    if($this->input->post('ustate') != "")
                                                                    {
                                                                        $ct = $this->md->my_select('tbl_location',array('lable'=>'city','parent_id'=>$this->input->post('ustate')));
                                                                        foreach ($ct as $val)
                                                                        {
                                                                ?>
                                                                <option value="<?php echo $val->location_id; ?>"
                                                                        <?php
                                                                            if(set_select('ucity',$val->location_id))
                                                                            {
                                                                                echo "selected";
                                                                            }
                                                                        
                                                                        ?>><?php echo $val->name; ?></option>
                                                                <?php
                                                                        }
                                                                    }
                                                                    else
                                                                    {
                                                                        if($this->input->post('save') && $this->input->post('ustate') == "")
                                                                        {
                                                                            if(set_select('ucity',""))
                                                                            {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                        else
                                                                        {
                                                                            foreach ($city as $val)
                                                                            {
                                                                ?>
                                                                <option value="<?php echo $val->location_id; ?>"
                                                                        <?php
                                                                                if($uarea[0]->parent_id == $val->location_id)
                                                                                {
                                                                                    echo 'selected';
                                                                                }
                                                                        
                                                                        ?>
                                                                        ><?php echo $val->name; ?></option>
                                                                <?php
                                                                        }
                                                                    }
                                                                    }
                                                                ?>
                                                        </select>
                                                        <p class="errmsg"><?php echo form_error('ucity'); ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Area</b></td>
                                                    <td>
                                                        <select name="uarea" id="area" onchange="set_combo(this.value,'landmark')" style="background-color: #FFFFFF;width: 100%;">
                                                            <option value="">Select Area</option>
                                                            <?php
                                                                    if($this->input->post('ucity') != "")
                                                                    {
                                                                        $a = $this->md->my_select('tbl_location',array('lable'=>'area','parent_id'=>$this->input->post('ucity')));
                                                                        foreach ($a as $val)
                                                                        {
                                                                ?>
                                                                <option value="<?php echo $val->location_id; ?>"
                                                                        <?php
                                                                            if(set_select('uarea',$val->location_id))
                                                                            {
                                                                                echo "selected";
                                                                            }
                                                                        
                                                                        ?>><?php echo $val->name; ?></option>
                                                                <?php
                                                                        }
                                                                    }
                                                                    else
                                                                    {
                                                                        if($this->input->post('save') && $this->input->post('ucity') == "")
                                                                        {
                                                                            if(set_select('uarea',""))
                                                                            {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                        else
                                                                        {
                                                                            foreach ($area as $val)
                                                                        {
                                                                ?>
                                                                <option value="<?php echo $val->location_id; ?>"
                                                                        <?php
                                                                                if($ulandmark[0]->parent_id == $val->location_id)
                                                                                {
                                                                                    echo 'selected';
                                                                                }
                                                                        
                                                                        ?>
                                                                        ><?php echo $val->name; ?></option>
                                                                <?php
                                                                        }
                                                                    }
                                                                    }
                                                                ?>
                                                        </select>
                                                        <p class="errmsg"><?php echo form_error('uarea'); ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Landmark</b></td>
                                                    <td>
                                                        <select name="ulandmark" id="landmark" style="background-color: #FFFFFF;width: 100%;">
                                                            <option value="">Select Landmark</option>
                                                            <?php
                                                                    if($this->input->post('uarea') != "")
                                                                    {
                                                                        $l = $this->md->my_select('tbl_location',array('lable'=>'landmark','parent_id'=>$this->input->post('uarea')));
                                                                        foreach ($l as $val)
                                                                        {
                                                                ?>
                                                                <option value="<?php echo $val->location_id; ?>"
                                                                        <?php
                                                                            if(set_select('ulandmark',$val->location_id))
                                                                            {
                                                                                echo "selected";
                                                                            }
                                                                        
                                                                        ?>><?php echo $val->name; ?></option>
                                                                <?php
                                                                        }
                                                                    }
                                                                    else
                                                                    {
                                                                        if($this->input->post('save') && $this->input->post('uarea') == "")
                                                                        {
                                                                            if(set_select('ulandmark',""))
                                                                            {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                        else
                                                                        {
                                                                            foreach ($landmark as $val)
                                                                        {
                                                                ?>
                                                                <option value="<?php echo $val->location_id; ?>"
                                                                        <?php
                                                                            if(set_select('uarea',$val->location_id))
                                                                            {
                                                                                echo 'selected';
                                                                            }
                                                                            else
                                                                            {
                                                                                if($ulandmark[0]->location_id == $val->location_id)
                                                                                {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                        
                                                                        ?>
                                                                        ><?php echo $val->name; ?></option>
                                                                <?php
                                                                        }
                                                                    }
                                                                    }
                                                                ?>
                                                        </select>
                                                        <p class="errmsg"><?php echo form_error('ulandmark'); ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Address</b></td>
                                                    <td><textarea name="address" placeholder="Address" style="padding: 5px;font-size: 12px;resize: none;width: 100%;border-radius: 5px;"><?php if($this->input->post('save')){ echo set_value('address'); }else{ echo $data[0]->address; } ?></textarea></td>
                                                    <td><p class="errmsg"><?php echo form_error('address'); ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Pincode</b></td>
                                                    <td><input type="text" name="pin" value="<?php if($this->input->post('save')){ echo set_value('pin'); }else{ echo $data[0]->pincode; } ?>" class="form-control input-md" style="width: 100%;padding: 5px;font-size: 12px;" /></td>
                                                    <td><p class="errmsg"><?php echo form_error('pin'); ?></p></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div id="recent8" class="tab-pane" style="height:363px;">
                                            <table class="table-hover">
                                                <tr>
                                                    <td><b>Owner Name</b></td>
                                                    <td><input type="text" name="owner" value="<?php if($this->input->post('save')){ echo set_value('owner'); }else{ echo $data[0]->owner_name; } ?>" class="form-control input-md" style="width: 100%;padding: 5px;font-size: 12px;" /></td>
                                                    <td><p class="errmsg"><?php echo form_error('owner'); ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Contact No</b></td>
                                                    <td><input type="text" name="ocontact" value="<?php if($this->input->post('save')){ echo set_value('ocontact'); }else{ echo $data[0]->owner_contact_no; } ?>" class="form-control input-md" style="width: 100%;padding: 5px;font-size: 12px;" /></td>
                                                    <p class="errmsg"><?php echo form_error('ocontact'); ?></p>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </section>
            </div>
        </section>
        <?php
        $this->load->view('carmela/footer_script');
        ?>
    </body>
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

            $("#myfile").change(function() {
              readURL(this,'#blah');
            });
            $("#myfile1").change(function() {
              readURL(this,'#blah1');
            });
    </script>
</html>
<script src="<?php echo base_url(); ?>carmela/javascripts/set.js" type="text/javascript"></script>