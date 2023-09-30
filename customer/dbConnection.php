
<?php
// connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpcrud1";


$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>