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
				<li><a href="<?php echo base_url('ManageRegistrarDocu/add_user'); ?>" class="btn btn-primary">Add</a></li>
				<li><a href="<?php echo base_url('DocumentStatus/mydocuments_view'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
				<li class="active">Manage User Profile</li>
		    </ol>
		<h3><span class="glyphicon glyphicon-inbox"></span> Manage User Profile</h3>       
		</div>
		<div class="panel-body">
			<table class="table">
				<thead>
					<th>ID No.</th>
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
					foreach($userdata1 as $us1){
						echo '
							<tr>
								<td>'.$us1['idno'].'</td>
								<td>'.$us1['username'].'</td>
								<td>'.$us1['password'].'</td>
								<td>'.$us1['firstname'].'</td>
								<td>'.$us1['lastname'].'</td>
								<td>'.$us1['email_address'].'</td>
								<td>'.$us1['college_acronym'].'</td>
								<td>'.$us1['department'].'</td>
								<td>'.$us1['position'].'</td>
								<td><a href="'.base_url('ManageRegistrarDocu/edit_user/'.$us1['username']).'" class="btn btn-info btn-sm">Edit</a>
								<a href="'.base_url('ManageRegistrarDocu/remove_user/'.$us1['username']).'" class="btn btn-info btn-sm">Remove</a></td>
								';
					}
				?>