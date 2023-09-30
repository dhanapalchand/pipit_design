<?php
include("dbConnection.php");

// display existing data in table
$sql = "SELECT * FROM product";
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


    ?>
   <table class="table"><thead class="thead-dark"><th>product_name</th><th>product_prize</th> <th>quantity</th><th>size</th><th>product descrption</th><th>image</th><th>delete</th>  </thead>
    <?php
    $i=0;
    while($row = mysqli_fetch_assoc($result)) {
   
       ?>
       
       <tr>
       
        <td><?php echo $row["product_name"]; ?></td>
        <td><?php echo $row["product_prize"]; ?></td> 
        <td><?php echo $row["quantity"]; ?></td> 
        <td><?php echo $row["size"]; ?></td> 
        <td><?php echo $row["product_description"]; ?></td> 
        <?php echo 
       '<td><img   src="data:image/jpeg;base64,' . base64_encode($row['file']) . '" alt="" class="img-a "  height="100px" width="100px">  </td>';
       ?>
       
         
        <td><button class="btn btn-info b4" ><a  class="btn btn-info b4" href="product_delete.php?id=<?php echo $row["productid"]; ?>">Delete</a></button></td>
       
 
        </tr>
        
        <?php
    $i++;
    }
    ?><div align="center">
   <button class="btn btn-info b4" > <a  class="btn btn-info b4" href="product_create.php">add product</a></button>
   <button class="btn btn-info b4" > <a  class="btn btn-info b4" href="..\admin\admin_view.php">back</a></button>
   </div><br>
   <?php
    
    echo "</table>";


// close database connection
mysqli_close($conn);


?>
