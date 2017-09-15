<!DOCTYPE html>
<html lang="en">
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/design.css" />
	<title> Document Tracking System </title>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
	<div>
		<div class="container-fluid" id="box-wrapper">
			<nav class="navbar navbar-inverse navbar-fixed-top" id="header">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>                        
						</button>
						<img class="pull-left" src="<?php echo base_url('assets/images/doctrack_logo.png');?>" id="logo"/>
						<a" class="navbar-brand" href="#myCarousel"> Document Tracking System </a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="#service"> SERVICES </a></li>	
							<li><a href="#about"> ABOUT </a></li>	
							<li><a href="#contact"> CONTACT </a></li>
							<li><a href="#offices"> OFFICES </a></li>
							<li><a href="#guide"> GUIDE </a></li>	
							<li><a href="#" data-toggle="modal" data-target="#Login"> LOGIN </span></a></li>							
							
						</ul>
					</div>
				</div>
			</nav>
		</div>

		<div class="modal fade" id="Login" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class ="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times; </button>
						<h3 class="text-center"> Log In </h3>
					</div>
					<div class="modal-body">
						<form class="col-md-12 center-block">
							<div class="form-group">
								<input type="text" class="form-control input-md" placeholder="Username">
							</div>
							<div class="form-group">
								<input type="password" class="form-control input-md" placeholder="Password">
							</div>						
							<div class="form-group">
								<input type="submit" class="btn btn-block btn-md btn-primary" value="Login">
							</div>				
						</form>
					</div>	
					<div class="modal-footer">
						<span><a href="#Register"> Register </a></span>
						<button type="button" class="btn btn-default" data-dismiss="modal"> Cancel </button>
					</div>
				</div>	
			</div>		
		</div>
		
		<div class="carousel slide" data-ride="carousel" id="myCarousel">
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="1" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
				<li data-target="#myCarousel" data-slide-to="3"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-caption">
					<h2> YOUR DOCUMENT, LET'S TRACK IT!</h2>
					<form class="form-inline" style="padding-bottom:10%;">
						<div class="input-group">
							<input type="text" class="form-control" size="70" placeholder="Track Code" required />
								<div class="input-group-btn">
									<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
								</div>
						</div>
					</form>  
				</div>				
				<div class="item active" id="slide1">
					<img src="<?php echo base_url('assets/images/bg3.jpg');?>" alt="lady" style="width:100%; height:auto;">			
				</div>
				<div class="item" id="slide2">
					<img src="<?php echo base_url('assets/images/bg4.jpg');?>" alt="lady" style="width:100%; height:auto;">				
				</div>  
				<div class="item" id="slide3">
					<img src="<?php echo base_url('assets/images/bg5.jpg');?>" alt="ass" style="width:100%; height:auto;">					
				</div>
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next"></a>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>	

		<!-- SERVICES -->
			<div class="row text-center" id="service">
				<h2 class="page-header"> Services </h2>
			</div>
			<div class="row text-center" style="padding:2%;">
				<div class="col-sm-4">
					<div class="thumbnail">
						<img src="<?php echo base_url('assets/images/document-icon-1.jpg');?>" alt="Features" width="200px" height="200px" />
							<p><strong>Powerful Features</strong></p>
							<p>Automate time consuming task like going to the university just to acquire the documents needed with just a few clicks</p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="thumbnail">
						<img src="<?php echo base_url('assets/images/document-icon-2.jpg');?>" alt="New York" width="200px" height="200px"/> <br />
							<p><strong>Highly Secured</strong></p>
							<p>This Websites provides a high level of documents encryption and role based access</p>
							<br />
					</div>
				</div>
				<div class="col-sm-4">
					<div class="thumbnail">
						<img src="<?php echo base_url('assets/images/document-icon-3.jpg');?>" alt="San Francisco" width="200px" height="200px"> <br />
							<p><strong>User-friendly</strong></p>
							<p>TUP Document Tracking System makes things easy and convenient for the users</p> <br />
					</div>
				</div>	
			</div>
			<div class="row text-center" style="padding:2%;">
				<div class="col-sm-4">
					<div class="thumbnail">
						<img src="<?php echo base_url('assets/images/document-icon-4.jpg');?>" alt="" height="200px" width="200px"/>
						<p><strong>Record Management</strong></p>
						<p>Allows user to track, view and transfer documents to any offices/departments within the University.</p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="thumbnail">
						<img src="<?php echo base_url('assets/images/document-icon-5.jpg');?>" alt="" height="200px" width="200px"/>
						<p><strong>Document review and control</strong></p>
						<p>Enjoy complete visibility into document review process and get control over documents.</p>					
					</div>
				</div>
				<div class="col-sm-4">
					<div class="thumbnail">
						<img src="<?php echo base_url('assets/images/document-icon-6.jpg');?>" alt="" height="200px" width="200px"/>
						<p><strong>Convenient Access</strong></p>
						<p>Gain convenient access to documents of any type and of any offices/departments.</p>					
					</div>
				</div>								
			</div>

		<div id="contact" class="container-fluid " style="background-color: #f3f2f2;padding: 2%;">
			<div  class="row text-center bg-grey">
				<h2 class="page-header"> Contact </h2>
			</div>
			<div  class="container">
	  			<div class="row">
				    <div class="col-md-4">
				      <p>Fan? Drop a note.</p>
				      <p><span class="glyphicon glyphicon-map-marker"></span>Ayala Boulevard, Ermita, Manila, Philippines</p>
				      <p><span class="glyphicon glyphicon-phone"></span>Phone: +63(2)301.3001</p>
				      <p><span class="glyphicon glyphicon-envelope"></span>Email: tup.edu.ph</p>
				    </div>
				    <div class="col-md-8">
				      	<div class="row">
				        	<div class="col-sm-6 form-group">
				          		<input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
				        	</div>
				        	<div class="col-sm-6 form-group">
				          		<input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
				        	</div>
				      	</div>
				      	<textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
				      	<br>
				      	<div class="row">
				        	<div class="col-md-12 form-group">
				          		<button class="btn pull-right" type="submit">Send</button>
				        	</div>
				      	</div>
				    </div>
			 	</div>
			</div>		
		</div>
	<div>


	<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

   // Make sure this.hash has a value before overriding default behavior
  if (this.hash !== "") {

    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 900, function(){

      // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
      });
    } // End if
  });
})
</script>
</body>
</html>