
<div class="row"> <!-- 1st row starts-->

<div class="col-lg-12"> <!-- col-lg-12 starts-->
    
<ol class="breadcrumb"> <!-- breadcrumb starts-->

<li class="active">
    
    <i class="fa fa-dashboard"></i> Dashboard / View Products
    
</li>    
    
</ol><!-- breadcrumb starts-->
    
</div>  <!-- col-lg-12 starts-->
    
    
</div> <!-- 1st row starts-->

<div class="row"><!-- 2nd row starts-->
 
<div class="col-lg-12"><!-- col-lg-12 starts-->
  
<div class="panel panel-default"> <!-- panel panel-default starts-->
  
<div class="panel-heading"> <!-- panel heading starts-->
    
<h3 class="panel-title">
    <i class="fa fa-money fa-fw"></i>View Prroducts
</h3> 
   
</div>   <!-- panel heading starts-->

<div class="panel-body"> <!--panel-body starts-->
 
<div class="table-responsive"> <!--table-responsive starts-->
  
<table class="table table-bordered table-hover table-stripped">
    
<thead>
    
<tr>
   <th>Product Id</th>
    <th>Product Title</th>
     <th>Product Image</th>
     <th>Product Price</th>
     <th>Product Quantity</th>
      <th>Product Keywords</th>
       <th>Product Date</th>
        <th>Product Delete</th>
         <th>Product Edit</th>
    
</tr>
    
</thead>
       
 <tbody>
 <?php

require_once('../../Models/clsProducts.php');
$Product = new Product();
$row_pro = $Product->affich_products();

if(!empty($row_pro)) {
    foreach ($row_pro as $row) {


?>
     
     <tr>
         <td>
         <?php echo $row['product_id']; ?>
         </td>
             
         <td>
         <?php echo $row['product_title']; ?>
         </td>
         
         <td><img src="assets/product_images/<?php echo $row['product_img1']; ?>" alt="" width="60" height="60"></td>
         
         <td> 
             
         <?php echo $row['product_price']; ?> $
         </td> 
         <td>
         <?php echo $row['product_quantity']; ?>
         </td>
         
          
         <td>
         <?php echo $row['product_keywords']; ?> 
         </td>
         
         
         <td>
         <?php echo $row['date']; ?>
         </td>
        
         
         <td>
             <a href="/CoursCM_2/ProjetFinal/Controllers/productController.php?action=suppression&delete_product=<?php echo $row['product_id']; ?>">
                 <i class="fa fa-trash-o"> Delete</i>
             </a>
         </td>
         
           <td>
             <a href="index.php?edit_product=<?php echo $row['product_id']; ?>">
                 <i class="fa fa-pencil"> Edit</i>
             </a>
         </td>
         
     </tr>
     
     
     
     <?php }}else {
        echo 'No produit found!';
    }?>
 </tbody>
        
</table>  
    
</div>   <!--table-responsive starts-->
    
</div>    <!--panel-body starts-->
            
</div>  <!-- panel panel-default starts-->
    
</div>   <!-- col-lg-12 starts-->
    
</div><!-- 2nd row starts-->











