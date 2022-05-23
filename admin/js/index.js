$(document).ready(function () {

  // active User
  $(".btn-activeUser").click(function (event) {
      event.preventDefault();
      var idUser = $(this).attr('idUseur');
      var etat = $(this).attr("etat");

      //alert("Le status de l'utilisateur est = " + etat);
      // alert("et son ID est = " + idUser);

      // Ajax config
      $.ajax({
        type: "GET",
        url: "activeUser.php",
        data: {idUser:idUser,etat:etat},
        success: function(data){
          //   alert("Le status de l'utilisateur est maintenant changé!");
          location.reload();
        }
      });
      // alert("OK");
  });

  // signup User
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

  // delete User
  $(".btn-deleteUser").click(function (event) {
      event.preventDefault();
      if (confirm('Etes vous sur de vouloir supprimer cet utilisateur')){
          var idUser = $(this).attr('value');
          
          // Ajax config
          $.ajax({
          type: "GET",
          url: "deleteUser.php",
          data: {idUser:idUser},
          success: function(data){
              //   alert("Le status de l'utilisateur est maintenant changé!");
              location.reload();
          }
          });    
      }
  });

  // Search User
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