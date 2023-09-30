<?php
include("dbConnection.php");
if(count($_POST)>0) {
    $customer_name = $_POST['customer_name'];
    $c_mail = $_POST['c_mail'];
    $c_address = $_POST['c_address'];
    $c_phoneno = $_POST['c_phoneno'];
mysqli_query($conn,"UPDATE customer set customerid='" . $_POST['customerid'] . "', customer_name='" . $_POST['customer_name'] . "', c_mail='" . $_POST['c_mail'] . "', c_address='" . $_POST['c_address'] . "', c_phoneno='" . $_POST['c_phoneno'] . "',c_password='" . $_POST['c_password'] . "' WHERE customerid='" . $_POST['customerid'] . "'");
$message = "Record Modified Successfully";
}

$result = mysqli_query($conn, "SELECT * FROM customer where customerid='" . $_GET['id'] . "'");
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
<body>
<form name="frmUser" method="post" action="">
<div style="margin-left: 500px;top:6pc;position: absolute;">
                <img src="https://img.freepik.com/premium-photo/centre-top-lighting-smooth-baby-blue-display-background_148157-149.jpg" 
                width="400px"height="500px" alt="profile">
            </div><br>
            <div style="top: 9pc;margin-left: 560px;position: absolute;">
            <h1 style="color: rgb(79, 4, 44);font-size: 25px;font-family: cursive;margin-left: 40px;">Customer Updates</h1>

<div><?php if(isset($message)) { echo $message; } ?>
</div>

 <input type="hidden" name="customerid" class="txtField" value="<?php echo $row['customerid']; ?>">

 <div class="mb-3">
<input type="text" name="customer_name" class="txtField form-control"placeholder="customer name" value="<?php echo $row['customer_name']; ?>"></div>
<div class="mb-3">
<input type="text" name="c_mail" class="txtField form-control"placeholder="customer mail" value="<?php echo $row['c_mail']; ?>"></div>

<div class="mb-3">
<input type="text"placeholder="customer address" name="c_address" class="txtField form-control" value="<?php echo $row['c_address']; ?>"></div>

<div class="mb-3">
<input type="text" name="c_phoneno" class="txtField form-control"placeholder="customer phoneno" value="<?php echo $row['c_phoneno']; ?>"></div>
<div class="mb-3">
<input type="text" placeholder="customer password"name="c_password" class="txtField form-control" value="<?php echo $row['c_password']; ?>"></div>
<input type="submit" name="submit" value="Submit" class="btn btn-color px-3 mb-5 w-100 button b1">
<button class="btn btn-color px-3 mb-5 w-100 button b1">
<a  href="customer_show.php">back to display page</a>
<button>
    </div>
</form>
</body>
</html>