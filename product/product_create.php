<?php
$connect = mysqli_connect("localhost", "root", "", "phpcrud1");
if (isset($_POST["insert"])) {
  $product_name = $_REQUEST['product_name'];
  $product_prize = $_REQUEST['product_prize'];
  $quantity = $_REQUEST['quantity'];
  $size = $_REQUEST['size'];
  $product_description = $_REQUEST['product_description'];

  $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $query = "INSERT INTO product VALUES (0,'$product_name',$product_prize,'$quantity','$size','$file','$product_description')";
  if (mysqli_query($connect, $query)) {
    echo '<script>alert("Image Inserted into Database")</script>';
    header("location:product_show.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css\styles1.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link href="img\admin.png" rel="icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <title>Product add form</title>
</head>

<body>
  <!-- Container Start -->
  <div id="container">
    <!-- Form Wrap Start -->
    <div class="form-wrap">
      <img class="rounded-circle mt-5" width="150px" style="margin-left: 95px "
        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
      <h1 class="text">ADD YOUR VALUABLE PRODUCT</h1>

      <!-- Form Start -->
      <form method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="first-name">product_name</label>
          <input type="text" name="product_name" id="product_name">
        </div>
        <div class="form-group">
          <label for="last-name">product_prize</label>
          <input type="number" name="product_prize" id="product_prize">
        </div>
        <div class="form-group">
          <label for="last-name">quantity</label>
          <input type="number" name="quantity" id="quantity">
        </div>
        <div class="form-group">
          <label for="last-name">size</label>
          <input type="text" name="size" id="size">
        </div>
        <div class="form-group">
          <label for="email">Image</label>
          <input type="file" name="image" id="image" />
        </div>
        <div class="form-group">
          <label for="email">product description</label>
          <textarea name="product_description" id="product_description" ></textarea>
        </div>
        <button type="submit" name="insert" id="insert" value="Insert">insert</button>
      </form>
    </div>
  </div>
</body>
</html>
<script>
  $(document).ready(function () {
    $('#insert').click(function () {
      var image_name = $('#image').val();
      if (image_name == '') {
        alert("Please Select Image");
        return false;
      }
      else {
        var extension = $('#image').val().split('.').pop().toLowerCase();
        if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
          alert('Invalid Image File');
          $('#image').val('');
          return false;
        }
      }
    });
  });  
</script>