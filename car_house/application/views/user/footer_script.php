
<!-- Vendor -->
<script src="<?php echo base_url(); ?>user_asset/vendor/jquery/jquery.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/jquery-cookie/jquery-cookie.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/style-switcher/style.switcher.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/bootstrap/js/bootstrap.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/nanoscroller/nanoscroller.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/magnific-popup/jquery.magnific-popup.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/jquery-placeholder/jquery-placeholder.js"></script>

<!-- Specific Page Vendor -->		<script src="<?php echo base_url(); ?>user_asset/vendor/jquery-ui/jquery-ui.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/jqueryui-touch-punch/jqueryui-touch-punch.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/jquery-appear/jquery-appear.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/flot/jquery.flot.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/flot.tooltip/flot.tooltip.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/flot/jquery.flot.pie.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/flot/jquery.flot.categories.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/flot/jquery.flot.resize.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/jquery-sparkline/jquery-sparkline.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/raphael/raphael.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/morris.js/morris.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/gauge/gauge.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/snap.svg/snap.svg.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/liquid-meter/liquid.meter.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/jqvmap/jquery.vmap.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/jqvmap/maps/jquery.vmap.world.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>		<script src="<?php echo base_url(); ?>user_asset/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?php echo base_url(); ?>user_asset/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="<?php echo base_url(); ?>user_asset/javascripts/theme.custom.js"></script>
<script src="<?php echo base_url(); ?>visitor/js/nova-pagging.js" type="text/javascript"></script>
<!-- Theme Initialization Files -->
<script src="<?php echo base_url(); ?>user_asset/javascripts/theme.init.js"></script>
<!-- Analytics to Track Preview Website -->		<script>		  (function (i, s, o, g, r, a, m) {
                        i['GoogleAnalyticsObject'] = r;
                        i[r] = i[r] || function () {
                            (i[r].q = i[r].q || []).push(arguments)
                        }, i[r].l = 1 * new Date();
                        a = s.createElement(o), m = s.getElementsByTagName(o)[0];
                        a.async = 1;
                        a.src = g;
                        m.parentNode.insertBefore(a, m)
                    })(window, document, 'script', '../../../www.google-analytics.com/analytics.js', 'ga');
                    ga('create', 'UA-42715764-8', 'auto');
                    ga('send', 'pageview');</script>
<!-- Examples -->
<script src="<?php echo base_url(); ?>user_asset/javascripts/dashboard/examples.dashboard.js"></script>

<script src="<?= base_url()?>user_asset/javascripts/toastr.js" type="text/javascript"></script>
<link href="<?= base_url()?>user_asset/stylesheets/toastr.css" rel="stylesheet" type="text/css"/>


<script type="text/javascript">

<?php if($this->session->flashdata('success')){ ?>
    toastr.success("<?php echo $this->session->flashdata('success'); ?>");
<?php }else if($this->session->flashdata('error')){  ?>
    toastr.error("<?php echo $this->session->flashdata('error'); ?>");
<?php }else if($this->session->flashdata('warning')){  ?>
    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
<?php }else if($this->session->flashdata('info')){  ?>
    toastr.info("<?php echo $this->session->flashdata('info'); ?>");
<?php } ?>

</script>
<script src="<?php echo base_url(); ?>user_asset/javascripts/set.js" type="text/javascript"></script>