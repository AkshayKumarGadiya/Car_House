
<!doctype html>
<html class="fixed">
    <title>Carmela Panel - Car House</title>
    <?php
    $this->load->view('carmela/header_link');
    ?>
    <style>
        .summary-icon{
            background-color: #FF6200;
        }
        .panel-body
        {
            border:1px solid #F2F2F2;
        }
        .text-muted 
        {
            cursor: pointer;
        }
    </style>
    <body>
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
                        <h2>Dashboard</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Dashboard">
                                        <i class="fa fa-home" style="padding-right: 5px;font-size: 17px;margin-top: -4px"></i>
                                    </a>
                                </li>
                                <li><span style="padding-right: 25px;font-size: 13px;">Dashboard</span></li>
                            </ol>
                        </div>
                    </header>
                    <div class="row">
                        <?php
                        if(isset($uoffer))
                        {
                        ?>
                        <form method="post" novalidate="">
                        <p style="font-size: 14px;margin: 0 0 10px 15px;">Update Offer</p>
                        <div class="col-md-6">
                            <input type="text" name="uoffername" placeholder="Offer Name" value="<?php if($this->input->post('uoffername')) { echo set_value('uoffername'); }else{ echo $uoffer[0]->offer_name; }?>"  class="form-control input-md" required="" pattern="^[a-zA-Z ]+$"/>
                            <p class="errmsg"><?php echo form_error('uoffername'); ?></p>
                            <input type="text" name="urate" placeholder="Offer Rate"  value="<?php if($this->input->post('urate')) { echo set_value('urate'); }else{ echo $uoffer[0]->offer_rate; }?>" class="form-control input-md" value="<?php if(!isset($success)) { echo set_value('rate'); } ?>" required="" pattern="^[0-9%]+$"/>
                            <p class="errmsg"><?php echo form_error('urate'); ?></p>
                            <div class="row col-md-6 col-xs-6">
                                <input type="text" name="umin" placeholder="Min Price" value="<?php if($this->input->post('umin')) { echo set_value('umin'); }else{ echo $uoffer[0]->min_price; }?>" class="form-control input-md" value="<?php if(!isset($success)) { echo set_value('min'); } ?>" required="" pattern="^[0-9]+$" style="width: 187px;"/>
                                <p class="errmsg"><?php echo form_error('umin'); ?></p>
                            </div>
                            <div class="col-md-6 col-xs-6" style="margin-left: 30px;">
                                <input type="text" name="umax" placeholder="Max Price" value="<?php if($this->input->post('umax')) { echo set_value('umax'); }else{ echo $uoffer[0]->max_price; }?>" class="form-control input-md" required="" pattern="^[0-9]+$" style="width: 187px;"/>
                                <p class="errmsg"><?php echo form_error('umax'); ?></p>
                            </div>
                            <br/>
                            <br/>
                            <br/>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <div class="input-daterange input-group" data-plugin-datepicker>
                                        <span class="input-group-addon" style="border-left: 1px solid #CBCBCB;">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" placeholder="Start Date" name="umindate" value="<?php if($this->input->post('umindate')) { echo set_value('umindate'); }else{ echo $uoffer[0]->start_date; }?>" required="" class="form-control" name="start">
                                        <span class="input-group-addon">to</span>
                                        <input type="text" placeholder="End Date" name="umaxdate" value="<?php if($this->input->post('umaxdate')) { echo set_value('umaxdate'); }else{ echo $uoffer[0]->end_date; }?>" required="" class="form-control" name="end">

                                    </div>
                                    <p class="errmsg"><?php echo form_error('umindate'); ?></p>
                                    <p class="errmsg"><?php echo form_error('umaxdate'); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <select name="uptype" required="" onchange="set_combo(this.value,'selleroffer')" style="width:100%;background-color: #FFFFFF;">
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
                                                if($uoffer[0]->lable != "type" && $uoffer[0]->lable != "all")
                                                {
                                                    if($upcompany[0]->parent_id == $val->category_id)
                                                    {
                                                        echo 'selected';
                                                    }
                                                }
                                                if($uoffer[0]->lable == "type")
                                                {
                                                    if($uoffer[0]->category_id == $val->category_id)
                                                    {
                                                        echo 'selected';
                                                    }
                                                }
                                            }
                                        }
                                    ?>
                                    ><?php echo $val->category_name; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                            <br/>
                            <br/>
                        <select name="ucompany" required="" id="selleroffer" onchange="set_combo(this.value,'sellermodel')" style="width:100%;background-color: #FFFFFF;">
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
                                                    if($uoffer[0]->lable != "company" && $uoffer[0]->lable != "type")
                                                    {
                                                        if($upmodel[0]->parent_id == $val->category_id)
                                                        {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    if($uoffer[0]->lable == "company")
                                                    {
                                                        if($uoffer[0]->category_id == $val->category_id)
                                                        {
                                                            echo 'selected';
                                                        }
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
                            <br/>
                            <br/>
                        <select name="upmodel" required="" id="sellermodel" style="width:100%;background-color: #FFFFFF;">
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
                                                    if($uoffer[0]->category_id == $val->category_id)
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
                        </div>
                        <div class="col-md-12 col-xs-12 col-sm-12 text-right" style="padding: 0px;">
                            <br/><br/>
                            <button type="submit" value="Update" name="update" class="btn" style="border-radius: 20px;background-color: #FF6200;color: white;font-size: 13px;">Update&nbsp;&nbsp;<i class="fa fa-plus" style="margin-top: -1px;border-radius: 50%;width: 23px;margin-left: 5px;margin-right: -5px;padding: 4px;background-color: #FFFFFF;color: #000;font-size: 13px;"></i></button>
                            <button type="reset" value="Clear" name="clear" class="btn" style="border-radius: 20px;background-color: #FF6200;color: white;font-size: 13px;">Clear&nbsp;&nbsp;<i class="fa fa-eraser" style="margin-top: -1px;border-radius: 50%;width: 23px;margin-left: 5px;margin-right: -5px;padding: 4px;background-color: #FFFFFF;color: #000;font-size: 13px;"></i></button>
                        </div>
                        </form>
                        <?php
                        }
                        else
                        {
                        ?>
                        <form method="post" novalidate="">
                        <p style="font-size: 14px;margin: 0 0 10px 15px;">Add New Offer</p>
                        <div class="col-md-6">
                            <input type="text" name="offername" placeholder="Offer Name" value="<?php if(!isset($success)) { echo set_value('offername'); } ?>" class="form-control input-md" required="" pattern="^[a-zA-Z ]+$"/>
                            <p class="errmsg"><?php echo form_error('offername'); ?></p>
                            <input type="text" name="rate" placeholder="Offer Rate" class="form-control input-md" value="<?php if(!isset($success)) { echo set_value('rate'); } ?>" required="" pattern="^[0-9%]+$"/>
                            <p class="errmsg"><?php echo form_error('rate'); ?></p>
                            <div class="row col-md-6 col-xs-6">
                                <input type="text" name="min" placeholder="Min Price" class="form-control input-md" value="<?php if(!isset($success)) { echo set_value('min'); } ?>" required="" pattern="^[0-9]+$" style="width: 187px;"/>
                                <p class="errmsg"><?php echo form_error('min'); ?></p>
                            </div>
                            <div class="col-md-6 col-xs-6" style="margin-left: 30px;">
                                <input type="text" name="max" placeholder="Max Price" value="<?php if(!isset($success)) { echo set_value('max'); } ?>" class="form-control input-md" required="" pattern="^[0-9]+$" style="width: 187px;"/>
                                <p class="errmsg"><?php echo form_error('max'); ?></p>
                            </div>
                            <br/>
                            <br/>
                            <br/>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <div class="input-daterange input-group" data-plugin-datepicker>
                                        <span class="input-group-addon" style="border-left: 1px solid #CBCBCB;">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        <input type="text" placeholder="Start Date" name="mindate" required="" class="form-control" name="start">
                                        <span class="input-group-addon">to</span>
                                        <input type="text" placeholder="End Date" name="maxdate" required="" class="form-control" name="end">

                                    </div>
                                    <p class="errmsg"><?php echo form_error('mindate'); ?></p>
                                    <p class="errmsg"><?php echo form_error('maxdate'); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <select name="type_id" required="" onchange="set_combo(this.value,'selleroffer')" style="width:100%;background-color: #FFFFFF;">
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
                            <br/>
                            <br/>
                        <select name="company_id" required="" id="selleroffer" onchange="set_combo(this.value,'sellermodel')" style="width:100%;background-color: #FFFFFF;">
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
                            <br/>
                            <br/>
                        <select name="model_id" required="" id="sellermodel" style="width:100%;background-color: #FFFFFF;">
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
                        </div>
                        <div class="col-md-12 col-xs-12 col-sm-12 text-right" style="padding: 0px;">
                            <br/><br/>
                            <button type="submit" value="Add" name="offer" class="btn" style="border-radius: 20px;background-color: #FF6200;color: white;font-size: 13px;">Add&nbsp;&nbsp;<i class="fa fa-plus" style="margin-top: -1px;border-radius: 50%;width: 23px;margin-left: 5px;margin-right: -5px;padding: 4px;background-color: #FFFFFF;color: #000;font-size: 13px;"></i></button>
                            <button type="reset" value="Clear" name="clear" class="btn" style="border-radius: 20px;background-color: #FF6200;color: white;font-size: 13px;">Clear&nbsp;&nbsp;<i class="fa fa-eraser" style="margin-top: -1px;border-radius: 50%;width: 23px;margin-left: 5px;margin-right: -5px;padding: 4px;background-color: #FFFFFF;color: #000;font-size: 13px;"></i></button>
                        </div>
                        </form>
                        <?php
                        }
                        ?>
                        
                    </div>
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
                    <br/>
                    <div class="col-md-12">
                <section class="panel">
                    <div class="panel-body">
                        <div class="table-responsive" style="overflow-x: unset;">
                            <table class="table table-striped text-center nova-pagging" >
                                <thead>
                                    <tr>
                                        <th nova-search="yes">No</th>
                                        <th nova-search="yes">Offer Name</th>
                                        <th nova-search="yes">Offer Rate</th>
                                        <th nova-search="yes">Min Price</th>
                                        <th nova-search="yes">Max Price</th>
                                        <th nova-search="yes">Start Date</th>
                                        <th nova-search="yes">End Date</th>
                                        <th nova-search="yes">Car Type</th>
                                        <th nova-search="yes">Car Company</th>
                                        <th nova-search="yes">Car Model</th>
                                        <th nova-search="no">Edit</th>
                                        <th nova-search="no">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($offer as $val)
                                    {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $val->offer_name; ?></td>
                                            <td><?php echo $val->offer_rate; ?></td>
                                            <td><?php echo $val->min_price; ?></td>
                                            <td><?php echo $val->max_price; ?></td>
                                            <td><?php echo date('d-m-Y',strtotime($val->start_date)); ?></td>
                                            <td><?php echo date('d-m-Y',strtotime($val->end_date)); ?></td>
                                            <?php
                                            if($val->lable == "all")
                                            {
                                            ?>
                                            <td>All</td>
                                            <td>All</td>
                                            <td>All</td>
                                            <?php
                                            }
                                            if($val->lable == "type")
                                            {
                                                $b = $this->md->my_query("select category_name from tbl_category where category_id =".$val->category_id);
                                            ?>
                                            <td><?php echo $b[0]->category_name; ?></td>
                                            <td>Not</td>
                                            <td>Not</td>
                                            <?php
                                            }
                                            if($val->lable == "company")
                                            {
                                                $c = $this->md->my_query("select c.category_name,t.category_name as type from tbl_category as c,tbl_category as t where t.category_id = c.parent_id and c.category_id =".$val->category_id);
                                            ?>
                                            <td><?php echo $c[0]->type; ?></td>
                                            <td><?php echo $c[0]->category_name; ?></td>
                                            <td>Not</td>
                                            <?php
                                            }
                                            if($val->lable == "model")
                                            {
                                                $model = $this->md->my_query("select m.category_name , c.category_name as com , t.category_name as type from tbl_category as m , tbl_category as c , tbl_category as t where t.category_id = c.parent_id and c.category_id = m.parent_id and m.category_id =".$val->category_id);

                                            ?>
                                            <td><?php echo $model[0]->type; ?></td>
                                            <td><?php echo $model[0]->com; ?></td>
                                            <td><?php echo $model[0]->category_name; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <td style="width:5%"><a href="<?php echo base_url(); ?>Update-Offer/<?php echo $val->offer_id;?> " title="Edit"><i class="fa fa-pencil edit"/></i></a></td>
                                            <?php
                                            if($val->status == 1)
                                            {
                                            ?>
                                            <td><i class="fa fa-toggle-on" id="carreview" style="width: 53px;color: #FF6200;font-size: 18px;" title="Active"></i></td>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                            <td><i class="fa fa-toggle-off" id="carreview" style="width: 53px;color: #FF6200;font-size: 18px;" title="Deactive"></i></td>
                                            <?php
                                            }
                                            ?>
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
        $this->load->view('carmela/footer_script');
        ?>
    </body>
</html>
<script src="<?php echo base_url(); ?>carmela/javascripts/set.js" type="text/javascript"></script>