<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />

<div class="myacc col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading" id="head">
		    <ol class="breadcrumb pull-right">
		      <li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
		      <li class="active">Account Settings</li>
		    </ol>    
		    <h3><span class="glyphicon glyphicon-inbox"></span> Account Settings</h3> 
		</div>
			<div class="panel-body">
				<div class="row">
					<?php foreach($userdata as $us){
						echo '
					<div class="col-md-3">
						<div class="well">
						<div id="photo_profile">
						<img src="'.$us['path'].'" alt="Profile Picture" class="img-responsive img-thumbnail" id="profilepic" width="200px"/>
						</div>
						<br />
						<br />
						<a href="#" class="form-control text-center edit_link">Edit Picture</a>
						<a href=" '.base_url('Account/editProfile').' " class="form-control text-center edit_link" >Edit Information</a>
						<a href="#" class="form-control text-center edit_link edit_link2" >Change Password</a>
						</div>	
					</div>
					<div class="col-md-8 col-md-offset-1">
						<h3 class="text-primary">'.$us['firstname'].' '.$us['lastname'].' </h3>
						<h5><em>'.$us['email'].'</em></h5>
						<br />
						<h5><b class="text-primary">Username: </b>'.$us['username'].'</h5>
						
						<h5><b class="text-primary">Position: </b>'.$us['position'].'</h5>
					
						<h5><b class="text-primary">College/Office: </b>'.$us['collegeId'].'</h5>
						<h5><b class="text-primary">Department: </b>'.$us['department'].'</h5>
						';}?>
					<div>
				</div>		
			</div>
		</div>
			
	</div>
</div>	