<style>
*{
	box-sizing: border-box;
}
/*SIDEBAR*/
#sidebar-wrapper{
	padding-top:60px;
	width:100%;
	height:100vh;
	left:0;
	position:absolute;
	background-color: #222;
}
#sidebar-wrapper ul{
	list-style: none;
	padding:0;
	margin:0;
}
#sidebar-wrapper ul li{
	list-style: none;
	padding: 10px 10px;
	border-bottom: 1px solid #333;
}
#sidebar-wrapper li a:hover{
	color:#ccc;
	text-decoration: none;
}
#sidebar-wrapper .dropdown-menu{
	background-color: #222;
	color:#fff;
	list-style: none;
}
#sidebar-wrapper .drodown-menu li a:hover{
	color:#ccc;
	text-decoration:none;
	background-color: #222;
}
#main-content{
	padding-top:60px;
	width:98%;
}


/*NAVBAR*/
.user-image{
	width:25px;
	height:25px;
	border-radius:50%;
	margin-right:15px;
}
.user-header{
	width:270px;
	height:175px;
	text-align: center;	
	/*padding:10px;*/
	background:linear-gradient(to bottom, #57bc90 0%, #77c9d4 60%);
}
.user-header img{
	width:80px;
	height:80px;
	border:3px solid;
	border-color:transparent;
	border-color:rgba(255,255,255,0.2);
	color:#dd6f2d;
}
.user-header p{
	font-size: 17px;
	color:#015249;
	margin-top: 10px;
}
.user-menu span{
	color:#015249;
}
.user-header p small{
	font-size:12px;
	display:block;
	color:#015249;
}
.user-body{
	padding:10px;
	background-color: #fbfbfb;
}
.user-body a{
	background:#015249;
	color:#fff;
	font-family: sans-serif;
}
.user-body a:hover{
	background-color:#A5A5AF;
	color:#222;
}
/*Navbar Notification*/
.notif-menu{
/*	padding-top: 5px;*/
}
.notif-header{
	width:270px;
	height:35px;
	text-align: center;	
	padding:10px;
	background-color: #015249;
}
/*SIDEPROFILE*/
.profile-user-pic{
	float:none;
	margin:0 auto;
	display:block;
	width:120px;
	height:120px;
	border:1px solid #fff;
	border-radius:50%;
}
.profile-user-pic img{
	border-radius:50%;
	margin: auto;
}
.profile-user-title{
	text-align:center;
	margin-top:20px;
}
.profile-user-name{
	color:#f8d3d7;	
	font-size:18px;
	font-weight: 600;
	margin-bottom:7px;
}
.profile-user-position{
	color:#f8d3d7;
	font-size:14px;
	font-weight:600;
}
.profile-user-button{
	margin-top: 5%;
	margin-bottom: 5%;
	padding: 10px;
}
.profile-user-button a{
	font-family: 'Dosis', sans-serif;
	letter-spacing: 0px;
	background:linear-gradient(to bottom, #57bc90 0%, #77c9d4 60%);
	border-radius:3px;
	color:#015249;
	font-size:16px;
	text-transform:uppercase;
	font-weight:500;
	border:0px;
	padding: 10px;
	display: inline;
}
.profile-user-button a:hover{
	background:#A5A5AF;
	color: #222;
}
@media screen and (max-width: 767.70px){
	/*#wrapper{
		padding-top: 60px;
	}*/
}
@media screen and (min-width:100px){
	#sidebar-wrapper{
		width:80px;
	}
	#sidebar-wrapper ul li{
		text-align: center;
	}
	#sidebar-wrapper ul li span:nth-child(2){
		display:none;
	}
	#sidebar-wrapper ul li span:nth-child(1){
		font-size:26px;
	}
	#main-content{
		padding-left:100px;
	}
	.profile-user-pic{
		width:50px;
		height:50px;
		margin:auto;
	}
	.profile-user-title{
		display:none;
	}
	.profile-user-button{
		display:none;
	}	

}
@media screen and (min-width: 1000px){
	#sidebar-wrapper{
		width:250px;
	}
	#sidebar-wrapper ul li{
		text-align:left;
	}
	#sidebar-wrapper ul li span:nth-child(2){
		display:inline;
	}
	#sidebar-wrapper ul li span:nth-child(1){
		font size:14px;
	}
	#content{
		padding-left: 165px;
	}
	.profile-user-pic{
		width:120px;
		height:120px;
		margin:auto;	
	}
	.profile-user-title{
		display:block;
	}	
	.profile-user-button{
		display:inline-block;
		text-align:center;
	}		
}
</style>

