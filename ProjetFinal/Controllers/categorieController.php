<?php 

require_once('../Models/clsCategorie.php');
$Categorie = new Categorie();

if(isset($_GET['action']) && $_GET['action'] == 'insertion'){
    $Categorie->insert_cat();
}
else if(isset($_GET['action']) && $_GET['action'] == 'affichage'){
    $Categorie->affich_cats();
}
else if(isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['delete_cat'])){
    $id = $_GET['delete_cat'];
    $Categorie->delete_cat($id);
}
else if(isset($_GET['action']) && $_GET['action'] == 'modification' && isset($_GET['edit_cat'])){
    $id = $_GET['edit_cat'];
    $Categorie->modif_cat($id);
}
else{
    echo 'pas d\'action detecte';
}


?>