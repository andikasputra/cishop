<?php $this->load->view('layout/header', $header) ?>
<div class="container">
	<div class="login">
		<form action="<?= site_url('auth/register_process') ?>" method="post">
			<div class="col-md-6 login-do">
				<div class="login-mail">
					<input type="text" placeholder="Username" name="user_name" required="">
					<i  class="glyphicon glyphicon-user"></i>
				</div>
				<div class="login-mail">
					<input type="text" placeholder="Full Name" name="user_alias" required="">
					<i  class="glyphicon glyphicon-user"></i>
				</div>
				<div class="login-mail">
					<input type="text" placeholder="Email" name="user_email" required="">
					<i  class="glyphicon glyphicon-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" placeholder="Password" name="user_password" required="">
					<i class="glyphicon glyphicon-lock"></i>
				</div>
				<label class="hvr-skew-backward">
					<input type="submit" value="Submit">
				</label>

			</div>
			<div class="col-md-6 login-right">
				<h3>Completely Free Account</h3>

				<p>Pellentesque neque leo, dictum sit amet accumsan non, dignissim ac mauris. Mauris rhoncus, lectus tincidunt tempus aliquam, odio 
				libero tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
				<a href="<?= site_url('auth/login') ?>" class="hvr-skew-backward">Login</a>

			</div>
			
			<div class="clearfix"> </div>
		</form>
	</div>

</div>

<!--//login-->

<!--brand-->
<div class="container">
	<div class="brand">
		<div class="clearfix"></div>
	</div>
</div>
<!--//brand-->

<!--//content-->
<?php $this->load->view('layout/footer') ?>