
<link href="<?php echo base_url('bootstrap/css/Admin-Designs.css'); ?>" rel="stylesheet" />

<div class="regdoc col-md-9">
	<div class="panel-heading" id="head">
	    <ol class="breadcrumb pull-right">
	      <li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
	      <li class="active">Manage Registrar Status</li>
	    </ol>    
	    <h3><span class="glyphicon glyphicon-inbox"></span> Manage Registrar Status</h3>       
	</div>
	<div class="panel panel-default">		
		<div class="panel-body">
			<div class="row">
			<div class="col-sm-4">
				<form action="<?php echo base_url('ManageAdmin/AddRegDoc');?>" class="formstyle" method="post">
					<div class="form-group">
						<label>Track #:</label>
						<input type="text" value="<?php echo $tracknumber?>" name="trackcode" class="form-control" readonly>
					<div class="form-group">	
						<label>File Type:</label>
						<input type="text" name="file_type" class="form-control" />
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
			<div class="col-sm-12">
			<!--<div class="tbl1">-->
				<table class=" table table-bordered table-hover text-center table-responsive table-striped">
					<thead>
						<th>Track #</th>
						<th>File type</th>
						<th>Date Admitted</th>
						<th>Date Received</th>
						<th>Status</th>
						<th>Update Status</th>
					</thead>
					<tbody>
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

					</tbody>
				</table>
			<!--</div>-->
			</div>
		</div>
	</div>
</div>
