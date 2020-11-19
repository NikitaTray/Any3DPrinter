
$(document).ready(function () {
        $("#btnSelect").on("click", function () {
            var param = {_token: $('meta[name="csrf-token"]').attr('content'), email: $("#txtEmail").val(), password: $("#txtPassword").val()};
            $.post("select/check", param, function (result) {
                if(result === "YES"){
                    window.location = "/monitor";
                }
                else{
                    alert("Invalid printer details or the printer is offline.");
                }
            })
        });
    }
);
