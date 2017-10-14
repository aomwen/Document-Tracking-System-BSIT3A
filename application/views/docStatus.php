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
			<div class="row">	
				<div class="col-md-3">
					<div class="panel panel-success">
						<div class="panel-heading">
							<a href="product.php" style="text-decoration:none;color:black;">
								Received
								<span class="badge pull pull-right"></span>	
							</a>
						</div> <!--/panel-hdeaing-->
					</div> <!--/panel-->
				</div> <!--/col-md-4-->

				<div class="col-md-3">
					<div class="panel panel-info">
						<div class="panel-heading">
							<a href="orders.php?o=manord" style="text-decoration:none;color:black;">
								Completed
								<span class="badge pull pull-right"></span>
							</a>
						</div> <!--/panel-hdeaing-->
					</div> <!--/panel-->
				</div> <!--/col-md-4-->

				<div class="col-md-3">
					<div class="panel panel-danger">
						<div class="panel-heading">
							<a href="product.php" style="text-decoration:none;color:black;">
								Ongoing
								<span class="badge pull pull-right"></span>	
							</a>
							
						</div> <!--/panel-hdeaing-->
					</div> <!--/panel-->
				</div> <!--/col-md-4-->
			</div>
		</div>	
		<div class="panel-body">
			<table id="myTable" class="docstatus table-bordered table-hover table-responsive table-striped table-center text-center" width="100%">
				<tr>
					<th>Track #</th>
					<th>File name</th>
					<th>Author</th>
					<th>receiver</th>
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