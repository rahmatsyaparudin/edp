<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	/**
	 * Main Template View
	 * 
	 * @access public
	 * @author Rahmat Syaparudin
	 * @return void
	 * @url http://yoursite.com/
	 */
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Divisi EDP | RS Hermina</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">		
		<link rel="stylesheet" href="<?=base_url()?>bower_components/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url()?>bower_components/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?=base_url()?>bower_components/Ionicons/css/ionicons.min.css">
		<link rel="stylesheet" href="<?=base_url()?>bower_components/datatables/datatables.min.css">
		<link rel="stylesheet" href="<?=base_url()?>dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="<?=base_url()?>dist/css/skins/_all-skins.min.css">
  		<link rel="stylesheet" href="<?=base_url()?>plugins/iCheck/all.css">
  		<link rel="stylesheet" href="<?=base_url()?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	   	<!-- <link rel="stylesheet" href="<?=base_url()?>dist/css/fullscreen-modal.css"> -->
	   	<style>
			th {
			    text-align: left;
			    width: auto;
			}

			.opsi{
				width: 7%;
			}
			.radio-group label {
			   	overflow: hidden;
			} .radio-group input {
				height: 1px;
			   	width: 1px;
			   	position: absolute;
			  	top: -20px;
			} .radio-group .not-active  {
			   	color: #070707;
			   	background-color: #fff;
			}
			.modal-backdrop {
    			background-color: navy;
   			}
   			input[type=text]:valid {color: black;}
   			input[type=text]:invalid {color: red;}
   			input[type=email]:valid {color: black;}
   			input[type=email]:invalid {color: red;}
   			input[type=number]:valid {color: black;}
   			input[type=number]:invalid {color: red;}
		</style>
		<?php 
			if($js!=''){$this->load->view($js);}
			else{$js = '';}
		?>
	</head>
	<?php if($this->uri->segment(2)!='viewFullscreen'){$fixed = 'fixed';} else {$fixed = '';}?>
	<body class="hold-transition skin-blue <?=$fixed?> layout-top-nav">
		<div class="wrapper">
			<header class="main-header">
				<nav class="navbar navbar-static-top">
					<div class="container">
						<div class="navbar-header">
							<a href="<?=base_url()?>" class="navbar-brand"><b>EDP</b>Hermina</a>
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"><i class="fa fa-bars"></i></button>
						</div>

						<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
							<ul class="nav navbar-nav">
								<li <?php if($this->uri->segment(2)=='timeline'){echo ' class="active"';}?>>
									<a href="<?=base_url()?>home/timeline" onClick="killProcess()" title="Timeline">Timeline</a>
								</li>
								<?php if ($this->session->userdata('isLogin') == TRUE){ ?>
								<li <?php if($this->uri->segment(2)=='upload'){echo ' class="active"';}?>>
									<a href="<?=base_url()?>home/upload" onClick="killProcess()" title="File Upload">File Upload</a>
								</li>
								<li <?php if($this->uri->segment(2)=='user'){echo ' class="active"';}?>>
									<a href="<?=base_url()?>home/user" onClick="killProcess()" title="User List">User List</a>
								</li>
								<li>
									<a href="<?=base_url()?>home/signout">Sign Out</a>
								</li>
								<?php }else{ ?>
								<li <?php if($this->uri->segment(2)=='signin'){echo ' class="active"';}?>>
									<a href="<?=base_url()?>home/signin" onClick="killProcess()" title="Sign in">Sign in</a>
								</li>
								<?php } ?>
							</ul>
						</div>
						<?php if ($this->session->userdata('isLogin') == TRUE){ $name = $this->session->userdata('name');?>
						<div class="navbar-custom-menu">
							<ul class="nav navbar-nav">
								<li><a href="#">Welcome, <?=$name?></a></li>
							</ul>
						</div>
						<?php }else{} ?>
					</div>
				</nav>
			</header>

			<div class="content-wrapper">
				<?php $this->load->view($content);?>		
			</div>
			
			<footer class="main-footer">
				<div class="pull-right hidden-xs">
					<b>Version</b> 1.0.0 (beta)
				</div>
				<strong>Copyright &copy; 2018 Divisi EDP | RS Hermina.</strong> Template By <a href="https://adminlte.io">Almsaeed Studio</a>
			</footer>

			<div class="control-sidebar-bg"></div>
		</div>
		
		<script src="<?=base_url()?>bower_components/jquery/dist/jquery.min.js"></script>		
		<script src="<?=base_url()?>bower_components/jquery/dist/jquery.js"></script>
		<script src="<?=base_url()?>bower_components/jquery-ui/jquery-ui.min.js"></script>
		<script src="<?=base_url()?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?=base_url()?>bower_components/datatables/datatables.min.js"></script>
		<script src="<?=base_url()?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
		<script src="<?=base_url()?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
		<script src="<?=base_url()?>bower_components/moment/min/moment.min.js"></script>
		<script src="<?=base_url()?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<script src="<?=base_url()?>plugins/iCheck/icheck.min.js"></script>
		<script src="<?=base_url()?>bower_components/fastclick/lib/fastclick.js"></script>
		<script src="<?=base_url()?>dist/js/adminlte.min.js"></script>
		<script src="<?=base_url()?>dist/js/jquery.timeago.js" type="text/javascript"></script>
		<script src="<?=base_url()?>dist/js/pages/dashboard.js"></script>
		<script type="text/javascript" src="<?=base_url()?>/dist/js/pdfobject.js"></script>
		<script>
		  $.widget.bridge('uibutton', $.ui.button);
		  PDFJS.workerSrc = '<?=base_url()?>/build/pdf.worker.js';
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				document.onmousedown=disableclick;
				status="Sorry, right click disabled for security reason";
				function disableclick(event){
					if(event.button==2)	{
						 alert(status);
						 return false;    
					}
				}
 			    jQuery("time.timeago").timeago();
			});
			$(function() {
			    $('.radio-group label').on('click', function(){
			        $(this).removeClass('not-active').siblings().addClass('not-active');
			    });
			});

			$(document).ready (function(){
            	$("#alert").fadeTo(3000, 500).slideUp(500, function(){
             		$("#alert").slideUp(500);
             	});
 			});

	
			$().button('toggle');
			$().button('dispose');
			
			$(function(){
			    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
			      checkboxClass: 'icheckbox_minimal-blue',
			      radioClass   : 'iradio_minimal-blue'
			    });
			    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
			      checkboxClass: 'icheckbox_minimal-red',
			      radioClass   : 'iradio_minimal-red'
			    });
			    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
			      checkboxClass: 'icheckbox_flat-green',
			      radioClass   : 'iradio_flat-green'
			    });
			});
		
			$(document).ready(function(){
			    $('[data-toggle="tooltip"]').tooltip();
			    $('[data-toggle="modal"]').tooltip();   
			});
		</script>
	</body>
</html>


