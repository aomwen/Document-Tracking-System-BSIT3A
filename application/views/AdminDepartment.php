
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
                    <li><a href="<?php echo base_url('Dashboard/dashboardView'); ?>" title="Home"><span class="glyphicon glyphicon-home"></span></a></li> 
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
                      <?php 
                      foreach($collegefull as $cl){
                      echo'
                        <h4 class="pull-left">'.$cl['collegefull'].'</h4>
                        <div class="pull-right">
                          <a href="'.base_url('AdminOffices/addDepartment/'.$cl['collegeId'].'').'" role="button" class="btn btn-dark">
                          <span class="glyphicon glyphicon-plus"></span>&nbspAdd Department </a>
                          <a href="'.base_url('AdminOffices/manageColleges').'" class="btn btn-dark pull-right" role="button" title="Back"><span class="glyphicon glyphicon-back"></span>Back</a>
                        </div';
                      }?>    
                    </div> 
                    <br />
                    <hr />
        						<div class="panel-group" id="accordion">
        							<div class="panel">
        								<?php
        								foreach($departments as $d){
        									$dept= str_replace(' ','-',$d['department']);
        									echo'
        									<div class="panel-heading">
        										<h4 class="panel-title">
        												<a class="text-center">'.$d['department'].'</a>
        												<a class="pull-right" title="Edit" data-toggle="collapse" data-parent="#accordion" href="#'.$dept.'"> <span class="glyphicon glyphicon-pencil"></span></a>';?>
        												<!--<a class="pull-right" href="#" onClick="deleteDepartment('<?php echo $d['department'];?>','<?php echo $d['deptId'];?>')"> <span class="glyphicon glyphicon-remove-sign" style="color: black"></span> </a>-->
        								<?php echo 
                            '</h4>
        									</div>
        									<div class="panel-collapse collapse" id="'.$dept.'">
        										<div class="panel-body">
                              <form class="formstyle form-horizontal form-label-left" action="'.base_url('AdminOffices/UpdateDepartment').'" method="POST">
                                <div class="form-group">
            											<label class="control-label col-md-3 col-sm-3 col-xs-12">Department ID:</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                											<input type="text" name="deptId" class="form-control col-md-7 col-xs-12" value="'.$d['deptId'].'" readonly/>
                                    </div>  
                                </div>  
                                <div class="form-group">
            											<label class="control-label col-md-3 col-sm-3 col-xs-12">College:</label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
            											 <input type="text" name="collegeId" class="form-control col-md-7 col-xs-12" value="'.$d['collegeId'].'" readonly/>
                                  </div> 
                                </div>
                                <div class="form-group">  
            											<label class="control-label col-md-3 col-sm-3 col-xs-12">Department:</label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
              											<input type="text" name="department" class="form-control col-md-7 col-xs-12" value="'.$d['department'].'" />
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
        									</div>'
        									;
        								}
        								?>
        							</div>
        						</div>
                  </div>
                </div>
              </div>
            </div>        
					</div>	
				</div>
			</div>
		</div>
	</div>		
</div>
<!--
<script type="text/javascript">
      function deleteDepartment(dept,id){
       // console.log(id);
        var ans = confirm("Are you sure to delete this department?");
       // alert(id);
        if(ans==true){
          //redirect to delete method
          var url="<?php echo base_url('AdminOffices/removeDepartment/');?>"+dept+"/"+id;
          location.href = url;
          alert("The department has been successfully deleted!");
        }
      }
</script>-->
 <script>
 $('#editDept_form').on('submit',function(e){
    e.preventDefault();
    if($('#departmentedit').val() != ''){
    	
          $.ajax({
          url:"<?php echo base_url(); ?>AdminOffices/UpdateDepartment", 
          method:"POST",
          data:new FormData(this),
          contentType:false,
          cache:false,
          processData:false,
          success:function(data){
      		  alert("Successfully updated the file.");
          }

        });
        
      
  }else{
        alert("Please Fill in the department field.");
  }
  });

</script>
