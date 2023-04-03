<?php




##
include_once '../database_connection/database_connection.php';
##
include_once '../functions/functions.php';


if (isset($_POST['submit'])) {

    $product_id = validate_text_input($_POST['product_id']);
    $product_name = validate_text_input($_POST['product_name']);
    $product_desc = validate_text_input($_POST['product_desc']);
    $price = floatval(validate_text_input($_POST['price']));
    $product_category = intval(validate_text_input($_POST['product_category']));
    $product_weight = validate_text_input($_POST['product_weight']);
    $product_stock = intval(validate_text_input($_POST['product_qty']));
    $image_name = validate_text_input($_POST['image_name']);







    $empty_field_error = "This field is required";

    $add_product_data =  'product_id=' . $product_id . '&product_name=' . $product_name . '&product_desc=' . $product_desc . '&price=' . $price . '&product_category=' . $product_category . '&product_weight=' . $product_weight . '&product_qty=' . $product_qty . '&image_name=' . $image_name;




    if (empty($product_id)) {
        header("Location: ../profile/employee_dashboard.php?product_id_error=$empty_field_error&$add_product_data");
        exit();

    }



    if (empty($product_name)) {
        header("Location: ../profile/employee_dashboard.php?product_name_error=$empty_field_error&$add_product_data");
        exit();
    }


    if (empty($product_desc)) {
        header("Location: ../profile/employee_dashboard.php?product_desc_error=$empty_field_error&$add_product_data");
        exit();
        
    }


    if (empty($price)) {
        header("Location: ../profile/employee_dashboard.php?price_error=$empty_field_error&$add_product_data");
        exit();
        
    }



    if (empty($product_category)) {
        header("Location: ../profile/employee_dashboard.php?product_category_error=$empty_field_error&$add_product_data");
        exit();
        
    }


    if (empty($product_weight)) {
        header("Location: ../profile/employee_dashboard.php?product_weight_error=$empty_field_error&$add_product_data");
        exit();
        
    }



    if (empty($product_stock)) {
        header("Location: ../profile/employee_dashboard.php?product_stock_error=$empty_field_error&$add_product_data");
        exit();
        
    }



    if (empty($image_name)) {
        header("Location: ../profile/employee_dashboard.php?image_name_error=$empty_field_error&$add_product_data");
        exit();
        
    }



    $product_insert_query = "INSERT INTO `products`(`product_code`, `product_name`, `product_description`, `product_price`, `product_category`, `product_weight`, `availability_in_stock`, `product_image`) VALUES (:product_code, :product_name ,:product_desc,:price,:product_category,:product_weight,:stock,:product_image);";

    $stmt_product = $connection->prepare($product_insert_query);
    if($stmt_product->execute(['product_code' => $product_id, 'product_name' => $product_name, 'product_desc' =>  $product_desc, 'price' => $price, 'product_category' => $product_category, 'product_weight' => $product_weight, 'stock' => $product_stock, 'product_image' => $image_name ])){

        header("Location: ../profile/employee_dashboard.php?success=Product Added.");
        exit();

    }else {
        header("Location: ../profile/employee_dashboard.php?product_add_error=Somthing happened please try again.");
        exit();
    }











} else{
    header("Location: ../profile/employee_dashboard.php");
    exit();
}