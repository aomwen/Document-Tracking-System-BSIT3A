<style>
.panel-body1{
	margin-top: 60px;
}
.docstat{
	margin-top: 75px;
	margin-left: 294px;
	width:79%;
	height:100%;
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
	font-size: 15px;
	line-height: 25px;
}
.docstatus tr th{
	text-align: center;
}
</style>
<div class="docstat col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading">
		    <ol class="breadcrumb pull-right">
		      <li><a href="<?php echo base_url('Dts/mydocuments_view'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
		      <li class="active">Document Status</li>
		    </ol>    
		    <h3><span class="glyphicon glyphicon-signal"></span> Document Status</h3>       
		</div>
		<div class="panel-body">
			<form class="pull-left searchbar" method="POST" action="<?php echo base_url('Dts/myinbox_view')?>">	
				<input type="text" placeholder="Search..." name="tracknumber" class="search"/>
				<button type="submit" class="find" value="Find"><span class="glyphicon glyphicon-search"></span></button>
			</form>		
		<div>
		<div class="panel-body1">
			<table class="docstatus table-hover table-responsive table-striped text-center" width="100%">
				<tr>
					<th>Track #</th>
					<th>File name</th>
					<th>Author</th>
					<th>Receiver</th>
					<th>Date Created</th>
					<th>Status</th>
					<th>Path</th>
					<th>Action</th>
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
										<a href="'.base_url('upload/do_download/'.$d['trackcode']).'"><span class="glyphicon glyphicon-download-alt text-center"></span></a>
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
										<a href="'.base_url('upload/do_download/'.$d['trackcode']).'"><span class="glyphicon glyphicon-download-alt text-center"></span></a>
									</td>
								</tr>
								';
					}
				?>
			</table>
		</div>
	</div>
</div>		