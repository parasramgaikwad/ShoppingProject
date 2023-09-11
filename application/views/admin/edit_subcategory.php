<br>
<form action="<?=base_url()?>admin/save_updated_subcategory" method="post" enctype="multipart/form-data">
	<input type="hidden" name="subcategory_id" value="<?=$subcategory_det[0]['subcategory_id']?>">
	<div class="container-fluid bg-white p-3">
		<div class="row">
			<div class="col-md-12">
				<h3> Update Sub-Category</h3>
			</div>
			<div class="col-md-3 mb-3">
				<label>Select Category</label>
				<select class="form-control" name="category_id" required>
					<option></option>
					<?php
					foreach ($category as $row)
					{
					?>
						<option value="<?=$row['category_id']?>"
							<?=($row['category_id']==$subcategory_det[0]['category_id']) ? 'selected':''?>>
							<?=$row['category_name']?>
						</option>
					<?php
					}
					?>
				</select>
			</div>
			<div class="col-md-4 mb-3">
				<label>Sub-Category Name</label>
				<input type="text" name="subcategory_name" class="form-control" value="<?=$subcategory_det[0]['subcategory_name']?>">
			</div>
			<div class="col-md-3 mb-3">
				<label>Sub-Category Image</label>
				<input type="file" name="subcategory_image" class="form-control">
			</div>
			<div class="col-md-2 mb-3">
				<img src="<?=base_url()?>uploads/<?=$subcategory_det[0]['subcategory_image']?>" width="100px">
			</div>
			<div class="col-md-12 mb-3">
				<label>Sub-Category Details</label>
				<textarea name="subcategory_details" class="form-control">
					<?=$subcategory_det[0]['subcategory_details']?>
				</textarea>
			</div>
			<div class="col-md-12 mb-3 text-right">
				<button class="btn btn-primary">Save Sub-Category</button>
			</div>
		</div>
	</div>
</form>