<?php
// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
    // Set the post variables so we easily identify them, also make sure they are integer
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    // Prepare the SQL statement, we basically are checking if the product exists in our databaser
    $stmt = $pdo->prepare('SELECT * FROM product WHERE productid = ?');
    $stmt->execute([$_POST['product_id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if ($product && $quantity > 0) {
        // Product exists in database, now we can create/update the session variable for the cart
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                // Product exists in cart so just update the quanity
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
                // Product is not in cart so add it
                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {
            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }
    // Prevent form resubmission...
    header('location: index.php?page=cart');
    exit;
}
// Remove product from cart, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the cart
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
  // Remove the product from the shopping cart
  unset($_SESSION['cart'][$_GET['remove']]);
}
// Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
  // Loop through the post data so we can update the quantities for every product in cart
  foreach ($_POST as $k => $v) {
      if (strpos($k, 'quantity') !== false && is_numeric($v)) {
          $id = str_replace('quantity-', '', $k);
          $quantity = (int)$v;
          // Always do checks and validation
          if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
              // Update new quantity
              $_SESSION['cart'][$id] = $quantity;
          }
      }
  }
  // Prevent form resubmission...
  header('location: index.php?page=cart');
  exit;
}
// Send the user to the place order page if they click the Place Order button, also the cart should not be empty
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  header('Location: index.php?page=placeorder');
  exit;
}
// Check the session variable for products in cart
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
// If there are products in cart
if ($products_in_cart) {
    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM product WHERE productid IN (' . $array_to_question_marks . ')');
    // We only need the array keys, not the values, the keys are the id's of the products
    $stmt->execute(array_keys($products_in_cart));
    // Fetch the products from the database and return the result as an Array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Calculate the subtotal
    foreach ($products as $product) {
        $subtotal += (float)$product['product_prize'] * (int)$products_in_cart[$product['productid']];
    }
}
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
    @media screen and (max-width: 600px) {  
  .responsive thead {
    visibility: hidden;
    height: 0;
    position: absolute;
  }
  
  .responsive tr {
    display: block;
    margin-bottom: .625em;
  }
  
  .responsive td {
    border: 1px solid;
    border-bottom: none;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  .responsive td::before {
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  .responsive td:last-child {
    border-bottom: 1px solid;
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
      <h1>WELCOME TO PIPIT DESIGN</h1>
    </center><br>

<head>
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<div class="cart content-wrapper" >
    <h1 align="center">Shopping Cart</h1>
    <form action="index.php?page=cart" method="post">
        <table class="table table-condensed" class="responsive">
            <thead class="bg-primary">
                <tr>
                <td >Image</td>
                    <td scope="col">Product</td>
                    <td scope="col">Price</td>
                    <td scope="col">Quantity</td>
                    <td scope="col">Total</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td class="img">
                        <a href="about_product.php?id=<?=$product['productid']?>"><?php echo'
                        <img  src="data:image/jpeg;base64,' . base64_encode($product['file']) . '" alt=""  height="100px"    width="100px";>';?>
                        </a>
                    </td>
                    <td>
                        <a href="index.php?page=about_product&id=<?=$product['productid']?>"><lable class="btn btn-info b1 ">&nbsp;<?=$product['product_name']?>&nbsp;&nbsp;</lable></a>
                        <br>
                        <a href="index.php?page=cart&remove=<?=$product['productid']?>" class="remove" ><lable class="btn btn-info b1 ">Remove</lable></a>
                    </td>
                    <td class="price">&dollar;<?=$product['product_prize']?></td>
                    <td class="quantity">
                        <input type="number" name="quantity-<?=$product['productid']?>" value="<?=$products_in_cart[$product['productid']]?>" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                    </td>
                    <td class="price">&dollar;<?=$product['product_prize'] * $products_in_cart[$product['productid']]?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal" align="center">
        <lable class="btn btn-info b1 "> <span class="text">Subtotal</span></lable>
        <lable class="btn btn-info b1 ">    <span class="price">&dollar;<?=$subtotal?></span></lable>
        </div>
        <div class="buttons" align="center">
            <input class="btn btn-info b1 "type="submit" value="Update" name="update">
            <input class="btn btn-danger bi " type="submit" value="Place Order" name="placeorder">
        </div>
    </form>
</div>

