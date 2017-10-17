<html>
<head>
	<meta name="viewport" content="width=device-width; initial-scale=1.0" />
	<meta name="author" content="Team Bah" />
	<meta name="description" content="The description of website" />
	<link href="<?php echo base_url('bootstrap/css/bootstrap.css');  ?>" rel="stylesheet" />
	<link href="<?php echo base_url('bootstrap/css/bootstrap-theme.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('bootstrap/css/profile-design-inside.css'); ?>" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/secondnewdashboardstyle.css'); ?>">
</head>	
<div class="container-default" id="box-wrapper">
	<nav class="navbar navbar-default navbar-fixed-top"> 
		<div class="container-default">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="mainNavBar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
<!-- 				<img class="pull-left" src="<?php echo base_url('assets/images/doctrack_logo.png');?>" id="logo"/>   -->
				<a class="navbar-brand" href="#myPage" style="font-family:Courgette; font-size:22px; color:#015249 !important;">Document Tracking System</a>
			</div>
			<div class="collapse navbar-collapse" id="mainNavBar">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown notif-menu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span id="bell" class="glyphicon glyphicon-bell"></span></a>
						<ul class="dropdown-menu">
							<li class="notif-header"><p>Notifications</p></li>
							<li class="notif-body">
								<ul class="notifs">
									<?php
										if(isset($notifs)){
											foreach($notifs as $notif){
												if($notif['seenFlag']==FALSE){
													echo '
													<li>
														<a href="';
														if($notif['notifType'] == 'inbox'){
															echo base_url('/Notificationpath/notifToInbox/'.$notif['trackcode'].'');
														}
													echo '">'.$notif['notifDesc'].'</a>
													</li>
													<hr />';	
												}
											}
										}
									?>	
								</ul>
							</li>	
							<li class="notif-footer"><p>View All</p></li>						
						</ul>	
					</li>
					<li class="dropdown user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?php echo base_url('assets/images/pic.png'); ?>" class="user-image" alt="User Image" />
							<span class="hidden-xs">Username</span>
						</a>
						<ul class="dropdown-menu">
							<li class="user-header">
								<?php
								foreach($userdata as $us){
									echo '<img src="'.$us['path'].'" class="img-circle" alt="User Image" />';
								}
								?><p><?php echo $_SESSION['username']; ?>
									<small>POSITION</small>
								</p>
							</li>
							<li class="user-body">
								<div>
									<a href="<?php echo base_url('Account/viewAccount'); ?>" class="btn btn-default pull-left">Account Settings</a>
									<a href="<?php echo base_url('Access/logout'); ?>" class="btn btn-default pull-right">Sign Out</a>
								</div>	
							</li>
						</ul>	
					</li>
				</ul>		
			</div>
		</div>
	</nav>
</div>			
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3 profile">
			<div class="profile-sidebar">
				<div class="profile-user-pic">
					<img src="<?php echo base_url('assets/images/pic.png'); ?>" alt="Profile Picture" class="img-responsive image-circle">
				</div>
				<div class="profile-user-title">
					<?php
					foreach($userdata as $us){
					echo '
		            <div class="profile-user-name">'.$us['firstname'].' '.$us['lastname'].'</div>
		            <div class="profile-user-position">'.$us['position'].' </div>
		            <div class="profile-user-position">'.$us['department'].' </div>
		            <div class="profile-user-position">'.$us['collegeId'].' </div>';	
		            }?>
			        <div class="profile-user-menu">
		              	<div class="profile-user-button1">
		                <a href="<?php echo base_url('FilesManipulation/sendFile'); ?>" class="" role="button" style="margin-right: 5px;"><span class="glyphicon glyphicon-pencil"></span> COMPOSE </a> 
		                <a href="<?php echo base_url('FilesManipulation/sendFile'); ?>" class="" role="button" style="margin-right: 5px;"><span class="glyphicon glyphicon-pencil"></span> MANAGE </a>  
	              	</div>         
					<div class="profile-user-menu">
						<ul class="nav">
					      <li class="active"><a href="<?php echo base_url('ManageAdmin/viewmsgtoAdmin');?>"><span class="glyphicon glyphicon-star"></span><span>&nbsp; &nbsp; User Reviews </span></a></li>
					      <li><a href="<?php echo base_url('AdminOffices/manageColleges');?>"><span class="glyphicon glyphicon-map-marker"></span><span>&nbsp; &nbsp; Manage Offices </span></a></li>
					      <li><a href="<?php echo base_url('ManageAdmin/viewDocuments');?>"><span class="glyphicon glyphicon-signal"></span><span>&nbsp; &nbsp;Manage Registrar Status </span></a></li>
					      <li><a href="<?php echo base_url('ManageAdmin/viewUsers');?>"><span class="glyphicon glyphicon-user"></span><span>&nbsp; &nbsp;Manage Users </span></a></li>
					    </ul>              
					</div>                  
				</div>
			</div>
		</div>
	</div>
</div>					