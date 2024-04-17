<?php
    session_start();

    $table_name = $_SESSION['table'];

    $employee_name = $_POST['employee_name'];
    $employee_phone = $_POST['employee_phone'];
    $email = $_POST['email'];
    $salary = $_POST['salary'];
    $join_year = $_POST['join_year'];
    $password = $_POST['password'];

    try{
        $command = "INSERT INTO $table_name(employee_name, employee_phone, email, salary, join_year, password) VALUES ('".$employee_name."', '".$employee_phone."', '".$email."', '".$salary."', '".$join_year."', '".$password."')";
    
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
    header('location: ../users-add.php')
    
    

?>