<?php

$servername ="localhost";
// tesla
// localhost
$username ="root";
// zeogalew_zeo321
// root
$password ="";
// f5IWq8051MKQ

$db_name ="zeogalew_zonalgalewela";
// zeogalew_zonalgalewela
// zonalgalewela


//create connection
$conn = new mysqli($servername, $username, $password, $db_name);
mysqli_set_charset($conn,"utf8");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>