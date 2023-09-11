<br>
<div class="container-fluid bg-white p-3">
	<div class="row">
		<div class="col-md-12">
			<h5>Order Details</h5>
		</div>
		<div class="col-md-5">
			<div class="border p-3">
				<div class="mb-2" style="line-height: 100%;">
					Name : <br>
					<b><?=$order[0]['fullname']?></b>
				</div>
				<div class="mb-2" style="line-height: 100%;">
						Email : <br>
					<b><?=$order[0]['email']?></b>
				</div>
				<div class="mb-2" style="line-height: 100%;">
					Phone : <br>
					<b><?=$order[0]['phone']?></b>
				</div>
				<div class="mb-2" style="line-height: 100%;">
					Address : <br>
					<b><?=$order[0]['address_line1']?>, <?=$order[0]['address_line2']?> <?=$order[0]['city']?>,
						<?=$order[0]['state']?>,</b>
				</div>
				<div class="mb-2" style="line-height: 100%;">
					Order Id : <br>
					<b>A2ZSHOP<?=$order[0]['order_tbl_id']?></b>
				</div>
				<div class="mb-2" style="line-height: 100%;">
					Total Qty : <br>
					<b><?=$order[0]['ttl_qty']?></b>
				</div>
				<div class="mb-2" style="line-height: 100%;">
					Total Amaount : <br>
					<b><?=$order[0]['order_ttl']?></b>
				</div>
				<div class="mb-2" style="line-height: 100%;">
					Order On : <br>
					<b><?=date('d M Y',strtotime($order[0]['order_date']))?>,  <small><?=$order[0]['order_time']?></small></b>
				</div>
				<div class="mb-2" style="line-height: 100%;">
					Order At : <br>
					<b><?=$order[0]['order_status']?></b>
				</div>
				<hr>
				<div class="mb-2" style="line-height: 100%;">
					Account Username : <br>
					<b><?=$user_det[0]['username']?></b>
				</div>
				<div class="mb-2" style="line-height: 100%;">
					Account Usermobiel : <br>
					<b><?=$user_det[0]['usermobile']?></b>
				</div>
				<div class="mb-2" style="line-height: 100%;">
					Account Useremail : <br>
					<b><?=$user_det[0]['useremail']?></b>
				</div>
			</div>			
		</div>
		<div class="col-md-7">
			<table class="table table-bordered" style=" width: 100%;">
				<tr>
					<th>SN</th>
					<th>Product Name</th>
					<th>Product Rate</th>
					<th>Product Qty</th>
					<th>Product Total</th>
				</tr>
				<?php
				foreach ($order_products as $key =>$row)
				{
				?>
				<tr>
					<td><?=$key +1?></td>
					<td><?=$row['product_name']?></td>
					<td>&#8377; <?=number_format($row['product_price'])?></td>
					<td><?=number_format($row['qty'])?> Qty</td>
					<td>&#8377; <?=number_format($row['product_price']*$row['qty'])?></td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td colspan="3" style="text-align:center;">
						<b>Total :</b>
					</td>
					<td>
						<b><?=$order[0]['ttl_qty']?> Qty</b>
					</td>
					<td>
						<b>&#8377;<?=number_format($order[0]['order_ttl'])?></b>
					</td>
				</tr>
			</table>
			<br>
			<div class="text-right">
				<?php
				if($order[0]['order_status']=='pending')
				{
				?>
				<a href="<?=base_url()?>admin/dispatch_order/<?=$order[0]['order_tbl_id']?>">
					<button class="btn btn-primary">Dispatch Order</button>
				</a>
				<a href="<?=base_url()?>admin/reject_order/<?=$order[0]['order_tbl_id']?>">
					<button class="btn btn-danger">Reject Order</button>
				</a>
				<?php
				}
				if($order[0]['order_status']=='dispatch')
				{
				?>
				<a href="<?=base_url()?>admin/delivered_order/<?=$order[0]['order_tbl_id']?>">
					<button class="btn btn-primary">Delivered Order</button>
				</a>
				<a href="<?=base_url()?>admin/reject_order/<?=$order[0]['order_tbl_id']?>">
					<button class="btn btn-danger">Receive Return Order</button>
				</a>
				<?php
				}
				?>
				
			</div>
		</div>
	</div>
</div>


<?php
echo "<pre>";
// print_r($order);
// print_r($user_det);

	?>