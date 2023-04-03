<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../images/icons/favicon.jpg" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G22 Weddings | Online Shopping</title>
    <!-- custom styling -->
    <link rel="stylesheet" href="../css/navbar.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/login_and_signup.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/showcase.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/main_page_content.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/top_selling_products.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/wedding_page.css?v=<?= time();?>">
    <!-- fontawesome -->
    <link rel="stylesheet" href="../fontawesome/css/all.css?v=<?= time();?>">
</head>

<body>


    <?php
    include 'navigation.php';



     // Wedding Products
    $wedding_select_query = "SELECT * FROM products WHERE product_category = 6 LIMIT 10;";
    $stmt_wedding = $connection->prepare($wedding_select_query);
    $stmt_wedding->execute();
    $wedding_products = $stmt_wedding->fetchAll();




    ?>












    <main class="main-container" >
                <div class="wedding-container">
        <div class="wedding-header-container">
            <p> Wedding </p>
            <span class="">
                <i class="fas fa-th"></i>
            </span>
        </div>
        <div class="wedding-product-container">
            <?php foreach ($wedding_products as $wedding) { ?>
                <div class="">
                    <span>
                        <img src="../images/products/<?= $wedding->product_image;?>" alt="">
                    </span>
                    <p><?= ucwords($wedding->product_name); ?></p>
                    <p>GHc <?= $wedding->product_price;?></p>
                    <button class="add-to-cart-btn"> ADD TO CART </button>
                </div>            
            <?php } ?>
            
        </div>
        </div>
    </main>













    <?php include 'pages_footer.php'; ?>
