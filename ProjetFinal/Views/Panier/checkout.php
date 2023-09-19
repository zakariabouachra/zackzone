

<!DOCTYPE html>
<html>

<head>
<title>ZACKZON </title>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet" >

<link href="/CoursCM_2/ProjetFinal/Views/Panier/assets/styles/bootstrap.min.css" rel="stylesheet">

<link href="/CoursCM_2/ProjetFinal/Views/Panier/assets/styles/style.css" rel="stylesheet">

<link href="/CoursCM_2/ProjetFinal/Views/Panier/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

</head>

<body style="background-color: white;">


<div class="col-md-9" id="cart" ><!-- col-md-9 Starts -->

    <img src="../assets/images/logoZack.png" alt="logo"
    style="width: 150px;height:150px;padding:10px;"/>

</div>


<div class="col-md-9" id="cart" ><!-- col-md-9 Starts -->

<div class="box" ><!-- box Starts -->

<?php 

session_start();

?>

<h1> Shopping Cart </h1>


<p class="text-muted" > You currently have <?php echo count($_SESSION['panier']['id_produit']); ?> item(s) in your cart. </p>

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table" ><!-- table Starts -->

<thead><!-- thead Starts -->

<tr>

<th colspan="2" >Product</th>

<th>Nom</th>

<th>Quantity</th>

<th>Unit Price</th>

<th colspan="1"> Sub Total </th>

<th colspan="2">Action</th>


</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php 
                        
if(empty($_SESSION['panier']['id_produit'])) // panier vide
{ 
    echo 'Votre panier est vide';
}
else{
for($j = 0;$j < count($_SESSION['panier']['id_produit']); $j++) { 
                        
?>
<tr><!-- tr Starts -->

<td><img style="width:150px;" src="/CoursCM_2/ProjetFinal/Views/assets/images/products/<?php echo $_SESSION['panier']['image'][$j] ?>" alt="panier img"></td>
<td></td>
<td><?php echo $_SESSION['panier']['titre'][$j] ?></td>
<form action="\CoursCM_2\ProjetFinal\Controllers\panierController.php?action=modification" method="post">
<td><input type="text" value="<?php echo $_SESSION['panier']['quantite'][$j] ?>" name="qty" style="width:50px; text-align:right;"></td>
<td>$<?php echo $_SESSION['panier']['prix'][$j] ?>.00</div></td>
<td>$<?php echo $_SESSION['panier']['prix'][$j]*$_SESSION['panier']['quantite'][$j] ?>.00</td>
<td>
<a href="\CoursCM_2\ProjetFinal\Controllers\panierController.php?action=remove&id=<?php echo $_SESSION['panier']['id_produit'][$j] ?>"><i class="fa fa-trash-o"></i></a>
<input type="hidden" name="id" value="<?php echo $_SESSION['panier']['id_produit'][$j] ?>">
<button type="submit" name=""><i class="fa fa-pencil"></i></button>
</form>
</td>
</tr><!-- tr Ends -->


<?php }} ?>
</tbody><!-- tbody Ends -->

<tfoot><!-- tfoot Starts -->

<tr>

<th colspan="5"> Total </th>

<?php 
require_once('C:\xampp\htdocs\CoursCM_2\ProjetFinal\Models\clsPanier.php');
$panier = new Panier();
?>

<th colspan="2">$<?php echo $panier->montantTotal();?>.00 </th>

</tr>

</tfoot><!-- tfoot Ends -->

</table><!-- table Ends -->


</div><!-- table-responsive Ends -->


<div class="box-footer"><!-- box-footer Starts -->

<div class="pull-left"><!-- pull-left Starts -->

<a href="\CoursCM_2\ProjetFinal\Views\index.php" class="btn btn-default">

<i class="fa fa-chevron-left"></i> Continue Shopping

</a>

</div><!-- pull-left Ends -->

</div><!-- box-footer Ends -->

</form><!-- form Ends -->


</div><!-- box Ends -->

<div id="row same-height-row"><!-- row same-height-row Starts -->

<div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Starts -->

</div><!-- col-md-3 col-sm-6 Ends -->



</div><!-- row same-height-row Ends -->


</div><!-- col-md-9 Ends -->

<div class="col-md-3"><!-- col-md-3 Starts -->

<div class="box" id="order-summary"><!-- box Starts -->

<div class="box-header"><!-- box-header Starts -->

<h3>Order Summary</h3>

</div><!-- box-header Ends -->

<p class="text-muted">
Shipping and additional costs are calculated based on the values you have entered.
</p>

<div class="table-responsive"><!-- table-responsive Starts -->

<table class="table"><!-- table Starts -->

<tbody><!-- tbody Starts -->

<tr>

<td> Order Subtotal </td>

<th> $<?php echo $panier->montantTotal();?>.00 </th>

</tr>

<tr>

<td> Shipping and handling </td>

<th>$15.00</th>

</tr>

<tr>

<td>Tax</td>

<th>15%</th>

</tr>

<tr class="total">

<td>Total</td>
<?php $montantTotal = $panier->montantTotal();?>
<th>$<?php echo ($montantTotal+15)+($montantTotal+15)*15/100 ?>0</th>

</tr>
<tr>
    <td><a href="\CoursCM_2\ProjetFinal\Controllers\panierController.php?action=payer" class="btn btn-primary">

Go to payment <i class="fa fa-chevron-right"></i></td>

</a></tr>

</tbody><!-- tbody Ends -->

</table><!-- table Ends -->

</div><!-- table-responsive Ends -->

</div><!-- box Ends -->

</div><!-- col-md-3 Ends -->

</div><!-- container Ends -->
</div><!-- content Ends -->




<script src="/CoursCM_2/ProjetFinal/Views/Panier/assets/js/jquery.min.js"> </script>

<script src="/CoursCM_2/ProjetFinal/Views/Panier/assets/js/bootstrap.min.js"></script>

</body>
</html>