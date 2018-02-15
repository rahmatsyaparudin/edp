<?php
	require_once BASEPATH . '/helpers/url_helper.php'; 
?>

<!DOCTYPE html>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.js"></script>

<style type="text/css">
	#notif{
	    display: inline-block;
	    margin-bottom: 1%;
	    font-size: 10px;
	}
	#backgroud{
		/*background-color: skyblue;*/
		/*opacity: 0.5;*/
		background-color: rgba(255,255,255,0.5);
    	font-weight: bold;
	    display: inline-block;
	    border-top: 0;
	    padding: 5px;
	    margin-right: 1%;
	    color: blue;
	    border-radius: 5px;
	    font-size: 10px;
	    /*border:1px solid black;*/
	    /*box-shadow: 5px 5px 5px #888888;*/
	}
	h1 {
	color: #444;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}
</style>
<html lang="en">
<head>
	<title>Error 404</title>
	<meta charset="utf-8">
	<link href="<?=base_url()?>assets/theme/base_login.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>assets/theme/favicon.ico">
	<script type="text/javascript" src="<?=base_url()?>assets/js/base.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.blockUI.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
	     $('#form-login').submit(function() {
			$.blockUI({ 
					fadeIn: 700,
					fadeOut: 700,
					message: '<h1>Processing. Please wait...</h1>',
					css: { 
							border: 'none', 
							padding: '15px', 
							backgroundColor: '#000', 
							'-webkit-border-radius': '10px', 
							'-moz-border-radius': '10px', 
							opacity: .4, 
							color: '#fff' 
						}
				}); 
		});
	});
	</script>
	<script language="javascript">
		document.onmousedown=disableclick;
		status="Sorry, right click disabled for security reason";
		function disableclick(event){
			if(event.button==2)	{
				 alert(status);
				 return false;    
			}
		}
	</script>
</head>
<body class="special-page login-bg dark" oncontextmenu="return false;">
	<center style="padding:3em;"><img src="<?=base_url()?>assets/theme/PDJBIDJA.png" width="15%" height="15%"/></center>
	<section id="login-block">
		<br /><br /><br /><br /><br /><br /><br /><br />
		<div class="block-border" style="background:rgba(255, 255, 255, 0.2) none repeat scroll 0 0 padding-box">
			<div class="block-content" style="background:rgba(255, 255, 255, 255) none repeat scroll 0 0 padding-box">
				<div class="block-header" style="font-weight:normal;line-height: 1.4em;color:#444;font-size:2em;"><p style="margin:0.9em;"><?php echo $heading; ?></p></div>
			<br />
			<div class="form " autocomplete="off">
				<p style="font-weight:normal;font-size:1.5em;" align="center">The page you requested was not found.</p>
				<a type="button" class="big-button float-center" href="#" onclick="history.go(-1);"><img src="<?=base_url()?>assets/theme/navigation_left.png" width="16" height="16" title="Back"> Go Back</a>
			</div>
			</div>
		</div>
	</section>
</body>
</html>