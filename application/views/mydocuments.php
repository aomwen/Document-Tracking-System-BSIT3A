<style>
.breadcrumb{
  margin-top:10px;
}
.docstat{
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
.panel-body1{
	margin-top: 15px;
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
	font-size: 14px;
	line-height: 25px;
}
.docstatus tr th{
	text-align: center;
}
</style>
<div class="docstat col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading" id="head">
		    <ol class="breadcrumb pull-right">
		      <li><a href="<?php echo base_url('DocumentStatus/mydocuments_view'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
		      <li class="active">Document Status</li>
		    </ol>    
		    <h3><span class="glyphicon glyphicon-signal"></span> Document Status</h3>       
		</div>
		<div class="panel-body">
			<form class="pull-left searchbar" method="POST" action="<?php echo base_url('DocumentStatus/mydocuments_view')?>">	
				<input type="text" placeholder="Search..." name="tracknumber" class="search"/>
				<button type="submit" class="find" value="Find"><span class="glyphicon glyphicon-search"></span></button>
			</form>		
		</div>	
		<div class="panel-body">
			<table class="docstatus table-bordered table-hover table-responsive table-striped table-center" width="100%">
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
										<a href="'.base_url('FilesManipulation/do_download/'.$d['trackcode']).'">Download</a>
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
										<a href="'.base_url('FilesManipulation/do_download/'.$d['trackcode']).'">Download</a>
									</td>
								</tr>
							';
					}
				?>
			</table>
		</div>
	</div>	
</div>