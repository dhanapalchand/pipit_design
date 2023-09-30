<?php

include("dbConnection.php");

session_start();
$uname = $_SESSION['c_username'];


// display existing data in table
$sql = "SELECT * FROM orders WHERE customer_name='$uname'";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Boutique</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bethany
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    h1 {
      color: blueviolet;
    }

    .avatar {
      vertical-align: middle;
      width: 40px;
      height: 40px;
      border-radius: 50%;
    }


    div.gallery {
      border: 1px solid #ccc;
    }

    div.gallery:hover {
      border: 1px solid #777;
    }



    div.desc {
      padding: -1px;
      text-align: center;
    }

    * {
      box-sizing: border-box;
    }

    .responsive {
      padding: 0 6px;
      float: left;
      height: 500PX;
      width: 450PX;
   
    }

    @media only screen and (max-width: 700px) {
      .responsive {
        width: 49.99999%;
        margin: 6px 0;
      }

      div.gallery img {
        width: 100%;
        height: auto;

      }
    }

    @media only screen and (max-width: 1000px) {
      .responsive {
        width: 100%;
      }
    }

    .clearfix:after {
      content: "";
      display: table;
      clear: both;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header">
    <div>
      <div style="background-color:white;" class="header-container d-flex align-items-center justify-content-between">
        <div class="logo" style="  background: linear-gradient(135deg, #71b7e6, #9b59b6);">
          <h1 class="text-light"><a href="index.html"><span>PIPIT BOUTIQUE</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="http://localhost/phpcrud/pipit_mini-master/">HOME</a></li>
            <li><a class="nav-link scrollto" href="index.php">PRODUCTS</a></li>
            <li><a class="nav-link scrollto " href="customer_special_order.php">ORDERS</a></li>
            <li><a class="nav-link scrollto" href="http://localhost/phpcrud/customer/c_product/index.php?page=cart"><i
                  class="fa fa-shopping-cart" style="font-size:20px;color:blueviolet">CART</i></a></li>

            <li><a class="nav-link scrollto" href="about_user.php"><img src="assets\img\download.png" alt="Avatar"
                  class="avatar"></a></li>



          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
 

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
  table.center {
    margin-left: auto;
    margin-right: auto;
  }


  td,
  th {

    text-align: center;
    padding: 8px;
  }

  .b1 {
    background-color: powderblue;
    font-size: 15px;
    color: black;
    font-family: cursive;
    margin-left: 500px;
    top: 16pc;
    position: relative;
  }

  .b2 {
    background-color: powderblue;
    font-size: 15px;
    color: black;
    font-family: cursive;
    margin-left: 50px;
    top: 16pc;
    position: absolute;
  }

  .b4 {
    font-size: 15px;

    color: white;

  }
</style>

<body>
  <?php

  if (mysqli_num_rows($result) > 0) {
    ?>
    <div align="center" style="font-family:cursive;color:purple">
      <br>
      <h3> ORDERS DETALIS </h3><br><br>
    </div>
    <table class="table">
      <thead class="thead-dark">
       
        <th>customer_name</th>
        <th>product_name</th>
        <th>size</th>
        <th>amount</th>
        <th>address</th>
      </thead>
      <?php
      $i = 0;
      while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>

          <td>
            <?php echo $row["customer_name"]; ?>
          </td>
          <td>
            <?php echo $row["product_name"]; ?>
          </td><?php
     
          ?>
          <td>
            <?php echo $row["orders_size"]; ?>
          </td>
          <td>
            <?php echo $row["amount"]; ?>
          </td>
          <td>
            <?php echo $row["c_address"]; ?>
          </td>
        </tr>
        <?php
        $i++;
      }
      echo "</table>";
  } else {
    ?>
    <div align="center">
    <h1> No Orders</h1>
    <img src="assets\img\sad logo.png "height="400px" width="400px">
  </div>
    
    
    <?php  }
  ?>
  <br>
    <div align="center">
      <button class="btn btn-info b4"> <a class="btn btn-info b4" href="product_show.php">back</a></button>
    </div><br>
    <?php
    // close database connection
    mysqli_close($conn);


    ?>