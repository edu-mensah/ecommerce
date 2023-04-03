<?php

 // Computing Products
    $computing_select_query = "SELECT * FROM products WHERE product_category = 3 LIMIT 10;";
    $stmt_computing = $connection->prepare($computing_select_query);
    $stmt_computing->execute();
    $computing_products = $stmt_computing->fetchAll();


?>

<div class="computing-wrapper" id="computing">
    <div class="computing-header-wrapper">
        <p>Computing </p>
        <span class="see-all-computing">
            <i class="fas fa-chevron-right"></i>
        </span>
    </div>
    <div class="computing-product-wrapper">
        <?php foreach ($computing_products as $computing) { ?>
            <div class="">
                <span>
                    <img src="system/images/products/<?= $computing->product_image;?>" alt="">
                </span>
                <p><?php echo(ucwords($computing->product_name)); ?>  </p>
                <p>GHc <?= $computing->product_price; ?></p>
                <button class="add-to-cart-btn"> ADD TO CART </button>
            </div>
        <?php } ?>

    </div>
</div>

<a href="system/includes/computing_page.php" class="link-to-page" > SEE ALL PRODUCTS</a>