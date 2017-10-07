<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />

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
			<div class="col-md-2">
				<div class="panel panel-success">
					<div class="panel-heading">
						<a href="product.php" style="text-decoration:none;color:black;">
							<span class="glyphicon glyphicon-inbox"></span>
							&nbsp; Inbox
							<span class="badge pull pull-right">9</span>	
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="panel panel-info">
					<div class="panel-heading">
						<a href="orders.php?o=manord" style="text-decoration:none;color:black;">
							<span class="glyphicon glyphicon-folder-open"></span>
							&nbsp; Sent
							<span class="badge pull pull-right">5</span>
						</a>	
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<a href="product.php" style="text-decoration:none;color:black;">
							<span class="glyphicon glyphicon-file"></span>
							&nbsp; Draft
							<span class="badge pull pull-right">2</span>	
						</a>		
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<form class="pull-right searchbar" method="POST" action="<?php echo base_url('DocumentInbox/myinbox_view')?>">
					<input type="text" placeholder=" e.g. 592-***-**" name="search" class="search"/>
					<button type="submit" class="find" value="Find"><span class="glyphicon glyphicon-search"></span></button>
				</form>
			</div>	
		</div>          
		<div class="table-responsive">
			<table id="myTable" class="docstatus table-bordered table-hover table-striped table-center text-center" width="100%">
				<tr>
					<th>Track #</th>
					<th>File name</th>
					<th>Sender</th>
					<th>Receiver</th>
					<th>Date Created</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
				<?php
					foreach($documents as $d){
						if($d['author']==$_SESSION['username'] || $d['receiver']==$_SESSION['username']){
						echo '	<tr>	
									<td>'.$d['trackcode'].'</td>
									<td>'.$d['filename'].'</td>
									<td>'.$d['author'].'</td>
									<td>'.$d['receiver'].'</td>
									<td>'.$d['datecreated'].'</td>
									<td>'.$d['status'].'</td>
									<td>
										<a href="'.base_url('FilesManipulation/do_download/'.$d['trackcode']).'">Download</a>
									</td>
								</tr>
							';
						}
					}
				?>
			</table>
		</div>
	</div>	
</div>
<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>