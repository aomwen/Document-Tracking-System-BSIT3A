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
                    <li><a href="<?php echo base_url('adminOffices/manageColleges'); ?>" title="Colleges"><span class="fa fa-building"></span></a></li> 
                      <li class="active"> Add College </li>
                  </ol>           
                </div>
              </div>  
            </div>

            <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">                  
                  <div class="x_content">
                    <div>
                      <h4 class="pull-left">Add College</h4>
                      <a href="<?php echo base_url('AdminOffices/manageColleges'); ?>" class="btn btn-dark pull-right" role="button" title="Back"><span class="glyphicon glyphicon-back"></span>Back</a>
                    </div> 
                    <br />
                    <hr />
                    <form role="form" method="POST" id="newCollege_form" action="<?php echo base_url('AdminOffices/addColleges');?>" class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">College Acronym/College ID:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="collegeId" placeholder="COS" class="form-control" id="collegeId"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">College Name:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="collegefull" placeholder="College of Science" class="form-control" id="collegeName"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">College Description:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="collegeDesc" class="form-control" id="collegeDesc"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">College Dean:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="collegeDean" placeholder="Mwen" class="form-control" id="collegeDean"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">College Logo: </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" name="collegeLogo" accept="image/*" id="collegeLogo"/>
                          </div>  
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group text-center">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" value="Add" class="btn btn-success">Submit</button>
                          <button type="reset" value="Reset" class="btn btn-primary" type="reset">Reset</button>
                        </div>
                      </div>
                    </form>
                  </div>  
                </div>
              </div>
            </div>        
          </div>
        </div>    
        <!-- /page content -->