$(document).ready(function (e) {


     $('#register').bind('submit', function (e) {
          e.preventDefault();
          var form = {
               "email": '',
               "password": '',
          };

          if ($('#email').val().trim() == "") {
               $("#error").text("Email can nnot be empty");
          } else if ($('#password').val().trim() == "") {
               $("#error").text("password can nnot be empty");
          } else {
             
               form.email = $('#email').val();
               form.password = $('#password').val();


               $.ajax({
                    url:commonURL + "/login-user",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    method: "post",
                    data: form,
                    success: function (data) {
                        
                         if (data.failed == "Invalid Credentials") {
                              $("#error").text("Invalid Credentials");
                         }else{
                              window.location.href = commonURL + "/home";
                         }
                       
                    },
               })
          }


     });

     $("body").on("click","#addnewUser",function(){
          window.location.href = commonURL + "/create-user";
     });
});