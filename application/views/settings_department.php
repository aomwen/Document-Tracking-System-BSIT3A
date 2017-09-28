<html>
	<head>
		<title>Admin-Dashboard</title>
	</head>
	<body>
		<a href="<?php echo base_url('upload/session_checkout')?>">Log Out</a>
		<a href="<?php echo base_url('upload/settings_department')?>">Department</a>
		<?php echo form_open_multipart('upload/add_colleges');?>
			<label>College Acronym:</label>
			<input type="text" name="college_acronym" />
			<lable>College Description</lable>
			<input type="test" name="college_desc" />
			<lable>College Dean</lable>
			<input type="test" name="college_dean" />
			<label>College Logo </label>
			<input type="file" name="college_logopath" />
			<input type="submit" value="Add"/>
		</form>
		<form action="<?php echo base_url('upload/add_departments'); ?>" method="post">
			<label>Department:</label>
			<input type="text" name="departments" />
			<input type="submit" value="Add" />
		</form>
		
		<table>
				<tr>
					<th>College Logo</th>
					<th>College</th>
					<th>College Desription</th>
					<th>College Dean</th>
					<th>action</th>
				</tr>
				<?php
					foreach($colleges as $d){
						echo '	<tr>
									<td> <img src="'.$d['college_logopath'] .'"/></td>	
									<td>'.$d['college_acronym'].'</td>
									<td>'.$d['college_desc'].'</td>
									<td>'.$d['college_dean'].'</td
									<td>
										<a href="'.base_url('upload/update_department/'.$d['college_acronym']).'">remove</a>|
										<a href="'.base_url('upload/update_department/'.$d['college_acronym']).'">Update</a>
									</td>
								</tr>
								';
					}
				?>
		</table>
	</body>
</html>