


    <?php
    include 'navigation.php';



     // Gaming Products
    $gaming_select_query = "SELECT * FROM products WHERE product_category = 1;";
    $stmt_gaming = $connection->prepare($gaming_select_query);
    $stmt_gaming->execute();
    $gaming_products = $stmt_gaming->fetchAll();
    ?>












    <main class="main-container" >
        <div class="gaming-container">
        <div class="gaming-header-container">
            <p> Gaming </p>
            <span class="">
                <i class="fas fa-th"></i>
            </span>
        </div>
        <div class="gaming-product-container">
            <?php foreach ($gaming_products as $gaming) { ?>
                <div class="">
                    <span>
                        <img src="../images/products/<?= $gaming->product_image;?>" alt="">
                    </span>
                    <p><?php echo(ucwords($gaming->product_name));  ?></p>
                    <p>GHc <?= $gaming->product_price;?></p>
                    <button class="add-to-cart-btn"> ADD TO CART </button>
                </div>
            <?php } ?>

        </div>
        </div>
    </main>









    <?php include 'pages_footer.php'; ?>
