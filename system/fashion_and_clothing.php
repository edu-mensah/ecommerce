<?php

 // Fashion and Clothing Products
    $fashion_select_query = "SELECT * FROM products WHERE product_category = 5 LIMIT 10;";
    $stmt_fashion = $connection->prepare($fashion_select_query);
    $stmt_fashion->execute();
    $fashion_products = $stmt_fashion->fetchAll();


?>


<div class="fashion-and-clothing-wrapper" id="fashionAndClothing">
    <div class="fashion-and-clothing-header-wrapper">
        <p> Fashion &amp; Clothing </p>
        <span class="see-all-fashion-and-clothing">
            <i class="fas fa-chevron-right"></i>
        </span>
    </div>
    <div class="fashion-and-clothing-product-wrapper">
        <?php foreach ($fashion_products as $fashion) { ?>
            <div class="">
                <span>
                    <img src="system/images/products/<?= $fashion->product_image;?>" alt="">
                </span>
                <p><?php echo(ucwords($fashion->product_name)); ?> </p>
                <p>GHc <?= $fashion->product_price;?></p>
                <button class="add-to-cart-btn"> ADD TO CART </button>
            </div>            
        <?php } ?>


    </div>
</div>

    <a href="system/includes/fashion_and_clothing_page.php" class="link-to-page" > SEE ALL PRODUCTS</a>
