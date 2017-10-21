 <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><span>Document Tracking</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <?php foreach($userdata as $user):?>
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo $user['path']?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $user['firstname'].' '.$user['lastname']?></h2>
              </div>
            </div>
            <?php endforeach;?>
            <!-- /menu profile quick info -->
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <button id="compose" class="btn btn-sm btn-success btn-block" type="button">ADD DOCUMENT</button>              
                <br />              
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url('Dashboard/dashboardView');?>"><i class="fa fa-home"></i> Dashboard </a></li>
                  <li><a href="<?php echo base_url('DocumentStatus/viewDocuments');?>"><i class="fa fa-bar-chart"></i> Document Status </a></li>
                  <li><a href="<?php echo base_url('DocumentInbox/viewInbox');?>"><i class="fa fa-envelope"></i> Inbox </span></a></li>
                  <li><a href="<?php echo base_url('DocumentSent/viewSent');?>"><i class="fa fa-send-o"></i> Sent </a></li>
                  <li><a href="<?php echo base_url('DocumentDraft/viewDraft');?>"><i class="fa fa-archive"></i> Drafts </a></li>
                  <li><a href="<?php echo base_url('Office/viewOffice');?>"><i class="fa fa-building"></i> Offices </a></li>
                </ul>
              </div>            
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>