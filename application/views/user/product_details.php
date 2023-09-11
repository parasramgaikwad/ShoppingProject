<?php
$imgs=explode("||",$product_det[0]['product_image']);

?>
<section class="py-5">
        <div class="container">
          <div class="row mb-5">
            <div class="col-lg-6">
              <!-- PRODUCT SLIDER-->
              <div class="row m-sm-0">
                <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0 px-xl-2">
                  <div class="swiper product-slider-thumbs">
                    <div class="swiper-wrapper">
                      <?php
                      foreach ($imgs as $row)
                      {
                      ?>
                      <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="<?=base_url()?>uploads/<?=$row?>" alt="..."></div>
                      <?php
                      }
                      ?>
                    </div>
                  </div>
                </div>
                <div class="col-sm-10 order-1 order-sm-2">
                  <div class="swiper product-slider">
                    <div class="swiper-wrapper">
                      <?php
                      foreach ($imgs as $row)
                      {
                      ?>
                      <div class="swiper-slide h-auto" style="background: white;">
                        <a class="glightbox product-view" href="<?=base_url()?>uploads/<?=$row?>" data-gallery="gallery2" data-glightbox="Product item 1">
                          <img class="img-fluid" src="<?=base_url()?>uploads/<?=$row?>" alt="...">
                        </a>
                      </div>
                      <?php
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- PRODUCT DETAILS-->
            <div class="col-lg-6">
              <ul class="list-inline mb-2 text-sm">
                <?php
                for($i=0;$i<$product_det[0]['product_rating'];$i++)
                {
                ?>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <?php
                }
                for($i=$product_det[0]['product_rating'];$i<5;$i++)
                {
                ?>
                <li class="list-inline-item m-0 1"><i class="fas fa-star small "></i></li>
                <?php
                }
                ?>
              </ul>
              <h1><?=$product_det[0]['product_name']?></h1>
              <del class="text-muted lead">&#8377 <?=($product_det[0]['product_dublicate_price'])?>, </del>
              <p class="text-muted lead">&#8377 <?=($product_det[0]['product_price'])?></p>
              <p class="text-sm mb-4">
                <?=$product_det[0]['product_description']?>
              </p>
              <div class="row align-items-stretch mb-4">
                <!-- <div class="col-sm-5 pr-sm-0">
                  <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                    <div class="quantity">
                      <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                      <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                      <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                    </div>
                  </div>
                </div> -->
                <div class="col-sm-3 pl-sm-0"><a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" href="cart.html">Add to cart</a></div>
              </div>
              <!-- <a class="text-dark p-0 mb-4 d-inline-block" href="#!"><i class="far fa-heart me-2"></i>Add to wish list</a><br> -->
              <ul class="list-unstyled small d-inline-block">
                <li class="px-3 py-2 mb-1 bg-white text-muted">
                  <strong class="text-uppercase text-dark">Category:</strong>
                  <a class="reset-anchor ms-2" href="#!">
                  <?=$product_cat[0]['category_name']?>
                  </a>
                </li>
                <li class="px-3 py-2 mb-1 bg-white text-muted">
                  <strong class="text-uppercase text-dark">Sub-Category:</strong>
                  <a class="reset-anchor ms-2" href="#!">
                  <?=$product_subcat[0]['subcategory_name']?>
                  </a>
                </li> 
                <li class="px-3 py-2 mb-1 bg-white text-muted">
                  <strong class="text-uppercase text-dark">Company :</strong>
                  <a class="reset-anchor ms-2" href="#!">
                  <?=$product_det[0]['product_company']?>
                  </a>
                </li>
                <li class="px-3 py-2 mb-1 bg-white text-muted">
                  <strong class="text-uppercase text-dark">Color :</strong>
                  <a class="reset-anchor ms-2" href="#!">
                    <div style="width:20px; height: 20px; border-radius:50% ; background-color: <?=$product_det[0]['product_color']?>; display: inline-block;"></div>
                  </a>
                </li>               
              </ul>
            </div>
          </div>
          <BR><br><br>          
          <!-- RELATED PRODUCTS-->
          <h2 class="h5 text-uppercase mb-4">Related products</h2>
          <div class="row">
            <!-- PRODUCT-->
            <?php
            foreach($related_product as $row)
            {
              $imgs=explode("||",$row['product_image']);
            ?>
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="product text-center">
                <div class="position-relative mb-3">
                  <div class="badge text-white bg-"></div>
                  <a class="d-block" href="<?=base_url()?>user/product_details.?product_id=<?=$row['product_id']?>">
                    <img class="img-fluid w-100" src="<?=base_url()?>uploads/<?=$imgs[0]?>" alt="...">
                  </a>
                  <div class="product-overlay">
                    <ul class="mb-0 list-inline">
                      <!-- <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#!"><i class="far fa-heart"></i></a></li>
 -->                      
                      <li class="list-inline-item m-0 p-0">
                        <a class="btn btn-sm btn-dark" href="cart.html">Add to cart</a>
                      </li>
                      <li class="list-inline-item me-0">
                        <a class="btn btn-sm btn-outline-dark" href="#productView" data-bs-toggle="modal" onclick="show_product(<?=$row['product_id']?>)">
                          <i class="fas fa-expand"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <h6> <a class="reset-anchor" href="<?=base_url()?>user/product_details?product_id=<?=$row['product_id']?>">
                  <?=$row['product_name']?>
                </a></h6>
                <p class="small text-muted">&#8377 <?=number_format($row['product_price'])?></p>
              </div>
            </div>
            <?php
            }
            ?>
            
            
          </div>
        </div>
      </section>