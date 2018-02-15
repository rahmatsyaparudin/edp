<section class="content">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<ul class="timeline">
				<li>
					<i class="fa fa-clock-o bg-blue"></i>
					<div class="timeline-item">
						<h3 class="timeline-header"><a>File Report Timeline Page</a></h3>							
					</div>
				</li>
				<?php 
					$query = $this->home_db->file_select_all(); 
					$data = $this->db->query($query);
					foreach ($data->result() as $row) {
				?>
					<li class="time-label">
						<?php
	                		$bg = array(
	                			'bg-red', 'bg-green', 'bg-maroon', 'bg-yellow', 'bg-blue', 'bg-orange', 'bg-navy', 'bg-black', 'bg-gray'
	                		);
							$color = array_rand($bg);
						?>
						<span class="<?=$bg[$color]?>">
							<?php
								$timestamp = $row->timestamp;
								$date = date('d M Y', strtotime($timestamp));
								echo $date;
							?>
						</span>
					</li>
					<li>
						<i class="fa fa-file <?=$bg[$color]?>"></i>
						<div class="timeline-item">
							<span class="time"><i class="fa fa-clock-o"></i> <time class="timeago" datetime="<?=$row->timestamp?>"></time></span>
							<h3 class="timeline-header"><a><?=$row->name?></a> upload a file <a><?=$row->file_name?></a></h3>

							<div class="timeline-body">
								<div class="row">
									<div class="col-md-7" style="text-align: justify;">
            							<dl>
                							<dt>File Description :</dt>
                							<dd><?=$row->file_desc?></dd>
              							</dl>
         							</div>
         						</div>
								<?php 
									$loc = $row->location;
									$url = base_url();
									$src = str_replace('./', $url, $loc);
								?>
								<div class="row">
								<div class="col-md-12">
									<embed src="<?=$src?>" type='application/pdf'>
								</div>
							</div>
							</div>
					
							<div class="timeline-footer">
								<a href="<?=$src?>" target="_blank" class="btn btn-xs <?=$bg[$color]?>">View in Fullscreen</a>
							</div>
						</div>
					</li>
				<?php	
					}
				?>				
				<li>
					<i class="fa fa-clock-o bg-gray"></i>
					<div class="timeline-item">
						<h3 class="timeline-header"><a>End Of Timeline Page</a></h3>							
					</div>
				</li>
			</ul>
		</div>
	</div>
</section>