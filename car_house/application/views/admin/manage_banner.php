
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
                                        Are You Sure You Want To Delete Banner ?    
                                   </div>
                                   <br/>
                                   <br/>
                                   <div class="col-sm-12 col-xs-12 col-md-12 text-center">
                                       <a href="<?php echo base_url(); ?>Delete/banner/" id="cyes"><button type="button" class="btn pl-xl pr-xl" name="yes" value="yes" style="background-color: #FF6200;color: white;">Yes</button></a>
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
                        <h2>Manage Banner</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Admin-Home">
                                        <i class="fa fa-home dashboard" ></i>
                                    </a>
                                </li>
                                <li><span class="dashboardname" >Manage Banner</span></li>
                            </ol>
                        </div>
                    </header>

                    <div class="col-md-12">
                        <section class="panel">
                            <div class="panel-body emailbody">
                                <div class="row">
                                    <div class="col-xl-12 col-md-6 col-md-6">
                                        <section class="panel panel-transparent">
                                            <div class="panel-body">
                                                <section class="panel panel-group emaildisplay">
                                                    <div id="accordion">
                                                        <div class="panel panel-accordion panel-accordion-first">
                                                            <div id="collapse1One" class="accordion-body collapse in">
                                                                <div class="panel-body sbox">
                                                                    <form method="post"enctype="multipart/form-data" novalidate="">
                                                                        <P style="font-size: 15px;">Add To New Banner Here</P>
                                                                        <div class="col-md-12">

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
                                                                    <div class="col-md-12">
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
                                                                    <div class="col-md-12">
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
                                                                        
                                                                        <input type="file" name="photo" id="upload" style="display: none;"/>

                                                                        <label id="fileupd" for="upload" style="width: 100%;">
                                                                             
                                                                            <div>
                                                                                <img id="blah" style="cursor: pointer;height: 100px;width: 96%;"/>
                                                                                <h3  id="btext">Click To Select Banner</h3>
                                                                            </div>
                                                                        </label>
                                                                        <div class="col-md-12 col-xs-12" style="padding: 20px 0 10px 0;">
                                                                            <button type="submit" name="add" value="add" class="btn btnemail1"><i class="fa fa-plus"></i>Add</button>
                                                                            <button type="reset" class="btn btnemail1"><i class="fa fa-eraser"></i>Clear</button>
                                                                        </div>
                                                                        <br/><br/><br/><br/>
                                                                        
                                                                        <div>
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
                                                                <th nova-search="yes">Banner</th>
                                                                <th nova-search="no">Status</th>
                                                                <th nova-search="no">Remove</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $i = 0;
                                                            foreach($select as $val)
                                                            {
                                                                $i++;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>
                                                                    <td style="width:186px;"><img src="<?php echo base_url().$val->path; ?>" width="150px" /></td>
                                                                <?php
                                                                if($val->status == 0)
                                                                {
                                                                ?>
                                                                    <td style="width: 50px;height: 75px;"><i id="<?php echo $val->banner_id; ?>" class="fa fa-toggle-off toggle1" onclick="toggle(this.id,'banner');" title="Deactive"/></i></td>
                                                                <?php
                                                                }
                                                                if($val->status == 1)
                                                                {
                                                                ?>
                                                                    <td style="width: 50px;height: 75px;"><i id="<?php echo $val->banner_id; ?>" class="fa fa-toggle-on toggle1" onclick="toggle(this.id,'banner');" title="Active"/></i></td>
                                                               <?php
                                                                }
                                                                ?>
                                                                    <td><i id='<?php echo $val->banner_id; ?>' class="fa fa-trash trash layer" title="Remove" ></i></td>
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
                            </div>
                        </section>
                    </div>
                </section>
            </div>
            <script src="<?php echo base_url(); ?>assets/javascripts/set.js" type="text/javascript"></script>
            <?php
            $this->load->view('admin/footer_script');
            ?>
            
        </section>
        <script type="text/javascript">
            $("#blah").hide();
            function readURL(input) {

                if (input.files && input.files[0]) {
                  var reader = new FileReader();

                  reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                    $('#btext').hide();
                    $('#blah').show();
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
<script type="text/javascript">
            paging(1);
</script>

