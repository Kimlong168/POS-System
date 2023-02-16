<?php

session_set_cookie_params(7*24*60*60);

session_start();

$message = '';
$textColor = 'text-danger';
if(isset($_GET['username']) && isset($_GET['password'])){

  if($_GET['username'] == '' ||  $_GET['password'] == ''){
    
    $message = "Input username and password!!!"; 

  }
  else{
        $username = $_GET['username'];
        $password = $_GET['password'];
        require('database.php');
        $isLogin = false;
        while($data = mysqli_fetch_assoc($user)){

            if(($username == $data['username'] || $username == $data['email']) &&  $password == $data['passwordd']){

                $isLogin = true;
                $message = "Login successfully!!!"; 
                $textColor = 'text-success';

                $_SESSION['username']=$data['username'];
            
                if(isset($_GET['ref']))
                    header("Location: ". $_GET['ref']);
                else
                    header("Location: /");
                exit();
            
                }

        }

        if(!$isLogin){

            $message =  "Wrong Password, Email or Username"; 
            
        }

  }
    
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    
   <form action="<?php $_PHP_SELF ?>"  method="GET" class="border border-success rounded-2 my-5 pb-4 px-4 col-sm-5 d-block mx-auto">
      <div class="container">
        <div class="mb-3 mt-2 row gy-3">

          <legend class="fw-bold text-success">Login</legend>

          <label for="name" class="col-sm-3 col-form-label">Username: </label>
          <div class="col-sm-9">
            <input type="text" name="username" class="form-control border border-1 border-success" id="name" placeholder="Username or Email">
          </div>

          <label for="password" class="col-sm-3 col-form-label">Password: </label>
          <div class="col-sm-9">
            <input type="password" name="password" class="form-control border border-1 border-success" id="password" placeholder="Password">
          </div>
       
        </div>

        <input type="submit" value="Login" class="btn btn-success"><br><br>
        <small class="text-center mt-5 ">You don't have an account yet? <a href="signup.php">Sign up now</a></small>
      </div>
      
    </form>
    

    <h4 class="text-center mt-5 <?= $textColor ?>"><?= $message ?></h4>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>