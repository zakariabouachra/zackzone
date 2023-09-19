<!DOCTYPE html>

    
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title></title>


    <link rel="icon" type="image/png" href="/CoursCM_2/ProjetFinal/Views/assets/images/favicon.png">

    <meta name="viewport" content="width=device-width, initial-scale=1">


     <!--
    - favicon
  -->
  <link rel="shortcut icon" href="/CoursCM_2/ProjetFinal/Views/assets/images/logo/favicon.ico" type="image/x-icon">

<!--
  - custom css link
-->
<link rel="stylesheet" href="/CoursCM_2/ProjetFinal/Views/assets/css/style-prefix.css">

<!--
  - google font link
-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
  rel="stylesheet">

    <!-- START: Styles -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7cOpen+Sans:400,700" rel="stylesheet" type="text/css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/CoursCM_2/ProjetFinal/Views/assets/vendor/bootstrap/dist/css/bootstrap.min.css">

    <!-- FontAwesome -->
    <script defer src="/CoursCM_2/ProjetFinal/Views/assets/vendor/fontawesome-free/js/all.js"></script>
    <script defer src="/CoursCM_2/ProjetFinal/Views/assets/vendor/fontawesome-free/js/v4-shims.js"></script>

    <!-- IonIcons -->
    <link rel="stylesheet" href="/CoursCM_2/ProjetFinal/Views/assets/vendor/ionicons/css/ionicons.min.css">

    <!-- Flickity -->
    <link rel="stylesheet" href="/CoursCM_2/ProjetFinal/Views/assets/vendor/flickity/dist/flickity.min.css">

    <!-- Photoswipe -->
    <link rel="stylesheet" type="text/css" href="/CoursCM_2/ProjetFinal/Views/assets/vendor/photoswipe/dist/photoswipe.css">
    <link rel="stylesheet" type="text/css" href="/CoursCM_2/ProjetFinal/Views/assets/vendor/photoswipe/dist/default-skin/default-skin.css">

    <!-- Seiyria Bootstrap Slider -->
    <link rel="stylesheet" href="/CoursCM_2/ProjetFinal/Views/assets/vendor/bootstrap-slider/dist/css/bootstrap-slider.min.css">

    <!-- Summernote -->
    <link rel="stylesheet" type="text/css" href="/CoursCM_2/ProjetFinal/Views/assets/vendor/summernote/dist/summernote-bs4.css">

    <!-- GoodGames -->
    <link rel="stylesheet" href="/CoursCM_2/ProjetFinal/Views/assets/css/goodgames.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="/CoursCM_2/ProjetFinal/Views/assets/css/custom.css">
    
    <!-- END: Styles -->

    <!-- jQuery -->
    <script src="/CoursCM_2/ProjetFinal/Views/assets/vendor/jquery/dist/jquery.min.js"></script>
    
    
</head>


<!--
    Additional Classes:
        .nk-page-boxed
-->
<body>
    
        



<!--
    Additional Classes:
        .nk-header-opaque
-->
<header class="nk-header nk-header-opaque">

    
    
