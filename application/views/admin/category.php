<br>
<form action="<?=base_url()?>admin/save_category" method="post" enctype="multipart/form-data">
<div class="container-fluid p-2 bg-white">
	<div class="row">
		<div class="col-md-12 mb-3">
			<h3 class="p-0 m-0 ">Add New Category</h3>
		</div>
		<div class="col-md-3 mb-3">
			<label>Category Name</label>
			<input type="text" name="category_name" class="form-control">
		</div>
		<div class="col-md-3 mb-3">
			<label>Category Image</label>
			<input type="file" name="category_image" class="form-control">
		</div>
		<div class="col-md-6 mb-3">
			<label>Category Details</label>
			<textarea name="category_details" class="form-control" rows="1"></textarea>
		</div>
		<div class="col-md-12 text-center">
			<button class="btn btn-primary">Add Category</button>
		</div>

	</div>
</div>
</form>

<div class="container-fluid bg-white p-3">
	<table class="table table-bordered "> 
		<tr>
			<th width="1%"></th>
			<th>SN</th>
			<th>Category Name</th>
			<th>Category Details</th>
			<th>Category Image</th>
		</tr>
		<?php
		foreach ($category_list as $key => $row)
		{
		?>
		<tr>
			<td style="white-space: nowrap;">
				<a href="<?=base_url()?>admin/edit_category/<?=$row['category_id']?>">
					<button class="btn btn-primary btn-sm p-0 pl-1 pr-1">
						<i class="fa fa-edit"></i>
					</button>
				</a>
				<a href="<?=base_url()?>admin/delete_category/<?=$row['category_id']?>">
					<button class="btn btn-danger btn-sm p-0 pl-1 pr-1">
						<i class="fa fa-trash"></i>
					</button>
				</a>
			</td>
			<td><?=$key+1?></td>
			<td><?=$row['category_name']?></td>
			<td><?=$row['category_details']?></td>
			<td>
				<img src="<?=base_url()?>uploads/<?=$row['category_image']?>" width="200px" height="200px">
				
			</td>
		</tr>
		<?php
		}
		?>
	</table>
</div>



