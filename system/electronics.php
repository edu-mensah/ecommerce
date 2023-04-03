<?php

 // Electronic Products
    $electronic_select_query = "SELECT * FROM products WHERE product_category = 2 LIMIT 10;";
    $stmt_electronic = $connection->prepare($electronic_select_query);
    $stmt_electronic->execute();
    $electronic_products = $stmt_electronic->fetchAll();


?>


<div class="electronics-wrapper" id="electronics">
    <div class="electronics-header-wrapper">
        <p> Electronics </p>
        <span class="see-all-electronics">
            <i class="fas fa-chevron-right"></i>
        </span>
    </div>
    <div class="electronics-product-wrapper">
        <?php foreach ($electronic_products as $electronic) { ?>
            <div class="">
                <span>
                    <img src="system/images/products/<?= $electronic->product_image;?>" alt="">
                </span>
                <p><?php echo(ucwords($electronic->product_name)); ?>  </p>
                <p>GHc <?= $electronic->product_price; ?></p>
                <button class="add-to-cart-btn"> ADD TO CART </button>
            </div>
        <?php } ?>
        <!-- <div class="">
            <span>
                <img src="system/images/promo/Explosion_day_d.gif" alt="">
            </span>
            <p>Nasco Air Conditioner</p>
            <p>GHc 1,150</p>
            <button class="add-to-cart-btn"> ADD TO CART </button>
        </div>

        <div class="">
            <span>
                <img src="system/images/promo/Explosion_day_d.gif" alt="">
            </span>
            <p>Nasco Air Conditioner</p>
            <p>GHc 1,150</p>
            <button class="add-to-cart-btn"> ADD TO CART </button>
        </div>

        <div class="">
            <span>
                <img src="system/images/promo/Explosion_day_d.gif" alt="">
            </span>
            <p>Nasco Air Conditioner</p>
            <p>GHc 1,150</p>
            <button class="add-to-cart-btn"> ADD TO CART </button>
        </div>

        <div class="">
            <span>
                <img src="system/images/promo/Explosion_day_d.gif" alt="">
            </span>
            <p>Nasco Air Conditioner</p>
            <p>GHc 1,150</p>
            <button class="add-to-cart-btn"> ADD TO CART </button>
        </div>

        <div class="">
            <span>
                <img src="system/images/promo/Explosion_day_d.gif" alt="">
            </span>
            <p>Nasco Air Conditioner</p>
            <p>GHc 1,150</p>
            <button class="add-to-cart-btn"> ADD TO CART </button>
        </div>

        <div class="">
            <span>
                <img src="system/images/promo/Explosion_day_d.gif" alt="">
            </span>
            <p>Nasco Air Conditioner</p>
            <p>GHc 1,150</p>
            <button class="add-to-cart-btn"> ADD TO CART </button>
        </div>


        <div class="">
            <span>
                <img src="system/images/promo/Explosion_day_d.gif" alt="">
            </span>
            <p>Nasco Air Conditioner</p>
            <p>GHc 1,150</p>
            <button class="add-to-cart-btn"> ADD TO CART </button>
        </div>


        <div class="">
            <span>
                <img src="system/images/promo/Explosion_day_d.gif" alt="">
            </span>
            <p>Nasco Air Conditioner</p>
            <p>GHc 1,150</p>
            <button class="add-to-cart-btn"> ADD TO CART </button>
        </div>


        <div class="">
            <span>
                <img src="system/images/promo/Explosion_day_d.gif" alt="">
            </span>
            <p>Nasco Air Conditioner</p>
            <p>GHc 1,150</p>
            <button class="add-to-cart-btn"> ADD TO CART </button>
        </div> -->

    </div>
</div>


    <a href="system/includes/electronics_page.php" class="link-to-page" > SEE ALL PRODUCTS</a>
