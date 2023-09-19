<?php

require_once('clsConnexion.php');
class Customer{

    public function insert_customer(){
        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        $c_name = $_POST['c_name'];
        $c_email = $_POST['c_email'];
        $c_pass = $_POST['c_pass'];
        $encrypted_password = password_hash($c_pass, PASSWORD_DEFAULT);
        $c_country = $_POST['c_country'];
        $c_city = $_POST['c_city'];
        $c_contact = $_POST['c_contact'];
        $c_address = $_POST['c_address'];
        $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address) values ('$c_name','$c_email','$encrypted_password','$c_country','$c_city','$c_contact','$c_address')";
        $run_customer = mysqli_query($con,$insert_customer);
           if ($run_customer){
                echo "<script>alert('You have been Registered Successfully!')</script>";
               echo "<script>window.open('/CoursCM_2/ProjetFinal/Views/index.php','_self')</script>";
           }
   }

   public function select_customer_withEmail($customer_session){
       $connexion = new Connexion();
       $con = $connexion->getConnexion();
       $get_customer = "select * from customers where customer_email='$customer_session'";
       $run_customer = mysqli_query($con,$get_customer);
       $row_customer = mysqli_fetch_array($run_customer);
       return $row_customer;

   }

   public function affich_customer(){
       $connexion = new Connexion();
       $con = $connexion->getConnexion();
       $get_c = "select * from customers";
       $run_c = mysqli_query($con,$get_c);
       if($run_c->num_rows > 0){
           $data = array();
           while($row = $run_c->fetch_assoc()){
               $data[] = $row;
           }
           return $data;
       }
       else{
           echo 'No found records!';
       }
   }

   public function count_customers(){
        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        $get_customers = "select * from customers";
        $run_customers = mysqli_query($con,$get_customers); 
        $count_customers = mysqli_num_rows($run_customers);
        return $count_customers;
   }

   public function delete_customer($delete_id){
       $connexion = new Connexion();
       $con = $connexion->getConnexion();
       $delete_customer = "delete from customers where customer_id='$delete_id'";
       $run_delete = mysqli_query($con,$delete_customer);
       if($run_delete){    
            echo "<script>alert('Customer Has Been Deleted!')</script>";
           echo "<script>window.open('../Views/CRUD/index.php?view_customers','_self')</script>";
       }
   }

   public function modif_customer($id){
       $connexion = new Connexion();
       $con = $connexion->getConnexion();
       $c_name = $_POST['c_name'];
       $c_email = $_POST['c_email'];
       $c_country = $_POST['c_country'];
       $c_city = $_POST['c_city'];
       $c_contact = $_POST['c_contact'];
       $c_address = $_POST['c_address'];
       $update_customer = "update customers set customer_name='$c_name',customer_email='$c_email',customer_country='$c_country',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_address' where customer_id='$id'";
       $run_customer = mysqli_query($con,$update_customer);
       if($run_customer){
           session_start();
           session_destroy();
           echo "<script>alert('Your account has been updated please login again')</script>";
           echo "<script>window.open('/CoursCM_2/ProjetFinal/Views/index.php','_self')</script>";
       }
   }
   
   public function change_password($c_email){
    $connexion = new Connexion();
    $con = $connexion->getConnexion();
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $new_pass_again = $_POST['new_pass_again'];
    $new_hash_password = password_hash ($new_pass_again, PASSWORD_DEFAULT);
    $sel_old_pass = "select * from customers where customer_email='$c_email'";
    $run_old_pass = mysqli_query($con,$sel_old_pass);
    $row_old_pass = mysqli_fetch_array ($run_old_pass);   
    $hash_password = $row_old_pass['customer_pass'];  
    $check_old_pass = password_verify($old_pass,$hash_password);
    if($check_old_pass==0){
        echo "<script>alert('Your Current Password is not valid try again')</script>";
        echo "<script>window.open('/CoursCM_2/ProjetFinal/Views/index.php','_self')</script>";
    }
    if($new_pass!=$new_pass_again){
        echo "<script>alert('Your New Password dose not match')</script>";
        echo "<script>window.open('/CoursCM_2/ProjetFinal/Views/index.php','_self')</script>";
    }
    $update_pass = "update customers set customer_pass='$new_hash_password' where customer_email='$c_email'";
    $run_pass = mysqli_query($con,$update_pass);
    if($run_pass){
        echo "<script>alert('your Password Has been Changed Successfully')</script>";
        echo "<script>window.open('/CoursCM_2/ProjetFinal/Views/index.php','_self')</script>";
    }
   }



}



?>