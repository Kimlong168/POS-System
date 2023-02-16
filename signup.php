<?php
$message='';
$textColor = 'text-danger';
    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repassword'])){

        if($_POST['username'] == '' ||  $_POST['email'] == '' ||  $_POST['password'] == '' ||  $_POST['repassword'] == ''){

            $message = "Please Input all the informations!"; 
        
        }
        else{

            $isSignUp = true;
            require('database.php');

            while($data = mysqli_fetch_assoc($user)){

              if($_POST['email'] == $data['email']){

                  $isSignUp = false;
                  $message = "Your email is already used!"; 
                  $textColor = 'text-danger';
                  break;

              }

            }

            if($isSignUp){

              if($_POST['password'] == $_POST['repassword']){

                $username = $_POST['username'];
                $email = $_POST['email'];
                $repassword= $_POST['repassword'];
                
                $sql = "INSERT INTO users ( username, email, passwordd) VALUES ('{$username}','{$email}','{$repassword}');";
                mysqli_query($database,$sql);
                
                $message="sign up successfully";
                $textColor = "text-success";

                header("Location: /login.php");
                exit();
                
              }else{
                $message= "Your password doesn't match!!!";
              }

            }
        
        }
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    
  <form  method="post" class="border border-success rounded-2 my-5 pb-4 px-4 col-sm-5 d-block mx-auto">
      <div class="container">
        <div class="mb-3 mt-2 row gy-3">

          <legend class="fw-bold text-success">Sign Up</legend>

          <label for="username" class="col-sm-3 col-form-label">Username: </label>
          <div class="col-sm-9">
            <input type="text" name="username" class="form-control border border-1 border-success" id="username" placeholder="Username">
          </div>

          <label for="email" class="col-sm-3 col-form-label">Email: </label>
          <div class="col-sm-9">
            <input type="email" name="email" class="form-control border border-1 border-success" id="email" placeholder="Email">
          </div>

          <label for="password" class="col-sm-3 col-form-label">Password: </label>
          <div class="col-sm-9">
            <input type="password" name="password" class="form-control border border-1 border-success" id="password" placeholder="Password">
          </div>

          <label for="repassword" class="col-sm-3 col-form-label">Confirm: </label>
          <div class="col-sm-9">
            <input type="password" name="repassword" class="form-control border border-1 border-success" id="repassword" placeholder="Confirm Password" >
          </div>
       
        </div>

        <input type="submit" value="Sign Up" class="btn btn-success"><br><br>

        <small class="text-center mt-5 ">Already have an account? <a href="login.php">login now</a></small>
      </div>
    </form>
   
    <h4 class="text-center mt-5 <?= $textColor ?>"><?= $message ?></h4>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

