<?php

 // Gaming Products
    $gaming_select_query = "SELECT * FROM products WHERE product_category = 1 LIMIT 10;";
    $stmt_gaming = $connection->prepare($gaming_select_query);
    $stmt_gaming->execute();
    $gaming_products = $stmt_gaming->fetchAll();


?>
<div class="gaming-wrapper" id="gaming">
    <div class="gaming-header-wrapper">
        <p> Gaming </p>
        <span class="see-all-gaming">
            <i class="fas fa-chevron-right"></i>
        </span>
    </div>
    <div class="gaming-product-wrapper">
        <?php foreach ($gaming_products as $gaming) { ?>
            <div class="">
                <span>
                    <img src="system/images/products/<?= $gaming->product_image;?>" alt="">
                </span>
                <p><?php echo(ucwords($gaming->product_name));  ?></p>
                <p>GHc <?= $gaming->product_price;?></p>
                <button class="add-to-cart-btn"> ADD TO CART </button>
            </div>
        <?php } ?>

    </div>
</div>

    <a href="system/includes/gaming_page.php"  class="link-to-page"  > SEE ALL PRODUCTS</a>
