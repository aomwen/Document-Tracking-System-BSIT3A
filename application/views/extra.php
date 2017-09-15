<!DOCTYPE html>
<html lang="en">
<head>
	<title>Web Project</title></title>
  <meta name="viewport" content="width=device-width; initial-scale=1.0" />

  <link href="bootstrap/css/bootstrap337.min.css" rel="stylesheet" />
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
  <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" />
  <link href="bootstrap/css/custom.css" rel="stylesheet" />
  <script src="bootstrap/js/jquery321.min.js"></script>
  <script src="bootstrap/js/bootstrap337.min.js"></script>
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
<!-- HEADER -->
  <div class="container-default">
    <div class="row" id="header" style="background-color:#f7f6f3;color:black;">
      <div class="col-md-1 col-lg-1 col-sm-1" style="padding-left:2%">
            <p><img src="<?php echo base_url('assets/images/logo.png');?>" alt="TUP-logo"> </p>
      </div>
      <div class="col-md-4 col-lg-4 col-sm-4">
        <h3>Document Tracking System</h3><h6> Technological University of the Philippines</h6>
      </div>
    </div>
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Logo</a>
        </div>
        <div id="menu">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">HOME</a></li>
            <li><a href ="#">GUIDE</a></li>
            <li><a href ="#">ABOUT US</a></li>
            <li><a href ="#">CONTACT US</a></li>
            <li><a href ="#">OFFICES</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> SIGNUP</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a></li>
          </ul>
        </div>  
    </nav>
  </div>
  <!-- /HEADER -->
  <!-- CAROUSEL -->
  <div id="myCarousel"  class="row carousel slide" data-ride="carousel">
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
            <input type="text" class="form-control" size="70" placeholder="Track Code" required>
            <div class="input-group-btn">
              <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
            </div>
          </div>
        </form>  
      </div>
      <div class="item active">
        <img src="<?php echo base_url('assets/images/closeup.jpg');?>" alt="closeup" style="width:100%; height:auto;">
      </div>
      <div class="item">
        <img src="<?php echo base_url('assets/images/lady.jpg');?>" alt="lady" style="width:100%; height:auto;">
      </div>  
      <div class="item">
        <img src="<?php echo base_url('assets/images/ass.jpg');?>" alt="ass" style="width:100%; height:auto;">
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"></a>
        <span class="sr-only">Next</span>
      </a>
    </div>
    </div>
    <!-- CAROUSEL -->
      <div class="container-fluid text-center bg-grey">
        <div class="row text-center">
          <div class="col-sm-4">
             <div class="thumbnail">
              <img src="<?php echo base_url('assets/images/document-icon-1.jpg');?>" alt="Paris" width="300px" height="300px">
              <p><strong>Important Features</strong></p>
              <p>Automate time consuming task like going to the university just to acqire the documents needed with just a few clicks</p>
          </div>
          </div>
          <div class="col-sm-4">
            <div class="thumbnail">
              <img src="<?php echo base_url('assets/images/document-icon-2.jpg');?>" alt="New York" width="300px" height="300px"> <br />
              <p><strong>Highly Secured</strong></p>
              <p>This Websites provides a high level of documents encryption and role based access</p>
          </div>
          </div>
          <div class="col-sm-4">
            <div class="thumbnail">
              <img src="<?php echo base_url('assets/images/document-icon-3.jpg');?>" alt="San Francisco" width="300px" height="300px"><
              <p><strong>User-friendly</strong></p>
              <p>TUP Document Tracking System is a simple and intuitive. It makes things easy and convenient for the users</p>
        </div>
          </div>
      </div>
       <!-- ETO YUNG ICOCOPY MO FOOTER TO-->
    <footer id="footer" class="container-default" style="background-color: #2f2f2f;box-sizing:border-box;">
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
      <!-- ETO YUNG ICOCOPY MO FOOTER TO-->
</body>
</html>