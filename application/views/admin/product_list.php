<div class="container-fluid bg-white">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-sm table-hover bg-white">
				<tr>
					<th width="1%"></th>
					<th>SN</th>
					<th>Name</th>
					<th>Price</th>
					<th>Category</th>
					<th>Sub-Category</th>
					<th>Image</th>
				</tr>
				<?php
				foreach($product as $key => $row)
				{
				?>
				<tr>
					<td>
						<a href="<?=base_url()?>admin/edit_product/<?=$row['product_id']?>" class="btn btn-primary p-0 pl-1 pr-1">
							<i class="fa fa-edit"></i>
						</a>
					</td>
					<td><?=$key+1?></td>
					<td><?=$row['product_name']?></td>
					<td><?=$row['product_price']?></td>
					<td><?=$row['category_name']?></td>
					<td><?=$row['subcategory_name']?></td>
					<td>
						<img src="<?=base_url()?>uploads/<?=explode("||",$row['product_image'])[0]?>" width="100px">
					</td>
				</tr>
				<?php
				}
				?>
			</table>
		</div>
	</div>
</div>