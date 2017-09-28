<html>
<head>
<title>Upload Form</title>
</head>
<body>
	<form action="<?php echo base_url('upload/registrar_add_documents');?>" method="post">
		<label>Track #:</label>
		<input type="text" value="<?php echo $tracknumber?>" name="trackcode" readonly>
		<label>File Type:</label>
		<input type="text" name="file_type" />
		<label>date admitted:</label>
		<input type="text" value="<?php echo date("l").''.date(
		"Y-m-d"); ?>" name="date_admitted" readonly>
		<label>date of release:</label>
		<input type="text" name="date_released" value="<?php $d= strtotime("+3 Days"); echo date("l").''.date(
		"Y-m-d",$d); ?>" readonly />
		<label>Status:</label>		
		<input type="text" name="status" value="Admitting..." readonly>
		<input type="submit" value="Add File Status" />
	</form>

	<table>
		<tr>
			<th>Track #</th>
			<th>File type</th>
			<th>Date Admitted</th>
			<th>Date Received</th>
			<th>status</th>
			<th>action</th>
		</tr>
		<?php
			foreach($documents_status as $d){
				echo '	<tr>	
							<td>'.$d['trackcode'].'</td>
							<td>'.$d['file_type'].'</td>
							<td>'.$d['date_admitted'].'</td>
							<td>'.$d['date_released'].'</td>
							<td>'.$d['status'].'</td>
							<td>
								<a href="'.base_url('upload/do_download/'.$d['trackcode']).'">Download</a>
							</td>
						</tr>
						';
			}
		?>
	</table>
</body>
</html> 