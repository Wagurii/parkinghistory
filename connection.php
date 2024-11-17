<?php
// connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "historydatabase"; //mydatabasename
$conn = new mysqli($servername, $username, $password, $database);

  
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

