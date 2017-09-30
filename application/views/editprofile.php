<!-- EDITPROFILE -->

		<div class="panel panel-default">
			<div class="panel-heading">Edit Account</div>
				<div class="panel-body">
					<div class="row">
					
						<div class="container-fluid" pull-left>
				<?php echo form_open_multipart('Account/editprofile_save');?>
     	
							<?php foreach($userdata as $us){
						echo '			
								
							 	<div class="form-group">
							    	<label class="control-label col-sm-4">Username:</label>
							    	<div class="col-sm-8">
							      		<input type="text" value="'.$us['username'].'" class="form-control" name="Username" >
							    	</div>					
							    </div>	
							    <div class="form-group">
							    	<label class="control-label col-sm-4">Name:</label>
							    	<div class="col-sm-8">
							      		<input type="text" value="'.$us['full_name'].' "class="form-control" name="full_name">
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
							      		<input type="pasword" class="form-control" value="'.$us['password'].'" name="Password" >
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
							      		<input class="form-control" name="college_acronym"  value="'.$us['college_acronym'].'"readonly>
							    	</div>					
							    </div>
							    <div class="form-group">
							    	<label class="control-label col-sm-4">Department:</label>
							    	<div class="col-sm-8">
							      		<input type="text" value="'.$us['department'].'" class="form-control" name="department" readonly>
							    	</div>					
							    </div>					    			    
							    <div class="form-group">
				                  <label>attach?</label>
				                  <input class="form-control" type="file" placeholder="Attach File" name="path" />
				                </div>
							    <div class="form-group">
						    		<button type="submit"  class=" addbtn btn btn-info pull-right">
										<span class="glyphicon glyphicon-save"></span> Save Changes
									</button>
							    </div>
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