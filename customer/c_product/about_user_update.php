<?php
include("dbConnection.php");
session_start();
if (count($_POST) > 0) {
  $customer_name = $_POST['customer_name'];
  $c_mail = $_POST['c_mail'];
  $c_address = $_POST['c_address'];
  $c_phoneno = $_POST['c_phoneno'];
  mysqli_query($conn, "UPDATE customer set customerid='" . $_POST['customerid'] . "', customer_name='" . $_POST['customer_name'] . "', c_mail='" . $_POST['c_mail'] . "', c_address='" . $_POST['c_address'] . "', c_phoneno='" . $_POST['c_phoneno'] . "',c_password='" . $_POST['c_password'] . "' WHERE customerid='" . $_POST['customerid'] . "'");
  $message = "Record Modified Successfully";
}

$result = mysqli_query($conn, "SELECT * FROM customer where customerid='" . $_GET['id'] . "'");
$row = mysqli_fetch_array($result);


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

    /* Style inputs, select elements and textareas */
    input[type=text],
    select,
    textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      resize: vertical;
    }

    /* Style the label to display next to the inputs */
    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }

    /* Style the submit button */
    input[type=submit] {
      background-color: #04AA6D;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }

    /* Style the container */
    .container {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }

    /* Floating column for labels: 25% width */
    .col-25 {
      float: left;
      width: 25%;
      margin-top: 6px;
    }

    /* Floating column for inputs: 75% width */
    .col-75 {
      float: left;
      width: 75%;
      margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }


    @media screen and (max-width: 600px) {

      .col-25,
      .col-75,
      input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
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
  <div>
    <center>
      <h1>WELCOME TO PIPIT DESIGN</h1><br>
      <h1 style="color: rgb(79, 4, 44);font-size: 25px;font-family: cursive;margin-left: 40px;">Customer Updates</h1>
    </center><br>
</body>
</html>
<div class="container">
  <form name="frmUser" method="post" action="">
   
    
        <input type="hidden" name="customerid" value="<?php echo $row['customerid']; ?>">
      
      
    
        <input type="hidden" name="customer_name" placeholder="customer name"
          value="<?php echo $row['customer_name']; ?>">
      
      <div class="row">
      <div class="col-25">
        <label>Mail Address </label>
      </div>
      <div class="col-75">
        <input type="text" name="c_mail"placeholder="customer mail"
          value="<?php echo $row['c_mail']; ?>">
      </div>
      <div class="row">
      <div class="col-25">
        <label>Address </label>
      </div>

      <div class="col-75">
        <input type="text" placeholder="customer address" name="c_address"
          value="<?php echo $row['c_address']; ?>">
      </div>
      <div class="row">
      <div class="col-25">
        <label>Mobile Number</label>
      </div>

      <div class="col-75">
        <input type="text" name="c_phoneno" placeholder="customer phoneno"
          value="<?php echo $row['c_phoneno']; ?>">
      </div>
     
    <div>
        <input type="hidden" placeholder="customer password" name="c_password" 
          value="<?php echo $row['c_password']; ?>">
    </div>
     <br>
     <div   class="row">
      <input type="submit" name="submit" value="Submit" class="btn btn-color px-3 mb-5 w-100 button b1"></div>
      <button class="btn btn-color px-3 mb-5 w-100 button b1">
      <div   class="row">
        <a class="btn btn-color px-3 mb-5 w-100 button b1" href="about_user.php">back</a></button></div>

    
</form>
</body>

</html>