<head>
	<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />
</head>	
<div class="myinbox col-sm-9">
	<div class="panel-heading" id="head">
	    <ol class="breadcrumb pull-right">
			<li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
			<li class="active">Manage User Profile</li>
	    </ol>
		<h3><span class="glyphicon glyphicon-inbox"></span> Manage User Profile</h3>       
	</div>
	<div class="panel panel-default">
		<div class="panel-body">
			<a href="<?php echo base_url('ManageAdmin/addUser'); ?>" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span> Add</a>
		</div>		
		<div class="table-responsive">
			<table id="myTable" class="docstatus table-bordered table-hover table-responsive table-center text-center" width="100%">
				<tr>
					<th>Username</th>
					<th>Password</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email Address</th>
					<th>College/Office</th>
					<th>Department</th>
					<th>Position</th>
					<th>Action</th>
				</tr>
				<?php
					$thereis=false;
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
								<td><a href="'.base_url('ManageAdmin/editUser/'.$us['username']).'" class="btn btn-info btn-sm">Edit</a>'; ?>
								<a href="#" onClick="deleteUser('<?php echo $us['username'];?>')" class="btn btn-info btn-sm">Remove</a>
				<?php	echo '	</td>
								';
						$thereis=true;
					}
					if($thereis==false){
						echo '<tr><td colspan="9">No user registered...</td></tr>';
					}
				?>
			</table>
		</div>
	</div>
</div>


	<script type="text/javascript">
      function deleteUser(id){
       // console.log(id);
        var ans = confirm("Are you sure to delete this user?");
       // alert(id);
        if(ans==true){
          //redirect to delete method
          var url="<?php echo base_url('ManageAdmin/removeUser/');?>"+id;
          location.href = url;
          alert("The user has been successfully deleted!");
        }
      }
     
 </script>