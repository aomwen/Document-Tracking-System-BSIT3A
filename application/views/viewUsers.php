<style>
	.formstyle label{
		font-size:16px;
	}
	.formstyle input{
		border-radius:5px;
		margin-bottom: 10px;

	}
	.tbl1{
		margin-top:20px;
		padding:20px;
		text-align:center;
		font-size: 18px;
	}
	.tbl1 th{
		text-align: center;
		padding:5px;
	}
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
<div class="myinbox col-sm-9">
	<div class="panel panel-default">
		<div class="panel-heading" id="head">
		    <ol class="breadcrumb pull-right">
				<li><a href="<?php echo base_url('ManageAdmin/addUser'); ?>" class="btn btn-primary">Add</a></li>
				<li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
				<li class="active">Manage User Profile</li>
		    </ol>
		<h3><span class="glyphicon glyphicon-inbox"></span> Manage User Profile</h3>       
		</div>
		<div class="panel-body">
			<table class="table">
				<thead>
					<th>Username.</th>
					<th>Password</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email Address</th>
					<th>College/Office</th>
					<th>Department</th>
					<th>Position</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php
					foreach($userList as $us){
						echo '
							<tr>
								<td>'.$us['username'].'</td>
								<td>'.$us['password'].'</td>
								<td>'.$us['firstname'].'</td>
								<td>'.$us['lastname'].'</td>
								<td>'.$us['email'].'</td>
								<td>'.$us['collegeId'].'</td>
								<td>'.$us['department'].'</td>
								<td>'.$us['position'].'</td>
								<td><a href="'.base_url('ManageAdmin/editUser/'.$us['username']).'" class="btn btn-info btn-sm">Edit</a>
								<a href="'.base_url('ManageAdmin/removeUser/'.$us['username']).'" class="btn btn-info btn-sm">Remove</a></td>
								';
					}
				?>