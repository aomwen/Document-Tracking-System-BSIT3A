<head>
	<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />
</head>
<div class="mysent col-md-9">
	<div class="panel panel-default"> 
		<div class="panel-heading" id="head">
		    <ol class="breadcrumb pull-right">
		      <li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
		      <li><a href="<?php echo base_url('DocumentSent/viewSentDocu'); ?>">Sent</a></li> 		      
		      <li class="active">Track Number</li>
		    </ol>    
		    <h3><span class="glyphicon glyphicon-folder-open"></span> Sent</h3>       
		</div>
		<div class="panel-body">
			<?php
			foreach($documents as $d){
				echo'
				<div class="specific_inbox">
					<h3><b>'.$d['trackcode'].'</b></h3>
					<h5 class="pull-left">To: <b>'.$d['receiver'].'</b></h5>
					<h5 class="pull-right">Received: '.$d['datecreated'].'</h5>
					<br />
					<br />
					<h5 class="pull-left">Filename: <b>'.$d['filename'].'</b></h5>
					<h5 class="pull-right">seen: '.$d['dateReceived'].'</h5>
					<br />
					<hr />
					<h5 class="subject_inbox">'.$d['fileDesc'].'</h5>
					<br />
					<hr />
				</div>
				<form>
					<div class="form-group row text-center">
						<div class="col-sm-6">
			            	<div class="col-sm-6 pull-left">
			            		<a href="'.base_url('DocumentInbox/removeInboxMess/'.$d['trackcode'].'').'" class="inboxbtn btn btn-default"><span class="glyphicon glyphicon-trash"> Delete</span></a>
								<a href="'.base_url('FilesManipulation/do_download/'.$d['trackcode']).'" class="inboxbtn btn btn-default"><span class="glyphicon glyphicon-download-alt"> Download</span></a>
			            	</div>
			            </div>	
			            <div class="col-sm-6 pull-right">	
			            	<div class="col-sm-6 pull-right ">
			            		<a href="'.base_url('FilesManipulation/forward/'.$d['trackcode']).'" class="inboxbtn btn btn-default"><span class="glyphicon glyphicon-share-alt"> Forward</span></a>
			            	</div>		            	
			            </div>	
		          </div>
				</form>';
			}
			?>
		</div>
	</div>
</div>			