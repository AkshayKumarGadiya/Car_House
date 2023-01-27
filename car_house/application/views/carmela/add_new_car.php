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
                        <h2>Add New Car</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Carmela-Home">
                                        <i class="fa fa-home" style="padding-right: 5px;font-size: 17px;margin-top: -4px"></i>
                                    </a>
                                </li>
                                <li><span style="padding-right: 25px;font-size: 13px;">Add New Car</span></li>
                            </ol>
                        </div>
                    </header>

                    <!-- start: page -->
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <section class="panel">
                                <form method="post" novalidate="" class="my-form">
                                <div class="panel-body">
                                    
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-xs-12">
                                            <p style="font-size: 15px;font-weight: bold;">Add Basic Detail</p>
                                            
                                                <input type="text" placeholder="Car Name" name="carname" value="<?php if(!isset($success)) { echo set_value('carname'); } ?>" class="form-control input-md" style="font-size: 12px;" required="" pattern="^[a-zA-Z ]+$"/>
                                                <p class="errmsg"><?php echo form_error('carname'); ?></p>
                                                <select name="type_id" required="" onchange="set_combo(this.value,'company');set_combo(0,'model');set_combo(0,'submodel')" style="width:100%;background-color: #FFFFFF;">
                                                    <option value="">Select Car Type</option>
                                                    <?php
                                                        foreach($cartype as $val)
                                                        {
                                                    ?>
                                                    <option value="<?php echo $val->category_id; ?>"
                                                            <?php
                                                                if(!isset($success) && set_select('type_id',$val->category_id))
                                                                {
                                                                    echo "selected";
                                                                }
                                                            ?>
                                                            ><?php echo $val->category_name; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <p class="errmsg"><?php echo form_error('type_id'); ?></p>
                                                <select name="company_id" required="" id="company" onchange="set_combo(this.value,'model')" style="width:100%;background-color: #FFFFFF;">
                                                    <option value="">Select Car Company</option>
                                                    <?php
                                                        if($this->input->post('type_id') != "")
                                                        {
                                                            $cm = $this->md->my_select('tbl_category',array('label'=>'company','parent_id'=>$this->input->post('type_id')));
                                                            foreach ($cm as $val)
                                                            {
                                                    ?>
                                                    <option value="<?php echo $val->category_id; ?>"
                                                            <?php
                                                                if(!isset($success) && set_select('company_id',$val->category_id))
                                                                {
                                                                    echo "selected";
                                                                }

                                                            ?>><?php echo $val->category_name; ?></option>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <p class="errmsg"><?php echo form_error('company_id'); ?></p>
                                                <select name="model_id" required="" id="model" onchange="set_combo(this.value,'submodel');set_combo(this.value,'missspecification')" style="width:100%;background-color: #FFFFFF;">
                                                    <option value="">Select Car Model</option>
                                                    <?php
                                                        if($this->input->post('type_id') != "")
                                                        {
                                                            $cm = $this->md->my_select('tbl_category',array('label'=>'model','parent_id'=>$this->input->post('company_id')));
                                                            foreach ($cm as $val)
                                                            {
                                                    ?>
                                                    <option value="<?php echo $val->category_id; ?>"
                                                            <?php
                                                                if(!isset($success) && set_select('model_id',$val->category_id))
                                                                {
                                                                    echo "selected";
                                                                }

                                                            ?>><?php echo $val->category_name; ?></option>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <p class="errmsg"><?php echo form_error('model_id'); ?></p>
                                                <select name="submodel_id" required="" id="submodel" style="width:100%;background-color: #FFFFFF;">
                                                    <option value="">Select Car Sub Model</option>
                                                    <?php
                                                        if($this->input->post('type_id') != "")
                                                        {
                                                            $sm = $this->md->my_select('tbl_category',array('label'=>'submodel','parent_id'=>$this->input->post('model_id')));
                                                            foreach ($sm as $val)
                                                            {
                                                    ?>
                                                    <option value="<?php echo $val->category_id; ?>"
                                                            <?php
                                                                if(!isset($success) && set_select('submodel_id',$val->category_id))
                                                                {
                                                                    echo "selected";
                                                                }

                                                            ?>><?php echo $val->category_name; ?></option>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <p class="errmsg"><?php echo form_error('submodel_id'); ?></p>
                                                <input type="text" placeholder="Price" name="price" value="<?php if(!isset($success)) { echo set_value('price'); } ?>" class="form-control input-md" style="font-size: 12px;" required="" pattern="^[0-9]+$"/>
                                                <p class="errmsg"><?php echo form_error('price'); ?></p>
                                                <input type="text" placeholder="Tag" name="tag" value="<?php if(!isset($success)) { echo set_value('tag'); } ?>" class="form-control input-md" style="font-size: 12px;" required="" pattern="^[a-zA-Z, ]+$"/>
                                                <p class="errmsg"><?php echo form_error('tag'); ?></p>
                                            
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-xs-12">
                                            <textarea name="description"  placeholder="Car Description" id="ed1" style="outline: none;padding: 5px;font-size: 12px;width: 100%;resize: none;height:200px;border-radius: 5px;" required="" pattern="^[a-zA-Z0-9 ]+$"><?php if(!isset($success)) { echo set_value('description'); } ?></textarea>
                                                <p class="errmsg"><?php echo form_error('description'); ?></p>
                                        </div>
                                    </div>
                                        
                                </div>
                                
                                <br/>
                                <div id="missspecification">
                                    
                                </div>
                                </form>
                                <br/>
                            </section>
                        </div>
                    </div>
                </section>
            </div>
        </section>
        <?php
        $this->load->view('carmela/footer_script');
        ?>
    </body>
</html>
<script src="<?php echo base_url(); ?>carmela/ckeditor/ckeditor.js" type="text/javascript"></script>
<script>
    CKEDITOR.replace('ed1');
    CKEDITOR.config.width="100%";
</script>
<script src="<?php echo base_url(); ?>carmela/javascripts/set.js" type="text/javascript"></script>

<?php
if($this->input->post('add'))
{
?>
<script>
    set_combo($('#model').val(),'missspecification');
</script>
<?php
} 
?>
