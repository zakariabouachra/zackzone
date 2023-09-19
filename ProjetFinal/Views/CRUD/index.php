
<?php 
session_start();
include('C:\xampp\htdocs\CoursCM_2\ProjetFinal\Models\clsConnexion.php');
include('C:\xampp\htdocs\CoursCM_2\ProjetFinal\Models\clsAdmin.php');
include('C:\xampp\htdocs\CoursCM_2\ProjetFinal\Models\clsProducts.php');
include('C:\xampp\htdocs\CoursCM_2\ProjetFinal\Models\clsCustomers.php');
include('C:\xampp\htdocs\CoursCM_2\ProjetFinal\Models\clsProductsCat.php');
include('C:\xampp\htdocs\CoursCM_2\ProjetFinal\Models\clsPendingOrder.php');
$connexion = new Connexion();
$con = $connexion->getConnexion();
$admin = new user();
$admin_session = $_SESSION['admin_email'];
if($admin_session == ""){
    echo "<script>window.open('/CoursCM_2/ProjetFinal/Views/CRUD/login.php','_self')</script>";
}
else{ 
$row_admin = $admin->select_Admin_withEmail($admin_session);
$products = new Product();
$count_products = $products->count_product();
$customers = new Customer();
$count_customers = $customers->count_customers();
$p_cat = new productCat();
$count_p_categories = $p_cat->count_p_cat();
$order = new PendingOrder();
$count_orders = $order->count_p_order();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet" >

<link href="assets/styles/bootstrap.min.css" rel="stylesheet">

<link href="assets/styles/style.css" rel="stylesheet">

<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<script src="assets/js/jquery.min.js"> </script>

<script src="assets/js/bootstrap.min.js"></script>
</head>
<body>

<div id="wrapper"> <!--wrapper start-->

<?php include_once("includes/sidebar.php")  ?>    
            
<div id="page-wrapper"><!--page-wrapper start-->

<div class="container-fluid"> <!--container-fluid start-->
 <?php
    if(isset($_GET['dashboard'])){
    include("dashboard.php"); }
    
    if(isset($_GET['insert_product'])){
        include_once("Create/insert_product.php");
    }
        
    if(isset($_GET['view_products'])){
        include_once("Read/view_products.php");
    } 
    
    
    if(isset($_GET['delete_product'])){
        
        include_once("Delete/delete_product.php");
    }
        
    if(isset($_GET['edit_product'])){
        include_once("Update/edit_product.php");
    }
    
    if(isset($_GET['insert_p_cat'])){

      include("Create/insert_p_cat.php"); }
    
    if(isset($_GET['view_p_cats'])){
        include("Read/view_p_cats.php");
    }
    
    if(isset($_GET['delete_p_cat'])){
        include("Delete/delete_p_cat.php");
    }
    
    
    if(isset($_GET['edit_p_cat'])){
        include("Update/edit_p_cat.php");
    }
    
     if(isset($_GET['insert_cat'])){
        include("Create/insert_cat.php");
    }
    
    if(isset($_GET['view_cats'])){
        include("Read/view_cats.php");
    }
    
     if(isset($_GET['edit_cat'])){
        include("Update/edit_cat.php");
    }
    
     if(isset($_GET['delete_cat'])){
        include("Delete/delete_cat.php");
    }
    
    if(isset($_GET['insert_slide'])){
        include("Create/insert_slide.php");
    }
    
    if(isset($_GET['view_slides'])){
        include("Read/view_slides.php");
    }
    
    if(isset($_GET['delete_slide'])){
        include("Delete/delete_slide.php");
    }
    
    if(isset($_GET['edit_slide'])){
        include("Update/edit_slide.php");
    }
    
     if(isset($_GET['view_customers'])){
        include("Read/view_customers.php");
    }
    
      if(isset($_GET['customer_delete'])){
        include("Delete/customer_delete.php");
    }
    
    
      if(isset($_GET['view_orders'])){
        include("Read/view_orders.php");
    }
    
       if(isset($_GET['order_delete'])){
        include("Delete/order_delete.php");
    }
    
    
    
      if(isset($_GET['insert_user'])){
        include("Create/insert_user.php");
    }
    
    
    
      if(isset($_GET['view_users'])){
        include("Read/view_users.php");
    }
    
    
      if(isset($_GET['user_delete'])){
        include("Delete/user_delete.php");
    }
    
     if(isset($_GET['user_profile'])){
        include("Update/user_profile.php");
    }

    

    
    
    
    
    
}
    
    ?>   
    
</div>  <!--container-fluid start-->
    
    
</div>  <!--page-wrapper start-->
    
</div> <!--wrapper stop-->
            
</body>
</html>

