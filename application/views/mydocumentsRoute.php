<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />

<div class="docstat col-md-9">
	<div class="panel-heading" id="head">
	    <ol class="breadcrumb pull-right">
	      <li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
	      <li class="active">Document Route</li>
	    </ol>    
	    <h3><span class="glyphicon glyphicon-signal"></span> Document Route</h3>       
	</div>
	<div class="panel panel-default">	
		<div class="panel-body">
			<form class="pull-right searchbar">		
				<input type="text" id="myInputDocumentSearch" onkeyup="FilterFunction()" placeholder=" e.g. 592-***-**" name="tracknumber" class="search"/>
				<a  class="btn" href="<?php base_url('DocumentStatus/viewDocuments')?>"><span class="glyphicon glyphicon-repeat"></span></a>
			</form>	
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
						if($d['sender']==$_SESSION['username']||$d['receiver']==$_SESSION['username']){
						echo '	<tr>	
									<td>'.$d['trackcode'].'</td>
									<td>'.$d['filename'].'</td>
									<td>'.$d['sender'].'</td>
									<td>'.$d['receiver'].'</td>
									<td>'.$d['datecreated'].'</td>
									<td>'.$d['dateReceived'].'</td>
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