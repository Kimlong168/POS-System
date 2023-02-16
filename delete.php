<?php

require('database.php');
$id = $_GET['idd'];
mysqli_query($database,"DELETE FROM mytable WHERE id={$id}");

header('localtion:index.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Delete</title>
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
              <a class="nav-link active fw-bold" href="edit.php">Edit</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  fw-bold" href="insert.php">Add Product</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
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
          </form>
        </div>
      </div>
    </nav>

   <div class="container mt-5">
       <h1 class="text-center text-success">The product is deleted successfully!!!</h1>
       <a href="edit.php" class="text-decoration-none">
           <button class="btn btn-outline-success my-0 mx-auto d-block mt-5">Back to Edit Page</button>
       </a>
   </div>
</body>
</body>
</html> 
