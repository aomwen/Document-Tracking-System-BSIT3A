<!--MYACCOUNT -->
<style>
.breadcrumb{
  margin-top:10px;
}
.editbtn{
	margin-top: 20px;
}
.myacc{
	margin-top: 75px;	
	margin-left: 20%;
	width:79%;
	height:100%;
}
#head{
  border-bottom:solid #015249;
}
</style>
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
				<div class="row">
					<?php foreach($messages as $mess){
						echo '
					<div class="col-md-12">
						<div class="container-fluid">
							 	<div class="form-group">
							    	<label class="control-label col-sm-4">idno:</label>
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
							    	<label class="control-label col-sm-4">Email Address:</label>
							    	<div class="col-sm-8">
							      		<textarea class="form-control" v name="email_address">'.$mess['content'].'</textarea>
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
			</div>
		</div>			
	</div>
</div>	