<style>
	.formstyle label{
		font-size:16px;
	}
	.formstyle input{
		padding:5px;
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
</style>
<div class="col-sm-9">
<form action="<?php echo base_url('ManageRegistrarDocu/registrar_add_documents');?>" class="formstyle" method="post">
		<label>Track #:</label>
		<input type="text" value="<?php echo $tracknumber?>" name="trackcode" readonly>
		<label>File Type:</label>
		<input type="text" name="file_type" />
		<label>Date Admitted:</label>
		<input type="text" value="<?php echo date("Y-m-d"); ?>" name="date_admitted" readonly>
		<label>Date Released:</label>
		<input type="text" name="date_released" value="****-**-**" readonly />
		<label>Status:</label>		
		<input type="text" name="status" value="pending" readonly>
		<input type="submit" role="button" class="btn btn-primary" value="Add File Status" />
	</form>
<div class="tbl1">
	<table class=" text-center table-responsive table-striped" width="100%">
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
							<td>'.$d['trackcode'].'</td>
							<td>'.$d['file_type'].'</td>
							<td>'.$d['date_admitted'].'</td>
							<td>'.$d['date_released'].'</td>
							<td>'.$d['status'].'</td>
							<td><a href="'.base_url('ManageRegistrarDocu/registrar_update/'.$d['trackcode']).'/On going" >On going</a>|<a href="'.base_url('ManageRegistrarDocu/registrar_update/'.$d['trackcode']).'/Complete" >Complete</a>|<a href="'.base_url('ManageRegistrarDocu/registrar_update/'.$d['trackcode']).'/Received" >Received</a>|</td>
						</tr>
						';
			}
		?>

		</tbody>
	</table>
</div>
</div>