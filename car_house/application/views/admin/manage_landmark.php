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
                                         Are You Sure You Want To Delete Landmark ?    
                                    </div>
                                    <br/>
                                    <br/>
                                    <div class="col-sm-12 col-xs-12 col-md-12 text-center">
                                        <a href="<?php echo base_url(); ?>Delete/landmark/" id="cyes"><button type="button" class="btn pl-xl pr-xl" name="yes" value="yes" style="background-color: #FF6200;color: white;">Yes</button></a>
                                        <button type="button" class="btn btn-primary pl-xl pr-xl" name="close" id="btncls" style="background-color: #FF6200; outline: 0;">No</button>
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
                        <h2>Manage Landmark</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Admin-Home">
                                        <i class="fa fa-home dashboard"></i>
                                    </a>
                                </li>
                                <li><span class="dashboardname">Manage Landmark</span></li>
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
                                                    if(isset($uplandmark))
                                                    {
                                                    ?>
                                                    <form method="post" novalidate="" class="my-form sbox">
                                                        <p style="font-size: 15px;">Update Landmark</p>
                                                        <div class="col-md-4">
                                                            <select name="upstate" onchange="set_combo(this.value,'city');set_combo(0,'area')">
                                                                <option value="">Select State</option>
                                                                <?php
                                                                foreach ($state as $val)
                                                                {
                                                                ?>
                                                                <option value="<?php echo $val->location_id; ?>"
                                                                <?php
                                                                    if($this->input->post('upstate') != "")
                                                                    {
                                                                        if(set_select('upstate',$val->location_id))
                                                                        {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    else
                                                                    {
                                                                        if($this->input->post('update') && $this->input->post('upstate') == "")
                                                                        {
                                                                            if(set_select('upstate',""))
                                                                            {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                        else
                                                                        {
                                                                            if($upcit[0]->parent_id == $val->location_id)
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
                                                        <p class="errmsg"><?php echo form_error('upstate'); ?></p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <select name="upcity" required="" onchange="set_combo(this.value,'area')" id="city">
                                                                <option value="">Select City</option>
                                                                
                                                                <?php
                                                                    if($this->input->post('upstate') != "")
                                                                    {
                                                                        $ct = $this->md->my_select('tbl_location',array('lable'=>'city','parent_id'=>$this->input->post('upstate')));
                                                                        foreach ($ct as $val)
                                                                        {
                                                                ?>
                                                                <option value="<?php echo $val->location_id; ?>"
                                                                        <?php
                                                                            if(set_select('upcity',$val->location_id))
                                                                            {
                                                                                echo "selected";
                                                                            }
                                                                        
                                                                        ?>><?php echo $val->name; ?></option>
                                                                <?php
                                                                        }
                                                                    }
                                                                    else
                                                                    {
                                                                        if($this->input->post('update') && $this->input->post('upstate') == "")
                                                                        {
                                                                            if(set_select('upcity',""))
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
                                                                            if($this->input->post('update'))
                                                                            {
                                                                                if(set_select('upcity',$val->location_id))
                                                                                {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                            else
                                                                            {
                                                                                if($uparea[0]->parent_id == $val->location_id)
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
                                                            <p class="errmsg"><?php echo form_error('upcity'); ?></p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <select name="uparea" required="" id="area">
                                                                <option value="">Select Area</option>
                                                                <?php
                                                                    if($this->input->post('upcity') != "")
                                                                    {
                                                                        $area = $this->md->my_select('tbl_location',array('lable'=>'area','parent_id'=>$this->input->post('upcity')));
                                                                        foreach ($area as $val)
                                                                        {
                                                                ?>
                                                                <option value="<?php echo $val->location_id; ?>"
                                                                        <?php
                                                                            if(set_select('uparea',$val->location_id))
                                                                            {
                                                                                echo "selected";
                                                                            }
                                                                        
                                                                        ?>><?php echo $val->name; ?></option>
                                                                <?php
                                                                        }
                                                                    }
                                                                    else
                                                                    {
                                                                        if($this->input->post('update') && $this->input->post('upcity') == "")
                                                                        {
                                                                            if(set_select('uparea',""))
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
                                                                            if($this->input->post('update'))
                                                                            {
                                                                                if(set_select('upcity',$val->location_id))
                                                                                {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                            else
                                                                            {
                                                                                if($uplandmark[0]->parent_id == $val->location_id)
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
                                                            <p class="errmsg"><?php echo form_error('uparea'); ?></p>
                                                        </div>
                                                        <div class="col-md-12" style="margin-top: 15px;">
                                                            <input type="text" name="uplandmark" value="<?php if($this->input->post('update')) { echo set_value('uplandmark'); }else{ echo $uplandmark[0]->name; } ?>" placeholder="Landmark" class="form-control input-md" required="" pattern="^[a-zA-Z ]+$"/>
                                                            <p class="errmsg"><?php echo form_error('uplandmark'); ?></p>
                                                        </div>
                                                        <div class="col-md-12 col-xs-12 text-right" style="padding: 20px 15px 10px 0px;">
                                                            <button type="submit" name="update" value="Update" class="btn btnemail1"><i class="fa fa-pencil"></i>Edit</button>
                                                            <button type="reset" class="btn btnemail1"><i class="fa fa-eraser"></i>Clear</button>
                                                            <a href="<?php echo base_url(); ?>Manage-Landmark"><button type="button" class="btn btnemail1"><i class="fa fa-close"></i>Cancel</button></a>
                                                            <br/>
                                                            <br/>
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
                                                        </div>
                                                        <hr class="solid mt-sm mb-lg">
                                                    </form>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                    <form method="post" novalidate="" class="my-form sbox">
                                                        <p style="font-size: 15px;">Add New Landmark</p>
                                                        <div class="col-md-4">
                                                            <select name="state" onchange="set_combo(this.value,'city');set_combo(0,'area')">
                                                                <option value="">Select State</option>
                                                                <?php
                                                                foreach ($statedata as $val)
                                                                {
                                                                ?>
                                                                <option value="<?php echo $val->location_id; ?>"
                                                                <?php
                                                                    if(!isset($success) && set_select('state',$val->location_id))
                                                                    {
                                                                        echo "selected";
                                                                    }
                                                                ?>
                                                                ><?php echo $val->name; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        <p class="errmsg"><?php echo form_error('state'); ?></p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <select name="city" required="" onchange="set_combo(this.value,'area')" id="city">
                                                                <option value="">Select City</option>
                                                                
                                                                <?php
                                                                    if($this->input->post('state') != "")
                                                                    {
                                                                        $ct = $this->md->my_select('tbl_location',array('lable'=>'city','parent_id'=>$this->input->post('state')));
                                                                        foreach ($ct as $val)
                                                                        {
                                                                ?>
                                                                <option value="<?php echo $val->location_id; ?>"
                                                                        <?php
                                                                            if(!isset($success) && set_select('city',$val->location_id))
                                                                            {
                                                                                echo "selected";
                                                                            }
                                                                        
                                                                        ?>><?php echo $val->name; ?></option>
                                                                <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            </select>
                                                            <p class="errmsg"><?php echo form_error('city'); ?></p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <select name="area" required="" id="area">
                                                                <option value="">Select Area</option>
                                                                <?php
                                                                    if($this->input->post('city') != "")
                                                                    {
                                                                        $area = $this->md->my_select('tbl_location',array('lable'=>'area','parent_id'=>$this->input->post('city')));
                                                                        foreach ($area as $val)
                                                                        {
                                                                ?>
                                                                <option value="<?php echo $val->location_id; ?>"
                                                                        <?php
                                                                            if(!isset($success) && set_select('area',$val->location_id))
                                                                            {
                                                                                echo "selected";
                                                                            }
                                                                        
                                                                        ?>><?php echo $val->name; ?></option>
                                                                <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            </select>
                                                            <p class="errmsg"><?php echo form_error('area'); ?></p>
                                                        </div>
                                                        <div class="col-md-12" style="margin-top: 15px;">
                                                            <input type="text" name="landmark" value="<?php if(!isset($success)) { echo set_value('landmark');  }?>" placeholder="Landmark" class="form-control input-md" required="" pattern="^[a-zA-Z ]+$"/>
                                                            <p class="errmsg"><?php echo form_error('landmark'); ?></p>
                                                        </div>
                                                        <div class="col-md-12 col-xs-12 text-right" style="padding: 20px 15px 10px 0px;">
                                                            <button type="submit" name="add" value="Add" class="btn btnemail1"><i class="fa fa-plus"></i>Add</button>
                                                            <button type="reset" class="btn btnemail1"><i class="fa fa-eraser"></i>Clear</button>
                                                            <br/>
                                                            <br/>
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
                                                        </div>
                                                        <hr class="solid mt-sm mb-lg">
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
                                                <th nova-search="yes">State</th>
                                                <th nova-search="yes">City</th>
                                                <th nova-search="yes">Area</th>
                                                <th nova-search="yes">Landmark</th>
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
                                                        <td><?php echo $val->state; ?></td>
                                                        <td><?php echo $val->city; ?></td>
                                                        <td><?php echo $val->area; ?></td>
                                                        <td><?php echo $val->name; ?></td>
                                                        <td style="width:5%"><a href="<?php echo base_url(); ?>Update-Landmark/<?php echo $val->location_id; ?>" title="Edit"><i class="fa fa-pencil edit"></i></a></td>
                                                        <td style="width:5%"><i id='<?php echo $val->location_id; ?>' class="fa fa-trash trash layer" title="Remove" style="color: #76768F;"></i></td>
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
            paging(1);
        </script>
    </body>
</html>