// $(document).ready(function () {
//     $(".btn-activeUser").click(function (event) {
//       event.preventDefault();
//       var idUser = $(this).attr('idUseur');
//       var etat = $(this).attr("etat");

//       //alert("Le status de l'utilisateur est = " + etat);
//       // alert("et son ID est = " + idUser);

//       // Ajax config
//       $.ajax({
//         type: "GET",
//         url: "activeUser.php",
//         data: {idUser:idUser,etat:etat},
//         success: function(data){
//           //   alert("Le status de l'utilisateur est maintenant changé!");
//           location.reload();
//         }
//       });
//       // alert("OK");
//   });

//   $(".btn-deleteUser").click(function (event) {
//       event.preventDefault();
//       if (confirm('Etes vous sur de vouloir supprimer cet utilisateur')){
//           var idUser = $(this).attr('value');
          
//           // Ajax config
//           $.ajax({
//           type: "GET",
//           url: "deleteUser.php",
//           data: {idUser:idUser},
//           success: function(data){
//               //   alert("Le status de l'utilisateur est maintenant changé!");
//               location.reload();
//           }
//           });    
//       }
//   });
// });