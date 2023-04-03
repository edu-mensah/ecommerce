<?php
include_once('navigation.php');


?>

 <main class="main-container">

<?php
if (isset($_GET['submit'])) {
    $search_item = validate_text_input($_GET['search']);


    if (empty($search_item)) { ?>
        <p class = "no-search"> Nothing was enetered in the search box or search returned no product </p>
        </main>
   <?php 
        include_once('pages_footer.php');
        exit();
    }

    $search_query = "SELECT * FROM products WHERE product_name lIKE :search;";
    $stmt_search = $connection->prepare($search_query);
    if ($stmt_search->execute(['search' => '%' . $search_item . '%'])) {
         $row_count = $stmt_search->rowCount();
        $search_data = $stmt_search->fetchAll();
    
   

    ?>


    <section class="search-list">
        <p class="no-search" > <?= $row_count;?> products found</p>
        <?php foreach ($search_data as $search_result) { ?>
            <div class="search-item">
                <span>
                    <img src="../images/products/<?= $search_result->product_image;?>" alt="product image">
                </span>
                <span>
                    <h4><?= ucwords($search_result->product_name);?></h4>
                </span>
                <span>
                    <p><?= $search_result->product_description;?> </p>
                </span>
                <span>
                    <h3>GHc <?= $search_result->product_price;?></h3>
                </span>
                <span>
                    <p><?= $search_result->availability_in_stock;?> in stock</p>
                </span>
                <button class="add-to-cart-btn"> ADD TO CART </button>                
            </div>
        <?php } ?>
    </section>
 </main>




   

 <?php } } ?>






   
















<?php 

include_once('pages_footer.php');

?>