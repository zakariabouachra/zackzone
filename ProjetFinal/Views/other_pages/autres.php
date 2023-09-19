<div class="product-main">

<div class="product-grid">

<?php

require_once('C:\xampp\htdocs\CoursCM_2\ProjetFinal\Models\clsProducts.php');
$product = new Product();
$row_pro = $product->select_product_withCatID($_GET['cat_id']);

if(!empty($row_pro)) {
  foreach ($row_pro as $row) {



?>      

  <div class="showcase">

    <div class="showcase-banner">

      <img src="/CoursCM_2/ProjetFinal/Views/assets/images/products/<?php echo $row['product_img1']; ?>" alt="Mens Winter Leathers Jackets" width="300" class="product-img">
    
      <div class="showcase-actions">

        <a href="/CoursCM_2/ProjetFinal/Views/other_pages/products.php?pro_id=<?php echo $row['product_id']; ?>" class="btn-action">
          <ion-icon name="eye-outline"></ion-icon>
        </a>
      </div>

    </div>

    <div class="showcase-content">


      <a href="/CoursCM_2/ProjetFinal/Views/other_pages/products.php?pro_id=<?php echo $row['product_id']; ?>">
        <h3 class="showcase-title"><?php echo $row['product_title']; ?></h3>
      </a>

      <div class="showcase-rating">
        <ion-icon name="star"></ion-icon>
        <ion-icon name="star"></ion-icon>
        <ion-icon name="star"></ion-icon>
        <ion-icon name="star-outline"></ion-icon>
        <ion-icon name="star-outline"></ion-icon>
      </div>

      <div class="price-box">
        <p class="price">$<?php echo $row['product_price']; ?>.00</p>
        <del>$<?php echo $row['product_keywords']; ?>.00</del>
      </div>

    </div>

  </div>
  <?php }} ?>

</div>
</div>