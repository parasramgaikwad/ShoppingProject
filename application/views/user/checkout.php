<div class="container">
        <!-- HERO SECTION-->
        <section class="py-2 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Checkout</h1>
              </div>
              <div class="col-lg-6 text-lg-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="<?=base_url()?>">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-dark" href="<?=base_url()?>user/cart">Cart</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <!-- BILLING ADDRESS-->
          <h2 class="h5 text-uppercase mb-4">Billing details</h2>
          <div class="row">
            <div class="col-lg-8">
              <form action="<?=base_url()?>user/place_order" method="post" enctype="multipart/form-data">
                <div class="row gy-3">
                  <div class="col-lg-12">
                    <label class="form-label text-sm text-uppercase" for="fullname">Full Name </label>
                    <input class="form-control form-control-lg" type="text" name="fullname" id="firstName" placeholder="Enter your full name" value="<?=$user_det['username']?>">
                  </div>
                  <div class="col-lg-6">
                    <label class="form-label text-sm text-uppercase" for="email">Email address </label>
                    <input class="form-control form-control-lg" type="email" id="email" placeholder="e.g. Jason@example.com" name="email" value="<?=$user_det['useremail']?>">
                  </div>
                  <div class="col-lg-6">
                    <label class="form-label text-sm text-uppercase" for="phone">Phone number </label>
                    <input class="form-control form-control-lg" type="tel" id="phone" placeholder="e.g. +02 245354745" value="<?=$user_det['usermobile']?>" name="phone">
                  </div>
                  <div class="col-lg-12">
                    <label class="form-label text-sm text-uppercase" for="address">Address line 1 </label>
                    <input class="form-control form-control-lg" type="text" id="address" placeholder="House number and street name" name="address_line1">
                  </div>
                  <div class="col-lg-12">
                    <label class="form-label text-sm text-uppercase" for="addressalt">Address line 2 </label>
                    <input class="form-control form-control-lg" type="text" id="addressalt" placeholder="Apartment, Suite, Unit, etc (optional)" name="address_line2">
                  </div>
                  <div class="col-lg-6">
                    <label class="form-label text-sm text-uppercase" for="city">Town/City </label>
                    <input class="form-control form-control-lg" type="text" id="city" name="city">
                  </div>
                  <div class="col-lg-6">
                    <label class="form-label text-sm text-uppercase" for="state">State </label>
                    <input class="form-control form-control-lg" type="text" id="state" name="state">
                  </div>
                  <div class="col-lg-12 form-group">
                    <button class="btn btn-dark" type="submit">Place order</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- ORDER SUMMARY-->
            <div class="col-lg-4">
              <div class="card border-0 rounded-0 p-lg-4 bg-light">
                <div class="card-body">
                  <h5 class="text-uppercase mb-4">Your order</h5>
                  <ul class="list-unstyled mb-0">
                    <?php
                    $ttl=0;
                    foreach ($products as $row){
                    ?>
                    <li class="d-flex align-items-center justify-content-between pt-0 pb-0"><strong class="small fw-bold"><?=$row['product_name']?></strong>
                      <span class="text-muted small">&#8377; <?=number_format($row['qty']*$row['product_price'])?></span></li><hr>
                    <?php
                    $ttl=$ttl+($row['qty']*$row['product_price']);
                    }
                    ?>
                    <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small fw-bold">Total</strong><span>&#8377; <?=number_format($ttl)?></span></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>