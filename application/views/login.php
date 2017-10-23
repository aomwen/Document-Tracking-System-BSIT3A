<!DOCTYPE html>
<html lang="en">
	<head>
		<link href="<?php echo base_url('assets/css/loginsignupstyle.css'); ?>" rel="stylesheet" />
	</head>
	<body class="overlay" style="background: url('<?php echo base_url('assets/images/03.jpg'); ?>'); background-size: cover; background-position: center; background-attachment: fixed; background-repeat: no-repeat; color: #ffffff;">
			<div class="container" >
				<h3 class="text-center" style="margin-bottom: 5%;">Log In</h3>
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<div class="panel panel-default" id="panel-body">
							<div class="panel-body">
								<form class="text-center" method="POST" action="<?php echo base_url('Access/logIn');?>">
				                	<div class="input-group">
				                  		<div class="input-group-addon">
				                    		<span class="glyphicon glyphicon-user"></span>
				                  		</div>
				                  		<input name="Username" type="text" class="form-control input-md" placeholder="Username">
				                	</div>
				                	<div class="input-group">
				                  		<div class="input-group-addon">
				                    		<span class="glyphicon glyphicon-lock"></span>
				                  		</div>
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
									<a class="pull-left" title="Back to home" href="<?php echo base_url('DTS/index');?>" ><span class="glyphicon glyphicon-circle-arrow-left"></span> Back to Home</a>		
								</form>	
							</div>
						</div>
					</div>
				</div>
			</div>
	</body>
</html>

