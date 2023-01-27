<html>
    <script src="<?php echo base_url(); ?>visitor/js/jquery-1.11.3.min.js"></script>
    <?php
    $this->load->view('carmela/header_link');
    ?>
    <body style="margin: 0px;padding: 0px;">
        <div class="container-fluid cf">
            <div class="row1 row">
                <div class="col-md-12 col-xs-12" style="margin: 20px 0 20px 0;">
                    <div class="adminlogo wow slideInLeft" data-wow-delay="0.3s" title="Car house">
                        <h3><a href="<?php echo base_url(); ?>Home">Car<span style="color:#FFFFFF;"> House</span></a></h3>
                        <h2><a href="<?php echo base_url(); ?>Home">Everyone Dreams of Car</a></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid"  style="background-image: url('carmela/images/carr.jpg');background-repeat: round;min-height: 563px;">
            <div class="row">
                <div class="col-md-offset-7 col-md-4 col-xs-12 panel" style="padding: 20px 0;">
                    <form method="post" class="my-form panel-body registerform" novalidate="">
                        <h5 class="text-center">Welcome , <?php echo $this->session->userdata('companyname'); ?></h5>
                        <select name="state" onchange="set_combo(this.value,'city')">
                            <option value="">Select State</option>
                            <?php
                                    foreach ($statedata as $val)
                                    {
                                    ?>
                                    <option value="<?php echo $val->location_id; ?>"
                                    <?php
                                    if($this->session->userdata('state'))
                                    {
                                        if($this->session->userdata('state') == $val->location_id)
                                        {
                                            echo "selected";
                                        }
                                    }
                                    else
                                    {
                                        if(set_select('state',$val->location_id))
                                        {
                                            echo "selected";
                                        }
                                    }
                                    ?>
                                    ><?php echo $val->name; ?></option>
                                    <?php
                                    }
                            ?>
                        </select>
                        <p class="errmsg"><?php echo form_error('state'); ?></p>
                        <select name="city" id="city" onchange="set_combo(this.value,'area')">
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
                                        if(set_select('city',$val->location_id))
                                        {
                                            echo "selected";
                                        }

                                    ?>><?php echo $val->name; ?></option>
                            <?php
                                    }
                                }
                                else
                                {
                                    if($this->input->post('next') && $this->input->post('state') == "")
                                    {
                                        if(set_select('city',""))
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
                                        if($this->input->post('next'))
                                        {
                                            if(set_select('city',$val->location_id))
                                            {
                                                echo 'selected';
                                            }
                                        }
                                        else
                                        {
                                            if($this->session->userdata('city') == $val->location_id)
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
                        <p class="errmsg"><?php echo form_error('city'); ?></p>
                        <select name="area" id="area" onchange="set_combo(this.value,'landmark')">
                            <option value="">Select Area</option>
                            <?php
                                if($this->input->post('state') != "")
                                {
                                    $ar = $this->md->my_select('tbl_location',array('lable'=>'area','parent_id'=>$this->input->post('city')));
                                    foreach ($ar as $val)
                                    {
                            ?>
                            <option value="<?php echo $val->location_id; ?>"
                                    <?php
                                        if(set_select('area',$val->location_id))
                                        {
                                            echo "selected";
                                        }

                                    ?>><?php echo $val->name; ?></option>
                            <?php
                                    }
                                }
                                else
                                {
                                    if($this->input->post('next') && $this->input->post('area') == "")
                                    {
                                        if(set_select('area',""))
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
                                        if($this->input->post('next'))
                                        {
                                            if(set_select('area',$val->location_id))
                                            {
                                                echo 'selected';
                                            }
                                        }
                                        else
                                        {
                                            if($this->session->userdata('area') == $val->location_id)
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
                        <p class="errmsg"><?php echo form_error('area'); ?></p>
                        <select name="landmark" id="landmark">
                            <option value="">Select Landmark</option>
                            <?php
                                if($this->input->post('state') != "")
                                {
                                    $lm = $this->md->my_select('tbl_location',array('lable'=>'landmark','parent_id'=>$this->input->post('area')));
                                    foreach ($lm as $val)
                                    {
                            ?>
                            <option value="<?php echo $val->location_id; ?>"
                                    <?php
                                        if(set_select('landmark',$val->location_id))
                                        {
                                            echo "selected";
                                        }

                                    ?>><?php echo $val->name; ?></option>
                            <?php
                                    }
                                }
                                else
                                {
                                    if($this->input->post('next') && $this->input->post('landmark') == "")
                                    {
                                        if(set_select('landmark',""))
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
                                        if($this->input->post('next'))
                                        {
                                            if(set_select('landmark',$val->location_id))
                                            {
                                                echo 'selected';
                                            }
                                        }
                                        else
                                        {
                                            if($this->session->userdata('landmark') == $val->location_id)
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
                        <p class="errmsg"><?php echo form_error('landmark'); ?></p>
                        <textarea name="address" placeholder="Address" required="" pattern="^[a-zA-Z0-9 ]+$"><?php if($this->session->userdata('address') && $this->input->post('next') == "") { echo $this->session->userdata('address'); } else { echo set_value('address'); } ?></textarea>
                        <p class="errmsg"><?php echo form_error('address'); ?></p>
                        <input type="text" name="pin" placeholder="Pincode" value="<?php if($this->session->userdata('pin') && $this->input->post('next') == "") { echo $this->session->userdata('pin'); } else { echo set_value('pin'); } ?>" class="form-control input-md registerformpin" required="" pattern="^[0-9]{6}$" >
                        <p class="errmsg"><?php echo form_error('pin'); ?></p>
                        <br/>
                        <div class="row">
                            <div class="col-md-6 col-xs-6 text-left" style="padding: 0px;">
                                <a href="<?php echo base_url(); ?>Carmela-Registration-1"><button type="button" value="Next" class="btn btn1">Back&nbsp;&nbsp;<i class="fa fa-angle-left"></i></button></a>
                            </div>
                            <div class="col-md-6 col-xs-6 text-right" style="padding: 0px;">
                                <button type="submit" value="Next" name="next" class="btn btn1">Next&nbsp;&nbsp;<i class="fa fa-angle-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center sellerfooter" style="background-color: #292929;">
            <p>Copyright &copy;&nbsp;<span>Car House</span> 2018. All Rights Reserved | Powered By : <a href="https://www.novaoneclicksolution.in" target="__new"><span>NOVA One Click Solution</span></a></p>
        </div>
    </body>
</html>
<script src="<?php echo base_url(); ?>carmela/javascripts/set.js" type="text/javascript"></script>