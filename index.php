<?php
  // cookie
  session_set_cookie_params(7*24*60*60);

  session_start();

  if(!(isset($_SESSION['username']))){

    header("Location: /login.php?ref=". $_SERVER['PHP_SELF']);
    exit();

  }

 require('database.php');
 $i=0;
     
  // if(isset($_GET['search'])){

  //     if($_GET['search']==''){

  //       $search='id > 0';

  //     }else{

  //       if(is_numeric($_GET['search'])){

  //         $search = "productPrice = '" . $_GET['search'] ."'";

  //       }else if(strtolower($_GET['search']) == "food"){

  //         $search = "productType = 1";

  //       }else if(strtolower($_GET['search']) == "drink"){

  //         $search = "productType = 2";

  //       }else if(strtolower($_GET['search']) == "coffee"){

  //         $search = "productType = 3";

  //       }else{

  //         $search = "productName LIKE '%". $_GET['search'] ."%'";
  //         // $search = "productName LIKE '". $_GET['search'] ."%' OR productName LIKE '%". $_GET['search'] ."'";

  //       }
      
  //     }

  // }else{

  //   $search='id > 0';

  // }

  // $result1 = mysqli_query($database,"SELECT * FROM mytable where productType=1 AND {$search} ORDER BY productName");
  // $result2 = mysqli_query($database,"SELECT * FROM mytable where productType=2 AND {$search} ORDER BY productName");
  // $result3 = mysqli_query($database,"SELECT * FROM mytable where productType=3 AND {$search} ORDER BY productName");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Canteen Management system</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <script src="https://kit.fontawesome.com/96bf2d4fc0.js" crossorigin="anonymous"></script>
    <link href="css/style.css" rel="stylesheet"/>
  </head>
  <body>
    
    <!-- navigation -->
    <nav class="navbar navbar-expand-lg bg-light">
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
              <a class="nav-link active fw-bold" aria-current="page" href="#"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="edit.php">Edit</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="insert.php">Add Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" href="logout.php">Logout</a>
            </li>
          </ul>
          <!-- search form -->
          <!-- <form id="formId" class="d-flex" role="search" method="GET">
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
          </form> -->
        </div>
      </div>
    </nav>

    <!-- Product filter -->
    <section id="home_product-filter" class="sticky-top z-1">
      <div class="container-fluid">
        <div class="row text-white bg-success text-center">
          <div class="col border-2 py-2">
            <a href="#food-container" class="text-decoration-none text-white"
              >Food</a
            >
          </div>
          <div class="col py-2">
            <a href="#drink-container" class="text-decoration-none text-white"
              >Drink</a
            >
          </div>
          <div class="col border-2 py-2">
            <a href="#coffee-container" class="text-decoration-none text-white"
              >Coffee</a
            >
          </div>
          <div class="col border-2 py-2">
            <a href="#" class="text-decoration-none text-white">Invoice</a>
          </div>
        </div>
      </div>
    </section>

    <section class="row ps-3">
      <!-- all product -->
      <form class="col-9">
        <!-- product food box -->
        <section id="food-container">
          <div class="h2 px-4 py-2 mt-2 fw-bold">Food</div>
          <div class="container-fluid mt-4">
            <div class="row">

             <!-- to avoid 0 index of card class -->
             <div class="card rounded-0 d-none">
              <div class="card-body ">
                <h3 class="h5 productName">1</h3>
                <div class="text-danger productPrice">1</div>
              </div>
             </div>

              <?php

                while($data = mysqli_fetch_assoc($result1)){
                  echo ' 
                  <div class="col-4 col-md-2 mb-2 gx-2">
                   <div class="card rounded-0">
                     <img
                       src="'.$data["productImg"].'"
                       class="object-fit-cover"
                       alt="food"
                       style="height: 160px"
                     />
                     <div class="card-body">
                       <div class="h6 fw-bold productName">'.$data["productName"].'</div>
                       <div class="text-danger productPrice">'.$data["productPrice"].'៛</div>
                     </div>
                   </div>
                  </div>';
                  $i++;
                }
              ?>
            
            </div>
          </div>
        </section>

        <!-- product drink box -->
        <section id="drink-container">
          <div class="h2 px-4 py-2 mt-2 fw-bold">Drink</div>
          <div class="container-fluid mt-4">
            <div class="row">
             
            <?php

              while($data = mysqli_fetch_assoc($result2)){
                echo ' 
                <div class="col-4 col-md-2 mb-2 gx-2">
                <div class="card rounded-0">
                  <img
                    src="'.$data["productImg"].'"
                    class="object-fit-cover"
                    alt="food"
                    style="height: 160px"
                  />
                  <div class="card-body">
                    <div class="h6 fw-bold productName">'.$data["productName"].'</div>
                    <div class="text-danger productPrice">'.$data["productPrice"].'៛</div>
                  </div>
                </div>
                </div>';
                $i++;
              }
            ?>

            </div>
          </div>
        </section>
        <!-- product Coffee box -->
        <section id="coffee-container">
          <div class="h2 px-4 py-2 mt-2 fw-bold">Coffee</div>
            <div class="container-fluid mt-4">
              <div class="row">

                <?php

                  while($data = mysqli_fetch_assoc($result3)){
                    echo ' 
                    <div class="col-4 col-md-2 mb-2 gx-2">
                    <div class="card rounded-0">
                      <img
                        src="'.$data["productImg"].'"
                        class="object-fit-cover"
                        alt="food"
                        style="height: 160px"
                      />
                      <div class="card-body">
                        <div class="h6 fw-bold productName">'.$data["productName"].'</div>
                        <div class="text-danger productPrice">'.$data["productPrice"].'៛</div>
                      </div>
                    </div>
                    </div>';
                    $i++;
                  }
                ?>
              </div>
            </div>
          </div>
        </section>
      </form>

      <!-- invoice  -->
      <aside
        class="col-3 bg-white sticky-top z-3 border-start border-bottom border-success border-2"
        id="print"
      >
        <div class="h2 text-center my-4 text-success">Current order</div>
        <table class="table">
          <thead class="table-success text-success">
            <tr>
              <th scope="col">Item</th>
              <th scope="col">Qty</th>
              <th scope="col">Price</th>
            </tr>
          </thead>
          <tbody class="table-white">

          </tbody>
        </table>
        
        <!-- to avoid 0 index of card class -->
        <!-- total payment -->
        <div class="card rounded-0 border border-danger " title="Click to find total">
          <div class="card-body ">
            <span class="h5 productName fw-bold">Total:</span>
            <span class="total text-danger fw-bold h5"> ០​ ​៛</span>
            <div class="text-danger productPrice d-none">0</div>
          </div>
        </div>
        
        <!-- new order and print button -->
        <button onClick="window.location.reload()" class="btn btn-outline-success mt-4 rounded-0" style="width:110px">New Order</button><br><br>
        <button onClick="printRecipt()" class="btn btn-outline-success mb-3 rounded-0" style="width:110px">Print Recipt</button>
        
      </aside>
    </section>

    <!-- footer-->
    <footer>
      <div class="container my-4">
        <div class="row">
          <div class="text-center fw-bold text-success">Powered by @Chann-Kimlong</div>
        </div>
      </div>
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
    <script src="js/script.js"></script>
  </body>
</html>

