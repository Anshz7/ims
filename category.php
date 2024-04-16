<?php
    session_start();
    if(!isset($_SESSION['employee'])) header('location: login.php');
    $_SESSION['table'] = 'category';
    $category = $_SESSION['category'];
    $categorys = include('database/show-category.php');
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloth Craft - category</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
</head>

<body>
    <div id="dashboardMainContainer">
        <?php include('partials/app-sidebar.php') ?>
        <div class="dashboard_content_container" id="dashboard_content_container">
            <?php include('partials/app-topnav.php') ?>
            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <div class="row">
                        <div class="column column-5">
                            <h1 class="section_header"> <i class="fa fa-plus"></i>Create category</h1>
                            <div id="userAddFormContainer">

                                <form action="database/add.php" method="POST" class="appForm">
                                    <div class="appFormInputContainer">
                                        <label for="employee_name">Name</label>
                                        <input type="text" class="appFormInput" id="employee_name" name="employee_name" />
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="employee_phone">Phone Number</label>
                                        <input type="text" class="appFormInput" id="employee_phone" name="employee_phone" />
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="email">Email</label>
                                        <input type="text" class="appFormInput" id="email" name="email" />
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="salary">Salary</label>
                                        <input type="text" class="appFormInput" id="salary" name="salary" />
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="join_year">Joining Date</label>
                                        <input type="text" class="appFormInput" id="join_year" name="join_year" />
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="password">Password</label>
                                        <input type="password" class="appFormInput" id="password" name="password" />
                                    </div>
                                    <button type = "submit" class="appBtn"> <i class="fa fa-plus">Add User</i> </button>
                                </form>
                                <?php 
                                    if(isset($_SESSION['response'])){ 
                                        $response_message = $_SESSION['response']['message'];
                                        $is_success = $_SESSION['response']['success'];
                                ?>
                                    <div class="responseMessage">
                                        <p class="responseMessage <?= $is_success ? 'responseMessage__success' : 'responseMessage__error' ?>">
                                            <?= $response_message ?>
                                        </p>
                                    </div>
                                <?php unset($_SESSION['response']); } ?>
                            </div>
                        </div>
                        <div class="column column-7">
                            <h1 class="section_header"> <i class="fa fa-list"></i> List of categories</h1>
                            <div class="section_content">
                                <div class="employees">
                                    <p class ="userCount"><?= count($employees) ?> Staff</p>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Phone Number</th>
                                                <th>Email</th>
                                                <th>Salary</th>
                                                <th>Joining Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($employees as $index => $employee){ ?>
                                                <tr>
                                                    <td><?= $index + 1?></td>
                                                    <td><?= $employee['employee_name'] ?></td>
                                                    <td><?= $employee['employee_phone'] ?></td>
                                                    <td><?= $employee['email'] ?></td>
                                                    <td><?= $employee['salary'] ?></td>
                                                    <td><?= $employee['join_year'] ?></td>
                                                    <td>
                                                        <a href=""> <i class="fa fa-pencil"></i> Edit</a>
                                                        <a href="" class="deleteUser" data-userid = "<?= $employee['employee_id'] ?>" data-name="<?= $employee['employee_name'] ?>" > <i class="fa fa-trash"></i> Delete</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>

                                            
                                                
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
    <script src="js/jquery/jquery-3.7.1.min.js"></script>
    <script>
        function script(){

            this.initialize = function(){
                this.registerEvent();
            },
            this.registerEvent = function(){
                document.addEventListener('click',function(e){
                    targetElement = e.target;
                    classList = targetElement.classList;


                    if(classList.contains('deleteUser')){
                        e.preventDefault();
                        userId = targetElement.dataset.userid;
                        name = targetElement.dataset.name;
                        
                        if(window.confirm('are you sure you want to delete '+name+'?')){
                            $.ajax({
                                method: 'POST',
                                data: {
                                    user_id: userId,
                                    employee_name: name
                                },
                                url: 'database/delete-user.php',
                                dataType: 'json',
                            })
                        }
                        else{
                            console.log('ok no delete');
                        }
                    }
                });
            }
        }
        var script = new script;
        script.initialize();

    </script>
</body>

</html>