<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	 * Upload Main View
	 * 
	 * @access public
	 * @author Rahmat Syaparudin
	 * @return void
	 * @url http://yoursite.com/home/upload
	 */
?>
<section class="content">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="box box-info box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">File Upload</h3>
				</div>
				
				<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
					<div class="box-body">
						<?=$message?>
						<div class="form-group">
							<label for="fileUpload" class="control-label col-xs-3">Choose File</label> 
							<div class="col-xs-9">
								<input type="file" id="fileToUpload" name="fileToUpload" placeholder="File ID" class="form-control" required="required">
							</div>
						</div>
						<div class="form-group">
							<label for="fileName" class="control-label col-xs-3">File Name</label> 
							<div class="col-xs-9">
								<input id="name" name="name" placeholder="File Name" type="text" class="form-control" required="required">
							</div>
						</div>
						<div class="form-group">
							<label for="description" class="control-label col-xs-3">Deskripsi</label> 
							<div class="col-xs-9">
								<textarea id="file_desc" name="file_desc" cols="40" rows="2" class="form-control" style="resize: vertical; margin-top: 0px; margin-bottom: 0px; min-height: 50px; max-height: 100px"></textarea>
							</div>
						</div> 
						<?php
							$supported_file = $this->home_db->supported_format();
							$supported_file = str_replace(',', '|*.', $supported_file);
						?>
						<i>*Supported File Format : <strong>*.<?=$supported_file?>| </strong></i>
					</div>

		            <div class="box-footer">
		            	<button name="reset" type="reset" class="btn btn-warning pull-right"><i class="fa fa-ban"></i> Reset</button>
		            	<span class="pull-right">&nbsp;&nbsp;</span>
		            	<input name="uploadFile" id="uploadFile" type="submit" class="btn btn-success pull-right" value="Upload">
		            </div>
		    	</form>
			</div>
		</div>
	</div>
</section>