<head>
	<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />
</head>
<div class="row">
	<div class="myinbox col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading" id="head">
			    <ol class="breadcrumb pull-right">
			      <li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
			      <li class="active">Inbox</li>
			    </ol>    
			    <h3><span class="glyphicon glyphicon-inbox"></span> Inbox</h3>       
			</div>
			<div class="panel-body">
				<input type="text" onkeyup="FilterFunction()" placeholder=" e.g. 592-***-**" id="myInputDocumentSearch" class="search"/>
					<button><a type="submit"  href="<?php base_url('DocumentInbox/viewInbox')?>"><span class="glyphicon glyphicon-repeat"></span></a></button>
			</div>          
			<div class="table-responsive">
		        <table id="myTable" class="table table-hover table-striped">
		        	<thead>
		        		<th>Route ID</th>
		        		<th>File ID</th>
		        		<th>File Name</th>
		        		<th>Sender</th>
						<th>Forward Date</th>
						<th>Comment</th>
		        	</thead>
		          <tbody>
		          <?php
		          $thereis=false;
		         foreach ($documents as $d){
					if($d['receiver']==$_SESSION['username']){
				        echo '
				        <tr>
				            <td><a href="'.base_url('DocumentInbox/viewMessage/'.$d['routeId'].'').'"><b>'.$d['routeId'].'</b></td>
				            <td>'.$d['fileCode'].'</a></td>
				            <td>'.$d['fileName'].'</td>
				            <td>'.$d['sender'].'</td>
				            <td>'.$d['forwardComment'].'</td>
				        </tr>';
				        // <td><span class="glyphicon glyphicon-paperclip"></span></td>
				            $thereis=true;
				    }
				    
				}
				if($thereis==false){
						echo '<tr><td colspan="6" class="text-danger" align="center">No documents received...</td></tr>';
					}

		          ?> 
		          </tbody>
		        </table>
		      </div>
		</div>
		<div class="buttonto" style="margin-left: 95%; margin-top:25%;">
			<a href="<?php echo base_url('FilesManipulation/do_upload'); ?>" class="btn btn-primary" role="button" style="width:55px; height:55px; border-radius: 50px;box-shadow: 2px 4px 10px #888888;"><span class="glyphicon glyphicon-pencil" style="font-size: 30px; top:5px;"></span></a>	
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
  		for(x = 0; x < 4; x++){
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