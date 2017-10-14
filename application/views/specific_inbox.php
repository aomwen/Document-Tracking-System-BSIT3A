<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />

<div class="myinbox col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading" id="head">
		    <ol class="breadcrumb pull-right">
		      <li><a href="<?php echo base_url('DocumentStatus/mydocuments_view'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
		      <li><a href="<?php echo base_url('DocumentInbox/myinbox_view'); ?>">Inbox</a></li> 		      
		      <li class="active">Track Number</li>
		    </ol>    
		    <h3><span class="glyphicon glyphicon-inbox"></span> Inbox</h3>       
		</div>
		<div class="panel-body">
			<div class="specific_inbox">
				<h3><b>Track Number</b></h3>
				<h5 class="pull-left">From: Name of Sender</h5>
				<h5 class="pull-right">Date and time received</h5>
				<br />
				<hr />
				<h5 class="subject_inbox">Subject</h5>
				<br />
				<hr />
			</div>
			<form>
				<div class="form-group row text-center">
					<div class="col-sm-6">
		            	<div class="col-sm-6 pull-left">
		            		<button class="inboxbtn btn btn-default"><span class="glyphicon glyphicon-trash"> Delete</span></button>
							<button class="inboxbtn btn btn-default"><span class="glyphicon glyphicon-download-alt"> Download</span></button>
		            	</div>
		            </div>	
		            <div class="col-sm-6 pull-right">	
		            	<div class="col-sm-6 pull-right ">
		            		<button class="inboxbtn btn btn-default"><span class="glyphicon glyphicon-share-alt"> Forward</span></button>
		            	</div>		            	
		            </div>	
	          </div>
			</form>
		</div>
	</div>
</div>			