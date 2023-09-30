<?php
include("../config/dbConnection.php");
if(count($_POST)>0) {
    $appoint_date= $_POST['appoint_date'];
    $appoint_time = $_POST['appoint_time'];
    $c_mail= $_POST['c_mail'];
    $c_phoneno= $_POST['c_phoneno'];
    
mysqli_query($conn,"UPDATE appointment set appointid='" . $_POST['appointid'] . "', appoint_date='" . $_POST['appoint_date'] . "', appoint_time='" . $_POST['appoint_time'] . "',c_mail='" . $_POST['c_mail'] . "',c_phoneno='" . $_POST['c_phoneno']. "'  WHERE appointid='" . $_POST['appointid'] . "'");
$message = "Record Modified Successfully";
}

$result = mysqli_query($conn, "SELECT * FROM appointment where appointid='" . $_GET['id'] . "'");
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

 <input type="hidden" name="appointid" class="txtField" value="<?php echo $row['appointid']; ?>">

 <input type="text" name="customer_name" class="txtField" value="<?php echo $row['customer_name']; ?>">
 <div class="mb-3">

<div class="mb-3">

<input type="date" name="appoint_date" placeholder="product price"class="txtField form-control" value="<?php echo $row['appoint_date']; ?>"></div>
<div class="mb-3">
<input type="time" name="appoint_time" placeholder="product price"class="txtField form-control" value="<?php echo $row['appoint_time']; ?>"></div>
<div class="mb-3">

<input type="text" name="c_mail"placeholder="quantity" class="txtField form-control" value="<?php echo $row['c_mail']; ?>">
<input type="text" name="c_phoneno"placeholder="quantity" class="txtField form-control" value="<?php echo $row['c_phoneno']; ?>">   
</div>
<input class="btn btn-color px-3 mb-5 w-100 button b1" type="submit" name="submit" value="Submit" class="buttom">
<button class="btn btn-color px-3 mb-5 w-100 button b1">
<a href="appointment_show.php">back to disply page</a>
    </button>
</form>
</body>
</html>