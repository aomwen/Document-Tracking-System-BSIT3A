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
	<div class="panel-heading" id="head">
		<ol class="breadcrumb pull-right">
			<li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
			<li class="active">Edit User</li>
	    </ol>
	<h3><span class="glyphicon glyphicon-inbox"></span> Edit User</h3>
	</div>
	<div class="panel panel-default">		
		<div class="panel-body">
			<div class="col-sm-7 " style="margin: auto;">
			
			<?php 
			foreach($userList as $u){ 
				echo '
				<form method="post" action="'.base_url('ManageAdmin/updateUser').'">
					<div class="form-group">
						<label>Username:</label>
						<input type="text" name="username" placeholder="e.g. Admin" class="form-control" value="'.$u['username'].'"/>
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input type="password" name="password" class="form-control" value="'.$u['password'].'"/>
					</div>
					<div class="form-group">
						<label>First Name:</label>
						<input type="text" name="firstname" class="form-control" value="'.$u['firstname'].'"/>
					</div>
					<div class="form-group">
						<label>Last Name:</label>
						<input type="text" name="lastname" class="form-control" value="'.$u['lastname'].'"/>
					</div>
					<div class="form-group">
						<label>Email Address:</label>
						<input type="text" name="email" class="form-control" value="'.$u['email'].'"/>
					</div>';
					}?>
				<div class="form-group">
					<div class="dropdown">
						<label for="sel1">College/Office</label>
						<select class="form-control" id="sel1" name="collegeId">
						<?php foreach($colleges as $c){
							echo '
							<option>'.$c['collegeId'].'</option>';
						}?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="dropdown">
						<label for="sel2">Department</label>
						<select class="form-control" id="sel2" name="department">
						<?php foreach($departments as $d){
							echo '
							<option>'.$d['department'].'</option>
							';
						}?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="dropdown">
						<label for="sel2">Position</label>
						<select class="form-control" id="sel2" name="position">
						<?php foreach($positions as $p){
							echo '
							<option>'.$p['position'].'</option>
						';
						}?>
						</select>
					</div>
				</div>
				<input type="submit" value="save" class="btn btn-info" />
				<input type="reset" value="reset" class="btn btn-info" />
			</form>
			</div>
		</div>