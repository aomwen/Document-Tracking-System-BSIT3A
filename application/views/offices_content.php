<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />

<div class="myinbox col-md-9 pull-right">
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php foreach($collegefull as $s){echo $s['collegefull'];}?>
		</div>
		<div class="panel-body">
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<?php
					foreach($departments as $d){
						$dept = str_ireplace(' ','-',$d['department']);
						echo'
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion"  data-target="#'.$dept.'" href="#'.$d['department'].'">'.$d['department'].'</a>
							</h4>
						</div>
						<div class="collapse" id="'.$dept.'">
								<div class="panel-body">'.$d['department_head'].'<b>(head)</b>
								</div>
								<div class="panel-body">';
						foreach($users as $us){
							if($us['department'] == $d['department']){
							echo $us['full_name'] ;
						
							}
							echo '
								</div>
						</div>';
						}
					}
					?>
				</div>
			</div>
		</div>	

	</div>
