<?php
    
    session_start();

    $data = $_POST;
    $product_id = (int) $data['product_id'];
    $name = $data['product_name'];

    try{
        $command = "DELETE FROM employee WHERE `product`.`product_id` = '{$user_id}'";
    
        include('connection.php');
        $conn->exec($command);

        $response = [
            'success' => true,
            'message' => $name . ' Successfully deleted from the System'
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
