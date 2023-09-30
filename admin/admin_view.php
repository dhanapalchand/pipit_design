<?php
session_start();
if(isset($_SESSION['a_username'])){
  ?>
<html>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Favicons -->
  <link href="img/realestate.avif" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

 
  <link href="css/style.css" rel="stylesheet">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
    <!-- ======= Header ======= -->
    <header id="header" >
    <div >
      <div style="background-color:white;"class="header-container d-flex align-items-center justify-content-between">
        <div class="logo" style="  background: linear-gradient(135deg, #71b7e6, #9b59b6);
">
          <h1  class="text-light"><a href="index.html"><span>PIPIT BOUTIQUE</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
        <ul>

               <li><a class="getstarted scrollto" href="..\customer\c_product\logout.php">LOGOUT</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header --></head><body>
    <style>
        .b1{
            font-size:15px;
            margin-left: 900px;
            position:absolute;
            top:8pc;
            color:white;

        }
        .b2
        {
            font-size:15px;
            margin-left: 900px;
            position:absolute;
            top:17pc;
            color:white;
        }
        .b3{
            font-size:15px;
            margin-left: 900px;
            position:absolute;
            top:25pc;
            color:white;

        }
        .b4{
            font-size:15px;
            margin-left: 900px;
            position:absolute;
            top:34pc;
            color:white;

        }
        .b5{
            font-size:15px;
            margin-left: 900px;
            position:absolute;
            top:42pc;
            color:white;

        }
    </style>
    <br><br>
  <div class="container p-3 my-3 bg-primary text-white">
    <h1>customer Details</h1>
    <button class="btn btn-info b1"><a href="..\customer\customer_show.php">View</a></button>
    <br><br>
  </div><br><br>
  <div class="container p-3 my-3 bg-primary text-white ">
    <h1>Product Details</h1>
    <button class="btn btn-info b2"><a href="..\product\product_show.php">View</a></button>
    <br><br>

  </div><br><br>
  <div class="container p-3 my-3 bg-primary text-white ">
    <h1>Order Details</h1>
    <button class="btn btn-info b3"><a href="..\orders\orders_show.php">View</a></button>
    <br><br>

  </div><br><br>
  <div class="container p-3 my-3 bg-primary text-white ">
    <h1>Feedback Details</h1>
    <button class="btn btn-info b4"><a href="..\feedback\feedback_show.php">View</a></button>    <br><br>

  </div>
  <br><br>
  <div class="container p-3 my-3 bg-primary text-white ">
    <h1>Appointment Details</h1>
    <button class="btn btn-info b5"><a href="..\appointment\appointment_show.php">View</a></button>    <br><br>

  </div>
  
</body></html>
<?php
}
else{
  header("location:admin_login.php");
}