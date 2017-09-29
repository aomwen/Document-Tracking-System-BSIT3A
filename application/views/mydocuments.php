<div class="col-sm-9">
	<div class="page-header text-center">
		ALL DOCUMENTS
	</div>
	<table class="table-responsive table-striped" width="100%">
		<tr>
			<th>Track #</th>
			<th>File name</th>
			<th>Author</th>
			<th>receiver</th>
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
							<td>'.$d['receiver'].'</td>
							<td>'.$d['datecreated'].'</td>
							<td>'.$d['status'].'</td>
							<td>'.$d['path'].'</td>
							<td>
								<a href="'.base_url('upload/do_download/'.$d['trackcode']).'">Download</a>
							</td>
						</tr>
						';
			}
			foreach($documents1 as $d){
				echo '	<tr>	
							<td>'.$d['trackcode'].'</td>
							<td>'.$d['filename'].'</td>
							<td>'.$d['author'].'</td>
							<td>'.$d['receiver'].'</td>
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
</div>