<?php
include("dbConnection.php");

// display existing data in table
$sql = "SELECT * FROM orders";
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
        font-size:15px;
        color:black;
        font-family: cursive;
        margin-left:500px;
        top:16pc;
        position: relative;
      }
.b2
{
    background-color: powderblue;
        font-size:15px;
        color:black;
        font-family: cursive;
        margin-left:50px;
        top:16pc;
        position: absolute;
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
    <h3> ORDERS DETALIS </h3><br><br></div>
    <table class="table"><thead class="thead-dark"><th>order_id</th><th>customer_name</th><th>product_id</th><th>product_name</th> <th>quantity</th> <th>amount</th><th>address</th> </thead>
    <?php
    $i=0;
    while($row = mysqli_fetch_assoc($result)) {
       ?>
       <tr>
        <td><?php echo $row["orderid"]; ?></td>
        <td><?php echo $row["customer_name"]; ?></td>
        <td><?php echo $row["productid"]; ?></td>
        <td><?php echo $row["product_name"]; ?></td>  
        <td><?php echo $row["orders_size"]; ?></td> 
        <td><?php echo $row["amount"]; ?></td> 
        <td><?php echo $row["c_address"]; ?></td> 
       
       
        <td><button class="btn btn-info b4" ><a  class="btn btn-info b4" href="orders_update.php?id=<?php echo $row["orderid"]; ?>">Update</a></button></td> 
        <td><button class="btn btn-info b4" ><a class="btn btn-info b4" href="orders_delete.php?id=<?php echo $row["orderid"]; ?>">Delete</a></button></td> 
       
        
        </tr><?php
    $i++;
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>
<div align="center">
   
   <button class="btn btn-info b4" > <a  class="btn btn-info b4" href="..\admin\admin_view.php">back</a></button>
   </div><br>
   <?php
// close database connection
mysqli_close($conn);


?>
