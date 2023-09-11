<div class="container">
        <!-- HERO SECTION-->
        <section class=" bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-2 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Shop</h1>
              </div>
              <div class="col-lg-6 text-lg-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <div class="container p-0">
            <div class="row">
              <!-- SHOP SIDEBAR-->
              <div class="col-lg-3 order-2 order-lg-1">
                <h5 class="text-uppercase mb-4">Categories</h5>
                <?php
                foreach ($categories as $row)
                {
                ?>
                <a href="<?=base_url()?>user/product_list?cat_id=<?=$row['category_id']?>">
                  <div class="py-2 px-4 <?=$row['category_id']==$_GET['cat_id'] ? 'bg-dark text-white':'bg-light text-dark'?>  mb-3">
                    <strong class="small text-uppercase fw-bold">
                    <?=$row['category_name']?>
                    </strong>
                  </div>
                </a>
                  <?php
                  if($row['category_id']==$_GET['cat_id'])
                  {
                  ?>
                  <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal mb-5">
                    <?php
                    foreach($subcategories as $row2)
                    {
                    ?>
                      <li class="mb-2">
                        <a class="reset-anchor" href="<?=base_url()?>user/product_list?cat_id=<?=$row['category_id']?>&subcat_id=<?=$row2['subcategory_id']?>">
                        <?=$row2['subcategory_name']?>                    
                      </a></li>
                    <?php
                    }
                    ?>
                  </ul>
                  <?php
                  }
                  ?>
                <?php
                }?>
              </div>
              <!-- SHOP LISTING-->
              <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                <div class="row">
                  <!-- PRODUCT-->
                  <?php
                  foreach($products as $row)
                  {
              $iscart=false;
              if(isset($_SESSION['user_tbl_id']))
               {
                 $cart=$this->My_model->select_where("user_cart",['user_tbl_id'=>$_SESSION['user_tbl_id'],'product_id'=>$row['product_id']]);
                 if(isset($cart[0]))
                 {
                  $iscart=true;
                 }
               }
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
                      
                      <?php
                      if($iscart==false)
                      {
                      ?>  
                      <li class="list-inline-item m-0 p-0">
                        <a class="btn btn-sm btn-dark" href="<?=base_url()?>user/add_product_in_cart?product_id=<?=$row['product_id']?>">Add to cart</a>
                      </li>
                      <?php
                      }
                      else
                      {
                        ?>
                        <li class="list-inline-item m-0 p-0">
                        <a class="btn btn-sm btn-light" href="<?=base_url()?>user/cart">Added in Cart</a>
                      </li>
                        <?php
                      }
                      ?>
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
            }?>
                  </div>
                <!-- PAGINATION-->
                <!-- <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center justify-content-lg-end">
                    <li class="page-item mx-1"><a class="page-link" href="#!" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                    <li class="page-item mx-1 active"><a class="page-link" href="#!">1</a></li>
                    <li class="page-item mx-1"><a class="page-link" href="#!">2</a></li>
                    <li class="page-item mx-1"><a class="page-link" href="#!">3</a></li>
                    <li class="page-item ms-1"><a class="page-link" href="#!" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                  </ul>
                </nav> -->
              </div>
            </div>
          </div>
        </section>
      </div>