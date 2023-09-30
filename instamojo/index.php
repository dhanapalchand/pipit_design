<?php
session_start();
include("dbConnection.php");
$result = mysqli_query($conn, "SELECT * FROM product where productid='" . $_GET['id'] . "'");
$result2 = mysqli_query($conn, "SELECT * FROM customer where customer_name='" . $_SESSION["c_username"] . "'");
$row = mysqli_fetch_array($result);
$row1 = mysqli_fetch_array($result2);

$amount = $_GET['id'];


$temp_id = rand(1000000, 9999999);
 $uid=0;
?>


<form action="pay.php" method="GET">
    <input type="text" name="name" placeholder="Enter Your Name" value="<?php echo $_SESSION["c_username"];?>" readonly><br>
     <input name="phone" placeholder="Enter Phone"value="<?php echo $row1['c_phoneno']?>" readonly><br>
      <input  name="email" placeholder="Enter Email" value="<?php echo $row1["c_mail"];?>" readonly><br>
       <input type="number" name="amount" placeholder="Enter Amount" value="<?php echo $amount;?>" readonly><br>
        <input type="text" name="purpose" placeholder="Purpose" value=" <?php echo "pay to pipit product";?>" readonly><br>
         <input  name="uid" placeholder="UID" value=" <?php echo $u_id = rand(1000000000000, 9999999999999000);?>" readonly><br>
         <input type="text" name="temp" placeholder="Temp ID" value=" <?php echo $temp_id;?>" readonly><br>
         <button type="submit">Submit</button>
</form>