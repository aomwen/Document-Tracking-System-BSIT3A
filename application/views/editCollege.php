<!-- page content -->
        <div class="right_col" role="main">
          <div>
            <div class="page-title">
              <div class="title_left">
                <h3 style="margin-top: 4%;">&nbsp; <span class="glyphicon glyphicon-signal"></span> Manage Offices </h3>
              </div>
              <div class="title_right">
                <div class="panel-heading" id="head">
                  <ol class="breadcrumb pull-right">
                    <li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>" title="Home"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li><a href="<?php echo base_url('adminOffices/manageColleges'); ?>" title="colleges"><span class="fa fa-building"></span></a></li>  
                    <li class="active"> Edit College </li>
                  </ol>           
                </div>
              </div>  
            </div>
            <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">                  
                  <div class="x_content">
                    <div>
                      <h4 class="pull-left">Edit College</h4>
                      <a href="<?php echo base_url('AdminOffices/manageColleges'); ?>" class="btn btn-dark pull-right" role="button" title="Back"><span class="glyphicon glyphicon-back"></span>Back</a>
                    </div> 
                    <br />
                    <hr />
                    <div class="row">
                      <?php foreach($colleges as $ca){
                      echo '
                        <div class="col-md-3">
                          <div class="well">
                            <div id="photo_profile">
                              <img src="'.$ca['collegeLogo'].'" alt="Profile Picture" class="img-responsive img-thumbnail" id="profilepic"/>
                            </div>
                            <br />
                            <br />
                            <a href="#" class="btn btn-success form-control text-center edit_link" data-toggle="modal" data-target="#ImageLogoModal"  title="Edit Picture">Edit Picture
                            </a>
                            <a href="#" class="btn btn-success form-control text-center edit_link" data-toggle="modal" data-target="#editInfoCollege" title="Edit Information">Edit Information
                            </a>
                          </div>  
                        </div>
                        <div class="col-md-9">
                          <h3 class="text-primary">'.$ca['collegeId'].' </h3>
                          <h4><em>'.$ca['collegefull'].'</em></h4>
                          <br />
                          <h5><b class="text-primary">College Dean: </b>'.$ca['collegeDean'].'</h5>
                          <h5><b class="text-primary">College Description:</b></h5>
                          <h5>'.$ca['collegeDesc'].'</h5>
                        ';}?>
                        <div>
                      </div>    
                    </div>
                  </div>
                </div>
              </div>        
            </div>
          </div>    
        </div>  
        <!-- /page content -->


        <!--MODAL-->
        <div class="modal fade" id="ImageLogoModal"  role="dialog" style="margin-top:5%;">
          <div class="modal-dialog model-sm">
            <!-- Modal content-->
            <form role="form" method="post" class="modal-content" action="<?php echo base_url('AdminOffices/updateProfileImage/'.$_SESSION['collegeId'])?>" enctype="multipart/form-data" id="collegeprofile_form" >       
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change Logo Image</h4>
              </div>
              <div class="modal-body">
                <!--choose banner-->
                <div class="form-group">
                  <label for="newprofile"> New Logo Image: </label>
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

        <!--MODAL-->
        <?php foreach($colleges as $ca): ?>
        <div class="modal fade" id="editInfoCollege" role="dialog" style="margin-top:5%;">
          <div class="modal-dialog model-sm">
            <!-- Modal content-->
            <form action="<?php echo base_url('AdminOffices/updateCollegeInfo'); ?>" role="form" method="post" class="modal-content" id="collegeinfo" >
              
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit Information</h4>
                </div>
                <div class="modal-body">
                  <!--choose banner-->
                   <div class="form-group">
                      <label class="control-label">College Id:</label>
                          <input type="text" value="<?php echo $ca['collegeId']?>" class="form-control" name="collegeId" id="collegeId">
                    </div>
                   <div class="form-group">
                      <label class="control-label ">College Name:</label>
                          <input type="text" value="<?php echo $ca['collegefull']?>" class="form-control" name="collegefull" id="collegefull">   
                    </div>  
                  <div class="form-group">
                    <label class="control-label ">College Dean:</label>
                        <input type="text" value="<?php echo $ca['collegeDean']?>" id="collegeDean" class="form-control" name="collegeDean">
                  </div>  
                  <div class="form-group">
                      <label class="control-label">College Description:</label>
                      <textarea class="form-control" name="collegeDesc" id="collegeDesc"><?php echo $ca['collegeDesc']?></textarea>
                  </div> 
                
                </div>
                <div class="modal-footer">
                   <div class="form-group">
                      <button type="submit"  class=" addbtn btn btn-info pull-right">
                          <span class="glyphicon glyphicon-save"></span> Save Changes
                      </button>
                    </div>
                </div>           
            </form>
          </div>
        </div>
      <?php endforeach;?>
        <!--MODAL END-->
