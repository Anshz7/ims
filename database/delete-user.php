<?php
    
    session_start();

    $data = $_POST;
    $user_id = (int) $data['user_id'];
    $name = $data['employee_name'];

    try{
        $command = "DELETE FROM employee WHERE employee_id=13";
    
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
    header('location: ../users-add.php')
?>
