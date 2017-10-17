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
			<li class="active">Add New User</li>
	    </ol>
	<h3><span class="glyphicon glyphicon-inbox"></span> Add New User</h3>
	</div>
	<div class="panel panel-default">		
		<div class="panel-body">
	       <form method="post" id="formUser">
			<div class="col-sm-7 col-sm-offset-1" style="margin: auto;">
				<div class="form-group">
					<label>Username:</label>
					<input type="text" name="username" placeholder="e.g. Admin" class="form-control" id="username"/>
				</div>
				<div class="form-group">
					<label>First Name:</label>
					<input type="text" name="firstname" class="form-control" id="firstname"/>
				</div>
				<div class="form-group">
					<label>Last Name:</label>
					<input type="text" name="lastname" class="form-control" id="lastname"/>
				</div>
				<div class="form-group">
					<label>Email Address:</label>
					<input type="text" name="email" class="form-control" id="email"/>
				</div>
				<div class="form-group">
					<div class="dropdown">
						<label for="sel1">College/Office</label>
						<select class="form-control" id="sel1" name="collegeId" id="collegeId">
						<?php foreach($colleges as $c){
							echo '
							<option>'.$c['collegeId'].'</option>
							';
						}?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="dropdown">
						<label for="sel2">Department</label>
						<select class="form-control" id="sel2" name="department" id="department">
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
						<select class="form-control" id="sel2" name="position" id="position">
						<?php foreach($positions as $p){
							echo '
							<option>'.$p['position'].'</option>
							';
						}?>
						</select>
					</div>
				</div>
				<div class="pull-right">
				<input type="submit" value="Add" class="btn btn-primary" />
				<input type="reset" value="Reset" class="btn btn-primary" />
				</div>
			</div>
		</div>

<script>
 $('#formUser').on('submit',function(e){
    e.preventDefault();
    if($('#username').val() != '' && $('#firstname').val() != '' && $('#lastname').val() != '' && $('#email').val() != '' && $('#collegeId').val() != '' && $('#department').val() != '' && $('#position').val() != ''){
    	var email = $('#email').val();
        
        if (validateEmail(email)) {
          $.ajax({
          url:"<?php echo base_url(); ?>ManageAdmin/addUser", 
          method:"POST",
          data:new FormData(this),
          contentType:false,
          cache:false,
          processData:false,
          success:function(data){
            $('#photo_profile').html(data);
          }

        });
        }else{
        	alert('Invalid Email Address');
        }
      
  }else{
        alert("Please Fill in the required fields.");
  }
  });
 function validateEmail(email) {
	    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	    if (filter.test(email)) {
	        return true;
	    }
	    else {
	        return false;
	    }
	}

</script>