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
                                         Are You Sure You Want To Delete Specification ?    
                                    </div>
                                    <br/>
                                    <br/>
                                    <div class="col-sm-12 col-xs-12 col-md-12 text-center">
                                        <a href="<?php echo base_url(); ?>Delete/specification/" id="cyes"><button type="button" class="btn pl-xl pr-xl" name="yes" value="yes" style="background-color: #FF6200;color: white;">Yes</button></a>
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
                        <h2>Manage Specification</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Admin-Home">
                                        <i class="fa fa-home dashboard"></i>
                                    </a>
                                </li>
                                <li><span class="dashboardname">Manage Specification</span></li>
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
                                                        if(isset($upspecification))
                                                        {
                                                    ?>
                                                    <form method="post" novalidate="" class="sbox my-form" >
                                                        <P style="font-size: 15px;">Update Specification</P>
                                                        <div class="col-md-6 col-xs-12">
                                                            <select name="uptype" required="" onchange="set_combo(this.value,'company');set_combo(0,'model')">
                                                                <option value="">Select Car Type</option>
                                                                <?php
                                                                    foreach ($type as $val)
                                                                    {
                                                                ?>
                                                                <option value="<?php echo $val->category_id; ?>"
                                                                        <?php
                                                                        if($this->input->post('uptype') != "")
                                                                        {
                                                                            if(set_select('uptype',$val->category_id))
                                                                            {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                        else
                                                                        {
                                                                            if($this->input->post('update') && $this->input->post('uptype') == "")
                                                                            {
                                                                                if(set_select('uptype' , ""))
                                                                                {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                            else
                                                                            {
                                                                                if($upcompany[0]->parent_id == $val->category_id)
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
                                                            <select name="ucompany" required="" onchange="set_combo(this.value,'model')" id="company">
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
                                                                            if(set_select('ucompany' , ""))
                                                                            {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                        else
                                                                        {
                                                                            foreach($company as $val)
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
                                                                                if($upmodel[0]->parent_id == $val->category_id)
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
                                                            <select name="umodel" required="" onchange="set_combo(this.value,'setname')" id="model">
                                                                <option value="">Select Car Model</option>
                                                                <?php
                                                                    if($this->input->post('uptype') != "")
                                                                    {
                                                                        $md = $this->md->my_select('tbl_category',array('label'=>'model','parent_id'=>$this->input->post('ucompany')));
                                                                        foreach ($md as $val)
                                                                        {
                                                                ?>
                                                                <option value="<?php echo $val->category_id; ?>"
                                                                        <?php
                                                                            if(set_select('umodel',$val->category_id) && !isset($success))
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
                                                                            if(set_select('umodel' , ""))
                                                                            {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                        else
                                                                        {
                                                                            foreach($model as $val)
                                                                        {
                                                                ?>
                                                                <option value="<?php echo $val->category_id; ?>"
                                                                        <?php
                                                                            if($this->input->post('update'))
                                                                            {
                                                                                if(set_select('umodel',$val->categor_id))
                                                                                {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                            else
                                                                            {
                                                                                if($upsset[0]->category_id ==  $val->category_id)
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
                                                            <p class="errmsg"><?php echo form_error('umodel'); ?></p>
                                                            <select name="uset" required="" id="setname">
                                                                <option value="">Select Specification Set Name</option>
                                                                <?php
                                                                    if($this->input->post('uptype') != "")
                                                                    {
                                                                       $sname= $this->md->my_select('tbl_attribute_set',array('category_id'=>$this->input->post('umodel')));
                                                                        foreach ($sname as $val)
                                                                        {
                                                                ?>
                                                                <option value="<?php echo $val->set_id ?>"
                                                                        <?php
                                                                            if(set_select('uset',$val->set_id) && !isset($success))
                                                                            {
                                                                                echo "selected";
                                                                            }
                                                                        ?>
                                                                        ><?php echo $val->set_name; ?></option>
                                                                <?php
                                                                        }
                                                                    }
                                                                    else
                                                                    {
                                                                        if($this->input->post('update') && $this->input->post('uptype') == "")
                                                                        {
                                                                            if(set_select('uset' , ""))
                                                                            {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                        else
                                                                        {
                                                                            foreach($fsetname as $val)
                                                                        {
                                                                ?> 
                                                                <option value="<?php echo $val->set_id; ?>"
                                                                        <?php
                                                                            if($this->input->post('update'))
                                                                            {
                                                                                if(set_select('uset',$val->categor_id))
                                                                                {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                            else
                                                                            {
                                                                                if($upsset[0]->set_id == $val->set_id)
                                                                                {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                        ?>
                                                                        ><?php echo $val->set_name; ?></option>
                                                                <?php
                                                                        }
                                                                        }
                                                                    }
                                                                ?>
                                                            </select>
                                                            <p class="errmsg"><?php echo form_error('uset'); ?></p>
                                                        </div>
                                                        <div class="col-md-6 col-xs-12">
                                                            <input type="text" name="uspecificationname" value="<?php if($this->input->post('uspecificationname')) { echo set_value('uspecificationname'); }else{ echo $upspecification[0]->attribute_name; }?>" placeholder="Specification name" class="form-control input-md" required="" pattern="^[a-zA-Z0-9-, ]+$" style="margin-top: 5px"/>
                                                            <p class="errmsg"><?php echo form_error('uspecificationname'); ?></p>
                                                            <select name="uspecificationtype" required="" id="hidespe">
                                                                <option value="">Select Specification Type</option>
                                                                <?php
                                                                    $type = array('Textbox','Selectbox','Boolean','Checkbox');
                                                                    for($i=0;$i<4;$i++)
                                                                    {
                                                                ?>
                                                                <option value="<?php echo $type[$i]; ?>"
                                                                        <?php
                                                                            if($this->input->post('uspecificationtype') != "")
                                                                            {
                                                                                if(set_select('uspecificationtype',$type[$i]) && !isset($success))
                                                                                {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                            else
                                                                            {
                                                                                if($upspecification[0]->attribute_type == $type[$i])
                                                                                {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                        ?>
                                                                        ><?php echo $type[$i]; ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                            <p class="errmsg"><?php echo form_error('uspecificationtype'); ?></p>
                                                            <div style="display: none;" id="spevalue">
                                                                <input type="text" name="uspevalue" value="<?php if($this->input->post('update')) { echo set_value('uspevalue'); }else{ echo $upspecification[0]->attribute_value; }?>" placeholder="Specification Value ( value 1,value 2,value n )" class="form-control input-md" required="" pattern="^[a-zA-Z0-9-, ]+$"/>
                                                                <p class="errmsg"><?php echo form_error('uspevalue'); ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-xs-12 text-right" style="padding: 20px 15px 10px 0px;">
                                                            <button type="submit" name="update" value="Update" class="btn btnemail1"><i class="fa fa-pencil"></i>Edit</button>
                                                            <button type="reset" class="btn btnemail1"><i class="fa fa-eraser"></i>Clear</button>
                                                           <a href="<?php echo base_url()?>Manage-Specification"><button type="button" class="btn btnemail1"><i class="fa fa-close"></i>Cancel</button></a>
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
                                                    <form method="post" novalidate="" class="sbox my-form" >
                                                        <P style="font-size: 15px;">Add New Specification</P>
                                                        <div class="col-md-6 col-xs-12">
                                                            <select name="type" required="" onchange="set_combo(this.value,'company');set_combo(0,'model')">
                                                                <option value="">Select Car Type</option>
                                                                <?php
                                                                    foreach ($type as $val)
                                                                    {
                                                                ?>
                                                                <option value="<?php echo $val->category_id; ?>"
                                                                        <?php
                                                                        
                                                                            if(set_select('type',$val->category_id) && !isset($success))
                                                                            {
                                                                                echo 'selected';
                                                                            }
                                                                        
                                                                        ?>
                                                                        ><?php echo $val->category_name; ?></option>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </select>
                                                            <p class="errmsg"><?php echo form_error('type'); ?></p>
                                                            <select name="company" required="" onchange="set_combo(this.value,'model')" id="company">
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
                                                            <select name="model" required="" onchange="set_combo(this.value,'setname')" id="model">
                                                                <option value="">Select Car Model</option>
                                                                <?php
                                                                    if($this->input->post('type') != "")
                                                                    {
                                                                        $md = $this->md->my_select('tbl_category',array('label'=>'model','parent_id'=>$this->input->post('company')));
                                                                        foreach ($md as $val)
                                                                        {
                                                                ?>
                                                                <option value="<?php echo $val->category_id; ?>"
                                                                        <?php
                                                                            if(set_select('model',$val->category_id) && !isset($success))
                                                                            {
                                                                                echo "selected";
                                                                            }

                                                                        ?>><?php echo $val->category_name; ?></option>
                                                                <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            </select>
                                                            <p class="errmsg"><?php echo form_error('model'); ?></p>
                                                            <select name="set" required="" id="setname">
                                                                <option value="">Select Specification Set Name</option>
                                                                <?php
                                                                    if($this->input->post('type') != "")
                                                                    {
                                                                       $sname= $this->md->my_select('tbl_attribute_set',array('category_id'=>$this->input->post('model')));
                                                                        foreach ($sname as $val)
                                                                        {
                                                                ?>
                                                                <option value="<?php echo $val->set_id ?>"
                                                                        <?php
                                                                            if(set_select('set',$val->set_id) && !isset($success))
                                                                            {
                                                                                echo "selected";
                                                                            }
                                                                        ?>
                                                                        ><?php echo $val->set_name; ?></option>
                                                                <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            </select>
                                                            <p class="errmsg"><?php echo form_error('set'); ?></p>
                                                        </div>
                                                        <div class="col-md-6 col-xs-12">
                                                            <input type="text" name="specificationname" value="<?php if(!isset($success)) { echo set_value('specificationname'); } ?>" placeholder="Specification name" class="form-control input-md" required="" pattern="^[a-zA-Z0-9-, ]+$"/>
                                                            <p class="errmsg"><?php echo form_error('specificationname'); ?></p>
                                                            <select name="specificationtype" required="" id="hidespe">
                                                                <option value="">Select Specification Type</option>
                                                                <?php
                                                                    $type = array('Textbox','Selectbox','Boolean','Checkbox');
                                                                    for($i=0;$i<4;$i++)
                                                                    {
                                                                ?>
                                                                <option value="<?php echo $type[$i]; ?>"
                                                                        <?php
                                                                            if(set_select('specificationtype',$type[$i]) && !isset($success))
                                                                            {
                                                                                echo 'selected';
                                                                            }
                                                                        ?>
                                                                        ><?php echo $type[$i]; ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                            <p class="errmsg"><?php echo form_error('specificationtype'); ?></p>
                                                            <div style="display: none;" id="spevalue">
                                                                <input type="text" name="spevalue" value="<?php if(!isset($success)) { echo set_value('spevalue'); } ?>" placeholder="Specification Value ( value 1,value 2,value n )" class="form-control input-md" required="" pattern="^[a-zA-Z0-9-, ]+$" style="margin-top: 15px;"/>
                                                            <p class="errmsg"><?php echo form_error('spevalue'); ?></p>
                                                            </div>
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
                                                <th nova-search="yes">Car Type</th>
                                                <th nova-search="yes">Car Company</th>
                                                <th nova-search="yes">Car Model</th>
                                                <th nova-search="yes">Set Name</th>
                                                <th nova-search="yes">Specification Name</th>
                                                <th nova-search="yes">Specification Type</th>
                                                <th nova-search="yes">Specification Value</th>
                                                <th nova-search="no">Edit</th>
                                                <th nova-search="no">Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 0;
                                                foreach($display as $val)
                                                {
                                                    $i++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $val->dtype; ?></td>
                                                    <td><?php echo $val->dcompany; ?></td>
                                                    <td><?php echo $val->dmodel; ?></td>
                                                    <td><?php echo $val->dset; ?></td>
                                                    <td><?php echo $val->attribute_name; ?></td>
                                                    <td><?php echo $val->attribute_type; ?></td>
                                                    <td><?php echo $val->attribute_value; ?></td>
                                                    <td><a href="<?php echo base_url(); ?>Update-Specification/<?php echo $val->attribute_id; ?>" title="Edit"><i class="fa fa-pencil edit"></i></a></td>
                                                    <td><i id='<?php echo $val->attribute_id; ?>' class="fa fa-trash trash layer" title="Remove" style="color: #76768F;"></i></td>
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