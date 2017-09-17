	<div class="container-defualt" id="box-wrapper">
		<nav class="navbar navbar-inverse" id="header">
		  <div class="container">
			<div class="navbar-header">
				<img class="pull-left" src="<?php echo base_url('assets/images/doctrack_logo.png');?>" id="logo"/>
			  	<a class="navbar-brand" href="#">Document Tracking System</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"> Accounts<span class="caret"></span></a>
				  	<ul class="dropdown-menu">
						<li><a href="#"> Settings</a></li>
						<li><a href="<?php echo base_url('DTS/session_checkout')?>"> Log out</a></li>
				  	</ul>
				</li>
			</ul>
		  </div>
		</nav>
	</div>
  <div class="row" style="border: yellow solid;">
	  		<div class="col-sm-3" style="position:fixed; border:solid black;">
					<div class="card" style="border:solid blue;">
				  		<img src="<?php echo base_url('assets/images/if_account-circle_326497.png');?>" alt="John" style="width:100%">
				  		<h1>Name</h1>
				  		<p class="title">Position</p>
				  		<p>College</p> 
				  		<a href="#" style="color: black;"><i class="fa fa-twitter"></i></a> 
				  		<a href="#" style="color: black;"><i class="fa fa-facebook"></i></a> 
				  		<p><button class="w3-button w3-hover-red" style="background-color:#000; color: white;"> 
				  			<!-- class="tablinks" onClick="openTab(event,'Guide')" --> 
				  			Guide</button></p>
				  		<p><button class="w3-button w3-hover-red" style="background-color:#000; color: white;">
				  		 <!-- class="tablinks" onClick="openTab(event,'MyDocument')"> -->
				  		 My Documents</button></p>
				  		<p><button class="w3-button w3-hover-red" style="background-color:#000; color: white;"> 
				  			<!-- class="tablinks" onClick="openTab(event,'Offices')"> -->
				  			Offices</button></p>
				  		<p><button class="w3-button w3-hover-red" style="background-color:#000; color: white;">
				  		 <!-- class="tablinks" onClick="openTab(event,'Settings')"> -->
				  		 Settings</button></p>
				  		<p><button class="w3-button w3-hover-red" style="background-color:#000; color: white;"> 
				  			<!-- class="tablinks" onClick="openTab(event,'Inbox')"> -->
				  			Inbox</button></p>
					</div>
	  		</div>
	  		<!-- Right Column -->
  	</div>

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