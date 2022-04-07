<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <script>
 var commonURL = {!! json_encode(url('/')) !!}
     </script>
    
</head>

<body>
<h1 class="mb-3 mt-5 mx-auto" style="width:50%">
     <button class="btn btn-lg btn-primary" id="addnewUser">Add new user</button>
</h1>
     <h1 class="mb-3 mt-5 mx-auto" style="width:50%">Login</h1>
     
     <p class="mb-3 mt-5 mx-auto" style="width:50%;color:red;" id="error"></p>
     <form id="register">

          <div class="mb-3 mt-5 mx-auto" style="width:50%">
               <label class="form-label">Email address</label>
               <input type="email" class="form-control" id="email" >
          </div>
          <div class="mb-3 mt-5 mx-auto" style="width:50%">
               <label  class="form-label">Pasword</label>
               <input type="text" class="form-control" id="password" >
          </div>
          <div class="mb-3 mt-5 mx-auto" style="width:10%">
               <button type="submit" class="btn btn-lag btn-primary">Save</button>
          </div>

     </form>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

     <script src="./js/login.js"></script>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>