<?php
include("../config/dbConnection.php");
$sql1="DELETE FROM feedback WHERE productid = '" . $_GET["id"] . "'";
$sql2="DELETE FROM orders WHERE productid = '" . $_GET["id"] . "'";
$sql = "DELETE FROM product WHERE productid='" . $_GET["id"] . "'";

if (mysqli_query($conn,$sql1)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
if (mysqli_query($conn,$sql2)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    header("location:product_show.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
    
}
mysqli_close($conn);
?>