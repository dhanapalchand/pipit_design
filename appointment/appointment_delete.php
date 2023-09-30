<?php
include("../config/dbConnection.php");
$sql = "DELETE FROM appointment WHERE appointid='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    header("location: ./appointment_show.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>