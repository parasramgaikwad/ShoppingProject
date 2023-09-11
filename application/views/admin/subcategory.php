<br>
<form action="<?=base_url()?>admin/save_subcategory" method="post" enctype="multipart/form-data">
	<div class="container-fluid bg-white p-3">
		<div class="row">
			<div class="col-md-12">
				<h3>Add New Sub-Category</h3>
			</div>
			<div class="col-md-3 mb-3">
				<label>Select Category</label>
				<select class="form-control" name="category_id" required>
					<option></option>
					<?php
					foreach ($category as $row)
					{
					?>
						<option value="<?=$row['category_id']?>">
							<?=$row['category_name']?>
						</option>
					<?php
					}
					?>
				</select>
			</div>
			<div class="col-md-6 mb-3">
				<label>Sub-Category Name</label>
				<input type="text" name="subcategory_name" class="form-control">
			</div>
			<div class="col-md-3 mb-3">
				<label>Sub-Category Image</label>
				<input type="file" name="subcategory_image" class="form-control">
			</div>
			<div class="col-md-12 mb-3">
				<label>Sub-Category Details</label>
				<textarea name="subcategory_details" class="form-control"></textarea>
			</div>
			<div class="col-md-12 mb-3 text-right">
				<button class="btn btn-primary">Save Sub-Category</button>
			</div>
		</div>
	</div>
</form>
<br> <br>

<div class="container-fluid bg-white p-3">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-hover table-sm ">
				<tr>
					<th width="1%"></th>
					<th>SN</th>
					<th>Category</th>
					<th>Sub-Category</th>
					<th>Sub-Category Details</th>
					<th>Sub-Category Image</th>
				</tr>
				<?php
				foreach ($subcategory as $key=>$row)
				{
				?>
				<tr>
					<td>
						<a href="<?=base_url()?>admin/edit_subcategory/<?=$row['subcategory_id']?>" class="btn btn-primary 			btn-sm p-0 pl-1 pr-1">
							<i class="fa fa-edit"></i>
						</a>
					</td>
					<td><?=$key+1?></td>
					<td><?=$row['category_name']?></td>
					<td><?=$row['subcategory_name']?></td>
					<td><?=$row['subcategory_details']?></td>
					<td>
						<img src="<?=base_url()?>uploads/<?=$row['subcategory_image']?>" width="100px">
					</td>
				</tr>
				<?php
				}
				?>
			</table>
		</div>
	</div>
</div>










