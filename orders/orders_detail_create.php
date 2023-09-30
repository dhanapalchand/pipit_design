<?php
session_start();
include("dbConnection.php");
$result = mysqli_query($conn, "SELECT * FROM product where productid='" . $_GET['id'] . "'");
$result2 = mysqli_query($conn, "SELECT * FROM customer where customer_name='" . $_SESSION["c_username"] . "'");
$row = mysqli_fetch_array($result);
$row1 = mysqli_fetch_array($result2);

?>

<!DOCTYPE html>
<html>
<head>
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
  <style>
     .b1
     {
      font-size: 15px;
      text-align: center;
     }
    </style>
     <style>
      body {
        font-family: "Lato", sans-serif;
      }

      .sidenav {
        height: 33%;
        width: 0;
        position: fixed;
        z-index: 3;
        top: 3pc;
        left: 0;
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
        overflow-x: hidden;
        transition: 1s;
        padding-top: 30px;
        margin-left: 1000px;

      }

      .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: black;
        display: block;
        transition: 0.3s;
      }

      .sidenav a:hover {
        color: #f1f1f1;
      }

      .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
      }

      @media screen and (max-height: 450px) {
        .sidenav {
          padding-top: 15px;
        }

        .sidenav a {
          font-size: 18px;
        }
      }
      .b1{
              background-color:powderblue;
              font-size:20px;
              color:black;
              font-family: cursive;
              font-weight:bold;
              margin-left:50px;

          }
    </style>

  <body>
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
            <li><a class="nav-link scrollto active" href="http://localhost/phpCRUD/pipit_mini-master/">HOME</a></li>
              <li><a class="nav-link scrollto active" href="http://localhost/phpCRUD/customer/c_product/product_show.php">PRODUCTS</a></li>
              <li><a class="nav-link scrollto active" href="http://localhost/phpCRUD/customer/c_product/customer_special_order.php">ORDER DETAILS</a></li>
              <li><a class="nav-link scrollto" href="http://localhost/phpCRUD/customer/c_product/cart.php">CART</a></li>
              <li><span class="getstarted scrollto" onclick="openNav()" style="font-size:20px;cursor:pointer">&#9776;
                  <?php echo $_SESSION["c_username"] ?>
                </span></li>
              <div id="mySidenav" class="sidenav" class="topnav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="about_user.php">YOUR PROFILE</a>
                <a href="customer_special_order.php">ORDERS</a>
                <a href="logout.php">logout</a>
              </div>
              <script>
                function openNav() {
                  document.getElementById("mySidenav").style.width = "250px";
                }

                function closeNav() {
                  document.getElementById("mySidenav").style.width = "0";
                }
              </script>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->

    <form name="frmUser" method="post" action="orders_create.php">
    <div style="margin-left: 400px;top:6pc;position: absolute;">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwmKXf6LVlEqDG2_M2Bgzt3Gvi2XMeMwiyctI_toR02kIkqMTL1UsyJPg7w_FcuQiI-1o&usqp=CAU" 
            width="700px"height="500px" alt="profile">
        </div><br> 
        <div style="top: 9pc;margin-left: 470px;position: absolute;">
          <h1 style="color: rgb(79, 4, 44);font-size: 25px;font-family: cursive;margin-left: 110px;">PLACE YOUR ORDER!!!</h1><br>
          <div align="center"> <?php echo '<img   src="data:image/jpeg;base64,' . base64_encode($row['file']) . '" alt="" class="img-a "  height="100px" width="100px"> ';?>
          </div>
          <div>
            <?php if (isset($message)) {
                echo $message;
            } ?>
        </div>
        
        <input type="hidden" name="product_id" class="txtField " value="<?php echo $row['productid']; ?>">
        <div class="mb-3">
        <input type="hidden" name="customer_name" class="txtField " value="<?php echo $_SESSION["c_username"]; ?>">
       <input type="text" name="product_name"  class="txtField form-control" value="<?php echo $row["product_name"]; ?>"> </div>
       <div class="mb-3">
      <input type="text" name="orders_size" class="txtField form-control"placeholder="size" value="" required>
        </div>
        <div class="mb-3">
        <input type="number" name="orders_amount" class="txtField form-control" placeholder="amount"value="<?php echo $row['product_prize']; ?>">
        </div>
        <div class="mb-3">
       <textarea type="text" name="c_address" class="txtField form-control" placeholder="address" value="<?php echo $row1['c_address']; ?>" ><?php echo $row1['c_address']; ?></textarea>
        </div>

        <input  class="btn btn-color px-3 mb-5   b1"type="submit" name="submit" value="make payment" >
        <button class="btn btn-color px-3 mb-5  b1"> <a href="../customer/c_product/product_show.php">back to display page</a></button>
        </div>
    </form>
</body>

</html>