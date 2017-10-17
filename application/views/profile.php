<html> 
<head>
  <link href="<?php echo base_url('bootstrap/css/profile-design-inside.css'); ?>" rel="stylesheet" />
</head>
<div class="container-default" id="box-wrapper">
  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- <img class="pull-left" src="<?php echo base_url('assets/images/doctrack_logo.png');?>" id="logo"/> -->
        <a class="navbar-brand" href="#myPage" style="font-family: Ebrima; font-size:22px;" data-toggle="tooltip" title="Document Tracking System">Document Tracking System</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown notif-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Notification">
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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Username">
              <img src="<?php echo base_url('assets/images/pic.png');?>" class="user-image" alt="User Image" />
              <span class="hidden-xs"><?php echo $_SESSION['username'];?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <?php
                foreach($userdata as $us){             
                  echo '<img src="';if($us['path']!=null){ echo $us['path'];}else{ echo base_url('assets/images/pic.png'); } echo'" class="img-circle" alt="User Image" />
                <p>'.$_SESSION['username'].' 
                  <small>'.$us['position'].'</small>
                </p>';  
                } 
                ?>
              </li>
              <li class="user-body">
                <div>
                  <a href="<?php echo base_url('Account/viewAccount'); ?>" class="btn btn-default pull-left">Account Setting</a>
                  <a href="<?php echo base_url('Access/logOut'); ?>" class="btn btn-default pull-right">Sign Out</a>
                </div>    
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
  <div class="container-fluid" >
    <div class="row">
      <div class="col-md-3 profile">
        <div class="profile-sidebar">
          <div class="profile-user-pic">
            <?php
            foreach($userdata as $us){
            echo '
            <img src="';if($us['path']!=null){ echo $us['path'];}else{ echo base_url('assets/images/pic.png');} echo '" alt="Profile Picture" class="img-responsive image-circle"/>
          </div>
          <div class="profile-user-title">
            <div class="profile-user-name">'.$us['firstname'].' '.$us['lastname'].'</div>
            <div class="profile-user-position">'.$us['position'].' </div>
            <div class="profile-user-position">'.$us['department'].' </div>
            <div class="profile-user-position">'.$us['collegeId'].' </div>';
          }?>
            <div class="profile-user-menu">
              <div class="profile-user-button">
                <a href="<?php echo base_url('FilesManipulation/sendFile'); ?>" class="Sbtn btn-block" role="button" title="Compose"><span class="glyphicon glyphicon-pencil"></span> COMPOSE </a> 
              </div>  
              <div class="profile-user-menu">
                <ul class="nav">
                  <li ><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>" title="Document Status"><span class="glyphicon glyphicon-stats"></span><span>&nbsp; &nbsp; Document Status </span></a></li>
                  <li ><a href="<?php echo base_url('DocumentInbox/viewInbox'); ?>" title="Inbox"><span class="glyphicon glyphicon-inbox"></span><span>&nbsp; &nbsp; Inbox </span></a></li>
                  <li ><a href="<?php echo base_url('DocumentSent/viewSent'); ?>" title="Sent Items"><span class="glyphicon glyphicon-folder-open"></span><span>&nbsp; &nbsp; Sent </span></a></li>
                  <li ><a href="<?php echo base_url('DocumentDraft/viewDraft'); ?>" title="Draft"><span class="glyphicon glyphicon-file"></span><span>&nbsp; &nbsp; Drafts </span></a></li>
                  <li><a href="<?php echo base_url('Guide/guide'); ?>" title="Guide"><span class="glyphicon glyphicon-book"></span><span>&nbsp; &nbsp; Guide </span></a></li> 
                  <li><a href="<?php echo base_url('Office/viewOffice');?>" title="Offices"><span class="glyphicon glyphicon-map-marker"></span><span>&nbsp; &nbsp; Offices </span></a></li>
              </ul>
            </div>  
          </div>  
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