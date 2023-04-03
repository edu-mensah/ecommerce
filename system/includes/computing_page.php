


    <?php
    include 'navigation.php';

 // Computing Products
    $computing_select_query = "SELECT * FROM products WHERE product_category = 3;";
    $stmt_computing = $connection->prepare($computing_select_query);
    $stmt_computing->execute();
    $computing_products = $stmt_computing->fetchAll();
    

    ?>












    <main class="main-container" >
            <div class="computing-container">
                <div class="computing-header-container">
                <p> Computing </p>
                <span class="">
                    <i class="fas fa-th"></i>
                </span>
        </div>
        <div class="computing-product-container">
            <?php foreach ($computing_products as $computing) { ?>
                <div class="">
                    <span>
                        <img src="../images/products/<?= $computing->product_image;?>" alt="">
                    </span>
                    <p><?= ucwords($computing->product_name); ?>  </p>
                    <p>GHc <?= $computing->product_price; ?></p>
                    <button class="add-to-cart-btn"> ADD TO CART </button>
                </div>
            <?php } ?>
            
        </div>
        </div>
    </main>














    <?php include 'pages_footer.php'; ?>
