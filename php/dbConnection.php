<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "to_do_list";
$port ="3306";

$conn = new mysqli($server,$username,$password,$database,$port);
if ($conn->connect_error) {
die("Failed to Connect to mysql ".$conn->connect_error);
}

?>