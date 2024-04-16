<?php
    session_start();
    if(isset($_SESSION['employee'])) header('location: dashboard.php');


    $error_message ='';

    if($_POST){
        include('database/connection.php');

        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = 'SELECT * FROM employee WHERE employee.email = "'. $username .'" AND employee.password = "'. $password .'"';
        $stmt = $conn->prepare($query);
        $stmt->execute();

        

        if($stmt->rowCount() > 0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $employee = $stmt->fetchAll()[0];
            $_SESSION['employee'] = $employee;
            var_dump($_SESSION['employee']);
            
            header('location: dashboard.php');
            
        } else $error_message = 'Email or password incorrect. Try again.';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloth Craft - Login</title>

    <link rel="stylesheet" href="css/login.css">
</head>

<body id="loginBody">
    <?php if(!empty($error_message)) { ?>
        <div id ="errorMessage">
            <strong>ERROR: </strong> <p><?= $error_message ?> </p>
        </div>
    <?php } ?>
    <div class="container">
        <div class="loginHeader">
            <h1>Cloth Craft</h1>
            <p>LOGIN</p>
        </div>
        <div class="loginBody">
            <form action="login.php" method="POST">
                <div class="loginInputsContainer">
                    <label for="">Username</label>
                    <input placeholder="Email" name="username" type="text" />
                </div>
                <div class="loginInputsContainer">
                    <label for="">Password</label>
                    <input placeholder="Password" name="password" type="password" />
                </div>
                <div class="loginButtonContainer">
                    <button>Login</button>
                </div>
            </form>

        </div>
    </div>
</body>

</html>