<!doctype html>
<html class="fixed">
    <?php
    $this->load->view('admin/header_link');
    ?>
    <body style="background-color: #F2F2F2;">
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
                                         Are You Sure You Want To Delete Car Model ?    
                                    </div>
                                    <br/>
                                    <br/>
                                    <div class="col-sm-12 col-xs-12 col-md-12 text-center">
                                        <a href="<?php echo base_url(); ?>Delete/carmodel/" id="cyes"><button type="button" class="btn pl-xl pr-xl" name="yes" value="yes" style="background-color: #FF6200;color: white;">Yes</button></a>
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
                        <h2>Manage Car Model</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Admin-Home">
                                        <i class="fa fa-home dashboard"></i>
                                    </a>
                                </li>
                                <li><span class="dashboardname">Manage Car Model</span></li>
                            </ol>
                        </div>
                    </header>

                    <div class="col-xl-12 col-md-12">
                        <section class="panel panel-transparent">
                            <div class="panel-body">
                                <section class="panel panel-group emaildisplay">
                                    <div id="accordion">
                                        <div class="panel panel-accordion panel-accordion-first">
                                            <div id="collapse1One" class="accordion-body collapse in">
                                                <div class="panel-body">
                                                    <?php
                                                    if(isset($updatemodel))
                                                    {
                                                    ?>
                                                    <form method="post" novalidate="" class="sbox my-form" enctype="multipart/form-data">
                                                        <div class="col-md-6">
                                                        <P style="font-size: 15px;">Update Model</P>
                                                            <div class="col-md-12">
                                                                <select name="uptype" required="" onchange="set_combo(this.value,'company')">
                                                                    <option value="">Select Car Type</option>
                                                                    <?php
                                                                        foreach ($cartype as $val)
                                                                        {
                                                                    ?>
                                                                    <option value="<?php echo $val->category_id; ?>"
                                                                            <?php
                                                                            if($this->input->post('uptype') != "")
                                                                            {
                                                                                if(set_select('uptype', $val->category_id))
                                                                                {
                                                                                    echo "selected";
                                                                                }
                                                                            }
                                                                            else
                                                                            {
                                                                                if($this->input->post('update') && $this->input->post('uptype') == "")
                                                                                {
                                                                                    if(set_select('uptype',""))
                                                                                    {
                                                                                        echo 'selected';
                                                                                    }
                                                                                }
                                                                                else
                                                                                {
                                                                                    if($upcompany[0]->parent_id==$val->category_id)
                                                                                    {
                                                                                        echo 'selected';
                                                                                    }
                                                                                }
                                                                            }
                                                                            ?>
                                                                            ><?php echo $val->category_name; ?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <p class="errmsg"><?php echo form_error('uptype'); ?></p>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select name="ucompany" required="" id="company">
                                                                    <option value="">Select Car Company</option>
                                                                        <?php
                                                                            if($this->input->post('uptype') != "")
                                                                            {
                                                                                $cm = $this->md->my_select('tbl_category',array('label'=>'company','parent_id'=>$this->input->post('uptype')));
                                                                                foreach ($cm as $val)
                                                                                {
                                                                        ?>
                                                                        <option value="<?php echo $val->category_id; ?>"
                                                                                <?php
                                                                                    if(set_select('ucompany',$val->category_id))
                                                                                    {
                                                                                        echo "selected";
                                                                                    }

                                                                                ?>><?php echo $val->category_name; ?></option>
                                                                        <?php
                                                                                }
                                                                            }
                                                                            else
                                                                            {
                                                                                    if($this->input->post('update') && $this->input->post('uptype') == "")
                                                                                    {
                                                                                        if(set_select('ucompany',""))
                                                                                        {
                                                                                            echo 'selected';
                                                                                        }
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        foreach ($company as $val)
                                                                                        {
                                                                        ?>
                                                                        <option value="<?php echo $val->category_id; ?>"
                                                                                <?php
                                                                                        if($this->input->post('update'))
                                                                                        {
                                                                                            if(set_select('ucompany',$val->category_id))
                                                                                            {
                                                                                                echo 'selected';
                                                                                            }
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                            if($updatemodel[0]->parent_id == $val->category_id) 
                                                                                            {
                                                                                                echo 'selected';
                                                                                            }
                                                                                        }
                                                                                ?>
                                                                                ><?php echo $val->category_name; ?></option>
                                                                        <?php
                                                                                        }
                                                                                    }
                                                                            }
                                                                        ?>
                                                                </select>
                                                                <p class="errmsg"><?php echo form_error('ucompany'); ?></p>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" name="upmodel" placeholder="model" value="<?php if($this->input->post('upmodel')) { echo set_value('upmodel'); }else{ echo $updatemodel[0]->category_name; }?>" class="form-control input-md" required="" pattern="^[a-zA-Z0-9- ]+$"/>
                                                                <p class="errmsg"><?php echo form_error('upmodel'); ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="file" name="umodelimg" id="uploadmodel1" style="display: none;"/>
                                                            
                                                            <label id="fileupd" for="uploadmodel1" style="width: 100%;">
                                                                
                                                                <img id="blah1" style="width: 100%;cursor: pointer;"/>
                                                                <div>
                                                                    <?php
                                                                    if($display[0]->image != "" && $display[0]->category_id == $this->uri->segment(2))
                                                                    {
                                                                    ?>
                                                                    <img id="btext1" src="<?php echo base_url().$display[0]->image; ?>" style="width: 100%;height: 140px;cursor: pointer;"/>
                                                                     <?php
                                                                    }
                                                                    else
                                                                    {
                                                                    ?>
                                                                     <h3  id="btext1" style="height:126px;padding-top: 45px;margin: 9px 0 10px 0;">Click To Update Model</h3>
                                                                     <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-12 col-xs-12 text-right" style="padding: 20px 15px 10px 0px;">
                                                            <button type="submit" name="update" value="Update" class="btn btnemail1" ><i class="fa fa-pencil"></i>Edit</button>
                                                            <button type="reset" class="btn btnemail1" ><i class="fa fa-eraser"></i>Clear</button>
                                                            <a href="<?php echo base_url()?>Manage-Car-Model"><button type="button" class="btn btnemail1"><i class="fa fa-close"></i>Cancel</button></a>
                                                            <br/>
                                                            <br/>
                                                            <?php
                                                            if(isset($uperror))
                                                            {
                                                            ?>
                                                            <div class="alert alert-danger alert-dismissable">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <?php
                                                                    echo $uperror;
                                                                ?>
                                                            </div>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if(isset($uperr))
                                                            {
                                                            ?>
                                                            <div class="alert alert-danger alert-dismissable">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <?php
                                                                    echo $uperr;
                                                                ?>
                                                            </div>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
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
                                                        </div>
                                                        <hr class="solid mt-sm mb-lg">
                                                    </form>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                    <form method="post" novalidate="" class="sbox my-form" enctype="multipart/form-data">
                                                        
                                                        <div class="col-md-6">
                                                            <P style="font-size: 15px;">Add New Model</P>
                                                            <div class="col-md-12">
                                                                <select name="type" required="" onchange="set_combo(this.value,'company')">
                                                                    <option value="">Select Car Type</option>
                                                                    <?php
                                                                        foreach ($cartype as $val)
                                                                        {
                                                                    ?>
                                                                    <option value="<?php echo $val->category_id; ?>"
                                                                            <?php
                                                                            if(set_select('type' , $val->category_id) && !isset($success))
                                                                            {
                                                                                echo "selected";
                                                                            }
                                                                            ?>
                                                                            ><?php echo $val->category_name; ?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <p class="errmsg"><?php echo form_error('type'); ?></p>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select name="company" required="" id="company">
                                                                    <option value="">Select Car Company</option>

                                                                        <?php
                                                                            if($this->input->post('type') != "")
                                                                            {
                                                                                $cm = $this->md->my_select('tbl_category',array('label'=>'company','parent_id'=>$this->input->post('type')));
                                                                                foreach ($cm as $val)
                                                                                {
                                                                        ?>
                                                                        <option value="<?php echo $val->category_id; ?>"
                                                                                <?php
                                                                                    if(set_select('company',$val->category_id) && !isset($success))
                                                                                    {
                                                                                        echo "selected";
                                                                                    }

                                                                                ?>><?php echo $val->category_name; ?></option>
                                                                        <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                                </select>
                                                                <p class="errmsg"><?php echo form_error('company'); ?></p>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" name="model" placeholder="model" value="<?php if(!isset($success)) { echo set_value('model'); } ?>" class="form-control input-md" required="" pattern="^[a-zA-Z0-9- ]+$"/>
                                                                <p class="errmsg"><?php echo form_error('model'); ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="file" name="modelimg" id="uploadmodel" style="display: none;"/>

                                                            <label id="fileupd" for="uploadmodel" style="width: 100%;">
                                                                 <img id="blah" style="width: 100%;cursor: pointer;"/>
                                                                 <div>
                                                                     <h3  id="btext" style="height:126px;padding-top: 45px;margin: 9px 0 10px 0;">Click To Select Model</h3>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-12 col-xs-12 text-right" style="padding: 20px 15px 10px 0px;">
                                                            <button type="submit" name="add" value="Add" class="btn btnemail1" ><i class="fa fa-plus"></i>Add</button>
                                                            <button type="reset" class="btn btnemail1" ><i class="fa fa-eraser"></i>Clear</button>
                                                            <br/>
                                                            <br/>
                                                           <hr class="solid mt-sm mb-lg">
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
                                                           <?php
                                                            if(isset($fileerr))
                                                            {
                                                            ?>
                                                            <div class="alert alert-danger alert-dismissable">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <?php
                                                                    echo $fileerr;
                                                                ?>
                                                            </div>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        
                                                    </form>
                                                    <?php
                                                    }
                                                    ?>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-12">
                        <section class="panel">
                            <div class="panel-body">
                                <div class="table-responsive" style="overflow-x: unset;">
                                    <table class="table table-striped text-center nova-pagging" >
                                        <thead>
                                            <tr>
                                                <th nova-search="yes">No</th>
                                                <th nova-search="yes">Car Type</th>
                                                <th nova-search="yes">Car Company</th>
                                                <th nova-search="yes">Car Model</th>
                                                <th nova-search="no">Car Image</th>
                                                <th nova-search="no">Edit</th>
                                                <th nova-search="no">Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 0;
                                                foreach ($display as $val) 
                                                {
                                                    $i++;
                                            ?>
                                                <tr>
                                                    <td style="width:5%"><?php echo $i; ?></td>
                                                    <td><?php echo $val->cartype; ?></td>
                                                    <td><?php echo $val->companyname; ?></td>
                                                    <td><?php echo $val->category_name; ?></td>
                                                    <td><img src="<?php base_url();echo $val->image; ?>" style="height: 80px;width: 150px;" /></td>
                                                    <td style="width:5%"><a href="<?php echo base_url(); ?>Update-Car-Model/<?php echo $val->category_id; ?>" title="Edit"><i class="fa fa-pencil edit"></i></a></td>
                                                    <td style="width:5%"><i id='<?php echo $val->category_id; ?>' class="fa fa-trash trash layer" title="Remove" style="color: #76768F;"></i></td>
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
        $this->load->view('admin/footer_script');
        ?>
        
        <script type="text/javascript">
             function readURL(input,a) {

                if (input.files && input.files[0]) {
                  var reader = new FileReader();

                  reader.onload = function(e) {
                    $(a).attr('src', e.target.result);
                    $(a).attr('src', e.target.result);
                    $('#btext').hide();
                    $('#btext1').hide();
                  }

                  reader.readAsDataURL(input.files[0]);
                }
            }

            $("#uploadmodel").change(function() {
              readURL(this,'#blah');
            });
            $("#uploadmodel1").change(function() {
              readURL(this,'#blah1');
            });
            
            
            paging(1);
        </script>
    </body>
</html>