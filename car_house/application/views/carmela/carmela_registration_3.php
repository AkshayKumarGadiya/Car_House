<html>
    <script src="<?php echo base_url(); ?>visitor/js/jquery-1.11.3.min.js"></script>
    <?php
    $this->load->view('carmela/header_link');
    ?>
    <body style="margin: 0px;padding: 0px;">
        <div class="container-fluid cf">
            <div class="row1 row">
                <div class="col-md-5 col-xs-12" style="margin: 20px 0 20px 0;">
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
                    <form method="post" class="my-form panel-body" novalidate="" enctype="multipart/form-data">
                        <h5 class="text-center">Welcome , <?php echo $this->session->userdata('companyname'); ?></h5>
                        
                        <label>Owner Name</label>
                        <input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control input-md owner" required="" pattern="^[A-Za-z ]+$" >
                        <p class="errmsg"><?php echo form_error('name'); ?></p>
                        <label>Owner Contact No</label>
                        <input type="text" name="contactno" value="<?php echo set_value('contactno'); ?>" class="form-control input-md owner" required="" pattern="^[0-9]{10}$" >
                        <p class="errmsg"><?php echo form_error('contactno'); ?></p>
                        <label>Carmela Logo</label>
                        <input type="file" name="logo" id="upload" style="display: none;"/>
                        <label id="fileupd" for="upload" style="cursor: pointer;">
                            <div class="ownfile">
                                <h3>Click To Select File</h3>
                            </div>
                        </label>
                        <label>Carmela Visiting Card</label>
                        <input type="file" name="card" id="upload1" style="display: none;"/>
                        <label id="fileupd1" for="upload1" style="cursor: pointer;">
                            <div class="ownfile">
                                <h3>Click To Select File</h3>
                            </div>
                        </label>
                        <br/>
                        <br/>
                        <div class="row">
                            <div class="col-md-6 col-xs-6 text-left" style="padding: 0px;">
                                <a href="<?php echo base_url(); ?>Carmela-Registration-2"><button type="button" class="btn btn1">Back&nbsp;&nbsp;<i class="fa fa-angle-left"></i></button></a>
                            </div>
                            <div class="col-md-6 col-xs-6 text-right" style="padding: 0px;">
                                <button type="submit" name="next" value="Go To Profile" class="btn btn1">Go To Profile&nbsp;&nbsp;<i class="fa fa-angle-right"></i></button>
                            </div>
                        </div>
                        <br/><br/>
                                                                        
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
        <div class="container-fluid text-center sellerfooter" style="background-color: #292929;">
            <p>Copyright &copy;&nbsp;<span>Car House</span> 2018. All Rights Reserved | Powered By : <a href="https://www.novaoneclicksolution.in" target="__new"><span>NOVA One Click Solution</span></a></p>
        </div>
    </body>
</html>
