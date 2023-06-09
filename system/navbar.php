 <nav class="ad-navbar-wrapper">
     <div class="">

     </div>
 </nav>
 <span class="ad-close-btn"> <i class="fas fa-close"></i> </span>
 <nav class="title-bar-wrapper" id="top">
     <!-- <span>Buy from G22</span>
     <span>
         G22  <i class="fas fa-bag-shopping"></i> ONLINE SHOP
     </span>
     <span>
        
     </span>
     <span>
         <i class="fas fa-shield"></i> PAY
     </span> -->
     <ul>
        <li><a href="system/includes/about_page.php"> <span> <i class="fas fa-bookmark"></i></span> About </a></li>
        <li><a href="system/includes/contact_page.php"> <span> <i class="fas fa-envelope"></i></span>  Contact </a></li>
     </ul>
 </nav>

 <!-- main title bar -->
 <nav class="main-title-wrapper" >
     <div class="main-title-contain">
         <div class="logo-wrapper">
             <a href="index.php"><h2> G22 - SHOP</h2></a>
         </div>


         <div class="search-form-wrapper">
             <form action="system/includes/search_product.php" method="get">
                 <div class="form-item">
                     <input type="text" name="search" placeholder="Search All Products here" autocomplete="off" id="">
                 </div>
                 <div class="form-submit">
                     <button type="submit" name="submit" value="submit"> <i class="fas fa-search"></i> SEARCH </button>
                 </div>
             </form>
         </div>

        
            <?php if (isset($_SESSION['customer_id'])) { ?>
                <div class="user-account-container user-account-wrapper">
                    <span class="profile-picture"> 
                        <img src="system/images/profile_pictures/pro.jpg" alt="">
                    </span>
                    <span class="profile-name" > <?= $_SESSION['customer_name'] ?></span>
                    <ul class="account-drop-menu" >
                        <li><a href="system/configuration/sign_out.php"> Log out</a></li>
                    </ul>
                    <button style="display: none;" class="signup-btn">SIGN-UP</button>
                    <button style="display: none;" class="signin-btn">SIGN-IN</button>
                 </div>
            <?php } else { ?>
                <div class="user-account-wrapper user-account-container">
                    <button class="signup-btn">SIGN-UP</button>
                    <button class="signin-btn">SIGN-IN</button>
                </div>
            <?php } ?>
                
        


         <div class="cart-icon-wrapper">
             <h3> <i class="fas fa-shopping-cart"></i> Cart </h3>
             <ul class="cart">
                <form class="cart-form" action="" method="post">
                    <li class="cart-item">
                        <span><img src="system/images/products/android tv2.jpg" alt="product picture"></span>
                        <input type="hidden" name="product_id" value="product_id" >
                        <span>Android TV</span>
                        <input type="text" name="product_qty" value="1" autocomplete="off" >
                    </li>
                    <li class="cart-item">
                        <span><img src="system/images/products/10m HD HDMI Cable High Speed -Ethernet V1.4 4K 3D.jpg" alt="product picture"></span>
                        <input type="hidden" name="product_id" value="product_id" >
                        <span>Android TV</span>
                        <input type="text" name="product_qty" value="1" autocomplete="off" >
                    </li>
                    <li class="cart-submit" >
                        <input type="submit" name="submit" value="ORDER" >
                    </li>
                </form>
             </ul>
         </div>
     </div>
 </nav>
 <div class="signup-wrapper">
     <h2>SIGN-UP</h2>
     <form action="system/configuration/sign_up.php" method="post">
        
        <?php   if (isset($_GET['username_error'])) { ?>
            <div class="form-item">
             <span> <i class="fas fa-user"></i> </span>
             <input type="text" name="username" placeholder="Username" value="<?= $_GET['username'] ?>" autocomplete="off" id="">
         </div>
         <p class="error"> <?= $_GET['username_error'] ?> </p>
        <?php } elseif(isset($_GET['username'])) { ?>
            <div class="form-item">
             <span> <i class="fas fa-user"></i> </span>
             <input type="text" name="username" placeholder="Username" value="<?= $_GET['username'] ?>" autocomplete="off" id="">
         </div>
            <?php }else { ?>
            <div class="form-item">
                <span> <i class="fas fa-user"></i> </span>
                <input type="text" name="username" placeholder="Username" autocomplete="off" id="">
            </div>
            <?php } ?>
         


            <!--  -->
            <?php  if (isset($_GET['email_error'])) { ?>
            <div class="form-item">
                <span> <i class="fas fa-envelope"></i> </span>
                <input type="text" name="email" placeholder="Email" value="<?= $_GET['email'] ?>" autocomplete="off" id="">
            </div>
            <p class="error"> <?= $_GET['email_error'] ?> </p>
            <?php } elseif (isset($_GET['email'])) { ?>
                <div class="form-item">
                    <span> <i class="fas fa-envelope"></i> </span>
                    <input type="text" name="email" placeholder="Email" value="<?= $_GET['email'] ?>" autocomplete="off" id="">
                </div>
            <?php } else{ ?>
                <div class="form-item">
                    <span> <i class="fas fa-envelope"></i> </span>
                    <input type="text" name="email" placeholder="Email" autocomplete="off" id="">
                </div>
            <?php } ?>




            <!--  -->
            <?php if (isset($_GET['phone_number_error'])) { ?>
                <div class="form-item">
                    <span> <i class="fas fa-phone"></i> </span>
                    <input type="text" name="phone_number" placeholder="Phone Number" value="<?= $_GET['phone_number'] ?>" autocomplete="off" id="">
                </div>
                <p class="error"> <?= $_GET['phone_number_error'] ?> </p>
           <?php } elseif (isset($_GET['phone_number'])) { ?>
                <div class="form-item">
                    <span> <i class="fas fa-phone"></i> </span>
                    <input type="text" name="phone_number" placeholder="Phone Number" value="<?= $_GET['phone_number'] ?>" autocomplete="off" id="">
                </div>                    
           <?php } else { ?>
                <div class="form-item">
                    <span> <i class="fas fa-phone"></i> </span>
                    <input type="text" name="phone_number" placeholder="Phone Number" autocomplete="off" id="">
                </div>

            <?php } ?>


            <!--  -->
            <?php if (isset($_GET['res_address_error'])) { ?>
                 <div class="form-item">
                    <span> <i class="fas fa-location-crosshairs"></i> </span>
                    <input type="text" name="res_address" placeholder="GPS Code"  value="<?= $_GET['res_address'] ?>" autocomplete="off" id="">
                </div>
                <p class="error"> <?= $_GET['res_address_error'] ?> </p>                 
            <?php } elseif (isset($_GET['res_address'])) { ?>
               <div class="form-item">
                    <span> <i class="fas fa-location-crosshairs"></i> </span>
                    <input type="text" name="res_address" placeholder="GPS Code"  value="<?= $_GET['res_address'] ?>" autocomplete="off" id="">
                </div>     
           <?php } else{ ?>
                <div class="form-item">
                    <span> <i class="fas fa-location-crosshairs"></i> </span>
                    <input type="text" name="res_address" placeholder="GPS Code" autocomplete="off" id="">
                </div>
            <?php } ?>

            <!--  -->
            <?php if (isset($_GET['password_error'])) { ?>
                <div class="form-item">
                    <span> <i class="fas fa-lock"></i> </span>
                    <input type="password" name="password" placeholder="Password" id="">
                </div>
                <p class="error"> <?= $_GET['password_error'] ?> </p>            
            <?php  } else { ?>
                <div class="form-item">
                    <span> <i class="fas fa-lock"></i> </span>
                    <input type="password" name="password" placeholder="Password" id="">
                </div>
            <?php } ?>


            <!--  -->
            <?php if (isset($_GET['confirm_password_error'])) { ?>
                <div class="form-item">
                    <span> <i class="fas fa-lock"></i> </span>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" id="">
                </div>
                 <p class="error"> <?= $_GET['confirm_password_error'] ?> </p>                  
            <?php } else{ ?> 
                <div class="form-item">
                    <span> <i class="fas fa-lock"></i> </span>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" id="">
                </div>
            <?php } ?>

         <div class="form-submit form-item">
             <input type="submit" name="submit" value="SIGN-UP" id="">
         </div>
     </form>

     <span class="signup-close-btn"> <i class="fas fa-close"></i> </span>
 </div>




 <!--  -->
 <div class="signin-wrapper">
     <h2>SIGN-IN</h2>
     <form action="system/configuration/sign_in.php" method="post">


        <?php if (isset($_GET['s_email_error'])) { ?>
            <div class="form-item">
                <span> <i class="fas fa-envelope"></i> </span>
                <input type="text" name="email" placeholder="Email" value="<?= $_GET['email'] ?>" autocomplete="off" id="">
            </div>
            <p class="error"> <?= $_GET['s_email_error'] ?> </p>            
        <?php } elseif(isset($_GET['email'])) { ?>
            <div class="form-item">
                <span> <i class="fas fa-envelope"></i> </span>
                <input type="text" name="email" placeholder="Email" value="<?= $_GET['email'] ?>" autocomplete="off" id="">
            </div>
        <?php } else {?>
            <div class="form-item">
                <span> <i class="fas fa-envelope"></i> </span>
                <input type="text" name="email" placeholder="Email" autocomplete="off" id="">
            </div>
        <?php } ?>

        <!--  -->
        <?php if (isset($_GET['s_password_error'])) { ?>
            <div class="form-item">
                <span> <i class="fas fa-lock"></i> </span>
                <input type="password" name="password" placeholder="Password" id="">
            </div>
            <p class="error"> <?= $_GET['s_password_error'] ?> </p>  
        <?php } else { ?>
            <div class="form-item">
                <span> <i class="fas fa-lock"></i> </span>
                <input type="password" name="password" placeholder="Password" id="">
            </div>
        <?php }?>

            <div class="form-submit form-item">
                <input type="submit" name="submit" value="SIGN-IN" id="">
            </div>
     </form>

     <span class="signin-close-btn"> <i class="fas fa-close"></i> </span>
 </div>