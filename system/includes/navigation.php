<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../images/icons/favicon.jpg" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G22 Phones | Online Shopping</title>
    <!-- custom styling -->
    <link rel="stylesheet" href="../css/navbar.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/login_and_signup.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/showcase.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/main_page_content.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/top_selling_products.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/phones_and_tablets_page.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/computing_page.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/electronics_page.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/fashion_and_clothing_page.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/gaming_page.css?v=<?= time();?>">

    <!-- fontawesome -->
    <link rel="stylesheet" href="../fontawesome/css/all.css?v=<?= time();?>">
</head>

<body>

<nav class="ad-navbar-wrapper">
     <div class="">

     </div>
</nav>
 <span class="ad-close-btn"> <i class="fas fa-close"></i> </span>
 <nav class="title-bar-wrapper" id="top">
     <!-- <span>Buy from G22</span>
     <span>
         G22 - ONLINE SHOP
     </span>
     <span>
         <i class="fas fa-shopping-cart"></i>
     </span>
     <span>
         <i class="fas fa-shield"></i> PAY
     </span> -->
     <ul>
        <li><a href="about_page.php"> <span> <i class="fas fa-bookmark"></i></span> About </a></li>
        <li><a href="contact_page.php"> <span> <i class="fas fa-envelope"></i></span>  Contact </a></li>
     </ul>
 </nav>

 <!-- main title bar -->
 <nav class="main-title-wrapper" >
     <div class="main-title-contain">
         <div class="logo-wrapper">
             <a href="../../index.php"><h2> G22 - SHOP <!--<span><i class="fas fa-shopping-basket"></i></span> --></h2></a>
         </div>


         <div class="search-form-wrapper">
             <form action="" method="get">
                 <div class="form-item">
                     <input type="search" name="search" placeholder="Search All Products here" autocomplete="off" id="">
                 </div>
                 <div class="form-submit">
                     <button type="submit"> <i class="fas fa-search"></i> SEARCH </button>
                 </div>
             </form>
         </div>

         <div class="user-account-wrapper">
             <button class="signup-btn">SIGN-UP</button>
             <button class="signin-btn">SIGN-IN</button>
         </div>


         <div class="cart-icon-wrapper">
             <h3> <i class="fas fa-shopping-cart"></i> Cart </h3>
         </div>
     </div>
 </nav>
 <div class="signup-wrapper">
     <h2>SIGN-UP</h2>
     <form action="" method="post">
         <div class="form-item">
             <span> <i class="fas fa-user"></i> </span>
             <input type="text" name="username" placeholder="Username" autocomplete="off" id="">
         </div>

         <div class="form-item">
             <span> <i class="fas fa-envelope"></i> </span>
             <input type="text" name="email" placeholder="Email" autocomplete="off" id="">
         </div>

         <div class="form-item">
             <span> <i class="fas fa-phone"></i> </span>
             <input type="text" name="phone_number" placeholder="Phone Number" autocomplete="off" id="">
         </div>

         <div class="form-item">
             <span> <i class="fas fa-lock"></i> </span>
             <input type="password" name="password" placeholder="Password" id="">
         </div>

         <div class="form-item">
             <span> <i class="fas fa-lock"></i> </span>
             <input type="password" name="confirm_password" placeholder="Confirm Password" id="">
         </div>

         <div class="form-submit form-item">
             <!-- <span> <i class="fas fa-user"></i> </span> -->
             <input type="submit" name="submit" value="SIGN-UP" id="">
         </div>
         <p class="signin-link"> Have an account. </p>
     </form>

     <span class="signup-close-btn"> <i class="fas fa-close"></i> </span>
 </div>

 <div class="signin-wrapper">
     <h2>SIGN-IN</h2>
     <form action="" method="post">

         <div class="form-item">
             <span> <i class="fas fa-envelope"></i> </span>
             <input type="text" name="emai" placeholder="Email" autocomplete="off" id="">
         </div>

         <div class="form-item">
             <span> <i class="fas fa-lock"></i> </span>
             <input type="password" name="password" placeholder="Password" id="">
         </div>

         <div class="form-submit form-item">
             <!-- <span> <i class="fas fa-user"></i> </span> -->
             <input type="submit" name="submit" value="SIGN-IN" id="">
         </div>
         <p class="signup-link"> Don't have an account? </p>
     </form>

     <span class="signin-close-btn"> <i class="fas fa-close"></i> </span>
 </div>

 <div class="page-links">
    <ul>
        <li><a href="../../index.php"> Home</a></li>
        <li><a href="phones_and_tablets_page.php"> Phones &amp; Tablets</a></li>
        <li><a href="electronics_page.php"> Electronics</a></li>
        <li><a href="computing_page.php"> Computing</a></li>
        <li><a href="fashion_and_clothing_page.php"> Fashion &amp; Clothing</a></li>
        <li><a href="gaming_page.php"> Gaming</a></li>
        <li><a href="wedding_page.php"> wedding</a></li>
    </ul>
 </div>