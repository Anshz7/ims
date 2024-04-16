<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM employee ORDER BY employee_id ASC");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);

return $stmt->fetchAll();
var_dump($stmt->fetchAll());
die;

?>