<?php 

require_once('../Models/clsPanier.php');
$panier = new Panier();

if(isset($_GET['action']) && $_GET['action'] == 'creer'){
    $panier->creationDuPanier();
    echo "<script>window.open('/CoursCM_2/ProjetFinal/Views/index.php','_self')</script>";
}
else if(isset($_GET['action']) && $_GET['action'] == 'insertion'){
    $id_produit = $_POST['id'];
    $titre = $_POST['titre'];
    $quantite = $_POST['qty'];
    $prix = $_POST['prix'];
    $image = $_POST['image'];
    $panier->ajouterProduitDansPanier($titre,$id_produit,$quantite,$prix,$image);
    echo "<script>window.open('/CoursCM_2/ProjetFinal/Views/index.php','_self')</script>";
}
else if(isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id'])){
    $id = $_GET['id'];
    $panier->retirerproduitDuPanier($id);
    echo "<script>window.open('/CoursCM_2/ProjetFinal/Views/index.php','_self')</script>";
}
else if(isset($_GET['action']) && $_GET['action'] == 'modification'){
    $id = $_POST['id'];
    $quantite = $_POST['qty'];
    $panier->modifierProduitDansPanier($id,$quantite);
    echo "<script>window.open('/CoursCM_2/ProjetFinal/Views/Panier/checkout.php','_self')</script>";
}
else if(isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['id'])){
    $id = $_GET['id'];
    $panier->retirerproduitDuPanier($id);
    echo "<script>window.open('/CoursCM_2/ProjetFinal/Views/Panier/checkout.php','_self')</script>";

}
elseif(isset($_GET['action']) && $_GET['action'] == 'vider'){
    unset($_SESSION['panier']);
}
elseif(isset($_GET['action']) && $_GET['action'] == 'payer'){
    session_start();
    if(isset($_SESSION['customer_email'])){
    $panier->payer();
    echo "<script>window.open('/CoursCM_2/ProjetFinal/Views/index.php','_self')</script>";
    }
    else{
        echo "<script>alert('Vous devez dabord vous connecter')</script>";
        echo "<script>window.open('/CoursCM_2/ProjetFinal/Views/index.php','_self')</script>";
    }
}
else{
    echo 'pas d\'action detecte';
}


?>