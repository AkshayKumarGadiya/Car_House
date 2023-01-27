$(document).ready(function () {
        $("#eyeslash").on("click", function () {
            $c = 0;
            if ($("#eyeslash").hasClass("fa-eye-slash"))
            {
                $c = 1;
                $(this).removeClass("fa-eye-slash");
                $(this).addClass("fa-eye");
                $("#pwd").attr("type", "text");
                $("#eyeslash").attr("title", "Hide Password");
                
            } else
            {
                $c = 0;
                $(this).removeClass("fa-eye");
                $(this).addClass("fa-eye-slash");
                $("#pwd").attr("type", "password");
                $("#eyeslash").attr("title", "Show Password");
                
            }
        });
    });
    
    