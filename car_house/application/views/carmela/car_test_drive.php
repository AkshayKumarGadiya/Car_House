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
                        <h2>My Car Test Drive</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Carmela-Home">
                                        <i class="fa fa-home" style="padding-right: 5px;font-size: 17px;margin-top: -4px"></i>
                                    </a>
                                </li>
                                <li><span style="padding-right: 25px;font-size: 13px;">My Car Test Drive</span></li>
                            </ol>
                        </div>
                    </header>

                    <div class="col-md-12">
                        <section class="panel">
                            <div class="panel-body">
                                <div class="table-responsive" style="overflow-x: unset;">
                                    <table class="table table-striped tbl wraped nova-pagging" >
                                        <thead>
                                            <tr>
                                                <th nova-search="yes">No</th>
                                                <th nova-search="yes">Car Image</th>
                                                <th nova-search="yes">User Image</th>
                                                <th nova-search="yes">User Name</th>
                                                <th nova-search="yes">Email</th>
                                                <th nova-search="yes">Mobile No</th>
                                                <th nova-search="yes">Date</th>
                                                <th nova-search="yes">Time</th>
                                                <th nova-search="no">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody style="text-transform: capitalize;">
                                            <?php
                                            $i = 0;
                                            foreach($test as $val)
                                            {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <?php
                                                    $j = $this->md->my_select('tbl_car_image',array('car_id'=>$val->car_id))[0]->path;
                                                    ?>
                                                    <td width="18%"><img src="<?php echo base_url().$j; ?>" style="width: 140px;height: 78px;"</td>
                                                    <td><img src="<?php if($val->profile_pic != "") { echo base_url().$val->profile_pic; } else { echo base_url()."user_asset/images/user-blank.png"; }?>" class="img-circle" style="width: 70px;height: 70px;"</td>
                                                    <td><?php echo $val->name; ?></td>
                                                    <td style="text-transform: lowercase;"><?php echo $val->email; ?></td>
                                                    <td><?php if($val->contact_no != "") { echo $val->contact_no; } else { echo "Not Specified"; } ?></td>
                                                    <td><?php echo date('d-m-Y',strtotime($val->date)); ?></td>
                                                    <td><?php echo $val->time; ?></td>
                                                    <td class="change">
                                                    <?php
                                                    if($val->status == 1)
                                                    {
                                                    ?>
                                                        <button type="button" value="1" onclick="test(<?php echo $val->test_drive_id; ?>,'testdrive');" id="ac<?php echo $val->test_drive_id; ?>" class="mb-xs mt-xs mr-xs btn btn-xs btn-success" style="width: 65px;">Confirm</button>
                                                    <?php
                                                    }
                                                    elseif($val->status == 0)
                                                    {
                                                    ?>
                                                        <button type="button" value="0" onclick="test(<?php echo $val->test_drive_id; ?>,'testdrive');" id="ac<?php echo $val->test_drive_id; ?>" class="mb-xs mt-xs mr-xs btn btn-xs btn-danger" style="width: 65px;">Pending</button>
                                                    <?php
                                                    }
                                                    elseif($val->status == 2)
                                                    {
                                                    ?>
                                                        <button type="button" value="2" ondblclick="test(<?php echo $val->test_drive_id; ?>,'testdrive')" id="ac<?php echo $val->test_drive_id; ?>" class="mb-xs mt-xs mr-xs btn btn-xs btn-warning" style="width: 65px;">Complete</button> 
                                                    <?php
                                                    }
                                                    ?>
                                                    </td>
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
        <script type="text/javascript">
           
            function test(id,action)
            {
                if($('#ac'+id).val()==1)
                {
                    $('#ac'+id).removeClass('btn-success');
                    $('#ac'+id).addClass('btn-danger');
                    $('#ac'+id).text('Pending');
                    $('#ac'+id).val("2");
                }
                if($('#ac'+id).val()==0)
                {
                    $('#ac'+id).removeClass('btn-danger');
                    $('#ac'+id).addClass('btn-success');
                    $('#ac'+id).text('Confirm');
                    
                    $ct=$("#ac"+id).attr('onclick');
                    $("#ac"+id).removeAttr('onclick');
                    $("#ac"+id).attr('ondblclick',$ct);
                    $('#ac'+id).val("1");
                }
                if($('#ac'+id).val()==2)
                {
                    $('#ac'+id).removeClass('btn-danger');
                    $('#ac'+id).addClass('btn-warning');
                    $('#ac'+id).text('Complete');
                    $('#ac'+id).val("2");
                }
                var data = {id:id,action:action};
                var base='http://localhost/car_house/';
                var path = base + 'Ajax/' + action;
                
                $.post(path,data);
            }
            paging(1);
        </script>
    </body>
</html>