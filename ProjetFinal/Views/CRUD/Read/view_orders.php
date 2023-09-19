<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts  --->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / View Orders

</li>

</ol><!-- breadcrumb Ends  --->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> View Orders

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<div class="table-responsive"><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>Order No:</th>
<th>Invoice No:</th>
<th>Product id:</th>
<th>Product Qty:</th>
<th>Order Status:</th>
<th>Delete Order:</th>


</tr>

</thead><!-- thead Ends -->


<tbody><!-- tbody Starts -->

<?php
require_once('../../Models/clsPendingOrder.php');
$order = new PendingOrder();

$row_order = $order->affich_p_orders();

if(!empty($row_order)) {
    foreach ($row_order as $row) {

?>


<tr>

<td><?php echo $row['order_id']; ?></td>

<td  bgcolor="yellow" ><?php echo $row['invoice_no']; ?></td>

<td><?php echo $row['product_id']; ?></td>


<td><?php echo $row['qty']; ?></td>

<td>
<?php echo $row['order_status']; ?>
</td>

<td>

<a href="/CoursCM_2/ProjetFinal/Controllers/orderController.php?action=suppression&order_id=<?php echo $row['order_id']; ?>" >

<i class="fa fa-trash-o" ></i> Delete

</a>

</td>


</tr>

<?php }}else {
        echo 'No produit found!';
    }?>

</tbody><!-- tbody Ends -->

</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->
