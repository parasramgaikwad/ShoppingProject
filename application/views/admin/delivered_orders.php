<div class="container-fluid bg-white p-3">
	<div class="row">
		<div class="col-md-12">
			<h3>Delivered Orders</h3>
			<table class="table table-bordered table-sm">
				<tr>
					<th></th>
					<th>SN</th>
					<th>User Name</th>
					<th width="40%">Order Address</th>
					<th>Order Amount</th>
					<th>Order Qty</th>
				</tr>
				<?php
				foreach ($orders as $key => $row)
				{
				?>
				<tr>
					<td width="1%" style="white-space:nowrap;">
					
						<a href="<?=base_url()?>admin/view_order/<?=$row['order_tbl_id']?>">
						<button class="btn btn-info p-0 pl-1 pr-1">View</button>
					</a>
					
					</td>
					<td><?=$key + 1?></td>
					<td><?=$row['fullname']?></td>
					<td><?=$row['address_line1']?>, <?=$row['address_line2']?>, <?=$row['city']?>, <?=$row['state']?></td>
					<td>&#8377; <?=number_format($row['order_ttl'])?></td>
					<td><?=number_format($row['ttl_qty'])?></td>
				</tr>
				<?php
				}
				if(count($orders)==0)
				{
				?>
					<tr>
						<td colspan="6">
							<br><br>
							<h3 class="text-center">No Record Found</h3>
							<br><br>

						</td>
					</tr>
				<?php
				}
				?>
			</table>
		</div>
	</div>
</div>