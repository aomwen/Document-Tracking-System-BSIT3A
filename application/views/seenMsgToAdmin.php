<link href="<?php echo base_url('bootstrap/css/Admin-Designs.css'); ?>" rel="stylesheet" />

<div class="myacc col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading" id="head">
		    <!-- <ol class="breadcrumb pull-right">
		      <li><a href="<?php echo base_url('Dts/viewDocuments'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
		      <li class="active">Account Settings</li>
		    </ol>    --> 
		    <h3><span class="glyphicon glyphicon-inbox"></span> </h3> 
		</div>
			<div class="panel-body">
				<?php
				 foreach($messages as $mess){ 
				echo '<div class="row">
						<div class="col-md-5 col-md-offset-1">
							<div class="form-group">
						    	<label class="control-label col-sm-4">Date Created:</label>
						    	<div class="col-sm-8">
						      		<input type="text" class="form-control" value="'.$mess['datecreated'].'" name="password" readonly />
						    	</div>					
						    </div>
						</div>
						<div class="col-md-5">
								<div class="form-group">
							    	<label class="control-label col-sm-4">Date Seen:</label>
							    	<div class="col-sm-8">
							      		<input type="text" class="form-control" value="'.$mess['dateseen'].'" name="position" readonly />
							    	</div>					
							    </div>
						</div>
					</div>
					<br />
					<div class="row">
						<div class="col-md-3 col-md-offset-1">
							<div class="form-group">
						    	<label class="control-label col-sm-4">Id No:</label>
						    	<div class="col-sm-8">
						      		<input type="text" value="'.$mess['idno'].'" class="form-control" readonly/>
						    	</div>					
						    </div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
						    	<label class="control-label col-sm-4">Name:</label>
						    	<div class="col-sm-8">
						      		<input type="text" value="'.$mess['sender'].' "class="form-control" readonly/>
						    	</div>					
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
						    	<label class="control-label col-sm-4">Email Address:</label>
						    	<div class="col-sm-8">
						      		<input type="text" value="'.$mess['email'].' "class="form-control" readonly/>
						    	</div>					
						    </div>	
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<div class="form-group">
					      		<textarea class="form-control"  name="email_address" style="height:300px" readonly>'.$mess['content'].'</textarea>
						   	</div>
						</div>
					</div>
				';
				}
				?>	
				<!--<div class="row">
					<?php foreach($messages as $mess){
						echo '

						<div class="col-md-12">
						<div class="container-fluid">
							 	<div class="form-group">
							    	<label class="control-label col-sm-4">Id No:</label>
							    	<div class="col-sm-8">
							      		<input type="text" value="'.$mess['idno'].'" class="form-control" >
							    	</div>					
							    </div>	
								<div class="form-group">
							    	<label class="control-label col-sm-4">Name:</label>
							    	<div class="col-sm-8">
							      		<input type="text" value="'.$mess['sender'].' "class="form-control" >
							    	</div>					
							    </div>	
							 	<div class="form-group">
							    	<label class="control-label col-sm-4">Email Address:</label>
							    	<div class="col-sm-8">
							      		<input type="text" value="'.$mess['email'].' "class="form-control" >
							    	</div>					
							    </div>	
							    <div class="form-group">
							    	<label class="control-label col-sm-4">Content:</label>
							    	<div class="col-sm-8">
							      		<textarea class="form-control"  name="email_address">'.$mess['content'].'</textarea>
							    	</div>					
							    </div>	
							 	<div class="form-group">
							    	<label class="control-label col-sm-4">Date Created:</label>
							    	<div class="col-sm-8">
							      		<input type="text" class="form-control" value="'.$mess['datecreated'].'" name="password" >
							    	</div>					
							    </div>	
							 	<div class="form-group">
							    	<label class="control-label col-sm-4">Date Seen:</label>
							    	<div class="col-sm-8">
							      		<input type="text" class="form-control" value="'.$mess['dateseen'].'" name="position">
							    	</div>					
							    </div>
						</div>';}?>
					<div>
				</div>	
			</div>-->
		</div>			
	</div>
</div>	