<?php 

require_once('C:\xampp\htdocs\CoursCM_2\ProjetFinal\Models\clsPendingOrder.php');
$order = new PendingOrder();

if(isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['order_id'])){
    $id = $_GET['order_id'];
    $order->delete_p_order($id);
}
else{
    echo 'pas d\'action detecte';
}


?>