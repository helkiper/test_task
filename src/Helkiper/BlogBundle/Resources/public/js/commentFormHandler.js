$(function () {
    $('form').on('submit', function (e) {
       e.preventDefault();

       // var data =

       $.ajax({
           'url': $(this).attr('action'),
           'type': $(this).attr('method'),
           'data': $(this).serialize(),
           'dataType': 'json'
       })
           .done(function (data) {
               $('#commentList').append(data);
               $('form').get(0).reset();
               console.log(data);
           });

       return false;
    });
});

