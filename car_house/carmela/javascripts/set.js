var base='http://localhost/car_house/';
    function set_combo(id,action)
    {
        if(action == "missspecification")
        {
            var data = {id:id,action:action};
            var url = base + 'Ajax/' + action;

            $.post(url,data,function(ans){
               $("#"+action).html(ans);
            });
        }
        else
        {
            var c=0;

            $("#"+action).html("<option>Loading...</option>");

            var cc=setInterval(function(){
                if(c == 1)
                {
                    clearInterval(cc);
                    var data = {id:id,action:action};
                    var url = base + 'Ajax/' + action;

                    $.post(url,data,function(ans){
                       $("#"+action).html(ans);
                    });
                }
                c=c+1;
            },200);
        }
    }
    function imgg(id,action)
    {
        var d = {id:id,action:action};
        var url = base + 'Ajax/' + action;

        $.post(url,d,function(ans)
        {
           $("#"+action).html(ans);
        });
    }
    
    if( $("#hidespe").val() == "Selectbox" ||  $("#hidespe").val() == "Checkbox" )
        {
            $("#spevalue").show();
        }
    $("#hidespe").click(function(){
        if( $("#hidespe").val() == "Selectbox" ||  $("#hidespe").val() == "Checkbox" )
        {
            $("#spevalue").show();
        }
        else
        {
            $("#spevalue").hide();
        }
    });
    $id1 = "";
    $('.layer').click(function(){
        $id1 = $("#cyes").attr('href');
        $id2 = $id1 + $(this).attr("id");
        $("#cyes").attr("href",$id2);
        $(".backdiv").fadeIn(500);
    });
    $('#btncls').click(function(){
        $(".backdiv").fadeOut(500);
        $("#cyes").attr('href',$id1);
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
$(document).ready(function () {
    $("#showme2").on("click", function () {
        $c = 0;
        if ($("#showme2").hasClass("fa fa-toggle-off"))
        {
            $c = 1;
            $(this).removeClass("fa fa-toggle-off");
            $(this).addClass("fa fa-toggle-on");
            $(".pass").attr("type", "text");
            $("#showme2").attr("title", "Hide Password");

        } else
        {
            $c = 0;
            $(this).removeClass("fa fa-toggle-on");
            $(this).addClass("fa fa-toggle-off");
            $(".pass").attr("type", "password");
            $("#showme2").attr("title", "Show Password");
        }
    });
});