<!--try-->
   <nav class="navbar navbar-default navbar-fixed-top" id="header">
        <div class="container-fluid">
          	<div class="navbar-header">
              	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
                 	<span class="icon-bar"></span>
                	<span class="icon-bar"></span>
                	<span class="icon-bar"></span>
              	</button>
       	        <a class="navbar-brand" href="#myPage" style="font-family: Ebrima; font-size:22px;" data-toggle="tooltip" title="Document Tracking System">Document Tracking System</a>
	        </div>
          	<div class="collapse navbar-collapse" id="mainNavBar">
            	<ul class="nav navbar-nav navbar-right menu-header">
			       	<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="glyphicon glyphicon-list-alt"></span><span class="caret "></span></a>
			            <ul class="dropdown-menu side-choice">
			            	<li><a href="<?php echo base_url('ManageAdmin/viewmsgtoAdmin');?>"><span class="glyphicon glyphicon-star"></span><span>&nbsp; &nbsp; User Reviews </span></a></li>
			                <li><a href="<?php echo base_url('AdminOffices/manageColleges');?>"><span class="glyphicon glyphicon-map-marker"></span><span>&nbsp; &nbsp; Manage Offices </span></a></li>
			                <li><a href="<?php echo base_url('ManageAdmin/viewDocuments');?>"><span class="glyphicon glyphicon-signal"></span><span>&nbsp; &nbsp; Manage Registrar Status </span></a></li>
			                <li><a href="<?php echo base_url('ManageAdmin/viewUsers');?>"><span class="glyphicon glyphicon-user"></span><span>&nbsp; &nbsp; Manage Users </span></a></li>
			            </ul>
			        </li>
			        <li class="dropdown notif-menu" style="border:1px solid blue;">
			            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			              <span id="bell" class="glyphicon glyphicon-bell" style="color:#015249;"></span>
			            </a>
			            <ul class="dropdown-menu">
			              	<li class="notif-header"><p>Notifications</p></li>
				              	<li class="notif-body">
					                <ul class="notifs">
					                  	<?php
					                  	if(isset($notifs)){
					                    	foreach($notifs as $notif){
						                      	if($notif['seenFlag']==FALSE){
						                        	echo '
						                        	<li>     
						                          		<a href="';
						                          		if($notif['notifType'] == 'inbox'){
						                            		echo base_url('/Notificationpath/notifToInbox/'.$notif['trackcode'].'');
						                          		}

						                        	echo '">'.$notif['notifDesc'].'</a>
						                        	</li>  
						                        	<hr />';
						                      	}
					                    	}
					                  	}
					                  	?>                                                            
					                </ul>  
				              	</li>
			              	<li class="notif-footer"><p>View all</p></li>
			            </ul>
			        </li>  
					<li class="dropdown user-menu">
			            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			              	<img src="<?php echo base_url('assets/images/pic.png');?>" class="user-image" alt="User Image" />
			              	<span class="hidden-xs" style="color:#015249;">Username</span>
			            </a>
			            <ul class="dropdown-menu">
			              	<li class="user-header">
			                 	<?php
			                	foreach($userdata as $us){             
			                   		echo '<img src="';if($us['path']!=null){ echo $us['path'];}else{ echo base_url('assets/images/pic.png'); } echo'" class="img-circle" alt="User Image" />';
			                 	} 
			                	?><p><?php echo $_SESSION['username'];?>
			                  	<small>POSITION</small>
			                	</p>  
			              	</li>
			              	<li class="user-body">
			                	<div>
			                  		<a href="<?php echo base_url('Account/viewAccount'); ?>" class="btn btn-default pull-left">Account Setting</a>
			                  		<a href="<?php echo base_url('Access/logout'); ?>" class="btn btn-default pull-right">Sign Out</a>
			                	</div>    
			              	</li>
			            </ul>
			        </li>	        
            	</ul>
          	</div>
        </div>
    </nav>
<!--HEADER ENDS-->
<!--Menu-->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<div class="wrapper">
			    <div id="sidebar-wrapper">
					<div class="profile-sidebar ">      
					    <?php
					    foreach($userdata as $us){
					    echo '
						    <div class="profile-user-pic">
						        <img src="';if($us['path']!=null){ echo $us['path'];}else{ echo base_url('assets/images/pic.png'); } echo'" alt="Profile Picture" class="img-responsive image-circle"/>
						    </div>
						    <div class="profile-user-title">
						    <div class="profile-user-name">'.$us['firstname'].' '.$us['lastname'].'</div>
						    <div class="profile-user-position">'.$us['position'].' </div>
						    <div class="profile-user-position">'.$us['department'].' </div>
						    <div class="profile-user-position">'.$us['collegeId'].' </div>
						    </div>';  
					    }?>			    
				    </div>
			        <div class="profile-user-button">
			            <a href="<?php echo base_url('FilesManipulation/sendFile'); ?>" class="btn btn-block" role="button"><span class="glyphicon glyphicon-pencil"></span> COMPOSE </a>
			        </div>  				    
				    <div class="profile-user-menu">
				        <ul>
				            <li class="active"><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>"><span class="glyphicon glyphicon-stats"></span><span>&nbsp; &nbsp; Document Status </span></a></li>
				            <li ><a href="<?php echo base_url('DocumentInbox/viewInbox'); ?>"><span class="glyphicon glyphicon-inbox"></span><span>&nbsp; &nbsp; Inbox </span></a></li>
				            <li ><a href="<?php echo base_url('DocumentSent/viewSent'); ?>"><span class="glyphicon glyphicon-folder-open"></span><span>&nbsp; &nbsp; Sent Documents </span></a></li>   
				            <li ><a href="<?php echo base_url('DocumentDraft/viewDraft'); ?>"><span class="glyphicon glyphicon-file"></span><span>&nbsp; &nbsp; Draft </span></a></li>                         
				            <li><a href="<?php echo base_url('Guide/guide'); ?>"><span class="glyphicon glyphicon-book"></span><span>&nbsp; &nbsp; Guide </span></a></li>      
				        </ul>
				    </div>    
			    </div>
			</div>    
		</div>
		<!--content-->
