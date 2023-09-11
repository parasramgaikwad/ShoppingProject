<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<form action="<?=base_url()?>user/login_user" method="post" enctype="multipart/form-data">
				<h1>Login</h1>
				<br>
				<b>Enter Mobile : </b>
				<input type="text" name="usermobile" class="form-control">
				<br>
				<b>Enter Password : </b>
				<input type="text" name="userpassword" class="form-control">
				<br>
				<button class="btn btn-primary">Login</button>
				<br>
				<span style=" color: red;">
					<?php
					echo $this->session->flashdata('failed');
					?>
				</span>
			</form>

		</div>
		<div class="col-md-6">
			<form action="<?=base_url()?>user/register_user" method="post" enctype="multipart/form-data">
				<h1>Registration</h1>
				<br>
				<b>Enter Name : </b>
				<input type="text" name="username" class="form-control">
				<br>
				<b>Enter Mobile : </b>
				<input type="text" name="usermobile" class="form-control">
				<br>
				<b>Enter Email : </b>
				<input type="email" name="useremail" class="form-control">
				<br>
				<b>Enter Password : </b>
				<input type="text" name="userpassword" class="form-control">
				<br>
				<button class="btn btn-primary" onclick="return confirm('Registration Successfull')">Register</button>
			</form>

		</div>
	</div>
</div>
<br><br>