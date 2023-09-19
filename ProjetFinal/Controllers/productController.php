<?php 

require_once('../Models/clsProducts.php');
$product = new Product();

if(isset($_GET['action']) && $_GET['action'] == 'insertion'){
    $product->insert_product();
}
else if(isset($_GET['action']) && $_GET['action'] == 'affichage'){
    $product->affich_products();
}
else if(isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['delete_product'])){
    $id = $_GET['delete_product'];
    $product->delete_product($id);
}
else if(isset($_GET['action']) && $_GET['action'] == 'modification' && isset($_GET['edit_product'])){
    $id = $_GET['edit_product'];
    $product->modif_product($id);
}
else{
    echo 'pas d\'action detecte';
}


?>