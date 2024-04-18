<?php
    session_start();
    if(!isset($_SESSION['product'])) {
        header('location: login.php');
        exit(); // Make sure to exit after redirecting
    }
    $_SESSION['table'] = 'product';
    $employee = $_SESSION['product'];
    $employees = include('database/show-product.php');
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloth Craft - add product</title>
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
                            <h1 class="section_header"> <i class="fa fa-plus"></i>Create Product</h1>
                            <div id="userAddFormContainer">

                                <form action="database/add.php" method="POST" class="appForm">
                                    <div class="appFormInputContainer">
                                        <label for="product_name">Name</label>
                                        <input type="text" class="appFormInput" id="product_name" name="product_name" />
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="quantity">Quantity</label>
                                        <input type="int" class="appFormInput" id="quantity" name="quantity" />
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="email">Price</label>
                                        <input type="int" class="appFormInput" id="price" name="price" />
                                    </div>
                                    <div class="appFormInputContainer">
                                        <label for="salary">Category</label>
                                        <select name="category" id="category" class="appFormInput">
                                            <option value="data1">data 1</option>
                                            <option value="data2">data 2</option>
                                        </select>
                                        
                                    <button type = "submit" class="appBtn"> <i class="fa fa-plus">Add Product</i> </button>
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
                            <h1 class="section_header"> <i class="fa fa-list"></i> List of Products</h1>
                            <div class="section_content">
                                <div class="products">
                                    <p class ="productCount"><?= count($products) ?> Products</p>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>quantity</th>
                                                <th>price</th>
                                                <th>category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($products as $index => $product){ ?>
                                                <tr>
                                                    <td><?= $index + 1?></td>
                                                    <td><?= $product['product_name'] ?></td>
                                                    <td><?= $product['quantity'] ?></td>
                                                    <td><?= $product['price'] ?></td>
                                                    <td><?= $product['category_id'] ?></td>
                                                    <td>
                                                        <a href="" class="deleteProduct" data-productid = "<?= $product['product_id'] ?>" data-name="<?= $product['product_name'] ?>" > <i class="fa fa-trash"></i> Delete</a>
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


                    if(classList.contains('deleteProduct')){
                        e.preventDefault();
                        productId = targetElement.dataset.productid;
                        name = targetElement.dataset.name;
                        
                        if(window.confirm('are you sure you want to delete '+name+'?')){
                            $.ajax({
                                method: 'POST',
                                data: {
                                    product_id: productId,
                                    product_name: name
                                },
                                url: 'database/delete-product.php',
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