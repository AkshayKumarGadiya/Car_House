<!doctype html>
<html class="fixed">
    <?php
    $this->load->view('admin/header_link');
    ?>
    <style>
        .col-md-2
        {
            padding: 2px;
        }
    </style>
    <body style="background-color: #F2F2F2;">
        <section class="body">
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
                        <h2>Manage Bill</h2>

                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?php echo base_url(); ?>Admin-Home">
                                        <i class="fa fa-home dashboard"></i>
                                    </a>
                                </li>
                                <li><span class="dashboardname">Manage Bill</span></li>
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
                                                    <form method="post" novalidate="" class="my-form sbox">
                                                        <div class="col-md-2">
                                                            <select name="bill" required="" onchange="searchbill(this.value,'billno')">
                                                                <option value="">Bill No</option>
                                                                <?php
                                                                $b = $this->md->my_select('tbl_service_bill');
                                                                foreach($b as $val)
                                                                {
                                                                ?>
                                                                <option value="<?php echo $val->bill_id; ?>"><?php echo $val->bill_id; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                           <input type="date" name="date" onchange="searchbill(this.value,'date')" style="text-transform: lowercase;width: 100%;display: block;padding:18px 0px;border-radius: 7px;height: 35px;border: 1px solid #CBCBCB;"/>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <select name="car" required="" onchange="searchbill(this.value,'model')">
                                                                <option value="">Select Car Model</option>
                                                                <?php
                                                                $model = $this->md->my_select('tbl_category',array('label'=>'model'));
                                                                foreach($model as $m)
                                                                {
                                                                ?>
                                                                <option value="<?php echo $m->category_id; ?>"><?php echo $m->category_name; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <select name="state" required="" onchange="searchbill(this.value,'state');set_combo(this.value,'city')">
                                                                <option value="">Select State</option>
                                                                <?php
                                                                $state = $this->md->my_select("tbl_location",array('lable'=>'state'));
                                                                foreach($state as $s)
                                                                {
                                                                ?>
                                                                <option value="<?php echo $s->location_id; ?>"><?php echo $s->name; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <select name="city" required="" id="city" onchange="searchbill(this.value,'city');set_combo(this.value,'area')">
                                                                <option value="">Select City</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <select name="area" required="" id="area" onchange="searchbill(this.value,'area');set_combo(this.value,'landmark')">
                                                                <option value="">Select Area</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <select name="landmark" required="" id="landmark" onchange="searchbill(this.value,'landmark')">
                                                                <option value="">Select Landmark</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <select name="member" required="" onchange="searchbill(this.value,'user')">
                                                                <option value="">Select Member</option>
                                                                <?php
                                                                $user = $this->md->my_select('tbl_registration');
                                                                foreach($user as $u)
                                                                {
                                                                ?>
                                                                <option value="<?php echo $u->registration_id; ?>"><?php echo $u->name; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <select name="payment" required="" onchange="searchbill(this.value,'type')">
                                                                <option value="">Payment Type</option>
                                                                <?php
                                                                $type = $this->md->my_query("select * from tbl_service_bill group by payment_type");
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
                                                            <input type="text" name="min" id="min" placeholder="Min Price" class="form-control input-md" required="" pattern="^[a-zA-Z ]+$"/>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="text" name="max" id="max" placeholder="Max Price" class="form-control input-md" required="" pattern="^[a-zA-Z ]+$"/>
                                                        </div>
                                                        <div class="col-md-2 col-xs-2">
                                                            <button type="button" onclick="price(min.value,max.value,'minmax')" name="checkprice" value="Serach Bill" class="btn btn-danger"><i class="fa fa-search"></i>&nbsp;&nbsp;Search Bill</button>
                                                         </div>
                                                        <div class="col-md-12 price">
                                                            
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
                    <div class="col-md-12">
                        <section class="panel">
                            <div class="panel-body" id="generate">
                                <?php
                                $countbill = $this->md->my_query("select count(bill_id) as c from tbl_service_bill")[0]->c;
                                ?>
                                <h1 style="color: #ddd;text-align: center;">Total <?php echo $countbill; ?> Bills Generated.</h1>
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
            
            function searchbill(id,action)
            {
                var base = "http://localhost/car_house/";
                var path = base + "Ajax/billsearch";
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
                                var path = base + "Ajax/billsearch/";
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