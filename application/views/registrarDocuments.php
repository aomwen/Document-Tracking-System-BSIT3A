        <div class="right_col" role="main">
          <div>
            <div class="page-title">
              <div class="title_left">
                <h3 style="margin-top: 4%;">&nbsp; <span class="glyphicon glyphicon-signal"></span> Manage Registrar Documents</h3>
              </div>
              <div class="title_right">
                <div class="panel-heading" id="head">
                  <ol class="breadcrumb pull-right">
                    <li><a href="<?php echo base_url('Dashboard/dashboardView');?>" title="Home"><span class="glyphicon glyphicon-home"></span></a></li>
                      <li class="active">Registrar Documents</li>
                  </ol>           
                </div>
              </div>  
            </div>

            <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">  
                  	<div class="row">
						<div class="col-sm-6">
							<h3 style="text-align: center;">Add Registrar Document</h3>
							<form class="formstyle" method="post" id="file_form">
								<div class="form-group">
									<label>Track #:</label>
									<div id="IDtype">
									<input type="text" value="" name="trackcode" id="trackcode" class="form-control" readonly>
									</div>
								</div>
								<div class="form-group">	
									<label>File Type:</label>
									<select name="file_type" id="fileType" class="form-control">
										<option selected disabled> -- Choose a Document Type -- </option>
										<?php
											foreach($documentTypes as $d){
												echo'
													<option value="'.$d['typeId'].'">'.$d['docType'].'</option>
												';
											}
										?>
									</select>
								</div>
								<div class="form-group">
									<label>Date Admitted:</label>
									<input type="date" value="<?php echo date("Y-m-d"); ?>" name="date_admitted" class="form-control" readonly>
								</div>
								<div class="form-group">	
									<label>Date of Release:</label>
									<input type="date" name="date_released" class="form-control"  />
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
						<div class="col-sm-6">
							<h3 style="text-align: center;">Manage Document Type</h3>
							<ul class="nav nav-tabs">
						    <li class="active"><a data-toggle="tab" href="#typelist">Type List</a></li>
						    <li><a data-toggle="tab" href="#addtype">Add Type</a></li>
						    <li><a data-toggle="tab" href="#updatetype">Update Type</a></li>
						  </ul>
						  <div class="tab-content">
						    <div id="typelist" class="tab-pane fade in active">
						       <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						       	<thead>
								<tr>
									<td>Type Id</td>
									<td>Document Type</td>
								</tr>
							</thead>
							<tbody>
								<?php foreach($documentTypes as $d):?>
								<tr>	
									<td><?php echo $d['typeId']?></td>
									<td><?php echo $d['docType']?></td>
								<?php endforeach;?>
								</tr>
								</tbody>
							</table>
						    </div>
						    <div id="addtype" class="tab-pane fade">
						      <form class="formstyle" method="post" id="addDocType">
								<div class="form-group">	
									<label>Document Type:</label>
									<input type="text" name="docType" class="form-control" id="docType" />
								</div>
								<div class="form-group">	
									<input type="submit" role="button" class="btn btn-primary pull-right" value="Add Document Type" />
								</div>	
							</form>
						    </div>-
						    <div id="updatetype" class="tab-pane fade">
						      <form class="formstyle" method="post" id="updateDocType">
								<div class="form-group">	
									<label>Document Type:</label>
									<select class="form-control" name="typeId" id="typeId">
											<option selected disabled> -- Choose a Document Type -- </option>
										<?php
											foreach($documentTypes as $d){
												echo'
													<option value="'.$d['typeId'].'">'.$d['docType'].'</option>
												';
											}
										?>
									</select>
									<label for="udocType">New Document Type:</label>
									<input type="text" name="docType" class="form-control" id="udocType" />
								</div>
								<div class="form-group">	
									<input type="submit" role="button" class="btn btn-primary pull-right" value="Update" />
								</div>	
							</form>
						    </div>
						  </div>
						</div>
					</div> 
					 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Track #</th>
							<th>File type</th>
							<th>Date Admitted</th>
							<th>Date of Release</th>
							<th>Status</th>
							<th>Update Status</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($documents_status as $d): ?>
						<tr>	
							<td><?php echo $d['regTrackcode']?></td>
							<td><?php echo $d['docType']?></td>
							<td><?php echo $d['dateAdmitted']?></td>
							<td><?php echo $d['dateReleased']?></td>
							<td><?php echo $d['status']?></td>
							<td><a href="<?php echo base_url('ManageAdmin/registrarUpdate/'.$d['regTrackcode'].'/On going')?>" class="btn btn-danger">On going</a>&nbsp;<a href="<?php echo base_url('ManageAdmin/registrarUpdate/'.$d['regTrackcode'].'/For Pickup')?>" class="btn btn-primary">For Pickup</a>&nbsp;<a href="<?php echo base_url('ManageAdmin/registrarUpdate/'.$d['regTrackcode'].'/Complete')?>" class="btn btn-success">Complete</a></td>
						</tr>
					<?php endforeach;?>
					</tbody>
					</table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- /page content -->

<script>
 $('#fileType').change(function(){
 	var typeId = $('#fileType option:selected').val();
 	$.ajax({
          url:"<?php echo base_url(); ?>ManageAdmin/getTrackCode/"+typeId, 
          method:"POST",
          data:{typeId:typeId},
          contentType:false,
          cache:false,
          processData:false,
          success:function(data){
      		$('#IDtype').html(data);
          }

        });

 });
 
 
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
			document.getElementById("manageRegDoc").click();
          }

        });
        
      
  }else{
        alert("Please Fill in the file type field.");
  }
  });

 $('#updateDocType').on('submit',function(e){
    e.preventDefault();
    if($('#udocType').val() != ''){
          $.ajax({
          url:"<?php echo base_url('ManageAdmin/updateDocType');?>", 
          method:"POST",
          data:new FormData(this),
          contentType:false,
          cache:false,
          processData:false,
          success:function(data){
      		alert("Successfully updated the document type.");
				document.getElementById("manageRegDoc").click();
      		}
        });
        
      
  }else{
        alert("Please Fill in the file type field.");
  }
  });

 $('#addDocType').on('submit',function(e){
    e.preventDefault();
    if($('#docType').val() != ''){
          $.ajax({
          url:"<?php echo base_url('ManageAdmin/addDocumentType');?>", 
          method:"POST",
          data:new FormData(this),
          contentType:false,
          cache:false,
          processData:false,
          success:function(data){
      		alert("Successfully added the document type.");
  			document.getElementById("manageRegDoc").click();
      		}
        });
        
      
  }else{
        alert("Please Fill in the file type field.");
  }
  });

 $('#addstatusFlag').on('submit',function(e){
    e.preventDefault();
    if($('#status').val() != ''){
    	
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
