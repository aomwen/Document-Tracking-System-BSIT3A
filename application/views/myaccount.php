<!--MYACCOUNT -->
<style>
.editbtn{
	margin-top: 20px;
}
.myacc{
	margin-top: 75px;	
	margin-left: 294px;
	width:79%;
	height:100%;
}
</style>
<div class="myacc col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading">
		    <ol class="breadcrumb pull-right">
		      <li><a href="<?php echo base_url('Dts/mydocuments_view'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
		      <li class="active">Account Settings</li>
		    </ol>    
		    <h3><span class="glyphicon glyphicon-inbox"></span> Account Settings</h3> 
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-2">
					<img src="" alt="Profile Picture" class="img-responsive" id="profilepic"/>
					<a href="<?xphp echo base_url('Dts/editprofile_view'); ?> class="btn btn-info text-center" role="button" >Edit Profile</a>	
				</div>
				<div class="col-md-10">
					<form class="form-horizontal">				
					 	<div class="form-group">
					    	<label class="control-label col-sm-4">Username:</label>
					    	<div class="col-sm-8">
					      		<input type="text" class="form-control" readonly>
					    	</div>					
					    </div>	
					 	<div class="form-group">
					    	<label class="control-label col-sm-4">Email Address:</label>
					    	<div class="col-sm-8">
					      		<input type="text" class="form-control" readonly>
					    	</div>					
					    </div>	
					 	<div class="form-group">
					    	<label class="control-label col-sm-4">Password:</label>
					    	<div class="col-sm-8">
					      		<input type="pasword" class="form-control" readonly>
					    	</div>					
					    </div>	
					 	<div class="form-group">
					    	<label class="control-label col-sm-4">Position:</label>
					    	<div class="col-sm-8">
					      		<input type="email" class="form-control" readonly>
					    	</div>					
					    </div>
					 	<div class="form-group">
					    	<label class="control-label col-sm-4">Department:</label>
					    	<div class="col-sm-8">
					      		<input type="email" class="form-control" readonly>
					    	</div>					
					    </div>					    			    	
				  	</form>
				<div>
			</div>		
		</div>
	</div>			
</div>