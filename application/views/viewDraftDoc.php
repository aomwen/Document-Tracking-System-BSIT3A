<!--My Documents --> 
<head>
	<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />
</head>
<div class="myinbox col-md-9">
	<div class="panel-heading" id="head">
	    <ol class="breadcrumb pull-right">
	      <li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
	      <li class="active">Drafts</li>
	    </ol>    
	    <h3><span class="glyphicon glyphicon-inbox"></span> Drafts</h3>       
	</div>
	<div class="panel panel-default">		
		<div class="panel-body">
			<input type="text" onkeyup="FilterFunction()" placeholder=" e.g. 592-***-**" id="myInputDocumentSearch" class="search"/>
				<button><a type="submit"  href="<?php base_url('DocumentDraft/viewDraft')?>"><span class="glyphicon glyphicon-repeat"></span></a></button>
		</div>          
		<div class="table-responsive">
	        <table id="myTable" class="table table-hover table-striped">
	        	<thead>
	        		<th>Tracknumber</th>
	        		<th>Filaname</th>
	        		<th>Sender</th>
	        		<th>Date Received</th>
	        	</thead>
	          <tbody>
	          <?php
	          if($documents!=null){
	          	$thereis=false;
		         foreach ($documents as $d){
					if($d['receiver']==$_SESSION['username']&&$d['draft']==True){
				        echo '
				        <tr>
				            <td><a href="'.base_url('DocumentDraft/viewDraftMess/'.$d['trackcode'].'').'"><b>'.$d['trackcode'].'</b></td>
				            <td>'.$d['filename'].'</a></td>
				            <td>'.$d['author'].'</td>
				            <td>'.$d['datecreated'].'</td>
				        </tr>';
				        // <td><span class="glyphicon glyphicon-paperclip"></span></td>
				      $thereis=true;      
				    }
				  }
				  	if($thereis==false){
				    	echo '
				        <tr>
				            <td colspan="4" class="text-danger" align="center"> No document draft for this moment...</td>
				        </tr>';
				    }	          	
				}else{
					echo '
				        <tr>
				            <td colspan="4" class="text-danger" align="center"> No document draft for this moment...</td>
				        </tr>';
				}

	          ?> 
	          </tbody>
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