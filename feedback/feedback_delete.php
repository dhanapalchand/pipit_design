<?php
include("dbConnection.php");
$sql = "DELETE FROM feedback WHERE feedbackid='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    header("location: ./feedback_show.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>