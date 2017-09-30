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

</style>	
<div class="myinbox col-md-9">
	<div class="panel panel-default">
    <div class="panel-heading text-center" id="head"> Offices	<a href="<?php echo base_url('AdminOffices/add_colleges'); ?>" class="btn btn-link pull-right" style="text-decoration: none; color:black;" >
	<span class="glyphicon glyphicon-plus-sign"></span>&nbspAdd </a></div>
	<div class="panel-body">
		<?php
			foreach($colleges as $col){
				echo'
				<div class="thumbnail text-center col-sm-3" style="background-color:lightgray; border-width: 2px;  height:25%; padding:10px;">
					<a href="'.base_url('AdminOffices/office_content/'.$col['college_acronym']).'" style="text-decoration: none;">
						<div style="color: black">
							<img class="img-responsive" src="'.$col['college_logopath'].'" style=" height: 150px;  margin: auto; border-radius: 90%;">
							<hr style="width:80%;"  />
							'.$col['college_desc'].'<br />
						</div>
					</a>
					<a href="'.base_url('AdminOffices/update_college/'.$col['college_acronym']).'"><span class="glyphicon glyphicon-edit"></span></a>
					<a href="'.base_url('AdminOffices/remove_college/'.$col['college_acronym']).'"><span class="glyphicon glyphicon-remove-sign" style="color: black"></span></a>
				</div>';
			}
		?>
	</div>
</div>