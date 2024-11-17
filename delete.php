<?php
require_once('connection.php'); 

if(isset($_GET["deleteid"])){
 $id = $_GET["deleteid"];

$query = "DELETE FROM historytable WHERE id = $id";
 $result = mysqli_query($conn,$query);
 
}
header("location:/phm/index.php");
exit;
?>