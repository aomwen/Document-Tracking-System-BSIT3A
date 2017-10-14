<!--My Documents --> 
<style>
.breadcrumb{
  margin-top:10px;
}
.myinbox{
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
.searchbar{
	display:inline-flex;
	height: 35px;
}
.search{
	width:400px;
	margin-left: 15px;
}
#collapse a{
	text-decoration: none;
}
.panel-group{
	background-color: #fff;
}
.inboxto{
	border-bottom: 1px solid #dadada;
}
.inboxto a{
	text-decoration:none; 
}
</style>	
<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />

<div class="myinbox col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading" id="head">
		    <ol class="breadcrumb pull-right">
		      <li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
		      <li class="active">Drafts</li>
		    </ol>    
		    <h3><span class="glyphicon glyphicon-inbox"></span> Drafts</h3>       
		</div>
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
			            
			    	}
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