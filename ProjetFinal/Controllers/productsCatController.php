<?php 

require_once('../Models/clsProductsCat.php');
$productCat = new productCat();

if(isset($_GET['action']) && $_GET['action'] == 'insertion'){
    $productCat->insert_p_cat();
}
else if(isset($_GET['action']) && $_GET['action'] == 'affichage'){
    $productCat->affich_p_cats();
}
else if(isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['delete_p_cat'])){
    $id = $_GET['delete_p_cat'];
    $productCat->delete_p_cat($id);
}
else if(isset($_GET['action']) && $_GET['action'] == 'modification' && isset($_GET['edit_p_cat'])){
    $id = $_GET['edit_p_cat'];
    $productCat->modif_p_cat($id);
}
else{
    echo 'pas d\'action detecte';
}


?>