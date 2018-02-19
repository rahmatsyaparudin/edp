<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	 * Timeline Main View
	 * 
	 * @access public
	 * @author Rahmat Syaparudin
	 * @return void
	 * @url http://yoursite.com/home/timeline
	 */
?>
<script src="<?=base_url()?>/dist/js/pdfobject.min.js"></script>
<section class="content">	
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<ul class="timeline">
				<li>
					<i class="fa fa-clock-o bg-gray"></i>
					<div class="timeline-item">
						<h3 class="timeline-header"><a>First of Timeline Page</a></h3>							
					</div>
				</li>
				<?php 
					$bg = array('bg-red', 'bg-green', 'bg-maroon', 'bg-yellow', 'bg-blue', 'bg-orange', 'bg-navy', 'bg-black', 'bg-teal', 'bg-purple');
					$number =0;
					foreach ($results as $row) 
					{
						$number++;
						$loc = $row->location;
						$src = base_url().$loc.'#pagemode=thumbs&navpanes=1&toolbar=0&statusbar=1&view=FitH'; 
						$name = $row->fileName;

						$timestamp = $row->timestamp;
						$date = date('d M Y', strtotime($timestamp));
						$dateTime = date('d F Y H:i:s', strtotime($timestamp));

						$color = array_rand($bg);
				?>
				<li class="time-label">
					<span class="<?=$bg[$color]?>">
						<?=$date?>
					</span>
				</li>
				<li>
					<i class="fa fa-file <?=$bg[$color]?>"></i>
					<div class="timeline-item">
						<span class="time" style="color:white;">
							<i class="fa fa-clock-o" ></i> <time class="timeago" datetime="<?=$row->timestamp?>"></time>
						</span>
						<h3 class="timeline-header <?=$bg[$color]?>">
							<?=$row->userName?> <i>upload a file</i> <?=$name?>
						</h3>

						<div class="timeline-body">
							<div class="row">
								<div class="col-md-12" style="text-align: justify;">
            						<dl>
            							<dd><b>File Name : </b><?=$row->file_name?></dd>
            							<dd><b>File : </b><?=$name?></dd>
                						<dd><b>Upload Time : </b><?=$dateTime?></dd>
            							<dt>File Description :</dt>
                						<dd><?=$row->file_desc?></dd>
              						</dl>
         						</div>
         					</div>
				
							<div class="row">
								<div class="col-md-12">
									<div id="results<?=$number?>" class="hidden"></div>									
									<script>
										var status = (PDFObject.supportsPDFs) ? "supports" : "does not support";
										var el = document.querySelector("#results<?=$number?>");
										el.setAttribute("class", (PDFObject.supportsPDFs) ? "success" : "fail");
										el.innerHTML = "This browser " + status + " inline PDFs";
										if (status == "does not support")
										{
											el.innerHTML = '<div class="row"><div class="col-md-12"><div class="alert alert-warning alert-dismissible"><i class="icon fa fa-warning"></i>This browser does not support inline PDFs. Please use Google Chrome or Opera.</div></div></div>';
										}
										else if (status == "supports")
										{
											el.innerHTML = '<embed id="support" width="100%" src="<?=$src?>"></embed>'
										}
									</script>
									
								</div>
							</div>
						</div>
					
						<div class="timeline-footer">
							<a target="_blank" href="<?=base_url()?>home/viewFullscreen/<?=$row->file_id?>"  class="btn btn-xs <?=$bg[$color]?>">View in Fullscreen</a>
						</div>
					</div>
				</li>
				<?php } ?>				
				<li>
					<i class="fa fa-clock-o bg-gray"></i>
					<div class="timeline-item <?=$bg[$color]?>">						
						<h3 align="center"><?=$pages;?></h3>							
					</div>
				</li>
			</ul>
		</div>
	</div>
</section>

