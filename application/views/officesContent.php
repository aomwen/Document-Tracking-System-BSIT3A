<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />

<div class="myinbox col-md-9 pull-right">
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php foreach($colleges as $s){echo $s['collegefull'];}?>
		</div>
		<div class="panel-body">
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<?php
					$thereis=false;
					foreach($departments as $d){
						$dept = str_ireplace(' ','-',$d['department']);
						echo'
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion"  data-target="#'.$dept.'" href="#'.$d['department'].'">'.$d['department'].'</a>
							</h4>
						</div>
						<div class="collapse" id="'.$dept.'">
								<div class="panel-body">'.$d['departmentHead'].'<b>(head)</b>
								</div>
								<div class="panel-body">';
						foreach($userdata as $us){
							if($us['department'] == $d['department']){
							echo $us['firstname'].' '.$us['lastname'].'<b>'.$us['position'].'</b>';
						
							}
							echo '
								</div>
						</div>';
						}
						$thereis=true;
					}
					if($thereis==false){
						echo '<h4 class="text-danger">No department registered...</h4>';
					}
					?>
				</div>
			</div>
		</div>	

	</div>
