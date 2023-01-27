
$(document).ready(function () {

    $("#next").on("click", function () {

        $(".forgetpass").slideToggle();
        $("#loginuser").hide(1000);

    });
    $("#back").on("click", function () {

        $(".loginuser").show(1000);
        $(".forgetpass").slideToggle();

    });
});
$(document).ready(function () {
    $("#name").on("click", function () {
        var char = "abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        var len = 8;
        var pass = "";
        for (var x = 0; x < len; x++)
        {
            var i = Math.floor(Math.random() * char.length);
            pass += char.charAt(i);
        }
        $("#pass").val(pass);
    });
});
$(document).ready(function () {
    $("#showme").on("click", function () {
        $c = 0;
        if ($("#showme").hasClass("fa-toggle-off"))
        {
            $c = 1;
            $(this).removeClass("fa-toggle-off");
            $(this).addClass("fa-toggle-on");
            $(".passme").attr("type", "text");
            $("#showme").attr("title", "Hide Password");
            $("#showme").css("color", "#FF6200");
        } else
        {
            $c = 0;
            $(this).removeClass("fa-toggle-on");
            $(this).addClass("fa-toggle-off");
            $(".passme").attr("type", "password");
            $("#showme").attr("title", "Show Password");
            $("#showme").css("color", "#AAAAAA");
        }
    });
});
$(document).ready(function () {
    $("#showme1").on("click", function () {
        $c = 0;
        if ($("#showme1").hasClass("fa fa-toggle-off"))
        {
            $c = 1;
            $(this).removeClass("fa fa-toggle-off");
            $(this).addClass("fa fa-toggle-on");
            $(".password1").attr("type", "text");
            $("#showme1").attr("title", "Hide Password");
            $("#showme1").css("color", "#FF6200");

        } else
        {
            $c = 0;
            $(this).removeClass("fa fa-toggle-on");
            $(this).addClass("fa fa-toggle-off");
            $(".password1").attr("type", "password");
            $("#showme1").attr("title", "Show Password");
            $("#showme1").css("color", "#AAAAAA");
        }
    });
});

/* FAQ's */

$(document).ready(function () {
    $("#11").on("click", function () {
        $("#c").slideUp(1000);
        $("#b").slideUp(1000);
        $("#d").slideUp(1000);
        $("#e").slideUp(1000);
        $("#f").slideUp(1000);
        $("#afaq").stop();
        $("#afaq").slideToggle(1000);
    });
});
$(document).ready(function () {
    $("#2").on("click", function () {
        $("#c").slideUp(1000);
        $("#d").slideUp(1000);
        $("#e").slideUp(1000);
        $("#f").slideUp(1000);
        $("#afaq").slideUp(1000);
        $("#b").stop();
        $("#b").slideToggle(1000);
    });
});
$(document).ready(function () {
    $("#3").on("click", function () {
        $("#d").slideUp(1000);
        $("#afaq").slideUp(1000);
        $("#e").slideUp(1000);
        $("#f").slideUp(1000);
        $("#b").slideUp(1000);
        $("#c").stop();
        $("#c").slideToggle(1000);
    });
});
$(document).ready(function () {
    $("#4").on("click", function () {
        $("#b").slideUp(1000);
        $("#afaq").slideUp(1000);
        $("#e").slideUp(1000);
        $("#f").slideUp(1000);
        $("#c").slideUp(1000);
        $("#d").stop();
        $("#d").slideToggle(1000);
    });
});
$(document).ready(function () {
    $("#5").on("click", function () {
        $("#c").slideUp(1000);
        $("#b").slideUp(1000);
        $("#afaq").slideUp(1000);
        $("#f").slideUp(1000);
        $("#d").slideUp(1000);
        $("#e").stop();
        $("#e").slideToggle(1000);
    });
});
$(document).ready(function () {
    $("#6").on("click", function () {
        $("#c").slideUp(1000);
        $("#b").slideUp(1000);
        $("#d").slideUp(1000);
        $("#afaq").slideUp(1000);
        $("#e").slideUp(1000);
        $("#f").stop();
        $("#f").slideToggle(1000);
    });
});

var base='http://localhost/car_house/';
function addreview(id)
{
    var msg = document.getElementById('reviewmsg').value;

    if(msg != "")
    {
        var data = {id:id,msg:msg};
        var path = base + 'Ajax/addreview';

        $.post(path,data,function(ans){
            if(ans == "ha")
            {
                $("#review").fadeIn(500);
                $("#reviewmsg").html("");
                $("#reviewmsg").val("");
            }
        });
    }
    else
    {
        $("#reviewerror").html("Enter Review For This Car.");
    }
}

function addwish(cid)
{
    var data = {cid:cid};
    var path = base + 'Ajax/addwish';

    $.post(path,data,function(ans){
        $("."+cid).html("<a class='btn m-btn' style='margin-top: 16px;background-color:#565656;color:#fff;' title='Added To Wish'>ADDED WISH<span class='fa fa-angle-right' style='background-color:white;color:#000;'></span></a>");
    });
    }
var star=0;
function fillstar(id)
{
    star=id;
    for($i=1;$i<=id;$i++)
    {
        $("#s"+$i).removeClass("fa-star-o");
        $("#s"+$i).addClass("fa-star");
        
    }
    for($i=id+1;$i<=5;$i++)
    {
        $("#s"+$i).removeClass("fa-star");
        $("#s"+$i).addClass("fa-star-o");
    }
}

$(".star").mouseenter(function(){
    $id=$(this).attr('data-value');
    for($a=1;$a<=$id;$a++)
    {
        $("#s"+$a).attr("style","color:#FF6200!important;font-size:20px!important;");
    }
    $id=(parseInt($id) + 1);
    for($a=$id;$a<=5;$a++)
    {
        $("#s"+$a).attr("style","color:#CBCBCB!important;font-size:20px!important;");
    }
});
$(".star").mouseout(function(){
    $id=$(this).attr('data-value');
    for($a=$id;$a>=0;$a--)
    {
        $("#s"+$a).attr("style","color:#FF6200!important;font-size:20px!important;");
    }
});
function addrate(rid)
{
    if(star == 0)
    {
        $("#mess").html("Please Select A Rating.");
    }
    else
    {
        var base="http://localhost/car_house/";
        var path=base+'Ajax/addrate';
        var data={rid:rid,star:star};
        $.post(path,data,function(ans){
           $("#opnrate").fadeIn(500);
        });
    }
}
$("#searchdiv").hide();
function fillsearch(value)
{
    if(value !="")
    {
      var c=0;
       $("#searchdiv").fadeIn(500);
      $("#searchdiv").html('<center><img src="http://localhost/car_house/visitor/images/loading.gif" style="width: 200px;height: 195px;margin-top:-34px;"/></center>');
      
      var cc=setInterval(function(){
          if(c==1)
          {
            clearInterval(cc);
            $data={value:value};
            var base="http://localhost/car_house/";
            var url=base+'Ajax/fillsearch';
            $.post(url,$data,function(ans){
            $("#searchdiv").html(ans);
            $(".input-group").attr("style","border-radius:0px;border:1px solid #FF6200;");
            });
          }
            c=c+1;
      },500);
  }
  else
  {
   $("#searchdiv").fadeOut(500);
   $("#searchdiv").html('');       
  }
}