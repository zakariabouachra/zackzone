<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / View Categories

</li>

</ol><!-- breadcrumb Ends -->


</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw"></i> View Categories

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>Category ID:</th>
<th>Category Title:</th>
<th>Category Description:</th>
<th>Delete Category:</th>
<th>Edit Category:</th>



</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php

    require_once('../../Models/clsCategorie.php');
    $Cat = new Categorie();
    $row_cats = $Cat->affich_cats();

    if(!empty($row_cats)) {
        foreach ($row_cats as $row) {


?>

<tr>

<td><?php echo $row['cat_id']; ?></td>

<td><?php echo $row['cat_title']; ?></td>

<td width="300" ><?php echo $row['cat_desc']; ?></td>

<td>

<a href="/CoursCM_2/ProjetFinal/Controllers/categorieController.php?action=suppression&delete_cat=<?php echo $row['cat_id']; ?>" >

<i class="fa fa-trash-o" ></i> Delete

</a>

</td>

<td>

<a href="index.php?edit_cat=<?php echo $row['cat_id']; ?>" >

<i class="fa fa-pencil" ></i> Edit

</a>

</td>

</tr>


<?php }}else {
        echo 'No produit found!';
    }?>

</tbody><!-- tbody Ends -->

</table><!-- table-bordered table-hover table-striped Ends -->


</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->
