<br>
<form action="<?=base_url()?>admin/save_updated_category" method="post" enctype="multipart/form-data">
	<input type="hidden" name="category_id" value="<?=$category_det[0]['category_id']?>">
<div class="container-fluid p-2 bg-white">
	<div class="row">
		<div class="col-md-12 mb-3">
			<h3 class="p-0 m-0 ">Add Update New Category</h3>
		</div>
		<div class="col-md-6 mb-3">
			<label>Category Name</label>
			<input type="text" name="category_name" class="form-control" value="<?=$category_det[0]['category_name']?>">
		</div>
		<div class="col-md-4 mb-3">
			<label>Category Image</label>
			<input type="file" name="category_image" class="form-control">
		</div>
		<div class="col-md-2 mb-3">
			<img src="<?=base_url()?>uploads/<?=$category_det[0]['category_image']?>" width="100px">
		</div>

		<div class="col-md-12 mb-3">
			<label>Category Details</label>
			<textarea name="category_details" class="form-control" rows="1">
				<?=$category_det[0]['category_details']?>
			</textarea>
		</div>
		<div class="col-md-12 text-center">
			<button class="btn btn-primary">Update Category</button>
		</div>

	</div>
</div>
</form>
<?php
	echo "<pre>";
	print_r($category_det);
?>