<style>
	.formstyle label{
		font-size:16px;
	}
	.formstyle input{
		border-radius:5px;
		margin-bottom: 10px;
	}
	.tbl1{
		margin-top:20px;
		padding:20px;
		text-align:center;
		font-size: 18px;
	}
	.tbl1 th{
		text-align: center;
		padding:5px;
	}
	.breadcrumb{
	  margin-top:10px;
	}
	.myinbox{
		margin-top: 75px;	
		margin-left: 20%;
		width:79%;
		height:100%;
	}
	#head{
	  border-bottom:solid #015249;
	}
	.panel-heading h3{
	  color:#015249;
	}
	.panel-heading ol li a span{
	  color:#015249;
	}
	.panel-body form input{
		padding:15px 16px;
		border:1px solid #ccc;
		border-radius:4px;
		font-size:15px;
		color:#aaa;
		font-family: 'Lato', sans-serif;
	}
	.panel-body form button{
		background:#015249;
		color:#fff;
		width:40px;
	}
	.panel-body form button:hover{
		background:#A5A5AF;
		color:#222;
	}
	.searchbar{
		display:inline-flex;
		height: 35px;
	}
	.search{
		width:400px;
		margin-left: 15px;
	}
	.docstatus{
		font-size: 16px;
		line-height: 25px;
	}
	.docstatus tr th,td{
		text-align: center;
		padding:10px;
	}	
	.addfile-btn{
		margin-right: 2%;
		padding:1%;
	}
</style>	
<div class="myinbox col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading" id="head">
		    <ol class="breadcrumb pull-right">
		      <li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
		      <li class="active">Manage Registrar Status</li>
		    </ol>    
		    <h3><span class="glyphicon glyphicon-inbox"></span> Manage Registrar Status</h3>       
		</div>
		<div class="panel-body">
			<form action="<?php echo base_url('ManageAdmin/AddRegDoc');?>" class="formstyle" method="post">
				<div class="form-group">
					<label>Track #:</label>
					<input type="text" value="<?php echo $tracknumber?>" name="trackcode" readonly>
				<div class="form-group">	
					<label>File Type:</label>
					<input type="text" name="file_type" />
				</div>
				<div class="form-group">
					<label>Date Admitted:</label>
					<input type="text" value="<?php echo date("Y-m-d"); ?>" name="date_admitted" readonly>
				</div>
				<div class="form-group">	
					<label>Date Released:</label>
					<input type="text" name="date_released" value="****-**-**" readonly />
				</div>
				<div class="form-group">	
					<label>Status:</label>		
					<input type="text" name="status" value="pending" readonly>
				</div>
				<div class="form-group">	
					<input type="submit" role="button" class="btn btn-primary" value="Add File Status" />
				</div>	
			</form>
		<div class="tbl1">
			<table class=" table-bordered table-hover text-center table-responsive table-striped" width="100%">
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
					}
				?>

				</tbody>
			</table>
		</div>
	</div>
</div>
