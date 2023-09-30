<?php
include("dbConnection.php");
if(count($_POST)>0) {
    $adminid = $_POST['adminid'];
    $admin_name = $_POST['admin_name'];
    $admin_password = $_POST['Admin_password'];
mysqli_query($conn,"UPDATE admin set adminid='" . $_POST['adminid'] . "', admin_name='" . $_POST['admin_name'] . "', Admin_password='" . $_POST['Admin_password'] . "'  WHERE adminid='" . $_POST['adminid'] . "'");
$message = "Record Modified Successfully";
}

$result = mysqli_query($conn, "SELECT * FROM admin where adminid='" . $_GET['id'] . "'");
$row = mysqli_fetch_array($result);


?>
<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
      </head>
      <style>
        .button{
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
                width="400px"height="400px" alt="profile">
            </div><br>
            <div style="top: 9pc;margin-left: 580px;position: absolute;">
            <h1 style="color: rgb(79, 4, 44);font-size: 25px;font-family: cursive;margin-left: 50px;">Update!!</h1><br>
<div><?php if(isset($message)) { echo $message; } ?>
</div>

 <input type="hidden" name="adminid" class="txtField" value="<?php echo $row['adminid']; ?>">


 <div class="mb-3">
<input type="text" name="admin_name" class="txtField form-control" placeholder="Admin Name"value="<?php echo $row['admin_name']; ?>">
    </div>        
    <div class="mb-3">

<input type="text" name="Admin_password" class="txtField form-control"placeholder="Admin Password" value="<?php echo $row['Admin_password']; ?>">
<br>
<div>
<input  class="button btn btn-color px-3 mb-5 w-100 button"type="submit" name="submit" value="Submit" class="buttom">
    </div>
<button class="button btn btn-color px-3 mb-5 w-100 button" >
<a href="admin_show.php">back to display page</a>
    </button>  
</div>
</form>
</body>
</html>