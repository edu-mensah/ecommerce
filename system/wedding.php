<?php

 // Wedding Products
    $wedding_select_query = "SELECT * FROM products WHERE product_category = 6 LIMIT 10;";
    $stmt_wedding = $connection->prepare($wedding_select_query);
    $stmt_wedding->execute();
    $wedding_products = $stmt_wedding->fetchAll();


?>






<div class="wedding-wrapper" id="wedding">
    <div class="wedding-header-wrapper">
        <p> Wedding </p>
        <span class="see-all-wedding">
            <i class="fas fa-chevron-right"></i>
        </span>
    </div>
    <div class="wedding-product-wrapper">
        <?php foreach ($wedding_products as $wedding) { ?>
            <div class="">
                <span>
                    <img src="system/images/products/<?= $wedding->product_image;?>" alt="">
                </span>
                <p><?= ucwords($wedding->product_name); ?></p>
                <p>GHc <?= $wedding->product_price;?></p>
                <button class="add-to-cart-btn"> ADD TO CART </button>
            </div>            
        <?php } ?>

    </div>
</div>

    <a href="system/includes/wedding_page.php" class="link-to-page" > SEE ALL PRODUCTS</a>
