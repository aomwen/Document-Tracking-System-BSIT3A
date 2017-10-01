<div class="container-default" id="box-wrapper">
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
					<li><a href="<?php echo base_url('Account/myaccount_view'); ?>">My Account</a></li>
					<li><a href="<?php echo base_url('Access/session_checkout'); ?>"> Log out</a></li>
			  	</ul>
			</li>
		</ul>
	  </div>
	</nav>
</div>
	<div class="container-fluid">
		<div class="row profile">
			<div class="col-sm-3">
				<div class="profile-sidebar">
					<div class="profile-user-pic">
						<img src="<?php echo base_url('assets/images/profile.png');?>" alt="Profile Picture" class="img-responsive" img-circle />
					</div>
					<div class="profile-user-title">
						<?php
						foreach($userdata as $us){
						echo '
						<div class="profile-user-name">'.$us['full_name'].'</div>
						<div class="profile-user-position">'.$us['position'].' </div>
						<div class="profile-user-position">'.$us['department'].' </div>
						<div class="profile-user-position">'.$us['college_acronym'].' </div>';}?>
						<div class="profile-user-menu">
							<ul class="nav">
 
								<li class="active"><a href="<?php echo base_url('Dts/mydocuments_view'); ?>"><span class="glyphicon glyphicon-stats"></span> Document Status </a></li>
								<li ><a href="<?php echo base_url('FilesManipulation/do_upload'); ?>"><span class="glyphicon glyphicon-pencil"></span> Compose </a></li>
								<li ><a href="<?php echo base_url('DocumentInbox/myinbox_view'); ?>"><span class="glyphicon glyphicon-inbox"></span> Inbox </a></li>
								<li><a href="<?php echo base_url('DocumentSent/mysentdocuments_view'); ?>"<span class="glyphicon glyphicon-folder-open"></span> Sent Documents </a></li>
								<li><a href=""><span class="glyphicon glyphicon-book"></span> Guide </a></li>								
								<li><a href="<?php echo base_url('Dts/manage_colleges');?>"><span class="glyphicon glyphicon-education"></span> Manage Colleges </a></li>
								<li><a href="<?php echo base_url('ManageRegistrarDocu/viewDocuments');?>"><span class="glyphicon glyphicon-list-alt"></span> Manage Registrar Documents </a></li>
							</ul>
						</div>	
					</div>	
				</div>
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