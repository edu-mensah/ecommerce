<?php
session_start();


if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    if (isset($_SESSION['customer_id'])) {
    header("Location: ../../index.php");
    exit();
    } else {
        header("Location: ../../index.php");
        exit();
    }
    
}

##
include_once '../database_connection/database_connection.php';
##
include_once '../functions/functions.php';


if (isset($_POST['submit'])) {

    $username = validate_text_input($_POST['username']);
    $email = validate_text_input($_POST['email']);
    $phone_number = validate_text_input($_POST['phone_number']);
    $res_address = validate_text_input($_POST['res_address']);
    $password = validate_text_input($_POST['password']);
    $confirm_password = validate_text_input($_POST['confirm_password']);



    $empty_field_error = "This field is required";

    $sign_up_data =  'username=' . $username . '&email=' . $email . '&phone_number=' . $phone_number . '&res_address=' . $res_address;

    
    if (empty($username)) {
    header("Location: ../../index.php?username_error=$empty_field_error&$sign_up_data");
    exit();

    }
    
    if (empty($email)) {
    header("Location: ../../index.php?email_error=$empty_field_error&$sign_up_data");
    exit();

    } 

    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    header("Location: ../../index.php?email_error=Invaild email&$sign_up_data");
    exit();

    }


     // customer Data
    $customer_select_query = "SELECT * FROM `customers` WHERE email = :email";
    // Statement customer
    $stmt_customer = $connection->prepare($customer_select_query);
    $stmt_customer->execute(['email' => $email]);
    if ($stmt_customer->rowCount() > 0) {
        header("Location: ../../index.php?email_error=This email is taken&$sign_up_data");
        exit();
    } 


    if (empty($phone_number)) {
    header("Location: ../../index.php?phone_number_error=$empty_field_error&$sign_up_data");
    exit();

    } 
    

    if (empty($res_address)) {
    header("Location: ../../index.php?res_address_error=$empty_field_error&$sign_up_data");
    exit();

    } 

    if (empty($password)) {
    header("Location: ../../index.php?password_error=$empty_field_error&$sign_up_data");
    exit();

    } 


    if (strlen($password) < 8) {
    header("Location: ../../index.php?password_error=Password must be more than 8 characters&$sign_up_data");
    exit();

    }

    if ($password != $confirm_password) {
    header("Location: ../../index.php?confirm_password_error=Passwords do not match&$sign_up_data");
    exit();

    }



    ## Hashing the input password
    $password = password_hash($password,PASSWORD_DEFAULT);

    ## Generating customer ID
    $customer_id = generate_account_id("CUS");




    $new_customer_insert_query = "INSERT INTO `customers`(`customer_id`,`customer_name`, `email`, `phone_number`, `res_address`, `pass_word`) VALUES (:customer_id,:customer_name,:email,:phone_number,:res_address,:pass_word)";

    $stmt_new_customer = $connection->prepare($new_customer_insert_query);

    if ($stmt_new_customer->execute(['customer_id' => $customer_id, 'customer_name' => $username, 'email' => $email, 'phone_number' => $phone_number, 'res_address' => $res_address, 'pass_word' => $password])) {


    $stmt_customer = $connection->prepare($customer_select_query);
    $stmt_customer->execute(['email' => $email]);

    $customer_data = $stmt_customer->fetch(PDO::FETCH_ASSOC);

        session_start();
        $_SESSION['customer_id'] = $customer_data['customer_id'];
        $_SESSION['customer_name'] = ucwords($customer_data['customer_name']);
        $_SESSION['email'] = $customer_data['email'];
        $_SESSION['image_name'] = $customer_data['image_name'];




        header("Location: ../../index.php");
        exit();
    } else{
        header("Location: ../../index.php?sign_up_error=Something went wrong please try again.&$sign_up_data");
        exit();
    }

   


    
} else {
    header("Location: ../../index.php");
}