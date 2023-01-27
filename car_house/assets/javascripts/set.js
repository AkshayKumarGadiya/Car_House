var base = 'http://localhost/car_house/';

$oldservice_id = 0;
//don't touch
$(document).ready(function () {

    $tagid = 0;

    $(document).on("click", ".mytagimg", function (e) {

        var parentOffset = $(this).parent().offset();

        $width = $(this).width();
        $height = $(this).height();

        //  $x=e.pageX - parentOffset.left + 5;
        // $y=e.pageYj - parentOffset.top + 6;

        $x = (e.pageX - parentOffset.left) * 100 / $width;
        $y = (e.pageY - parentOffset.top) * 100 / $height;

        $x = $x - 3;
        $y = $y - 2;

        $tagid++;

        $tag = '<div class="mycartag tagide' + $tagid + '" style="top:' + $y + '%;left:' + $x + '%;"><div style="position:relative;"><div class="tagtri"></div></div><select class="tagservices" oldid="0"></select><span style="color:#e88e8e;"><i class="fa fa-times" style="cursor:pointer;"></i></span></div>';
        $(".settag").append($tag);

        var url = base + 'Ajax/selectservices';
        $.post(url, function (ans) {

            $(".tagide" + $tagid).find("select").html(ans);
        });
    });

    $(document).on("click", ".settag i", function () {
        $(this).parent().parent().remove();
        $service_id = $(this).parent().prev().find("option:selected").val();

        var url = base + 'Ajax/deleteservices';
        $data = {service_id: $service_id};
        $.post(url, $data, function (ans) {

        });
    });


    $(document).on("change", ".tagservices", function () {

        $x = $(this).parent().css("left");
        $y = $(this).parent().css("top");

        $select = $(this);

        $width = $(".mytagimg").width();
        $height = $(".mytagimg").height();

        $x = $x.substr(0, $x.indexOf("p"));
        $y = $y.substr(0, $y.indexOf("p"));

        $x = ($x) * 100 / $width;
        $y = ($y) * 100 / $height;

        $x = $x - 3;
        $y = $y - 2;

        $service_id = $(this).find("option:selected").val();
        $oldservice_id = $(this).attr("oldid");

        $data = {xpos: $x, ypos: $y, service_id: $service_id, oldservice_id: $oldservice_id};

        var url = base + 'Ajax/addservicespos';
        $.post(url, $data, function (ans) {
            $select.attr("oldid", $select.find("option:selected").val());
        });
    });
});

function set_combo(id, action)
{
    var c = 0;
    if (id != "")
    {
        $("#" + action).html("<option>Loading...</option>");
    }
    var cc = setInterval(function () {
        if (c == 1)
        {
            clearInterval(cc);
            var data = {id: id, action: action};
            var url = base + 'Ajax/' + action;

            $.post(url, data, function (ans) {
                $("#" + action).html(ans);
            });
        }
        c = c + 1;
    }, 200);
}
function run(id, status)
{
    var data = {id: id, status: status};
    var url = base + 'Ajax/running';

    $.post(url, data);
}
function com(id, action)
{
    var data = {id: id, action: action};
    var url = base + 'Ajax/' + action;

    $.post(url, data, function (ans) {
        $("#" + action).html(ans);
    });
}

if ($("#hidespe").val() == "Selectbox" || $("#hidespe").val() == "Checkbox")
{
    $("#spevalue").show();
}
$("#hidespe").click(function () {
    if ($("#hidespe").val() == "Selectbox" || $("#hidespe").val() == "Checkbox")
    {
        $("#spevalue").show();
    } else
    {
        $("#spevalue").hide();
    }
});
$id1 = "";
$('.layer').click(function () {
    $id1 = $("#cyes").attr('href');
    $id2 = $id1 + $(this).attr("id");
    $("#cyes").attr("href", $id2);
    $(".backdiv").fadeIn(500);
});
$('#btncls').click(function () {
    $(".backdiv").fadeOut(500);
    $("#cyes").attr('href', $id1);
});

function toggle(id, action)
{
    if ($('#' + id).hasClass('fa-toggle-off'))
    {
        $('#' + id).addClass('fa-toggle-on');
        $('#' + id).removeClass('fa-toggle-off');
        toastr.success('Active');
    } else
    {
        $('#' + id).addClass('fa-toggle-off');
        $('#' + id).removeClass('fa-toggle-on');
        toastr.warning('Deactive');
    }
    var data = {id: id, action: action};
    var url = base + 'Ajax/' + action;
    $.post(url, data);
}
function openchat(id,action)
{
    var data = {id:id,action:action};
    var url = base + 'Ajax/' + action;
    $.post(url, data,function(ans){
        $("#userchat").html(ans);
    });
}