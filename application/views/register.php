<!DOCTYPE html>
<html lang="en">
<html>
<head>
	<link href="<?php echo base_url('assets/css/loginsignupstyle.css'); ?>" rel="stylesheet" />
</head>
<body style="
		background: url(<?php echo base_url('assets/images/signup.jpeg');?>) no-repeat; background-size: cover;">
	<div class="container">
		<h3 class="text-center">Sign Up</h3>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default" id="panel-body">
					<div class="panel-body">
						<form class="text-center" action="<?php base_url('Access/signup');?>" method="POSt">
							<div class="form-group">
								<label class="pull-left"> Name: </label>
								<input type="text" class="form-control input-md" placeholder="Full Name" name="full_name">
							</div>					
							<div class="form-group">
								<label class="pull-left"> Email Address: </label>
								<input type="text" class="form-control input-md" placeholder="Email Address" name="email_address">
							</div>
							<div class="form-group">
								<label class="pull-left"> Username: </label>
								<input type="text" class="form-control input-md" placeholder="Username" name="Username">
							</div>							
							<div class="form-group">
								<label class="pull-left"> Password: </label>
								<input type="password" class="form-control input-md" placeholder="Password" name="Password">
							</div>
							<div class="form-group">
								<label class="pull-left"> Position: </label>
								<input type="text" class="form-control input-md" placeholder="Position" name="position">
							</div>
							<div class="form-group">
								<label class="pull-left"> College: </label>
								<input type="text" class="form-control input-md" placeholder="College" name="college">
							</div>			
							<div class="form-group">
								<label class="pull-left"> Department: </label>
								<input type="text" class="form-control input-md" placeholder="Department" name="department">
							</div>
							
							<div class="form-group">
								<input type="submit" id="input-btn" class="btn btn-block btn-md btn-primary" value="Create an Account">
							</div>
							<a class="pull-left" href="<?php echo base_url('DTS/index');?>" >Back to Home</a>										
						</form>	
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>