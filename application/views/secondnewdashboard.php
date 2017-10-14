<html>
<head>
	<title>Document Tracking System Homepage</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link href="<?php echo base_url('bootstrap/css/bootstrap.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('bootstrap/css/bootstrap-theme.css'); ?>" rel="stylesheet" />
	<script src="<?php echo base_url('bootstrap/js/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('bootstrap/js/bootstrap.min.js'); ?>"></script> -->

	<link rel="stylesheet" href="../../maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="../../ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="../../maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/secondnewdashboardstyle.css'); ?>">
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
		  
		  $(window).scroll(function() {
		    $(".slideanim").each(function(){
		      var pos = $(this).offset().top;

		      var winTop = $(window).scrollTop();
		        if (pos < winTop + 600) {
		          $(this).addClass("slide");
		        }
		    });
		  });
		})
	</script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#myPage" style="font-family: Ebrima; font-size:22px;">Document Tracking System</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#myPage">HOME</a></li>
					<li><a href="#services">SERVICES</a></li>
					<li><a href="#contact">CONTACT</a></li>
					<li><a href="<?php echo base_url('Access/log_in');?>">LOG IN</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="jumbotron text-center" style="background-image: url('<?php echo base_url('assets/images/homepagebg.jpg'); ?>');  background-repeat: no-repeat; background-size: cover">
		<h1 class="h1style">Let's track your document!</h1>
		<h2 class="h2style">We will guide you in every single step</h2>
		<a  href="<?php echo base_url('HomeFunction/gotoDocumentTrack')?>"><button class="btn-info btn-lg">Track Now!</button></a>
	</div>
	<!-- Services -->
	<div class="container-fluid" id="services">
		<section  class="container text-center" >
			<h2 class="h2style">Services</h2>
			<h4 class="h4style">What we provide</h4>
			<br>
			<div class="row slideanim">
				<div class="col-sm-4">
					<img src="<?php echo base_url('assets/images/document-icon-1.png');?>" alt="Features" width="200px" height="200px" />
					<h4 class="h4style">Powerful Features</h4>
					<p class="pstyle">Automate time consuming task like going to the university just to acquire the documents needed with just a few clicks</p>
				</div>
				<div class="col-sm-4">
					<img src="<?php echo base_url('assets/images/document-icon-2.png');?>" alt="New York" width="200px" height="200px"/>
					<h4 class="h4style">Highly Secured</h4>
					<p class="pstyle">This Websites provides a high level of documents encryption and role based access</p>
				</div>
				<div class="col-sm-4">
					<img src="<?php echo base_url('assets/images/document-icon-3.png');?>" alt="San Francisco" width="200px" height="200px">
					<h4 class="h4style">User-friendly</h4>
					<p class="pstyle">TUP Document Tracking System makes things easy and convenient for the users</p>
				</div>
			</div>
			<br /><br />
			<div class="row slideanim">
				<div class="col-sm-4">
					<img src="<?php echo base_url('assets/images/document-icon-4.png');?>" alt="" height="200px" width="200px"/>
					<h4 class="h4style">Record Management</h4>
					<p class="pstyle">Allows user to track, view and transfer documents to any offices/departments within the University.</p>
				</div>
				<div class="col-sm-4">
					<img src="<?php echo base_url('assets/images/document-icon-5.png');?>" alt="" height="200px" width="200px"/>
					<h4 class="h4style">Document review and control</h4>
					<p class="pstyle">Enjoy complete visibility into document review process and get control over documents.</p>
				</div>
				<div class="col-sm-4">
					<img src="<?php echo base_url('assets/images/document-icon-6.png');?>" alt="" height="200px" width="200px"/>
					<h4 class="h4style">Convenient Access</h4>
					<p class="pstyle">Gain convenient access to documents of any type and of any offices/departments.</p>
				</div>
			</div>
		</section>
	</div>
	<!-- Contact and Footer-->
	<footer class="footer_section" id="contact" style="background:url(<?php echo base_url('assets/images/pattern_bg.jpg')?>) repeat left top;">
		<div class="container">
			<section class="main-section contact" id="contact">
				<div class="contact_section">
					<h2 class="h2style">Contact</h2>
					<div class="row">
						<div class="col-sm-4">
							<div class="contact_block">
								<div class="contact_block_icon">
									<span>
										<i class="glyphicon glyphicon-home"></i>
									</span>
								</div>
								<span>Ayala Boulevard,
								</br> Ermita, Manila, Philippines</span>	
							</div>
						</div>
						<div class="col-sm-4">
							<div class="contact_block">
								<div class="contact_block_icon icon2">
									<span>
										<i class="glyphicon glyphicon-earphone"></i>
									</span>
								</div>
								<span>Phone: +63(2)301.3001
								</span>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="contact_block">
								<div class="contact_block_icon icon3">
									<span>
										<i class="glyphicon glyphicon-link"></i>
									</span>
								</div>
								<span>
									<a href="www.tup.edu.ph">tup.edu.ph</a>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="contact-info-box address clearfix">
							<h3 class="h3style">Need something? Drop a comment!</h3>
							<p class="pstyle">Accusantium quam, aliquam ultricies eget tempor id, aliquam eget nibh et. Maecen aliquam, risus at semper. Accusantium quam, aliquam ultricies eget tempor id, aliquam eget nibh et. Maecen aliquam, risus at semper.</p>
            				<p class="pstyle">Accusantium quam, aliquam ultricies eget tempor id, aliquam eget nibh et. Maecen aliquampor id.</p>
						</div>
					</div>
					<div class="col-sm-6">
						<form class="form" method="POST" action="<?php echo base_url('HomeFunction/msgtoAdmin');?>">
							<input class="input-text" type="text" name="author" placeholder="Name">
							<input class="input-text" type="text" name="email" placeholder="Yourname@gmail.com">
							<textarea class="input-text text-area" name="content" cols="0" rows="0" placeholder="Comment"></textarea>
							<input class="input-btn" type="submit" value="Send">
						</form>
					</div>
				</div>
			</section>
		</div>
		<div class="container">
			<div class="footer_bottom">
				<a href="#myPage" title="To Top">
			    	<span class="glyphicon glyphicon-chevron-up"></span>
			  	</a>
				<span>Copyright 2017. All rights reserved</span>
			</div>
		</div>
	</footer>
</body>
</html>