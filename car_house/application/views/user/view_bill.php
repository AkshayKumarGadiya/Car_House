<!doctype html>
<html class="fixed">
    <title>Member panel - Car House</title>
    <?php
    $this->load->view('user/header_link');
    ?>
    <body style="background-color: #F6F6F6;">
        <section class="body">

            <!-- start: header -->
            <?php
            $this->load->view('user/header');
            ?>  
            <!-- end: header -->

            <div class="inner-wrapper">
                <!-- start: sidebar -->
                <aside id="sidebar-left" class="sidebar-left">

                    <?php
                    $this->load->view('user/menu');
                    ?>
                </aside>
                <!-- end: sidebar -->

                <section role="main" class="content-body">
                    <header class="page-header">
                        <h2>View Bill</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>User-Home">
                                        <i class="fa fa-home" style="padding-right: 5px;font-size: 17px;margin-top: -4px"></i>
                                    </a>
                                </li>
                                <li><span style="padding-right: 25px;font-size: 13px;">View Bill</span></li>
                            </ol>
                        </div>
                    </header>

                    <!-- start: page -->
                    <div class="container-fluid">
                        <div class="row">
                            <form method="post" novalidate="">
                                <div class="col-md-12 col-lg-12 col-xs-12">
                                    <section class="panel">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <select name="billno" required="" style="background-color: #fff;width: 100%;" onchange="userbill(this.value,'billno')">
                                                        <option value="">Select Bill No</option>
                                                        <?php
                                                        $bill = $this->md->my_select("tbl_service_bill",array('registration_id'=>$this->session->userdata('userid')));
                                                        foreach($bill as $b)
                                                        {
                                                        ?>
                                                        <option value="<?php echo $b->bill_id; ?>"><?php echo $b->bill_id; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="type" required="" style="background-color: #fff;width: 100%;" onchange="userbill(this.value,'type')">
                                                        <option value="">Payment Type</option>
                                                        <?php
                                                        $type = $this->md->my_query("select * from tbl_service_bill where registration_id = '".$this->session->userdata("userid")."' group by payment_type");
                                                        foreach($type as $t)
                                                        {
                                                        ?>
                                                        <option value="<?php echo $t->bill_id; ?>"><?php echo $t->payment_type; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="date" name="date" onchange="userbill(this.value,'date')" style="text-transform: lowercase;width: 100%;display: block;padding:18px 0px;border-radius: 7px;height: 35px;border: 1px solid #CBCBCB;"/>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" name="min" id="minprice" placeholder="Min Price" style="text-transform: lowercase;width: 100%;display: block;padding:18px 0px;border-radius: 7px;height: 35px;border: 1px solid #CBCBCB;"/>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" name="min" id="maxprice" placeholder="Min Price" style="text-transform: lowercase;width: 100%;display: block;padding:18px 0px;border-radius: 7px;height: 35px;border: 1px solid #CBCBCB;"/>
                                                </div>
                                                <div class="col-md-12">
                                                    <br/>
                                                    <button type="button" onclick="price(minprice.value,maxprice.value,'mmax');" name="checkprice" value="Serach Bill" class="btn btn-danger"><i class="fa fa-search"></i>&nbsp;&nbsp;Search Bill</button>
                                                </div>
                                                <div class="col-md-12 price">
                                                            
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <section class="panel">
                                <div class="panel-body" id="generate">
                                    <?php
                                    $countbill = $this->md->my_query("select count(bill_id) as c from tbl_service_bill where registration_id=".$this->session->userdata('userid'))[0]->c;
                                    ?>
                                    <h1 style="text-align: center;color: #ddd;">Total <?php echo $countbill; ?> Bills Generated.</h1>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
            </div>


        </section>
        <?php
        $this->load->view('user/footer_script');
        ?>
        <script type="text/javascript">
            
            function userbill(id,action)
            {
                var base = "http://localhost/car_house/";
                var path = base + "Ajax/userbill";
                var data={id:id,action:action};
                $.post(path,data,function(ans){
                    $("#generate").html(ans);
                });
            }
            function price(min,max,action)
            {
                var ptn = /^[0-9]+$/;
                if(min.match(ptn))
                {
                    if(max != "")
                    {
                        if(max.match(ptn))
                        {
                            if(max > min)
                            {
                                var base = "http://localhost/car_house/";
                                var path = base + "Ajax/userbill/";
                                var data={min:min,max:max,action:action};

                                $.post(path,data,function(ans){
                                    $("#generate").html(ans);
                                });
                            }
                            else
                            {
                                $(".price").html("Max Price Must Greter Than Min Price");
                            }
                        }
                        else
                        {
                            $(".price").html("Please Enter Valid Max Price");
                        }
                    }
                    else
                    {
                        $(".price").html("Please Enter Max Price");
                    }
                }
                else
                {
                    $(".price").html("Please Enter Valid Min Price");
                }
            }
        </script>
    </body>
</html>