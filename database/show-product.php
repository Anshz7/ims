<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM product ORDER BY product_id ASC");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);

return $stmt->fetchAll();
var_dump($stmt->fetchAll());
die;

?>