<!-- START: Top Contacts -->
<div class="nk-contacts-top">
    <div class="container">
        <div class="nk-contacts-right">
            <ul class="nk-contacts-icons">
                
                <li>
                    <a href="#" data-toggle="modal" data-target="#modalSearch">
                        <span class="fa fa-search"></span>
                    </a>
                </li>
                
        
                <?php 
                session_start();
                require_once('C:\xampp\htdocs\CoursCM_2\ProjetFinal\Models\clsCustomers.php');
                require_once('C:\xampp\htdocs\CoursCM_2\ProjetFinal\Models\clsPanier.php');
                
                if(isset($_SESSION['customer_email'])){
                    $Customers = new Customer();
                    $Customer = $Customers->select_customer_withEmail($_SESSION['customer_email']);
                    
                    ?>
                    <li>
                        <span class="nk-cart-toggle">
                            <span class="fa fa-user"></span> 
                        </a>
                        </span>
                        <div class="nk-cart-dropdown">
                            <div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Starts -->
                                <div class="panel-body"><!-- panel-body Starts -->
                                    <ul class="nav nav-pills nav-stacked"><!-- nav nav-pills nav-stacked Starts -->
                                        <ol>
                                            <a href="#" data-toggle="modal" data-target="#modalEdit" class="nk-product-login"> <i class="fa fa-pencil"></i> Edit Account </a>
                                        </li><br/>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#modalPassword" class="nk-product-login"> <i class="fa fa-user"></i> Change Password </a>
                                        </li><br/>
                                        <li>
                                            <a href="\CoursCM_2\ProjetFinal\Controllers\customerController.php?action=suppression&customer_delete=<?php echo $Customer['customer_id']?>" class="nk-product-login"> <i class="fa fa-trash-o"></i> Delete Account </a>
                                        </li><br/>
                                        <li>
                                            <a href="\CoursCM_2\ProjetFinal\Controllers\customerController.php?action=logout" class="nk-product-login"><i class="fa fa-sign-out"></i> Logout </a>
                                        </li>
                                    </ul><!-- nav nav-pills nav-stacked Ends -->
                                </div><!-- panel-body Ends -->
                            </div><!-- panel panel-default sidebar-menu Ends -->            
                        </div>
                    </li>
                <?php } else {?>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#modalLogin">
                            <span class="fa fa-user"></span>  
                        </a>
                    </li>
                <?php }?>
            
                <?php 
                 if(!isset($_SESSION['panier'])){
                   $panier = new Panier();
                    $panier->creationDuPanier();
                }
                        
                        
                        ?>
               
                <li>
                    <span class="nk-cart-toggle">
                        <span class="fa fa-shopping-cart"></span>
                        <span class="nk-badge"><?php echo count($_SESSION['panier']['id_produit']) ?></span>
                    </span>

                    <div class="nk-cart-dropdown">
                        
                        <?php 
                        
                        if(empty($_SESSION['panier']['id_produit'])) // panier vide
                        { 
                            echo 'Votre panier est vide';
                        }
                        else{
                        for($j = 0;$j < count($_SESSION['panier']['id_produit']); $j++) { 
                        
                        ?>
    
                        <div class="nk-widget-post">
                            <a href="" class="nk-post-image">
                                <img src="/CoursCM_2/ProjetFinal/Views/assets/images/products/<?php echo $_SESSION['panier']['image'][$j] ?>" alt="panier img">
                            </a>
                            <h3 class="nk-post-title">
                                <a href="\CoursCM_2\ProjetFinal\Controllers\panierController.php?action=suppression&id=<?php echo $_SESSION['panier']['id_produit'][$j]?>" class="nk-cart-remove-item"><span class="ion-android-close"></span></a>
                                <a href=""><?php echo $_SESSION['panier']['titre'][$j] ?></a>
                            </h3>
                            <div class="nk-gap-1"></div>
                            <div class="nk-product-price"><?php echo $_SESSION['panier']['quantite'][$j] ?>x $<?php echo $_SESSION['panier']['prix'][$j] ?>.00</div>
                        </div>

                        <?php } } ?>

                        <div class="nk-gap-2"></div>
                        <div class="text-center">
                            <a href="/CoursCM_2/ProjetFinal/Views/Panier/checkout.php" class="nk-btn nk-btn-rounded nk-btn-color-main-1 nk-btn-hover-color-white">Proceed to Checkout</a>
                        </div>
                    </div>
                </li>
                
            </ul>
        </div>
    </div>
</div>
<!-- END: Top Contacts -->

    

    <!--
        START: Navbar

        Additional Classes:
            .nk-navbar-sticky
            .nk-navbar-transparent
            .nk-navbar-autohide
    -->
    <nav class="nk-navbar nk-navbar-top nk-navbar-sticky nk-navbar-autohide">
        <div class="container">
            <div class="nk-nav-table">
                
                <a href="./index.php" class="nk-nav-logo">
                    <img src="/CoursCM_2/ProjetFinal/Views/assets/images/logoZack.png" alt="" width="100px" height="70px">
                </a>
                
                <ul class="nk-nav nk-nav-right d-none d-lg-table-cell" >
                <div class="container">

