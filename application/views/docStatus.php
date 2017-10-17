<head>
	<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />
</head>
		<div col-xs-9 col-sm-9 col-md-9 col-lg-9">
		    <div id="content">
		      	<div id="main-content">
					<div class="panel-heading" id="head">
					    <ol class="breadcrumb pull-right">
					    	<li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>" title="Home"><span class="glyphicon glyphicon-home"></span></a></li> 
					      	<li class="active">Document Status</li>
					    </ol>    
					    <h3><span class="glyphicon glyphicon-signal"></span> Document Status</h3>       
					</div>
					<div class="panel panel-default">		
						<div class="panel-body">
							<form class="pull-right searchbar">
								<input type="text" id="myInputDocumentSearch" onkeyup="FilterFunction()" placeholder=" e.g. 592-***-**" name="tracknumber" class="search"/>
								<a class="btn" href="<?php base_url('DocumentStatus/mydocuments_view')?>" title="Search"><span class="glyphicon glyphicon-repeat"></span></a>
							</form>	
							<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
								<div class="panel panel-success">
									<div class="panel-heading">
										<?php 
										echo '
										<a href="'.base_url('DocumentInbox/viewInbox').'" style="text-decoration:none;color:black;" title="Inbox">
											<span class="glyphicon glyphicon-inbox"></span>
											&nbsp; Inbox
											<span class="badge pull pull-right">'.$Flag[0].'</span>	
										</a>';
										?>
									</div>
								</div>
							</div>	
							<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
								<div class="panel panel-info">
									<div class="panel-heading">
										<?php
										echo '
										<a href="'.base_url('DocumentSent/viewSent').'" style="text-decoration:none;color:black;" title="Sent">
											<span class="glyphicon glyphicon-folder-open"></span>
											&nbsp; Sent
											<span class="badge pull pull-right">'.$Flag[1].'</span>
										</a>';
									?>
									</div>
								</div>
							</div>
							<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
								<div class="panel panel-danger">
									<div class="panel-heading">
										<?php
										echo '
										<a href="'.base_url('DocumentDraft/viewDraft').'" style="text-decoration:none;color:black;" title="Draft">
											<span class="glyphicon glyphicon-file"></span>
											&nbsp; Draft
											<span class="badge pull pull-right">'.$Flag[2].'</span>	
										</a>';
										?>		
									</div>
								</div>
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
								$thereis=false;
								foreach($documents as $d){
									if($d['sender']==$_SESSION['username']||$d['receiver']==$_SESSION['username']){
									echo '	<tr class="clickable-row">	
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
										$thereis=true;
									}
								}
								if($thereis==false){
									echo '<tr><td colspan="8" class="text-danger" align="center">No document registered...</td></tr>';
								}
							?>
						</table>
					</div>																	
				</div>
			</div>    
	    </div>
	</div> 
</div>	
<script>
$(".clickable-row").click(function(){
	window.location = "<?php echo base_url('DocumentStatus/mydocumentsRoute'); ?>";	
});
</script>
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