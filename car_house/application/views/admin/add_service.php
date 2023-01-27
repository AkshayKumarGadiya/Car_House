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
                                         Are You Sure You Want To Delete Car Service ?    
                                    </div>
                                    <br/>
                                    <br/>
                                    <div class="col-sm-12 col-xs-12 col-md-12 text-center">
                                        <a href="<?php echo base_url(); ?>Delete/service/" id="cyes"><button type="button" class="btn pl-xl pr-xl" name="yes" value="yes" style="background-color: #FF6200;color: white;">Yes</button></a>
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
                        <h2>Manage Car Service</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Admin-Home">
                                        <i class="fa fa-home dashboard"></i>
                                    </a>
                                </li>
                                <li><span class="dashboardname">Manage Car Service</span></li>
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
                                                    if(isset($updateservice))
                                                    {
                                                    ?>
                                                    <form method="post" novalidate="" class="sbox my-form">
                                                        <div class="col-md-12">
                                                            <P style="font-size: 15px;">Update Car Service</P>
                                                        <div class="col-md-4">
                                                            <select name="uptype" required="" onchange="set_combo(this.value,'company');set_combo(0,'model')">
                                                                <option value="">Select Car Type</option>
                                                                <?php
                                                                    foreach($cartype as $val)
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
                                                                                    if(set_select('uptype',""))
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
                                                        </div>
                                                        <div class="col-md-4">
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
                                                                            if(set_select('ucompany',""))
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
                                                        </div>
                                                        <div class="col-md-4">
                                                            <select name="upmodel" required="" id="model">
                                                                <option value="">Select Car Model</option>
                                                                
                                                                <?php
                                                                    if($this->input->post('uptype') != "")
                                                                    {
                                                                        $cm = $this->md->my_select('tbl_category',array('label'=>'model','parent_id'=>$this->input->post('ucompany')));
                                                                        foreach ($cm as $val)
                                                                        {
                                                                ?>
                                                                <option value="<?php echo $val->category_id; ?>"
                                                                        <?php
                                                                            if(set_select('upmodel',$val->category_id))
                                                                            {
                                                                                echo "selected";
                                                                            }

                                                                        ?>><?php echo $val->category_name; ?></option>
                                                                <?php
                                                                        }
                                                                    }
                                                                    else
                                                                    {
                                                                            if($this->input->post('update') && $this->input->post('ucompany') == "")
                                                                            {
                                                                                if(set_select('upmodel',""))
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
                                                                                    if(set_select('upmodel',$val->category_id))
                                                                                    {
                                                                                        echo 'selected';
                                                                                    }
                                                                                }
                                                                                else
                                                                                {
                                                                                    
                                                                                    if($updateservice[0]->category_id == $val->category_id)
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
                                                            <p class="errmsg"><?php echo form_error('upmodel'); ?></p>
                                                        </div>
                                                            <div class="col-md-4">
                                                                <input type="text" name="uservice" value="<?php if($this->input->post('uservice')) { echo set_value('uservice'); }else{ echo $updateservice[0]->name; }?>" placeholder="Service Name" class="form-control input-md" required="" pattern="^[a-zA-Z ]+$"/>
                                                                <p class="errmsg"><?php echo form_error('uservice'); ?></p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="text" name="uprice" value="<?php if($this->input->post('uprice')) { echo set_value('uprice'); }else{ echo $updateservice[0]->price; }?>" placeholder="Enter Price" class="form-control input-md" required="" pattern="^[0-9]+$"/>
                                                                <p class="errmsg"><?php echo form_error('uprice'); ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-xs-12 text-right" style="padding: 20px 15px 10px 0px;">
                                                            <button type="submit" name="update" value="Update" class="btn btnemail1" ><i class="fa fa-edit"></i>Update</button>
                                                            <a href="<?php echo base_url(); ?>Manage-Car-Service"><button type="button" name="cancle" value="Cancel" class="btn btnemail1" ><i class="fa fa-close"></i>Cancel</button></a>
                                                            <br/>
                                                            <br/>
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
                                                    </form>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                    <form method="post" novalidate="" class="sbox my-form">
                                                        <div class="col-md-12">
                                                            <P style="font-size: 15px;">Add Car Service</P>
                                                                <div class="col-md-4">

                                                                <select name="type" required="" onchange="set_combo(this.value,'company');set_combo(0,'model')">
                                                                    <option value="">Select Car Type</option>
                                                                    <?php
                                                                        foreach($cartype as $val)
                                                                        {
                                                                    ?>
                                                                    <option value="<?php echo $val->category_id; ?>"
                                                                            <?php
                                                                                if(!isset($success) && set_select('type',$val->category_id))
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
                                                            <div class="col-md-4">
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
                                                                                if(!isset($success) && set_select('company',$val->category_id))
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
                                                            <div class="col-md-4">
                                                                <select name="model" required="" id="model">
                                                                    <option value="">Select Car Model</option>

                                                                    <?php
                                                                        if($this->input->post('type') != "")
                                                                        {
                                                                            $cm = $this->md->my_select('tbl_category',array('label'=>'model','parent_id'=>$this->input->post('company')));
                                                                            foreach ($cm as $val)
                                                                            {
                                                                    ?>
                                                                    <option value="<?php echo $val->category_id; ?>"
                                                                            <?php
                                                                                if(!isset($success) && set_select('model',$val->category_id))
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
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="text" name="service" placeholder="Service Name" value="<?php if(!isset($success)){ echo set_value('service'); } ?>" class="form-control input-md" required="" pattern="^[a-zA-Z ]+$"/>
                                                                <p class="errmsg"><?php echo form_error('service'); ?></p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="text" name="price" placeholder="Enter Price" value="<?php if(!isset($success)){ echo set_value('price'); } ?>" class="form-control input-md" required="" pattern="^[0-9]+$"/>
                                                                <p class="errmsg"><?php echo form_error('price'); ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-xs-12 text-right" style="padding: 20px 15px 10px 0px;">
                                                            <button type="submit" name="add" value="Add" class="btn btnemail1" ><i class="fa fa-plus"></i>Add</button>
                                                            <button type="reset" class="btn btnemail1" ><i class="fa fa-eraser"></i>Clear</button>
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
                            <div class="col-xl-12 col-xs-12 col-lg-12 col-md-12">
                                    <section class="panel">
                                        <div class="panel-body">
                                            <div class="table-responsive" style="overflow-x: unset;" >
                                                <table class="table table-striped text-center nova-pagging" >
                                                    <thead>
                                                        <tr>
                                                            <th nova-search="yes">No</th>
                                                            <th nova-search="yes">Car Type</th>
                                                            <th nova-search="yes">Car Company</th>
                                                            <th nova-search="yes">Car Model</th>
                                                            <th nova-search="yes">Service Name</th>
                                                            <th nova-search="yes">Price</th>
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
                                                                <td><?php echo $val->type; ?></td>
                                                                <td><?php echo $val->company; ?></td>
                                                                <td><?php echo $val->model; ?></td>
                                                                <td><?php echo $val->name; ?></td>
                                                                <td><?php echo $val->price; ?></td>
                                                                <td style="width:5%"><a href="<?php echo base_url(); ?>Update-Service/<?php echo $val->service_id; ?>" title="Edit"><i class="fa fa-pencil edit"/></i></a></td>
                                                                <td style="width:5%"><i id='<?php echo $val->service_id; ?>' class="fa fa-trash trash layer" title="Remove" style="color: #76768F;"></i></td>
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

