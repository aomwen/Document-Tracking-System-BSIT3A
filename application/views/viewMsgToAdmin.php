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
		      <li class="active">User Review</li>
		    </ol>    
		    <h3><span class="glyphicon glyphicon-signal"></span> User Review</h3>       
		</div>
		<!-- <div class="panel-body">
				<input type="text" id="myInput" onkeyup="myFunction()" placeholder=" e.g. 592-***-**" name="tracknumber" class="search"/>
				<button type="submit" class="find" value="Find"><span class="glyphicon glyphicon-search"></span></button>

			</form>
		</div>	 -->		
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
			<table id="myTable" class="docstatus table-bordered table-hover table-responsive table-center text-center" width="100%">
				<tr>
					<th>idno</th>
					<th>Email</th>
					<th>Date Sent</th>
					<th>action</th>
				</tr>
				<?php
					$thereis=false;
					foreach($messages as $mess){
						if($mess['seen']==FALSE){
						echo '
							<tr style="background-color: #f9f9f9;">';
						}else{
							echo' <tr>';
						}
						echo'
								<td>'.$mess['idno'].'</td>
								<td>'.$mess['email'].'</td>
								<td>'.$mess['datecreated'].'</td>
								<td>	
									<a href="'.base_url('ManageAdmin/seenMsgToAdmin/'.$mess['idno'].'/'.$mess['seen']).'"> Preview </a>|<a href="'.base_url('manageAdmin/removemsgtoAdmin/'.$mess['idno']).'"> Delete </a>|<a href="'.base_url('manageAdmin/bookmarkmsgtoAdmin/'.$mess['idno']).'">Bookmark </a>
								</td>
							</tr>

							';
							$thereis=true;
						}

						if($thereis==false){
							echo '<tr><td colspan="4" class="text-danger" align="center">No message received...</td></tr>';
						}
					
				?>
			</table>
		</div>
	</div>	
</div>
<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i, x,flag;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
  	flag = "no";
  	for (x = 0; x < 6; x++) {	
	    td = tr[i].getElementsByTagName("td")[x];
	    if (td) { 
	      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
	        tr[i].style.display = "";
	        flag="yes"
	      } else if(flag=="no"){
	        tr[i].style.display = "none";
	      }
	    } 
  	}
  }

</script>