<section class="content-header">
	<h1>
		Boxed Layout
		<small>Blank example to the boxed layout</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Layout</a></li>
		<li class="active">Boxed</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-6">
			<!-- Chat box -->
			<div class="box box-success">
				<div class="box-header">
					<i class="fa fa-comments-o"></i>
					<h3 class="box-title">Chat</h3>
					
					<div class="box-tools pull-right" data-toggle="tooltip" title="Status">
						<div class="btn-group" data-toggle="btn-toggle">
							<button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>
							<button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
						</div>
					</div>
				</div>

				<div class="box-body chat" id="chat-box">
					<!-- chat item -->
					<div class="item">
						<img src="dist/img/user4-128x128.jpg" alt="user image" class="online">
						<p class="message">
							<a href="#" class="name">
								<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
								Mike Doe
							</a>
							I would like to meet you to discuss the latest news about
							the arrival of the new theme. They say it is going to be one the
							best themes on the market
						</p>

						<div class="attachment">
							<h4>Attachments:</h4>
							<p class="filename">
								Theme-thumbnail-image.jpg
							</p>

							<div class="pull-right">
								<button type="button" class="btn btn-primary btn-sm btn-flat">Open</button>
							</div>
						</div>
						<!-- /.attachment -->
					</div>
					<!-- /.item -->

					<!-- chat item -->
					<div class="item">
						<img src="dist/img/user3-128x128.jpg" alt="user image" class="offline">
						<p class="message">
							<a href="#" class="name">
								<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
								Alexander Pierce
							</a>
							I would like to meet you to discuss the latest news about
							the arrival of the new theme. They say it is going to be one the
							best themes on the market
						</p>
					</div>
					<!-- /.item -->

					<!-- chat item -->
					<div class="item">
						<img src="dist/img/user2-160x160.jpg" alt="user image" class="offline">
						<p class="message">
							<a href="#" class="name">
								<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
								Susan Doe
							</a>
							I would like to meet you to discuss the latest news about
							the arrival of the new theme. They say it is going to be one the
							best themes on the market
						</p>
					</div>
					<!-- /.item -->
				</div>
				<!-- /.chat -->

				<div class="box-footer">
					<div class="input-group">
						<input class="form-control" placeholder="Type message...">
						<div class="input-group-btn">
							<button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
						</div>
					</div>
				</div>
			</div>
			<!-- /.box (chat box) -->
		</div>
	</div>
	<div class="callout callout-info">
		<h4>Tip!</h4>
		<p>
			Add the layout-boxed class to the body tag to get this layout. The boxed layout is helpful when working on
			large screens because it prevents the site from stretching very wide.
		</p>
	</div>
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Title</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			Start creating your amazing application!
		</div>
		<div class="box-footer">
			Footer
		</div>
	</div>
</section>