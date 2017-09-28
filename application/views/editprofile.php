<!-- EDITPROFILE -->
<div class="container">
	<div class=" docu col-sm-9 pull-right">
		<div class="panel panel-default">
			<div class="panel-heading">My Account</div>
				<div class="panel-body">
					<div class="row">
					<?php foreach($userdata as $us){
						echo '
						<div class="container-fluid" pull-left>
							<form class="form-horizontal" action"'.base_url('DTS/editprofile_view').'" method="POST">				
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
							    	<label class="control-label col-sm-4">College:</label>
							    	<div class="col-sm-8">
							      		<select class="form-control" name="college_acronym">'
							      		foreach($colleges as $col){
							      			if($col['college_acronym']==$us['college_acronym']){
							      				echo '<option value="'.$col['college_acronym'].'" >'.$col['college_acronym'].'</option';
							      			}
							      		}
							    echo  		
							    	'</select>
							    	</div>					
							    </div>
							    <div class="form-group">
							    	<label class="control-label col-sm-4">Department:</label>
							    	<div class="col-sm-8">
							      		<input type="text" value="'.$us['department'].'" class="form-control" name="department">
							    	</div>					
							    </div>					    			    	
							    <div class="form-group">
						    		<button type="button"  class=" addbtn btn btn-info pull-right">
										<span class="glyphicon glyphicon-save"></span> Save Changes
									</button>
							    </div>
						  	</form>
						</div>
						';
					}
					?>
					</div>
				</div>
			</div>
		</div>
	</div>		
</div>	