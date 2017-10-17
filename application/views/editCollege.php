<link href="<?php echo base_url('bootstrap/css/Admin-Designs.css'); ?>" rel="stylesheet" />

<div class="editcol col-md-9 pull-right">
	<div class="panel panel-default">
		<div class="panel-heading text-center"><a href="<?php echo base_url('AdminOffices/manageColleges');?>" class="btn btn-link pull-left" style="text-decoration: none; color: black;">
		<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbspBack </a>Add College</div>
		<div class="panel-body">
			<?php 
			foreach($colleges as $ca){
				echo'	
				<div class="col-sm-7" style="margin: auto;">
					<form method="post" action="'.base_url('AdminOffices/saveColleges').'">
						<div class="form-group">
							<label>College Acronym:</label>
							<input type="text" name="collegeId" class="form-control" value="'.$ca['collegeId'].'" />
						</div>
						<div class="form-group">
							<label>College Name:</label>
							<input type="text" name="collegefull" class="form-control" value="'.$ca['collegefull'].'" />
						</div>
						<div class="form-group">
							<label>College Description:</label>
							<input type="test" name="collegeDesc" placeholder="College of Science" class="form-control" value="'.$ca['collegeDesc'].'" />
						</div>
						<div class="form-group">
							<label>College Dean:</label>
							<input type="test" name="collegeDean" placeholder="Mwen" class="form-control" value="'.$ca['collegeDean'].'" />
						</div>
						<div class="form-group">
							<label>College Logo </label>
							<input type="file" name="collegeLogo" value="'.$ca['collegeLogo'].'" />
						</div>
					<div class="pull-right">
					<input type="submit" value="Save" class="btn btn-info" />
					<input type="reset" value="reset" class="btn btn-info" />
					</div>
				</div>
			'; }?>
		</div>
	</div>