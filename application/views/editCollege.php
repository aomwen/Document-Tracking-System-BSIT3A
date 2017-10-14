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
</style>	
<div class="myinbox col-md-9 pull-right">
	<div class="panel panel-default">
		<div class="panel-heading text-center"><a href="<?php echo base_url('AdminOffices/manageColleges');?>" class="btn btn-link pull-left" style="text-decoration: none; color: black;">
		<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbspBack </a>Add College</div>
		<div class="panel-body">
			<?php 
			foreach($colleges as $ca){
				echo'	
				<div class="col-sm-8" style="margin: auto;">
					<form method="post" action="'.base_url('AdminOffices/saveColleges').'">
						<div class="form-group">
							<label>College Acronym:</label>
							<input type="text" name="collegeId" class="form-control" value="'.$ca['collegeId'].'" />
						</div>
						<div class="form-group">
							<label>College Name:</label>
							<input type="text" name="collegefull" class="form-control" value="'.$ca['collegefull'].'" />
						</div>
						<div class="form-group">
							<label>College Description:</label>
							<input type="test" name="collegeDesc" placeholder="College of Science" class="form-control" value="'.$ca['collegeDesc'].'" />
						</div>
						<div class="form-group">
							<label>College Dean:</label>
							<input type="test" name="collegeDean" placeholder="Mwen" class="form-control" value="'.$ca['collegeDean'].'" />
						</div>
						<div class="form-group">
							<label>College Logo </label>
							<input type="file" name="collegeLogo" value="'.$ca['collegeLogo'].'" />
						</div>
					<input type="submit" value="Save" class="btn btn-info" />
					<input type="reset" value="reset" class="btn btn-info" />
				</div>
			'; }?>
		</div>
	</div>