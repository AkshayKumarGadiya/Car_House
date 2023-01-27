<div class="col-lg-3 col-sm-4 col-xs-12">
    <aside class="b-items__aside">
        <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">REFINE YOUR SEARCH</h2>
        <div class="b-items__aside-main wow zoomInUp" data-wow-delay="0.5s">
            <form method="post" id="filter-data">
                <div class="b-items__aside-main-body">
                    <div class="b-items__aside-main-body-item">
                        <label>SELECT CAR TYPE</label>
                        <div>
                            <select name="type" class="m-select" onchange="set_combo(this.value,'company');set_combo(0,'model');set_combo(0,'submodel');carfilter()">
                                <option value="" selected="">Select Car Type</option>
                                <?php
                                $cartype = $this->md->my_select('tbl_category',array('label'=>'type'));
                                    foreach($cartype as $val)
                                    {
                                ?>
                                <option value="<?php echo $val->category_id; ?>"><?php echo $val->category_name; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            <span class="fa fa-caret-down"></span>
                        </div>
                    </div>
                    <div class="b-items__aside-main-body-item">
                        <label>SELECT CAR COMPANY</label>
                        <div>
                            <select name="company" id="company" onchange="set_combo(this.value,'model');carfilter()" class="m-select">
                                <option value="" selected="">Select Car Company</option>
                            </select>
                            <span class="fa fa-caret-down"></span>
                        </div>
                    </div>
                    <div class="b-items__aside-main-body-item">
                        <label>SELECT CAR MODEL</label>
                        <div>
                            <select name="model" id="model" onchange="set_combo(this.value,'submodel');carfilter()" class="m-select">
                                <option value="" selected="">Select Car Model</option>
                            </select>
                            <span class="fa fa-caret-down"></span>
                        </div>
                    </div>
                    <div class="b-items__aside-main-body-item">
                        <label>SELECT CAR SUBMODEL</label>
                        <div>
                            <select name="submodel" id="submodel" onchange="carfilter()" class="m-select">
                                <option value="" selected="">Select Car Submodel</option>
                            </select>
                            <span class="fa fa-caret-down"></span>
                        </div>
                    </div>
                    <div class="b-items__aside-main-body-item">
                        <div class="">
                            <h1></h1>
                            <div class="form" style="margin-top: -40px;">
                                <button onclick="changeLimits()" id="limitButton" disabled style="background: transparent;border: none;color: #fff;font-weight: bold;">Price Range</button>
                            </div>
                            <span id="val" style="margin-left: 30px;"></span>
                            <input id="slide" name="slide" type="range" min="0" max="6850000" value="0" oninput="displayValue(event)" onchange="carfilter()" />
                        </div>
                    </div>
                </div>
                <footer class="b-items__aside-main-footer">
                    <input type="reset" value="RESET ALL FILTER" style="background:transparent;color: #fff;border: none;">
                </footer>
            </form>
        </div>
        <div class="b-items__aside-sell wow zoomInUp" data-wow-delay="0.5s">
            <div class="b-items__aside-sell-img">
                <h3>SELL YOUR CAR</h3>
            </div>
            <div class="b-items__aside-sell-info">
                <p>
                    If You Have Sell Your
                    Own Car , So Click Here And Sell.
                </p>
                <a href="<?php echo base_url(); ?>Carmela-Registration-1" class="btn m-btn">REGISTER NOW<span class="fa fa-angle-right"></span></a>
            </div>
        </div>
    </aside>
</div>