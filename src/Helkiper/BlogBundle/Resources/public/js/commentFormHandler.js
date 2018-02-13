$(function () {
    $('form.main').on('submit', function (e) {
       e.preventDefault();

       $.ajax({
           'url': $(this).attr('action'),
           'type': $(this).attr('method'),
           'data': $(this).serialize(),
           'dataType': 'json'
       })
           .done(function (data) {
                $('#commentContainer').replaceWith(data.content);
                $('form.main').get(0).reset();
           });

       return false;
    });
});

