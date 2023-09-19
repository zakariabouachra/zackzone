<?php
require_once('clsConnexion.php');

class Product{
    
    public function insert_product(){
        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        $cat = $_POST['cat'];
        $product_price = $_POST['product_price'];
        $product_desc = $_POST['product_desc'];
        $product_keywords = $_POST['product_keywords'];
        $product_img1 = $_FILES['product_img1']['name'];
        $product_img2 = $_FILES['product_img2']['name'];
        $product_img3 = $_FILES['product_img3']['name'];
        $temp_name1 = $_FILES['product_img1']['tmp_name'];
        $temp_name2 = $_FILES['product_img2']['tmp_name'];
        $temp_name3 = $_FILES['product_img3']['tmp_name'];
        move_uploaded_file($temp_name1,"product_images/$product_img1");
        move_uploaded_file($temp_name2,"product_images/$product_img2");
        move_uploaded_file($temp_name3,"product_images/$product_img3");     
        $product_quantity = $_POST['product_quantity'];
        $insert_product = "insert into products (p_cat_id,cat_id,date,product_title,product_img1,product_img2,product_img3,product_quantity,product_price,product_desc,product_keywords) values ('$product_cat','$cat',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_quantity','$product_price','$product_desc','$product_keywords')";
        $run_product = mysqli_query($con,$insert_product);
           if ($run_product){
                echo "<script>alert('Product has been inserted successfully!')</script>";
               echo "<script>window.open('../Views/CRUD/index.php?view_products','_self')</script>";
           }
   }

   public function select_product_withId($edit_id){
       $connexion = new Connexion();
       $con = $connexion->getConnexion();
       $get_p = "select * from products where product_id='$edit_id'";
       $run_edit = mysqli_query($con,$get_p);
       $row_edit = mysqli_fetch_array($run_edit);
       return $row_edit;

   }

   public function select_product_withCatID($id){
    $connexion = new Connexion();
    $con = $connexion->getConnexion();
    $get_p = "select * from products where cat_id='$id'";
    $run = mysqli_query($con,$get_p);
    if($run->num_rows > 0){
        $data = array();
        while($row = $run->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }
    else{
        echo 'No found records!';
    }

    }

   public function count_product(){
    $connexion = new Connexion();
    $con = $connexion->getConnexion();
    $get_products = "select * from products ";
    $run_products = mysqli_query ($con,$get_products);
    $count_products = mysqli_num_rows($run_products);
    return $count_products;

    }

   public function affich_products(){
       $connexion = new Connexion();
       $con = $connexion->getConnexion();
       $get_pro = "select * from products";
        $run_pro = mysqli_query($con,$get_pro);
       if($run_pro->num_rows > 0){
           $data = array();
           while($row = $run_pro->fetch_assoc()){
               $data[] = $row;
           }
           return $data;
       }
       else{
           echo 'No found records!';
       }
   }

   public function delete_product($delete_id){
       $connexion = new Connexion();
       $con = $connexion->getConnexion();
       $delete_pro = "delete from products where product_id = '$delete_id'";
       $run_delete = mysqli_query($con,$delete_pro);
       if($run_delete){    
            echo "<script>alert('Product has been deleted successfully!!!')</script>";
           echo "<script>window.open('../Views/CRUD/index.php?view_products','_self')</script>";
       }
   }

   public function modif_product($p_id){
       $connexion = new Connexion();
       $con = $connexion->getConnexion();
       $product_title = $_POST['product_title'];
       $product_cat = $_POST['product_cat'];
       $cat = $_POST['cat'];
       $product_price = $_POST['product_price'];
       $product_desc = $_POST['product_desc'];
       $product_keywords = $_POST['product_keywords'];
       $product_img1 = $_FILES['product_img1']['name'];
       $product_img2 = $_FILES['product_img2']['name'];
       $product_img3 = $_FILES['product_img3']['name'];
       $temp_name1 = $_FILES['product_img1']['tmp_name'];
       $temp_name2 = $_FILES['product_img2']['tmp_name'];
       $temp_name3 = $_FILES['product_img3']['tmp_name']; 
       move_uploaded_file($temp_name1,"product_images/$product_img1");
       move_uploaded_file($temp_name2,"product_images/$product_img2");
       move_uploaded_file($temp_name3,"product_images/$product_img3"); 
       $product_quantity = $_POST['product_quantity'];        
       $update_product="update products set p_cat_id='$product_cat',cat_id='$cat',date=NOW(),product_title='$product_title',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_quantity='$product_quantity',product_price='$product_price',product_desc='$product_desc',product_keywords='$product_keywords' where product_id='$p_id'";  
       $run_product = mysqli_query($con,$update_product);
       if($run_product){
           echo "<script>alert('Product has been updated successfully')</script>";
           echo "<script>window.open('../Views/CRUD/index.php?view_products','_self')</script>";
       }
   }
   
   public function modif_qtyProduct($p_id,$qty){
    $connexion = new Connexion();
    $con = $connexion->getConnexion();
    $produit = $this->select_product_withId($p_id);
    $last_qty = $produit['product_quantity'];
    $new_quantity = $last_qty - $qty;        
    $update_product="update products set product_quantity='$new_quantity' where product_id='$p_id'";  
    mysqli_query($con,$update_product);
  
    }
}



?>