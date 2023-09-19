<?php 

require_once('../Models/clsCustomers.php');
$customer = new Customer();

if(isset($_GET['action']) && $_GET['action'] == 'insertion'){
    $customer->insert_customer();
}
else if(isset($_GET['action']) && $_GET['action'] == 'affichage'){
    $customer->affich_customer();
}
else if(isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['customer_delete'])){
    $id = $_GET['customer_delete'];
    $customer->delete_customer($id);
}
else if(isset($_GET['action']) && $_GET['action'] == 'modification' && isset($_GET['edit_customer'])){
    $id = $_GET['edit_customer'];
    $customer->modif_customer($id);
}
else if(isset($_GET['action']) && $_GET['action'] == 'login'){
    include('../Models/clsLogin.php');
    $Login = new Login();
    $Login->log_user();
}
else if(isset($_GET['action']) && $_GET['action'] == 'logout'){
    include('../Models/clsLogin.php');
    $Login = new Login();
    $Login->logout_user();
}
else if(isset($_GET['action']) && $_GET['action'] == 'changepasswd' && isset($_GET['email'])){
    $email = $_GET['email'];
    $customer->change_password($email);
}
else{
    echo 'pas d\'action detecte';
}


?>