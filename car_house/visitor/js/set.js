var base='http://localhost/car_house/';
    function set_combo(id,action)
    {
        var c=0;
        if(id != "")
        {
            $("#"+action).html("<option>Loading...</option>");
        }
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