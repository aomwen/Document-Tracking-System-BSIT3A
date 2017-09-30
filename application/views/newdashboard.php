<html>
<head>
	<title>Home</title>
	<link href="<?php echo base_url('assets/css/newdashboardstyle.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/font-awesome.css'); ?>" rel="stylesheet" />
	<script type="text/javascript">
		function myFunction() {
		    var x = document.getElementById("myTopnav");
		    if (x.className === "topnav") {
		        x.className += " responsive";
		    } else {
		        x.className = "topnav";
		    }
		}
</script>
</head>
<body>
	<!-- Navigation Bar -->
<div class="row" style="box-sizing: border-box;">
	<nav class="navbar-fixed-top" id="header">
		<header id="header_outer" >	
		  	<div class="container">
		    	<div class="header_section">
		    		<div class="topnav" id="myTopnav">
	  					<a class="col-sm-4" href="#" style="float:left;">
	  						<img src="<?php echo base_url('assets/images/logoname2.png'); ?>" alt="Document Tracking System" style="max-width:100%; height:auto;">
	  					</a>
	  					<a id="drop" href="#">Home</a></li>
	  					<a id="drop" href="#service">Services</a>
	  					<a id="drop" href="#contact">Contact</a>
	      				<a id="drop" href="<?php echo base_url('Access/log_in');?>">Log In</a>
	      				<a href="javascript:void(0);" style="font-size:16px;" class="icon" onclick="myFunction()">&#9776;</a>
					</div>
		  		</div>
		  	</div>
		</header>
	</nav>
</div>
	
	<!-- Services -->
	<section id="service">
		<div class="container">
			<h2 class="h2style"> Services </h2>
			<div class="service_area">
				<div class="row">
					<div class="col-lg-4">
						<div class="service_block">
							<img src="<?php echo base_url('assets/images/document-icon-1.png');?>" alt="Features" width="200px" height="200px" />
							<h3 class="h3style">Powerful Features</h3>
							<p class="pstyle">Automate time consuming task like going to the university just to acquire the documents needed with just a few clicks</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="service_block">
							<img src="<?php echo base_url('assets/images/document-icon-2.png');?>" alt="New York" width="200px" height="200px"/>
							<h3 class="h3style">Highly Secured</h3>
							<p class="pstyle">This Websites provides a high level of documents encryption and role based access</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="service_block">
							<img src="<?php echo base_url('assets/images/document-icon-3.png');?>" alt="San Francisco" width="200px" height="200px">
							<h3 class="h3style">User-friendly</h3>
							<p class="pstyle">TUP Document Tracking System makes things easy and convenient for the users</p>
						</div>
					</div>
				</div>				
				<div class="row">
					<div class="col-lg-4">
						<div class="service_block">
							<img src="<?php echo base_url('assets/images/document-icon-4.png');?>" alt="" height="200px" width="200px"/>
							<h3 class="h3style">Record Management</h3>
							<p class="pstyle">Allows user to track, view and transfer documents to any offices/departments within the University.</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="service_block">
							<img src="<?php echo base_url('assets/images/document-icon-5.png');?>" alt="" height="200px" width="200px"/>
							<h3 class="h3style">Document review and control</h3>
							<p class="pstyle">Enjoy complete visibility into document review process and get control over documents.</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="service_block">
							<img src="<?php echo base_url('assets/images/document-icon-6.png');?>" alt="" height="200px" width="200px"/>
							<h3 class="h3style">Convenient Access</h3>
							<p class="pstyle">Gain convenient access to documents of any type and of any offices/departments.</p>	
						</div>
					</div>								
				</div>
			</div>
		</div>
	</section>
	<!-- Footer -->
	<footer class="footer_section" id="contact" style="background:url(<?php echo base_url('assets/images/pattern_bg.jpg')?>) repeat left top;">
		<div class="container">
			<section class="main-section contact" id="contact">
				<div class="contact_section">
					<h2 class="h2style">Contact</h2>
					<div class="row">
						<div class="col-lg-4">
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
						<div class="col-lg-4">
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
						<div class="col-lg-4">
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
					<div class="col-lg-6">
						<div class="contact-info-box address clearfix">
							<h3 class="h3style">Need something? Drop a comment!</h3>
							<p class="pstyle">Accusantium quam, aliquam ultricies eget tempor id, aliquam eget nibh et. Maecen aliquam, risus at semper. Accusantium quam, aliquam ultricies eget tempor id, aliquam eget nibh et. Maecen aliquam, risus at semper.</p>
            				<p class="pstyle">Accusantium quam, aliquam ultricies eget tempor id, aliquam eget nibh et. Maecen aliquampor id.</p>
						</div>
					</div>
					<div class="col-lg-6">
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
				<span>Copyright 2017. All rights reserved</span>
			</div>
		</div>
	</footer>
<!-- <script>
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
</script> -->

</body>
</html>