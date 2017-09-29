<!--MYACCOUNT -->
<style>
.editbtn{
	margin-top: 20px;
}
</style>
<div class="docu col-sm-9 pull-right">
	<div class="panel panel-default">
		<div class="panel-heading">My Account</div>
			<div class="panel-body">
				<div class="row">
					<?php foreach($userdata as $us){
						echo '
					<div class="col-md-2">
						<img src="'.$us['path'].'" alt="Profile Picture" class="img-responsive" id="profilepic"/>
						<a href=" '.base_url('Account/editprofile_view').' " class="btn btn-info text-center" role="button" >Edit Profile</a>	
					</div>
					<div class="col-md-10">
						<div class="container-fluid">
							<form class="form-horizontal" action"'.base_url('Account/editprofile_view').'" method="POST">
							 	<div class="form-group">
							    	<label class="control-label col-sm-4">Username:</label>
							    	<div class="col-sm-8">
							      		<input type="text" value="'.$us['username'].'" class="form-control" name="username" >
							    	</div>					
							    </div>	
							 	<div class="form-group">
							    	<label class="control-label col-sm-4">Email Address:</label>
							    	<div class="col-sm-8">
							      		<input type="text" value="'.$us['email_address'].' "class="form-control" name="email_address">
							    	</div>					
							    </div>	
							 	<div class="form-group">
							    	<label class="control-label col-sm-4">Password:</label>
							    	<div class="col-sm-8">
							      		<input type="pasword" class="form-control" value="'.$us['password'].'" name="password" >
							    	</div>					
							    </div>	
							 	<div class="form-group">
							    	<label class="control-label col-sm-4">Position:</label>
							    	<div class="col-sm-8">
							      		<input type="text" class="form-control" value="'.$us['position'].'" name="position">
							    	</div>					
							    </div>
							 	<div class="form-group">
							    	<label class="control-label col-sm-4">College/Office:</label>
							    	<div class="col-sm-8">
							      		<input class="form-control" name="college_acronym" value="'.$us['college_acronym'].'">
							    	</div>					
							    </div>
							    <div class="form-group">
							    	<label class="control-label col-sm-4">Department:</label>
							    	<div class="col-sm-8">
							      		<input type="text" value="'.$us['department'].'" class="form-control" name="department">
							    	</div>					
							    </div>					    			
						  	</form>
						</div>';}?>
					<div>
				</div>		
			</div>
		</div>			
	</div>
</div>	