<ul class="desktop-menu-category-list">

  <li class="menu-category" data-nav-mobile="#nk-nav-mobile">
    <a href="\CoursCM_2\ProjetFinal\Views\index.php" class="menu-title">Home</a>
  </li>


  <?php

    require_once('C:\xampp\htdocs\CoursCM_2\ProjetFinal\Models\clsCategorie.php');
    $Cat = new Categorie();
    $row_cats = $Cat->affich_cats();

    if(!empty($row_cats)) {
        foreach ($row_cats as $row) {


    ?>         


  <li class="menu-category" data-nav-mobile="#nk-nav-mobile">
    <a href="/CoursCM_2/ProjetFinal/Views/other_pages/shop.php?cat=<?php echo $row['cat_title'] ?>&cat_id=<?php echo $row['cat_id'] ?>" class="menu-title"><?php echo $row['cat_title'] ?></a>
  </li>


  <?php }} ?>

</ul>

</div>
        
</ul>
  <ul class="nk-nav nk-nav-right nk-nav-icons">
                    
    <li class="single-icon d-lg-none">
     <a href="#" class="no-link-effect" data-nav-toggle="#nk-nav-mobile">
      <span class="nk-icon-burger">
      <span class="nk-t-1"></span>
       <span class="nk-t-2"></span>
       <span class="nk-t-3"></span>
         </span>
        </a>
   </li>
                    
                    
</ul>
</div>
</div>
</nav>
    <!-- END: Navbar -->

</header>

    
    
        <!--
    START: Navbar Mobile

    Additional Classes:
        .nk-navbar-left-side
        .nk-navbar-right-side
        .nk-navbar-lg
        .nk-navbar-overlay-content
-->
<div id="nk-nav-mobile" class="nk-navbar nk-navbar-side nk-navbar-right-side nk-navbar-overlay-content d-lg-none">
    <div class="nano">
        <div class="nano-content">
            <a href="index.php" class="nk-nav-logo">
                <img src="assets/images/logo.png" alt="" width="120">
            </a>
            <div class="nk-navbar-mobile-content">
                <ul class="nk-nav">
                    <!-- Here will be inserted menu from [data-mobile-menu="#nk-nav-mobile"] -->
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END: Navbar Mobile -->

    

    
    
        <!-- START: Search Modal -->
<div class="nk-modal modal fade" id="modalSearch" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="ion-android-close"></span>
                </button>

                <h4 class="mb-0">Search</h4>

                <div class="nk-gap-1"></div>
                <form action="#" class="nk-form nk-form-style-1">
                    <input type="text" value="" name="search" class="form-control" placeholder="Type something and press Enter" autofocus>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END: Search Modal -->
    

    
        <!-- START: Login Modal -->
