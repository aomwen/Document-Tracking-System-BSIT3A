<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title; ?></title>

	<meta name="viewport" content="width=device-width; initial-scale=1.0" />
	<meta name="author" content="Team Bah" />
	<meta name="description" content="The description of website" />
	<link href="<?php echo base_url('bootstrap/css/bootstrap.css'); ?>" rel="stylesheet" />
	<!--<link href="<?php echo base_url('assets/css/default.css'); ?>" rel="stylesheet" />-->
	<link href="<?php echo base_url('bootstrap/css/bootstrap-theme.css'); ?>" rel="stylesheet" />
    <link rel="icon" href="<?php echo base_url('assets/images/doctrack_logo.png'); ?>" type="image/png"> 	

	<script src="<?php echo base_url('bootstrap/js/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
</head>
<!-- <script type="text/javascript">
        var myVar;

        function myFunction() {
            myVar = setTimeout(showPage, 1000);
        }

        function showPage() {
            document.getElementById("loader").style.display = "none";
            document.getElementById("myLoadingDiv").style.display = "block";
        }

    </script> -->
<body onload="myFunction();">

<!--<div id="loader">
	<img src="<?php echo base_url('assets/images/loading_icon.gif'); ?>" style="width:200px;height:200px" class="img-responsive img-circle im-centered" />
</div>
<div style="display:none;"  id="myLoadingDiv" class="container-fluid body-content animate-bottom">-->