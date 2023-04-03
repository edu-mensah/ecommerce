<?php 
session_start();

if(!isset($_SESSION["email"]) && !isset($_SESSION['employee_id'])){
    header("Location: ../../index.php");
    exit();
}

include_once '../database_connection/database_connection.php';


// Category
$category_select_query = "SELECT * FROM categories;";
$stmt_category = $connection->prepare($category_select_query);
$stmt_category->execute();
$category_data = $stmt_category->fetchAll();
// var_dump($category_data);
$count_category = $stmt_category->rowCount();



// employees
$employee_select_query = "SELECT * FROM employees WHERE employee_type LIKE 'sales%';";
$stmt_employee = $connection->prepare($employee_select_query);
$stmt_employee->execute();
$salesmen_data = $stmt_employee->fetchAll();
$count_salesmen = $stmt_employee->rowCount();




// customer
$customer_select_query = "SELECT * FROM customers;";
$stmt_customer = $connection->prepare($customer_select_query);
$stmt_customer->execute();
$customer_data = $stmt_customer->fetchAll();
$count_customer = $stmt_customer->rowCount();


// Product
$product_select_query = "SELECT * FROM products;";
$stmt_product = $connection->prepare($product_select_query);
$stmt_product->execute();
$product_data = $stmt_product->fetchAll();
$count_product = $stmt_product->rowCount();
// 
$product_stock_query = "SELECT SUM(availability_in_stock) AS 'stock' FROM products;";
$stmt_stock = $connection->prepare($product_stock_query);
$stmt_stock->execute();
$product_stock = $stmt_stock->fetch();





// odrers
$order_select_query = "SELECT * FROM orders;";
$stmt_order = $connection->prepare($order_select_query);
$stmt_order->execute();
$order_data = $stmt_order->fetchAll();
$count_order = $stmt_order->rowCount();
// 
// $product_stock_query = "SELECT SUM(availability_in_stock) AS 'stock' FROM products;";
// $stmt_stock = $connection->prepare($product_stock_query);
// $stmt_stock->execute();
// $product_stock = $stmt_stock->fetch();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../images/icons/favicon.jpg" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard G22 ONLINE SHOP</title>
    <link rel="stylesheet" href="../css/admin_account.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/navbar.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/footer.css?v=<?= time();?>">

    <!-- fontawesome -->
    <link rel="stylesheet" href="../fontawesome/css/all.css  ?v=<?= time();?>">
</head>
<body>
<nav class="header-bar">
    <div class="profile-details">
        <span>
            <img src="../images/profile_pictures/<?= $_SESSION['image']; ?>" alt="">
        </span>
        <h3><?= $_SESSION['name'] ?></h3>
    </div>
    <h2><?= $_SESSION['employee_type'] ?></h2>
    <ul class="drop-down-menu" >
        <li><strong>Name:</strong> <?= $_SESSION['name']; ?></li>
        <li><strong>Email:</strong> <?= $_SESSION['email']; ?></li>
        <li><a href="../configuration/sign_out.php">Log-out</a></li>
    </ul>
</nav>
<!--  -->

