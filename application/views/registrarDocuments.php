<head>
	<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />
</head>
<div col-xs-9 col-sm-9 col-md-9 col-lg-9">
		    <div id="content">
		      	<div id="main-content">
					<div class="panel-heading" id="head">
	    				<ol class="breadcrumb pull-right">
	      					<li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>" title="Home"><span class="glyphicon glyphicon-home"></span></a></li> 
	      					<li class="active">Manage Registrar Status</li>
	    				</ol>    
	    				<h3><span class="glyphicon glyphicon-inbox"></span> Manage Registrar Status</h3>    
	    			</div>
					<div class="panel panel-default">		
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-4">
									<form class="formstyle" method="post" id="file_form">
										<div class="form-group">
											<label>Track #:</label>
											<input type="text" value="<?php echo $tracknumber?>" name="trackcode" class="form-control" readonly>
										<div class="form-group">	
											<label>File Type:</label>
											<input type="text" name="file_type" class="form-control" id="file_type" />
										</div>
										<div class="form-group">
											<label>Date Admitted:</label>
											<input type="date" value="<?php echo date("Y-m-d"); ?>" name="date_admitted" class="form-control" readonly>
										</div>
										<div class="form-group">	
											<label>Date Released:</label>
											<input type="date" name="date_released" value="****-**-**" class="form-control" readonly />
										</div>
										<div class="form-group">	
											<label>Status:</label>		
											<input type="text" name="status" value="pending" class="form-control" readonly>
										</div>
										<div class="form-group">	
											<input type="submit" role="button" class="btn btn-primary pull-right" value="Add File Status" />
										</div>	
									</form>
								</div>
							</div>
							<div class="row">
								<div class="table-responsive">
									<table id="myTable" class="docstatus table-bordered table-hover table-striped table-center text-center" width="100%">
										<tr>
											<th>Track #</th>
											<th>File type</th>
											<th>Date Admitted</th>
											<th>Date Received</th>
											<th>Status</th>
											<th>Update Status</th>
										</tr>
										<?php
											$thereis=false;
											foreach($documents_status as $d){
												echo '	<tr>	
															<td>'.$d['regTrackcode'].'</td>
															<td>'.$d['docType'].'</td>
															<td>'.$d['dateAdmitted'].'</td>
															<td>'.$d['dateReleased'].'</td>
															<td>'.$d['status'].'</td>
															<td><a href="'.base_url('ManageAdmin/registrarUpdate/'.$d['regTrackcode']).'/On going" class="btn btn-danger">On going</a>&nbsp;<a href="'.base_url('ManageAdmin/registrarUpdate/'.$d['regTrackcode']).'/Complete" class="btn btn-primary">Complete</a>&nbsp;<a href="'.base_url('ManageAdmin/registrarUpdate/'.$d['regTrackcode']).'/Received" class="btn btn-success">Received</a></td>

														</tr>
														';
												$thereis=true;
											}
											if($thereis==false){
												echo '<tr><td colspan="9" class="text-danger" align="center">No document at the moment...</td></tr>';
											}
										?>
									</table>
			<!--</div>-->
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
</div>
<script>
 $('#file_form').on('submit',function(e){
    e.preventDefault();
    if($('#file_type').val() != ''){
    	
          $.ajax({
          url:"<?php echo base_url(); ?>ManageAdmin/addRegDoc", 
          method:"POST",
          data:new FormData(this),
          contentType:false,
          cache:false,
          processData:false,
          success:function(data){
      		  alert("Successfully added the file.");
          }

        });
        
      
  }else{
        alert("Please Fill in the file type field.");
  }
  });

</script>
