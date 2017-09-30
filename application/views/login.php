<!-- <!DOCTYPE html>
<html lang="en">
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/login-design.css" />
	<title> Shaarii Shaarii Store </title>
</head>-->
<body style="
		background: url(<?php echo base_url('assets/images/login.jpg');?>) no-repeat; background-size: cover;">
	<div class="container" style="margin-top: 10%;">
		<h3 class="text-center">Log In</h3>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default" id="panel-body">
					<div class="panel-body">
						<form class="text-center" method="POST" action="<?php echo base_url('Access/log_in');?>">
							<div class="form-group">
								<label class="pull-left">Username</label>
								<input name="Username" type="text" class="form-control input-md" placeholder="Username">
							</div>
							<div class="form-group">
								<label class="pull-left">Password</label>
								<input type="password" name="Password" class="form-control input-md" placeholder="Password">
							</div>						
							<div class="form-group">
								<?php
									if($error&&$error!=null){
										echo'<p class="text-danger" >'.$error.'</p>';
									}
								?>
								<input type="submit" class="btn btn-block btn-md btn-primary" value="Login">
							</div>		
							<a class="pull-left" href="<?php echo base_url('DTS/index');?>" >Back to Home</a>		
						</form>	
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default" id="panel-footer">
					<div class="panel-footer text-center">
						<p> Don't have an account yet??
						<a href="<?php echo base_url('login-signup-sessions/signup');?>">Create an Account.</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>