<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Document Tracking System</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('bootstrap/fonts/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">

    <!-- Slider
    ================================================== -->
	
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/agency.min.css')?>">
	<script src="<?php echo base_url('assets/css/js/jquery.min.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/css/js/popper.min.js')?>"></script>
	<script src="<?php echo base_url('assets/css/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/css/js/jquery.easing.min.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/css/js/agency.min.js')?>"></script>
    <link href="<?php echo base_url('assets/css/owl.carousel.css')?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('assets/css/owl.theme.css')?>" rel="stylesheet" media="screen">

    <!-- Stylesheet
    ================================================== -->
	
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/responsive.css')?>">
    <link href="<?php echo base_url('assets/css/bootstrap.css')?>" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,700,300,600,800,400' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?php echo base_url('assets/css/js/modernizr.custom.js')?>"></script>

    <!-- Script for table -->
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
  <body id="page-top">
    <!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand page-scroll" href="#page-top">Document Tracking System</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#tf-about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#tf-services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#tf-team">Guide</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#tf-contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="<?php echo base_url('Access/logIn');?>">Log In</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Home Page
    ==========================================-->
    <div id="tf-home" class="text-center" style="background:url('<?php echo base_url('assets/images/01.jpg'); ?>'); background-size: cover; background-position: center; background-attachment: fixed; background-repeat: no-repeat; color: #cfcfcf;">
        <div class="overlay">
            <div class="content">
                <h1>Let's <strong><span class="color">Track</span></strong> your document!</h1>
                <p class="lead">We will <strong>guide</strong> you in every single step</p>
                <div class="input-group">
                    <input type="text" class="form-control" size="50" placeholder="Track Code" id="myInputDocumentSearch" required />
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modaltrack" title="Track"><span class="fa fa-search"></span></button>
                        </div>
                </div>
                <a href="#tf-about" class="fa fa-angle-down page-scroll"></a>
            </div>
        </div>
    </div>

    <!-- Modal table -->
    <div id="modaltrack" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"> 
                    <h2 class="modal-title">Track Code</h2>
                    <a href="<?php echo base_url('DTS/index');?>"><span class="fa fa-remove"></span></a>
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
                                $thereis=false;
                                foreach($regDocuments as $rd){
                                    echo'
                                <tr>
                                    <td>'.$rd['regTrackcode'].'</td>
                                    <td>'.$rd['docType'].'</td>
                                    <td>'.$rd['dateAdmitted'].'</td>
                                    <td>'.$rd['dateReleased'].'</td>
                                    <td>'.$rd['status'].'
                                </tr>';
                                    $thereis=true;
                                }
                                if($thereis==false){
                                    echo '<tr><td colspan="5" class="text-danger" align="center">No document registered...</td></tr>';
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

    <!-- About Us Page
    ==========================================-->
    <div id="tf-about" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="about-text">
                        <div class="section-title center">
                            <h2>About us</h2>
                            <h2>Some words <strong>about us</strong></h2>
                            <div class="line">
                                <hr>
                            </div>
                        </div>
                        <br />
                        <p class="intro"><strong>What is TUP Document Tracking System?</strong><br />TUP Document Tracking System is a document tracking system that gives a satisfaction in managing your documents online. Whether you are at home or at office or whatever you have in mind, our website will give you the luxury of it.</p><br />
                        <p class="intro"><strong>Why choose TUP Document Tracking System?</strong><br />Why waste your precious time with manual or other services at managing your documents?, when you can manage it whenever and wherever you are using tup.doctrack.com?</p><br />
                        <p class="intro"><strong>Our history</strong><br />tup.doctrack.com started up in 2017 as a project by a group of students who studied web developing. They then realized their school poor quality in document processing that they agreed in making a website that will serve as a document tracking for their school.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Page
    ==========================================-->
    <div id="tf-team" class="text-center" style="background: url('<?php echo base_url('assets/images/03.jpg'); ?>'); background-size: cover; background-position: center; background-attachment: fixed; background-repeat: no-repeat; color: #ffffff;">
        <div class="overlay">
            <div class="container">
                <div class="section-title center">
                    <h2>Meet <strong>our team</strong></h2>
                    <div class="line">
                        <hr />
                    </div>
                </div>
                
                    
                
            </div>
        </div>
    </div>
    
    <!-- <div id="tf-team" class="text-center" style="background: url('<?php echo base_url('assets/images/03.jpg'); ?>'); background-size: cover; background-position: center; background-attachment: fixed; background-repeat: no-repeat; color: #ffffff;">
        <div class="overlay">
            <div class="container">
                <div class="section-title center">
                    <h2>Meet <strong>our team</strong></h2>
                    <div class="line">
                        <hr>
                    </div>
                </div>

                <div id="team" class="owl-carousel owl-theme row">
                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/team/01.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Jenn Gwapa</h3>
                                <p>CEO / Founder</p>
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/team/02.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Jenn Gwapa</h3>
                                <p>CEO / Founder</p>
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/team/03.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Jenn Gwapa</h3>
                                <p>CEO / Founder</p>
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/team/04.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Jenn Gwapa</h3>
                                <p>CEO / Founder</p>
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/team/04.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Jenn Gwapa</h3>
                                <p>CEO / Founder</p>
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/team/01.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Jenn Gwapa</h3>
                                <p>CEO / Founder</p>
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/team/02.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Jenn Gwapa</h3>
                                <p>CEO / Founder</p>
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/team/03.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Jenn Gwapa</h3>
                                <p>CEO / Founder</p>
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div> -->

    <!-- Services Section
    ==========================================-->
    <div id="tf-services" class="text-center">
        <div class="container">
            <div class="section-title center">
                <h2>Take a look at <strong>our services</strong></h2>
                <div class="line">
                    <hr>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="space"></div>
            <div class="row">
                <div class="col-md-4 col-sm-6 service">
                    <i class="fa fa-briefcase"></i>
                    <h4><strong>Powerful Features</strong></h4>
                    <p>Automate time consuming task like going to the university just to acquire the documents needed with just a few clicks</p>
                </div>

                <div class="col-md-4 col-sm-6 service">
                    <i class="fa fa-lock"></i>
                    <h4><strong>Highly Secured</strong></h4>
                    <p>This Websites provides a high level of documents encryption and role based access</p>
                </div>

                <div class="col-md-4 col-sm-6 service">
                    <i class="fa fa-heart"></i>
                    <h4><strong>User-friendly</strong></h4>
                    <p>TUP Document Tracking System makes things easy and convenient for the users</p>
                </div>

                <div class="col-md-4 col-sm-6 service">
                    <i class="fa fa-book"></i>
                    <h4><strong>Record Management</strong></h4>
                    <p>Allows user to track, view and transfer documents to any offices/departments within the University.</p>
                </div>

                <div class="col-md-4 col-sm-6 service">
                    <i class="fa fa-folder-open"></i>
                    <h4><strong>Document review and control</strong></h4>
                    <p>Enjoy complete visibility into document review process and get control over documents.</p>
                </div>

                <div class="col-md-4 col-sm-6 service">
                    <i class="fa fa-pencil"></i>
                    <h4><strong>Convenient Access</strong></h4>
                    <p>Gain convenient access to documents of any type and of any offices/departments.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Clients Section
    ==========================================-->
    <div id="tf-contact" class="text-center" style="background: url('<?php echo base_url('assets/images/05.jpg'); ?>'); background-size: cover; background-position: center; background-attachment: fixed; background-repeat: no-repeat; color: #ffffff;">
        <div class="overlay">
            <div class="container">
                <div class="section-title center">
                    <h2><strong>Contact</strong> us</h2>
                    <div class="line">
                        <hr>
                    </div>
                </div>
                <div class="space"></div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 contact">
                        <i class="fa fa-home"></i>
                        <p>Ayala Boulevard,
                        </br> Ermita, Manila, Philippines</</p>
                    </div>

                    <div class="col-md-4 col-sm-6 contact">
                        <i class="fa fa-phone"></i>
                        <p>Phone: +63(2)301.3001</p>
                    </div>

                    <div class="col-md-4 col-sm-6 contact">
                        <i class="fa fa-external-link"></i>
                        <p><a href="www.tup.edu.ph">tup.edu.ph</a></p>
                    </div>
                </div>
                <div class="space"></div>
                <div class="row">
                    <div class="col-md-6 caption">
                        <h3>Need something? Drop a comment!</h3>
                        <p>We are here to provide you with more information, answer any question you may have and create an effective solution for your instructional needs.</p>
                        <p>Please use the contact form beside to get in touch with us.<br/>Thanks!</p>
                    </div>
                    <div class="col-md-6 caption">
                        <form class="form" method="POST" action="<?php echo base_url('homeFunctions/contactUs');?>">
                            <input class="input-text" type="text" name="sender" placeholder="Name">
                            <input class="input-text" type="text" name="email" placeholder="Yourname@gmail.com">
                            <textarea class="input-text text-area" name="content" cols="0" rows="0" placeholder="Comment"></textarea>
                            <input class="input-btn" type="submit" value="Send">
                        </form>
                    </div>
                </div>
                <!-- <div id="team" class="owl-carousel owl-theme row">
                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/team/01.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Jenn Gwapa</h3>
                                <p>CEO / Founder</p>
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/team/02.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Jenn Gwapa</h3>
                                <p>CEO / Founder</p>
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/team/03.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Jenn Gwapa</h3>
                                <p>CEO / Founder</p>
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/team/04.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Jenn Gwapa</h3>
                                <p>CEO / Founder</p>
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/team/04.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Jenn Gwapa</h3>
                                <p>CEO / Founder</p>
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/team/01.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Jenn Gwapa</h3>
                                <p>CEO / Founder</p>
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/team/02.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Jenn Gwapa</h3>
                                <p>CEO / Founder</p>
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/team/03.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Jenn Gwapa</h3>
                                <p>CEO / Founder</p>
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div>
                </div> -->
                
            </div>
            <div class="container">
                <div class="footer_bottom">
                    <a href="#page-top" class="fa fa-angle-up page-scroll"></a>
                    <span>Copyright 2017. All rights reserved</span>
                </div>
            </div>
        </div>
    </div>
    <!-- <div id="tf-clients" class="text-center">
        <div class="overlay">
            <div class="container">

                <div class="section-title center">
                    <h2>Some of <strong>our Clients</strong></h2>
                    <div class="line">
                        <hr>
                    </div>
                </div>
                <div id="clients" class="owl-carousel owl-theme">
                    <div class="item">
                        <img src="img/client/01.png">
                    </div>
                    <div class="item">
                        <img src="img/client/02.png">
                    </div>
                    <div class="item">
                        <img src="img/client/03.png">
                    </div>
                    <div class="item">
                        <img src="img/client/04.png">
                    </div>
                    <div class="item">
                        <img src="img/client/05.png">
                    </div>
                    <div class="item">
                        <img src="img/client/06.png">
                    </div>
                    <div class="item">
                        <img src="img/client/07.png">
                    </div>
                </div>

            </div>
        </div>
    </div> -->

    <!-- Portfolio Section
    ==========================================-->
    <!-- <div id="tf-works">
        <div class="container">
            <div class="section-title text-center center">
                <h2>Take a look at <strong>our works</strong></h2>
                <div class="line">
                    <hr>
                </div>
                <div class="clearfix"></div>
                <small><em>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</em></small>
            </div>
            <div class="space"></div>

            <div class="categories">
                
                <ul class="cat">
                    <li class="pull-left"><h4>Filter by Type:</h4></li>
                    <li class="pull-right">
                        <ol class="type">
                            <li><a href="#" data-filter="*" class="active">All</a></li>
                            <li><a href="#" data-filter=".web">Web Design</a></li>
                            <li><a href="#" data-filter=".photography">Photography</a></li>
                            <li><a href="#" data-filter=".app" >Mobile App</a></li>
                            <li><a href="#" data-filter=".branding" >Branding</a></li>
                        </ol>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div id="lightbox" class="row">

                <div class="col-sm-6 col-md-3 col-lg-3 branding">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Logo Design</h4>
                                    <small>Branding</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="img/portfolio/01.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 photography app">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Logo Design</h4>
                                    <small>Branding</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="img/portfolio/02.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 branding">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Logo Design</h4>
                                    <small>Branding</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="img/portfolio/03.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 branding">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Logo Design</h4>
                                    <small>Branding</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="img/portfolio/04.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 web">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Logo Design</h4>
                                    <small>Branding</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="img/portfolio/05.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 app">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Logo Design</h4>
                                    <small>Branding</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="img/portfolio/06.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 photography web">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Logo Design</h4>
                                    <small>Branding</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="img/portfolio/07.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 web">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Logo Design</h4>
                                    <small>Branding</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="img/portfolio/08.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> -->

    <!-- Testimonials Section
    ==========================================-->
    <!-- <div id="tf-testimonials" class="text-center">
        <div class="overlay">
            <div class="container">
                <div class="section-title center">
                    <h2><strong>Our clients’</strong> testimonials</h2>
                    <div class="line">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div id="testimonial" class="owl-carousel owl-theme">
                            <div class="item">
                                <h5>This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</h5>
                                <p><strong>Dean Martin</strong>, CEO Acme Inc.</p>
                            </div>

                            <div class="item">
                                <h5>This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</h5>
                                <p><strong>Dean Martin</strong>, CEO Acme Inc.</p>
                            </div>

                            <div class="item">
                                <h5>This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</h5>
                                <p><strong>Dean Martin</strong>, CEO Acme Inc.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/css/js/jquery.1.11.1.js')?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="<?php echo base_url('assets/css/js/bootstrap.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/css/js/SmoothScroll.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/css/js/jquery.isotope.js')?>"></script>

    <!-- <script src="js/owl.carousel.js"></script> -->

    <!-- Javascripts
    ================================================== -->
    <script type="text/javascript" src="<?php echo base_url('assets/css/js/main.js')?>"></script>

  </body>
</html>