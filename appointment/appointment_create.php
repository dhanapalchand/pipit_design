<?php
include("../config/dbConnection.php");
// get the form data
session_start();
$customer_name = $_POST['customer_name'];
$appoint_date = $_POST['appoint_date'];

$c_mail = $_POST['c_mail'];
$c_phoneno = $_POST['c_phoneno'];



// insert data into table
$sql = "INSERT INTO appointment (customer_name,appoint_date,c_mail,c_phoneno) VALUES ('$customer_name', '$appoint_date','$c_mail','$c_phoneno')";

if (mysqli_query($conn, $sql)) {
    echo '<div  align="center" ><h1 align="center" style="font-family:cursive;color:purple " > APPOINTMENT HAS BEEN PLACEED SUCCESSFULLY</h1><br>
    <button   style="background-color:rosybrown;padding:25px;font-size:25px;color:white";"><a  href="http://localhost/phpCRUD/pipit_mini-master/">back to home page</a></button></div>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



?>
