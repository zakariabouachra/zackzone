

<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / View Users

</li>

</ol><!-- breadcrumb Ends -->


</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> View Users

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>User Name:</th>

<th>User Email:</th>

<th>User Country:</th>

<th>User Job:</th>

<th>Delete User:</th>


</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php

    require_once('../../Models/clsAdmin.php');
    $admin = new user();
    $row_admin = $admin->affich_Admins();

    if(!empty($row_admin)) {
        foreach ($row_admin as $row) {


?>

<tr>

<td><?php echo $row['admin_name'] ?></td>

<td><?php echo $row['admin_email'] ?></td>

<td><?php echo $row['admin_country'] ?></td>

<td><?php echo $row['admin_job'] ?></td>

<td>

<a href="/CoursCM_2/ProjetFinal/Controllers/adminController.php?action=suppression&user_id=<?php echo $row['admin_id'] ?>">

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

