<?php
require_once('clsConnexion.php');
class user{
    
    public function insert_Admin(){
        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        $admin_name = $_POST['admin_name'];
        $admin_email = $_POST['admin_email'];
        $admin_pass = $_POST['admin_pass'];
        $admin_country = $_POST['admin_country'];
        $admin_job = $_POST['admin_job'];
        $admin_contact = $_POST['admin_contact'];
        $admin_about = $_POST['admin_about'];    
        $insert_admin = "insert into admins (admin_name,admin_email,admin_pass,admin_contact,admin_country,admin_job,admin_about) values ('$admin_name','$admin_email','$admin_pass','$admin_contact','$admin_country','$admin_job','$admin_about')";
        $run_admin = mysqli_query($con,$insert_admin);
           if ($run_admin){
                echo "<script>alert('One User has been inserted successfully!!!')</script>";
               echo "<script>window.open('../Views/CRUD/index.php?view_users','_self')</script>";
           }
   }

   public function select_Admin_withId($id){
       $connexion = new Connexion();
       $con = $connexion->getConnexion();
       $edit_id = $id;
       $edit_admin = "select * from admins where admin_id='$edit_id'";
       $run_edit = mysqli_query($con,$edit_admin);
       $row_edit = mysqli_fetch_array($run_edit);
       return $row_edit;

   }

   public function select_Admin_withEmail($email){
    $connexion = new Connexion();
    $con = $connexion->getConnexion();
    $select = "select * from admins where admin_email='$email'";
    $run = mysqli_query($con,$select);
    $row = mysqli_fetch_array($run);
    return $row;

    }

   public function affich_Admins(){
       $connexion = new Connexion();
       $con = $connexion->getConnexion();
       $get_admin = "select * from admins";
       $run_admin = mysqli_query($con,$get_admin);
       if($run_admin->num_rows > 0){
           $data = array();
           while($row = $run_admin->fetch_assoc()){
               $data[] = $row;
           }
           return $data;
       }
       else{
           echo 'No found records!';
       }
   }

   public function delete_Admin($delete_id){
       $connexion = new Connexion();
       $con = $connexion->getConnexion();
       $delete_user = "delete from admins where admin_id='$delete_id'";
       $run_delete = mysqli_query($con,$delete_user);
       if($run_delete){    
            echo "<script>alert('One User has been deleted successfully!!!')</script>";
           echo "<script>window.open('../Views/CRUD/index.php?view_users','_self')</script>";
       }
   }

   public function modif_Admin($p_cat_id){
       $connexion = new Connexion();
       $con = $connexion->getConnexion();
       $p_cat_title = $_POST['p_cat_title'];
       $p_cat_desc = $_POST['p_cat_desc'];
       $update_p_cat = "update product_categories set p_cat_title='$p_cat_title',p_cat_desc='$p_cat_desc' where p_cat_id='$p_cat_id'";
       $run_p_cat = mysqli_query($con,$update_p_cat);
       if($run_p_cat){
           echo "<script>alert('Product Category has been Updated')</script>";
           echo "<script>window.open('../Views/CRUD/index.php?view_p_cats','_self')</script>";
       }
   }

}



?>