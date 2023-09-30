<?php
include("dbConnection.php");
$customer_name = $_POST['c_username'];
$c_password = $_POST['c_password'];
$sql = "SELECT * FROM customer WHERE customer_name= '$customer_name' AND c_password='$c_password'";
$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($result);
$me = "invalid password";
session_start();
if ($resultcheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $_SESSION["customerid"] = $row['customerid'];
    }
    $_SESSION["c_username"] = $_POST['c_username'];
    header("location:c_product");
} else {
    header("location: ./customer_login1.php?password_msg= Enter a correct password");
}
?>
