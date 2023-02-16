<?php 
     
      $filterType= 'productName';

     if(isset($_GET['filter'])){

      $filterType= $_GET['filter'];

     }

     if(isset($_GET['search'])){

        if($_GET['search']==''){

          $search='id > 0';

        }else{

          if(is_numeric($_GET['search'])){

            $search = "productPrice = '" . $_GET['search'] ."'";

          }else if(strtolower($_GET['search']) == "food"){

            $search = "productType = 1";

          }else if(strtolower($_GET['search']) == "drink"){

            $search = "productType = 2";

          }else if(strtolower($_GET['search']) == "coffee"){

            $search = "productType = 3";

          }else{

            $search = "productName LIKE '%". $_GET['search'] ."%'";
            // $search = "productName LIKE '". $_GET['search'] ."%' OR productName LIKE '%". $_GET['search'] ."'";

          }
        
        }

     }else{

      $search='id > 0';

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
    <style>
      .edit{
        cursor : pointer;
      }
      *{
        font-family: 'Khmer OS Siemreap';
      }
    </style>
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
          <!-- search form -->
          <form class="d-flex" role="search" method="GET">
            <input
              class="form-control me-2 rounded-0 border border-success"
              type="search"
              placeholder="Search"
              aria-label="Search"
              name="search"
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

    <!-- filter -->
    <section>
      <form method="GET">
        <div class="container mt-3">
          <div class="row">

            <div class="col-sm-1">
            <label class="fw-bold text-danger">Filter by:</label>
            </div>
           
            <div class="col-sm-3">
  
                <select class="form-select border border-success" aria-label="Default select example" name="filter">
                  <option value="productName">Product Name</option>
                  <option value="productType">Product Type</option>
                  <option value="productPrice">Product Price</option>
                </select>
            
            </div>
            <div class="col-sm-2">
              <input type="submit" class="btn btn-outline-success">
            </div>
          </div>
        </div>
      </form>
    </section>
    
    <form  method="post">
      <div class="container">
        <div class="mb-3 row mt-4 gy-3">
        
          <table class="table">
          <thead class="table-success text-success fw-bold">
            <tr>
              <th>No</th>
              <th>Item</th>
              <th>Price</th>
              <th>Type</th>
              <th>Image</th>
              <th colspan="2">Edit</th>
            </tr>
          </thead>
          <tbody>
           
              <?php
                $i=1;
                $checkFound=false;
                // $filterType='productName';
                require('database.php');
                $result = mysqli_query($database,"SELECT * FROM mytable WHERE {$search} ORDER BY {$filterType}");
                while($data = mysqli_fetch_assoc($result)){
                  $checkFound = $data;
                  $type ='';
                  if($data["productType"] == 1 ){
                    $type ='Food';
                  }else if($data["productType"] == 2 ){
                    $type ='Drink';
                  }else{
                    $type ='Coffee';
                  }

                  echo '
                  <tr>
                    <td>'. $i .'</td>
                    <td>'. $data["productName"] .'</td>
                    <td>'. $data["productPrice"] .'​ ៛ </td>
                    <td>'. $type .' </td>
                    <td> <img class="img-fluid" style="width:60px" src="'. $data["productImg"] .'"/> </td>
                    <td class="edit"> <a class="text-primary" href="update.php?id='. $data['id'] .'&name='. $data['productName'].'&type='. $data['productType'].'&price='. $data['productPrice'].'&img='.$data['productImg'].'">Update</a></td>
                    <td><a class="text-danger" href="delete.php?idd='. $data['id'] . '" data-bs-href="delete.php?idd='. $data['id'] .'" type="button" data-bs-toggle = "modal" data-bs-target="#exampleModal">Delete</a></td>
                  </tr>
                  ';
                  $i++;
                  #<td class="edit deleteBtn"><a class="text-danger delete" href="delete.php?idd='. $data['id'] .'" onClick="return checkDelete()">Delete</a></td>
                }

                if(!$checkFound){
                  echo '
                  <tr>
                     <td colspan="6" class="text-danger text-center h3 fw-bold py-5">Search Not Found!</td>
                  </tr>';
                }
                
                ?>
          
          </tbody>
          </table>

        </div>
      </div>
    </form>
    
    <!-- confirm delete -->
    <div class="modal fade" class="confirm-delete" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold text-success" id="exampleModalLabel">Delete Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-danger text-center h4 fw-bold">Are you sure to delete?</p>
                    <p class="debug-url"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#" class="btn btn-danger btn-ok">Yes</a>
                </div>
            </div>
        </div>
    </div>

    <!-- footer-->
    <footer>
      <div class="container my-4">
        <div class="row">
          <div class="text-center fw-bold text-success">Powered by @Chann-Kimlong</div>
        </div>
      </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>

      // function checkDelete(){
      //   return confirm('Are you sure you want to delete?');
      // }

      const exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            const href = button.getAttribute('data-bs-href')
            const btnYes = exampleModal.querySelector('.btn-ok')
            btnYes.href = href;
        });
    </script>
</body>
</html>


