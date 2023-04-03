<?php 

// phone phone and tablets 
    $phone_select_query = "SELECT * FROM products WHERE product_category = 4 LIMIT 10;";
    $stmt_phone = $connection->prepare($phone_select_query);
    $stmt_phone->execute();
    $phone_products = $stmt_phone->fetchAll();



?>




<div class="phones-and-tablets-wrapper" id="phonesAndTablets">
    <div class="phones-and-tablets-header-wrapper">
        <p> Phones &amp; Tablets </p>
        <span class="see-all-phones-and-tablets">
            <i class="fas fa-chevron-right"></i>
        </span>
    </div>
    <div class="phones-and-tablets-product-wrapper">
        <?php  foreach ($phone_products as  $phones) { ?>
            <div class="">
                <span>
                    <img src="system/images/products/<?= $phones->product_image; ?>" alt="">
                </span>
                <p><?php echo(ucwords($phones->product_name)); ?></p>
                <p>GHc <?= $phones->product_price; ?></p>
                <button class="add-to-cart-btn"> ADD TO CART </button>
            </div>                        
        <?php } ?>

    </div>
</div>

    <a href="system/includes/phones_and_tablets_page.php" class="link-to-page"> SEE ALL PRODUCTS</a>