 <!--
    - MAIN
  -->

  <main>

    <!--
      - BANNER
    -->

    <div class="banner">

      <div class="container">

        <div class="slider-container has-scrollbar">

          <div class="slider-item">

          <?php

              require_once('C:\xampp\htdocs\CoursCM_2\ProjetFinal\Models\clsSlides.php');
              $Slide = new Slides();
              $row_slide1 = $Slide->affich_slides('LIMIT 1');

              if(!empty($row_slide1)) {
                  foreach ($row_slide1 as $row) {


          ?>

            <img src="/CoursCM_2/ProjetFinal/Views/CRUD/assets/slides_images/<?php echo $row['slide_image']; ?>" alt="women's latest fashion sale" class="banner-img">

          
            

            <div class="banner-content">

              <p class="banner-subtitle">Trending item</p>

              <h2 class="banner-title"><?php echo $row['slide_name']; ?></h2>

              <p class="banner-text">
                starting at &dollar; <b>20</b>.00
              </p>

              <a href="#" class="banner-btn">Shop now</a>

            </div>

          </div>

          <div class="slider-item">
            
          <?php

                  }}
            $row_slide2 = $Slide->affich_slides('LIMIT 1,1');

              if(!empty($row_slide2)) {
                  foreach ($row_slide2 as $row) {


          ?>

            <img src="/CoursCM_2/ProjetFinal/Views/CRUD/assets/slides_images/<?php echo $row['slide_image']; ?>" alt="modern sunglasses" class="banner-img">

            <div class="banner-content">

              <p class="banner-subtitle">Trending accessories</p>

              <h2 class="banner-title"><?php echo $row['slide_name']; ?></h2>

              <p class="banner-text">
                starting at &dollar; <b>15</b>.00
              </p>

              <a href="#" class="banner-btn">Shop now</a>

            </div>

          </div>

          <div class="slider-item">

          <?php

                  }}
            $row_slide3 = $Slide->affich_slides('LIMIT 2,1');

              if(!empty($row_slide3)) {
                  foreach ($row_slide3 as $row) {


          ?>

            <img src="/CoursCM_2/ProjetFinal/Views/CRUD/assets/slides_images/<?php echo $row['slide_image']; ?>" alt="new fashion summer sale" class="banner-img">

            <div class="banner-content">

              <p class="banner-subtitle">Sale Offer</p>

              <h2 class="banner-title"><?php echo $row['slide_name']; ?></h2>

              <p class="banner-text">
                starting at &dollar; <b>29</b>.99
              </p>

              <a href="#" class="banner-btn">Shop now</a>

            </div>

          </div>
          <?php  }} ?>

        </div>

      </div>

    </div>





    <!--
      - CATEGORY
    -->

    <div class="category">

      <div class="container">

        <div class="category-item-container has-scrollbar">

        <?php

            require_once('C:\xampp\htdocs\CoursCM_2\ProjetFinal\Models\clsProductsCat.php');
            $prodCat = new productCat();
            $row_p_cats = $prodCat->affich_p_cats();

            if(!empty($row_p_cats)) {
                foreach ($row_p_cats as $row) {


         ?>

          <div class="category-item">
            <div class="category-img-box">
              <?php if($row['p_cat_title'] == 'DRESS & FROCK'){ ?>
              <img src="/CoursCM_2/ProjetFinal/Views/assets/images/icons/dress.svg" alt="dress & frock" width="30">
              <?php }elseif($row['p_cat_title'] == 'WINTER WEAR'){?>
              <img src="/CoursCM_2/ProjetFinal/Views/assets/images/icons/coat.svg" alt="winter wear" width="30">
              <?php }elseif($row['p_cat_title'] == 'GLASSES & LENS'){?>
              <img src="/CoursCM_2/ProjetFinal/Views/assets/images/icons/glasses.svg" alt="glasses & lens" width="30">
              <?php }elseif($row['p_cat_title'] == 'SHORTS & JEANS'){?>
              <img src="/CoursCM_2/ProjetFinal/Views/assets/images/icons/tee.svg" alt="t-shirts" width="30">
              <?php }elseif($row['p_cat_title'] == 'JACKET'){?>
              <img src="/CoursCM_2/ProjetFinal/Views/assets/images/icons/watch.svg" alt="watch" width="30">
              <?php }elseif($row['p_cat_title'] == 'WATCH'){?>
              <img src="/CoursCM_2/ProjetFinal/Views/assets/images/icons/hat.svg" alt="hat & caps" width="30">
              <?php }?>
            </div>

            <div class="category-content-box">

              <div class="category-content-flex">
                <h3 class="category-item-title"><?php echo $row['p_cat_title']; ?> </h3>

                <p class="category-item-amount"></p>
              </div>

              <a href="#" class="category-btn">Show all</a>

            </div>

          </div>

          <?php }} ?>

          </div>

        </div>

      </div>

    </div>





    <!--
      - PRODUCT
    -->

    <div class="product-container">

      <div class="container">


        <!--
          - SIDEBAR
        -->

        <div class="sidebar  has-scrollbar" data-mobile-menu>

          <div class="sidebar-category">

            <div class="sidebar-top">
              <h2 class="sidebar-title">Category</h2>
            </div>

            <?php

              require_once('C:\xampp\htdocs\CoursCM_2\ProjetFinal\Models\clsCategorie.php');
              $Cat = new Categorie();
              $row_cats = $Cat->affich_cats();

              if(!empty($row_cats)) {
                  foreach ($row_cats as $row) {


            ?>

            <ul class="sidebar-menu-category-list">
                  <li class="sidebar-submenu-category">
                    <a href="/CoursCM_2/ProjetFinal/Views/other_pages/shop.php?cat=<?php echo $row['cat_title'] ?>&cat_id=<?php echo $row['cat_id'] ?>" class="sidebar-submenu-title">
                      <p class="product-name"><?php echo $row['cat_title'] ?></p>
                      <data value="300" class="stock" title="Available Stock"></data>
                    </a>
                  </li>
            </ul>
            <?php }} ?>

          
             
          </div>

          

          <div class="product-showcase">

            <h3 class="showcase-heading">best sellers</h3>

            <div class="showcase-wrapper">

              <div class="showcase-container">
              <?php

                require_once('C:\xampp\htdocs\CoursCM_2\ProjetFinal\Models\clsProducts.php');
                $Product = new Product();
                $aleatoire_product = $row_pro = $Product->affich_products();

                if(!empty($row_pro)) {


                 shuffle($aleatoire_product);
                  $i = 1;
                    foreach ($aleatoire_product as $row) {
                      if ($i > 4) {
                        break;
                      }


                ?>

                <div class="showcase">

                  <a href="/CoursCM_2/ProjetFinal/Views/other_pages/products.php?pro_id=<?php echo $row['product_id']; ?>" class="showcase-img-box">
                    <img src="/CoursCM_2/ProjetFinal/Views/assets/images/products/<?php echo $row['product_img1']; ?>" alt="baby fabric shoes" width="75" height="75"
                      class="showcase-img">
                  </a>

                  <div class="showcase-content">

                    <a href="/CoursCM_2/ProjetFinal/Views/other_pages/products.php?pro_id=<?php echo $row['product_id']; ?>">
                      <h4 class="showcase-title"><?php echo $row['product_title']; ?></h4>
                    </a>

                    <div class="showcase-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                    <div class="price-box">
                      <del>$<?php echo $row['product_keywords']; ?>.00</del>
                      <p class="price">$<?php echo $row['product_price']; ?>.00</p>
                    </div>

                  </div>

                </div>

                <?php $i++; } ?>

              </div>

            </div>

          </div>

        </div>



        <div class="product-box">

          <!--
            - PRODUCT MINIMAL
          -->

          <div class="product-minimal">

            <div class="product-showcase">

              <h2 class="title">New Arrivals</h2>

              <div class="showcase-wrapper has-scrollbar">

                <div class="showcase-container">

                <?php

                    $i = 1;
                      foreach ($row_pro as $row) {
                        if ($i > 4) {
                          break;
                        }


                ?>

                  <div class="showcase">

                    <a href="/CoursCM_2/ProjetFinal/Views/other_pages/products.php?pro_id=<?php echo $row['product_id']; ?>" class="showcase-img-box">
                      <img src="/CoursCM_2/ProjetFinal/Views/assets/images/products/<?php echo $row['product_img1']; ?>" alt="relaxed short full sleeve t-shirt" width="70" class="showcase-img">
                    </a>

                    <div class="showcase-content">

                      <a href="/CoursCM_2/ProjetFinal/Views/other_pages/products.php?pro_id=<?php echo $row['product_id']; ?>">
                        <h4 class="showcase-title"><?php echo $row['product_title']; ?></h4>
                      </a>

                      <a href="/CoursCM_2/ProjetFinal/Views/other_pages/products.php?pro_id=<?php echo $row['product_id']; ?>" class="showcase-category">Clothes</a>

                      <div class="price-box">
                        <p class="price"> $<?php echo $row['product_price']; ?>.00</p>
                        <del>$<?php echo $row['product_keywords']; ?>.00</del>
                      </div>

                    </div>

                    

                  </div>
                  <?php $i++;}?>
                 
                </div>

                <div class="showcase-container">
                  <?php $remaining_products = array_slice($row_pro, 4);
                        $i = 1; 
                        foreach ($remaining_products as $row) { 
                          if ($i > 4) {
                            break;
                          }
                  ?>
                
                  <div class="showcase">
                
                    <a href="/CoursCM_2/ProjetFinal/Views/other_pages/products.php?pro_id=<?php echo $row['product_id']; ?>" class="showcase-img-box">
                      <img src="/CoursCM_2/ProjetFinal/Views/assets/images/products/<?php echo $row['product_img1']; ?>" alt="men yarn fleece full-zip jacket" class="showcase-img"
                        width="70">
                    </a>
                
                    <div class="showcase-content">
                
                      <a href="/CoursCM_2/ProjetFinal/Views/other_pages/products.php?pro_id=<?php echo $row['product_id']; ?>">
                        <h4 class="showcase-title"><?php echo $row['product_title']; ?></h4>
                      </a>
                
                      <a href="/CoursCM_2/ProjetFinal/Views/other_pages/products.php?pro_id=<?php echo $row['product_id']; ?>" class="showcase-category">Winter wear</a>
                
                      <div class="price-box">
                        <p class="price">$<?php echo $row['product_price']; ?>.00</p>
                        <del>$<?php echo $row['product_keywords']; ?>.00</del>
                      </div>
                
                    </div>
                    
                
                  </div>
                  <?php $i++; }?>

                </div>

              </div>

            </div>

            <div class="product-showcase">
            
              <h2 class="title">Trending</h2>
            
              <div class="showcase-wrapper  has-scrollbar">
            
                <div class="showcase-container">
                    <?php $remaining_products = array_slice($remaining_products, 4);
                            $i = 1; 
                            foreach ($remaining_products as $row) { 
                              if ($i > 4) {
                                break;
                              }
                      ?>
                
                  <div class="showcase">
            
                    <a href="/CoursCM_2/ProjetFinal/Views/other_pages/products.php?pro_id=<?php echo $row['product_id']; ?>" class="showcase-img-box">
                      <img src="/CoursCM_2/ProjetFinal/Views/assets/images/products/<?php echo $row['product_img1']; ?>" alt="running & trekking shoes - white" class="showcase-img"
                        width="70">
                    </a>
            
                    <div class="showcase-content">
            
                      <a href="/CoursCM_2/ProjetFinal/Views/other_pages/products.php?pro_id=<?php echo $row['product_id']; ?>">
                        <h4 class="showcase-title"><?php echo $row['product_title']; ?></h4>
                      </a>
            
                      <a href="/CoursCM_2/ProjetFinal/Views/other_pages/products.php?pro_id=<?php echo $row['product_id']; ?>" class="showcase-category">Sports</a>
            
                      <div class="price-box">
                        <p class="price">$<?php echo $row['product_price']; ?>.00</p>
                        <del>$<?php echo $row['product_keywords']; ?>.00</del>
                      </div>
            
                    </div>
            
                  </div>
                  <?php $i++; }?>
            
        
                </div>
            
                <div class="showcase-container">
                      <?php $remaining_products = array_slice($remaining_products, 4);
                            $i = 1; 
                            foreach ($remaining_products as $row) { 
                              if ($i > 4) {
                                break;
                              }
                      ?>
            
                  <div class="showcase">
            
                    <a href="/CoursCM_2/ProjetFinal/Views/other_pages/products.php?pro_id=<?php echo $row['product_id']; ?>" class="showcase-img-box">
                      <img src="/CoursCM_2/ProjetFinal/Views/assets/images/products/<?php echo $row['product_img1']; ?>" alt="air tekking shoes - white" class="showcase-img"
                        width="70">
                    </a>
            
                    <div class="showcase-content">
            
                      <a href="/CoursCM_2/ProjetFinal/Views/other_pages/products.php?pro_id=<?php echo $row['product_id']; ?>">
                        <h4 class="showcase-title"><?php echo $row['product_title']; ?></h4>
                      </a>
            
                      <a href="/CoursCM_2/ProjetFinal/Views/other_pages/products.php?pro_id=<?php echo $row['product_id']; ?>" class="showcase-category">Sports</a>
            
                      <div class="price-box">
                        <p class="price">$<?php echo $row['product_price']; ?>.00</p>
                        <del>$<?php echo $row['product_keywords']; ?>.00</del>
                      </div>
            
                    </div>
            
                  </div>

                  <?php $i++; }?>
            
                </div>
            
              </div>
            
            </div>

            <div class="product-showcase">
            
              <h2 class="title">Top Rated</h2>
            
              <div class="showcase-wrapper  has-scrollbar">
            
                <div class="showcase-container">

                  <?php 
                  $remaining_products = array_slice($remaining_products,4);
                    $i = 1; 
                              foreach ($remaining_products as $row) { 
                                if ($i > 4) {
                                  break;
                                }
                        ?>
            
                  <div class="showcase">
            
                    <a href="/CoursCM_2/ProjetFinal/Views/other_pages/products.php?pro_id=<?php echo $row['product_id']; ?>" class="showcase-img-box">
                      <img src="/CoursCM_2/ProjetFinal/Views/assets/images/products/<?php echo $row['product_img1']; ?>" alt="pocket watch leather pouch" class="showcase-img"
                        width="70">
                    </a>
            
                    <div class="showcase-content">
            
                      <a href="/CoursCM_2/ProjetFinal/Views/other_pages/products.php?pro_id=<?php echo $row['product_id']; ?>">
                        <h4 class="showcase-title"><?php echo $row['product_title']; ?></h4>
                      </a>
            
                      <a href="/CoursCM_2/ProjetFinal/Views/other_pages/products.php?pro_id=<?php echo $row['product_id']; ?>" class="showcase-category">Watches</a>
            
                      <div class="price-box">
                        <p class="price">$<?php echo $row['product_price']; ?>.00</p>
                        <del>$<?php echo $row['product_keywords']; ?>.00</del>
                      </div>
            
                    </div>
            
                  </div>

                  <?php $i++; } ?>
            
                
        
            
                </div>
            
                <div class="showcase-container">
                <?php 
                  $remaining_products = array_slice($remaining_products,4);
                    $i = 1; 
                              foreach ($remaining_products as $row) { 
                                if ($i > 4) {
                                  break;
                                }
                        ?>
            
                  <div class="showcase">
                    <a href="/CoursCM_2/ProjetFinal/Views/other_pages/products.php?pro_id=<?php echo $row['product_id']; ?>" class="showcase-img-box">
                      <img src="/CoursCM_2/ProjetFinal/Views/assets/images/products/<?php echo $row['product_img1']; ?>" alt="platinum zircon classic ring" class="showcase-img"
                        width="70">
                    </a>
            
                    <div class="showcase-content">
            
                      <a href="/CoursCM_2/ProjetFinal/Views/other_pages/products.php?pro_id=<?php echo $row['product_id']; ?>">
                        <h4 class="showcase-title"><?php echo $row['product_title']; ?></h4>
                      </a>
            
                      <a href="/CoursCM_2/ProjetFinal/Views/other_pages/products.php?pro_id=<?php echo $row['product_id']; ?>" class="showcase-category">jewellery</a>
            
                      <div class="price-box">
                        <p class="price">$<?php echo $row['product_price']; ?>.00</p>
                        <del>$<?php echo $row['product_keywords']; ?>.00</del>
                      </div>
            
                    </div>
            
                  </div>
                  <?php $i++; }} ?>
            
                  
            
                </div>
            
              </div>
            
            </div>

          </div>



          <!--
            - PRODUCT FEATURED
          -->

          <div class="product-featured">

            <h2 class="title">Deal of the day</h2>

            <div class="showcase-wrapper has-scrollbar">

            <?php
              $i=1;
              foreach ($aleatoire_product as $row) {
                if($i>2){
                  break;
                }


            ?>

              <div class="showcase-container">

                <div class="showcase">
                  
                  <div class="showcase-banner">
                    <img src="/CoursCM_2/ProjetFinal/Views/assets/images/products/<?php echo $row['product_img1']; ?>" alt="shampoo, conditioner & facewash packs" class="showcase-img">
                  </div>

                  <div class="showcase-content">
                    
                    <div class="showcase-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star-outline"></ion-icon>
                      <ion-icon name="star-outline"></ion-icon>
                    </div>

                    <a href="/CoursCM_2/ProjetFinal/Views/other_pages/products.php?pro_id=<?php echo $row['product_id']; ?>">
                      <h3 class="showcase-title"><?php echo $row['product_title']; ?></h3>
                    </a>

                    <p class="showcase-desc">
                      Lorem ipsum dolor sit amet consectetur Lorem ipsum
                      dolor dolor sit amet consectetur Lorem ipsum dolor
                    </p>

                    <div class="price-box">
                      <p class="price">$<?php echo $row['product_price']; ?>.00</p>

                      <del>$<?php echo $row['product_keywords']; ?>.00</del>
                    </div>

                    <button class="add-cart-btn">add to cart</button>

                    <div class="showcase-status">
                      <div class="wrapper">
                        <p>
                          already sold: <b>20</b>
                        </p>

                        <p>
                          available: <b>40</b>
                        </p>
                      </div>

                      <div class="showcase-status-bar"></div>
                    </div>

                    <div class="countdown-box">

                      <p class="countdown-desc">
                        Hurry Up! Offer ends in:
                      </p>

                      <div class="countdown">

                        <div class="countdown-content">

                          <p class="display-number">360</p>

                          <p class="display-text">Days</p>

                        </div>

                        <div class="countdown-content">
                          <p class="display-number">24</p>
                          <p class="display-text">Hours</p>
                        </div>

                        <div class="countdown-content">
                          <p class="display-number">59</p>
                          <p class="display-text">Min</p>
                        </div>

                        <div class="countdown-content">
                          <p class="display-number">00</p>
                          <p class="display-text">Sec</p>
                        </div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

              <?php $i++; } ?>


            </div>

          </div>



          <!--
            - PRODUCT GRID
          -->

          <div class="product-main">

            <h2 class="title">New Products</h2>

            <div class="product-grid">

            <?php
              $i=1;
              foreach ($aleatoire_product as $row) {
                if($i>12){
                  break;
                }


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

              <?php $i++; } ?>

            </div>

          </div>

        </div>

      </div>

    </div>





    <!--
      - TESTIMONIALS, CTA & SERVICE
    -->

    <div>

      <div class="container">

        <div class="testimonials-box">

          <!--
            - TESTIMONIALS
          -->

          <div class="testimonial">

            <h2 class="title">testimonial</h2>

            <div class="testimonial-card">

              <img src="/CoursCM_2/ProjetFinal/Views/assets/images/testimonial-1.jpg" alt="alan doe" class="testimonial-banner" width="80" height="80">

              <p class="testimonial-name">Alan Doe</p>

              <p class="testimonial-title">CEO & Founder Invision</p>

              <img src="/CoursCM_2/ProjetFinal/Views/assets/images/icons/quotes.svg" alt="quotation" class="quotation-img" width="26">

              <p class="testimonial-desc">
                Lorem ipsum dolor sit amet consectetur Lorem ipsum
                dolor dolor sit amet.
              </p>

            </div>

          </div>



          <!--
            - CTA
          -->

          <div class="cta-container">

            <img src="/CoursCM_2/ProjetFinal/Views/assets/images/cta-banner.jpg" alt="summer collection" class="cta-banner">

            <a href="#" class="cta-content">

              <p class="discount">25% Discount</p>

              <h2 class="cta-title">Summer collection</h2>

              <p class="cta-text">Starting @ $10</p>

              <button class="cta-btn">Shop now</button>

            </a>

          </div>



          <!--
            - SERVICE
          -->

          <div class="service">

            <h2 class="title">Our Services</h2>

            <div class="service-container">

              <a href="#" class="service-item">

                <div class="service-icon">
                  <ion-icon name="boat-outline"></ion-icon>
                </div>

                <div class="service-content">

                  <h3 class="service-title">Worldwide Delivery</h3>
                  <p class="service-desc">For Order Over $100</p>

                </div>

              </a>

              <a href="#" class="service-item">
              
                <div class="service-icon">
                  <ion-icon name="rocket-outline"></ion-icon>
                </div>
              
                <div class="service-content">
              
                  <h3 class="service-title">Next Day delivery</h3>
                  <p class="service-desc">UK Orders Only</p>
              
                </div>
              
              </a>

              <a href="#" class="service-item">
              
                <div class="service-icon">
                  <ion-icon name="call-outline"></ion-icon>
                </div>
              
                <div class="service-content">
              
                  <h3 class="service-title">Best Online Support</h3>
                  <p class="service-desc">Hours: 8AM - 11PM</p>
              
                </div>
              
              </a>

              <a href="#" class="service-item">
              
                <div class="service-icon">
                  <ion-icon name="arrow-undo-outline"></ion-icon>
                </div>
              
                <div class="service-content">
              
                  <h3 class="service-title">Return Policy</h3>
                  <p class="service-desc">Easy & Free Return</p>
              
                </div>
              
              </a>

              <a href="#" class="service-item">
              
                <div class="service-icon">
                  <ion-icon name="ticket-outline"></ion-icon>
                </div>
              
                <div class="service-content">
              
                  <h3 class="service-title">30% money back</h3>
                  <p class="service-desc">For Order Over $100</p>
              
                </div>
              
              </a>

            </div>

          </div>

        </div>

      </div>

    </div>





    <!--
      - BLOG
    -->

    <div class="blog">

      <div class="container">

        <div class="blog-container has-scrollbar">

          <div class="blog-card">

            <a href="#">
              <img src="/CoursCM_2/ProjetFinal/Views/assets/images/blog-1.jpg" alt="Clothes Retail KPIs 2021 Guide for Clothes Executives" width="300" class="blog-banner">
            </a>

            <div class="blog-content">

              <a href="#" class="blog-category">Fashion</a>

              <a href="#">
                <h3 class="blog-title">Clothes Retail KPIs 2021 Guide for Clothes Executives.</h3>
              </a>

              <p class="blog-meta">
                By <cite>Mr Admin</cite> / <time datetime="2022-04-06">Apr 06, 2022</time>
              </p>

            </div>

          </div>

          <div class="blog-card">
          
            <a href="#">
              <img src="/CoursCM_2/ProjetFinal/Views/assets/images/blog-2.jpg" alt="Curbside fashion Trends: How to Win the Pickup Battle."
                class="blog-banner" width="300">
            </a>
          
            <div class="blog-content">
          
              <a href="#" class="blog-category">Clothes</a>
          
              <h3>
                <a href="#" class="blog-title">Curbside fashion Trends: How to Win the Pickup Battle.</a>
              </h3>
          
              <p class="blog-meta">
                By <cite>Mr Robin</cite> / <time datetime="2022-01-18">Jan 18, 2022</time>
              </p>
          
            </div>
          
          </div>

          <div class="blog-card">
          
            <a href="#">
              <img src="/CoursCM_2/ProjetFinal/Views/assets/images/blog-3.jpg" alt="EBT vendors: Claim Your Share of SNAP Online Revenue."
                class="blog-banner" width="300">
            </a>
          
            <div class="blog-content">
          
              <a href="#" class="blog-category">Shoes</a>
          
              <h3>
                <a href="#" class="blog-title">EBT vendors: Claim Your Share of SNAP Online Revenue.</a>
              </h3>
          
              <p class="blog-meta">
                By <cite>Mr Selsa</cite> / <time datetime="2022-02-10">Feb 10, 2022</time>
              </p>
          
            </div>
          
          </div>

          <div class="blog-card">
          
            <a href="#">
              <img src="/CoursCM_2/ProjetFinal/Views/assets/images/blog-4.jpg" alt="Curbside fashion Trends: How to Win the Pickup Battle."
                class="blog-banner" width="300">
            </a>
          
            <div class="blog-content">
          
              <a href="#" class="blog-category">Electronics</a>
          
              <h3>
                <a href="#" class="blog-title">Curbside fashion Trends: How to Win the Pickup Battle.</a>
              </h3>
          
              <p class="blog-meta">
                By <cite>Mr Pawar</cite> / <time datetime="2022-03-15">Mar 15, 2022</time>
              </p>
          
            </div>
          
          </div>

        </div>

      </div>

    </div>

  </main>

  <script>
    // accordion variables
const accordionBtn = document.querySelectorAll('[data-accordion-btn]');
const accordion = document.querySelectorAll('[data-accordion]');

for (let i = 0; i < accordionBtn.length; i++) {

  accordionBtn[i].addEventListener('click', function () {

    const clickedBtn = this.nextElementSibling.classList.contains('active');

    for (let i = 0; i < accordion.length; i++) {

      if (clickedBtn) break;

      if (accordion[i].classList.contains('active')) {

        accordion[i].classList.remove('active');
        accordionBtn[i].classList.remove('active');

      }

    }

    this.nextElementSibling.classList.toggle('active');
    this.classList.toggle('active');

  });

}
  </script>