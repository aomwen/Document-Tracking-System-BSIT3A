<html>
<head>
<title>Upload Form</title>
</head>
<body>
	<?php echo form_open_multipart('upload/do_upload');?>
		<label>Track #:</label>
		<input type="text" value="<?php echo $tracknumber ?>" name="trackcode" readonly>
		<label>File Name:</label>
		<input type="text" name="filename" />
		<label>Author:</label>
		<input type="text" name="author" />
		<label>File:</label>
		<input type="file" name="userfile" id="userfile" size="20" />
		<label>Date:</label>
		<input type="text" value="<?php echo date("l").' '.date("Y-m-d"); ?>" readonly>
		<label>Status:</label>		
		<input type="text" value="Uploading..." readonly>
		<input type="submit" value="upload" />
	</form>

	<table>
		<tr>
			<th>Track #</th>
			<th>File name</th>
			<th>Author</th>
			<th>Date Created</th>
			<th>status</th>
			<th>path</th>
			<th>action</th>
		</tr>
		<?php
			foreach($documents as $d){
				echo '	<tr>	
							<td>'.$d['trackcode'].'</td>
							<td>'.$d['filename'].'</td>
							<td>'.$d['author'].'</td>
							<td>'.$d['datecreated'].'</td>
							<td>'.$d['status'].'</td>
							<td>'.$d['path'].'</td>
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

<!-- problem 1: difficulty of IT
solution : studying none stop

problem 2: Cost of gadgets to use
solution : some gadgets that are need in our work is pretty expensive like drawing pad for drawing laptop and other hardwares. solution is saving money.

problem 3: time consumed in programs
solution : working in team

problem 4: lack of sleep
solution : working in team and taking turns of working example, 3 teammates in morning and 3 in evening.

problem 5: staying healthy. it is hard to stay healthy in our work as an IT. because programming takes a lot of our time effort and energy. that affects our health.
solution : working fast but efficient and exercising everytime you have extra time

problem 6: IT has a lot of branches that are needed/ required in taking this line of work
solution : focusing on a set of branch and working with other people that has the other set of branch

problem 7: dangerous, in our current time studying as an IT student is dangerous specially when we need to bring our laptop in school.
solution : the school should have a comouter laboratory.


 -->