<!--Main-->   
<script src="<?php echo base_url(); ?>visitor/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo base_url(); ?>visitor/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>visitor/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>visitor/js/modernizr.custom.js"></script>

<script src="<?php echo base_url(); ?>visitor/assets/rendro-easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
<script src="<?php echo base_url(); ?>visitor/js/waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>visitor/js/jquery.easypiechart.min.js"></script>
<script src="<?php echo base_url(); ?>visitor/js/classie.js"></script>

<!--Switcher-->
<script src="<?php echo base_url(); ?>visitor/assets/switcher/js/switcher.js"></script>
<!--Owl Carousel-->
<script src="<?php echo base_url(); ?>visitor/assets/owl-carousel/owl.carousel.min.js"></script>
<!--bxSlider-->
<script src="<?php echo base_url(); ?>visitor/assets/bxslider/jquery.bxslider.js"></script>
<!-- jQuery UI Slider -->
<script src="<?php echo base_url(); ?>visitor/assets/slider/jquery.ui-slider.js"></script>

<!--Theme-->
<script src="<?php echo base_url(); ?>visitor/js/set.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>visitor/js/jquery.smooth-scroll.js"></script>
<script src="<?php echo base_url(); ?>visitor/js/wow.min.js"></script>
<script src="<?php echo base_url(); ?>visitor/js/jquery.placeholder.min.js"></script>
<script src="<?php echo base_url(); ?>visitor/js/theme.js"></script>
<script src="<?php echo base_url(); ?>visitor/js/login.js"></script>
<script src="<?php echo base_url(); ?>visitor/js/slider.js" type="text/javascript"></script>

<script>
    var base='http://localhost/car_house/';
    function filter(id,action)
    {
        if(action != "")
        {
            $(".searchnow").click(function(){
               var data = id+"/"+action;
               window.location.href=base+"All-Car/"+data;
            });
        }
        
    }
    function carfilter()
    {
        var c=0;
        $("#sort").html('<div id="page-preloader"><span class="spinner"></span></div>');
        var cc=setInterval(function(){
        if(c==1)
        {
            clearInterval(cc);
            var data=$("#filter-data").serialize();
            $.ajax({
                type:'POST',
                url:base +"Ajax/filterdata",
                data:data,
                success:function(ans){
                    $("#sort").html(ans);
                }
            });
        }
        c=c+1;
        },500);
    }
    function carfilterlist()
    {
        var c=0;
        $("#sort").html('<div id="page-preloader"><span class="spinner"></span></div>');
        var cc=setInterval(function(){
        if(c==1)
        {
            clearInterval(cc);
            var data=$("#filter-data").serialize();
            var limit = 9;
            $.ajax({
                type:'POST',
                url:base +"Ajax/filterdatalist",
                data:data,
                limit:limit,
                success:function(ans){
                    $("#sort").html(ans);
                }
            });
        }
        c=c+1;
        },500);
    }
    function viewmore(id,limit)
    {
        $data={id:id,limit:limit};
        var url=base+'Ajax/viewmore';
        $.post(url,$data,function(ans){
        $("#sort").html(ans);
        });
    }
    function viewmorelist(limit)
    {
        $data={limit:limit};
        var url=base+'Ajax/listvie';
        $.post(url,$data,function(ans){
        $("#sort").html(ans);
        });
    }
    function email_sub(email,action)
    {
        var data = {email:email,action:action};
        var url = base + 'Ajax/' + action;

        $.post(url,data,function(ans){
            if(ans == "yes")
            {
                $("#a").fadeIn(500);
                $("#"+action).html("");
                $("."+action).val("");
            }
            else if(ans == "no")
            {
                $("#aa").fadeIn(500);
                $("#"+action).html("");
                $("."+action).val("");
            }
            else
            {
                $("#"+action).html(ans);
            }
        });
    }
    
    $(".cls").click(function() {
        $(".backdiv").fadeOut();
    });
    
    
    $("#chat").click(function(){
       $(".message").show(100);
    });
</script>

<script type="text/javascript">
    function startDictation() {
      if (window.hasOwnProperty('webkitSpeechRecognition')) {

        var recognition = new webkitSpeechRecognition();

        recognition.continuous = false;
        recognition.interimResults = false;

        recognition.lang = "en-US";
        recognition.start();

        recognition.onresult = function(e) {
          document.getElementById('search').value= e.results[0][0].transcript;
          recognition.stop();
          document.getElementById('labnol').submit();
        };

        recognition.onerror = function(e) {
          recognition.stop();
        }

      }
    }
     $(function(){
        $("#addClass").click(function () {
          $('#qnimate').addClass('popup-box-on');
        });
          
        $("#removeClass").click(function () {
          $('#qnimate').removeClass('popup-box-on');
        });
  })
  
  function chat(msg,action)
  {
    if(msg == "")
    {
        $("#errchat").html("Please Enter Message");
    }
    else
    {
        $data={msg:msg,action:action};
        var url=base+'Ajax/'+action;
        $.post(url,$data,function(ans){
            if(ans == 1)
            {
                $(".chatclear").val("");
            }
        });
    }
  }
</script>