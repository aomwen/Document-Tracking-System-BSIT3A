<link href="<?php echo base_url('bootstrap/css/Staff-Designs.css'); ?>" rel="stylesheet" />

<div class="myacc col-md-9">
	<div class="panel panel-default">
		<div class="panel-heading" id="head">
		    <ol class="breadcrumb pull-right">
		      <li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>"><span class="glyphicon glyphicon-home"></span></a></li> 
		      <li class="active">Account Settings</li>
		    </ol>    
		    <h3><span class="glyphicon glyphicon-inbox"></span> Account Settings</h3> 
		</div>
			<div class="panel-body">
				<div class="row">
					<?php foreach($userdata as $us){
						echo '
					<div class="col-md-3">
						<div class="well">
						<div id="photo_profile">
						<img src="'.$us['path'].'" alt="Profile Picture" class="img-responsive img-thumbnail" id="profilepic" width="200px"/>
						</div>
						<br />
						<br />
						<a href="#" class="form-control text-center edit_link" data-toggle="modal" data-target="#profileEditModal">Edit Picture</a>
						<a href=" '.base_url('Account/editProfile').' " class="form-control text-center edit_link" >Edit Information</a>
						<a href="#" class="form-control text-center edit_link edit_link2" >Change Password</a>
						</div>	
					</div>
					<div class="col-md-8 col-md-offset-1">
						<h3 class="text-primary">'.$us['firstname'].' '.$us['lastname'].' </h3>
						<h5><em>'.$us['email'].'</em></h5>
						<br />
						<h5><b class="text-primary">Username: </b>'.$us['username'].'</h5>
						
						<h5><b class="text-primary">Position: </b>'.$us['position'].'</h5>
					
						<h5><b class="text-primary">College/Office: </b>'.$us['collegeId'].'</h5>
						<h5><b class="text-primary">Department: </b>'.$us['department'].'</h5>
						';}?>
					<div>
				</div>		
			</div>
		</div>
			
	</div>
</div>	
<!--MODAL-->
          <div class="modal fade" id="profileEditModal" role="dialog">
            <div class="modal-dialog model-sm">
              <!-- Modal content-->
              <form role="form" method="post" class="modal-content" enctype="multipart/form-data" id="newprofile_form" >
                
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Change Profile Image</h4>
                  </div>
                  <div class="modal-body">
                    <!--choose banner-->
                    <div class="form-group">
                      <label for="newprofile"> New Profile Image: </label>
                      <input type="file" id="newprofile" name="newprofile" />
                    </div>
                     <div class="text-danger">
                        <?php echo validation_errors(); ?>
                    </div> 
                  
                  </div>
                  <div class="modal-footer">
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                  </div>
                 
              </form>
            </div>
          </div>
          <!--MODAL END-->