<br>
<form action="<?=base_url()?>admin/save_update_product" method="post" enctype="multipart/form-data">
	<input type="hidden" name="product_id" value="<?=$product[0]['product_id']?>">
<div class="container-fluid bg-white p-3">
	<div class="row">
		<div class="col-md-12 mb-3">
			<h3>Add New Product</h3>
		</div>
		<div class="col-md-3 mb-3">
			<label>Select Category</label>
			<select class="form-control" name="category_id" required onchange="getSubcategory(this)">
				<option></option>
				<?php
				foreach ($category as $key=>$row)
				{
				?>
				<option value="<?=$row['category_id']?>" 
					<?=$row['category_id']==$product[0]['category_id'] ? 'selected':''?> >
					<?=$row['category_name']?>
				</option>
				<?php
				}
				?>
			</select>
		</div>
		<div class="col-md-3 mb-3">
			<label>Select Sub-Category</label>
			<select class="form-control" name="subcategory_id" id="subcategory_id" required>
				<option value=""></option>
				<?php
				foreach ($subcategory as $key=>$row)
				{
				?>
				<option value="<?=$row['subcategory_id']?>" 
					<?=$row['subcategory_id']==$product[0]['subcategory_id'] ? 'selected':''?> >
					<?=$row['subcategory_name']?>
				</option>
				<?php
				}
				?>
			</select>
		</div>
		<div class="col-md-6 mb-3">
			<label>Product Name</label>
			<input type="text" name="product_name" class="form-control" placeholder="Enter Product Name" value="<?=$product[0]['product_name']?>">
		</div>
		<div class="col-md-3 mb-3">
			<label>Original Price</label>
			<input type="number" name="product_price" class="form-control"
			value="<?=$product[0]['product_price']?>">
		</div>
		<div class="col-md-3 mb-3">
			<label>Dublicate Price</label>
			<input type="number" name="product_dublicate_price" class="form-control" value="<?=$product[0]['product_dublicate_price']?>">
		</div>
		<div class="col-md-6 mb-3">
			<label>Add Product Image</label>
			<input type="file" name="product_image[]" class="form-control" multiple>
		</div>
		<div class="col-md-6 mb-3">
			<label>Product Company</label>
			<input type="text" name="product_company" class="form-control"
			value="<?=$product[0]['product_company']?>">
		</div>
		<div class="col-md-2 mb-3">
			<label>Product Color</label>
			<input type="color" name="product_color" class="form-control"
			value="<?=$product[0]['product_color']?>">
		</div>
		<div class="col-md-4 mb-3">
			<label>Product Rating (<span id="product_rating_span"><?=$product[0]['product_rating']?> Star</span>)</label>
			<input type="range" name="product_rating" step="0.5" value="<?=$product[0]['product_rating']?>" min="1" max="5" class="form-control" onchange="product_rating_span.innerHTML=this.value+' Star'">
		</div>
		<div class="col-md-12 mb-3">
			<label>Product Description</label>
			<textarea name="product_description" class="form-control"><?=$product[0]['product_description']?></textarea>
		</div>
		<div class="col-md-12 mb-3 text-center">
			<button class="btn btn-primary">Save Updated Product</button>
		</div>
	</div>
	<div class="row">
		<?php
		$imgs=explode("||",$product[0]['product_image']);
		foreach($imgs as $key=>$row){
		?>
		<div class="col-md-3">
			<img src="<?=base_url()?>uploads/<?=$row?>" width="100%" class="mb-3"><br>
			<a href="<?=base_url()?>admin/deleted_product_image/<?=$product[0]['product_id']?>/<?=$key?>" class="btn btn-danger">
				<i class="fa fa-trash"></i>
			</a>

		</div>
		<?php
		}
		?>
	</div>
</div>
</form>


<script type="text/javascript">
	function getSubcategory(cat)
	{
		// alert(cat.value);
		$.ajax({
			url:  '<?=base_url()?>admin/getsubcategory_by_ajax',
			type: 'POST',
			dataType: 'json',
			data: {'category_id': cat.value},
		})
		.done(function(res){
			// console.log(res);
			var opt="<option value=''></option>";
			for(i=0;i<res.length;i++)
			{
				opt=opt+`<option value='${res[i].subcategory_id}'>${res[i].subcategory_name}</option>`;
			}
			console.log(opt);
			document.getElementById('subcategory_id').innerHTML=opt;

		});
		

	}
</script>