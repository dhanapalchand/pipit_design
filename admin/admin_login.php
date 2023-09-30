<?php
include("dbConnection.php");
$admin_name = $_POST['a_username'];
$admin_password = $_POST['a_password'];
$sql = "SELECT * FROM admin WHERE admin_name= '$admin_name' AND Admin_password='$admin_password'";
$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($result);
$me = "invalid password";
session_start();
if ($resultcheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $_SESSION["adminid"] = $row['adminid'];
    }
    $_SESSION["a_username"] = $_POST['a_username'];
    header("location:admin_view.php");
} else {
    header("location:admin_login.html?password_msg= Enter a correct password");
}
?>
