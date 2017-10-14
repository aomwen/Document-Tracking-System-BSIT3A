<link href="<?php echo base_url('bootstrap/css/Admin-Designs.css'); ?>" rel="stylesheet" />

<div class="myinbox col-md-9">
	<div class="panel panel-default">
    <div class="panel-heading text-center" id="head"> Offices	<a href="<?php echo base_url('AdminOffices/addColleges'); ?>" class="btn btn-link pull-right" style="text-decoration: none; color:black;" >
	<span class="glyphicon glyphicon-plus-sign"></span>&nbspAdd </a></div>
	<div class="panel-body">
		<?php
			foreach($colleges as $col){
				echo'
				<div class="thumbnail text-center col-sm-3" style="background-color:lightgray; border-width: 2px;  height:25%; padding:10px;">
					<a href="'.base_url('AdminOffices/officeContent/'.$col['collegeId']).'" style="text-decoration: none;">
						<div style="color: black">
							<img class="img-responsive" src="'.$col['collegeLogo'].'" style=" height: 150px;  margin: auto; border-radius: 90%;">
							<hr style="width:80%;"  />
							'.$col['collegefull'].'<br />'.$col['collegeDesc'].'
						</div>
					</a>
					<a href="'.base_url('AdminOffices/updateCollege/'.$col['collegeId']).'"><span class="glyphicon glyphicon-edit"></span></a>
					<a href="'.base_url('AdminOffices/removeCollege/'.$col['collegeId']).'"><span class="glyphicon glyphicon-remove-sign" style="color: black"></span></a>
				</div>';
			}
		?>
	</div>
</div>