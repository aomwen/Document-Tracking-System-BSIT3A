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
              <a class="nav-link page-scroll" title="About" href="#tf-about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" title="Guide" href="#tf-guide">Guide</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" title="Services" href="#tf-services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" title="Contact" href="#tf-contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" title="Login" href="<?php echo base_url('Access/logIn');?>">Log In</a>
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
                <h1>We will <strong><span class="color">Track</span></strong> your document<br /> in the <strong><span class="color">Registrar</span></strong>!</h1>
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
                        <div class="space"></div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5><strong>What is TUP Document Tracking System?</strong></h5>
                                <p class="intro"><br />TUP Document Tracking System is a document tracking system that gives a satisfaction in managing your documents online. Whether you are at home or at office or whatever you have in mind, our website will give you the luxury of it.</p><br />
                            </div>
                            <div class="col-md-4">
                                <h5><strong>Why choose TUP Document Tracking System?</strong></h5>
                                <p class="intro"><br />Why waste your precious time with manual or other services at managing your documents?, when you can manage it whenever and wherever you are using tup.doctrack.com?</p><br />
                            </div>
                            <div class="col-md-4">
                                <h5><strong>Our history</strong></h5>
                                <p class="intro"><br />tup.doctrack.com started up in 2017 as a project by a group of students who studied web developing. They then realized their school poor quality in document processing that they agreed in making a website that will serve as a document tracking for their school.</p><br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Guide Page
    ==========================================-->
    <div id="tf-guide" class="text-center" style="background: url('<?php echo base_url('assets/images/03.jpg'); ?>'); background-size: cover; background-position: center; background-attachment: fixed; background-repeat: no-repeat; color: #ffffff;">
        <div class="overlay">
            <div class="container">
                <div class="section-title center">
                    <h2><strong>Guide</strong></h2>
                    <div class="line">
                        <hr />
                    </div>
                    <div class="space"></div>
                    <h4>How do I track my document in Registrar?</h4>
                </div>
                <div class="space"></div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 guide">
                        <i class="fa fa-ticket"></i>
                        <h5><strong>Step 1</strong></h5>
                        <p>Find the tracking number in the given tracking form to you by the Registrar</p>
                    </div>
                    <div class="col-md-4 col-sm-6 guide">
                        <i class="fa fa-search"></i>
                        <h5><strong>Step 2</strong></h5>
                        <p>Type the track number at the search bar found at the <a class="page-scroll" href="#page-top" title="Go to top" style="text-decoration: none; color:white;">top</a> of the page.</p>
                    </div>
                    <div class="col-md-4 col-sm-6 guide">
                        <i class="fa fa-check"></i>
                        <h5><strong>Step 3</strong></h5>
                        <p>Lastly, wait for the result of the document you wish to track <br />
                        and know whether your file is Ongoing, Forpickup or Completed</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <!-- Contact Section
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
            </div>
            <div class="container">
                <div class="footer_bottom">
                    <a href="#page-top" title="To Top" class="fa fa-angle-up page-scroll"></a>
                    <span>Copyright 2017. All rights reserved</span>
                </div>
            </div>
        </div>
    </div>

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