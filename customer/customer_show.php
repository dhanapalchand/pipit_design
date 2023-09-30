<?php
include("dbConnection.php");
// display existing data in table
$sql = "SELECT * FROM customer";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
      </head>
   <style>

  
  table.center {
  margin-left:auto; 
  margin-right: auto;
}


td, th {

  text-align: center;
  padding: 8px;
}

.b1{
        background-color:powderblue;
        font-size:20px;
        color:black;
        font-family: cursive;
        margin-left:400px;
        top:16pc;
        position: relative;
      }
.b2
{
    background-color: powderblue;
        font-size:20px;
        color:black;
        font-family: cursive;
        margin-right:400px;
        top:16pc;
        position:relative;
}
.b4{
            font-size:15px;
           
            color:white;

        }
</style>  

<body>
	<?php

if (mysqli_num_rows($result) > 0) {
    ?>
    <div align="center" style="font-family:cursive;color:purple">
    <br>
    <h3> CUSTOMER DETALIS </h3><br><br></div>
   <table class="table"><thead class="thead-dark"><th>customer_id</th><th>customer_name</th><th>customer_mail</th> <th>customer_address</th><th>customer_phonenumber</th> <th>customer_password</th> </thead>
    <?php
    $i=0;
    while($row = mysqli_fetch_assoc($result)) {
       ?>
       <tr>
        <td><?php echo $row["customerid"]; ?></td>
        <td><?php echo $row["customer_name"]; ?></td>
        <td><?php echo $row["c_mail"]; ?></td> 
        <td><?php echo $row["c_address"]; ?></td> 
        <td><?php echo $row["c_phoneno"]; ?></td> 
        <td><?php echo $row["c_password"]; ?></td> 
        <td ><button class="btn btn-info b4" ><a class="btn btn-info b4"  href="customer_update.php?id=<?php echo $row["customerid"]; ?>">Update</a></button></td> 
        <td><button class="btn btn-info b4" ><a class="btn btn-info b4" href="customer_delete.php?id=<?php echo $row["customerid"]; ?>">Delete</a></button></td> 
        </tr><?php
    $i++;
    }
    echo "</table>";
} else {
    echo "0 results";
}?>
<div align="center">
   
   <button class="btn btn-info b4" > <a  class="btn btn-info b4" href="..\admin\admin_view.php">back</a></button>
   </div><br>
   <?php
// close database connection
mysqli_close($conn);

?>
