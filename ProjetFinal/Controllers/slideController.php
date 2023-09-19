<?php 

require_once('../Models/clsSlides.php');
$Slide = new Slides();

if(isset($_GET['action']) && $_GET['action'] == 'insertion'){
    $Slide->insert_slide();
}
else if(isset($_GET['action']) && $_GET['action'] == 'affichage'){
    $Slide->affich_slides('LIMIT 50');
}
else if(isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['delete_slide'])){
    $id = $_GET['delete_slide'];
    $Slide->delete_slide($id);
}
else if(isset($_GET['action']) && $_GET['action'] == 'modification' && isset($_GET['edit_slide'])){
    $id = $_GET['edit_slide'];
    $Slide->modif_slide($id);
}
else{
    echo 'pas d\'action detecte';
}


?>