<div class="nk-modal modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="ion-android-close"></span>
                </button>

                <h4 class="mb-0"><span class="text-main-1">Sign</span> In</h4>

                <div class="nk-gap-1"></div>
                <form form method="post" action="\CoursCM_2\ProjetFinal\Controllers\customerController.php?action=login"  class="nk-form text-white">
                    <div class="row vertical-gap">
                        <div class="col-md-6">
                            Use email and password:

                            <div class="nk-gap"></div>
                            <input type="email" name="c_email" class=" form-control" placeholder="Email">

                            <div class="nk-gap"></div>
                            <input type="password"  name="c_pass" class="required form-control" placeholder="Password">
                        </div>
                        <div class="col-md-6">
                            Or social account:

                            <div class="nk-gap"></div>

                            <ul class="nk-social-links-2">
                                <li><a class="nk-social-facebook" href="#"><span class="fab fa-facebook"></span></a></li>
                                <li><a class="nk-social-google-plus" href="#"><span class="fab fa-google-plus"></span></a></li>
                                <li><a class="nk-social-twitter" href="#"><span class="fab fa-twitter"></span></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="nk-gap-1"></div>
                    <div class="row vertical-gap">
                        <div class="col-md-6">
                            <input type="submit" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block" value="Sign In">
                        </div>
                        <div class="col-md-6">
                            <div class="mnt-5">
                                <small><a href="#">Forgot your password?</a></small>
                            </div>
                            <div class="mnt-5">
                                <small><a href="#" data-toggle="modal" data-target="#modalSignUp">Not a member? Sign up</a></small>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END: Login Modal -->


 <!-- START: Login Modal -->
 <div class="nk-modal modal fade" id="modalSignUp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="ion-android-close"></span>
                </button>

                <h4 class="mb-0"><span class="text-main-1">Sign</span> UP</h4>

                <div class="nk-gap-1"></div>
                
        <form method="post" action="\CoursCM_2\ProjetFinal\Controllers\customerController.php?action=insertion" class="nk-form text-white">
          <h1>Cree un compte</h1>
          <input type="text" placeholder="Nom" required  id="c_name" name="c_name" class=" form-control"/><br/>
          <input type="email" placeholder="Email" required id="c_email" name="c_email" class=" form-control"/><br/>
          <input type="password" placeholder="Password"  id="c_pass" name="c_pass" required="required" class=" form-control"/><br/>
          <input type="text" placeholder="Pays" required  pattern="[a-zA-Z0-9-_.]{2,15}" title="caractères acceptés : a-zA-Z0-9-_." id="c_country" name="c_country" class=" form-control"/><br/>
          <input type="text" placeholder="Ville" required  pattern="[a-zA-Z0-9-_.]{2,15}" title="caractères acceptés : a-zA-Z0-9-_." id="c_city" name="c_city" class=" form-control"/><br/>
          <input type="text" placeholder="Telephone" required   id="c_contact" name="c_contact" class=" form-control" /><br/>
          <input type="text" placeholder="Adresse" required pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés :  a-zA-Z0-9-_." id="c_address" name="c_address" class=" form-control"/><br/>
          
         
                    <div class="row vertical-gap">
                        <div class="col-md-6">
                            Or social account:

                            <div class="nk-gap"></div>

                            <ul class="nk-social-links-2">
                                <li><a class="nk-social-facebook" href="#"><span class="fab fa-facebook"></span></a></li>
                                <li><a class="nk-social-google-plus" href="#"><span class="fab fa-google-plus"></span></a></li>
                                <li><a class="nk-social-twitter" href="#"><span class="fab fa-twitter"></span></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="nk-gap-1"></div>
                    <div class="row vertical-gap">
                        <div class="col-md-6">
                            <input type="submit" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block" value="Sign UP">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END: Login Modal -->

 <!-- START: Login Modal -->
 <div class="nk-modal modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="ion-android-close"></span>
                </button>

                <h4 class="mb-0"><span class="text-main-1">Edit</span></h4>

                <div class="nk-gap-1"></div>
                
        <form method="post" action="\CoursCM_2\ProjetFinal\Controllers\customerController.php?action=modification&edit_customer=<?php echo $Customer['customer_id']?>" class="nk-form text-white">
          <h1>Cree un compte</h1>
          <input type="text" placeholder="Nom" required  id="c_name" name="c_name" class=" form-control" value="<?php echo $Customer['customer_name']?>"/><br/>
          <input type="email" placeholder="Email" required id="c_email" name="c_email" class=" form-control" value="<?php echo $Customer['customer_email']?>"/><br/>
          <input type="text" placeholder="Pays" required   id="c_country" name="c_country" class=" form-control" value="<?php echo $Customer['customer_country']?>"/><br/>
          <input type="text" placeholder="Ville" required id="c_city" name="c_city" class=" form-control" value="<?php echo $Customer['customer_city']?>"/><br/>
          <input type="text" placeholder="Telephone" required   id="c_contact" name="c_contact" class=" form-control" value="<?php echo $Customer['customer_contact']?>" /><br/>
          <input type="text" placeholder="Adresse" id="c_address" name="c_address" class=" form-control" value="<?php echo $Customer['customer_address']?>"/><br/>
          <div class="nk-gap-1"></div>
                    <div class="row vertical-gap">
                        <div class="col-md-6">
                            <input type="submit" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block" value="Edit">
                        </div>
                    </div>        
        </form>
            </div>
        </div>
    </div>
</div>
<!-- END: Login Modal -->

<div class="nk-modal modal fade" id="modalPassword" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="ion-android-close"></span>
                </button>

                <h4 class="mb-0"><span class="text-main-1">Change Password</span></h4>
                <div class="nk-gap-1"></div>
                <form action="\CoursCM_2\ProjetFinal\Controllers\customerController.php?action=changepasswd&email=<?php echo $Customer['customer_email']?>" method="post" class="nk-form text-white"><!-- form Starts -->
                <input type="password"  name="old_pass" class="form-control" required placeholder="Enter Your Current Password"><br/>
                <input type="password" name="new_pass" class="form-control" required placeholder="Enter Your New Password"><br/>
                <input type="password" name="new_pass_again" class="form-control" required placeholder="Enter Your New Password Again"><br/>
                <div class="nk-gap-1"></div>
                <div class="row vertical-gap">
                <div class="col-md-6">
                    <input type="submit" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block" value="Change">
                </div>
            </div>   

                </form><!-- form Ends -->
            </div>
        </div>
    </div>
