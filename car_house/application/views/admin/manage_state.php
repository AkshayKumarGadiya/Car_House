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
                                         Are You Sure You Want To Delete State ?    
                                    </div>
                                    <br/>
                                    <br/>
                                    <div class="col-sm-12 col-xs-12 col-md-12 text-center">
                                        <a href="<?php echo base_url(); ?>Delete/state/" id="cyes"><button type="button" class="btn pl-xl pr-xl" name="yes" value="yes" style="background-color: #FF6200;color: white;">Yes</button></a>
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
                        <h2>Manage State</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Admin-Home">
                                        <i class="fa fa-home dashboard"></i>
                                    </a>
                                </li>
                                <li><span class="dashboardname">Manage State</span></li>
                            </ol>
                        </div>
                    </header>

                    <div class="col-md-12">
                        <section class="panel">
                            <div class="row">
                                <div class="col-xl-12 col-md-6 col-md-6">
                                    <section class="panel panel-transparent">
                                        <div class="panel-body">
                                            <section class="panel panel-group emaildisplay">
                                                <div id="accordion">
                                                    <div class="panel panel-accordion panel-accordion-first">
                                                        <div id="collapse1One" class="accordion-body collapse in">
                                                            <div class="panel-body">
                                                                <?php
                                                                    if(isset($editstate))
                                                                    {
                                                                ?>
                                                                <form method="post" novalidate="" class="my-form">
                                                                    <p style="font-size: 15px;">Update State</p>
                                                                    <br/>
                                                                    <input type="text" placeholder="State" name="upstate" value="<?php if($this->input->post('update')) { echo set_value('upstate'); }else{ echo $editstate[0]->name; } ?>" class="form-control input-md" required="" pattern="^[a-zA-Z ]+$"/> 
                                                                    <p class="errmsg"><?php echo form_error('upstate'); ?></p>
                                                                    <div class="col-md-12 col-xs-12" style="padding: 20px 0 10px 0;">
                                                                        <button type="submit" name="update" value="Update" class="btn btnemail1"><i class="fa fa-pencil"></i>Edit</button>
                                                                        <button type="reset" class="btn btnemail1"><i class="fa fa-eraser"></i>Clear</button>
                                                                        <a href="<?php echo base_url()?>Manage-State"><button type="button" class="btn btnemail1"><i class="fa fa-close"></i>Cancel</button></a>
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
                                                                <form method="post" novalidate="" class="my-form">
                                                                    <p style="font-size: 15px;">Add New State</p>
                                                                    <br/>
                                                                    <input type="text" placeholder="State" name="state" value="<?php if(!isset($success)){ echo set_value('state');} ?>" class="form-control input-md" required="" pattern="^[a-zA-Z ]+$"/> 
                                                                    <p class="errmsg"><?php echo form_error('state'); ?></p>
                                                                    <div class="col-md-12 col-xs-12" style="padding: 20px 0 10px 0;">
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
                                <div class="col-xl-12 col-xs-12 col-lg-6 col-md-6">
                                    <section class="panel">
                                        <div class="panel-body">
                                            <div class="table-responsive" style="overflow-x: unset;">
                                                <table class="table table-striped text-center nova-pagging" >
                                                    <thead>
                                                        <tr>
                                                            <th nova-search="yes">No</th>
                                                            <th nova-search="yes">State</th>
                                                            <th nova-search="no">Edit</th>
                                                            <th nova-search="no">Remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 0;
                                                        foreach ($statedata as $val){
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td style="width:10%"><?php echo $i; ?></td>
                                                                <td style="width:70%"><?php echo $val->name; ?></td>
                                                                <td style="width:10%"><a href="<?php echo base_url(); ?>Update/<?php echo $val->location_id; ?>" title="Edit"><i class="fa fa-pencil edit" /></i></a></td>
                                                                <td style="width:10%"><i id="<?php echo $val->location_id; ?>" class="fa fa-trash trash layer" title="Remove" style="color: #76768F;"></i></td>
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