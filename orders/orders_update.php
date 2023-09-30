<?php
include("dbConnection.php");
if(count($_POST)>0) {
    $quantity = $_POST['quantity'];
    $amount = $_POST['amount'];
    $c_address= $_POST['c_address'];
    
mysqli_query($conn,"UPDATE orders set orderid='" . $_POST['orderid'] . "', quantity='" . $_POST['quantity'] . "', amount='" . $_POST['amount'] . "',c_address='" . $_POST['c_address'] . "' WHERE orderid='" . $_POST['orderid'] . "'");
$message = "Record Modified Successfully";
}

$result = mysqli_query($conn, "SELECT * FROM orders where orderid='" . $_GET['id'] . "'");
$row = mysqli_fetch_array($result);
?>
<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
      </head>
      <style>
        .b1{
            background-color:pink;
            font-size:15px;
            color:black;
            font-family: cursive;
        }
      </style>
      <div style="margin-left: 500px;top:6pc;position: absolute;">
                <img src="https://img.freepik.com/premium-photo/centre-top-lighting-smooth-baby-blue-display-background_148157-149.jpg" 
                width="400px"height="500px" alt="profile">
            </div><br>
            <div style="top: 9pc;margin-left: 560px;position: absolute;">
            <h1 style="color: rgb(79, 4, 44);font-size: 25px;font-family: cursive;margin-left: 40px;"> Update Here</h1>

<body>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>

 <input type="hidden" name="orderid" class="txtField" value="<?php echo $row['orderid']; ?>">


 <div class="mb-3">

<div class="mb-3">

<input type="text" name="amount" placeholder="product price"class="txtField form-control" value="<?php echo $row['amount']; ?>"></div>
<div class="mb-3">
<input type="text" name="c_address" placeholder="product price"class="txtField form-control" value="<?php echo $row['c_address']; ?>"></div>
<div class="mb-3">

<input type="text" name="quantity"placeholder="quantity" class="txtField form-control" value="<?php echo $row['quantity']; ?>">
    </div>
<input class="btn btn-color px-3 mb-5 w-100 button b1" type="submit" name="submit" value="Submit" class="buttom">
<button class="btn btn-color px-3 mb-5 w-100 button b1">
<a href="orders_show.php">back to disply page</a>
    </button>
</form>
</body>
</html>