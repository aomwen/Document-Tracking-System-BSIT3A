  <!-- page content -->
        <div class="right_col" role="main">
          <div>
            <div class="page-title">
              <div class="title_left">
                <h3 style="margin-top: 4%;">&nbsp; <span class="glyphicon glyphicon-map-marker"></span> Manage Offices </h3>
              </div>
              <div class="title_right">
                <div class="panel-heading" id="head">
                  <ol class="breadcrumb pull-right">
                    <li><a href="<?php echo base_url('DocumentStatus/viewDocuments'); ?>" title="Home"><span class="glyphicon glyphicon-home"></span></a></li> 
                      <li class="active"> Manage Offices </li>
                  </ol>           
                </div>
              </div>  
            </div>
            <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">                  
                  <div class="x_content">
                    <div>
                      <h4 class="pull-left">Add Position</h4>
                      	<?php
						foreach($colleges as $cl){
						echo'
	                      <a href="'.base_url('AdminOffices/officeContent/'.$cl['collegeId'].'').'" class="btn btn-dark pull-right" role="button" title="Back"><span class="glyphicon glyphicon-back"></span>Back</a>
	                      ';
						}?>
                    </div> 
                    <br />
                    <hr />
                    <form class="formstyle form-horizontal form-label-left" method="post" id="department_form">
                      <div class="form-group">
                      	<?php
							echo '<label class="control-label col-md-3 col-sm-3 col-xs-12">ID Number:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="deptId" value="'.$idno.'" class="form-control col-md-7 col-xs-12" readonly />';?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Department:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="department" placeholder="i.e. Math Department" class="form-control col-md-7 col-xs-12" id="department"/>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group text-center">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                          <button class="btn btn-primary" type="reset">Reset</button>
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

<script>
 $('#department_form').on('submit',function(e){
    e.preventDefault();
    if($('#department').val() != ''){
    	
          $.ajax({
          url:"<?php echo base_url(); ?>AdminOffices/addDepartment/<?php foreach($colleges as $cl){echo $cl['collegeId']; }?>", 
          method:"POST",
          data:new FormData(this),
          contentType:false,
          cache:false,
          processData:false,
          success:function(data){
      		  alert("Successfully added the department.");
          }

        });
        
      
  }else{
        alert("Please Fill in the department name field.");
  }
  });

</script>
