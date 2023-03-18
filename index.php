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
    <!-- fontawesome -->
    <link rel="stylesheet" href="system/fontawesome/css/all.css?v=<?= time();?>">
</head>

<body>


    <?php 
        include_once 'system/navbar.php';



        include_once 'system/showcase.php';
    
    ?>


    <!-- main page content -->
    <section class="main-page-wrapper">
        <?php

        include_once 'system/top_selling_products.php';


        include_once 'system/all_category_slide.php';


        include_once 'system/promotion.php';


        include_once 'system/phones_and_tablets.php';


        

        include_once 'system/accessories.php';




  
        
        
        ?>



    </section>

























    <a href="#top" class="scroll-up-btn"> <i class="fas fa-chevron-circle-up chev-icon "></i> </a>





    <!-- fontawesome js -->
    <script src="system/fontawesome/js/all.js"></script>
    <!-- custom js -->
    <script src="system/js/all_navbar.js"></script>
    <script src="system/js/sign_and_login.js"></script>
    <script src="system/js/showcase.js"></script>
    <script src="system/js/main_page_content.js"></script>
</body>

</html>