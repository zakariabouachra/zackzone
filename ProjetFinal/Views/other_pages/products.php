<?php 
include('../Partials/Header.php'); 
require_once('C:\xampp\htdocs\CoursCM_2\ProjetFinal\Models\clsProducts.php');
$Product = new Product();
$row_product = $Product->select_product_withId($_GET['pro_id']);
?>



<div class="container">
    <div class="row vertical-gap">
        <div class="col-lg-8">


            <div class="nk-store-product">
                <div class="row vertical-gap">
                    <div class="col-md-6">
                        <!-- START: Product Photos -->
                        <div class="nk-popup-gallery">
                            <div class="nk-gallery-item-box">
                                <a href="/CoursCM_2/ProjetFinal/Views/assets/images/products/<?php echo $row_product['product_img1']; ?>" target="_blank" class="nk-gallery-item" data-size="1200x554">
                                    <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                    <img src="/CoursCM_2/ProjetFinal/Views/assets/images/products/<?php echo $row_product['product_img1']; ?>" alt="img">
                                </a>
                            </div>

                            <div class="nk-gap-1"></div>
                            <div class="row vertical-gap sm-gap">
                                <div class="col-6 col-md-4">
                                    <div class="nk-gallery-item-box">
                                        <a href="/CoursCM_2/ProjetFinal/Views/assets/images/products/<?php echo $row_product['product_img2']; ?>" target="_blank" class="nk-gallery-item"  data-size="622x942" target="_blank">
                                            <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                            <img src="/CoursCM_2/ProjetFinal/Views/assets/images/products/<?php echo $row_product['product_img2']; ?>" alt="img1">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="nk-gallery-item-box">
                                        <a href="/CoursCM_2/ProjetFinal/Views/assets/images/products/<?php echo $row_product['product_img3']; ?>" target="_blank" class="nk-gallery-item" data-size="1920x907">
                                            <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                            <img src="/CoursCM_2/ProjetFinal/Views/assets/images/products/<?php echo $row_product['product_img3']; ?>" alt="img2">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="nk-gallery-item-box">
                                        <a href="/CoursCM_2/ProjetFinal/Views/assets/images/products/<?php echo $row_product['product_img1']; ?>" target="_blank" class="nk-gallery-item" data-size="1500x750" >
                                            <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                            <img src="/CoursCM_2/ProjetFinal/Views/assets/images/products/<?php echo $row_product['product_img1']; ?>" alt="img3">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Product Photos -->
                    </div>
                    <div class="col-md-6">

                        <h2 class="nk-product-title h3"><?php echo $row_product['product_title']; ?> </h2>

                        <div class="nk-product-description">
                            <p><?php echo $row_product['product_desc']; ?> </p>
                        </div>

                        <?php 
                        $image = $row_product['product_img1'];
                        $prix = $row_product['product_price'];
                        $id = $row_product['product_id'];
                        $titre = $row_product['product_title'];
                        ?>
                        <!-- START: Add to Cart -->
                        <div class="nk-gap-2"></div>
                        <form action="\CoursCM_2\ProjetFinal\Controllers\panierController.php?action=insertion" class="nk-product-addtocart" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="titre" value="<?php echo $titre; ?>">
                        <input type="hidden" name="prix" value="<?php echo $prix; ?>">
                        <input type="hidden" name="image" value="<?php echo $image; ?>">
                            <div class="nk-product-price">$<?php echo $row_product['product_price']; ?>.00</div>
                            <div class="nk-gap-1"></div>
                            <div class="input-group">
                                <input type="number" class="form-control" name="qty" value="1" min="1" max="21">
                                <button class="nk-btn nk-btn-rounded nk-btn-color-main-1">Add to Cart</button>
                            </div>
                        </form>
                        <div class="nk-gap-3"></div>
                        <!-- END: Add to Cart -->
                        

                    </div>
                </div>

                <!-- START: Share -->
                <div class="nk-gap-2"></div>
                <div class="nk-post-share">
                    <span class="h5">Share Product:</span>
                    <ul class="nk-social-links-2">
                        <li><span class="nk-social-facebook" title="Share page on Facebook" data-share="facebook"><span class="fab fa-facebook"></span></span></li>
                        <li><span class="nk-social-google-plus" title="Share page on Google+" data-share="google-plus"><span class="fab fa-google-plus"></span></span></li>
                        <li><span class="nk-social-twitter" title="Share page on Twitter" data-share="twitter"><span class="fab fa-twitter"></span></span></li>
                        <li><span class="nk-social-pinterest" title="Share page on Pinterest" data-share="pinterest"><span class="fab fa-pinterest-p"></span></span></li>

                        <!-- Additional Share Buttons
                            <li><span class="nk-social-linkedin" title="Share page on LinkedIn" data-share="linkedin"><span class="fab fa-linkedin"></span></span></li>
                            <li><span class="nk-social-vk" title="Share page on VK" data-share="vk"><span class="fab fa-vk"></span></span></li>
                        -->
                    </ul>
                </div>
                <!-- END: Share -->

                <div class="nk-gap-2"></div>
                <!-- START: Tabs -->
                
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../Partials/Footer.php');?>

