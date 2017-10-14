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
	<?php
	foreach($colleges as $cl){
	echo'
		<div class="panel-heading text-center"> 
		<a href="'.base_url('AdminOffices/officeContent/'.$cl['collegeId'].'').'" class="btn btn-link pull-left" style="text-decoration: none; color: black;" >
		';
	}?>
		<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbspBack </a>Add Department</div>
		<div class="panel-body">
		<?php 
		foreach($colleges as $cl){
			
		echo form_open_multipart('AdminOffices/addDepartment/'.$cl['collegeId'].'');}
		?>
		<div class="col-sm-8" style="margin: auto;">
			<div class="form-group">
			<?php
				echo '<label>ID No:</label>
			<input type="text" name="deptId" value="'.$idno.'" class="form-control" readonly />';?>
			</div>
			<div class="form-group">
			<label>Department:</label>
			<input type="text" name="department" placeholder="i.e. Math Department" class="form-control" />
			</div>
			<input type="submit" value="Add" class="btn btn-info" />
			<input type="reset" value="reset" class="btn btn-info" />
		</div>
	</body>
</html>