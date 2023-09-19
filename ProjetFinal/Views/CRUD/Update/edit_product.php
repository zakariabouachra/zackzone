<?php


    require_once('../../Models/clsProducts.php');
    $Product = new Product();
    require_once('../../Models/clsProductsCat.php');
    $prodCat = new productCat();
    require_once('../../Models/clsCategorie.php');
    $Cat = new Categorie();
  

    $row_product = $Product->select_product_withId($_GET['edit_product']);
    $row_p_cats = $prodCat->select_p_cat_withId($row_product['p_cat_id']);
    $row_cats = $Cat->select_cat_withId($row_product['cat_id']);

?>

<!DOCTYPE html>

<html>

<head>

<title> Edit Products </title>


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Edit Products

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Edit Products

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" action="/CoursCM_2/ProjetFinal/Controllers/productController.php?action=modification&edit_product=<?php echo $row_product['product_id']; ?>" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Title </label>

<div class="col-md-6" >

<input type="text" name="product_title" class="form-control" required value="<?php echo $row_product['product_title'] ;?>" >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Category </label>

<div class="col-md-6" >

<select name="product_cat" class="form-control">

<option value="<?php echo $row_product['p_cat_id'] ;?>"> <?php echo $row_p_cats['p_cat_title'] ;?> </option>

<?php

require_once('../../Models/clsProductsCat.php');
    $prodCat = new productCat();
    $row_p_cats = $prodCat->affich_p_cats();

    if(!empty($row_p_cats)) {
        foreach ($row_p_cats as $row) {
      $p_cat_id = $row['p_cat_id'];
      $p_cat_title = $row['p_cat_title'];

echo "<option value='$p_cat_id' >$p_cat_title</option>";

    }}


?>


</select>

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Category </label>

<div class="col-md-6" >


<select name="cat" class="form-control" >

<option value="<?php echo $row_product['cat_id'] ;?>"> <?php echo $row_cats['cat_title'] ;?> </option>


<?php

    require_once('../../Models/clsCategorie.php');
    $Cat = new Categorie();
    $row_cats = $Cat->affich_cats();

    if(!empty($row_cats)) {
        foreach ($row_cats as $row) {  
          $cat_id = $row['cat_id'];
          $cat_title = $row['cat_title'];
          echo "<option value='$cat_id'>$cat_title</option>";
        }}


?>


</select>

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Image 1 </label>

<div class="col-md-6" >

<input type="file" name="product_img1" class="form-control" required >

<br><img src="assets/product_images/<?php echo $row_product['product_img1'] ;?>" alt="" width="70" height="70">

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Image 2 </label>

<div class="col-md-6" >

<input type="file" name="product_img2" class="form-control" required >

<br><img src="assets/product_images/<?php echo $row_product['product_img2'] ;?>" alt="" width="70" height="70">


</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Image 3 </label>

<div class="col-md-6" >

<input type="file" name="product_img3" class="form-control" required >

<br><img src="assets/product_images/<?php echo $row_product['product_img3'] ;?>" alt="" width="70" height="70">


</div>

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Quantity </label>

<div class="col-md-6" >

<input type="text" name="product_quantity" class="form-control" required value="<?php echo $row_product['product_quantity'] ;?>" >

</div>

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Price </label>

<div class="col-md-6" >

<input type="text" name="product_price" class="form-control" required value="<?php echo $row_product['product_price'] ;?>" >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Keywords </label>

<div class="col-md-6" >

<input type="text" name="product_keywords" class="form-control" required value="<?php echo $row_product['product_keywords'] ;?>" >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Description </label>

<div class="col-md-6" >

<textarea name="product_desc" class="form-control" rows="6" cols="19" >
<?php echo $row_product['product_desc'] ;?>
</textarea>

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" ></label>

<div class="col-md-6" >

<input type="submit" name="update" value="Update Product" class="btn btn-primary form-control" >

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 




</body>

</html>

