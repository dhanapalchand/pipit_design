<?php
session_start();
include("../config/dbConnection.php");

$result2 = mysqli_query($conn, "SELECT * FROM customer where customer_name='" . $_SESSION["c_username"] . "'");

$row1 = mysqli_fetch_array($result2);

?>
<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
      </head>
<body>
<style>
          .b1{
              background-color:powderblue;
              font-size:20px;
              color:black;
              font-family: cursive;
              font-weight:bold;
              margin-left:40px;

          }
        </style>
    <form name="frmUser" method="post" action="appointment_create.php">
    <div style="margin-left: 400px;top:6pc;position: absolute;">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwmKXf6LVlEqDG2_M2Bgzt3Gvi2XMeMwiyctI_toR02kIkqMTL1UsyJPg7w_FcuQiI-1o&usqp=CAU" 
            width="700px"height="500px" alt="profile">
        </div><br> 
        <div style="top: 9pc;margin-left: 570px;position: absolute;">
          <h1 style="color: rgb(79, 4, 44);font-size: 25px;font-family: cursive;">BOOK YOUR APPOINTMENT!!!</h1><br>
          <div>
            <?php if (isset($message)) {
                echo $message;
            } ?>
        </div>
        <div class="mb-3">
        <label style="color:rgb(29, 136, 136);font-weight:600;">USER NAME</label>
       <input type="text" name="customer_name" class="txtField form-control" value="<?php echo $_SESSION["c_username"]; ?>" required>
       </div>
       <div class="mb-3">
       <label style="color:rgb(29, 136, 136);font-weight:600;">APPOINTMENT DATE</label>
      <input  type="date" name="appoint_date" class="txtField form-control"placeholder="date" value="" required>
        </div>
        
        <div class="mb-3">
        <label  style="color:rgb(29, 136, 136);font-weight:600;">E-MAIL</label>
       <input type="text" name="c_mail" class="txtField form-control" placeholder="address"value="<?php echo $row1['c_mail']; ?>" required><br>
       <label style="color:rgb(29, 136, 136);font-weight:600;">ADDRESS </label>
       <input type="text" name="c_phoneno" class="txtField form-control" placeholder="address"value="<?php echo $row1['c_phoneno']; ?>" required>   
    </div>

        <input  class="btn btn-info px-1 mb-5   b1"type="submit" name="submit" value="book appointment" >

        </div>
    </form>
</body>

</html>