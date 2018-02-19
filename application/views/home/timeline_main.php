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
					$query = $this->home_db->file_select_all(); 
					$data = $this->db->query($query);
					$bg = array('bg-red', 'bg-green', 'bg-maroon', 'bg-yellow', 'bg-blue', 'bg-orange', 'bg-navy', 'bg-black', 'bg-teal', 'bg-purple');
					foreach ($data->result() as $row) 
					{
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
									<div class="col-md-7" style="text-align: justify;">
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
									<embed src="<?=$src?>"></embed>
								</div>
							</div>
							</div>
					
							<div class="timeline-footer">
								<a target="_blank" href="<?=base_url()?>home/viewFullscreen/<?=$row->file_id?>"  class="btn btn-xs <?=$bg[$color]?>">View in Fullscreen</a>
							</div>
						</div>
					</li>
				<?php	
					}
				?>				
				<li>
					<i class="fa fa-clock-o bg-gray"></i>
					<div class="timeline-item">
						<h3 class="timeline-header"><a>End of Timeline Page</a></h3>							
					</div>
				</li>
			</ul>
		</div>
	</div>
</section>

