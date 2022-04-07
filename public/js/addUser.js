$(document).ready(function (e) {


     $('#register').bind('submit', function (e) {
          e.preventDefault();
          var form = {
               "name": '',
               "email": '',
               "password": '',
          };

          if ($('#name').val().trim() == "") {
               $("#error").text("name can nnot be empty");
          } else if ($('#email').val().trim() == "") {
               $("#error").text("Email can nnot be empty");
          } else if ($('#password').val().trim() == "") {
               $("#error").text("password can nnot be empty");
          } else {
               form.name = $('#name').val();
               form.email = $('#email').val();
               form.password = $('#password').val();


               $.ajax({
                    url:commonURL + "/add-user",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    method: "post",
                    data: form,
                    success: function (data) {
                         window.location.href = commonURL + "/login";
                    },
               })
          }


     });
});