<div class="main-profile-wrapper">
    <div class="links-bar">
        <ul>
            <li ><a href="#dashboard"> DASHBORAD </a></li>
            <li ><a href="#products"> PRODUCTS </a> </li>
            <?php if ($_SESSION['employee_type'] == 'ADMIN') { ?>
            <li ><a href="#salesmen">SALESMEN </a></li>
            <?php } ?>
            <!-- <li></li> -->
        </ul>
    </div>
    <section class="dashboard-wrapper" id="dashboard" >
        <h2>Dashboard</h2>
        <div class="card-container">
            <div class="card">
            <h3><?= $count_category; ?></h3>
            <p>CATEGORIES</p>
        </div>
        <?php if ($_SESSION['employee_type'] == 'ADMIN') { ?>
        <div class="card">
            <h3><?= $count_customer; ?></h3>
            <p>CUSTOMERS</p>
        </div>
        <div class="card">
            <h3><?= $count_salesmen; ?></h3>
            <p>SALESMEN</p>
        </div>
        <?php } ?>
        <div class="card">
            <h3>20</h3>
            <p>ORDERS WITHIN LAST MONTH</p>
        </div>
        <div class="card">
            <h3>GHc 15</h3>
            <p>LAST MONTH REVENUE </p>
        </div>
        <div class="card">
            <h3><?= $product_stock->stock; ?></h3>
            <p>PRODUCTS IN STOCK</p>
        </div>
        </div>
    </section>

    <!--  -->
    <section class="products-wrapper" id="products">
        <h2>Products</h2>
        <div class="product-list">
            <h3>All Products</h3>
            <div class="list">
                <div class="list-header">
                    <h3>CODE</h3>
                    <h3>Name</h3>
                    <h3>PRICE</h3>
                    <h3>STOCK</h3>
                </div>
                <?php foreach ($product_data as $product) { ?>
                    <div class="list-item">
                        <span class=""><?= $product->product_code; ?></span>
                        <span><?php echo(ucfirst($product->product_name)); ?></span>
                        <span>GHc <?= $product->product_price; ?></span>
                        <span><?= $product->availability_in_stock; ?></span>
                    </div>                    
                <?php } ?>
                <!-- <div class="list-item">
                    <span class="">12452</span>
                    <span>Iphone 14 Pro</span>
                    <span>GHc 7500</span>
                    <span>245</span>
                </div> -->
                
            </div>
        </div>


        <!--  -->
        <h2 class="add-product-btn"> <span> <i class="fas fa-plus"></i> </span> Add Product</h2> 
        <form class="form" id="addProduct" action="../configuration/add_product.php" method="post">
       
                <?php   if (isset($_GET['product_id_error'])) { ?>
                    <div class="form-item">
                    <span> <i class="fab fa-orcid"></i> </span>
                    <input type="text" name="product_id" placeholder="Product ID" value="<?= $_GET['product_id'] ?>" autocomplete="off" id="">
                </div>
                <p class="error"> <?= $_GET['product_id_error'] ?> </p>
                <?php } elseif(isset($_GET['product_id'])) { ?>
                    <div class="form-item">
                    <span> <i class="fab fa-orcid"></i> </span>
                    <input type="text" name="product_id" placeholder="Product ID" value="<?= $_GET['product_id'] ?>" autocomplete="off" id="">
                </div>
                    <?php }else { ?>
                    <div class="form-item">
                        <span> <i class="fab fa-orcid"></i> </span>
                        <input type="text" name="product_id" placeholder="Product ID" autocomplete="off" id="">
                    </div>
                    <?php } ?>
                


                    <!--  -->
                    <?php  if (isset($_GET['product_name_error'])) { ?>
                    <div class="form-item">
                        <span> <i class="fas fa-arrow-alt-circle-right"></i> </span>
                        <input type="text" name="product_name" placeholder="Product Name" value="<?= $_GET['product_name'] ?>" autocomplete="off" id="">
                    </div>
                    <p class="error"> <?= $_GET['product_name_error'] ?> </p>
                    <?php } elseif (isset($_GET['product_name'])) { ?>
                        <div class="form-item">
                            <span> <i class="fas fa-arrow-alt-circle-right"></i> </span>
                            <input type="text" name="product_name" placeholder="Product Name" value="<?= $_GET['product_name'] ?>" autocomplete="off" id="">
                        </div>
                    <?php } else{ ?>
                        <div class="form-item">
                            <span> <i class="fas fa-arrow-alt-circle-right"></i> </span>
                            <input type="text" name="product_name" placeholder="Product Name" autocomplete="off" id="">
                        </div>
                    <?php } ?>




                    <!--  -->
                    <?php if (isset($_GET['product_desc_error'])) { ?>
                        <div class="form-item">
                            <span> <i class="fas fa-arrow-alt-circle-right"></i> </span>
                            <input type="text" name="product_desc" placeholder="Product Description" value="<?= $_GET['product_desc'] ?>" autocomplete="off" id="">
                        </div>
                        <p class="error"> <?= $_GET['product_desc_error'] ?> </p>
                <?php } elseif (isset($_GET['product_desc'])) { ?>
                        <div class="form-item">
                            <span> <i class="fas fa-arrow-alt-circle-right"></i> </span>
                            <input type="text" name="product_desc" placeholder="Product Description" value="<?= $_GET['product_desc'] ?>" autocomplete="off" id="">
                        </div>                    
                <?php } else { ?>
                        <div class="form-item">
                            <span> <i class="fas fa-arrow-alt-circle-right"></i> </span>
                            <input type="text" name="product_desc" placeholder="Product Description" autocomplete="off" id="">
                        </div>

                    <?php } ?>


                    <!--  -->
                    <?php if (isset($_GET['price_error'])) { ?>
                        <div class="form-item">
                            <span> <i class="fas fa-cedi-sign"></i> </span>
                            <input type="text" name="price" placeholder="Price"  value="<?= $_GET['price'] ?>" autocomplete="off" id="">
                        </div>
                        <p class="error"> <?= $_GET['price_error'] ?> </p>                 
                    <?php } elseif (isset($_GET['price'])) { ?>
                    <div class="form-item">
                            <span> <i class="fas fa-cedi-sign"></i> </span>
                            <input type="text" name="price" placeholder="Price"  value="<?= $_GET['price'] ?>" autocomplete="off" id="">
                        </div>     
                <?php } else{ ?>
                        <div class="form-item">
                            <span> <i class="fas fa-cedi-sign"></i> </span>
                            <input type="text" name="price" placeholder="Price" autocomplete="off" id="">
                        </div>
                    <?php } ?>

                    <!--  -->
                    <?php if (isset($_GET['product_category_error'])) { ?>
                        <div class="form-item">
                            <span> <i class="fas fa-arrow-alt-circle-right"></i> </span>
                            <select name="product_category" id="">
                                    <option value=""> Select the Product Category </option>
                                <?php foreach ($category_data as $category) { ?>
                                    <option value="<?= ($category->category_id); ?>"><?php echo(ucwords($category->category_title)); ?></option>
                                <?php } ?>
                            </select>
                            <!-- <input type="text" name="product_category" placeholder="Email"  value="<?= $_GET['product_category'] ?>" autocomplete="off" id=""> -->
                        </div>
                        <p class="error"> <?= $_GET['product_category_error'] ?> </p>                 
                    <?php } elseif (isset($_GET['product_category'])) { ?>
                    <div class="form-item">
                            <span><i class="fas fa-arrow-alt-circle-right"></i> </span>
                            <select name="product_category" id="">
                                    <option value=""> Select the Product Category </option>
                                <?php foreach ($category_data as $category) { ?>
                                    <option value="<?= ($category->category_id); ?>"><?php echo(ucwords($category->category_title)); ?></option>
                                <?php } ?>
                            </select>
                            <!-- <input type="text" name="email" placeholder="Email"  value="<?= $_GET['product_category'] ?>" autocomplete="off" id=""> -->
                        </div>     
                <?php } else{ ?>
                        <div class="form-item">
                            <span> <i class="fas fa-arrow-alt-circle-right"></i> </span>
                            <select name="product_category" id="">
                                    <option value=""> Select the Product Category </option>
                                <?php foreach ($category_data as $category) { ?>
                                    <option value="<?= ($category->category_id); ?>"><?php echo(ucwords($category->category_title)); ?></option>
                                <?php } ?>
                            </select>
                            <!-- <input type="text" name="product_category" placeholder="Product" autocomplete="off" id=""> -->
                        </div>
                    <?php } ?>
                    <!--  -->


                    <?php if (isset($_GET['product_weight_error'])) { ?>
                        <div class="form-item">
                            <span> <i class="fas fa-arrow-alt-circle-right"></i> </span>
                            <input type="text" name="product_weight" placeholder="Product Weight"  value="<?= $_GET['product_weight'] ?>" autocomplete="off" id="">
                        </div>
                        <p class="error"> <?= $_GET['product_weight_error'] ?> </p>                 
                    <?php } elseif (isset($_GET['product_weight'])) { ?>
                    <div class="form-item">
                            <span> <i class="fas fa-arrow-alt-circle-right"></i> </span>
                            <input type="text" name="product_weight" placeholder="Product Weight"  value="<?= $_GET['product_weight'] ?>" autocomplete="off" id="">
                        </div>     
                <?php } else{ ?>
                        <div class="form-item">
                            <span> <i class="fas fa-arrow-alt-circle-right"></i> </span>
                            <input type="text" name="product_weight" placeholder="Product Weight" autocomplete="off" id="">
                        </div>
                    <?php } ?>


                    <!--  -->


                    <?php if (isset($_GET['product_qty_error'])) { ?>
                        <div class="form-item">
                            <span> <i class="fas fa-arrow-alt-circle-right"></i> </span>
                            <input type="text" name="product_qty" placeholder="Product Quantity"  value="<?= $_GET['product_qty'] ?>" autocomplete="off" id="">
                        </div>
                        <p class="error"> <?= $_GET['product_qty_error'] ?> </p>                 
                    <?php } elseif (isset($_GET['product_qty'])) { ?>
                    <div class="form-item">
                            <span> <i class="fas fa-arrow-alt-circle-right"></i> </span>
                            <input type="text" name="product_qty" placeholder="Product Quantity"  value="<?= $_GET['product_qty'] ?>" autocomplete="off" id="">
                        </div>     
                <?php } else{ ?>
                        <div class="form-item">
                            <span> <i class="fas fa-arrow-alt-circle-right"></i> </span>
                            <input type="text" name="product_qty" placeholder="Product Quantity" autocomplete="off" id="">
                        </div>
                    <?php } ?>


                    <!--  -->
            

                    <?php if (isset($_GET['image_name_error'])) { ?>
                        <div class="form-item">
                            <span> <i class="fas fa-image"></i> </span>
                            <input type="text" name="image_name" placeholder="Image Name"  value="<?= $_GET['image_name'] ?>" autocomplete="off" id="">
                        </div>
                        <p class="error"> <?= $_GET['image_name_error'] ?> </p>                 
                    <?php } elseif (isset($_GET['image_name'])) { ?>
                    <div class="form-item">
                            <span> <i class="fas fa-image"></i> </span>
                            <input type="text" name="image_name" placeholder="Image Name"  value="<?= $_GET['image_name'] ?>" autocomplete="off" id="">
                        </div>     
                <?php } else{ ?>
                        <div class="form-item">
                            <span> <i class="fas fa-image"></i> </span>
                            <input type="text" name="image_name" placeholder="Image Name" autocomplete="off" id="">
                        </div>
                    <?php } ?>


                    <!--  -->
                    
                <div class="form-submit form-item">
                    <input type="submit" name="submit" value="ADD PRODUCT" id="">
                </div>
        </form>


        <!--  -->

        <div class="category-list">
            <h3>All Caegories</h3>
            <div class="list">
                <div class="list-header">
                    <h3>CATEGORY CODE</h3>
                    <h3>CATEGORY TITLE</h3>
                </div>
               <?php foreach ($category_data as $category) { ?>
                    <div class="list-item">
                        <span class=""><?= ($category->category_id); ?></span>
                        <span><?php echo(ucwords($category->category_title)); ?></span>
                    </div>
               <?php } ?>
            </div>
        </div>
        <!-- <div class="card-container">
            <div class="card">
                <p>CATEGORIES</p>
                <p>20 IN STOCK</p>
            </div>
            <div class="card">
                <p>CATEGORIES</p>
                <p>20 IN STOCK</p>
            </div>
            <div class="card">
                <p>CATEGORIES</p>
                <p>20 IN STOCK</p>
            </div>
            <div class="card">
                <p>CATEGORIES</p>
                <p>20 IN STOCK</p>
            </div>
            <div class="card">
                <p>CATEGORIES</p>
                <p>20 IN STOCK</p>
            </div>
        </div> -->
        
        
    </section>

    <!--  -->
    <?php if ($_SESSION['employee_type'] == 'ADMIN') { ?>
            
        <section class="salesmen-wrapper" id="salesmen" >
            <h2>Salesmen</h2>
            <div class="salesmen-list">
                <h3>All Salesmen</h3>
                <div class="list">
                    <div class="list-header">
                        <h3>PICTURE</h3>
                        <h3>ID</h3>
                        <h3>Name</h3>
                        <h3>Email</h3>
                    </div>
                <?php foreach ($salesmen_data as $salesman) { ?>
                        <div class="list-item">
                            <span class="picture"><img src="../images/profile_pictures/<?= $salesman->image; ?>" alt="pic"></span>
                            <span><?= $salesman->employee_id; ?></span>
                            <span><?php echo( ucwords($salesman->last_name . " " . $salesman->first_name));?> </span>
                            <span><?= $salesman->email; ?></span>
                        </div>
                <?php } ?>
                    
                </div>
            </div>

            <form class="form" action="../configuration/employee_register.php" method="post">
                <h2> <span> <i class="fas fa-plus"></i> </span> Add Salesman</h2>        
                <?php   if (isset($_GET['first_name_error'])) { ?>
                    <div class="form-item">
                    <span> <i class="fas fa-user"></i> </span>
                    <input type="text" name="first_name" placeholder="First Name" value="<?= $_GET['first_name'] ?>" autocomplete="off" id="">
                </div>
                <p class="error"> <?= $_GET['first_name_error'] ?> </p>
                <?php } elseif(isset($_GET['first_name'])) { ?>
                    <div class="form-item">
                    <span> <i class="fas fa-user"></i> </span>
                    <input type="text" name="first_name" placeholder="First Name" value="<?= $_GET['first_name'] ?>" autocomplete="off" id="">
                </div>
                    <?php }else { ?>
                    <div class="form-item">
                        <span> <i class="fas fa-user"></i> </span>
                        <input type="text" name="first_name" placeholder="First Name" autocomplete="off" id="">
                    </div>
                    <?php } ?>
                


                    <!--  -->
                    <?php  if (isset($_GET['last_name_error'])) { ?>
                    <div class="form-item">
                        <span> <i class="fas fa-user"></i> </span>
                        <input type="text" name="last_name" placeholder="last Name" value="<?= $_GET['last_name'] ?>" autocomplete="off" id="">
                    </div>
                    <p class="error"> <?= $_GET['last_name_error'] ?> </p>
                    <?php } elseif (isset($_GET['last_name'])) { ?>
                        <div class="form-item">
                            <span> <i class="fas fa-user"></i> </span>
                            <input type="text" name="last_name" placeholder="Last Name" value="<?= $_GET['last_name'] ?>" autocomplete="off" id="">
                        </div>
                    <?php } else{ ?>
                        <div class="form-item">
                            <span> <i class="fas fa-user"></i> </span>
                            <input type="text" name="last_name" placeholder="Last Name" autocomplete="off" id="">
                        </div>
                    <?php } ?>




                    <!--  -->
                    <?php if (isset($_GET['phone_number_error'])) { ?>
                        <div class="form-item">
                            <span> <i class="fas fa-phone"></i> </span>
                            <input type="text" name="phone_number" placeholder="Phone Number" value="<?= $_GET['phone_number'] ?>" autocomplete="off" id="">
                        </div>
                        <p class="error"> <?= $_GET['phone_number_error'] ?> </p>
                <?php } elseif (isset($_GET['phone_number'])) { ?>
                        <div class="form-item">
                            <span> <i class="fas fa-phone"></i> </span>
                            <input type="text" name="phone_number" placeholder="Phone Number" value="<?= $_GET['phone_number'] ?>" autocomplete="off" id="">
                        </div>                    
                <?php } else { ?>
                        <div class="form-item">
                            <span> <i class="fas fa-phone"></i> </span>
                            <input type="text" name="phone_number" placeholder="Phone Number" autocomplete="off" id="">
                        </div>

                    <?php } ?>


                    <!--  -->
                    <?php if (isset($_GET['res_address_error'])) { ?>
                        <div class="form-item">
                            <span> <i class="fas fa-location-crosshairs"></i> </span>
                            <input type="text" name="res_address" placeholder="GPS Code"  value="<?= $_GET['res_address'] ?>" autocomplete="off" id="">
                        </div>
                        <p class="error"> <?= $_GET['res_address_error'] ?> </p>                 
                    <?php } elseif (isset($_GET['res_address'])) { ?>
                    <div class="form-item">
                            <span> <i class="fas fa-location-crosshairs"></i> </span>
                            <input type="text" name="res_address" placeholder="GPS Code"  value="<?= $_GET['res_address'] ?>" autocomplete="off" id="">
                        </div>     
                <?php } else{ ?>
                        <div class="form-item">
                            <span> <i class="fas fa-location-crosshairs"></i> </span>
                            <input type="text" name="res_address" placeholder="GPS Code" autocomplete="off" id="">
                        </div>
                    <?php } ?>

                    <!--  -->
                    <?php if (isset($_GET['email_error'])) { ?>
                        <div class="form-item">
                            <span> <i class="fas fa-envelope"></i> </span>
                            <input type="text" name="email" placeholder="Email"  value="<?= $_GET['email'] ?>" autocomplete="off" id="">
                        </div>
                        <p class="error"> <?= $_GET['email_error'] ?> </p>                 
                    <?php } elseif (isset($_GET['email'])) { ?>
                    <div class="form-item">
                            <span> <i class="fas fa-envelope"></i> </span>
                            <input type="text" name="email" placeholder="Email"  value="<?= $_GET['email'] ?>" autocomplete="off" id="">
                        </div>     
                <?php } else{ ?>
                        <div class="form-item">
                            <span> <i class="fas fa-envelope"></i> </span>
                            <input type="text" name="email" placeholder="Email" autocomplete="off" id="">
                        </div>
                    <?php } ?>
                    <!--  -->


                    <?php if (isset($_GET['employee_type_error'])) { ?>
                        <div class="form-item">
                            <span> <i class="fas fa-users"></i> </span>
                            <input type="text" name="employee_type" placeholder="Employee Type"  value="<?= $_GET['employee_type'] ?>" autocomplete="off" id="">
                        </div>
                        <p class="error"> <?= $_GET['employee_type_error'] ?> </p>                 
                    <?php } elseif (isset($_GET['employee_type'])) { ?>
                    <div class="form-item">
                            <span> <i class="fas fa-users"></i> </span>
                            <input type="text" name="employee_type" placeholder="Employee Type"  value="<?= $_GET['employee_type'] ?>" autocomplete="off" id="">
                        </div>     
                <?php } else{ ?>
                        <div class="form-item">
                            <span> <i class="fas fa-users"></i> </span>
                            <input type="text" name="employee_type" placeholder="Employee Type" value="salesman" autocomplete="off" id="">
                        </div>
                    <?php } ?>


                    <!--  -->
                    
                <div class="form-submit form-item">
                    <input type="submit" name="submit" value="REGISTER" id="">
                </div>
        </form>
        </section>
    <?php } ?>
</div>
    













<script src="../js/admin.js"></script>
<?php 
    include_once('../includes/pages_footer.php')
?>