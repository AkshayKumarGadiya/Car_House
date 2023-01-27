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
                                         Are You Sure You Want To Delete Email ?    
                                    </div>
                                    <br/>
                                    <br/>
                                    <div class="col-sm-12 col-xs-12 col-md-12 text-center">
                                        <a href="<?php echo base_url(); ?>Delete/emailsub/" id="cyes"><button type="button" class="btn pl-xl pr-xl" name="yes" value="yes" style="background-color: #FF6200;color: white;">Yes</button></a>
                                        <button type="button" class="btn btn-primary pl-xl pr-xl" name="close" id="btncls" style="background-color: #FF6200;border-color: #fff;">No</button>
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
                        <h2>Manage Email Subscriber</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Admin-Home">
                                        <i class="fa fa-home dashboard" ></i>
                                    </a>
                                </li>
                                <li><span class="dashboardname">Manage Email Subscriber</span></li>
                            </ol>
                        </div>
                    </header>

                    <div class="col-md-12">
                        <section class="panel">
                            <div class="panel-body emailbody">
                                <div class="row">
                                    <form method="post" class="my-form" novalidate="">
                                    <div class="col-xl-12 col-md-6">
                                        <section class="panel panel-transparent">
                                            <div class="panel-body">
                                                <section class="panel panel-group emaildisplay">
                                                    <div id="accordion">
                                                        <div class="panel panel-accordion panel-accordion-first">
                                                            <div id="collapse1One" class="accordion-body collapse in">
                                                                <div class="panel-body" style="height: 530px;">
                                                                    <div class="table-responsive" style="overflow-x: unset;">
                                                                        <table class="table table-striped mb-none nova-pagging">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>
                                                                                        <div class="checkbox-custom checkbox-default">
                                                                                            <input type="checkbox" id="checks" name="checks" title="Check All">
                                                                                            <label class="todo-label" for="todoListItem1"></label>
                                                                                        </div>
                                                                                    </th>
                                                                                    <th nova-search="yes">Email</th>
                                                                                    <th nova-search="no">Remove</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                $i = 0;
                                                                                foreach($display as $val) {
                                                                                    $i++;
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="checkbox-custom checkbox-default">
                                                                                                <input type="checkbox" name="email[]" id="<?php echo $i; ?>" value="<?php echo $val->email; ?>">
                                                                                                <label class="todo-label" for="todoListItem1"></label>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td class="text-lowercase"><?php echo $val->email; ?></td>
                                                                                        <td><i id="<?php echo $val->email_id; ?>" class="fa fa-trash trash layer" title="Remove" style="color: #76767A;"></i></td>
                                                                                     </tr>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-xl-12 col-lg-6">
                                        <section class="panel">
                                            <div class="panel-body emaillength" style="height: 530px;">
                                                <p style="font-size:15px;">Enter Your Message</p>
                                                <div class="form-group mb-lg">
                                                    <div class="input-group input-group-icon"   >
                                                        <input type="text" name="name"  placeholder="Subject" class="form-control input-md" required="" pattern="^[a-zA-Z ]+$" />
                                                        <p class="errmsg"><?php echo form_error('name'); ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-lg">
                                                    <div class="input-group input-group-icon">
                                                        <textarea name="message" class="form-control input-lg" id="editor1" placeholder="Message"  style="resize: none;font-size: 13px;" required="" pattern="^[a-zA-Z0-9 ]+$"></textarea>
                                                        <p class="errmsg"><?php echo form_error('message'); ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-xs-12" style="padding: 0 0 5px 0;">
                                                    <button type="submit" class="btn btnemail" name="sendmail" value="Send Now"><i class="fa fa-send"></i>Send Now</button>
                                                    <button type="reset" class="btn btnemail1"><i class="fa fa-eraser"></i>Clear</button>
                                                </div>
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
                                        </section>
                                    </div>
                                    </form>
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
    </body>
</html>

<script type="text/javascript">
    $('#checks').click(function () {
<?php
for ($i = 1; $i <= 10; $i++) {
    ?>
            if ($(this).is(':checked')) {
                $('#<?php echo $i; ?>').attr('checked', true);
            } else {
                $('#<?php echo $i; ?>').attr('checked', false);
            }
    <?php
}
?>
    });
    
   
</script>
<script type="text/javascript">
            paging(1);
</script>
<script src="<?php echo base_url()?>assets/ckeditor/ckeditor.js" type="text/javascript"></script>
<script>
     CKEDITOR.replace( 'editor1' );
</script>