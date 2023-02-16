<?php

session_start();

$message = '';
$textColor = 'text-danger';
if(isset($_POST['name']) && isset($_POST['type']) && isset($_POST['price']) && isset($_POST['img'])){

  if($_POST['name'] == '' ||  $_POST['type'] == '' ||  $_POST['price'] == '' ||  $_POST['img'] == ''){

    $message = "<h1>Please Input all the informations!</h1>"; 

  }
  else{

    $name = $_POST['name'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $img="assets/" . $_POST['img'];
    
    require('database.php');
    $sql = "INSERT INTO mytable ( productName, productType, productPrice, productImg) VALUES ('{$name}',{$type},{$price},'{$img}');";
    mysqli_query($database,$sql);
    
    $message =  "<h1>Item is added successfully!</h1>"; 
    $textColor = "text-success";
  }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Insert Item</title>
</head>
<body>
  
    <!-- navigation -->
    <nav class="navbar navbar-expand-lg bg-light shadow-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="assets/logo.avif" alt="Bootstrap" width="90" height="80" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon bg-success"></span>
        </button>
        <div
          class="collapse navbar-collapse my-3 my-sm-0"
          id="navbarSupportedContent"
        >
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex gap-lg-4">
            <li class="nav-item">
              <a class="nav-link fw-bold" aria-current="page" href="index.php"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="edit.php">Edit</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active fw-bold" href="insert.php">Add Product</a>
            </li>
          </ul>
          <!-- <form class="d-flex" role="search">
            <input
              class="form-control me-2 rounded-0 border border-success"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button
              class="btn btn-outline-success rounded-0 text-secondary"
              type="submit"
            >
              Search
            </button>
          </form> -->
        </div>
      </div>
    </nav>

    <form  method="post">
      <div class="container">
        <div class="mb-3 row mt-5 gy-3">

          <label for="inputName" class="col-sm-5 col-form-label">Product Name: </label>
          <div class="col-sm-4">
            <input type="text" name="name" class="form-control border border-1 border-success" id="inputName" placeholder="Product Name">
          </div>

          <label for="inputType" class="col-sm-5 col-form-label">Product Type: </label>
          <div class="col-sm-4">
            <select name="type" class="form-control form-select border border-1 border-success" aria-label="Default select example"  id="inputType">
              <option value="1">Food</option>
              <option value="2">Drink</option>
              <option value="3">Coffee</option>
            </select>      
          </div>
         

          <label for="inputPrice" class="col-sm-5 col-form-label">Product Price: </label>
          <div class="col-sm-4">
            <input type="number" name="price" class="form-control border border-1 border-success" id="inputPrice" placeholder="Product Price (៛)" min="0">
          </div>

          
          <label for="inputImage" class="col-sm-5 col-form-label">Product Image: </label>
          <div class="col-sm-4">
            <input type="file" name="img" class="form-control border border-1 border-success" id="inputImage">
          </div>
        </div>

     

        <input type="submit" value="Add Item" class="btn btn-success">
      
      </div>
    </form>

    <div class="h6 text-center mt-4 <?= $textColor ?>">
      <?= $message ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>