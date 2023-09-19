<?php 

require_once('../Models/clsAdmin.php');
$admin = new user();

if(isset($_GET['action']) && $_GET['action'] == 'insertion'){
    $admin->insert_Admin();
}
else if(isset($_GET['action']) && $_GET['action'] == 'affichage'){
    $admin->affich_Admins();
}
else if(isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['user_id'])){
    $id = $_GET['user_id'];
    $admin->delete_Admin($id);
}
else if(isset($_GET['action']) && $_GET['action'] == 'modification' && isset($_GET['edit_admin'])){
    $id = $_GET['edit_admin'];
    $admin->modif_Admin($id);
}
else if(isset($_GET['action']) && $_GET['action'] == 'login'){
    include('../Models/clsLogin.php');
    $Login = new Login();
    $Login->log_admin();
}
else if(isset($_GET['action']) && $_GET['action'] == 'logout'){
    include('../Models/clsLogin.php');
    $Login = new Login();
    $Login->logout_admin();
}
else{
    echo 'pas d\'action detecte';
}


?>