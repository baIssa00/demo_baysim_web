// $(document).ready(function () {
//     $('.formulaire').$(selector).submit(function (e) { 
//         e.preventDefault();
//         var title = $('.title').val();
//         var description = $('.description').val();

//         alert(title + description);
//     });
// });

// var form = document.querySelector('#edit');

// form.addEventListener('submit', function (e) {
//     e.preventDefault();
//     var data = new FormData(form);
    
//     var httpRequest = new XMLHttpRequest();
//     httpRequest.onreadystatechange = function () {
//         if (httpRequest.readyState === httpRequest.DONE) {
//             // Get the form data from the event object
//             for (var value of data.values()) {
//             console.log(value);
//             }

//         }
//     }    
//     httpRequest.open("POST", form.getAttribute('action'), true);
//     httpRequest.send(data);
// })