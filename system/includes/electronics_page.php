


    <?php
    include 'navigation.php';



    // Electronic Products
    $electronic_select_query = "SELECT * FROM products WHERE product_category = 2;";
    $stmt_electronic = $connection->prepare($electronic_select_query);
    $stmt_electronic->execute();
    $electronic_products = $stmt_electronic->fetchAll();



    ?>





   <main class="main-container" >
        <div class="electronics-container">
        <div class="electronics-header-container">
            <p> Electronics </p>
            <span class="">
                <i class="fas fa-th"></i>
            </span>
        </div>
        <div class="electronics-product-container">

            <?php foreach ($electronic_products as $electronic) { ?>
                <div class="">
                    <span>
                        <img src="../images/products/<?= $electronic->product_image;?>" alt="">
                    </span>
                    <p><?= ucwords($electronic->product_name); ?>  </p>
                    <p>GHc <?= $electronic->product_price; ?></p>
                    <button class="add-to-cart-btn"> ADD TO CART </button>
                </div>
            <?php } ?>
            
        </div>
        </div>
    </main>












    <?php include 'pages_footer.php'; ?>
