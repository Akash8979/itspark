$(document).ready(function () {
     $("body").on("click", ".edit", function () {
          $(this).closest("tr").html(`
          <td><input value="${$(this).closest("tr").find("td:nth-child(1)").text()}" /></td>
          <td><input value="${$(this).closest("tr").find("td:nth-child(2)").text()}" /></td>
          <td class="action-btn wspace-no text-center">
                              <button class="btn btn-primary update">update</button>
                              <button class="btn btn-danger delete">Delete</button>
                         </td>
          `)


     });
     $("body").on("click", ".update", function () {
         var tr =  $(this).closest("tr");
          var form = {
               "name": '',
               "email": '',
               "id": '',

          };
          if ($(this).closest("tr").find("td:nth-child(1) input").val().trim() == "") {
               $("#error").text("name can nnot be empty");
          } else if ($(this).closest("tr").find("td:nth-child(2) input").val().trim() == "") {
               $("#error").text("Email can nnot be empty");
          } else {
               form.name =$(this).closest("tr").find("td:nth-child(1) input").val().trim();
               form.email = $(this).closest("tr").find("td:nth-child(2) input").val().trim();
               form.id =$(this).closest("tr").attr('userId');



               $.ajax({
                    url: commonURL + "/update-user",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    method: "post",
                    data: form,
                    success: function (data) {
                       tr.html(`
                         <td>${form.name}</td>
                         <td>${form.email}</td>
                         <td class="action-btn wspace-no text-center">
                                             <button class="btn btn-primary edit">Edit</button>
                                             <button class="btn btn-danger delete">Delete</button>
                                        </td>
                         `)
                    },
               })
          }
     });
     $("body").on("click", ".delete", function () {
         var tr =  $(this).closest("tr");
               $.ajax({
                    url: commonURL + "/delete-user",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    method: "post",
                    data: {
                         "id":$(this).closest("tr").attr('userId')
                    },
                    success: function (data) {
                         tr.remove();
                    },
               })
          
     });
     $("body").on("click", "#logout", function () {
         
               $.ajax({
                    url: commonURL + "/logout-user",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    method: "post",
                    data: {
                         "id":$(this).closest("tr").attr('userId')
                    },
                    success: function (data) {
                         window.location.href = commonURL + "/login";
                    },
               })
          
     });



});