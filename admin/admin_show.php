<?php
include("dbConnection.php");
// display existing data in table
$sql = "SELECT * FROM admin";
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
table {
  font-family:cursive;
  border-collapse: collapse;
  width: 100%;
  text-align:center;
}
  
  table.center {
  margin-left:auto; 
  margin-right: auto;
}


td, th {
  border: 5px solid powderblue;
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
</style>  
<body>
	<?php

if (mysqli_num_rows($result) > 0) {
    ?>
   <table class="center"><tr><th>admin_id</th><th>admin_name</th><th>admin_password</th> </tr>
    <?php
    $i=0;
    while($row = mysqli_fetch_assoc($result)) {
       ?>
       <tr>
        <td><?php echo $row["adminid"]; ?></td>
        <td><?php echo $row["admin_name"]; ?></td>
        <td><?php echo $row["Admin_password"]; ?></td> 
        <td><a href="admin_update.php?id=<?php echo $row["adminid"]; ?>">Update</a></td> 
        <td ><a href="admin_delete.php?id=<?php echo $row["adminid"]; ?>">Delete</a></td> 
        </tr><?php
    $i++;
    }
    echo "</table>";
} else {
    echo "0 results";
}

// close database connection
mysqli_close($conn);

?>
