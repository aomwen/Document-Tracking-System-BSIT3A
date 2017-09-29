<!DOCTYPE html>
<html lang="en">
<html>
<head>
	<link href="<?php echo base_url('assets/css/loginsignupstyle.css'); ?>" rel="stylesheet" />
</head>
<body style="
		background: url(<?php echo base_url('assets/images/signup.jpeg');?>) no-repeat; background-size: cover;">
	<div class="container" style="margin-top: 5%;">
		<h3 class="text-center" style="margin-bottom: 5%;">Log In</h3>
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
								<input type="submit" id="input-btn" class="btn btn-block btn-md btn-primary" value="Login">
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
						<a href="register.php">Create an Account.</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div><!-- 
	<footer>
		<div class="container">
			<div class="col-md-4 col-md-offset-4">
				<ul class="text-center">
					<li><a href="#">Terms</a></li>
					<li><a href="#">Privacy</a></li>
					<li><a href="#">Security</a></li>
					<li><a href="#">Contact</a></li> 
				</ul>
			</div>		
		</div>
	</footer> -->
</body>
</html>