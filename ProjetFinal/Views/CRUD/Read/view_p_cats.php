<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / View Products Categories

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"> </i> View Products Categories

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<div class="table-responsive"><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>Product Category Id</th>
<th>Product Category Title</th>
<th>Product Category Description</th>
<th>Delete Product Category</th>
<th>Edit Product Category</th>


</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php

    require_once('../../Models/clsProductsCat.php');
    $prodCat = new productCat();
    $row_p_cats = $prodCat->affich_p_cats();

    if(!empty($row_p_cats)) {
        foreach ($row_p_cats as $row) {


?>

<tr>

<td> <?php echo $row['p_cat_id']; ?> </td>

<td> <?php echo $row['p_cat_title']; ?> </td>

<td width="300"> <?php echo $row['p_cat_desc']; ?> </td>

<td> 

<a href="/CoursCM_2/ProjetFinal/Controllers/productsCatController.php?action=suppression&delete_p_cat=<?php echo $row['p_cat_id']; ?>">

<i class="fa fa-trash-o"></i> Delete

</a>

</td>

<td> 

<a href="index.php?edit_p_cat=<?php echo $row['p_cat_id']; ?>">

<i class="fa fa-pencil"></i> Edit

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

