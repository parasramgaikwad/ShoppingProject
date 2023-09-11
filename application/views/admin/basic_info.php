<br>
<form action="<?=base_url()?>/admin/save_basic_information" method="post" enctype="multipart/form-data">
<div class="container-fluid bg-white p-3">
	<div class="row">
		<div class="col-md-12 mb-3">
			<h3>Basic Company Information</h3>
		</div>
		<div class="col-md-6 mb-3">
			<label>Company Name</label>
			<input type="text" name="company_name" class="form-control" required value="<?=$company_det[0]['company_name']?>">
		</div>
		<div class="col-md-4 mb-3">
			<label>Company Logo</label>
			<input type="file" name="company_logo" class="form-control" >
		</div>
		<div class="col-md-2 mb-3">
			<img src="<?=base_url()?>uploads/<?=$company_det[0]['company_logo']?>" width="100%" height="100px">
		</div>
		<div class="col-md-6 mb-3">
			<label>Company Mobile</label>
			<input type="text" name="company_mobile" class="form-control" required value="<?=$company_det[0]['company_mobile']?>">
		</div>
		<div class="col-md-6 mb-3">
			<label>Company Email</label>
			<input type="email" name="company_email" class="form-control" required value="<?=$company_det[0]['company_email']?>">
		</div>
		<div class="col-md-3 mb-3">
			<label>Twitter Link</label>
			<input type="link" name="twitter_link" class="form-control" value="<?=$company_det[0]['twitter_link']?>" >
		</div>
		<div class="col-md-3 mb-3">
			<label>Facebook Link </label>
			<input type="link" name="facebook_link" class="form-control" value="<?=$company_det[0]['facebook_link']?>" >
		</div>
		<div class="col-md-3 mb-3">
			<label> Instagram Link</label>
			<input type="link" name="instagram_link" class="form-control" value="<?=$company_det[0]['instagram_link']?>" >
		</div>
		<div class="col-md-3 mb-3">
			<label>Linkedin Link</label>
			<input type="link" name="linkedin_link" class="form-control" value="<?=$company_det[0]['linkedin_link']?>" >
		</div>
		<div class="col-md-12 mb-3">
			<label>Address</label>
			<textarea class="form-control" name="company_address"><?=$company_det[0]['company_address']?></textarea>
		</div>
		<div class="col-md-12 text-center ">
			<button class="btn btn-primary">Save Basic Information</button>
		</div>

	</div>
</div>
</form>