<!--My Documents --> 
<style>
#collapse a{
	text-decoration: none;
}
.mysent{
	margin-top: 75px;
	margin-left: 294px;
	width:79%;
	height:100%;
}
.searchbar{
	display:inline-flex;
	height: 35px;
}
.search{
	width:400px;
	margin-left: 15px;

}
</style>
<div class="mysent col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading">
		    <ol class="breadcrumb pull-right">
		      <li><a href="<?php echo base_url('Dts/mydocuments_view'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
		      <li class="active">Sent Documents</li>
		    </ol>    
		    <h3><span class="glyphicon glyphicon-inbox"></span> Sent Documents</h3>       
		</div>
		<div class="panel-body">
			<form class="pull-left searchbar" method="POST" action="<?php echo base_url('Dts/mysentdocuments_view')?>">	
				<input type="text" name="tracknumber" placeholder="Search..." class="search"/>
				<button type="button" class="find" value="Find"><span class="glyphicon glyphicon-search"></span></button>
			</form>
		</div>
		<div class="panel-body" id="accordion">	
			<div class="col-md-12">
				<div class="panel-group" id="accordion">
					<?php
					foreach ($documents as $d){
						if($d['author']==$_SESSION['username']){
							echo '
							<div class="panel panel-default">	
								<div class="panel-heading text-left">
									<input type="checkbox"><a href="#'.$d['trackcode'].'" data-toggle="collapse" data-parent="accordion">&nbsp;'.$d['trackcode'].'</a><button type="button" class="close" data-dismiss="modal" data-toggle="collapse" data-parent="accordion">&times; </button></div>
						    								    		
								</div>
								<div class="panel collapse collapse " id="'.$d['trackcode'].'">
									<div class="panel-body">
										<div class="row">
											<div class="col-md-4">							
												<h3 class="text-center">SENT</h3>
								 			   	<button type="button" class="dlbtn btn btn-info">
													<span class="glyphicon glyphicon-download-alt"></span>&nbsp; Download
												</button>
								    			<button type="button" class="updbtn btn btn-info pull-right">
													<span class="glyphicon glyphicon-edit"></span>&nbsp; Update
												</button>
											</div>
											<div class="col-md-7">
											  	<form class="form-horizontal" action="/action_page.php">
											    	<div class="form-group">
											      		<label class="control-label col-sm-3" for="email">Track Number:</label>
											      		<div class="col-sm-9">
											        		<input type="text" class="form-control" value="'.$d['trackcode'].'" readonly>
											      		</div>
											    	</div>
											    	<div class="form-group">
											      		<label class="control-label col-sm-3" for="pwd">Sender</label>
											      		<div class="col-sm-9">          
											        		<input type="text" class="form-control" value="'.$d['author'].'"readonly="">
											      		</div>
											    	</div>
											    	<div class="form-group">
											      		<label class="control-label col-sm-3" for="pwd">Receiver</label>
											      		<div class="col-sm-9">          
											        		<input type="text" class="form-control" value="'.$d['receiver'].'"readonly="">
											      		</div>
											    	</div>
											    	<div class="form-group">
											      		<label class="control-label col-sm-3" for="pwd">File name</label>
											      		<div class="col-sm-9">          
											        		<input type="text" class="form-control" value="'.$d['filename'].'"readonly="">
											      		</div>
											    	</div>
											    	<div class="form-group">
											      		<label class="control-label col-sm-3" for="pwd">Description</label>
											      		<div class="col-sm-9">          
											        		<input type="text" class="form-control" value="'.$d['file_desc'].'"readonly="">
											      		</div>
											    	</div>
											    	<div class="form-group">
											      		<label class="control-label col-sm-3" for="pwd">Date and Time:</label>
											      		<div class="col-sm-9">          
											        		<input type="text" class="form-control" value="'.$d['datecreated'].'"readonly="">
											      		</div>
											    	</div>
											  	</form>										
											</div>
										</div>	
									</div>
								</div>	
							';
						}
					}
					?>	</div>
				</div>
			</div>		
		</div>
	</div>			
</div>