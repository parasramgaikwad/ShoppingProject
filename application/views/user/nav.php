<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$base_info[0]['company_name']?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- gLightbox gallery-->
    <link rel="stylesheet" href="<?=base_url()?>assest/vendor/glightbox/css/glightbox.min.css">
    <!-- Range slider-->
    <link rel="stylesheet" href="<?=base_url()?>assest/vendor/nouislider/nouislider.min.css">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="<?=base_url()?>assest/vendor/choices.js/public/assets/styles/choices.min.css">
    <!-- Swiper slider-->
    <link rel="stylesheet" href="<?=base_url()?>assest/vendor/swiper/swiper-bundle.min.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?=base_url()?>assest/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?=base_url()?>assest/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?=base_url()?>uploads/<?=$base_info[0]['company_logo']?>">
  </head>


  <body>
    <div class="page-holder">
      <!-- navbar-->
      <header class="header bg-white">
        <div class="container px-lg-3">
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="<?=base_url()?>"><span class="fw-bold text-uppercase text-dark"><?=$base_info[0]['company_name']?></span></a>
            <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto">
                <?php
                foreach ($category as $row)
                {
                ?>
                <li class="nav-item">
                  <a class="nav-link " href="<?=base_url()?>user/product_list?cat_id=<?=$row['category_id']?>">
                    <?=$row['category_name']?></a>
                </li>
                <?php
                }
                ?>
              </ul>
              <ul class="navbar-nav ms-auto">  
              <?php
              if (isset($_SESSION['user_tbl_id']))
              {
              ?>             
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url()?>user/cart">
                   <i class="fas fa-dolly-flatbed me-1 text-gray"></i>Cart</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url()?>user/logout"  onclick="return confirm('Are You Sure ?')">
                   <i class="fas fa-user me-1 text-gray"></i>Logout</a>
                </li>
              <?php
              }
              else
              {
              ?>
                <li class="nav-item"><a class="nav-link" href="<?=base_url()?>user/login"> <i class="fas fa-user me-1 text-gray fw-normal"></i>Login</a></li>
              <?php
              }
              ?>
              </ul>
            </div>
          </nav>
        </div>
      </header>
      <!--  Modal -->
      <div class="modal fade" id="productView" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content overflow-hidden border-0" id="productViewContent"></div>
        </div>
      </div>
