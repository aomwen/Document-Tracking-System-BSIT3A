<head>
	<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />
</head>
		<!-- <div class="row"> -->
		    <div id="content">
		      	<div id="main-content">
					<div class="panel-heading" id="head">
					    <ol class="breadcrumb pull-right">
					      	<li><a href="<?php echo base_url('DocumentStatus/ViewDocuments'); ?>" title="Home"><span class="glyphicon glyphicon-home"></span></a></li> 
					      	<li><a href="<?php echo base_url('DocumentInbox/ViewInbox'); ?>" title="Inbox">Inbox</a></li> 		      
					      	<li class="active">Track Number</li>
					    </ol>    
					    <h3><span class="glyphicon glyphicon-inbox"></span> Inbox</h3>       
					</div>
					<div class="panel panel-default">		
						<div class="panel-body">
								<?php
                foreach($documents as $d){
                  echo'
                  <div class="specific_inbox">
                    <h3><b>'.$d['routeId'].'</b></h3>
                    <h5 class="pull-left">To: <b>'.$d['receiver'].'</b></h5>
                    <h5 class="pull-right">Forward Date: '.$d['forwardDate'].'</h5>
                    <br />
                    <br />
                    <h5 class="pull-left">File code: <b>'.$d['fileCode'].'</b></h5>
                    <h5 class="pull-left">File name: <b>'.$d['fileName'].'</b></h5>
                    <br />
                    <hr />
                    <h5 class="subject_inbox">'.$d['forwardComment'].'</h5>
                    <br />
                    <hr />
                  </div>
								<form>
									<div class="form-group row text-center">
										<div class="col-sm-6">
							            	<div class="col-sm-6 pull-left">';?>
							            		<a href="#" class="inboxbtn btn btn-danger" onClick="deleteInboxMess('<?php echo $d['fileCode'];?>')" title="Delete">
							            			<span class="glyphicon glyphicon-trash"></span>
							            			<span class="font">Delete</span>
							            		</a>
												<?php echo '
													<a href="'.base_url('FilesManipulation/downloadFile/'.$d['fileCode']).'" class="inboxbtn btn btn-success" title="Download">
														<span class="glyphicon glyphicon-download-alt"></span>
														<span class="font">Download</span>
													</a>
													<a href="'.base_url('FilesManipulation/previewFile/'.$d['fileCode'].'').'" class="inboxbtn btn btn-default" target="_blank"><span class="glyphicon glyphicon-"> Preview</span></a>
							            	</div>
							            </div>	
							            <div class="col-sm-6 pull-right">	
							            	<div class="col-sm-6 pull-right ">
							            		<a href="'.base_url('FilesManipulation/forward/'.$d['fileCode']).'" class="inboxbtn btn btn-primary" title="Forward">
							            			<span class="glyphicon glyphicon-share-alt"></span>
							            			<span class="font">Forward</span>
							            		</a>
							            	</div>		            	
							            </div>	
						          </div>
								</form>';
							}
							?>
						</div>
					</div>
			    </div>    
			</div>    
	    </div>
	</div> 
</div>	
<script type="text/javascript">
      function deleteInboxMess(id){
       // console.log(id);
        var ans = confirm("Are you sure to delete this message?");
       // alert(id);
        if(ans==true){
          //redirect to delete method
          var url="<?php echo base_url('DocumentInbox/removeInboxMess/');?>"+id;
          location.href = url;
          alert("The message has been successfully deleted!");
        }
      }
     
 </script>
