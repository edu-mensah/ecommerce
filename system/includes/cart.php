<?php

include('../database_connection/database_connection.php');

if (isset($_POST['cart'])) {
    $product_id = $_POST['product'];
    $customer = $_SERVER['REMOTE_ADDR'];



    $cart_product_select = "SELECT * FROM cart WHERE product_id = $product_id;";
    $stmt_cart_product = $connection->prepare($cart_product_select);
    $stmt_cart_product->execute();
    if ($stmt_cart_product->rowCount() > 0) {
        header("Location ../../index.php?cart_error=Product already in cart.");
        exit();       
    }



    $cart_query = "INSERT INTO cart VALUE ($customer, $product_id);";
    $stmt_cart = $connection->prepare($cart_query);
    

    if ($stmt_cart->execute()){
        header("Location ../../index.php");
        exit();
    } else{
        header("Location ../../index.php");
        exit();        
    }

} else{
    header("Location ../../index.php");
    exit();    
}