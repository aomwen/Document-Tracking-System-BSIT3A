<style>
.breadcrumb{
  margin-top:10px;
}

.mysent{
	margin-top: 75px;
	margin-left: 305px;
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
</style>
<div class="mysent col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading" id="head">
		    <ol class="breadcrumb pull-right">
		      <li><a href="<?php echo base_url('DocumentStatus/mydocuments_view'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
		      <li class="active">Offices</li>
		    </ol>    
		    <h3><span class="glyphicon glyphicon-inbox"></span> Offices</h3>       
		</div>
		<div class="panel-body">
			<?php
				foreach($colleges as $col){
					echo'
					<div class="thumbnail text-center col-sm-3" style="background-color:lightgray; border-width: 2px;  height:25%; padding:10px;">
						<a href="'.base_url('Office/office_content/'.$col['college_acronym']).'" style="text-decoration: none;">
						<div style="color: black">
							<img class="img-responsive text-center" src="'.$col['college_logopath'].'" style=" height: 150px;  margin-top: 10px; border-radius: 90%;">
							<hr style="width:80%;"  />
					'.$col['college_desc'].'<br />
					</div></a>
				</div>';
				}
			?>
		</div>	
	</div>	
</div>	