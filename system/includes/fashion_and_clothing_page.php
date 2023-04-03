


    <?php
    include 'navigation.php';


     // Fashion and Clothing Products
    $fashion_select_query = "SELECT * FROM products WHERE product_category = 5;";
    $stmt_fashion = $connection->prepare($fashion_select_query);
    $stmt_fashion->execute();
    $fashion_products = $stmt_fashion->fetchAll();

    ?>










    <main class="main-container" >
    <div class="fashion-and-clothing-container">
        <div class="fashion-and-clothing-header-container">
            <p> Fashion &amp; Clothing </p>
            <span class="">
                <i class="fas fa-th"></i>
            </span>
        </div>
        <div class="fashion-and-clothing-product-container">
            <?php foreach ($fashion_products as $fashion) { ?>
                <div class="">
                    <span>
                        <img src="../images/products/<?= $fashion->product_image;?>" alt="">
                    </span>
                    <p><?php echo(ucwords($fashion->product_name)); ?> </p>
                    <p>GHc <?= $fashion->product_price;?></p>
                    <button class="add-to-cart-btn"> ADD TO CART </button>
                </div>            
            <?php } ?>

        </div>
    </div>


    </main>













    <?php include 'pages_footer.php'; ?>


 