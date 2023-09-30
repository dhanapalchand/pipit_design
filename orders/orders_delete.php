<?php
include("dbConnection.php");
$sql = "DELETE FROM orders WHERE orderid='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    header("location: ./orders_show.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>