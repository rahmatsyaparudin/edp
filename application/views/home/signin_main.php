<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	 * Signin Main View
	 * 
	 * @access public
	 * @author Rahmat Syaparudin
	 * @return void
	 * @url http://yoursite.com/home/signin
	 */
?>
	<section class="content">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="login-logo">
				<a href="<?=base_url();?>"><b>EDP</b>Login</a>
			</div>
			
			<div class="login-box-body">
				<p class="login-box-msg">Sign in to start your session</p>
				<?=$message?>

				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group has-feedback">
						<input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?=$username?>">
						<span class="fa fa-user form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?=$password?>">
						<span class="fa fa-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="col-xs-4">
							<button type="submit" name="signin" id="signin" value="Signin" class="btn btn-primary btn-block btn-flat">Sign in</button>
						</div>
					</div>
				</form>
				<br>
				<!-- <a href="#">I forgot my password</a><br>
				<a href="register.html" class="text-center">Register a new membership</a> -->
			</div>
		</div>
	</div>
</section>
	<script>
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%'
			});
		});
	</script>
