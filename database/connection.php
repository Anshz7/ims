<?php 

$servername = 'localhost';
$username = 'root';
$password = '';

//Connecting to databse

try {
    $conn = new PDO("mysql:host=$servername;dbname=clothcraft",$username,$password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo 'connection Successful';
} catch (PDOException $e) {
    $error_message = $e->getMessage();
}


?>