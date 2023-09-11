<br>
<form action="<?=base_url()?>/admin/save_home_image" method="post" enctype="multipart/form-data">
<div class="container-fluid bg-white p-3">
	<div class="row">
		<div class="col-md-12 mb-3">
			<h3>Home Image</h3>
		</div>
		<div class="col-md-6 mb-3">
			<label>Title</label>
			<input type="text" name="home_image_title" class="form-control" required value="<?=$home_image_det[0]['home_image_title']?>">
		</div>
		<div class="col-md-6 mb-3">
			<label>Sub-Title</label>
			<input type="text" name="home_image_subtitle" class="form-control" required value="<?=$home_image_det[0]['home_image_subtitle']?>">
		</div>
		<div class="col-md-6 mb-3">
			<label>Button Heading</label>
			<input type="text" name="button_heading" class="form-control" required value="<?=$home_image_det[0]['button_heading']?>">
		</div>
		<div class="col-md-6 mb-3">
			<label>Button Link</label>
			<input type="link" name="button_link" class="form-control" required value="<?=$home_image_det[0]['button_link']?>">
		</div>
		<div class="col-md-4 mb-3">
			<label>Home Image</label>
			<input type="file" name="home_image_img" class="form-control" >
		</div>
		<div class="col-md-2 mb-3">
			<img src="<?=base_url()?>uploads/<?=$home_image_det[0]['home_image_img']?>" width="100%">
		</div>


		<div class="col-md-12 text-center ">
			<button class="btn btn-primary">Save Home Image</button>
		</div>

	</div>
</div>
</form>