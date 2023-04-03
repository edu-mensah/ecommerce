


    <?php
    include 'navigation.php';


    // phone phone and tablets 
    $phone_select_query = "SELECT * FROM products WHERE product_category = 4;";
    $stmt_phone = $connection->prepare($phone_select_query);
    $stmt_phone->execute();
    $phone_products = $stmt_phone->fetchAll();

    ?>





        <main class="main-container" >
                <div class="phones-and-tablets-container">
                <div class="phones-and-tablets-header-container">
                    <p> Phones &amp; Tablets </p>
                    <span class="">
                        <i class="fas fa-th"></i>
                    </span>
                </div>
                <div class="phones-and-tablets-product-container">
                    <?php  foreach ($phone_products as  $phones) { ?>
                        <div class="">
                            <span>
                                <img src="../images/products/<?= $phones->product_image; ?>" alt="">
                            </span>
                            <p><?php echo(ucwords($phones->product_name)); ?></p>
                            <p>GHc <?= $phones->product_price; ?></p>
                            <button class="add-to-cart-btn"> ADD TO CART </button>
                        </div>                        
                    <?php } ?>

                </div>
            </div>

        </main>


















    <?php include 'pages_footer.php'; ?>
