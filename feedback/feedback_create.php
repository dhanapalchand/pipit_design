<?php
include("dbConnection.php");
// get the form data


$customer_name = $_POST['customer_name'];
$product_id = $_POST['product_id'];
$review = $_POST['review'];
$rating = $_POST['rating'];




// insert data into table
$sql = "INSERT INTO feedback (customer_name,productid,review,rating) VALUES ('$customer_name', '$product_id','$review','$rating')";

if (mysqli_query($conn, $sql)) {
    header("location: ../customer/c_product/product_show.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



?>