</div>

    

    
<!-- START: Scripts -->

<!-- Object Fit Polyfill -->
<script src="/CoursCM_2/ProjetFinal/Views/assets/vendor/object-fit-images/dist/ofi.min.js"></script>

<!-- GSAP -->
<script src="/CoursCM_2/ProjetFinal/Views/assets/vendor/gsap/src/minified/TweenMax.min.js"></script>
<script src="/CoursCM_2/ProjetFinal/Views/assets/vendor/gsap/src/minified/plugins/ScrollToPlugin.min.js"></script>

<!-- Popper -->
<script src="/CoursCM_2/ProjetFinal/Views/assets/vendor/popper.js/dist/umd/popper.min.js"></script>

<!-- Bootstrap -->
<script src="/CoursCM_2/ProjetFinal/Views/assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Sticky Kit -->
<script src="/CoursCM_2/ProjetFinal/Views/assets/vendor/sticky-kit/dist/sticky-kit.min.js"></script>

<!-- Jarallax -->
<script src="/CoursCM_2/ProjetFinal/Views/assets/vendor/jarallax/dist/jarallax.min.js"></script>
<script src="/CoursCM_2/ProjetFinal/Views/assets/vendor/jarallax/dist/jarallax-video.min.js"></script>

<!-- imagesLoaded -->
<script src="/CoursCM_2/ProjetFinal/Views/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>

<!-- Flickity -->
<script src="/CoursCM_2/ProjetFinal/Views/assets/vendor/flickity/dist/flickity.pkgd.min.js"></script>

<!-- Photoswipe -->
<script src="/CoursCM_2/ProjetFinal/Views/assets/vendor/photoswipe/dist/photoswipe.min.js"></script>
<script src="/CoursCM_2/ProjetFinal/Views/assets/vendor/photoswipe/dist/photoswipe-ui-default.min.js"></script>

<!-- Jquery Validation -->
<script src="/CoursCM_2/ProjetFinal/Views/assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>

<!-- Jquery Countdown + Moment -->
<script src="/CoursCM_2/ProjetFinal/Views/assets/vendor/jquery-countdown/dist/jquery.countdown.min.js"></script>
<script src="/CoursCM_2/ProjetFinal/Views/assets/vendor/moment/min/moment.min.js"></script>
<script src="/CoursCM_2/ProjetFinal/Views/assets/vendor/moment-timezone/builds/moment-timezone-with-data.min.js"></script>

<!-- Hammer.js -->
<script src="/CoursCM_2/ProjetFinal/Views/assets/vendor/hammerjs/hammer.min.js"></script>

<!-- NanoSroller -->
<script src="/CoursCM_2/ProjetFinal/Views/assets/vendor/nanoscroller/bin/javascripts/jquery.nanoscroller.js"></script>

<!-- SoundManager2 -->
<script src="/CoursCM_2/ProjetFinal/Views/assets/vendor/soundmanager2/script/soundmanager2-nodebug-jsmin.js"></script>

<!-- Seiyria Bootstrap Slider -->
<script src="/CoursCM_2/ProjetFinal/Views/assets/vendor/bootstrap-slider/dist/bootstrap-slider.min.js"></script>

<!-- Summernote -->
<script src="/CoursCM_2/ProjetFinal/Views/assets/vendor/summernote/dist/summernote-bs4.min.js"></script>

<!-- nK Share -->
<script src="/CoursCM_2/ProjetFinal/Views/assets/plugins/nk-share/nk-share.js"></script>

<!-- GoodGames -->
<script src="/CoursCM_2/ProjetFinal/Views/assets/js/goodgames.min.js"></script>
<script src="/CoursCM_2/ProjetFinal/Views/assets/js/goodgames-init.js"></script>




  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<!-- END: Scripts -->


    
</body>
</html>
