$(document).ready(function () { 
    $('#btn-inscrits').click(function(event){
        event.preventDefault();
        //alert("button");
        $.ajax({
            url: 'validation.php',
            type: 'POST',
            data: $("form").serialize(),
            success: function (data) {
                if (!data.success) {
                    $("#error").html(data);
                }
            }
        });
    });
});