<?php
    session_start();

    $table_name = $_SESSION['table'];

    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    try{
        $command = "INSERT INTO $table_name(product_name, quantity, price) VALUES ('".$product_name."', '".$quantity."', '".$price."')";
    
        include('connection.php');
        $conn->exec($command);
        $response = [
            'success' => true,
            'message' => $employee_name . ' Successfully Added to the System'
        ];
    } catch (PDOException $e){
        $response = [
            'success' => false,
            'message' => $e->getMessage()
        ];

    }

    $_SESSION['response'] = $response;
    header('location: ../product-page.php')
    
    

?>