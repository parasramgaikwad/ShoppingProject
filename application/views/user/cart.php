<div class="container">
        <!-- HERO SECTION-->
<section class="py-2 bg-light">
 <div class="container">
  <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
   <div class="col-lg-6">
    <h1 class="h2 text-uppercase mb-0">Cart</h1>
   </div>
    <div class="col-lg-6 text-lg-end">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
          <li class="breadcrumb-item"><a class="text-dark" href="index.html"> Home</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
      </nav>
    </div>
  </div>
  </div>
</section>
        <section class="py-5">
          <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
          <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
              <!-- CART TABLE-->
              <div class="table-responsive mb-4">
                <table class="table text-nowrap">
                  <thead class="bg-light">
                    <tr>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Product</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Price</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Quantity</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Total</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase"></strong></th>
                    </tr>
                  </thead>
                  <tbody class="border-0">
                    <?php
                    $ttl=0;
                    foreach ($cart_products as $row)
                    {
                      $imgs=explode("||",$row['product_image']);
                    ?>
                    <tr>
                      <th class="ps-0 py-3 border-light" scope="row">
                        <div class="d-flex align-items-center"><a class="reset-anchor d-block animsition-link" href="<?=base_url()?>user/product_details?product_id=<?=$row['product_id']?>"><img src="<?=base_url()?>uploads/<?=$imgs[0]?>" alt="..." width="70"/></a>
                          <div class="ms-3"><strong class="h6"><a class="reset-anchor animsition-link" href="<?=base_url()?>user/product_details?product_id=<?=$row['product_id']?>"><?=$row['product_name']?></a></strong></div>
                        </div>
                      </th>
                      <td class="p-3 align-middle border-light">
                        <p class="mb-0 small">&#8377;<?=number_format($row['product_price'])?>
                          <input type="hidden" id="product_price<?=$row['user_cart_id']?>" value="<?=$row['product_price']?>">
                        </p>
                      </td>
                      <td class="p-3 align-middle border-light">
                        <div class=" border d-inline-block">
                            <button class="btn btn-sm" onclick="change_qty(<?=$row['user_cart_id']?>,'DEC')">
                              <i class="fas fa-caret-left"></i>
                            </button>
                            <input class="border-0 shadow-0 p-0" readonly style="width:50px; text-align: center;" type="text" value="<?=$row['qty']?>" id="qtybox<?=$row['user_cart_id']?>">
                            <button class="btn btn-sm" onclick="change_qty(<?=$row['user_cart_id']?>,'INC')">
                              <i class="fas fa-caret-right"></i>
                            </button>
                          </div>
                      </td>
                      <td class="p-3 align-middle border-light">
                        <p class="mb-0 small" id="product_total_p<?=$row['user_cart_id']?>">
                          &#8377; <?=number_format($row['product_price']*$row['qty'])?>
                        </p>
                        <input type="hidden" class="product_total"id="product_total<?=$row['user_cart_id']?>" value="<?=number_format($row['product_price']*$row['qty'])?>">
                      </td>
                      <td class="p-3 align-middle border-light"><a class="reset-anchor" href="<?=base_url()?>user/remove_product_from_cart?cart_id=<?=$row['user_cart_id']?>">
                        <i class="fas fa-trash-alt small text-muted"></i></a></td>
                    </tr>
                    <?php
                    $ttl=$ttl+($row['product_price']*$row['qty']);
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- CART NAV-->
              <div class="bg-light px-4 py-3">
                <div class="row align-items-center text-center">
                  <div class="col-md-6 mb-3 mb-md-0 text-md-start">
                    <a class="btn btn-link p-0 text-dark btn-sm" href="<?=base_url()?>"><i class="fas fa-long-arrow-alt-left me-2"> </i>Continue shopping</a></div>
                  <div class="col-md-6 text-md-end">
                    <a class="btn btn-outline-dark btn-sm" href="<?=base_url()?>user/checkout">Procceed to checkout<i class="fas fa-long-arrow-alt-right ms-2"></i></a></div>
                </div>
              </div>
            </div>
            <!-- ORDER TOTAL-->
            <div class="col-lg-4">
              <div class="card border-0 rounded-0 p-lg-4 bg-light">
                <div class="card-body">
                  <h5 class="text-uppercase mb-4">Cart total</h5>
                  <ul class="list-unstyled mb-0">
                    <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Subtotal</strong>
                      <span class="text-muted small" id="subtotal">&#8377;<?=number_format($ttl)?></span></li>
                    <li class="border-bottom my-2"></li>
                    <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">Total</strong>
                    <span id="alltotal">&#8377;<?=number_format($ttl)?></span></li>
                    
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>


<script type="text/javascript">
  function change_qty(user_cart_id,type)
  {
      $.ajax({
        url: '<?=base_url()?>user/change_cart_qty',
        type: 'POST',
        dataType: 'json',
        data: {user_cart_id:user_cart_id, type:type}
      })
      .done(function(res)
      {
        console.log(res.qty);
        document.getElementById("qtybox"+user_cart_id).value=res.qty;

        var current_pp=document.getElementById("product_price"+user_cart_id).value;
        product_ttl=current_pp*res.qty;
        // alert(product_ttl);
        document.getElementById("product_total"+user_cart_id).value=product_ttl;
        document.getElementById("product_total_p"+user_cart_id).innerHTML="&#8377;"+product_ttl;

       var pt= document.getElementsByClassName("product_total");
        ttl1=0;
        for(i=1;i<pt.length;i++)
        {
          ttl1=ttl1+Number(pt[i].value);
        }
        document.getElementById("subtotal").innerHTML="&#8377; "+ttl1;
        document.getElementById("alltotal").innerHTML="&#8377; "+ttl1;
      })
  }
</script>






