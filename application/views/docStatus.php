<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />

<div class="docstat col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading" id="head">
		    <ol class="breadcrumb pull-right">
		      <li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
		      <li class="active">Document Status</li>
		    </ol>    
		    <h3><span class="glyphicon glyphicon-signal"></span> Document Status</h3>       
		</div>
		<div class="panel-body">
				<input type="text" id="myInputDocumentSearch" onkeyup="FilterFunction()" placeholder=" e.g. 592-***-**" name="tracknumber" class="search"/>
				<a  class="btn" href="<?php base_url('DocumentStatus/viewDocuments')?>"><span class="glyphicon glyphicon-repeat"></span></button>
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
					<th>Date received </th>
					<th>status</th>
					<th>action</th>
				</tr>
				<?php
					foreach($documents as $d){
						if($d['author']==$_SESSION['username']||$d['receiver']==$_SESSION['username']){
						echo '	<tr>	
									<td>'.$d['trackcode'].'</td>
									<td>'.$d['filename'].'</td>
									<td>'.$d['author'].'</td>
									<td>'.$d['receiver'].'</td>
									<td>'.$d['datecreated'].'</td>
									<td>'.$d['date_received'].'</td>
									<td>'.$d['status'].'</td>
									<td>
										<a href="'.base_url('FilesManipulation/downloadFile/'.$d['trackcode']).'">Download</a>
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
function FilterFunction() {
  var input, filter, table, tr, td, i, x,flag;
  input = document.getElementById("myInputDocumentSearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
  	flag = false;
  		for(x = 0; x < 7; x++){
		    td = tr[i].getElementsByTagName("td")[x];
		    if (td){
		    // alert(td.innerHTML.toUpperCase());
		      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
		        tr[i].style.display = "";
		        flag=true;
		      }else if (flag==false){
		        tr[i].style.display = "none";
		      }
		    } 
		}
	}
  }
</script>