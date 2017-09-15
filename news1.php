<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/design.css" />
	<title> Document Tracking System </title>
</head>
<body>
<div class="container-fluid">
	<div id="box-wrapper" >
		<nav class="navbar navbar-inverse"id="header">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					<img class="pull-left" src="images/doctrack_logo.png" id="logo"/>
					<a class="navbar-brand" href="#"> Document Tracking System </a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="#"> HOME </a></li>
						<li><a href="#"> GUIDE </a></li>
						<li><a href="#"> ABOUT </a></li>	
						<li><a href="#"> CONTACT </a></li>
						<li><a href="#"> OFFICES </a></li>	
						<li><a href="#" data-toggle="modal" data-target="#Login"> LOGIN </span></a></li>					
					</ul>
				</div>
			</div>
		</nav>
	</div>
	<div class="container">
		<div class="alert alert-danger text-center">
			<div class="media">
				<div class="media-left">
					<img src="images/news.jpg" class="media-object" height="60px;">
				</div>
				<div class="media-body">
					<h1 class="media-heading"> NEWS </h1>
				</div>
			</div>
		</div>
		<table>
		<div class="row">
			<div class="col-sm-12">
				<?php
					$host = "localhost";
					$user = "root";
					$pass = "";
					$dbase = "webproj";
					$db = mysqli_connect($host, $user, $pass, $dbase);
					if(!($db)){
						echo "Error connecting to db";
					}	
					$sql = "SELECT * from news ORDER BY nno";
					$sql1 = "SELECT * from news ORDER BY nno DESC LIMIT 1";
					$result = mysqli_query($db, $sql);
					$result1 = mysqli_query($db, $sql1);
					if($row1 = mysqli_fetch_array($result1)){
						do{
							echo'
								<tr>
									<td class="center">
										<a href="#"><img src="images/closeup.jpg" height="100%"></a><br />
										<a href="#">'.$row1['ntitle'].'</a>
									</td>
								</tr>
								';
						}while($row1=mysqli_fetch_array($result1));
					}
					if ($row = mysqli_fetch_array($result)){
						do{
							echo '
							<tr>
								<td class="center">
									
									<a href="#"><img src="images/ass.jpg" height="100px"></a><br />
									<a href="#">'. $row['ntitle'].'</a>
								</td>
							</tr>
							';
						}while($row = mysqli_fetch_array($result));
					}
				?>
			</div>
		</div>
		</table>
	</div>
	<footer id="footer" class="container-fluid fixed-bottom" style="background-color: #2f2f2f;box-sizing:border-box;">
			<div class="row" style=" color:white; padding:1%;">
				<div class="col-sm-4">
					<p class="text-center">TUP DOCUMENT TRACKING SYSTEM</p>
					<p class="text-center">&copy; Copyright 2017. All rights reserved</p>
				</div>
				<div class="col-sm-4" style="">
					<p class="text-center">POPULAR LINKS</p>
						<ul class="breadcrumb" style="background-color: #2f2f2f">
							<li><a href="#">Home</a></li>
							<li><a href="#">Guide</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#">Contact</a></li> 
							<li><a href="#">Campuses</a></li>
							<li><a href="#">Login</a></li>
						</ul>
				</div>
				<div class="col-sm-4">
				  <p class="text-center">CONTACT US</p>
				  <p class="text-center">AYALA BOULEVARD, ERMITA,</p>
				  <p class="text-center">MANILA, PHILIPPINES</p>
				  <p class="text-center">PHONE: +63(2)301.3001</p>
				</div>
			</div>
		</footer>
</div>
</html>