<?php
require_once('clsConnexion.php');
require_once('C:\xampp\htdocs\CoursCM_2\ProjetFinal\Models\clsPendingOrder.php');
require_once('C:\xampp\htdocs\CoursCM_2\ProjetFinal\Models\clsProducts.php');

class Panier{

public function creationDuPanier()
{
      $_SESSION['panier']=array();
      $_SESSION['panier']['image'] = array();
      $_SESSION['panier']['titre'] = array();
      $_SESSION['panier']['id_produit'] = array();
      $_SESSION['panier']['quantite'] = array();
      $_SESSION['panier']['prix'] = array();
}

public function ajouterProduitDansPanier($titre,$id_produit,$quantite,$prix,$image)
{
    session_start();
    if(!isset($_SESSION['panier'])){
    $this->creationDuPanier();
    }
    $position_produit = array_search($id_produit,  $_SESSION['panier']['id_produit']); 
    if ($position_produit !== false)
    {
         $_SESSION['panier']['quantite'][$position_produit] += $quantite ;
    }
    else 
    {
        $_SESSION['panier']['titre'][] = $titre;
        $_SESSION['panier']['id_produit'][] = $id_produit;
        $_SESSION['panier']['quantite'][] = $quantite;
		$_SESSION['panier']['prix'][] = $prix;
        $_SESSION['panier']['image'][] = $image;
    }
}
public function modifierProduitDansPanier($id_produit,$quantite)
{
    session_start();
    $position_produit = array_search($id_produit,  $_SESSION['panier']['id_produit']); 
    $_SESSION['panier']['quantite'][$position_produit] = $quantite;
    
}
//------------------------------------
public function montantTotal()
{
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++) 
   {
      $total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];
   }
   return round($total,2);
}
//------------------------------------
public function retirerproduitDuPanier($id_produit_a_supprimer)
{
    session_start();
	$position_produit = array_search($id_produit_a_supprimer,  $_SESSION['panier']['id_produit']);
	if ($position_produit !== false)
    {
		array_splice($_SESSION['panier']['titre'], $position_produit, 1);
		array_splice($_SESSION['panier']['id_produit'], $position_produit, 1);
		array_splice($_SESSION['panier']['quantite'], $position_produit, 1);
		array_splice($_SESSION['panier']['prix'], $position_produit, 1);
        
	}
}

public function payer(){
    $produit = new Product();
    for($i=0 ;$i < count($_SESSION['panier']['id_produit']) ; $i++) 
    {
        $row = $produit->select_product_withId($_SESSION['panier']['id_produit'][$i]);
        if($row['product_quantity'] < $_SESSION['panier']['quantite'][$i])
        {
            if($row['product_quantity'] > 0)
            {
                echo "<script>alert('la quantité du produit  a été réduite car notre stock était insuffisant, veuillez vérifier vos achats')</script>";
                $_SESSION['panier']['quantite'][$i] = $row['product_quantity'];
            }
            else
            {
                echo "<script>alert('le produit a été retiré de votre panier car nous sommes en rupture de stock, veuillez vérifier vos achats.')</script>";
                $this->retirerproduitDuPanier($_SESSION['panier']['id_produit'][$i]);
                $i--;
            }
            $erreur = true;
        }
    
    if(!isset($erreur))
    {
        echo "<script>alert('produit acheter avec succes')";
        $produit->modif_qtyProduct($_SESSION['panier']['id_produit'][$i],$_SESSION['panier']['quantite'][$i]);
        $order = new PendingOrder();
        $order->insert_p_order($_SESSION['panier']['quantite'][$i],$_SESSION['panier']['id_produit'][$i]);
        unset($_SESSION['panier']);
        echo "<script>window.open('/CoursCM_2/ProjetFinal/Views/index.php','_self')</script>";
    }
    }
}
}



?>