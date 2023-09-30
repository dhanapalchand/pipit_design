<?php
include("dbConnection.php");
// get the form data


$customer_name = $_POST['customer_name'];
$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$size = $_POST['orders_size'];
$amount = $_POST['orders_amount'];
$c_address = $_POST['c_address'];



// insert data into table
$sql = "INSERT INTO orders (customer_name,productid,product_name,orders_size,amount,c_address) VALUES ('$customer_name', '$product_id','$product_name','$size','$amount','$c_address')";

if (mysqli_query($conn, $sql)) {
    header("location:http://localhost/phpCRUD/instamojo/index.php?id=$amount");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



?>