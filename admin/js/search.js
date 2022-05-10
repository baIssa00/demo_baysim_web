$(document).ready(function () {
    $("#search_user").keyup(function() {
        var input = $(this).val();
        // alert(input);

        if (input != "") {
            $.ajax({
                url: "search_user.php",
                method: "POST",
                data:{input:input},

                success:function(data) {
                    $("#searchresult").html(data);
                }
            });
        }else{
            $("#searchresult").css("display", "none");
        }
    });
});