<html>
<head>
	<title>Home</title>
</head>
<body>
	<!-- Navigation Bar -->
<nav class="navbar-fixed-top">
	<header id="header_outer" >	
	  	<div class="container">
	    	<div class="header_section">
	      		<div class="logo">
	      			<a href="javascript:void(0)"><img src="<?php echo base_url('assets/images/logoname2.png'); ?>" alt="Document Tracking System"></a>
	      		</div>
      			<nav class="nav" id="nav">
        			<ul class="toggle">
          				<li><a href="#top_content">Home</a></li>
          				<li><a href="#services">Services</a></li>
          				<li><a href="#offices">Offices</a></li>
          				<li><a href="#contact">Contact</a></li>
          				<li><a href="<?php echo base_url('Dts/log_in');?>">Log In</a></li>
          				<li><a href="<?php echo base_url('Dts/signup');?>">Sign Up</a></li>
        			</ul>
       	 			<ul class="">
          				<li><a href="#top_content">Home</a></li>
          				<li><a href="#service">Services</a></li>
          				<li><a href="#contact">Contact</a></li>
          				<li><a href="<?php echo base_url('Dts/log_in');?>">Log In</a></li>
          				<li><a href="<?php echo base_url('Dts/signup');?>">Sign Up</a></li>
        			</ul>
      			</nav>
      			<a class="res-nav_click"  href="javascript:void(0)">
      				<i class="fa-bars"></i>
      			</a>
	  		</div>
	  	</div>
	</header>
	</nav>
	<!-- Carousel -->
		<div class="carousel slide" data-ride="carousel" id="myCarousel">
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="1" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
				<li data-target="#myCarousel" data-slide-to="3"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<div class="carousel-caption">
					<h2 > YOUR DOCUMENT, LET'S TRACK IT!</h2>
					<form class="form-inline" style="padding-bottom:30%;">
						<div class="input-group">
							<input type="text" class="form-control" size="70" placeholder="Track Code" required />
								<div class="input-group-btn">
									<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
								</div>
						</div>
					</form>  
				</div>				
				<div class="item active" id="slide1">
					<img src="<?php echo base_url('assets/images/pexels-photo-4.png');?>" alt="office">			
				</div>
				<div class="item" id="slide2">
					<img src="<?php echo base_url('assets/images/pexels-photo-5.png');?>" alt="office">				
				</div>  
				<div class="item" id="slide3">
			 		<img src="<?php echo base_url('assets/images/pexels-photo-3.png');?>" alt="office">					
				</div>
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next"></a>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	<!-- Services -->
	<section id="service">
		<div class="container">
			<h2> Services </h2>
			<div class="service_area">
				<div class="row">
					<div class="col-lg-4">
						<div class="service_block">
							<img src="<?php echo base_url('assets/images/document-icon-1.png');?>" alt="Features" width="200px" height="200px" />
							<h3>Powerful Features</h3>
							<p>Automate time consuming task like going to the university just to acquire the documents needed with just a few clicks</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="service_block">
							<img src="<?php echo base_url('assets/images/document-icon-2.png');?>" alt="New York" width="200px" height="200px"/>
							<h3>Highly Secured</h3>
							<p>This Websites provides a high level of documents encryption and role based access</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="service_block">
							<img src="<?php echo base_url('assets/images/document-icon-3.png');?>" alt="San Francisco" width="200px" height="200px">
							<h3>User-friendly</h3>
							<p>TUP Document Tracking System makes things easy and convenient for the users</p>
						</div>
					</div>
				</div>				
				<div class="row">
					<div class="col-lg-4">
						<div class="service_block">
							<img src="<?php echo base_url('assets/images/document-icon-4.png');?>" alt="" height="200px" width="200px"/>
							<h3>Record Management</h3>
							<p>Allows user to track, view and transfer documents to any offices/departments within the University.</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="service_block">
							<img src="<?php echo base_url('assets/images/document-icon-5.png');?>" alt="" height="200px" width="200px"/>
							<h3>Document review and control</h3>
							<p>Enjoy complete visibility into document review process and get control over documents.</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="service_block">
							<img src="<?php echo base_url('assets/images/document-icon-6.png');?>" alt="" height="200px" width="200px"/>
							<h3>Convenient Access</h3>
							<p>Gain convenient access to documents of any type and of any offices/departments.</p>	
						</div>
					</div>								
				</div>
			</div>
		</div>
	</section>
	<footer class="footer_section" id="contact" style="background:url(<?php echo base_url('assets/images/pattern_bg.jpg')?>) repeat left top;">
		<div class="container">
			<section class="main-section contact" id="contact">
				<div class="contact_section">
					<h2>Contact</h2>
					<div class="row">
						<div class="col-lg-4">
							<div class="contact_block">
								<div class="contact_block_icon">
									<span>
										<i class="fa-home"></i>
									</span>
								</div>
								<span>Ayala Boulevard,
								</br> Ermita, Manila, Philippines</span>	
							</div>
						</div>
						<div class="col-lg-4">
							<div class="contact_block">
								<div class="contact_block_icon icon2">
									<span>
										<i class="fa-phone"></i>
									</span>
								</div>
								<span>Phone: +63(2)301.3001
								</span>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="contact_block">
								<div class="contact_block_icon icon3">
									<span>
										<i class="fa-pencil"></i>
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
					<div class="col-lg-6">
						<div class="contact-info-box address clearfix">
							<h3>Need something? Drop a comment!</h3>
							<p>Accusantium quam, aliquam ultricies eget tempor id, aliquam eget nibh et. Maecen aliquam, risus at semper. Accusantium quam, aliquam ultricies eget tempor id, aliquam eget nibh et. Maecen aliquam, risus at semper.</p>
            				<p>Accusantium quam, aliquam ultricies eget tempor id, aliquam eget nibh et. Maecen aliquampor id.</p>
						</div>
						<ul class="social-link">
							<li class="facebook"><a href="javascript:void(0)"><i class="fa-facebook"></i></a></li>
							<li class="twitter"><a href="javascript:void(0)"><i class="fa-twitter"></i></a></li>
						</ul>
					</div>
					<div class="col-lg-6">
						<div class="form">
							<input class="input-text" type="text" name="name" value="Name">
							<input class="input-text" type="text" name="email" value="Email">
							<textarea class="input-text text-area" name="comment" cols="0" rows="0">Comment</textarea>
							<input class="input-btn" type="submit" value="Send">
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="container">
			<div class="footer_bottom">
				<span>Copyright 2017. All rights reserved</span>
			</div>
		</div>
	</footer>
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