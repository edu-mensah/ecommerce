<?php 
// initializing a session
session_start();


include_once 'system/database_connection/database_connection.php';
include_once 'system/functions/functions.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="system/images/icons/favicon.jpg" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G22 Ghana | Online Shopping</title>
    <!-- custom styling -->
    <link rel="stylesheet" href="system/css/navbar.css?v=<?= time();?>">
    <link rel="stylesheet" href="system/css/login_and_signup.css?v=<?= time();?>">
    <link rel="stylesheet" href="system/css/showcase.css?v=<?= time();?>">
    <link rel="stylesheet" href="system/css/main_page_content.css?v=<?= time();?>">
    <link rel="stylesheet" href="system/css/top_selling_products.css?v=<?= time();?>">
    <link rel="stylesheet" href="system/css/cart.css?v=<?= time();?>">
    <link rel="stylesheet" href="system/css/footer.css?v=<?= time();?>">
    <link rel="stylesheet" href="system/css/responsive.css?v=<?= time();?>">
    <!-- fontawesome -->
    <link rel="stylesheet" href="system/fontawesome/css/all.css?v=<?= time();?>">
</head>

<body>