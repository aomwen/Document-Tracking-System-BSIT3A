<html>
<head>
	<title>Document Tracking System Homepage</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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

	<script type="text/javascript">
		  function FilterFunction() {
			  var input, filter, table, tr, td, i, x,flag, found;
			  input = document.getElementById("myInputDocumentSearch");
			  noresult = document.getElementById("resultContainer");
			  filter = input.value.toUpperCase();
			  table = document.getElementById("myTable");
			  tr = table.getElementsByTagName("tr");
			  found = 0;
			  for (i = 0; i < tr.length; i++) {
				    td = tr[i].getElementsByTagName("td")[0];
				    if (td){
				      if (td.innerHTML == filter) {
				        tr[i].style.display = "";
				        found++;
				      }else{
				        tr[i].style.display = "none";
				      } 
					}
				}
			if(found==0){
				document.getElementById("resultContainer").innerHTML = "no record found";
			}
			  }
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
				<a class="navbar-brand" href="#myPage" style="font-family: Ebrima; font-size:22px;" data-toggle="tooltip" title="Document Tracking System">Document Tracking System</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#myPage" data-toggle="tooltip" title="Home">HOME</a></li>
					<li><a href="#services" data-toggle="tooltip" title="Services">SERVICES</a></li>
					<li><a href="#contact" data-toggle="tooltip" title="Contact">CONTACT</a></li>
					<li><a href="<?php echo base_url('Access/logIn');?>" data-toggle="tooltip" title="Log In">LOG IN</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="jumbotron text-center" style="background-image: url('<?php echo base_url('assets/images/pexels-photo-3740161.jpg'); ?>');  background-repeat: no-repeat; background-size: cover">
		<h1>Let's track your document!</h1>
		<h2>We will guide you in every single step</h2>
		<!-- <a  href="<?php echo base_url('HomeFunction/gotoDocumentTrack')?>"><button class="btn-info btn-lg">Track Now!</button></a> -->
		<div class="input-group">
			<input type="text" class="form-control" size="50" placeholder="Track Code" id="myInputDocumentSearch" required />
				<div class="input-group-btn">
					<button type="button" class="btn btn-info" onclick="FilterFunction()" data-toggle="modal" data-target="#modaltrack" title="Track"><span class="glyphicon glyphicon-search"></span></button>
				</div>
		</div>
	</div>
	<!-- Modal for Track -->
	<div id="modaltrack" class="modal fade" role="dialog">
		<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header"> 
	        		<button type="button" class="close" data-dismiss="modal">&times;</button>
	        		<h2 class="modal-title">Track Code</h2>
	      		</div>
	      		<div class="modal-body">
	        		<div class="table-responsive">
	        			<table class="table" id="myTable">
	        				<thead class="text-center">
						      <tr>
						        <th>Track Code</th>
						        <th>File type</th>
						        <th>Date Admitted</th>
						        <th>Date Released</th>
						        <th>Status</th>
						      </tr>
						    </thead>
						    <tbody>
						      <?php
						      	foreach($regDocuments as $rd){
						      		echo'
						      	<tr>
						      		<td>'.$rd['regTrackcode'].'</td>
						      		<td>'.$rd['docType'].'</td>
						      		<td>'.$rd['dateAdmitted'].'</td>
						      		<td>'.$rd['dateReleased'].'</td>
						      		<td>'.$rd['status'].'
						      	</tr>';
						      	}
						      ?>
						    </tbody>
	        			</table>
	        			<p id="resultContainer" style="color:red; text-align:center;"> </p>
	        		</div>
	      		</div>
	      		<div class="modal-footer">
	      		</div>
	    	</div>
		</div>
	</div>
	<!-- Services -->
	<div class="container-fluid" id="services">
		<section  class="container text-center" >
			<h2 class="h2style">Services</h2>
			<h4 class="h4style">What we provide</h4>
			<br>
			<div class="row slideanim">
				<div class="col-sm-4">
					<div class="contact_block">
						<div class="contact_block_icon" id="services_block">
							<span class="text-center"><i class="glyphicon glyphicon-briefcase" style="left:0px"></i></span>
						</div>
						<h4 class="h4style">Powerful Features</h4>
						<p class="pstyle">Automate time consuming task like going to the university just to acquire the documents needed with just a few clicks</p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="contact_block">
						<div class="contact_block_icon" id="services_block">
							<span class="text-center"><i class="glyphicon glyphicon-lock" style="left:3px"></i></span>
						</div>
						<h4 class="h4style">Highly Secured</h4>
						<p class="pstyle">This Websites provides a high level of documents encryption and role based access</p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="contact_block">
						<div class="contact_block_icon" id="services_block">
							<span class="text-center"><i class="glyphicon glyphicon-heart"></i></span>
						</div>
						<h4 class="h4style">User-friendly</h4>
						<p class="pstyle">TUP Document Tracking System makes things easy and convenient for the users</p>
					</div>
				</div>
			</div>
			<br /><br />
			<div class="row slideanim">
				<div class="col-sm-4">
					<div class="contact_block">
						<div class="contact_block_icon" id="services_block">
							<span class="text-center"><i class="glyphicon glyphicon-book"></i></span>
						</div>
						<h4 class="h4style">Record Management</h4>
						<p class="pstyle">Allows user to track, view and transfer documents to any offices/departments within the University.</p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="contact_block">
						<div class="contact_block_icon" id="services_block">
							<span class="text-center"><i class="glyphicon glyphicon-folder-open"></i></span>
						</div>
						<h4 class="h4style">Document review and control</h4>
						<p class="pstyle">Enjoy complete visibility into document review process and get control over documents.</p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="contact_block">
						<div class="contact_block_icon" id="services_block">
							<span class="text-center"><i class="glyphicon glyphicon-pencil"></i></span>
						</div>
						<h4 class="h4style">Convenient Access</h4>
						<p class="pstyle">Gain convenient access to documents of any type and of any offices/departments.</p>
					</div>
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
						<div class="col-sm-4 col-md-4 col-lg-4 col-xs-4">
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
						<div class="col-sm-4 col-md-4 col-lg-4 col-xs-4">
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
						<div class="col-sm-4 col-md-4 col-lg-4 col-xs-4">
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
							<p class="pstyle">We are here to provide you with more information, answer any question you may have and create an effective solution for your instructional needs.</p>
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