<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Divisi EDP | Log in</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="<?=base_url()?>bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?=base_url()?>dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?=base_url()?>plugins/iCheck/square/blue.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="<?=base_url();?>"><b>EDP</b>Hermina</a>
		</div>
		
		<div class="login-box-body">
			<p class="login-box-msg">Sign in to start your session</p>

			<form action="" method="post">
				<div class="form-group has-feedback">
					<input type="email" class="form-control" placeholder="Email">
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
					</div>
				</div>
			</form>
			<br>
			<a href="#">I forgot my password</a><br>
			<a href="register.html" class="text-center">Register a new membership</a>
		</div>
	</div>

	<script src="<?=base_url()?>bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?=base_url()?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>plugins/iCheck/icheck.min.js"></script>
	<script>
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' // optional
			});
		});
	</script>
</body>
</html>
