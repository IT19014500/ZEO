<?php
    require_once realpath(__DIR__ . '/vendor/autoload.php');

    $Dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $Dotenv->load();

    $servername = $_ENV['servername'];
    $username = $_ENV['username'];
    $password = $_ENV['password'];
    $db_name = $_ENV['db_name'];


//create connection
$conn = new mysqli($servername, $username, $password, $db_name);
mysqli_set_charset($conn,"utf8");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

?>

