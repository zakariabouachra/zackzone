

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / View Customers

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> View Customers

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->


<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>Customer No:</th>
<th>Customer Name:</th>
<th>Customer Email:</th>
<th>Customer Country:</th>
<th>Customer City:</th>
<th>Customer Phone Number:</th>
<th>Customer Delete:</th>


</tr>

</thead><!-- thead Ends -->


<tbody><!-- tbody Starts -->

<?php

    require_once('../../Models/clsCustomers.php');
    $Customer = new Customer();
    $row_c = $Customer->affich_customer();

    if(!empty($row_c)) {
        foreach ($row_c as $row) {


?>


<tr>

<td><?php echo $row['customer_id']; ?></td>

<td><?php echo $row['customer_name']; ?></td>

<td><?php echo $row['customer_email']; ?></td>

<td><?php echo $row['customer_country']; ?></td>

<td><?php echo $row['customer_city']; ?></td>

<td><?php echo $row['customer_contact']; ?></td>

<td>

<a href="/CoursCM_2/ProjetFinal/Controllers/customerController.php?action=suppression&customer_delete=<?php echo $row['customer_id']; ?>" >

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

