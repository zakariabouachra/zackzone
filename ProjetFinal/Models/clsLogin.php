<?php
require_once('clsConnexion.php');

class Login{

    public function log_admin(){
        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        session_start();
        $admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);
        $admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);
        $get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";
        $run_admin = mysqli_query($con,$get_admin);
        $count = mysqli_num_rows($run_admin);
        if($count==1){
            $_SESSION['admin_email']=$admin_email;
            echo "<script>alert('You are Logged in into admin panel')</script>";
            echo "<script>window.open('/CoursCM_2/ProjetFinal/Views/CRUD/index.php?dashboard','_self')</script>";
        }
        else {
            echo "<script>alert('Email or Password is Wrong')</script>";
            echo "<script>window.open('/CoursCM_2/ProjetFinal/Views/CRUD/login.php','_self')</script>";
        }
    }

    public function logout_admin(){
        session_start();
        session_destroy();
        echo"<script>window.open('/CoursCM_2/ProjetFinal/Views/CRUD/login.php','_self')</script>";
    }

    public function log_user(){
        $connexion = new Connexion();
        $con = $connexion->getConnexion();
        session_start();
        $customer_email = $_POST['c_email'];
        $customer_pass = $_POST['c_pass'];
        $select_customer = "select * from customers where customer_email='$customer_email'";
        $run_customer = mysqli_query($con,$select_customer);
        $check_customer = mysqli_num_rows($run_customer);
        $row_customer = mysqli_fetch_array($run_customer);
        $hash_password = $row_customer['customer_pass'];
        $decrypt_password = password_verify($customer_pass , $hash_password);
        if($decrypt_password==0){
            echo "<script>alert('Your password or Email is wrong')</script>";
            echo "<script>window.open('/CoursCM_2/ProjetFinal/Views/index.php?','_self')</script>";
        }
        else{
            $_SESSION['customer_email']=$customer_email;
            echo "<script>alert('You are Logged In')</script>";
            echo "<script>window.open('/CoursCM_2/ProjetFinal/Views/index.php','_self')</script>";
        }
        

    }

    public function logout_user(){
        session_start();
        session_destroy();
        echo"<script>window.open('/CoursCM_2/ProjetFinal/Views/index.php','_self')</script>";
    }

    

 
}

?>